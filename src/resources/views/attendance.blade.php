@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}" />
@endsection

@php
use Carbon\Carbon;
$yesterday=carbon::create($date)->subDay()->toDateString();
$tomorrow=carbon::create($date)->addDay()->toDateString();
@endphp

<body>
    @section('content')
    <div class="day">

        <a href="{{url('attendance/subday?date='.$yesterday )}}">&laquo;</a>
        {{ $date }}
        <a href="{{url('/attendance?date='.$tomorrow)}}">&raquo;</a>

    </div>

    <table border="1">
        <tr>
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
        </tr>
        @foreach($usersWorksRests as $usersWorksRest)
        <tr>
            <td>{{ $usersWorksRest->name}}</td>
            <td>{{$usersWorksRest->work_start_time}}</td>
            <td>{{$usersWorksRest->work_end_time}}</td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
    </table>

    <div class="pagination">
        <table class="pagination">

        </table>
    </div>


    @endsection

</body>