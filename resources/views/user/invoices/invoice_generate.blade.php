@extends('layouts.front')
@section('page_title', 'Invoice Generate')

@section('content')
    <section class="tab-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Invoice Generate</h2>
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
                                        Invoice Generate
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
                        <div class="col-lg-6">
                            <!-- input style start -->
                            <div class="card-style mb-30">
                                <div id="services-wrapper">
                                    <div class="row service-item">
                                        <div class="col-md-12">
                                            <label>Select Service</label>
                                            <select name="fumigation[]" class="form-control service-select fumigation">
                                                <option value="" disabled selected>- Select -</option>
                                                @foreach ($fumigations as $fumigation)
                                                    <option value="{{ $fumigation->id }}">
                                                        {{ $fumigation->service_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Service QTY</label>
                                            <input type="text" name="service_qty[]" class="form-control service_qty">
                                        </div>

                                        <div class="col-md-6">
                                            <label>Service Price</label>
                                            <input type="text" name="service_price[]" class="form-control service_price">
                                        </div>

                                        <div class="col-12 mt-2">
                                            <button type="button" class="main-btn primary-btn add-service">
                                                Add Service
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>

                        <div class="col-lg-6">
                            <!-- input style start -->
                            <div class="card-style mb-30">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-style-1">
                                            <label>Customer Name</label>
                                            <input type="text" placeholder="Customer Name" id="customer_name"
                                                name="customer_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-style-1">
                                            <label>Customer Address</label>
                                            <input type="text" placeholder="Customer Address" id="customer_address"
                                                name="customer_address" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Phone</label>
                                            <input type="number" placeholder="Phone" id="phone" name="phone" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Date</label>
                                            <input type="date" placeholder="Date" id="date" name="date" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Invoice</label>
                                            <input type="text" placeholder="Invoice" id="invoice" name="invoice" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Billing Period</label>
                                            <input type="text" placeholder="Billing Period" id="billing_period"
                                                name="billing_period" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Advance Payment</label>
                                            <input type="text" placeholder="Advance Payment" id="advance_payment"
                                                name="advance_payment" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Choose Time</label>
                                            <select name="time" id="time" class="form-control">
                                                <option value="" selected disabled>- Select -</option>
                                                <option value="10:30 AM To 12:30 PM">10:30 AM To 12:30 PM</option>
                                                <option value="01:30 PM To 04:30 PM">01:30 PM To 04:30 PM</option>
                                                <option value="05:00 PM To 07:00 PM">05:00 PM To 07:00 PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Sub Total</label>
                                            <input type="text" class="sub_total" placeholder="Sub Total"
                                                id="sub_total" name="sub_total" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Discount</label>
                                            <input type="text" placeholder="Discount" id="discount"
                                                name="discount" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Total</label>
                                            <input type="text" class="total" placeholder="Total" id="total"
                                                name="total" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="main-btn primary-btn btn-hover" type="submit">
                                            Generate Invoice
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
    <script>
        document.addEventListener('click', function(e) {

            // ================== ADD SERVICE ==================
            if (e.target.classList.contains('add-service')) {

                let wrapper = document.getElementById('services-wrapper');
                let item = e.target.closest('.service-item');

                // clone the row
                let clone = item.cloneNode(true);

                // clear all inputs in cloned row
                clone.querySelectorAll('input').forEach(i => i.value = '');
                clone.querySelectorAll('select').forEach(s => s.selectedIndex = 0);

                // change button to remove
                let btn = clone.querySelector('button');
                btn.innerText = 'Remove Service';
                btn.classList.remove('add-service', 'primary-btn');
                btn.classList.add('remove-service', 'danger-btn');

                wrapper.appendChild(clone);
            }

            // ================== REMOVE SERVICE ==================
            if (e.target.classList.contains('remove-service')) {
                e.target.closest('.service-item').remove();
                calculateGrandTotal();
            }
        });

        // ================== INPUT / CHANGE EVENT ==================
        document.addEventListener('input', calculateRow);
        document.addEventListener('change', calculateRow);

        function calculateRow(e) {
            if (e.target.classList.contains('service_price') || e.target.classList.contains('service_qty')) {
                let item = e.target.closest('.service-item');

                // get qty & price
                let qty = parseFloat(item.querySelector('.service_qty').value) || 0;
                let price = parseFloat(item.querySelector('.service_price').value) || 0;

                // calculate sub total
                let subTotal = qty * price;

                // show in sub_total field
                let subTotalInput = item.querySelector('.sub_total');
                if (subTotalInput) {
                    subTotalInput.value = subTotal.toFixed(2);
                }

                // recalc grand total
                calculateGrandTotal();
            }
        }

        // ================== GRAND TOTAL ==================
        function calculateGrandTotal() {
            let total = 0;

            // sum all sub_total fields
            document.querySelectorAll('.sub_total').forEach(st => {
                total += parseFloat(st.value) || 0;
            });

            // set in total field
            let totalInput = document.getElementById('total');
            if (totalInput) {
                totalInput.value = total.toFixed(2);
            }
        }
    </script>


@endsection
