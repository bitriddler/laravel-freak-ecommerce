@extends('freak::master.layout1')

@section('content')
@foreach($orders as $order)
<div class="span6 widget">
    <div class="widget-header">
        <span class="title">Order created at {{ $order->created_at }}</span>
    </div>
    <div class="widget-content shoppingcart">
        <ul class="thumbnails">
            @foreach($order->products as $product)
            <li>
                <div class="info">
                    <span class="name">{{ $product->title }}</span>
                    <span class="qty">{{ $product->qty }} x {{ $product->getActualPrice() }}</span>
                </div>
            </li>
            @endforeach
            <li class="footer">
                <span class="price">{{ $order->getTotal() }}</span>
            </li>
        </ul>
    </div>
</div>
@endforeach
@stop