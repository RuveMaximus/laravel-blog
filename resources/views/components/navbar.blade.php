<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom mb-3">
    <div class="container-fluid">
        <div class="navbar-nav">
            <x-nav-link route-name="feed" content="Новости"/>
            <x-nav-link route-name="posts" content="Посты"/>
            <x-nav-link route-name="about" content="О проекте"/>
        </div>

        @guest
            <div class="navbar-nav">
                <x-nav-link route-name="login" content="Вход"/>
                <x-nav-link route-name="register" content="Регистрация"/>
            </div>
        @endguest
        
        @auth
            <div class="navbar-nav">
                <x-nav-link route-name="auth.profile" content="Профиль"/>
            </div>
        @endauth
    </div>
</nav>