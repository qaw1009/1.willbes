@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="w-Guide">
                <h3 class="NSK-Black">선발예정인원 및 과목</h3>
                <h4 class="NGR">2020년 선발예정인원 및 시험과목</h4>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="12%">
                            <col width="15%">
                            <col width="25%">
                            <col >
                            <col width="20%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th rowspan="2">직렬<br />
                                (직류)</th>
                                <th rowspan="2">선발예정인원<br />
                                (총 320명)</th>
                                <th colspan="2">시 험 과 목</th>
                                <th rowspan="2">주요 근무
                                예정부처<br />(예시)</th>
                            </tr>
                            <tr>
                                <th>제1차시험
                                (선택형 필기)</th>
                                <th>제2차시험
                                (논문형 필기)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>행정직<br />
                                (일반행정)</th>
                                <td> 전국 : 120명<br />                            
                                지역구분 :  28명<br />
                                * 지역별 구분모집표 참조</td>
                                <td rowspan="10"> 언어논리영역,
                                
                                <br />
                                자료해석영역,
                                
                                <br />
                                상황판단영역,
                                
                                <br />
                                헌법,
                                
                                <br />
                                영어(영어능력검정시험으로 대체),
                                
                                    <br />
                                한국사(한국사능력검정
                                    시험으로 대체)</td>
                                <td> 필수(4) : 행정법, 행정학, 경제학, 정치학
                                
                                <br />
                                선택(1) : 민법(친족상속법 제외), 정보체계론, 조사방법론(통계분석 제외), 정책학, 국제법, 지방행정론</td>
                                <td>전 부처</td>
                            </tr>
                            <tr>
                                <th>행정직<br />
                                (인사조직)</th>
                                <td>2명</td>
                                <td> 필수(5) : 행정법, 행정학, 경제학, 정치학, 인사·조직론</td>
                                <td>인사혁신처 등</td>
                            </tr>
                            <tr>
                                <th>행정직<br />
                                (법무행정)</th>
                                <td>3명</td>
                                <td> 필수(4) : 행정법, 민법(친족상속법 제외), 행정학, 민사소송법
                                
                                <br />
                                선택(1) : 상법, 노동법, 세법, 사회법, 국제법, 경제학</td>
                                <td>공정거래위원회, <br />                            
                                법제처 등</td>
                            </tr>
                            <tr>
                                <th>행정직<br />
                                (재경)</th>
                                <td>72명</td>
                                <td> 필수(4) : 경제학, 재정학, 행정법, 행정학
                                
                                <br />
                                선택(1) : 상법, 회계학, 경영학, 세법, 국제경제학, 통계학</td>
                                <td>기획재정부,  <br />                           
                                금융위원회,  <br />                           
                                국세청 등</td>
                            </tr>

                            <tr>
                                <th>행정직<br />
                                (국제통상)</th>
                                <td>8명</td>
                                <td> 필수(4) : 국제법, 국제경제학, 행정법, 영어                            
                                <br />
                                선택(1) : 경제학, 무역학, 재정학, 경영학, 국제정치학, 행정학, 독어, 불어, 러시아어, 중국어, 일어, 스페인어</td>
                                <td>산업통상자원부,<br />                            
                                과학기술정보통신부 등</td>
                            </tr>
                            <tr>
                                <th>행정직<br />
                                (교육행정)</th>
                                <td>7명</td>
                                <td> 필수(4) : 교육학, 행정법, 행정학, 경제학                            
                                <br />
                                선택(1) : 조사방법론(통계분석 제외), <br />
                                    재정학, 정책학, 교육철학, <br />
                                    교육심리학, 교육사회학</td>
                                <td>교육부</td>
                            </tr>
                            <tr>
                                <th>사회복지직<br />
                                (사회복지)</th>
                                <td>2명</td>
                                <td> 필수(4) : 사회복지학, 사회학, 행정법, 경제학    
                                <br />
                                선택(1) : 조사방법론(통계분석 제외), 사회심리학, 사회문제론,<br />
                                    사회법, 사회정책, 행정학</td>
                                <td>보건복지부</td>
                            </tr>
                            <tr>
                                <th>보호직<br />
                                (보호)</th>
                                <td>2명</td>
                                <td> 필수(4) : 형법, 형사소송법, 심리학, 형사정책
                                
                                <br />
                                선택(1) : 교육학, 사회학, 사회복지학</td>
                                <td>법무부</td>
                            </tr>
                            <tr>
                                <th>검찰직<br />
                                (검찰)</th>
                                <td>2명</td>
                                <td> 필수(4) : 형법, 형사소송법, 행정법, 교정학
                                
                                <br />
                                선택(1) : 행정학, 경제학, 노동법, 사회법, 민법(친족상속법 제외), 회계학, 법의학</td>
                                <td>검찰청</td>
                            </tr>
                            <tr>
                                <th>출입국관리직<br />
                                (출입국관리)</th>
                                <td>3명</td>
                                <td> 필수(4) : 형사소송법, 국제법, 형법, 행정법
                                
                                <br />
                                선택(1) : 행정학, 정치학, 경제학, 민법(친족상속법 제외), 독어, 불어, 러시아어, 중국어, 일어, 스페인어, 아랍어, 말레이-인도네시아어</td>
                                <td>법무부</td>
                            </tr>
                        </tbody>
                    </table>
                </div>   

                <h4 class="NGR mt20">지역별 구분 모집표</h4>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="12%">
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>직렬<br />
                                (직류)</th>
                                <th>계</th>
                                <th>서울</th>
                                <th>부산</th>
                                <th>대구</th>
                                <th>인천</th>
                                <th>광주</th>
                                <th>대전</th>
                                <th>울산</th>
                                <th>세종</th>
                                <th>경기</th>
                                <th>강원</th>
                                <th>충북</th>
                                <th>충남</th>
                                <th>전북</th>
                                <th>전남</th>
                                <th>경북</th>
                                <th>경남</th>
                                <th>제주</th>
                            </tr>
                        </theda>
                        <tbody>
                            <tr>
                                <th>계</th>
                                <td>38</td>
                                <td>8</td>
                                <td>3</td>
                                <td>1</td>
                                <td>3</td>
                                <td>2</td>
                                <td>1</td>
                                <td>1</td>
                                <td>2</td>
                                <td>2</td>
                                <td>1</td>
                                <td>2</td>
                                <td>2</td>
                                <td>3</td>
                                <td>2</td>
                                <td>2</td>
                                <td>1</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <th>행정직<br />
                                (일반행정)</th>
                                <td>28</td>
                                <td>6</td>
                                <td>2</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>1</td>
                                <td>2</td>
                                <td>1</td>
                                <td>2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="st01 mt10">
                    <li>5급 공채시험(행정) 중 지역별 구분모집은 2020.1.1. 현재, 주민등록상 응시지역(시·도)에 거주한 기간이 모두 합하여 1년 이상이거나, 본인의 출신학교가
                    소재한 지역(시·도)에만 응시할 수 있습니다.</li>
                </ul>          
            </div>
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop