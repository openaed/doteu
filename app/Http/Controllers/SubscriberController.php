<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function signUp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        try {
            $subscriber = Subscriber::create([
                'email' => $request->email,
                'signed_up_at' => now(),
            ]);
        } catch (\Exception $e) {
            return redirect()->to(route('home') . "#newsletter")->with('newsletter', __('pages/home.newsletter-error'));
        }

        return redirect()->to(route('home') . "#newsletter")->with('newsletter', __('pages/home.newsletter-success'));
    }

}