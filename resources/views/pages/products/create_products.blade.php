@extends('home')
@section('content')
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
                    <a class="btn btn-primary" href="{{ url('products/') . Auth::user()->unique_user_id }}"><i
                            class="fa fa-list me-2"></i>List Menu
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


                <!-- Form Validation -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Create Menu Item</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="product_form">
                                @csrf
                                @php
                                    $date = date('y-m-d');
                                @endphp
                                <input type="hidden" id="row" value="{{ $row_count }}">
                                <input type="hidden" id="date" value="{{ $date }}">
                                <input type="hidden" id="unique_user_id" value="{{ Auth::user()->unique_user_id }}">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control form-control-lg custom-select" name="product_category">
                                            <option value="" disabled selected>
                                                {{ __('Select Menu') }}
                                            </option>
                                            @foreach ($productCategory as $category)
                                                <option value="{{ $category->product_category_id }}">
                                                    {{ $category->product_category_name }}</option>
                                            @endforeach

                                        </select>
                                        <label class="form-label" for="TextInput">Product Menu</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="product_name"
                                            placeholder="Product Name" name="product_name">
                                        <label class="form-label" for="TextInput">Menu Item Name</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="product_entry_id"
                                            placeholder="Product Entry ID" name="product_entry_id" readonly>
                                        <label class="form-label" for="TextInput">Menu Item Entry ID</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="product_code"
                                            placeholder="Product Code" name="product_code" readonly>
                                        <label class="form-label" for="TextInput">Menu Item Code</label>
                                    </span>
                                </div>


                                {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="file-input" name="product_image"
                                            accept=".jpg,.png,.jpeg">
                                        <label class="form-label" for="product">Menu Item Image</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div id='img_contain'>
                                        <img id="image-preview"
                                            align='middle'src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png"
                                            alt="your image" title='' />
                                    </div>
                                </div> --}}
                                <div class="row">


                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <label for="exampleFormControlSelect1">
                                            <h4 class="text-danger">Select Ingredients</h4>
                                        </label>
                                        <input class="typeahead form-control" id="search" type="text">
                                    </div>
                                </div>




                                <table class="table table-bordered table-scroll mt-3" id="productTable">
                                    <thead>

                                        <tr>
                                            <th scope="col">Ingredients</th>
                                            <th scope="col">Current Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Enter Quantity</th>
                                            <th scope="col">Expense</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot id="tfoot">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><span class="font-weight-bold text-danger">Production Price</span></td>
                                            <td colspan="2"><strong id="production_price" class="text-info">0.00</strong>
                                                tk</td>

                                            <input type="hidden" name="production_price_inp" id="production_price_inp">
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="product_retail_price"
                                            placeholder="Product Retail Price" name="product_retail_price">
                                        <label class="form-label" for="TextInput">Menu Item Retail Price</label>
                                    </span>
                                </div>





                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- .row end -->



        </div>
    </div>
    <!-- end form section -->

    <script type="text/javascript">
        $("#search").autocomplete({
            source: function(request, response) {
                var auth = $('#unique_user_id').val();
                $.ajax({
                    url: "{{ url('search-term') }}" + '/' + auth,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                        console.log(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#search').val(ui.item.label);
                var billing_row = document.querySelectorAll('.billing-details-row').length + 1;
                $('#tfoot').show();
                var html =
                    '<tr class="item-row billing-details-row"><td class="billing_row">' +
                    ui.item.label +
                    '</td>' +
                    '<td><span data-row = "' + billing_row +
                    '" class="current_quan_' + billing_row +
                    '">' +
                    ui.item.purchase_product_quantity +
                    '(IN ' + ui.item.product_measure_status + ')' +
                    '</span></td>' +
                    '<td><span data-row = "' + billing_row +
                    '" class="current_price_' + billing_row +
                    '">' +
                    ui.item.purchase_product_price +
                    '</span></td>' +
                    '<td><input type="text" data-row = "' + billing_row +
                    '" class="enterqty enterd_quan_' + billing_row +
                    '" name="enterd_quan_' + billing_row +
                    '">' + ui.item.product_measure_status + '</td>' +
                    '<td><span data-row = "' + billing_row +
                    '" class="primary_total total_expense_' + billing_row +
                    '"></span></td>' +
                    '<input type="hidden" name="billing_rows[]" value="' + billing_row + '" />' +
                    '<input type="hidden" name="ingred_id_' + billing_row +
                    '"value="' + ui.item.product_id + '" />' +
                    '<td><button class="btn btn-danger remove"><i class="fa fa-times" aria-hidden="true"></i></button></td>' +
                    '</tr>';
                $('tbody').append(html);

                $(document).on('blur', '.enterqty', function() {
                    var billing_row = $(this).attr('data-row');


                    var check_stock = $('.available_qty_' + billing_row).val();
                    var check_input = $('.qty-' + billing_row).val();

                    var enterd_quan = $('.enterd_quan_' + billing_row).val();
                    var current_quan = parseFloat($('.current_quan_' + billing_row).text());
                    var current_price = parseFloat($('.current_price_' + billing_row).text());
                    var total = parseFloat(enterd_quan * current_price);
                    if (current_quan < enterd_quan) {
                        alert('Unavaible Quantity');
                        $('.enterd_quan_' + billing_row).val(0);
                        $('.total_expense_' + billing_row).text(parseFloat(0));
                        aFunc();
                    } else {
                        $('.total_expense_' + billing_row).text(total);
                        aFunc();
                    }



                });

                function aFunc() {
                    var a = 0;

                    $(".primary_total").each(function() {
                        a += parseFloat($(this).text());
                    });

                    $('#production_price').text(a);
                    $('#production_price_inp').val(a);
                }



                $(document).on('click', '.remove', function() {
                    $(this).parents('tr').remove();
                    aFunc();
                });
                console.log(ui.item);
                return false;
            }
        });
        // $(document).ready(function() {
        //     $('#tfoot').hide();
        //     $('#selectIngridents').change(function() {
        //         var optionSelected = $(this).find("option:selected");
        //         var valueSelected = optionSelected.val();
        //         var textSelected = optionSelected.text();
        //         var billing_row = document.querySelectorAll('.billing-details-row').length + 1;
        //         $('#tfoot').show();
        //         var html =
        //             '<tr class="item-row billing-details-row"><td class="billing_row">' +
        //             valueSelected +
        //             '</td>' +
        //             '<td><span data-row = "' + billing_row +
        //             '" class="current_quan_' + billing_row +
        //             '">10</span></td>' +
        //             '<td><input type="number" data-row = "' + billing_row +
        //             '" class="enterqty enterd_quan_' + billing_row +
        //             '" name="enterd_quan_' + billing_row +
        //             '"> pcs</td>' +
        //             '<td><span data-row = "' + billing_row +
        //             '" class="primary_total total_expense_' + billing_row +
        //             '"></span></td>' +
        //             '<td><button class="btn btn-danger remove"><i class="fa fa-times" aria-hidden="true"></i></button></td>' +
        //             '</tr>';
        //         $('tbody').append(html);
        //     });

        //     $(document).on('blur', '.enterqty', function() {
        //         var billing_row = $(this).attr('data-row');


        //         var check_stock = $('.available_qty_' + billing_row).val();
        //         var check_input = $('.qty-' + billing_row).val();

        //         var enterd_quan = $('.enterd_quan_' + billing_row).val();
        //         var current_quan = parseFloat($('.current_quan_' + billing_row).text());
        //         var total = parseFloat(enterd_quan * current_quan);
        //         if (current_quan < enterd_quan) {
        //             alert('Unavaible Quantity');
        //             $('.enterd_quan_' + billing_row).val(0);
        //             $('.total_expense_' + billing_row).text(parseFloat(0));
        //         } else {
        //             $('.total_expense_' + billing_row).text(total);
        //             aFunc();
        //         }



        //     });


        //     function aFunc() {
        //         var a = 0;

        //         $(".primary_total").each(function() {
        //             a += parseFloat($(this).text());
        //         });

        //         $('#production_price').text(a);
        //     }



        //     $(document).on('click', '.remove', function() {
        //         $(this).parents('tr').remove();
        //         aFunc();
        //     });
        // });





        $('#product_name').keyup(function() {
            let rand = $('#product_name').val();
            let date1 = $('#date').val();
            let row_val = parseFloat($('#row').val()) || 0;
            let x = Math.floor((Math.random() * 100000) + 1);
            let newdate = date1.replace(/-|\//g, "");
            let variable = newdate + (row_val + 1);

            $('#product_entry_id').val(rand + x);
            $('#product_code').val(variable);

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result);
                    $('#image-preview').hide();
                    $('#image-preview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file-input").change(function() {
            readURL(this);
        });



        $("#product_form").submit(function(e) {
            e.preventDefault();
            $(this).find(':input[type=submit]').prop('disabled', true);
            $(".error_msg").html('');
            $('.loader').show();
            var data = new FormData($('#product_form')[0]);
            var unique_user_id = $('#unique_user_id').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('products') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    $('.loader').hide();
                    console.log(data.food_id);
                    console.log(data.food_item_id);
                    window.location.href = "{{ url('products') }}"
                }
            }).done(function() {
                $("#success_msg").html("Data Save Successfully");
                $('.loader').hide();
                console.log(data.food_id);
                console.log(data.food_item_id);
                window.location.href = "{{ url('products') }}"
            }).fail(function(data, textStatus, jqXHR) {
                $("#loader").hide();
                $(this).find(':input[type=submit]').prop('enabled', true);
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                        value +
                        "</span>");
                });
            });
        });

        var uploadField = document.getElementById("filecheck");

        uploadField.onchange = function() {
            if (this.files[0].size > 2097152) {
                alert("File is too big!");
                this.value = "";
            };
        };
    </script>
@endsection
