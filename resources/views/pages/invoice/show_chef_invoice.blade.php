<!DOCTYPE html>
<html lang="en">

@include('layouts.admin.headerlink')

@yield('content')

<?php
$company = \Illuminate\Support\Facades\DB::table('company_infos')->first();
$staff = \Illuminate\Support\Facades\DB::table('users')
    ->where('id', $pos_sale->staff_id)
    ->first();

//print_r($pos_sale);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div id="printableArea">
                <div class="logo text-center">
                    <br>
                    <img src="{{ asset('public/assets/logo.png') }}" alt="Your Company Logo">
                    <p>{{ $company->company_address }}</p>
                </div>
                <br>
                <h2 class="text-info text-center">Sell Invoice</h2>
                <div class="info text-center">
                    <h4>{{ $company->company_name }}</h4>
                    <b>Cell: {{ $company->company_phone }}</b>
                    <!--<p><b>BIN: {{ $pos_sale->bin_no }}</b></p>-->
                    <p>Invoice: {{ $pos_sale->invoice_no }}</p>
                </div>
                <div class="row">
                    <div class="col-6">
                        <ul style="list-style:none">
                            <li>Date: {{ $pos_sale->sales_date }}</li>
                            <li>Sale by: {{ $staff->name }}</li>
                        </ul>
                    </div>
                    <div class="col-6"></div>
                </div>
                <br>
                <div class="row">
                    <table class="table table-striped table-condensed content_table">

                        <tbody>
                            <tr>
                                <th width="5%">SL</th>
                                <!--<th width="15%">PO</th>-->
                                <th width="20%">Product</th>
                                <!--<th width="20%">Color</th>-->
                                <!--<th width="20%">Size</th>-->
                                <th width="10%">Qty</th>
                            </tr>

                            @foreach ($pos as $pos)
                                <tr class="item-row">
                                    <td class="item-name">

                                        {{ $loop->index + 1 }}

                                    </td>
                                    <td class="description">
                                        {{ $pos->product_name }}


                                    <td><span class="price">{{ $pos->quantity }}</span></td>
                                </tr>
                            @endforeach

                            <!-- <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> -->

                        </tbody>
                    </table>

                </div>
                <p class="text-center" style="font-size: 10px "> The goods can be exchange within next 7 days( Refund
                    within
                    3 days ).
                </p>
                <div class="order_barcodes text-center">
                    <span style="font-size:9px;"> <b>Software Developed By M360 ICT</b></span>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-larage btn-info mb-2" onclick="printDiv('printableArea')">Print</button>
                <a class="btn btn-larage btn-info mb-2" href="{{ url('chef-quity/' . $pos_sale->sale_id) }}"><button
                        class="btn btn-larage btn-info">Chef</button></a>

                <a class="btn btn-larage btn-primary mb-2" href="{{ url('invoice') }}">Back to Pos</a>
            </div>



        </div>
        <div class="col-4"></div>
    </div>
</div>

<script>
    function printDiv(elementId) {
        var divContents = document.getElementById(elementId).innerHTML;
        var a = window.open('', '', 'height=1200, width=1200');
        a.document.write('<html>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>
<!-- Jquery Page Js -->
@include('layouts.admin.footerlink')
