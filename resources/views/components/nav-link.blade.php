<a @class([
    'nav-link', 
    'active' => Request::is($to)
]) 
href="{{ route($to) }}">
    {{ $slot }}
</a>
  