@props([
  'tdClass' => '',
])

<td data-tool class="{{ $tdClass }}">
  <div class="flex flex-col xs:mt-3 lg:mt-0 space-y-3.5 lg:space-y-2">
    {{ $slot }}
  </div>
</td>
