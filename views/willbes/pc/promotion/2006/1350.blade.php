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
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

/************************************************************/     
        .skybanner{position: fixed; top: 280px;right: 2px;z-index: 1;}	
        .cert_top{background:url(https://static.willbes.net/public/images/promotion/2019/08/1350_top_bg.jpg) no-repeat center top;}	        		
		.cert_01{background:#fff;}	
		.cert02{background:#f5f5f5;}
		.cert03{background:#fff;position:relative; width:1120px; margin:0 auto;}	
		.evtContent label.check3 {top:610px; left:143px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}
		.evtContent input + label {position:absolute; z-index:1; width:30px; height:30px; outline:5px solid #15365d; background:#fff}
		.evtContent input:checked + label:after {position: relative;content: '\2714';font-size: 30px;}
		.evtContent input:checked + label.check3:after{font-size: 20px;}		
        .evtContent input {display:none}	 
        .cert04 h3{font-size:36px;color:#15365d;font-weight:bold;margin-bottom:50px;}
        .cert04 .sports{width:979px;margin:0 auto;border:5px solid #15365d; border-bottom:0; margin-top:65px;background:#fff;color:#15365d;font-weight:bold;}

        .content_guide_wrap{background:#fff; width:1210px; margin:0 auto; padding:50px 0;}
        .content_guide_wrap .guide_tit{width:1210px;margin:0 auto;text-align:center; }
        .content_guide_wrap .tabs {width:960px; margin:0 auto;}
        .content_guide_wrap .tabs li {display:inline; float:left; width:137.1px}
        .content_guide_wrap .tabs li a {display:block; text-align:center; height:60px; line-height:60px; font-size:140% !important; border:2px solid #f3f3f3; border-bottom:2px solid #202020; background:#f3f3f3}
        .content_guide_wrap .tabs li a:hover,
        .content_guide_wrap .tabs li a.active {border:2px solid #202020; border-bottom:2px solid #fff; color:#202020; background:#fff; font-weight:600}
        .content_guide_wrap .tabs:after {content:""; display:block; clear:both}
        .content_guide_box{width:960px; margin:0 auto; border:2px solid #202020; border-top:0; padding-top:50px; padding-bottom:30px}
        .content_guide_box table{text-align:center; margin:0 50px; word-break:keep-all; padding:30px}

        .LAeventB03 table {border:1px solid #15365d; line-height:25px; width:700px; margin:50px auto;} 
		.LAeventB03 p {font-size:1.5em;color: #000;}
        .LAeventB03 tr {border-bottom:1px solid #ccc}        
        .LAeventB03 tr.st01 {background:#ececec}
        .LAeventB03 tr:hover {background:#f9f9f9}
        .LAeventB03 th,
        .LAeventB03 td {padding:10px; font-size:14px; font-weight:500; line-height:1.4}
        .LAeventB03 th {background:#5f5f5f; color:#fff}
        .LAeventB03 td:nth-child(1) {text-align:center;border-right:1px solid #ccc;}
        .LAeventB03 td:nth-child(2) {text-align:left}
        .LAeventB03 td:nth-child(3) {color:#5117c9}
        .LAeventB03 td:last-child {border:0}
        .LAeventB03 td p {font-size:12px}
		.LAeventB03 table a {padding:10px 15px; color:#fff; background:#5117c9; font-size:14px; display:block; border-radius:20px 20px 0 20px}
        .LAeventB03 table a.btn2 {color:#666; background:#fff; border:1px solid #666; cursor:default}
        .LAeventB03 table a:hover {background:#252525; color:#fff;}
        .LAeventB03 table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}
        .LAeventB03 iframe{width:700px;height:400px;}
        

        dd{display:none;}
        dd.active{display:block;}

        .cert05{background:#fff;}

    </style>
	<div class="evtContent NGR">
        {{--
		<div class="skybanner">
			<a href="https://job.willbes.net/support/notice/show/cate/309001?board_idx=260791" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/03/1350_skybanner.png" alt="스포츠지도사 베너"></a>
        </div>
        --}}		
		<div class="evtCtnsBox cert_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1350_top.jpg" alt="윌비스 2020 스포츠지도사" usemap="#Map" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="140,666,424,783" href="#apply" alt="전문스포츠지도사 수강신청"/>
                <area shape="rect" coords="462,665,743,786" href="#apply" alt="생활스포츠지도사 수강신청" />
            </map>
		</div>
		<div class="evtCtnsBox cert_01">
			<img src="https://static.willbes.net/public/images/promotion/2019/08/1350_01.jpg" alt="취업난 돌파" />
		</div>
		<div class="evtCtnsBox cert02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1350_02.jpg" alt="윌비스와 함께"/>      
		</div>
		<div class="evtCtnsBox cert03" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1350_03.jpg" alt="수강신청" usemap="#Map1350z" border="0" />
            <map name="Map1350z" id="Map1350z">
                <area shape="rect" coords="189,435,424,537" href="#none;" onclick="goCartNDirectPay('pass', 'y_pkg1', 'on_lecture', 'periodpack_lecture', 'Y');"/>
                <area shape="rect" coords="690,437,923,539" href="#none;" onclick="goCartNDirectPay('pass', 'y_pkg2', 'on_lecture', 'periodpack_lecture', 'Y');" />
                <area shape="rect" coords="740,603,901,639" href="#info3" />
            </map>           
            <div id="pass">
                <input name="y_pkg1" type="checkbox" value="155933" class="hide" checked="checked">
                <input name="y_pkg2" type="checkbox" value="155934" class="hide" checked="checked">
                <input name="is_chk" type="checkbox" value="Y" id="ischk3"><label for="ischk3" class="check3"></label>
            </div>
        </div>
        <div class="evtCtnsBox cert04 content_guide_wrap" id="tab">
            <h3>스포츠지도사 강의구성</h3>             
                <ul class="tabs">
                    <li><a href="#tab1" id="menu_tab1">스포츠사회학</a></li>
                    <li><a href="#tab2" id="menu_tab2">스포츠교육학</a></li>
                    <li><a href="#tab3" id="menu_tab3">스포츠심리학</a></li>
                    <li><a href="#tab4" id="menu_tab4">한국체육사</a></li>
                    <li><a href="#tab5" id="menu_tab5">운동생리학</a></li>
                    <li><a href="#tab6" id="menu_tab6">운동역학</a></li>
                    <li><a href="#tab7" id="menu_tab7">스포츠윤리</a></li>
                </ul>      
                <div class="content_guide_box  LAeventB03" id="tab1">
				    <p><iframe src="https://www.youtube.com/embed/bd3zEU8QZVM" frameborder="0" allowfullscreen=""></iframe></p>
                    <table>
                        <col width="50%"/>
                        <col/>
                        <tr>
                            <th>주요항목</th>
                            <th>세부항목</th>
                        </tr>
                        <tr>
                            <td><p>1. 스포츠 사회학의 이해</p></td>
                            <td><p>1. 스포츠사회학의 의미 </p>
                            <p>2. 스포츠의 사회적 기능 </p></td>
                        </tr>
                        <tr>
                            <td><p>2. 스포츠와 정치</p></td>
                            <td><p>1. 스포츠와 정치의 결합 </p>
                            <p>2. 스포츠와 국내정치 </p>
                            <p>3. 스포츠와 국제정치 </p></td>
                        </tr>
                        <tr>
                            <td><p>3. 스포츠와 경제</p></td>
                            <td><p>1. 상업주의와 스포츠 </p>
                            <p>2. 스포츠 메가이벤트의  경제 </p></td>
                        </tr>
                        <tr>
                            <td><p>4. 스포츠와 교육</p></td>
                            <td><p>1. 스포츠의 교육적 기능 </p>
                            <p>2. 한국의 학원스포츠 </p></td>
                        </tr>
                        <tr>
                            <td><p>5. 스포츠와 미디어</p></td>
                            <td><p>1. 스포츠와 미디어의 이해 </p>
                            <p>2. 스포츠와 미디어의 상호관계 </p></td>
                        </tr>
                        <tr>
                            <td><p>6. 스포츠와 사회계급/계층</p></td>
                            <td><p>1. 사회계층의 이해 </p>
                            <p>2. 사회계층과 스포츠 참가 </p>
                            <p>3. 스포츠와 계층이동 </p></td>
                        </tr>
                        <tr>
                            <td><p>7. 스포츠와 사회화</p></td>
                            <td><p>1. 스포츠사회화의 의미와 과정 </p>
                            <p>2. 스포츠로의 사회화와 스포츠를 통한 사회화 </p>
                            <p>3. 스포츠 탈사회화와  재사회화 </p></td>
                        </tr>
                        <tr>
                            <td><p>8. 스포츠와 일탈</p></td>
                            <td><p>1. 스포츠일탈의 이해 </p>
                            <p>2. 스포츠일탈의 유형 </p></td>
                        </tr>
                        <tr>
                            <td><p>9. 미래사회의 스포츠</p></td>
                            <td><p>1. 스포츠 변화에 영향을 미치는 요인 </p>
                            <p>2. 스포츠 세계화 </p></td>
                        </tr>
                    </table>					  
                </div>    
                <div class="content_guide_box  LAeventB03" id="tab2">
				    <p><iframe src="https://www.youtube.com/embed/QXxWoGDG6Rk" frameborder="0" allowfullscreen=""></iframe></p>
                    <table>
                        <col width="50%"/>
                        <col/>
                        <tr>
                            <th>주요항목</th>
                            <th>세부항목</th>
                        </tr>
                        <tr>
                            <td><p>1. 스포츠교육의 배경과 개념</p></td>
                            <td><p>1. 스포츠교육의 역사 </p>
                                <p>2. 스포츠교육의 개념 </p>
                            <p>3. 스포츠교육의 현재 </p></td>
                        </tr>
                        <tr>
                            <td><p>2. 스포츠교육의 정책과 제도</p></td>
                            <td><p>1. 학교체육 </p>
                                <p>2. 생활체육 </p>
                            <p>3. 전문체육 </p></td>
                        </tr>
                        <tr>
                            <td><p>3. 스포츠교육의 참여자 이해론</p></td>
                            <td><p>1. 스포츠교육 지도자 </p>
                                <p>2. 스포츠교육 학습자 </p>
                            <p>3. 스포츠교육 행정가 </p></td>
                        </tr>
                        <tr>
                            <td><p>4. 스포츠교육의 프로그램론</p></td>
                            <td><p>1. 학교체육 프로그램 개발 및 실천 </p>
                                <p>2. 생활체육 프로그램 개발 및 실천 </p>
                            <p>3. 전문체육 프로그램 개발 및 실천 </p></td>
                        </tr>
                        <tr>
                            <td><p>5. 스포츠교육의 지도방법론</p></td>
                            <td><p>1. 스포츠지도를 위한 교육모형 </p>
                                <p>2. 스포츠지도를 위한 교수기법 </p>
                            <p>3. 세부지도목적에 따른 교수기법 </p></td>
                        </tr>
                        <tr>
                            <td><p>6. 스포츠교육의 평가론</p></td>
                            <td><p>1. 평가의 이론적 측면 </p>
                            <p>2. 평가의 실천적 측면 </p></td>
                        </tr>
                        <tr>
                            <td><p>7. 스포츠교육자의 전문적 성장</p></td>
                            <td><p>1. 스포츠교육전문인의 전문역량 </p>
                            <p>2. 장기적 전문인 성장 및 발달 </p></td>
                        </tr>                          
                    </table>		  
                </div>     
                <div class="content_guide_box  LAeventB03" id="tab3">
				    <p><iframe src="https://www.youtube.com/embed/XSVeDMHpHqQ" frameborder="0" allowfullscreen=""></iframe></p>
                    <table>
                        <col width="50%"/>
                        <col/>
                        <tr>
                            <th>주요항목</th>
                            <th>세부항목</th>
                        </tr>
                        <tr>
                            <td><p>1. 스포츠심리학의 개관</p></td>
                            <td><p>1. 스포츠심리학의 정의 및 의미 </p>
                                <p>2. 스포츠심리학의 역사 </p>
                            <p>3. 스포츠심리학의 영역과 역할 </p></td>
                        </tr>
                        <tr>
                            <td><p>2. 인간운동행동의 이해 </p></td>
                            <td><p>1. 운동제어 </p>
                                <p>2. 운동학습 </p>
                            <p>3. 운동발달 </p></td>
                        </tr>
                        <tr>
                            <td><p>3. 스포츠수행의 심리적 요인 </p></td>
                            <td><p>1. 성격 </p>
                                <p>2. 정서와 시합불안 </p>
                                <p>3. 동기 </p>
                                <p>4. 목표설정 </p>
                                <p>5. 자신감 </p>
                                <p>6. 심상 </p>
                                <p>7. 주의집중 </p>
                                <p>8. 루틴</p></td>
                        </tr>
                        <tr>
                            <td><p>4. 스포츠수행의 사회 심리적 요인</p></td>
                            <td><p>1. 집단 응집력 </p>
                                <p>2. 리더십 </p>
                                <p>3. 사회적 촉진 </p>
                            <p>4. 사회성 발달 </p></td>
                        </tr>
                        <tr>
                            <td><p>5. 운동심리학</p></td>
                            <td><p>1. 운동의 심리적 효과 </p>
                                <p>2. 운동심리 이론 </p>
                                <P>3. 운동실천 중재전략</P></td>
                        </tr>
                        <tr>
                            <td><p>6. 스포츠심리상담</p></td>
                            <td><p>1. 스포츠심리상담의 개념 </p>
                            <p>2.스포츠심리상담의 적용 </p></td>
                        </tr>                           
                    </table>				  
                </div>     
                <div class="content_guide_box  LAeventB03" id="tab4">
				    <p><iframe src="https://www.youtube.com/embed/uUTAd3OSdSM" frameborder="0" aallowfullscreen=""></iframe></p>
                    <table>
                        <col width="50%"/>
                        <col/>
                        <tr>
                            <th>주요항목</th>
                            <th>세부항목</th>
                        </tr>
                        <tr>
                            <td><p>1. 체육사의 의미</p></td>
                            <td><p>1. 체육사 연구 분야</p></td>
                        </tr>
                        <tr>
                            <td><p>2. 선사·삼국시대</p></td>
                            <td><p>1. 선사 및 부족국가시대의 체육 </p>
                            <p>2. 삼국 및 통일신라시대의 체육 </p></td>
                        </tr>
                        <tr>
                            <td><p>3. 고려·조선시대</p></td>
                            <td><p>1. 고려시대의 체육 </p>
                            <p>2. 조선시대의 체육 </p></td>
                        </tr>
                        <tr>
                            <td><p>4. 한국 근·현대</p></td>
                            <td><p>1. 개화기의 체육 </p>
                                    <p>2. 일제강점기의 체육 </p>
                                    <p>3. 광복 이후의 체육 </p></td>
                        </tr>              
                    </table>					  
                </div>     
                <div class="content_guide_box  LAeventB03" id="tab5">
				    <p><iframe src="https://www.youtube.com/embed/jTAJj6YQ2-8" frameborder="0" allowfullscreen=""></iframe></p>
                    <table>
                        <col width="50%"/>
                        <col/>
                        <tr>
                            <th>주요항목</th>
                            <th>세부항목</th>
                        </tr>
                        <tr>
                            <td><p>1. 운동생리학의 개관</p></td>
                            <td><p>1. 주요 용어 </p>
                            <p>2. 운동생리학의 개념 </p></td>
                        </tr>
                        <tr>
                            <td><p>2. 에너지 대사와 운동</p></td>
                            <td><p>1. 에너지의 개념과 대사작용 </p>
                                <p>2. 인체의 에너지 대사 </p>
                                <p>3. 트레이닝에 의한 대사적 적응 </p>
                            <p>치 </p></td>
                        </tr>
                        <tr>
                            <td><p>3. 신경조절과 운동</p></td>
                            <td><p>1. 신경계의 구조와 기능, 특성 </p>
                                <p>2. 신경계의 특성 </p>
                            <p>3. 신경계의 운동기능 조절 </p></td>
                        </tr>
                        <tr>
                            <td><p>4. 골격근과 운동</p></td>
                            <td><p>1. 골격근의 구조와 기능 </p>
                            <p>2. 골격근과 운동 </p></td>
                        </tr>
                        <tr>
                            <td><p>5. 내분비계와 운동</p></td>
                            <td><p>1. 내분비계 </p>
                            <p>2. 운동과 호르몬 조절 </p></td>
                        </tr>
                        <tr>
                            <td><p>6. 호흡·순환계와 운동</p></td>
                            <td><p>1. 호흡계의 구조와 기능 </p>
                                <p>2. 운동에 대한 호흡계의 반응과 적응 </p>
                                <p>3. 순환계의 구조와 기능 </p>
                            <p>4. 운동에 대한 순환계의 반응과 적응 </p></td>
                        </tr>
                        <tr>
                            <td><p>7. 환경과 운동</p></td>
                            <td><p>1. 체온 조절과 운동 </p>
                            <p>2. 인체 운동에 대한 환경 영향 </p></td>
                        </tr>                      
                    </table>					  
                </div>     
                <div class="content_guide_box  LAeventB03" id="tab6">
				    <p><iframe src="https://www.youtube.com/embed/GEznKLBpXC0" frameborder="0" allowfullscreen=""></iframe></p>
                    <table>
                        <col width="50%"/>
                        <col/>
                        <tr>
                            <th>주요항목</th>
                            <th>세부항목</th>
                        </tr>
                        <tr>
                            <td><p>1. 운동역학 개요</p></td>
                            <td><p>1. 운동역학의 정의 </p>
                            <p>2. 운동역학의 목적과 내용 </p></td>
                        </tr>
                        <tr>
                            <td><p>2. 운동역학의 이해</p></td>
                            <td><p>1. 해부학적 기초 </p>
                            <p>2. 운동의 종류 </p></td>
                        </tr>
                        <tr>
                            <td><p>3. 인체역학</p></td>
                            <td><p>1. 인체의 물리적 특성 </p>
                                <p>2. 인체 평형과 안정성 </p>
                            <p>3. 인체의 구조적 특성 </p></td>
                        </tr>
                        <tr>
                            <td><p>4. 운동학의 스포츠 적용</p></td>
                            <td><p>1. 선운동의 운동학적 분석 </p>
                            <p>2. 각운동의 운동학적 분석 </p></td>
                        </tr>
                        <tr>
                            <td><p>5. 운동역학의 스포츠 적용</p></td>
                            <td><p>1. 선운동의 운동역학적 분석 </p>
                            <p>2. 각운동의 운동역학적 분석 </p></td>
                        </tr>
                        <tr>
                            <td><p>6. 일과 에너지</p></td>
                            <td><p>1. 일과 일률 </p>
                            <p>2. 에너지 </p></td>
                        </tr>
                        <tr>
                            <td><p>7. 다양한 운동기술의 분석</p></td>
                            <td><p>1. 동작분석 </p>
                                <p>2. 힘 분석 </p>
                                <p>3. 근전도 분석 </p></td>
                        </tr>                 
                    </table>				  
                </div>     
                <div class="content_guide_box  LAeventB03" id="tab7">
				    <p><iframe src="https://www.youtube.com/embed/nQwrl0irLAI" frameborder="0" allowfullscreen=""></iframe></p>
                    <table>
                        <col width="50%"/>
                        <col/>
                        <tr>
                            <th>주요항목</th>
                            <th>세부항목</th>
                        </tr>
                        <tr>
                            <td><p>1. 스포츠교육의 배경과 개념</p></td>
                            <td><p>1. 스포츠교육의 역사 </p>
                                <p>2. 스포츠교육의 개념 </p>
                            <p>3. 스포츠교육의 현재 </p></td>
                        </tr>
                        <tr>
                            <td><p>2. 스포츠교육의 정책과 제도</p></td>
                            <td><p>1. 학교체육 </p>
                                <p>2. 생활체육 </p>
                            <p>3. 전문체육 </p></td>
                        </tr>
                        <tr>
                            <td><p>3. 스포츠교육의 참여자 이해론</p></td>
                            <td><p>1. 스포츠교육 지도자 </p>
                                <p>2. 스포츠교육 학습자 </p>
                            <p>3. 스포츠교육 행정가 </p></td>
                        </tr>
                        <tr>
                            <td><p>4. 스포츠교육의 프로그램론</p></td>
                            <td><p>1. 학교체육 프로그램 개발 및 실천 </p>
                                <p>2. 생활체육 프로그램 개발 및 실천 </p>
                            <p>3. 전문체육 프로그램 개발 및 실천 </p></td>
                        </tr>
                        <tr>
                            <td><p>5. 스포츠교육의 지도방법론</p></td>
                            <td><p>1. 스포츠지도를 위한 교육모형 </p>
                                <p>2. 스포츠지도를 위한 교수기법 </p>
                            <p>3. 세부지도목적에 따른 교수기법 </p></td>
                        </tr>
                        <tr>
                            <td><p>6. 스포츠교육의 평가론</p></td>
                            <td><p>1. 평가의 이론적 측면 </p>
                            <p>2. 평가의 실천적 측면 </p></td>
                        </tr>
                        <tr>
                            <td><p>7. 스포츠교육자의 전문적 성장</p></td>
                            <td><p>1. 스포츠교육전문인의 전문역량 </p>
                            <p>2. 장기적 전문인 성장 및 발달 </p></td>
                        </tr>                   
                    </table>				  
                </div>                  
                
            {{--    
            <div class="sports">
                <dl>
                    <dt>스포츠사회학</dt>         
                    <dd>
                        <table>
                            <col width="50%"/>
                            <col/>
                            <tr>
                                <th>주요항목</th>
                                <th>세부항목</th>
                            </tr>
                            <tr>
                                <td><p>1. 스포츠 사회학의 이해</p></td>
                                <td><p>1. 스포츠사회학의 의미 </p>
                                <p>2. 스포츠의 사회적 기능 </p></td>
                            </tr>
                            <tr>
                                <td><p>2. 스포츠와 정치</p></td>
                                <td><p>1. 스포츠와 정치의 결합 </p>
                                <p>2. 스포츠와 국내정치 </p>
                                <p>3. 스포츠와 국제정치 </p></td>
                            </tr>
                            <tr>
                                <td><p>3. 스포츠와 경제</p></td>
                                <td><p>1. 상업주의와 스포츠 </p>
                                <p>2. 스포츠 메가이벤트의  경제 </p></td>
                            </tr>
                            <tr>
                                <td><p>4. 스포츠와 교육</p></td>
                                <td><p>1. 스포츠의 교육적 기능 </p>
                                <p>2. 한국의 학원스포츠 </p></td>
                            </tr>
                            <tr>
                                <td><p>5. 스포츠와 미디어</p></td>
                                <td><p>1. 스포츠와 미디어의 이해 </p>
                                <p>2. 스포츠와 미디어의 상호관계 </p></td>
                            </tr>
                            <tr>
                                <td><p>6. 스포츠와 사회계급/계층</p></td>
                                <td><p>1. 사회계층의 이해 </p>
                                <p>2. 사회계층과 스포츠 참가 </p>
                                <p>3. 스포츠와 계층이동 </p></td>
                            </tr>
                            <tr>
                                <td><p>7. 스포츠와 사회화</p></td>
                                <td><p>1. 스포츠사회화의 의미와 과정 </p>
                                <p>2. 스포츠로의 사회화와 스포츠를 통한 사회화 </p>
                                <p>3. 스포츠 탈사회화와  재사회화 </p></td>
                            </tr>
                            <tr>
                                <td><p>8. 스포츠와 일탈</p></td>
                                <td><p>1. 스포츠일탈의 이해 </p>
                                <p>2. 스포츠일탈의 유형 </p></td>
                            </tr>
                            <tr>
                                <td><p>9. 미래사회의 스포츠</p></td>
                                <td><p>1. 스포츠 변화에 영향을 미치는 요인 </p>
                                <p>2. 스포츠 세계화 </p></td>
                            </tr>
                        </table>
                    </dd>
                    <dt>스포츠교육학</dt>
                    <dd>
                        <table>
                            <col width="50%"/>
                            <col/>
                            <tr>
                                <th>주요항목</th>
                                <th>세부항목</th>
                            </tr>
                            <tr>
                                <td><p>1. 스포츠교육의 배경과 개념</p></td>
                                <td><p>1. 스포츠교육의 역사 </p>
                                  <p>2. 스포츠교육의 개념 </p>
                                <p>3. 스포츠교육의 현재 </p></td>
                            </tr>
                            <tr>
                                <td><p>2. 스포츠교육의 정책과 제도</p></td>
                                <td><p>1. 학교체육 </p>
                                  <p>2. 생활체육 </p>
                                <p>3. 전문체육 </p></td>
                            </tr>
                            <tr>
                                <td><p>3. 스포츠교육의 참여자 이해론</p></td>
                                <td><p>1. 스포츠교육 지도자 </p>
                                  <p>2. 스포츠교육 학습자 </p>
                                <p>3. 스포츠교육 행정가 </p></td>
                            </tr>
                            <tr>
                                <td><p>4. 스포츠교육의 프로그램론</p></td>
                                <td><p>1. 학교체육 프로그램 개발 및 실천 </p>
                                  <p>2. 생활체육 프로그램 개발 및 실천 </p>
                                <p>3. 전문체육 프로그램 개발 및 실천 </p></td>
                            </tr>
                            <tr>
                                <td><p>5. 스포츠교육의 지도방법론</p></td>
                                <td><p>1. 스포츠지도를 위한 교육모형 </p>
                                  <p>2. 스포츠지도를 위한 교수기법 </p>
                                <p>3. 세부지도목적에 따른 교수기법 </p></td>
                            </tr>
                            <tr>
                                <td><p>6. 스포츠교육의 평가론</p></td>
                                <td><p>1. 평가의 이론적 측면 </p>
                                <p>2. 평가의 실천적 측면 </p></td>
                            </tr>
                            <tr>
                                <td><p>7. 스포츠교육자의 전문적 성장</p></td>
                                <td><p>1. 스포츠교육전문인의 전문역량 </p>
                                <p>2. 장기적 전문인 성장 및 발달 </p></td>
                            </tr>                          
                        </table>
                    </dd>
                    <dt>스포츠심리학</dt>
                    <dd>
                        <table>
                            <col width="50%"/>
                            <col/>
                            <tr>
                                <th>주요항목</th>
                                <th>세부항목</th>
                            </tr>
                            <tr>
                                <td><p>1. 스포츠심리학의 개관</p></td>
                                <td><p>1. 스포츠심리학의 정의 및 의미 </p>
                                  <p>2. 스포츠심리학의 역사 </p>
                                <p>3. 스포츠심리학의 영역과 역할 </p></td>
                            </tr>
                            <tr>
                                <td><p>2. 인간운동행동의 이해 </p></td>
                                <td><p>1. 운동제어 </p>
                                  <p>2. 운동학습 </p>
                                <p>3. 운동발달 </p></td>
                            </tr>
                            <tr>
                                <td><p>3. 스포츠수행의 심리적 요인 </p></td>
                                <td><p>1. 성격 </p>
                                  <p>2. 정서와 시합불안 </p>
                                  <p>3. 동기 </p>
                                  <p>4. 목표설정 </p>
                                  <p>5. 자신감 </p>
                                  <p>6. 심상 </p>
                                  <p>7. 주의집중 </p>
                                  <p>8. 루틴</p></td>
                            </tr>
                            <tr>
                                <td><p>4. 스포츠수행의 사회 심리적 요인</p></td>
                                <td><p>1. 집단 응집력 </p>
                                  <p>2. 리더십 </p>
                                  <p>3. 사회적 촉진 </p>
                                <p>4. 사회성 발달 </p></td>
                            </tr>
                            <tr>
                                <td><p>5. 운동심리학</p></td>
                                <td><p>1. 운동의 심리적 효과 </p>
                                    <p>2. 운동심리 이론 </p>
                                    <P>3. 운동실천 중재전략</P></td>
                            </tr>
                            <tr>
                                <td><p>6. 스포츠심리상담</p></td>
                                <td><p>1. 스포츠심리상담의 개념 </p>
                                <p>2.스포츠심리상담의 적용 </p></td>
                            </tr>                           
                        </table>
                    </dd>
                    <dt>한국체육사</dt>
                    <dd>
                        <table>
                            <col width="50%"/>
                            <col/>
                            <tr>
                                <th>주요항목</th>
                                <th>세부항목</th>
                            </tr>
                            <tr>
                                <td><p>1. 체육사의 의미</p></td>
                                <td><p>1. 체육사 연구 분야</p></td>
                            </tr>
                            <tr>
                                <td><p>2. 선사·삼국시대</p></td>
                                <td><p>1. 선사 및 부족국가시대의 체육 </p>
                                <p>2. 삼국 및 통일신라시대의 체육 </p></td>
                            </tr>
                            <tr>
                                <td><p>3. 고려·조선시대</p></td>
                                <td><p>1. 고려시대의 체육 </p>
                                <p>2. 조선시대의 체육 </p></td>
                            </tr>
                            <tr>
                                <td><p>4. 한국 근·현대</p></td>
                                <td><p>1. 개화기의 체육 </p>
                                     <p>2. 일제강점기의 체육 </p>
                                     <p>3. 광복 이후의 체육 </p></td>
                            </tr>              
                        </table>
                    </dd>
                    <dt>운동생리학</dt>
                    <dd>
                        <table>
                            <col width="50%"/>
                            <col/>
                            <tr>
                                <th>주요항목</th>
                                <th>세부항목</th>
                            </tr>
                            <tr>
                                <td><p>1. 운동생리학의 개관</p></td>
                                <td><p>1. 주요 용어 </p>
                                <p>2. 운동생리학의 개념 </p></td>
                            </tr>
                            <tr>
                                <td><p>2. 에너지 대사와 운동</p></td>
                                <td><p>1. 에너지의 개념과 대사작용 </p>
                                  <p>2. 인체의 에너지 대사 </p>
                                  <p>3. 트레이닝에 의한 대사적 적응 </p>
                                <p>치 </p></td>
                            </tr>
                            <tr>
                                <td><p>3. 신경조절과 운동</p></td>
                                <td><p>1. 신경계의 구조와 기능, 특성 </p>
                                  <p>2. 신경계의 특성 </p>
                                <p>3. 신경계의 운동기능 조절 </p></td>
                            </tr>
                            <tr>
                                <td><p>4. 골격근과 운동</p></td>
                                <td><p>1. 골격근의 구조와 기능 </p>
                                <p>2. 골격근과 운동 </p></td>
                            </tr>
                            <tr>
                                <td><p>5. 내분비계와 운동</p></td>
                                <td><p>1. 내분비계 </p>
                                <p>2. 운동과 호르몬 조절 </p></td>
                            </tr>
                            <tr>
                                <td><p>6. 호흡·순환계와 운동</p></td>
                                <td><p>1. 호흡계의 구조와 기능 </p>
                                  <p>2. 운동에 대한 호흡계의 반응과 적응 </p>
                                  <p>3. 순환계의 구조와 기능 </p>
                                <p>4. 운동에 대한 순환계의 반응과 적응 </p></td>
                            </tr>
                            <tr>
                                <td><p>7. 환경과 운동</p></td>
                                <td><p>1. 체온 조절과 운동 </p>
                                <p>2. 인체 운동에 대한 환경 영향 </p></td>
                            </tr>                      
                        </table>
                    </dd>
                    <dt>운동역학</dt>
                    <dd>
                        <table>
                            <col width="50%"/>
                            <col/>
                            <tr>
                                <th>주요항목</th>
                                <th>세부항목</th>
                            </tr>
                            <tr>
                                <td><p>1. 운동역학 개요</p></td>
                                <td><p>1. 운동역학의 정의 </p>
                                <p>2. 운동역학의 목적과 내용 </p></td>
                            </tr>
                            <tr>
                                <td><p>2. 운동역학의 이해</p></td>
                                <td><p>1. 해부학적 기초 </p>
                                <p>2. 운동의 종류 </p></td>
                            </tr>
                            <tr>
                                <td><p>3. 인체역학</p></td>
                                <td><p>1. 인체의 물리적 특성 </p>
                                  <p>2. 인체 평형과 안정성 </p>
                                <p>3. 인체의 구조적 특성 </p></td>
                            </tr>
                            <tr>
                                <td><p>4. 운동학의 스포츠 적용</p></td>
                                <td><p>1. 선운동의 운동학적 분석 </p>
                                <p>2. 각운동의 운동학적 분석 </p></td>
                            </tr>
                            <tr>
                                <td><p>5. 운동역학의 스포츠 적용</p></td>
                                <td><p>1. 선운동의 운동역학적 분석 </p>
                                <p>2. 각운동의 운동역학적 분석 </p></td>
                            </tr>
                            <tr>
                                <td><p>6. 일과 에너지</p></td>
                                <td><p>1. 일과 일률 </p>
                                <p>2. 에너지 </p></td>
                            </tr>
                            <tr>
                                <td><p>7. 다양한 운동기술의 분석</p></td>
                                <td><p>1. 동작분석 </p>
                                    <p>2. 힘 분석 </p>
                                    <p>3. 근전도 분석 </p></td>
                            </tr>                 
                        </table>
                    </dd>
                    <dt>스포츠윤리</dt>
                    <dd>
                        <table>
                            <col width="50%"/>
                            <col/>
                            <tr>
                                <th>주요항목</th>
                                <th>세부항목</th>
                            </tr>
                            <tr>
                                <td><p>1. 스포츠교육의 배경과 개념</p></td>
                                <td><p>1. 스포츠교육의 역사 </p>
                                  <p>2. 스포츠교육의 개념 </p>
                                <p>3. 스포츠교육의 현재 </p></td>
                            </tr>
                            <tr>
                                <td><p>2. 스포츠교육의 정책과 제도</p></td>
                                <td><p>1. 학교체육 </p>
                                  <p>2. 생활체육 </p>
                                <p>3. 전문체육 </p></td>
                            </tr>
                            <tr>
                                <td><p>3. 스포츠교육의 참여자 이해론</p></td>
                                <td><p>1. 스포츠교육 지도자 </p>
                                  <p>2. 스포츠교육 학습자 </p>
                                <p>3. 스포츠교육 행정가 </p></td>
                            </tr>
                            <tr>
                                <td><p>4. 스포츠교육의 프로그램론</p></td>
                                <td><p>1. 학교체육 프로그램 개발 및 실천 </p>
                                  <p>2. 생활체육 프로그램 개발 및 실천 </p>
                                <p>3. 전문체육 프로그램 개발 및 실천 </p></td>
                            </tr>
                            <tr>
                                <td><p>5. 스포츠교육의 지도방법론</p></td>
                                <td><p>1. 스포츠지도를 위한 교육모형 </p>
                                  <p>2. 스포츠지도를 위한 교수기법 </p>
                                <p>3. 세부지도목적에 따른 교수기법 </p></td>
                            </tr>
                            <tr>
                                <td><p>6. 스포츠교육의 평가론</p></td>
                                <td><p>1. 평가의 이론적 측면 </p>
                                <p>2. 평가의 실천적 측면 </p></td>
                            </tr>
                            <tr>
                                <td><p>7. 스포츠교육자의 전문적 성장</p></td>
                                <td><p>1. 스포츠교육전문인의 전문역량 </p>
                                <p>2. 장기적 전문인 성장 및 발달 </p></td>
                            </tr>                   
                        </table>
                    </dd>
                </dl>            
            </div>
            --}}
		</div>
		<div class="evtCtnsBox cert05" id="info3">
			<img src="https://static.willbes.net/public/images/promotion/2019/08/1350_bottom.jpg" alt="이용안내" />  
		</div>  
	</div>
    <!-- End Container -->

	<script type="text/javascript">
    $(document).ready(function(){
        /*#####################################*/
        $("#stoggleBtn").click(function(){
            $("#textZone1").slideToggle("fast");
        });

		$("#stoggleBtn2").click(function(){
            $("#textZone2").slideToggle("fast");
        });		

        /*#####################################*/
        $('dt').on('click',function(){
            $(this).next().toggleClass('active');
        });
        
        /*#####################################*/
        $("dt").click(function(){
            $("dt").css({"height":"55px","lineHeight":"55px", "fontSize":"16px"});
            $(this).css({"height":"55px","lineHeight":"55px","fontSize":"20px"});
        });

        /*tab*/
        $(document).ready(function(){
            var $active, $links = $(this).find('.tabs li a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
            $links.not($active).each(function () {
                $(this.hash).hide()
            });

            $(".r_btn_tab").click(function () {
                var offset = $('.tabs').offset();
                $('html, body').animate({scrollTop : offset.top}, 400);

                var activeTab = $(this).data("tab-id");
                $(".tabs li a").removeClass("active");
                $('#menu_tab'+activeTab).addClass("active");
                $(".content_guide_box").hide();
                $('#tab'+activeTab).fadeIn();
                return false;
            });

            $(".tabs li a").click(function(){
                var activeTab = $(this).attr("href");
                $(".tabs li a").removeClass("active");
                $(this).addClass("active");
                $(".content_guide_box").hide();
                $(activeTab).fadeIn();
                return false;
            });
        });
        
       
    });
	</script>

	{{-- 프로모션용 스크립트 include --}}
	@include('willbes.pc.promotion.promotion_script')
@stop