<?php

namespace DiscussIt\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Mark all notifications as read
     * Display all unread notifications
     */
    public function notifications()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return view('users.notifications', [
            'notifications' => auth()->user()->notifications()->paginate(5)
        ]);
    }
}
