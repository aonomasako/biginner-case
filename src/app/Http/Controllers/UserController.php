<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function showAttendance()
    {
        $usersWorksRests =
            DB::table('works')
            ->join('users', 'works.user_id', '=', 'users.id')
            ->leftjoin('rests', 'rests.work_id', '=', 'works.id')
            ->where('date', Carbon::now()->toDateString())
            ->get();

        $date = Carbon::now()->toDateString();

        return view('attendance', compact('usersWorksRests', 'date'));
    }

    public function yesterday(Request $request)
    {   
        
         $usersWorksRests =
            DB::table('works')
            ->join('users', 'works.user_id', '=', 'users.id')
            ->leftjoin('rests', 'rests.work_id', '=', 'works.id')
            ->where('date', $request->date)
            ->get();
        
        $date = $request->date;

        return view('attendance', compact('usersWorksRests','date'));
    }
}
