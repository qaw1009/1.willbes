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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        /* txt_motion */
		.time {width:100%; text-align:center; background:#000}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:70%}
        .time .time_txt {font-size:24px; color:#f2f2f2; letter-spacing: -1px; font-weight:bold}
        .time .time_txt span {color:#ead4b5; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#ead4b5}
        50%{color:#ff6600}
        to{color:#ead4b5}
        }
        @@-webkit-keyframes upDown{
        from{color:#ead4b5}
        50%{color:#ff6600}
        to{color:#ead4b5}
        } 

        .wb_top {background:#FF6B57 url("https://static.willbes.net/public/images/promotion/2020/07/1724_top_bg.jpg") center top  no-repeat}   

        </style> 

<div class="p_re evtContent NGR" id="evtContainer">
    <div class="evtCtnsBox time NGEB" id="newTopDday">
        <div id="ddaytime">
        <table>
            <tr>
            <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} </span>마감!</td>
            <td class="time_txt">마감까지<br>
            <span>남은 시간은</span></td>
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
  
    <div class="evtCtnsBox wb_top">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1724_top.jpg"  title="불꽃소방 윌비스 T-PASS" />    
    </div>
    
    <div class="evtCtnsBox wb_cts01">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1724_01.jpg"  title="전략적 계획,효율적 학습" /> 
    </div>
    
    <div class="evtCtnsBox wb_cts02">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1724_02.jpg"  title="할인 쿠폰 지급" /> 
    </div>
    
    <div class="evtCtnsBox wb_cts03">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1724_03.jpg" usemap="#Map1724a"  title="수강신청" border="0" />
        <map name="Map1724a" id="Map1724a">
            <area shape="rect" coords="113,429,261,471" href="https://pass.willbes.net/promotion/index/cate/3023/code/2196" target="_blank" />
            <area shape="rect" coords="604,429,752,471" href="https://pass.willbes.net/promotion/index/cate/3023/code/2196" target="_blank" />
            <area shape="rect" coords="112,921,263,962" href="https://pass.willbes.net/promotion/index/cate/3023/code/1081" target="_blank" />
            <area shape="rect" coords="605,920,755,962" href="https://pass.willbes.net/promotion/index/cate/3023/code/1081" target="_blank" />
            <area shape="rect" coords="113,1412,262,1453" href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/168182" target="_blank" />
            <area shape="rect" coords="606,1412,754,1452" href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/168183" target="_blank" />
            <area shape="rect" coords="112,1904,262,1942" href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/169009" target="_blank" />
        </map>         
    </div> 

    <div class="evtCtnsBox wb_cts04">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1724_04.jpg"  title="유의사항" /> 
    </div>   
  
</div>
<!-- End Container -->

<script type="text/javascript">
 /*디데이카운트다운*/
 $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
</script>
{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop