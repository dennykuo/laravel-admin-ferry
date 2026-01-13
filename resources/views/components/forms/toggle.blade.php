{{-- 注意 id 的設定，因會有未設 id 而自動帶入 --}}
@props([
  'id' => null,
  'name' => null,
  'label' => null,
  'value' => '1',
  'disabledValue' => null, // 關閉狀態下的欄位值
  'checked' => null, // {$value} (是否與 $value 相同而定), true, false
  'wrapperClass' => '',
  'inputClass' => '',
])

@php
  // 此元件不能有 required 屬性，因會有缺值的狀況導致表單無法成功驗證並送出，所以刪除此屬性
  if ($attributes->has('required')) {
    $attributes = $attributes->except('required');
  }

  if ($id === null) {
    $id = "toggle-{$name}-" . bin2hex(random_bytes(7));
  }

  if (! is_bool($checked)) {
    $checked = $checked == $value;
  }

  $attributes = $attributes->class(['hidden'])
                           ->merge(['id' => $id])
                           ->getAttributes();
@endphp

<div class="form-group {{ $wrapperClass }}">
  @if ($label)
    <label>{{ $label }}</label>
  @endif

  <div>
    {{-- 關閉狀態下的欄位值 --}}
    @if ($disabledValue !== null)
      {!! html()->checkbox($name, true, $disabledValue)->attributes(['id' => $id.'-disabled', 'class' => 'hidden']) !!}
    @endif
    
    <label for="{{ $id }}" class="form-toggle inline-block cursor-pointer relative {{ $inputClass }}">
      {!! html()->checkbox($name, $checked, $value)->attributes($attributes) !!}
      <div class="bar w-12 h-7 bg-gray-200 rounded-full shadow-inner border border-gray-100 transition duration-300"></div>
      <div class="dot absolute w-5 h-5 bg-white rounded-full shadow-md left-1 top-1 transition duration-300"></div>
    </label>
  </div>

  {{ $slot }}
</div>
