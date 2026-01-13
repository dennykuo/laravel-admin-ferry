<header class="ferry-header">

  <button class="ferry-nav-toggler" onclick="window.admin.helpers.toggleNavSidebar(); event.stopPropagation();" type="button">
    <i class="fa-solid fa-bars fa-xs"></i>
  </button>

  @php
    $homeLink = config('admin-ferry.home');
    $homeLink = \Route::has($homeLink) ? route($homeLink) : $homeLink;
  @endphp

  <div class="ferry-header-brand">
    <a href="{{ $homeLink }}" data-fetch-url class="ferry-header-brand-name">{{ config('admin-ferry.name', config('app.name', '後台')) }}</a>
    @if (! \App::environment('production'))
      <span class="ferry-for-test">測試</span>
    @endif
  </div>

  {{-- ferry-header-toolbar --}}
  <div class="ferry-header-toolbar">
    @includeIf(config('admin-ferry.header-toolbar-view'))

{{--    <x-admin-ferry::header.dropdown icon-class="text-2xl" :items="--}}
{{--      [--}}
{{--        ['name' => '登出', 'link' => '/'],--}}
{{--      ]--}}
{{--    ">--}}
{{--      <i class="fa-regular fa-user"></i>--}}
{{--    </x-admin::header.dropdown>--}}
  </div>

</header>
