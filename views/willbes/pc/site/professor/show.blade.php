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
                <div class="sliderBest cSlider">
                    <div class="best-tit">이 시기 BEST 강좌</div>
                    <div class="sliderControls">
                        @foreach($products['best'] as $idx => $row)
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
                                        <dt><span class="tx-blue">{{ $row['wUnitLectureCnt'] }}</span>강</dt>
                                    @else
                                        <dt><span class="tx-blue">{{ date('m/d', strtotime($row['StudyStartDate'])) }} ~ {{ date('m/d', strtotime($row['StudyEndDate'])) }}</dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt><span class="tx-blue">{{ $row['Amount'] }}</span>회차</dt>
                                    @endif
                                    <dt><span class="row-line">|</span></dt>
                                    <dt><span class="tx-blue">{{ number_format($row['ProdPriceData'][0]['RealSalePrice'], 0) }}</span>원</dt>
                                    <dt class="w-notice p_re">
                                        <div class="w-sp one">
                                            @if(empty($row['LectureSampleData']) === false)
                                                <a href="{{ $row['LectureSampleData'][0]['wWD'] or $row['LectureSampleData'][0]['wHD'] or $row['LectureSampleData'][0]['wSD'] }}">맛보기</a>
                                            @endif
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
                <a class="closeBtn" href="#none" onclick="closeWin('LayerProfile'); closeWin('Profile')">
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
                <a class="closeBtn" href="#none" onclick="closeWin('LayerCurriculum'); closeWin('Curriculum')">
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
        <!-- // willbes-Prof-Profile -->
        <!-- willbes-NoticeWrap -->
        <div class="willbes-NoticeWrap p_re mb15 c_both">
            <div class="willbes-listTable willbes-newLec widthAuto460 mr20">
                <div class="will-Tit NG">신규강좌 <img style="vertical-align: top;" src="{{ img_url('prof/icon_new.gif') }}"></div>
                <ul class="List-Table GM tx-gray">
                    @foreach($products['new'] as $idx => $row)
                        <li><a href="{{ $__cfg['IsPassSite'] === false ? front_url('/lecture/show/cate/' . $def_cate_code . '/pattern/only/prod-code/' . $row['ProdCode']) : front_url('/offLecture/index#' . $row['ProdCode']) }}">{{ $row['ProdName'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="willbes-listTable willbes-reply widthAuto460">
                {{--<div class="will-Tit NG">수강후기<a href="#none" class="f_right" onclick="openWin('WrapReply')"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>--}}
                <div class="will-Tit NG">수강후기<a href="#none" class="f_right btn-study" data-board-idx=""><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                <ul class="List-Table GM tx-gray">
                    @if($data['StudyCommentData'] != 'N')
                        @foreach(json_decode($data['StudyCommentData'], true) as $idx => $row)
                            <li><img src="{{ img_url('sub/star' . $row['LecScore']. '.gif') }}"><a href="#none" class="btn-study" data-board-idx="{{$row['BoardIdx']}}">{{ hpSubString($row['Title'],0,25,'...') }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div id="WrapReply"></div>
            <!-- willbes-Layer-ReplyBox -->
        </div>
        <!-- // willbes-NoticeWrap -->
        <!-- willbes-Bnr -->
        <div class="willbes-Bnr mb15">
            {!! banner('교수진소개_서브_중단', '', $__cfg['SiteCode'], '0') !!}
        </div>
        <!-- // willbes-Bnr -->
        <!-- willbes-Prof-Tabs -->
        <div class="willbes-Prof-Tabs">
            <div class="ProfDetailWrap">
                <a name="tabLink"></a>
                <ul class="tabWrap tabDepthProf tabDepthProf_{{$data['tabUseCount']}}">
                    <li><a href="#none" id="hover_open_lecture" onclick="goUrl('tab', 'open_lecture');">개설강좌</a></li>
                    @if($data['IsNoticeBoard'] == 'Y')<li><a href="#none" id="hover_notice" onclick="goUrl('tab', 'notice');">공지사항</a></li>@endif
                    @if($data['IsQnaBoard'] == 'Y')<li><a href="#none" id="hover_qna" onclick="goUrl('tab', 'qna');">학습Q&A</a></li>@endif
                    @if($data['IsDataBoard'] == 'Y')<li><a href="#none" id="hover_material" onclick="goUrl('tab', 'material');">학습자료실</a></li>@endif
                    @if($data['IsTpassBoard'] == 'Y')<li><a href="#none" id="hover_tpass" onclick="goUrl('tab', 'tpass');">T-pass 자료실</a></li>@endif
                    <li><a href="#none" id="hover_free_lecture" onclick="goUrl('tab', 'free_lecture');">무료강좌</a></li>
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
            @endif
        });

        //수강후기 레이어팝업
        $('.btn-study').click(function () {
            var ele_id = 'WrapReply';
            var data = {
                'ele_id' : ele_id,
                'show_onoff' : 'off',
                'cate_code' : '{{$def_cate_code}}',
                'board_idx' : $(this).data('board-idx')
            };
            sendAjax('{{ site_url('/support/studyComment/') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        });
    });
</script>
@stop
