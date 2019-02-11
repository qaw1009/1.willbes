@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container c_both mb20">    
    <div class="introBox">
        <div class="Tit NSK">내 인생의 모든 시험, 윌비스로 합격하다!</div>
        <a href="#none">
            <img src="{{ img_url('m/intro/m_main_hub01.gif') }}" alt="신광은경찰 온라인">
        </a>
    </div>
    <div class="introBox">
    <a href="#none">
            <img src="{{ img_url('m/intro/m_main_hub02.gif') }}" alt="공무원 온라인">
        </a>
    </div>
</div>
<!-- End Container -->
@stop