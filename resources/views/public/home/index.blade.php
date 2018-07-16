@extends('layouts.web')
@section('title')
    Your Feed
@endsection
@section('content')
<div class="questions">
    <?php for($i = 0;$i < 22;$i++): ?>
    @include('questions.feed-item')
    <?php endfor; ?>
</div>
@endsection