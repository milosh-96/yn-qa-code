@extends('layouts.web')
@section('title')
    Your Feed
@endsection
@section('content')
<div class="questions" id="feed">
    @foreach($questions as $item)
        @include('questions.item')
    @endforeach
</div>
@endsection

@section('additional_scripts')
    @parent 
@endsection