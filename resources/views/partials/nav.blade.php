<section id="vue-ferry-nav">

  <div class="ferry-nav-mask" v-show="sidebar.isShow"></div>

  <nav @click.stop
       class="ferry-nav"
       :class="{ 'is-open': sidebar.isShow }"
  >

    <button class="ferry-nav-close"
            onclick="window.admin.helpers.toggleNavSidebar(false); event.stopPropagation();"
            type="button"
    >
      {{-- <i class="fa-solid fa-xmark"></i> --}}
      <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#707070"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.128"></g><g id="SVGRepo_iconCarrier"><line x1="8" y1="8" x2="24" y2="24"></line><line x1="24" y1="8" x2="8" y2="24"></line></g></svg>
    </button>

    {{-- 若有指定的 nav view，直接引入 --}}
    @includeIf(config('admin-ferry.nav-view'))

    {{-- 引入 config 中 admin-ferry.nav 項目 --}}
    @foreach (config('admin-ferry.nav', null) as $name => $link)
      {{-- 分類提示，非連結或雙層選單 --}}
      @if (is_null($link))
        <div class="ferry-nav-label">{{ $name }}</div>
      @endif

      {{-- 單層選單 --}}
      @if (is_string($link))
        @php $link = Route::has($link) ? route($link) : $link; @endphp
        <ferry-nav-item name="{{ $name }}" href="{{ $link }}"></ferry-nav-item>
      @endif

      {{-- 雙層選單 --}}
      @if (is_array($link))
        <ferry-nav-dropdown name="{{ $name }}">
          @foreach ($link as $name => $link)
            @php $link = Route::has($link) ? route($link) : '/'; @endphp
            <ferry-nav-item name="{{ $name }}" href="{{ $link }}"></ferry-nav-item>
          @endforeach
        </ferry-nav-dropdown>
      @endif
    @endforeach

  </nav>
</section>

{{-- vue component template --}}
<script id="ferry-nav-item-template" type="text/x-template">
  <a :href="href"
     data-fetch-url
     class="ferry-nav-item"
     :class="{ 'is-active': isActive }"
  >
    <slot></slot>

    <span>
      <slot name="prefix"></slot>
      @{{ name }}
    </span>
  </a>
</script>

{{-- vue component template --}}
<script id="ferry-nav-dropdown-template" type="text/x-template">
  <div :class="{ 'is-open': isOpen }" class="ferry-nav-dropdown">

    <div @click="isOpen = ! isOpen" class="ferry-nav-item">
      @{{ name }}
      <svg class="ferry-nav-item-append-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
      </svg>
    </div>

    <div class="ferry-nav-submenu">
      <slot></slot>
    </div>

  </div>
</script>
