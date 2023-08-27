

@extends('home')


@section('content')
<!-- Form section -->
<!-- start: page toolbar -->
<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
    <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{url('/accounts')}}">Cashbook</a></li>
                    <li class="breadcrumb-item active">Create Opening Account</li>
                </ol>
            </div>
        </div> <!-- .row end -->
        <div class="row align-items-center">
            <div class="col">
                <h1 class="fs-5 color-900 mt-1 mb-0">Create Account Opening Balance !</h1>
                <small class="text-muted"><div id="MyClockDisplay" class="clock" onload="showTime()"></div> </small>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0">
                <!-- daterange picker -->
                <div class="input-group">           
                    <button class="btn btn-secondary" style="margin-left: 46%;" type="button" data-bs-toggle="tooltip" title="List of Account"><a style="color: white" href="{{url('accounts')}}">List of Account</a><i
                            class="fa fa-envelope"></i></button>

                </div>
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
                        <h4>Account Information</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 maskking-form" id="accountForm">
                            @csrf
                            <div class="col-lg-6 col-sm-12">
                                <span class="float-label">
                                    <input type="text" class="form-control form-control-lg" id="account_name"
                                           placeholder="Name" name="account_name">
                                    <input type="hidden" class="form-control form-control-lg" id="HiddenAccountId"
                                           name="transaction_account_id">
                                    <label class="form-label" for="transaction_account_id">Name</label>
                                </span>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <label class="form-group float-label">
                                    <select class="form-control form-control-lg custom-select"
                                            name="transaction_method" id="opbalance">
                                        <option value="" disabled selected>
                                            Select Account Type
                                        </option>
                                        <option value="CASH">Cash</option>
                                        <option value="BANK">Bank</option>
                                        <option value="MOBILE_BANKING">Mobile Banking</option>
                                    </select>
                                    <span>Account Type</span>
                                </label>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <span class="float-label">
                                    <input type="number" class="form-control form-control-lg" id="amount"
                                           placeholder="Amount" name="transaction_amount">
                                    <label class="form-label" for="TextInput">Amount</label>
                                </span>
                            </div>                            
                            <div class="col-lg-6 col-sm-12">
                                <span class="float-label">
                                    <input type="text" class="form-control form-control-lg" id="note"
                                           placeholder="Note" name="transaction_note">
                                    <label class="form-label" for="transaction_note">Note</label>
                                </span>
                            </div>

                            <div class="col-lg-6 col-sm-12">
                                <button type="submit" class="btn btn-primary" style="width: 100%; height:100%;">Submit</button>
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
        

        $("#accountForm").submit(function(e) {
            e.preventDefault();
            $('.loader').show();
            let submitButton = $(this).find(':input[type=submit]');
            submitButton.prop('disabled', true);
            $(".error_msg").html('');
            
            var data = new FormData($('#accountForm')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('account/save-opening-balance') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {   
                    $('.loader').hide();
                    window.location.href = "{{ url('accounts') }}";
                }
            }).done(function() {
                $("#success_msg").html("Data Save Successfully");
                $('.loader').hide();                
                window.location.href = "{{ url('accounts') }}";
                // location.reload();
            }).fail(function(data, textStatus, jqXHR) {
                $(".loader").hide();
                submitButton.prop('disabled', false);
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" + value +
                        "</span>");
                });
            });
        });
        
        $(document).ready(function() {
        $('#account_name').autocomplete({
            html: true,
            source: function(request, response) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('search-account') }}",
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
                $('#HiddenAccountId').val(ui.item.value);
                return false;
            },
            minLength: 1,
            open: function() {

                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function() {

                if ($('#HiddenAccountId').val() == '') {
                    $(this).val('');
                    $('#HiddenAccountId').val('');
                }
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
        });
    </script>
@endsection
