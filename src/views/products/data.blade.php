@extends('freak::elements.filterable')

@section('table')
<thead>
<tr>
    <th>Id</th>
    <th>Title</th>
    <th>Price</th>
    <th>Offer Price</th>
    <th>Category</th>
    <th>Tools</th>
</tr>
</thead>
<tbody>
@foreach($products as $product)
<tr>
    <td>{{ $product->id }}</td>
    <td>{{ $product->title }}</td>
    <td>{{ $product->price->format() }}</td>
    <td>
        @if($product->hasOfferPrice())
        {{ $product->offer_price->format() }}
        @endif
    </td>
    <td>{{ $product->category }}</td>

    @include('freak::elements.tools', array('id' => $product->id))
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
    <th>Id</th>
    <th>Title</th>
    <th>Price</th>
    <th>Offer Price</th>
    <th>Category</th>
    <th>Tools</th>
</tr>
</tfoot>
@stop
