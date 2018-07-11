@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
        <span class="depth"><span class="depth-Arrow">></span><strong>{{ rawurldecode($arr_input['subject_name']) }}</strong></span>
        <span class="depth"><span class="depth-Arrow">></span><strong>{{ $data['wProfName'] }} 교수님</strong></span>
    </div>
    <!-- left nav -->
    <div class="Lnb NG">
        <h2>교수진 소개</h2>
        @include('willbes.pc.layouts.partial.site_professor_lnb_menu')
    </div>
    <div class="Content p_re ml20">
        <!-- willbes-Layer-ProfileBox -->
        <div class="willbes-Prof-Profile p_re mb40 NG tx-black">
            <div class="ProfImg p_re">
                <img src="{{ $data['ProfReferData']['prof_detail_img'] or '' }}">
            </div>
            <div class="prof-profile p_re">
                <ul class="prof-brief-btn">
                    <li>
                        <a href="#none" onclick="openWin('LayerProfile'); openWin('Profile');">
                            <img src="{{ img_url('prof/icon_profile.png') }}">
                            <div class="NSK">프로필</div>
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <img src="{{ img_url('prof/icon_sample.png') }}">
                            <div class="NSK"><a href="{{ $data['ProfReferData']['sample_url1'] or '' }}">맛보기</a></div>
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="openWin('LayerCurriculum'); openWin('Curriculum');">
                            <img src="{{ img_url('prof/icon_curri.png') }}">
                            <div class="NSK">커리큘럼</div>
                        </a>
                    </li>
                </ul>
                <div class="Obj NGR">
                    {!! $data['ProfSlogan'] !!}
                </div>
                <div class="Name"><span class="Sbj tx-blue">{{ rawurldecode($arr_input['subject_name']) }}</span><strong>{{ $data['wProfName'] }}</strong><span class="NGR">교수님</span></div>
                <div class="sliderBest">
                    <div class="best-tit">이 시기 BEST 강좌</div>
                    <div class="sliderControls">
                        @foreach($products['best'] as $idx => $row)
                            <div class="lec-profile p_re">
                                <div class="w-tit">
                                    <a href="{{ site_url('/lecture/show/cate/' . $__cfg['CateCode'] . '/prod-code/' . $row['ProdCode']) }}">{{ $row['ProdName'] }}</a>
                                    @if($row['wLectureProgressCcd'] == '105001')
                                        <img src="{{ img_url('prof/icon_ing.gif') }}">
                                    @endif
                                </div>
                                <dl class="w-info">
                                    <dt><span class="tx-blue">{{ $row['StudyPeriod'] }}</span>일</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt><span class="tx-blue">{{ $row['wUnitLectureCnt'] }}</span>강</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt><span class="tx-blue">{{ number_format($row['ProdPriceData'][0]['RealSalePrice'], 0) }}</span>원</dt>
                                    <dt class="w-notice p_re">
                                        <div class="w-sp one">
                                            <a href="{{ $row['LectureSampleData'][0]['wWD'] or $row['LectureSampleData'][0]['wHD'] or $row['LectureSampleData'][0]['wSD'] }}">맛보기</a>
                                        </div>
                                    </dt>
                                </dl>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- // willbes-Layer-ProfileBox -->
            <div id="Profile" class="willbes-Layer-ProfileBox">
                <a class="closeBtn" href="#none" onclick="closeWin('LayerProfile'),closeWin('Profile')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">{{ $data['wProfName'] }}</span> 교수님 프로필</div>
                <div class="Layer-Cont">
                    <div class="Layer-SubTit NG">· 약력</div>
                    <div class="Layer-Txt tx-gray">
                        {!! $data['wProfProfile'] !!}
                    </div>
                    <div class="Layer-SubTit NG">· 저서</div>
                    <div class="Layer-Txt tx-gray">
                        {!! $data['wBookContent'] !!}
                    </div>
                </div>
            </div>
            <div id="LayerProfile" class="willbes-Layer-Black"></div>
            <!-- // willbes-Layer-ProfileBox -->
            <!-- willbes-Layer-CurriBox -->
            <div id="Curriculum" class="willbes-Layer-CurriBox">
                <a class="closeBtn" href="#none" onclick="closeWin('LayerCurriculum'),closeWin('Curriculum')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">{{ $data['wProfName'] }}</span> 교수님 커리큘럼</div>
                <div class="Layer-Txt tx-gray">
                    {!! $data['ProfCurriculum'] !!}
                </div>
            </div>
            <div id="LayerCurriculum" class="willbes-Layer-Black"></div>
            <!-- // willbes-Layer-CurriBox -->
        </div>
        <!-- willbes-Prof-Profile -->
        <!-- willbes-NoticeWrap -->
        <div class="willbes-NoticeWrap p_re mb15 c_both">
            <div class="willbes-listTable willbes-newLec widthAuto460 mr20">
                <div class="will-Tit NG">신규강좌 <img style="vertical-align: top;" src="{{ img_url('prof/icon_new.gif') }}"></div>
                <ul class="List-Table GM tx-gray">
                    @foreach($products['new'] as $idx => $row)
                        <li><a href="{{ site_url('/lecture/show/cate/' . $__cfg['CateCode'] . '/prod-code/' . $row['ProdCode']) }}">{{ $row['ProdName'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="willbes-listTable willbes-reply widthAuto460">
                <div class="will-Tit NG">수강후기 <a class="f_right" href="#none" onclick="openWin('LayerReply'),openWin('Reply')"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                <ul class="List-Table GM tx-gray">
                    <li><img src="{{ img_url('sub/star4.gif') }}"><a href="#none">설명도 잘 해주시고 좋은 강의에요</a></li>
                    <li><img src="{{ img_url('sub/star5.gif') }}"><a href="#none">짱 좋아요!</a></li>
                </ul>
            </div>
            <!-- willbes-Layer-ReplyBox -->
            <!-- // willbes-Layer-ReplyBox -->
        </div>
        <!-- // willbes-NoticeWrap -->
        <!-- willbes-Bnr -->
        <div class="willbes-Bnr mb15">
            <img src="{{ img_url('sample/bnr5.jpg') }}">
        </div>
        <!-- // willbes-Bnr -->
        <!-- willbes-Prof-Tabs -->
        <!-- // willbes-Prof-Tabs -->
    </div>
</div>
<!-- End Container -->
@stop
