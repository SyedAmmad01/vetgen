    @extends('layouts.front')
    @section('page_title', 'All Surveys')

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
                                <h2>All Surveys</h2>
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
                                            Surveys
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
                                                    <h6>Survey Number</h6>
                                                </th>
                                                <th>
                                                    <h6>Date</h6>
                                                </th>
                                                <th>
                                                    <h6>Services</h6>
                                                </th>
                                                <th>
                                                    <h6>Contact Person</h6>
                                                </th>
                                                <th>
                                                    <h6>Contact Details</h6>
                                                </th>
                                                <th>
                                                    <h6>Time</h6>
                                                </th>
                                                <th>
                                                    <h6>Address</h6>
                                                </th>
                                                <th>
                                                    <h6>Assign To</h6>
                                                </th>
                                                <th>
                                                    <h6>Amount</h6>
                                                </th>
                                                <th>
                                                    <h6>Status</h6>
                                                </th>
                                                <th>
                                                    <h6>Company Name</h6>
                                                </th>
                                                <th>
                                                    <h6>Current Status</h6>
                                                </th>
                                                <th>
                                                    <h6>Action</h6>
                                                </th>
                                            </tr>
                                            <!-- end table row-->
                                        </thead>
                                        <tbody>
                                            @foreach ($surveys as $survey)
                                                <tr>
                                                    <td class="min-width">
                                                        <p>{{ $survey->id }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $survey->survey_number }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p><a href="#0">{{ $survey->date }}</a></p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $survey->service_name }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $survey->contact_person }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $survey->contact_details }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $survey->time }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $survey->address }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $survey->assign_to }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $survey->amount }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $survey->status_name }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $survey->company_name }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $survey->current_status }}</p>
                                                    </td>
                                                    <td>
                                                        <div class="action">
                                                            <a href="{{ route('user.survey.edit', $survey->id) }}"><i
                                                                    class="lni lni-pencil-alt"></i></a>
                                                            <form action="{{ route('user.survey.destroy', $survey->id) }}"
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
