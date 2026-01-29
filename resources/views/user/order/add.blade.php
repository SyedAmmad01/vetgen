@extends('layouts.front')
@section('page_title', 'Add Orders')

@section('content')
    <section class="tab-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Add Orders</h2>
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
                                    <li class="breadcrumb-item"><a href="#0">Orders</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Add Orders
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

            <form class="form-validate" action="{{ route('user.orders.store') }}" method="post"
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
                                            <label>Invoice No</label>
                                            <input type="text" placeholder="Invoice No" id="invoice_no" name="invoice_no"
                                                value="{{ $invoice ?? '' }}" readonly />
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Promo Code</label>
                                            <input type="text" placeholder="Promo Code" id="promo_code" name="promo_code"
                                                value="{{ $querie->promo_code ?? '' }}" />
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Operator</label>
                                            <select name="operator" id="operator" class="form-control"
                                                @if (Auth::user()->user_role === 'sales') disabled @endif>
                                                <option value="" selected disabled>- Select -</option>
                                                @foreach ($users as $userItem)
                                                    <option value="{{ $userItem->id }}">{{ $userItem->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Fumigation</label>
                                            <select name="fumigation" id="fumigation" class="form-control">
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
                                            <label>Cleaning</label>
                                            <select name="cleaning" id="cleaning" class="form-control">
                                                <option value="" selected disabled>- Select -</option>
                                                @foreach ($cleanings as $cleaning)
                                                    <option value="{{ $cleaning->id }}">{{ $cleaning->service_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Service Reference</label>
                                            <select name="service_reference" id="service_reference" class="form-control" @if (Auth::user()->user_role === 'operations') disabled @endif>
                                                <option value="" selected disabled>- Select -</option>
                                                @foreach ($lead_ref as $lead)
                                                    <option value="{{ $lead->id }}">{{ $lead->status_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Service Time</label>
                                            <select name="service_time" id="service_time" class="form-control" @if (Auth::user()->user_role === 'operations') disabled @endif>
                                                <option value="" selected disabled>- Select -</option>
                                                @foreach ($time_of_services as $time)
                                                    <option value="{{ $time->id }}">
                                                        {{ $time->slot }}-{{ $time->durations }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Customer</label>
                                            <input type="text" placeholder="Customer" id="customer" name="customer"
                                                value="{{ $querie->name ?? '' }}"
                                                @if (Auth::user()->user_role === 'operations') readonly @endif />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Address</label>
                                            <input type="text" placeholder="Address" id="address" name="address"
                                                value="{{ $querie->city ?? '' }} - {{ $querie->area ?? '' }}" @if (Auth::user()->user_role === 'operations') readonly @endif />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Contact</label>
                                            <input type="text" placeholder="Contact" id="contact" name="contact"
                                                value="{{ $querie->phone ?? '' }}" @if (Auth::user()->user_role === 'operations') readonly @endif />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Amount</label>
                                            <input type="text" placeholder="Amount" id="amount" name="amount" @if (Auth::user()->user_role === 'operations') readonly @endif />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Service Status</label>
                                            <select name="service_status" id="service_status" class="form-control"
                                                @if (Auth::user()->user_role === 'sales') disabled @endif>
                                                <option value="" selected disabled>- Select -</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Done">Done</option>
                                                <option value="Cancelled">Cancelled</option>
                                                <option value="Postponed">Postponed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Payment Status</label>
                                            <select name="payment_status" id="payment_status" class="form-control"
                                                @if (Auth::user()->user_role === 'sales') disabled @endif>
                                                <option value="" selected disabled>- Select -</option>
                                                <option value="Online jazz/easy Paisa">Online jazz/easy Paisa</option>
                                                <option value="Cash Payment">Cash Payment</option>
                                                <option value="Cheque Payment">Cheque Payment</option>
                                                <option value="Payment Pending">Payment Pending</option>
                                                <option value="No Payment">No Payment</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Location</label>
                                            <input type="text" placeholder="Location" id="location" name="location" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Remarks</label>
                                            <input type="text" placeholder="Remarks" id="remarks" name="remarks" />
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
