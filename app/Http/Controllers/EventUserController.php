<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventUserController extends Controller
{
    public function index(){
        $events = Event::paginate(5);
        return view('user.event.index', compact('events'));
    }

    public function payment($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $trans = new Transaction;
        $trans->user_id = Auth::user()->id;
        $trans->event_id = $event->id;
        $trans->price = $event->price;
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $trans->price,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email
            )
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $trans->snap_token = $snapToken;
        $trans->save();

        return view('user.event.payment', compact('event', 'trans'));
    }

    public function success(Transaction $trans)
    {
        $trans->status = str('Paid');
        $trans->update();
        return redirect()->route('user.event.myEvent')->with('success', 'Pembayaran Berhasil!!');
    }

    public function myEvent(){
        $transactions = Transaction::where('user_id', Auth::user()->id)->where('status', 'Paid')->paginate(5);
        return view('user.transaction.index', compact('transactions'));
    }

    public function about()
    {
        return view('user.about');
    }
}
