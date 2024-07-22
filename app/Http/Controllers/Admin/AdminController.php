<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthAdminRequest;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Fetch and display orders
     */
     public function index(){

        $todaysOrders = Order::whereDay('created_at', Carbon::today())->get();
        $yesterdayOrders = Order::whereDay('created_at', Carbon::today())->get();
        $monthOrders = Order::whereMonth('created_at', Carbon::now()->month)->get();
        $yearOrders = Order::whereYear('created_at', Carbon::now()->year)->get();

        return view('admin.dashboard', [
            'todaysOrders' => $todaysOrders,
            'yesterdayOrders' => $yesterdayOrders,
            'monthOrders' => $monthOrders,
            'yearOrders' => $yearOrders
        ]);
     }

     public function login(){
        if(!Auth::guard('admin')->check()){
            return view('admin.login');
        }

        return redirect()->route('admin.dashboard');
     }

     public function authenticate(AuthAdminRequest $request){
        if($request->validated()){
            if(Auth::guard('admin')->attempt([
                'email' => $request->email, 'password' => $request->password
                
                ])){
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            }else{
                return redirect()->route('admin.login')->with('error', 'Invalid Credentials');
            }
        }
     }

     public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
     }

}
