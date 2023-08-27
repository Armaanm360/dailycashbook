<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Table\RestaurantTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table_list'] = RestaurantTable::where('restaurant_table_status', 1)->where('restaurant_table_created_by', Auth::user()->unique_user_id)->get();


        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['table_list']], 200);
        } else {

            return view('pages.table.list_table', $data);
        }
    }
    public function allTableUserWise($created_by)
    {
        $data['table_list'] = RestaurantTable::where('restaurant_table_status', 1)->where('restaurant_table_created_by', $created_by)->get();
        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['table_list']], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.table.create_table');
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
            'restaurant_table_name' => 'required',
        ]);


        $rest_table = new RestaurantTable();
        $rest_table->restaurant_table_name = $request->restaurant_table_name;
        $rest_table->restaurant_table_entry_id = $request->restaurant_table_entry_id;
        $rest_table->restaurant_table_description = $request->restaurant_table_description;
        if (isAPIRequest()) {
            $rest_table->restaurant_table_created_by = $request->restaurant_table_created_by;
        } else {
            $rest_table->restaurant_table_created_by =  Auth::user()->unique_user_id;
        }

        $rest_table->restaurant_table_create_date = date("Y-m-d");
        $rest_table->save();

        $data = new CommonResource($rest_table);

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
        $data['data'] = RestaurantTable::where('restaurant_table_id', $id)->first();
        return view('pages.table.edit_table', $data);
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

        // RestaurantTable::where('restaurant_table_id', $request->restaurant_table_id)->update([
        //     'restaurant_table_name' => $request->restaurant_table_name,
        //     'restaurant_table_entry_id' => $request->restaurant_table_entry_id,
        //     'restaurant_table_description' => $request->restaurant_table_description,
        //     'updated_at' => date("Y-m-d"),
        // ]);



        $item = RestaurantTable::findOrFail($id);

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

        $item = RestaurantTable::find($id);
        $item->restaurant_table_deleted_by = "YES";
        $item->restaurant_table_deleted_by = 0;
        $item->save();
        $data = new CommonResource($item);
        return response()->json(['success' => true, 'message' => 'Successfully Deleted', 'data' => $data], 200);
    }
}
