<a @class([
    'nav-link', 
    'active' => Request::is($routeName)
]) 
href="{{ route($routeName) }}">
    {{ $content }}
</a>
  