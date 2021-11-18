<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        //$orders = Order::orderBy('created_at','DESC')->get()->take(10);
        $orders = Order::orderBy('created_at','DESC')->paginate(7);
        $totalOrders = Order::count();
        $totalSales = Order::where('status','delivered')->count();
        $totalRevenue = Order::where('status','delivered')->sum('total');
        $totalSalesToday1 = Order::where('status','delivered')->whereDate('created_at', Carbon::today())->count();
        $totalSalesToday = round($totalSalesToday1,0);
        $todayRevenue1 = Order::where('status','delivered')->whereDate('created_at', Carbon::today())->sum('total');
        $todayRevenue = round($todayRevenue1,0);

        //Order::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get(['name','created_at']);

        return view('livewire.admin.admin-dashboard-component', 
        compact('orders',
                'totalOrders',
                'totalSalesToday',
                'totalRevenue',
                'totalSales',
                'todayRevenue'))->layout('layouts.adminbase');
    }
}
