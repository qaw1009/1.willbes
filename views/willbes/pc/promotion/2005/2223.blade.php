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
            position: relative;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/   

        /*타이머*/
        .timeBox {background:#222}
        .time {width:980px; margin:0 auto; text-align:center;}
        .time {text-align:center; padding:20px 0}
        .time ul {width:100%;}
        .time ul:after {content:''; display:block; clear:both}
        .time li {display:inline; float:left; line-height:61px; font-size:30px; margin-right:10px;}
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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/05/2223_top_bg.jpg) no-repeat center top;}	
        .evtCtnsBox .title {color:#11153a; font-size:36px; margin:100px 0 50px;}
        .evt_01 {width:1120px; margin:0 auto;}

 
        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
        <div class="evtCtnsBox timeBox">
            <div class="time NSK-Black" id="newTopDday">
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
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2223_top.jpg" alt="합격응원 동영상 이벤트" />
		</div>       

        <div class="evtCtnsBox evt_01">  
            <div><img src="https://static.willbes.net/public/images/promotion/2021/05/2223_01_01.jpg" alt="예비순환+GS1순환" /></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
            <div><img src="https://static.willbes.net/public/images/promotion/2021/05/2223_01_02.jpg" alt="GS2순환" /></div>          
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))            
            @endif  
            <div><img src="https://static.willbes.net/public/images/promotion/2021/05/2223_01_03.jpg" alt="GS3순환" /></div>          
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))            
            @endif 
            <div><img src="https://static.willbes.net/public/images/promotion/2021/05/2223_01_04.jpg" alt="5급헌법 기본+PSAT" /></div>          
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))            
            @endif 
            <div><img src="https://static.willbes.net/public/images/promotion/2021/05/2223_01_05.jpg" alt="황종휴 경제학" /></div>          
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>5))            
            @endif 
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