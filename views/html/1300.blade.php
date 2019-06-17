@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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

        .time {width:100%; text-align:center; background:#e9e7e8}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:70%}
        .time .time_txt {font-size:24px; color:#000; letter-spacing: -1px}
        .time .time_txt span {color:#6c1827; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#6c1827}
        50%{color:#ff6600}
        to{color:#6c1827}
        }
        @@-webkit-keyframes upDown{
        from{color:#6c1827}
        50%{color:#ff6600}
        to{color:#6c1827}
        } 
        .wb_top00 {background:#e9e7e8}
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/06/t-1300_bg01.png) no-repeat center top; position:relative}
        .wb_top span {width:256px; position:absolute; left:50%; top:82px; margin-left:-450px}
        .wb_cts01 {background:#fff;}

        .wb_cts02 {background:#f5f5f5 url(https://static.willbes.net/public/images/promotion/2019/06/t-1300_bg02.png) no-repeat center top;}
        .wb_cts02 .mv_bg {position:relative; width:1210px; height:553px; margin:0 auto; background:#fff url(https://static.willbes.net/public/images/promotion/2019/05/1061_05_bg.jpg) no-repeat center top;}
        .wb_cts02 .mv_bg ul {position:absolute; width:954px; top:19px; left:50%; margin-left:-477px}
        .wb_cts02 .mv_bg li {display:inline; float:left;}
        .wb_cts02 .mv_bg ul:after {content:""; display:block; clear:both}

        .wb_cts03 {background:#fff; no-repeat center top;}
        .wb_cts03 .check {width:980px; margin:0 auto; padding:15px 0px 120px 20px; letter-spacing:3; font-weight:bold; color:#f8eff0; cursor:pointer}
        .wb_cts03 .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px}
        .wb_cts03 .check a {display:inline-block; padding:12px 20px 10px 20px; color:#4680a5; background:#fff; margin-left:50px; border-radius:20px}

        .wb_cts04 {background:#fff;}
        .wb_cts05 {background:#fff;}
		
		.LAeventB03 table {background:#fff; width:960px; margin:0 auto; background:#fff} 
		.LAeventB03 p {font-size:1.5em;  color: #000; padding-bottom:20px; padding-top:20px;}
        .LAeventB03 tr {border-bottom:1px solid #ccc}        
        .LAeventB03 tr.st01 {background:#ececec}
        .LAeventB03 tr:hover {background:#f9f9f9}
        .LAeventB03 th,
        .LAeventB03 td {padding:15px 20px; font-size:16px; font-weight:500;}
        .LAeventB03 th {background:#5f5f5f; color:#fff}
        .LAeventB03 td:nth-child(1) {text-align:center}
        .LAeventB03 td:nth-child(2) {text-align:center; color:#d40000}
        .LAeventB03 td:nth-child(3) {color:#d40000; font-size:14px;}
        .LAeventB03 td:last-child {border:0}
        .LAeventB03 td p {font-size:12px}
		.LAeventB03 table a {padding:10px 15px; color:#fff; background:#d40000; font-size:14px; display:block; border-radius:20px 20px 0 20px}
        .LAeventB03 table a.btn2 {color:#666; background:#fff; border:1px solid #666; cursor:default}
        .LAeventB03 table a:hover {background:#252525; color:#fff;}
        .LAeventB03 table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}

        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            width:285px;
            z-index:10;
        }
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skybanner">            
            <a href="#event"><img src="https://static.willbes.net/public/images/promotion/2019/06/t-1300_sky.png" alt="환승이벤트"></a>
        </div>
 <!--
        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>
                    <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} </span>마감!</td>
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
        타이머 //-->

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/t-1300_01.png" alt="윌비스 자격증_전기.소방산업기사"  />
        </div><!--WB_top//-->


        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/t-1300_02.png" alt="윌비스 자격증_전기.소방산업기사"  />
        </div><!--wb_cts01//-->


        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/t-1300_03.png" alt="윌비스 자격증_전기.소방산업기사"  />
            <img src="https://static.willbes.net/public/images/promotion/2019/06/t-1300_03-1.png" alt="윌비스 자격증_전기.소방산업기사"  /><br>
			<img src="https://static.willbes.net/public/images/promotion/2019/06/t-1300_04.png" alt="윌비스 자격증_전기.소방산업기사"  /><br>
			<img src="https://static.willbes.net/public/images/promotion/2019/06/t-1300_05.png" alt="윌비스 자격증_전기.소방산업기사"  />
        </div><!--wb_cts02//-->

       <div class="evtCtnsBox wb_cts03">
	   		<p>● 소방설비(산업)기사 PASS 수강신청 테이블</p>
		</div>
	<div class="evtCtnsBox wb_cts04">
		<img src="https://static.willbes.net/public/images/promotion/2019/06/t-1300_06.png" alt="윌비스 자격증_전기.소방산업기사"  />
    </div>
    <!-- End Container -->
    <script>
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

        function go_PassLecture(no){
            if(parseInt(no)==1 || parseInt(no)==2){
                if($("input[name='ischk']:checked").size() < 1 && $("input[name='ischk2']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    $("#chkInfo").focus();
                    return;
                }
            }else if(parseInt(no)==3 || parseInt(no)==4){
                if($("input[name='ischk']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }
            }else if(parseInt(no)==5 || parseInt(no)==6){
                if($("input[name='ischk2']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }
            }

            var lUrl = "";

            if(parseInt(no)==1 || parseInt(no)==3 || parseInt(no)== 5){
                lUrl = "{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/149329') }}"
            }else{
                lUrl = "{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/149328') }}"
            }

            location.href = lUrl;
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop