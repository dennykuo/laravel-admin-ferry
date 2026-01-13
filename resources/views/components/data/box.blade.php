@props([
  'wrapperClass' => '',
  'itemClass' => '',
  'data' => [],
  'unit' => null,
  'links' => [],
])

@php
  $hasLinks = count($links);
@endphp

<div class="mx-auto flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3 md:space-4 {{ $wrapperClass }}">

  @foreach ($data as $key => $value)
    @php
      $link = $hasLinks && isset($links[$loop->index]) ? $links[$loop->index] : null;
      $tag = $link ? 'a' : 'div';
    @endphp

    <{{ $tag }} href="{{ $link ? $link : 'javascript:void(0);' }}" class="block w-full border border-gray-100 shadow rounded p-5 {{ $link ? 'hover:bg-gray-50' : '' }} {{ $itemClass }}">
      <div class="w-full flex justify-between items-center">
        <div class="text-center sm:text-left">
          <h3 class="text-sm leading-6 font-medium text-gray-500/80 truncate">{{ $key }}</h3>
          <p class="text-2xl font-medium text-gray-700">
            {{ is_numeric($value) ? number_format($value) : $value }}
            {{ $unit ?? ''}}
          </p>
        </div>

        @if ($link)
          <button class="flex justify-end w-5 text-center">
            <svg width="12" fill="currentColor" height="12" class="hover:text-gray-700 dark:hover:text-white dark:text-gray-200 text-gray-500" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
              <path d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z"></path>
            </svg>
          </button>
        @endif
      </div>
    </{{ $tag }}>
  @endforeach

</div>
