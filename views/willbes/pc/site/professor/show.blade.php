@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
        <span class="depth"><span class="depth-Arrow">></span><strong>{{ rawurldecode(element('subject_name', $arr_input, '')) }}</strong></span>
        <span class="depth"><span class="depth-Arrow">></span><strong>{{ $data['ProfNickName'] }} {{$data['AppellationCcdName']}}</strong></span>
    </div>
    <!-- left nav -->
    <div class="Lnb NG">
        @include('willbes.pc.site.professor.lnb_menu_partial')
    </div>
    <div class="Content p_re ml20 NG">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>
        <!-- willbes-Prof-Profile -->
        <div class="willbes-Prof-Profile p_re mb40 NG tx-black">
            @if(isset($data['ProfBnrData']['04']) === true && empty($data['ProfBnrData']['04']) === false)
                {{-- 교수영역 이벤트 배너2 --}}
                <div class="bSlider layerPopProf">
                    <div class="slider">
                        @foreach($data['ProfBnrData']['04'] as $bnr_num => $bnr_row)
                            @if($bnr_row['LinkType'] == 'script')
                                <div><a href="#none" onclick="{!! str_replace("\"", "'", $bnr_row['LinkUrl']) !!}"><img src="{{ $bnr_row['BnrImgPath'] . $bnr_row['BnrImgName'] }}" alt=""></a></div>
                            @else
                                <div><a href="{{ empty($bnr_row['LinkUrl']) === false ? $bnr_row['LinkUrl'] : '#none' }}" target="_{{ $bnr_row['LinkType'] }}"><img src="{{ $bnr_row['BnrImgPath'] . $bnr_row['BnrImgName'] }}" alt=""></a></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="ProfImg p_re">
                <img src="{{ $data['ProfReferData']['prof_detail_img'] or '' }}" alt="{{ $data['ProfNickName'] }}">
            </div>
            <div class="prof-profile p_re">
                <div class="Name"><span class="Sbj tx-blue">{{ rawurldecode(element('subject_name', $arr_input, '')) }}</span><strong>{{ $data['ProfNickName'] }}</strong><span class="NGR">{{$data['AppellationCcdName']}}</span></div>
                <ul class="prof-brief-btn">
                    <li>
                        <a href="#none" onclick="openWin('LayerProfile'); openWin('Profile');">
                            <div class="NGR">프로필</div>
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="{{ empty($data['ProfReferData']['sample_url']) === false ? 'fnPlayerProf(\'' . $prof_idx . '\', \'' . $data['ProfReferData']['sample_url_type'] . '\');' : 'alert(\'등록된 맛보기 동영상이 없습니다.\');' }}">
                            <div class="NGR">맛보기</div>
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="openWin('LayerCurriculum'); openWin('Curriculum');">
                            <div class="NGR">커리큘럼</div>
                        </a>
                    </li>
                    @if(empty($data['ProfReferData']['cafe_url']) === false)
                        {{-- 카페링크 있을 경우만 노출 --}}
                        <li class="cafe">
                            <a href="{{$data['ProfReferData']['cafe_url']}}" target="_blank">
                                <div>{{$data['AppellationCcdName']}}카페</div>
                            </a>
                        </li>
                    @endif
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
                        {{-- 교수영역 이벤트 배너 --}}
                        <li class="bSlider">
                            <div class="slider">
                                @foreach($data['ProfBnrData']['01'] as $bnr_num => $bnr_row)
                                    @if($bnr_row['LinkType'] == 'script')
                                        <div><a href="#none" onclick="{!! str_replace("\"", "'", $bnr_row['LinkUrl']) !!}"><img src="{{ $bnr_row['BnrImgPath'] . $bnr_row['BnrImgName'] }}" alt=""></a></div>
                                    @else
                                        <div><a href="{{ empty($bnr_row['LinkUrl']) === false ? $bnr_row['LinkUrl'] : '#none' }}" target="_{{ $bnr_row['LinkType'] }}"><img src="{{ $bnr_row['BnrImgPath'] . $bnr_row['BnrImgName'] }}" alt=""></a></div>
                                    @endif
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
                        @foreach(element('BestProduct', $data, []) as $idx => $row)
                            <div class="lec-profile p_re">
                                <div class="w-tit">
                                    {{-- 상품상세 링크 --}}
                                    @if($__cfg['IsPassSite'] === false)
                                        <a href="{{ front_url('/lecture/show/cate/' . $def_cate_code . '/pattern/only/prod-code/' . $row['ProdCode']) }}">{{ $row['ProdName'] }}</a>
                                    @else
                                        @if($row['LearnPattern'] == 'off_lecture')
                                            <a href="{{ front_url('/offLecture/index#' . $row['ProdCode']) }}">{{ $row['ProdName'] }}</a>
                                        @else
                                            <a href="{{ front_url('/offPackage/show/prod-code/' . $row['ProdCode']) }}">{{ $row['ProdName'] }}</a>
                                        @endif
                                    @endif

                                    {{-- 진행중 아이콘 --}}
                                    @if(($__cfg['IsPassSite'] === false && $row['wLectureProgressCcd'] == '105001') || ($__cfg['IsPassSite'] === true && $row['AcceptStatusCcd'] == '675002'))
                                        <img src="{{ img_url('prof/icon_ing.gif') }}">
                                    @endif
                                </div>
                                <dl class="w-info">
                                    @if($__cfg['IsPassSite'] === false)
                                        {{-- 단강좌 --}}
                                        <dt><span class="tx-blue">{{ $row['StudyPeriod'] }}</span>일</dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt><span class="tx-blue">{{ $row['wUnitLectureCnt'] }}강@if(empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span></dt>
                                    @else
                                        @if($row['LearnPattern'] == 'off_lecture')
                                            {{-- 단과반 --}}
                                            <dt><span class="tx-blue">{{ date('m/d', strtotime($row['StudyStartDate'])) }} ~ {{ date('m/d', strtotime($row['StudyEndDate'])) }}</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt><span class="tx-blue">{{ $row['Amount'] }}</span>회차</dt>
                                        @else
                                            {{-- 종합반 --}}
                                            <dt><span class="tx-blue">{{ $row['SchoolStartYear'] }}-{{ $row['SchoolStartMonth'] }}</span></dt>
                                            <dt><span class="row-line">|</span></dt>
                                            <dt><span class="tx-blue">{{ $row['StudyPatternCcdName'] }}</span></dt>
                                        @endif
                                    @endif
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>@if(empty($row['ProdPriceData']) === false)<span class="tx-blue">{{ number_format($row['ProdPriceData'][0]['RealSalePrice'], 0) }}</span>원@endif</dt>
                                    <dt class="w-notice p_re">
                                        @if(empty($row['LectureSampleData']) === false)
                                            {{-- 맛보기 창 생성 제거 : 하단 나열 방식으로 변경
                                            <ul class="w-sp">
                                                <li><a href="#none" onclick="openWin('best_lec_sample_{{ $row['ProdCode'] }}'); return false;">맛보기</a></li>
                                            </ul>
                                            <div id="best_lec_sample_{{ $row['ProdCode'] }}" class="viewBox" style="top: -25px; left: 128px;">
                                                <a class="closeBtn" href="#none" onclick="closeWin('best_lec_sample_{{ $row['ProdCode'] }}')"><img src="{{ img_url('cart/close.png') }}"></a>
                                                @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                    <dl class="NGR">
                                                        <dt class="Tit NG">맛보기{{ $sample_idx + 1 }}</dt>
                                                        @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                                        @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                                    </dl>
                                                @endforeach
                                            </div>
                                            --}}
                                            <dl class="NSK">
                                                @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                    @if($loop->index > 2) @break @endif
                                                        <dt class="Tit NG {{$loop->index > 1 ? 'ml10' : ''}} mr5">맛보기{{$loop->index}}</dt>
                                                        @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                                        @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                                @endforeach
                                            </dl>
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
                <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">{{ $data['ProfNickName'] }}</span> {{$data['AppellationCcdName']}} 프로필</div>
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
                <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">{{ $data['ProfNickName'] }}</span> {{$data['AppellationCcdName']}} 커리큘럼</div>
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
                <ul class="tabWrap tabDepthProf tabDepthProf_{{ count($tab_list) }}">
                    @foreach($tab_list as $tab_id => $tab_name)
                        <li><a href="#none" id="hover_{{ $tab_id }}" onclick="goTabUrl('tab', '{{ $tab_id }}');">{{ $tab_name }}</a></li>
                    @endforeach
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

                // 하위 탭 active 처리
                @if(empty($arr_input['stab']) === false)
                    var lec_tab = '{{ starts_with($arr_input['stab'], 'on_') === true ? 'acad1' : 'acad2' }}';
                    $('.acadBoxWrap .tabWrap.tabDepthAcad li').find('a[href="#' + lec_tab + '"]').trigger('click');
                    $('.acadBoxWrap #' + lec_tab + ' .tabWrap.acadline li').find('a[href="#{{$arr_input['stab']}}"]').trigger('click');
                @endif
            @endif
        });

        // 수강후기 레이어팝업
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

    // 메인 탭 클릭
    function goTabUrl(key, val) {
        removeFormInput('#url_form', 'cate_code,subject_idx,subject_name,tab');
        goUrl(key, val);
    }
</script>
@stop
