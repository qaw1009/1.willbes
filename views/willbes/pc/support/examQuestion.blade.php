@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
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
        <div class="willbes-CScenter c_both">
            <div class="Act2">
                <!-- List -->
                <div class="willbes-Leclist c_both">
                    <div class="willbes-Lec-Selected tx-gray mt0">
                        <div class="f_left">
                            <select id="s_area" name="s_area" title="지역" class="seleLecA" onchange="goUrl('s_area',this.value)">
                                <option value="">지역</option>
                                @foreach($arr_base['area'] as $key => $val)
                                    <option value="{{$key}}" @if(element('s_area', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                                @endforeach
                            </select>

                            <select id="s_year" name="s_year" title="연도" class="seleLecA" onchange="goUrl('s_year',this.value)">
                                <option value="">연도</option>
                                @for($i = date('Y') - 5; $i <= date('Y') + 5; $i++)
                                    <option value="{{$i}}" @if(element('s_year', $arr_input) == $i)selected="selected"@endif>{{$i}}</option>
                                @endfor
                            </select>

                            <select id="s_subject" name="s_subject" title="과목" class="seleLecA" onchange="goUrl('s_subject',this.value)">
                                <option value="">과목</option>
                                @foreach($arr_base['subject'] as $key => $val)
                                    <option value="{{$key}}" @if(element('s_subject', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="willbes-Lec-Search GM f_left mg0">
                            <div class="inputBox p_re">
                                <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요">
                                <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value)" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                            <colgroup>
                                <col style="width: 65px;">
                                <col style="width: 80px;">
                                <col style="width: 60px;">
                                <col style="width: 110px;">
                                <col style="width: 360px;">
                                <col style="width: 65px;">
                                <col style="width: 110px;">
                                <col style="width: 90px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></th>
                                <th>지역<span class="row-line">|</span></th>
                                <th>연도<span class="row-line">|</span></th>
                                <th>과목<span class="row-line">|</span></th>
                                <th>제목<span class="row-line">|</span></th>
                                <th>첨부<span class="row-line">|</span></th>
                                <th>작성일<span class="row-line">|</span></th>
                                <th>조회수</th>
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
                                    <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_HOT.gif') }}">@else{{$paging['rownum']}}@endif</td>
                                    <td>{{$row['AreaCcd_Name']}}</td>
                                    <td>{{$row['ExamProblemYear']}}</td>
                                    <td>{{$row['SubjectName']}}</td>
                                    <td class="w-list tx-left pl20">
                                        <a href="{{front_url($default_path.'/examQuestion/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
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
    <!-- willbes-CScenter -->
    </div>
    {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
</div>
<!-- End Container -->
@stop