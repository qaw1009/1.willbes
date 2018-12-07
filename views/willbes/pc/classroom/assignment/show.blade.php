@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<div id="MARKPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox1100 h920 fix" style="display: block">
    <a class="closeBtn" href="#none" onclick="closeWin('MARKPASS')">
        <img src="{{ img_url('sub/close.png') }}">
    </a>
    <div class="Layer-Tit NG tx-dark-black">채점결과</div>
    <div class="Layer-Cont">
        <div class="PASSZONE-Lec-Section">
            <div class="LeclistTable editTableList mt20">
                <table cellspacing="0" cellpadding="0" class="listTable editTable bdt-gray bdb-gray upper-gray fc-bd-none tx-gray">
                    <colgroup>
                        <col style="width: 115px;">
                        <col style="width: 235px;">
                        <col style="width: 115px;">
                        <col style="width: 235px;">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th class="w-tit bg-light-white strong">과제제목</th>
                        <td class="w-data tx-left tx-gray pl15" colspan="3">{{$data['Title']}}</td>
                    </tr>
                    <tr>
                        <th class="w-tit bg-light-white strong">첨삭교수</th>
                        <td class="w-data tx-left pl15">{{$data['ProfName']}}</td>
                        <th class="w-tit bg-light-white strong">채점완료일</th>
                        <td class="w-data tx-left pl15">{{$data['am_ReplyRegDatm']}}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="editDetailWrap p_re mt30 mb60">
                    <ul class="tabWrap tabDepth2">
                        <li><a id="edit1" href="#ch1">과제보기</a></li>
                        <li><a id="edit2" href="#ch2">작성답안</a></li>
                        <li><a id="edit3" href="#ch3">채점결과</a></li>
                    </ul>
                    <div class="tabBox mt30">
                        <div id="ch1" class="tabLink">
                            <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                                <colgroup>
                                    <col style="width: 100%;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="w-file tx-left pt-zero pb-zero">
                                        <ul class="up-file">
                                            @if(empty($data['AttachData']) === false)
                                                @foreach($data['AttachData'] as $row)
                                                <li>
                                                    <a href="{{front_url('/classroom/assignment/download?path=').urlencode($row['FilePath'].$row['FileName']).'&fname='.urlencode($row['RealName']).'&board_idx='.$board_idx.'&attach_type=0' }}" target="_blank">
                                                        <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                                </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-file tx-left pt20 pl30 pr30">
                                        {!! $data['Content'] !!}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="ch2" class="tabLink">
                            <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 550px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th class="w-list tx-left pl30"><strong>{{$data['am_Title']}}</strong><span class="row-line">|</span></th>
                                    <th class="w-date normal">{{$data['am_RegDatm']}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="w-file tx-left pt-zero pb-zero" colspan="2">
                                        <ul class="up-file">
                                            @if(empty($data['AttachAssignmentData_User']) === false)
                                                @foreach($data['AttachAssignmentData_User'] as $row)
                                                    <li>
                                                        <a href="{{front_url('/classroom/assignment/download?path=').urlencode($row['FilePath'].$row['FileName']).'&fname='.urlencode($row['RealName']).'&board_idx='.$board_idx.'&attach_type=1' }}" target="_blank">
                                                            <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-file tx-left pt20 pl30 pr30" colspan="2">
                                        {!! $data['am_MemContent'] !!}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="ch3" class="tabLink">
                            <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 550px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th class="w-list tx-left pl30"><strong>{{$data['am_Title']}}</strong><span class="row-line">|</span></th>
                                    <th class="w-date normal">{{$data['am_ReplyRegDatm']}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="w-file tx-left pt-zero pb-zero" colspan="2">
                                        <ul class="up-file">
                                            @if(empty($data['AttachAssignmentData_User']) === false)
                                                @foreach($data['AttachAssignmentData_User'] as $row)
                                                    <li>
                                                        <a href="{{front_url('/classroom/assignment/download?path=').urlencode($row['FilePath'].$row['FileName']).'&fname='.urlencode($row['RealName']).'&board_idx='.$board_idx.'&attach_type=2' }}" target="_blank">
                                                            <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-file tx-left pt20 pl30 pr30" colspan="2">
                                        {!! $data['am_ReplyContent'] !!}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdb-gray tx-gray fc-bd-none">
                                <colgroup>
                                    <col style="width: 115px;">
                                    <col style="width: 585px;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <th class="w-tit bg-light-white strong">첨삭첨부</th>
                                    <td class="w-file tx-left pt-zero pb-zero">
                                        <ul class="up-file">
                                            @if(empty($data['AttachAssignmentData_Admin']) === false)
                                                @foreach($data['AttachAssignmentData_Admin'] as $row)
                                                    <li>
                                                        <a href="{{front_url('/classroom/assignment/download?path=').urlencode($row['FilePath'].$row['FileName']).'&fname='.urlencode($row['RealName']).'&board_idx='.$board_idx.'&attach_type=0' }}" target="_blank">
                                                            <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    var tab_id = '{{$show_tab}}';
    var content_id = '{{$show_content}}';

    $(function() {
        $('ul.tabWrap').find('#' + tab_id).click();
        $('#'+content_id).show().css('display', 'block');
    });
});
</script>

@stop