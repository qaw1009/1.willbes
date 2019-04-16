@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
        <span class="depth"><span class="depth-Arrow">></span><strong>{{ rawurldecode($arr_input['subject_name']) }}</strong></span>
        <span class="depth"><span class="depth-Arrow">></span><strong>{{ $data['ProfNickName'] }} 교수님</strong></span>
    </div>
    <!-- left nav -->
    <div class="Lnb NG">
        <h2>교수진 소개</h2>
        @include('willbes.pc.site.professor.lnb_menu_partial')
    </div>
    <div class="Content p_re ml20">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>
        <!-- willbes-Prof-Profile -->
        <div class="willbes-Prof-Profile p_re mb40 NG tx-black">
            <div class="ProfImg p_re">
                <img src="{{ $data['ProfReferData']['prof_detail_img'] or '' }}" alt="{{ $data['ProfNickName'] }}">
            </div>
            <div class="prof-profile p_re">
                <div class="Name"><span class="Sbj tx-blue">{{ rawurldecode($arr_input['subject_name']) }}</span><strong>{{ $data['ProfNickName'] }}</strong><span class="NGR">교수님</span></div>
                <ul class="prof-brief-btn">
                    <li>
                        <a href="#none" onclick="openWin('LayerProfile'); openWin('Profile');">
                            <div class="NGR">프로필</div>
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="{{ empty($data['ProfReferData']['sample_url1']) === false ? 'fnPlayerProf(\'' . $prof_idx . '\', \'S1\');' : 'alert(\'등록된 맛보기 동영상이 없습니다.\');' }}">
                            <div class="NGR">맛보기</div>
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="openWin('LayerCurriculum'); openWin('Curriculum');">
                            <div class="NGR">커리큘럼</div>
                        </a>
                    </li>
                </ul>
                <div class="Obj NGR">
                    {!! $data['ProfSlogan'] !!}
                </div>

                <ul class="prof-banner01">
                    <li>
                        @if(isset($data['ProfReferData']['yt_url']) === true && empty($data['ProfReferData']['yt_url']) === false)
                            <iframe src="{{ $data['ProfReferData']['yt_url'] }}" frameborder="0" allowfullscreen=""></iframe>
                        @endif
                    </li>
                    @if(isset($data['ProfBnrData']['01']) === true && empty($data['ProfBnrData']['01']) === false)
                        <li class="bSlider">
                            <div class="slider">
                                @foreach($data['ProfBnrData']['01'] as $bnr_num => $bnr_row)
                                    <div><a href="{{ empty($bnr_row['LinkUrl']) === false ? $bnr_row['LinkUrl'] : '#none' }}" target="_{{ $bnr_row['LinkType'] }}"><img src="{{ $bnr_row['BnrImgPath'] . $bnr_row['BnrImgName'] }}" alt=""></a></div>
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li class=""></li>
                    @endif
                </ul>

                <div class="sliderBest cSliderH">
                    <div class="best-tit">이 시기 BEST 강좌</div>
                    <div class="sliderControlsHover">
                        @foreach($best_product as $idx => $row)
                            <div class="lec-profile p_re">
                                <div class="w-tit">
                                    <a href="{{ $__cfg['IsPassSite'] === false ? front_url('/lecture/show/cate/' . $def_cate_code . '/pattern/only/prod-code/' . $row['ProdCode']) : front_url('/offLecture/index#' . $row['ProdCode']) }}">{{ $row['ProdName'] }}</a>
                                    @if(($__cfg['IsPassSite'] === false && $row['wLectureProgressCcd'] == '105001') || ($__cfg['IsPassSite'] === true && $row['AcceptStatusCcd'] == '675002'))
                                        <img src="{{ img_url('prof/icon_ing.gif') }}">
                                    @endif
                                </div>
                                <dl class="w-info">
                                    @if($__cfg['IsPassSite'] === false)
                                        <dt><span class="tx-blue">{{ $row['StudyPeriod'] }}</span>일</dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt><span class="tx-blue">{{ $row['wUnitLectureCnt'] }}강@if(empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span></dt>
                                    @else
                                        <dt><span class="tx-blue">{{ date('m/d', strtotime($row['StudyStartDate'])) }} ~ {{ date('m/d', strtotime($row['StudyEndDate'])) }}</span></dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt><span class="tx-blue">{{ $row['Amount'] }}</span>회차</dt>
                                    @endif
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>@if(empty($row['ProdPriceData']) === false)<span class="tx-blue">{{ number_format($row['ProdPriceData'][0]['RealSalePrice'], 0) }}</span>원@endif</dt>
                                    <dt class="w-notice p_re">
                                        @if(empty($row['LectureSampleData']) === false)
                                            <ul class="w-sp">
                                                <li><a href="#none" onclick="openWin('best_lec_sample_{{ $row['ProdCode'] }}'); return false;">맛보기</a></li>
                                            </ul>
                                            <div id="best_lec_sample_{{ $row['ProdCode'] }}" class="viewBox" style="top: 0; left: 63px;">
                                                <a class="closeBtn" href="#none" onclick="closeWin('best_lec_sample_{{ $row['ProdCode'] }}')"><img src="{{ img_url('cart/close.png') }}"></a>
                                                @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                    <dl class="NGR">
                                                        <dt class="Tit NG">맛보기{{ $sample_idx + 1 }}</dt>
                                                        @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                                        @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                                    </dl>
                                                @endforeach
                                            </div>
                                        @endif
                                    </dt>
                                </dl>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- willbes-Layer-ProfileBox -->
            <div id="Profile" class="willbes-Layer-ProfileBox">
                <a class="closeBtn" href="#none" onclick="closeWin('LayerProfile'); closeWin('Profile')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">{{ $data['ProfNickName'] }}</span> 교수님 프로필</div>
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
                <a class="closeBtn" href="#none" onclick="closeWin('LayerCurriculum'); closeWin('Curriculum')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">{{ $data['ProfNickName'] }}</span> 교수님 커리큘럼</div>
                <div class="Layer-Cont">
                    {!! $data['ProfCurriculum'] !!}
                </div>
            </div>
            <div id="LayerCurriculum" class="willbes-Layer-Black"></div>
            <!-- // willbes-Layer-CurriBox -->
        </div>
        <!-- // willbes-Prof-Profile -->

        <!-- willbes-Prof-Tabs -->
        <div class="willbes-Prof-Tabs">
            <div class="ProfDetailWrap">
                <a name="tabLink"></a>
                <ul class="tabWrap tabDepthProf tabDepthProf_{{$data['tabUseCount']}}">
                    <li><a href="#none" id="hover_home" onclick="goUrl('tab', 'home');">교수님 홈</a></li>
                    <li><a href="#none" id="hover_open_lecture" onclick="goUrl('tab', 'open_lecture');">개설강좌</a></li>
                    <li><a href="#none" id="hover_free_lecture" onclick="goUrl('tab', 'free_lecture');">무료강좌</a></li>
                    @if($data['IsNoticeBoard'] == 'Y')<li><a href="#none" id="hover_notice" onclick="goUrl('tab', 'notice');">공지사항</a></li>@endif
                    @if($data['IsQnaBoard'] == 'Y')<li><a href="#none" id="hover_qna" onclick="goUrl('tab', 'qna');">학습Q&A</a></li>@endif
                    @if($data['IsDataBoard'] == 'Y')<li><a href="#none" id="hover_material" onclick="goUrl('tab', 'material');">학습자료실</a></li>@endif
                    @if($data['IsTpassBoard'] == 'Y')<li><a href="#none" id="hover_tpass" onclick="goUrl('tab', 'tpass');">T-pass 자료실</a></li>@endif
                    @if($data['IsTccBoard'] == 'Y')<li><a href="#none" id="hover_tcc" onclick="goUrl('tab', 'tcc');">교수님 TCC</a></li>@endif
                </ul>
                <div class="tabBox">
                    <div id="{{ $arr_input['tab'] }}" class="tabLink">
                        {{-- 개설강좌 탭 --}}
                        @include('willbes.pc.site.professor.tab_' . $arr_input['tab'] . '_partial')
                    </div>
                </div>
            </div>
        </div>
        <!-- // willbes-Prof-Tabs -->
    </div>
</div>
<!-- End Container -->
<script type="text/javascript">
    $(document).ready(function() {
        @if($is_tab_select === true)
            // 선택된 탭이 있을 경우 자동 스크롤
            $("html, body").animate({ scrollTop: $('a[name="tabLink"]').offset().top }, 0);
        @endif

        $(function() {
            $('.willbes-Prof-Tabs .tabWrap li a').removeClass('on');
            $('.willbes-Prof-Tabs .tabWrap #hover_{{ $arr_input['tab'] }}').addClass('on');
            $('.willbes-Prof-Tabs .tabBox .tabLink').css('display', 'block');

            // 개설강좌 첫번째 탭 active 처리
            @if($arr_input['tab'] == 'open_lecture')
                $('.acadBoxWrap .tabWrap.tabDepthAcad li:eq(0) a').addClass('on');
                $('.acadBoxWrap #acad1 .tabWrap.acadline li:eq(0) a').addClass('on');
                $('.acadBoxWrap #acad2 .tabWrap.acadline li:eq(0) a').addClass('on');

                @if($__cfg['IsPassSite'] === true)
                    {{-- 학원사이트일 경우 학원강좌 탭 디폴트 --}}
                    $('.acadBoxWrap .tabWrap.tabDepthAcad li:eq(1) a').trigger('click');
                @endif
            @endif
        });

        //수강후기 레이어팝업
        $('.btn-study').click(function () {
            var ele_id = 'WrapReply';
            var data = {
                'ele_id' : ele_id,
                'show_onoff' : 'off',
                'cate_code' : '{{$def_cate_code}}',
                'prof_idx' : '{{$prof_idx}}',
                'board_idx' : $(this).data('board-idx'),
                'subject_idx' : '{{$arr_input['subject_idx']}}'
            };
            sendAjax('{{ front_url('/support/studyComment/') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        });
    });
</script>
@stop
