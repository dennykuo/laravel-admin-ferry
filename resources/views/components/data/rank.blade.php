@props([
  'title' => null,
  'data' => [],
  'unit' => null,
  'total' => null,
  'link' => 'javascript:void(0);',
  'linkText' => '瀏覽更多',
])

<section class="mx-auto border border-gray-100 shadow rounded px-5 py-4">
  <div class="mb-7">
    <h3 class="text-sm leading-7 font-medium text-gray-500/80 truncate">{{ $title }}</h3>

    @if ($total)
      <h2 class="text-3xl font-bold text-gray-700 my-0">
        {{ $total }} {{ $unit ?? ''}}
      </h2>
    @endif
  </div>

  @if (count($data) == 0)
    <p class="text-sm text-gray-500">無資料</p>
  @else
    <div class="space-y-5">
      @foreach ($data as $key => $value)
        <div class="flex flex-col space-y-2">

          <div class="flex justify-between text-sm">
            <span class="text-gray-600 font-semibold">{{ $key ?? '' }}</span>
            <div class="text-gray-600">
              {{ $value }}
              @if ($total)
                <span class="text-gray-500 ml-1">({{ round($value / $total * 100, 2) }}%)</span>
              @endif
            </div>
          </div>

          <div class="w-full">
            <div class="bg-blue-100/70 w-full rounded-lg h-2">
              <div style="width: {{ $value }}%" class="bg-blue-500 rounded-lg h-2"></div>
            </div>
          </div>

        </div>
      @endforeach
    </div>

    <div class="w-full flex justify-end mt-5 mb-2.5 pt-4 border-t">
      <a href="{{ $link }}" class="tremor-Button-root flex-shrink-0 inline-flex justify-center items-center group focus:outline-none focus:ring-2 focus:ring-offset-2 font-medium text-sm text-blue-500 bg-transparent hover:text-blue-700">
        <span class="text-sm">{{ $linkText }}</span>
        <svg class="h-5 w-5 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
      </a>
    </div>
  @endif

</section>
