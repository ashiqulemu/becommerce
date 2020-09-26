<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Customer;
use App\Sales;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = User::whereRole('user')->get();
        return view('admin.pages.customer.manage',['customers'=>$customers]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    public function showCustomer(Request $request, $id) {
        $customer = User::find($id);
        $sales = Sales::whereUserId($id)->get();
        return view('admin.pages.customer.show',[
            'customer'  => $customer,
            'sales'     => $sales
        ]);
    }

    public function show(Request $request, $id)
    {

    }


    public function edit(Customer $customer)
    {
        //
    }


    public function update(Request $request, Customer $customer)
    {
        //
    }


    public function destroy(Customer $customer)
    {
        //
    }
    public function updateCustomerStatus(Request $request, $userId, $status) {

        $user = User::whereId($userId)->first();
        if( $user->is_active != $status) {
            $user->update(['is_active' => $status]);
        }
        return back()->with([
            'type'     => 'success',
            'message' => 'User status updated successfully'
        ]);
    }

    public function adjustCredit(Request $request) {
        $users = User::all();
        return view('admin.pages.customer.credit',[
            'users'  => $users,
            'selected_user' => $request->input('user')
        ]);
    }
    public function updateCredit(Request $request) {
        $user = User::find($request->input('user_id'));
        $newBalance = $user->credit_balance;
        $adminProvideBl = $user->admin_provided_credit;
        if($request->input('sign') == 'add') {
            $newBalance = $newBalance + $request->input('credit');
            $adminProvideBl =$adminProvideBl + $request->input('credit');
        }else if ($request->input('sign') == 'subtract'){
            $newBalance = $newBalance - $request->input('credit');
            $adminProvideBl = $adminProvideBl- $request->input('credit');
        }
        $user->update([
            'credit_balance' => $newBalance,
            'admin_provided_credit' => $adminProvideBl
        ]);
        return redirect('/admin/customer')
            ->with(['type'=>'success','message'=>'Customer credit add Successfully']);

    }
}
