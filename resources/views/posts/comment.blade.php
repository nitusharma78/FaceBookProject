<!-- Comment Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form>

            <input type="hidden" name="post_id" id="commentPostId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Add a Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea name="comment" class="form-control" rows="3" placeholder="Write your comment..."
                        required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Post Comment</button>
                </div>
            </div>
        </form>
    </div>
</div>