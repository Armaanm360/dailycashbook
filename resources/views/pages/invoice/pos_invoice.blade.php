@extends('restaurant')
@section('content')
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="section pt-0">
        <div class="container-fluid">
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
                                <a href="">
                                    <div class="card bg-primary">
                                        <div class="card-body">
                                            <div class="avatar lg">
                                                <img class="img-fluid"
                                                    src="{{asset('public')}}/assets/img/ecommerce/Asset-1.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="card-body text-white">
                                            <h4 class="mb-1">$8.5k</h4>
                                            <span>Dine In</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <a href="#">
                                    <div class="card bg-danger">
                                        <div class="card-body text-white">
                                            <div class="avatar lg">
                                                <img class="img-fluid"
                                                    src="{{asset('public')}}/assets/img/ecommerce/Asset-3.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="card-body text-white">
                                            <h4 class="mb-1">$3.5k</h4>
                                            <span>Take Away</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <a href="#">
                                    <div class="card bg-warning">
                                        <div class="card-body">
                                            <div class="avatar lg">
                                                <img class="img-fluid"
                                                    src="{{asset('public')}}/assets/img/ecommerce/Asset-2.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="card-body text-white">
                                            <h4 class="mb-1">$2.5k</h4>
                                            <span>Home Delivery</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <a href="#">
                                    <div class="card bg-success">
                                        <div class="card-body">
                                            <div class="avatar lg">
                                                <i class="fa fa-bank fa-lg text-white"></i>
                                            </div>
                                        </div>
                                        <div class="card-body text-white">
                                            <h4 class="mb-1">$41.8k</h4>
                                            <span>Savings</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card fieldset border border-primary">
                        <span class="fieldset-tile text-primary bg-body">CATEGORY :</span>
                        <div class="owl-carousel owl-theme" id="recent_invoices">
                            <div class="item card ribbon">

                                <a href="#">
                                    <div class="card-body">
                                        <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">
                                            <img class="img-fluid"
                                                src="{{asset('public')}}/assets/img/ecommerce/Chinese.svg" alt="">
                                        </div>

                                        <h4>Chinese</h4>

                                    </div>
                                </a>
                            </div>
                            <div class="item card">
                                <a href="#">
                                    <div class="card-body">

                                        <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">
                                            <img class="img-fluid"
                                                src="{{asset('public')}}/assets/img/ecommerce/Indian.svg" alt="">
                                        </div>

                                        <h4>Indian</h4>

                                    </div>
                                </a>
                            </div>
                            <div class="item card">
                                <a href="#">
                                    <div class="card-body">
                                        <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">
                                            <img class="img-fluid"
                                                src="{{asset('public')}}/assets/img/ecommerce/Bangladeshi.svg" alt="">
                                        </div>

                                        <h4>Bangladeshi</h4>

                                    </div>
                                </a>
                            </div>
                            <div class="item card">
                                <a href="#">
                                    <div class="card-body">
                                        <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">
                                            <img class="img-fluid"
                                                src="{{asset('public')}}/assets/img/ecommerce/Thai.svg" alt="">
                                        </div>

                                        <h4>Thai</h4>

                                    </div>
                                </a>
                            </div>
                            <div class="item card">
                                <a href="#">
                                    <div class="card-body">
                                        <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">
                                            <img class="img-fluid"
                                                src="{{asset('public')}}/assets/img/ecommerce/Italian.svg" alt="">
                                        </div>

                                        <h4>Italian</h4>

                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="section bg-redish text-black card">
                        <div class="container-fluid">

                            <div class="row row-cols-2 row-cols-md-6">
                                <div class="col">
                                    <div class="bg-card p-3 rounded-3 text-center m-3 m-md-0">
                                        <a href="#">
                                            <img class="img-fluid rounded-5"
                                                src="{{asset('public')}}/assets/img/ecommerce/table01.png" alt="">
                                            <h4>Table 1</h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="bg-card p-3 rounded-3 text-center m-3 m-md-0">
                                        <a href="#">
                                            <img class="img-fluid rounded-5"
                                                src="{{asset('public')}}/assets/img/ecommerce/table02.png" alt="">
                                            <h4>Table 2</h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="bg-card p-3 rounded-3 text-center m-3 m-md-0">
                                        <a href="#">
                                            <img class="img-fluid rounded-5"
                                                src="{{asset('public')}}/assets/img/ecommerce/table03.png" alt="">
                                            <h4>Table 3</h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="bg-card p-3 rounded-3 text-center m-3 m-md-0">
                                        <a href="#">
                                            <img class="img-fluid rounded-5"
                                                src="{{asset('public')}}/assets/img/ecommerce/table04.png" alt="">
                                            <h4>Table 4</h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="bg-card p-3 rounded-3 text-center m-3 m-md-0">
                                        <a href="#">
                                            <img class="img-fluid rounded-5"
                                                src="{{asset('public')}}/assets/img/ecommerce/table05.png" alt="">
                                            <h4>Table 5</h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="bg-card p-3 rounded-3 text-center m-3 m-md-0">
                                        <a href="#">
                                            <img class="img-fluid rounded-5"
                                                src="{{asset('public')}}/assets/img/ecommerce/table06.png" alt="">
                                            <h4>Table 6</h4>
                                        </a>
                                    </div>
                                </div>
                            </div> <!-- .row end -->
                        </div>
                    </div>

                    <!-- start: page body -->
                    <div class="section food-iteam">
                        <div class="container-fluid">
                            <div class="row g-3">
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card product-card">
                                        <div class="card-body">
                                            <div class="product-img text-center">
                                                <img src="{{asset('public')}}/assets/img/ecommerce/1.png"
                                                    class="img-fluid" alt="">
                                                <div class="btn-hover text-center">
                                                    <button class="btn btn-primary me-1"><i
                                                            class="fa fa-plus"></i></button>
                                                    <button class="btn btn-primary cart-btn"><i
                                                            class="fa fa-shopping-cart"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-detail text-center pt-3">
                                                <h6><a href="#"><strong class="text-capitalize">Decoration
                                                            Item</strong></a></h6>
                                                <h6 class="mb-0"><del class="me-2">$25</del> <mark>$18</mark></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card product-card">
                                        <div class="card-body">
                                            <div class="product-img text-center">
                                                <img src="{{asset('public')}}/assets/img/ecommerce/2.png"
                                                    class="img-fluid" alt="">
                                                <div class="btn-hover text-center">
                                                    <button class="btn btn-primary me-1"><i
                                                            class="fa fa-plus"></i></button>
                                                    <button class="btn btn-primary cart-btn"><i
                                                            class="fa fa-shopping-cart"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-detail text-center pt-3">
                                                <h6><a href="#"><strong class="text-capitalize">Wooden Chair -
                                                            Black</strong></a></h6>
                                                <h6 class="mb-0"><del class="me-2">$25</del> <mark>$18</mark></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card product-card">
                                        <div class="card-body">
                                            <div class="product-img text-center">
                                                <img src="{{asset('public')}}/assets/img/ecommerce/3.png"
                                                    class="img-fluid" alt="">
                                                <div class="btn-hover text-center">
                                                    <button class="btn btn-primary me-1"><i
                                                            class="fa fa-plus"></i></button>
                                                    <button class="btn btn-primary cart-btn"><i
                                                            class="fa fa-shopping-cart"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-detail text-center pt-3">
                                                <h6><a href="#"><strong class="text-capitalize">Wall Clock</strong></a>
                                                </h6>
                                                <h6 class="mb-0"><del class="me-2">$25</del> <mark>$18</mark></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card product-card">
                                        <div class="card-body">
                                            <div class="product-img text-center">
                                                <img src="{{asset('public')}}/assets/img/ecommerce/4.png"
                                                    class="img-fluid" alt="">
                                                <div class="btn-hover text-center">
                                                    <button class="btn btn-primary me-1"><i
                                                            class="fa fa-plus"></i></button>
                                                    <button class="btn btn-primary cart-btn"><i
                                                            class="fa fa-shopping-cart"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-detail text-center pt-3">
                                                <h6><a href="#"><strong class="text-capitalize">traveller
                                                            bag</strong></a></h6>
                                                <h6 class="mb-0"><del class="me-2">$25</del> <mark>$18</mark></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card product-card">
                                        <div class="card-body">
                                            <div class="product-img text-center">
                                                <img src="{{asset('public')}}/assets/img/ecommerce/5.png"
                                                    class="img-fluid" alt="">
                                                <div class="btn-hover text-center">
                                                    <button class="btn btn-primary me-1"><i
                                                            class="fa fa-plus"></i></button>
                                                    <button class="btn btn-primary cart-btn"><i
                                                            class="fa fa-shopping-cart"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-detail text-center pt-3">
                                                <h6><a href="#"><strong class="text-capitalize">Water Jug</strong></a>
                                                </h6>
                                                <h6 class="mb-0"><del class="me-2">$25</del> <mark>$18</mark></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card product-card">
                                        <div class="card-body">
                                            <div class="product-img text-center">
                                                <img src="{{asset('public')}}/assets/img/ecommerce/6.png"
                                                    class="img-fluid" alt="">
                                                <div class="btn-hover text-center">
                                                    <button class="btn btn-primary me-1"><i
                                                            class="fa fa-plus"></i></button>
                                                    <button class="btn btn-primary cart-btn"><i
                                                            class="fa fa-shopping-cart"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-detail text-center pt-3">
                                                <h6><a href="#"><strong class="text-capitalize">Wooden
                                                            Decoration</strong></a></h6>
                                                <h6 class="mb-0"><del class="me-2">$25</del> <mark>$18</mark></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card product-card">
                                        <div class="card-body">
                                            <div class="product-img text-center">
                                                <img src="{{asset('public')}}/assets/img/ecommerce/7.png"
                                                    class="img-fluid" alt="">
                                                <div class="btn-hover text-center">
                                                    <button class="btn btn-primary me-1"><i
                                                            class="fa fa-plus"></i></button>
                                                    <button class="btn btn-primary cart-btn"><i
                                                            class="fa fa-shopping-cart"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-detail text-center pt-3">
                                                <h6><a href="#"><strong class="text-capitalize">Laptop
                                                            Pouch</strong></a></h6>
                                                <h6 class="mb-0"><del class="me-2">$25</del> <mark>$18</mark></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card product-card">
                                        <div class="card-body">
                                            <div class="product-img text-center">
                                                <img src="{{asset('public')}}/assets/img/ecommerce/8.png"
                                                    class="img-fluid" alt="">
                                                <div class="btn-hover text-center">
                                                    <button class="btn btn-primary me-1"><i
                                                            class="fa fa-plus"></i></button>
                                                    <button class="btn btn-primary cart-btn"><i
                                                            class="fa fa-shopping-cart"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-detail text-center pt-3">
                                                <h6><a href="#"><strong class="text-capitalize">stationery
                                                            pouch</strong></a></h6>
                                                <h6 class="mb-0"><del class="me-2">$25</del> <mark>$18</mark></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- .row end -->
                        </div>
                    </div>
                    <!--  Section: Hero Section  -->
                    <div class="hero bg-light-success d-flex align-items-center rounded-3" id="hero">
                        <div class="container">
                            <div class="owl-carousel owl-theme" id="owl_banner">
                                <div class="item">
                                    <div class="overflow-hidden">
                                        <div class="row g-3 py-0 py-md-5 align-items-center justify-content-between">
                                            <div class="col-xxl-5 col-lg-6 col-md-12">
                                                <h5 class="color-900">Spacial Offer 10% Off Today.</h5>
                                                <h2 class="bg-text color-900">MEDIUM PIZZA! <span
                                                        class="text-gradient fw-bold">DELICIOUS</span></h2>
                                                <p class="color-500 lead mb-4">*Additional charge for premium toppings.
                                                    Minimum of 2 required</p>
                                                <a href="#"
                                                    class="btn btn-lg bg-secondary text-white text-uppercase fs-6">Shop
                                                    Now</a>
                                            </div>
                                            <div class="col-xxl-5 col-lg-6 col-md-12">
                                                <img class="img-fluid"
                                                    src="{{asset('public')}}/assets/img/ecommerce/1.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="overflow-hidden">
                                        <div class="row g-3 py-0 py-md-5 align-items-center justify-content-between">
                                            <div class="col-xxl-5 col-lg-6 col-md-12">
                                                <h5 class="color-900">Spacial Offer 10% Off Today.</h5>
                                                <h2 class="bg-text color-900">MEDIUM PIZZA! <span
                                                        class="text-gradient fw-bold">DELICIOUS</span></h2>
                                                <p class="color-500 lead mb-4">*Additional charge for premium toppings.
                                                    Minimum of 2 required</p>
                                                <a href="#"
                                                    class="btn btn-lg bg-secondary text-white text-uppercase fs-6">Shop
                                                    Now</a>
                                            </div>
                                            <div class="col-xxl-5 col-lg-6 col-md-12">
                                                <img class="img-fluid"
                                                    src="{{asset('public')}}/assets/img/ecommerce/2.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="overflow-hidden">
                                        <div class="row g-3 py-0 py-md-5 align-items-center justify-content-between">
                                            <div class="col-xxl-5 col-lg-6 col-md-12">
                                                <h5 class="color-900">Spacial Offer 10% Off Today.</h5>
                                                <h2 class="bg-text color-900">MEDIUM PIZZA! <span
                                                        class="text-gradient fw-bold">DELICIOUS</span></h2>
                                                <p class="color-500 lead mb-4">*Additional charge for premium toppings.
                                                    Minimum of 2 required</p>
                                                <a href="#"
                                                    class="btn btn-lg bg-secondary text-white text-uppercase fs-6">Shop
                                                    Now</a>
                                            </div>
                                            <div class="col-xxl-5 col-lg-6 col-md-12">
                                                <img class="img-fluid"
                                                    src="{{asset('public')}}/assets/img/ecommerce/3.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sticky-top sticky-right">
                        <div class="mt-0">
                            <div class="card bg-violet text-white">
                                <div class="card-header bg-transparent py-3">
                                    <h5 class="mb-0">Order No: #12345678</h5>
                                </div>
                                <div class="card-body">
                                    <form class="row g-3">
                                        <div class="col-lg-12">
                                            <label class="form-label">Customer Name</label>
                                            <fieldset class="form-icon-group left-icon position-relative">
                                                <input type="text" class="form-control">
                                                <div class="form-icon position-absolute">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                    </svg>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">Phone Number</label>
                                            <fieldset class="form-icon-group left-icon position-relative">
                                                <input type="text" class="form-control phone-number"
                                                    placeholder="Ex: (000) 000-00-00">
                                                <div class="form-icon position-absolute">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                    </svg>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="py-lg-2 py-1 mt-0 mt-lg-3">
                            <div class="card">
                                <div class="card-header bg-transparent py-3">
                                    <h5 class="mb-0">My Order 😎</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 row-deck">
                                        <div class="col-sm-12">
                                            <div class="d-flex align-items-center fs-5 mb-3">
                                                <div class="rounded no-thumbnail"><img class="img-fluid"
                                                        src="{{asset('public')}}/assets/img/ecommerce/4.png" width="60"
                                                        alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <div class="h6 mb-2">Bag</div>
                                                    <div class="h6 mb-0 text-success">$19.49 X 2 =
                                                        <strong>$38.98</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="d-flex align-items-center fs-5 mb-3">
                                                <div class="rounded no-thumbnail"><img class="img-fluid"
                                                        src="{{asset('public')}}/assets/img/ecommerce/5.png" width="60"
                                                        alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <div class="h6 mb-2">Water Bottel</div>
                                                    <div class="h6 mb-0 text-success">$49.99 X 1 =
                                                        <strong>$49.99</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="d-flex align-items-center fs-5 mb-3">
                                                <div class="rounded no-thumbnail"><img class="img-fluid"
                                                        src="{{asset('public')}}/assets/img/ecommerce/6.png" width="60"
                                                        alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <div class="h6 mb-2">Wooden</div>
                                                    <div class="h6 mb-0 text-success">$22.00 X 1 =
                                                        <strong>$22.00</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="d-flex align-items-center fs-5 mb-3">
                                                <div class="rounded no-thumbnail"><img class="img-fluid"
                                                        src="{{asset('public')}}/assets/img/ecommerce/1.png" width="60"
                                                        alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <div class="h6 mb-2">Light</div>
                                                    <div class="h6 mb-0 text-success">$89.99 X 2 =
                                                        <strong>$179.89</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="d-flex align-items-center fs-5 mb-3">
                                                <div class="rounded no-thumbnail"><img class="img-fluid"
                                                        src="{{asset('public')}}/assets/img/ecommerce/2.png" width="60"
                                                        alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <div class="h6 mb-2">Chair</div>
                                                    <div class="h6 mb-0 text-success">$25.00 X 2 =
                                                        <strong>$50.00</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="d-flex align-items-center fs-5 mb-3">
                                                <div class="rounded no-thumbnail"><img class="img-fluid"
                                                        src="{{asset('public')}}/assets/img/ecommerce/3.png" width="60"
                                                        alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <div class="h6 mb-2">Clock</div>
                                                    <div class="h6 mb-0 text-success">$11.49 X 2 =
                                                        <strong>$22.98</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-lg-2 py-1 mt-0 mt-lg-3">
                            <div class="card text-center bg-yello text-white">

                                <div class="card-body">
                                    <h6 class="d-flex flex-wrap justify-content-between">Sub Total :
                                        <strong>$1655</strong></h6>
                                    <h6 class="d-flex flex-wrap justify-content-between">Tax 10% : <strong>$165</strong>
                                    </h6>
                                    <div class="progress" style="height: 1px;">
                                        <div class="progress-bar bg-light" role="progressbar" aria-valuenow="100"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                    <h5 class="d-flex flex-wrap justify-content-between mt-1">Total :
                                        <strong>$363.93</strong></h5>
                                    <div class="payment mt-5 mb-5">
                                        <div class="row">
                                            <h3 class="mb-3">Payment Method</h3>
                                            <div class="col">
                                                <a href="#" class="card text-center py-0 py-lg-2 bg-primary text-light">
                                                    <div class="card-body">
                                                        <i class="fa fa-money fa-2x"></i>
                                                        <div class="fs-6 mt-3">Cash</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="#"
                                                    class="card text-center py-0 py-lg-2 chart-color3 text-light">
                                                    <div class="card-body">
                                                        <i class="fa fa-credit-card-alt fa-2x"></i>
                                                        <div class="fs-6 mt-3">Card</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="#"
                                                    class="card text-center py-0 py-lg-2 chart-color4 text-light">
                                                    <div class="card-body">
                                                        <i class="fa fa-th-large fa-2x"></i>
                                                        <div class="fs-6 mt-3">E-Wallet</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-danger w-100">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
