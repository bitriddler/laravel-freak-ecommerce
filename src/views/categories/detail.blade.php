@extends('freak::elements.detail')

@section('tables')
<table class="table table-striped table-detail-view">
    <tbody>
    <tr>
        <th>Title</th>
        <td>{{ $category->title }}</td>
    </tr>
    <tr>
        <th>Number of programs in this category</th>
        <td>{{ $category->programs()->count() }}</td>
    </tr>
    </tbody>
</table>
@stop
