@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
        · 공지사항
    </div>
    <div class="willbes-CScenter c_both">
        <div class="Act2">
            <!-- List -->
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
                                        <a href="{{front_url($default_path.'/notice/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                            <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="search-Btn mt20 mb20 h36 p_re">
                        <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                            <a href="{{front_url($default_path.'/notice/index?'.$get_params)}}">목록</a>
                        </div>
                    </div>

                    @if($data['IsBest'] != '1')
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
                                        <a href="{{front_url($default_path.'/notice/show?board_idx='.$pre_data['BoardIdx'].'&'.$get_params)}}">{{$pre_data['Title']}}</a><span class="row-line">|</span>
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
                                        <a href="{{front_url($default_path.'/notice/show?board_idx='.$next_data['BoardIdx'].'&'.$get_params)}}">{{$next_data['Title']}}</a><span class="row-line">|</span>
                                    @else
                                        다음글이 없습니다.
                                    @endif
                                </td>
                                <td class="w-date">@if(empty($next_data) === false){{$next_data['RegDatm']}}@endif</td>
                            </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
