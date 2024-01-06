<a @class([
    'nav-link', 
    'active' => Route::is($to)
]) 
href="{{ route($to) }}">
    {{ $slot }}
</a>
  