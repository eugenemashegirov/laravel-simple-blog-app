<x-app-layout>
    <section class="cta-section bg-light py-5">
        <div class="container text-center">
            <h2>Simple Blog Application</h2>
            <p>Here you can view posts and log in or register to create your own.</p>
        </div>
    </section>

    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container">
            <h3 class="text-center mb-3">Blog posts</h3>
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
                <p class="fs-3 text-center" style="color: rgba(0, 0, 0, .3);">There are no posts</p>
            @endif
        </div>
    </section>
</x-app-layout>
