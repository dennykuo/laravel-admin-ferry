@props([
  'messages' => null,
  'wrapperClass' => '',
  'closeBtnClass' => '',
])

@if ($messages)
<div class="ferry-alert {{ $wrapperClass }}">
  <div class="w-full flex items-center">

    <i class="fa-solid fa-circle-check mr-4 fa-xl"></i>

    @if (is_string($messages))
      {{ $messages }}
    @else
      <ul class="list-disc list-inside">
        @foreach ($messages as $item)
          <li>{{ $item }}</li>
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
