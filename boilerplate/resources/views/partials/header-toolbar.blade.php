{{-- <a href="javascript:void(0)" class="text-xl"><i class="fa-solid fa-envelope"></i></a> --}}

<x-admin::header.dropdown icon-class="text-xl" :items="
  [
    ['name' => '登出', 'link' => route('auth.logout')],
  ]
">
  <i class="fa-solid fa-user"></i>
</x-admin::header.dropdown>
