@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">
        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">내강의실 인덱스</span>
        </div>

        <script src="/public/js/willbes/player.js"></script>
        <a href="#none" onclick='fnPlayerProf("50004");'> 눌러보자</a>

        <br/><br/><br/><br/><br/><br/>
    </div>
    <!-- End Container -->
@stop