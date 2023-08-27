<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice</title>

    {{-- <link rel="stylesheet" type="text/css" media="print" href="{{ url('public/assets') }}/css/print.css"> --}}

    <?php
    $company = \Illuminate\Support\Facades\DB::table('company_infos')->first();
    $staff = \Illuminate\Support\Facades\DB::table('users')
        ->where('id', Auth::user()->id)
        ->first();
    $table = \Illuminate\Support\Facades\DB::table('restaurant_tables')
        ->where('restaurant_table_id', $pos_sale->restaurant_table_id)
        ->first();
    $staff = \Illuminate\Support\Facades\DB::table('staff')
        ->where('staff_id', $pos_sale->staff_id)
        ->first();
    $guest = \Illuminate\Support\Facades\DB::table('clients')
        ->where('client_id', $pos_sale->client_id)
        ->first();
    ?>
</head>

<body>
    <div class="restaurant-body">

        <div id="invoicePrint">
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');

                @media print {

                    /* All your print styles go here */
                    .header-top img {
                        width: 100%;
                    }

                    #footer {
                        display: none !important;
                    }
                }

                @media screen and (min-width: 1200px) {
                    body {

                        padding: 50px !important;
                        width: 40%;


                    }
                }

                @media screen and (min-width: 992px) {
                    body {

                        padding: 50px !important;
                        width: 50%;


                    }
                }


                body {
                    margin: 0 auto;
                    padding: 0;
                    font-family: 'Open Sans', sans-serif;
                    font-size: 12px;
                    font-weight: 300
                }

                @page {
                    size: 80mm;
                    margin-top: 0cm;
                    margin-left: 0cm;
                    margin-right: 0cm;
                }

                table {
                    width: 100%;
                }

                tr {
                    width: 100%;

                }

                .header-top {

                    text-align: center;
                    -webkit-align-content: center;
                    align-content: center;
                    display: block;
                    margin: 0 auto;


                }

                .header-top .logo {
                    width: 300PX;
                }

                header {
                    width: 100%;
                    text-align: center;
                    -webkit-align-content: center;
                    align-content: center;
                    vertical-align: middle;
                }

                .items thead {
                    text-align: center;
                }

                .center-align {
                    text-align: center;
                }

                .bill-details td {
                    font-size: 12px;
                }

                .receipt {
                    font-size: 13px;
                    text-transform: uppercase;
                }

                .items .heading {
                    font-size: 12.5px;
                    text-transform: uppercase;
                    border-top: 1px solid black;
                    margin-bottom: 4px;
                    border-bottom: 1px solid black;
                    vertical-align: middle;
                }

                .items thead tr th:first-child,
                .items tbody tr td:first-child {
                    width: 47%;
                    min-width: 47%;
                    max-width: 47%;
                    word-break: break-all;
                    text-align: left;
                }

                .items td {
                    font-size: 12px;
                    text-align: right;
                    vertical-align: bottom;
                }

                .price::before {
                    content: "\09F3";
                    font-family: Arial;
                    text-align: right;
                    margin-right: 5px;
                }

                .sum-up {
                    text-align: right !important;
                }

                .total {
                    font-size: 13px;
                    border-top: 1px dashed black !important;
                    border-bottom: 1px dashed black !important;
                }

                .total.text,
                .total.price {
                    text-align: right;
                    font-size: 13px;
                }

                .total.price::before {
                    content: "\09F3";
                    margin-right: 5px;
                }

                .line {
                    border-top: 1px solid black !important;
                }

                .heading.rate {
                    width: 20%;
                }

                .heading.amount {
                    width: 25%;
                }

                .heading.qty {
                    width: 5%
                }

                p {
                    padding: 1px;
                    margin: 0;
                }


                .bin-mus {
                    display: flex;
                    justify-content: center;
                }

                .bin-mus p:first-child {
                    margin-right: 10px;
                    border-right: 1px solid #000;
                    padding-right: 10px;
                }

                .border-dash {
                    border: 1px dashed #000;
                    display: block;

                }

                .paid {
                    font-size: 13px;
                    font-weight: 700;
                }

                .change {
                    font-size: 13px;
                    text-align: left;
                }

                .btn {
                    /* width: 100px; */
                    background: #df1717;
                    color: #fff;
                    padding: 10px;
                    text-decoration: none;
                    border: none;
                    cursor: pointer;
                    margin: 0 5px;
                }

                .token {
                    font-size: 18px;
                    font-weight: 800;
                    text-transform: uppercase;
                }
            </style>
            <header>
                <div class="header-top">
                    <img class="logo" src="{{ URL::to('/') . '/public/assets/' . $company->company_logo }}"
                        alt="{{ $company->company_name }}">
                    <p>{{ $company->company_address }}</p>
                    <p class="phone">
                        Phone# <span>{{ $company->company_phone }}</span>
                    </p>
                </div>
                <div class="bin-mus">
                    <p>BIN : <span>{{ $pos_sale->bin_no }}</span></p>
                    <p>Mussak : <span>49104871</span></p>
                </div>
            </header>
            <div class="border-dash"></div>

            <table class="bill-details">
                <tbody>
                    <tr>
                        <th colspan="2"><span style="font-size: 8px">Guest:<span class="receipt">
                                    <span style="font-size: 8px;font-weight:600">
                                        {{ $guest->client_name }}</span>

                                </span></th>
                        @if (@isset($table->restaurant_table_name))
                            <th colspan="2"><span style="font-size: 8px">Table:<span class="receipt">
                                        <span style="font-size: 8px;font-weight:600">
                                            {{ $table->restaurant_table_name }}</span>

                                    </span></th>
                        @else
                            <th colspan="2">Take Out Service<span class="receipt">
                                </span></th>
                        @endif
                        <th colspan="2"><span style="font-size: 8px">Bill By -</span> <span class="receipt">
                                <span style="font-size: 8px;font-weight:600"> {{ Auth::user()->name }}</span>

                            </span></th>
                        @if (@isset($pos_sale->staff_id))
                            <th colspan="2"><span style="font-size: 8px">Served By -</span> <span class="receipt">
                                    <span style="font-size: 8px;font-weight:600"> {{ $staff->staff_name }}</span>

                                </span></th>
                        @else
                            <th colspan="2"></th>
                        @endif
                    </tr>
                    <tr>
                        <td>Date : <span>{{ $pos_sale->sales_date }}</span></td>
                        <td>Time : <span>
                                @php
                                    date_default_timezone_set('Asia/Dacca');
                                @endphp
                                {{ date('h:i:sa') }}
                            </span></td>
                    </tr>
                    <tr>
                        <td>Invoice No : <span>{{ $pos_sale->invoice_no }}</span></td>
                        <td>Chalan No : <span>54546512154</span></td>
                    </tr>
                </tbody>
            </table>

            <table class="items">
                <thead>
                    <tr>
                        <th class="heading name">Item</th>
                        <th class="heading qty">Qty</th>
                        <th class="heading rate">PRICE</th>
                        <th class="heading amount">T. PRICE</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pos as $pos)
                        <tr>
                            <td>{{ $pos->food_item_name }}</td>
                            <td>{{ $pos->quantity }}</td>
                            <td class="price">{{ $pos->food_item_retail_price }}</td>
                            <td class="price">{{ $pos->sub_total }}</td>
                        </tr>
                    @endforeach
                    @php
                        $vat = $pos_sale->vat_amount;
                        $discount = $pos_sale->overall_discount;
                        $middle = $vat - $discount;
                        $sub = $pos_sale->grand_total - $middle;
                        $grand = $sub + $pos_sale->vat_amount;
                        
                    @endphp
                    <tr>
                        <td colspan="3" class="sum-up line"><b> GROSS TOTAL </b></td>
                        <td class="line price">{{ $sub }}</td>

                    </tr>
                    <tr>
                        <td colspan="3" class="sum-up">VAT : 5.00% :</td>
                        <td class="price">{{ $pos_sale->vat_amount }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="sum-up">Discount</td>
                        <td class="price">{{ $pos_sale->overall_discount }}</td>
                    </tr>

                    <tr>
                        <th colspan="1" class="total change">Change: <span
                                class="price">{{ $pos_sale->change }}</span>
                        </th>
                        <th colspan="2" class="total text">NET TOTAL</th>
                        <th class="total price">{{ $pos_sale->grand_total }}</th>
                    </tr>
                </tbody>
            </table>
            <section>
                <p class="paid">
                    Paid : <span>{{ getPaymentType($pos_sale->account) }}</span>
                </p>
                <p class="center-align">
                    THANK YOU, COME AGAIN
                </p>
            </section>
            <footer class="center-align">
                <p>Powered by: M360ICT, www.m360ict.com</p>

            </footer>
        </div>
        <div id="chefPrint">
            <style>
                body {
                    margin: 0 auto;
                    padding: 0;
                    font-family: 'Open Sans', sans-serif;
                    font-size: 12px;
                    font-weight: 300
                }



                table {
                    width: 100%;
                }

                tr {
                    width: 100%;

                }


                .items thead {
                    text-align: center;
                }

                .center-align {
                    text-align: center;
                }

                .bill-details td {
                    font-size: 12px;
                }


                .items .heading {
                    font-size: 12.5px;
                    text-transform: uppercase;
                    border-top: 1px solid black;
                    margin-bottom: 4px;
                    border-bottom: 1px solid black;
                    vertical-align: middle;
                }

                .items thead tr th:first-child,
                .items tbody tr td:first-child {
                    width: 47%;
                    min-width: 47%;
                    max-width: 47%;
                    word-break: break-all;
                    text-align: left;
                }

                .items td {
                    font-size: 12px;
                    text-align: right;
                    vertical-align: bottom;
                }


                .line {
                    border-top: 1px solid black !important;
                }

                .heading.rate {
                    width: 20%;
                }

                .heading.amount {
                    width: 25%;
                }

                .heading.qty {
                    width: 5%
                }

                p {
                    padding: 1px;
                    margin: 0;
                }

                .border-dash {
                    border: 1px dashed #000;
                    display: block;

                }
            </style>
            <p class="center-align">CHEF INVOICE</p>
            <div class="border-dash"></div>
            <p class="center-align">Invoice No : <span>{{ $pos_sale->invoice_no }}</span></p>
            <table class="items">
                <thead>
                    <tr>
                        <th class="heading name">Item</th>
                        <th class="heading qty">Qty</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pos_chef as $pos_chef)
                        <tr>
                            <td>{{ $pos_chef->product_name }}</td>
                            <td>{{ $pos_chef->quantity }}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <br>
        <br>
        <div id="tokenPrint">
            <style>
                body {
                    margin: 0 auto;
                    padding: 0;
                    font-family: 'Open Sans', sans-serif;
                    font-size: 12px;
                    font-weight: 300
                }

                p {
                    padding: 1px;
                    margin: 0;
                }

                .center-align {
                    text-align: center;
                }

                .bin-mus {
                    display: flex;
                    justify-content: center;
                }

                .bin-mus p:first-child {
                    margin-right: 10px;
                    border-right: 1px solid #000;
                    padding-right: 10px;
                }

                .token {
                    font-size: 18px;
                    font-weight: 800;
                    text-transform: uppercase;
                }
            </style>
            <div class="bin-mus">
                <p>Date : <span>{{ $pos_sale->sales_date }}</span></p>
                <p>Time : <span>
                        @php
                            date_default_timezone_set('Asia/Dacca');
                        @endphp
                        {{ date('h:i:sa') }}
                    </span></p>
            </div>
            <br>

            <p class="center-align token">Token No : <span>{{ $pos_sale->invoice_no }}</span></p>
            <br>
            <p class="center-align">
                THANKS. IT'S PLEASURE TO SERVE YOU
            </p>
        </div>
        <br>

        <div id="footer" class="btn-grop center-align">
            <button style="background-color: #4CAF50" class="btn" onclick="printDiv('invoicePrint')">Invoice
                Print</button>
            <button style="background-color: #171ddf" class="btn" onclick="printDiv('chefPrint')">Chef Print</button>
            <button style="background-color: #673AB7" class="btn" onclick="printDiv('tokenPrint')">Token
                Print</button>


            <a class="btn btn-larage btn-primary mb-2" href="{{ url('invoice/create') }}">Back to Pos</a>
        </div>



    </div>

    <script>
        function printDiv(elementId) {
            var divContents = document.getElementById(elementId).innerHTML;
            var a = window.open('', '', 'height=auto, width=80mm');
            a.document.write('<html>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>


</body>

</html>
