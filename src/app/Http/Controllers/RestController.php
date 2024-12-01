<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RestController extends Controller
{
    public function reststart()
    {
        $current_time = Carbon::now()->toTimeString();
        DB::table('rests')->insert([
            'work_id' => Auth::id(),
            'rest_start_time' => $current_time,
            'rest_end_time' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]); 

        return view('index');
    }

    public function workstart(){
    DB::table('rests')
        ->where('work_id', Auth::id())
        ->whereNull('rest_end_time')
        ->update([
            'rest_end_time' => Carbon::now()->toTimeString(),
            'updated_at' => now()
        ]);
        return view('index');
    }
}
