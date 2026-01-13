@props([
  'text' => '送出',
  'type' => 'submit',
  'wrapperClass' => '',
  'inputClass' => '',
])

<div class="w-100 h-px"></div>{{-- Just for space padding --}}

<div class="ferry-form-submit {{ $wrapperClass }}">
  <button type="{{ $type }}" class="ferry-form-submit-button {{ $inputClass }}" {{ $attributes }}>{{ $text }}</button>
</div>
