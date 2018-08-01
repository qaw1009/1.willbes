@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">
        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">내강의실 인덱스</span>
        </div>

        <script src="/public/js/willbes/player.js"></script>
        <a href="#none" onclick='fnPlayerProf("50004", "OT");'>OT</a><br>
        <a href="#none" onclick='fnPlayerProf("50004", "WS");'>샘플</a><br>
        <a href="#none" onclick='fnPlayerProf("50004", "S1");'>샘플1</a><br>
        <a href="#none" onclick='fnPlayerProf("50004", "S2");'>샘플2</a><br>
        <a href="#none" onclick='fnPlayerProf("50004", "S3");'>샘플3</a><br>
        <br>
        <a href="#none" onclick='fnPlayerSample("200006", "1111344", "SD");'>SD강의 샘플</a><br>
        <a href="#none" onclick='fnPlayerSample("200006", "1111344", "HD");'>HD강의 샘플</a><br>
        <a href="#none" onclick='fnPlayerSample("200006", "1111344", "WD");'>WD강의 샘플</a>




        <br/><br/><br/><br/><br/><br/>
    </div>
    <!-- End Container -->
@stop