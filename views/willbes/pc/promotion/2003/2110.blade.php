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

    /*타이머*/
    .time {width:100%; text-align:center; background:#e1e1e1}
    .time {text-align:center; padding:20px 0}
    .time table {width:1120px; margin:0 auto}
    .time table td:first-child {font-size:40px}
    .time table td img {width:80%}
    .time .time_txt {font-size:28px; color:#000; letter-spacing: -1px}
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
    
    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2110_top_bg.jpg) no-repeat center top;} 

    .evt_03 {background:#fff;}
    .evt_03 .title {width:1120px; font-size:25px;  margin:0 auto 20px; text-align:left; color:#464646}
    .evt_03 .evt03_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 	   
    .evt_03 .evt03_box .evt{color:#fff;vertical-align:baseline;border-radius:30px;background:#f35a61;padding:0 25px;}

    
    .evt_05 {background:#fff;padding-bottom:100px;}
    .evt_05 .title {width:1120px; font-size:25px;  margin:0 auto 20px; text-align:left; color:#464646}
    .evt_05 .evt03_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 	   
    .evt_05 .evt05_box .evt{color:#fff;vertical-align:baseline;border-radius:30px;background:#f35a61;padding:0 25px;}

    </style> 

    <div class="evtContent NSK">

        <div class="evtCtnsBox time NSK-Black" id="newTopDday">
            <div>
                <table>
                    <tr>
                    <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</td>
                    <td class="time_txt">마감까지<br><span>남은 시간은</span></td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2110_top.jpg" alt="공린이를 위한 단과" />
        </div>

        <div class="evtCtnsBox evt_01">  
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2110_01.jpg" alt="합리적인 가격" />
        </div>

        <div class="evtCtnsBox evt_02">  
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2110_02.jpg" alt="쿠폰 다운로드" usemap="#Map2110_coupon" border="0" />
            <map name="Map2110_coupon" id="Map2110_coupon">
                <area shape="rect" coords="570,279,967,368" href="javascript:void(0);" title="쿠폰받기" />
            </map>
        </div>   

        <div class="evtCtnsBox evt_03">
            <div class="evt03_box" id="apply">       
                <div class="title NSK-Black" style="padding:50px 0 25px;"> <span class="evt">9급</span ></div>                 
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                    @endif   
                <div class="title NSK-Black" style="padding:50px 0 25px;"> <span class="evt">소방</span></div>     
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                    @endif      
                <div class="title NSK-Black" style="padding:50px 0 25px;"> <span class="evt">군무원</span></div>     
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
                    @endif                    
            </div>
		</div> 

        <div class="evtCtnsBox evt_04">  
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2110_03.jpg" alt="수강신청" />
        </div>   

        <div class="evtCtnsBox evt_05">
            <div class="evt05_box" id="apply">       
                <div class="title NSK-Black" style="padding:50px 0 25px;"> <span class="evt">9급</span ></div>                 
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))
                    @endif   
                <div class="title NSK-Black" style="padding:50px 0 25px;"> <span class="evt">소방</span></div>     
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>5))
                    @endif      
                <div class="title NSK-Black" style="padding:50px 0 25px;"> <span class="evt">군무원</span></div>     
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>6))
                    @endif            
            </div>
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