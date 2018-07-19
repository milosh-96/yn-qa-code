@extends('layouts.web')
@section('title')
    Your Feed
@endsection
@section('content')
<div class="questions">
    @foreach($questions as $item)
        @include('questions.feed-item')
    @endforeach
</div>
@endsection