@extends('layouts.front')
@section('page_title', 'Invoice Generate')

@section('content')
    <section class="tab-components">
        <div class="container-fluid">

            <!-- Title -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Invoice Generate</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#0">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#0">Orders</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Invoice Generate</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alerts -->
            <div class="row">
                @if (Session::has('success'))
                    <div class="alert-box success-alert">
                        <div class="alert">
                            <p class="text-medium">{{ Session::get('success') }}</p>
                        </div>
                    </div>
                @endif
                @if (Session::has('msg'))
                    <div class="alert-box danger-alert">
                        <div class="alert">
                            <p class="text-medium">{{ Session::get('msg') }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Form -->
            <form class="form-validate" action="{{ route('user.orders.update') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-elements-wrapper">
                    <div class="row">

                        <!-- Left Side: Services -->
                        <div class="col-lg-6">
                            <div class="card-style mb-30">
                                <div id="services-wrapper">
                                    <div class="row service-item">
                                        <div class="col-md-12">
                                            <label>Select Service</label>
                                            <select name="fumigation[]" class="form-control service-select fumigation">
                                                <option value="" disabled selected>- Select -</option>
                                                @foreach ($fumigations as $fumigation)
                                                    <option value="{{ $fumigation->id }}">{{ $fumigation->service_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Service QTY</label>
                                            <input type="text" name="service_qty[]" class="form-control service_qty"
                                                value="1">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Service Price</label>
                                            <input type="text" name="service_price[]" class="form-control service_price"
                                                value="0">
                                        </div>
                                        <div class="col-12 mt-2">
                                            <button type="button" class="main-btn primary-btn add-service">Add
                                                Service</button>
                                        </div>
                                        <!-- Hidden subtotal for this row -->
                                        <input type="hidden" class="row_sub_total" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side: Customer Info -->
                        <div class="col-lg-6">
                            <div class="card-style mb-30">
                                <div class="row">
                                    <div class="col-md-12"><label>Customer Name</label><input type="text"
                                            name="customer_name" class="form-control" placeholder="Customer Name"></div>
                                    <div class="col-md-12"><label>Customer Address</label><input type="text"
                                            name="customer_address" class="form-control" placeholder="Customer Address">
                                    </div>
                                    <div class="col-md-6"><label>Phone</label><input type="number" name="phone"
                                            class="form-control" placeholder="Phone"></div>
                                    <div class="col-md-6"><label>Date</label><input type="date" name="date"
                                            class="form-control"></div>
                                    <div class="col-md-6"><label>Invoice</label><input type="text" name="invoice"
                                            class="form-control" value="{{ $invoice }}"></div>
                                    <div class="col-md-6"><label>Billing Period</label><input type="month"
                                            name="billing_period" class="form-control"></div>
                                    <div class="col-md-6"><label>Advance Payment</label><input type="text"
                                            name="advance_payment" id="advance_payment" class="form-control" value="0">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Choose Time</label>
                                        <select name="time" class="form-control">
                                            <option value="" selected disabled>- Select -</option>
                                            <option value="10:30 AM To 12:30 PM">10:30 AM To 12:30 PM</option>
                                            <option value="01:30 PM To 04:30 PM">01:30 PM To 04:30 PM</option>
                                            <option value="05:00 PM To 07:00 PM">05:00 PM To 07:00 PM</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6"><label>Sub Total</label><input type="text" id="sub_total"
                                            class="form-control" value="0" readonly></div>
                                    <div class="col-md-6"><label>Discount</label><input type="text" id="discount"
                                            class="form-control" value="0"></div>
                                    <div class="col-md-6"><label>Total</label><input type="text" id="total"
                                            class="form-control" value="0" readonly></div>
                                    <div class="col-12 mt-3"><button type="submit"
                                            class="main-btn primary-btn btn-hover">Generate Invoice</button></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ensure every service row has hidden subtotal
            document.querySelectorAll('.service-item').forEach(row => {
                if (!row.querySelector('.row_sub_total')) {
                    const subInput = document.createElement('input');
                    subInput.type = 'hidden';
                    subInput.classList.add('row_sub_total');
                    subInput.value = 0;
                    row.appendChild(subInput);
                }
            });

            calculateGrandTotal(); // initial calculation
        });

        // Add / Remove Service
        document.addEventListener('click', function(e) {
            // Add Service
            if (e.target.classList.contains('add-service')) {
                const wrapper = document.getElementById('services-wrapper');
                const row = e.target.closest('.service-item');
                const clone = row.cloneNode(true);

                // Reset inputs
                clone.querySelectorAll('input').forEach(i => {
                    if (i.classList.contains('service_qty')) i.value = 1;
                    else if (i.classList.contains('service_price')) i.value = 0;
                });
                clone.querySelectorAll('select').forEach(s => s.selectedIndex = 0);

                // Change button to Remove
                const btn = clone.querySelector('button');
                btn.innerText = 'Remove Service';
                btn.classList.remove('add-service', 'primary-btn');
                btn.classList.add('remove-service', 'danger-btn');

                // Ensure hidden subtotal exists
                if (!clone.querySelector('.row_sub_total')) {
                    const subInput = document.createElement('input');
                    subInput.type = 'hidden';
                    subInput.classList.add('row_sub_total');
                    subInput.value = 0;
                    clone.appendChild(subInput);
                }

                wrapper.appendChild(clone);
            }

            // Remove Service
            if (e.target.classList.contains('remove-service')) {
                e.target.closest('.service-item').remove();
                calculateGrandTotal();
            }
        });

        // Input event: qty / price / discount / advance
        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('service_price') || e.target.classList.contains('service_qty')) {
                const row = e.target.closest('.service-item');
                const price = parseFloat(row.querySelector('.service_price').value) || 0;
                const qty = parseFloat(row.querySelector('.service_qty').value) || 0;

                const subInput = row.querySelector('.row_sub_total');
                subInput.value = price * qty;

                calculateGrandTotal();
            }

            if (e.target.id === 'discount' || e.target.id === 'advance_payment') {
                calculateGrandTotal();
            }
        });

        // Calculate Grand Total
        function calculateGrandTotal() {
            let total = 0;

            // Har service row ka subtotal add karo
            document.querySelectorAll('.row_sub_total').forEach(st => {
                total += parseFloat(st.value) || 0;
            });

            const discount = parseFloat(document.getElementById('discount').value) || 0; // discount value
            const advance = parseFloat(document.getElementById('advance_payment').value) || 0; // advance value

            // Subtotal update
            document.getElementById('sub_total').value = total.toFixed(2);

            // Grand total = subtotal - discount - advance
            document.getElementById('total').value = (total - discount - advance).toFixed(2);
        }

    </script>
@endsection
