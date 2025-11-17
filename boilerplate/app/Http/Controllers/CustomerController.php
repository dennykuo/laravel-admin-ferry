<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of customers
     *
     * @return View|Factory
     */
    public function index(): View|Factory
    {
        $customers = Customer::all();
        $view = view('customers.index', compact('customers'));

        return adminView($view);
    }

    /**
     * Show the form for creating a new customer
     *
     * @return View|Factory
     */
    public function create(): View|Factory
    {
        $view = view('customers.form');

        return adminView($view);
    }

    /**
     * Store a newly created customer in storage
     *
     * @param CustomerRequest $request
     * @return RedirectResponse
     */
    public function store(CustomerRequest $request): RedirectResponse
    {
        try {
            $customer = Customer::create($this->getAttributeFields($request));

            return redirect()
                ->route('customers.index')
                ->with('status', "成功新增客戶資料：{$customer->company}");
        } catch (\Exception $e) {
            logger()->error('Failed to create customer', [
                'error' => $e->getMessage(),
                'data' => $request->validated(),
            ]);

            return back()
                ->withInput()
                ->withErrors(['error' => '新增客戶資料失敗，請稍後再試']);
        }
    }

    /**
     * Display the specified customer
     *
     * @param int $id
     * @return View|Factory
     */
    public function show(int $id): View|Factory
    {
        $customer = Customer::findOrFail($id);
        $view = view('customers.show', compact('customer'));

        return adminView($view);
    }

    /**
     * Show the form for editing the specified customer
     *
     * @param Customer $customer
     * @return View|Factory
     */
    public function edit(Customer $customer): View|Factory
    {
        $view = view('customers.form', compact('customer'));

        return adminView($view);
    }

    /**
     * Update the specified customer in storage
     *
     * @param CustomerRequest $request
     * @param Customer $customer
     * @return RedirectResponse
     */
    public function update(CustomerRequest $request, Customer $customer): RedirectResponse
    {
        try {
            $customer->update($this->getAttributeFields($request));

            return redirect()
                ->route('customers.index')
                ->with('status', "成功修改客戶資料：{$customer->company}");
        } catch (\Exception $e) {
            logger()->error('Failed to update customer', [
                'customer_id' => $customer->id,
                'error' => $e->getMessage(),
                'data' => $request->validated(),
            ]);

            return back()
                ->withInput()
                ->withErrors(['error' => '修改客戶資料失敗，請稍後再試']);
        }
    }

    /**
     * Remove the specified customer from storage
     *
     * @param Customer $customer
     * @return RedirectResponse
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        try {
            $companyName = $customer->company;
            $customer->delete();

            return redirect()
                ->route('customers.index')
                ->with('status', "成功刪除客戶資料：{$companyName}");
        } catch (\Exception $e) {
            logger()->error('Failed to delete customer', [
                'customer_id' => $customer->id,
                'error' => $e->getMessage(),
            ]);

            return back()
                ->withErrors(['error' => '刪除客戶資料失敗，請稍後再試']);
        }
    }

    /**
     * Get validated attribute fields from request
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    protected function getAttributeFields(Request $request): array
    {
        return $request->only([
            'company',
            'tax_id',
            'contact_person',
            'email',
            'fee',
            'comment',
        ]);
    }
}
