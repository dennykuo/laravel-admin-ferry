---
page:
  name: 客戶資料管理
breadcrumb: null
---

<x-admin::section size="lg">

  @if (session()->has('status'))
    <x-admin::alert.notify :message="session('status')" />
  @endif

  @if ($errors->any())
    <x-admin::alert.error :errors="$errors" />
  @endif

  <div class="flex justify-end">
    <a href="{{ route('customers.create') }}" class="btn btn-light-primary py-3"><i class="fa-thin fa-plus"></i>新增客戶</a>
  </div>

  @if ($customers->count())

    <x-admin::tables.data-table is-responsive>
      <tr>
        <th class="w-1/5">公司名稱</th>
        <th class="w-32">服務費</th>
        <th class="w-1/5">聯絡人</th>
        <th class="w-1/5">備註</th>
        <th class="w-28">動作</th>
      </tr>

      @foreach ($customers as $customer)
        <tr>
          <td data-label="公司名稱">
            <h3 class="text-xl">{{ $customer->company }}</h3>
            <p class="text-gray-400 mb-2">{{ $customer->tax_id }}</p>
          </td>
          <td data-label="服務費">
            {{ $customer->fee }} %
          </td>
          <td data-label="聯絡人">
            {{ $customer->contact_person }}<br>
            <small>{{ $customer->email }}</small>
          </td>
          <td data-label="備註">
            <small>{!! nl2br($customer->comment) !!}</small>
          </td>
          <td data-tool>
            <div class="flex flex-col space-y-3">
              <a href="{{ route('customers.edit', $customer) }}" class="btn btn-light-secondary py-3">修改</a>
              {{-- <a href="{{ route('customers.destroy') }}" class="btn btn-light-danger py-3">刪除</a> --}}
            </div>
          </td>
        </tr>
      @endforeach
    </x-admin::tables.data-table>

  @else

    <div class="pt-8 pb-28 text-center">
      <h2 class="text-4xl font-light text-gray-400 mb-5">沒有資料</h2>
    </div>

  @endif

</x-admin::section>
