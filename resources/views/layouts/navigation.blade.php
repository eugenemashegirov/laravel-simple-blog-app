<div class="container">
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container-fluid">
            <a href="/" class="navbar-brend d-flex align-items-center col-md-2 mb-2 mb-md-0 text-white text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bootstrap-fill me-2" viewBox="0 0 16 16">
                    <path d="M6.375 7.125V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"/>
                    <path d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396H5.062z"/>
                </svg>
                <span class="fs-4">Blog</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @guest
                    <div class="ms-auto">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link m-0 p-0" data-bs-toggle="modal" data-bs-target="#loginModal">
                                    <button type="button" class="btn btn-outline-light me-2">Login</button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link m-0 p-0" data-bs-toggle="modal" data-bs-target="#registerModal">
                                    <button type="button" class="btn btn-primary">Sign up</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endguest

                @auth
                    <div class="nav-item dropdown ms-auto">
                        <a class="nav-link dropdown-toggle text-light" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li>
                                <span class="dropdown-header">{{ auth()->user()->email }}</span>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a id="logout" class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</div>
