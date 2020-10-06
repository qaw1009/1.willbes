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
            이벤트
        </div>
        <div class="willbes-Lec-Selected NG tx-gray">

            @if(empty($arr_base['request_type']) === false)
                <select id="s_request_type" name="s_request_type" title="이벤트종류" class="seleCate width32n5p" onchange="goUrl('s_request_type',this.value)">
                    <option value="">전체 이벤트</option>
                    @foreach($arr_base['request_type'] as $key => $val)
                        <option value="{{$key}}" @if(element('s_request_type', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                    @endforeach
                </select>
            @endif

            @if(empty($arr_base['campus']) === false)
                <select id="s_campus" name="s_campus" title="캠퍼스" class="seleCate width32n5p ml1p" onchange="goUrl('s_campus',this.value)">
                    <option value="">전체 캠퍼스</option>
                    @foreach($arr_base['campus'] as $key => $val)
                        <option value="{{$key}}" @if(element('s_campus', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                    @endforeach
                </select>
            @endif

            <div class="willbes-Lec-Search NG width100p mt1p">
                <div class="inputBox width90p p_re">
                    <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch width100p" placeholder="제목 및 내용 검색">
                    <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value)" class="search-Btn" class="search-Btn">
                        <span class="hidden">검색</span>
                    </button>
                </div>
                <div class="resetBtn width10p">
                    <a href="{{front_url($arr_base['page_url'])}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                </div>
            </div>
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
                <tr class="{{$row['IsBest'] == '1' ? 'bg-light-blue' : ''}}">
                    <td class="w-data tx-left" colspan="2">
                        <a href="{{front_url($arr_base['view_url'].'?event_idx='.$row['ElIdx'].'&'.$get_params)}}">
                            <div class="w-tit">
                                [{{$row['RequestTypeName']}}] {{hpSubString($row['EventName'],0,40,'...')}}
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>접수기간 : {{$row['RegisterStartDay']}}~{{$row['RegisterEndDay']}}<span class="row-line">|</span></dt>
                                <dt>조회수 : <span class="tx-blue">{{$row['ReadCnt']}}</span></dt>
                                @if (empty($row['Link']) === false)
                                    <div class="InfoBtn btn_blue"><a href="//{{$row['Link']}}" target="_blank">바로가기 &gt;</a></div>
                                @endif
                            </dl>
                        </a>
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
@stop