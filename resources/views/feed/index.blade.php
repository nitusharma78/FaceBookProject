@extends('layout.default')

@section('title', 'Feed')

@section('content')

{{-- Navbar include --}}
@include('layout.nav')

<div class="container my-4">
    <div class="row ">

        <!-- Left Sidebar -->
        @include('posts.left')

        <!-- Center Feed -->
        <main class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-20">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-2">
                        <span class="avatar"></span>
                        <div class="flex-grow-1">
                            <div class="form-control bg-light rounded-pill composer pointer" data-bs-toggle="modal"
                                data-bs-target="#createPostModal">
                                What's on your mind, {{ Auth::user()->fname }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between text-muted small">
                        <div class="pointer" data-bs-toggle="modal" data-bs-target="#createPostModal">
                            <i class="bi bi-camera-video-fill me-1 text-danger"></i> Live video
                        </div>
                        <div class="pointer" data-bs-toggle="modal" data-bs-target="#createPostModal">
                            <i class="bi bi-image-fill me-1 text-success"></i> Photo/Video
                        </div>
                        <div class="pointer" data-bs-toggle="modal" data-bs-target="#createPostModal">
                            <i class="bi bi-emoji-smile-fill me-1 text-warning"></i> Feeling/activity
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feed List -->
            @include('posts.show')

        </main>

        <!-- Right Sidebar -->
        @include('posts.right')

    </div>
</div>

@include('posts.create')

@endsection