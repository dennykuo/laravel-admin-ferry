<header class="ferry-header">

  <button class="ferry-nav-toggler" onclick="window.admin.helpers.toggleNavSidebar(); event.stopPropagation();" type="button">
    <i class="fa-solid fa-bars fa-xs"></i>
  </button>

  @php
    $homeLink = config('admin-ferry.home');
    $homeLink = Route::has($homeLink) ? route($homeLink) : $homeLink;
  @endphp

  <div class="ferry-brand">
    <a href="{{ $homeLink }}" data-fetch-url class="ferry-brand-name">{{ config('admin-ferry.name', '後台') }}</a>
    @if (! \App::environment('production'))
      <span class="text-sm bg-red-400 text-white ml-2.5 px-2 py-1 rounded-full leading-none">測試</span>
    @endif
  </div>

  {{-- header-toolbar --}}
  <div class="ferry-header-toolbar">
    @includeIf(config('admin-ferry.header-toolbar-view'))
  </div>

</header>
