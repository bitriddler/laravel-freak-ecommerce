@extends('freak::elements.add')

@section('form')

<form class="form-horizontal" method="POST">
    <fieldset>
        <legend>Product</legend>

        <div class="control-group">
            <label class="control-label" for="input05">Category</label>
            <div class="controls">
                <select name="Product[category_id]" required>
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                    @if($product->category_id == $category->id)
                    <option selected="selected" value="{{ $category->id }}">{{ $category->title }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input05">Title</label>
            <div class="controls">
                <input type="text" name="Product[title]" id="input05" class="span12" value="{{ $product->title }}" required>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input05">Price</label>
            <div class="controls">
                <input type="number" name="Product[price]" id="input05" class="span2" value="{{ $product->price }}" required>
            </div>
            <label class="control-label" for="input05">Offer price</label>
            <div class="controls">
                <input type="number" name="Product[offer_price]" id="input05" class="span2" value="{{ $product->offer_price }}">
            </div>
        </div>


        @if(isset($additional_form))
            @include($additional_form)
        @endif

    </fieldset>
</form>

@stop