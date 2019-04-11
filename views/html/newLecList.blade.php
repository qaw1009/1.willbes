@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">        
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            margin:0 auto;
        }
        .evtContent span {vertical-align:auto}


        /************************************************************/

        .newLecList {margin-top:30px; max-width:900px; color:#666; margin-bottom:100px}
        .newLecList h4 { font-size:22px; border-bottom:2px solid #000; padding:10px 0}
        .newLecList ul {margin-bottom:30px}
        .newLecList li {padding:12px; line-height:1.4; border-bottom:1px dashed #e4e4e4}
        .newLecList li:hover {background:#f6f6f6}
        .newLecList li.li2 {border-bottom:1px dashed #999}
        .newLecList li:last-child {border-bottom:1px solid #000}
        .newLecList li:after {content:''; display:block; clear:both;}
        .newLecList li div {width:80%; float:left}
        .newLecList li div span {color:#ccc; margin:0 10px;}
        .newLecList li div strong {color:#000;}
        .newLecList li a {display:block; float:right; width:18%; height:inherit; background:#fff; border:1px solid #55676b; color:#55676b; border-radius:16px; text-align:center; padding:8px 0}
        .newLecList li a:hover {background:#55676b; color:#fff;}

    </style>

<div class="p_re evtContent" id="evtContainer"> 

    <div class="newLecList">
        <h4 class="NSK tx-deep-blue">2019 대비 7/9급 4월 새벽특강</h4>
        <ul>
            <li class="li2">
                <div>
                국어 <span>|</span> 기미진 <span>|</span> 회차 : 10 <span>|</span> 업데이트 : 4.9 <br>
                <strong>2019 기미진 기특한 국어 아침하프모의고사 (4월)</strong><br>
                교재 : 특수프린트
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152576">수강<br>신청</a> 
            </li>
            <li>
                <div>
                영어 <span>|</span> 한덕현 <span>|</span> 회차 : 26 <span>|</span> 업데이트 : 4.12 <br>
                <strong>2019 한덕현 영어 새벽실전모의고사 (4-5월)</strong><br>
                교재 : 특수프린트
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152604">수강<br>신청</a> 
            </li>
        </ul>

        <h4 class="NSK tx-deep-blue">2019 대비 7/9급  4-5월 이론/문제풀이 강좌</h4>
        <ul>
            <li>
                <div>
                국어 <span>|</span> 기미진 <span>|</span> 회차 : 8 <span>|</span> 업데이트 : 4.9 <br>
                <strong>2019 [지방직/서울시] 기미진 기특한 국어 Final 모의고사 (4-5월)</strong> <br>
                교재 : 2019 기특한 국어 전 범위 모의고사(저자, 배움)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146998">수강<br>신청</a> 
            </li>

            <li>
                <div>
                국어 <span>|</span> 권기태 <span>|</span> 회차 : 4 <span>|</span> 업데이트 : 5.17 <br>
                <strong>2019 [서울시대비] 권기태 기태국어 Final 모의고사(5월)</strong><br>
                교재 : 기태국어 step5 실전 모의고사
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/151736">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                국어 <span>|</span> 권기태 <span>|</span> 회차 : 4 <span>|</span> 업데이트 : 4.19 <br>
                <strong>2019 [지방직] 권기태 기태국어 Final 모의고사(4월)</strong><br>
                교재 : 기태국어 step5 실전 모의고사
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/151733">수강<br>신청</a> 
            </li>

            <li>
                <div>
                영어 <span>|</span> 김신주 <span>|</span> 회차 : 7 <span>|</span> 업데이트 : 4.18 <br>
                <strong>2019 김신주 매직아이 영어 어휘특강(4-5월)</strong><br>
                교재 : 매직아이 어휘
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152647">수강<br>신청</a> 
            </li>
            <li>
                <div>
                영어 <span>|</span> 김신주 <span>|</span> 회차 : 7 <span>|</span> 업데이트 : 4.19 <br>
                <strong>2019 [지방직/서울시]김신주 영어 실전 동형모의고사(3월)</strong><br>
                교재 : 김신주 영어 전범위 문풀(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152648">수강<br>신청</a> 
            </li>

            <li>
                <div>
                영어 <span>|</span> 한덕현 <span>|</span> 회차 : 6 <span>|</span> 업데이트 : 4.20 <br>
                <strong>2019 [서울시대비] 한덕현 영어 실전 Final 모의고사 (4-5월)</strong><br>
                교재 : 실전 Final 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146977">수강<br>신청</a> 
            </li>
            <li>
                <div>
                영어 <span>|</span> 한덕현 <span>|</span> 회차 : 5 <span>|</span> 업데이트 : 4.19 <br>
                <strong>2019 [서울시대비] 한덕현 영어 실전 Final 모의고사 (4-5월)</strong><br>
                교재 : 실전 Final 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146973">수강<br>신청</a> 
            </li>
            <li>
                <div>
                영어 <span>|</span> 한덕현 <span>|</span> 회차 : 2 <span>|</span> 업데이트 : 5.25 <br>
                <strong>2019 [지방직] 한덕현 제니스 영어 지방직 아작내기 특강</strong><br>
                교재 : 특수 프린트
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152649">수강<br>신청</a> 
            </li>
            <li>
                <div>
                영어 <span>|</span> 한덕현 <span>|</span> 회차 : 2 <span>|</span> 업데이트 : 5.30 <br>
                <strong>2019 [서울시] 한덕현 제니스 영어 지방직 아작내기 특강</strong><br>
                교재 : 특수 프린트
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152651">수강<br>신청</a> 
            </li>

            <li>
                <div>
                영어 <span>|</span> 성기건 <span>|</span> 회차 : 8 <span>|</span> 업데이트 : 3.9 <br>
                <strong>2019 [국회8급] 성기건 영어 동형 실전모의고사 (3-4월) </strong><br>
                교재 : 특수 프린트
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147101">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                영어 <span>|</span> 김영 <span>|</span> 회차 : 6 <span>|</span> 업데이트 : 4.12 <br>
                <strong>2019 [지방직/서울시] 김영 영어 실전 Final 모의고사(4-5월) </strong><br>
                교재 : 특수 프린트
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152645">수강<br>신청</a> 
            </li>

            <li>
                <div>
                한국사 <span>|</span> 박민주 <span>|</span> 회차 : 8 <span>|</span> 업데이트 : 4.17 <br>
                <strong>2019 [지방직/서울시대비] 박민주 민주한국사 Final모의고사(4-5월)</strong><br>
                교재 : 민주국사 실전동형 모의고사
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147017">수강<br>신청</a> 
            </li>
            <li>
                <div>
                한국사 <span>|</span> 한경준 <span>|</span> 회차 : 6 <span>|</span> 업데이트 : 4.20 <br>
                <strong>2019 [지방직/서울시대비] 한경준 한국사 Final모의고사(4-5월)</strong><br>
                교재 : 실전 Final 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152652">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                한국사 <span>|</span> 조민주 <span>|</span> 회차 : 8 <span>|</span> 업데이트 : 5.10 <br>
                <strong>2019 조민주 세쿰 한국사 단원별+전범위 문제풀이 (5-6월)</strong><br>
                교재 : 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152653">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                행정법 <span>|</span> 한세훈 <span>|</span> 회차 : 8 <span>|</span> 업데이트 : 4.18 <br>
                <strong>2019 [지방직/서울시] 한세훈 행정법총론 Final 모의고사 (4-5월) </strong><br>
                교재 : 실전 Final 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152654">수강<br>신청</a> 
            </li>

            <li>
                <div>
                행정학 <span>|</span> 김덕관 <span>|</span> 회차 : 10 <span>|</span> 업데이트 : 5.7 <br>
                <strong>2019 [지방직/서울시] 김덕관 행정학 Final 모의고사(5-6월)</strong><br>
                교재 : 실전 Final 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147052">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                행정학 <span>|</span> 윤세훈 <span>|</span> 회차 : 8 <span>|</span> 업데이트 : 5.12 <br>
                <strong>2019 윤세훈 153 행정학 단원별 문제풀이(5-6월)</strong><br>
                교재 : 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152659">수강<br>신청</a> 
            </li>

            <li>
                <div>
                헌법 <span>|</span> 박기범 <span>|</span> 회차 : 8 <span>|</span> 업데이트 : 5.7 <br>
                <strong>2019 박기범 헌법 단원별 문제풀이(5-6월)</strong><br>
                교재 : 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152665">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                헌법 <span>|</span> 유시완 <span>|</span> 회차 : 8 <span>|</span> 업데이트 : 5.7 <br>
                <strong>2019 유시완 Bestlo 헌법 단원별 문제풀이(5-6월)</strong><br>
                교재 : 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152666">수강<br>신청</a> 
            </li>

            <li>
                <div>
                사회 <span>|</span> 문병일 <span>|</span> 회차 : 6 <span>|</span> 업데이트 : 4.17 <br>
                <strong>2019 [지방직/서울시] 문병일 퍼펙트사회 Final 모의고사(4-5월)</strong><br>
                교재 : 모의고사 프린트+워크북
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147117">수강<br>신청</a> 
            </li>            
            <li class="li2">
                <div>
                사회 <span>|</span> 한수성 <span>|</span> 회차 : 8 <span>|</span> 업데이트 : 4.17 <br>
                <strong>2019 [지방직/서울시]  한수성 사회 실전 Final 모의고사(4-5월)</strong><br>
                교재 : 실전 Final 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147103">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                세법 <span>|</span> 고선미 <span>|</span> 회차 : 8 <span>|</span> 업데이트 : 4.18 <br>
                <strong>2019 [지방직/서울시] 고선미 세법 실전 Final 모의고사(4-5월) </strong><br>
                교재 : 실전 Final 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147064">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                회계학 <span>|</span> 김영훈 <span>|</span> 회차 : 6 <span>|</span> 업데이트 : 4.19 <br>
                <strong>2019 [지방직/서울시] 김영훈 회계학 Final 모의고사(4-5월) </strong><br>
                교재 : 실전 Final 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147070">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                국제법 <span>|</span> 이상구 <span>|</span> 회차 : 16 <span>|</span> 업데이트 : 5.6 <br>
                <strong>2019 이상구 통합 국제법 단원별 문제풀이(5-6월)</strong><br>
                교재 : 통합국제법 5
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152661">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                국제정치학 <span>|</span> 이상구 <span>|</span> 회차 : 16 <span>|</span> 업데이트 : 5.11 <br>
                <strong>2019 이상구 국제정치학 단원별 문제풀이(5-6월)</strong><br>
                교재 : 통합국제정치학 5
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152662">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                경제학 <span>|</span> 황정빈 <span>|</span> 회차 : 16 <span>|</span> 업데이트 : 5.9 <br>
                <strong>2019 황정빈 멘토 경제학 단원별 문제풀이(5-6월)</strong><br>
                교재 : 황정빈 유형별 경제학(출간예정)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152660">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                중국어 <span>|</span> 조소현 <span>|</span> 회차 : 8 <span>|</span> 업데이트 : 5.9 <br>
                <strong>2019 조소현 중국어 단원별 문제풀이(5-6월)</strong><br>
                교재 : 모의고사 프린트
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152667">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                생물학개론 <span>|</span> 장사원 <span>|</span> 회차 : 4 <span>|</span> 업데이트 : 4.16 <br>
                <strong>2019 장사원 생물학개론 기출문제풀이(4월)</strong><br>
                교재 : 기출문제 프린트
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/146881">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                식용작물 <span>|</span> 장사원 <span>|</span> 회차 : 4 <span>|</span> 업데이트 : 4.17 <br>
                <strong>2019 장사원 농업직 식용작물 실전 동형모의고사(4-5월)</strong><br>
                교재 : 실전 동형모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152465">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                재배학 <span>|</span> 장사원 <span>|</span> 회차 : 4 <span>|</span> 업데이트 : 4.16 <br>
                <strong>2019 장사원 재배학 실전 동형모의고사 (4-5월)</strong><br>
                교재 : 실전 동형모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152464">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                공중보건 <span>|</span> 하재남 <span>|</span> 회차 : 4 <span>|</span> 업데이트 : 4.9 <br>
                <strong>2019 하재남 공중보건  실전 동형모의고사 (4월)</strong><br>
                교재 : 실전 동형모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152577">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                보건행정 <span>|</span> 하재남 <span>|</span> 회차 : 4 <span>|</span> 업데이트 : 4.12 <br>
                <strong>2019 하재남 보건행정 실전 동형모의고사 (4월)</strong><br>
                교재 : 실전 동형모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152686">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                전기기기 <span>|</span> 최우영 <span>|</span> 회차 : 4 <span>|</span> 업데이트 : 5.8 <br>
                <strong>2019 최우영 전기기기 실전 동형 모의고사</strong><br>
                교재 : 실전 Final 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152687">수강<br>신청</a> 
            </li>

            <li class="li2">
                <div>
                전기이론 <span>|</span> 최우영 <span>|</span> 회차 : 4 <span>|</span> 업데이트 : 5.8 <br>
                <strong>2019 최우영 전기이론 실전 동형 모의고사</strong><br>
                교재 : 실전 Final 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152688">수강<br>신청</a> 
            </li>

            <li>
                <div>
                전자공학 <span>|</span> 최우영 <span>|</span> 회차 : 4 <span>|</span> 업데이트 : 5.12 <br>
                <strong>2019 [지방직/서울시] 최우영 전자공학 실전 동형 모의고사</strong><br>
                교재 : 실전 Final 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152669">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                전자공학 <span>|</span> 최우영 <span>|</span> 회차 : 4 <span>|</span> 업데이트 : 4.26 <br>
                <strong>2019 최우영 전자공학 단원별 문제풀이</strong><br>
                교재 : 전자공학 단원별 문제집 [제본]
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152664">수강<br>신청</a> 
            </li>

            <li>
                <div>
                통신이론 <span>|</span> 최우영 <span>|</span> 회차 : 8 <span>|</span> 업데이트 : 4.12 <br>
                <strong>2019 [지방직/서울시] 최우영 통신공학/통신이론 단원별 문제풀이</strong><br>
                교재 : 실전 Final 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152663">수강<br>신청</a> 
            </li>
            <li>
                <div>
                통신이론 <span>|</span> 최우영 <span>|</span> 회차 : 4 <span>|</span> 업데이트 : 5.12 <br>
                <strong>2019 [지방직/서울시] 최우영 통신공학 실전 동형 모의고사</strong><br>
                교재 : 실전 Final 모의고사(프린트)
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/152668">수강<br>신청</a> 
            </li>
        </ul>

        <h4 class="NSK tx-deep-blue">2019 대비 군무원 5-6월 문제풀이</h4>
        <ul>
            <li>
                <div>
                국어 <span>|</span> 권기태 <span>|</span> 회차 : 12 <span>|</span> 업데이트 : 5.4 <br>
                <strong>2019 권기태 기태국어 핵심정리 & 동형 모의고사</strong><br>
                교재 : 당락을 가르는 한 문제
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3024/pattern/only/prod-code/152640">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                국어 <span>|</span> 권기태 <span>|</span> 회차 : 1 <span>|</span> 업데이트 : 6.15 <br>
                <strong>2019 권기태 기태국어 기출문제분석 특강</strong><br>
                교재 : 기출문제 프린트
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3024/pattern/only/prod-code/152641">수강<br>신청</a> 
            </li>

            <li>
                <div>
                행정학 <span>|</span> 김덕관 <span>|</span> 회차 : 6 <span>|</span> 업데이트 : 5.8 <br>
                <strong>김덕관 강한 행정학 동형 모의고사</strong><br>
                교재 : 동형 모의고사
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3024/pattern/only/prod-code/152657">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                행정학 <span>|</span> 김덕관 <span>|</span> 회차 : 1 <span>|</span> 업데이트 : 6.12 <br>
                <strong>김덕관 강한 행정학 기출문제분석 특강</strong><br>
                교재 : 모의고사 프린트
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3024/pattern/only/prod-code/152658">수강<br>신청</a> 
            </li>

            <li>
                <div>
                행정법 <span>|</span> 이석준 <span>|</span> 회차 : 6 <span>|</span> 업데이트 : 5.16 <br>
                <strong>이석준 행정법 동형 모의고사</strong><br>
                교재 : 동형 모의고사
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3024/pattern/only/prod-code/152656">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                행정법 <span>|</span> 이석준 <span>|</span> 회차 : 1 <span>|</span> 업데이트 : 6.13 <br>
                <strong>이석준 행정법 기출문제분석 특강</strong><br>
                교재 : 기출문제 프린트
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3024/pattern/only/prod-code/152656">수강<br>신청</a> 
            </li>
        </ul>

        <h4 class="NSK tx-deep-blue">2020 법원직 대비 1순환 (4-5월) 이론과정</h4>
        <ul>
            <li class="li2">
                <div>
                국어 <span>|</span> 이현나 <span>|</span> 회차 : 7 <span>|</span> 업데이트 : 4.3 <br>
                <strong>2020 법원직 이현나 햇살국어 1순환 기본강의(4-5월)</strong><br>
                교재 : 법원직 햇살국어 - 4월 출간예정
                </div>
                <a href="https://pass.willbes.nethttps://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/147128">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                영어 <span>|</span> 박초롱 <span>|</span> 회차 : 8 <span>|</span> 업데이트 : 4.1 <br>
                <strong>2020 법원직 박초롱 영어 1순환 기본강의(4-5월)</strong><br>
                교재 : 박초롱 영어 - 4월 출간예정
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/147127">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                한국사 <span>|</span> 임진석 <span>|</span> 회차 : 12 <span>|</span> 업데이트 : 4.2 <br>
                <strong>2020 법원직 임진석 한국사 1순환 기본강의(4-5월)</strong><br>
                교재 : 2020 임진석 한국사(윌비스) - 출간예정
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/147126">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                헌법 <span>|</span> 이국령 <span>|</span> 회차 : 16 <span>|</span> 업데이트 : 4.1 <br>
                <strong>2020 법원직 이국령 헌법 1순환 기본강의(4-5월)</strong><br>
                교재 : 이국령 법원직 헌법강의(윌비스) - 출간예정
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/147125">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                민법 <span>|</span> 김동진 <span>|</span> 회차 : 20 <span>|</span> 업데이트 : 4.1 <br>
                <strong>2020 법원직 김동진 민법 1순환 기본강의(4-5월)</strong><br>
                교재 : 날선민법 (윌비스) 1권(민법총칙,물권법) - 출간예정
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/147124">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                민소법 <span>|</span> 이덕훈 <span>|</span> 회차 : 12 <span>|</span> 업데이트 : 4.19 <br>
                <strong>2020 법원직 이덕훈 민사소송법 1순환 기본강의(4-5월)</strong><br>
                교재 : 법원직 민사소송법 (윌비스) - 출간예정
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/147123">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                형법 <span>|</span> 문형석 <span>|</span> 회차 : 16 <span>|</span> 업데이트 : 4.2 <br>
                <strong>2020 법원직 문형석 형법 1순환 기본강의(4-5월)</strong><br>
                교재 : 2020 문형석 형법(윌비스) - 출간예정
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/147122">수강<br>신청</a> 
            </li>
            <li class="li2">
                <div>
                형소법 <span>|</span> 문형석 <span>|</span> 회차 : 12 <span>|</span> 업데이트 : 4.22 <br>
                <strong>2020 법원직 유안석 형사소송법 1순환 기본강의(4-5월)</strong><br>
                교재 : 2020 유안석 형사소송법(윌비스) - 출간예정
                </div>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/147121">수강<br>신청</a> 
            </li>
        </ul>
        <div>※ 위 안내된 2019년 4-5월 신규과정은  학원사정에 따라 강의일정 변경 및 강의 추가 등이 있을 수 있습니다.</div>
    </div>

</div>



@stop