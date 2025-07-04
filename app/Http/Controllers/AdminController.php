<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $events = Event::get();
        $transactions = Transaction::where('status', 'Paid')->get();
        $users = User::where('role', 'user')->get();
        return view('admin.dashboard', compact('events', 'transactions', 'users'));
    }
}
