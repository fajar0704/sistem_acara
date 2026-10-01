<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EventUserController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(6);
        return view('user.event.index', compact('events'));
    }

    public function payment($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        if ($event->status !== 'Opened') {
            return redirect()->route('user.event')->with('error', 'Acara ini sudah ditutup.');
        }

        // Check if user already has a Paid transaction for this event
        $alreadyPaid = Transaction::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->where('status', 'Paid')
            ->first();

        if ($alreadyPaid) {
            return redirect()->route('user.event.myEvent')->with('info', 'Anda sudah terdaftar pada acara ini.');
        }

        // Reuse an existing Pending transaction or create a new one
        $trans = Transaction::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->where('status', 'Pending')
            ->latest()
            ->first();

        if (!$trans) {
            $trans = new Transaction;
            $trans->user_id = Auth::id();
            $trans->event_id = $event->id;
            $trans->price = $event->price;
            $trans->status = 'Pending';
            $trans->save();
        }

        // Midtrans configuration
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('midtrans.isProduction', false);
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized', true);
        \Midtrans\Config::$is3ds = config('midtrans.is3ds', true);

        $orderId = 'ORDER-' . $trans->id . '-' . time();
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $trans->price,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $trans->snap_token = $snapToken;
            $trans->save();
        } catch (\Exception $e) {
            Log::error('Midtrans Snap Token Error: ' . $e->getMessage());
        }

        return view('user.event.payment', compact('event', 'trans'));
    }

    public function success(Transaction $trans)
    {
        if ($trans->user_id !== Auth::id()) {
            abort(403, 'Akses tidak diizinkan.');
        }

        $trans->status = 'Paid';
        $trans->save();

        return redirect()->route('user.event.myEvent')->with('success', 'Pembayaran Berhasil! Anda telah terdaftar pada acara ini.');
    }

    public function myEvent()
    {
        $transactions = Transaction::with('event')
            ->where('user_id', Auth::id())
            ->where('status', 'Paid')
            ->latest()
            ->paginate(6);

        return view('user.transaction.index', compact('transactions'));
    }

    public function about()
    {
        return view('user.about');
    }
}
