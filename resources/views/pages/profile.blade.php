<main>
    <section class="cta-section bg-light py-5">
        <div class="container text-center">
            <h2>Hello, {{ auth()->user()->name }}!</h2>
            <p>This is your profile page. You can create posts here.</p>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#postModal">Create post</button>
        </div>
    </section>

    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container">
            <h3 class="text-center mb-3">Your posts</h3>
            @if(count($posts))
            @foreach ($posts as $post)
            <div class="d-flex justify-content-center">
                <div class="item mb-5">
                    <h3 class="mb-1">{{ $post->title }}</h3>
                    <div class="meta">
                        <span class="author">
                            Posted by {{ $post->user->name }}
                        </span>
                        <span class="date">
                            {{ date('d.m.Y H:i', strtotime($post->created_at)) }}
                        </span>
                    </div>
                    @if(strlen($post->text) > 200)
                    <div class="intro">
                        {{ substr($post->text, 0, 200) . '...' }}
                    </div>
                    @else
                    <div class="intro">
                        {{ $post->text }}
                    </div>
                    @endif
                    <a class="more-link" href="{{ '/posts/' . $post->id }}">Read more →</a>
                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
            @else
            <p class="fs-3 text-center" style="color: rgba(0, 0, 0, .3);">Nothing published</p>
            @endif
        </div>
    </section>


    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Create post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="postForm">
                        <div class="mb-3">
                            <label for="post-title" class="col-form-label">Post title:</label>
                            <input required type="text" class="form-control" id="post-title" placeholder="Your title">
                        </div>
                        <div class="mb-3">
                            <label for="post-text" class="col-form-label">Write a post:</label>
                            <textarea required class="form-control" id="post-text" placeholder="Your text" rows="12"></textarea>
                        </div>
                    </form>
                    <div id="postAlert" class="alert alert-danger" role="alert"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button form="postForm" type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
</main>