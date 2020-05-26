@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">일반경찰</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="{{ site_url('/home/html/prof') }}">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/package1') }}">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">패키지</li>
                            <li><a href="{{ site_url('/home/html/package1') }}">추천 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/package2') }}">선택 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/diypackage') }}">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/list') }}">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mocktest1') }}">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수험정보</li>
                            <li><a href="{{ site_url('/home/html/mocktest1') }}">시험공고</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest2') }}">수험뉴스</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest3') }}">기출문제</a></li>
                            <li><a href="#none">공무원가이드</a></li>
                            <li><a href="#none">초보합격전략</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest6_1') }}">모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/counsel1') }}">상담실</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">상담실</li>
                            <li><a href="{{ site_url('/home/html/counsel1') }}">일반상담</a></li>
                            <li><a href="{{ site_url('/home/html/counsel2') }}">인적성/면접상담</a></li>
                            <li><a href="{{ site_url('/home/html/counsel3_1') }}">심층상담예약</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/event_ing') }}">이벤트</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">이벤트</li>
                            <li><a href="{{ site_url('/home/html/event_ing') }}">진행중인 이벤트</a></li>
                            <li><a href="{{ site_url('/home/html/event_end') }}">마감된 이벤트</a></li>
                        </ul>
                    </div>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>상담실</strong>
            <span class="depth-Arrow">></span><strong>1:1 전화상담</strong>
        </span>
    </div>
    <div class="Content p_re">
        <div class="willbes-Counsel c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black pt-zero">· 1:1 전화상담 예약</div>
            <div class="willbes-counsel_step step mt40 NG c_both">
                <ul>
                    <li><div class="num">01</div>전화 상담일자/시간예약</li>
                    <li class="arrow"><img src="{{ img_url('counsel/icon_arrow_step.png') }}"></li>
                    <li class="active"><div class="num">02</div>사전정보입력</li>
                    <li class="arrow"><img src="{{ img_url('counsel/icon_arrow_step.png') }}"></li>
                    <li><div class="num">03</div>전화 상담 예약 완료</li>
                </ul>
                <div class="info-Box info-Box2 NG">
                    <dl>
                        <dt>
                            · 상담은 월 ~ 일요일 오전 10시부터 오후 5시까지 진행됩니다.<br/>
                            · 원활한 상담 예약을 위해 사전정보 사항을 정확히 입력해 주세요. (<span class="tx-red">(*)</span>필수항목)<br/>
                            · <span class="tx-blue">상세정보의 시험별, 과목별 점수를 기입해 주시면 수 년 간의 통계 및 패턴분석을 통한 심층 상담을 받으실 수 있습니다.</span><br/>
                            · 시험 미응시자인 경우에는 시험 점수 대신 궁금하신 사항을 구체적으로 기입해 주세요.<br/>
                        </dt>
                    </dl>
                </div>
            </div>
            <div class="counsel_infoBox tx-black GM mb50">
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 125px;">
                            <col style="width: 660px;">
                            <col style="width: 155px;">
                        </colgroup>
                        <tbody>
                            <tr class="userInfoBox">
                                <th><strong>캠퍼스 선택</strong></th>
                                <td class="w-list tx-left pl20">
                                    <select id="select" name="select" title="캠퍼스 선택" class="">
                                        <option selected="selected">캠퍼스 선택</option>
                                        <option value="노량진">노량진</option>
                                        <option value="노량진1">노량진1</option>
                                        <option value="노량진2">노량진2</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" onclick="" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                                        <span><strong>나의 예약현황</strong></span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="willbes-User-Info p_re pb30">
                <div class="InfoTable GM">
                    <table cellspacing="0" cellpadding="0" class="classTable userInfoTable counselTable under-gray bdt-gray bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 160px;">
                            <col style="width: 780px;">
                            <col width="*">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-tit">상담예약 일시</td>
                                <td class="w-info"><span class="tx-light-blue">2018-10-25 (목) 10:00 ~ 10:30</span></td>
                            </tr>
                            <tr>
                                <td class="w-tit">이름(아이디) <span class="tx-red">(*)</span></td>
                                <td class="w-info"><input type="text" id="USER_ID" name="USER_ID" class="iptid" placeholder="홍길동(아이디)" maxlength="30"></td>
                            </tr>
                            <tr>
                                <td class="w-tit">생년월일 <span class="tx-red">(*)</span></td>
                                <td class="w-info"><input type="text" id="USER_BRT" name="USER_BRT" class="iptbrt" placeholder="ex) 19990101" maxlength="30"></td>
                            </tr>
                            <tr>
                                <td class="w-tit">연락처 <span class="tx-red">(*)</span></td>
                                <td class="w-info"><input type="text" id="USER_PHONE" name="USER_PHONE" class="iptphone" placeholder="ex) 01012345678" maxlength="30"></td>
                            </tr>
                            <tr>
                                <td class="w-tit">이메일 <span class="tx-red">(*)</span></td>
                                <td class="w-info">                                    
                                    <div class="emailBox">
                                        <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail1 email" maxlength="30"> @
                                        <select id="email" name="email" title="email" class="seleEmail email">
                                            <option selected="selected">willbes.net</option>
                                            <option value="naver.com">naver.com</option>
                                            <option value="daum.net<">daum.net</option>
                                            <option value="gmail.com">gmail.com</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">응시직렬 <span class="tx-red">(*)</span></td>
                                <td class="w-info">
                                    <div class="w-selec-Area">
                                        <ul>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>일반</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>남자</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>여자</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>기동대</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>101단</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>전의경특채</label></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">응시지역 <span class="tx-red">(*)</span></td>
                                <td class="w-info">
                                    <select id="area" name="area" title="응시지역" class="seleArea">
                                        <option selected="selected">응시지역 선택</option>
                                        <option value="지역1">지역1</option>
                                        <option value="지역2">지역2</option>
                                        <option value="지역3">지역3</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">수험기간 <span class="tx-red">(*)</span></td>
                                <td class="w-info">
                                    <div class="w-selec-Area">
                                        <ul>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>6개월 미만</label></li>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>1년 미만</label></li>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>1년 이상</label></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">취약과목 <span class="tx-red">(*)</span></td>
                                <td class="w-info"><input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbjw" placeholder="ex) 영어" maxlength="30"></td>
                            </tr>
                            <tr>
                                <td class="w-tit">수강여부 <span class="tx-red">(*)</span></td>
                                <td class="w-info">
                                    <div class="w-selec-Area">
                                        <ul>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>학원</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>동영상</label></li>
                                            <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>기타</label></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">
                                    상세정보<br/>
                                    (최근 점수를<br/>기입해 주세요)
                                </td>
                                <td class="w-info">
                                    <div class="Detail-gradeBox">
                                        [모의고사명] <input type="text" id="USER_TITLE" name="USER_TITLE" class="ipttitle" placeholder="(예: [2016 1차])" maxlength="30"><br/>
                                        필수과목 
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">), 
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">)<br/>
                                        선택과목
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">), 
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">),
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">). 
                                        총점(<input type="text" id="USER_ALL_GRADE" name="USER_ALL_GRADE" class="iptallgrade" maxlength="30">)
                                    </div>
                                    <div class="Detail-gradeBox">
                                        [모의고사명] <input type="text" id="USER_TITLE" name="USER_TITLE" class="ipttitle" placeholder="(예: [2016 1차])" maxlength="30"><br/>
                                        필수과목 
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">), 
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">)<br/>
                                        선택과목
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">), 
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">),
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">). 
                                        총점(<input type="text" id="USER_ALL_GRADE" name="USER_ALL_GRADE" class="iptallgrade" maxlength="30">)
                                    </div>
                                    <div class="Detail-gradeBox">
                                        [모의고사명] <input type="text" id="USER_TITLE" name="USER_TITLE" class="ipttitle" placeholder="(예: [2016 1차])" maxlength="30"><br/>
                                        필수과목 
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">), 
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">)<br/>
                                        선택과목
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">), 
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">),
                                        <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">). 
                                        총점(<input type="text" id="USER_ALL_GRADE" name="USER_ALL_GRADE" class="iptallgrade" maxlength="30">)
                                    </div>
                                    * 기타상담사항: 처음 준비합니다. 자세한 상담이 필요합니다.<br/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="willbes-Lec-buyBtn">
                    <ul>
                        <li class="btnAuto90 h36">
                            <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-gray">
                                <span class="tx-purple-gray">이전단계</span>
                            </button>
                        </li>
                        <li class="btnAuto90 h36">
                            <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                <span>다음단계</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- willbes-Counsel -->
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop