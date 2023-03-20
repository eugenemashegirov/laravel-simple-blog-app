<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name') }}</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header class="header sticky-top bg-dark">
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
    </header>

    @switch($page)
        @case('main')
            @include('pages.main')
            @break
        @case('post')
            @include('pages.post')
            @break
        @case('profile')
            @include('pages.profile')
            @break
    @endswitch

    <footer class="footer sticky-bottom bg-dark py-2 text-center">
        <small>
            Designed with 
            <svg xmlns="http://www.w3.org/2000/svg" style="color: #fb866a;" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
            </svg> 
            by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers
        </small>
    </footer>

    <!-- Modals -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="login-email" class="col-form-label">Email:</label>
                            <input required type="email" class="form-control" id="login-email" placeholder="Your email">
                        </div>
                        <div class="mb-3">
                            <label for="login-password" class="col-form-label">Password:</label>
                            <input required type="password" class="form-control" id="login-password" placeholder="Your password">
                        </div>
                    </form>
                    <div id="loginAlert" class="alert alert-danger" role="alert"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button form="loginForm" type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registerForm">
                        <div class="mb-3">
                            <label for="register-username" class="col-form-label">Username:</label>
                            <input required type="text" class="form-control" id="register-username" placeholder="Your username">
                        </div>
                        <div class="mb-3">
                            <label for="register-email" class="col-form-label">Email:</label>
                            <input required type="email" class="form-control" id="register-email" placeholder="Your email">
                        </div>
                        <div class="mb-3">
                            <label for="register-password" class="col-form-label">Password:</label>
                            <input required type="password" class="form-control" id="register-password" placeholder="Your password">
                        </div>
                        <div class="mb-3">
                            <label for="register-password_conf" class="col-form-label">Confirm password:</label>
                            <input required type="password" class="form-control" id="register-password_conf" placeholder="Your password">
                        </div>
                    </form>
                    <div id="registerAlert" class="alert alert-danger" role="alert"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button form="registerForm" type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>