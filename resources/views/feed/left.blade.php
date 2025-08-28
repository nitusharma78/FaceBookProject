<aside class="col-lg-3 d-none d-lg-block">
    <div class="card border-0 shadow-sm rounded-20">
        <div class="card-body">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="avatar"></span>
                <strong>{{ Auth::user()->fname }}</strong>
            </div>
            <hr>
            <div class="small text-muted">Shortcuts</div>
            <ul class="list-unstyled mt-2">
                <li class="mb-2"><i class="bi bi-people-fill me-2"></i>Friends</li>
                <li class="mb-2"><i class="bi bi-collection-play-fill me-2"></i>Videos</li>
                <li class="mb-2"><i class="bi bi-bookmark-fill me-2"></i>Saved</li>
            </ul>
        </div>
    </div>
</aside>