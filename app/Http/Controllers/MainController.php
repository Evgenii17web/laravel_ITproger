<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function review()
    {
        $review = new Contact();
        return view('review', ['reviews' => $review->all()]);
    }

    public function reviewCheck(Request $request) {
        $request->validate([
            'email' => 'required|min:2|max:100',
            'subject' => 'required|min:2|max:10',
            'message' => 'required|min:2|max:100',
        ]);

        $review = new Contact();
        $review->email = $request->input('email');
        $review->subject = $request->input('subject');
        $review->message = $request->input('message');

        $review->save();

        return redirect('review');
    }
}
