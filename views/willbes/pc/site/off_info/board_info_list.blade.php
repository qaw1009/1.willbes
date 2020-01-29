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

            <div class="willbes-AcadInfo c_both">
                <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                    · {{$bm_title}}
                </div>
                <div class="Acad_info mt30">
                    @if($tab_menu === true)
                    <ul class="tabMock four mb60">
                        <li><a @if($bm_idx=='80')class="on" @endif href="{{ front_url('/offinfo/boardInfo/index/80?') }}@if(empty(element('on_off_link_cate_code', $arr_input)) === false){{'on_off_link_cate_code='.element('on_off_link_cate_code', $arr_input)}}@endif{{----}}@if(empty(element('s_cate_code_disabled', $arr_input)) === false){{'&s_cate_code_disabled='.element('s_cate_code_disabled', $arr_input)}}@endif">강의시간표</a></li>
                        <li><a @if($bm_idx=='82')class="on" @endif href="{{ front_url('/offinfo/boardInfo/index/82?') }}@if(empty(element('on_off_link_cate_code', $arr_input)) === false){{'on_off_link_cate_code='.element('on_off_link_cate_code', $arr_input)}}@endif{{----}}@if(empty(element('s_cate_code_disabled', $arr_input)) === false){{'&s_cate_code_disabled='.element('s_cate_code_disabled', $arr_input)}}@endif">강의실배정표</a></li>
                        <li><a @if($bm_idx=='109')class="on" @endif href="{{ front_url('/offinfo/boardInfo/index/109?') }}@if(empty(element('on_off_link_cate_code', $arr_input)) === false){{'on_off_link_cate_code='.element('on_off_link_cate_code', $arr_input)}}@endif{{----}}@if(empty(element('s_cate_code_disabled', $arr_input)) === false){{'&s_cate_code_disabled='.element('s_cate_code_disabled', $arr_input)}}@endif">강의계획서</a></li>
                        <li><a @if($bm_idx=='110')class="on" @endif href="{{ front_url('/offinfo/boardInfo/index/110?') }}@if(empty(element('on_off_link_cate_code', $arr_input)) === false){{'on_off_link_cate_code='.element('on_off_link_cate_code', $arr_input)}}@endif{{----}}@if(empty(element('s_cate_code_disabled', $arr_input)) === false){{'&s_cate_code_disabled='.element('s_cate_code_disabled', $arr_input)}}@endif">강의자료실</a></li>
                        <li><a @if($bm_idx=='75')class="on" @endif href="{{ front_url('/offinfo/boardInfo/index/75?') }}@if(empty(element('on_off_link_cate_code', $arr_input)) === false){{'on_off_link_cate_code='.element('on_off_link_cate_code', $arr_input)}}@endif{{----}}@if(empty(element('s_cate_code_disabled', $arr_input)) === false){{'&s_cate_code_disabled='.element('s_cate_code_disabled', $arr_input)}}@endif">휴강/보강공지</a></li>
                        <li><a @if($bm_idx=='78')class="on" @endif href="{{ front_url('/offinfo/boardInfo/index/78?') }}@if(empty(element('on_off_link_cate_code', $arr_input)) === false){{'on_off_link_cate_code='.element('on_off_link_cate_code', $arr_input)}}@endif{{----}}@if(empty(element('s_cate_code_disabled', $arr_input)) === false){{'&s_cate_code_disabled='.element('s_cate_code_disabled', $arr_input)}}@endif">신규강의안내</a></li>
                    </ul>
                    @endif

                    <!-- List -->
                    <div class="willbes-Leclist c_both">
                        <div class="willbes-Lec-Selected tx-gray c_both mt-zero mb-zero">
                        <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                            @if(empty($arr_base['category']) === false)
                                {{-- <select id="s_cate_code" name="s_cate_code" title="카테고리" class="seleCategory" onchange="goUrl('s_cate_code',this.value)"> --}}
                                <select id="s_cate_code" name="s_cate_code" title="카테고리" class="seleCategory @if(empty(element('s_cate_code_disabled', $arr_input)) == false && element('s_cate_code_disabled', $arr_input) == 'Y') view-disabled @endif" onchange="goUrl('s_cate_code',this.value)" @if(empty(element('s_cate_code_disabled', $arr_input)) == false && element('s_cate_code_disabled', $arr_input) == 'Y') readonly="readonly" @endif>
                                    <option value="">카테고리</option>
                                    @foreach($arr_base['category'] as $row)
                                        <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if(element('s_cate_code', $arr_input) == $row['CateCode'] || element('on_off_link_cate_code', $arr_input) == $row['OnOffLinkCateCode']) selected="selected" @endif>{{$row['CateName']}}</option>
                                    @endforeach
                                </select>
                            @endif
                            @if(empty($arr_base['campus']) === false)
                                <select id="s_campus" name="s_campus" title="campus" class="seleCampus" onchange="goUrl('s_campus',this.value)">
                                    <option value="">캠퍼스</option>
                                        @foreach($arr_base['campus'] as $row)
                                            <option value="{{$row['CampusCcd']}}" @if(element('s_campus',$arr_input) == $row['CampusCcd']) selected @endif>{{$row['CcdName']}}</option>
                                        @endforeach
                                </select>
                            @endif
                        </span>
                            <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요">
                                <button type="submit" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </span>
                        </div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 65px;">
                                    <col style="width: 110px;">
                                    <col style="width: 510px;">
                                    <col style="width: 65px;">
                                    <col style="width: 100px;">
                                    <col style="width: 90px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>No<span class="row-line">|</span></th>
                                    <th>캠퍼스<span class="row-line">|</span></th>
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
                                        @if($__cfg['CampusCcdArr'] != 'N')<td><span class="oBox campus_{{$row['CampusCcd']}} NSK">{{$row['CampusCcd_Name']}}</span></td>@endif
                                        <td class="w-list tx-left pl20">
                                            <a href="{{front_url($default_path.'/show/'.$bm_idx.'?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
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
            <!-- willbes-AcadInfo -->
            </form>
        </div>
        {!! banner('고객센터_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
    <!-- End Container -->
@stop