<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Swift_SmtpTransport;
use Swift_Attachment;
use Swift_Mailer;
use Swift_Message;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $email = User::find($request->id);
         $transport = (new Swift_SmtpTransport('smtp.gmail.com', '587', 'tls'))
            ->setUsername('kachroudisamira0@gmail.com')
            ->setPassword('DaD 25-4-97');
        $mailer    = new Swift_Mailer($transport);
        $message   = (new Swift_Message($request->subject))
            ->setFrom('kachroudisamira0@gmail.com', 'DaD 25-4-97')
            ->setTo($email->email)
            ->setBody($request->message);
          
               // return result  
                $mailer->send($message); 
                return response()->json([
                    'success' => true,
                    'message' => 'email sent',
                ]);
     }
}
