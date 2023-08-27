<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Accounts\Accounts;
use App\Models\AccountTransaction\AccountTransaction;
use App\Models\Branch\Branch;
use App\Models\ClientLedger\ClientLedger;
use App\Models\ClientTransaction\ClientTransaction;
use App\Models\DeliveryMan\DeliveryMan;
use App\Models\DeliveryVehicle\DeliveryVehicle;
use App\Models\Invoice\InvoicePosSale;
use App\Models\PosSaleProducts\PosSaleProduct;
use App\Models\ProductCategory\ProductCategory;
use App\Models\Staff\Staff;
use App\Models\Table\RestaurantTable;
use App\Models\Transfer\WarehouseToBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
// use App\Models\Staff\Staff;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $data['invoice'] = InvoicePosSale::where('invoice_has_deleted', 'NO')->join('staff', 'staff.staff_id', '=', 'invoice_pos_sales.staff_id')->join('clients', 'clients.client_id', '=', 'invoice_pos_sales.client_id')->latest('invoice_pos_sales.sale_id')->get();


        // echo '<pre>';
        // print_r($data['invoice']);die;

        if (isAPIRequest()) {
            return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data['invoice']], 200);
        } else {
            return view('pages.invoice.list_invoice', $data);
        }
    }

    public function today_invoices()
    {
        $today = date("Y-m-d");
        $data['invoice'] = InvoicePosSale::where('invoice_created_by', Auth::user()->unique_user_id)->join('staff', 'staff.staff_id', '=', 'invoice_pos_sales.staff_id')->join('clients', 'clients.client_id', '=', 'invoice_pos_sales.client_id')->where('invoice_pos_sales.sales_date', $today)->latest('invoice_pos_sales.sale_id')->get();

        if (isAPIRequest()) {
            return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data['invoice']], 200);
        } else {
            return view('pages.invoice.today_list_invoice', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['accounts'] = Accounts::whereAccountHasDeleted('NO')->get();
        $data['delivery'] = DeliveryMan::all();
        $data['branch'] = Branch::all();
        $data['staff'] = Staff::whereStaffIsDeleted("NO")->get();
        $data['clients'] = \App\Models\Client\Client::whereClientIsDeleted("NO")->orderBy('client_id', 'desc')->get();
        // $data['product_cat'] =
        //     WarehouseToBranch::where('branch_id', Auth::user()->branch_id)->join('warehouse_to_branch_items', 'warehouse_to_branch_items.warehouse_to_branch_transfer_number', '=', 'warehouse_to_branches.warehouse_to_branch_transfer_number')->join('products', 'products.product_id', '=', 'warehouse_to_branch_items.transfer_product_id')->join('product_categories', 'product_categories.product_category_id', '=', 'products.product_category')->where('product_categories.product_category_is_deleted', '=', 'NO')->groupBy('products.product_category')->get();
        $data['product_cat'] = ProductCategory::where('product_category_is_deleted', '=', 'NO')->groupBy('product_categories.product_category_name')->get();


        //    echo '<pre>';
        //    print_r($data['product_cat']);die;


        // $data['product'] = WarehouseToBranch::join('warehouse_to_branch_items', 'warehouse_to_branch_items.warehouse_to_branch_transfer_number', '=', 'warehouse_to_branches.warehouse_to_branch_transfer_number')->join('products', 'products.product_id', '=', 'warehouse_to_branch_items.transfer_product_id')->groupBy('products.')->get();

        $data['table'] = RestaurantTable::all();
        return view('pages.invoice.create_invoice', $data);
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
        //     'expense_head_id' => 'required|integer',
        //     'expense_sub_head_id' => 'required|integer',
        //     'expense_account' => 'required|integer',
        //     'expense_amount'  => 'required|integer'
        // ];

        // $validator = Validator::make($request->all(),$data);
        // return $request->invoice_no;die;


        $invoice_sale = new InvoicePosSale();

        if (isAPIRequest()) {
            $invoice_sale->client_id = 25;
        } else {
            $invoice_sale->client_id = $request->hidden_client_id;
        }

        $invoice_sale->customer_type = $request->customer_type;
        $invoice_sale->invoice_no = $request->invoice_no;

        if (isAPIRequest()) {
            $invoice_sale->branch_id = $request->branch_id;
            $invoice_sale->sales_form = $request->sales_form;
            $invoice_sale->staff_id = 2;
            $invoice_sale->invoice_created_by = $request->invoice_created_by;
        } else {

            $invoice_sale->branch_id = Auth::user()->id;
            $invoice_sale->sales_form = Auth::user()->id;
            $invoice_sale->staff_id =  $request->hidden_staff_id;
            $invoice_sale->invoice_created_by = Auth::user()->unique_user_id;
        }




        $invoice_sale->restaurant_table_id = $request->rest_table_get;
        $invoice_sale->invoice_date = date('Y-m-d');
        $invoice_sale->sales_date = date('Y-m-d');
        $invoice_sale->subTotal = $request->invoice_subtotal;
        $invoice_sale->product_discount = $request->product_discount;
        $invoice_sale->vat_rate = 7.50;
        $invoice_sale->vat_amount = $request->vat_amount;
        $invoice_sale->overall_discount = $request->overall_discount;
        $invoice_sale->grand_total = $request->grand_total;
        $invoice_sale->payment_type = $request->payment_type;
        $invoice_sale->account = $request->account;
        $invoice_sale->total_paying = $request->paid_amount;
        $invoice_sale->change = $request->changed_amount;
        $invoice_sale->invoice_create_date = date('Y-m-d');


        $invoice_sale->save();

        //InvoicePosSale::where('sale_id',$invoice_sale->sale_id)->update(['invoice_no', $invoice_sale->sale_id]);


        $sale_id = $invoice_sale->sale_id;
        foreach ($request->billing_rows as $rowBilling) {

            $productID = 'product_' . $rowBilling;
            $quantity  = 'item_qty_' . $rowBilling;
            $price  = 'item_unit_price_' . $rowBilling;
            $with_discount  = 'total_price_quantity_' . $rowBilling;
            $discount  = 'item_discount_' . $rowBilling;


            $saleProduct = new PosSaleProduct();
            $saleProduct['pos_sale_id'] = $sale_id;
            $saleProduct['product_id'] = $request->$productID;
            $saleProduct['quantity'] = $request->$quantity;
            $saleProduct['price'] = $request->$price;
            $saleProduct['sub_total'] = $request->$with_discount;
            $saleProduct['discount_amount'] = $request->$discount;
            $saleProduct['sales_date'] = date('Y-m-d');
            $saleProduct['create_date'] = date('Y-m-d');
            if (isAPIRequest()) {
                $saleProduct['created_by'] = $request->invoice_created_by;
            } else {
                $saleProduct['created_by'] = Auth::user()->id;
            }

            $saleProduct->save();

            $prod =   DB::table('food_ingredients')->where('created_food_id', $request->$productID)->get();

            foreach ($prod as $prod) {
                DB::table('used_quantity')->insert([
                    'ingrident_id' => $prod->ingred_id,
                    'used_quantity' => ($prod->ingredients_quantity * $request->$quantity)
                ]);
            }
        }




        // $difference = DB::table('purchase_items')
        //     ->leftJoin('used_quantity', 'purchase_items.purchase_product_id', '=', 'used_quantity.ingrident_id')
        //     ->select('purchase_items.purchase_product_id', DB::raw('SUM(used_quantity.used_quantity) - purchase_items.purchase_product_quantity	 as difference'))
        //     ->groupBy('purchase_items.purchase_product_id')
        //     ->get();





        // foreach ($difference as $record) {
        //     $ingId = $record->ingred_id;
        //     $differenceValue = $record->difference;
        //     // Do something with the ing_id and differenceValue
        // }







        $paid_amount = $request->paid_amount;
        $changed_amount = $request->changed_amount;

        if ($paid_amount > 0) {
            $client_transaction = new ClientTransaction();
            $client_transaction->client_transaction_type = "CREDIT";
            $client_transaction->client_transaction_client_id = $request->hidden_client_id;
            $client_transaction->client_transaction_invoice_id = $sale_id;
            $client_transaction->client_transaction_amount = $request->paid_amount;
            $client_transaction->client_transaction_last_balance = get_client_current_balance_by_client_id($request->hidden_client_id);
            $client_transaction->client_transaction_date = date("Y-m-d");
            $client_transaction->save();
            $client_tansaction_id = $client_transaction->client_transaction_id;
            $update_client_transection = ClientTransaction::find($client_tansaction_id)->update([
                'client_transaction_last_balance' => get_client_current_balance_by_client_id($request->hidden_client_id)
            ]);
        }

        if ($changed_amount <  1) {
            $client_transaction = new ClientTransaction();
            $client_transaction->client_transaction_type = "DEBIT";
            $client_transaction->client_transaction_client_id = $request->hidden_client_id;
            $client_transaction->client_transaction_invoice_id = $sale_id;
            $client_transaction->client_transaction_amount = $request->grand_total;
            $client_transaction->client_transaction_last_balance = get_client_current_balance_by_client_id($request->hidden_client_id);
            $client_transaction->client_transaction_date = date("Y-m-d");
            $client_transaction->save();
            $client_tansaction_id = $client_transaction->client_transaction_id;



            $update_client_transection = ClientTransaction::find($client_tansaction_id)->update([
                'client_transaction_last_balance' => get_client_current_balance_by_client_id($request->hidden_client_id)
            ]);
        }
        $client_transaction = $client_transaction->client_transaction_id;

        $transaction['transaction_type'] = 'CREDIT';
        $transaction['transaction_account_id'] = $request->account;
        $transaction['transaction_amount'] = $request->grand_total;
        $transaction['transaction_client_id'] = $request->hidden_client_id;
        $transaction['client_transaction_id'] = $client_transaction;
        $transaction['sale_id'] = $sale_id;
        $transaction['transaction_note'] = 'INVOICE_SELL';
        $transaction['transaction_date'] = date('Y-m-d');
        $transaction['transaction_method'] = $request->payment_type;
        $transaction['transaction_for'] = 'INVOICE_SELL';
        $transactionStatement = AccountTransaction::create($transaction);
        $account_current_balance = get_acoount_current_balance_by_account_id($request->account);



        $update_client_transection = AccountTransaction::find($transactionStatement->transaction_id)->update([
            'transaction_last_balance' => $account_current_balance
        ]);

        $client_ledger = new ClientLedger();
        $client_ledger->client_id = $request->hidden_client_id;
        $client_ledger->client_transaction_id = $client_transaction;
        $client_ledger->client_ledger_invoice_id = $request->sale_id;
        $client_ledger->client_ledger_type = 'SALE';
        $client_ledger->client_ledger_status = true;
        $client_ledger->client_ledger_last_balance = get_client_current_balance_by_client_id($request->hidden_client_id);
        $client_ledger->client_ledger_date = date("Y-m-d");
        $client_ledger->client_ledger_create_date = date("Y-m-d");
        $client_ledger->client_ledger_dr = $request->invoice_net_total;
        if (isAPIRequest()) {
            $client_ledger->client_ledger_prepared_by = $request->invoice_created_by;
        } else {
            $client_ledger->client_ledger_prepared_by = Auth::user()->id;
        }


        $client_ledger->save();

        $data = new CommonResource($invoice_sale);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data, 'sale_id' => $data->sale_id], 200);

        // return response()->json([
        //     'sale_id' => $invoice_sale->sale_id
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        // $difference = DB::table('purchase_items')
        //     ->leftJoin('used_quantity', 'purchase_items.purchase_product_id', '=', 'used_quantity.ingrident_id')
        //     ->select('purchase_items.purchase_product_id', DB::raw('(used_quantity.used_quantity) - purchase_items.purchase_product_quantity as difference'))
        //     ->get();


        // $difference = DB::table('purchased_table')
        //     ->leftJoin('used_table', 'purchased_table.ing_id', '=', 'used_table.ing_used_id')
        //     ->select('purchased_table.ing_id', DB::raw('SUM(used_table.ing_used_quantity) - purchased_table.quantity as difference'))
        //     ->groupBy('purchased_table.ing_id')
        //     ->get();


        $data['pos'] = InvoicePosSale::where('sale_id', $id)
            ->join('pos_sale_products', 'pos_sale_products.pos_sale_id', '=', 'invoice_pos_sales.sale_id')
            ->join('created_food_items', 'created_food_items.food_item_id', '=', 'pos_sale_products.product_id')
            ->get();


        $data['pos_sale'] = InvoicePosSale::where('sale_id', $id)
            //                ->join('restaurant_tables','restaurant_tables.restaurant_table_id','=', 'pos_sale_products.restaurant_table_id')
            ->first();
        $data['pos_chef'] = InvoicePosSale::where('sale_id', $id)->join('pos_sale_products', 'pos_sale_products.pos_sale_id', '=', 'invoice_pos_sales.sale_id')->join('created_food_items', 'created_food_items.food_item_id', '=', 'pos_sale_products.product_id')->get();

        $data['client'] = InvoicePosSale::where('sale_id', $id)->join('clients', 'clients.client_id', '=', 'invoice_pos_sales.client_id')->first();


        // $difference = DB::table('purchased_table')
        //     ->leftJoin('used_table', 'purchased_table.ing_id', '=', 'used_table.ing_used_id')
        //     ->select('purchased_table.ing_id', DB::raw('SUM(used_table.ing_used_quantity) - purchased_table.quantity as difference'))
        //     ->groupBy('purchased_table.ing_id')
        //     ->get();



        if (isAPIRequest()) {

            return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data['pos']], 200);
        } else {

            return view('pages.invoice.show_invoice', $data);
        }
    }

    public function show_chef_invoice($id)
    {
        $data['pos'] = InvoicePosSale::where('sale_id', $id)->join('pos_sale_products', 'pos_sale_products.pos_sale_id', '=', 'invoice_pos_sales.sale_id')->join('products', 'products.product_id', '=', 'pos_sale_products.product_id')->get();


        $data['pos_sale'] = InvoicePosSale::where('sale_id', $id)
            //                ->join('restaurant_tables','restaurant_tables.restaurant_table_id','=', 'pos_sale_products.restaurant_table_id')
            ->first();


        $data['client'] = InvoicePosSale::where('sale_id', $id)->join('clients', 'clients.client_id', '=', 'invoice_pos_sales.client_id')->first();

        // echo '<pre>';
        // print_r($data['pos']);
        // die;

        if (isAPIRequest()) {

            return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data['pos']], 200);
        } else {

            return view('pages.invoice.show_chef_invoice', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['accounts'] = Accounts::whereAccountHasDeleted('NO')->get();
        $data['delivery'] = DeliveryMan::all();
        $data['restaurant_table'] = RestaurantTable::all();
        $data['staff'] = Staff::all();
        $data['table'] = RestaurantTable::all();
        $data['product_cat'] =
            WarehouseToBranch::where('branch_id', Auth::user()->branch_id)->join('warehouse_to_branch_items', 'warehouse_to_branch_items.warehouse_to_branch_transfer_number', '=', 'warehouse_to_branches.warehouse_to_branch_transfer_number')->join('products', 'products.product_id', '=', 'warehouse_to_branch_items.transfer_product_id')->join('product_categories', 'product_categories.product_category_id', '=', 'products.product_category')->where('product_categories.product_category_is_deleted', '=', 'NO')->groupBy('products.product_category')->get();

        // echo '<pre>';
        // print_r($data['product_cat']);die;

        $data['invoice_edit'] = InvoicePosSale::where('sale_id', $id)->join('pos_sale_products', 'pos_sale_products.pos_sale_id', '=', 'invoice_pos_sales.sale_id')->join('products', 'products.product_id', '=', 'pos_sale_products.product_id')->get();

        // echo '<pre>';
        // print_r($data['invoice_edit']);
        // die;
        // $data['accounts'] = Accounts::whereAccountHasDeleted('NO')->get();
        // $data['delivery'] = DeliveryMan::all();
        // $data['branch'] = Branch::all();
        // $data['staff'] = Staff::whereStaffIsDeleted("NO")->get();
        // $data['clients'] = \App\Models\Client\Client::whereClientIsDeleted("NO")->orderBy('client_id', 'desc')->get();
        // $data['product_cat'] =
        // WarehouseToBranch::where('branch_id', Auth::user()->branch_id)->join('warehouse_to_branch_items', 'warehouse_to_branch_items.warehouse_to_branch_transfer_number', '=', 'warehouse_to_branches.warehouse_to_branch_transfer_number')->join('products', 'products.product_id', '=', 'warehouse_to_branch_items.transfer_product_id')->join('product_categories', 'product_categories.product_category_id', '=', 'products.product_category')->where('product_categories.product_category_is_deleted', '=', 'NO')->groupBy('products.product_category')->get();
        // $data['table'] = RestaurantTable::all();
        return view('pages.invoice.edit_invoice', $data);
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

        //  return $request->restaurant_table_id;die;

        PosSaleProduct::where('pos_sale_id', $request->sale_id)->delete();


        InvoicePosSale::where('sale_id', $request->sale_id)->update([
            'client_id' => $request->hidden_client_id,
            'customer_type' => $request->customer_type_hidden,
            'branch_id' => $request->hidden_branch_id,
            'sales_form' => Auth::user()->id,
            'staff_id' => Auth::user()->id,
            'restaurant_table_id' => $request->rest_table_get,
            'invoice_date' =>  date('Y-m-d'),
            'sales_date' =>  date('Y-m-d'),
            'subTotal' =>  $request->invoice_subtotal,
            'vat_rate' =>  7.50,
            'vat_amount' => $request->vat_amount,
            'overall_discount' => $request->overall_discount,
            'grand_total' => $request->grand_total,
            'payment_type' => $request->payment_type,
            'account' => $request->account_id,
            'total_paying' => $request->paid_amount,
            'change' => $request->changed_amount,
            'invoice_create_date' => date('Y-m-d'),

        ]);










        // $sale_id = $invoice_sale->sale_id;

        foreach ($request->billing_rows as $rowBilling) {

            $productID = 'product_' . $rowBilling;
            $quantity  = 'item_qty_' . $rowBilling;
            $price  = 'item_unit_price_' . $rowBilling;
            $with_discount  = 'total_price_quantity_' . $rowBilling;
            $discount  = 'item_discount_' . $rowBilling;


            $saleProduct = new PosSaleProduct();
            $saleProduct['pos_sale_id'] = $request->sale_id;
            $saleProduct['product_id'] = $request->$productID;
            $saleProduct['quantity'] = $request->$quantity;
            $saleProduct['price'] = $request->$price;
            $saleProduct['sub_total'] = $request->$with_discount;
            $saleProduct['discount_amount'] = $request->$discount;
            $saleProduct['sales_date'] = date('Y-m-d');
            $saleProduct['create_date'] = date('Y-m-d');
            $saleProduct['created_by'] = Auth::user()->id;
            $saleProduct->save();
        }






        $paid_amount = $request->paid_amount;
        $changed_amount = $request->changed_amount;

        if ($paid_amount > 0) {
            $client_transaction = new ClientTransaction();
            $client_transaction->client_transaction_type = "CREDIT";
            $client_transaction->client_transaction_client_id = $request->hidden_client_id;
            $client_transaction->client_transaction_invoice_id = $request->sale_id;
            $client_transaction->client_transaction_amount = $request->paid_amount;
            $client_transaction->client_transaction_last_balance = get_client_current_balance_by_client_id($request->hidden_client_id);
            $client_transaction->client_transaction_date = date("Y-m-d");
            $client_transaction->save();
            $client_tansaction_id = $client_transaction->client_transaction_id;
            $update_client_transection = ClientTransaction::find($client_tansaction_id)->update([
                'client_transaction_last_balance' => get_client_current_balance_by_client_id($request->hidden_client_id)
            ]);
        }

        if ($changed_amount <  1) {
            $client_transaction = new ClientTransaction();
            $client_transaction->client_transaction_type = "DEBIT";
            $client_transaction->client_transaction_client_id = $request->hidden_client_id;
            $client_transaction->client_transaction_invoice_id = $request->sale_id;
            $client_transaction->client_transaction_amount = $request->grand_total;
            $client_transaction->client_transaction_last_balance = get_client_current_balance_by_client_id($request->hidden_client_id);
            $client_transaction->client_transaction_date = date("Y-m-d");
            $client_transaction->save();
            $client_tansaction_id = $client_transaction->client_transaction_id;



            $update_client_transection = ClientTransaction::find($client_tansaction_id)->update([
                'client_transaction_last_balance' => get_client_current_balance_by_client_id($request->hidden_client_id)
            ]);
        }
        $client_transaction = $client_transaction->client_transaction_id;

        $transaction['transaction_type'] = 'CREDIT';
        $transaction['transaction_account_id'] = $request->account;
        $transaction['transaction_amount'] = $request->grand_total;
        $transaction['transaction_client_id'] = $request->hidden_client_id;
        $transaction['client_transaction_id'] = $client_transaction;
        $transaction['sale_id'] = $request->sale_id;
        $transaction['transaction_note'] = 'INVOICE_UPDATE';
        $transaction['transaction_date'] = date('Y-m-d');
        $transaction['transaction_method'] = $request->payment_type;
        $transaction['transaction_for'] = 'INVOICE_UPDATE';
        $transactionStatement = AccountTransaction::create($transaction);
        $account_current_balance = get_acoount_current_balance_by_account_id($request->account);



        $update_client_transection = AccountTransaction::find($transactionStatement->transaction_id)->update([
            'transaction_last_balance' => $account_current_balance
        ]);

        $client_ledger = new ClientLedger();
        $client_ledger->client_id = $request->hidden_client_id;
        $client_ledger->client_transaction_id = $client_transaction;
        $client_ledger->client_ledger_invoice_id = $request->sale_id;
        $client_ledger->client_ledger_type = 'SALE';
        $client_ledger->client_ledger_status = true;
        $client_ledger->client_ledger_last_balance = get_client_current_balance_by_client_id($request->hidden_client_id);
        $client_ledger->client_ledger_date = date("Y-m-d");
        $client_ledger->client_ledger_create_date = date("Y-m-d");
        $client_ledger->client_ledger_dr = $request->invoice_net_total;
        $client_ledger->client_ledger_prepared_by = Auth::user()->id;

        $client_ledger->save();



        return response()->json([
            'sale_id' => $request->sale_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = InvoicePosSale::find($id);
        $invoice->invoice_has_deleted = "YES";
        $invoice->save();


        $client = ClientTransaction::where('client_transaction_invoice_id', $id)->update([
            'client_transaction_has_deleted' => "YES"
        ]);

        $account = AccountTransaction::where('sale_id', $id)->update([
            'transaction_has_deleted' => "YES"
        ]);
    }


    public function getDeliveryVehicle($id)
    {
        $man = DeliveryMan::where('delivery_men_id', $id)->get();
        $vehicle = DeliveryVehicle::where('delivery_vehicles_id', $man[0]->delivery_men_vehicle)->get();
        return $vehicle[0]->delivery_vehicles_name;
    }

    public function paymentType($account_type)
    {

        $fromuser = Accounts::whereAccountHasDeleted('NO')->where('account_type', '=', $account_type)->get();

        $output = '';
        $output .= '';
        foreach ($fromuser as $row) {
            $output .= '<option value="' . $row->account_id  . '" selected>' . $row->account_name . '</option>';
        }
        return $output;
    }




    // public function invoiceReturn($sale_id)
    // {

    // }

    public function pos_invoice_create()
    {

        return view('pages.invoice.pos_invoice');
    }


    public function privacyPolicy()
    {
        return view('pages.invoice.privacy-policy');
    }


    public function listOfALLInvoices($invoice_created_by)
    {
        $data['invoice'] = InvoicePosSale::where('invoice_has_deleted', 'NO')->where('invoice_created_by', $invoice_created_by)->latest('invoice_pos_sales.sale_id')->get();
        return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data['invoice']], 200);
    }


    public function today_invoices_api($invoice_created_by)
    {
        $today = date("Y-m-d");
        $data['invoice'] = InvoicePosSale::where('invoice_created_by', $invoice_created_by)->join('staff', 'staff.staff_id', '=', 'invoice_pos_sales.staff_id')->join('clients', 'clients.client_id', '=', 'invoice_pos_sales.client_id')->where('invoice_pos_sales.sales_date', $today)->latest('invoice_pos_sales.sale_id')->get();

        return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $data['invoice']], 200);
    }
}
