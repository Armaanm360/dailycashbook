@extends('restaurant')
@section('content')
    <!-- start: page toolbar -->

    <style>
        input[type=radio] {
            display: none;
        }

        label.labl {
            width: 100%;
        }

        .d-flex.align-items-center.fs-5.mb-3 {
            padding: 15px;
            background: #c8c8c875;
            border-radius: 14px;
        }
    </style>
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="section pt-0">
            <div class="container-fluid">
                <!-- start: page body -->



                <form class="row maskking-form" id="add_form">
                    @csrf
                    {{-- <div class="row">
                <div class="col-lg-12 mb-lg-3">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Select Food
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item active" href="#">Beverage</a></li>
                            <li><a class="dropdown-item" href="#">Burger</a></li>
                            <li><a class="dropdown-item" href="#">Dinner</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Lunch</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
                    <div class="row g-4 img-style">
                        <div class="col-lg-9">
                            <div class="type-style pt-0">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <label class="labl">
                                            <input type="radio" name="customer_type" class="promil" value="dine_in" />
                                            <div class="kkk">
                                                <div class="card bg-danger" id="dine_in_bg">
                                                    <div class="card-body">
                                                        <div class="avatar lg">
                                                            <img class="img-fluid"
                                                                src="{{ asset('public') }}/assets/img/ecommerce/Asset-1.svg"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="card-body text-white">
                                                        <h2><strong>Dine In</strong></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label class="labl">
                                            <input type="radio" name="customer_type" class="promil" value="take_out" />
                                            <div class="lll">
                                                <div class="card bg-danger" id="take_out_bg">
                                                    <div class="card-body text-white">
                                                        <div class="avatar lg">
                                                            <img class="img-fluid"
                                                                src="{{ asset('public') }}/assets/img/ecommerce/Asset-3.svg"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="card-body text-white">
                                                        <h2><strong>Take Out</strong></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label class="labl">
                                            <input type="radio" name="customer_type" class="promil"
                                                value="food_delivery" />
                                            <div class="lll">
                                                <div class="card bg-danger" id="food_delivery_bg">
                                                    <div class="card-body text-white">
                                                        <div class="avatar lg">
                                                            <img class="img-fluid"
                                                                src="{{ asset('public') }}/assets/img/ecommerce/Asset-2.svg"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="card-body text-white">
                                                        <h2><strong>Food Delivery</strong></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="card">
                                            <div class="card-header bg-danger py-3">
                                                <h5 class="mb-0 text-white">Customer Info</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-3 row-deck">
                                                    <input type="text" class="form-control form-control-lg"
                                                        id="clientName" placeholder="Client Name" name="client_name">




                                                    <input type="hidden" id="hidden_client_id" name="hidden_client_id"
                                                        value="">

                                                    <!-- Modal -->

                                                    <input type="text" class="form-control form-control-lg"
                                                        id="clientNumber" placeholder="Customer Number" name="client_number"
                                                        value="">
                                                    <input type="hidden" id="hidden_client_number"
                                                        name="hidden_client_number" value="">

                                                    <button class="btn btn-danger  px-4 text-uppercase"
                                                        data-bs-toggle="modal" data-bs-target="#ConnectionRequest"
                                                        type="button">Add
                                                        Customer</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <label class="labl">
                                        <input type="radio" name="customer_type" class="promil" value="take_out" />
                                        <div class="col-md-3 col-sm-6">
                                            <div class="card bg-danger">
                                                <div class="card-body text-white">
                                                    <div class="avatar lg">
                                                        <img class="img-fluid"
                                                            src="{{ asset('public') }}/assets/img/ecommerce/Asset-2.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="card-body text-white">
                                                    <h4 class="mb-1">$3.5k</h4>
                                                    <span>Home Delivery</span>
                                                </div>
                                            </div>
                                        </div>
                                    </label> --}}

                                </div>
                            </div>



                            <div class="section bg-redish text-black card mt-3" id="table_div">
                                <div class="container-fluid">

                                    <div class="row">
                                        @foreach ($table as $table)
                                            <div class="col-md-2 col-lg-3 col-sm-12">
                                                <label class="labl">
                                                    <input type="radio" name="restaurant_table_id" class="promil"
                                                        value="{{ $table->restaurant_table_id }}" />
                                                    <div class="col-4">
                                                        <div class="bg-card p-3 rounded-3 text-center m-3 m-md-0">
                                                            <img class="img-fluid rounded-5"
                                                                src="{{ asset('public') }}/assets/img/ecommerce/table01.png"
                                                                alt="">
                                                            <h4>{{ $table->restaurant_table_name }}</h4>

                                                        </div>
                                                    </div>


                                                </label>
                                            </div>
                                        @endforeach


                                    </div> <!-- .row end -->
                                </div>
                            </div>

                            <div class="card fieldset border border-primary">
                                <span class="fieldset-tile text-primary bg-body">Menu :</span>
                                <div class="owl-carousel owl-theme" id="recent_invoices">
                                    {{-- <div class="item card ribbon">

                                        <a href="#">
                                            <div class="card-body">
                                                <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">
                                                    <img class="img-fluid"
                                                        src="{{ asset('public') }}/assets/img/ecommerce/Chinese.svg"
                                                        alt="">
                                                </div>

                                                <h4>Chinese</h4>

                                            </div>
                                        </a>
                                    </div> --}}
                                    @foreach ($product_cat as $product_cat)
                                        <div class="item card">
                                            <a href="#" branch_id="{{ Auth::user()->branch_id }}"
                                                product_cat="{{ $product_cat->product_category }}"
                                                class="get_product_cat">
                                                <div class="card-body">
                                                    <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">
                                                        <img class="img-fluid"
                                                            src="{{ asset('public') }}/assets/img/ecommerce/Italian.svg"
                                                            alt="">
                                                    </div>

                                                    <h4>{{ getProductCategory($product_cat->product_category) }}</h4>

                                                </div>
                                            </a>
                                        </div>
                                    @endforeach


                                </div>
                            </div>

                            <!-- start: page body -->
                            <div class="section food-iteam">
                                <div class="container-fluid">
                                    <div class="row g-3 dynamic_product">


                                    </div> <!-- .row end -->
                                </div>
                            </div>
                            <!--  Section: Hero Section  -->
                            <div class="hero bg-light-success d-flex align-items-center rounded-3" id="hero">
                                <div class="container">
                                    <div class="owl-carousel owl-theme" id="owl_banner">
                                        <div class="item">
                                            <div class="overflow-hidden">
                                                <div
                                                    class="row g-3 py-0 py-md-5 align-items-center justify-content-between">
                                                    <div class="col-xxl-5 col-lg-6 col-md-12">
                                                        <h5 class="color-900">Spacial Offer 10% Off Today.</h5>
                                                        <h2 class="bg-text color-900">MEDIUM PIZZA! <span
                                                                class="text-gradient fw-bold">DELICIOUS</span></h2>
                                                        <p class="color-500 lead mb-4">*Additional charge for premium
                                                            toppings.
                                                            Minimum of 2 required</p>
                                                        <a href="#"
                                                            class="btn btn-lg bg-secondary text-white text-uppercase fs-6">Shop
                                                            Now</a>
                                                    </div>
                                                    <div class="col-xxl-5 col-lg-6 col-md-12">
                                                        <img class="img-fluid"
                                                            src="{{ asset('public') }}/assets/img/ecommerce/1.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="overflow-hidden">
                                                <div
                                                    class="row g-3 py-0 py-md-5 align-items-center justify-content-between">
                                                    <div class="col-xxl-5 col-lg-6 col-md-12">
                                                        <h5 class="color-900">Spacial Offer 10% Off Today.</h5>
                                                        <h2 class="bg-text color-900">MEDIUM PIZZA! <span
                                                                class="text-gradient fw-bold">DELICIOUS</span></h2>
                                                        <p class="color-500 lead mb-4">*Additional charge for premium
                                                            toppings.
                                                            Minimum of 2 required</p>
                                                        <a href="#"
                                                            class="btn btn-lg bg-secondary text-white text-uppercase fs-6">Shop
                                                            Now</a>
                                                    </div>
                                                    <div class="col-xxl-5 col-lg-6 col-md-12">
                                                        <img class="img-fluid"
                                                            src="{{ asset('public') }}/assets/img/ecommerce/2.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="overflow-hidden">
                                                <div
                                                    class="row g-3 py-0 py-md-5 align-items-center justify-content-between">
                                                    <div class="col-xxl-5 col-lg-6 col-md-12">
                                                        <h5 class="color-900">Spacial Offer 10% Off Today.</h5>
                                                        <h2 class="bg-text color-900">MEDIUM PIZZA! <span
                                                                class="text-gradient fw-bold">DELICIOUS</span></h2>
                                                        <p class="color-500 lead mb-4">*Additional charge for premium
                                                            toppings.
                                                            Minimum of 2 required</p>
                                                        <a href="#"
                                                            class="btn btn-lg bg-secondary text-white text-uppercase fs-6">Shop
                                                            Now</a>
                                                    </div>
                                                    <div class="col-xxl-5 col-lg-6 col-md-12">
                                                        <img class="img-fluid"
                                                            src="{{ asset('public') }}/assets/img/ecommerce/3.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="py-lg-2 py-1 mt-0 mt-lg-3">
                                <div class="card">
                                    <div class="card-header bg-danger py-3">
                                        <h5 class="mb-0 text-white">Order Info</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3 row-deck">
                                            <h4>Order No : #<span id="invoice_unique_id"></span></h4>
                                            <h4>Order Type : <span id="order_type"></span></h4>
                                            <h4 id="rest_table">Table No : <span id="table_get_id"></span></h4>
                                            <input type="hidden" id="invoice_unique_inp" name="invoice_no">

                                            <div id="deliver_section">
                                                <h4 class="text-center text-danger"><strong>Delivery Info</strong></h4>
                                                <select class="form-control form-control-lg" id="delivery_man"
                                                    name="delivery_man">
                                                    <option disabled selected>Select Delivery Man</option>
                                                    @foreach ($delivery as $delivery)
                                                        <option value="{{ $delivery->delivery_men_id }}">
                                                            {{ $delivery->delivery_men_name }}</option>
                                                    @endforeach
                                                </select>

                                                <input type="text" readonly class="form-control form-control-lg"
                                                    id="vehicle" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="py-lg-2 py-1 mt-0 mt-lg-3">
                                <div class="card">
                                    <div class="card-header bg-danger py-3">
                                        <h5 class="mb-0 text-white">Customer Info</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3 row-deck">
                                            <input type="text" class="form-control form-control-lg" id="clientName"
                                                placeholder="Client Name" name="client_name">




                                            <input type="hidden" id="hidden_client_id" name="hidden_client_id"
                                                value="">

                                            <!-- Modal -->

                                            <input type="text" class="form-control form-control-lg" id="clientNumber"
                                                placeholder="Customer Number" name="client_number" value="">
                                            <input type="hidden" id="hidden_client_number" name="hidden_client_number"
                                                value="">

                                            <button class="btn btn-danger  px-4 text-uppercase" data-bs-toggle="modal"
                                                data-bs-target="#ConnectionRequest" type="button">Add
                                                Customer</button>

                                        </div>
                                    </div>
                                </div>

                            </div> --}}
                            <div class="sticky-top sticky-right">

                                {{-- <div class="mt-0">
                                    <div class="card bg-violet text-white">
                                        <div class="card-header bg-transparent py-3">
                                            <h5 class="mb-0">Order No: # <span id="invoice_unique_id"></span></h5>
                                            <input type="hidden" id="invoice_unique_inp" name="invoice_no">
                                        </div>
                                        <div class="card-body">



                                        </div>
                                    </div>
                                </div> --}}
                                <div class="py-lg-2 py-1 mt-0 mt-lg-3">
                                    <div class="card">
                                        <div class="card-header bg-transparent py-3">
                                            <h5 class="mb-0">My Order 😎</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3 row-deck">
                                                <table class="items">
                                                    <tbody>
                                                        <tr>
                                                        </tr>

                                                        <div id="billingDetailsList">
                                                            {{-- where loop started --}}
                                                        </div>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="py-lg-2 py-1 mt-0 mt-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row g-3 row-deck">
                                                <label for="overall_discount">
                                                    <h5><strong class="text-primary">Overall
                                                            Discount</strong></h5>
                                                </label>
                                                <input type="number" class="form-control form-control-lg"
                                                    placeholder="Overall Discount" id="overall_discount"
                                                    name="overall_discount" value="0">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="py-lg-2 py-1 mt-0 mt-lg-3">
                                    <div class="card text-center bg-danger text-white">

                                        <div class="card-body">
                                            <h6 class="d-flex flex-wrap justify-content-between">Sub Total :
                                                <strong id="invoiceSubTotal">0</strong>
                                                <input type="hidden" name="invoice_subtotal" id="invoice_subtotal_get">
                                            </h6>
                                            <h6 class="d-flex flex-wrap justify-content-between">Tax 5% :
                                                <strong id="vat_amount_text">0</strong>

                                                <input type="hidden" name="vat_rate" id="vat_rate" value="5"
                                                    readonly>
                                                <input type="hidden" name="vat_amount" id="vat_amount" value=""
                                                    readonly>

                                            </h6>
                                            <div class="progress" style="height: 1px;">
                                                <div class="progress-bar bg-light" role="progressbar" aria-valuenow="100"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                            </div>
                                            <h5 class="d-flex flex-wrap justify-content-between mt-1">Total :
                                                <strong id="grand_total_text">0</strong>

                                                <input type="hidden" name="grand_total" id="grand_total" value=""
                                                    readonly>
                                            </h5>
                                            <div class="payment mt-5 mb-5">
                                                <div class="row">
                                                    <h3 class="mb-3">Payment Method</h3>

                                                    <div class="col">
                                                        <label class="labl">
                                                            <input type="radio" name="payment_type" class="promil"
                                                                value="CASH" />
                                                            <div class="card-body">
                                                                <i class="fa fa-money fa-2x"></i>
                                                                <div class="fs-6 mt-3">Cash</div>
                                                            </div>
                                                        </label>
                                                    </div>


                                                    <div class="col">
                                                        <label class="labl">
                                                            <input type="radio" name="payment_type" class="promil"
                                                                value="BANK" />

                                                            <div class="card-body">
                                                                <i class="fa fa-credit-card-alt fa-2x"></i>
                                                                <div class="fs-6 mt-3">Bank</div>
                                                            </div>

                                                        </label>
                                                    </div>


                                                    <div class="col">
                                                        <label class="labl">
                                                            <input type="radio" name="payment_type" class="promil"
                                                                value="MOBILE_BANKING" />

                                                            <div class="card-body">
                                                                <i class="fa fa-th-large fa-2x"></i>
                                                                <div class="fs-6 mt-3">E-Wallet</div>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <select class="form-control form-control-lg" id="getAccount"
                                                        name="account">

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="payment mt-5 mb-5">
                                                <div class="row">

                                                    <label for="total_paid">
                                                        Total Paying
                                                    </label>
                                                    <input type="number" class="form-control form-control-lg"
                                                        placeholder="Total Paying" name="paid_amount" id="paid_amount">


                                                    <label for="total_paid">
                                                        Change
                                                    </label>
                                                    <input type="number" class="form-control form-control-lg"
                                                        placeholder="Overall Discount" name="changed_amount"
                                                        id="changed_amount" value="" readonly>

                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-danger w-100">Proceed to
                                                Checkout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </form>

            </div>
        </div>

    </div>
    <div id='checkMoneyReceipt'></div>


    <div class="modal fade" id="ConnectionRequest" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-body custom_scroll p-lg-5">
                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5 class="modal-title">Add Customer</h5>
                    <p class="text-muted small">Save Customer information</p>
                    <ul class="list-unstyled custom_scroll mb-0">
                        <li class="card p-3 my-1 flex-row">
                            <form id="addClientForm" style="width: 100%">
                                <div class="flex-fill ms-3">

                                    <span class="float-label">
                                        <label for="clientNumber">Customer Name(optional)</label>
                                        <input type="text" class="form-control form-control-lg" id="addClientName"
                                            placeholder="Customer Number" name="client_name" value="">
                                    </span>
                                    <br>
                                    <span class="float-label">
                                        <label for="clientNumber">Customer Number</label>
                                        <input type="text" class="form-control form-control-lg" id="addClientPhone"
                                            placeholder="Customer Number" name="client_phone_number" value="">
                                    </span>



                                </div>
                                <div class="d-flex align-items-center" style="margin-top: 5%;float: right;">
                                    <button class="btn mx-1 btn-light-primary"><i class="fa fa-check"></i><span
                                            class="d-none d-lg-inline-block ms-2">Save Customer</span></button>

                                </div>
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="proimgurl" value="{{ url('/') }}/public/uploads/products/">


    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
            $('#getAccount').hide();
            $('div#table_div').hide();
            $('#deliver_section').hide();
            $('#rest_table').hide();

            let rand = Math.floor(1000000 + Math.random() * 9000000);
            //$('#invoice_no').val(rand);
            $('#invoice_unique_inp').val(rand);
            $('#invoice_unique_id').text(rand);


        });
        $("input:radio[name=customer_type]").click(function() {
            var customer_type = $(this).val();
            if (customer_type == 'dine_in') {
                $('div#table_div').show();
                $('#order_type').text('Dine In');
                $('#rest_table').show();
                $('#deliver_section').hide();
                $('#dine_in_bg').css({
                    "border": "7px solid #2421288f"
                });
                $('#take_out_bg').css({
                    "border": ""
                });

                $('#food_delivery_bg').css({
                    "border": ""
                });


            }
            if (customer_type == 'take_out') {
                $('div#table_div').hide();
                $('#order_type').text('Take Out');
                $('#rest_table').hide();
                $('#deliver_section').show();
                $('#take_out_bg').css({
                    "border": "7px solid #2421288f"
                });
                $("#dine_in_bg").css({
                    'border': ''
                });
                $('#food_delivery_bg').css({
                    "border": ""
                });
            }

            if (customer_type == 'food_delivery') {
                $('div#table_div').hide();
                $('#order_type').text('Food Delivery');
                $('#rest_table').hide();
                $('#deliver_section').hide();
                $('#food_delivery_bg').css({
                    "border": "7px solid #2421288f"
                });
                $("#dine_in_bg").css({
                    'border': ''
                });
                $('#take_out_bg').css({
                    "border": ""
                });
            }
            //  alert(customer_type);
        });


        $("input:radio[name=payment_type]").click(function() {
            var payment_type = $(this).val();
            $('#getAccount').show();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content')
                },
                method: "GET",
                url: "{{ url('invoice/account-type') }}" + '/' +
                    payment_type,
                success: function(data, textStatus, jqXHR) {
                    $('#getAccount').html(data);
                    // $('#productAddBtn').removeClass('disabled');
                    // alert(data);
                    // $('#InvoiceButtonArea').hide();
                    // $('#InvoiceSkipButtonArea').show();
                    //$('#checkMoneyReceipt').html(data);
                }
            }).done(function() {
                $("#success_msg").html("Data Saved Successfully");
                // window.location.href = "{{ url('agents') }}";
                // location.reload();
            }).fail(function(data, textStatus, jqXHR) {
                $("#loader").hide();
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                        value +
                        "</span>");
                });
            });
            //  alert(customer_type);
        });


        $("input:radio[name=restaurant_table_id]").click(function() {
            var restaurant_table = $(this).val();

            $('#table_get_id').text(restaurant_table);

        });






        // let pro = $("input[name='radioname']").val();



        $('.get_product_cat').on('click', function(e) {
            e.preventDefault();

            let product_cat = $(this).attr('product_cat');
            let branch_id = $(this).attr('branch_id');


            $.ajax({
                type: "GET",
                url: "{{ url('search-category-product') }}/" + product_cat + "/" + branch_id,
                success: function(data) {
                    $('.dynamic_product').html(data);
                    $('.meow').on('click', function(e) {
                        e.preventDefault();

                        let product_name = $(this).attr('item_name');
                        let product_id = $(this).attr('item_id');
                        let product_image = $(this).attr('item_image');
                        let product_price = $(this).attr('items_price');
                        let branch_id = $(this).attr('branch_id');
                        let proimgurl = $('#proimgurl').val();

                        // alert(ooo);
                        var billing_row = document.querySelectorAll('.billing-details-row')
                            .length + 1;
                        // alert(billing_row);
                        var billing_content =
                            '<input type="hidden" name="billing_rows[]" value="' +
                            billing_row +
                            '">' +
                            '<div class="col-sm-12 item-row billing-details-row">' +
                            '<div class="d-flex align-items-center fs-5 mb-3">' +
                            '<div class="rounded no-thumbnail">' +
                            ' <input type="hidden" name="product_' + billing_row +
                            '" value="' +
                            product_id + '"/>' +
                            '<img class="img-fluid"' +
                            'src = ' + proimgurl + product_image +
                            ' width = "60">' +
                            // 'width = "60"' +
                            '</div>' +
                            '<div class = "ms-2">' +
                            '<div class="row" style="font-size: 15px;">' +
                            '<div class="col-3">' +
                            '<span>' +
                            '<strong>' +
                            product_name +
                            ' ' +
                            '</strong>' +
                            '</div>' +
                            '<div class="col-3">' +
                            '<span class="text-danger text-right">' + product_price +
                            '</span>' + '     X ' +
                            '<span class="total_quan_price_' + billing_row +
                            '" data-row="' +
                            billing_row + '">' +
                            '</span>' +
                            '</div>' +
                            '<div class="col-3">' +
                            '<input type="number" name="item_qty_' + billing_row +
                            '"class="form-control qty_get item_qty_' + billing_row +
                            '"step = "1"' +
                            'placeholder = "pcs"' +
                            '" data-row="' +
                            billing_row +
                            '"style = "width: -webkit-fill-available">' +
                            '</div>' +
                            '<div class="col-3">' +
                            '<strong >' +
                            '<input type="hidden" class="qty billing-quantity total_unit_price total_price_quantity_' +
                            billing_row +
                            '" data-row="' +
                            billing_row + '" name="total_price_quantity_' + billing_row +
                            '">' +
                            ' <input readonly type="hidden" name="with_discount_' +
                            billing_row +
                            '" class="with_discount_' +
                            billing_row +
                            ' with_discount" " data-row="' + billing_row + '">' +
                            '=   ' +
                            '<input type="hidden" name="item_discount_' +
                            billing_row +
                            '" class="item_discount_' + billing_row +
                            ' discount_get" " data-row="' + billing_row + '">' +
                            '<span class="sub_total_price_' +
                            billing_row +
                            '" data-row="' +
                            billing_row + '">' +
                            '</span>' +
                            '</strong>' +
                            '</div>' +
                            '<div class="h6 mb-0 text-success">' +
                            '<input type="hidden" name="item_price_' + billing_row +
                            '"class="cost billing-unit-price item_price item_price_' +
                            billing_row +
                            '"step = "1"' +
                            'placeholder = "pcs"' +
                            '" data-row="' +
                            billing_row +
                            '"style = "width: -webkit-fill-available" value=' +
                            product_price +
                            '" data-row="' +
                            billing_row +
                            '">' +

                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $('.items tr:last').after(billing_content);
                        console.log(billing_content);
                        $('#product_get').val('');

                        return false;




                    });
                }
            });




        });





        $('#clientNumber').autocomplete({
            html: true,
            source: function(request, response) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('search-client') }}",
                    dataType: "json",
                    data: {
                        q: request.term,
                    },
                    success: function(data) {
                        response(data.content);
                    }
                });
            },
            select: function(event, ui) {
                $(this).val(ui.item.phone);
                $('#hidden_client_id').val(ui.item.value);
                $('#clientName').val(ui.item.label);
                // $('#remaining').val(ui.item.remain);
                return false;
            },
            minLength: 1,
            open: function() {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function() {
                if ($('#hidden_branch_id').val() == '') {
                    $(this).val('');
                    $('#hidden_branch_id').val('');
                    alert();
                }
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
        $('#clientName').autocomplete({
            html: true,
            source: function(request, response) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('search-client') }}",
                    dataType: "json",
                    data: {
                        q: request.term,
                    },
                    success: function(data) {
                        response(data.content);
                    }
                });
            },
            select: function(event, ui) {
                $(this).val(ui.item.label);
                $('#hidden_client_id').val(ui.item.value);
                $('#clientNumber').val(ui.item.phone);
                // $('#remaining').val(ui.item.remain);
                return false;
            },
            minLength: 1,
            open: function() {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function() {
                if ($('#hidden_branch_id').val() == '') {
                    $(this).val('');
                    $('#hidden_branch_id').val('');
                    alert();
                }
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });


        $("#addClientForm").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            $(".loader").show();
            var data = new FormData($('#addClientForm')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('quick-create-client') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    $('#clientName').val(data.client_name);
                    $('#clientNumber').val(data.client_phone_number);
                    $('#hidden_client_id').val(data.id);
                    $('#ConnectionRequest').modal('toggle');
                }
            }).done(function() {
                $("#success_msg").html("Data Saved Successfully");
            }).fail(function(data, textStatus, jqXHR) {
                $(".loader").hide();
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weight: 600'>" +
                        value +
                        "</span>");
                });
            });
            $(".loader").hide();
        });

        // $('#product_get').autocomplete({
        //     html: true,
        //     source: function(request, response) {
        //         let branch_id_get = $('#branch_id_get').val();
        //         $.ajax({
        //             type: "GET",
        //             url: "{{ url('search-purchased-product') }}",
        //             dataType: "json",
        //             data: {
        //                 q: branch_id_get,
        //             },
        //             success: function(data) {
        //                 response(data.content);




        //             }
        //         });
        //     },
        //     select: function(event, ui) {
        //         $(this).val(ui.item.label);
        //         $('#hiddenAccId').val(ui.item.value);
        //         $('#remaining').val(ui.item.remain);
        //         var billing_row = document.querySelectorAll('.billing-details-row').length +
        //             1;
        //         // alert(billing_row);
        //         var billing_content = ' <tr class="item-row billing-details-row">' +
        //             '<input type="hidden" name="billing_rows[]" value="' + billing_row +
        //             '">' +
        //             '<td class="item-name">' +
        //             '<div class="col-12">' +
        //             '<td class="description">' +
        //             ' <textarea name="billing_description_' + billing_row + '">' + ui.item
        //             .items_detail + '</textarea>' +
        //             ' <input type="hidden" name="product_' + billing_row + '" value="' + ui
        //             .item
        //             .items_id + '"/>' +
        //             ' </td>' +
        //             '</div>' +
        //             '</td>' +
        //             '<td class="description">' +
        //             ' <textarea readonly " data-row="' + billing_row +
        //             '" name="item_stock_' + billing_row +
        //             '" class="item_stock_' + billing_row + '">' +
        //             ui.item
        //             .items_quantity + '</textarea>' +
        //             ' </td>' +
        //             '<td class="description">' +
        //             ' <textarea name="item_qty_' + billing_row + '" class="item_qty_' +
        //             billing_row +
        //             ' qty_get" " data-row="' + billing_row + '"></textarea>' +
        //             ' </td>' +
        //             ' <td><textarea readonly class="cost" name="item_unit_' + billing_row +
        //             '">pcs</textarea></td>' +
        //             ' <td><textarea class="cost billing-unit-price item_price item_price_' +
        //             billing_row +
        //             '" data-row="' + billing_row + '" name="item_unit_price_' +
        //             billing_row + '">' + ui.item
        //             .items_price +
        //             '</textarea></td>' +
        //             ' <td><textarea readonly class="qty billing-quantity total_unit_price total_price_quantity_' +
        //             billing_row +
        //             '" data-row="' +
        //             billing_row + '" name="total_price_quantity_' + billing_row +
        //             '"></textarea></td>' +

        //             '<td>' +
        //             ' <textarea name="item_discount_' + billing_row +
        //             '" class="item_discount_' + billing_row +
        //             ' discount_get" " data-row="' + billing_row + '"></textarea>' +
        //             ' </td>' +
        //             '<td>' +
        //             ' <textarea readonly name="with_discount_' + billing_row +
        //             '" class="with_discount_' +
        //             billing_row +
        //             ' with_discount" " data-row="' + billing_row + '"></textarea>' +
        //             '</td>' +
        //             '<td><div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row"><i class="fa-solid fa-trash"></i></a></div></td>'
        //         ' </tr>' +
        //         '<div style="clear:both"></div>' +
        //         '<span class="remove-flight-row"><i class="fa fa-times"></i></span>' +

        //         '</div>';

        //         $('.items tr:last').after(billing_content);
        //         console.log(billing_content);
        //         $('#product_get').val('');

        //         return false;
        //     },
        //     minLength: 1,
        //     open: function() {

        //         $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        //     },
        //     close: function() {

        //         if ($('#hiddenAccId').val() == '') {
        //             // $(this).val('');
        //             // $('#hiddenAccId').val('');
        //             // alert();

        //             // $('#ui-menu-item').hide();

        //             alert();
        //         }
        //         $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        //     }

        // });







        $(document).ready(function() {



            let branch_id_get = $('#branch_id_get').val();
            //alert(branch_id_get);
            $.ajax({
                method: "GET",
                url: "{{ url('get-product') }}/" + branch_id_get,
                success: function(data, textStatus, jqXHR) {
                    $('#productId').html(data);
                    // $('#expense_sub_head_get').attr('selected');

                }
            }).done(function(data) {
                //  $('#expense_sub_head_get').html(data);
            }).fail(function(data, textStatus, jqXHR) {
                $("#loader").hide();
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    //                console.log(key);
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                        value +
                        "</span>");
                });
            });

            $('#productId').on('change', function() {

                alert();
                // let branch_id_get = $('#branch_id_get').val();
                // alert(branch_id_get);
                // $.ajax({
                //     method: "GET",
                //     url: "{{ url('get-product') }}/" + branch_id_get,
                //     success: function(data, textStatus, jqXHR) {
                //         $('#productId').html(data);
                //         // $('#expense_sub_head_get').attr('selected');

                //     }
                // }).done(function(data) {
                //     //  $('#expense_sub_head_get').html(data);
                // }).fail(function(data, textStatus, jqXHR) {
                //     $("#loader").hide();
                //     var json_data = JSON.parse(data.responseText);
                //     $.each(json_data.errors, function(key, value) {
                //         //                console.log(key);
                //         $("#" + key).after(
                //             "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                //             value +
                //             "</span>");
                //     });
                // });
            });



        });






        $(document).on('click', '.delete-wpr', function() {
            $(this).parent().parent().remove();
        });
        // $(document).on('click', '.delete-wpr', function() {

        // });
        // $(document).ready(function() {
        //     $('#productId').on('select2:selecting', function(e) {
        //         let branch_id_get = $('#branch_id_get').val();
        //         $.ajax({
        //             method: "GET",
        //             url: "{{ url('new-get-product') }}/" + branch_id_get,
        //             success: function(data, textStatus, jqXHR) {
        //                 var billing_row = document.querySelectorAll(
        //                         '.billing-details-row')
        //                     .length + 1;
        //                 // alert(billing_row);
        //                 var billing_content =
        //                     ' <tr class="item-row billing-details-row">' +
        //                     '<input type="hidden" name="billing_rows[]" value="' +
        //                     billing_row +
        //                     '">' +
        //                     '<td class="item-name">' +
        //                     '<div class="col-12">' +
        //                     '<td class="description">' +
        //                     ' <textarea name="billing_description_' +
        //                     billing_row + '">' +
        //                     data.items_detail + '</textarea>' +
        //                     ' <input type="hidden" name="product_' +
        //                     billing_row + '" value="' +
        //                     data.items_id + '"/>' +
        //                     ' </td>' +
        //                     '</div>' +
        //                     '</td>' +
        //                     '<td class="description">' +
        //                     ' <textarea readonly " data-row="' +
        //                     billing_row +
        //                     '" name="item_stock_' + billing_row +
        //                     '" class="item_stock_' + billing_row + '">' +
        //                     data.items_quantity + '</textarea>' +
        //                     ' </td>' +
        //                     '<td class="description">' +
        //                     ' <textarea name="item_qty_' + billing_row +
        //                     '" class="item_qty_' +
        //                     billing_row +
        //                     ' qty_get" " data-row="' + billing_row +
        //                     '"></textarea>' +
        //                     ' </td>' +
        //                     ' <td><textarea readonly class="cost" name="item_unit_' +
        //                     billing_row +
        //                     '">pcs</textarea></td>' +
        //                     ' <td><textarea class="cost billing-unit-price item_price item_price_' +
        //                     billing_row +
        //                     '" data-row="' + billing_row +
        //                     '" name="item_unit_price_' +
        //                     billing_row + '">' + data.items_price +
        //                     '</textarea></td>' +
        //                     ' <td><textarea readonly class="qty billing-quantity total_unit_price total_price_quantity_' +
        //                     billing_row +
        //                     '" data-row="' +
        //                     billing_row + '" name="total_price_quantity_' +
        //                     billing_row +
        //                     '"></textarea></td>' +

        //                     '<td>' +
        //                     ' <textarea name="item_discount_' +
        //                     billing_row +
        //                     '" class="item_discount_' + billing_row +
        //                     ' discount_get" " data-row="' + billing_row +
        //                     '"></textarea>' +
        //                     ' </td>' +
        //                     '<td>' +
        //                     ' <textarea readonly name="with_discount_' +
        //                     billing_row +
        //                     '" class="with_discount_' +
        //                     billing_row +
        //                     ' with_discount" " data-row="' + billing_row +
        //                     '"></textarea>' +
        //                     '</td>' +
        //                     '<td><div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row"><i class="fa-solid fa-trash"></i></a></div></td>'
        //                 ' </tr>' +
        //                 '<div style="clear:both"></div>' +
        //                 '<span class="remove-flight-row"><i class="fa fa-times"></i></span>' +

        //                 '</div>';

        //                 $('.items tr:last').after(billing_content);
        //                 $('.items tr:last').after(billing_content);
        //                 console.log(billing_content);
        //                 $('#product_get').val('');

        //                 return false;
        //                 // $('#expense_sub_head_get').attr('selected');

        //             }
        //         }).done(function(data) {
        //             //  $('#expense_sub_head_get').html(data);
        //         }).fail(function(data, textStatus, jqXHR) {
        //             $("#loader").hide();
        //             var json_data = JSON.parse(data.responseText);
        //             $.each(json_data.errors, function(key, value) {
        //                 //                console.log(key);
        //                 $("#" + key).after(
        //                     "<span class='error_msg' style='color: red;font-weigh: 600'>" +
        //                     value +
        //                     "</span>");
        //             });
        //         });



        //     });


        // });








        $(document).ready(function() {
            $('div.delivery').hide();
            // $('#customer_type').on('change', function() {
            //     let rand = Math.floor(1000000 + Math.random() * 9000000);
            //     $('#invoice_no').val(rand);
            //     if (this.value == 'take_out') {
            //         $('div.delivery').show();
            //     } else {
            //         $('div.delivery').hide();
            //     }
            // });
            $('#delivery_man').on('change', function() {
                let delivery_man = $('#delivery_man').find(":selected").val();
                //alert(delivery_man);
                $.ajax({
                    method: "GET",
                    url: "{{ url('invoice/get-delivery-vehicle') }}" + '/' +
                        delivery_man,
                    success: function(data, textStatus, jqXHR) {
                        $('#vehicle').val(data);
                        // alert(data);
                        // alert(data);
                        // $('#InvoiceButtonArea').hide();
                        // $('#InvoiceSkipButtonArea').show();
                        //$('#checkMoneyReceipt').html(data);
                    }
                }).done(function() {
                    $("#success_msg").html("Data Saved Successfully");
                    // window.location.href = "{{ url('agents') }}";
                    // location.reload();
                }).fail(function(data, textStatus, jqXHR) {
                    $("#loader").hide();
                    var json_data = JSON.parse(data.responseText);
                    $.each(json_data.errors, function(key, value) {
                        $("#" + key).after(
                            "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                            value +
                            "</span>");
                    });
                });
            });
            // $('.payment_type').on('click', function() {
            //     let payment_type = $(this).val();

            //     alert(payment_type);
            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
            //                 'content')
            //         },
            //         method: "GET",
            //         url: "{{ url('invoice/account-type') }}" + '/' +
            //             payment_type,
            //         success: function(data, textStatus, jqXHR) {
            //             $('#getAccount').html(data);
            //             // $('#productAddBtn').removeClass('disabled');
            //             // alert(data);
            //             // $('#InvoiceButtonArea').hide();
            //             // $('#InvoiceSkipButtonArea').show();
            //             //$('#checkMoneyReceipt').html(data);
            //         }
            //     }).done(function() {
            //         $("#success_msg").html("Data Saved Successfully");
            //         // window.location.href = "{{ url('agents') }}";
            //         // location.reload();
            //     }).fail(function(data, textStatus, jqXHR) {
            //         $("#loader").hide();
            //         var json_data = JSON.parse(data.responseText);
            //         $.each(json_data.errors, function(key, value) {
            //             $("#" + key).after(
            //                 "<span class='error_msg' style='color: red;font-weigh: 600'>" +
            //                 value +
            //                 "</span>");
            //         });
            //     });
            // });
            $(document).on('keyup', '.invoice-quantity', function() {
                var row_number = $(this).attr('data-row');
                // alert(row_number);
                $('.billing-total-' + row_number).val(Math.round(
                    get_product_price_total(row_number)));
                $('#invoiceSubTotal').val(Math.round(get_sub_total()));
                $('#invoice_subtotal_get').val(Math.round(get_sub_total()));
                $('#invoiceNetTotal').val(Math.round(get_net_total()));
                $('#due_amount').val(Math.round(get_net_total()));
                $('#invoiceDue').text(Math.round(get_net_total()));
            });
            $('#branchName').autocomplete({
                html: true,
                source: function(request, response) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('branch-name-search') }}",
                        dataType: "json",
                        data: {
                            q: request.term,
                        },
                        success: function(data) {
                            response(data.content);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $('#hidden_branch_id').val(ui.item.value);
                    // $('#remaining').val(ui.item.remain);
                    return false;
                },
                minLength: 1,
                open: function() {
                    $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                },
                close: function() {
                    if ($('#hidden_branch_id').val() == '') {
                        $(this).val('');
                        $('#hidden_branch_id').val('');
                        alert();
                    }
                    $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
            });
            $(document).on('keyup', '.unit-price', function() {
                var row_number = $(this).attr('data-row');
                $('.billing-total-' + row_number).val(Math.round(
                    get_product_price_total(row_number)));
                $('#invoiceSubTotal').val(Math.round(get_sub_total()));
                $('#invoiceNetTotal').val(Math.round(get_net_total()));
                $('#due_amount').val(Math.round(get_net_total()));
                $('#invoiceDue').text(Math.round(get_net_total()));
            });
            $(document).on('blur', '.qty_get', function() {
                // alert();
                var billing_row = $(this).attr('data-row');
                //var check_stock = $('.item_stock_' + billing_row).val();
                var check_input = $('.item_qty_' + billing_row).val();

                // alert(check_input);
                // var final_output = (check_input).toString().padStart(2, 0);
                // var final_stock = (check_stock).toString().padStart(2, 0);

                $('.total_price_quantity_' + billing_row).val(get_purchase_total(billing_row));
                $('.sub_total_price_' + billing_row).text(get_purchase_total(billing_row));
                $('.total_quan_price_' + billing_row).text(check_input);
                $('#invoiceSubTotal').text(get_sub_total());
                var vat_rate = $('#vat_rate').val();
                var vat_amount = $('#vat_amount').val();
                $('#vat_amount').val(Math.round(get_sub_total() * (vat_rate /
                    100)));
                $('#vat_amount_text').text(Math.round(get_sub_total() * (vat_rate /
                    100)));
                $('#grand_total').val(Math.round((get_sub_total() * (vat_rate /
                        100)) +
                    get_sub_total()));
                $('#grand_total_text').text(Math.round((get_sub_total() * (vat_rate /
                        100)) +
                    get_sub_total()));

                $('.with_discount_' + new_billing_row).val(Math.round(
                    get_grand_total(new_billing_row)));


                // $('#paid_amount').val(0);
                // $('#changed_amount').val(0);
                // if (final_output > 0 && final_output != 0) {
                //     if (final_output > final_stock) {
                //         alert('Quantity is exceeded the stock limit');
                //         $('.qty_get').val(1);
                //     } else {
                //         $('.discount_get').val(0);
                //         $('.total_price_quantity_' + billing_row).val(Math.round(get_purchase_total(
                //             billing_row)));
                //         var new_billing_row = $(this).attr('data-row');
                // var vat_rate = $('#vat_rate').val();
                // var vat_amount = $('#vat_amount').val();
                //         $('.with_discount_' + new_billing_row).val(Math.round(
                //             get_grand_total(
                //                 new_billing_row)));
                //         $('#invoiceSubTotal').val(get_sub_total());
                //         $('#productDiscount').val(Math.round(total_unit_price() -
                //             get_sub_total()));
                // $('#vat_amount').val(Math.round(get_sub_total() * (vat_rate /
                //     100)));
                //         $('#grand_total').val(Math.round((get_sub_total() * (vat_rate /
                //                 100)) +
                //             get_sub_total()));
                //     }
                // } else {
                //     alert('Quantity cannot be 0 or below 0');
                //     $('.qty_get').val('');
                // }
            });


            $(document).on('keyup', '.item_price', function() {
                var billing_row = $(this).attr('data-row');
                $('#paid_amount').val(0);
                $('#changed_amount').val(0);
                $('.discount_get').val(0);
                $('.total_price_quantity_' + billing_row).val(Math.round(
                    get_purchase_total(billing_row)));
                var new_billing_row = $(this).attr('data-row');
                var vat_rate = $('#vat_rate').val();
                var vat_amount = $('#vat_amount').val();
                $('.with_discount_' + new_billing_row).val(Math.round(get_grand_total(
                    new_billing_row)));
                $('#invoiceSubTotal').val(Math.round(get_sub_total()));
                $('#productDiscount').val(Math.round(total_unit_price() -
                    get_sub_total()));
                $('#vat_amount').val(Math.round(get_sub_total() * (vat_rate / 100)));
                $('#grand_total').val(Math.round((get_sub_total() * (vat_rate / 100)) +
                    get_sub_total()));
            });
            $(document).on('keyup', '.invoice-discount', function() {
                $('#invoiceNetTotal').val(Math.round(get_net_total()));
                $('#due_amount').val(Math.round(get_net_total()));
                $('#invoiceDue').text(Math.round(get_net_total()));
            });
            $(document).on('click', '.delete', function() {
                $("#add_form").trigger('reset');
            });
            $(document).on('keyup', '.discount_get', function() {
                var new_billing_row = $(this).attr('data-row');
                var vat_rate = $('#vat_rate').val();
                var vat_amount = $('#vat_amount').val();
                $('.with_discount_' + new_billing_row).val(Math.round(get_grand_total(
                    new_billing_row)));
                $('#invoiceSubTotal').val(Math.round(get_sub_total()));
                $('#productDiscount').val(Math.round(total_unit_price() -
                    get_sub_total()));
                $('#vat_amount').val(Math.round(get_sub_total() * (vat_rate / 100)));
                $('#grand_total').val(Math.round((get_sub_total() * (vat_rate / 100)) +
                    get_sub_total()));
                //alert(get_grand_total(new_billing_row));
            });
            $(document).on('blur', '#overall_discount', function() {
                var overall_discount = $(this).val();
                var vat_rate = $('#vat_rate').val();
                var vat_amount = $('#vat_amount').val();
                //var paid_amount = $('#paid_amount').val();
                //var grand_total = $('#grand_total').val();
                //$('#changed_amount').val(paid_amount - grand_total);
                $('#grand_total').val(Math.round(((get_sub_total() * (vat_rate / 100)) +
                        get_sub_total()) -
                    overall_discount));
                $('#grand_total_text').text(Math.round(((get_sub_total() * (vat_rate / 100)) +
                        get_sub_total()) -
                    overall_discount));
            });
            $(document).on('keyup', '#paid_amount', function() {
                var paid_amount = $('#paid_amount').val();
                var grand_total = $('#grand_total').val();
                $('#changed_amount').val(Math.round(paid_amount - grand_total));
            });
        });

        function get_product_price_total(row_number) {
            var unitPrice = $('.billing-unit-price-' + row_number).val();
            // alert(unitPrice);
            unitPrice = unitPrice.replace(/\,/g, '');
            unitPrice = parseInt(unitPrice, 10);
            var unitPriceR = parseInt(unitPrice) || 0;
            var billingQnty = $('.billing-quantity-' + row_number).val();
            billingQnty = billingQnty.replace(/\,/g, '');
            billingQnty = parseInt(billingQnty, 10);
            var billingQntyR = parseInt(billingQnty) || 0;
            var ticketClientPrice = parseInt(unitPriceR) * parseInt(billingQntyR);
            return parseInt(ticketClientPrice);
        }

        function get_sub_total() {
            var inputs_product_total = $('.total_unit_price');
            var unitPrice = 0;
            for (var i = 0; i < inputs_product_total.length; i++) {
                var getValue = $(inputs_product_total[i]).val();
                var num = getValue.replace(/\,/g, '');
                num = parseInt(num, 10);
                if (!isNaN(num)) {
                    unitPrice += num;
                }
            }
            return parseInt(unitPrice);
        }

        function total_unit_price() {
            var inputs_product_total = $('.total_unit_price');
            var unitPrice = 0;
            for (var i = 0; i < inputs_product_total.length; i++) {
                var getValue = $(inputs_product_total[i]).val();
                var num = getValue.replace(/\,/g, '');
                num = parseInt(num, 10);
                if (!isNaN(num)) {
                    unitPrice += num;
                }
            }
            return parseInt(unitPrice);
        }

        function get_net_total() {
            var inputs_product_total = $('.billing-single-total');
            var unitPrice = 0;
            for (var i = 0; i < inputs_product_total.length; i++) {
                var getValue = $(inputs_product_total[i]).val();
                console.log(inputs_product_total[i]);
                var num = getValue.replace(/\,/g, '');
                num = parseInt(num, 10);
                if (!isNaN(num)) {
                    unitPrice += num;
                }
            }
            var invoiceDiscount = $('.invoice-discount').val();
            invoiceDiscount = invoiceDiscount.replace(/\,/g, '');
            invoiceDiscount = parseInt(invoiceDiscount, 10);
            var invoiceDiscountR = parseInt(invoiceDiscount) || 0;
            var netTotal = parseInt(unitPrice) - invoiceDiscountR;
            return parseInt(netTotal);
        }

        function get_product_price_total(row_number) {
            var unitPrice = $('.billing-unit-price-' + row_number).val();
            // alert(unitPrice);
            unitPrice = unitPrice.replace(/\,/g, '');
            unitPrice = parseInt(unitPrice, 10);
            var unitPriceR = parseInt(unitPrice) || 0;
            var billingQnty = $('.billing-quantity-' + row_number).val();
            billingQnty = billingQnty.replace(/\,/g, '');
            billingQnty = parseInt(billingQnty, 10);
            var billingQntyR = parseInt(billingQnty) || 0;
            var ticketClientPrice = parseInt(unitPriceR) * parseInt(billingQntyR);
            return parseInt(ticketClientPrice);
        }
        var billing_row = document.querySelectorAll('.billing-details-row').length + 1;

        function get_purchase_total(billing_row) {
            var unitPrice = $('.item_qty_' + billing_row).val();
            unitPrice = unitPrice.replace(/\,/g, '');
            var unitPriceR = parseInt(unitPrice) || 0;
            var billingQnty = $('.item_price_' + billing_row).val();
            // alert(billing_row + '=' + billingQnty);
            billingQnty = billingQnty.replace(/\,/g, '');
            billingQnty = parseInt(billingQnty, 10);
            var billingQntyR = parseInt(billingQnty) || 0;
            var ticketClientPrice = parseInt(unitPriceR) * parseInt(billingQntyR);
            return parseInt(ticketClientPrice);
        }
        var new_billing_row = document.querySelectorAll('.billing-details-row').length + 1;
        /* for restaurant item discount 0 */
        function get_grand_total(new_billing_row) {
            var discount = $('.item_discount_' + new_billing_row).val(0);
            discount = discount.replace(/\,/g, '');
            var discountR = parseInt(discount) || 0;
            var billingQnty = $('.total_price_quantity_' + new_billing_row).val();
            billingQnty = billingQnty.replace(/\,/g, '');
            billingQnty = parseInt(billingQnty, 10);
            var billingQntyR = parseInt(billingQnty) || 0;
            //var ticketClientPrice = parseInt(billingQntyR) * parseInt((discountR / 100));
            var ticketClientPrice = billingQntyR - (billingQntyR * (discountR / 100));
            //  alert(ticketClientPrice);
            return parseInt(ticketClientPrice);
        }

        function grandTotal() {
            let subtotal = get_sub_total();
            let vat_amount = $('#vat_amount').val();
            return grandTotal = parseInt(vat_amount, 10) + parseInt(subtotal, 10);
            // return get_sub_total;
        }
        $(document).ready(function() {
            $('#agentID').autocomplete({
                html: true,
                source: function(request, response) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('search-agent') }}",
                        dataType: "json",
                        data: {
                            q: request.term,
                        },
                        success: function(data) {
                            response(data.content);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $('#hiddenAgentID').val(ui.item.value);
                    return false;
                },
                minLength: 1,
                open: function() {
                    $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                },
                close: function() {
                    if ($('#hiddenClientId').val() == '') {
                        $(this).val('');
                        $('#hiddenClientId').val('');
                    }
                    $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
            });
            $('#0').autocomplete({
                html: true,
                source: function(request, response) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('search-client-full-information') }}",
                        dataType: "json",
                        data: {
                            q: request.term,
                        },
                        success: function(data) {
                            response(data.content);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $('#hiddenClientID').val(ui.item.value);
                    let showClient =
                        '<textarea class="form-control address" disabled style="background:white;margin-top:10px">\nb' +
                        ui.item.client_name + '\nb' + ui.item.value + '\nb' + ui
                        .item.client_address +
                        '\nb' + ui.item.client_phone + '</textarea>';
                    $('#showClient').html(showClient);
                    return false;
                },
                minLength: 1,
                open: function() {
                    $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                },
                close: function() {
                    if ($('#hiddenClientId').val() == '') {
                        $(this).val('');
                        $('#hiddenClientId').val('');
                    }
                    $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
            });
            $('#searchDeligate').autocomplete({
                html: true,
                source: function(request, response) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('search-deligate') }}",
                        dataType: "json",
                        data: {
                            q: request.term,
                        },
                        success: function(data) {
                            response(data.content);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $('#hiddenDeligateID').val(ui.item.value);
                    return false;
                },
                minLength: 1,
                open: function() {
                    $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                },
                close: function() {
                    if ($('#hiddenClientId').val() == '') {
                        $(this).val('');
                        $('#hiddenClientId').val('');
                    }
                    $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
            });
            $('#searchSponser').autocomplete({
                html: true,
                source: function(request, response) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('search-sponser') }}",
                        dataType: "json",
                        data: {
                            q: request.term,
                        },
                        success: function(data) {
                            response(data.content);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $('#hiddenSponserID').val(ui.item.value);
                    return false;
                },
                minLength: 1,
                open: function() {
                    $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                },
                close: function() {
                    if ($('#hiddenSponserID').val() == '') {
                        $(this).val('');
                        $('#hiddenSponserID').val('');
                    }
                    $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
            });
        });
        $("#add_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#add_form')[0]);
            var clientName = $('#clientName').val();
            if (clientName == '') {
                alert('Client Name Required');
            } else {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: "{{ url('invoice') }}",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, textStatus, jqXHR) {



                        window.location.href = "{{ url('invoice') }}" + '/' + data
                            .sale_id;
                        // alert(data);
                        // $('#InvoiceButtonArea').hide();
                        // $('#InvoiceSkipButtonArea').show();
                        //$('#checkMoneyReceipt').html(data);
                    }
                }).done(function() {
                    $("#success_msg").html("Data Saved Successfully");
                    // window.location.href = "{{ url('agents') }}";
                    // location.reload();
                }).fail(function(data, textStatus, jqXHR) {
                    $("#loader").hide();
                    var json_data = JSON.parse(data.responseText);
                    $.each(json_data.errors, function(key, value) {
                        $("#" + key).after(
                            "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                            value +
                            "</span>");
                    });
                });
            }

        });
        // $('#warehouse').autocomplete({
        //     html: true,
        //     source: function(request, response) {
        //         $.ajax({
        //             type: "GET",
        //             url: "{{ url('search-warehouse') }}",
        //             dataType: "json",
        //             data: {
        //                 q: request.term,
        //             },
        //             success: function(data) {
        //                 response(data.content);
        //             }
        //         });
        //     },
        //     select: function(event, ui) {
        //         $(this).val(ui.item.label);
        //         $('#hidden_warehouse_id').val(ui.item.value);
        //         // $('#remaining').val(ui.item.remain);
        //         return false;
        //     },
        //     minLength: 1,
        //     open: function() {
        //         $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        //     },
        //     close: function() {
        //         if ($('#hidden_warehouse_id').val() == '') {
        //             $(this).val('');
        //             $('#hidden_warehouse_id').val('');
        //             alert();
        //         }
        //         $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        //     }
        // });
        // $('#branch').on('keyup', function() {
        //     alert();
        // })
        $('#staff').autocomplete({
            html: true,
            source: function(request, response) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('search-staff') }}",
                    dataType: "json",
                    data: {
                        q: request.term,
                    },
                    success: function(data) {
                        response(data.content);
                    }
                });
            },
            select: function(event, ui) {
                $(this).val(ui.item.label);
                $('#hidden_staff_id').val(ui.item.value);
                // $('#remaining').val(ui.item.remain);
                return false;
            },
            minLength: 1,
            open: function() {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function() {
                if ($('#hidden_staff_id').val() == '') {
                    $(this).val('');
                    $('#hidden_staff_id').val('');
                    alert();
                }
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
        $('#client').autocomplete({
            html: true,
            source: function(request, response) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('search-client') }}",
                    dataType: "json",
                    data: {
                        q: request.term,
                    },
                    success: function(data) {
                        response(data.content);
                    }
                });
            },
            select: function(event, ui) {
                $(this).val(ui.item.label);
                $('#hidden_client_id').val(ui.item.value);
                // $('#remaining').val(ui.item.remain);
                return false;
            },
            minLength: 1,
            open: function() {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function() {
                if ($('#hidden_client_id').val() == '') {
                    $(this).val('');
                    $('#hidden_client_id').val('');
                    alert();
                }
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
    </script>
@endsection
