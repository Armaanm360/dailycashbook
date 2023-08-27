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
                        <li class="breadcrumb-item"><a class="text-secondary">Report</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stock</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- start: page body -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-3">

                <table class="table table-striped" id="example">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">ITEM NAME</th>
                            <th scope="col">PURCHASE QUANTITY</th>
                            <th scope="col">SALE QUANTITY</th>
                            <th scope="col">PURCHASE PRICE</th>
                            <th scope="col">AVAILABLE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $data->product_name }}</td>
                                <td>{{ number_format($data->purchase_product_quantity, 2) }}</td>
                                <td>{{ number_format($data->purchase_product_quantity - $data->difference, 2) }}</td>
                                <td>{{ number_format($data->purchase_product_price * $data->purchase_product_quantity, 2) }}
                                </td>
                                <td>{{ $data->difference == null ? number_format($data->purchase_product_quantity, 2) : number_format($data->difference, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Form Validation -->

            </div> <!-- .row end -->

        </div>
    </div>
    <!-- end form section -->



    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
