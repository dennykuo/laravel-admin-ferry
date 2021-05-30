<nav id="nav"
     @click.stop
     class="p-nav"
     :class="{ 'is-open': sidebar.isShow }"
>

  @foreach (config('admin-view.nav', null) as $name => $link)

    {{-- 單層選單 --}}
    @if (is_string($link))
      @php $link = Route::has($link) ? route($link) : '/'; @endphp
      <nav-item name="{{ $name }}" href="{{ $link }}"></nav-item>
    @endif

    {{-- 雙層選單 --}}
    @if (is_array($link))
      <nav-set name="{{ $name }}">
        @foreach ($link as $name => $link)
          @php $link = Route::has($link) ? route($link) : '/'; @endphp
          <nav-item name="{{ $name }}" href="{{ $link }}"></nav-item>
        @endforeach
      </nav-set>
    @endif

  @endforeach

</nav>

{{-- vue component template --}}
<script id="nav-item" type="text/x-template">
  <a :href="href"
     data-fetch-url
     class="p-nav-item"
     :class="{ 'is-active': isActive }"
  >
    @{{ name }}
  </a>
</script>

{{-- vue component template --}}
<script id="nav-set" type="text/x-template">
  <div :class="{ 'is-open': isOpen }" class="p-nav-set">

    <div @click="isOpen = ! isOpen" class="p-nav-item">
      @{{ name }}
      <svg class="p-nav-item-append-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
      </svg>
    </div>

    <div class="p-nav-submenu">
      <slot></slot>
    </div>

  </div>
</script>
