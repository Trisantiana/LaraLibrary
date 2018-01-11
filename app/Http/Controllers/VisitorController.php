<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRole;
use DB;
use Illuminate\Http\Request;
use Charts;

class VisitorController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')
        //             ->join('role_user', 'users.id' , '=', 'role_user.user_id not like A%')
        //             //->where('role_user', 'role_user.role_id > 2')
        //             ->select('users.name', 'users.email', 'users.created_at')
        //             ->get();

        $users = User::latest()->paginate(10);
        $data['users'] = \App\User::whereDoesntHave('roles')->get();
        return view('visitor/index', $data);
    }

    public function chart()
    {
        $data['users'] = \App\User::whereDoesntHave('roles')->get();
        $chart = Charts::database(User::all(), 'bar', 'highcharts')

        ->elementLabel("Pengunjung")
        ->dimensions(1000, 500)
        ->responsive(true)
        ->values($data)
        ->groupByMonth();

        return view('visitor.chart', compact('chart'));
    }
}
