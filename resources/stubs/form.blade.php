@php
  $isCreate = request()->route()->getActionMethod() == 'action'
              || Str::endsWith(request()->path(), 'create');
@endphp

---
page:
  name: {{ $isCreate ? '新增' : '修改' }}表單
breadcrumb:
  列表: '/'
---

<x-admin-ferry::section id="app" size="md" is-form="true">

  <x-admin-ferry::alert.error :errors="$errors" />

  @if ($isCreate)
    {!! html()->form('POST', [])->open() !!}
  @else
    {!! html()->modelForm($post, 'POST', [])->open() !!}
  @endif

    <x-admin-ferry::forms.input label="標題" name="" />

    <x-admin-ferry::forms.input label="後綴" name="" type="number" append="元" />

    <x-admin-ferry::forms.input label="前綴" name="" type="number" prepend="$" />

    <x-admin-ferry::forms.datepicker label="日期" name="" value="{{ \Carbon\Carbon::today() }}" />

    <x-admin-ferry::forms.select label="下拉選單" name="" :options="['Apple', 'Banana', 'Cat']" placeholder="請選擇" />

    <x-admin-ferry::forms.checkbox label="多選項目" name="" :options="['male' => '男', 'female' => '女', 'other' => '其他']" :checked="['female', 'male']" />

    <x-admin-ferry::forms.radio label="單選項目" name="" :options="['male' => '男', 'female' => '女', 'other' => '其他']" checked="female" />

    <x-admin-ferry::forms.file label="檔案" name="" />

    <x-admin-ferry::forms.toggle label="開放" name="" />

    <x-admin-ferry::forms.input label="內容" name="" type="textarea" rows="6" />

    <x-admin-ferry::forms.submit text="儲存" />

  @if ($isCreate)
    {!! html()->form()->close() !!}
  @else
    {!! html()->closeModelForm() !!}
  @endif

</x-admin-ferry::section>
