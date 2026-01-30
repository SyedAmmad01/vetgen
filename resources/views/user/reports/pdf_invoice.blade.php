<h2>Invoice No: {{ $invoice->invoice_no }}</h2>
<p>Date: {{ $invoice->date }}</p>
<p>Customer: {{ $invoice->customer_name }}</p>

@php
    $services = explode(',', $invoice->service);
    $qtys = explode(',', $invoice->service_qty);
    $prices = explode(',', $invoice->service_price);
@endphp

<table border="1" width="100%" cellpadding="5">
    <tr>
        <th>Service</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total</th>
    </tr>
    @foreach($services as $key => $service)
    <tr>
        <td>{{ $service }}</td>
        <td>{{ $qtys[$key] }}</td>
        <td>{{ $prices[$key] }}</td>
        <td>{{ $qtys[$key] * $prices[$key] }}</td>
    </tr>
    @endforeach
</table>

<p>Sub Total: {{ $invoice->sub_total }}</p>
<p>Discount: {{ $invoice->discount }}</p>
<p>Advance: {{ $invoice->advance_payment }}</p>
<h3>Total: {{ $invoice->total }}</h3>
