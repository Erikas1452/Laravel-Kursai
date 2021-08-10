<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){

    \Stripe\Stripe::setApiKey('sk_test_51JMqlvBKRcPLY2eVT73sxxbdcqm7OuhWtE7SVX0bPnNFrREPcDglvjsKaixrdgWAqIaQx0ZPTGPlaT13j0Z3MFcA00sU4vF3Lb');
    
    $token = $_POST['stripeToken'];
    $charge = \Stripe\Charge::create([
        'amount' => 999*100,
        'currency' => 'usd',
        'description' => 'Easy Online Store',
        'source' => $token,
        'metadata' => ['order_id' => '6735'],
    ]);

    dd($charge);

    }
}
