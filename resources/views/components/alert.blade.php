@props([
  'type',
  'content',
  'wrapperClass' => '',
  'closeBtnClass' => '',
])

@php
  switch ($type) {
    case 'notify':
      $iconClass = 'fa-circle-check';
      $wrapperDefaultClass = 'notify';
      break;

    case 'error':
      $iconClass = 'fa-circle-exclamation';
      $wrapperDefaultClass = 'error';
      break;

    default:
      $iconClass = 'fa-circle-exclamation';
      $wrapperDefaultClass = 'info';
  }

  // 若為 content 為 Illuminate\Support\ViewErrorBag 時
  if ($content instanceof Illuminate\Support\ViewErrorBag) {
    $content = $content->all();
  }
@endphp

@if ($content)
  <div class="ferry-alert {{ $wrapperDefaultClass }} {{ $wrapperClass }}">
    <div class="w-full flex items-center">

      <i class="fa-solid {{ $iconClass }} mr-4 fa-xl"></i>

      @if (is_string($content))
        {{ $content }}
      @elseif (is_array($content) && count($content) === 1)
        {{ $content[0] }}
      @elseif (is_array($content))
        <ul>
          @foreach ($content as $item)
            <li class="leading-7">{{ $item }}</li>
          @endforeach
        </ul>
      @endif

    </div>

    <button type="button"
            class="flex-shrink-0 flex rounded-md {{ $closeBtnClass }}"
            onclick="this.parentElement.remove();"
      >
      <i class="fa-solid fa-xmark fa-xl"></i>
    </button>

  </div>
@endif
