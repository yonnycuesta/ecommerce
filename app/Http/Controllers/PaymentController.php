<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Payment(Request $request)
    {
        $data = array();

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['payment'] = $request->payment;

        if ($request->payment == 'stripe') {

            return view('pages.payment.stripe', compact('data'));
        } elseif ($request->payment == 'paypal') {
        } elseif ($request->payment == 'ideal') {
        } else {
            echo "Cash On Delivery";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function StripeCharge(Request $request)
    {

        \Stripe\Stripe::setApiKey('sk_test_51IpecpCEeTTM3bygxCIy1nGadVwDd9fJIhpsJBJp6PjrE2w03cO6lNeFTp5dbvidHyp1uQuqogK0VEIngIHRebzO00UwrnvlDh');


        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => 999 * 100,
            'currency' => 'usd',
            'description' => 'Udemy Ecommerce Details',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        dd($charge);
    }


    public function destroy($id)
    {
        //
    }
}
