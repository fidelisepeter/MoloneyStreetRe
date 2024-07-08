<div class="media mb-4">
    <img src="{{ asset('img/image-placeholder.png') }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
    <div class="media-body">
        <h6><a href="" class="font-weight-bolder">{{ $comment->user_name }}</a>
            <small><i>{{ \Carbon\Carbon::parse($comment->created_at)->format('F d, Y') }}</i></small>
        </h6>
        <p>{{ $comment->content }}</p>
        <button class="btn btn-sm btn-outline-secondary" onclick="toggleReplyForm({{ $comment->id }})">Reply</button>

        <div id="reply-form-{{ $comment->id }}" class="reply-form" style="display: none; margin-top: 20px;">
            <form action="{{ route('comments.store', $post) }}" method="POST">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                {{-- <input type="hidden" name="post_id" value="{{ $comment->post_id }}"> --}}
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea name="message" cols="30" rows="2" class="form-control" required></textarea>
                </div>
                <div class="form-group mb-0">
                    <input type="submit" value="Reply" class="btn btn-primary font-weight-semi-bold py-2 px-3">
                </div>
            </form>
        </div>

        @if ($comment->children->count() > 0)
            @foreach ($comment->children as $child)
                @include('partials.comment', ['comment' => $child])
            @endforeach
        @endif
    </div>
</div>
@section('scripts')
    <script>
        function toggleReplyForm(commentId) {
            var replyForm = document.getElementById('reply-form-' + commentId);
            if (replyForm.style.display === 'none') {
                replyForm.style.display = 'block';
            } else {
                replyForm.style.display = 'none';
            }
        }
    </script>
@endsection
