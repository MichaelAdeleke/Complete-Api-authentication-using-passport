<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function destroy(User $user,$notificationId){

        auth()->$user->notifications()->findOrFail($notificationId)->markAsRead();

    }

    public function index(){
        return auth()->user()->unreadNotifications;
    }
}
