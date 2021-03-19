@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
    /*****************************************************************/     
    
    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2136_top_bg.jpg) no-repeat center top;} 
    .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2136_01_bg.jpg) no-repeat center top;} 
    .evt_03 {background:#ebe2d4;}
    .evt_04 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2136_04_bg.jpg) no-repeat center top;}
    .evt_05 {width:1120px; margin:0 auto; padding:100px 0}
    .evt_05 .title {font-size:44px; color:#252525; line-height:1.2; padding-bottom:30px; margin-bottom:50px; border-bottom:2px solid #252525}
    .evt_05 .title p {color:#5a97e5; font-size:28px}
    .evt_05 .stitle {font-size:32px; text-align:left; margin:30px 0}
    .evt_05 .stitle span {color:#5a97e5; vertical-align: top}


    </style>


    <div class="evtContent NSK">
        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2136_top.jpg" alt="공린이를 위한 단과" />
        </div>

        <div class="evtCtnsBox evt_01">  
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2136_01.jpg" alt="합리적인 가격" />
        </div>

        <div class="evtCtnsBox evt_02">  
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2136_02.jpg" alt="쿠폰 다운로드" usemap="#Map2110_coupon" border="0" />
            <map name="Map2110_coupon" id="Map2110_coupon">
                <area shape="rect" coords="570,279,967,368" href="javascript:void(0);" title="쿠폰받기" onclick="giveCheck();"/>
            </map>
        </div>   

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2136_03.jpg" alt="수강신청" />           
        </div> 

        <div class="evtCtnsBox evt_04">  
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2136_04.jpg" alt="수강신청" />
        </div>   
        
        <div class="evtCtnsBox evt_05"> 
            <div class="title NSK-Black">
                <p>PSAT UP-GRADE!</p>
                7급 Advanced  PSAT CLASS(심화) 
            </div> 
            <div class="stitle NSK-Black">7급 Advanced PSAT CLASS <span>PASS반</span></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
            <div class="stitle NSK-Black">7급 Advanced PSAT CLASS <span>단과반</span></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif 
        </div>
        
         
    </div>
   <!-- End Container -->

<script language="javascript">
    /*디데이카운트다운*/
    $(document).ready(function() {
         dDayCountDown('{{$arr_promotion_params['edate']}}');
     });
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop