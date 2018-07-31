@if(!auth()->user())
    <a href="#" data-target="#loginModal" data-toggle="modal">Sign in to Comment or Reply</a>
@else
    <form action="#">
        <div class="form-group">
            <textarea class="form-control comment-item" placeholder="You can enter your comment here, use @<username> to reply."></textarea>
        </div>
    </form>
@endif