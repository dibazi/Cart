<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =  Cart::orderBy('id', 'DESC')->get();
        return view('carts.index', ['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('carts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate user token before authorizing 
        if (!Auth::user()->tokenCan('not:allow')){
            abort(403, 'Unauthorized');
        }

        $request->validate([
           'user_name' => 'required',
           'items_quantity' => 'required',
       ]);
       Cart::create([
        'user_id' => Auth::user()->id,
        'user_name' => $request->user_name,
        'items_quantity' => $request->items_quantity
    ]);
       
       return redirect()->route('carts.index')
                       ->with('success','Cart created successfully.');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
        return view('carts.show',compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
        return view('carts.edit',compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //validate user token before authorizing 
        if (!Auth::user()->tokenCan('not:allow')){
            abort(403, 'Unauthorized');
        }
        
        $request->validate([
            'user_name' => 'required',
            'items_quantity' => 'required',
        ]);
    
        $cart->update($request->all());
    
        return redirect()->route('carts.index')
                        ->with('success','Cart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //validate user token before authorizing 
        if (!Auth::user()->tokenCan('not:allow')){
            abort(403, 'Unauthorized');
        }
        $cart->delete();
    
        return redirect()->route('carts.index')
                        ->with('success','Cart deleted successfully');
    }
}
