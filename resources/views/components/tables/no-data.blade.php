@props([
  'content' => '沒有資料',
  'wrapperClass' => '',
])

<div class="table-no-data {{ $wrapperClass }}">
  <h2 class="table-no-data-text">{{ $content }}</h2>
</div>
