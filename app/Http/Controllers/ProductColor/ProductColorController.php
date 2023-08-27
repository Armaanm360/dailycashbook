<?php

namespace App\Http\Controllers\ProductColor;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use Illuminate\Http\Request;
use App\Models\ProductColor\ProductColor;
use Illuminate\Support\Facades\Auth;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $data['colorList'] = ProductColor::all();
        $data['colorList'] = ProductColor::where('product_colors_is_deleted','NO')->get();


        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['colorList']], 200);
        } else {

            return view('pages.product_color.list_product_color', $data);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.product_color.create_product_color');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_colors_name' => 'required',
        ]);


        $color = new ProductColor();
        $color->product_colors_name = $request->product_colors_name;
        $color->product_colors_entry_id = $request->product_colors_entry_id;
        if (isAPIRequest()) {
            $color->product_colors_created_by =  $request->created_by;
        } else {
            $color->product_colors_created_by =  Auth::user()->id;
        }

        $color->save();

        $data = new CommonResource($color);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
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
         $data['data'] = ProductColor::where('product_colors_id',$id)->first();
        return view('pages.product_color.edit_product_color',$data);
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
        //     ProductColor::where('product_colors_id',$request->product_colors_id)->update([
        //     'product_colors_name' => $request->product_colors_name,
        //     'product_colors_entry_id' => $request->product_colors_entry_id,
        //     'product_colors_updated_by' => Auth::user()->id,
        //     'updated_at' => date("Y/m/d"),
        // ]);

        $item = ProductColor::findOrFail($id);

        $item->update($request->all());

        $data = new CommonResource($item);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $item = ProductColor::find($id);
        $item->product_colors_is_deleted = "YES";
        $item->save();
        $data = new CommonResource($item);
        return response()->json(['success' => true, 'message' => 'Successfully Deleted', 'data' => $data], 200);
    }
}