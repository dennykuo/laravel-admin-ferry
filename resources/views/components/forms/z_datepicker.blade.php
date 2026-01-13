{{-- 日期&時間選單，因只有 vue2 版本，暫時改用其他方式替代 --}}

@props([
  'isVueModel' => false, // 同一的 vue vm 裡不可混用不同設定
  'name' => null,
  'label' => null,
  'hasTime' => false,
  'value' => null,
  'wrapperClass' => '',
  'inputClass' => '',
  'append' => null,
])

@php
  $attributes = $attributes->class(["form-input {$inputClass}"])
                           ->merge(['autocomplete' => 'off'])
                           ->getAttributes();

  $input = Form::text($name, $value, $attributes);
@endphp

<div class="form-group {{ $wrapperClass }}">
  @if ($label)
    <label>{{ $label }}</label>
  @endif

  @if ($append)
    <div class="form-append">
  @endif

      <vue-ctk-date-time-picker
        v-model="date"
        format="{{ $hasTime ? 'YYYY-MM-DD HH:mm' : 'YYYY-MM-DD' }}"
        formatted="{{ $hasTime ? 'YYYY-MM-DD HH:mm' : 'YYYY-MM-DD' }}"
        output-format="{{ $hasTime ? 'YYYY-MM-DD HH:mm' : 'YYYY-MM-DD' }}"
        :only-date="{{ $hasTime ? 'false' : 'true' }}"
        locale="zh_TW"
        button-now-translation="現在"
        :auto-close="true"
        :no-label="true"
        :no-header="true"
      >
        {!! $input !!}
      </vue-ctk-date-time-picker>

  @if ($append)
      <span class="flex items-center px-4 bg-gray-200 text-gray-500 text-sm rounded-r">{{ $append }}</span>
    </div>
  @endif

</div>

@if (! $isVueModel)
@once
  <script>
    // Vue Component standalone
    ['DOMContentLoaded', 'htmx:afterSwap'].forEach((event) => {
      handleDatePickerInit(event);
    });

    function handleDatePickerInit(event) {
      document.addEventListener(event, function() {
        var elements = document.getElementsByTagName('vue-ctk-date-time-picker');
        elements = Array.prototype.slice.call(elements);
        elements.forEach(function(el) {
          // 取 input value
          var date = el.children[0].getAttribute('value');

          Vue.createApp({
            data() {
              return {
                data: {
                  date: date
                }
              }
            }
          }).mount(el);
        });
      });
    }
  </script>
@endonce
@endif
