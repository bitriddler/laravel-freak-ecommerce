@extends('freak::elements.detail')

@section('tables')
<table class="table table-striped table-detail-view">
    <tbody>
    <tr>
        <th>Title</th>
        <td>{{ $product->title }}</td>
    </tr>
    <tr>
        <th>Price</th>
        <td>{{ $product->price }}</td>
    </tr>
    @if($product->hasOfferPrice())
    <tr>
        <th>Offer price</th>
        <td>{{ $product->offer_price }}</td>
    </tr>
    @endif
    <tr>
        <th>Category</th>
        <td>{{ $product->category }}</td>
    </tr>

    @if(isset($additional_detail))
        @include($additional_detail)
    @endif
    </tbody>
</table>
@stop
