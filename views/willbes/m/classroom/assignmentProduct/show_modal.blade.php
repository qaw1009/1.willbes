@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    온라인첨삭
                </div>
            </div>
        </div>

        <div class="willbes-Txt2">
            채점결과
            <div class="tx12 mt10">- 첨삭과제 학인</div>
        </div>

        <div class="tx14 pd20">{{$data['Title']}}</div>

        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
            <col width="80px"/>
            <col/>
            <tbody>
            <tr class="bgst01">
                <th>점수</th>
                <td>{{$data['ReplyScore']}}</td>
            </tr>
            <tr class="bgst01">
                <th>제출일</th>
                <td>{{$data['RegDatm']}}</td>
            </tr>
            <tr class="bgst01">
                <th>채점일</th>
                <td>{{$data['ReplyRegDatm']}}</td>
            </tr>
            </tbody>
        </table>

        <div class="lineTabs lecListTabs mt50 bdt-gray">
            <ul class="tabWrap lineWrap rowlineWrap lecListWrap three mt-zero">
                <li><a href="javascript:;" id="edit1" class="s_tab {{ ($edit_id == 1) ? 'on' : '' }}" data-active-id="1">과제보기</a><span class="row-line">|</span></li>
                <li><a href="javascript:;" id="edit2" class="s_tab {{ ($edit_id == 2) ? 'on' : '' }}" data-active-id="2">작성답안</a><span class="row-line">|</span></li>
                <li><a href="javascript:;" id="edit3" class="s_tab {{ ($edit_id == 3) ? 'on' : '' }}" data-active-id="3">채점결과</a></li>
            </ul>

            <div id="leclist1" class="tabContent" style="display: none;">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                    @if(empty($data['AttachData']) === false)
                        <tr class="flie">
                            <td class="w-file NGR">
                                @foreach($data['AttachData'] as $row)
                                    <a href="{{front_url('/classroom/assignmentProduct/download?file_idx=').$row['FileIdx'].'&attach_type=0' }}" target="_blank">
                                        <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                @endforeach
                            </td>
                        </tr>
                    @endif
                    <tr class="txt">
                        <td class="w-txt NGR">
                            {!! $data['Content'] !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div id="leclist2" class="tabContent" style="display: none;">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                    @if(empty($data['AttachAssignmentData_User']) === false)
                        <tr class="flie">
                            <td class="w-file NGR">
                                @foreach($data['AttachAssignmentData_User'] as $row)
                                    <a href="{{front_url('/classroom/assignmentProduct/download?file_idx=').$row['FileIdx'].'&attach_type=1' }}" target="_blank">
                                        <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                @endforeach
                            </td>
                        </tr>
                    @endif
                    <tr class="txt">
                        <td class="w-txt NGR">
                            {!! $data['AnswerContent'] !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div id="leclist3" class="tabContent" style="display: none;">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                    @if(empty($data['AttachAssignmentData_User']) === false)
                        <tr class="flie">
                            <td class="w-file NGR">
                                @foreach($data['AttachAssignmentData_User'] as $row)
                                    <a href="{{front_url('/classroom/assignment/download?file_idx=').$row['FileIdx'].'&attach_type=2' }}" target="_blank">
                                        <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                @endforeach
                            </td>
                        </tr>
                    @endif
                    <tr class="txt">
                        <td class="w-txt NGR">
                            {!! $data['ReplyContent'] !!}
                        </td>
                    </tr>
                    <tr class="flie">
                        <td class="w-file NGR">
                            <div class="tx-dark-blue strong">첨삭첨부</div>
                            @if(empty($data['AttachAssignmentData_Admin']) === false)
                                @foreach($data['AttachAssignmentData_Admin'] as $row)
                                    <a href="{{front_url('/classroom/assignment/download?file_idx=').$row['FileIdx'].'&attach_type=0' }}" target="_blank">
                                        <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>

        <div id="Fixbtn" class="Fixbtn one">
            <ul>
                <li class="btn_gray"><a href="javascript:;" onclick="history.back(-1);">목록</a></li>
            </ul>
        </div>
        <!-- Topbtn -->
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var edit_id = '{{$edit_id}}';
            $(function() {
                $('#leclist'+edit_id).css('display', 'block');
                $('ul.tabWrap > li > a').on('click',function () {
                    $('.s_tab').removeClass('on');
                    $('.tabContent').css('display', 'none');
                    $('#edit'+$(this).data("active-id")).addClass('on');
                    $('#leclist'+$(this).data("active-id")).css('display', 'block');
                });
            });

            $('.btn-list-assignment').on('click', function () {
                closeWin('assignmentCreateChoice');
                assignmentBoardModal('{{ $prod_code }}');
            });
        });
    </script>
@stop