<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom mb-3">
    <div class="container-fluid">
        <div class="navbar-nav">
            <a class="nav-link {{ !Request::is('feed') ?: 'active' }}" href="{{ route('feed') }}">Новости</a>
            <a class="nav-link {{ !Request::is('posts') ?: 'active' }}" href="{{ route('posts.index') }}">Посты</a>
            <a class="nav-link {{ !Request::is('about') ?: 'active' }}" href="{{ route('about') }}">О проекте</a>
        </div>
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('auth.signin') }}">Вход</a>
            <a class="nav-link" href="{{ route('auth.signup') }}">Регистрация</a>
        </div>
    </div>
</nav>