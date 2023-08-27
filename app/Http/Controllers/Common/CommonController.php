<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\ExpenseHead\ExpenseHead;
use App\Models\ExpenseSubhead\ExpenseSubHead;
use App\Models\FoodItem;
use App\Models\ProductCategory\ProductCategory;
use App\Models\Transfer\WarehouseToBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function getSubHead($headid)
    {

        $subhead = ExpenseSubHead::where('expense_head_id', $headid)->get();

        $output = '';
        $output .= '';
        foreach ($subhead as $row) {
            $output .= '<option value="' . $row->expense_sub_head_id  . '">' . $row->title . '</option>';
        }
        return $output;
    }
    public function getProductSearch($branchid)
    {

        $transferd = WarehouseToBranch::where('branch_id', $branchid)->join('warehouse_to_branch_items', 'warehouse_to_branch_items.warehouse_to_branch_transfer_number', '=', 'warehouse_to_branches.warehouse_to_branch_transfer_number')->join('products', 'products.product_id', '=', 'warehouse_to_branch_items.transfer_product_id')->get();

        //$subhead = ExpenseSubHead::where('expense_head_id', $headid)->get();

        $output = '';
        $output .= '';
        foreach ($transferd as $row) {
            $output .= '<option value="' . $row->product_id  . '" selected>' . $row->product_name . '</option>';
        }
        return $output;
    }


    function productSearchNew($branch)
    {
        //  $clients = Accounts::where('accounts.account_name','like',"%{$q}%")->join('account_transactions', 'account_transactions.transaction_account_id','=', 'accounts.account_id')->get();
        // $clients = Purchase::where('purchase_warehouse_id', $q)->join('purchase_items', 'purchase_items.purchase_id','=', 'purchases.purchase_id')->join('products', 'products.product_id','=', 'purchase_items.purchase_product_id')->get();


        $transferd = WarehouseToBranch::where('branch_id', $branch)->join('warehouse_to_branch_items', 'warehouse_to_branch_items.warehouse_to_branch_transfer_number', '=', 'warehouse_to_branches.warehouse_to_branch_transfer_number')->join('products', 'products.product_id', '=', 'warehouse_to_branch_items.transfer_product_id')->get();

        // echo '<pre>';
        // print_r($transferd);die;

        $transferd_array = array();
        foreach ($transferd as $transferd) {
            $label = $transferd['product_name'] . '(' . $transferd['transfer_product_id'] . ')';
            $value = intval($transferd['transfer_product_id']);
            $item_id = $transferd['product_id'];
            $items_detail = $transferd['product_name'];
            $items_quantity = getBrnachCurrentStocks($transferd['warehouse_to_branch_transfer_number'], $transferd['product_id'], $branch);
            $items_price = $transferd['product_retail_price'];
            $transferd_array = [
                "label" => $label, "value" => $value,
                'items_detail' => $items_detail,
                'items_quantity' => $items_quantity,
                'items_price' => $items_price,
                'items_id' => $item_id,
                'meow'     => 'meow'
            ];
        }


        // return response()->json([
        //     'hello' => 'hello'
        // ]);

        $result = array('status' => 'ok', 'content' => $transferd_array);
        return response()->json($transferd_array);

        exit;
    }


    public function searchCategoryProduct($product_cat)
    {


        $allCat = ProductCategory::select('product_category_id')->get();
        $productArray =  $allCat->toArray();


        if ($product_cat == 0) {
            $transferd = DB::table('created_food_items')->where('food_item_created_by', Auth::user()->unique_user_id)
                ->get();
        } else {

            // $transferd = WarehouseToBranch::where('branch_id', $branch_id)->join('warehouse_to_branch_items', 'warehouse_to_branch_items.warehouse_to_branch_transfer_number', '=', 'warehouse_to_branches.warehouse_to_branch_transfer_number')
            //     ->join('products', 'products.product_id', '=', 'warehouse_to_branch_items.transfer_product_id')
            //     ->where('products.product_category', $product_cat)
            //     ->get();

            //for web only
            $transferd = DB::table('created_food_items')->where('food_item_created_by', Auth::user()->unique_user_id)
                ->where('created_food_items.foodt_item_category', $product_cat)
                ->get();
        }

        if (isAPIRequest()) {
            return response()->json(['success' => 'true', 'message' => 'Successfully Done', 'data' => $transferd], 200);
        } else {
            $transferd_array = array();
            $output = '';
            $output .= '';
            foreach ($transferd as $transferd) {
                // $label = $transferd['food_item_name'] . '(' . $transferd['food_item_entry_id'] . ')';
                // $value = intval($transferd['food_item_id']);
                $item_id = $transferd->food_item_id;
                $item_image = $transferd->food_item_image;
                $items_detail = $transferd->food_item_name;
                // $items_quantity = getBrnachCurrentStocks(
                //     $transferd['warehouse_to_branch_transfer_number'],
                //     $transferd['product_id'],
                //     $branch_id
                // );
                $items_price = $transferd->food_item_retail_price;
                // $transferd_array[] = array(
                //     "label" => $label, "value" => $value,
                //     'items_detail' => $items_detail,
                //     'items_quantity' => $items_quantity,
                //     'items_price' => $items_price,
                //     'items_id' => $item_id,
                //     'meow'     => 'meow'
                // );
                $urlget = url('/') . '/' . 'public/uploads/products/';




                $output .= '<div class="col-lg-3 col-md-4 col-sm-12 fulldiv"><a href="#" class="meow" 
                                                        item_id="' . $item_id . '"
                                                        item_name="' . $items_detail . '"
                                                        item_image="' . $item_image . '"
                                                        items_price="' . $items_price . '"
                                                        >
                <div class="card product-card">
                                                <div class="card-body">
                                                    <div class="product-img text-center">
                                                        <img src="' . $urlget . $item_image . '"class="img-fluid" alt="">
                                                    </div>
                                                    <div class="d-flex pt-3">
                                                       <div class="p-2">
                                                        <h6><a href="#" class="meow" 
                                                        item_id="' . $item_id . '"
                                                        item_name="' . $items_detail . '"
                                                        item_image="' . $item_image . '"
                                                        items_price="' . $items_price . '"
                                                        ><strong class="text-capitalize proname">' . $items_detail . '</strong></h6>
                                                        <h6 class="mb-0 proprice"> <mark>' . $items_price . ' ' . 'taka</mark>
                                                        </h6>
                                                       </div>
                                                       <div class="ml-3">
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>';
            }
            return $output;
        }






        // return response()->json([
        //     'hello' => $transferd_array
        // ]);

        // $result = array('status' => 'ok', 'content' => $transferd_array);
        //         return response()->json([
        //     'hello' => $transferd_array
        // ]);
        // // echo json_encode($result);
        // exit;
    }

    public function stock()
    {

        $data['data'] = DB::table('purchase_items')
            ->leftJoin('used_quantity', 'purchase_items.purchase_product_id', '=', 'used_quantity.ingrident_id')
            ->leftJoin('products', 'purchase_items.purchase_product_id', '=', 'products.product_id')
            ->select(
                'purchase_items.purchase_product_id',
                'purchase_items.purchase_product_quantity',
                'purchase_items.purchase_product_price',
                'products.product_name',
                'products.product_measure_status',
                'purchase_items.purchase_product_quantity',
                DB::raw('purchase_items.purchase_product_quantity - SUM(used_quantity.used_quantity) as difference'),
            )
            ->groupBy('purchase_items.purchase_product_id')
            ->get();


        if (isAPIRequest()) {
            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['data']], 200);
        } else {
            return view('pages.report.sales.stock', $data);
        }
    }

    public function showProduct($created_by, $item_id)
    {
        $data['food'] = FoodItem::where('food_item_created_by', $created_by)->where('food_item_id', $item_id)
            ->join('food_ingredients', 'food_ingredients.created_food_id', '=', 'created_food_items.food_item_id')
            ->join('products', 'products.product_id', '=', 'food_ingredients.ingred_id')
            ->join('product_categories', 'product_categories.product_category_id', '=', 'created_food_items.foodt_item_category')
            ->select(
                'created_food_items.food_item_name',
                'created_food_items.food_item_entry_id',
                'created_food_items.food_item_retail_price',
                'created_food_items.food_item_production_price',
                'product_categories.product_category_name'
            )
            ->first();

        $data['ingredient'] = FoodItem::where('food_item_id', $item_id)
            ->join('food_ingredients', 'food_ingredients.created_food_id', '=', 'created_food_items.food_item_id')
            ->join('products', 'products.product_id', '=', 'food_ingredients.ingred_id')
            ->join('purchase_items', 'purchase_items.purchase_product_id', '=', 'products.product_id')
            ->get();

        // echo '<pre>';
        // print_r($data['ingredient']);
        // die;


        return view('pages.products.product_show', $data);
    }
}
