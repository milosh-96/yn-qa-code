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
   <script>
   $(".edit-comment").click(function(e) {
             var el = $(this).parent().parent().parent().parent().find('.comment-text');
             console.log(el);

            e.stopPropagation();
            $(this).parent().dropdown('toggle');
             el.editable('show');
         });</script>
@endsection