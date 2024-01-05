<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom mb-3">
    <div class="container-fluid">
        <div class="navbar-nav">
            <x-nav-link to="feed">Новости</x-nav-link>
            <x-nav-link to="posts">Посты</x-nav-link>
            <x-nav-link to="about">О проекте</x-nav-link>
        </div>

        @guest
            <div class="navbar-nav">
                <x-nav-link to="login">Вход</x-nav-link>
                <x-nav-link to="register">Регистрация</x-nav-link>
            </div>
        @endguest
        
        @auth
            <div class="navbar-nav">
                <x-nav-link to="auth.profile">Профиль</x-nav-link>
            </div>
        @endauth
    </div>
</nav>