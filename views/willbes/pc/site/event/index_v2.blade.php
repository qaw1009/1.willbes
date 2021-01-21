@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    <div class="Content p_re">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>

        <div class="willbes-Leclist c_both mt0 p_re">
            <div class="willbes-LecreplyList tx-gray c_both mt0">
                <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                    <select id="s_event_type" name="s_event_type" title="이벤트종류" class="seleEvt f_left mr10" onchange="goEventUrl('s_event_type', this.value)">
                        @foreach($arr_base['event_type'] as $key => $val)
                            <option value="{{$key}}" @if(element('s_event_type', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                        @endforeach
                    </select>

                    <select id="s_request_type" name="s_request_type" title="이벤트유형" class="seleEvt f_left mr10" onchange="goUrl('s_request_type',this.value)">
                        <option value="">유형</option>
                        @foreach($arr_base['request_type'] as $key => $val)
                            <option value="{{$key}}" @if(element('s_request_type', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                        @endforeach
                    </select>

                    @if(empty($arr_base['campus']) === false)
                    <select id="s_campus" name="s_campus" title="캠퍼스" class="seleCampus f_left mr10" onchange="goUrl('s_campus',this.value)">
                        <option value="">전체 캠퍼스</option>
                        @foreach($arr_base['campus'] as $key => $val)
                            <option value="{{$key}}" @if(element('s_campus', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
                <div class="willbes-Lec-Search GM f_left">
                    <div class="inputBox p_re">
                        <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" placeholder="제목을 입력해 주세요" maxlength="30" value="{{element('s_keyword', $arr_input)}}">
                        <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value)" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>

            </div>
            <div class="LeclistTable orderTable">
                <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                    <colgroup>
                        <col style="width: 70px;">
                        <col style="width: 160px;">
                        <col style="width: 350px;">
                        <col style="width: 120px;">
                        <col style="width: 120px;">
                        <col style="width: 120px;">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>NO<span class="row-line">|</span></th>
                        <th colspan="2">이벤트 정보<span class="row-line">|</span></th>
                        <th>진행상태<span class="row-line">|</span></th>
                        <th>참여대상<span class="row-line">|</span></th>
                        <th>조회수</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(empty($list))
                    <tr>
                        <td class="w-list tx-center" colspan="6">등록된 내용이 없습니다.</td>
                    </tr>
                    @endif

                    @foreach($list as $row)
                    <tr>
                        <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('sub/icon_HOT.gif') }}">@else{{$paging['rownum']}}@endif</td>
                        <td class="w-img">
                            <a href="{{front_url($arr_base['view_url'].'?event_idx='.$row['ElIdx'].'&'.$get_params)}}">
                                <img src="{{$row['FileFullPath'] . $row['FileName']}}">
                            </a>
                        </td>
                        <td class="w-data tx-left pl10">
                            <dl class="w-info">
                                <dt>{{$row['CampusName']}}</dt>
                            </dl><br/>
                            <div class="w-tit">
                                <a href="{{front_url($arr_base['view_url'].'?event_idx='.$row['ElIdx'].'&'.$get_params)}}">
                                    <strong><span class="tx-light-blue">[{{$row['RequestTypeName']}}]</span> {{hpSubString($row['EventName'],0,40,'...')}}</strong>
                                </a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>접수기간 : {{$row['RegisterStartDay']}}~{{$row['RegisterEndDay']}}</dt>
                            </dl>
                            @if (empty($row['Link']) === false)
                            <div class="mt5"><a class="btnstA" href="//{{$row['Link']}}" target="_blank">바로가기 &gt;</a></div>
                            @endif
                        </td>
                        <td class="w-progress">
                            @if($row['IsRegister'] == 'Y' && $row['RegisterEndDate'] > date('Y-m-d H:i:s'))
                                <span class="on">진행중</span>
                            @else
                                <span class="off">마감</span>
                            @endif
                        </td>
                        <td class="w-user">{{$row['TakeTypeName']}}</td>
                        <td class="w-view">{{$row['ReadCnt']}}</td>
                    </tr>
                    @php $paging['rownum']-- @endphp
                    @endforeach
                    </tbody>
                </table>
                {!! $paging['pagination'] !!}
            </div>
        </div>
    </div>
    {!! banner('이벤트_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
</div>
<!-- End Container -->

    <script>
        function goEventUrl(key, obj_val){
            var _url = "{{ front_url('/event/list/'.(empty($__cfg['CateCode']) === false ? 'cate/' . $__cfg['CateCode'] . '/pattern/' : '')) }}" + obj_val;

            var $url_form = $('#url_form');
            var $url_input = $url_form.find('[name="' + key + '"]');
            var $url_hidden = $url_form.find('input[type="hidden"][name="' + key + '"]');

            if ($url_input.length > 0) {
                $url_input.val(obj_val);
                if ($url_input.length > 1 && $url_hidden.length > 0) {
                    // 동일한 파라미터가 2개 이상일 경우 hidden 파라미터 제거
                    $url_hidden.remove();
                }
            } else {
                $url_form.append('<input type="hidden" name="' + key + '" value="' + obj_val + '"/>');
            }

            $url_form.prop('action', _url);
            $url_form.submit();
        }
    </script>
@stop