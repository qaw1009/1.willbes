@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    {{--
    <div id="Container" class="Container c_both mb20">
        <div class="introBox NSK">
            <div class="Tit">내 인생의 모든 시험, 윌비스로 합격하다!</div>
            <ul>
                <li>
                    <div>
                        <p class="subTit">일반/경행/승진/간부/해경</p>
                        <p class="siteTit"><span>신광은 경찰</span><br><span> 온라인</span></p>
                        <a href="{{ front_app_url('/home/index', 'police') }}" class="btnGo">바로가기</a>
                    </div>
                </li>
                <li>
                    <div>
                        <p class="subTit">9급/7급/법원/소방/기술/군무원</p>
                        <p class="siteTit"><span>공무원</span><br><span> 온라인</span></p>
                        <a href="{{ front_app_url('/home/index', 'pass') }}" class="btnGo">바로가기</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    --}}
    <div id="Container" class="Container NGR c_both">
        <div class="Tit">내 인생의 모든 시험, 윌비스로 합격하다!</div>
        <div class="introBox2">
            <ul>
                <li>
                    <div>
                        <a href="{{ front_app_url('/home/index', 'police') }}">
                            <p class="subTit">일반경찰/경행/승진/해경</p>
                            <p class="siteTit">
                                <img src="{{ img_url('m/intro/icon_cop.gif') }}" alt="신광은경찰">
                                신광은 경찰
                            </p>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="{{ front_app_url('/home/index', 'pass') }}">
                            <p class="subTit">9급/7급/법원/소방/기술직/군무원</p>
                            <p class="siteTit">
                                <img src="{{ img_url('m/intro/icon_gosi.gif') }}" alt="공무원">
                                공무원
                            </p>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="{{ front_app_url('/home/index', 'job') }}">
                            <p class="subTit">국가기술자격/국가전문자격</p>
                            <p class="siteTit">
                                <img src="{{ img_url('m/intro/icon_job.gif') }}" alt="자격증">
                                자격증
                            </p>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="{{ front_app_url('/home/index', 'lang') }}">
                            <p class="subTit">G-TELP</p>
                            <p class="siteTit">
                                <img src="{{ img_url('m/intro/icon_lang.gif') }}" alt="어학">
                                어학
                            </p>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- End Container -->
@stop