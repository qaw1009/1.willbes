@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <div class="willbes-CScenter c_both mt40">
        <div class="Act2">
            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
            </form>

            <div class="willbes-Leclist c_both mt40">
                <div class="LecViewTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 145px;">
                            <col style="width: 645px;">
                            <col style="width: 135px;">
                            <col style="width: 160px;">
                        </colgroup>
                        <thead>
                        <tr><th colspan="4" class="w-list tx-left pl20"><strong>{{$data['Title']}}</strong></th></tr>
                        <tr>
                            <td class="w-acad tx-left pl20">
                                <span class="oBox onlineBox NSK">{{$data['SiteGroupName']}}</span>
                                @if(empty($data['CampusCcd_Name']) === false)<span class="oBox nyBox NSK">{{$data['CampusCcd_Name']}}</span>@endif
                                <span class="row-line">|</span>
                            </td>
                            <td class="w-acad tx-left pl20">
                                @foreach($arr_base['category'] as $row)
                                    @if($data['Category_String'] == $row['CateCode']){{$row['CateName']}}@endif
                                @endforeach
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
                            <td class="w-file tx-left pl20" colspan="4">
                                @if(empty($data['AttachData']) === false)
                                    @foreach($data['AttachData'] as $row)
                                        @if($row['FileType'] == 0)
                                            <a href="{{front_url($default_path.'/download?path=').urlencode($row['FilePath'].$row['FileName']).'&fname='.urlencode($row['RealName']).'&board_idx='.$board_idx }}" target="_blank">
                                                <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="w-txt answer tx-left" colspan="4">
                                @if($data['RegType'] == 1)
                                    {!! $data['Content'] !!}
                                @else
                                    {!! nl2br($data['Content']) !!}
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>

                @if($data['RegType'] == 0 && $data['ReplyStatusCcd'] == $reply_type_complete)
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
                                <td class="w-file tx-left pl20" colspan="4">
                                    @if(empty($data['AttachData']) === false)
                                        @foreach($data['AttachData'] as $row)
                                            @if($row['FileType'] == 1)
                                                <a href="{{front_url($default_path.'/download?path=').urlencode($row['FilePath'].$row['FileName']).'&fname='.urlencode($row['RealName']).'&board_idx='.$board_idx }}" target="_blank">
                                                    <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="w-txt answer tx-left" colspan="4">
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
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            //목록
            $('#btn_list').click(function() {
                location.href = '{!! front_url($default_path.'/index?'.$get_params) !!}';
            });

            //수정
            $('#btn_modify').click(function() {
                location.href = '{!! front_url($default_path.'/create?'.$get_params.'&board_idx='.$board_idx) !!}';
            });

            //삭제
            $('#btn_del').click(function() {
                location.href = '{!! front_url($default_path.'/delete?'.$get_params.'&board_idx='.$board_idx) !!}';
            });
        });
    </script>
@stop