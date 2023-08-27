<?php

namespace App\Http\Controllers\Earning;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Earning\Earning;
use App\Models\Expense\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EarningController extends Controller
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
        $validator = Validator::make($request->all(), [
            'earning_name' => 'required',
            'earning_date' => 'required',
        ]);




        if ($validator->fails()) {

            return response()->json([
                'message' => 'Invalid params passed', // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        } else {

            $expense = new Earning();
            $expense->earning_type = $request->earning_type;
            $expense->earning_created_by = $request->earning_created_by;
            $expense->earning_name = $request->earning_name;
            $expense->earning_date = $request->earning_date;
            $expense->earning_category = $request->earning_category;
            $expense->earning_amount = $request->earning_amount;
            $expense->earning_note = $request->earning_note;
            $expense->save();


            $data = new CommonResource($expense);

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
        }
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

    function userParamWise($earning_type, $expense_created_by)
    {
        $data['expense_list'] = Earning::where('earning_type', $earning_type)->where('earning_created_by', $expense_created_by)->get();
        $sum = Earning::where('earning_type', $earning_type)->where('earning_created_by', $expense_created_by)->sum('earning_amount');

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['expense_list'], 'total-earning-amount' => $sum], 200);
    }


    function definedList($type, $created_by)
    {
        $data['expense_list'] = Expense::join('earnings', 'earnings.earning_type', '=', 'expenses.expense_type')
            // ->where('earnings.earning_type', '=', $type)
            // ->where('earnings.earning_created_by', '=', $created_by)
            // ->where('expenses.expense_type', '=', $type)
            // ->where('expenses.expense_created_by', '=', $created_by)
            ->get();
        $sum = Expense::where('expense_type', $type)->where('expense_created_by', $created_by)->sum('expense_amount');

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['expense_list'], 'total-expense-amount' => $sum], 200);
    }
}
