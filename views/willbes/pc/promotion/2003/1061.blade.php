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
        .time .time_txt {font-size:24px; color:#000; letter-spacing: -1px; font-weight:bold}
        .time .time_txt span {color:#6c1827}

        .wb_top {background:#a12932 url(http://file3.willbes.net/new_gosi/2018/12/EV181220_c1_bg.jpg) no-repeat center top;}
        .wb_cts01 {background:#fff;}

        .wb_cts02 {background:#fff url(http://file3.willbes.net/new_gosi/2018/12/EV181220_c7_bg.jpg) no-repeat center top;}
        .wb_cts02 .mv_bg {position:relative; width:1210px; height:553px; margin:0 auto; background:#fff url(http://file3.willbes.net/new_gosi/2018/12/EV181220_c8_bg.jpg) no-repeat center top;}
        .wb_cts02 .mv_bg ul {position:absolute; width:954px; top:19px; left:50%; margin-left:-477px}
        .wb_cts02 .mv_bg li {display:inline; float:left;}
        .wb_cts02 .mv_bg ul:after {content:""; display:block; clear:both}

        .wb_cts03 {background:#b5172c; border:#F00 1px solid;}
        .wb_cts03 .check {width:980px; margin:0 auto; background:#b5172c; padding:15px 0px 120px 20px; letter-spacing:3; font-weight:bold; color:#f8eff0; cursor:pointer}
        .wb_cts03 .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px}
        .wb_cts03 .check a {display:inline-block; padding:12px 20px 10px 20px; color:#b5172c; background:#fff; margin-left:50px; border-radius:20px}

        .wb_cts04 {background:#e5dac9;}
        .wb_cts05 {background:#fff;}

        .skybanner {
            position:fixed;
            bottom:20px;
            right:10px;
            width:290px;
        }
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skybanner">
            <div><a href="#event"><img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c_sky2_1.png" alt="환승이벤트" ></a></div>
        </div>

        <div class="evtCtnsBox time" id="newTopDday">
            <div>
                <table>
                    <tr>
                    <td class="time_txt NGEB"><span>4/30(화) 마감!</span></td>
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

        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c1.png" alt="윌비스9급PASS X 세무PASS와 만나다!"  /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c2_1.gif" alt="11-12월 기출문제풀이 커리큘럼 업데이트 중"  /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c3.png" alt=""  />
        </div><!--WB_top//-->


        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c4.gif" alt="어떤 고민일지라도 윌비스9급PASS가 진리!" /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c5.gif" alt="" /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c6.jpg" alt="" />
        </div><!--wb_cts01//-->


        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c7.jpg" alt="전문 교수진과 함께라면 흔들림 없는 실력 완성!" />
            <div class="mv_bg">
                <ul>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_mv1.gif" alt="" /></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_mv2.gif" alt="" /></li>
                    <li style="padding-left:60px;"><img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_mv5.gif" alt="" /></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_mv6.gif" alt="" /></li>
                    <!--다음줄-->
                    <li style=" clear:left; "><img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_mv3.gif" alt="" /></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_mv4.gif" alt="" /></li>
                    <li style="padding-left:60px;"><img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_mv7.gif" alt="" /></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_mv8.gif" alt="" /></li>
                </ul>
            </div>
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c9.jpg" alt="" />
        </div><!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c10.jpg" alt=" " usemap="#Map181220_c1" border="0" />
            <map name="Map181220_c1" >
                <area shape="rect" coords="832,611,975,697" href="javascript:go_PassLecture(1);"   onfocus="this.blur();" />
                <area shape="rect" coords="843,720,977,807" href="javascript:go_PassLecture(2);"   onfocus="this.blur();" />
            </map>
            <div class="check" id="chkInfo"><label><input name="ischk" type="checkbox" value="Y" /> 페이지 하단 윌비스 9급 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label><a href="#tab1">이용안내확인하기 ↓</a></div>
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c11.jpg" alt=" " usemap="#Map181220_c2" border="0" />
            <map name="Map181220_c2" >
                <area shape="rect" coords="369,819,845,916" href="javascript:certOpen();" alt="타 사이트 수강 인증하기" />
                <area shape="rect" coords="499,925,675,969" href="#tab1" alt="유의사항 확인하기"/>
            </map>
        </div><!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts05" id="tab1">
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c12.jpg" alt=" 윌비스 9급 PASS 이용안내" />
        </div><!--wb_cts05//-->

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

        /*타이머*/
        var DdayDiff = { //타이머를 설정합니다.
            inDays: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return Math.floor((tt2-tt1) / (1000 * 60 * 60 * 24));
            },

            inWeeks: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return parseInt((tt2-tt1)/(24*3600*1000*7));
            },

            inMonths: function(dd1, dd2) {
                var dd1Y = dd1.getFullYear();
                var dd2Y = dd2.getFullYear();
                var dd1M = dd1.getMonth();
                var dd2M = dd2.getMonth();

                return (dd2M+12*dd2Y)-(dd1M+12*dd1Y);
            },

            inYears: function(dd1, dd2) {
                return dd2.getFullYear()-dd1.getFullYear();
            }
        };

        function daycountDown() {
            // 한달 전 날짜로 셋팅
            var event_day = new Date(2019,3,30,23,59,59);
            var now = new Date();
            var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));

            var Monthleft = event_day.getMonth() - now.getMonth();
            var Dateleft = DdayDiff.inDays(now, event_day);
            var Hourleft = timeGap.getHours();
            var Minuteleft = timeGap.getMinutes();
            var Secondleft = timeGap.getSeconds();

            if((event_day.getTime() - now.getTime()) > 0) {
                $("#dd1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Dateleft/10) + ".png");
                $("#dd2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Dateleft%10) + ".png");

                $("#hh1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Hourleft/10) + ".png");
                $("#hh2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Hourleft%10) + ".png");

                $("#mm1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Minuteleft/10) + ".png");
                $("#mm2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Minuteleft%10) + ".png");

                $("#ss1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Secondleft/10) + ".png");
                $("#ss2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Secondleft%10) + ".png");
                setTimeout(daycountDown, 1000);
            }
            else{
                $("#newTopDday").hide();
            }

        }
        daycountDown();

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

    </script>

@stop