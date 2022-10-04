<?php

namespace App\Http\Controllers;

use App\Services\NewsletterInterface;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(NewsletterInterface $newsletter){
        request()->validate(['email', 'email']);
        try{
            $newsletter->subscribe(request('email'));

        }catch(\Exception $ex){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email'=> 'This email could not be added to our newsletter list.'
            ]);
        }
        return redirect('/')
            ->with('success', 'You are now signed for our newsletter!');
    }
}
