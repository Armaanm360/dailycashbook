<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\FoodIngredients;
use App\Models\FoodItem;
use App\Models\Ingredients\Ingredient;
use App\Models\Product\Product;
use App\Models\ProductCategory\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['productList'] = DB::table('created_food_items')->where('food_item_created_by', Auth::user()->unique_user_id)->join('product_categories', 'product_categories.product_category_id', '=', 'created_food_items.foodt_item_category')->get();


        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['productList']], 200);
        } else {

            return view('pages.products.list_products', $data);
        }
    }
    public function allProductsGetUserWise($created_by)
    {

        $data['productList'] = DB::table('created_food_items')->where('food_item_created_by', $created_by)->join('product_categories', 'product_categories.product_category_id', '=', 'created_food_items.foodt_item_category')->where('product_categories.product_category_created_by', $created_by)->get();

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['productList']], 200);
    }


    public function foodItemList($created_by)
    {

        $data['productList'] = DB::table('created_food_items')->where('food_item_created_by', $created_by)->join('product_categories', 'product_categories.product_category_id', '=', 'created_food_items.foodt_item_category')->get();


        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['productList']], 200);
        } else {

            return view('pages.products.list_products', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = date('Y-m-d');
        $productCategory = ProductCategory::where('product_category_status', 1)->where('product_category_created_by', Auth::user()->unique_user_id)->get();
        $row_count = Product::where('product_created_at', $date)->count();
        $ingredients = DB::table('ingredients')->get();
        return view('pages.products.create_products', compact('productCategory', 'row_count', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new FoodItem();
        $product->food_item_name = $request->product_name;
        $product->food_item_entry_id = $request->product_entry_id;
        $product->food_item_retail_price = $request->product_retail_price;
        $product->foodt_item_category = $request->product_category;
        $product->food_item_production_price = $request->production_price_inp;

        if (isAPIRequest()) {
            $product->food_item_created_by =  $request->food_item_created_by;
        } else {
            $product->food_item_created_by =  Auth::user()->unique_user_id;
        }
        $product->save();

        //  $transfer_id = $warehouseToBranch->id;

        $productIDget = $product->food_item_id;

        foreach ($request->billing_rows as $rowBilling) {

            $ingred_id = 'ingred_id_' . $rowBilling;
            $ingredients_quantity = 'enterd_quan_' . $rowBilling;
            $purchased_item = new FoodIngredients();
            $purchased_item['created_food_id'] = $productIDget;
            $purchased_item['ingred_id'] = $request->$ingred_id;
            $purchased_item['ingredients_quantity'] = $request->$ingredients_quantity;
            $purchased_item->save();
        }

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $product, 'food_id' => $product->food_item_id], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['food'] = FoodItem::where('food_item_id', $id)
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

        $data['ingredient'] = FoodItem::where('food_item_id', $id)
            ->join('food_ingredients', 'food_ingredients.created_food_id', '=', 'created_food_items.food_item_id')
            ->join('products', 'products.product_id', '=', 'food_ingredients.ingred_id')
            ->join('purchase_items', 'purchase_items.purchase_product_id', '=', 'products.product_id')
            ->get();

        // echo '<pre>';
        // print_r($data['ingredient']);
        // die;


        return view('pages.products.product_show', $data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Product::where('product_id', $id)->first();
        $productCategory = ProductCategory::where('product_category_status', 1)->get();
        return view('pages.products.edit_products', $data, compact('productCategory'));
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

        if ($request->hasFile('product_image')) {
            $file_info = Product::where('product_id', $request->product_id)->first();

            if ($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $destinationPath = public_path('uploads/products/');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $new_name);
            }


            Product::where('product_id', $request->product_id)->update([
                'product_image' => $new_name,
            ]);
        }

        Product::where('product_id', $request->product_id)->update([
            'product_name' => $request->product_name,
            'product_entry_id' => $request->product_entry_id,
            'product_category' => $request->product_category,
            'product_code' => $request->product_code,
            'product_retail_price' => $request->product_retail_price,
            'product_wholesale_price' => $request->product_wholesale_price,
            'product_updated_by' => Auth::user()->id,
            'updated_at' => date("Y/m/d"),
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



        if (isAPIRequest()) {
            Product::where('product_id', $id)->update([
                'product_status' => 0,
                'product_is_deleted' => "YES",
            ]);
        } else {
            Product::where('product_id', $id)->update([
                'product_deleted_by' => Auth::user()->id,
                'product_status' => 0,
                'product_is_deleted' => "YES",
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Successfully Deleted'], 200);
    }

    public function productSearch($created_by, Request $request)
    {
        $products = Ingredient::where('product_created_by', $created_by)->where('product_name', 'like', "%{$request->q}%")->get();
        // print_r($clients);
        // die;
        $product_array = array();
        foreach ($products as $product) {
            $label = $product['product_name'] . '(' . $product['product_entry_id'] . ')';
            $value = intval($product['product_name']);
            $code = intval($product['product_id']);
            $product_array[] = array("label" => $label, "value" => $value, "code" => $code);
        }
        $result = array('status' => 'ok', 'content' => $product_array);
        echo json_encode($result);
        exit;
    }

    public function get_product_barcode($id)
    {
        $product = Product::whereProductId($id)->get()[0];
        return view('pages.barcode.product_barcode')->with('product', $product);
    }


    public function barcode_scan()
    {
        return view('pages.barcode.scan');
    }


    public function searchTerm($created_by, Request $request)
    {
        $mata = Product::where('product_created_by', $created_by)->select("product_name as value", "product_id", 'purchase_items.purchase_product_price', 'purchase_product_quantity', 'purchase_product_price', 'products.product_measure_status')
            ->join('purchase_items', 'purchase_items.purchase_product_id', '=', 'products.product_id')
            ->get();






        $data = Product::select("product_name as value", "product_id", 'purchase_items.purchase_product_price', 'purchase_product_quantity', 'purchase_product_type', 'purchase_product_price')->join('purchase_items', 'purchase_items.purchase_product_id', '=', 'products.product_id')
            ->where('product_created_by', 'LIKE', '%' . $request->get('search') . '%')
            ->get();
        return response()->json($mata);
    }





    function check_barcode(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'BarcodeQrImage' => 'required'
        ]);
        if ($validation->passes()) {
            $image = $request->file('BarcodeQrImage');
            $image->move(public_path('images'), $image->getClientOriginalName());

            $resultArray = DecodeBarcodeFile(public_path('images/' . $image->getClientOriginalName()), 0x3FF | 0x2000000 | 0x4000000 | 0x8000000 | 0x10000000); // 1D, PDF417, QRCODE, DataMatrix, Aztec Code

            if (is_array($resultArray)) {
                $resultCount = count($resultArray);
                echo "Total count: $resultCount", "\n";
                if ($resultCount > 0) {
                    for ($i = 0; $i < $resultCount; $i++) {
                        $result = $resultArray[$i];
                        echo "Barcode format: $result[0], ";
                        echo "value: $result[1], ";
                        echo "raw: ", bin2hex($result[2]), "\n";
                        echo "Localization : ", $result[3], "\n";
                    }
                } else {
                    echo 'No barcode found.', "\n";
                }
            }
        }
    }
}
