@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center cscenter">
                <li>
                    <a href="{{ site_url('/home/html/cscenter_index') }}">고객센터 HOME</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter1') }}">자주하는 질문</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter2') }}">공지사항</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter3') }}">1:1 상담</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter4') }}">사이트 이용가이드</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter5') }}">모바일 이용가이드</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/cscenter6_1') }}">수강지원</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수강지원</li>
                            <li><a href="{{ site_url('/home/html/cscenter6_1') }}">PC 원격지원</a></li>
                            <li><a href="{{ site_url('/home/html/cscenter6_2') }}">학습 프로그램 설치</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter7') }}">부정사용자 규제</a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>고객센터</strong>
            <span class="depth-Arrow">></span><strong>모바일 서비스안내</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-CScenter c_both">
            <div class="Act5">
                <img src="{{ img_url('cs/willbes_m_guide.jpg') }}"> 
                <div class="w-Guide mt40">
                    <div class="willbes-m-guide NGEB">
                        <ul class="tabWrap tabcsDepth2 tab_m_Guide p_re NG">
                            <li class="w-m-guide1"><a class="qBox on" href="#m_guide1"><span>모바일 웹</span></a></li>
                            <li class="w-m-guide2"><a class="qBox" href="#m_guide2"><span>모바일 수강전용 앱</span></a></li>
                        </ul>
                        <div class="tabBox">
                            <div id="m_guide1" class="tabContent"><img src="{{ img_url('cs/willbes_m_guide01.jpg') }}" alt="모바일 웹"></div>
                            <div id="m_guide2" class="tabContent"><img src="{{ img_url('cs/willbes_m_guide02.jpg') }}" alt="모바일 수강전용 앱"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-CScenter -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop