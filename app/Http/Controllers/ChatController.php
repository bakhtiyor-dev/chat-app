<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'users' => User::query()->whereNot('id', auth()->id())->get()
        ]);
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'message' => 'required',
            'receiverId' => 'required',
            'senderId' => 'required'
        ]);

        Message::query()->create([
            'body' => $data['message'],
            'receiver_id' => $data['receiverId'],
            'sender_id' => $data['senderId']
        ]);

        return response(['message' => 'sent'], 200);
    }

    public function fetchMessages(int $activeUserId)
    {
        $userId = auth()->id();

        return Message::query()->where('receiver_id', $activeUserId)
            ->orWhere('sender_id', $activeUserId)
            ->orWhere('receiver_id', $userId)
            ->orWhere('sender_id', $userId)
            ->get()
            ->toJson();
    }
}
