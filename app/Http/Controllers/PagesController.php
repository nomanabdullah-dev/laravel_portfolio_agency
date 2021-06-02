<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\About;
use App\Models\Main;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        $main = Main::first();
        $services = Service::all();
        $portfolios = Portfolio::all();
        $abouts = About::all();
        return view('pages.index', compact('main','services','portfolios','abouts'));
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function message(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required|min:20'
        ]);

        $message = new Message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->message = $request->message;

        $message->save();

        // $contact_form_data = $request->all();
        // Mail::to('')->send(new ContactFormMail($contact_form_data));

        return redirect('/');
        // ->route('home',)->with('success','Your message has been sent');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
