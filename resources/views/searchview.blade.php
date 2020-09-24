@extends('layouts.admin')
@section('content')
<div class="container">
    @if(isset($details))
    <p> Kết quả tìm kiếm của bạn
        <b> {{ $query }} </b> are :</p>
    <h2>Sample User details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên</th>
                <th>F Name</th>
                <th>Image</th>
                <th>CV</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->fname}}</td>
                <td>
                    <img src="{{$user->avatar}}" alt="" width="50px" height="50px">
                </td>
                <td>
                    <a href="{{ asset('$user->cv') }}">Open the pdf!</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@stop