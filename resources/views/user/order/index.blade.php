    @extends('layouts.front')
    @section('page_title', 'All Orders')

    <style>
        button {
            cursor: pointer;
        }
    </style>

    @section('content')
        <section class="table-components">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title">
                                <h2>All Orders</h2>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#0">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Orders
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->

                <!-- ========== tables-wrapper start ========== -->
                <div class="tables-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-style mb-30">
                                <div class="table-wrapper table-responsive">
                                    <div>
                                        <a href="{{ route('user.orders.create') }}" class="main-btn primary-btn btn-hover btn-sm mt-3">Create New
                                            Order</a>
                                    </div>
                                    &nbsp;
                                    <table class="table" id="myDataTable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h6>#</h6>
                                                </th>
                                                <th>
                                                    <h6>Date</h6>
                                                </th>
                                                <th>
                                                    <h6>Invoice No</h6>
                                                </th>
                                                <th>
                                                    <h6>Promo Code</h6>
                                                </th>
                                                <th>
                                                    <h6>Operator</h6>
                                                </th>
                                                <th>
                                                    <h6>Fumigation</h6>
                                                </th>
                                                <th>
                                                    <h6>Cleaning</h6>
                                                </th>
                                                <th>
                                                    <h6>Service Reference</h6>
                                                </th>
                                                <th>
                                                    <h6>Service Time</h6>
                                                </th>
                                                <th>
                                                    <h6>Customer</h6>
                                                </th>
                                                <th>
                                                    <h6>Address</h6>
                                                </th>
                                                <th>
                                                    <h6>Location</h6>
                                                </th>
                                                <th>
                                                    <h6>Contact</h6>
                                                </th>
                                                <th>
                                                    <h6>Amount</h6>
                                                </th>
                                                <th>
                                                    <h6>Service Status</h6>
                                                </th>
                                                <th>
                                                    <h6>Payment Status</h6>
                                                </th>
                                                <th>
                                                    <h6>Remarks</h6>
                                                </th>
                                                <th>
                                                    <h6>Attend ID</h6>
                                                </th>
                                                <th>
                                                    <h6>Action</h6>
                                                </th>
                                            </tr>
                                            <!-- end table row-->
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td class="min-width">
                                                        <p>{{ $order->id }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->date }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p><a href="#0">{{ $order->invoice_no }}</a></p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->promo_code }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->name }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->fumigation_name }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->cleaning_name }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->status_name }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->slot }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->customer }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->address }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->location }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->contact }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->amount }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->service_status }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->payment_status }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->remarks }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $order->attend_id }}</p>
                                                    </td>
                                                    <td>
                                                        <div class="action">
                                                            <a href="{{ route('user.invoices.invoice_generate_private', ['id' => $order->id]) }}" class="btn btn-success"
                                                                style="padding:3px 8px;font-size:8px;display:inline-block;"> Generate Invoice Private</a>
                                                                &nbsp;
                                                            <a href="{{ route('user.invoices.invoice_generate_srb', ['id' => $order->id]) }}" class="btn btn-info"
                                                                style="padding:3px 8px;font-size:8px;display:inline-block; color: white;"> Generate Invoice SRB</a>
                                                            &nbsp;
                                                            <a
                                                                href="{{ route('user.orders.edit', ['id' => $order->id]) }}"><i
                                                                    class="lni lni-pencil-alt"></i></a>
                                                            &nbsp;
                                                            <form action="{{ route('user.orders.destroy', $order->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    onclick="return confirm('Are you sure you want to delete this ?')"
                                                                    style="border:none; background:none;">
                                                                    <i class="lni lni-trash-can text-danger"></i>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- end table -->
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== tables-wrapper end ========== -->
            </div>
            <!-- end container -->
        </section>

    @endsection

    @section('page-scripts')

        <script type="text/javascript">
            $(document).ready(function() {
                $('#myDataTable').DataTable();
            });
        </script>

    @endsection
