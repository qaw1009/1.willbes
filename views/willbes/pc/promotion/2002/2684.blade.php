@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:150px; right:20px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .evt00 {background:#0a0a0a}

        .wb_tops {background:#ff2b07}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/06/2684_top_bg.jpg) no-repeat center;}

        .wb_01 {background:#f2f2f2}        

        .wb_02 {padding:150px 0; line-height:1.2}
        .wb_02 p {font-size:40px; margin:150px 0 30px}	 
        .wb_02 p strong {color:#0078d4}       
        .wb_02 p:nth-child(1) {margin-top:0}
        .wb_02 .youtube {width:860px; height:484px; box-shadow:0 10px 20px rgba(0,0,0,.3); margin:0 auto}    
        .wb_02 .youtube iframe {width:860px; height:484px} 
         


        .wb_03 {background:#f1f1f1; padding-bottom:150px; }     
        .wb_03 .wrap a {display:block; color:#fff; font-size:24px; background:#0f0c1c; padding:20px 0; width:450px; margin:50px auto 30px; border-radius:40px}
        .wb_03 .wrap a:hover{box-shadow:0 10px 20px rgba(0,0,0,.3); background:#413bbf}    

        .wb_04 {background:#00345c}

        .evtInfo {padding:150px 0; background:#ccc; color:#000; font-size:14px}
		.evtInfoBox {width:1010px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px; margin:20px 0 10px; font-weight:bold}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li { list-style-type: decimal; margin-left:20px; margin-bottom:10px;}
        .evtInfoBox table {margin-bottom:20px; border-top:1px solid #ccc; border-right:1px solid #ccc}
        .evtInfoBox th,
        .evtInfoBox td {padding:10px; text-align:center; border-left:1px solid #ccc; border-bottom:1px solid #ccc}
        .evtInfoBox th {background:#333; color:#fff}
        .evtInfoBox td {background:#fff;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2022/06/2684_sky.jpg" title="기본이론 관리반 신청하기"></a>         
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg" alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">           
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2684_top.jpg"  alt="기본이론 관리반" />        
		</div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2684_01.jpg"  alt="기본환성 기출반" />
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1839" title="경찰시험 개편과목 전략" target="_blank" style="position: absolute; left: 15.27%; top: 78.95%; width: 33.21%; height: 7.34%; z-index: 2;"></a>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1966" title="G-TELP 단기간전략!" target="_blank" style="position: absolute; left: 51.34%; top: 78.95%; width: 33.21%; height: 7.34%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_02 NSK-Black" data-aos="fade-up">
            <p>형사법 신광은 교수님 <br>
                강의의 <strong>새로운 신세계</strong>를 보여드리겠습니다.</p>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <p>경찰학 장정훈 교수님<br>
                <strong>베테랑의 노하우</strong>로 최적화된 경찰학 강의.</p>
            <div class="youtube yu02">
                <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <p>헌법 문태환 교수님<br>
                시험에 나올 <strong>핵심만!</strong> 최단시간 <strong>만점!</strong></p>
            <div class="youtube yu03">
                <iframe src="https://www.youtube.com/embed/WeOyg1YPDfw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
                                    
            <p>범죄학 박상민 교수님<br>
                <strong>저스티스 박상민 범죄학</strong>으로 통한다.</p>
            <div class="youtube yu05">
                <iframe src="https://www.youtube.com/embed/8T1HxQ5PPhQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
		</div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <divv class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2684_03.jpg"  alt="기본종합반 스케줄"/>    
                <a href="https://police.willbes.net/pass/offinfo/boardInfo/index/80" target="_blank" class="NSK-Black">강의시간표 확인하기 ></a>
                * 학원사정으로 지연,연기 될수 있습니다.
            </divv>
        </div>

        <div class="evtCtnsBox wb_04" id="apply" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2684_04.jpg"  alt="기본종합반"/>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040" target="_blank"  title="일반공채" style="position: absolute; left: 27.95%; top: 83.02%; width: 44.29%; height: 7.05%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">7월 기본종합반 학원 실강 이용안내</h4>
				<div class="infoTit">2023 개편과목 기본종합반 전문 교수진</div>
				<div>
                    형사법 - 신광은 교수님<br>
                    경찰학 - 장정훈 교수님<br>
                    헌법 - 문태환 교수님
				</div>
				<div class="infoTit">종합반 안내</div>
				<ul>
                    <li>
                        기본종합반 (일반공채) 7/4(월) ~ 8/19(금)<br>
                        ① 학원 강의 : 형사법, 경찰학, 헌법 실강<br>
                        ② 기본이론 복습동영상 (수강기간동안)
                    </li>
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
                            <td>150,000원<br>(경행종합반 등록 시 100,000원)</td>
                        </tr>
                        <tr>
                            <td>순경공채시험 필기 합격자 / 현직 경찰관 가족 / *타학원 환승</td>
                            <td>100,000원<br>(경행종합반 등록 시 50,000원)</td>
                        </tr>
                        <tr>
                            <td>종합반 연속 수강자 / 전의경 전역자 / 경찰행정학과 재학. 졸업생 /<br>
                            가족 2인 이상 등록 / 영어. 한국사 검정제 기준점수 취득자 /
                            **현직 경찰관 추천</td>
                            <td>50,000원<br>(경행종합반 등록 시 추가할인 없음)</td>
                        </tr>
                    </tbody>
                </table>

				<ul>
					<li> 환승이벤트 대상자<br>
                    ① 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상 있는 수험생<br>
                    ② 2021년 이후 자사 실강 수강이력이 없는 수험생</li>
                    <li> 현직 경찰관 추천 : 공무원증 앞면 사진 증빙<br>
                    - 기본종합반에 한하여 할인 가능하며, 특별 이벤트 기간에는 할인 적용이 불가합니다.</li>			
				</ul>

                <div class="infoTit">유의사항</div>
                <ul>
                    <li> 2022년 시험대비 개편과목 기본종합반 입니다.</li>
                    <li> 국가재난 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의 또는 라이브 강의로 대체될 수 있으며, 이로 인한 해당기간 환불은 불가합니다.</li>
                    <li> 중도환불 시 수강기간만큼 차감 후, 포인트 및 무료혜택 금액을 차감하여 환불됩니다.</li>		
				</ul>

				<div class="strong">
                    * 학원 문의 : 1544-0336
				</div>
			</div>
		</div>


    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );    
    </script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop