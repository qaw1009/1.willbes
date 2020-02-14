@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NGR c_both">
        <div class="Tit">내 인생의 모든 시험, 윌비스로 합격하다!</div>
        <div class="introBox2">
            <ul>
                <li>
                    <div>
                        <a href="{{ front_app_url('/home/index', 'police') }}">
                            <p class="subTit">일반경찰/경행/승진/해경</p>
                            <p class="siteTit">
                            <img src="{{ img_url('m/intro/icon_cop.png') }}" alt="신광은경찰">
                             신광은 경찰
                            </p>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="{{ front_app_url('/home/index', 'pass') }}">
                            <p class="subTit">9급/7급PSAT/7급/법원/소방/기술직/군무원</p>
                            <p class="siteTit">
                            <img src="{{ img_url('m/intro/icon_gosi.png') }}" alt="공무원">
                             공무원
                            </p>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="{{ front_app_url('/home/index', 'gosi') }}">
                            <p class="subTit">5급행정/외교원/PSAT/법행/변호사</p>
                            <p class="siteTit">
                                <img src="{{ img_url('m/intro/icon_gosi.png') }}" alt="고등고시">
                                 고등고시
                            </p>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="{{ front_app_url('/home/index', 'job') }}">
                            <p class="subTit">노무/감평/변리/세무/관세/스포츠</p>
                            <p class="siteTit">
                                <img src="{{ img_url('m/intro/icon_job.png') }}" alt="자격증">
                                 자격증
                            </p>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="{{ front_app_url('/home/index', 'spo') }}">
                            <p class="subTit">간보후보생</p>
                            <p class="siteTit">
                                <img src="{{ img_url('m/intro/icon_spo.png') }}" alt="경찰간부">
                                 경찰간부
                            </p>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="{{ front_app_url('/home/index', 'work') }}">
                            <p class="subTit">공기업</p>
                            <p class="siteTit">
                                <img src="{{ img_url('m/intro/icon_willpass.png') }}" alt="취업">
                                 취업
                            </p>
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <a href="{{ front_app_url('/home/index', 'lang') }}">
                            <p class="subTit">G-TELP</p>
                            <p class="siteTit">
                                <img src="{{ img_url('m/intro/icon_lang.png') }}" alt="어학">
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