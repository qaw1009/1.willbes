@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">실무자격증<span class="row-line">|</span></li>
                <li class="subTit">진로직업체험지도사</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">교수진소개 메인</li>
                            <li><a href="#none">신규강좌게시판</li>
                            <li><a href="#none">경제학</a></li>
                            <li><a href="#none">행정법</a></li>
                            <li><a href="#none">행정학</a></li>
                            <li><a href="#none">정치학</a></li>
                            <li><a href="#none">국제법</a></li>
                            <li><a href="#none">재정학</a></li>
                            <li><a href="#none">정책학</a></li>
                            <li><a href="#none">정보체계론</a></li>
                            <li><a href="#none">국제경제학</a></li>
                            <li><a href="#none">교육학</a></li>
                            <li><a href="#none">PSAT</a></li>
                            <li><a href="#none">영어</a></li>
                            <li><a href="#none">한국사능력검정시험</a></li>
                            <li class="Tit">교수님 홈</li>
                            <li><a href="#none">개설강좌</a></li>
                            <li><a href="#none">무료강좌</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">학습자료실</a></li>
                            <li><a href="#none">수강후기</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">학원강의신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">학원강의신청</a></li>
                            <li><a href="#none">방문결제접수</a></li>
                            <li><a href="#none">학원공지사항</a></li>
                            <li><a href="#none">강의실배정표</a></li>
                            <li><a href="#none">강의시간표</a></li>
                            <li><a href="#none">강의자료실</a></li>
                            <li><a href="#none">강의계획서</a></li>
                            <li><a href="#none">전국모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">온라인수강신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">단강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="#none">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">수험정보</a></li>
                            <li><a href="#none">학습가이드</a></li>
                            <li><a href="#none">시험통계</a></li>
                            <li><a href="#none">수험 FAQ</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재구매</a>
                </li>
                <li class="dropdown">
                    <a href="#none">고객센터</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">고객센터 HOME</a></li>
                            <li><a href="#none">자주하는 질문</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">1:1 상담</a></li>
                            <li class="Tit">수강지원</li>
                            <li><a href="#none">PC원격지원</a></li>
                            <li><a href="#none">학습프로그램설치</a></li>
                        </ul>
                    </div>
                </li>
                <li class="hanlim3094">
                    <a href="#none" target="_self">
                        학원 방문 결제 
                        <span class="arrow-Btn">></span>
                    </a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>자격정보</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">자격정보</h3>
            <ul class="guideTab NGR">
                <li><a href="#tab01" class="on">커리큘럼</a></li>
                <li><a href="#tab02">현장교육사례</a></li>
            </ul>
            <div id="tab01">
                <h4 class="NGR mt20">진로직업체험지도사란?</h4>
                <div>
                    진로직업 체험활동의 활성화 및 자유학기제에 대비하여 학교와 지자체로 찾아가 다양한 직업의 세계를 소개하는 진로직업체험 전문강사입니다. 
                </div>
                <h5 class="NGR mt20">가. 찾아가는 직업 체험 교육의 핵심 내용</h5>
                <ul class="st01">
                    <li>강사, 교구재를 모두 준비해 학교를 찾아가 생생한 직업체험 프로그램 진행</li>
                    <li>학교 교실, 강당, 운동장, 인근 공원 등 어떤 장소에서도 진행 가능</li>
                    <li>15년 역사의 이코노아이의 콘텐츠와 운영 경험을 담은 직업 체험형 프로그램 </li>
                    <li>초등 저학년~고등학생 및 강사 양성 과정 운영</li>
                    <li>현장에서 축적한 다양한 콘텐츠(경제 금융, 진로직업, 창의체험 등)와 운영 경험으로 학생들이 쉽고 재미있게 활동</li>
                    <li>지역 상황에 맞는 공동 프로그램 개발, 강사 양성 과정의 운영, 이러닝 등 제휴추진 가능</li>                    
                </ul>
                <h5 class="NGR mt20">나. 찾아가는 직업 체험 교육의 효용성</h5>
                <ul class="st01">
                    <li>직업 체험장이 있으나 절대 부족. 특히 이동에 따른 안전, 비용, 시간 등 여러 가지 문제로 활용도 낮음. 학교 인근 직장, 대학 등의 소극적 대응으로 기대했던 교육성과를 내지 못하고 있음. 
                        인근 직장은 안전 문제와 관리 인력 문제로, 학생들의 눈높이에 맞는 프로그램 준비가 안된 상태<br>
                        → 이같은 상황에서 학교로 가는 교육, 우리 학교와 지역을 기반으로 한 직업 체험 교육 은 가장 현실적인 대안</li>
                    <li>학교에서 교육을 하더라도 체험장처럼 즐거운 활동 프로그램 필수<br>
                        → 제한된 시간, 제한된 장소와 시설로 기본 교육에서 결과물까지 마무리 하는 프로그램의 경우 상당한 노하우 필요(기존 강의, 공작 체험 활동 중심과 전혀 다른 차원의 프로그램)</li>                    
                </ul>
            </div>   
            
            <div id="tab02">
                <h5 class="NGR mt20">가. 이화미디어 고등학교 진로직업체험</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided borderZero">
                        <colgroup>
                            <col width="50%">
                            <col>
                        </colgroup>
                        <tbody>
                            <tr>
                                <td valign="top" class="tx-left" style="vertical-align:top">
                                    <ul class="st01">
                                        <li>주제 : 우리는 동네PD다!</li>
                                        <li>일시 : 2016.5.4</li>
                                        <li>대상 : 이화미디어 고등학교 2,3학년</li>
                                        <li>내용 : 학교 인근의 상점, 단체의 광고 제작, 실제 광고로 활용하도록 
                                            해당 상점과 단체에 완성된 광고 전달</li>
                                    </ul>
                                </td>
                                <td>
                                    <img src="https://static.willbes.net/public/images/promotion/sub/310103_01_01.jpg"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h5 class="NGR mt20">나. 서울 중구청 관내 초등학교 직업체험교육</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided borderZero">
                        <colgroup>
                            <col width="50%">
                            <col>
                        </colgroup>
                        <tbody>
                            <tr>
                                <td valign="top" class="tx-left" style="vertical-align:top">
                                    <ul class="st01">
                                        <li>주제 : 내 꿈은 카피라이터!</li>
                                        <li>일시 : 2016.4.11</li>
                                        <li>대상 : 서울 중구청 내 모든 초등학교</li>
                                        <li>내용 : 어린이 직업체험교육, 영어교육과 벤치마킹하여 광고 제작 등 다양한 작업을 체험하는 프로그램</li>
                                    </ul>
                                </td>
                                <td>
                                    <img src="https://static.willbes.net/public/images/promotion/sub/310103_01_02.jpg"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h5 class="NGR mt20">다. 우리 동네 광고 만들기 - "내 꿈은 카피라이터"</h5>
                <ul class="st01">
                    <li>서울 중구청은 25개의 전통시장</li>
                    <li>전통시장 특성을 학생들 직업체험과 연계시기면서 우리 동네 이해하기</li>
                    <li>4교시 진행(광고 기본 교육 시장 방문, 취재, 제작과 발표회)</li>
                    <li>우수작품 선정 시상식과 전시회(10월 하순 중구청 강당 및 로비</li>
                    <li>90%가 넘는 높은 만족도(2014년에 이어 2015년, 2016년 연속 진행)</li>
                    <li>2016년 전통시장에 이어 중구의 관광 및 유적지 대상에 포함시켜 진행</li>
                </ul>
                <img src="https://static.willbes.net/public/images/promotion/sub/310103_01_03.jpg"/>
                <h5 class="NGR mt20">라. 동네 기자단 출동!</h5>
                <ul class="st01">
                    <li>(주)이코노아이 진로작업 체험 프로그램의 전형적인 예시</li>
                    <li>학교, 수련관 교육, 학교 인근의 우리 동네 취재, 편집, 파일로 재편집</li>
                    <li>경기도 고양시에서는 어린이 기자단(이름 '열다')을 통해 상설 교육을 하고 있으며, 앞으로 이를 전국적으로 확대할 계획</li>
                </ul>
                <img src="https://static.willbes.net/public/images/promotion/sub/310103_01_04.jpg"/>
                <h5 class="NGR mt20">마. (주)이코노아이 고유의 신문 제작 툴</h5>
                <img src="https://static.willbes.net/public/images/promotion/sub/310103_01_05.jpg"/>
                <h5 class="NGR mt20">바. 스토리샷(즉석 사진 촬영 및 현장 인화</h5>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided borderZero">
                        <colgroup>
                            <col width="50%">
                            <col>
                        </colgroup>
                        <tbody>
                            <tr>
                                <td valign="top" class="tx-left" style="vertical-align:top">
                                    <ul class="st01">
                                        <li>스마트폰과 스토리샷 기기를 이용하여 취재 현장에서 찍은 사진을 곧바로 인화, 신문 편집 툴에서 사용할 수 있도록 구성</li>
                                    </ul>
                                </td>
                                <td>
                                    <img src="https://static.willbes.net/public/images/promotion/sub/310103_01_06.jpg"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 

        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop