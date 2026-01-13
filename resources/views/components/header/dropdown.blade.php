@props([
  'items' => [ //array
    // ['name' => '修改資料', 'link' => '/', 'new-page' => true],
  ],
  'wrapperClass' => '',
  'togglerId' => 'toolbar-dropdown-toggler-' . bin2hex(random_bytes(4)),
])

<input id="{{ $togglerId }}" class="toolbar-dropdown-toggler" type="checkbox">

<div class="ferry-toolbar-dropdown {{ $wrapperClass }}">
  <label for="{{ $togglerId }}" class="ferry-toolbar-dropdown-name">
    {!! $slot !!}
  </label>

  {{-- 關閉用遮罩 --}}
  <div class="ferry-toolbar-dropdown-close-trigger"
    onclick="document.getElementById('{{ $togglerId }}').checked = false;"
  ></div>

  {{-- 子選單外框 --}}
  <div class="ferry-toolbar-dropdown-submenu">
    {{-- 子選單 --}}
    @foreach ($items as $item)
      <a href="{{ $item['link'] }}" {!! ! empty($item['new-page']) ? 'target="_blank"' : '' !!}
        class="ferry-toolbar-dropdown-submenu-item">
        {{ $item['name'] }}
      </a>
    @endforeach
  </div>
</div>
