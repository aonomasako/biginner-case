<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Work;

class WorkController extends Controller
{
    public function workstart()
    {   
        $current_time = Carbon::now()->toTimeString();
        DB::table('works')->insert([
            'user_id' => Auth::id(),
            'date' => Carbon::now()->toDateString(),
            'work_start_time' => $current_time,
            'work_end_time' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return view('index');
    }
    public function index()
    {
        DB::table('works')
        ->where('user_id', Auth::id())
        ->whereDate('date', Carbon::now()->toDateString())
        ->whereNull('work_end_time')
        ->update([
            'work_end_time' => Carbon::now()->toTimeString(),
            'updated_at' => now()
        ]);
        return view('index');
    }
}   
