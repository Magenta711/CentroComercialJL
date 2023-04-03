<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class myProdutsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $productos = Product::where('local_id',$id)->get();
        return view('my.local.product.index',compact('productos','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if(!$this->my_product_validate($id)){
            return redirect('home')->with('success','No tienes acceso a esta página.');
        }
        return view('my.local.product.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        if(!$this->my_product_validate($id)){
            return redirect('home')->with('success','No tienes acceso a esta página.');
        }
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/avatar/products/', $file, $name);
            $request['avatar'] = $name;
        }
        $request['local_id'] = $id;
        $item = Product::create($request->all());
        foreach ($request->item as $key => $value) {
            ProductDetail::create([
                'item' => $value,
                'product_id' => $item->id,
                'description' => $request->description_item[$key],
            ]);
        }

        return redirect()->route('my.local.product',$id)->with('success','Producto creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Product $item)
    {
        if(!$this->my_product_validate($id,$item->local_id)){
            return redirect('home')->with('success','No tienes acceso a esta página.');
        }
        return view('my.local.product.show',compact('id','item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Product $item)
    {
        if(!$this->my_product_validate($id,$item->local_id)){
            return redirect('home')->with('success','No tienes acceso a esta página.');
        }
        return view('my.local.product.edit',compact('id','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,Product $item)
    {
        if(!$this->my_product_validate($id,$item->local_id)){
            return redirect('home')->with('success','No tienes acceso a esta página.');
        }
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/avatar/products/', $file, $name);
            $request['avatar'] = $name;
        }
        $item->update($request->all());
        ProductDetail::where('product_id',$item->id)->delete();
        foreach ($request->item as $key => $value) {
            ProductDetail::create([
                'item' => $value,
                'product_id' => $item->id,
                'description' => $request->description_item[$key],
            ]);
        }
        return redirect()->route('my.local.product',$id)->with('success','Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Product $item)
    {
        if(!$this->my_product_validate($id,$item->local_id)){
            return response()->json([ 'success'=>'No tienes acceso a esta página.']);
        }
        $item->delete();
        return response()->json([ 'success'=>'Producto eliminado' ]);
    }

    public function my_product_validate($id,$item = null)
    {
        $rent = Rent::find($id);
        if (auth()->id() == $rent->user_id && ($item == null || $item == $id)) {
            return true;
        }
        return false;
    }
}
