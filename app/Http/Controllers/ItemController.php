<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(config('settings.rows'));
        return $items;
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255|unique:items',
            'cost_price'    => 'required|numeric',
            'market_price'  => 'required|numeric',
            'discount'      => 'required|numeric',
            'sell_price'    => 'required|numeric',
            'quantity'      => 'required|numeric',
        ]);

        $item = Item::create($request->all());
        return $item->id;
    }
    public function storeImages(Request $request,$id)
    {
        if($request->file('file'))
        {
          $image = $request->file('file');
          $name = time().$image->getClientOriginalName();
          $image->move(public_path().'/images/', $name); 
        }

       $image= new Item();
       $image->images = $name;
       $image->save();

       return response()->json(['success' => 'You have successfully uploaded an image'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemDetail = Item::find($id);
        return $itemDetail;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
