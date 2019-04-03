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
            <div class="willbes-AcadInfo c_both">
                <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                    · 학원갤러리
                    <div class="willbes-Lec-Search GM f_right" style="margin: 0;">
                        <div class="inputBox p_re">
                            <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요">
                            <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value)" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="Acad_info mt30">
                    <!-- List -->
                    <div class="willbes-Leclist c_both">
                        <div class="willbes-Lec-Selected tx-gray">
                            @if(empty($arr_base['category']) === false)
                                <select id="s_cate_code" name="s_cate_code" title="카테고리" class="seleCategory" onchange="goUrl('s_cate_code',this.value)" {{--@if($__cfg['SiteCode'] != config_item('app_intg_site_code')) disabled @endif--}}>
                                    <option value="">카테고리</option>
                                    @foreach($arr_base['category'] as $row)
                                        <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if(element('s_cate_code', $arr_input) == $row['CateCode'])selected="selected"@endif>{{$row['CateName']}}</option>
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
                        <div class="LeclistTable orderTable">
                            <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                                <colgroup>
                                    <col style="width: 60px;">
                                    <col>
                                    <col style="width: 80px;">
                                    <col style="width: 80px;">
                                    <col style="width: 90px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>No<span class="row-line">|</span></th>
                                    <th>제목<span class="row-line">|</span></th>
                                    <th>조회수<span class="row-line">|</span></th>
                                    <th>댓글수<span class="row-line">|</span></th>
                                    <th>작성일</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(empty($list))
                                    <tr>
                                        <td class="w-list tx-center" colspan="5">등록된 내용이 없습니다.</td>
                                    </tr>
                                @endif
                                @foreach($list as $row)
                                    @php
                                        if (empty($row['AttachData']) === true) {
                                            $file_total_cnt = 0;
                                            $file_cnt = 0;
                                            $first_files = img_url('sample/evt7.jpg');
                                        } else {
                                            $file_total_cnt = $row['TotalFileCnt'] - 1;
                                            $file_cnt = count($row['AttachData']) - 1;
                                            $first_files = $row['AttachData'][0]['FilePath'] . $row['AttachData'][0]['FileName'];
                                        }
                                    @endphp
                                    <tr>
                                        <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_HOT.gif') }}">@else{{$paging['rownum']}}@endif</td>
                                        <td class="w-thumb p_re">
                                            <div class="thumb_rollover">
                                                <a href="{{front_url($default_path.'/show/?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
                                                    <img src="{{$first_files}}" width="165px" height="105px">
                                                </a>
                                                <a href="#" class="thumb_num"><span>+ {{$file_total_cnt}}</span></a>
                                                <div class="thumb_slide_wrap">
                                                    <ul>
                                                        @if (empty($row['AttachData']) === true)
                                                            <li><a href="{{front_url($default_path.'/show/?board_idx='.$row['BoardIdx'].'&'.$get_params)}}"><img src="{{ img_url('sample/evt8.jpg') }}"></a></li>
                                                        @else
                                                            @php $i = 0;
                                                            foreach ($row['AttachData'] as $attach_row) {
                                                            if($i != 0) {
                                                                echo "<li>
                                                                <a href='".front_url($default_path.'/show/?board_idx='.$row['BoardIdx'].'&'.$get_params)."'>
                                                                    <img src='".$attach_row['FilePath'].$attach_row['FileName']."' width='165px' height='105px'>
                                                                </a>
                                                                </li>";
                                                            }
                                                            $i++;
                                                            } @endphp
                                                        @endif
                                                    </ul>
                                                    <span class="thumb_num_short">{{$file_cnt}}/{{$row['TotalFileCnt']}}</span>
                                                </div>
                                            </div>
                                            <div class="thumb_txt">
                                                <dl class="w-info">
                                                    <dt>{{$row['CampusCcd_Name']}}</dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    <a href="{{front_url($default_path.'/show/?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
                                                        <strong>{{hpSubString($row['Title'],0,50,'...')}}</strong>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="w-click">{{$row['TotalReadCnt']}}</td>
                                        <td class="w-replys">{{$row['TotalCommentCnt']}}</td>
                                        <td class="w-date">{{$row['RegDatm']}}</td>
                                    </tr>
                                    @php $paging['rownum']-- @endphp
                                @endforeach
                                </tbody>
                            </table>
                            {!! $paging['pagination'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! banner('학원안내_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop