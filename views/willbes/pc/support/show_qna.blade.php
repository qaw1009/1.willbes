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

        <div class="willbes-Leclist c_both">
            <div class="LecViewTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black tx-gray">
                    <colgroup>
                        <col style="width: 645px;">
                        <col style="width: 135px;">
                        <col style="width: 160px;">
                    </colgroup>
                    <thead>
                    <tr><th colspan="3" class="w-list tx-left pl20"><strong>{{$data['Title']}}</strong></th></tr>
                    <tr>
                        <td class="w-acad tx-left pl20">
                            <span class="oBox onlineBox NSK">{{$data['SiteGroupName']}}</span>
                            @if(empty($data['CampusCcd_Name']) === false)<span class="oBox nyBox NSK">{{$data['CampusCcd_Name']}}</span>@endif
                            <span class="row-line">|</span>
                        </td>
                        <td class="w-write">
                            {!! $data['RegMemIdx'] == sess_data('mem_idx') ? $data['RegName'] : hpSubString($data['RegName'],0,2,'*') !!}
                            <span class="row-line">|</span>
                        </td>
                        <td class="w-date">{{$data['RegDatm']}}</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="w-file tx-left pl20" colspan="3">
                            @if(empty($data['AttachData']) === false)
                                @foreach($data['AttachData'] as $row)
                                    @if($row['FileType'] == 0)
                                        <a href="{{site_url($default_path.'/qna/download?path=').urlencode($row['FilePath'].$row['FileName']).'&fname='.urlencode($row['RealName']) }}" target="_blank">
                                        <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="w-txt answer tx-left" colspan="3">
                            @if($data['RegType'] == 1)
                                {!! $data['Content'] !!}
                            @else
                                {!! nl2br($data['Content']) !!}
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>

                @if($data['RegType'] == 0)
                    <!-- 답변 -->
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 120px;">
                            <col style="width: 690px;">
                            <col style="width: 160px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <td class="w-answer">
                                <img src="{{ img_url('prof/icon_answer.gif') }}">
                            </td>
                            <td class="w-acad tx-left">
                                @if($data['ReplyStatusCcd'] == '621004')
                                    <span class="aBox answerBox NSK">답변완료</span>
                                @else
                                    <span class="aBox waitBox NSK">답변대기</span>
                                @endif
                            </td>
                            <td class="w-date">{{$data['ReplyRegDatm']}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-file tx-left pl20" colspan="3">
                                @if(empty($data['AttachData']) === false)
                                    @foreach($data['AttachData'] as $row)
                                        @if($row['FileType'] == 1)
                                            <a href="{{site_url($default_path.'/qna/download?path=').urlencode($row['FilePath'].$row['FileName']).'&fname='.urlencode($row['RealName']) }}" target="_blank">
                                                <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="w-txt answer tx-left" colspan="3">
                                @if($data['ReplyStatusCcd'] == '621004')
                                    {!! $data['ReplyContent'] !!}
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @endif
                <div class="search-Btn mt20 h36 p_re">
                    @if($data['RegType'] == 0 && $data['RegMemIdx'] == sess_data('mem_idx') && $data['ReplyStatusCcd'] != $reply_type_complete)
                        <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left" id="btn_del">
                            <a href="#none" class="tx-purple-gray">삭제</a>
                        </div>
                        <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray center" id="btn_modify">
                            <a href="#none" class="tx-purple-gray">수정</a>
                        </div>
                    @endif
                    <div id="btn_list" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                        <a href="#none">목록</a>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        //목록
        $('#btn_list').click(function() {
            location.href = '{!! site_url($default_path.'/qna/index?'.$get_params) !!}';
        });

        //수정
        $('#btn_modify').click(function() {
            location.href = '{!! site_url($default_path.'/qna/create?'.$get_params.'&board_idx='.$board_idx) !!}';
        });

        //삭제
        $('#btn_del').click(function() {
            location.href = '{!! site_url($default_path.'/qna/delete?'.$get_params.'&board_idx='.$board_idx) !!}';
        });
    });
</script>
@stop