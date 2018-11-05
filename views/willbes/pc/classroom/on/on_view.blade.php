@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-Mypage-PASSZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 수강중인 강좌
                </div>
                <div class="willbes-Prof-Mypage NG tx-black">
                    <div class="prof-profile p_re">
                        <div class="Name">
                            <strong>{{$lec['wProfName']}}</strong><br>
                            교수님
                        </div>
                        <div class="ProfImg">
                            <img src="{{ $lec['ProfReferData']['lec_list_img'] or '' }}">
                            <!-- img src="/public/img/willbes/sample/prof2-1.png" -->
                        </div>
                        <div class="prof-home subBtn NSK"><a target="_blank" href="//{{$lec['SiteUrl']}}/professor/show/cate/{{$lec['CateCode']}}/prof-idx/{{$lec['ProfIdx']}}/?subject_idx={{$lec['SubjectIdx']}}&subject_name={{rawurlencode($lec['SubjectName'])}}"><img src="/public/img/willbes/sub/icon_profhome.gif" style="margin-top: -4px; margin-right: 4px">교수홈</a></div>
                    </div>
                    <div class="lec-profile p_re">
                        <div class="w-tit">{{$lec['subProdName']}}</div>
                        <dl class="w-info tx-dark-gray">
                            <dt class="NSK ml10">
                                <span class="nBox n1">{{$lec['MultipleApply'] == '1' ? '무제한' : $lec['MultipleApply'].'배수' }}</span>
                                <span class="nBox n{{ substr($lec['wLectureProgressCcd'], -1)+1 }}">{{$lec['wLectureProgressCcdName']}}</span>
                            </dt>
                        </dl>
                        <div class="Prof-MypageBox pt15 c_both">
                            <table cellspacing="0" cellpadding="0" class="ProfmypageTable">
                                <colgroup>
                                    <col style="width: 145px;"/>
                                    <col style="width: 105px;"/>
                                    <col style="width: 125px;"/>
                                    <col style="width: 100px;"/>
                                    <col style="width: 165px;"/>
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="w-lectit">최근수강강의</div>
                                        <div class="w-lec NGEB">{{ $lec['lastStudyInfo'] == '' ? '학습이력없음' : $lec['lastStudyInfo'] }}</div>
                                        <div class="w-date tx-gray">(수강일 : {{ $lec['lastStudyDate'] == '' ? '학습이력없음' : $lec['lastStudyDate'] }})</div>
                                    </td>
                                    <td>
                                        <div class="w-lectit">진도율</div>
                                        <div class="w-lec NGEB">{{$lec['StudyRate']}}%</div>
                                        <div class="w-date tx-gray">(수강시간기준)</div>
                                    </td>
                                    <td>
                                        <div class="w-lectit">일시정지</div>
                                        <div class="w-lec NGEB"><span class="tx-light-blue">{{$lec['PauseCount']}}</span>회</div>
                                        <div class="w-date tx-gray">@if($lec['ispause'] == 'Y')({{str_replace('-', '.', $lec['lastPauseStartDate']) }}~{{str_replace('-', '.', $lec['lastPauseEndDate'])}})@else&nbsp;@endif</div>
                                    </td>
                                    <td>
                                        <div class="w-lectit">수강연장</div>
                                        <div class="w-lec NGEB"><span class="tx-light-blue">{{$lec['ExtenCount']}}</span>회</div>
                                        <div class="w-date tx-gray">&nbsp;
<!--                                            <div class="w-btn">
                                                <a class="bg-blue bd-dark-blue NSK" href="#none" onclick="">신청</a>
                                            </div> -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-lectit">잔여기간</div>
                                        <div class="w-lec NGEB"><span class="tx-light-blue">
                                                @if(empty($lec['lastPauseEndDate']) == true)
                                                    {{ intval(strtotime($lec['RealLecEndDate']) - strtotime(date("Y-m-d", time())))/86400 +1 }}
                                                @elseif(strtotime($lec['lastPauseEndDate']) >= date("Y-m-d", time()))
                                                    {{ intval(strtotime($lec['RealLecEndDate']) - strtotime($lec['lastPauseEndDate']))/86400 }}
                                                @else
                                                    {{ intval(strtotime($lec['RealLecEndDate']) - strtotime(date("Y-m-d", time())))/86400 +1 }}
                                                @endif
                                            </span>일/ {{$lec['RealLecExpireDay']}}일</div>
                                        <div class="w-date tx-gray">({{str_replace('-', '.', $lec['LecStartDate'])}}~{{str_replace('-', '.', $lec['RealLecEndDate'])}})</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="Mypage-PASSZONE-Btn">
                    <ul>
                        <li class="subBtn blue NSK"><a href="#none">수강후기 작성하기 ></a></li>
                        <li class="subBtn NSK"><a target="_blank" href="//{{$lec['SiteUrl']}}/professor/show/cate/{{$lec['CateCode']}}/prof-idx/{{$lec['ProfIdx']}}/?subject_idx={{$lec['SubjectIdx']}}&subject_name={{rawurlencode($lec['SubjectName'])}}&tab=qna">학습 Q&A</a></li>
                    </ul>
                    <div class="aBox passBox answerBox_block NSK f_right"><a href="#none">교재구매</a></div>
                </div>
            </div>
            <!-- willbes-Mypage-PASSZONE -->

            <div class="willbes-Leclist c_both mt40">
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
                        <colgroup>
                            <col style="width: 80px;">
                            <col style="width: 200px;">
                            <col style="width: 90px;">
                            <col style="width: 90px;">
                            <col style="width: 120px;">
                            <col style="width: 100px;">
                            <col style="width: 155px;">
                            <col style="width: 105px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></li></th>
                            <th>강의명<span class="row-line">|</span></li></th>
                            <th>북페이지<span class="row-line">|</span></li></th>
                            <th>자료<span class="row-line">|</span></li></th>
                            <th>강의수강<span class="row-line">|</span></li></th>
                            <th>강의시간<span class="row-line">|</span></li></th>
                            <th>수강시간/배수시간<span class="row-line">|</span></li></th>
                            <th>잔여시간</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($curriculum as $row)
                            <tr>
                                <td class="w-no">{{$row['wUnitNum']}}회 {{$row['wUnitLectureNum']}}강</td>
                                <td class="w-lec">{{$row['wUnitName']}}</td>
                                <td class="w-page">{{$row['wBookPage']}}</td>
                                <td class="w-file">
                                    @if(empty($row['wUnitAttachFile']) == false)
                                        <a href="/classroom/on/download/{{$row['OrderIdx']}}/{{$row['ProdCode']}}/{{$row['ProdCodeSub']}}/{{$row['wLecIdx']}}/{{$row['wUnitIdx']}}"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                    @endif
                                </td>
                                <td class="w-free mypage">
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
                                </td>
                                <td class="w-lec-time">{{$row['wRuntime']}}분</td>
                                <td class="w-study-time">{{floor(intval($row['RealStudyTime'])/60)}}분 / {{$row['limittime']}}</td>
                                <td class="w-r-time">{{$row['remaintime']}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="w-no">개설된 강좌 목록이 없습니다.</td>
                            </tr>
                        @endforelse
                        <!--
                        <tr>
                            <td class="w-no">2강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-page">5p~15p</td>
                            <td class="w-file">
                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                            </td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-lec-time">40분</td>
                            <td class="w-study-time">10분/ 100분</td>
                            <td class="w-r-time">40분</td>
                        </tr>
                        <tr>
                            <td class="w-no">3강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-page">25p~30p</td>
                            <td class="w-file">
                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                            </td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-lec-time">30분</td>
                            <td class="w-study-time">90분/ 100분</td>
                            <td class="w-r-time">30분</td>
                        </tr>
                        <tr>
                            <td class="w-no">4강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-page">40p~70p</td>
                            <td class="w-file">
                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                            </td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-lec-time">20분</td>
                            <td class="w-study-time">70분/ 100분</td>
                            <td class="w-r-time">20분</td>
                        </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Leclist -->

        </div>
        {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <script src="/public/js/willbes/player.js?ver={{time()}}"></script>

@stop