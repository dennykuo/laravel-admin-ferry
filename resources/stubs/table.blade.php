---
page:
  name: 資料表格
breadcrumb:
  index: '/'
---

<x-admin-ferry::section>

  <x-admin-ferry::search />

  <div class="flex justify-end !mb-5">
    <x-admin-ferry::button href="#">新增</x-admin-ferry::button>
  </div>

  {{-- @if ($data->isNotEmpty()) --}}
    <x-admin-ferry::tables.data-table is-responsive>
      <tr>
        <th>編號</th>
        <th class="w-1/2">名稱</th>
        <th class="w-1/5">內容</th>
        <th>標籤</th>
        <th>開啟</th>
        <th data-tool>動作</th>
      </tr>

      <tr>
        <td data-label="編號">
          {{--  --}}
        </td>
        <td data-label="名稱">
          {{--  --}}
        </td>
        <td data-label="內容">
          {{--  --}}
        </td>
        <td data-label="標籤">
          {{--  --}}
        </td>
        <td data-label="開啟">
          {{--  --}}
        </td>
        <x-admin-ferry::tables.td-tool>
          <x-admin-ferry::button href="#">修改</x-admin-ferry::button>
          <x-admin-ferry::button tag="button" color="red">刪除</x-admin-ferry::button>
        </x-admin-ferry::tables.td-tool>
      </tr>
    </x-admin-ferry::tables.data-table>
  {{-- @else --}}
    <x-admin-ferry:x-admin-ferry::tables.no-data />
  {{-- @endif --}}

</x-admin-ferry::section>
