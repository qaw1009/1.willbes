@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .subContainer {
        min-height:auto !important;
        margin-bottom:0 !important;
    }
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
    /*****************************************************************/ 
    .evt00 {background:#404040}
    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/07/1741_top_bg.jpg) no-repeat center top;}    
    .evt01 {}
    .evt02 {background:#f6f6f6}
    .evt04 {background:url(https://static.willbes.net/public/images/promotion/2020/07/1741_04_bg.jpg) no-repeat center top;}
    .evt05 {background:#ddd}
    .evt07 {background:#555}

    /*타이머*/
    .time {width:100%; text-align:center; background:#ebebeb}
    .time {text-align:center; padding:20px 0}
    .time table {width:1120px; margin:0 auto}
    .time table td {line-height:1.2}        
    .time table td img {width:65%}
    .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:left}
    .time span {color:#ffda39; font-size:28px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
    .time table td:first-child {text-align:right}
    .time table td:last-child,
    .time table td:last-child span {font-size:40px}
    @@keyframes upDown{
    from{color:#000}
    50%{color:#424ac7}
    to{color:#000}
    }
    @@-webkit-keyframes upDown{
    from{color:#000}
    50%{color:#424ac7}
    to{color:#000}
    } 

    .skybanner {position:fixed; top:200px; right:10px; width:130px; z-index:1;}
    </style>

    <div class="evtContent NGR" id="evtContainer">  
        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>파이널패스<br>판매종료까지</span></td>
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
                    <td>남았습니다.</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="skybanner" >
            <a href="#evt06"><img src="https://static.willbes.net/public/images/promotion/2020/07/1741_sky01.jpg" alt="" ></a>
        </div> 

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1740_00.jpg" alt="대한민국 경찰학원 1위">
        </div> 

        <div class="evtCtnsBox evt_top">  
            <div><img src="https://static.willbes.net/public/images/promotion/2020/07/1741_top.jpg" alt="경찰 파이널 패스"></div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1741_01.jpg" alt="경찰 파이널 패스">
        </div>  

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1741_02.jpg" alt="경찰 파이널 패스" usemap="#Map1741" border="0">
            <map name="Map1741">
                <area shape="rect" coords="471,492,651,555" href="#evt06" alt="수강신청">
                <area shape="rect" coords="464,1412,658,1471" href="#none" alt="쿠폰받기">
            </map>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1741_03.jpg" alt="경찰 파이널 패스">
        </div>  

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1741_04.jpg" alt="경찰 파이널 패스">
        </div> 

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1741_05.jpg" alt="경찰 파이널 패스">
        </div> 

        <div class="evtCtnsBox evt06" id="evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1741_06.jpg" alt="경찰 파이널 패스" usemap="#Map1741B" border="0">
            <map name="Map1741B">
                <area shape="rect" coords="247,633,871,705" href="#none" alt="파이널패스 수강신청">
            </map>
        </div>    

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1741_07.jpg" alt="경찰 파이널 패스">
        </div>           
    </div>
    <!-- End Container --> 

    <script type="text/javascript">       
          /*디데이카운트다운*/
          $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop