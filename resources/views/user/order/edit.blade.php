@extends('layouts.front')
@section('page_title', 'Edit Orders')

@section('content')
    <section class="tab-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Edit Orders</h2>
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
                                        Edit Orders
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

            <form class="form-validate" action="{{ route('user.orders.update') }}" method="post"
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
                                            <input type="date" placeholder="Date" id="date" name="date"
                                                value="{{ $orders->date ?? '' }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Invoice No</label>
                                            <input type="text" placeholder="Invoice No" id="invoice_no" name="invoice_no"
                                                value="{{ $orders->invoice_no ?? '' }}" readonly />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Promo Code</label>
                                            <input type="text" placeholder="Promo Code" id="promo_code" name="promo_code"
                                                value="{{ $orders->promo_code ?? '' }}" />
                                        </div>
                                    </div>


                                    <input type="hidden" placeholder="id" id="id" name="id"
                                                value="{{ $orders->id ?? '' }}" />

                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Operator</label>
                                            <select name="operator" id="operator" class="form-control">
                                                <option value="" disabled>- Select -</option>
                                                @foreach ($users as $userItem)
                                                    <option value="{{ $userItem->id }}"
                                                        {{ $orders->operator == $userItem->id ? 'selected' : '' }}>
                                                        {{ $userItem->name }}
                                                    </option>
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
                                                    <option value="{{ $fumigation->id }}"{{ $orders->fumigation == $fumigation->id ? 'selected' : '' }}>{{ $fumigation->service_name }}
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
                                                    <option value="{{ $cleaning->id }}" {{ $orders->cleaning == $cleaning->id ? 'selected' : '' }}>{{ $cleaning->service_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Service Reference</label>
                                            <select name="service_reference" id="service_reference" class="form-control"
                                                @if (Auth::user()->user_role === 'operations') disabled @endif>
                                                <option value="" selected disabled>- Select -</option>
                                                @foreach ($lead_ref as $lead)
                                                    <option value="{{ $lead->id }}" {{ $orders->service_reference == $lead->id ? 'selected' : '' }}>{{ $lead->status_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Service Time</label>
                                            <select name="service_time" id="service_time" class="form-control"
                                                @if (Auth::user()->user_role === 'operations') disabled @endif>
                                                <option value="" selected disabled>- Select -</option>
                                                @foreach ($time_of_services as $time)
                                                    <option value="{{ $time->id }}" {{ $orders->service_time == $time->id ? 'selected' : '' }}>
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
                                                value="{{ $orders->customer ?? '' }}"
                                                @if (Auth::user()->user_role === 'operations') readonly @endif />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Address</label>
                                            <input type="text" placeholder="Address" id="address" name="address"
                                                value="{{ $orders->address ?? '' }}"
                                                @if (Auth::user()->user_role === 'operations') readonly @endif />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Contact</label>
                                            <input type="text" placeholder="Contact" id="contact" name="contact"
                                                value="{{ $orders->contact ?? '' }}"
                                                @if (Auth::user()->user_role === 'operations') readonly @endif />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Amount</label>
                                            <input type="text" placeholder="Amount" id="amount" name="amount"
                                                value="{{ $orders->amount ?? '' }}"
                                                @if (Auth::user()->user_role === 'operations') readonly @endif />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Service Status</label>
                                            <select name="service_status" id="service_status" class="form-control"
                                                @if (Auth::user()->user_role === 'sales') disabled @endif>
                                                <option value="" selected disabled>- Select -</option>
                                                <option value="Pending" {{ $orders->service_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Done" {{ $orders->service_status == 'Done' ? 'selected' : '' }}>Done</option>
                                                <option value="Cancelled" {{ $orders->service_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                <option value="Postponed" {{ $orders->service_status == 'Postponed' ? 'selected' : '' }}>Postponed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Payment Status</label>
                                            <select name="payment_status" id="payment_status" class="form-control"
                                                @if (Auth::user()->user_role === 'sales') disabled @endif>
                                                <option value="" selected disabled>- Select -</option>
                                                <option value="Online jazz/easy Paisa" {{ $orders->payment_status == 'Online jazz/easy Paisa' ? 'selected' : '' }}>Online jazz/easy Paisa</option>
                                                <option value="Cash Payment" {{ $orders->payment_status == 'Cash Payment' ? 'selected' : '' }}>Cash Payment</option>
                                                <option value="Cheque Payment" {{ $orders->payment_status == 'Cheque Payment' ? 'selected' : '' }}>Cheque Payment</option>
                                                <option value="Payment Pending" {{ $orders->payment_status == 'Payment Pending' ? 'selected' : '' }}>Payment Pending</option>
                                                <option value="No Payment" {{ $orders->payment_status == 'No Payment' ? 'selected' : '' }}>No Payment</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Location</label>
                                            <input type="text" placeholder="Location" id="location" name="location" value="{{ $orders->location ?? '' }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Remarks</label>
                                            <input type="text" placeholder="Remarks" id="remarks" name="remarks"
                                                value="{{ $orders->remarks ?? '' }}" />
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
