<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        $url = url("/customer");
        $data = compact('url');
        return view('customer')->with($data);
    }

    public function store(Request $request){
        $request->validate(
            [
                'cname' => 'required',
                'email' => 'required | email',
                'password' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'dob' => 'required',
            ]
        );

        $customer = new Customer;

        $customer->name = $request['cname'];
        $customer->email = $request['email'];
        $customer->password = md5($request['password']);
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->city = $request['city'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->status = 1;

        $customer->save();

        return redirect('/customer/view');
    }

    public function view(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $customers = Customer::where('name', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->get();
        }
        else{
            // $customers = Customer::all();
            // $customers = Customer::paginate(20);
            $customers = Customer::simplePaginate(20); // Only prev and next buttons
        }
        $data = compact('customers', 'search');
        return view('customer-view')->with($data);
    }

    public function delete($id){
        // $customer = Customer::find($id)->delete();
        // return redirect()->back();
        $customer = Customer::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }
        return redirect('/customer/view');
    }

    public function edit($id){
        $customer = Customer::find($id);
        if(!is_null($customer)){
            $url = url("/customer/update/".$id);
            $data = compact('customer', 'url');
            return view('customer-update')->with($data);
        }
        else{
            return redirect('/customer/view');
        }
    }

    public function update($id, Request $request){
        $customer = Customer::find($id);

        $customer->name = $request['cname'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->city = $request['city'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->status = 1;

        $customer->save();
        return redirect('/customer/view');
    }

    public function trash(){
        $customers = Customer::onlyTrashed()->get();
        $data = compact('customers');
        return view('customer-trash')->with($data);
    }

    public function restore($id){
        $customer = Customer::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->restore();
        }
        return redirect('/customer/view');
    }

    public function forceDelete($id){
        $customer = Customer::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->forceDelete();
        }
        return redirect('/customer/trash');
    }
}
