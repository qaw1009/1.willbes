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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

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
   
        .sky {position:fixed;top:250px;right:25px;z-index:1;} 
        .sky a {display:block; margin-bottom:15px}

        .evtTop00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2169_top_bg.jpg) repeat-y center top;}     

        .evt01 {background:#fff;} 

        .evt02 {background:#464646;}

        .evt03 {background:#3F2727;}

        .evt04 {background:#fff;position:relative;}
        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#fff;padding-bottom:35px;}
        .tabContaier ul{width:980px;margin:0 auto;height:70px;} 
        .tabContaier li{display:inline-block;width:490px;height:80px;line-height:80px;background:#fcfcfc;color:#3f2626;float:left;font-size:34px;font-weight:bold;border-bottom:5px solid #3f2626;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}
        .tabContaier li a:hover,
        .tabContaier li a.active {color:#fff;font-size:25px;background:#3f2626}              

        .evtInfo {padding:100px 0; background:#555; color:#fff; font-size:17px}
		.evtInfoBox { width:1120px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:35px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px;}
		.evtInfoBox ul {margin-bottom:30px}
      

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="sky">
            <a href="#apply1">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2169_sky1.png" alt="사전접수 할인 이벤트" >
            </a>
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2164" target="_blnak">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2169_sky2.png" alt="문제풀이 단원별 패키지" >
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
        
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1009_first.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2169_top.jpg" title="필합 5개월 pass">                    
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2169_01.jpg" title="시험준비 고민">           
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2169_02.jpg" title="전문 교수진" />
        </div>                

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2169_03.jpg" title="5개월 패스 프로그램" />
        </div>

        <div class="evtCtnsBox evt04" id="apply1">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2169_04.jpg" title="단계별 종합반" >
            <div class="evtCtnsBox wb_tab">
                <div class="tabContaier" id="apply">    
                    <ul>    
                        <li><a href="#tab1" class="active">일반경찰</a></li>                            
                        <li><a href="#tab2">경행경채</a></li>          
                    </ul>
                </div>                
                <div id="tab1" class="tabContents">       
                    <img src="https://static.willbes.net/public/images/promotion/2021/04/2169_04_01.jpg" title="일반경찰"/>    
                    <a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" title="일반경찰 신청하기" style="position: absolute; left: 38.21%; top: 83.21%; width: 23.93%; height: 5.26%; z-index: 2;"></a>
                </div>
                <div id="tab2" class="tabContents">       
                    <img src="https://static.willbes.net/public/images/promotion/2021/04/2169_04_02.jpg" title="경행경채"  />
                    <a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3011&campus_ccd=605001&course_idx=1085" target="_blank" title="경행경채 신청하기" style="position: absolute; left: 38.21%; top: 83.21%; width: 23.93%; height: 5.26%; z-index: 2;"></a>
                </div> 
            </div>     
        </div>

        <div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">5개월 필합패스 이용안내</h4>
				<div class="infoTit NG"><strong>유의사항</strong></div><br/>
				<ul>
					<li>
                        ◇ 5개월 필합패스 경찰 전문 교수진<br/>
                        형사소송법/수사 – 신광은 교수님<br/>
                        경찰학개론/행정법 – 장정훈 교수님<br/>
                        형법 – 김원욱 교수님<br/>
                        영어 – 하승민 교수님<br/>
                        한국사(택1) – 원유철 교수님, 오태진 교수님
                    </li><br/><br/>       
                    <li>
                        ◇ 5개월 필합패스<br/>
                        - 포함과정 : 문제풀이(실강) + 마무리특강(실강) + 빅매치 모의고사(학원시행) + 사물함 + 인강패스<br/>
                        *인강패스 제공 강좌 (접수일 ~ 8/21(토) 제공)<br/>
                        - 2021년 대비 기본이론<br/>
                        - 2021년 2차 대비 심화과정<br/>
                        - 2021년 2차 대비 문제풀이<br/>
                        - 2021년 2차 대비 마무리 특강
                    </li><br/><br/>     
                    <li>
                    ◇ 5개월 필합패스 유의사항<br/>
                        ① 5개월 필합패스는 5/30(일)까지 인강패스, 5/31(월)~8/21(토) 실강+인강패스로 구성된 상품입니다.<br/>
                        ② 5개월 필합패스는 2021년 9월 21일까지 책정된 수강료로 시험일정에 따라 정규과정 이외에 강의가 진행될 경우 추가 수강료가 부과될 수 있습니다.<br/>
                        (1개월 연장 시 – 실강 10만원, 인강 5만원)<br/>
                        *정규과정 : 기본이론, 심화이론, 심화기출, 문제풀이 1+2+3단계, 마무리특강<br/>
                        ③ 국가재난, 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의로 대체될 수 있으며, 이로 인한 해당기간 환불은 불가합니다.<br/>
                        ③ 해당 필합패스는 2022년 대비로 진행되는 과정은 수강 불가합니다.<br/>
                        ④ 영어 아침특강, G-TELP 특강, 한능검 특강은 필합패스에 포함 되어있지 않아 별도의 수강등록이 필요합니다.<br/>
                        ⑤ 특강의 경우 별도 신청이 필요합니다.<br/>
                        ⑥ 일부특강은 유료로 결제할 수 있습니다.<br/>
                        ⑦ 중도환불 시 수강기간만큼 차감 후, 무료혜택 금액을 차감하여 환불됩니다.<br/>
                        ⑧ 환승/다시 챌린지 할인은 타학원 환승 또는 필기합격 증빙 시 신청 가능합니다.<br/>
                            [환승 대상자]<br/>
                            - 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상 있는 수험생<br/>
                            - 2020년 1월 이후 자사 실강 수강이력이 없는 수험생<br/>
                            [다시 챌린지 대상자]<br/>
                            - 2021년 1차 경찰시험 필기합격 인증이 가능한 수험생
                    </li>
				</ul>         
				<div class="infoTit NG"><strong>*학원 사정으로 이벤트 기간 및 금액변동이 있을 수 있습니다.</strong></div>	
                <div class="infoTit NG"><strong>*학원 접수 문의 : 1544-0336</strong></div>			
			</div>
		</div>
        
	</div>
    <!-- End Container -->

<script type="text/javascript">    
    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
    });   

    /*탭(텍스터버전)*/
        $(document).ready(function(){
        $(".tabContents").hide();
        $(".tabContents:first").show();
        $(".tabContaier ul li a").click(function(){
        var activeTab = $(this).attr("href");
        $(".tabContaier ul li a").removeClass("active");
        $(this).addClass("active");
        $(".tabContents").hide();
        $(activeTab).fadeIn();
        return false;
        });
    });
</script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop