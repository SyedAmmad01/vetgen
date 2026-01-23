    @extends('layouts.front')
    @section('page_title', 'All Remarks')

    @section('content')
        <section class="table-components">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title">
                                <h2>All Remarks</h2>
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
                                            Remarks
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
                                                    <h6>Query ID</h6>
                                                </th>
                                                <th>
                                                    <h6>Status</h6>
                                                </th>
                                                <th>
                                                    <h6>Remarks</h6>
                                                </th>
                                                <th>
                                                    <h6>Remarks Two</h6>
                                                </th>
                                                <th>
                                                    <h6>Remarks Three</h6>
                                                </th>
                                                <th>
                                                    <h6>Action</h6>
                                                </th>
                                            </tr>
                                            <!-- end table row-->
                                        </thead>
                                        <tbody>
                                            @foreach ($remarks as $remark)
                                                <tr>
                                                    <td class="min-width">
                                                        <p>{{ $remark->id }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $remark->query_id }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p><a href="#0">{{ $remark->status_name }}</a></p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $remark->remarks }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $remark->remarks_two }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $remark->remarks_three }}</p>
                                                    </td>
                                                    <td>
                                                        <div class="action">
                                                            <a href="{{ route('user.remarks.edit', ['id' => $remark->id]) }}"><i class="lni lni-pencil-alt"></i></a>
                                                            <form action="{{ route('user.remarks.destroy', $remark->id) }}"
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
