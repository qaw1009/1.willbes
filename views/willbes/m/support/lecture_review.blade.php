@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>

        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            수강후기
        </div>
{{--        <div class="willbes-Lec-Selected NG tx-gray">--}}

{{--            <select id="s_cate_code" name="s_cate_code" title="카테고리" class="width49p" onchange="change_url('s_cate_code',this.value)">--}}
{{--                <option value="">카테고리</option>--}}
{{--                @foreach($arr_base['category'] as $row)--}}
{{--                    <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if(element('s_cate_code', $arr_input) == $row['CateCode'])selected="selected"@endif @if(empty($row['ChildCnt']) === false && $row['ChildCnt'] > 0) disabled @endif>{{$row['CateNameRoute']}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}

{{--            <select id="subject_idx" name="subject_idx" title="과목" class="width50p ml1p" onchange="change_url('subject_idx',this.value)" @if(empty(element('s_cate_code', $arr_input)) === true) disabled @endif>--}}
{{--                <option value="">과목</option>--}}
{{--                @foreach($arr_base['subject'] as $row)--}}
{{--                    <option value="{{$row['SubjectIdx']}}" @if(element('subject_idx', $arr_input) == $row['SubjectIdx'])selected="selected"@endif>{{$row['SubjectName']}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}

{{--            <select id="prof_idx" name="prof_idx" title="교수" class="width49p mt1p" onchange="change_url('prof_idx',this.value)" @if(empty(element('s_cate_code', $arr_input)) === true || empty(element('subject_idx', $arr_input)) === true) disabled @endif>--}}
{{--                <option value="">교수</option>--}}
{{--                @foreach($arr_base['professor'] as $key => $row)--}}
{{--                    <option value="{{$row['ProfIdx']}}" @if(element('prof_idx', $arr_input) == $row['ProfIdx'])selected="selected"@endif>{{$row['wProfName']}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}

        <div class="sortList">
            <ul>
                @foreach($arr_base['professor'] as $row)
                    <li data-cate-code="{{ $row['CateCode'] }}" data-subject-idx="{{ $row['SubjectIdx'] }}" data-prof-idx="{{ $row['ProfIdx'] }}">
                        <a href="#none" class="@if(element('s_cate_code', $arr_input) == $row['CateCode'] && element('subject_idx', $arr_input) == $row['SubjectIdx'] && element('prof_idx', $arr_input) == $row['ProfIdx']) on @endif">
                            {{ $row['SubjectName'] }} {{ $row['ProfNickName'] }}
                        </a>
                    </li>
                @endforeach
                <li data-cate-code="" data-subject-idx="" data-prof-idx=""><a href="#none" class="@if(element('prof_idx', $arr_input) == '' && element('subject_idx', $arr_input) == '') on @endif">전체</a></li>
            </ul>
        </div>

        <div class="ml10">※ 수강후기 등록은 PC버전에서만 가능합니다.</div>

        <div class="sort">
            <a href="#none" id="order_by_best" class="btn-order-by @if($orderby == 'best') on @endif" onclick="goUrl('orderby','best')" >BEST순</a>
            <a href="#none" id="order_by_date" class="btn-order-by @if($orderby == 'date') on @endif" onclick="goUrl('orderby','date')">최신순</a>
            <a href="#none" id="order_by_score" class="btn-order-by @if($orderby == 'score') on @endif"  onclick="goUrl('orderby','score')">평점순</a>
        </div>

        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <colgroup>
                <col style="width: 70px;">
                <col width="*">
            </colgroup>
            <tbody>
            @if(empty($list))
                <tr>
                    <td class="w-list tx-center" colspan="2">등록된 내용이 없습니다.</td>
                </tr>
            @endif

            @foreach($list as $row)
                <tr class="replyList willbes-Open-Table @if($row['BoardIdx'] == $arr_base['board_idx']) hover @endif">
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt>
                                @if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_best_reply.gif') }}">@endif
                                {{ $row['SubjectName'] }} <span class="row-line">|</span> {{ $row['ProfName'] }}
                            </dt>
                        </dl>
                        <div class="w-tit">
                            {{hpSubString($row['Title'],0,40,'...')}}
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>
                                <img src="{{ img_url("sub/star" . $row['LecScore'] . ".gif") }}"/> <span class="row-line">|</span>
                                {!! (empty(sess_data('mem_idx')) === false && $row['RegMemIdx'] == sess_data('mem_idx')) ? $row['RegMemName'] : hpSubString($row['RegMemName'],0,2,'*') !!}
                                <span class="row-line">|</span> {{$row['RegDatm']}}
                            </dt>
                        </dl>
                    </td>
                    <td class="MoreBtn tx-center">></td>
                </tr>
                <tr class="replyTxt willbes-Open-List bg-light-gray" style="@if($row['BoardIdx'] == $arr_base['board_idx']) display: table-row; @endif">
                    <td class="w-txt NGR" colspan="2">
                        <div class="tx-blue strong mb10">{{ $row['ProdName'] }}</div>
                        {!! nl2br($row['Content']) !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $paging['pagination'] !!}

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->
    </div>
    <!-- End Container -->

    <script>
        var $url_form = $('#url_form');

        // 교수별 수강후기 조회
        $(".sortList ul li").click(function (){
            var s_cate_code = $(this).data('cate-code');
            var subject_idx = $(this).data('subject-idx');
            var prof_idx = $(this).data('prof-idx');

            $url_form.html('');
            $url_form.append('<input type="hidden" name="s_cate_code" value="' + s_cate_code + '"/>');
            $url_form.append('<input type="hidden" name="subject_idx" value="' + subject_idx + '"/>');
            $url_form.append('<input type="hidden" name="prof_idx" value="' + prof_idx + '"/>');
            $url_form.prop('action', location.protocol + '//' + location.host + location.pathname);
            $url_form.submit();
        });

        function change_url(s_type,s_val){
            switch (s_type){
                case "s_cate_code" :
                    $("input[name='subject_idx'], input[name='prof_idx']").val("");
                    break;
                case "subject_idx" :
                    $("input[name='prof_idx']").val("");
                    break;
            }
            goUrl(s_type,s_val);
        }
    </script>
@stop