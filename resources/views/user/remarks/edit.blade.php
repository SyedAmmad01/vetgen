@extends('layouts.front')
@section('page_title', 'Edit Remarks')

@section('content')
    <section class="tab-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Edit Remarks</h2>
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
                                    <li class="breadcrumb-item"><a href="#0">Remarks</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Edit Remarks
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

            <!-- ========== form-elements-wrapper start ========== -->

            <div class="row">
                @if (Session::has('success'))
                    <div class="alert-box success-alert">
                        <div class="alert">
                            <p class="text-medium">
                                {{ Session::get('success') }}
                            </p>
                        </div>
                    </div>
                @endif

                @if (Session::has('msg'))
                    <div class="alert-box danger-alert">
                        <div class="alert">
                            <p class="text-medium">
                                {{ Session::get('msg') }}
                            </p>
                        </div>
                    </div>
                @endif
            </div>

            <form class="form-validate" action="{{ route('user.remarks.update') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-elements-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- input style start -->
                            <div class="card-style mb-30">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="" selected disabled>- Select -</option>
                                                @foreach ($status as $stat)
                                                    <option value="{{ $stat->id }}" {{ $remarks->status == $stat->id ? 'selected' : '' }}>{{ $stat->status_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" id="id" name="id" value="{{ $remarks->id }}"/>


                                    <input type="hidden" id="query_id" name="query_id" value="{{ $remarks->query_id }}"/>


                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Remarks</label>
                                            <select name="remarks" id="remarks" class="form-control">
                                                <option value="" selected disabled>- Select -</option>
                                                <option value="First remarks" {{ $remarks->remarks == 'First remarks' ? 'selected' : '' }}>First remarks</option>
                                                <option value="Not answering" {{ $remarks->remarks == 'Not answering' ? 'selected' : '' }}>Not answering</option>
                                                <option value="Only for rates" {{ $remarks->remarks == 'Only for rates' ? 'selected' : '' }}>Only for rates</option>
                                                <option value="Need after sometime" {{ $remarks->remarks == 'Need after sometime' ? 'selected' : '' }}>Need after sometime</option>
                                                <option value="Rates issue" {{ $remarks->remarks == 'Rates issue' ? 'selected' : '' }}>Rates issue</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Remarks 2nd Time</label>
                                            <input type="text" placeholder="Remarks 2nd Time" id="remarks_two"
                                                name="remarks_two" value="{{ $remarks->remarks_two }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Remarks 3rd Time</label>
                                            <input type="text" placeholder="Remarks 3rd Time" id="remarks_three" name="remarks_three" value="{{ $remarks->remarks_three }}"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="main-btn primary-btn btn-hover" type="submit">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>

                    </div>
                    <!-- end row -->
                </div>
            </form>
            <!-- ========== form-elements-wrapper end ========== -->
        </div>
        <!-- end container -->
    </section>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('page-scripts')
@endsection
