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
                                @if(empty($arr_base['category']) === false)
                                    <select id="s_cate_code" name="s_cate_code" title="카테고리" class="seleCategory" onchange="goUrl('s_cate_code',this.value)" @if(empty(element('s_cate_code_disabled', $arr_input)) == false && element('s_cate_code_disabled', $arr_input) == 'Y') disabled @endif>
                                        <option value="">카테고리</option>
                                        @php $temp_s_cate_code = ''; @endphp
                                        @foreach($arr_base['category'] as $row)
                                            <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if(element('s_cate_code', $arr_input) == $row['CateCode'])selected="selected"@endif @if(empty($row['ChildCnt']) === false && $row['ChildCnt'] > 0) disabled @endif>{{$row['CateNameRoute']}}</option>
                                            @php if(element('s_cate_code', $arr_input) == $row['CateCode']) $temp_s_cate_code = $row['CateCode']; @endphp
                                        @endforeach
                                    </select>
                                    @if(empty(element('s_cate_code_disabled', $arr_input)) == false && element('s_cate_code_disabled', $arr_input) == 'Y')
                                        <input type="hidden" name="s_cate_code" value="{{$temp_s_cate_code}}">
                                    @endif
                                @endif
                                @if(empty($arr_base['campus']) === false)
                                    <select id="s_campus" name="s_campus" title="campus" class="seleCampus {{$arr_swich['campus'] or ''}}" onchange="goUrl('s_campus',this.value)">
                                        <option value="">캠퍼스</option>
                                        @foreach($arr_base['campus'] as $row)
                                            <option value="{{$row['CampusCcd']}}" @if(element('s_campus',$arr_input) == $row['CampusCcd']) selected @endif>{{$row['CcdName']}}</option>
                                        @endforeach
                                    </select>
                                @endif
                                @if(empty($arr_base['subject']) === false)
                                    <select id="subject_idx" name="subject_idx" title="과목" class="seleLecA {{$arr_swich['subject'] or 'd_none'}}" onchange="goUrl('subject_idx',this.value)" @if(empty(element('s_cate_code', $arr_input)) === true) disabled @endif>
                                        <option value="">과목</option>
                                        @foreach($arr_base['subject'] as $key => $val)
                                            <option value="{{$key}}" @if(element('subject_idx', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
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
                            @if(empty($arr_swich['create_btn']) === false)
                                <div class="f_right">
                                    <div class="subBtn blue NSK f_right"><a href="{{front_url($default_path.'/create?'.$get_params)}}">등록하기 ></a></div>
                                </div>
                            @endif
                        </div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    @if(empty($arr_swich['arr_table_width']) === false)
                                        @foreach($arr_swich['arr_table_width'] as $width)
                                            <col style="width: {{$width}}px;">
                                        @endforeach
                                    @else
                                        <col style="width: 65px;">
                                        @if($__cfg['CampusCcdArr'] != 'N')<col style="width: 110px;">@endif
                                        <col style="width: 445px;">
                                        <col style="width: 65px;">
                                        <col style="width: 100px;">
                                        <col style="width: 90px;">
                                    @endif
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>No<span class="row-line">|</span></th>
                                    <th class="{{$arr_swich['subject'] or 'd_none'}}">과목<span class="row-line">|</span></th>
                                    @if($__cfg['CampusCcdArr'] != 'N')<th class="{{$arr_swich['campus'] or ''}}">캠퍼스<span class="row-line">|</span></th>@endif
                                    <th>제목<span class="row-line">|</span></th>
                                    <th>첨부<span class="row-line">|</span></th>
                                    <th class="{{$arr_swich['name'] or 'd_none'}}">작성자<span class="row-line">|</span></th>
                                    <th>작성일<span class="row-line">|</span></th>
                                    <th>조회수</th>
                                </tr>

                                </thead>
                                <tbody>
                                @if(empty($list))
                                    <tr>
                                        <td class="w-list tx-center" colspan="{{ empty($arr_swich['arr_table_width']) === false ? count($arr_swich['arr_table_width']) : '6' }}">등록된 내용이 없습니다.</td>
                                    </tr>
                                @endif
                                @foreach($list as $row)
                                    <tr>
                                        <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_HOT.gif') }}">@else{{$paging['rownum']}}@endif</td>
                                        @if(empty($arr_swich['subject']) === false)
                                            <td>{{ $row['SubJectName'] or '' }}</td>
                                        @endif
                                        @if($__cfg['CampusCcdArr'] != 'N')<td class="{{$arr_swich['campus'] or ''}}"><span class="oBox campus_{{$row['CampusCcd']}} NSK">{{$row['CampusCcd_Name']}}</span></td>@endif
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
                                        <td class="{{$arr_swich['name'] or 'd_none'}}">{!! (empty(sess_data('mem_idx')) === false && $row['RegMemIdx'] == sess_data('mem_idx')) ? $row['RegName'] : hpSubString($row['RegName'],0,2,'*') !!}</td>
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
    </div>
    <!-- End Container -->
@stop