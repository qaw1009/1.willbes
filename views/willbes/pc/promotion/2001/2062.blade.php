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

        /************************************************************/
        .sky {position:fixed;top:250px;right:25px;z-index:1;}
        .sky a {display:block;padding-top:10px;}

        .wb_police {background:#0A0A0A}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/02/2062_top_bg.jpg) no-repeat center top; padding-bottom:150px}  
        .wb_top .youtube { width:745px; margin:0 auto; } 
        .wb_top .youtube iframe {width:745px; height:419px}
        
        .evtInfo {padding:80px 0; background:#333; color:#f0f0f0; font-size:16px; margin-top:100px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.5}
        .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px;}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
        .evtInfoBox ul {margin-bottom:30px}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2021/02/2062_sky.png" alt="새해인사" ></a>
        </div>      
        
        <div class="evtCtnsBox wb_police" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="신광은 경찰학원" />            
		</div>     

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2062_top.jpg"  alt="새해 복 많이 받으세요."/>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/CsreKYYznO4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
		</div>

        <div class="evtCtnsBox wb_01" id="evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2062_01.jpg"  alt="새해인사 달고 할인쿠폰 받자"/>
        </div>   
             
        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif

        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">쿠폰 이용 시 주의사항</h4>

				<ul>
					<li>할인 쿠폰은 지급된 이후 결재창에서 이용가능하며 유효기간(1개월)이 지난 후 자동 소멸 됩니다.</li>
                    <li>지급된 쿠폰은 1회성으로 1개의 상품에만 적용하실 수 있습니다.</li>
                    <li>쿠폰 적용하기를 누른 후 결재를 취소하여 소멸된 쿠폰은 재발급되지 않습니다.</li>
                    <li>쿠폰은 현금으로 전환 및 일부 사용이 불가하며 환불 시 소멸됩니다.</li>
                    <li>온라인 0원 무제한 PASS, 통합생활관리반 등 일부 상품에는 적용되지 않습니다.</li>
                    <li>경찰 승진, 해양 경찰 강좌에는 적용되지 않습니다.</li>
                    <li>2만원 쿠폰: 5만원 이상, 10만원 쿠폰: 30만원 이상, 20만원 쿠폰: 60만원 이상의 과정 결재시에만 이용 가능합니다.</li>                  
				</ul>
			</div>
		</div>       
	</div>
    <!-- End Container -->
@stop