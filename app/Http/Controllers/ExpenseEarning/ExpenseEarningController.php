<?php

namespace App\Http\Controllers\ExpenseEarning;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\ExpenseEarning\ExpenseEarning;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenseEarningController extends Controller
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
            'created_by' => 'required',
            'date' => 'required',
            'type' => 'required',
            'ex_ear_type' => 'required',
        ]);




        if ($validator->fails()) {

            return response()->json([
                'message' => 'Invalid params passed', // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        } else {

            $expense = new ExpenseEarning();
            $expense->created_by = $request->created_by;
            $expense->date = $request->date;
            $expense->category = $request->category;
            $expense->type = $request->type;
            $expense->amount = $request->amount;
            $expense->ex_ear_type = $request->ex_ear_type;
            $expense->account = $request->account;
            $expense->note = $request->note;
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

    function userParamWise($created_by, $type, $ex_ear_type)
    {
        $data['expense_list'] = ExpenseEarning::where('created_by', $created_by)->where('type', $type)->where('ex_ear_type', $ex_ear_type)->get();
        //  $sum = Expense::where('expense_type', $expense_type)->where('expense_created_by', $expense_created_by)->sum('expense_amount');

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['expense_list']], 200);
    }


    function dateWise($created_by, $ex_ear_type)
    {
        $data['expense'] = ExpenseEarning::where('created_by', $created_by)->where('ex_ear_type', $ex_ear_type)->where('type', 'EXPENSE')->get();
        $data['earning'] = ExpenseEarning::where('created_by', $created_by)->where('ex_ear_type', $ex_ear_type)->where('type', 'EARN')->get();
        $total_expense = ExpenseEarning::where('created_by', $created_by)->where('ex_ear_type', $ex_ear_type)->where('type', 'EXPENSE')->sum('amount');
        $total_earning = ExpenseEarning::where('created_by', $created_by)->where('ex_ear_type', $ex_ear_type)->where('type', 'Earn')->sum('amount');
        $overall = $total_earning - $total_expense;
        //  $sum = Expense::where('expense_type', $expense_type)->where('expense_created_by', $expense_created_by)->sum('expense_amount');
        return response()->json([
            'success' => true,
            'message' => 'Successfully Done',
            'data'    => $data['expense'],
            'earning'    => $data['earning'],
            'total_expense'    => $total_expense,
            'total_earning'    => $total_earning,
            'overall'    => $overall,
        ], 200);
    }


    function getdateWise(Request $request)
    {

        $startDate = $request->start_date;
        $endDate = $request->end_date;




        // Filter data based on the selected date range
        $query = ExpenseEarning::whereBetween('date', [$startDate, $endDate])->where('ex_ear_type', $request->ex_ear_type)->where('created_by', $request->created_by);

        $datewise_expense = ExpenseEarning::whereBetween('date', [$startDate, $endDate])->where('ex_ear_type', $request->ex_ear_type)->where('created_by', $request->created_by)->where('type', 'EXPENSE')->sum('amount');
        $datewise_earn = ExpenseEarning::whereBetween('date', [$startDate, $endDate])->where('ex_ear_type', $request->ex_ear_type)->where('created_by', $request->created_by)->where('type', 'EARN')->sum('amount');
        $datewise_overall = $datewise_earn - $datewise_expense;


        //monthly
        $monthly_data = ExpenseEarning::where('date', '>', Carbon::now()->subDays(30)->format("Y-m-d"))->where('ex_ear_type', $request->ex_ear_type)->where('created_by', $request->created_by)->get();
        $total_monthly_expense =
            ExpenseEarning::where('date', '>', Carbon::now()->subDays(30)->format("Y-m-d"))->where('ex_ear_type', $request->ex_ear_type)->where('created_by', $request->created_by)->where('type', 'EXPENSE')->sum('amount');
        $total_monthly_earn =
            ExpenseEarning::where('date', '>', Carbon::now()->subDays(30)->format("Y-m-d"))->where('ex_ear_type', $request->ex_ear_type)->where('created_by', $request->created_by)->where('type', 'EARN')->sum('amount');
        $monthly_overall = $total_monthly_earn - $total_monthly_expense;
        //

        //daily
        $daily_data = ExpenseEarning::where('date', Carbon::now()->format("Y-m-d"))->where('ex_ear_type', $request->ex_ear_type)->where('created_by', $request->created_by)->get();
        $daily_expense =
            ExpenseEarning::where('date', Carbon::now()->format("Y-m-d"))->where('ex_ear_type', $request->ex_ear_type)->where('created_by', $request->created_by)->where('type', 'EXPENSE')->sum('amount');
        $daily_earn =
            ExpenseEarning::where('date', Carbon::now()->format("Y-m-d"))->where('ex_ear_type', $request->ex_ear_type)->where('created_by', $request->created_by)->where('type', 'EARN')->sum('amount');
        $daily_overall = $daily_earn - $daily_expense;
        //



        $total_data = ExpenseEarning::where('ex_ear_type', $request->ex_ear_type)->where('created_by', $request->created_by)->get();
        $total_expense =
            ExpenseEarning::where('ex_ear_type', $request->ex_ear_type)
            ->where('created_by', $request->created_by)
            ->where('type', 'EXPENSE')
            ->sum('amount');
        $total_earning =
            ExpenseEarning::where('ex_ear_type', $request->ex_ear_type)
            ->where('created_by', $request->created_by)
            ->where('type', 'EARN')
            ->sum('amount');
        $overall = $total_earning - $total_expense;





        $startweek = Carbon::now()->subWeek()->format("Y-m-d");
        $endweek   = Carbon::now()->format("Y-m-d");

        // echo '<pre>';
        // echo Carbon::now()->subDays(30)->format("Y-m-d");
        // die;



        $queryWeek_sum_expense = ExpenseEarning::whereBetween('date', [$startweek, $endweek])
            ->where('ex_ear_type', $request->ex_ear_type)
            ->where('created_by', $request->created_by)
            ->where('type', 'EXPENSE')
            ->sum('amount');


        $queryWeek_sum_earn = ExpenseEarning::whereBetween('date', [$startweek, $endweek])
            ->where('ex_ear_type', $request->ex_ear_type)
            ->where('created_by', $request->created_by)
            ->where('type', 'EARN')
            ->sum('amount');


        $queryweek_overall = $queryWeek_sum_earn - $queryWeek_sum_expense;


        $queryWeek = ExpenseEarning::whereBetween('date', [$startweek, $endweek])->where('ex_ear_type', $request->ex_ear_type)->where('created_by', $request->created_by)->get();
        $queryWeek = ExpenseEarning::whereBetween('date', [$startweek, $endweek])->get();
        $filteredData = $query->get();


        // Return the filtered data as a response
        // 2023-06-29
        // 2023-07-06
        return response()->json([
            'success' => true,
            'message' => 'Successfully Done',
            'total_data'             => $total_data,
            'daily_data'   => $daily_data,
            'weekly_data'        => $queryWeek,
            'monthly_data'   => $monthly_data,
            'data'             => $filteredData,
            'datewise_expense' => $datewise_expense,
            'datewise_earn' => $datewise_earn,
            'datewise_overall' => $datewise_overall,
            'total_expense'    => $total_expense,
            'total_earning'    => $total_earning,
            'overall'          => $overall,
            'weekly_expense'   => $queryWeek_sum_expense,
            'weekly_earn'      => $queryWeek_sum_earn,
            'weekly_overall'   => $queryweek_overall,
            'total_monthly_expense'   => $total_monthly_expense,
            'total_monthly_earn'   => $total_monthly_earn,
            'monthly_overall'   => $monthly_overall,
            'daily_expense'   => $daily_expense,
            'daily_earn'   => $daily_earn,
            'daily_overall'   => $daily_overall,

        ], 200);
    }
}
