@extends('home')
@section('content')
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-body">
                <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>EXPENSE HEAD</th>
                            <th>EXPENSE SUBHEAD</th>
                            <th>EXPENSE AMOUNT</th>
                            <th>EXPENSE DATE</th>
                            <th>EXPENSE ACCOUNT</th>
                            <th>EXPENSE ACCOUNT LAST BAL.</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expense as $expense)
                            <tr>
                                <td class="sorting">{{ $loop->index + 1 }}</td>
                                <td>{{ getExpenseHead($expense->expense_head_id) }}</td>
                                <td>{{ getExpenseSubHead($expense->expense_sub_head_id) }}</td>
                                <td>{{ $expense->expense_amount }}</td>
                                <td>{{ $expense->expense_date }}</td>
                                <td>{{ getPaymentType($expense->expense_account) . '(' . $expense->expense_account . ')' }}
                                </td>
                                <td class="dt-body-right">
                                    {{ $expense->account_last_balance }}</td>
                                <td class="dt-body-right">
                                    {{-- <a href="{{ 'branch/' . $expense->expense_head_id . '/' . 'edit' }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="deleteNow({{ $expense->expense_sub_head_id }})">Delete</button>
                                    <a href="{{ 'branch/' . $expense->expense_account }}"
                                        class="btn btn-sm btn-info">View</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
