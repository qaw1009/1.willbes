{{--@extends('willbes.pc.layouts.master')--}}
@extends('html.layouts.master')
@section('content')
<style type="text/css">

</style>

<!-- Container -->
<div id="Container" class="Container ssam NGR c_both">

    <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
        <div class="Section widthAuto">
            <div class="onSearch NGR">
                <div>
                    <input type="hidden" name="cate" id="unifiedSearch_cate" value="">
                    <input type="hidden" name="search_class" id="unifiedSearch_class" value="">
                    <input type="hidden" name="search_target" id="unifiedSearch_target" value="">
                    <input type="hidden" name="etc_info" id="unifiedEtc_info" value="">
                    <input type="text" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="온라인강의 검색" title="온라인강의 검색" maxlength="100"/>
                    <label for="onsearch"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">검색</button></label>
                </div>
                <div class="searchPop">
                    <div class="popTit">인기검색어</div>
                    <ul>
                        <li><a href="#nnon">신광은</a></li>
                        <li><a href="#nnon">무료특강</a></li>
                        <li><a href="#nnon">형소법</a></li>
                        <li><a href="#nnon">기미진</a></li>
                        <li><a href="#nnon">모의고사</a></li>
                        <li><a href="#nnon">모의고사</a></li>
                        <li><a href="#nnon">모의고사</a></li>
                        <li><a href="#nnon">모의고사</a></li>
                        <li><a href="#nnon">모의고사</a></li>
                        <li><a href="#nnon">모의고사</a></li>
                        <li><a href="#nnon">모의고사</a></li>
                        <li><a href="#nnon">모의고사</a></li>
                        <li><a href="#nnon">모의고사</a></li>
                        <li><a href="#nnon">모의고사</a></li>
                        <li><a href="#nnon">모의고사</a></li>
                        <li><a href="#nnon">모의고사</a></li>
                        <li><a href="#nnon">모의고사</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </form>


    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">학원<span class="row-line">|</span></li>
                <li class="subTit">윌비스 임용</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">내강의실</a>
                </li>
                <li class="dropdown">
                    <a href="#none">강의안내/신청</a>
                    <div class="drop-Box list-drop-Box list-drop-Box-ssam">
                        <table class="ssamProf">
                            <thead>
                                <tr>
                                    <th rowspan="2" scope="col">교육학</th>
                                    <th colspan="2" scope="col">유.초등</th>
                                    <th colspan="10" scope="col">중등</th>
                                </tr>
                                <tr>
                                    <th>유아</th>
                                    <th>초등</th>
                                    <th>국어</th>
                                    <th>영어</th>
                                    <th>수학</th>
                                    <th>생물</th>
                                    <th>도덕윤리</th>
                                    <th>역사</th>
                                    <th>음악</th>
                                    <th>전기전자통신</th>
                                    <th>정보컴퓨터</th>
                                    <th>중국어</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <ul>
                                        <li><a href="#none">이인재</a></li>
                                        <li><a href="#none">홍의일</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li><a href="#none">민정선</a></li>
                                </td>
                                <td>
                                    <ul>
                                        <li><a href="#none">배재민</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li class="subTit">국어<br>국어교육학</li>
                                        <li><a href="#none">송원영</a></li>
                                        <li class="subTit">국어문법</li>
                                        <li><a href="#none">이원근</a></li>
                                        <li><a href="#none">권보민</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li class="subTit">일반영어<br>영미문학</li>
                                        <li><a href="#none">송원영</a></li>
                                        <li class="subTit">영어학</li>
                                        <li><a href="#none">김영문</a></li>
                                        <li class="subTit">영어학<br>영어교육론</li>
                                        <li><a href="#none">공훈</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li class="subTit">전공수학</li>
                                        <li><a href="#none">김철홍</a></li>
                                        <li class="subTit">수학교육론</li>
                                        <li><a href="#none">박태영</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li class="subTit">전공생물</li>
                                        <li><a href="#none">강치욱</a></li>
                                        <li class="subTit">생물교육론</li>
                                        <li><a href="#none">양혜정</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li><a href="#none">김병찬</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li><a href="#none">최용림</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li><a href="#none">다이애나</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li><a href="#none">최우영</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li class="subTit">정보컴퓨터</li>
                                        <li><a href="#none">송광진</a></li>
                                        <li class="subTit">정컴교육론</li>
                                        <li><a href="#none">장순선</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li><a href="#none">정경미</a></li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </li>
                <li>
                    <a href="#none">교재안내/신청</a>
                </li>
                <li>
                    <a href="#none">무료강의</a>
                </li>
                <li>
                    <a href="#none">임용정보</a>
                </li>
                <li>
                    <a href="#none">고객센터</a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Section MainVisual mt20">
        <div class="VisualBox p_re">            
            <div id="MainRollingSlider" class="MaintabBox">
                <ul class="MaintabSlider">
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_bn_2000x500_01.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_bn_2000x500_02.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_bn_2000x500_03.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_bn_2000x500_04.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_bn_2000x500_05.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_bn_2000x500_03.jpg" alt="배너명"></a></li>
                </ul>                  
                <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p> 
            </div> 
            <div id="MainRollingDiv" class="MaintabList">
                <div class="Maintab">
                    <span><a data-slide-index="0" href="javascript:void(0);" class="active">퀵서머리</a></span>
                    <span><a data-slide-index="1" href="javascript:void(0);" class="">문제풀이패키지</a></span>
                    <span><a data-slide-index="2" href="javascript:void(0);" class="">인강무료체험&환승할인</a></span>
                    <span><a data-slide-index="3" href="javascript:void(0);" class="">2021학년도 연간패키지</a></span>
                    <span><a data-slide-index="4" href="javascript:void(0);" class="">2021대비 합격전략설명회</a></span>
                    <span><a data-slide-index="5" href="javascript:void(0);" class="">환승할인</a></span>
                </div>
            </div>           
        </div>        
    </div>

    <div class="Section mt40">
        <div class="widthAuto"> 
            <div class="noticeTabs">
                <div class="will-listTit">공지사항</div>
                <div class="tabBox noticeBox">
                    <div class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">                            
                            <li><a href="#none"><span>HOT</span>2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none"><span>HOT</span>2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">[공지] 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="noticeTabs">
                <div class="will-listTit">강의 업데이트</div>
                <div class="tabBox noticeBox">
                    <div class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><strong class="tx-blue">전공수학 김철홍</strong> [인강전용] 2020 확률과 통계 문제풀이 - 수강생용 </a></li>
                            <li><a href="#none"><strong class="tx-blue">전공수학 김철홍</strong> 2020 (9~10월) (내용학+수교론) 실전 모의고사반 - 직강 복습용 </a></li>
                            <li><a href="#none"><strong class="tx-blue">전공수학 박태영</strong> 2020 (9~10월) (내용학+수교론) 실전 모의고사반 - 직강 복습용 </a></li>
                            <li><a href="#none"><strong class="tx-blue">전공수학 김철홍</strong> 2020 (9~10월) (내용학+수교론) 실전 모의고사반 </a></li>
                            <li><a href="#none"><strong class="tx-blue">도덕윤리 김병찬</strong> 직강수강생용) 2020 (9~10월) 모의고사반 - (9/17~ 강의) </a></li>
                            <li><a href="#none"><strong class="tx-blue">전공국어 송원영</strong> 직강생전용) 2020 9~11송원영 국어 10주 완성 실전 모고를 통한 이론 완성 + 파이널 시험 직전 출제 예상테마 </a></li>
                            <li><a href="#none"><strong class="tx-blue">전공국어 송원영</strong> 2020 9~11송원영 국어 10주 완성 실전 모고를 통한 이론 완성 + 파이널 시험 직전 출제 예상테마 </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="Section Section1 mt40">
        <div class="widthAuto smallTit NSK-Black">          
            <p>
                <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_img01.png">
                <span><strong>기출적중&수강후기로 증명</strong>하는 윌비스 임용 교수진</span>
                <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_img02.png">
            </p>            
        </div> 
        <div class="VisualSubBox p_re mt20">               
            {{--<img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_title.jpg">  --}}                  
            <div id="SubRollingSlider" class="SubtabBox">
                <ul class="SubtabSlider">
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_mjs.jpg" alt="유아 민정선"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_bjm.jpg" alt="초등 배재민"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kcw.jpg" alt="교육학 김차웅"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_lij.jpg" alt="교육한 이인재"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_hei.jpg" alt="교육한 홍의일"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_swy.jpg" alt="전공국어 송원영"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_lwg.jpg" alt="전공국어 이원근"></a></li>
                    <li><a href="#none"><img src="http://file1.willbes.net/datassam/event/191106_main_wsam32.jpg" alt="전공국어 권보민"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kys.jpg" alt="전공영어 김유석"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kym.jpg" alt="전공영어 김영문"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kh.jpg" alt="전공영어 공훈"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kcm.jpg" alt="전공수학 김철홍"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_bty.jpg" alt="수학교육론 박태영"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kcu.jpg" alt="전공생물 강치욱"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_yhj.jpg" alt="생물교육론 양혜정"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kbc.jpg" alt="도덕윤리 김병찬"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_diana.jpg" alt="음악 다이애나"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_cuy.jpg" alt="전기전자통신 최우영"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_sgj.jpg" alt="정보컴퓨터 송광진"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_jss.jpg" alt="정컴교육론 장순선"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_jgm.jpg" alt="전공중국어 정경미"></a></li>
                </ul>                  
                <p class="leftBtn" id="imgBannerLeft2"><a href="#none">이전</a></p>
                <p class="rightBtn" id="imgBannerRight2"><a href="#none">다음</a></p> 
            </div> 
            <div id="SubRollingDiv" class="SubtabList">
                <ul class="Subtab">
                    <li><a data-slide-index='0' href="javascript:void(0);" class="active">유아 민정선</a></li>
                    <li><a data-slide-index='1' href="javascript:void(0);">초등 배재민</a></li>
                    <li><a data-slide-index='2' href="javascript:void(0);">교육학 김차웅</a></li>
                    <li><a data-slide-index='3' href="javascript:void(0);">교육학 이인재</a></li>
                    <li><a data-slide-index='4' href="javascript:void(0);">교육학 홍의일</a></li>
                    <li><a data-slide-index='5' href="javascript:void(0);">전공국어 송원영</a></li>
                    <li><a data-slide-index='6' href="javascript:void(0);">전공국어 이원근</a></li>
                    <li><a data-slide-index='7' href="javascript:void(0);">전공국어 권보민</a></li>
                    <li><a data-slide-index='8' href="javascript:void(0);">전공영어 김유석</a></li>
                    <li><a data-slide-index='9' href="javascript:void(0);">전공영어 김영문</a></li>
                    <li><a data-slide-index='10' href="javascript:void(0);">전공영어 공훈</a></li>
                    <li><a data-slide-index='11' href="javascript:void(0);">전공수학 김철홍</a></li>
                    <li><a data-slide-index='12' href="javascript:void(0);">수학교육론 박태영</a></li>
                    <li><a data-slide-index='13' href="javascript:void(0);">전공생물 강치욱</a></li>
                    <li><a data-slide-index='14' href="javascript:void(0);">생물교육론 양혜정</a></li>
                    <li><a data-slide-index='15' href="javascript:void(0);">도덕윤리 김병찬</a></li>
                    <li><a data-slide-index='16' href="javascript:void(0);">전공음악 다이애나</a></li>
                    <li><a data-slide-index='17' href="javascript:void(0);">전기전자통신 최우영</a></li>
                    <li><a data-slide-index='18' href="javascript:void(0);">정보컴퓨터 송광진</a></li>
                    <li><a data-slide-index='19' href="javascript:void(0);">정컴교육론 장순선</a></li>
                    <li><a data-slide-index='20' href="javascript:void(0);">전공중국어 정경미</a></li>
                </ul>
            </div>           
        </div> 
    </div>

    <div class="Section Section2 mt40">
        <div class="widthAuto p_re">
            <div class="will-nTit bd-none">윌비스 임용 <span class="tx-color">수강후기</span></div>
            <div class="goBtns">
                <ul>
                    <li><a href="#none">합격수기 ></a></li>
                    <li><a href="#none" onclick="openWin('LayerReply'),openWin('Reply')">수강후기 전체보기 ></a></li>
                </ul>
            </div>
            <div class="reviewBox">
                <div class="review">
                    <ul>
                        <li>
                            <a href="#none">
                                <div class="reviewInfo">도덕윤리 <span>|</span> 김병찬 <span>|</span> 2019 (9~10월) 모의고사반</div>
                                <div class="title"><img src="/public/img/willbes/sub/star5.gif"/> 김병찬교수님 강의를 들으면 합격의 길이 보입니다. ^^.  <span class="f_right">황성*</span></div>
                                <div class="reviewTxt">
                                    입학할때 부터 학교 선배들도 항상 김병찬교수님 강의를 듣고 있었고 사물함엔 김병찬 교수님 교재로 빼곡했습니다.
                                    그냥 당연히 임용준비하는 사람은 다 듣는가보다 하고 자연스레 4학년때 김병찬 교수님 직강을 신청하여 듣게됐습니다.
                                    직접 들어보니 정말 대단하시다는 생각이 들었습니다. 흐름에 맞춰 개념정리를 쭈~욱 해주시는데 들어주시는 예시들도
                                    너무 적절했고 어려운 학자들도 이해가 잘됐습니다. 무엇보다도 교수님 강의의 가장 큰 장점은 확실한 반복적 학습인것 같습니다. 
                                    1년 패키지를 듣게되면 강의마다 총 4번의 복습을 거치게 돼있습니다. 개념정리, 기출분석, 문제풀이, 모의고사 각각 
                                    다른 수업같지만 그 주제에 맞춰 이론을 시간내에 최소 4번 복습할 수 있습니다. 작년 초수에 수업도 들으면서 교생도 나가고 시간이 없어서 원문, 
                                    교과서 거의 못봤지만 교수님 강의듣고 복습하고 시키시는대로 (?) 해서 1차 합격했습니다!
                                </div>                                
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <div class="reviewInfo">전공국어 <span>|</span> 권보민 <span>|</span> 2019 9~10월 국어문법 실전모의고사반</div>
                                <div class="title"><img src="/public/img/willbes/sub/star3.gif"/> 권보민 선생님 강의를 들으셔야 합니다_3 <span class="f_right">황성*</span></div>
                                <div class="reviewTxt">
                                    매일 공부의 반 이상을 문법에 투자하기도 했습니다. 
                                    3) 최근 문법 학계에서 중시되는 주제를 바탕으로 한 확실한 적중
                                    권보민 교수님은 문법 학회에 참여하시는 전문가이십니다. 학회 참여를 바탕으로 최근 문법 학계에서 논의되는 것이 무엇인지를 파악하시므로 적중률이 높습니다. 
                                    가령 2017학년도 현대 문법에서 설명 의문문과 판정 의문문의 구분, 중세 문법에서 ‘ㅇ’ 탈락(약화)의 구분, 2019학년도 기입형인 
                                    ‘-고져’와 ‘-과뎌’의 차이점, 서술형의 어미 문제는 수업 시간에 지속적으로 강조하셨던 것입니다. 고백하자면 저는 선생님이 “가령 ‘ㅇ’에 음가가 있는가 
                                    없는가’와 같이 논란이 있는 사항에 대해서는 어떻게 공부해야 할까요?”라는 질문에 대해 ‘둘 다를 알아두셔야 합니다’라고 했을 때 ‘에이 그런 건 시험에 
                                    안 나올 거야. 확실한 게 나올 거야.’라고 생각했었습니다. 그리고 수업 시간에 ‘-고져’와 ‘-과뎌’의 차이가 지속적으로 나올 때 ‘저런 건 한 번도 안 들어 봤고 안 나올 텐데 
                                    왜 저렇게 자꾸 설명하시지ㅠㅠ’라고 생각했었습니다. 그런데 결론은 다 출제되었죠. 권보민 선생님의 적중률을 믿으시길 바랍니다. 
                                </div>                               
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <div class="reviewInfo">전공영어 <span>|</span> 공훈 <span>|</span> 2019 11월 공훈 영교론/영어학 최종모의고사반</div>
                                <div class="title"><img src="/public/img/willbes/sub/star2.gif"/> 공훈 교수님 영어학 강의 1년 수강후기 <span class="f_right">황성*</span></div>
                                <div class="reviewTxt">
                                    입학할때 부터 학교 선배들도 항상 김병찬교수님 강의를 듣고 있었고 사물함엔 김병찬 교수님 교재로 빼곡했습니다.
                                    그냥 당연히 임용준비하는 사람은 다 듣는가보다 하고 자연스레 4학년때 김병찬 교수님 직강을 신청하여 듣게됐습니다.
                                    직접 들어보니 정말 대단하시다는 생각이 들었습니다. 흐름에 맞춰 개념정리를 쭈~욱 해주시는데 들어주시는 예시들도
                                    너무 적절했고 어려운 학자들도 이해가 잘됐습니다. 무엇보다도 교수님 강의의 가장 큰 장점은 확실한 반복적 학습인것 같습니다. 
                                    1년 패키지를 듣게되면 강의마다 총 4번의 복습을 거치게 돼있습니다. 개념정리, 기출분석, 문제풀이, 모의고사 각각 
                                    다른 수업같지만 그 주제에 맞춰 이론을 시간내에 최소 4번 복습할 수 있습니다. 작년 초수에 수업도 들으면서 교생도 나가고 시간이 없어서 원문, 
                                    교과서 거의 못봤지만 교수님 강의듣고 복습하고 시키시는대로 (?) 해서 1차 합격했습니다!
                                </div>                               
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="Section Section3 mt40">
        <div class="widthAuto">
            <div class="will-nTit">윌비스 임용 <span class="tx-color">합격 교수진</span></div>
            <ul>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof01.jpg" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_kcw.png" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof02.jpg" title="배너명"></a></li>
            </ul>
        </div>
    </div>

    <div class="Section Section4 mt80">
        <div class="widthAuto">  
            <div class="widthAuto smallTit NSK-Black">          
                <p><span>윌비스 임용 <strong>실시간 인기강의 TOP3</strong></span></p>            
            </div>
            <div class="reference">* 접속 시간 기준, 24시간 내 홈페이지 강의 결제 순</div>
            <ul class="bestLecBox">
                <li class="bestLec">                    
                    <a href="#none">
                        <ul class="lecinfo">
                            <li class="NSK-Black"><span class="NSK">유아</span>민정선 교수</li>
                            <li><strong>이론반</strong></li>
                            <li><span>2020 (7~9월) 영역별 정리/문제풀이반 (10주)</span></li>
                        </ul>                                 
                    </a>  
                    <div class="profImg"><img src="https://static.willbes.net/public/images/promotion/main/2018/prof_280x290_01.png" title="교수명"></div>
                    <div class="best NSK-Black">1</div>                         
                </li>
                <li class="bestLec">                       
                    <a href="#none">
                        <ul class="lecinfo">
                            <li class="NSK-Black"><span class="NSK">유아</span>민정선 교수</li>
                            <li><strong>이론반</strong></li>
                            <li><span>2020 (7~9월) 영역별 정리/문제풀이반 (10주)</span></li>
                        </ul>                                    
                    </a>
                    <div class="profImg"><img src="https://static.willbes.net/public/images/promotion/main/2018/prof_280x290_02.png" title="교수명"></div>
                    <div class="best NSK-Black">2</div>
                </li>
                <li class="bestLec">                    
                    <a href="#none">
                        <ul class="lecinfo">
                            <li class="NSK-Black"><span class="NSK">유아</span>민정선 교수</li>
                            <li><strong>이론반</strong></li>
                            <li><span>2020 (7~9월) 영역별 정리/문제풀이반 (10주)</span></li>
                        </ul>                                       
                    </a>
                    <div class="profImg"><img src="https://static.willbes.net/public/images/promotion/main/2018/prof_280x290_03.png" title="교수명"></div>
                    <div class="best NSK-Black">3</div>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section Section5 mt80">
        <div class="widthAuto">
            <div class="will-nTit">
                윌비스 임용 <span class="tx-color">교재</span>
                <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
            </div>
            <div class="bookContent">
                <ul class="bookList">
                    <li>
                        <div class="bookImg">
                            <a href="#none" onclick="openWin('InfoForm')"><img src="https://static.willbes.net/public/images/promotion/main/2018/book_311683_sm.jpg" title="교재명"></a>
                        </div>
                        <div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </div>
                    </li>
                    <li>
                        <div class="bookImg">
                            <a href="#none" onclick="openWin('InfoForm')"><img src="https://static.willbes.net/public/images/promotion/main/2018/book_311691_sm.jpg" title="교재명"></a>
                        </div>
                        <p>[회계사]</p>
                        <p>2021 법률저널 LEET 전국 봉투 모의고사 제4회 - 20.06.21 시행</p>
                        <p><span>28,000원</span> → <strong>25,200원</strong></p>
                    </li>
                    <li>
                        <div class="bookImg">
                            <a href="#none" onclick="openWin('InfoForm')"><img src="https://static.willbes.net/public/images/promotion/main/2018/book_311717_sm.jpg" title="교재명"></a>
                        </div>
                        <p>[회계사]</p>
                        <p>2020 슬림한 친족 상속법의 맥</p>
                        <p><span>28,000원</span> → <strong>25,200원</strong></p>
                    </li>
                    <li>
                        <div class="bookImg">
                            <a href="#none" onclick="openWin('InfoForm')"><img src="https://static.willbes.net/public/images/promotion/main/2018/book_311728_sm.jpg" title="교재명"></a>
                        </div>
                        <p>[회계사]</p>
                        <p>2020 민사소송법과 부속법 조문집</p>
                        <p><span>28,000원</span> → <strong>25,200원</strong></p>
                    </li>
                    <li>
                        <div class="bookImg">
                            <a href="#none" onclick="openWin('InfoForm')"><img src="https://static.willbes.net/public/images/promotion/main/2018/book_311719_sm.jpg" title="교재명"></a>
                        </div>
                        <p>[회계사]</p>
                        <p>2020 원가관리회계 문제풀이</p>
                        <p><span>28,000원</span> → <strong>25,200원</strong></p>
                    </li>
                    <li>
                        <div class="bookImg">
                            <a href="#none" onclick="openWin('InfoForm')"><img src="https://static.willbes.net/public/images/promotion/main/2018/book_311683_sm.jpg" title="교재명"></a>
                        </div>
                        <div>
                            <p>[회계사]</p>
                            <p>2020 원가관리회계 문제풀이</p>
                            <p><span>28,000원</span> → <strong>25,200원</strong></p>
                        </div>
                    </li>
                    <li>
                        <div class="bookImg">
                            <a href="#none" onclick="openWin('InfoForm')"><img src="https://static.willbes.net/public/images/promotion/main/2018/book_311691_sm.jpg" title="교재명"></a>
                        </div>
                        <p>[회계사]</p>
                        <p>2021 법률저널 LEET 전국 봉투 모의고사 제4회 - 20.06.21 시행</p>
                        <p><span>28,000원</span> → <strong>25,200원</strong></p>
                    </li>
                    <li>
                        <div class="bookImg">
                            <a href="#none" onclick="openWin('InfoForm')"><img src="https://static.willbes.net/public/images/promotion/main/2018/book_311717_sm.jpg" title="교재명"></a>
                        </div>
                        <p>[회계사]</p>
                        <p>2020 슬림한 친족 상속법의 맥</p>
                        <p><span>28,000원</span> → <strong>25,200원</strong></p>
                    </li>
                    <li>
                        <div class="bookImg">
                            <a href="#none" onclick="openWin('InfoForm')"><img src="https://static.willbes.net/public/images/promotion/main/2018/book_311728_sm.jpg" title="교재명"></a>
                        </div>
                        <p>[회계사]</p>
                        <p>2020 민사소송법과 부속법 조문집</p>
                        <p><span>28,000원</span> → <strong>25,200원</strong></p>
                    </li>
                    <li>
                        <div class="bookImg">
                            <a href="#none" onclick="openWin('InfoForm')"><img src="https://static.willbes.net/public/images/promotion/main/2018/book_311719_sm.jpg" title="교재명"></a>
                        </div>
                        <p>[회계사]</p>
                        <p>2020 원가관리회계 문제풀이</p>
                        <p><span>28,000원</span> → <strong>25,200원</strong></p>
                    </li>
                </ul>  
                <p class="leftBtn" id="imgBannerLeft3"><a href="#none">이전</a></p>
                <p class="rightBtn" id="imgBannerRight3"><a href="none">다음</a></p>         
            </div>
        </div>
    </div>   
    
    <div class="Section Section6 mt60">
        <div class="widthAuto">
            <div class="will-nTit">윌비스 임용 <span class="tx-color">시험정보</span></div>
            <div class="examInfo">
                <ul class="examTop">
                    <li>
                        <div class="titleSubject NSK-Black">유아</div>
                        <div class="tx16">전국 모집인원 비교</div>
                        <div class="subject">
                            <select id="" name="">                                            
                                <option value="">유아</option>                                        
                                <option value="">초등</option>                                        
                                <option value="">중등전체</option>                                        
                                <option value="">국어</option>                                        
                                <option value="">수학</option>                                        
                                <option value="">역사</option>                                        
                                <option value="">일반사회</option>                                        
                                <option value="">도덕윤리</option>                                        
                                <option value="">체육</option>                                        
                                <option value="">음악</option>                                        
                            </select>
                        </div>
                    </li>
                    <li style="display: block;">
                        {{--유아
                        <table>
                            <colgroup>
                                <col width="77px">
                                <col width="77px">
                                <col width="77px">
                                <col width="77px">
                                <col width="77px">
                                <col width="77px">
                                <col width="*">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th colspan="2">2019학년도</th>
                                    <th colspan="2">2019 추시</th>
                                    <th colspan="2">2020학년도</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="first">
                                    <td>모집 인원</td>
                                    <td>지원 인원</td>
                                    <td>모집 인원</td>
                                    <td>지원 인원</td>
                                    <td>모집 인원</td>
                                    <td>지원 인원</td>
                                </tr>
                                <tr>
                                    <td>948</td>
                                    <td>9,955</td>                                    
                                    <td>482</td>
                                    <td>12,505</td>                          
                                    <td>1,154</td>
                                    <td>13,103</td>                                    
                                </tr>
                            </tbody>
                        </table>
                        --}}
                        <table>
                            <colgroup>
                                <col width="77px">
                                <col width="77px">
                                <col width="77px">
                                <col width="77px">
                                <col width="77px">
                                <col width="77px">
                                <col width="*">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th colspan="2">2019학년도</th>
                                    <th colspan="2">2020학년도</th>
                                    <th colspan="2">증감</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="first">
                                    <td>모집 인원</td>
                                    <td>지원 인원</td>
                                    <td>모집 인원</td>
                                    <td>지원 인원</td>
                                    <td>모집 인원</td>
                                    <td>지원 인원</td>
                                </tr>
                                <tr>
                                    <td>3,629</td>
                                    <td>6,482</td>                                  
                                    <td>3,514</td>
                                    <td>6,739</td>                          
                                    <td><span class="down">▼</span>115</td>
                                    <td><span class="up">▲</span>257</td>                                    
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li style="display: none;">
                        <table>
                            <colgroup>
                                <col width="77px">
                                <col width="77px">
                                <col width="77px">
                                <col width="77px">
                                <col width="77px">
                                <col width="77px">
                                <col width="*">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th colspan="2">2019학년도</th>
                                    <th colspan="2">2019 추시</th>
                                    <th colspan="2">2020학년도</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="first">
                                    <td>모집 인원</td>
                                    <td>지원 인원</td>
                                    <td>모집 인원</td>
                                    <td>지원 인원</td>
                                    <td>모집 인원</td>
                                    <td>지원 인원</td>
                                </tr>
                                <tr>
                                    <td>3,629</td>
                                    <td>6,482</td>                                  
                                    <td>3,514</td>
                                    <td>6,739</td>                          
                                    <td><span>▼</span>115</td>
                                    <td><span>▲</span>257</td>                                   
                                </tr>
                            </tbody>
                        </table>
                    </li>
                </ul>
                <div class="examBottom">
                    <div class="titleTrend NSK-Black">전국 모집인원(경쟁률, 합격선) 현황 및 최근 10년간 모집 동향 분석</div>
                    <ul>
                        <li><a href="#Container" onclick="openWin('LayerTrend'),openWin('examTrend')">유아</a></li>
                        <li><a href="#Container" onclick="openWin('LayerTrend'),openWin('examTrend')">초등</a></li>
                        <li><a href="#Container" onclick="openWin('LayerTrend'),openWin('examTrend')">국어</a></li>
                        <li><a href="#none">영어</a></li>
                        <li><a href="#none">수학</a></li>
                        <li><a href="#none">도덕윤리</a></li>
                        <li><a href="#none">역사</a></li>
                        <li><a href="#none">일반사회</a></li>
                        <li><a href="#none">전기·전자·통신</a></li>
                        <li><a href="#none">정보컴퓨터</a></li>
                        <li><a href="#none">음악</a></li>
                        <li><a href="#none">미술</a></li>
                        <li><a href="#none">체육</a></li>
                        <li><a href="#none">물리</a></li>
                        <li><a href="#none">화학</a></li>
                        <li><a href="#none">생물</a></li>
                        <li><a href="#none">지구과학</a></li>
                        <li><a href="#none">보건</a></li>
                        <li><a href="#none">특수</a></li>
                        <li><a href="#none">중국어</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="Section Section7 mt40">
        <div class="widthAuto">
            <ul class="NSK-Black">
                <li><span class="NSK">WILLBES</span>학습자료실</li>
                <li><a href="#none">#기출문제 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon01.png" title="기출문제"></a></li>
                <li><a href="#none">#학습프로그램 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon02.png" title="학습프로그램"></a></li>
                <li><a href="#none">#임용가이드북 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon03.png" title="임용가이드북"></a></li>
                <li><a href="#none">#모바일수강안내 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon04.png" title="모바일수강가이드"></a></li>
            </ul>
        </div>
    </div>

    <div class="Section mt40 mb40 c_both">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesCenter">
                        <ul>
                            <li>
                                <a href="{{ front_url('/pass/support/faq/index?s_faq=628') }}">
                                    <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon01.png"></span>
                                    <div class="nTxt">학원 FAQ</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ front_url('/support/faq/index?s_faq=626') }}">
                                    <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon02.png"></span>
                                    <div class="nTxt">동영상 FAQ</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ front_url('/support/faq/index?s_faq=627') }}">
                                    <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon03.png"></span>
                                    <div class="nTxt">모바일 FAQ</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ front_url('/support/remote/index') }}">
                                    <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon04.png"></span>
                                    <div class="nTxt">동영상 원격지원</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ front_url('/landing/show/lcode/1038/cate/3134/preview/Y') }}">
                                    <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon05.png"></span>
                                    <div class="nTxt">대학특강 문의</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ front_url('/landing/show/lcode/1039/cate/3134/preview/Y') }}">
                                    <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon06.png"></span>
                                    <div class="nTxt">교수채용</div>
                                </a>
                            </li>
                        </ul>
                    </dt>
                    <dt class="willbesNumber NSK">
                        <ul>
                            <li>
                                <div class="nTit">강의&동영상 문의</div>
                                <div class="nNumber tx-color NSK-Black">1544-3169</div>
                                <div class="nTxt NSK">
                                    [운영시간]<br/>
                                    09시 ~ 22시
                                </div>
                            </li>
                            <li>
                                <div class="nTit">교재배송문의</div>
                                <div class="nNumber tx-color NSK-Black">1544-4944</div>
                                <div class="nTxt NSK">
                                    [운영시간]<br/>
                                    평일: 09시~ 17시<br> (점심시간 12시 ~ 13시)
                                </div>
                            </li>
                        </ul>
                    </dt>
                    {{--<dd class="GM">※ 전화상담 시 통화 내용은 자동녹취되며, 일요일 및 법정공휴일은 휴무입니다.</dd>--}}
                </dl>
            </div>          
        </div>
    </div>

    <div id="QuickMenuC" class="MainQuickMenuSSam NGR">
        <ul>
            <li class="dday">
                <div class="QuickSlider">
                    <div class="sliderNum">
                        <div class="QuickDdayBox">
                            <div class="q_tit">중등</div>
                            <div class="q_day">2018.12.12</div>
                            <div class="q_dday NSK-Black">D-5</div>
                        </div>
                        <div class="QuickDdayBox">
                            <div class="q_tit">유아·초등</div>
                            <div class="q_day">2019.04.05</div>
                            <div class="q_dday NSK-Black">D-10</div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="gobtn NG">
            <li>
                <a href="{{ site_url('/lecture/index/pattern/free?cate_code=') }}">
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick00.png" title="무료강의" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick00_on.png" title="무료강의" class="on">
                    <p>무료강의</p>
                </a>
            </li>
            <li>
                <a href="{{ site_url('/pass/board/schedule') }}">
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick01.png" title="강의실배정표" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick01_on.png" title="강의실배정표" class="on">
                    <p>강의실배정표</p>
                </a>
            </li>
            <li>
                <a href="{{ site_url('/support/mobile/index') }}">
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick02.png" title="모바일수강안내" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick02_on.png" title="모바일수강안내" class="on">
                    <p>모바일<br>수강안내</p>
                </a>
            </li>
            <li>
                <a href="{{ site_url('/support/qna/create?') }}">
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick03.png" title="1:1상담" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick03_on.png" title="1:1상담" class="on">
                    <p>1:1상담</p>
                </a>
            </li>
            <li>
                <a href="{{ site_url('/event/list/ongoing') }}">
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick04.png" title="이벤트" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick04_on.png" title="이벤트" class="on">
                    <p>이벤트</p>
                </a>
            </li>
            <li>
                <a href="{{ site_url('/landing/show/lcode/1040/cate/3134') }}">
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick05.png" title="재학생러닝메이트" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick05_on.png" title="재학생러닝메이트" class="on">
                    <p>재학생<br>러닝메이트</p>
                </a>
            </li>
        </ul>
    </div>
    
    {{-- 수강후기 팝업 willbes-Layer-ReplyBox --}}
    <div id="Reply" class="willbes-Layer-ReplyBox willbes-Layer-ReplyBox-1120">
        <a class="closeBtn" href="#" onclick="closeWin('LayerReply'),closeWin('Reply'),closeWin('replyWrite'),openWin('replyListLayer')"><img src="{{ img_url('prof/close.png') }}"></a>
        <div class="Layer-Tit NG tx-dark-black">수강후기</div>

        <!-- List -->
        <div id="replyListLayer" class="Layer-Cont tx14">
            <div class="curriWrap c_both">
                <div class="CurriBox">
                    <table cellspacing="0" cellpadding="0" class="curriTable curriTableLayer">
                        <colgroup>
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                        </colgroup>
                        <tbody>
                            <tr>
                                <th class="tx-gray">과목선택</th>
                                <td colspan="8">
                                    <ul class="curriSelect">
                                        <li><a href="#none">사회복지학</a></li>
                                        <li><a href="#none">국어</a></li>
                                        <li><a href="#none">영어</a></li>
                                        <li><a href="#none">한국사</a></li>
                                        <li><a href="#none">행정법</a></li>
                                        <li><a href="#none">행정학</a></li>
                                        <li><a href="#none">교육학</a></li>
                                        <li><a href="#none">수학</a></li>
                                        <li><a href="#none">독일어</a></li>
                                        <li><a href="#none">경영학</a></li>
                                        <li><a href="#none">일본어</a></li>
                                        <li><a href="#none">관세법</a></li>
                                        <li><a href="#none">공직선거법</a></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th class="tx-gray">교수선택</th>
                                <td colspan="8" class="tx-blue tx-left">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td>
                            </tr>
                            <tr>
                                <th class="tx-gray">강좌선택</th>
                                <td colspan="8" class="tx-left">
                                    <select id="email" name="email" title="강좌를 선택해 주세요." class="seleEmail">
                                        <option selected="selected">강좌를 선택해 주세요.</option>
                                        <option value="강좌1">강좌1</option>
                                        <option value="강좌2">강좌2</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- curriWrap -->
            <div class="willbes-Leclist c_both">
                <div class="willbes-LecreplyList tx-gray">
                    <dl class="Select-Btn NG">
                        <dt><a class="on" href="#none">BEST순</a></dt>
                        <dt><a href="#none">최신순</a></dt>
                        <dt><a href="#none">평점순</a></dt>
                    </dl>
                    <div class="search-Btn btnAuto120 h27 f_right">
                        <button type="submit" onclick="closeWin('replyListLayer'),openWin('replyWrite')" class="mem-Btn bg-blue bd-dark-blue">
                            <span>수강후기 작성</span>
                        </button>
                    </div>
                </div>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable replyTable upper-black upper-gray bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 75px;">
                            <col style="width: 90px;">
                            <col style="width: 100px;">
                            <col style="width: 120px;">
                            <col style="width: 260px;">
                            <col style="width: 90px;">
                            <col style="width: 100px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></li></th>
                                <th>과목<span class="row-line">|</span></li></th>
                                <th>교수명<span class="row-line">|</span></li></th>
                                <th>평점<span class="row-line">|</span></li></th>
                                <th>제목<span class="row-line">|</span></li></th>
                                <th>작성자<span class="row-line">|</span></li></th>
                                <th>등록일</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="replyList w-replyList">
                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                <td class="w-lec">헌법</td>
                                <td class="w-name">정채영</td>
                                <td class="w-star star1"></td>
                                <td class="w-list tx-left pl20">
                                    좋은강의입니다.
                                    <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                </td>
                                <td class="w-write">장동*</td>
                                <td class="w-date">2018-00-00</td>
                            </tr>
                            <tr class="replyTxt w-replyTxt tx-gray">
                                <td colspan="7" class="tx14">
                                    <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                    Woo ah(우와) Dae Bark(박) 입니다!!! 정채영 교수님 수업을 온/오프라인으로 몇번 들었던 장수생입니다.
                                    계속해서 무료 강좌 시리즈를 개설해 주셔서 감사합니다! 강의의 질이나 수준도 결코 유료특강에 떨어지지 않는 수준입니다.
                                </td>
                            </tr>

                            <tr class="replyList w-replyList">
                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                <td class="w-lec">공직선거법</td>
                                <td class="w-name">한덕현</td>
                                <td class="w-star star5"></td>
                                <td class="w-list tx-left pl20">
                                    쉽게 설명해주시네요
                                    <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                </td>
                                <td class="w-write">박형*</td>
                                <td class="w-date">2018-00-00</td>
                            </tr>
                            <tr class="replyTxt w-replyTxt tx-gray">
                                <td colspan="7" class="tx14">
                                    <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                    베스트 댓글2
                                </td>
                            </tr>

                            <tr class="replyList w-replyList">
                                <td class="w-no">8</td>
                                <td class="w-lec">스파르타반</td>
                                <td class="w-name">김쌤</td>
                                <td class="w-star star4"></td>
                                <td class="w-list tx-left pl20">
                                    좋네요
                                    <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                </td>
                                <td class="w-write">최귀*</td>
                                <td class="w-date">2018-04-22</td>
                            </tr>
                            <tr class="replyTxt w-replyTxt tx-gray">
                                <td colspan="7" class="tx14">
                                    <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                    좋네요 좋네요 좋네요 좋네요 좋네요 좋네요
                                </td>
                            </tr>

                            <tr class="replyList w-replyList">
                                <td class="w-no">7</td>
                                <td class="w-lec">행정법</td>
                                <td class="w-name">최진우</td>
                                <td class="w-star star2"></td>
                                <td class="w-list tx-left pl20">
                                    저랑 잘 맞는 강의입니다.
                                    <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                </td>
                                <td class="w-write">박형*</td>
                                <td class="w-date">2018-04-22</td>
                            </tr>
                            <tr class="replyTxt w-replyTxt tx-gray">
                                <td colspan="7" class="tx14">
                                    <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                    저랑 잘 맞는 강의입니다. 저랑 잘 맞는 강의입니다. 저랑 잘 맞는 강의입니다.
                                </td>
                            </tr>

                            <tr class="replyList w-replyList">
                                <td class="w-no">6</td>
                                <td class="w-lec">공통</td>
                                <td class="w-name">윤세훈</td>
                                <td class="w-star star2"></td>
                                <td class="w-list tx-left pl20">
                                    좋네요
                                    <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                </td>
                                <td class="w-write">장동*</td>
                                <td class="w-date">2018-04-22</td>
                            </tr>
                            <tr class="replyTxt w-replyTxt tx-gray">
                                <td colspan="7" class="tx14">
                                    <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div> 
                                    좋네요 좋네요 좋네요
                                </td>
                            </tr>

                            <tr class="replyList w-replyList">
                                <td class="w-no">5</td>
                                <td class="w-lec">헌법</td>
                                <td class="w-name">정채영</td>
                                <td class="w-star star2"></td>
                                <td class="w-list tx-left pl20">
                                    좋은강의입니다.
                                    <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                </td>
                                <td class="w-write">최귀*</td>
                                <td class="w-date">2018-04-22</td>
                            </tr>
                            <tr class="replyTxt w-replyTxt tx-gray">
                                <td colspan="7" class="tx14">
                                    <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                    좋은강의입니다. 좋은강의입니다. 좋은강의입니다. 좋은강의입니다. 좋은강의입니다.
                                </td>
                            </tr>

                            <tr class="replyList w-replyList">
                                <td class="w-no">4</td>
                                <td class="w-lec">공직선거법</td>
                                <td class="w-name">한덕현</td>
                                <td class="w-star star3"></td>
                                <td class="w-list tx-left pl20">
                                    쉽게 설명해주시네요
                                    <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                </td>
                                <td class="w-write">최귀*</td>
                                <td class="w-date">2018-04-22</td>
                            </tr>
                            <tr class="replyTxt w-replyTxt tx-gray">
                                <td colspan="7" class="tx14">
                                    <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                    쉽게 설명해주시네요. 쉽게 설명해주시네요. 쉽게 설명해주시네요.
                                </td>
                            </tr>

                            <tr class="replyList w-replyList">
                                <td class="w-no">3</td>
                                <td class="w-lec">스파르타반</td>
                                <td class="w-name">김쌤</td>
                                <td class="w-star star4"></td>
                                <td class="w-list tx-left pl20">
                                    좋네요
                                    <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                </td>
                                <td class="w-write">최귀*</td>
                                <td class="w-date">2018-04-22</td>
                            </tr>
                            <tr class="replyTxt w-replyTxt tx-gray">
                                <td colspan="7" class="tx14">
                                    <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                    좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요
                                </td>
                            </tr>

                            <tr class="replyList w-replyList">
                                <td class="w-no">2</td>
                                <td class="w-lec">행정법</td>
                                <td class="w-name">최진우</td>
                                <td class="w-star star3"></td>
                                <td class="w-list tx-left pl20">
                                    좋네요
                                    <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                </td>
                                <td class="w-write">최귀*</td>
                                <td class="w-date">2018-04-22</td>
                            </tr>
                            <tr class="replyTxt w-replyTxt tx-gray">
                                <td colspan="7" class="tx14">
                                    <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                    좋네요 좋네요
                                </td>
                            </tr>

                            <tr class="replyList w-replyList">
                                <td class="w-no">1</td>
                                <td class="w-lec">공통</td>
                                <td class="w-name">윤세훈</td>
                                <td class="w-star star1"></td>
                                <td class="w-list tx-left pl20">
                                    좋네요
                                    <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                </td>
                                <td class="w-write">최귀*</td>
                                <td class="w-date">2018-04-22</td>
                            </tr>
                            <tr class="replyTxt w-replyTxt tx-gray">
                                <td colspan="7" class="tx14">
                                    <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                    좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="willbes-Lec-Search GM p_re mt30">
                    <div class="inputBox">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div> 
            </div>
            <!-- willbes-Leclist -->
        </div>

        <!-- Write -->
        <div id="replyWrite" class="Layer-Cont" style="display: none">
            <ul class="replyInfo tx-gray NG">
                <li>· 수강생에 한해 강좌당 1회 작성이 가능합니다.</li>
                <li>· 수강 종료 강좌는 수강이 종료된 날로부터 30일 이내에만 후기 등록이 가능합니다.</li>
                <li>· 수강후기 작성 시 포인트 500P가 지급됩니다. (월 최대 2,000p 지급가능)</li>
                <li>· 강좌와 무관한 내용, 의미없는 문자 나열, 비방이나 욕설이 있을 시 삭제될 수 있습니다.</li>
            </ul>

            <div class="willbes-Leclist c_both">
                <div class="LecWriteTable">
                    <table cellspacing="0" cellpadding="0" class="listTable writeTable upper-gray upper-black bdt-gray bdb-gray fc-bd-none tx-gray">
                        <colgroup>
                            <col style="width: 120px;">
                            <col style="width: 720px;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">수강정보<span class="tx-light-blue">(*)</span></td>
                                <td class="w-selected tx-left pl30">
                                    <select id="Sbj" name="Sbj" title="Sbj" class="seleSbj" style="width: 150px;">
                                        <option selected="selected">과목선택</option>
                                        <option value="헌법">헌법</option>
                                        <option value="스파르타반">스파르타반</option>
                                        <option value="공직선거법">공직선거법</option>
                                    </select>
                                    <select id="Prof" name="Prof" title="Prof" class="seleProf" style="width: 150px;">
                                        <option selected="selected">교수선택</option>
                                        <option value="정채영">정채영</option>
                                        <option value="한덕현">한덕현</option>
                                        <option value="김쌤">김쌤</option>
                                    </select>
                                    <select id="Lec" name="Lec" title="Lec" class="seleLec" style="width: 360px;">
                                        <option selected="selected">강좌선택</option>
                                        <option value="기타">기타</option>
                                        <option value="강좌내용">강좌내용</option>
                                        <option value="학습상담">학습상담</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">평점<span class="tx-light-blue">(*)</span></td>
                                <td class="w-selected tx-left pl30">
                                    <!-- Rating Stars Box -->
                                    <div class="rating-stars text-center GM">
                                        <ul id="stars">
                                            <li class="star" title="" data-value='1'>
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="" data-value='2'>
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="" data-value='3'>
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="" data-value='4'>
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="" data-value='5'>
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                        </ul>
                                        <div class="success-box">
                                            <div class="text-message">0</div>/ 5
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">제목<span class="tx-light-blue">(*)</span></td>
                                <td class="w-text tx-left pl30">
                                    <input type="text" id="TITLE" name="TITLE" class="iptTitle" maxlength="30">
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">내용<span class="tx-light-blue">(*)</span></td>
                                <td class="w-textarea write tx-left pl30">
                                    <textarea></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="search-Btn mt20 h36 p_re">
                        <button type="submit" onclick="closeWin('replyWrite'),openWin('replyListLayer')" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                            <span class="tx-purple-gray">취소</span>
                        </button>
                        <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                            <span>저장</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- willbes-Leclist -->
        </div>
    </div>
    <div id="LayerReply" class="willbes-Layer-Black"></div>    
    <!-- // willbes-Layer-ReplyBox -->    

    {{-- 교재보기 팝업 willbes-Layer-Box --}}
    <div id="InfoForm" class="willbes-Layer-Box">
        <a class="closeBtn" href="#none" onclick="closeWin('InfoForm'),closeWin('bookPocketBox')">
            <img src="{{ img_url('sub/close.png') }}">
        </a>
        <div class="Layer-Tit tx-dark-black NG">
            교재상세정보
        </div>
        <div class="lecDetailWrap">
            <div class="tabBox">
                <div class="tabLink book2">
                    <div class="bookWrap">
                        <div class="bookInfo">
                            <div class="bookImg">
                                <img src="{{ img_url('sample/book.jpg') }}">
                            </div>
                            <div class="bookDetail p_re">
                                <div class="bookBuy">
                                    <ul class="bookBuyBtns">
                                        <li class="btnCart"><a onclick="openWin('bookPocketBox')">장바구니</a>                                
                                        <li class="btnBuy"><a href="#none">바로결제</a></li>
                                    </ul>
                                    <div id="bookPocketBox" class="bookPocketBox">
                                        <a class="closeBtn" href="#none" onclick="closeWin('bookPocketBox')">
                                            <img src="{{ img_url('cart/close.png') }}">
                                        </a>
                                        해당 상품이 장바구니에 담겼습니다.<br/>
                                        장바구니로 이동하시겠습니까?
                                        <ul class="NSK mt20">
                                            <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                            <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                            <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('bookPocketBox')">닫기</a></li>
                                        </ul>
                                    </div>  
                                </div>

                                <div class="book-Tit tx-dark-black NG">2018 기특한국어기출문제집 (전2권)</div>
                                <div class="book-Author tx-gray">
                                    <ul>
                                        <li>분야 : 9급공무원 <span class="row-line">|</span></li>
                                        <li>저자 : 저자명 <span class="row-line">|</span></li>
                                        <li>출판사 : 출판사명 <span class="row-line">|</span></li>
                                        <li>판형/쪽수 : 190*260 / 769</li>
                                    </ul>
                                    <ul>
                                        <li>출판일 : 2018-00-00 <span class="row-line">|</span></li>
                                        <li>교재비 : <strong class="tx-light-blue">20,000원</strong> (↓20%) <strong class="tx-red">[품절]</strong> <strong class="tx-light-blue">[판매중]</strong></li>
                                    </ul>
                                </div>
                                <div class="bookBoxWrap">
                                    <ul class="tabWrap tabDepth2">
                                        <li><a href="#info1" class="on">교재소개</a></li>
                                        <li><a href="#info2">교재목차</a></li>
                                    </ul>
                                    <div class="tabBox">
                                        <div id="info1" class="tabContent">
                                            <div class="book-TxtBox tx-gray">
                                                2018년재신정판을내면서..<br/>
                                                첫째, 2017년에출제된모든기출문제를반영하여수록하였습니다.<br/>
                                                둘째, 매지문마다해설을충실히달았습니다..<br/>
                                                셋째, 책분량이너무많아져최근5년간기출문제(2013-2017년)는빠짐없이수록하되, 오래된문제라도<br/>
                                                기본적이고중요한내용을담고있는부분은유지하되중복된부분은덜어냈습니다.
                                            </div>
                                            <div class="caution-txt tx-red">수강생 교재는 해당 온라인 강좌 수강생에 한해 구매 가능합니다. (교재만 별도 구매 불가능)</div>
                                        </div>
                                        <div id="info2" class="tabContent">
                                            <div class="book-TxtBox tx-gray">
                                                제1편 현대 문법<br/>
                                                제2편 고전 문법<br/>
                                                제3편 국어 생활<br/>
                                                제4편 현대 문학<br/>
                                                제5편 고전 문학<br/>
                                                제1편 현대 문법<br/>
                                                제2편 고전 문법<br/>
                                                제3편 국어 생활<br/>
                                                제4편 현대 문학<br/>
                                                제5편 고전 문학
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- willbes-Layer-Box -->

    {{-- 동향 분석 팝업 willbes-Layer-Trend --}}
    <div id="examTrend" class="willbes-Layer-Trend">
        <a class="closeBtn" href="#" onclick="closeWin('LayerTrend'),closeWin('examTrend')"><img src="{{ img_url('prof/close.png') }}"></a>
        <div class="Layer-Tit NG tx-dark-black"><strong class="tx-blue">유아</strong> 시험정보 : 지역별 응시 인원 및 합격선</div>

        <div class="Layer-Cont">
            <div class="mainPop_con">
                <div class="mainPop_map">                    
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/mainPop_map.jpg" alt="">
                    <div class="seoul">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th class="blue_th">서울</th>
                                    <th>2019학년도</th>
                                    <th>2020학년도</th>
                                    <th>증감</th>
                                </tr>
                                <tr>
                                    <th>공고</th>
                                    <td>387</td>
                                    <td>345</td>
                                    <td><span class="down">▼</span>-42</td>
                                </tr>
                                <tr>
                                    <th>지원</th>
                                    <td>1,405</td>
                                    <td>1,176</td>
                                    <td><span class="down">▼</span>-229</td>
                                </tr>
                                <tr>
                                    <th>경쟁률</th>
                                    <td>3.63</td>
                                    <td>3.41</td>
                                    <td><span class="down">▼</span>-0.22</td>
                                </tr>
                                <tr>
                                    <th>합격선</th>                                
                                    <td>96.5</td>                                
                                    <td>101.57</td>                                
                                    <td><span class="up">▲</span>5.07</td>                                
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="ic">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">인천</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>19</td>
                                <td>32</td>
                                <td>13</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>286</td>
                                <td>632</td>
                                <td>288</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>15.05</td>
                                <td>19.75</td>
                                <td>22.15</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>90</td>
                                
                                <td>79.34</td>
                                
                                <td>80</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="cn">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">충남</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>28</td>
                                <td>16</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>377</td>
                                <td>444</td>
                                <td>647</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>13.46</td>
                                <td>27.75</td>
                                <td>10.61</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>87</td>
                                
                                <td>79.67</td>
                                
                                <td>77.33</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="sj">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">세종</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>28</td>
                                <td>-</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>311</td>
                                <td>-</td>
                                <td>102</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>11.11</td>
                                <td>-</td>
                                <td>14.57</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>87</td>
                                
                                <td>-</td>
                                
                                <td>87.67</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="dj">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">대전</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>35</td>
                                <td>16</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>446</td>
                                <td>636</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>12.74</td>
                                <td>39.75</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>86</td>
                                
                                <td>80.33</td>
                                
                                <td>81</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="gj">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">광주</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>13</td>
                                <td>11</td>
                                <td>34</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>215</td>
                                <td>500</td>
                                <td>404</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>16.54</td>
                                <td>45.45</td>
                                <td>11.88</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>86</td>
                                
                                <td>81</td>
                                
                                <td>78.33</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="jn">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">전남</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>52</td>
                                <td>5</td>
                                <td>63</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>452</td>
                                <td>187</td>
                                <td>531</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>8.69</td>
                                <td>37.4</td>
                                <td>8.43</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>86</td>
                                
                                <td>76.67</td>
                                
                                <td>78.67</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="jb">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">전북</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>38</td>
                                <td>22</td>
                                <td>74</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>462</td>
                                <td>680</td>
                                <td>780</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>12.16</td>
                                <td>30.91</td>
                                <td>10.54</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>85</td>
                                
                                <td>79</td>
                                
                                <td>78.33</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="gg">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">경기</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>233</td>
                                <td>149</td>
                                <td>377</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>2,358</td>
                                <td>3,409</td>
                                <td>3,816</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>10.12</td>
                                <td>22.88</td>
                                <td>10.12</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>86</td>
                                
                                <td>80.33</td>
                                
                                <td>80.67</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="jj">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">제주</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>21</td>
                                <td>10</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>175</td>
                                <td>207</td>
                                <td>201</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>8.33</td>
                                <td>20.7</td>
                                <td>16.75</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>84</td>
                                
                                <td>77.66</td>
                                
                                <td>77.67</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="gw">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">강원</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>30</td>
                                <td>25</td>
                                <td>54</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>295</td>
                                <td>442</td>
                                <td>502</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>9.83</td>
                                <td>17.68</td>
                                <td>9.3</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>84</td>
                                
                                <td>77.33</td>
                                
                                <td>75.67</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="cb">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">충북</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>40</td>
                                <td>25</td>
                                <td>75</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>460</td>
                                <td>549</td>
                                <td>656</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>11.5</td>
                                <td>21.96</td>
                                <td>8.75</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>88</td>
                                
                                <td>81</td>
                                
                                <td>76.67</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="kb">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">경북</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>29</td>
                                <td>45</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>277</td>
                                <td>698</td>
                                <td>538</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>9.55</td>
                                <td>15.51</td>
                                <td>13.45</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>87</td>
                                
                                <td>77.67</td>
                                
                                <td>78</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="dg">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">대구</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>34</td>
                                <td>25</td>
                                <td>21</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>322</td>
                                <td>518</td>
                                <td>396</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>9.47</td>
                                <td>20.72</td>
                                <td>18.86</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>83</td>
                                
                                <td>79.66</td>
                                
                                <td>79.67</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="us">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">울산</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>10</td>
                                <td>21</td>
                                <td>27</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>127</td>
                                <td>448</td>
                                <td>288</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>12.7</td>
                                <td>21.33</td>
                                <td>10.67</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>84</td>
                                
                                <td>81</td>
                                
                                <td>77.67</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="bs">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">부산</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>40</td>
                                <td>25</td>
                                <td>62</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>388</td>
                                <td>946</td>
                                <td>737</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>9.7</td>
                                <td>37.84</td>
                                <td>11.89</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>84</td>
                                
                                <td>81.67</td>
                                
                                <td>81.34</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="kn">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">경남</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>139</td>
                                <td>-</td>
                                <td>118</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>1,155</td>
                                <td>-</td>
                                <td>1,041</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>8.31</td>
                                <td>-</td>
                                <td>8.82</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>87</td>
                                
                                <td>-</td>
                                
                                <td>76.33</td>
                                
                            </tr>
                        </tbody></table>
                    </div>

                    <div class="total">
                        <table>
                            <colgroup>
                                <col width="21%">
                                <col width="25%">
                                <col width="27%">
                                <col width="27%">
                            </colgroup>
                            <tbody><tr>
                                <th class="blue_th">전국</th>
                                <th>2019학년도</th>
                                <th>2019 추시</th>
                                <th>2020학년도</th>
                            </tr>
                            <tr>
                                <th>공고</th>
                                <td>948</td>
                                <td>482</td>
                                <td>1,154</td>
                            </tr>
                            <tr>
                                <th>지원</th>
                                <td>9,975</td>
                                <td>12,505</td>
                                <td>13,103</td>
                            </tr>
                            <tr>
                                <th>경쟁률</th>
                                <td>10.52</td>
                                <td>27.99</td>
                                <td>11.35</td>
                            </tr>
                            <tr>
                                <th>합격선</th>
                                
                                <td>85.88</td>
                                
                                <td>79.67</td>
                                
                                <td>79.29</td>
                                
                            </tr>
                        </tbody></table>
                    </div>         
                </div>

                {{-- 그래프 --}}
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <div class="trendView">
                    <div class="trendTitle">최근 10 년 모집 동향 분석</div>
                    <div class="graph">
                        <div id="chart_div1"></div>
                    </div>
                    <div class="graph"></div>
                    <div class="trendData">
                        <table cellspacing="0">
                            <colgroup>
                                <col width="25%">
                                <col width="25%">
                                <col width="25%">
                                <col width="25%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>학년도</th>
                                    <th>모집</th>
                                    <th>지원</th>
                                    <th>경쟁률</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2020</td>
                                    <td>1,154</td>
                                    <td>13,103</td>
                                    <td>11.35</td>
                                </tr>
                                <tr>
                                    <td>2019 추시</td>
                                    <td>482</td>
                                    <td>12,505</td>
                                    <td>25.9</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>948</td>
                                    <td>9,955</td>
                                    <td>10.5</td>
                                </tr>
                                <tr>
                                    <td>2018</td>
                                    <td>1,365</td>
                                    <td>8,992</td>
                                    <td>6.59</td>
                                </tr>
                                <tr>
                                    <td>2017</td>
                                    <td>596</td>
                                    <td>6,133</td>
                                    <td>10.29</td>
                                </tr>
                                <tr>
                                    <td>2016</td>
                                    <td>696</td>
                                    <td>5,597</td>
                                    <td>8.04</td>
                                </tr>
                                <tr>
                                    <td>2015</td>
                                    <td>619</td>
                                    <td>4,888</td>
                                    <td>7.9</td>
                                </tr>
                                <tr>
                                    <td>2014</td>
                                    <td>397</td>
                                    <td>4,418</td>
                                    <td>11.13</td>
                                </tr>
                                <tr>
                                    <td>2013</td>
                                    <td>578</td>
                                    <td>3,863</td>
                                    <td>6.68</td>
                                </tr>
                                <tr>
                                    <td>2012</td>
                                    <td>234</td>
                                    <td>4,664</td>
                                    <td>19.93</td>
                                </tr>
                                <tr>
                                    <td>2011</td>
                                    <td>113</td>
                                    <td>5,079</td>
                                    <td>44.95</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="LayerTrend" class="willbes-Layer-Black"></div>    
    <!-- // willbes-Layer-Trend -->    
</div>
<!-- End Container -->


<script type="text/javascript">  
    //자동검색어
    $(function(){
        var autocomplete_text = ["스파르타","신광은","모의고사","장정훈","최신판례","김원욱","하승민","형사소송법","네친구","해설","형법","최신","수사","실용글쓰기","최기판","오태진","승진","면접","리마인드","원유철","숫자","판례","해설강의","경찰학","김현정","기출","Flex","원기총","형소법","개정","실무종합","영어","문제풀이","마무리","오현웅","행정법","동형","2단계","2020","경찰학개론","송광호","학설","한국사","좋은데이","조문","심화","신광은 형사소송법","문제폭격","최신기출","1차","실용","추록","최신 판례","형사소송","신의한수","해양경찰","총평","숫자특강","심화이론","기지개","특강","형사법","구문독해","마무리특강","경찰승진","입문특강","해사법규","위원회","키워드","김준기","교재","형사소송법 심화","무료특강","2020년 1차","시험","승진기출","기본이론","헌법","실무","모의","글쓰기","해양경찰학","합격","공득인","김원욱 형법","체력","형법 심화","형법 최신","형법 심화이론","법학경채","아침","박우찬","기출해설","적중","형법 핵심이론 요약정리","조문특강","파이널","합기독","ox","개정법령","마무리 특강","5개년","형법 최신판례","패키지","최신기출판례","기본","독해","사료","요약","법학","20년 1차","범죄수사","기출문제","장정훈 경찰학개론","2차","문제","주관식","형사","찍기","심화기출","2차대비","해양경찰학개론","보강","1단계","문풀","죄수론","2020년 1차대비 신광은 형사소송법","법령","최신판례특강","죄수","전문법칙","역사","민법","일정","2020 1차","강의","하이힐","단계","박영식","판례특강","진도별","경찰실무","정태정","2019","경찰간부","19년 2차","해설특강","최기","2020년 2차","오태진 한국사","해양","간부","최신판","형법최신판례","제이슨","숫자 특강","무료","형사소송법 입문","해사영어","경찰","김원욱 형법 기본","300","신광은 형사법","실전","도사국사","경찰작용법","2018","2020년 1차대비 김원욱 형법 기본","찍기특강","선박","2020년 2차대비 신광은 형사소송법","형사소송법 최신판례","면접캠프","2018년 3차","기관술"," 마무리","베이직","형법 마무리","3개월","아침영어","신광은 형소법","이것만","인증","김원욱형법","이론","국어","경찰특공대","해수부","이기자","문제폭격 스파르타","신광은 경찰","신광은 형사소송법 기본이론 ","장정훈 행정법","풀이","1차대비","최신 기출","한국사 기본","1개년","심화이론특강","300제"];
        $("#unifiedSearch_text").autocomplete({
            source: autocomplete_text,
            select: function(event, ui) {
            },
            focus: function(event, ui) {
                return false;
            }
        })
    });

    //인기검색어
    $(document).ready(function() {
        var fieldExample = $('.unifiedSearch');
            fieldExample.focus(function() {
            var div = $('div.searchPop').show();
            $(document).bind('focusin.example click.example',function(e) {
                if ($(e.target).closest('.example, .unifiedSearch').length) return;
                $(document).unbind('.example');
                div.fadeOut('medium');
            });
        });
        $('div.searchPop').hide();
    });

    //상단배너
    $(function(){ 
        var slidesImg = $(".MaintabSlider").bxSlider({
            mode:'horizontal',
            touchEnabled: false,
            speed:400,
            pause:3000,
            sliderWidth:1120,
            auto : true,	
            autoHover: true,						
            pagerCustom: '#MainRollingDiv',
            controls:false, 				
            onSliderLoad: function(){
                $("#MainRollingSlider").css("visibility", "visible").animate({opacity:1}); 
            }
        });	
        $("#imgBannerLeft").click(function (){
            slidesImg.goToPrevSlide();
        });
    
        $("#imgBannerRight").click(function (){
            slidesImg.goToNextSlide();
        });			
    });

    //적중배너
    $(function(){ 
        var slidesImg = $(".SubtabSlider").bxSlider({
            mode:'horizontal',
            touchEnabled: false,
            speed:400,
            pause:3000,
            sliderWidth:1120,
            auto : true,	
            autoHover: true,						
            pagerCustom: '#SubRollingDiv',
            controls:false, 				
            onSliderLoad: function(){
                $("#SubRollingSlider").css("visibility", "visible").animate({opacity:1}); 
            }
        });	
        $("#imgBannerLeft2").click(function (){
            slidesImg.goToPrevSlide();
        });
    
        $("#imgBannerRight2").click(function (){
            slidesImg.goToNextSlide();
        });			
    });

    //교재
    $(function() {
        var slidesImg1 = $(".bookList").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            pager:true,
            controls:false,
            minSlides:5,
            maxSlides:5,
            slideWidth: 190,
            slideMargin:20,
            autoHover: true,
            moveSlides:1,
            pager:true,
        });
        $("#imgBannerLeft3").click(function (){
            slidesImg1.goToNextSlide();
        });
        $("#imgBannerRight3").click(function (){
            slidesImg1.goToPrevSlide();
        });        
    });
    
    //수강후기
    $(function(){ 
        var reviewBox = $(".review ul").bxSlider({
            auto : true,
            pause : 8000,
            mode : 'vertical',
            pager : false,
            slideMargin : 20,
            onSlideAfter : function(){
                reviewBox.startAuto();
            }
        });
    });

    // 수강후기 닫기
    document.querySelector('.willbes-Layer-ReplyBox .closeBtn').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('.Section2').scrollIntoView({ behavior: 'smooth' });
    });

    // 동향 분석 팝업 백그라운드 클릭 닫기
    document.querySelector('.willbes-Layer-Trend .closeBtn').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('.examInfo').scrollIntoView({ behavior: 'smooth' });
    });

    $(document).ready(function() { 
        $('#LayerTrend.willbes-Layer-Black').on('click', function(e) {
            e.preventDefault();
            $('.willbes-Layer-Trend').fadeOut();
            $(this).fadeOut();
            document.querySelector('.examInfo').scrollIntoView({ behavior: 'smooth' });
        });
    });


    $(document).ready(function() {
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawVisualization1);
        
        function drawVisualization1() {
            var data = google.visualization.arrayToDataTable([
                ['학년도', '경쟁률',  {type: 'number', role: 'annotation'},],
                ['2011', {v:44.95, f:'44.95'}, 44.95],
                ['2012', {v:19.93, f:'19.93'}, 19.93],
                ['2013', {v:6.68, f:'6.68'}, 6.68],
                ['2014', {v:11.13, f:'11.13'}, 11.13],
                ['2015', {v:7.90, f:'7.90'}, 7.90],
                ['2016', {v:8.04, f:'8.04'}, 8.04],
                ['2017', {v:10.29, f:'10.29'}, 10.29],
                ['2018', {v:6.59, f:'6.59'}, 6.59],
                ['2019 추시', {v:25.9, f:'25.9'}, 25.9],
                ['2020\n(학년도)', {v:11.35, f:'11.35'}, '11.35'],
            ]);
            var options = {
                title : '(경쟁률)',
                vAxes: {
                    0:{
                        gridlines : { count : 5 },
                        format: '#\':1\''
                    }
                },
                hAxis: {title: ""},
                //isStacked: true,
                seriesType: "bars",
                series: {
                    0: { type: "line"}
                },
                axes: {
                    y: {
                        count: {label: '인원'},
                        ratio: {side: 'right', label: '비율'}
                    }
                },
                annotations: {
                    alwaysOutside: true,
                    textStyle: {
                        fontSize: 12,
                        auraColor: 'none',
                        color: '#555'
                    },
                },
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
            chart.draw(data, options);
        }
    });

    
</script>
@stop