<?php
namespace App\Http\Controllers\Employer;
use Carbon\Carbon;
use PaymentController;
use App\Traits\Payments;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Employer\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;



class OrderController extends Controller{
    use  Payments;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Employer.Order.index');
    }

    /**
     * Show all the approved Order i.e payment done
    */

    public function approved()
    {
        $res = Order::where('order_verify',1)->get();
        return view('Employer.Order.Approved',compact('res'));
    }


    /**
     *
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //  Binds the cart to a specific user.
        $userId = auth()->user()->id;
        \Cart::session($userId);

        // check whether you have tokens if not get redirected to buy them elsif purchase the product consuming the token
        //*  when you buy a token it has expiry date and the amount
        //* I must check for both
        //*

        $user_data = auth()->user();
        // dd($user_data);
        $orderItems= ["data"=>$request->all()];
        // $data= Cart::where('session_id',Session::get('session_id'))->get();

        // Getting cart's contents for a specific user
        $userId = auth()->user()->id; // or any string represents user identifier
        $data=\Cart::getContent()->toArray();


        $now = Carbon::now();
        $trackingid =date('YmdHis');

        foreach ($data as $key => $value) {
            $expriry = $now->addDays($value['attributes']['duration']);
            $order = Order::where('package', $value['attributes']['package'])->first();
            if ($order !== null) {

                $order->update(
                    [
                        'user_id'=>$user_data->id,
                        'users_email'=>$user_data->email,
                        'payment_method'=>"NA",
                        'quantity'=>$value['quantity'],
                        'grand_total'=>(($value['quantity']*$value['price'])*(env('VAT')/100)+($value['quantity']*$value['price']) ),
                        'order_verify'=>0,
                        'trackingid'=>$trackingid,
                        'expiry_date'=>$expriry,
                        'session_id'=>Session::get('emp_session_id'),
                    ]
                );

            } else {

                Order::create([

                    'package'=>$value['attributes']['package'],
                    'user_id'=>$user_data->id,
                    'users_email'=>$user_data->email,
                    'payment_method'=>"NA",
                    'quantity'=>$value['quantity'],
                    'grand_total'=>(($value['quantity']*$value['price'])*(env('VAT')/100)+($value['quantity']*$value['price']) ),
                    'order_verify'=>0,
                    'trackingid'=>$trackingid,
                    'expiry_date'=>$expriry,
                    'session_id'=>Session::get('emp_session_id'),

                ]);

            }
            // Order::updateOrCreate


        }

        return redirect()->to('employer/payment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!empty($request->input('pesapal_notification_type'))){
        $merchant_reference = $request->input('pesapal_merchant_reference');
        $trackingid = $request->input('pesapal_transaction_tracking_id');
        $pesapal_notification_type= $request->input('pesapal_notification_type');


        // THIS IS POSSIBLE DUE UTILIZATION OF TRAITS
        $status = $this->checkpaymentstatus($trackingid,$merchant_reference,$pesapal_notification_type);
        // on approving payment you store the product
            if($status){
                    $data_arr = $request->all();
                    $oder = Order::where('trackingid',$trackingid)->first();
                    $oder->order_verify = 1;
                    $oder->save();
                    // dd('then');
                    return redirect('employer');
            }else{
                // return back()->with('danger','Failed To Approve Order');
                return redirect('employer');
            }
        }else{
            // return back()->with('danger','Missing Notification Type');
            return redirect('employer');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
