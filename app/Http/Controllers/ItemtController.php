<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ItemtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =  Item::where('user_id', Auth::user()->id)
        ->orderBy('id', 'DESC')
        ->get();
        return view('items.index', ['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('items.create');
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
            'product_id' => 'required',
           'product_name' => 'required',
           'description' => 'required',
       ]);
       Item::create([
        'user_id' => Auth::user()->id,
        'product_id' => $request->product_id,
        'product_name' => $request->product_name,
        'description' => $request->description
    ]);
       
       return redirect()->route('products.index')
                       ->with('success','Product added successfully to cart.');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $product)
    {
        //
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //validate user token before authorizing 
        if (!Auth::user()->tokenCan('not:allow')){
            abort(403, 'Unauthorized');
        }
        
        $request->validate([
            'user_name' => 'required',
            'items_quantity' => 'required',
        ]);
    
        $item->update($request->all());
    
        return redirect()->route('carts.index')
                        ->with('success','Cart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //validate user token before authorizing 
        if (!Auth::user()->tokenCan('not:allow')){
            abort(403, 'Unauthorized');
        }
        $item->delete();
    
        return redirect()->route('items.index')
                        ->with('success','Item removed successfully');
    }
}
