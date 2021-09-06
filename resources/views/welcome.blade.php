@extends('public')
@section('content')
<div class="shadow p-3 my-5 bg-body rounded">
    <div class="mt-8 text-2xl">
        ● 當天日期<br>
        ● 星座名稱<br>
        ● 整體運勢的評分及說明<br>
        ● 愛情運勢的評分及說明<br>
        ● 事業運勢的評分及說明<br>
        ● 財運運勢的評分及說明<br>
        <a class="nav-link active" aria-current="page" href="{{ url('/daily') }}">查看當日星座</a>
    </div>
</div>
@endsection
