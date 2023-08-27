@extends('home')
@section('content')
    <style>
        .card.product-card {
            border-radius: 0px;
            border-style: none;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
            margin-bottom: 30px;
        }
    </style>
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="javascript:void()">Menu Item</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Menu Item</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('products') }}"><i class="fa fa-list me-2"></i>List Menu
                        Item</a>
                    {{-- <a class="btn btn-secondary" href="{{ 'agents/create' }}"><i class="fa fa-user me-2"></i>Create
    Agent</a> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- start: page body -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-3">


                <h3 class="text-center">Created Item</h3>

                <!-- Form Validation -->
                <div class="col-2">
                </div>
                <div class="col-8">
                    <div class="card  product-card">
                        <div class="row">
                            <div class="col">
                                {{-- <h3 class="text-center text-success">Product Image</h3>
                                <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YnVyZ2VyfGVufDB8fDB8fHww&w=1000&q=80"
                                    class="card-img-top" alt="..."> --}}
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <h3 class="text-primary">Created Food Item</h3>
                                    <p class="card-text">Food Item Entry ID : <span
                                            class="text-info">{{ $food->food_item_entry_id }}</span> </p>
                                </div>

                                <div class="card text-center product-card">
                                    <div class="card-header">
                                        <h3 class="text-info"><strong class="text-danger">Food Name</strong> :
                                            {{ $food->food_item_name }}</h3>
                                    </div>

                                </div>
                                <div class="card text-center product-card mt-4">
                                    <div class="card-header">
                                        <h3 class="text-info"><strong class="text-danger">Category</strong> :
                                            {{ $food->product_category_name }}</h3>
                                    </div>

                                </div>

                                <div class="card text-center product-card mt-4">
                                    <h4><strong>Food Statistics</strong></h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">INGREDIENT</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Cost</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ingredient as $ingredient)
                                                <tr>
                                                    <th scope="row">{{ $ingredient->product_name }}</th>
                                                    <td>{{ $ingredient->ingredients_quantity }}</td>
                                                    <td>{{ $ingredient->purchase_product_price }}</td>
                                                    <td>{{ $ingredient->purchase_product_price * $ingredient->ingredients_quantity }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><strong class="text-danger">Production Price</strong></td>
                                                <td><strong class="text-danger">{{ $food->food_item_production_price }}
                                                        TK</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><strong class="text-danger">Selling Price</strong></td>
                                                <td><strong class="text-danger">{{ $food->food_item_retail_price }}
                                                        TK</strong></td>
                                            </tr>
                                        </tfoot>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .row end -->





        </div>
    </div>
    <!-- end form section -->
@endsection
