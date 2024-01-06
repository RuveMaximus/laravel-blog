<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom mb-3">
    <div class="container-fluid">
        <div class="navbar-nav">
            <x-nav-link to="feed">Новости</x-nav-link>
            <x-nav-link to="post.index">Посты</x-nav-link>
            <x-nav-link to="about">О проекте</x-nav-link>
        </div>

        @guest
            <div class="navbar-nav">
                <x-nav-link to="auth.signin">Вход</x-nav-link>
                <x-nav-link to="auth.signup">Регистрация</x-nav-link>
            </div>
        @endguest
        
        @auth
            <div class="navbar-nav">
                <x-nav-link to="user.me">Профиль</x-nav-link>
            </div>
        @endauth
    </div>
</nav>