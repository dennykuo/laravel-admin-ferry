@props([
  'id',
  'isShow' => false,
  // 'size' => 'md',
  'title' => null,
  'contentAllowHtml' => false,
  'hasCloseButton' => true,
  'hasFooter' => true,
  'hasCancelBtn' => true,
  'hasConfirmBtn' => true,
  'cancelBtnText' => '取消',
  'confirmBtnText' => '送出',
  'confirmJsCallBack' => null,
  'scripts' => null,
])
<!--
  Background backdrop, show/hide based on modal state.

  Entering: "ease-out duration-300"
    From: "opacity-0"
    To: "opacity-100"
  Leaving: "ease-in duration-200"
    From: "opacity-100"
    To: "opacity-0"
-->

{{-- Modal --}}
<section id="{{ $id }}" class="{{ $isShow ? 'scale-100 is-show' : 'scale-0' }} fixed inset-0 z-[9999] flex items-center justify-center p-4 text-center sm:p-0 !m-0">

  {{-- Background overlay --}}
  <div class="fixed inset-0 bg-gray-600/40 transition-opacity duration-200"></div>

  <!--
    Modal panel, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-30 translate-y-12 sm:scale-80"
      To: "opacity-100 translate-y-0 sm:scale-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100 translate-y-0 sm:scale-100"
      To: "opacity-30 translate-y-12 sm:scale-80"
  -->
  {{-- Modal panel --}}
  <div data-modal-panel class="relative w-full sm:max-w-lg overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all duration-500 sm:my-8 opacity-30 translate-y-12 sm:scale-80">

    {{-- 關閉按鈕 --}}
    @if ($hasCloseButton)
      <div class="absolute inset-y-0-0 right-0 pt-5 sm:pt-6 pr-4 sm:pr-5">
        <button type="button" class="js-modal-close w-6 h-6">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="oc se"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
      </div>
    @endif

    <!-- Modal content -->
    <div class="bg-white px-4 py-5 sm:px-5 sm:py-6">
      <div class="w-full sm:flex sm:items-start">
        {{-- <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"> --}}
        {{--   <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"> --}}
        {{--     <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" /> --}}
        {{--   </svg> --}}
        {{-- </div> --}}
        <div class="w-full">
          {{-- 標題 (pr-7 為避開關閉按鈕) --}}
          @if ($title)
            <h3 class="text-lg font-semibold leading-6 text-gray-900 {{ $hasCloseButton ? 'pr-7' : '' }}">
              {{ $title }}
            </h3>
          @endif

          {{-- 內容 --}}
          @if ($slot->isNotEmpty())
            {{-- (pr-7 為避開關閉按鈕) --}}
            <div @class(['mt-5' => ! empty($title),  'pr-7' => empty($title) && $hasCloseButton, 'text-gray-500'])>
              @if ($contentAllowHtml)
                {!! $slot !!}
              @else
                {{ $slot }}
              @endif
            </div>
          @endif
        </div>
      </div>
    </div>
    <!-- /Modal content -->

    @if ($hasFooter)
      {{-- Modal footer --}}
      <div class="bg-gray-100/90 px-4 sm:px-6 py-4 flex sm:justify-end gap-3 text-sm">
        <button type="button" class="js-modal-close inline-flex w-1/2 sm:w-auto justify-center rounded-md px-4 py-2.5 text-gray-900 bg-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
          {{ $cancelBtnText }}</button>

        <button type="button" class="js-modal-callback inline-flex w-1/2 sm:w-auto justify-center rounded-md px-4 py-2.5 bg-red-400 hover:bg-red-500 text-white shadow-sm">
          {{ $confirmBtnText }}</button>
      </div>
      {{-- /Modal footer --}}
    @endif
  </div>
  {{-- /Modal panel --}}

</section>
{{-- /Modal wrapper --}}

<script>
  (function() {
    let modal = document.getElementById('{{ $id }}');

    modal.querySelectorAll('.js-modal-close').forEach((el) => {
      el.addEventListener('click', () => {
        window.admin.modal.close('{{ $id }}');
      });
    });

    @if ($confirmJsCallBack)
      modal.querySelector('.js-modal-callback').addEventListener('click', () => {
        {!! $confirmJsCallBack !!}
      });
    @endif
  })();
</script>

@if ($scripts)
  {!! $scripts !!}
@endif

