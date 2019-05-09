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
                        · 학원강의정보
                    </div>
                    <div class="Acad_info mt30">
                        @if($tab_menu === true)
                        <ul class="tabMock four mb60">
                            <li><a @if($bm_idx=='80')class="on" @endif href="{{ front_url($default_path.'/index/80') }}">강의시간표</a></li>
                            <li><a @if($bm_idx=='82')class="on" @endif href="{{ front_url($default_path.'/index/82') }}">강의실배정표</a></li>
                            <li><a @if($bm_idx=='75')class="on" @endif href="{{ front_url($default_path.'/index/75') }}">휴강/보강공지</a></li>
                            <li><a @if($bm_idx=='78')class="on" @endif href="{{ front_url($default_path.'/index/78') }}">신규강의안내</a></li>
                        </ul>
                        @endif
                        <div class="willbes-Leclist c_both">
                            <div class="willbes-Leclist c_both">
                                <div class="LecViewTable">
                                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 65px;">
                                            <col style="width: 575px;">
                                            <col style="width: 150px;">
                                            <col style="width: 150px;">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th colspan="4" class="w-list tx-left  pl20">
                                                @if($data['IsBest'] == '1')<img src="{{ img_url('prof/icon_HOT.gif') }}" style="marign-right: 5px;">@endif
                                                <strong>{{$data['Title']}}</strong>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td class="w-acad pl20"><span class="oBox campus_{{$data['CampusCcd']}} NSK">{{$data['CampusCcd_Name']}}</span></td>
                                            <td class="w-lec tx-left pl20"></td>
                                            <td class="w-date">{{$data['RegDatm']}}<span class="row-line">|</span></td>
                                            <td class="w-click"><strong>조회수</strong> {{$data['TotalReadCnt']}}</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="w-txt tx-left" colspan="4">
                                                    {!! $data['Content'] !!}
                                                </td>
                                            </tr>
                                            @if(empty($data['AttachData']) === false)
                                                <tr>
                                                    <td class="w-file tx-left pl20" colspan="4">
                                                        @foreach($data['AttachData'] as $row)
                                                            <a href="{{front_url($default_path.'/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                                                <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right">
                                        <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                                            <a href="{{front_url($default_path.'/index/'.$bm_idx.'?'.$get_params)}}"><span>목록</span></a>
                                        </div>
                                    </div>
                                    <table cellspacing="0" cellpadding="0" class="listTable prevnextTable upper-gray bdt-gray bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 150px;">
                                            <col style="width: 640px;">
                                            <col style="width: 150px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="w-prev bg-light-gray"><strong>이전글</strong></td>
                                            <td class="tx-left pl20">
                                                @if(empty($pre_data) === false)
                                                    <a href="{{front_url($default_path.'/show/'.$bm_idx.'?board_idx='.$pre_data['BoardIdx'].'&'.$get_params)}}">{{$pre_data['Title']}}</a><span class="row-line">|</span>
                                                @else
                                                    이전글이 없습니다.
                                                @endif
                                            </td>
                                            <td class="w-date">@if(empty($pre_data) === false){{$pre_data['RegDatm']}}@endif</td>
                                        </tr>
                                        <tr>
                                            <td class="w-next bg-light-gray"><strong>다음글</strong></td>
                                            <td class="tx-left pl20">
                                                @if(empty($next_data) === false)
                                                    <a href="{{front_url($default_path.'/show/'.$bm_idx.'?board_idx='.$next_data['BoardIdx'].'&'.$get_params)}}">{{$next_data['Title']}}</a><span class="row-line">|</span>
                                                @else
                                                    다음글이 없습니다.
                                                @endif
                                            </td>
                                            <td class="w-date">@if(empty($next_data) === false){{$next_data['RegDatm']}}@endif</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- willbes-AcadInfo -->
            </form>
        </div>
        {!! banner('학원안내_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
    <!-- End Container -->
@stop