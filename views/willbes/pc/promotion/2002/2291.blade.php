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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .skybanner {position:fixed;top:200px; width:179px; right:10px; z-index:100;}        
        .skybanner a {display:block; margin-bottom:10px}

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:center; padding-left:110px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/07/2291_top_bg.jpg) no-repeat center;}
        .wb_top a{padding:20px 120px 15px 120px; font-size:30px; font-weight:bold; color:#fff; position: absolute; bottom: 100px; left:50%; transform:translateX(-50%); 
                 background-color:#262422; border-radius:50px; line-height:35px;}
        .wb_top a div{animation: blink 1.2s step-end infinite;}
        .wb_top a:hover{ box-shadow:0 10px 20px rgba(0,0,0,.3);}
        .wb_top a span{font-size:16px; font-weight:normal; color:#ffea00;}

        @@keyframes blink {
            50% {opacity: 0;}
        }

        .wb_01 {background:#dbe8ed} 
        .wb_01 a:hover{ box-shadow:0 10px 20px rgba(0,0,0,.3);}

        .wb_02 {background:#fff;}	
        .wb_02 .youtube iframe {width:640px; height:360px} 
        .wb_02 .youtube {position:absolute; top:457px; left:49.45%; width:455px; z-index:1; margin-left:-479px; box-shadow:0 10px 20px rgba(0,0,0,.3);}     
        .wb_02 .youtube.yu02 {top:905px; margin-left:-139px;}
        .wb_02 .youtube.yu03 {top:1356px;}   
        .wb_02 .youtube.yu04 {top:1806px; margin-left:-139px;}

        .wb_03 {background:#e5e5e5} 
        .wb_03 a:hover{box-shadow:0 10px 20px rgba(0,0,0,.3);}
        .wb_04 {background:#2d6ad1} 
        .wb_04 a:hover{box-shadow:0 10px 20px rgba(0,0,0,.3);}

        .wb_01 > div,
        .wb_03 > div,
        .wb_04 > div{position:relative; width:1120px; margin:0 auto}

        .evtInfo {padding:150px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px; margin:20px 0 10px; color:#19ffc3; font-weight:bold}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li { list-style-type: decimal; margin-left:20px; margin-bottom:10px;}
        .evtInfoBox table {margin-bottom:20px; border-top:1px solid #ccc; border-right:1px solid #ccc}
        .evtInfoBox th,
        .evtInfoBox td {padding:10px; text-align:center; border-left:1px solid #ccc; border-bottom:1px solid #ccc}
        .evtInfoBox th {background:#000; color:#fff}
        .evtInfoBox td {background:#444;}     
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="skybanner">
            <a href="#wb_04"><img src="https://static.willbes.net/public/images/promotion/2021/07/2291_sky01.png" alt="배이직" ></a>
        </div>      

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                    사전접수<br>EVENT 마감까지
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>  
        
        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2291_top.jpg"  alt="기본환성 기출반" />
            <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040" target="_blank">
                <div>
                    2021년 8월 기본종합반 신청하기> <br>
                    <span>사전접수 할인 이벤트중~~ 추가 할인까지!!!</span>
                </div>
            </a>
		</div>

        <div class="evtCtnsBox wb_01">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2291_01.jpg"  alt="기본환성 기출반" />
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1839" title="경찰시험 개편과목 전략" target="_blank" style="position: absolute; left: 15.45%; top: 78.62%; width: 32.14%; height: 11.24%; z-index: 2;"></a>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1966" title="G-TELP 단기간전략!" target="_blank" style="position: absolute; left: 50.27%; top: 78.47%; width: 32.14%; height: 11.24%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_02" >
			<img src="https://static.willbes.net/public/images/promotion/2021/07/2291_02.jpg"  alt="빠르게 준비 및 유튜브 영상"/><br>	
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube yu02">
                <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube yu03">
                <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>	
            <div class="youtube yu04">
                <iframe src="https://www.youtube.com/embed/_-XbBFVxK2Y?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
		</div>

        <div class="evtCtnsBox wb_03" >
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2291_03.jpg"  alt="기본완성기출반 스케줄"/>    
                <a href="https://police.willbes.net/pass/offinfo/boardInfo/index/80" title="강의시간표 확인하기" target="_blank" style="position: absolute; left: 26.52%; top: 84.63%; width: 46.7%; height: 4.59%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_04" id="wb_04">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2291_04.jpg"  alt="Special 패키지"/>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040" title="기본종합반 신청하기"  target="_blank" style="position: absolute; left: 26.96%; top: 52.22%; width: 46.16%; height: 2.39%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/184050" title="형사법 신광은" target="_blank" style="position: absolute; left: 12.86%; top: 88.48%; width: 12.41%; height: 1.25%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/181340" title="경찰학 장정훈" target="_blank" style="position: absolute; left: 34.2%; top: 88.44%; width: 12.41%; height: 1.25%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/184064" title="헌법 김원욱" target="_blank" style="position: absolute; left: 55.45%; top: 88.48%; width: 12.41%; height: 1.25%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/184075" title="헌법 이국령" target="_blank" style="position: absolute; left: 76.96%; top: 88.41%; width: 12.41%; height: 1.25%; z-index: 2;"></a>
            </div>       
		</div>         

        <div class="evtCtnsBox evtInfo">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">8월 기본종합반 학원 실강 이용안내</h4>
				<div class="infoTit">2022 개편과목 기본종합반 전문 교수진</div>
				<div>
                    형사법 - 신광은 교수님<br>
                    경찰학 - 장정훈 교수님<br>
                    헌 법 - 김원욱 교수님<br>            
                    헌 법 - 이국령 교수님 
				</div>
				<div class="infoTit">종합반 안내</div>
				<ul>
                    <li> 기본종합반(8/2~10/29)(인강 포함)<br>
                    ① 학원 강의 : 기본종합반<br>
                    ② 기본종합반 복습 동영상</li>

                    <li> 기본종합반(8/2~10/29)(인강 미포함)<br>
                    ① 학원 강의 : 기본종합반</li>
				</ul>
                <div class="infoTit">기본종합반 특별할인 안내</div>
                <table>
                    <col width="75%" />
                    <col  />
                    <thead>
                        <tr>
                            <th>할인 항목</th>
                            <th>할인 금액</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>기초생활수급자</td>
                            <td>150,000원</td>
                        </tr>
                        <tr>
                            <td>순경공채시험 필기 합격자 / 현직 경찰관 가족 / *타학원 환승</td>
                            <td>100,000원</td>
                        </tr>
                        <tr>
                            <td>종합반 연속 수강자 / 전의경 전역자 / 경찰행정학과 재학․ 졸업생 /
                            가족 2인 이상 등록 / 영어․ 한국사 검정제 기준점수 취득자 /
                            **현직 경찰관 추천</td>
                            <td>50,000원</td>
                        </tr>
                    </tbody>
                </table>

				<ul>
					<li> 환승이벤트 대상자<br>
                    ① 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상 있는 수험생<br>
                    ② 2020년 이후 자사 실강 수강이력이 없는 수험생</li>
                    <li> 현직 경찰관 추천 : 공무원증 앞면 사진 증빙<br>
                    - 기본종합반에 한하여 할인 가능하며, 특별 이벤트 기간에는 할인 적용이 불가합니다.</li>			
				</ul>

                <div class="infoTit">유의사항</div>
                <ul>
                    <li> 2022년 시험대비 개편과목 기본종합반 입니다.</li>
                    <li> 국가재난 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의 또는 라이브 강의로 대체될 수 있으며, 이로 인한 해당기간 환불은 불가합니다.</li>		
				</ul>

				<div class="strong">
                    * 학원 문의 : 1544-0336
				</div>
			</div>
		</div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
    
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop