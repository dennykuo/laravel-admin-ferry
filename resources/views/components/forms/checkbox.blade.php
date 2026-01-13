@props([
  'id' => null,
  'name' => null,
  'label' => null,
  'options' => [], // ['value' => 'key']
  'checked' => [],
  'wrapperClass' => '',
  'inputClass' => '',
  'listType' => 'row', // row || col
])

@php
  $attributes = $attributes->class(["form-checkbox {$inputClass}"])->getAttributes();
@endphp

<div class="form-group {{ $wrapperClass }}">
  @if ($label)
    <label>{{ $label }}</label>
  @endif

  <div class="flex flex-wrap {{ $listType == 'row' ? 'flex-row' : 'flex-col' }}">
    @foreach($options as $value => $text)
      <label class="mr-5">
        @php
          $isChecked = false;
          if (is_array($checked)) {
            $isChecked = in_array($value, $checked);
          } else {
            $isChecked = $value == $checked;
          }
        @endphp
        {!! html()->checkbox($name, $isChecked ? true : null, $value)->attributes($attributes)->id($id) !!}
        <span class="ml-1.5 cursor-pointer">{{ $text }}</span>
      </label>
    @endforeach
  </div>

  {!! $slot !!}
</div>
