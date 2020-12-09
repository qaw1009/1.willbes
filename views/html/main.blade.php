@extends('willbes.pc.layouts.master')

@section('content')
<link href="/public/css/willbes/style_main.css?ver={{time()}}" rel="stylesheet">
<!-- Container -->
<div id="Container" class="Container main NG c_both">
    <div class="Section MainVisual mt30 mb50">
        <div class="widthAuto">
            <a href="https://www.dev.willbes.net/member/join/" target="_blank"><img src="{{ img_url('main/visual/visual_180917.jpg') }}"></a>
        </div>
    </div>
    <div class="Section Act1 mb50">
        <div class="widthAuto">
            <div class="will-Tit">윌비스 평생교육 대표 과정 <span class="will-subTit">더 나은 미래, 윌비스가 책임지겠습니다.</span></div>
            <div class="ProcessBox">
                <ul>
                    <li class="fisrt">
                        <div class="wTit">
                            <img src="{{ img_url('main/icon_willbes1.png') }}"> 공무원
                        </div>
                        <div class="wTxt">
                            <span><a href="https://pass.willbes.net/home/index/cate/3019" target="_blank">[9급]</a></span>
                            <span><a href="https://pass.willbes.net/home/index/cate/3103" target="_blank">[7급PSAT]</a></span>
                            <span><a href="https://pass.willbes.net/home/index/cate/3020" target="_blank">[7급]</a></span>                                
                            <span><a href="https://pass.willbes.net/home/index/cate/3035" target="_blank">[법원]</a></span>
                            <span><a href="https://pass.willbes.net/home/index/cate/3023" target="_blank">[소방]</a></span><br/>
                            <span><a href="https://pass.willbes.net/home/index/cate/3028" target="_blank">[기술직]</a></span>
                            <span><a href="https://pass.willbes.net/home/index/cate/3024" target="_blank">[군무원]</a></span>
                            <br/>
                            <strong>윌비스 공무원</strong>
                        </div>
                    </li>
                    <li class="second">
                        <div class="wTit">
                            <img src="{{ img_url('main/icon_willbes2.png') }}"> 경찰
                        </div>
                        <div class="wTxt">
                            1등*<span><a href="https://police.willbes.net/home/index/cate/3001" target="_blank">[일반경찰]</a></span>
                            <span><a href="https://police.willbes.net/home/index/cate/3002" target="_blank">[경행]</a></span>
                            <span><a href="https://police.willbes.net/home/index/cate/3006" target="_blank">[승진]</a></span>
                            <span><a href="https://police.willbes.net/home/index/cate/3007" target="_blank">[해경]</a></span>
                            <br/>
                            <strong>윌비스 신광은경찰학원</strong><br/>
                            <div class="sTxt">* 2019브랜드고객충성도대상 경찰공무원부문 1위 기준</div> 
                        </div> 
                    </li>
                    <li>
                        <a href="https://spo.willbes.net/home/index/cate/3100" target="_blank">
                            <div class="wTit">
                                <img src="{{ img_url('main/icon_willbes2.png') }}"> 경찰간부
                            </div>
                            <div class="wTxt">
                                간부후보생 선발시험 대비<br/>
                                <strong>윌비스 한림법학원</strong>
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
                </ul>
                <ul>
                    <li class="fisrt">
                        <div class="wTit">
                            <img src="{{ img_url('main/icon_willbes4.png') }}"> 고등고시
                        </div>
                        <div class="wTxt">
                            <span><a href="https://gosi.willbes.net/home/index/cate/3094" target="_blank">[5급행정]</a></span>
                            <span><a href="https://gosi.willbes.net/home/index/cate/3095" target="_blank">[외교원]</a></span>
                            <span><a href="https://gosi.willbes.net/home/index/cate/3099" target="_blank">[변호사]</a></span>                                
                            <span><a href="https://gosi.willbes.net/home/index/cate/3097" target="_blank">[5급헌법]</a></span><br/>
                            <span><a href="https://gosi.willbes.net/home/index/cate/3098" target="_blank">[법행]</a></span>
                            <span><a href="https://pass.willbes.net/home/index/cate/3096" target="_blank">[PSAT]</a></span>
                            <br/>
                            <strong>윌비스 한림법학원</strong>
                        </div>
                    </li>    
                    <li class="second">
                        <div class="wTit">
                            <img src="{{ img_url('main/icon_willbes5.png') }}"> 전문자격증
                        </div>
                        <div class="wTxt">
                            <span><a href="https://job.willbes.net/home/index/cate/309002" target="_blank">[노무]</a></span>
                            <span><a href="https://job.willbes.net/home/index/cate/309003" target="_blank">[감평]</a></span>
                            <span><a href="https://job.willbes.net/home/index/cate/309004" target="_blank">[변리]</a></span>                                
                            <span><a href="https://job.willbes.net/home/index/cate/309005" target="_blank">[관세]</a></span>
                            <span><a href="https://job.willbes.net/home/index/cate/309001" target="_blank">[스포츠]</a></span><br/>
                            <strong>윌비스 한림법학원</strong>
                        </div>
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
                        <a href="https://work.willbes.net/home/index/cate/3102" target="_blank">
                            <div class="wTit">
                                <img src="{{ img_url('main/icon_willbes7.png') }}"> 취업
                            </div>
                            <div class="wTxt">
                                공기업
                            </div>
                        </a>
                    </li>                    
                </ul>
                <ul>                            
                    <li>
                        <a href="http://lang.willbes.net/?sub_category=110" target="_blank">
                            <div class="wTit">
                                <img src="{{ img_url('main/icon_willbes8.png') }}"> 어학
                            </div>
                            <div class="wTxt">
                                토익/텝스/지텔프/영어/제2외국어<br/>
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
                    <li>
                        <a href="https://njob.willbes.net/home/index/cate/3114" target="_blank">
                            <div class="wTit">
                                <img src="{{ img_url('gnb/icon_njob_sm.gif') }}"> N잡
                            </div>
                            <div class="wTxt">
                                가장 HOT한 이커머스 창업교육<br/>
                                <strong>e커머스</strong>
                            </div>
                        </a>
                    </li>                      
                </ul>
            </div>
        </div>
    </div>    

    <div class="Section mb50">
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

    <div class="Section Bnr mb50">
        <div class="widthAuto">
            <dl class="willbes-Bnr">
                <dt>
                    <a href="#none" target="_blank"><img src="{{ img_url('main/banner/bnr_180918.jpg') }}"></a>
                </dt>
                <dt>
                    <a href="#none" target="_blank"><img src="{{ img_url('main/banner/bnr_180919.jpg') }}"></a>
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
                    <ul>
                        <li>
                            <strong>공무원</strong>
                            <a href="{{ app_url('/pass/home/index/cate/3001', 'pass') }}" target="_blank">노량진</a><span>|</span>
                            <a href="http://willbesedu.co.kr" target="_blank">인천</a><span>|</span>
                            <a href="{{ app_url('/pass/home/index/cate/3001', 'pass') }}" target="_blank">대구</a><span>|</span>
                            <a href="{{ app_url('/pass/home/index/cate/3001', 'pass') }}" target="_blank">부산</a>
                        </li>
                        <li>
                            <strong>경찰</strong>
                            <a href="{{ app_url('/pass/campus/show/code/605001', 'police') }}" target="_blank">노량진</a><span>|</span>
                            <a href="{{ app_url('/pass/campus/show/code/605005', 'police') }}" target="_blank">인천</a><span>|</span>
                            <a href="{{ app_url('/pass/campus/show/code/605004', 'police') }}" target="_blank">대구</a><span>|</span>
                            <a href="{{ app_url('/pass/campus/show/code/605003', 'police') }}" target="_blank">부산</a><span>|</span>
                            <a href="{{ app_url('/pass/campus/show/code/605006', 'police') }}" target="_blank">광주</a><span>|</span>
                            <a href="{{ app_url('/pass/campus/show/code/605009', 'police') }}" target="_blank">제주</a><span>|</span>
                            <a href="https://blog.naver.com/als9946" target="_blank">전북</a>
                            <a href="{{ app_url('/pass/campus/show/code/605010', 'police') }}" target="_blank">경기 광주(기숙형)</a>
                        </li>
                        <li>
                            <strong>경찰간부</strong>
                            <a href="http://wpa.willbes.net/main_spo.asp?category_id=912" target="_blank">신림(한림법학원)</a>
                        </li>
                        <li>
                            <strong>교원임용</strong>
                            <a href="http://ssam.willbes.net" target="_blank">노량진</a>
                        </li>
                        <li>
                            <strong>고등고시</strong>
                            <a href="http://www.hanlimgosi.co.kr" target="_blank">신림(한림법학원)</a>
                        </li>
                        <li>
                            <strong>전문자격</strong>
                            <a href="http://value.willbes.net" target="_blank">감평/노무-신림(한림법학원)</a><span>|</span>
                            <a href="http://www.namucpa.com" target="_blank">세무/회계 종로(나무아카데미)</a><span>|</span>
                            <a href="http://patent.willbes.net" target="_blank">변리사-강남(한림법학원)</a>
                        </li>
                    </ul>            
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
            {{--
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
            --}}
            <div class="Layer-Cont">
                <div class="Layer-SubTit tx-blue mt20 mb10">특정 서비스에 대한 문의는 해당 사이트로 바로 문의주셔야 빠르게 답변을 받을 수 있습니다.</div>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable csTable under-gray upper-black tx-gray">
                        <colgroup>
                            <col style="width: 140px;">
                            <col style="width: 130px;">
                            <col style="width: 180px;">
                            <col>
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
                                    평일 9:00~17:00<br/>
                                    주말/공휴일 휴무
                                </td>
                            </tr>
                            <tr>
                                <td class="w-site" rowspan="2">임용</td>
                                <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                <td rowspan="2" class="w-call">1544-3169</td>
                                <td rowspan="2" class="w-time tx-left pl25">
                                    평일/주말 09:00~22:00
                                </td>
                            </tr>
                            <tr>
                                <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
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
                            <tr>
                                <td class="w-site" rowspan="2">고등고시</td>
                                <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                <td class="w-call">1566-4770  ▶ 2</td>
                                <td class="w-time tx-left pl25">
                                    평일 9:00~18:00 (점심시간 12시~13시)<br/>
                                    주말/공휴일 휴무
                                </td>
                            </tr>
                            <tr>
                                <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                <td class="w-call">1544-1881 ▶ 1</td>
                                <td class="w-time tx-left pl25">평일/주말 8:00~19:00</td>
                            </tr>
                            <tr>
                                <td class="w-site" rowspan="3">전문자격증</td>
                                <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                <td class="w-call">1566-4770 ▶ 4                                            </td>
                                <td class="w-time tx-left pl25">
                                    평일 9:00~18:00 (점심시간 12시~13시)<br/>
                                    주말/공휴일 휴무
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                <td class="w-call">신림(본원) 1544-4774 ▶ 4</td>
                                <td class="w-time tx-left pl25">평일/주말 08:00~19:00</td>
                            </tr>
                            <tr>
                                <td class="w-call">강남(분원) 1544-4774 ▶ 4</td>
                                <td class="w-time tx-left pl25">평일/주말 08:00~19:00</td>
                            </tr>
                            <tr>
                                <td class="w-site">N잡/어학/취업</td>
                                <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                <td class="w-call">1544-5006</td>
                                <td class="w-time tx-left pl25">
                                    평일 9:00~18:00 (점심시간 12시~13시)<br/>
                                    주말/공휴일 휴무
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div> 
    
    <div class="njobBn">
        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_bn_200228.png" alt="N job"></a>
    </div>
</div>
<!-- End Container -->
@stop