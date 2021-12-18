<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->customers = new Customer();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customers->getCustomers();
        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("customers/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        try{
            $validated = $request->validated();
            $request['languages'] = $this->customers->modifyLanguagesValue($request['languages']);
            $this->customers->postCreate($request->all());
            $message = "Success";
        }catch (\Exception $ex){
            $message = "Error";
        }

        return redirect()->route("customers")->with( ['message' => $message]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = $this->customers->getCustomer($id);
        return view("customers/edit",compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request)
    {
        try{
            $validated = $request->validated();
            $request['languages'] = $this->customers->modifyLanguagesValue($request['languages']);
            $this->customers->updateCustomerData($request->all());
            $message = "Success";
        }catch (\Exception $ex){
            $message = "Error";
        }

        return redirect()->route('customers')->with( ['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->customers->getCustomerDelete($id);
            $message = "Success";
        }catch (\Exception $ex){
            $message = "Error";
        }
        return redirect()->route("customers")->with( ['message' => $message]);
    }
}
