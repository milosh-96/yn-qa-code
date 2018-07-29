@if(!auth()->user())
    <a href="#" data-target="#loginModal" data-toggle="modal">Sign in to Comment or Reply</a>
@else
    <form action="#">
        <div class="form-group">
            <textarea class="form-control"></textarea>
        </div>
    </form>
@endif