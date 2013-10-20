@extends('freak::elements.add')

@section('form')

<form class="vertical-form" method="POST">
    <fieldset>
        <legend>Category</legend>

        <div class="control-group">
            <label class="control-label" for="input05">Category title</label>
            <div class="controls">
                <input type="text" name="Category[title]" id="input05" class="span12" value="{{ $category->title }}">
            </div>
        </div>
    </fieldset>
</form>

@stop