@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/ 
         /*타이머*/
         .timeBox {background:#333}
        .time {width:920px; margin:0 auto; text-align:center;}
        .time {text-align:center; padding:20px 0}
        .time ul {width:100%;}
        .time ul:after {content:''; display:block; clear:both}
        .time li {display:inline; float:left; line-height:61px; font-size:24px; margin-right:10px;}
        .time li:first-child {margin-left:80px}
        .time li img {width:44px}
        .time .time_txt {color:#fff; letter-spacing:-1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }
        @@-webkit-keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }  

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/02/2002_top_bg.jpg) no-repeat center top;}	

        .evt_01 {background:#a9cfc0}	
        
        .evt_02 {padding:100px 0; width:1120px; margin:0 auto}
        .evt_02 .title {font-size:30px; color:#1a3443; margin-bottom:50px}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:14px; margin-top:100px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:30px; margin-bottom:40px}
		.evtInfoBox .infoTit {font-size:18px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#000; border-radius:20px; font-weight:normal !important}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
        .evtInfoBox span {vertical-align:bottom}        
    
        /************************************************************/      
    </style> 

	<div class="evtContent NG">
        <div class="evtCtnsBox timeBox">
            <div class="time NGEB" id="newTopDday">
                <ul>
                    <li class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</li>
                    <li class="time_txt"><span>남은 시간은</span></li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">일</li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>             
                </ul>
            </div>
        </div>

		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2002_top.jpg" alt="5급행정, 국립외교원, PSAT, 5급헌법용" />
		</div>

        <div class="evtCtnsBox evt_01">
        {{--5급행정, 국립외교원, PSAT, 5급헌법--}}
        @if($__cfg['CateCode'] == '3094' || $__cfg['CateCode'] == '3095' || $__cfg['CateCode'] == '3096' || $__cfg['CateCode'] == '3097')
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2002_01_01.jpg" alt="5급행정, 국립외교원, PSAT, 5급헌법용" />
        @endif
        @if($__cfg['CateCode'] == '3098' || $__cfg['CateCode'] == '3099')
        {{--법원행시, 변호사--}}
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2002_01_02.jpg" alt="5급행정, 변호사, 법원행시용" />
        @endif
		</div>

        {{-- 그룹 1번 필수 --}}
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
        @endif

		<div class="evtCtnsBox evt_02">
        @if($__cfg['CateCode'] == '3094')
            <div class="title NSK-Black">[5급행정] 2021 Dreams come true! 설맞이 특별이벤트</div>
            <div class="evt02_box">                
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif  
            </div>
        @endif
        @if($__cfg['CateCode'] == '3095')
            <div class="title NSK-Black">[국립외교원] 2021 Dreams come true! 설맞이 특별이벤트</div>
            <div class="evt02_box">                
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
                @endif  
            </div>
        @endif
        @if($__cfg['CateCode'] == '3096')
            <div class="title NSK-Black">[PSAT] 2021 Dreams come true! 설맞이 특별이벤트</div>
            <div class="evt02_box">                
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))
                @endif  
            </div>
        @endif
        @if($__cfg['CateCode'] == '3097')
            <div class="title NSK-Black">[5급헌법] 2021 Dreams come true! 설맞이 특별이벤트</div>
            <div class="evt02_box">                
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>5))
                @endif  
            </div>
        @endif
        @if($__cfg['CateCode'] == '3098')
            <div class="title NSK-Black">[법원행시] 2021 Dreams come true! 설맞이 특별이벤트</div>
            <div class="evt02_box">                
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>6))
                @endif  
            </div>
        @endif
        @if($__cfg['CateCode'] == '3099')
            <div class="title NSK-Black">[변호사] 2021 Dreams come true! 설맞이 특별이벤트</div>
            <div class="evt02_box">                
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>7))
                @endif  
            </div>
        @endif
		</div>

        <div class="evtCtnsBox evtInfo NSK" id="notice">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">한림법학원 새해맞이 동영상 특별 이벤트안내</h4>
                <div class="infoTit"><strong>이용안내</strong></div>
                <ul>
                    <li>본 상품은 2021년 2월 14일 (일)까지 진행되는 이벤트 상품입니다.</li>
                    <li>이벤트 내용 (각 홈페이지 이벤트 페이지 <span class="tx-light-blue">2021년 설맞이 이벤트!</span>에서 신청시 적용)</li>
                    <li><span class="tx16">[5급행정, 국립외교원, PSAT, 5급헌법]</span> <br>
                        1과목 결제시  : 등록된 강의 <span class="tx-red">10%할인</span><br>
                        2강좌 동시 결제 :  약 <span class="tx-red">20%할인</span></li>
                    <li><span class="tx16">[법원행시, 변호사]</span> <br>
                        1과목 결제시  : 등록된 강의 <span class="tx-red">15%할인</span><br>
                        2강좌 동시 결제 :  약 <span class="tx-red">30%할인</span></li>
                    <li>2강좌 이상 결제시 적용되는 할인은 <span class="tx-red">이벤트 페이지에서 신청</span>해주셔야 적용됩니다.</li>
                </ul>
                <div class="infoTit"><strong>수강시작일관련</strong></div>
                <ul>
                    <li>수강시작일은 30일 범위내에서 지정이 가능합니다.<br>
                        다만, <span class="tx-red">2강좌 이상 선택시 원하시는 수강시작일을 90일 범위내에서</span> 동영상게시판에 적어주시면 변경하여 드리겠습니다.</li>
                </ul>
                <div class="infoTit"><strong>교재</strong></div>
                <ul>
                    <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                </ul>
                <div class="infoTit"><strong>강의수강</strong></div>
                <ul>
                    <li>강의배수 제한 : 강의는 배수제한 규정이 적용됩니다.</li>
                    <li>동영상 강의는 컴퓨터 또는 스마트기기를 이용하여 수강하실 수 있습니다.</li>
                </ul>
                <div class="infoTit"><strong>환불</strong></div>
                <ul>
                    <li>결제일로부터 7일 이내 전액 환불 가능합니다. 단, 맛보기 강좌를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                    <li>강의 자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                    <li>본 상품은 특별 기획 강좌로 환불 시에는 수강하신 상품의 정가를 기준으로 이용기간을 공제하고 환불됩니다.<br>
                    -사용자패키지를 통한 <span class="tx-red">2과목 이상 수강시 일부과목만의 환불은 불가</span>합니다.(전체환불 진행)</li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>
                </ul>
                <div class="infoTit"><strong>유의사항</strong></div>
                <ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                </ul>
                <div class="infoTit"><strong>※ 이용 문의 : 윌비스 고객만족센터 1566-4770</strong></div>
            </div>
        </div>

	</div>
    <!-- End Container -->

    <script>  
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });   
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop