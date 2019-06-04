@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    <!-- left nav -->
    <div class="Lnb NG">
        <h2>교수진 소개</h2>
        @include('willbes.pc.site.professor.lnb_menu_partial')
    </div>
    <div class="Content p_re ml20">
        @if($__cfg['IsPassSite'] === false)
        {{-- 온라인사이트만 노출 --}}
        <div class="willbes-NoticeWrap mb40 c_both">
            {!! banner('교수진인덱스_신규강좌배너', 'sliderPromotion widthAuto460 f_left mr20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
            <div class="willbes-listTable willbes-newLec widthAuto460 mt0">
                <div class="will-Tit NG">신규강좌 <img style="vertical-align: top;" src="{{ img_url('prof/icon_new.gif') }}"></div>
                <ul class="List-Table GM tx-gray">
                    @foreach($arr_base['product'] as $idx => $row)
                        <li>
                            <a href="{{ $__cfg['IsPassSite'] === false ? front_url('/lecture/show/cate/' . $def_cate_code . '/pattern/only/prod-code/' . $row['ProdCode']) : front_url('/offLecture/index#' . $row['ProdCode']) }}">{{ $row['ProdName'] }}</a>
                            <!--span class="date">{{ substr($row['RegDatm'], 0, 10) }}</span//-->
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- willbes-NoticeWrap -->
        @endif

        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>
        @if(isset($arr_base['category']) === true)
        <div class="curriWrap c_both">
            {{-- 카테고리 --}}
            <ul class="curriTabs c_both mb20">
                @foreach($arr_base['category'] as $idx => $row)
                    <li><a href="#none" onclick="goUrl('cate_code', '{{ $row['CateCode'] }}');" class="@if($def_cate_code == $row['CateCode']) on @endif">{{ $row['CateName'] }}</a></li>
                @endforeach
            </ul>
        </div>
        @endif

        @if($__cfg['IsPassSite'] === false)
        {{-- 온라인사이트만 노출 --}}
        <div class="curriWrap GM c_both">
            <div class="CurriBox">
                <table cellspacing="0" cellpadding="0" class="curriTable">
                    <colgroup>
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                    </colgroup>
                    <tbody>
                    {{-- 직렬 --}}
                    @if(isset($arr_base['series']) === true)
                        <tr>
                            <th class="tx-gray">직렬선택</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a href="#none" onclick="goUrl('series_ccd', '');" class="@if(empty(element('series_ccd', $arr_input)) === true) on @endif">전체</a></li>
                                    @foreach($arr_base['series'] as $idx => $row)
                                        <li><a href="#none" onclick="goUrl('series_ccd', '{{ $row['ChildCcd'] }}');" class="@if(element('series_ccd', $arr_input) == $row['ChildCcd']) on @endif">{{ $row['ChildName'] }}</a></li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                    {{-- 과목 --}}
                    @if(isset($arr_base['subject']) === true)
                        <tr>
                            <th class="tx-gray">과목선택</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a href="#none" onclick="goUrl('subject_idx', '');" class="@if(empty(element('subject_idx', $arr_input)) === true) on @endif">전체</a></li>
                                    @foreach($arr_base['subject'] as $idx => $row)
                                        <li><a href="#none" onclick="goUrl('subject_idx', '{{ $row['SubjectIdx'] }}');" class="@if(element('subject_idx', $arr_input) == $row['SubjectIdx']) on @endif">{{ $row['SubjectName'] }}</a></li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                    {{-- 교수 --}}
                    @if(empty(element('subject_idx', $arr_input)) === false)
                        <tr>
                            <th class="tx-gray">교수선택</th>
                            @if(empty($arr_base['professor']) === true)
                                <td colspan="9" class="tx-blue tx-left">* 선택하신 과목의 교수진이 없습니다.</td>
                            @else
                                <td colspan="9">
                                    <ul class="curriSelect">
                                        @foreach($arr_base['professor'] as $prof_idx => $prof_name)
                                            <li><a href="#none" onclick="goUrl('prof_idx', '{{ $prof_idx }}');" class="@if(element('prof_idx', $arr_input) == $prof_idx) on @endif">{{ $prof_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </td>
                            @endif
                        </tr>
                    @else
                        <tr>
                            <th class="tx-gray">교수선택</th>
                            <td colspan="9" class="tx-blue tx-left">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->
        @endif

        {{-- 과목별 교수 리스트 --}}
        @foreach($data['subjects'] as $subject_idx => $subject_name)
            <div class="willbes-Prof-List NG c_both">
            <div class="willbes-Prof-Subject tx-dark-black">· {{ $subject_name }}</div>
            <!-- willbes-Prof-Subject -->
            <ul class="profGrid">
                {{-- 교수 리스트 loop --}}
                @foreach($data['list'][$subject_idx] as $idx => $row)
                <li class="profList">
                    @php
                        $show_url = $__cfg['IsPassSite'] === false ? '/professor/show/cate/' . $def_cate_code . '/prof-idx/' . $row['ProfIdx'] . '/?' : '/professor/show/prof-idx/' . $row['ProfIdx'] . '/?cate_code=' . $def_cate_code . '&';
                        $show_url .= 'subject_idx=' . $subject_idx . '&subject_name=' . rawurlencode($subject_name);
                    @endphp
                    <a class="profBox" href="{{ front_url($show_url) }}">
                        @if(empty($row['ProfEventData']) === false)
                            <a href="{{ $row['ProfEventData']['Link'] }}"><img class="Evt" src="{{ img_url('prof/icon_event.gif') }}"></a>
                        @endif
                        <div class="Obj">{!! $row['ProfSlogan'] !!}</div>
                        <div class="Name">
                            <strong>{{ $row['ProfNickName'] }}</strong><br/>
                            교수님
                            @if($row['IsNew'] == 'Y') <img class="N" src="{{ img_url('prof/icon_N.gif') }}"> @endif
                        </div>
                        <img class="profImg" src="{{ $row['ProfReferData']['prof_index_img'] or '' }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none" onclick="{{ empty($row['ProfReferData']['ot_url']) === false ? 'fnPlayerProf(\'' . $row['ProfIdx'] . '\', \'OT\');' : 'alert(\'등록된 대표강의가 없습니다.\');' }}">대표강의</a></dt>
                            <dt><a href="#none" class="btn-prof-profile" data-subject-idx="{{ $subject_idx }}" data-prof-idx="{{ $row['ProfIdx'] }}">프로필</a></dt>
                        </dl>
                    </div>
                    <div id="ProfileWrap{{ $subject_idx . '' . $row['ProfIdx'] }}"></div>
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
        <!-- willbes-Prof-List -->
    </div>
</div>
{!! popup('657003') !!}
<!-- End Container -->
<script type="text/javascript">
    $(document).ready(function() {
        // 프로필 버튼 클릭
        $('.profList').on('click', '.btn-prof-profile', function() {
            var $prof_idx = $(this).data('prof-idx');
            var ele_id = $(this).data('subject-idx') + '' + $prof_idx;
            var data = { 'ele_id' : ele_id };

            sendAjax('{{ front_url('/professor/profile/prof-idx/') }}' + $prof_idx, data, function(ret) {
                $('#ProfileWrap' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showError, false, 'GET', 'html');

            openWin('LayerProfile' + ele_id);
            openWin('Profile' + ele_id);
        });
    });
</script>
@stop
