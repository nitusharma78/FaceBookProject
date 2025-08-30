<!-- <div id="feed" class="mt-4">
    @forelse($posts as $post)
    <div class="card border-0 shadow-sm rounded-20 mb-3">
        <div class="card-body">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="avatar"></span>
                <div>
                    <div class="fw-semibold">{{ $post->user->fname }} {{ $post->user->lname }}</div>
                    <div class="text-muted small">
                        {{ $post->created_at->diffForHumans() }}
                        <i class="bi bi-globe-americas"></i>
                    </div>
                </div>
            </div>

            <div class="mb-2">{{ $post->content }}</div>
            @if($post->image)
            <img src="{{ asset($post->image) }}" alt="Post Image" class="w-100">
            @endif

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>

        </div>
    </div>
    @empty
    <p class="text-muted">No posts available.</p>
    @endforelse
</div> -->


<div id="feed" class="mt-4">
    @forelse($posts as $post)
    <div class="card mb-4 shadow-sm mt-3" style="max-width: 800px; margin:auto;">
        <!-- Header -->
        <div class="card-header d-flex justify-content-between align-items-center bg-white border-0">
            <div class="d-flex align-items-center">
                <!-- Profile Image -->
                <img src="{{ asset('uploads/profile.jpg') }}" alt="Profile" class="rounded-circle" width="40"
                    height="40">
                <div class="ms-2">
                    <strong>{{ $post->user->fname }} {{ $post->user->lname }}</strong> <br>
                    <small class="text-muted">{{ $post->created_at->format('d M \a\t h:i A') }}</small>
                </div>
            </div>

            <!-- Three Dot Dropdown -->
            <div class="dropdown">
                <a href="#" class="text-muted" id="dropdownMenu{{ $post->id }}" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-three-dots"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenu{{ $post->id }}">
                    <li>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item text-danger">Delete</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="card-body p-0">
            <p class="px-3">{{ $post->content }}</p>

            <!-- Post Image (Full width like Facebook) -->
            @if($post->image)
            <img src="{{ asset($post->image) }}" class="img-fluid" alt="Post Image"
                style="width:100%; max-height:500px; object-fit: cover;">
            @endif
        </div>

        <!-- Like count & Comment count -->
        <div class="d-flex justify-content-between text-muted small mb-2 px-3 mt-2" <span><i
                class="bi bi-hand-thumbs-up-fill text-primary"></i> </span>
            <span>1 comment </span>
        </div>

        <hr class="my-1">

        <!-- Footer (Like, Comment, Share) -->
        <div class="card-footer bg-white border-0">
            <div class="d-flex justify-content-around text-muted">
                <span><i class="bi bi-hand-thumbs-up"></i> Like</span>
                <!-- <span class="comment-btn" data-post-id="{{ $post->id }}"><i class="bi bi-chat"></i> Comment</span> -->
                <button type="submit" class="btn btn-outline-primary border-0" data-bs-toggle="modal"
                    data-bs-target="#commentModal{{$post->id}}" data-post-id="{{ $post->id }}">
                    <i class="bi bi-chat"></i>{{$post->id}} Comment
                </button>
                <span><i class="bi bi-share"></i> Share</span>
            </div>
        </div>
        <!-- Comment Modal -->
        <div class="modal fade" id="commentModal{{$post->id}}" tabindex="-1" aria-labelledby="commentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-header">
                        <h5 class="modal-title" id="commentModalLabel">Add a Comment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('comment.store', ['post' => $post->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="modal-body">
                            <textarea class="form-control" rows="4" name="comment"
                                placeholder="Write your comment..."></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">{{$post->id}} Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <p class="text-muted text-center">No posts available.</p>
    @endforelse

</div>