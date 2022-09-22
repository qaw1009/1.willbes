@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

		/************************************************************/ 

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/09/2767_top_bg.jpg) no-repeat center top; background-size:2000px; height:1240px}	
        .evt_top img {position: absolute; top:100px; left:50%; margin-left:-400px}

        .evt_02 {background:#e6e6e6}

        .evt_03 {margin:150px auto 50px; font-size:18px; line-height:1.4;}
        .evt_03 h5 {font-size:48px; margin-bottom:50px}
        .evt_03 ul {width:950px; margin:0 auto}
        .evt_03 li {text-align:left; margin-bottom:50px; margin-left:20; list-style: disc;}
        .evt_03 li p {font-size:24px; margin-bottom:20px; font-weight:bold}
        .evt_03 li span {color:#dc0000}
        .evt_03 table {border:1px solid #afafaf}
        .evt_03 th {background:#e6e6e6; font-size:18px; font-weight:bold; }
        .evt_03 th,
        .evt_03 td {padding:20px; text-align:center; border-right:1px solid #afafaf}
        .evt_03 tr {border-bottom:1px solid #afafaf}
        
        .evt_05 {width:1120px; margin:0 auto; padding:100px; text-align:left; font-size:24px; line-height:1.4 }
        .evt_05 li {list-style-type: disc; margin-left:20px; margin-bottom:20px;}
        .evt_05 li div {font-size:20px; color:#666}

        .loadmap {position: relative; /*padding-bottom:56.25%;*/ overflow: hidden; max-width:100%; height:500px; }
        .loadmap iframe {position:absolute; top: 0; left: 0; width:100%; height:100%;}
        
        /************************************************************/

    </style>
    
	<div class="evtContent NSK">
    
		<div class="evtCtnsBox evt_top">
			<img src="https://static.willbes.net/public/images/promotion/2022/09/2767_top_img.png" alt="2023 손해평가사 취득 완벽 대비반" data-aos="fade-down"/>
		</div>

		<div class="evtCtnsBox evt_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/09/2767_01.jpg" alt="손해평가사란?" />			  
		</div>     

		<div class="evtCtnsBox evt_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/09/2767_02.jpg" alt="10월 7일 개강" />			  
		</div>   

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
			<h5 class="NSK-Black">손해평가사 시험안내</h5>
            <ul>
                <li>
                    <p>시험과목 및 배점<p>		
                    <table>
                        <tr>
                            <th>구분</th>
                            <th>시험과목</th>
                            <th>문항수</th>
                            <th>시험시간</th>
                            <th>시험방법</th>
                        </tr>
                        <tr>
                            <td>1차</td>
                            <td class="tx-left">1. 상법(보험편)<br />
                            2. 농어업재해보험법령<br />
                            3. 농학개론 중 재배학 및 원예작물학</td>
                            <td>과목별<br />
                            25문항<br />
                            (총 75문항)</td>
                            <td>90분</td>
                            <td>객관식<br />
                            4지 선택형</td>
                        </tr>
                        <tr>
                            <td>2차</td>
                            <td class="tx-left">1. 농작물재해보험 및 가축재해보험의 이론과 실무<br />
                            2. 농작물재해보험 및 가축재해보험 손해평가의 이론과 실무</td>
                            <td>과목별<br />
                            10문항</td>
                            <td>120분</td>
                            <td>단답형<br />
                            서술형</td>
                        </tr>
                    </table>	
                </li>
                <li>
                    <p>합격기준</p>
                    1차 100점 만점 전 과목 평균 60점(과락 40점)<br/>
                    2차 100점 만점 전 과목 평균 60점(과락 40점) (계산 문제)
                </li>	  
            </ul>
            <h5 class="NSK-Black mt100">윌비스 손해평가사 합격 커리큘럼</h5>
            <ul>
                <li>
                    <p>1차 대비 <span>“이론은 시험에 나오는 것만 간략하게!”</span><p>                    
                    <table>
                        <tr>
                            <th>10월-12월</th>
                            <th>23년 1월-3월</th>
                            <th>3월-4월</th>
                            <th>5월</th>
                        </tr>
                        <tr>
                            <td>기본이론</td>
                            <td>요약강의</td>
                            <td>문제풀이</td>
                            <td>동형모의고사</td>
                        </tr>
                    </table>	
                </li>
                <li>
                    <p>2차 대비 <span>“문제는 실전과 동일하게 준비!”</span><p>                    
                    <table>
                        <tr>
                            <th>10월-12월</th>
                            <th>23년 1월-3월</th>
                            <th>4월-5월</th>
                            <th>6월-7월</th>
                            <th>7월-9월</th>
                        </tr>
                        <tr>
                            <td>기초이론</td>
                            <td>기본이론</td>
                            <td>심화이론</td>
                            <td>2차 핵심이론</td>
                            <td>핵심요약+문제풀이+모의고사</td>
                        </tr>
                    </table>	
                </li>	       
            </ul>
		</div> 

        <div class="evtCtnsBox evt_04">
            <div class="wrap" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2767_03.jpg" alt="손해평가사 학원 수강신청" />			  
                <a href="https://job.willbes.net/pass/offLecture/index?cate_code=3184&course_idx=1257" target="_blank" title="1차 대비 종합반" style="position: absolute; left: 63.39%; top: 26.21%; width: 21.61%; height: 18.93%;; z-index: 2;"></a>
                <a href="https://job.willbes.net/pass/offLecture/index?cate_code=3184&course_idx=1388" target="_blank" title="2차 대비 종합반" style="position: absolute; left: 63.39%; top: 47.83%; width: 21.61%; height: 18.93%;z-index: 2;"></a>
                <a href="https://job.willbes.net/pass/offPackage/index?cate_code=3184&campus_ccd=605013&course_idx=1466" target="_blank" title="1차 + 2차 대비 종합반" style="position: absolute; left: 63.39%; top: 69.95%; width: 21.61%; height: 18.93%; z-index: 2;"></a>
            </div> 
            <div class="wrap" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2767_04.jpg" alt="손해평가사 동영상 수강신청" />			  
                <a href="#none" onclick="javascript:alert('준비중입니다.');" title="1차 대비 종합반" style="position: absolute; left: 63.39%; top: 22.75%; width: 21.79%; height: 19.08%;  z-index: 2;"></a>
                <a href="#none" onclick="javascript:alert('준비중입니다.');" title="2차 대비 종합반" style="position: absolute; left: 63.39%; top: 44.84%; width: 21.79%; height: 19.08%;  z-index: 2;"></a>
                <a href="#none" onclick="javascript:alert('준비중입니다.');" title="1차 + 2차 대비 종합반" style="position: absolute; left: 63.39%; top: 67.19%; width: 21.79%; height: 19.08%;  z-index: 2;"></a>
            </div>            
		</div> 

        <div class="loadmap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2238.5189534842293!2d126.72321452519192!3d37.49037028993977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b7c45f64466a5%3A0x41ad2be6af1f3f59!2zKOyjvCnsnIzruYTsiqTqs7XrrLTsm5Dqsr3ssLDtlZnsm5A!5e0!3m2!1sko!2skr!4v1662530065277!5m2!1sko!2skr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>   

        <div class="evtCtnsBox evt_05" data-aos="fade-up">
			<ul>
                <li>
                    주소
                    <div>인천 부평구 경원대로 1395 부평일번가 11층(부평지하상가 13번 출구)</div>
                </li>
                <li>
                    수강상담
                    <div>1544-1661 / 032-508-0020</div>
                </li>
            </ul>	  
		</div> 


	</div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
            AOS.init();
        });
    </script>
    

@stop