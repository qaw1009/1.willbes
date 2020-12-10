@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/
        
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/1978_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#1845dc;}
        .evt02 {background:#efefef;}
        .evt02 .youtube {position:absolute; top:725px; left:50%; margin-left:-392px; width:784px; height:442px; z-index:1}
        .evt02 .youtube iframe {width:784px; height:442px;}
        .evt03 {width:1000px; margin:0 auto 100px}
        .evt03 table {border-top:1px solid #dedede; border-right:1px solid #dedede}
        .evt03 tr {border-bottom:1px solid #dedede}
        .evt03 th,
        .evt03 td {padding:10px 15px; font-size:14px; color:#666; line-height:1.5; border-left:1px solid #dedede}
        .evt03 th {background:#f4f4f4; color:#000}
        .evt03 td strong {font-size:16px; color:#000}
        .evt03 td a {display:block; background:#1845dc; color:#fff; border-radius:30px; padding:10px; font-weight:bold}
        .evt03 td a:hover {background:#333}
        .evt04 {background:#1845dc;}
        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1978_top.jpg" alt=""/>
        </div>
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1978_01.jpg" alt=""/>
        </div>
        
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1978_02.jpg" alt=""/> 
            {{-- 
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/WC-VzT66KnY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            --}}         
        </div>
        
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1978_03.jpg" alt=""/>   
            <div class="mt50">
                <table>
                    <col/>
                    <col />
                    <col />
                    <col/>
                    <col />
                    <thead>
                        <tr>
                            <th>구분</th>
                            <th>과목</th>
                            <th>진행시기</th>
                            <th>회차</th>
                            <th>수강료</th>
                            <th>신청</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="6">필수</td>
                            <td class="tx-left"><strong>문형석 교수 형법 입문강의</strong><br />
                            1)형법의 일반개념과 기초이론 학습을 통해 기본 체계 완성<br />
                            2)총론과 각론의 유기적인 설명을 통해 형법의 기초를 확립<br />
                            3)리딩판례를 사례화 하여 판례의 법리를 이해<br />
                            4)변화될 출제경향과 공부방법<br /></td>
                            <td>2021년 1월</td>
                            <td>5</td>
                            <td>무료</td>
                            <td><a href="https://spo.willbes.net/lecture/show/cate/3100/pattern/only/prod-code/176182" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left"><strong>정진천 교수 경찰학 입문특강</strong><br />
                            1)효율적인 학습전략<br />
                            2)기본용어 정리와 적용 예<br />
                            3)경찰조직의 이해</td>
                            <td>2021년    1월</td>
                            <td>1</td>
                            <td>무료</td>
                            <td><a href="https://spo.willbes.net/lecture/show/cate/3100/pattern/only/prod-code/176183" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left"><strong>유안석 교수 형소법 입문강의</strong><br />
                            1)형사소송법의 이해를 위한 기초 법개념<br />
                            2)수사와 증거법 중요조문과 중요판례<br />
                            3)형사소송법의 개정 취지에 따른 출제경향 분석</td>
                            <td>2021년</td>
                            <td>6</td>
                            <td>무료</td>
                            <td><a href="https://spo.willbes.net/lecture/show/cate/3100/pattern/only/prod-code/176184" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left"><strong>김기환 변호사 범죄학 입문강의</strong><br />
                            1)범죄학의 전체적인 구조와 일반론<br />
                            2)수험적합적인 범죄학 학습방법<br />
                            3)기출문제의 난이도와 학습방향</td>
                            <td>2021년    1월</td>
                            <td>1</td>
                            <td>무료</td>
                            <td><a href="https://spo.willbes.net/lecture/show/cate/3100/pattern/only/prod-code/176186" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left"><strong>선동주 교수 경찰헌법 키노트 입문특강</strong><br />
                            1)경찰수험에 특화된 헌법강의<br />
                            2)헌법의 기초개념부터 중요판례까지<br />
                            3)본격적인 수험준비 전 헌법의 기초실력 수립</td>
                            <td>2020년 11월</td>
                            <td>10</td>
                            <td>1~3회차 무료</td>
                            <td><a href="https://spo.willbes.net/lecture/show/cate/3100/pattern/only/prod-code/176589" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left"><strong>이국령 교수 경찰헌법 입문특강</strong><br />
                            1)쉬운 헌법 – 간결하게 정리된 교재를 통한 쉽고 빠른 1회독<br />
                            2)자연스러운 복습 – 회차 마다 ○× 복습자료 제공<br />
                            3)기출정리까지 동시에 – 경찰 공채 및 승진 기출 동시 정리</td>
                            <td>2020년    12월</td>
                            <td>8</td>
                            <td>1~3회차 무료</td>
                            <td><a href="https://spo.willbes.net/lecture/show/cate/3100/pattern/only/prod-code/176590" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td rowspan="3">선택</td>
                            <td class="tx-left"><strong>고태환 교수    민법총칙 입문강의</strong><br />
                            1)민법총칙 이해를 위한 기본개념<br />
                            2)중요 조문 및 중요 판례</td>
                            <td>2021년    1월</td>
                            <td>4</td>
                            <td>무료</td>
                            <td><a href="https://spo.willbes.net/lecture/show/cate/3100/pattern/only/prod-code/176188" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left"><strong>김동진 교수 New 민법총칙 입문특강</strong><br />
                            1)수험생의 눈높이에 맞춘 쉽고 편한 민법총칙<br />
                            2)이해를 통한 민법총칙의 밑그림 완성<br />
                            3)권리의무관계의 구조 확인</td>
                            <td>2021년    1월</td>
                            <td>3</td>
                            <td>무료</td>
                            <td><a href="https://spo.willbes.net/lecture/show/cate/3100/pattern/only/prod-code/176189" target="_blank">수강신청</a></td>
                        </tr>
                        <tr>
                            <td class="tx-left"><strong>이동호 경찰간부 행정학 입문특강</strong><br />
                            1)입문자를 위한 행정학 특강<br />
                            2)행정학 전체 체계 확립을 위한 강의<br />
                            3)공무원 시험과는 다른 행정학 출제범위 및 출제 경향<br />
                            4)주요 이론 및 주요 개념</td>
                            <td>2020년    12월</td>
                            <td>1</td>
                            <td>무료</td>
                            <td><a href="https://spo.willbes.net/lecture/show/cate/3100/pattern/only/prod-code/176190" target="_blank">수강신청</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>        
        </div>
        
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1978_04.jpg" alt=""/>           
		</div>
	</div>
    <!-- End Container -->
@stop