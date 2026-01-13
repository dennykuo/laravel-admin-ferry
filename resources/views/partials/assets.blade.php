@php
  $assetsDir = '/vendor/laravel-admin-ferry'; // 頁面連結用
  $viteDevServer = 'http://localhost:5180';
@endphp

{{-- 如果宿主有安裝 laravel vite 時 (php 中有 vite 此 function)，
  只套用 laravel vite 嵌入的 tag，因下方 dev mode 中 @vite tag 會有作用上的衝突 --}}
@if (! env('ADMIN_FERRY_VITE_DEV', false) || function_exists('vite'))

  {{-- vite production mode --}}
  @php
    $assetsBuildUri = $assetsDir; // 頁面連結用
    $assetsBuildPath = public_path($assetsBuildUri); // 抓取檔案用
    $manifest = json_decode(file_get_contents($assetsBuildPath.'/manifest.json'), true);
  @endphp

  <link rel="stylesheet" href="{{ $assetsBuildUri }}/{{ $manifest['resources/css/app.css']['file'] }}" />
  <script type="module" src="{{ $assetsBuildUri }}/{{ $manifest['resources/js/app.js']['file'] }}"></script>

@else

  {{-- vite dev mode --}}
  <script type="module" src="{{ $viteDevServer }}/@@vite/client"></script>{{-- vite 中的 @vite 會與宿主中 laravel vite 衝突，需要多加一個 @ 為跳脫字元 --}}
  <link rel="stylesheet" href="{{ $viteDevServer }}/resources/css/app.css">
  <script type="module" src="{{ $viteDevServer }}/resources/js/app.js"></script>

@endif
