<?php

namespace App\Http\Controllers;
use App\Tutors;
use Session;
use Stripe;
use App\Models\InvitationHistory;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index($id)
    {
        $data = InvitationHistory::where('id', $id)
                                    ->get();
        $invitation_price = 100;
        return view('pages.stripe',[
            'id' => $id,
            'price' => $invitation_price,
            'name' => $data[0]->bride_name,
        ]);    
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(config('app.STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->price*100,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => $request->name,
        ]);
   
        Session::flash('success', 'Payment Successful !');
    }
}
