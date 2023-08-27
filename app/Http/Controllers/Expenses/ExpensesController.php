<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccountTransactionsResource;
use App\Http\Resources\CommonResource;
use App\Http\Resources\ExpenseResource;
use App\Models\AccountTransaction\AccountTransaction;
use App\Models\Expense\Expense;
use App\Models\ExpenseHead\ExpenseHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'expense_name' => 'required',
            'expense_date' => 'required',
        ]);




        if ($validator->fails()) {

            return response()->json([
                'message' => 'Invalid params passed', // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        } else {

            $expense = new Expense();
            $expense->expense_type = $request->expense_type;
            $expense->expense_created_by = $request->expense_created_by;
            $expense->expense_name = $request->expense_name;
            $expense->expense_date = $request->expense_date;
            $expense->expense_category = $request->expense_category;
            $expense->expense_amount = $request->expense_amount;
            $expense->expense_note = $request->expense_note;
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


    function userParamWise($expense_type, $expense_created_by)
    {
        $data['expense_list'] = Expense::where('expense_type', $expense_type)->where('expense_created_by', $expense_created_by)->get();
        $sum = Expense::where('expense_type', $expense_type)->where('expense_created_by', $expense_created_by)->sum('expense_amount');
        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['expense_list'], 'total-expense-amount' => $sum], 200);
    }

    //list of total expense and earning

}
