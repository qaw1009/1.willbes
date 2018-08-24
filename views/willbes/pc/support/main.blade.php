@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-CScenter c_both">
                <div class="CScenterIndex willbes-listTable">
                    <!-- ActIndex1 -->
                    <div class="ActIndex1">
                        <div class="CSpartner widthAuto530 f_left">
                            <div class="will-Tit NG">든든한 학습 파트너, <span class="tx-blue">윌비스 통합 고객센터</span></div>
                            <div class="centerList NG">
                                <ul>
                                    <li>
                                        <a href="{{site_url('support/notice/index')}}">
                                            <img src="{{ img_url('cs/icon_center1.png') }}">
                                            <div class="nTxt">고객센터<br/>공지사항</div>
                                        </a>
                                    </li>
                                    <li><img src="{{ img_url('cs/icon_cs_arrow.png') }}"></li>
                                    <li>
                                        <a href="{{site_url('support/faq/index')}}">
                                            <img src="{{ img_url('cs/icon_center2.png') }}">
                                            <div class="nTxt">자주하는<br/>질문</div>
                                        </a>
                                    </li>
                                    <li><img src="{{ img_url('cs/icon_cs_arrow.png') }}"></li>
                                    <li>
                                        <a href="{{site_url('support/qna/index')}}">
                                            <img src="{{ img_url('cs/icon_center3.png') }}">
                                            <div class="nTxt">1:1 상담</div>
                                        </a>
                                    </li>
                                    <li><img src="{{ img_url('cs/icon_cs_arrow.png') }}"></li>
                                    <li>
                                        <img src="{{ img_url('cs/icon_center4.png') }}">
                                        <div class="nTxt">전화상담</div>
                                    </li>
                                </ul>
                                <div class="Txt">학습에 궁금한 점이 있으신가요? 이렇게 해결하세요.</div>
                            </div>
                        </div>
                        <div class="widthAuto365 f_left p_re ml45">
                            <div class="will-Tit NG">즐겨찾는 고객센터</div>
                            <div class="callBox">
                                <table cellspacing="0" cellpadding="0" class="listTable callTable NG upper-gray fc-bd-none tx-gray">
                                    <colgroup>
                                        <col style="width: 145px;"/>
                                        <col style="width: 110px;"/>
                                        <col style="width: 110px;"/>
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <td>윌비스 공무원</td>
                                        <td class="tx-light-blue">1544-5006</td>
                                        <td><a href="#none"><img src="{{ img_url('cs/icon_go.png') }}"></a></td>
                                    </tr>
                                    <tr>
                                        <td>신광은 경찰</td>
                                        <td class="tx-light-blue">1544-5006</td>
                                        <td><a href="#none"><img src="{{ img_url('cs/icon_go.png') }}"></a></td>
                                    </tr>
                                    <tr>
                                        <td>윌비스 임용</td>
                                        <td class="tx-light-blue">1544-3169</td>
                                        <td><a href="#none"><img src="{{ img_url('cs/icon_go.png') }}"></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="center-Btn h36"><a class="bg-blue bd-dark-blue NSK" href="#none" onclick="openWin('CScenter')">서비스별 고객센터 전체</a></div>
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
                                                <td class="w-acad"><span class="oBox onlineBox NSK">공통</span></td>
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
                                                    평일 9:00~18:00 | 토요일 9:00~13:00<br/>
                                                    일요일/공휴일 휴무
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
                                                    평일 9:00~18:00<br/>
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
                                            <tr>
                                                <td class="w-site">임용</td>
                                                <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                <td class="w-call">1544-3169</td>
                                                <td class="w-time tx-left pl25">
                                                    월~토 9:00~22:00<br/>
                                                    일요일/공휴일 휴무
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- // willbes-Layer-CScenterBox -->
                        </div>
                    </div>
                    <!-- ActIndex2 -->
                    <div class="ActIndex2 mt70">
                        <div class="LeclistTable c_both">
                            <table cellspacing="0" cellpadding="0" class="listTable csCenterTable upper-gray tx-gray">
                                <tbody>
                                <tr class="SearchBox NG">
                                    <td>
                                        <form id="url_form" name="url_form" method="GET" action="{{site_url('support/faq/index')}}">
                                            <span class="sTit tx-black">자주하는 질문</span>
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
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="csCenterTable">
                                <ul class="tabWrap tabcsDepth2 bg-light-gray p_re">
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
                        <!--LeclistTable -->
                    </div>
                    <!-- ActIndex3 -->
                    <div class="ActIndex3 mt30">
                        <div class="willbes-firstinfo NGEB">
                            <ul>
                                <li class="Tit">
                                    윌비스<span class="NGR">에</span><br/>
                                    <span class="tx-light-blue">처음</span><br/>
                                    <span class="NGR">오셨나요?</span>
                                </li>
                                <li class="f-info1"><a href="#none"><span>주요메뉴 안내</span></a><span class="row-line">|</span></li>
                                <li class="f-info2"><a href="#none"><span>회원가입</span></a><span class="row-line">|</span></li>
                                <li class="f-info3"><a href="#none"><span>수강신청</span></a><span class="row-line">|</span></li>
                                <li class="f-info4"><a href="#none"><span>주문/결제</span></a><span class="row-line">|</span></li>
                                <li class="f-info5"><a href="#none"><span>강의수강</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- ActIndex4 -->
                    <div class="ActIndex4 mt30">
                        <div class="widthAuto530 f_left">
                            <div class="willbes-listTable willbes-program mr30 widthAuto330">
                                <div class="will-Tit NG">학습 프로그램 <a class="f_right" href="{{site_url('support/program/index')}}"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                                <dl class="List-Table NG tx-gray">
                                    <dt>
                                        <a href="#none">
                                            <div>MS Word<br/>뷰어</div>
                                            <img src="{{ img_url('cs/icon_program_MS.gif') }}">
                                        </a>
                                    </dt>
                                    <dt>
                                        <a href="#none">
                                            <div>한글 어도비<br/>리더</div>
                                            <img src="{{ img_url('cs/icon_program_PDF.gif') }}">
                                        </a>
                                    </dt>
                                    <dt>
                                        <a href="#none">
                                            <div>한글과 컴퓨터<br/>뷰어</div>
                                            <img src="{{ img_url('cs/icon_program_Word.gif') }}">
                                        </a>
                                    </dt>
                                    <dt>
                                        <a href="#none">
                                            <div>ALZIP</div>
                                            <img src="{{ img_url('cs/icon_program_ZIP.gif') }}">
                                        </a>
                                    </dt>
                                </dl>
                            </div>
                            <a href="{{site_url('support/mobile/index')}}"><img src="{{ img_url('cs/bnr_mobile.jpg') }}"></a>
                        </div>
                        <div class="willbes-listTable willbes-info widthAuto365 f_left ml45">
                            <div class="will-Tit NG">공지사항 <a class="f_right" href="{{site_url('support/notice')}}"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                            <ul class="List-Table GM tx-gray">
                                @foreach($list_notice as $row)
                                    <li><a href="{{site_url('support/notice/show?board_idx='.$row['BoardIdx'])}}">{{$row['Title']}}</a><span class="date">{{$row['RegDatm']}}</span></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- willbes-CScenter -->

        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>
    <!-- End Container -->
@stop