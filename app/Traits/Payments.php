<?php

namespace App\Traits;

use App\Models\Employer\Payment;
use Illuminate\Support\Facades\Request;
use Pesapal;


trait Payments{


    //Confirm status of transaction and update the DB
    public function checkpaymentstatus($trackingid,$merchant_reference,$pesapal_notification_type){

        /*
        / AT THIS POINT ADD THE ORDER TRACKING NO TO USE IT TO APPROVE THE ORDER DURING PAYMENT APPROVAL
        */
        // $latest_order=Order::latest()->first();
        // $latest_order -> trackingid = $trackingid;
        // $latest_order -> save();

        $status=Pesapal::getMerchantStatus($merchant_reference);
        $payments = Payment::where('trackingid',$trackingid)->first();
        $payments -> status = $status;
        $payments -> payment_method = "MPESA";//use the actual method though...
        $payments -> save();

        if($status == "completed"){
            $oder = Order::where('trackingid',$trackingid)->first();
            $oder->status = 1; //payment attempt done
            $oder->save();
        }
        return true;
    }

}
