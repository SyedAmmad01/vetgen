@extends('layouts.front')
@section('page_title', 'Add Surveys')

@section('content')
    <section class="tab-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Add Surveys</h2>
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
                                    <li class="breadcrumb-item"><a href="#0">Surveys</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Add Surveys
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

            <form class="form-validate" action="{{ route('user.survey.store') }}" method="post"
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
                                            <label>Date</label>
                                            <input type="date" placeholder="Date" id="date" name="date" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Survey No</label>
                                            <input type="text" placeholder="Survey No" id="survey_number" name="survey_number"
                                                value="{{ $invoice ?? '' }}" readonly/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Services</label>
                                            <select name="services" id="services" class="form-control">
                                                <option value="" selected disabled>- Select -</option>
                                                @foreach ($fumigations as $fumigation)
                                                    <option value="{{ $fumigation->id }}">{{ $fumigation->service_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Contact Person</label>
                                            <input type="text" placeholder="Contact Person" id="contact_person"
                                                name="contact_person" value="{{ $querie->name ?? '' }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Contact Details</label>
                                            <input type="text" placeholder="Contact Details" id="contact_details" name="contact_details" value="{{ $querie->phone ?? '' }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Time</label>
                                            <input type="time" placeholder="Time" id="time" name="time" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Address</label>
                                            <input type="text" placeholder="Address" id="address" name="address" value="{{ $querie->city ?? '' }} - {{ $querie->area ?? '' }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Assign To</label>
                                            <select name="assign_to" id="assign_to" class="form-control">
                                                <option value="" selected disabled>- Select -</option>
                                                <option value="RSQ">RSQ</option>
                                                <option value="BDM">BDM</option>
                                                <option value="3P">3P</option>
                                                <option value="Operator">Operator</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Amount</label>
                                            <input type="text" placeholder="Amount" id="amount" name="amount" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="" selected disabled>- Select -</option>
                                                @foreach ($status as $stat)
                                                    <option value="{{ $stat->id }}">{{ $stat->status_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Company Name</label>
                                            <input type="text" placeholder="Company Name" id="company_name" name="company_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Current Status</label>
                                            <input type="text" placeholder="Current Status" id="current_status"
                                                name="current_status" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="main-btn primary-btn btn-hover" type="submit">
                                            Add
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
