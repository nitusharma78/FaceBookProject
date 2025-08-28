<!-- Create Post Modal -->
<div class="modal fade" id="createPostModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h5 class="modal-title text-center">Create post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="avatar"><img src="{{ asset('images/user.png') }}"
                            style="height:40px; width:40px"></span>
                    <div>
                        <div class="fw-semibold">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</div>
                        <select id="privacy" class="form-select form-select-sm w-auto">
                            <option value="Public">Public</option>
                            <option value="Friends">Friends</option>
                            <option value="Only me">Only me</option>
                        </select>
                    </div>
                </div>

                <form action='{{ route("posts.store") }}' method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control border-0" rows="3"
                            placeholder="What's on your mind, {{ Auth::user()->fname }}?" name="content"></textarea>
                    </div>

                    <!-- hidden file input -->
                    <input type="file" name="image" id="fileInput" class="d-none">

                    <div class="card-footer d-flex justify-content-between">
                        <!-- Trigger Button -->
                        <button type="button" class="btn btn-light text-primary"
                            onclick="document.getElementById('fileInput').click();">
                            <i class="bi bi-image"></i> Photo/Video
                        </button>

                        <button type="button" class="btn btn-light text-success">
                            <i class="bi bi-emoji-smile"></i> Feeling
                        </button>

                        <button type="button" class="btn btn-light text-danger">
                            <i class="bi bi-geo-alt"></i> Check in
                        </button>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary w-100">Post</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>