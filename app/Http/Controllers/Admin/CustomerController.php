<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreCustomerAddressRequest;
use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerAddressRequest;
use App\Http\Requests\Customer\UpdateCustomerNoteRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    private Customer $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = $this
            ->customer
            ->select(['name', 'spent'])
            ->withCount('orders')
            ->latest()
            ->all();

        return $this->customer->sendResponse(
            "All customers",
            $customers,
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = $this->customer->create($request->validated());

        return $this->customer->sendResponse(
            "Customer account created successfully",
            $customer,
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = $this
            ->customer
            ->select(['name', 'email', 'spent', 'phone'])
            ->withCount('orders')
            ->find($id);

        $this->customer->isFound($customer);

        return $this->customer->sendResponse(
            "$customer->name Info",
            $customer
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        $customer = $this->customer->find($id);

        $this->customer->isFound($customer);

        $customer->update($request->validated());

        return $this->customer->sendResponse(
            "Info updated successfully",
            $customer
        );
    }

    public function showNote(string $id)
    {
        $note = $this
            ->customer
            ->select(['note'])
            ->find($id);

        $this->customer->isFound($note);

        return $this->customer->sendResponse(
            "Customer note",
            $note
        );
    }

    public function updateNote(UpdateCustomerNoteRequest $request, string $id)
    {
        $note = $this->customer->find($id);

        $this->customer->isFound($note);

        $note->update($request->validated());

        return $this->customer->sendResponse(
            "Note updated successfully",
            $note
        );
    }

    public function showLastOrder(string $id)
    {
        $customer = $this->customer->find($id);

        $this->customer->isFound($customer);

        $order = $customer->orders()->latest()->limit(1)->get();

        return $this->customer->sendResponse(
            "$customer->name last order details",
            $order
        );
    }

    public function storeAddress(StoreCustomerAddressRequest $request, string $id)
    {
        $customer = $this->customer->find($id);

        $this->customer->isFound($customer);

        $address = $customer
            ->customerAddresses()
            ->create($request->validated());

        return $this->customer->sendResponse(
            "$customer->name addresses",
            $address,
            Response::HTTP_CREATED
        );
    }

    public function showAddress(string $id)
    {
        $customer = $this->customer->find($id);

        $this->customer->isFound($customer);

        $address = $customer->customerAddresses;

        return $this->customer->sendResponse(
            "$customer->name addresses",
            $address
        );
    }

    public function updateAddress(UpdateCustomerAddressRequest $request, string $id)
    {
        $customer = $this->customer->find($id);

        $this->customer->isFound($customer);

        $address = $customer
            ->customerAddresses()
            ->update($request->validated());

        return $this->customer->sendResponse(
            "$customer->name addresses",
            $address
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = $this->customer->find($id);

        $this->customer->isFound($customer);

        $customer->delete();

        return $this->customer->sendResponse(
            "Customer Deleted",
            $customer
        );
    }
}
