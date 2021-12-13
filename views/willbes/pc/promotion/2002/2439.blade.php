@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">       
     
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/   

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}
   
        .sky {position:fixed;top:200px;right:10px;z-index:1;} 
        .sky a {display:block; margin-bottom:15px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/11/2439_top_bg.jpg) repeat-y center top;}     

        .evt01 {background:#fff;} 

        .evt02 {background:#464646;}

        .evt03 {background:#3f2626;}

        .evt04 {background:#fff;}
        
        /*유의사항*/
        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:10px; color:#c4feff}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {list-style-type: disc; margin-left:25px}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2439_sky01.png" alt="3개월 필합패스 이벤트" >
            </a>
            <a href="javascript:alert('Coming Soon!')" >
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2439_sky02.png" alt="사전접수 이벤트" >
            </a>  
        </div>       
     

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        필합 PASS<br>사전접수 이벤트
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
       
        <div class="evtCtnsBox evtTop" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2439_top.jpg" title="필합패스">                    
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2439_01.jpg" title="시험준비 고민">           
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2439_02.jpg" title="전문 교수진" />
        </div>                

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2439_03.jpg" title="패스 프로그램" />
        </div>

        <div class="evtCtnsBox evt04" id="apply" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2439_04.jpg" title="신청하기" >
                <a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" title="신청하기" style="position: absolute;left: 24.89%;top: 85.18%;width: 50.55%;height: 7.59%;z-index: 2;"></a>
            </div>  
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">유의사항</h4>
				<div class="infoTit"><strong>◇ 3개월 필합패스 경찰 전문 교수진</strong></div>
				<ul>
					<li>형사법 신광은 교수님</li> 
                    <li>경찰학개론  장정훈 교수님</li> 
                    <li>헌법  김원욱 교수님 / 이국령 교수님 (택1)</li>
                </ul>
                <div class="infoTit"><strong>◇ 3개월 필합패스</strong></div>
                <ul>
                    <li>포함과정 : 문제풀이(실강) + 마무리특강(실강) + 빅매치 모의고사(학원시행) + 사물함 + 인강패스<br/>
                        * 인강패스 제공 강좌 (12/1 ~ 3/19 제공)</li>
                    <li>2022년 1차 대비 기본이론</li>
                    <li>2022년 1차 대비 심화이론 / 기출과정</li>
                    <li>2022년 1차 대비 문제풀이</li>
                    <li>2022년 1차 대비 마무리 특강</li>             
                </ul>
                <div class="infoTit"><strong>◇ 3개월 필합패스 유의사항</strong></div>
                <ul>
                    <li>3개월 필합패스는 2022/3/19(토)까지 인강패스, 1/3(월)~3/19(토) 실강+인강패스로 구성된 상품입니다.</li>
                    <li>3개월 필합패스는 2022년 3월 19일까지 책정된 수강료로 시험일정에 따라 정규과정 이외에 강의가 진행될 경우 추가 수강료가 부과될 수 있습니다.<br/>
                        (1개월 연장 시  실강 10만원, 인강 5만원)<br/>
                        *정규과정 : 기본이론, 심화이론, 심화기출, 문제풀이 1+2+3단계, 마무리특강</li>
                    <li>국가재난, 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의로 대체될 수 있으며, 이로 인한 해당기간 환불은 불가합니다.</li>                  
                    <li>인강패스와 정규과정 외 특강 및 모의고사는 슈퍼패스 등록생에게 제공되는 무료혜택입니다.</li>
                    <li>특강의 경우 별도 신청이 필요합니다.</li>
                    <li>일부특강은 유료로 결제할 수 있습니다.</li>
                    <li>중도환불 시 수강기간만큼 차감 후, 무료혜택 금액을 차감하여 환불됩니다.</li>
                </ul>
                <div class="infoTit"><strong>◇ 3개월 필합패스 이벤트 유의사항</strong></div>
                <ul>
                    <li>재등록 대상자 이벤트<br>
                        - 신광은 경찰학원 슈퍼패스를 1년이내에 재등록하는 수험생
                    </li>
                    <li>2021년 필합 대상자 이벤트<br>
                        - 2021년 1차 또는 2차 필기합격 인증이 가능한 수험생
                    </li>
                    <li>타학원 환승 이벤트<br>
                        - 환승 대상자 (아래 두 가지 모두 해당할 시 가능)<br>
                        * 타 경찰학원 정규과정 실강 또는 인강 수강이력 증빙이 가능한 수강생<br>
                        * 2020년 1월 이후 신광은 경찰학원 정규과정 수강이력이 없는 수강생<br>
                        - 타학원 수강이력 증빙 필수
                    </li>
                </ul>	         
				<div class="infoTit"><strong>* 학원 사정으로 이벤트 기간 및 금액변동이 있을 수 있습니다.<br>
                                             * 학원 접수 문의 : 1544-0336</strong>
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

    <script type="text/javascript">
    /*디데이카운트다운*/
    $(document).ready(function() {
                dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
            });
    </script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop