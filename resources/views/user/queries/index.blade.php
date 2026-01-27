    @extends('layouts.front')
    @section('page_title', 'All Queries')

    @section('content')
        <section class="table-components">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title">
                                <h2>All Queries</h2>
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
                                            Queries
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
                                    <table class="table" id="myDataTable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h6>#</h6>
                                                </th>
                                                <th>
                                                    <h6>Name</h6>
                                                </th>
                                                <th>
                                                    <h6>Phone</h6>
                                                </th>
                                                <th>
                                                    <h6>Email</h6>
                                                </th>
                                                <th>
                                                    <h6>Service</h6>
                                                </th>
                                                <th>
                                                    <h6>Services</h6>
                                                </th>
                                                <th>
                                                    <h6>City</h6>
                                                </th>
                                                <th>
                                                    <h6>Area</h6>
                                                </th>
                                                <th>
                                                    <h6>Property Type</h6>
                                                </th>
                                                <th>
                                                    <h6>Status</h6>
                                                </th>
                                                <th>
                                                    <h6>Action</h6>
                                                </th>
                                            </tr>
                                            <!-- end table row-->
                                        </thead>
                                        <tbody>
                                            @foreach ($queries as $query)
                                                <tr>
                                                    <td class="min-width">
                                                        <p>{{ $query->id }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $query->name }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p><a href="#0">{{ $query->phone }}</a></p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $query->email }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $query->service }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $query->services }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $query->city }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $query->area }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $query->property_type }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        @if ($query->attend == 1)
                                                            <span class="btn btn-sm btn-success" style="padding:3px 8px;font-size:12px;display:inline-block;">Attended</span>
                                                        @else
                                                            <span class="btn btn-sm btn-danger" style="padding:3px 8px;font-size:10px;display:inline-block;">Not Attended</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="action">
                                                            <a href="{{ route('user.orders.add', ['id' => $query->id]) }}"
                                                                class="btn btn-success"
                                                                style="padding:3px 8px;font-size:10px;display:inline-block;">Make
                                                                Order</a>
                                                            &nbsp;
                                                            <a href="{{ route('user.survey.book', ['id' => $query->id]) }}"
                                                                class="btn btn-primary"
                                                                style="padding:3px 8px;font-size:10px;display:inline-block;">Book
                                                                Survey</a>
                                                            &nbsp;
                                                            <a href="{{ route('user.remarks.customer', ['id' => $query->id]) }}"
                                                                class="btn btn-primary"
                                                                style="padding:3px 8px;font-size:12px;display:inline-block;">
                                                                Remarks</a>
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @section('page-scripts')

        <script type="text/javascript">
            $(document).ready(function() {
                $('#myDataTable').DataTable();
            });
        </script>

    @endsection
