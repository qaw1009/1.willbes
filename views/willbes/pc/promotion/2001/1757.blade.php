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
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        /*타이머*/
        .time {width:100%; text-align:center; background:#ebebeb}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#000; font-size:28px;}
        .time table td:last-child,
        .time table td:last-child span {font-size:40px}

        .sky {position:fixed; top:225px;right:0;z-index:10;}
        .sky li{padding-bottom:10px;}

        .wb_top {background:#648287 url(https://static.willbes.net/public/images/promotion/2020/08/1757_top_bg.jpg) no-repeat center;}

        .wb_01 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/08/1757_01_bg.jpg) no-repeat center;}

        .wb_02 {background:#fff;}

        .wb_03{background:#E9E9E9;position:relative;}
        .checkWrap {position:absolute; bottom:13%;text-align:center; width:1120px; left:50%; margin-left:-560px; z-index:1}
        .checkWrap .check {padding:20px 0; font-size:120%; color:#000; font-weight:bold}
        .checkWrap .check input {border:2px solid #000; height:24px; width:24px; }
        .checkWrap .check a {display:inline-block; padding:10px 20px; color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .checkWrap .red { padding:0 0 20px 0; font-size:120%; color:#ff0000; font-weight:bold;letter-spacing:-1px}

        .wb_04 {background:#fff;}     
     
    </style>

    <div class="evtContent NGR" id="evtContainer">

         <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>마감까지<br>남은시간</span></td>
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
                    <td>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}마감!</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->
        
        <ul class="sky">
            <li>
                <a href="#apply"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1757_sky.png" alt="빠른 신청하기" >
                </a>
            </li>                
        </ul>       

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1757_top.jpg"  alt="함정요원 특채 올패스"  />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1757_01.jpg"  alt="특화 프로그램" />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1757_02.jpg"  alt="시험안내" />
        </div>

        <div class="evtCtnsBox wb_03" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1757_03.jpg"  alt="신청하기" usemap="#Map" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="226,972,346,1020" href="#chkInfo" onclick="go_PassLecture('170500');" title="4개월">
                <area shape="rect" coords="548,973,668,1020" href="#chkInfo" onclick="go_PassLecture('170501');" title="6개월">
                <area shape="rect" coords="867,972,988,1021" href="#chkInfo" onclick="go_PassLecture('170502');" title="12개월">
            </map>
            <div class="checkWrap" >
                <div class="check"><label><input name="ischk" type="checkbox" value="Y" /> 페이지 하단 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label><a href="#info">이용안내확인하기 ↓</a></div>
            </div>
        </div>

        <div class="evtCtnsBox wb_04" id="info">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1757_04.jpg"  alt="이용안내" />
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">

        function go_PassLecture(prod_code) {
			if($("input[name='ischk']:checked").length < 1) {
				alert("이용안내에 동의하셔야 합니다.");
				$("#chkInfo").focus();
				return;
			}
			location.href = "{{ site_url('/periodPackage/show/cate/3008/pack/648001/prod-code/') }}" + prod_code;
		}

       /*디데이카운트다운*/
       $(document).ready(function() {
           dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop