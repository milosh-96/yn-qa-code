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

@section('additional_scripts')
    @parent 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
    <script>
        function getEditModal(item) {
                axios.get('/questions/edit/'+item).then(function(response) {
                    $("#editItemModalPlace").innerHTML = '';
                    $("#editItemModalPlace").prepend(response.data);
                    $("#editItemModal").modal();
                });
        }
    </script>
@endsection