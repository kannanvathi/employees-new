<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Http\Requests\PdfRequest;
use App\Models\PdfData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function send_mail (Request $request) {
        $mail_id = $request->mail;

        $details = [
            'title' => 'Learning process',
            'body' => 'This is for testing email using smtp'
        ];

        \Mail::to($mail_id)->send(new \App\Mail\TestMail($details));
        return redirect()->route('home')->with('message', 'Mail sent successfully');
    }

    public function send_pdf (PdfRequest $request) {

        PdfData::create([
            'mail' => $request->mail,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        $details["email"] = $request->mail;
        $details["title"] = $request->title;
        $details["body"] = $request->body;



        $pdf = PDF::loadView('emails.myPdfMail', $details);

        Mail::send('emails.myPdfMail', $details, function($message)use($details, $pdf) {
            $message->to($details["email"], $details["email"])
                ->subject($details["title"])
                ->attachData($pdf->output(), "text.pdf");
        });

        return redirect()->route('home')->with('message', 'Pdf sent successfully');

        /*return response()->json(['message' => 'Pdf sent successfully']);*/

    }

}
