@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>

        <div class="Content p_re">
            <div class="willbes-Mocktest INFOZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 모의고사
                </div>
            </div>

            <div class="willbes-Mypage-Tabs mt10">
                <ul class="tabMock three">
                    @include('willbes.pc.site.mocktest.tab_menu_partial')
                </ul>
                <div class="LeclistTable">
                    <div class="willbes-Mock-Subject NG">
                        · 이의제기
                        <div class="subBtn mock black f_right"><a href="{{front_url('/mockTest/board/cate/'.$__cfg['CateCode'])}}">전체 모의고사 목록</a></div>
                    </div>
                    <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 150px;">
                            <col style="width: 610px;">
                            <col style="width: 180px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>응시분야<span class="row-line">|</span></th>
                            <th>모의고사명<span class="row-line">|</span></th>
                            <th>이의제기</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-type">{{$prod_data['CateName']}}</td>
                            <td class="w-list tx-left pl20">{{$prod_data['ProdName']}}</td>
                            <td class="w-graph">{{$prod_data['qnaTotalCnt']}} 개</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="willbes-Leclist mt60 c_both">
                    <div class="LecViewTable">
                        <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black tx-gray">
                            <colgroup>
                                <col style="width: 780px;">
                                <col style="width: 160px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th class="w-list tx-left pl20"><strong>{{$board_data['Title']}}</strong><span class="row-line">|</span></th>
                                <th class="w-date">{{$board_data['RegDatm']}}</th>
                            </tr>
                            @if ($board_data['RegType'] == '0')
                            <tr>
                                <td class="w-process tx-left pl20">{{$prod_data['TakeMockPart_Name']}}<span class="row-line">|</span></td>
                                <td class="w-write">{!! $board_data['RegMemIdx'] == sess_data('mem_idx') ? $board_data['RegName'] : hpSubString($board_data['RegName'],0,2,'*') !!}<span class="row-line">|</span></td>
                            </tr>
                            @endif
                            </thead>
                            <tbody>
                            <tr>
                                <td class="w-file tx-left pl20" colspan="3">
                                    {{--<a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                    <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>--}}
                                    @if(empty($board_data['AttachData']) === false)
                                        @foreach($board_data['AttachData'] as $row)
                                            @if($row['FileType'] == 0)
                                                <a href="{{front_url('/mockTest/boardFileDownload?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                                    <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="w-txt answer tx-left" colspan="3">
                                    @if($board_data['RegType'] == 1)
                                        {!! $board_data['Content'] !!}
                                    @else
                                        {!! nl2br($board_data['Content']) !!}
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    @if($board_data['RegType'] == 0 && $board_data['ReplyStatusCcd'] == $reply_type_complete)
                        <!-- 답변 -->
                        <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdb-gray tx-gray">
                            <colgroup>
                                <col style="width: 90px;">
                                <col style="width: 690px;">
                                <col style="width: 160px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <td class="w-answer">
                                    {{--<img src="{{ img_url('prof/icon_answer.gif') }}">--}}
                                    @if($board_data['ReplyStatusCcd'] == '621004')
                                        <span class="aBox answerBox NSK">답변완료</span>
                                    @else
                                        <span class="aBox waitBox NSK">답변대기</span>
                                    @endif
                                </td>
                                <td>&nbsp;<span class="row-line">|</span></td>
                                <td class="w-date">{{$board_data['ReplyRegDatm']}}</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="w-file tx-left pl20" colspan="3">
                                    @if(empty($board_data['AttachData']) === false)
                                        @foreach($board_data['AttachData'] as $row)
                                            @if($row['FileType'] == 1)
                                                <a href="{{front_url('/mockTest/boardFileDownload?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                                    <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="w-txt answer tx-left" colspan="3">
                                    @if($board_data['ReplyStatusCcd'] == '621004')
                                        {!! $board_data['ReplyContent'] !!}
                                    @endif
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    @endif
                        <div class="search-Btn mt20 h36 p_re">
                            @if($board_data['RegType'] == 0 && $board_data['RegMemIdx'] == sess_data('mem_idx') && $board_data['ReplyStatusCcd'] != $reply_type_complete)
                                <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left" id="btn_del">
                                    <a href="#none" class="tx-purple-gray">삭제</a>
                                </div>
                                <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray center" id="btn_modify">
                                    <a href="#none" class="tx-purple-gray">수정</a>
                                </div>
                            @endif
                            <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right" id="btn_list">
                                <a href="#none">목록</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            //목록
            $('#btn_list').click(function() {
                location.href = '{!! front_url('/mockTest/listQna/cate/'.$__cfg['CateCode'].'?'.$get_params) !!}';
            });

            //수정
            $('#btn_modify').click(function() {
                location.href = '{!! front_url('/mockTest/createQna/cate/'.$__cfg['CateCode'].'?'.$get_params.'&board_idx='.$board_idx) !!}';
            });

            //삭제
            $('#btn_del').click(function() {
                if (!confirm('삭제하시겠습니까?')) { return true; }
                location.href = '{!! front_url('/mockTest/deleteQna/cate/'.$__cfg['CateCode'].'?'.$get_params.'&board_idx='.$board_idx) !!}';
            });
        });
    </script>
@stop