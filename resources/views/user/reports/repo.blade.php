<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #555;
        }

        .invoice-box {
            max-width: 850px;
            margin: auto;
            padding: 20px;
            border: 1px solid #eee;
        }

        table {
            width: 100%;
            line-height: 18px;
            border-collapse: collapse;
        }

        table td {
            padding: 6px;
            vertical-align: top;
        }

        .title img {
            max-width: 160px;
        }

        .amount-box {
            text-align: right;
            font-size: 16px;
        }

        .heading td {
            background: #f2f2f2;
            border: 1px solid #ddd;
            font-weight: bold;
            text-align: center;
        }

        .item td {
            border: 1px solid #eee;
            text-align: center;
        }

        .total-box td {
            border: 1px solid #eee;
            font-weight: bold;
        }

        .grand-total td {
            background: #f8f8f8;
            font-size: 14px;
        }

        .note {
            font-size: 10px;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    @php
        $ino = DB::table('invoices')
            ->leftJoin('services', function ($join) {
                $join->whereRaw('FIND_IN_SET(services.id, invoices.service)');
            })
            ->select('invoices.*', 'services.service_name')
            ->where('invoices.id', $invoice->id)
            ->get();

        $qtyArray = explode(',', $ino[0]->service_qty);
        $priceArray = explode(',', $ino[0]->service_price);

    @endphp

    <div class="invoice-box">
        <table>
            <tr>
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('images/vetgen-logo.png') }}" alt="VetGen Logo">
                            </td>
                            <td class="amount-box">
                                <strong>Amount:</strong> Rs. {{ $invoice->total }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong>Vetgen Fumigation & Hygiene Services PVT LTD.</strong><br>
                                Online Booking Service<br>
                                Office 202 Shahrah-E-Faisal Karachi<br>
                                +92 323 2323128<br><a href="https://www.vetgen.com.pk" target="_blank">
                                    www.vetgen.com.pk
                                </a>

                            </td>

                            <td>
                                <strong>BILL TO:</strong><br>
                                {{ $invoice->customer_name }}<br>
                                {{ $invoice->customer_address }}<br>
                                <strong>Billing Period:</strong>{{ $invoice->billing_period }}<br>
                                {{ $invoice->phone }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong>Advance Payment:</strong> Rs. {{ $invoice->advance_payment }}<br>
                                <strong>Date:</strong> {{ $invoice->date }}
                            </td>
                            <td>
                                <strong>Invoice No:</strong> {{ $invoice->invoice_no }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Product</td>
                <td>Qty</td>
                <td>Price</td>
                <td>Amount</td>
            </tr>

            @foreach ($ino as $index => $item)
                <tr class="item">
                    <td>{{ $item->service_name }}</td>
                    <td>{{ $qtyArray[$index] ?? '' }}</td>
                    <td>{{ $priceArray[$index] ?? '' }}</td>
                    <td>{{ ($qtyArray[$index] ?? 0) * ($priceArray[$index] ?? 0) }}</td>
                </tr>
            @endforeach

            <tr class="total-box">
                <td colspan="3">Timing</td>
                <td>{{ $invoice->choose_time }}</td>
            </tr>

            <tr class="total-box">
                <td colspan="3">SUB TOTAL</td>
                <td>Rs. {{ $invoice->sub_total }}</td>
            </tr>

            <tr class="total-box">
                <td colspan="3">DISCOUNT</td>
                <td>Rs. {{ $invoice->discount }}</td>
            </tr>

            <tr class="total-box">
                <td colspan="3">ADVANCE PAYMENT</td>
                <td>Rs. {{ $invoice->advance_payment }}</td>
            </tr>

            <tr class="total-box grand-total">
                <td colspan="3"><strong>TOTAL</strong></td>
                <td><strong>Rs. {{ $invoice->total }}</strong></td>
            </tr>
        </table>

        <p class="note">This invoice is system generated and does not require signature.</p>
        <p class="note">Generated by www.shopbyfalak.store</p>
    </div>

</body>

</html>
