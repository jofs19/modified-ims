@foreach($orders as $order)



@if($order->status == 'pending')

<tr class="bg-faded-light">


@elseif ($order->status == 'confirm')

<tr class="bg-faded-info">

@elseif ($order->status == 'processing')

<tr class="bg-faded-accent">

@elseif($order->status == 'picked')

<tr class="bg-faded-warning">

@elseif($order->status == 'shipped')

<tr class="bg-faded-primary">

@elseif($order->status == 'delivered')

<tr class="bg-faded-success">

@else
<tr class="bg-faded-danger">

@endif


<td class="py-3">
@foreach ($orders as $key => $item)
    @if ($item->id == $order->id)
        {{ $orders->firstItem()+$key }}
    @endif

@endforeach
</td>

<td class="py-3"><a class="nav-link-style fw-medium fs-sm" target="_blank" href="{{ url('user/order_details/'.$order->id ) }}">{{ $order->invoice_no }}</a></td>
<td class="py-3">{{ $order->order_date }}</td>

<td class="py-3">
@if($order->status == 'pending')

<span class="badge bg-secondary m-0">Pending</span>


@elseif ($order->status == 'confirm')

<span class="badge bg-info m-0">Confirmed</span>

@elseif ($order->status == 'processing')

<span class="badge bg-accent m-0">Processed</span>

@elseif($order->status == 'picked')

<span class="badge bg-warning m-0">Picked</span>

@elseif($order->status == 'shipped')

<span class="badge bg-primary m-0">Shipped</span>

@elseif($order->status == 'delivered')

<span class="badge bg-success m-0">Delivered</span>

@elseif($order->status == 'cancel_order')

<span class="badge bg-danger m-0">Cancelled</span>


@if($order->return_order == 1)

<br>
<span class="badge bg-light m-0">Return requested</span>

@elseif($order->return_order == 2)

<span class="badge bg-light m-0">Returned Successfully</span>

@endif

@else
<span class="badge bg-danger m-0">Rejected</span>

@endif

</td>


<td class="py-3">

{{-- <a class="nav-link-style fs-ms text-accent action" target="_blank" href="{{ url('user/order_details/'.$order->id ) }}"><i class="ci-eye align-middle me-1"></i>View</a> --}}
{{-- <a class="nav-link-style fs-normal text-info action" target="_blank" href="{{ url('user/invoice_download/'.$order->id ) }}"><i class="ci-download align-middle me-1"></i>Invoice</a>   --}}

<a class="btn btn-outline-dark rounded-pill btn-icon btn-sm" href="{{ url('user/invoice_download/'.$order->id ) }}" target="_blank">
  <i class="ci-download"></i>
</a>

<!-- Toolbar example -->

</td>
</tr>
@endforeach
