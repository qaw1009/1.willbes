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
        @include('willbes.pc.site.professor.lnb_menu_partial_v2')
    </div>

    <div class="Content p_re ml20 NG">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>

        <div class="willbes-Prof-Profile-ssam p_re mb40 NG tx-black">
            <div class="ProfImgBox">
                <div class="ProfImg"><img src="{{ $data['ProfReferData']['prof_detail_img'] or '' }}" alt="{{ $data['ProfNickName'] }}"></div>
                <div>
                    <div class="ProfName NSK-Black">{{ rawurldecode(element('subject_name', $arr_input, '')) }} <span>{{ $data['ProfNickName'] }}</span> {{ $data['AppellationCcdName'] }}</div>
                    <div class="ProfCareer">
                        {!! $data['wProfProfile'] !!}
                    </div>
                </div>
            </div>

            <div class="prof-profile p_re">
                <ul class="prof-brief-btn">
                    @if(empty($data['ProfReferData']['homep_url']) === false)
                        <li>
                            <a href="{{ $data['ProfReferData']['homep_url'] }}" target="_blank">
                                <img src="{{ img_static_url('promotion/main/2018/prof_icon01.png') }}" alt="홈페이지"> {{ $data['AppellationCcdName'] }} 홈페이지
                            </a>
                        </li>
                    @endif
                    @if(empty($data['ProfReferData']['cafe_url']) === false)
                        <li>
                            <a href="{{ $data['ProfReferData']['cafe_url'] }}" target="_blank">
                                <img src="{{ img_static_url('promotion/main/2018/prof_icon02.png') }}" alt="카페"> {{ $data['AppellationCcdName'] }} 카페
                            </a>
                        </li>
                    @endif
                    @if(empty($data['ProfReferData']['blog_url']) === false)
                        <li>
                            <a href="{{ $data['ProfReferData']['blog_url'] }}" target="_blank">
                                <img src="{{ img_static_url('promotion/main/2018/prof_icon03.png') }}" alt="블로그"> {{ $data['AppellationCcdName'] }} 블로그
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="#none" onclick="openWin('LayerCurriculum'); openWin('Curriculum');">
                            <img src="{{ img_static_url('promotion/main/2018/prof_icon04.png') }}" alt="커리큘럼"> 커리큘럼
                        </a>
                    </li>
                    @if($data['IsOpenStudyComment'] == 'Y')
                        <li>
                            <a href="#none" class="btn-study" data-board-idx="" data-board-url="{{front_url('/support/studyComment/')}}" onclick="go_board_popup(this)">
                                <img src="{{ img_static_url('promotion/main/2018/prof_icon05.png') }}" alt="수강후기"> 수강후기
                            </a>
                        </li>
                    @endif
                    @if($data['IsDataBoard'] == 'Y')
                        <li>
                            <a href="#none" class="btn-material" data-board-idx="" data-board-url="{{front_url('/prof/material/popupIndex')}}" onclick="go_board_popup(this)">
                                <img src="{{ img_static_url('promotion/main/2018/prof_icon06.png') }}" alt="학습자료실"> 학습자료실
                            </a>
                        </li>
                    @endif
                    {{--<li class="sampleLec">
                        <a href="#none">
                            <img src="{{ img_static_url('promotion/main/2018/prof_icon07.png') }}" alt="샘플강의"> 샘플강의
                        </a>
                    </li>--}}
                </ul>

                <div class="ProfBoard">
                    <div class="willbes-listTable mr25">
                        <div class="will-Tit NG">공지사항 <a href="#none" class="f_right btn-notice" data-board-idx="" data-board-url="{{front_url('/prof/notice/popupIndex')}}" onclick="go_board_popup(this)"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
                        <ul class="List-Table tx-gray">
                            @if(empty($data['ProfNotice']) === true)
                                <li>등록된 공지사항이 없습니다.</li>
                            @else
                                @foreach($data['ProfNotice'] as $idx => $row)
                                    <li><a href="#none" data-board-idx="{{$row['BoardIdx']}}" data-board-url="{{front_url('/prof/notice/popupShow')}}" onclick="go_board_popup(this)">{{ $row['Title'] }}</a>
                                        @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}" alt="new"/>@endif
                                        <span>{{ $row['RegDatm'] }}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="willbes-listTable">
                        <div class="will-Tit NG">강의 업데이트 <a href="#none" class="f_right btn-update-lecture-info" data-board-url="{{front_url('/UpdateLectureInfo/popupIndex')}}" onclick="go_board_popup(this)"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
                        <ul class="List-Table tx-gray">
                            @if(empty($data['ProfUpdateLectureInfo']) === true)
                                <li>등록된 강의가 없습니다.</li>
                            @else
                                @foreach($data['ProfUpdateLectureInfo'] as $idx => $row)
                                    <li>
                                        <a href="#none" data-board-url="{{front_url('/UpdateLectureInfo/popupIndex')}}" onclick="go_board_popup(this)">
                                            [{{ $row['SubjectName'] }} {{ $row['ProfNickName'] }}]
                                            <strong style="color: #c00;">총 {{ $row['unit_cnt'] }}강 업로드</strong>
                                            {{ $row['ProdName'] }}
                                        </a>
                                        @if(date('Y-m-d') == $row['unit_regdate'])<img src="{{ img_url('cop/icon_new.png') }}" alt="new"/>@endif
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

                <ul class="prof-banner01 bSlider">
                    {{-- 교수영역 이벤트 배너1 --}}
                    @if(isset($data['ProfBnrData']['01']) === true && empty($data['ProfBnrData']['01']) === false)
                        <li class="f_left bSlider">
                            <div class="{{ count($data['ProfBnrData']['01']) > 1 ? 'slider' : '' }}">
                                @foreach($data['ProfBnrData']['01'] as $bnr_num => $bnr_row)
                                    @if($bnr_row['LinkType'] == 'script')
                                        <div><a href="#none" onclick="{!! str_replace("\"", "'", $bnr_row['LinkUrl']) !!}"><img src="{{ $bnr_row['BnrImgPath'] . $bnr_row['BnrImgName'] }}" alt=""></a></div>
                                    @else
                                        <div><a href="{{ empty($bnr_row['LinkUrl']) === false ? $bnr_row['LinkUrl'] : '#none' }}" target="_{{ $bnr_row['LinkType'] }}"><img src="{{ $bnr_row['BnrImgPath'] . $bnr_row['BnrImgName'] }}" alt=""></a></div>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                    @endif
                    {{-- 교수영역 이벤트 배너2 --}}
                    @if(isset($data['ProfBnrData']['04']) === true && empty($data['ProfBnrData']['04']) === false)
                        <li class="f_right bSlider">
                            <div class="{{ count($data['ProfBnrData']['04']) > 1 ? 'slider' : '' }}">
                                @foreach($data['ProfBnrData']['04'] as $bnr_num => $bnr_row)
                                    @if($bnr_row['LinkType'] == 'script')
                                        <div><a href="#none" onclick="{!! str_replace("\"", "'", $bnr_row['LinkUrl']) !!}"><img src="{{ $bnr_row['BnrImgPath'] . $bnr_row['BnrImgName'] }}" alt=""></a></div>
                                    @else
                                        <div><a href="{{ empty($bnr_row['LinkUrl']) === false ? $bnr_row['LinkUrl'] : '#none' }}" target="_{{ $bnr_row['LinkType'] }}"><img src="{{ $bnr_row['BnrImgPath'] . $bnr_row['BnrImgName'] }}" alt=""></a></div>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

            <!-- willbes-Layer-커리큘럼 -->
            @include('willbes.pc.site.professor.curri_partial')
            <!-- // willbes-Layer-커리큘럼 -->

            <!-- willbes-Layer-수강후기 -->
            <div id="WrapReply"></div>
            <!-- // willbes-Layer-수강후기 -->
        </div>
        <!-- // willbes-Prof-Profile-ssam -->

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
            $('.willbes-Prof-Tabs .tabDepthProf li a').removeClass('on');
            $('.willbes-Prof-Tabs .tabDepthProf #hover_{{ $arr_input['tab'] }}').addClass('on');
            $('.willbes-Prof-Tabs .tabBox .tabLink').css('display', 'block');
        });

    });

    // 메인 탭 클릭
    function goTabUrl(key, val) {
        removeFormInput('#url_form', 'cate_code,subject_idx,subject_name,tab');
        goUrl(key, val);
    }

    // 게시판 레이어팝업
    function go_board_popup(obj){
        var ele_id = 'WrapReply';
        var _url = $(obj).data('board-url');
        var data = {
            'ele_id' : ele_id,
            'cate_code' : '{{$def_cate_code}}',
            'prof_idx' : '{{$prof_idx}}',
            'board_idx' : $(obj).data('board-idx'),
            'subject_idx' : '{{ element('subject_idx', $arr_input) }}'
        };

        sendAjax(_url, data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        }, showAlertError, false, 'GET', 'html');
    }
</script>
@stop
