<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products=product::all();
        // $products=product::select('id','name','price','detils');
         $products=product::latest()->paginate(25);
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $product=product::create($request->all());
        return redirect()->route('product.index')
        ->with('success','product added success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $id)
    {
        $row=product::find($id);
        
        return view('product.show',['product'=>$row]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $row=product::find($id);
        
        return view('product.edit',['product'=>$row]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $id)
    {
       
        $id->update($request->all());
        return redirect()->route('product.index')
        ->with('success','product updata success');
        // return redirect()->route('product.edit',['id'=>$id])
        // ->with('success','product updata success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $id)
    {
        // if($row= product::find($id))
        // {
        //     $row->delete();
        //     return redirect()->route('product.index')
        //     ->with('success','product delete success');
        // }

       $id->delete();
       return redirect()->route('product.index')
        ->with('success','product added success');
    }
}
