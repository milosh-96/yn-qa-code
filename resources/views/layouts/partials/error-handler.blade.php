@if(!$errors->isEmpty())
<div class="modal fade" id="errorsModal" tabindex="-1" role="dialog" aria-labelledby="errorsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Errors Happened</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($errors->all() as $error)
        <p>
            <strong>-{{$error}}</strong>
        </p>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endif

@if(!$errors->isEmpty())
@section('additional_scripts')
    @parent
        <script>
            $("#errorsModal").modal();
        </script>
@endsection
@endif