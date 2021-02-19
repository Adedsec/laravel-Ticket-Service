<?php

namespace App\Http\Controllers;

use App\Events\ReplyCreated;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }

    public function create(Ticket $ticket, Request $request)
    {
        $reply = auth()->user()->replies()->create([
            "text" => $request->get('text'),
            'ticket_id' => $ticket->id
        ]);
        event(new ReplyCreated($reply, Auth::user()));
        return back();
    }
}
