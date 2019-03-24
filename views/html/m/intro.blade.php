@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container c_both mb20"> 
    
    <div class="introBox NSK">
        <div class="Tit">내 인생의 모든 시험, 윌비스로 합격하다!</div>
        <ul>
            <li>
                <div>    
                    <p class="subTit">독보적 일반/경행/승진/간부/해경</p>
                    <p class="siteTit"><span>신광은 경찰</span><span> 온라인</span></p>
                    <a href="#none" class="btnGo">바로가기</a>
                </div>
            </li>
            <li>
                <div>    
                    <p class="subTit">9급/7급/법원/소방/기술/군무원</p>
                    <p class="siteTit"><span>공무원</span><span> 온라인</span></p>
                    <a href="#none" class="btnGo">바로가기</a>
                </div>
            </li>
        </ul>   
        {{--<a href="#none">
            <img src="{{ img_url('m/intro/m_main_hub01.gif') }}" alt="신광은경찰 온라인">
        </a>--}}
    </div>
    {{--
    <div class="introBox">
    <a href="#none">
            <img src="{{ img_url('m/intro/m_main_hub02.gif') }}" alt="공무원 온라인">
        </a>
    </div>
    --}}

</div>
<!-- End Container -->
@stop