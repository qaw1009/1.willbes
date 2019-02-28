@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer">
        <div class="widthAuto c_both">
            @include('willbes.pc.layouts.partial.site_tab_menu')
            <div class="Depth">
                @include('willbes.pc.layouts.partial.site_route_path')
            </div>
        </div>

        <div class="ActIndex MainVisual widthAutoFull">
            <div class="widthAuto p_re">
                <div class="Content p_re">
                    <div class="will-main-Tit NSK">
                        든든한 학습 파트너, <div class="tx-light-blue">윌비스 통합 고객센터</div>
                        <div class="NSK-Thin">학습에 궁금한 점이 있으신가요?<br/>이렇게 순서대로 진행해서 해결하세요.</div>
                    </div>
                    <div class="centerList NG">
                        <ul>
                            <li>
                                <a href="{{front_url('/support/notice/index')}}">
                                    <div class="nStep">STEP1</div>
                                    <img src="{{ img_url('cs/icon_center1_n.png') }}">
                                    <div class="nTxt">고객센터<br/>공지사항</div>
                                </a>
                            </li>
                            <li class="arrow"><img src="{{ img_url('cs/icon_cs_arrow_n.png') }}"></li>
                            <li>
                                <a href="{{front_url('/support/faq/index')}}">  
                                    <div class="nStep">STEP2</div>
                                    <img src="{{ img_url('cs/icon_center2_n.png') }}">
                                    <div class="nTxt">자주하는<br/>질문검색</div>
                                </a>
                            </li>
                            <li class="arrow"><img src="{{ img_url('cs/icon_cs_arrow_n.png') }}"></li>
                            <li>
                                <a href="{{front_url('/support/qna/index')}}">
                                    <div class="nStep">STEP3</div>
                                    <img src="{{ img_url('cs/icon_center3_n.png') }}">
                                    <div class="nTxt">1:1 문의하기<br/>서비스</div>
                                </a>
                            </li>
                            <li class="arrow"><img src="{{ img_url('cs/icon_cs_arrow_n.png') }}"></li>
                            <li>
                                <div class="nStep">STEP4</div>
                                <img src="{{ img_url('cs/icon_center4_n.png') }}">
                                <div class="nTxt">상담원과<br/>전화상담</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="Quick-Top">
                    {!! banner('고객센터_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
                </div>
            </div>
        </div>
        <div class="widthAuto">
            <div class="Content p_re">
                <div class="willbes-CScenter c_both">
                    <div class="ActIndex ActIndex1 mt50">
                        <div class="p_re">
                            <div class="will-Tit NSK">즐겨찾는 <span class="tx-light-blue">고객센터</span>
                                <div class="center-Btn"><a class="tx-light-blue" href="#none" onclick="openWin('CScenter')">서비스별 고객센터 전체보기 ▼</a></div>
                            </div>
                            <div class="callBox NG">
                                <ul>
                                    <li>
                                        <span class="tit">온라인 문의</span>
                                        <span class="num tx-light-blue">1544-5006</span>
                                        <!--a class="bnr_go" href="#none"><img src="{{ img_url('cs/icon_go.png') }}"></a-->
                                        <span class="row-line">|</span>
                                    </li>
                                    <li>
                                        <span class="tit">교재 문의</span>
                                        <span class="num tx-light-blue">1544-4944</span>
                                        <!--a class="bnr_go" href="#none"><img src="{{ img_url('cs/icon_go.png') }}"></a-->
                                        <span class="row-line">|</span>
                                    </li>
                                    <li>
                                        <!--span class="tit">윌비스 임용</span>
                                        <span class="num tx-light-blue">1544-3169</span>
                                        <a class="bnr_go" href="#none"><img src="{{ img_url('cs/icon_go.png') }}"></a-->
                                        <span class="tit">운영시간</span>
                                        <span class="time tx-light-blue">
                                            평일 9:00 ~ 18:00
                                            주말/공휴일 휴무<br>
                                            (점심시간 12시~13시)
                                        </span>
                                    </li>
                                </ul>
                            </div>
                             <!-- willbes-Layer-CScenterBox -->
                            <div id="CScenter" class="willbes-Layer-CScenterBox">
                                <a class="closeBtn" href="#none" onclick="closeWin('CScenter')">
                                    <img src="{{ img_url('prof/close.png') }}">
                                </a>
                                <div class="Layer-Tit NG tx-dark-black">윌비스 <span class="tx-blue">고객센터 안내</span></div>
                                <div class="Layer-Cont">
                                    <div class="Layer-SubTit tx-gray">특정 서비스에 대한 문의는 해당 사이트로 바로 문의주셔야 빠르게 답변을 받을 수 있습니다.</div>
                                    <div class="LeclistTable">
                                        <table cellspacing="0" cellpadding="0" class="listTable csTable under-gray upper-black tx-gray">
                                            <colgroup>
                                                <col style="width: 130px;">
                                                <col style="width: 115px;">
                                                <col style="width: 155px;">
                                                <col style="width: 260px;">
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th>사이트<span class="row-line">|</span></th>
                                                    <th>분류<span class="row-line">|</span></th>
                                                    <th>연락처<span class="row-line">|</span></th>
                                                    <th>운영시간</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="w-site">교재문의</td>
                                                    <td class="w-acad"><span class="oBox allBox NSK">공통</span></td>
                                                    <td class="w-call">1544-4944</td>
                                                    <td class="w-time tx-left pl25">
                                                        평일 9:00~18:00<br/>
                                                        주말/공휴일 휴무
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-site" rowspan="2">윌비스 공무원</td>
                                                    <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                    <td class="w-call">1544-5006</td>
                                                    <td class="w-time tx-left pl25">
                                                        평일 9:00~18:00 (점심시간 12시~13시)<br/>
                                                        주말/공휴일 휴무
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                                    <td class="w-call">1544-0330</td>
                                                    <td class="w-time tx-left pl25">
                                                        평일/주말 9:00~22:00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-site" rowspan="2">신광은 경찰</td>
                                                    <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                    <td class="w-call">1544-5006</td>
                                                    <td class="w-time tx-left pl25">
                                                        평일 9:00~18:00 (점심시간 12시~13시)<br/>
                                                        주말/공휴일 휴무
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                                    <td class="w-call">1544-0336</td>
                                                    <td class="w-time tx-left pl25">
                                                        월~토 9:00~22:00<br/>
                                                        일요일 9:00~20:00
                                                    </td>
                                                </tr>
                                                <!--tr>
                                                    <td class="w-site">임용</td>
                                                    <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                    <td class="w-call">1544-3169</td>
                                                    <td class="w-time tx-left pl25">
                                                        월~토 9:00~22:00<br/>
                                                        일요일/공휴일 휴무
                                                    </td>
                                                </tr-->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                             <!-- // willbes-Layer-CScenterBox -->
                        </div>
                    </div>
                    <div class="ActIndex ActIndex2 mt50">
                        <div class="LeclistTable c_both">
                            <div class="csCenterSearch">
                                <div class="will-Tit NSK">윌비스에 <span class="tx-light-blue">자주하는</span> 질문 검색하기</div>
                                <div class="SearchBox NG">
                                    <form id="url_form" name="url_form" method="GET" action="{{front_url('/support/faq/index')}}">
                                        <span class="sTitsub">
                                            궁금한 점이 있으신가요?<br/>
                                            검색을 통해 찾고 싶은 내용 / 단어를 입력해 주세요.
                                        </span>
                                        <div class="searchBoxForm">
                                            <select id="s_faq" name="s_faq" title="question" class="seleQuestion">
                                                @foreach($faq_ccd as $row)
                                                <option value="{{$row['Ccd']}}">{{$row['CcdName']}}</option>
                                                @endforeach
                                            </select>
                                            <span class="willbes-Lec-Search">
                                                <div class="inputBox p_re">
                                                    <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" placeholder="찾고 싶은 내용 / 단어를 입력해 주세요." maxlength="30">
                                                    <button type="submit" class="search-Btn">
                                                        <span>검색</span>
                                                    </button>
                                                </div>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <ul class="tabWrap tabcsDepth2 bg-light-gray NSK p_re">
                                    @foreach($faq_ccd as $row)
                                        <li><a class="qBox" href="#question{{$row['Ccd']}}">{{$row['CcdName']}}</a></li>
                                    @endforeach
                                </ul>
                                <div class="tabBox">
                                    @foreach($faq_ccd as $row)
                                    <div id="question{{$row['Ccd']}}" class="tabContent">
                                        <table cellspacing="0" cellpadding="0" class="listTable csCenterTable upper-gray bdb-gray tx-gray">
                                            <colgroup>
                                                <col style="width: 100px;">
                                                <col style="width: 100px;">
                                                <col style="width: 740px;">
                                            </colgroup>
                                            <tbody>
                                        @php $int=0 @endphp
                                        @foreach($list_faq as $list)
                                            @if($list['FaqGroupTypeCcd'] == $row['Ccd'] && $int < 5)
                                                <tr class="replyList w-replyList">
                                                    <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                    <td class="w-select tx-blue">[{{$list['FaqTypeCcd_Name']}}]</td>
                                                    <td class="w-list tx-left pl20">{{$list['Title']}}<span class="arrow-Btn">></span></td>
                                                </tr>
                                                <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                    <td colspan="3">
                                                        {!! $list['Content'] !!}
                                                    </td>
                                                </tr>
                                                @php $int++ @endphp
                                            @endif
                                        @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ActIndex ActIndex3 mt50">
                        <div class="willbes-firstinfo">
                            <div class="will-Tit NSK">윌비스에 <span class="tx-light-blue">처음</span> 오셨나요?</div>
                            <ul class="NG">
                                <li class="f-info1">
                                    <a href="#none"><img src="{{ img_url('cs/icon_question.gif') }}"><span>주요메뉴 안내</span></a>
                                    <span class="row-line">|</span>
                                </li>
                                <li class="f-info2">
                                    <a href="#none"><img src="{{ img_url('cs/icon_question623.gif') }}"><span>회원정보</span></a>
                                    <span class="row-line">|</span>
                                </li>
                                <li class="f-info3">
                                    <a href="#none"><img src="{{ img_url('cs/icon_question624.gif') }}"><span>결제/환불</span></a>
                                    <span class="row-line">|</span>
                                </li>
                                <li class="f-info4">
                                    <a href="#none"><img src="{{ img_url('cs/icon_question625.gif') }}"><span>교재</span></a>
                                    <span class="row-line">|</span>
                                </li>
                                <li class="f-info5">
                                    <a href="#none"><img src="{{ img_url('cs/icon_question626.gif') }}"><span>온라인수강</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ActIndex ActIndex4 mt50">
                        <div class="willbes-listTable willbes-info willbes-notice widthAuto360 f_left mr30 mt0">
                            <div class="will-Tit NSK"><span class="tx-light-blue">공지</span>사항 <a class="f_right" href="{{front_url('/support/notice')}}"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                            <ul class="List-Table GM tx-gray mt10">
                                @foreach($list_notice as $row)
                                    <li><a href="{{front_url('/support/notice/show?board_idx='.$row['BoardIdx'])}}">
                                            @if($__cfg['CampusCcdArr'] != 'N')<span class="oBox campus_{{$row['CampusCcd']}} NSK">{{$row['CampusCcd_Name']}}</span>@endif
                                                {{$row['Title']}}</a><span class="date">{{$row['RegDatm']}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widthAuto550 f_left">
                            <div class="willbes-listTable willbes-program mr30 widthAuto360 mt0">
                                <div class="will-Tit NG"><span class="tx-light-blue">학습</span> 프로그램 <a class="f_right" href="{{front_url('/support/program/index')}}"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                                <dl class="List-Table NG tx-gray">
                                    @foreach($program_ccd as $row)
                                    <dt>
                                        <a href="{{$row['CcdEtc']}}" target="_blank">
                                            <img src="{{ img_url('cs/icon_program_'.$row['Ccd'].'.gif') }}">
                                            <div>{{$row['CcdName']}}</div>
                                        </a>
                                    </dt>
                                    @endforeach
                                </dl>
                            </div>
                            <a href="{{front_url('/support/mobile/index')}}" class="bnr_mobile"><img src="{{ img_url('cs/bnr_mobile_n.jpg') }}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {!! popup('657004') !!}
    <!-- End Container -->
@stop