<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\Models\User;
use \App\Models\Book;

class OrderController extends Controller
{


  public function __construct(){
    $this->middleware(function($request, $next){
                
      if(Gate::allows('manage-orders')) return $next($request);

      abort(403, 'Anda tidak memiliki cukup hak akses');
    });
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $status = $request->get('status');
        $buyer_email = $request->get('buyer_email');


        $orders = \App\Models\Order::with('user')
                    ->with('books')
                    ->whereHas('user', function($query) use ($buyer_email) {
                        $query->where('email', 'LIKE', "%$buyer_email%");
                    })
                    ->where('status', 'LIKE', "%$status%")
                    ->paginate(10);
        
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['customers']  =  User::where('roles','LIKE', "%CUSTOMER%")->get();
        $data['books']      =  Book::get();
        return view('orders.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request = $request->all();
       print_r($request);


       /* INPUT KE TABLE ORDER            
          param:
          user_id,
          invoice_number,
          total_price (cek ke table books by book_id_order)  

        */
        $new_order = new \App\Models\Order;
        $new_order->user_id = $request->get('buyer');
        $new_order->invoice_number = $request->get('invoice_number');
        //$new_order->total_price =  

        // write your code here 


       /* INPUT KE TABLE BOOK_ORDER
        param:
        order_id (feedback dari INPUT KE TABLE ORDER diatas)
        book_id = book_id_order
        quantity = total_book_order

       */ 

        // write your code here 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = \App\Models\Order::findOrFail($id);

        return view('orders.edit', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
