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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:200px;right:0;z-index:1;}
        .sky a {display: block; margin-bottom:10px}
        
        .wb_tops {background:#00c73c}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/02/2550_top_bg.jpg) no-repeat center top;}   

        .wb_cts01 {background:#fff}

        .wb_cts02 {background:#FAFAFC;position:relative;padding-bottom:100px;}
        .youtube {position:absolute; bottom:397px; left:50%; width:607px; z-index:1;margin-left:-429px}
        .youtube iframe {width:860px; height:485px;}

        .wb_cts03 {background:#fff}

		.wb_cts04 {background:#FAFAFC}

        .wb_cts06 {background:#ECEBF0}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:10px; color:#ffd35b}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {list-style: none; margin-left:20px}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#apply1"><img src="https://static.willbes.net/public/images/promotion/2022/02/2550_sky01.png" alt="슈퍼패스 사전접수" ></a>
            <a href="#apply2"><img src="https://static.willbes.net/public/images/promotion/2022/02/2550_sky02.png" alt="추가할인" ></a>
        </div>
        
        <div class="evtCtnsBox wb_tops" data-aos="fade-up">           
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2550_tops.jpg"  alt="신광은 경찰학원" />        
		</div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2550_top.jpg" alt="슈퍼pass" />
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2550_01.jpg" alt="슈퍼pass"  />
        </div>      

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2550_02.jpg" alt="슈퍼pass"  />
                <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" title="영상이 궁금하다면?" target="_blank" style="position: absolute;left: 27.01%;top: 93.22%;width: 46.01%;height: 5.25%;z-index: 2;"></a>
            </div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/qkIw507IPpM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2550_03.jpg" alt="슈퍼pass" />          	      
        </div>

        <div class="evtCtnsBox wb_cts04" id=apply1 data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2550_04.jpg" alt="슈퍼pass" />
                <a href="https://police.willbes.net/pass/offinfo/boardInfo/show/78?board_idx=386829&" title="슈퍼패스 신청하기" target="_blank" style="position: absolute;left: 19.01%;top: 85.02%;width: 62.01%;height: 6.75%;z-index: 2;"></a>
            </div>       	      
        </div>

        <div class="evtCtnsBox wb_cts05" id=apply2 data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2550_05.jpg" alt="슈퍼pass" />
                <a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" title="비긴어게인 신청하기" target="_blank" style="position: absolute;left: 19.01%;top: 86.72%;width: 62.01%;height: 6.75%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts06" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2550_06.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">유의사항</h4>
				<div class="infoTit"><strong>2023 슈퍼패스 경찰 전문 교수진</strong></div>
				<ul>
					<li>형사법 - 신광은 교수님</li>
                    <li>경찰학 - 장정훈 교수님</li>
                    <li>헌 법 – 김원욱 교수님 & 이국령 교수님(택1)</li>
                    <li>범죄학 – 박상민 교수님</li>
                    <li>G-TELP – 김준기 교수님</li>
                    <li>한능검 – 오태진 교수님</li>                      
				</ul>
                <div class="infoTit"><strong>12개월 슈퍼패스 유의사항</strong></div>
				<ul>
					<li>① 12개월 슈퍼패스는 2022년 3월 7일부터 2023년 2월 28일까지 책정된 수강료로 시험 일정에 따라 추가 수강료가 부과될 수 있습니다.<br>
                        (1개월 연장 시 - 실강 10만원, 인강 5만원)<br>
                        * 정규과정 : 2022년 과목개편대비 기본이론,심화과정,문제풀이,마무리 특강
                    </li>
                    <li>② 해당 슈퍼패스로는 22년 4~5월 심화강의 실강이 불가합니다.</li>
                    <li>③ 국가재난, 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의로 대체될 수 있으며, 이로 인한 해당기간 환불은 불가합니다.</li>
                    <li>④ G-TELP 특강은 수강기간 내에, 실강 1회에 한하여 50% 할인 적용됩니다.</li>
                    <li>⑤ 인강패스와 정규과정 외 특강 및 모의고사는 슈퍼패스 등록생에게 제공되는 무료 혜택입니다.</li>
                    <li>⑥ 영상반의 경우 학원 사정으로 동영상 강의로 대체될 수 있습니다.</li>
                    <li>⑦ 일부 특강은 유료로 결제할 수 있습니다.</li>
                    <li>⑧ 중도 환불 시 수강기간만큼 차감 후, 무료 혜택 금액을 차감하여 환불됩니다.</li>
				</ul>            
                <div class="infoTit"><strong>슈퍼패스 환승/ 재등록 이벤트</strong></div>
                <ul>
                    <li>환승 <br>
                        - 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상 있는 수험생<br>
                        - 2021년 이후 자사 실강 수강이력이 없는 수험생
                    </li>	
                    <li>재등록<br>
                        - 신광은경찰팀 슈퍼패스를 1년 이내 재등록 하는 수강생
                    </li>		
				</ul>
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