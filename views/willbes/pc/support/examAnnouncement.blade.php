@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    <div class="Content p_re">
        <form id="search_form" name="search_form" method="GET">
            <div class="willbes-CScenter c_both">
                <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                    · 시험공고
                    <div class="willbes-Lec-Search GM f_right">
                        <div class="inputBox p_re">
                            <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요">
                            <button type="submit" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="Act2 mt30">
                    <!-- List -->
                    <div class="willbes-Leclist c_both">
                        <div class="willbes-Lec-Selected tx-gray">
                            <select id="s_announcement_type" name="s_announcement_type" title="공고유형" class="seleLecA">
                                <option value="">공고유형</option>
                                @foreach($arr_base['announcement_type'] as $key => $val)
                                    <option value="{{$key}}" @if(element('s_announcement_type', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                                @endforeach
                            </select>

                            <select id="s_area" name="s_area" title="지역" class="seleLecA">
                                <option value="">지역</option>
                                @foreach($arr_base['area'] as $key => $val)
                                    <option value="{{$key}}" @if(element('s_area', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 65px;">
                                    <col style="width: 110px;">
                                    <col style="width: 110px;">
                                    <col style="width: 445px;">
                                    <col style="width: 65px;">
                                    <col style="width: 100px;">
                                    <col style="width: 90px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>No<span class="row-line">|</span></th>
                                    <th>공고지역<span class="row-line">|</span></th>
                                    <th>지역<span class="row-line">|</span></th>
                                    <th>제목<span class="row-line">|</span></th>
                                    <th>첨부<span class="row-line">|</span></th>
                                    <th>작성일<span class="row-line">|</span></th>
                                    <th>조회수</th>
                                </tr>

                                </thead>
                                <tbody>
                                @if(empty($list))
                                    <tr>
                                        <td class="w-list tx-center" colspan="7">등록된 내용이 없습니다.</td>
                                    </tr>
                                @endif
                                @foreach($list as $row)
                                    <tr>
                                        <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_HOT.gif') }}">@else{{$paging['rownum']}}@endif</td>

                                        <td class="w-date">{{$row['TypeCcd_Name']}}</td>
                                        <td class="w-date">{{$row['AreaCcd_Name']}}</td>

                                        <td class="w-list tx-left pl20">
                                            <a href="{{front_url($default_path.'/examAnnouncement/show?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
                                                @if($row['IsBest'] == '1')<strong>@endif{{hpSubString($row['Title'],0,40,'...')}}@if($row['IsBest'] == '1')</strong>@endif
                                            </a>
                                        </td>
                                        <td class="w-file">
                                            @if(empty($row['AttachData']) === false)
                                                <img src="{{ img_url('prof/icon_file.gif') }}">
                                            @endif
                                        </td>
                                        <td class="w-date">{{$row['RegDatm']}}</td>
                                        <td class="w-click">{{$row['TotalReadCnt']}}</td>
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
    {!! banner('고객센터_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
</div>
<!-- End Container -->
<script type="text/javascript">
    var $search_form = $('#search_form');
</script>
@stop