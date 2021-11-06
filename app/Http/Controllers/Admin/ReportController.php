<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function orderToday()
    {
        $today = date('d-m-y');
        $order = DB::table('orders')->where('status', 0)->where('date', $today)->get();
        return view('admin.report.today_order', compact('order'));
    }
    public function orderDeliveryToday()
    {
        $today = date('d-m-y');
        $order = DB::table('orders')->where('status', 3)->where('date', $today)->get();
        return view('admin.report.delivery_today', compact('order'));
    }

    public function orderThisMonth()
    {
        $month = date('F');
        $order = DB::table('orders')->where('status', 3)->where('month', $month)->get();
        return view('admin.report.this_month', compact('order'));
    }

    public function Search()
    {
        return view('admin.report.search');
    }

    public function SearchByYear(Request $request)
    {
        $year = $request->year;
        $total = DB::table('orders')->where('status', 3)->where('year', $year)->sum('total');
        $order = DB::table('orders')->where('status', 3)->where('year', $year)->get();
        return view('admin.report.search_year', compact('order', 'total'));
    }

    public function SearchByMonth(Request $request)
    {
        $month = $request->month;
        $total = DB::table('orders')->where('status', 3)->where('month', $month)->sum('total');
        $order = DB::table('orders')->where('status', 3)->where('month', $month)->get();
        return view('admin.report.search_by_month', compact('order', 'total'));
    }

    public function SearchByDate(Request $request)
    {
        $date = $request->date;
        // Convertir el String en formato fecha
        $newdate = date('d-m-y', strtotime($date));

        $total = DB::table('orders')->where('status', 3)->where('date', $newdate)->sum('total');
        $order = DB::table('orders')->where('status', 3)->where('date', $newdate)->get();

        return view('admin.report.search_by_date', compact('order', 'total'));
    }
}
