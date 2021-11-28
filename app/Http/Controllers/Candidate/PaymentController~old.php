<?php

namespace App\Http\Controllers\Candidate;

use Pesapal;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Employer\Order;
use App\Models\Employer\Payment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
// use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class PaymentController extends Controller
{


    public function payment(Request $request){//initiates payment
        $orderItems= compact($request->all());
        $orderSumCost = Order::where('session_id',Session::get('emp_session_id'))->sum('grand_total');
        $orderData = Order::where('session_id',Session::get('emp_session_id'))->first();
        // dd(Auth::guard()->id());
        $RANDO = rand(100000000,999999999);

        $payments = new Payment;
        $payments -> businessid = Auth::guard()->id(); //Business ID
        $payments -> transactionid = $RANDO;
        // Pesapal::random_reference();
        $payments -> trackingid = $orderData->trackingid;
        $payments -> payment_method = 'NA';
        $payments -> status = 'NEW'; //if user gets to iframe then exits, i prefer to have that as a new/lost transaction, not pending
        $payments -> amount = 1;
        $payments -> save();

        $orderData->transactionid=$RANDO;
        $orderData-> save();

        $user=DB::table('about_mes')->where('user_id',auth()->user()->id)->first();
        $details = array(
            'amount' => $payments -> amount,
            'description' => 'Transaction',
            'type' => 'MERCHANT',
            'first_name' => $user->fname,
            'last_name' => $user->lname,
            'email' => auth()->user()->email,
            'phonenumber' => '254-'.$user->phone,
            'reference' => $payments -> transactionid,
            'height'=>'400px',
            'currency' => env('PESAPAL_CURRENCY')
        );
        $iframe=Pesapal::makePayment($details);

        // dd($iframe);
        return view('Backend.Candidate.Order.Payment', compact('iframe'));
    }


    public function paymentsuccess(Request $request)//just tells u payment has gone thru..but not confirmed
    {
        $trackingid = $request->input('tracking_id');
        // dd($trackingid);
        $ref = $request->input('merchant_reference');

        /*
        / AT THIS POINT ADD THE ORDER TRACKING NO TO USE IT TO APPROVE THE ORDER DURING PAYMENT APPROVAL
        */
        $latest_order=Order::where('transactionid',$ref)->first();
        $latest_order -> trackingid = $trackingid;
        $latest_order -> save();


        $payments = Payment::where('transactionid',$ref)->first();
        $payments -> trackingid = $trackingid;
        $payments -> status = 'PENDING';
        $payments -> save();



        //go back home
        $payments=Payment::where('businessid',auth()->user()->id)->orderBy('created_at', 'desc')->first();
        return redirect('candidate')->with('ok', 'You have successfully made payment, please wait while we update your payment records');
        // return view('Backend.Employer.Order.PaymentConfirmation', compact('payments'));
    }
    //This method just tells u that there is a change in pesapal for your transaction..
    //u need to now query status..retrieve the change...CANCELLED? CONFIRMED?
    public function paymentconfirmation(Request $request)
    {
        $trackingid = $request->input('pesapal_transaction_tracking_id');
        $merchant_reference = $request->input('pesapal_merchant_reference');
        $pesapal_notification_type= $request->input('pesapal_notification_type');

        //use the above to retrieve payment status now..
        $result = $this->checkpaymentstatus($trackingid,$merchant_reference,$pesapal_notification_type);
        return $result;
    }
    //Confirm status of transaction and update the DB
    public function checkpaymentstatus($trackingid,$merchant_reference,$pesapal_notification_type){
        $status=Pesapal::getMerchantStatus($merchant_reference);
        $payments = Payment::where('trackingid',$trackingid)->first();
        $payments -> status = $status;
        $payments -> payment_method = "PESAPAL";//use the actual method though...
        $payments -> save();
        return true;
    }
}
