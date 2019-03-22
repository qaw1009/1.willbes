@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @if (empty($__cfg['TabMenu']) === true)
            @include('willbes.pc.layouts.partial.site_menu')
        @else
            @include('willbes.pc.layouts.partial.site_tab_menu')
        @endif
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
                                <select id="s_site_code" name="s_site_code" title="구분" class="seleProcess" onchange="goUrl('s_site_code',this.value)" @if($__cfg['SiteCode'] != config_item('app_intg_site_code')) disabled @endif>
                                    <option value="">구분</option>
                                    @foreach($arr_base['site_list'] as $key => $val)
                                        <option value="{{$key}}" @if(($__cfg['SiteCode'] != config_item('app_intg_site_code') && $__cfg['SiteCode'] == $key) || (element('s_site_code', $arr_input) == $key)) selected="selected" @endif>{{$val}}</option>
                                    @endforeach
                                </select>

                                @if(empty($arr_base['category']) === false)
                                    <select id="s_cate_code" name="s_cate_code" title="카테고리" class="seleCategory" onchange="goUrl('s_cate_code',this.value)" {{--@if($__cfg['SiteCode'] != config_item('app_intg_site_code')) disabled @endif--}}>
                                        <option value="">카테고리</option>
                                        @foreach($arr_base['category'] as $row)
                                            <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if(element('s_cate_code', $arr_input, $__cfg['CateCode']) == $row['CateCode'])selected="selected"@endif>{{$row['CateName']}}</option>
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
                            </div>
                            <div class="willbes-Lec-Search GM f_left mg0">
                                <div class="inputBox p_re">
                                    <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요">
                                    <button type="submit" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                                        <span>검색</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 65px;">
                                    <col style="width: 100px;">
                                    <col style="width: 445px;">
                                    <col style="width: 65px;">
                                    <col style="width: 100px;">
                                    <col style="width: 90px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>No<span class="row-line">|</span></th>
                                    <th>구분<span class="row-line">|</span></th>
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
                                        <td class="w-process"><div class="pBox p5">{{$row['SiteName']}}</div></td>
                                        <td class="w-list tx-left pl20">
                                            <a href="{{front_url($default_path.'/show?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
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
        {!! banner('고객센터_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
@stop