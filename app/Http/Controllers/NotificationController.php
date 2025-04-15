<?php

namespace App\Http\Controllers;

use App\Notifications\LetterNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // public function sendNotification()
    // {
    //     $user = Auth::user(); // Ambil user yang sedang login
    //     $message = "Selamat, kamu mendapatkan notifikasi baru!";

    //     $user->notify(new LetterNotification($message));

    //     return redirect()->back()->with('success', 'Notifikasi telah dikirim!');
    // }
}
