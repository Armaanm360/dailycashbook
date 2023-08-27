            {{-- page start --}}
            <style>
                .card-body-2 {
                    padding: 5px 10px;
                }

                section#dummy {
                    height: 85%;
                    overflow-x: hidden;
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
            <section id="dummy">
                <div
                    class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1 g-2 mt-4 mb-4 row-deck res-section justify-content-center">
                    <div class="col">
                        <a href="{{ url('/invoice/create') }}">
                            <div class="card overflow-hidden">
                                <div class="card-body py-4">

                                    <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_edtbqyym.json"
                                        background="transparent" speed="1" style="width: 300px; height: 300px;" loop
                                        autoplay></lottie-player>
                                    {{-- <img class="img-fluid"
                                    src="{{asset('public')}}/assets/img/restaurant/restaurant-img-2.jpg" alt="Pos">
                                --}}
                                </div>
                                <div class="card-footer border-0">
                                    <h5><i class="fa fa-cart-plus"></i> Pos </h5>
                                    <span class="res-title"> Point of Sale</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ url('products') }}">
                            <div class="card overflow-hidden">
                                <div class="card-body py-4">

                                    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_4L6JjAIiVL.json"
                                        background="transparent" speed="1" style="width: 300px; height: 300px;"
                                        loop autoplay></lottie-player>
                                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                    {{-- <img class="img-fluid"
                                    src="{{asset('public')}}/assets/img/restaurant/restaurant-img-9.jpg" alt="Pos">
                                --}}
                                </div>
                                <div class="card-footer border-0">

                                    <h5 class="text-danger"><i class="fa fa-coffee"></i> Kitchen </h5>
                                    <span class="res-title"> Kitchen</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="{{ url('ingredients/create') }}">
                            <div class="card overflow-hidden">
                                <div class="card-body py-4">

                                    <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_p1bmwqtk.json"
                                        background="transparent" speed="1" style="width: 300px; height: 300px;"
                                        loop autoplay></lottie-player>
                                    {{-- <img class="img-fluid"
                                    src="{{asset('public')}}/assets/img/restaurant/restaurant-img-2.jpg" alt="Pos">
                                --}}
                                </div>
                                <div class="card-footer border-0">
                                    <h5><i class="fa fa-cart-plus"></i> ingredients </h5>
                                    <span class="res-title"> Ingredients </span>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col">
                        <a href="{{ url('purchases') }}">
                            <div class="card overflow-hidden">
                                <div class="card-body py-4">

                                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_skfh9odt.json"
                                        background="transparent" speed="1" style="width: 300px; height: 300px;"
                                        loop autoplay></lottie-player>
                                    {{-- <img class="img-fluid"
                                    src="{{asset('public')}}/assets/img/restaurant/restaurant-img-6.jpg" alt="Pos">
                                --}}
                                </div>
                                <div class="card-footer border-0">
                                    <h5 class="text-primary"><i class="fa fa-power-off"></i> Purchase </h5>
                                    <span class="res-title"> Purchase</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div
                    class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1 g-2 mt-4 mb-4 row-deck res-section justify-content-center">

                    <div class="col">
                        <a href="{{ url('stock') }}">
                            <div class="card overflow-hidden">
                                <div class="card-body py-4">


                                    <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_jrgpo6ko.json"
                                        background="transparent" speed="1" style="width: 300px; height: 300px;"
                                        loop autoplay></lottie-player>
                                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                    {{-- <img class="img-fluid"
                                    src="{{asset('public')}}/assets/img/restaurant/restaurant-img-9.jpg" alt="Pos">
                                --}}
                                </div>
                                <div class="card-footer border-0">

                                    <h5 class="text-danger"><i class="fa fa-coffee"></i> Inventory </h5>
                                    <span class="res-title"> Inventory</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#">
                            <div class="card overflow-hidden">

                                <div class="card-body py-4">

                                    <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_hSevJIQ2Wm.json"
                                        background="transparent" speed="1" style="width: 300px; height: 300px;"
                                        loop autoplay></lottie-player>
                                    {{-- <img class="img-fluid"
                                    src="{{asset('public')}}/assets/img/restaurant/restaurant-img-7.jpg" alt="Pos">
                                --}}
                                </div>
                                <div class="card-footer border-0">
                                    <h5 class="text-success"><i class="fa fa-clock-o"></i> Reports </h5>
                                    <span class="res-title"> Reports</span>
                                </div>
                            </div>
                        </a>
                    </div>



                    <div class="col">

                        <a href="#">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <div class="card overflow-hidden">
                                    <div class="card-body py-4">

                                        <lottie-player
                                            src="https://assets1.lottiefiles.com/datafiles/xjFX0JCCOm2Lhp1/data.json"
                                            background="transparent" speed="1" style="width: 300px; height: 300px;"
                                            loop autoplay></lottie-player>
                                        {{-- <img class="img-fluid"
                                    src="{{asset('public')}}/assets/img/restaurant/restaurant-img-6.jpg" alt="Pos">
                                --}}
                                    </div>
                                    <div class="card-footer border-0">
                                        <h5 class="text-primary"><i class="fa fa-power-off"></i> Logout </h5>
                                        <span class="res-title"> Logout</span>
                                    </div>
                                </div>
                            </form>
                        </a>
                    </div>
                </div>
            </section>

            {{-- end page start --}}
