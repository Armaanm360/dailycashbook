<!-- Form section -->
<!-- start: page toolbar -->
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
        <div class="row g-3">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3> Datewise Sales Report</h3>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Branch</th>
                                    <th>Sales Type</th>
                                    <th>Invoice</th>
                                    <th>Date</th>
                                    <th>Sale Amount</th>
                                    <th>Service Charge</th>
                                    <th>Discount</th>
                            </thead>
                            <tbody>
                                @foreach ($ledger as $ledger)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $ledger->sponsor_ledger_date }}</td>
                                        <td>{{ $ledger->sponsor_ledger_type }}</td>
                                        <td>{{ $ledger->sponsor_ledger_money_receipt_id }}</td>
                                        <td>{{ $ledger->money_reciept_voucher_no }}</td>
                                        <td>{{ $ledger->money_reciept_total_discount }}</td>
                                        <td></td>
                                        <td>{{ $ledger->sponsor_ledger_last_balance }}</td>
                                        <td>{{ $ledger->sponsor_transaction_type }}</td>
                                        <td>{{ $ledger->sponsor_transaction_amount }}</td>
                                        <td>{{ $ledger->sponsor_ledger_last_balance }}</td>
                                        <td>{{ $ledger->sponsor_ledger_dr }}</td>
                                        <td>{{ $ledger->sponsor_ledger_cr }}</td>
                                        <td>{{ $ledger->sponsor_transaction_last_balance }}</td>



                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- start: page body -->

<!-- end form section -->



