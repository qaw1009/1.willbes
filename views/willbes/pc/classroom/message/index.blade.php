@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    @include('willbes.pc.layouts.partial.site_tab_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>

    <div class="Content p_re">
        <form id="search_form" name="search_form" method="GET">N
        <div class="willbes-Mypage-SUPPORTZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                · 쪽지관리
            </div>
        </div>
        <!-- willbes-Mypage-SUPPORTZONE -->

        <div class="willbes-Leclist c_both">
            <div class="willbes-LecreplyList tx-gray c_both mt-zero">
                → 총 <a class="num tx-light-blue strong" href="#none">{{$total_rows}}</a>건
                <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                <select id="s_is_receive" name="s_is_receive" title="전체쪽지" class="seleAll mr10 h30 f_left">
                    <option value="">전체쪽지</option>
                    <option value="N" @if((element('s_is_receive', $arr_input) == 'N')) selected="selected" @endif>미확인쪽지</option>
                    <option value="Y" @if((element('s_is_receive', $arr_input) == 'Y')) selected="selected" @endif>확인쪽지</option>
                </select>
                <select id="s_site_code" name="s_site_code" title="과정" class="seleProcess mr10 h30 f_left">
                    <option value="">과정</option>
                    @foreach($arr_base['site_list'] as $key => $val)
                        <option value="{{$key}}" @if((element('s_site_code', $arr_input) == $key)) selected="selected" @endif>{{$val}}</option>
                    @endforeach
                </select>
                <select id="s_onoff_type" name="s_onoff_type" title="구분" class="seleAcad mr10 h30 f_left">
                    <option value="">구분</option>
                    @foreach($arr_base['onoff_type'] as $key => $val)
                        <option value="{{$key}}" @if((element('s_onoff_type', $arr_input) == $key)) selected="selected" @endif>{{$val}}</option>
                    @endforeach
                </select>
                <div class="willbes-Lec-Search GM f_right">
                    <div class="inputBox p_re">
                        <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30" value="{{ element('s_keyword', $arr_input) }}">
                        <button type="submit" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>
            </span>
            </div>
            <div class="LeclistTable pointTable">
                <table cellspacing="0" cellpadding="0" class="listTable cartTable under-gray bdt-gray tx-gray">
                    <colgroup>
                        <col style="width: 60px;">
                        <col style="width: 70px;">
                        <col style="width: 80px;">
                        <col style="width: 370px;">
                        <col style="width: 70px;">
                        <col style="width: 100px;">
                        <col style="width: 110px;">
                        <col style="width: 80px;">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>No<span class="row-line">|</span></th>
                        <th>과정<span class="row-line">|</span></th>
                        <th>구분<span class="row-line">|</span></th>
                        <th>제목<span class="row-line">|</span></th>
                        <th>첨부<span class="row-line">|</span></th>
                        <th>발송자<span class="row-line">|</span></th>
                        <th>발송일<span class="row-line">|</span></th>
                        <th>상태</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(empty($list))
                        <tr>
                            <td class="w-list tx-center" colspan="8">등록된 내용이 없습니다.</td>
                        </tr>
                    @endif
                    @foreach($list as $row)
                        <tr>
                            <td class="w-no">{{$paging['rownum']}}</td>
                            <td class="w-process"><div class="pBox p5">{{$row['SiteGroupName']}}</div></td>
                            <td class="w-acad"><span class="oBox {{$row['CampusType']}}Box NSK">{{$row['CampusType_Name']}}</span></td>
                            <td class="w-list tx-left pl25 {{($row['IsReceive'] == 'Y') ? '' : 'strong'}}"><a href="#none" onclick="openWin('MEMOPASS')">{{hpSubString($row['Content'],0,40,'...')}}</a></td>
                            <td class="w-file">
                                <a href="#none">
                                    @if(empty($row['AttachData']) === false)
                                        <a href="{{site_url('/classroom/message/download?path=').urlencode($row['AttachData']).'&fname='.urlencode($row['SendAttachRealFileName']).'&send_idx='.$row['SendIdx']}}" target="_blank">
                                            <img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                    @endif
                                </a>
                            </td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">{{$row['RegDatm']}}</td>
                            <td class="w-state {{($row['IsReceive'] == 'Y') ? '' : 'tx-red'}} strong">
                                {{($row['IsReceive'] == 'Y') ? '확인' : '미확인'}}
                            </td>
                        </tr>
                        @php $paging['rownum']-- @endphp
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-xs-12">
                        {!! $paging['pagination'] !!}
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- willbes-Leclist -->
    </div>
    {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
</div>
@stop