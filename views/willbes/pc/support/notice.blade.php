@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach

            <div class="willbes-CScenter c_both">
                <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                    · 공지사항
                    <div class="willbes-Lec-Search GM f_right">
                        <div class="inputBox p_re">
                            <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요">
                            <button type="submit" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="Act2 mt30">
                    <!-- List -->
                    <div class="willbes-Leclist c_both">
                        @if(empty($campus_ccd) === false)
                        <div class="willbes-Lec-Selected tx-gray">

                            <select id="s_campus" name="s_campus" title="campus" class="seleCampus">
                                <option value="">캠퍼스</option>
                                @foreach($campus_ccd as $row)
                                    <option value="{{$row['CampusCcd']}}" @if(element('s_campus',$arr_input) == $row['CampusCcd']) selected @endif>{{$row['CcdName']}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 65px;">
                                    @if(empty($campus_ccd) === false)<col style="width: 110px;">@endif
                                    <col style="width: 445px;">
                                    <col style="width: 65px;">
                                    <col style="width: 100px;">
                                    <col style="width: 90px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>No<span class="row-line">|</span></th>
                                    @if(empty($campus_ccd) === false)<th>캠퍼스<span class="row-line">|</span></th>@endif
                                    <th>제목<span class="row-line">|</span></th>
                                    <th>첨부<span class="row-line">|</span></th>
                                    <th>작성일<span class="row-line">|</span></th>
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
                                    <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_HOT.gif') }}">@else{{$paging['rownum']}}@endif</td>
                                    @if(empty($campus_ccd) === false)<td><span class="oBox campus_{{$row['CampusCcd']}} NSK">{{$row['CampusCcd_Name']}}</span></td>@endif
                                    <td class="w-list tx-left pl20">
                                        <a href="{{site_url('support/notice/show').'?board_idx='.$row['BoardIdx'].'&s_campus='.element('s_campus',$arr_input).'&s_keyword='.urlencode(element('s_keyword',$arr_input)).'&page='.element('page',$paging).'&isBestcheck='.$row['IsBest']}}">
                                            @if($row['IsBest'] == '1')<strong>@endif{{$row['Title']}}@if($row['IsBest'] == '1')</strong>@endif
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
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>
    <!-- End Container -->
@stop