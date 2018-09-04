@extends('willbes.pc.layouts.master')

@section('content')
<div id="Container" class="subContainer widthAuto c_both">
    @include('willbes.pc.layouts.partial.site_tab_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    <div class="Content p_re">
        <form id="search_form" name="search_form" method="GET">
        <div class="willbes-CScenter c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                · 1:1 상담
                <div class="willbes-Lec-Search GM f_right" style="margin: 0;">
                    <div class="inputBox p_re">
                        <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요">
                        <button type="submit" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="Act3 mt30">
                <!-- List -->
                <div class="willbes-Leclist c_both">
                    <div class="willbes-Lec-Selected tx-gray">
                        <select id="s_site_code" name="s_site_code" title="과정" class="seleProcess" style="width: 250px;" @if($__cfg['SiteCode'] != config_item('app_intg_site_code')) disabled @endif>
                            <option value="">과정</option>
                            @foreach($arr_base['site_list'] as $key => $val)
                                <option value="{{$key}}" @if(($__cfg['SiteCode'] != config_item('app_intg_site_code') && $__cfg['SiteCode'] == $key) || (element('s_site_code', $arr_input) == $key)) selected="selected" @endif>{{$val}}</option>
                            @endforeach
                        </select>

                        <select id="s_cate_code" name="s_cate_code" title="구분" class="seleCategory" style="width: 250px;" @if($__cfg['SiteCode'] != config_item('app_intg_site_code')) disabled @endif>
                            <option value="">구분</option>
                            @foreach($arr_base['category'] as $row)
                                <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if(element('s_cate_code', $arr_input) == $row['CateCode'])selected="selected"@endif>{{$row['CateName']}}</option>
                            @endforeach
                        </select>

                        <select id="s_consult_type" name="s_consult_type" title="상담유형" class="seleLecA">
                            <option value="">상담유형</option>
                            @foreach($arr_base['consult_type'] as $key => $val)
                                <option value="{{$key}}" @if(element('s_consult_type', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                            @endforeach
                        </select>
                        <div class="subBtn NSK f_right"><a href="{{site_url('support/qna/create?&s_keyword='.urlencode(element('s_keyword',$arr_input)))}}">문의하기 ></a></div>
                    </div>
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                            <colgroup>
                                <col style="width: 65px;">
                                <col style="width: 90px;">
                                <col style="width: 80px;">
                                <col style="width: 100px;">
                                <col style="width: 315px;">
                                <col style="width: 90px;">
                                <col style="width: 110px;">
                                <col style="width: 90px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></th>
                                <th>과정<span class="row-line">|</span></th>
                                <th>구분<span class="row-line">|</span></th>
                                <th>상담유형<span class="row-line">|</span></th>
                                <th>제목<span class="row-line">|</span></th>
                                <th>작성자<span class="row-line">|</span></th>
                                <th>작성일<span class="row-line">|</span></th>
                                <th>답변상태</th>
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
                                    <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_notice.gif') }}">@else{{$paging['rownum']}}@endif</td>
                                    <td class="w-process"><div class="pBox p5">{{$row['SiteGroupName']}}</div></td>
                                    <td class="w-acad"><span class="oBox {{$row['CampusType']}}Box NSK">{{$row['CampusType_Name']}}</span></td>
                                    <td class="w-A">{{$row['TypeCcd_Name']}}</td>
                                    <td class="w-list tx-left pl20">
                                        <a href="{{site_url('support/qna/show?board_idx='.$row['BoardIdx'].'&isBestcheck='.$row['IsBest'].'&'.$get_params)}}">
                                            @if($row['IsBest'] == 0 && $row['IsPublic'] == 'N')<img src="{{ img_url('prof/icon_locked.gif') }}">@endif
                                            {{hpSubString($row['Title'],0,20,'...')}}
                                            @if($row['RegDatm'] == date('Y-m-d'))<img src="{{ img_url('prof/icon_N.gif') }}">@endif
                                            @if(empty($row['AttachData']) === false)<img src="{{ img_url('prof/icon_file.gif') }}">@endif
                                        </a>
                                    </td>
                                    <td class="w-write">{{hpSubString($row['RegName'],0,2,'*')}}</td>
                                    <td class="w-date">{{$row['RegDatm']}}</td>
                                    <td class="w-answer">
                                        @if($row['IsBest'] == 0)
                                            @if($row['ReplyStatusCcd'] == '621004')
                                                <span class="aBox answerBox NSK">답변완료</span>
                                            @else
                                                <span class="aBox waitBox NSK">답변대기</span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @php $paging['rownum']-- @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        {!! $paging['pagination'] !!}
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- willbes-CScenter -->
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">
    </div>
</div>
<script type="text/javascript">
    var $search_form = $('#search_form');

    $(document).ready(function() {
        $search_form.find('select[name="s_cate_code"]').chained("#s_site_code");
        $search_form.find('select[name="s_campus"]').chained("#s_site_code");

        /*$url_form.on('change','#s_site_code', function (){

        });*/
    });
</script>

<!-- End Container -->
@stop