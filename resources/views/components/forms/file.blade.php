@props([
  'name' => null,
  'label' => null,
  'wrapperClass' => '',
  'inputClass' => '',
  'id' => 'file-input-' . bin2hex(random_bytes(4)),
])

@php
  // 因不同其他 input 是由 Laravel Form 套件產生，所以需手動組合 attributes
  $attributesHTML = '';
  foreach ($attributes as $attribute => $value) {
    $attributesHTML .= " {$attribute}=\"{$value}\"";
  }
@endphp

<div class="form-group {{ $wrapperClass }}">
  @if ($label) <label>{{ $label }}</label> @endif
  <label class="form-input cursor-pointer {{ $inputClass }}" for="{{ $id }}">
    <input id="{{ $id }}" name="{{ $name }}" type="file" class="hidden" {!! $attributesHTML !!}>
    <span class="block w-full truncate text-gray-500">選擇檔案</span>
  </label>

  @if ($slot->isNotEmpty())
    <div class="mt-1.5">
      {!! $slot !!}
    </div>
  @endif
</div>

<script>
  document.getElementById('{{ $id }}').addEventListener('change', function(e) {
    let fileNameEl = e.target.nextElementSibling;
    fileNameEl.innerText = e.target.files.length ? e.target.files[0].name : '選擇檔案';
  });
</script>
