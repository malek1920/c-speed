<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Swift_SmtpTransport;
use Swift_Attachment;
use Swift_Mailer;
use Swift_Message;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $email = User::find($request->id);
         $transport = (new Swift_SmtpTransport('smtp.gmail.com', '587', 'tls'))
            ->setUsername('wahidfkiri5@gmail.com')
            ->setPassword('daxsus2021');
        $mailer    = new Swift_Mailer($transport);
        $message   = (new Swift_Message($request->subject))
            ->setFrom('wahidfkiri5@gmail.com', 'wahid fkiri')
            ->setTo($email->email);
           //  ->addcc($cc)
           //  ->setReadReceiptTo($return_receipt)
          //   ->addReplyTo($reply_to);     
           // Create your file contents in the normal way, but don't write them to disk
            // Create the attachment with your data
           // $attachment = new Swift_Attachment($filepdf, 'my-file.pdf', 'application/pdf');
            // Attach it to the message
           // $message->attach($attachment);
            // You can alternatively use method chaining to build the attachment
          //  $attachment = (new Swift_Attachment())
           //   ->setFilename('my-file.pdf')
           //   ->setContentType('application/pdf')
           //   ->setBody($filepdf)
           //   ;
               // return result  
                $mailer->send($message); 
                return response()->json([
                    'success' => true,
                    'message' => 'email sent',
                ]);
     }
}
