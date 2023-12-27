<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('feed') ? 'active' : '' }}" href="{{ URL::route('feed') }}">Новости</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('posts') ? 'active' : '' }}" href="{{ URL::route('posts.index') }}">Посты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ URL::route('about') }}">О проекте</a>
            </li>
        </ul>
    </div>
</nav>