@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Mypage-Tabs">
                <div class="LeclistTable bdt-gray mb30 c_both">
                    <table class="listTable passTable-Select under-gray tx-gray">
                        <colgroup>
                            <col style="width: 20%;">
                            <col style="width: 30%;">
                            <col style="width: 20%;">
                            <col style="width: 30%;">
                        </colgroup>
                        </tbody>
                        <tr>
                            <th>과목</th>
                            <td>{{$lec['SubjectName']}}</td>
                            <th>강사명</th>
                            <td>{{$lec['wProfName']}}</td>
                        </tr>
                        <tr>
                            <th>강좌명</th>
                            <td colspan="3" class="tx-blue">{{$lec['subProdName']}}</td>
                        </tr>
                        <tr>
                            <th>수강기간</th>
                            <td>{{str_replace('-', '.', $lec['LecStartDate'])}}~{{str_replace('-', '.', $lec['RealLecEndDate'])}}</td>
                            <th>잔여일</th>
                            <td>{{$lec['remainDays']}}일</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                @if($lec['wControlCountUse'] > 0)
                    <div class="willbes-Leclist-txt c_both mt40">
                        <p>※ 해당 강좌는 회차별 자료 인쇄 제한이 있는 강좌 입니다.<br>
                            샘플파일로 프린터 연결상태, 설정(용지크기)등을 확인 후 출력하시기 바랍니다.<br>
                            인쇄 제한이 있는 파일 인쇄시 안될 경우 파일 > 인쇄 > 왼쪽 하단 이미지로 인쇄 체크후 인쇄해 주세요.</p>
                        <a href="javascript:;" onclick="pdfSample();">샘플 인쇄</a>
                    </div>
                @endif

                <div class="c_both mt40 tx-right"><a href="javascript:history.go(-1);" class="bdb-dark-gray pb5">다른 수강강좌 보기 →</a></div>

                <div class="willbes-Leclist c_both mt40">
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
                            <colgroup>
                                <col style="width: 80px;">
                                <col style="width: 380px;">
                                <col style="width: 90px;">
                                <col style="width: 50px;">
                                @if($lec['wControlCountUse'] > 0) <col style="width: 90px;"> @endif
                                <col style="width: 80px;">
                                <col style="width: 70px;">
                                <col style="width: 120px;">
                                <col style="width: 70px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></th>
                                <th>강의명<span class="row-line">|</span></th>
                                <th>북페이지<span class="row-line">|</span></th>
                                <th>자료<span class="row-line">|</span></th>
                                @if($lec['wControlCountUse'] > 0) <th>자료 인쇄<span class="row-line">|</span></th> @endif
                                <th>강의수강<span class="row-line">|</span></th>
                                <th>강의시간<span class="row-line">|</span></th>
                                <th>수강시간/배수시간<span class="row-line">|</span></th>
                                <th>잔여시간</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($curriculum as $row)
                                <tr @if($row['StudyTime'] > 0)
                                    class="finish"
                                        @endif>
                                    <td class="w-no">
                                        {{-- 경찰 온/오프 회차 표기 안함 --}}
                                        @if($lec['SiteCode'] != '2001' && $lec['SiteCode'] != '2002')
                                            @if($lec['IsOpenwUnitNum'] == 'Y')
                                                {{$row['wUnitNum']}}회
                                            @endif
                                        @endif
                                        {{$row['wUnitLectureNum']}}강</td>
                                    <td class="w-lec tx-left">
                                        {{$row['wUnitName']}}
                                        @if(empty($row['wUnitInfo']) == false)<p>[설명] {{$row['wUnitInfo']}}</p>@endif
                                    </td>
                                    <td class="w-page">{{$row['wBookPage']}}</td>
                                    <td class="w-file">
                                        @if(empty($row['wUnitAttachFile']) == false)
                                            @if($row['wControlCount'] > 0)
                                                {{-- 파일 인쇄 카운트 관리 --}}
                                                <a href="javascript:;" onclick="ezPrint('/{{$row['OrderIdx']}}/{{$row['ProdCode']}}/{{$row['ProdCodeSub']}}/{{$row['wLecIdx']}}/{{$row['wUnitIdx']}}/{{sess_data('mem_idx')}}/{{$row['wUnitIdx']}}/')">
                                                    @if($row['downcount'] > 0)
                                                        <img src="{{ img_url('prof/icon_down.png') }}">
                                                    @else
                                                        <img src="{{ img_url('prof/icon_file.gif') }}">
                                                    @endif
                                                </a>
                                            @else
                                                {{-- 일반 다운로드 --}}
                                                <a href="/classroom/on/download/{{$row['OrderIdx']}}/{{$row['ProdCode']}}/{{$row['ProdCodeSub']}}/{{$row['wLecIdx']}}/{{$row['wUnitIdx']}}">
                                                    @if($row['downcount'] > 0)
                                                        <img src="{{ img_url('prof/icon_down.png') }}">
                                                    @else
                                                        <img src="{{ img_url('prof/icon_file.gif') }}">
                                                    @endif
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                    @if($lec['wControlCountUse'] > 0)
                                        <td class="w-free mypage">
                                            @if($row['wControlCount'] != 0)
                                                {{$row['wControlCount']}}회 출력중 <br/> {{$row['downcount']}}회 사용 @if($row['wControlCount'] == $row['downcount'])<br/>(출력종료)@endif
                                            @endif
                                        </td>
                                    @endif
                                    <td class="w-free mypage">
                                        @if($lec['canWeekView'] == false)
                                            <div class="tBox NSK t1 black"><a>직장인반</a></div>
                                        @elseif($lec['isBtob'] == 'Y' && $lec['enableIp'] == 'N')
                                            <div class="tBox NSK t1 black"><a>수강불가</a></div>
                                        @else
                                            @if($row['isstart'] == 'Y' && $row['ispause'] == 'N')
                                                @if($row['timeover'] == 'N')
                                                    @if($row['wWD'] != '')<div class="tBox NSK t3 white"><a href="javascript:;" onclick='fnPlayer("{{$row['OrderIdx']}}","{{$row['ProdCode']}}","{{$row['ProdCodeSub']}}","{{$row['wLecIdx']}}","{{$row['wUnitIdx']}}","WD");' >WIDE</a></div>@endif
                                                    @if($row['wHD'] != '')<div class="tBox NSK t1 black"><a href="javascript:;" onclick='fnPlayer("{{$row['OrderIdx']}}","{{$row['ProdCode']}}","{{$row['ProdCodeSub']}}","{{$row['wLecIdx']}}","{{$row['wUnitIdx']}}","HD");' >HIGH</a></div>@endif
                                                    @if($row['wSD'] != '')<div class="tBox NSK t2 gray"><a href="javascript:;" onclick='fnPlayer("{{$row['OrderIdx']}}","{{$row['ProdCode']}}","{{$row['ProdCodeSub']}}","{{$row['wLecIdx']}}","{{$row['wUnitIdx']}}","SD");' >LOW</a></div>@endif
                                                @else
                                                    <div class="tBox NSK t1 black"><a>시간초과</a></div>
                                                @endif
                                            @elseif($row['ispause'] == 'Y')
                                                <div class="tBox NSK t1 black"><a>일시중지</a></div>
                                            @else
                                                <div class="tBox NSK t1 black"><a>수강대기</a></div>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="w-lec-time">{{$row['wRuntime']}}분</td>
                                    <td class="w-study-time" title="{{floor(intval($row['RealStudyTime'])/60)}}분 {{floor(intval($row['RealStudyTime'])%60)}}초">{{floor(intval($row['RealStudyTime'])/60)}}분 / {{$row['limittime']}}</td>
                                    <td class="w-r-time">{{$row['remaintime']}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="w-no">개설된 강좌 목록이 없습니다.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <script>
        $(document).ready(function() {

        });

        function ezPrint(param)
        {
            var url = '{{front_url('classroom/on/downloadPopup')}}'+param;
            popupOpen(url, 'pdfdown', 800, 500, null, null, 'no', 'no');
        }

        function pdfSample()
        {
            popupOpen('{{front_url('classroom/on/downloadPopup/o/p/ps/l/u/SAMPLE/t')}}', 'pdfdown', 800, 500, null, null, 'no', 'no');
        }

    </script>
@stop