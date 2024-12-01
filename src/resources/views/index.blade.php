@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection


<body>
    @section('content')
    <main>
        @if (Auth::check())
        <h2 class="title">{{ Auth::user()->name }}さんお疲れ様です！</h2>
        @endif
        
        <form action="/work_start" method="get">
            @csrf
            <div class="flex">
                <input type="submit" class="work" id="3" checked><label for="3">勤務開始</label>
        </form>
        
        <form action="/work_end" method="get">
            @csrf
            <input type="submit"
                class="work" id="4"><label for="4">勤務終了</label>
            </div>
        </form>
        
        <form action="/rest_start" method="get">
            @csrf
            <div class="flex">
                <input type="submit"
                    class="break" id="5" disabled><label for="5">休憩開始</label>
        </form>
        <form action="/rest_end" method="get">
            @csrf
            <input type="submit" class="break" id="6" disabled><label for="6">休憩終了</label>
        </form>
        </div>
    </main>
    @endsection
</body>

</html>