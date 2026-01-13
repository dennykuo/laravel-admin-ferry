@props([
  'name' => '',
])

<div class="ferry-search">
  <div class="ferry-search-icon">
    <i class="fa-solid fa-magnifying-glass"></i>
  </div>
  <div class="ferry-search-form">
    <input placeholder="" {{ $attributes->class(['form-input'])->merge() }}>
    <x-admin-ferry::button tag="button" type="button">查詢</x-admin-ferry::button>
  </div>
</div>
