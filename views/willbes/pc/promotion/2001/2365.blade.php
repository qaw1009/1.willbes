@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            background:#fff;
            position:relative;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        
        /************************************************************/      

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2365_top_bg.jpg) center top no-repeat;padding-bottom:100px;}

        .wb_police {background:url(https://static.willbes.net/public/images/promotion/2021/09/2365_02.png) center center no-repeat;}
        .wb_police h3 {width:1000px;margin:0 auto;text-align:left;font-size:25px;font-weight:bold;padding:50px 0 25px;}
        .wb_police h4 {width:1000px;margin:0 auto;text-align:left;font-size:20px;font-weight:bold;padding:25px 0;}
        .wb_police .detail {width:1000px;margin:0 auto;text-align:left;font-size:15px;line-height:1.5;}
        .wb_police .period {color:#4F81BD;}
        .wb_police .pass {font-size:18px;font-weight:bold;padding:25px 0 50px;}
        .way {margin: 0 auto;width: 180px;height: 180px;border: 3px solid #000;display:inline-block;font-size:16px;padding-top:15px;line-height:1.5;}
        .arrow {font-size:50px;color:#4F81BD;}
        .wb_bottom {padding-bottom:100px;}
        .wb_police table {border-top:4px solid #1c1d31; border-left:1px solid #c6c6c6; width:1000px; margin:0 auto;}
        .wb_police table tr {border-bottom:1px solid #c6c6c6;}
        .wb_police table th,
        .wb_police table td {padding:20px; font-size:14px; line-height:1.5; border-right:1px solid #c6c6c6;}
        .wb_police table th {background-color:rgba(192,192,192,0.3);}
        .wb_police table th p {color:#e55425; font-weight:600}
        .wb_police table th strong {font-size:15px}
        .wb_police table td p {display:block; padding:5px}
        .wb_police table td span {vertical-align:top; color:#e55425; }
     
    </style>


    <div class="evtContent NSK" id="evtContainer">          
      
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2365_top.jpg" title="경찰간부후보생 시험 안내" />       
        </div>        
     
        <div class="evtCtnsBox wb_police">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2365_01.png" alt="경찰간부후보생이란"/>   
            <h3>경찰 간부 후보생 제도</h3>
            <p class="detail">경찰간부후보생 제도는 해방 이후 식민지 경찰의 잔재를 불식하고 경찰의 민주화를 실현하고자 1947년 우리나라 최초의 고급경찰 간부양성제도로 탄생하였습니다.<br>
                제1기 93명을 시작으로 정예경찰 간부를 배출하며 경찰간부의 질적 향상에 크나큰 기여를 하였으며 한국 경찰사와 맥을 같이 하고 있습니다.<br><br>
                중간입직 경찰공무원 교육과정의 통합 운영 방침에 따라 2019년부터 경찰대학에서 선발 및 교육과정을 운영하게 되어, 탁월한 교수진과 우수한 교육환경 등 경찰대학의 40여년의 경험을 살려 미래사회 변화에 대비하는 전문성과 국민과 소통, 공감하는 감수성을 겸비한 인재를 양성하고 있습니다.<br><br>
                경찰간부 후보생 공개경쟁 선발은 1, 2차 필기시험부터 6차 면접시험까지 총 6차에 걸쳐 진행됩니다. 최종 합격 후 1년간의 교육과정을 마치면 바른 인성과 전문 역량을 갖춘 정예경찰 간부로서 치안현장 각 분야에서 활동하게 됩니다. 
            </p>
            <h3>특전 및 진로</h3>
            <p class="detail">
                [특전]<br>
                ● 경찰간부후보생은 정예경찰 간부로 거듭나기 위해 최고의 교수진과 강의시설에서 학습하게 됩니다.<br>
                ● 경찰간부후보생은 1년간의 교육기간 중 소정의 수당을 매월 지급받게 되며, 각종 피복류, 침구류, 교과서 등
                교육에 필요한 급여품을 지급받습니다.<br>
                ● 수상인명구조자격증 및 무도단증(태권도, 검도, 유도, 합기도) 취득, 외국어 및 컴퓨터 숙달 등 다양한 능력을 
                배우게 됩니다.<br><br>
                [진로]<br>
                ● 교육과정 수료 후 경위로 임용되면 2년 6월간 필수 현장에 보직되어 근무합니다.<br>
                <span class="period">(지구대 또는 파출소 6월, 경찰서 수사부서 경제팀 2년)</span><br>
                ● 필수 현장 보직 근무를 마친 후 적성, 희망, 능력 등을 고려하여 인사 배치됩니다.<br>
                <span class="period">단, 특수분야 (세무회계: 수사·재정·감사 관련 부서, 사이버: 사이버·수사·정보통신 관련 부서)는 관련 분야 3년간 근무</span><br>
                ● 경찰공무원의 승진은 시험승진과 심사승진으로 이루어지며, 일정한 기간 이상의 승진 소요연수 경과 후 승진할 수
                  있습니다. <br>
                  경정까지는 시험승진과 심사승진이 병행되며, 총경부터는 심사에 의해서만 승진할 수 있습니다.<br>
                <span class="period">※ 승진소요최저연수: 경위→경감 2년, 경감→경정 3년</span>
            </p>
        </div>      

        <div class="evtCtnsBox wb_police">
            <h3>응시자격</h3>
            <table>
                <col />
                <col />
                <col />
                <col />
                <col />
                <thead>
                    <tr>
                        <th><strong>구분</strong></th>
                        <th><strong>응시 자격요건</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><strong>연령</strong></th>
                        <td>
                            <p>▶21세 이상 40세 이하인 사람(1980.1.1~2000.12.31.  출생한사람)</p>
                            <p>※『경찰공무원 임용령』제39조제2항</p>
                            <p>-제대군인은 군복무기간 1년 미만은  1세, 1년 이상 2년 미만은  2세, 2년 이상은  3세씩 상한  응시연령 연장</p>
                            <p>*군복무: 제대군인, 사회복무요원, 공중보건의사, 병역판정검사전담의사, 국제협력의사, 공익법무관, 공중방역수의사, 전문연구요원, 산업기능요원</p>   
                        </td>
                    </tr>
                    <tr>
                        <th><strong>학력</strong></th>
                        <td>
                            <p>▶학력 제한 없음</p>
                        </td>
                    </tr>
                    <tr>
                        <th><strong>병역</strong></th>
                        <td>
                            <p>▶병역 제한 없음</p>
                            <p>※병역 복무를 사유로 하는 경우 경찰간부후보생 교육 입교 전에  임용유예 허용</p>         
                        </td>
                    </tr>
                     <tr>
                        <th><strong>운전면허</strong></th>
                        <td>
                            <p>▶1종 운정면허증 대형면허 또는 보통면허를 소지한 사람*</p>
                            <p>*『도로교통법』제80조제2항제1호에 따른  제1종 보통  운전면허 이상을 소지하여아함(원서접수일로부터  면접시험 최종일까지 유효하여야 함)</p>                        
                        </td>
                    </tr>
                </tbody>
            </table>  
        </div>

        <div class="evtCtnsBox wb_police">
            <h3>신체조건</h3>
            <table>
                <col />
                <col />
                <col />
                <col />
                <col />
                <thead>
                    <tr>
                        <th><strong>구분</strong></th>
                        <th><strong>내용 및 기준</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><strong>체격</strong></th>
                        <td>
                            <p>▶국립.공립병원 또는 종합병원에서 실시한 경찰공무원 채용시험 신체검사 및  약물검사의 결과 건상상태가 양호하고,  직무에 적합한 신체를 가져야 한다.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><strong>시력</strong></th>
                        <td>
                            <p>▶시력(교정시력을  포함한다)은 양쪽  눈이 각각 0.8 이상이어야  한다.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><strong>색각</strong></th>
                        <td>
                            <p>▶색각  이상(약도  색약은 제외한다)이 아니어야한다.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><strong>청력</strong></th>
                        <td>
                            <p>▶청력이  정상[좌우 각각  40데시벨  이하의 소리를 들을 수 있는 경우를 말한다]이어야  한다.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><strong>혈압</strong></th>
                        <td>
                            <p>▶고혈압[수축기혈압이  145수은주밀리미터를  초과하거나 확장기혈압이 90수은주밀리미터를  초과하는</p>
                            <p> 경우를 말한다] 또는  저혈암[수축기혈압이  90수은주밀리미터  미만이거나 확장기혈압이 60수은주밀리미터 </p>
                        <p> 미만인 경우를 말한다]이  아니어야 한다.</p>                    </td>
                    </tr>
                    <tr>
                        <th><strong>사시</strong></th>
                        <td>
                            <p>▶복시가  없어야 한다. 다만, 안과전문의가  직무수행에 지장이 없다고 진단한 경우에는 그렇지 않다.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><strong>문신</strong></th>
                        <td>
                            <p>▶내용 및  노출 여부에 따라 경찰공무원의 명예를 훼손할 수 있다고 판단되는 문신이 없어야 한다.</p>
                        </td>
                    </tr>
                </tbody>
            </table>  
        </div>

        <div class="evtCtnsBox wb_police">
            <h3>시험 제도</h3>
            <h4>1.선발 분야</h4>
            <table>
                <col />
                <col />
                <col />
                <col />
                <col />
                <thead>
                    <tr>
                        <th><strong>분야</strong></th>
                        <th><strong>일반전형</strong></th>
                        <th><strong>세무 회계</strong></th>
                        <th><strong>사이버</strong></th>
                        <th><strong>계</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><strong>인원</strong></th>
                        <td><p>40</p></td>
                        <td><p>5</p></td>
                        <td><p>5</p></td>
                        <td><p>50</p></td>
                    </tr>
                    
                </tbody>
            </table>  
        </div>
        <div class="evtCtnsBox wb_police">         
            <h4>2.시험 방법</h4>
            <ul class="exam">
                <li class="way">1차<br>필기시험<br><br>객관식<br>필수 5과목<br>선택 1과목</li> <span class="arrow">></span>
                <li class="way">2차<br>신체검사<br><br>신체조건 및<br>건강상태 검사</li> <span class="arrow">></span>
                <li class="way">3차<br>인적성검사<br><br>적성과 자질 등<br>종합검사</li> <span class="arrow">></span>
                <li class="way">4차<br>체력검사<br><br>총 5개 종목<br>체력시험</li> <span class="arrow">></span>
                <li class="way">5차<br>면접시험<br><br>직무수행 능력,<br>발전,적격성<br>심사</li>
            </ul>
        </div>
        <div class="evtCtnsBox wb_police">
            <h4>3.합격 기준</h4>
                <p class="pass">필기 합격자 중 필기, 체력, 면접, 가산점 합산하여 고득점자 순으로 최종 합격자 선발</p>
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2365_03.png" title="경찰간부후보생 시험 안내" />
        </div>
        <div class="evtCtnsBox wb_police">         
            <h4>4.필기시험 과목</h4>    
            <table>
                <col />
                <col />
                <col />
                <col />
                <col />
                <thead>
                    <tr>
                        <th><strong>일반전형</strong></th>
                        <th><strong>세무 회계</strong></th>
                        <th><strong>사이버</strong><strong></strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><p>▶필수: 영어(검정제), </p>
                          	<p>한국사(검정제), 형사법 </p>
                        	<p>헌법, 경찰학, 범죄학</p>
                        </td>
                        <td>
                        	<p>▶필수: 영어(검정제),</p>
                         	<p>한국사(검정제) 형사법,</p>
                        	<p>헌법, 세법개론, 회계학</p>
                        </td>
                        <td><p>▶필수: 영어(검정제),</p>
                          	<p>한국사(검정제). 형사법,</p>
                          	<p>헌법, 정보보호론, </p>
                        	<p>시스템〮네트워크  보안</p>
                         </td>
                    </tr>
                     <tr>
                        <td><p>▶선택: 행정법, 행정학, </p>
                            <p>민법총칙  중 택1</p>
                        </td>
                        <td>
                            <p>▶선택: 상법총칙, 경제학, 통계학, </p>
                            <p>재정학 중  택1</p>
                        </td>
                        <td>
                            <p>▶선택: 데이터베이스론, 통신이론, </p>
                            <p>소프트웨어공학  중 택1</p>
                        </td>
                    </tr>                    
                </tbody>
            </table>  

            <table style="margin-top:75px;">
                <col />
                <col />
                <col />
                <col />
                <col />
                <thead>
                    <tr>
                        <th><strong>구분</strong></th>
                        <th><strong>과목</strong></th>
                        <th><strong>검정시험 종류 및 기준점수</strong><strong></strong></th>
                        <th><strong>유효기간</strong><strong></strong></th>                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th rowspan="2"><strong>검정시험</storong></th>
                        <td>
                        	<p>영어</p>
                        </td>
                        <td><p>▶토익: 625점 이상</p>
                            <p>▶토플: PBT 490점  이상, IBT 58점  이상</p>
                            <p>▶텝스: 280점 이상</p>
                            <p>▶지텔프: Level 2 50점  이상</p>
                            <p>▶플렉스: 520점 이상</p>
                            <p>▶토셀: Advanced 550점  이상</p>    
                        </td>
                         <td>
                         	<p>3년</p>
                         </td>
                    </tr>
                     <tr>
                        <td>
                   		    <p>한국사</p>
                        </td>
                        <td>
                            <p>▶한국사능력검정시험  2급 이상</p>
                        </td>
                        <td>4년</td>
                    </tr>                  
                </tbody>
            </table>  
            <p class="pass">※ 2022년 기준, 영어의 경우 2019.1.1 이후, 한국사의 경우 2018.1.1 이후 실시된 시험성적 제출</p>
        </div>
        <div class="evtCtnsBox wb_police">         
            <h4>5.체력 시험 기준</h4>    
            <p class="pass">5종목 [50m달리기 /왕복오래달리기 /윗몸일으키기 /좌우악력 /팔굽혀펴기]</p>
            <table>
                <col />
                <col />
                <col />
                <col />
                <col />
                <thead>
                    <tr>
                        <th colspan="2"><strong>구분</strong></th>
                        <th><strong>10점</strong><strong></strong></th>
                        <th><strong>9점</strong><strong></strong></th>   
                        <th><strong>8점</strong><strong></strong></th>
                        <th><strong>7점</strong><strong></strong></th>
                        <th><strong>6점</strong><strong></strong></th>
                        <th><strong>5점</strong><strong></strong></th>
                        <th><strong>4점</strong><strong></strong></th>
                        <th><strong>3점</strong><strong></strong></th>
                        <th><strong>2점</strong><strong></strong></th>  
                        <th><strong>1점</strong><strong></strong></th>                                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       <th rowspan="5"><strong>남자</strong></th>
                       <th>50m 달리기(초)</th>
                       <td>7.0이하</td>
                       <td>7.01~7.21</td>
                       <td>7.22~7.42</td>
                       <td>7.43~7.63</td>
                       <td>7.64~7.84</td>
                       <td>7.85~8.05</td>
                       <td>8.06~8.26</td>
                       <td>8.27~8.47</td>
                       <td>8.48~8.68</td>     
                       <td>8.69이상</td>     
                    </tr>     
                     <tr>
                       <th>왕복오래달리(회)</th>
                       <td>77<br>이상</td>
                       <td>76~72</td>
                       <td>71~67</td>
                       <td>66~62</td>
                       <td>61~57</td>
                       <td>56~52</td>
                       <td>51~47</td>
                       <td>46~41</td>
                       <td>40~35</</td>     
                       <td>34<br>이하</td>     
                    </tr>     
                     <tr>
                       <th>윗몸일으키기(회/1분)</p></th>
                       <td>58<br>이상</td>
                       <td>57~55</td>
                       <td>54~52</td>
                       <td>51~49</td>
                       <td>48~46</td>
                       <td>45~43</td>
                       <td>42~40</td>
                       <td>39~36</td>
                       <td>35~32</td>     
                       <td>31<br>이하</td>     
                    </tr>     
                     <tr>
                       <th>좌우 악력(kg)</p></th>
                       <td>64<br>이상</td>
                       <td>63~61</td>
                       <td>60~58</td>
                       <td>57~55</td>
                       <td>54~52</td>
                       <td>1~49</td>
                       <td>48~46</td>
                       <td>45~43</td>
                       <td>42~40</td>     
                       <td>39<br>이하</td>     
                    </tr>     
                     <tr>
                       <th>팔굽혀펴기(회/1분)</p></th>
                       <td>61<br>이상</th>
                       <td>60~56</td>
                       <td>55~51</td>
                       <td>50~46</td>
                       <td>45~40</td>
                       <td>39~34</td>
                       <td>33~28</td>
                       <td>27~22</td>
                       <td>21~16</td>     
                       <td>15<br>이하</td>     
                    </tr>                 
                </tbody>
            </table>  

            <table style="margin-top:75px;margin-bottom:25px;">
                <col />
                <col />
                <col />
                <col />
                <col />
                <thead>
                    <tr>
                        <th colspan="2"><strong>구분</strong></th>
                        <th><strong>10점</strong><strong></strong></th>
                        <th><strong>9점</strong><strong></strong></th>   
                        <th><strong>8점</strong><strong></strong></th>
                        <th><strong>7점</strong><strong></strong></th>
                        <th><strong>6점</strong><strong></strong></th>
                        <th><strong>5점</strong><strong></strong></th>
                        <th><strong>4점</strong><strong></strong></th>
                        <th><strong>3점</strong><strong></strong></th>
                        <th><strong>2점</strong><strong></strong></th>  
                        <th><strong>1점</strong><strong></strong></th>                                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       <th rowspan="5"><strong>여자</strong></th>
                       <th>50m 달리기(초)</th>
                       <td>8.23이하</td>
                       <td>8.24~8.47</td>
                       <td>8.48~8.71</td>
                       <td>8.72~8.95</td>
                       <td>8.96~9.19</td>
                       <td>9.20~9.43</td>
                       <td>9.44~9.67</td>
                       <td>9.68~9.91</td>
                       <td>9.92~10.15</td>     
                       <td>10.16이상</td>     
                    </tr>     
                     <tr>
                       <th>왕복오래달리(회)</th>
                       <td>51<br>이상</td>
                       <td>50~47</td>
                       <td>46~44</td>
                       <td>43~41</td>
                       <td>40~38</td>
                       <td>37~35</td>
                       <td>34~32</td>
                       <td>31~28</td>
                       <td>27~24</td>     
                       <td>23<br>이하</td>     
                    </tr>     
                     <tr>
                       <th>윗몸일으키기(회/1분)</th>
                       <td>55<br>이상</td>
                       <td>54~51</td>
                       <td>50~47</td>
                       <td>46~43</td>
                       <td>42~39</td>
                       <td>38~35</td>
                       <td>34~31</td>
                       <td>30~27</td>
                       <td>26~23</td>     
                       <td>22<br>이하</td>     
                    </tr>     
                     <tr>
                       <th>좌우 악력(kg)</th>
                       <td>44<br>이상</td>
                       <td>43~42</td>
                       <td>41~40</td>
                       <td>39~38</td>
                       <td>37~36</td>
                       <td>35~34</td>
                       <td>33~31</td>
                       <td>30~28</td>
                       <td>27~25</td>     
                       <td>24<br>이하</td>     
                    </tr>     
                     <tr>
                       <th>팔굽혀펴기(회/1분)</th>
                       <td>31<br>이상</td>
                       <td>30~28</td>
                       <td>27~25</td>
                       <td>24~22</td>
                       <td>21~19</td>
                       <td>18~16</td>
                       <td>15~13</td>
                       <td>12~10</td>
                       <td>9~7</td>     
                       <td>6<br>이하</td>     
                    </tr>                 
                </tbody>
            </table>  

        </div>
        <div class="evtCtnsBox wb_police wb_bottom">
            <h4>6. 면접 시험 기준</h4>  
            <h4>면접 방식</h4>
            <p class="detail">
                ▶ 1단계(집단면접) : 수험생 5~6명 1개조 편성, 30~40분간 면접 실시<br>
                ▶ 2단계(개별면접) : 개인별 5~10분간 면접 실시
            </p>
            <table style="margin-top:25px;">
                <col />
                <col />
                <col />
                <col />
                <col />
                <thead>
                    <tr>
                        <th><strong>구분</strong></th>
                        <th><strong>평 가 항 목</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                        	<strong>1단계</strong>
                        	<strong>(집단면접)</strong>
                        </th>
                        <td>
                            <p>[평가항목:  의사발표의  정확성과 논리성 및 전문지식]</p>
                            <p>1.경찰에 대한 기본인식</p>
                            <p>2.상황판단 및 문제해결능력</p>
                            <p>3.의사소통능력</p>
                            <p>4.정보수집 분석능력</p>
                        	<p>.조정 및 통합능력</p>                       
                         </td>
                    </tr>
                    <tr>
                        <th>
                            <strong>2단계</strong>
                        	<strong>(개별면접)</strong>
                        </th>
                        <td>
                            <p>[평가항목:  예의,  품행,봉사,정직,성실,발전가능성]</p>
                            <p>1.경찰관으로서 윤리의식(도덕성, 청렴성, 준법성)</p>
                            <p>2.국민의 경찰로서 봉사정신과 사명감</p>
                            <p>3.조직구성원으로서 협동심과 공동체 의식</p>
                            <p>4.자기통제 및 적응력</p>
                            <p>5.자신감과 적극성</p>
                    </tr>
                </tbody>
            </table>  
            <h4>평가방법 및 합격자 결정</h4>
            <p class="detail">
                ▶ 면접위원은 평가항목별 1~10점 사이의 점수로 점수부여 <br>
                ▶ 단계별 면접위원의 평정점수를 합산, 총점 4할 이상의 득점자를 합격자로 결정<br>
                ▶ 단계별 면접시험 위원의 과반수가 2점 이하로 평정한 경우 불합격
            </p>
        </div>  

    </div>


    </div>
    <!-- End Container -->

    <script>  
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });       
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop
 