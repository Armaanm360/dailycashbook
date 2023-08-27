<?php

namespace App\Http\Controllers\AttributeValues;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute\Attribute;
use App\Models\Attribute\AttributeValue;
use Illuminate\Support\Facades\Auth;

class AttributeValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $data['attributesList'] = Attribute::all();
        return view('pages.attributes_value.create_attributes_values',$data);
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
            'attribute_value_name' => 'required',
        ]);



        $color = new AttributeValue();
        $color->attributes_id = $request->attribute_id;
        $color->attributes_value = $request->attribute_value_name;
        // $color->attributes_value_entry_id = $request->attributes_entry_id;
        $color->attributes_value_created_by =  Auth::user()->id;
        $color->created_at = date("Y-m-d");
        $color->save();
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