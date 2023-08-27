<?php

namespace App\Http\Controllers\ProfitLossCreate;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\CreateSale\CreateSale;
use App\Models\CreateExpense\CreateExpense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfitLossController extends Controller
{
    function listSale($created_by, $type)
    {

        if ($type == 'restaurant') {
            $data['all_sale'] = CreateSale::where('created_by', $created_by)->where('sale_type', $type)->join('product_categories', 'product_categories.product_category_id', '=', 'create_sale.create_sale_category')->select('create_sale.sale_type', 'create_sale.create_sale_id', 'create_sale.create_sale_date', 'create_sale.create_sale_amount', 'product_categories.product_category_name')->get();
        } else {
            $data['all_sale'] = CreateSale::where('created_by', $created_by)->where('sale_type', $type)->join('products', 'products.product_id', '=', 'create_sale.create_sale_product')->select('create_sale.sale_type', 'create_sale.create_sale_id', 'create_sale.create_sale_date', 'create_sale.create_sale_amount', 'products.product_name')->get();
        }



        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['all_sale']], 200);
        } else {

            return view('pages.products.list_products', $data);
        }
    }
    function createSale(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'create_sale_category' => 'required',
            'create_sale_date' => 'required',
            'create_sale_amount' => 'required',
            'sale_type' => 'required',
            'created_by' => 'required',
        ]);



        if ($validator->fails()) {

            return response()->json([
                'message' => 'Invalid params passed',
                'success' => true, // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        } else {

            $datetimeString = $request->create_sale_date;
            $dateTime = Carbon::parse($datetimeString);
            $createSaleTime = $dateTime->format('Y-m-d');


            $createSale = new CreateSale();

            if ($request->sale_type == 'restaurant') {
                $createSale->create_sale_category = $request->create_sale_category;
                $createSale->sale_type = 'restaurant';
            } else {
                $createSale->sale_type = 'food_court';
                $createSale->create_sale_product = $request->create_sale_product;
            }

            $createSale->create_sale_date = $createSaleTime;
            $createSale->create_sale_amount = $request->create_sale_amount;
            $createSale->created_by = $request->created_by;

            $createSale->save();


            $createSum =  CreateSale::where('created_by', $request->created_by)->where('create_sale_date', $createSaleTime)->where('sale_type', $request->sale_type)->sum('create_sale_amount');




            if (DB::table('create_profit_loss')->where('created_by', $request->created_by)->where('sale_date', $createSaleTime)->where('sale_type', $request->sale_type)->exists()) {

                DB::table('create_profit_loss')->where('created_by', $request->created_by)->where('sale_date', $createSaleTime)->where('sale_type', $request->sale_type)->update([
                    'sale_amount' => $createSum,
                ]);
                $differen =  DB::table('create_profit_loss')->where('created_by', $request->created_by)->where('sale_date', $createSaleTime)->where('sale_type', $request->sale_type)->select(DB::raw('SUM(sale_amount - expense_amount) as due_amount'))->first();
                DB::table('create_profit_loss')->where('created_by', $request->created_by)->where('sale_date', $createSaleTime)->where('sale_type', $request->sale_type)->update([
                    'total_profit_loss' => $differen->due_amount
                ]);
            } else {
                DB::table('create_profit_loss')->insert([
                    'sale_amount' => $createSum,
                    'sale_date' => $createSaleTime,
                    'sale_type' => $request->sale_type,
                    'created_by' => $request->created_by
                ]);
            }


            $differen =  DB::table('create_profit_loss')->where('created_by', $request->created_by)->where('sale_date', $createSaleTime)->where('sale_type', $request->sale_type)->select(DB::raw('SUM(sale_amount - expense_amount) as due_amount'))->first();
            DB::table('create_profit_loss')->where('created_by', $request->created_by)->where('sale_date', $createSaleTime)->where('sale_type', $request->sale_type)->update([
                'total_profit_loss' => $differen->due_amount
            ]);


            $data = new CommonResource($createSale);

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
        }
    }


    function listExpense($created_by)
    {
        $data['all_expense'] = CreateExpense::where('created_by', $created_by)->latest()->get();


        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['all_expense']], 200);
        } else {

            return view('pages.products.list_products', $data);
        }
    }


    function createExpense(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'create_expense_date' => 'required',
            'create_expense_amount' => 'required'
        ]);



        if ($validator->fails()) {

            return response()->json([
                'message' => 'Invalid params passed',
                'success' => true, // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        } else {


            $datetimeString = $request->create_expense_date;
            $dateTime = Carbon::parse($datetimeString);
            $createExpenseDate = $dateTime->format('Y-m-d');


            $createExpense = new CreateExpense();
            $createExpense->create_expense_date = $createExpenseDate;
            $createExpense->create_expense_amount = $request->create_expense_amount;
            $createExpense->created_by = $request->created_by;
            if ($request->expense_type == 'restaurant') {
                $createExpense->expense_type = 'restaurant';
            } else {
                $createExpense->expense_type = 'food_court';
            }
            $createExpense->save();


            $createSum =  CreateExpense::where('created_by', $request->created_by)->where('create_expense_date', $createExpenseDate)->where('expense_type', $request->expense_type)->sum('create_expense_amount');

            if (DB::table('create_profit_loss')->where('created_by', $request->created_by)->where('sale_date', $createExpenseDate)->where('sale_type', $request->expense_type)->exists()) {



                DB::table('create_profit_loss')->where('created_by', $request->created_by)->where('sale_date', $createExpenseDate)->where('sale_type', $request->expense_type)->update([
                    'expense_amount' => $createSum,
                ]);

                $differen =  DB::table('create_profit_loss')
                    ->where('created_by', $request->created_by)
                    ->where('sale_date', $createExpenseDate)
                    ->where('sale_type', $request->expense_type)
                    ->select(DB::raw('SUM(sale_amount - expense_amount) as due_amount'))->first();
                DB::table('create_profit_loss')->where('created_by', $request->created_by)->where('sale_date', $createExpenseDate)->where('sale_type', $request->expense_type)->update([
                    'total_profit_loss' => $differen->due_amount
                ]);
            } else {
                DB::table('create_profit_loss')->insert([
                    'expense_amount' => $createSum,
                    'sale_date' => $createExpenseDate,
                    'sale_type' => $request->expense_type,
                    'created_by' => $request->created_by
                ]);
            }

            $differen =  DB::table('create_profit_loss')
                ->where('created_by', $request->created_by)
                ->where('sale_date', $createExpenseDate)
                ->where('sale_type', $request->expense_type)
                ->select(DB::raw('SUM(sale_amount - expense_amount) as due_amount'))->first();

            DB::table('create_profit_loss')->where('created_by', $request->created_by)->where('sale_date', $createExpenseDate)->where('sale_type', $request->expense_type)->update([
                'total_profit_loss' => $differen->due_amount
            ]);



            $data = new CommonResource($createExpense);

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
        }
    }


    function profitLoss($sale_type, $created_by)
    {
        $data['all_profit_loss'] = DB::table('create_profit_loss')->where('created_by', $created_by)->where('sale_type', $sale_type)->select('create_profit_loss_id', 'sale_date', 'sale_amount', 'expense_amount', 'total_profit_loss')->get();


        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['all_profit_loss']], 200);
        } else {

            return view('pages.products.list_products', $data);
        }
    }
}
