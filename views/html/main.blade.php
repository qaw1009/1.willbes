@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container main NSK c_both">
    <div class="Section MainVisual mt30 mb50">
        <div class="widthAuto">
            <a href="https://www.dev.willbes.net/member/join/" target="_blank"><img src="{{ img_url('main/visual/visual_180917.jpg') }}"></a>
        </div>
    </div>
    <div class="Section Act1 mb50">
        <div class="widthAuto">
            <div class="will-Tit">윌비스 1등 대표 과정 <span class="will-subTit">더 나은 미래, 윌비스가 책임지겠습니다.</span></div>
            <div class="ProcessBox">
                <ul>
                <li>
                            <a href="{{ app_url('/home/index/cate/3019', 'pass') }}" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes1.png') }}"> 공무원
                                </div>
                                <div class="wTxt">
                                    9급/7급/법원/소방/기술직NO.1<br/>
                                    <strong>윌비스 고시학원</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ app_url('/home/index/cate/3001', 'police') }}" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes2.png') }}"> 경찰
                                </div>
                                <div class="wTxt">
                                    독보적일반/경행/승진/간부/해경<br/>
                                    <strong>윌비스 신광은경찰학원</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://ssam.willbes.net" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes3.png') }}"> 교원임용
                                </div>
                                <div class="wTxt">
                                    유아/초등/중등합격을부르는<br/>
                                    <strong>윌비스 임용</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.hanlimgosi.co.kr" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes4.png') }}"> 고등고시
                                </div>
                                <div class="wTxt">
                                    5급행정/입법/외교/법원/변호사<br/>
                                    <strong>윌비스 한림법학원</strong>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="http://value.willbes.net" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes5.png') }}"> 전문자격증
                                </div>
                                <div class="wTxt">
                                    노무/감평/변리/관세/세무/회계<br/>
                                    <strong>윌비스 한림법학원</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.namucpa.com" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes5.png') }}"> 나무경영
                                </div>
                                <div class="wTxt">
                                    회계/세무/관세<br/>
                                    <strong>윌비스 나무경영 아카데미</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://cert.willbes.net" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes6.png') }}"> 자격증
                                </div>
                                <div class="wTxt">
                                    국가기술자격/분야별일반자격증<br/>
                                    <strong>윌비스 패스하자</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.willpass.co.kr" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes7.png') }}"> 취업
                                </div>
                                <div class="wTxt">
                                    공기업/대기업/NCS/능력검정<br/>
                                    <strong>윌패스</strong>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="http://lang.willbes.net" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes8.png') }}"> 어학
                                </div>
                                <div class="wTxt">
                                    토익/텝스/지텔프/영어/지2외국어<br/>
                                    <strong>윌비스랑</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.willbeslife.net" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes10.png') }}"> 학점은행
                                </div>
                                <div class="wTxt">
                                    교육부 인정 학점은행 원격교육기관<br/>
                                    <strong>윌비스 원격평생교육원</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://willbes.or.kr" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes9.png') }}"> 국비교육
                                </div>
                                <div class="wTxt">
                                    대한민국 국비교육 No.1<br/>
                                    <strong>윌비스 평생교육원</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://willbesedu.or.kr" target="_blank">
                                <div class="wTit">
                                    <img src="{{ img_url('main/icon_willbes10.png') }}"> 출석 학점은행
                                </div>
                                <div class="wTxt">
                                    학점은행 평가인정 교육기관<br/>
                                    <strong>윌비스 고시학원 출석학점은행</strong>
                                </div>
                            </a>
                        </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto">
            <div class="bar-banner">
                <div class="slider">
                    <div><a href="none" target="_blank"><img src="https://www.willbes.net/public/uploads/willbes/banner/2019/0614/banner_20190614170948.png"></a></div>
                    <div><a href="none" target="_blank"><img src="https://www.willbes.net/public/uploads/willbes/banner/2019/0614/banner_20190614170948.png"></a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="Section Act2 mb50">
        <div class="widthAuto">
            <div class="will-Tit mb-zero">시험일정</div>
            <div class="sliderDayList cSlider">
                <div class="sliderControls">
                    <div>
                        <div class="dDayBox">
                            <a href="#none">
                                <span class="dTit">
                                    2018 경찰 3차
                                    <div class="w-date">2018-11-23</div>
                                </span>
                                <span class="dDay tx-color">D-349</span>
                            </a>
                        </div>
                        <div class="dDayBox">
                            <a href="#none">
                                <span class="dTit">
                                    2018 서울시
                                    <div class="w-date">2018-10-05</div>
                                </span>
                                <span class="dDay tx-color">D-35</span>
                            </a>
                        </div>
                        <div class="dDayBox">
                            <span class="dTit">
                                2018 지방직
                                <div class="w-date">2019-04-18</div>
                            </span>
                            <span class="dDay tx-color">D-94</span>
                        </div>
                        <div class="dDayBox">
                            <span class="dTit">
                                2018 법원/검찰직
                                <div class="w-date">2019-04-19</div>
                            </span>
                            <span class="dDay tx-color">D-97</span>
                        </div>
                    </div>
                    <div>
                        <div class="dDayBox">
                            <a href="#none">
                                <span class="dTit">
                                    2018 경찰 5차
                                    <div class="w-date">2019-12-25</div>
                                </span>
                                <span class="dDay tx-color">D-1</span>
                            </a>
                        </div>
                        <div class="dDayBox">
                            <a href="#none">
                                <span class="dTit">
                                    2019 서울시
                                    <div class="w-date">2019-00-00</div>
                                </span>
                                <span class="dDay tx-color">D-20</span>
                            </a>
                        </div>
                        <div class="dDayBox">
                            <span class="dTit">
                                2018 지방직
                                <div class="w-date">2019-03-18</div>
                            </span>
                            <span class="dDay tx-color">D-30</span>
                        </div>
                        <div class="dDayBox">
                            <span class="dTit">
                                2018 법원/검찰직
                                <div class="w-date">2019-07-19</div>
                            </span>
                            <span class="dDay tx-color">D-400</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--
    <div class="Section Act3 mb90">
        <div class="widthAuto">
            <dl>
                <dt class="BestLec">
                    <div class="will-Tit">
                        Best 수강후기
                        <div class="willbes-Lec-Selected main-Lec-Selected tx-gray">
                            <select id="list" name="list" title="list" class="seleList">
                                <option selected="selected">목록</option>
                                <option value="경찰">경찰</option>
                                <option value="국어">국어</option>
                                <option value="영어">영어</option>
                            </select>
                        </div>
                    </div>
                    <ul class="List-Table">
                        <li><a href="#none"><span class="w-sbj">국어</span><span class="w-prof">정채영</span><span class="w-tit">명불허전! 역시 최고의 강의</span><span class="w-user">반영*</span><span class="w-star"><img src="{{ img_url('main/icon/star4.gif') }}"></span></a></li>
                        <li><a href="#none"><span class="w-sbj">영어</span><span class="w-prof">한덕현</span><span class="w-tit">역시 영스타 하프모고 최고입니다!</span><span class="w-user">조남*</span><span class="w-star"><img src="{{ img_url('main/icon/star1.gif') }}"></span></a></li>
                        <li><a href="#none"><span class="w-sbj">한국사</span><span class="w-prof">박민주</span><span class="w-tit">복습이 따로 필요없는 강의!!</span><span class="w-user">김지*</span><span class="w-star"><img src="{{ img_url('main/icon/star3.gif') }}"></span></a></li>
                        <li><a href="#none"><span class="w-sbj">행정법</span><span class="w-prof">황남기</span><span class="w-tit">막판 정리에 좋은 강의입니다.</span><span class="w-user">윤혜*</span><span class="w-star"><img src="{{ img_url('main/icon/star4.gif') }}"></span></a></li>
                        <li><a href="#none"><span class="w-sbj">행정학</span><span class="w-prof">김덕관</span><span class="w-tit">출제 포인트를 익힐 수 있는 좋은강의</span><span class="w-user">김혜*</span><span class="w-star"><img src="{{ img_url('main/icon/star5.gif') }}"></span></a></li>
                        <li><a href="#none"><span class="w-sbj">국어</span><span class="w-prof">기미진</span><span class="w-tit">말이 필요없네요 그냥 최고</span><span class="w-user">정고*</span><span class="w-star"><img src="{{ img_url('main/icon/star4.gif') }}"></span></a></li>
                    </ul>
                </dt>
                <dt class="passInterview">
                    <div class="will-Tit bd-none mb-zero">합격자 인터뷰</div>
                    <div class="videoTabs c_both">
                        <div class="tabBox videoBox">
                            <div id="interview1" class="tabContent">
                                <a href="#none"><img src="{{ img_url('main/video/video_180918.jpg') }}"></a>
                            </div>
                            <div id="interview2" class="tabContent">
                                <a href="#none"><img src="{{ img_url('main/video/video_180919.jpg') }}"></a>
                            </div>
                            <div id="interview3" class="tabContent">
                                <a href="#none"><img src="{{ img_url('main/video/video_180920.jpg') }}"></a>
                            </div>
                        </div>
                        <ul class="tabWrap videoWrap">
                            <li><a href="#interview1" class="on">2018 법원직수석<br/>김용건 합격생</a></li>
                            <li><a href="#interview2" class="">2018 경찰 2차 일반<br/>장동건 합격생</a></li>
                            <li><a href="#interview3" class="">2018 유아 교사 임용<br/>장희빈 합격생</a></li>
                        </ul>
                    </div>
                </dt>
            </dl>
        </div>
    </div>
-->

    <div class="Section Bnr mb50">
        <div class="widthAuto">
            <dl class="willbes-Bnr">
                <dt>
                    <a href="#none" target="_blank"><img src="{{ img_url('main/banner/bnr_180918.jpg') }}"></a>
                    <!--
                    <ul>
                        <li>
                            <div class="bSlider">
                                <div class="slider">
                                    <div><a href="#none"><img src="{{ img_url('main/banner/bnr_180918.jpg') }}"></a></div>
                                    <div><img src="{{ img_url('main/banner/bnr_180919.jpg') }}"></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    -->
                </dt>
                <dt>
                    <a href="#none" target="_blank"><img src="{{ img_url('main/banner/bnr_180919.jpg') }}"></a>
                    <!--
                    <ul>
                        <li>
                            <div class="bSlider">
                                <div class="slider">
                                    <div><a href="#none"><img src="{{ img_url('main/banner/bnr_180919.jpg') }}"></a></div>
                                    <div><img src="{{ img_url('main/banner/bnr_180918.jpg') }}"></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    -->
                </dt>
            </dl>
        </div>
    </div>
    <div class="Section Act4 mb50">
        <div class="widthAuto">
            <dl>
                <dt class="WhyWillbes">
                    <div class="will-Tit bd-none mb-zero">Why 윌비스 <span class="will-subTit sm">* JTBC·SBS·KBS·MBC · EBS·연합뉴스등국내주요언론및일본· 대만등해외취재</span></div>
                    <div class="whyBox c_both">
                        <a href="{{ app_url('/promotion/index/cate/3001/code/1021', 'police') }}" target="_blank"><img src="{{ img_url('main/video/video_180921.jpg') }}"></a>
                    </div>
                </dt>
                <dt class="NowWillbes">
                    <div class="will-Tit">Now 윌비스</div>
                    <ul class="List-Table">
                        <li><a href="#none"><span class="w-sbj">공무원</span><span class="w-tit">2019 대비 9-10월 신규강좌 선접수 이벤트</span><span class="w-date">2018.03.06</span></a></li>
                        <li><a href="#none"><span class="w-sbj">경찰</span><span class="w-tit">신광은 경찰학원 '광은 장학회 4기' 합격자 발표</span><span class="w-date">2018.03.05</span></a></li>
                        <li><a href="#none"><span class="w-sbj">경찰</span><span class="w-tit">면접 A반(월수금)과 면접스파르타반 마감! B반(화목토) 101단</span><span class="w-date">2018.03.04</span></a></li>
                        <li><a href="#none"><span class="w-sbj">임용</span><span class="w-tit">체력관리 이벤트 당첨자 발표</span><span class="w-date">2018.03.03</span></a></li>
                        <li><a href="#none"><span class="w-sbj">임용</span><span class="w-tit">2018년 9~11월 모의고사반 개강 안내</span><span class="w-date">2018.03.02</span></a></li>
                        <li><a href="#none"><span class="w-sbj">공무원</span><span class="w-tit">2019 대비 9-10월 신규강좌 선접수 이벤트</span><span class="w-date">2018.03.01</span></a></li>
                    </ul>
                </dt>
            </dl>
        </div>
    </div>
    <div class="Section Act5 mb50">
        <div class="widthAuto">
            <div class="will-Tit">윌비스 직영학원</div>
            <dl class="ListBox">
                <dt class="acadList">
                    <table cellspacing="0" cellpadding="0" class="MainacadTable">
                        <colgroup>
                            <col style="width: 125px;"/>
                            <col style="width: 675px;"/>     
                        </colgroup>
                        <tbody>
                            <tr>
                                <th class="Tit">공무원</th>
                                <td>
                                    <a href="#{{ app_url('/pass/home/index', 'pass') }}" target="_blank">노량진</a>
                                    <a href="#{{ app_url('/pass/home/index', 'pass') }}" target="_blank">인천</a>
                                    <a href="#{{ app_url('/pass/home/index', 'pass') }}" target="_blank">대구</a>
                                    <a href="#{{ app_url('/pass/home/index', 'pass') }}" target="_blank">부산</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="Tit">경찰</th>
                                <td>
                                    <a href="#{{ app_url('/pass/campus/show/code/605001', 'police') }}" target="_blank">노량진</a>
                                    <a href="#{{ app_url('/pass/campus/show/code/605002', 'police') }}" target="_blank">신림</a>
                                    <a href="#{{ app_url('/pass/campus/show/code/605005', 'police') }}" target="_blank">인천</a>
                                    <a href="#{{ app_url('/pass/campus/show/code/605004', 'police') }}" target="_blank">대구</a>
                                    <a href="#{{ app_url('/pass/campus/show/code/605003', 'police') }}" target="_blank">부산</a>
                                    <a href="#{{ app_url('/pass/campus/show/code/605006', 'police') }}" target="_blank">광주</a>
                                    <a href="#{{ app_url('/pass/campus/show/code/605009', 'police') }}" target="_blank">제주</a>
                                    <a href="#{{ app_url('/pass/campus/show/code/605007', 'police') }}" target="_blank">전북</a>
                                    <a href="#{{ app_url('/pass/campus/show/code/605008', 'police') }}" target="_blank">진주</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="Tit">교원임용</th>
                                <td>
                                    <a href="http://ssam.willbes.net" target="_blank">노량진</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="Tit">고등고시</th>
                                <td>
                                    <a href="http://www.hanlimgosi.co.kr" target="_blank">신림(한림법학원)</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="Tit">전문자격</th>
                                <td>
                                    <a href="http://value.willbes.net" target="_blank">감평/노무 - 신림(한림법학원)</a>
                                    <a href="http://www.namucpa.com" target="_blank">세무/회계 종로(나무아카데미)</a>
                                    <a href="http://patent.willbes.net" target="_blank">변리사-강남</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
              
                </dt>
                <dt class="imgBox">
                    <ul>
                        <li><a href="http://www.willstory.co.kr" target="_blank"><img src="{{ img_url('main/familysite_willstory.jpg') }}"></a></li>
                        <li><a href="http://www.willbeslife.net" target="_blank"><img src="{{ img_url('main/familysite_life.jpg') }}"></a></li>
                        <li><a href="http://www.willbes.co.kr" target="_blank"><img src="{{ img_url('main/familysite_edu.jpg') }}"></a></li>
                    </ul>
                </dt>
            </dl>
        </div>
    </div>
    <div class="Section Act6 mb50">
        <div class="widthAuto">
            <div class="CScenterBox">
                <table cellspacing="0" cellpadding="0" class="mainTable">
                    <colgroup>
                        <col style="width: 209px;"/>
                        <col style="width: 1px;"/>
                        <col style="width: 330px;"/>
                        <col style="width: 260px;"/>
                        <col style="width: 1px;"/>
                        <col style="width: 319px;"/>
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="mTit">고객센터</td>
                            <td class="line">-</td>    
                            <td>
                                <span class="nTit">수강문의</span><span class="nNumber tx-color">1544-6291</span><br/>
                                <span class="nTit">교재문의</span><span class="nNumber tx-color">1544-4944</span>  
                            </td>
                            <td class="nTxt">
                                [운영시간]<br/>
                                평일 : 09시 ~ 18시<br/>
                                공휴일/일요일은 휴무<br/>
                                ※ 전화상담시 자동녹취<br/>
                            </td>
                            <td class="line">-</td>  
                            <td class="nInfo">
                                <img src="{{ img_url('main/icon_info.png') }}">
                                <span>
                                    윌비스는 항상 열려있습니다.<br/>
                                    다양한 의견을 올려주세요.
                                </span>
                            </td>  
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>   
</div>
<!-- End Container -->
@stop