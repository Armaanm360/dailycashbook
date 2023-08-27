<?php

namespace App\Http\Controllers\ExpenseSubHead;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Http\Resources\ExpenseSubHeadResource;
use App\Models\ExpenseSubhead\ExpenseSubHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExpenseSubHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['head'] = CommonResource::collection(ExpenseSubHead::whereStatus(1)->get());

        if (isAPIRequest()) {

            return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data['head']], 200);
        } else {

            return view('pages.expensehead.list_expense_head', $data);
        }




        // $data['head'] = ExpenseHead::where('status',1)->get();
        // return view('pages.expensehead.list_expense_head',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.expensesubhead.create_expense_sub_head');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $data = [
        //     'title' => 'required|string|max:255',
        //     'created_by' => 'required|integer',
        // ];

        // $is_api_request = $request->route()->getPrefix() === 'api';
        // if ($is_api_request) {
        //     //data get
        //     $data = [
        //         'title' => 'required|string|max:255',
        //         'expense_head_id' => 'required|integer',
        //         'created_by' => 'required|integer',
        //     ];

        //     $validator = Validator::make($request->all(), $data);

        //     if ($validator->fails()) {
        //         return ['errors' => $validator->errors()->first()];
        //     } else {

        //         $validated = $validator->validated();
        //         $validated['status'] = '1';
        //         $statement = ExpenseSubHead::create($validated);
        //         return new ExpenseSubHeadResource($statement);
        //     }
        // } else {
        //     $data = [
        //         'title' => 'required|string|max:255',
        //         'expense_head_id' => 'required|integer'
        //     ];

        //     $validator = Validator::make($request->all(), $data);

        //     if ($validator->fails()) {
        //         return ['errors' => $validator->errors()->first()];
        //     } else {

        //         $validated = $validator->validated();
        //         $validated['created_by'] = Auth::user()->id;
        //         $validated['status'] = '1';
        //         $statement = ExpenseSubHead::create($validated);
        //         return ['status' => 'okay'];
        //     }
        // }



        $item = ExpenseSubHead::create($request->all());

        $data = new CommonResource($item);

        return response()->json(['success' => true, 'message' => 'Successfully Created', 'data' => $data], 200);
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
        $data['head'] = ExpenseSubHead::where('expense_sub_head_id', $id)->first();
        return view('pages.expensesubhead.edit_expense_sub_head', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        // $is_api_request = $request->route()->getPrefix() === 'api';
        // if ($is_api_request) {
        //     //data get
        //     $data = [
        //         'title' => 'required|string|max:255',
        //         'created_by' => 'required|integer',
        //     ];

        //     $validator = Validator::make($request->all(), $data);

        //     if ($validator->fails()) {
        //         return ['errors' => $validator->errors()->first()];
        //     } else {

        //         $validated = $validator->validated();
        //         $validated['status'] = '1';
        //         $expense_head->update($validated);



        //         //$statement = ExpenseHead::create($validated);
        //         return new ExpenseSubHeadResource($expense_head);
        //     }
        // } else {
        //     $head = ExpenseSubHead::where('expensehead_id', $request->expense_head_id)->update([
        //         'title' => $request->expense_head_name,
        //         'updated_by' => Auth::user()->id
        //     ]);
        // }


        $item = ExpenseSubHead::findOrFail($id);

        $item->update($request->all());

        $data = new CommonResource($item);

        return response()->json(['success' => true, 'message' => 'Successfully Updated', 'data' => $data], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense_head = ExpenseSubHead::find($id);
        $expense_head->status = 0;
        $expense_head->save();

        $item = ExpenseSubHead::find($id);
        $item->status = 0;
        $item->save();
        $data = new CommonResource($item);
        return response()->json(['success' => true, 'message' => 'Successfully Deleted', 'data' => $data], 200);
    }
}