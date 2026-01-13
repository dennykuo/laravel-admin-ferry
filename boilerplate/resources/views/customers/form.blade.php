---
page:
  name: 客戶資料
breadcrumb:
  客戶資料管理: {{ route('customers.index') }}
---

<x-admin::section size="md" is-form="true">

  @if ($errors->any())
    <x-admin::alert.error :errors="$errors" />
  @endif

  @if ( ! empty($customer))
    {!! Form::model($customer, ['method' => 'put', 'route' => ['customers.update', $customer]]) !!}
  @else
    {!! Form::open(['method' => 'post', 'route' => 'customers.store']) !!}
  @endif

    <x-admin::forms.input label="公司名稱" name="company" required />

    <x-admin::forms.input label="統編" name="tax_id" pattern="\d{8}" maxlength="8" required />

    <x-admin::forms.input label="聯絡人" name="contact_person" required />

    <x-admin::forms.input label="Email" name="email" type="email" required />

    <x-admin::forms.input label="服務費" name="fee" type="number" append="%" step="0.1" min="0" max="100" required>
      @if ( ! empty($customer))
        <p class="mt-2 text-red-700 text-xs">注意：修改服務費不會同步到請求中的發票</p>
      @endif
    </x-admin::forms.input>

    <x-admin::forms.input label="備註" name="comment" type="textarea" rows="4" />

    <x-admin::forms.submit text="儲存" />

  {!! Form::close() !!}

</x-admin::section>
