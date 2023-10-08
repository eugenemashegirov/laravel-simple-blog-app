<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name') }}</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <header class="header sticky-top bg-dark">
            @include('layouts.navigation')
        </header>

        <main class="main">
            {{ $slot }}
        </main>

        <footer class="footer sticky-bottom bg-dark py-2 text-center">
            <small>
                Designed with
                <svg xmlns="http://www.w3.org/2000/svg" style="color: #fb866a;" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                </svg>
                by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers
            </small>
        </footer>

        <!-- Navigation modals -->
        @guest
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Login</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="loginForm" action="/login" method="POST">
                                <div class="mb-3">
                                    <label for="login-email" class="col-form-label">Email:</label>
                                    <input required type="email" name="email" class="form-control" id="login-email" placeholder="Your email">
                                </div>
                                <div class="mb-3">
                                    <label for="login-password" class="col-form-label">Password:</label>
                                    <input required type="password" name="password" class="form-control" id="login-password" placeholder="Your password">
                                </div>
                            </form>
                            <div id="loginAlert" role="alert"></div>
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
                            <form id="registerForm" action="/register" method="POST">
                                <div class="mb-3">
                                    <label for="register-username" class="col-form-label">Username:</label>
                                    <input required type="text" name="name" class="form-control" id="register-username" placeholder="Your username">
                                </div>
                                <div class="mb-3">
                                    <label for="register-email" class="col-form-label">Email:</label>
                                    <input required type="email" name="email" class="form-control" id="register-email" placeholder="Your email">
                                </div>
                                <div class="mb-3">
                                    <label for="register-password" class="col-form-label">Password:</label>
                                    <input required type="password" name="password" class="form-control" id="register-password" placeholder="Your password">
                                </div>
                                <div class="mb-3">
                                    <label for="register-password_conf" class="col-form-label">Confirm password:</label>
                                    <input required type="password" name="password_confirmation" class="form-control" id="register-password_conf" placeholder="Your password">
                                </div>
                            </form>
                            <div id="registerAlert" role="alert"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button form="registerForm" type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        @endguest
    </body>
</html>
