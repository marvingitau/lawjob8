<?php

namespace App\Http\Controllers\Employer;

use Carbon\Carbon;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Employer\Order;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{

    public function setCartSession()
    {
        //  Binds the cart to a specific user.
         $userId = auth()->user()->id;
        \Cart::session($userId);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //    set session
        $this->setCartSession();

        $cartCollection = \Cart::getContent();

        // NOTE: Because cart collection extends Laravel's Collection
        // You can use methods you already know about Laravel's Collection

        // transformations
        $cart_data = $cartCollection->toArray();


        // $session_id=Session::get('session_id');
        // $cart_data = Cart::where('session_id',$session_id)->select(['product_name','price','quantity','package','duration','session_id'])->get();

        $total_price=0;
        foreach ($cart_data as $key=>$cart_datum){
            $x =$cart_datum['price'];
            // $y = $cart_datum['quantity'];
            $total_price += $x;
        }

        $plus_vat = $total_price + $total_price*(env('VAT')/100);
        $user_profile_exists=DB::table('about_mes')->where('user_id',auth()->user()->id)->count();
        if(auth()->user()->role == 'employer'){
        return view('Backend.Employer.Order.Cart.index',compact('cart_data','total_price','plus_vat'));
        }else{
        return view('Backend.Candidate.Order.Cart.index',compact('cart_data','total_price','plus_vat','user_profile_exists'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$days)
    {
        //    set session
        $this->setCartSession();


        $req=$request->validate([
            'quantity'=>'required|min:1',
            'package'=>'required',
            'days'=>'required', //cart primary key
            'product_name'=>'required',
            'price'=>'required',
            'prodid'=>'required',
        ]);
        try {
            // add single items at one time
            \Cart::add(array(
                array(
                    'id' => $req['days'],
                    'name' => $req['product_name'],
                    'price' => $req['price'],
                    'quantity' => $req['quantity'],
                    'attributes' => array(
                        'package' => $req['package'],
                        'duration'=>$req['days'],
                        'prodid' => $req['prodid'],
                    )
                ),
            ));

            /**
             *
             * ************************** ORDERCONTROLLER CREATE FUNCTION FOR THE AVAIL OF PAYMENT **************************************
             *
             */

            //  Binds the cart to a specific user.
            $userId = auth()->user()->id;
            \Cart::session($userId);

            // check whether you have tokens if not get redirected to buy them elsif purchase the product consuming the token
            //*  when you buy a token it has expiry date and the amount
            //* I must check for both
            //*

            $user_data = auth()->user();

            $orderItems= ["data"=>$request->all()];
            // $data= Cart::where('session_id',Session::get('session_id'))->get();

            // Getting cart's contents for a specific user
            $userId = auth()->user()->id; // or any string represents user identifier
            $data=\Cart::getContent()->toArray();

            $now = Carbon::now();
            $trackingid =date('YmdHis');

            foreach ($data as $key => $value) {
                //What is the use of checking for duplication?
                $order = Order::where('package', $value['attributes']['package'])->where('session_id',Session::get('emp_session_id'))->where('user_id',$userId)->where('quantity',$value['quantity'])->where('status',0)->where('order_verify',0)->first();

                if ($order != null) {

                    $order->update(
                        [
                            'user_id'=>$user_data->id,
                            'users_email'=>$user_data->email,
                            'payment_method'=>"NA",
                            'quantity'=>$value['quantity'],
                            'prodid'=>$value['attributes']['prodid'],
                            'grand_total'=>(($value['price'])*(env('VAT')/100)+($value['price']) ),
                            'order_verify'=>0,
                            'trackingid'=>$trackingid,
                            'expiry_date'=>Carbon::now()->addDays($value['attributes']['duration'])->format('Y-m-d H:i:s'),
                            'session_id'=>Session::get('emp_session_id'),
                        ]
                    );

                } else {

                    $createdOrd=Order::create([

                        'package'=>$value['attributes']['package'],
                        'user_id'=>$user_data->id,
                        'users_email'=>$user_data->email,
                        'payment_method'=>"NA",
                        'quantity'=>$value['quantity'],
                        'prodid'=>$value['attributes']['prodid'],
                        'grand_total'=>(($value['price'])*(env('VAT')/100)+($value['price']) ),
                        'order_verify'=>0,
                        'trackingid'=>$trackingid,
                        'expiry_date'=>Carbon::now()->addDays($value['attributes']['duration'])->format('Y-m-d H:i:s'),
                        'session_id'=>Session::get('emp_session_id'),

                    ]);

                }
                // Order::updateOrCreate


            }
            \Cart::session($userId)->clear();
            if(auth()->user()->role == 'employer'){
                return redirect()->to('employer/payment');
            }else{
                return redirect()->to('candidate/payment');
            }


            // return back()->with('message','Added To Cart ');

        } catch (\Throwable $th) {
            return back()->with('message',$th->getMessage());
        }


        // $session_id=Session::get('session_id');
        // if(empty($session_id)){
        //     $session_id=str_random(40);
        //     Session::put('session_id',$session_id);
        // }
        // $count_duplicateItems=Cart::where(['product_name'=>$req['product_name'],'user_email'=>$usr->email,'session_id'=> $session_id])->count();
        // if($count_duplicateItems>0){
        //             return back()->with('message','This Item exist already,Go To Cart To Update'); //have not expired.
        // }else{

            // Cart::create($req+['session_id'=> $session_id,'user_email'=>$usr->email]);
            // $session_id=Session::get('session_id');
            // $cart_count =Cart::where('session_id',$session_id)->get()->count();

            // Session::put('cart_val',$cart_count);
            // return back()->with('message','Added To Cart ');

            //  return redirect()->to('employer/payment');

        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$value)
    {
        try {
            //    set session
            $this->setCartSession();

            // update cart content
            \Cart::update($id, array(
                'quantity' => $value, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
            ));
            // Remove previuosly place item in Order table
            //to prevent duplication
            // so long as its not verified
            Order::where('prodid',\Cart::get($id)->toArray()['attributes']['prodid'])->where('order_verify','<=',0)->delete();
            return back()->with('message','Updated Cart ');
        } catch (\Throwable $th) {
            return back()->with('message','Erro in Updating Cart');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //    set session
            $this->setCartSession();
            // dd(\Cart::get($id)->toArray()['attributes']['prodid']);

            Order::where('prodid',\Cart::get($id)->toArray()['attributes']['prodid'])->where('order_verify','<=',0)->delete();
            /**
             * removes an item on cart by item ID
             *
             * @param $id
             */

            \Cart::session(auth()->user()->id)->remove($id);
            // Remove previuosly place item in Order table
            //to prevent duplication

            return back()->with('message','Deleted Item');
        } catch (\Throwable $th) {
            return back()->with('error','Erro in removing Item');
        }

    }
}
