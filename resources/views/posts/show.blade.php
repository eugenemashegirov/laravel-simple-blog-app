<x-app-layout>
    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="item mb-5">
                    <div class="d-flex justify-content-between">
                        <h2 class="mb-1">{{ $post->title }}</h2>
                        @auth
                            @if ($post->user->id === auth()->user()->id)
                                <div class="btn-group btn-group-sm" role="group" aria-label="Button group">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                </div>
                            @endif
                        @endauth
                    </div>
                    <div class="meta mb-2">
                        <span class="author">
                            Posted by {{ $post->user->name }}
                        </span>
                        <span class="date">
                            {{ date('d.m.Y H:i', strtotime($post->created_at)) }}
                        </span>
                    </div>
                    <div class="intro">
                        <pre>{{ $post->text }}</pre>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @auth
        @if ($post->user->id === auth()->user()->id)
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel">Edit post</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm" action="{{ '/posts/' . $post->id }}">
                                <div class="mb-3">
                                    <label for="edit-title" class="col-form-label">Edit title:</label>
                                    <input required type="text" class="form-control" id="edit-title" placeholder="Your title" value="{{ $post->title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-text" class="col-form-label">Edit text:</label>
                                    <textarea required class="form-control" id="edit-text" placeholder="Your text" rows="12">{{ $post->text }}</textarea>
                                </div>
                            </form>
                            <div id="editAlert" role="alert"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button form="editForm" type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModalLabel">Delete post</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="deleteForm" action="{{ '/posts/' . $post->id }}">
                                <div class="mb-3">
                                    <p>Are you sure you want to delete this post?</p>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button form="deleteForm" type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endauth
</x-app-layout>
