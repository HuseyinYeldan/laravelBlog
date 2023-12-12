<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        try{
            $newsletter->subscribe(request('email'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Error occured.');
        }

        return redirect()->back()->with('success','You are subscribed to the newsletter.');
    }
}
