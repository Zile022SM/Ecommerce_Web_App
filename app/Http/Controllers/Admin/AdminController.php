<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthAdminRequest;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Fetch and display orders
     */
     public function index(){

        $todaysOrders = Order::whereDay('created_at', Carbon::today())->get();
        $yesterdayOrders = Order::whereDay('created_at', Carbon::today())->get();
        $monthOrders = Order::whereMonth('created_at', Carbon::month())->get();
        $yearOrders = Order::whereYear('created_at', Carbon::year())->get();

        return view('admin.index', [
            'todaysOrders' => $todaysOrders,
            'yesterdayOrders' => $yesterdayOrders,
            'monthOrders' => $monthOrders,
            'yearOrders' => $yearOrders
        ]);
     }

     public function login(){
        if(!auth()->guard('admin')->check()){
            return view('admin.login');
        }

        return redirect('admin/dashboard');
     }

     public function auth(AuthAdminRequest $request){
        if($request->validated()){
            if(auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
                $request->session()->regenerate();
                return redirect('admin/dashboard');
            }else{
                return redirect()->route('admin.login')->with('error', 'Invalid Credentials');
            }
        }
     }

     public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
     }

}
