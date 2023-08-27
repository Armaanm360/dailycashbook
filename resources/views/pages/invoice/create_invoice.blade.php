@extends('restaurant')
@section('content')
    <!-- start: page toolbar -->

    <style>
        input[type=radio] {
            display: none;
        }


        /* Please ❤ this if you like it! */


        body {
            width: 100%;
            background: var(--dark-blue);
            overflow-x: hidden;
            font-family: 'Poppins', sans-serif;
            font-size: 17px;
            line-height: 30px;
            -webkit-transition: all 300ms linear;
            transition: all 300ms linear;
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 17px;
            line-height: 30px;
            color: var(--white);
            letter-spacing: 1px;
            font-weight: 500;
            -webkit-transition: all 300ms linear;
            transition: all 300ms linear;
        }

        ::selection {
            color: var(--white);
            background-color: var(--black);
        }

        ::-moz-selection {
            color: var(--white);
            background-color: var(--black);
        }

        mark {
            color: var(--white);
            background-color: var(--black);
        }

        .section {
            position: relative;
            width: 100%;
            display: block;
            text-align: center;
            margin: 0 auto;
        }

        .over-hide {
            overflow: hidden;
        }

        .z-bigger {
            z-index: 100 !important;
        }


        .background-color {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--dark-blue);
            z-index: 1;
            -webkit-transition: all 300ms linear;
            transition: all 300ms linear;
        }

        .checkbox:checked~.background-color {
            background-color: var(--white);
        }


        [type="checkbox"]:checked,
        [type="checkbox"]:not(:checked),
        [type="radio"]:checked,
        [type="radio"]:not(:checked) {
            position: absolute;
            left: -9999px;
            width: 0;
            height: 0;
            visibility: hidden;
        }

        .checkbox:checked+label,
        .checkbox:not(:checked)+label {
            position: relative;
            width: 70px;
            display: inline-block;
            padding: 0;
            margin: 0 auto;
            text-align: center;
            margin: 17px 0;
            margin-top: 100px;
            height: 6px;
            border-radius: 4px;
            background-image: linear-gradient(298deg, var(--red), var(--yellow));
            z-index: 100 !important;
        }



        .checkbox:checked+label:before,
        .checkbox:not(:checked)+label:before {
            position: absolute;
            font-family: 'unicons';
            cursor: pointer;
            top: -17px;
            z-index: 2;
            font-size: 20px;
            line-height: 40px;
            text-align: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            -webkit-transition: all 300ms linear;
            transition: all 300ms linear;
        }

        .checkbox:not(:checked)+label:before {
            content: '\eac1';
            left: 0;
            color: var(--grey);
            background-color: var(--dark-light);
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(26, 53, 71, 0.07);
        }

        .checkbox:checked+label:before {
            content: '\eb8f';
            left: 30px;
            color: var(--yellow);
            background-color: var(--dark-blue);
            box-shadow: 0 4px 4px rgba(26, 53, 71, 0.25), 0 0 0 1px rgba(26, 53, 71, 0.07);
        }

        .checkbox:checked~.section .container .row .col-12 p {
            color: var(--dark-blue);
        }


        .checkbox-tools:checked+label,
        .checkbox-tools:not(:checked)+label {
            position: relative;
            display: inline-block;
            padding: 20px;
            width: 200px;
            font-size: 14px;
            line-height: 40px;
            letter-spacing: 1px;
            margin: 0 auto;
            margin-left: 5px;
            margin-right: 5px;
            margin-bottom: 10px;
            text-align: center;
            border-radius: 4px;
            overflow: hidden;
            cursor: pointer;
            text-transform: uppercase;
            color: var(--white);
            -webkit-transition: all 300ms linear;
            transition: all 300ms linear;
        }


        .checkbox-tools:not(:checked)+label {
            background-color: var(--dark-light);
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        }

        .checkbox-tools:checked+label {
            background-color: #2794eb;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            color: white;
        }

        .checkbox-tools:not(:checked)+label:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .checkbox-tools:checked+label::before,
        .checkbox-tools:not(:checked)+label::before {
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 4px;
            background-image: linear-gradient(298deg, var(--red), var(--yellow));
            z-index: -1;
        }

        .checkbox-tools:checked+label .uil,
        .checkbox-tools:not(:checked)+label .uil {
            font-size: 24px;
            line-height: 24px;
            display: block;
            padding-bottom: 10px;
        }

        .checkbox:checked~.section .container .row .col-12 .checkbox-tools:not(:checked)+label {
            background-color: var(--light);
            color: var(--dark-blue);
            box-shadow: 0 1x 4px 0 rgba(0, 0, 0, 0.05);
        }

        .checkbox-budget:checked+label,
        .checkbox-budget:not(:checked)+label {
            position: relative;
            display: inline-block;
            padding: 0;
            padding-top: 20px;
            padding-bottom: 20px;
            width: 260px;
            font-size: 52px;
            line-height: 52px;
            font-weight: 700;
            letter-spacing: 1px;
            margin: 0 auto;
            margin-left: 5px;
            margin-right: 5px;
            margin-bottom: 10px;
            text-align: center;
            border-radius: 4px;
            overflow: hidden;
            cursor: pointer;
            text-transform: uppercase;
            -webkit-transition: all 300ms linear;
            transition: all 300ms linear;
            -webkit-text-stroke: 1px var(--white);
            text-stroke: 1px var(--white);
            -webkit-text-fill-color: transparent;
            text-fill-color: transparent;
            color: transparent;
        }

        .checkbox-budget:not(:checked)+label {
            background-color: var(--dark-light);
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        }

        .checkbox-budget:checked+label {
            background-color: transparent;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .checkbox-budget:not(:checked)+label:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .checkbox-budget:checked+label::before,
        .checkbox-budget:not(:checked)+label::before {
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 4px;
            background-image: linear-gradient(138deg, var(--red), var(--yellow));
            z-index: -1;
        }

        .checkbox-budget:checked+label span,
        .checkbox-budget:not(:checked)+label span {
            position: relative;
            display: block;
        }

        .checkbox-budget:checked+label span::before,
        .checkbox-budget:not(:checked)+label span::before {
            position: absolute;
            content: attr(data-hover);
            top: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            -webkit-text-stroke: transparent;
            text-stroke: transparent;
            -webkit-text-fill-color: var(--white);
            text-fill-color: var(--white);
            color: var(--white);
            -webkit-transition: max-height 0.3s;
            -moz-transition: max-height 0.3s;
            transition: max-height 0.3s;
        }

        .checkbox-budget:not(:checked)+label span::before {
            max-height: 0;
        }

        .checkbox-budget:checked+label span::before {
            max-height: 100%;
        }

        .checkbox:checked~.section .container .row .col-xl-10 .checkbox-budget:not(:checked)+label {
            background-color: var(--light);
            -webkit-text-stroke: 1px var(--dark-blue);
            text-stroke: 1px var(--dark-blue);
            box-shadow: 0 1x 4px 0 rgba(0, 0, 0, 0.05);
        }

        .checkbox-booking:checked+label,
        .checkbox-booking:not(:checked)+label {
            position: relative;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-align-items: center;
            -moz-align-items: center;
            -ms-align-items: center;
            align-items: center;
            -webkit-justify-content: center;
            -moz-justify-content: center;
            -ms-justify-content: center;
            justify-content: center;
            -ms-flex-pack: center;
            text-align: center;
            padding: 0;
            padding: 6px 25px;
            font-size: 14px;
            line-height: 30px;
            letter-spacing: 1px;
            margin: 0 auto;
            margin-left: 6px;
            margin-right: 6px;
            margin-bottom: 16px;
            text-align: center;
            border-radius: 4px;
            cursor: pointer;
            color: var(--white);
            text-transform: uppercase;
            background-color: var(--dark-light);
            -webkit-transition: all 300ms linear;
            transition: all 300ms linear;
        }

        .checkbox-booking:not(:checked)+label::before {
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        }

        .checkbox-booking:checked+label::before {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .checkbox-booking:not(:checked)+label:hover::before {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .checkbox-booking:checked+label::before,
        .checkbox-booking:not(:checked)+label::before {
            position: absolute;
            content: '';
            top: -2px;
            left: -2px;
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            border-radius: 4px;
            z-index: -2;
            background-image: linear-gradient(138deg, var(--red), var(--yellow));
            -webkit-transition: all 300ms linear;
            transition: all 300ms linear;
        }

        .checkbox-booking:not(:checked)+label::before {
            top: -1px;
            left: -1px;
            width: calc(100% + 2px);
            height: calc(100% + 2px);
        }

        .checkbox-booking:checked+label::after,
        .checkbox-booking:not(:checked)+label::after {
            position: absolute;
            content: '';
            top: -2px;
            left: -2px;
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            border-radius: 4px;
            z-index: -2;
            background-color: var(--dark-light);
            -webkit-transition: all 300ms linear;
            transition: all 300ms linear;
        }

        .checkbox-booking:checked+label::after {
            opacity: 0;
        }

        .checkbox-booking:checked+label .uil,
        .checkbox-booking:not(:checked)+label .uil {
            font-size: 20px;
        }

        .checkbox-booking:checked+label .text,
        .checkbox-booking:not(:checked)+label .text {
            position: relative;
            display: inline-block;
            -webkit-transition: opacity 300ms linear;
            transition: opacity 300ms linear;
        }

        .checkbox-booking:checked+label .text {
            opacity: 0.6;
        }

        .checkbox-booking:checked+label .text::after,
        .checkbox-booking:not(:checked)+label .text::after {
            position: absolute;
            content: '';
            width: 0;
            left: 0;
            top: 50%;
            margin-top: -1px;
            height: 2px;
            background-image: linear-gradient(138deg, var(--red), var(--yellow));
            z-index: 1;
            -webkit-transition: all 300ms linear;
            transition: all 300ms linear;
        }

        .checkbox-booking:not(:checked)+label .text::after {
            width: 0;
        }

        .checkbox-booking:checked+label .text::after {
            width: 100%;
        }

        .checkbox:checked~.section .container .row .col-12 .checkbox-booking:not(:checked)+label,
        .checkbox:checked~.section .container .row .col-12 .checkbox-booking:checked+label {
            background-color: var(--light);
            color: var(--dark-blue);
        }

        .checkbox:checked~.section .container .row .col-12 .checkbox-booking:checked+label::after,
        .checkbox:checked~.section .container .row .col-12 .checkbox-booking:not(:checked)+label::after {
            background-color: var(--light);
        }




        .link-to-page {
            position: fixed;
            top: 30px;
            right: 30px;
            z-index: 20000;
            cursor: pointer;
            width: 50px;
        }

        .link-to-page img {
            width: 100%;
            height: auto;
            display: block;
        }

        label.labl {
            width: 100%;
        }

        div#rest_table_id {
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
            margin-top: 20px;
        }

        li.selected {
            padding: 5px;
            font-weight: 900;
            border-radius: 4px;
            background: #09c2de;
            color: #fff;
            border: none;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }



        .d-flex.align-items-center.fs-5.mb-3 {
            padding: 15px;
            background: #c8c8c875;
            border-radius: 14px;
        }

        .card-body-2 {
            padding: 5px 10px;
        }

        .menu-style h4 {
            margin-bottom: 0;
            text-align: center;
            padding: 5px 10px;
        }

        .menu-style .card {
            border-radius: 5px;
        }

        .table-section h4 {
            margin-bottom: 0;
        }

        .table-section {
            padding: 20px 0 !important;
        }

        /* ---------------------- */
        .res-section h5 {
            color: #544fff;
            font-size: 16px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .res-section .res-title {
            font-size: 32px;
            font-weight: 800;
            color: #000000;
        }

        .res-section a:hover {
            box-shadow: 0 5px 10px rgba(34, 39, 54, 0.15);
            border-radius: 0.75rem;
        }

        img {
            filter: none !important;
        }

        .br-active {
            border-right: 3px solid #fff;
        }

        .app-social .nav-tabs.menu-list .nav-link.active {
            background: #09c2de;
            color: #fff;
            border: none;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .layout-1 .body-layout-1 .menu-list .m-link.active {
            background: #f5364a;
            color: #fff;
        }

        .card {
            border-style: none !important;
            box-shadow: 0 5px 10px 0 rgba(34, 39, 54, 0.15);
        }
    </style>
    <div class="page-body body-layout-1">
        <div class="pt-1">
            <div class="container-fluid">
                <!-- start: page body -->


                <form class="row maskking-form p-2" id="add_form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="app-social d-flex flex-nowrap">
                                <div class="order-1 custom_scroll">

                                    <ul class="nav nav-tabs menu-list list-unstyled mb-0 border-0">
                                        <li class="nav-item">
                                            <label class="labl">
                                                <input type="radio" name="customer_type" class="promil" value="dine_in" />
                                                <a class="nav-link dine_in">
                                                    <img class="avatar"
                                                        src="{{ asset('public') }}/assets/img/ecommerce/Asset-1.svg"
                                                        alt="">

                                                    <span class="ms-2">Dine In</span>
                                                </a>
                                            </label>
                                        </li>
                                        <li class="nav-item">
                                            <label class="labl">
                                                <input type="radio" name="customer_type" class="promil"
                                                    value="take_out" />
                                                <a class="nav-link take_out">
                                                    <img class="avatar"
                                                        src="{{ asset('public') }}/assets/img/ecommerce/Asset-3.svg"
                                                        alt="">
                                                    <span class="ms-2">Take Out</span>
                                                </a>
                                            </label>
                                        </li>
                                        <li class="nav-item">
                                            <label class="labl">
                                                <input type="radio" name="customer_type" class="promil"
                                                    value="food_delivery" />
                                                <a class="nav-link food_delivery">
                                                    <img class="avatar"
                                                        src="{{ asset('public') }}/assets/img/ecommerce/Asset-2.svg"
                                                        alt="">
                                                    <span class="ms-2">Delivery</span>
                                                </a>
                                            </label>
                                        </li>
                                        <li class="divider mt-4 py-2 border-top text-uppercase text-muted"></li>

                                        <div id="category_items">
                                            <ul class="nav nav-tabs menu-list list-unstyled mb-0 border-0"
                                                id="category_ul_menu">
                                                <li>
                                                    <a class="m-link get_product_cat" href="#"
                                                        branch_id="{{ Auth::user()->branch_id }}" product_cat="0"><i
                                                            class="fa fa-hashtag"></i><span>All</span></a>
                                                </li>
                                                @foreach ($product_cat as $product_cat)
                                                    <li>
                                                        <a class="m-link get_product_cat" href="#"
                                                            branch_id="{{ Auth::user()->branch_id }}"
                                                            product_cat="{{ $product_cat->product_category_id }}"><i
                                                                class="fa fa-hashtag"></i><span>{{ getProductCategory($product_cat->product_category_id) }}</span></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </ul>
                                </div>
                                <div class="order-2 flex-grow-1 px-md-3 px-0 custom_scroll br-active">

                                    <div class="container-fluid">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade active show">
                                                        <div class="d-flex justify-content-between">

                                                            <button
                                                                class="btn btn-sm d-block d-lg-none btn-primary social-list-toggle"
                                                                type="button"><i class="fa fa-bars"></i></button>
                                                        </div>


                                                        <div class="main-search px-2 flex-fill">
                                                            <input class="form-control" type="text"
                                                                placeholder="Search Food Item" id="searchFood">

                                                        </div>
                                                        <div id="restaurant_tables">
                                                            {{-- <div class="row">
                                                                @foreach ($table as $table)
                                                                    <div class="col-4">
                                                                        <div class="bg-card rounded-3 text-center p-3"
                                                                            id="rest_table_id" rest-row="1">
                                                                            <img class="img-fluid rounded-5"
                                                                                src="http://crave.restaurant360.online/public/assets/img/ecommerce/table01.png"
                                                                                alt="">
                                                                            <span>{{ $table->restaurant_table_name }}</span>

                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div> --}}
                                                            <div class="col-12 pb-5">

                                                                @foreach ($table as $table)
                                                                    <input class="checkbox-tools" type="radio"
                                                                        name="rest_table_get"
                                                                        id="rest-tab-{{ $table->restaurant_table_id }}"
                                                                        value="{{ $table->restaurant_table_id }}">
                                                                    <label class="for-checkbox-tools"
                                                                        for="rest-tab-{{ $table->restaurant_table_id }}">
                                                                        <img class="img-fluid"
                                                                            src="http://crave.restaurant360.online/public/assets/img/ecommerce/table01.png"
                                                                            alt="">
                                                                        <span
                                                                            class="table_name_get">{{ $table->restaurant_table_name }}</span>
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1 g-2 mb-4 row-deck dynamic_product p-2">



                                                        </div>

                                                    </div>
                                                </div>
                                            </div> <!-- .row end -->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="customer">
                                <div class="card">
                                    <div class="card-header bg-info py-3">
                                        <h5 class="mb-0 text-white">Customer Info</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3 row-deck">
                                            <input type="text" class="form-control form-control-lg" id="clientName"
                                                placeholder="Client Name" name="client_name" value="guest">




                                            <input type="hidden" id="hidden_client_id" name="hidden_client_id"
                                                value="25">

                                            <!-- Modal -->

                                            <input type="text" class="form-control form-control-lg" id="clientNumber"
                                                placeholder="Customer Number" name="client_number" value="01421326477">
                                            <input type="hidden" id="hidden_client_number" name="hidden_client_number"
                                                value="">

                                            <button class="btn btn-danger  px-4 text-uppercase" data-bs-toggle="modal"
                                                data-bs-target="#ConnectionRequest" type="button">Add
                                                Customer</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="staff py-3" id="staff_div">
                                <label for="">Serving Staff</label>
                                <select class="form-control form-control-lg" id="delivery_man" name="hidden_staff_id">
                                    <option disabled selected>Select Serving Staff
                                    </option>
                                    @foreach ($staff as $staff)
                                        <option value="{{ $staff->staff_id }}">
                                            {{ $staff->staff_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="order-info">
                                <div class="card">
                                    <div class="card-header bg-info py-3">
                                        <h5 class="mb-0 text-white">Order Info</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3 row-deck">
                                            <h4>Order No : #<span id="invoice_unique_id"></span></h4>
                                            <h4>Order Type : <span id="order_type"></span></h4>
                                            <h4 id="rest_table">Table No : <span id="table_get_id"></span></h4>

                                            <input type="hidden" id="invoice_unique_inp" name="invoice_no">

                                            <div id="deliver_section">
                                                <h4 class="text-center text-danger"><strong>Delivery
                                                        Info</strong>
                                                </h4>
                                                <select class="form-control form-control-lg" id="delivery_man"
                                                    name="delivery_man">
                                                    <option disabled selected>Select Delivery Man
                                                    </option>
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

                            <div class="sticky-top sticky-right">


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
                                                    name="overall_discount" value="">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="py-lg-2 py-1 mt-0 mt-lg-3">
                                    <div class="card text-center bg-info text-white">

                                        <div class="card-body">
                                            <h6 class="d-flex flex-wrap justify-content-between">Sub
                                                Total :
                                                <strong id="invoiceSubTotal">0</strong>
                                                <input type="hidden" name="invoice_subtotal" id="invoice_subtotal_get"
                                                    value="">
                                            </h6>
                                            <h6 class="d-flex flex-wrap justify-content-between">Tax 5%
                                                :
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
                                            <h5 class="d-flex flex-wrap justify-content-between mt-1">
                                                Total :
                                                <strong id="grand_total_text">0</strong>

                                                <input type="hidden" name="grand_total" id="grand_total" value=""
                                                    readonly>
                                            </h5>
                                            <div class="payment mt-5 mb-5">
                                                <div class="row">
                                                    <h3 class="mb-3">Payment Method</h3>

                                                    <div class="col" id="pay_cash">
                                                        <label class="labl">
                                                            <input type="radio" name="payment_type" class="promil"
                                                                value="CASH" />
                                                            <div class="card-body">
                                                                <i class="fa fa-money fa-2x"></i>
                                                                <div class="fs-6 mt-3">Cash</div>
                                                            </div>
                                                        </label>
                                                    </div>


                                                    <div class="col" id="pay_bank">
                                                        <label class="labl">
                                                            <input type="radio" name="payment_type" class="promil"
                                                                value="BANK" />

                                                            <div class="card-body">
                                                                <i class="fa fa-credit-card-alt fa-2x"></i>
                                                                <div class="fs-6 mt-3">Bank</div>
                                                            </div>

                                                        </label>
                                                    </div>


                                                    <div class="col" id="pay_mobile_bank">
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
                                            <button type="submit" class="btn w-100"
                                                style="background:#ed0016;font-size:24px">Confirm
                                                Bill</button>
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

            $('.checkbox-tools').change(function() {
                let checked_val = $(this).val();


                if (checked_val == null) {
                    $('#category_items').hide();
                } else {
                    $('#category_items').show();
                }
                $('#table_get_id').text(checked_val);

            });








            var row_number = $(this).attr('rest-row');
            // alert(row_number);
            $('.billing-total-' + row_number).val(Math.round(
                get_product_price_total(row_number)));
            $('#invoiceSubTotal').val(Math.round(get_sub_total()));
            $('#invoice_subtotal_get').val(Math.round(get_sub_total()));
            $('#invoiceNetTotal').val(Math.round(get_net_total()));
            $('#due_amount').val(Math.round(get_net_total()));
            $('#invoiceDue').text(Math.round(get_net_total()));


        });


        $("#searchFood").keyup(function() {

            // Retrieve the input field text and reset the count to zero
            var filter = $(this).val(),
                count = 0;

            // Loop through the comment list
            $('.fulldiv').each(function() {


                // If the list item does not contain the text phrase fade it out
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).hide(); // MY CHANGE

                    // Show the list item if the phrase matches and increase the count by 1
                } else {
                    $(this).show(); // MY CHANGE
                    count++;
                }

            });

        });


        // $(document).ready(function() {
        //     $('.nav a').click(function(event) {
        //         // Prevent the default link behavior
        //         event.preventDefault();

        //         // Remove the "active" class from all navigation items
        //         $('.nav a').removeClass('active');

        //         // Add the "active" class to the clicked navigation item
        //         $(this).addClass('active');
        //     });
        // });
        $("#category_ul_menu li a").click(function() {
            $(this).parent().addClass('selected').siblings().removeClass('selected');

        });

        $('#category_items').hide();
        $('#searchFood').hide();
        $('#restaurant_tables').hide();
        $('#staff_div').hide();


        $("input:radio[name=customer_type]").click(function() {
            var customer_type = $(this).val();
            if (customer_type == 'dine_in') {
                $('#restaurant_tables').show();
                $('.dine_in').addClass('active');
                $('.take_out').removeClass('active');
                $('.food_delivery').removeClass('active');
                $('div#table_div').show();
                $('#order_type').text('Dine In');
                $('#rest_table').show();
                $('#staff_div').show();




            }



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





            if (customer_type == 'take_out') {
                $('.take_out').addClass('active');
                $('.dine_in').removeClass('active');
                $('.food_delivery').removeClass('active');
                $('div#table_div').hide();
                $('#rest_table').show();
                $('#staff_div').hide();




                $('#order_type').text('Take Out');
                $('#table_get_id').text('take out');
                $('#deliver_section').hide();
                $('#category_items').show();
                $('#searchFood').show();
                $('#restaurant_tables').hide();
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
                $('.food_delivery').addClass('active');
                $('.dine_in').removeClass('active');
                $('.take_out').removeClass('active');
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

            if (payment_type == 'BANK') {
                $("#pay_bank").css({
                    'border': '2px dashed #fff'
                });
                $("#pay_mobile_bank").css({
                    'border': ''
                });
                $("#pay_cash").css({
                    'border': ''
                });

            }


            if (payment_type == 'CASH') {
                $("#pay_bank").css({
                    'border': ''
                });
                $("#pay_mobile_bank").css({
                    'border': ''
                });
                $("#pay_cash").css({
                    'border': '2px dashed #fff'
                });

            }

            if (payment_type == 'MOBILE_BANKING') {
                $("#pay_bank").css({
                    'border': ''
                });
                $("#pay_mobile_bank").css({
                    'border': '2px dashed #fff'
                });
                $("#pay_cash").css({
                    'border': ''
                });

            }
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
            $('#rest_table_get').val(restaurant_table);

        });






        // let pro = $("input[name='radioname']").val();



        $('.get_product_cat').on('click', function(e) {
            e.preventDefault();

            let product_cat = $(this).attr('product_cat');
            let branch_id = $(this).attr('branch_id');


            $.ajax({
                type: "GET",
                // url: "{{ url('search-category-product') }}/" + product_cat + "/" + branch_id,
                url: "{{ url('search-category-product') }}/" + product_cat,
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
                            // '<img class="img-fluid"' +
                            // 'src = ' + proimgurl + product_image +
                            // ' width = "60">' +
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
                            '<input type="hidden" name="item_unit_price_' + billing_row +
                            '"class="form-control qty_get item_unit_price_' + billing_row +
                            '"step = "1"' +
                            'value=' + product_price +
                            ' ' +
                            '"placeholder = "pcs"' +
                            '" data-row="' +
                            billing_row +
                            '"style = "width: -webkit-fill-available">' +
                            '<span class="text-danger text-right">' + product_price +
                            '</span>' + '     X ' +
                            '<span class="total_quan_price_' + billing_row +
                            '" data-row="' +
                            billing_row + '">' +
                            1 +
                            '</span>' +
                            '</div>' +
                            '<div class="col-3">' +
                            '<input type="number" name="item_qty_' + billing_row +
                            '"class="form-control qty_get item_qty_' + billing_row +
                            '"step = "1"' +
                            'placeholder = "pcs"' +
                            'value ="1"' +
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
                            product_price +
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
                        // console.log(billing_content);
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
            });



        });






        $(document).on('click', '.delete-wpr', function() {
            $(this).parent().parent().remove();
        });



        $(document).ready(function() {
            $('div.delivery').hide();

            $('#delivery_man').on('change', function() {
                let delivery_man = $('#delivery_man').find(":selected").val();
                //alert(delivery_man);
                $.ajax({
                    method: "GET",
                    url: "{{ url('invoice/get-delivery-vehicle') }}" + '/' +
                        delivery_man,
                    success: function(data, textStatus, jqXHR) {
                        $('#vehicle').val(data);

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
                $('#invoice_subtotal_get').val(Math.round(get_sub_total()));
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

                $('#invoice_subtotal_get').val(Math.round(get_sub_total()));

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


                $('#grand_total').val(Math.round((((get_sub_total()) * (vat_rate / 100)) +
                        get_sub_total()) -
                    overall_discount));

                $('#grand_total_text').text(Math.round((((get_sub_total()) * (vat_rate / 100)) +
                        get_sub_total()) -
                    overall_discount));


                //var paid_amount = $('#paid_amount').val();
                //var grand_total = $('#grand_total').val();
                //$('#changed_amount').val(paid_amount - grand_total);

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
            let paid_amount = $('#paid_amount').val();
            let grand_total_text = $('#grand_total_text').text();


            if (clientName == '') {
                alert('Client Name Required');
            } else if (paid_amount < 0 || paid_amount < grand_total_text) {
                alert('Paying Amount Is not Valid');
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
