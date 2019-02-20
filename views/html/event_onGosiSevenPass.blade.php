@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        body{width:100%; min-width:1240px; margin:auto;}
        .Depth {display:none}
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	

        .wb_top {width:100%; min-width:1210px; text-align:center;  font-family:'Noto Sans KR', Arial, Sans-serif; font-size:15px; color:#ebebeb; background:#171717 url(http://file3.willbes.net/new_gosi/2019/01/EV190130_01_bg.png) no-repeat center top;  position:relative;}
        
        .wb_cts01 {width:100%; min-width:1210px; text-align:center;  background:#e1ded9;}        

        .wb_cts02 {width:100%; min-width:1210px; text-align:center;  background:#171717; font-family:'Noto Sans KR', Arial, Sans-serif; font-size:15px; color:#232228;}	        
        
        .wb_cts03 {width:100%; min-width:1210px; text-align:center;  background:#e1ded9;}

        .check {width:980px; margin:0 auto; background:#171717; padding:20px 0px 50px 10px; letter-spacing:3; color:#fff;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px;color:#27262c; background:#e3c0a2; margin-left:50px; border-radius:20px}
        
        .time{width:100%; min-width:1210px; text-align:center; background:#000;}
        .time_date {text-align:center; padding:20px 115px}
        .time_date table {width:980px; margin:0 auto}
        .time_txt {font-family: 'NanumGothic', '나눔고딕','NanumGothicWeb', '맑은 고딕', 'Malgun Gothic', Dotum; font-size:28px; color:#f2f2f2; letter-spacing: -1px; font-weight:bold}
        .time p {text-alig:center}	

        /*하단퀵*/
        #nav {display:block; position:fixed;  bottom:0%;  width:100%; min-width:1210px;  text-align:center; background: url(http://file3.willbes.net/new_gosi/2019/02/EV190211_sky_bg.png) repeat-x; z-index:10;}

   
    </style>
    
    @include('html.event_incOnTnb')

    <div class="p_re evtContent" id="evtContainer">
        <div id="nav">
            <img src="http://file3.willbes.net/new_gosi/2019/02/EV190211_sky1.png" alt="2019 윌비스 7급PASS 구매하기" usemap="#Map_180702_lecsky" border="0" />
            <map name="Map_180702_lecsky">
                <area shape="rect" coords="629,10,860,80" href="javascript:go_PassLecture(1);" alt="6개월수강신청" onfocus="this.blur();">
                <area shape="rect" coords="912,7,1149,79" href="javascript:go_PassLecture(2);" alt="12개월수강신청">
            </map>
        </div>

        <div class="wb_top" id="main">
            <img src="http://file3.willbes.net/new_gosi/2019/02/EV190211_01.png" alt="윌비스 7급 PASS" usemap="#Map_180702_lec" border="0" />
                <map name="Map_180702_lec">
                <area shape="rect" coords="530,1090,695,1152" href="javascript:go_PassLecture(3);" alt="6개월수강신청"  onfocus="this.blur();">
                <area shape="rect" coords="854,1088,1046,1152" href="javascript:go_PassLecture(4);" alt="12개월수강신청">
                </map>
            <div class="check" id="chkInfo">
            <label>
                <input name="ischk" type="checkbox" value="Y" />
                페이지 하단 윌비스 7급 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. 
            </label>
            <a href="#tab1">이용안내확인하기 ↓</a></div>
        </div>
        <!--WB_top//-->

        <!--타이머-->
        <div class="time">
            <div class="time_date">
                <table>
                    <tr>
                    <td class="time_txt">마감까지</td>
                    <td width="72"><img id="d1" src="http://file.willbes.net/new_image/0.png" border="0" /></td>
                    <td width="72"><img id="d2" src="http://file.willbes.net/new_image/0.png" border="0" /></td>
                    <td width="70" class="time_txt">day</td>
                    <td width="72"><img id="h1" src="http://file.willbes.net/new_image/0.png" border="0" /></td>
                    <td width="72"><img id="h2" src="http://file.willbes.net/new_image/0.png" border="0" /></td>
                    <td width="15" class="time_txt">:</td>
                    <td width="72"><img id="m1" src="http://file.willbes.net/new_image/0.png" border="0" /></td>
                    <td width="72"><img id="m2" src="http://file.willbes.net/new_image/0.png" border="0" /></td>
                    <td width="15" class="time_txt">:</td>
                    <td width="72"><img id="s1" src="http://file.willbes.net/new_image/0.png" border="0" /></td>
                    <td width="72"><img id="s2" src="http://file.willbes.net/new_image/0.png" border="0" /></td>
                    <td align="center" class="time_txt">남았습니다.</td>
                    </tr>
                </table>
            </div>
        </div>
        <!--time//-->

        <div class="wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180914_02.png"  alt="윌비스의 7급 커리큘럼"  />
        </div>
        <!--wb_cts01//-->
      
      
        <div class="wb_cts02" id="event">
            <img src="http://file3.willbes.net/new_gosi/2019/02/EV190211_03.png"  alt="윌비스 2019 윌비스 7급 PASS" usemap="#Map_190211_lecgo" border="0"/>
                <map name="Map_190211_lecgo">
                <area shape="rect" coords="534,596,696,658" href="javascript:go_PassLecture(5);" alt="6개월수강신청" onfocus="this.blur();">
                <area shape="rect" coords="882,596,1060,660" href="javascript:go_PassLecture(6);" alt="12개월수강신청">
                </map>            
            <div class="check">
                <label>
                    <input name="ischk2"  type="checkbox" value="Y" />
                    페이지 하단 윌비스 7급 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tab1">이용안내확인하기 ↓</a>
            </div>
        </div>   
        <!--wb_cts02//-->   

        <div class="wb_cts03" id="tab1">
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180914_04.png"  alt="윌비스 2019 7급 PASS 이용안내" />
        </div> 
        <!--wb_cts03//--> 
        
    </div>
    <!-- End Container -->

    <script>       
        <!--타이머-->
		var DateDiff = { //타이머를 설정합니다.
			inDays: function(d1, d2) {
				var t2 = d2.getTime();
				var t1 = d1.getTime();

				return parseInt((t2-t1)/(24*3600*1000));
			},

			inWeeks: function(d1, d2) {
				var t2 = d2.getTime();
				var t1 = d1.getTime();

				return parseInt((t2-t1)/(24*3600*1000*7));
			},

			inMonths: function(d1, d2) {
				var d1Y = d1.getFullYear();
				var d2Y = d2.getFullYear();
				var d1M = d1.getMonth();
				var d2M = d2.getMonth();

				return (d2M+12*d2Y)-(d1M+12*d1Y);
			},

			inYears: function(d1, d2) {
				return d2.getFullYear()-d1.getFullYear();
			}
		}
			
		function countDown() {
            //event_day = new Date(2016,4,6,23,59,59);
            // 한달 전 날짜로 셋팅 
            event_day = new Date(2019,1,19,23,59,59);
            now = new Date();

            var Monthleft = event_day.getMonth() - now.getMonth();
            var Dateleft = DateDiff.inDays(now, event_day);
            var Hourleft = event_day.getHours() - now.getHours();
            var Minuteleft = event_day.getMinutes() - now.getMinutes();
            var Secondleft = event_day.getSeconds() - now.getSeconds();

            //alert(Monthleft+"-"+Dateleft+"-"+Hourleft+"-"+Minuteleft+"-"+Secondleft)

            if((event_day.getTime() - now.getTime()) > 0) {
                $("#d1").attr("src", "http://file.willbes.net/new_image/" + parseInt(Dateleft/10) + ".png");
                $("#d2").attr("src", "http://file.willbes.net/new_image/" + parseInt(Dateleft%10) + ".png");

                $("#h1").attr("src", "http://file.willbes.net/new_image/" + parseInt(Hourleft/10) + ".png");
                $("#h2").attr("src", "http://file.willbes.net/new_image/" + parseInt(Hourleft%10) + ".png");

                $("#m1").attr("src", "http://file.willbes.net/new_image/" + parseInt(Minuteleft/10) + ".png");
                $("#m2").attr("src", "http://file.willbes.net/new_image/" + parseInt(Minuteleft%10) + ".png");

                $("#s1").attr("src", "http://file.willbes.net/new_image/" + parseInt(Secondleft/10) + ".png");
                $("#s2").attr("src", "http://file.willbes.net/new_image/" + parseInt(Secondleft%10) + ".png");
            }
            else{
            }

            setTimeout(countDown, 1000);
        }
        countDown();

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */   
	    });
    </script>

    <script type="text/javascript">
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
            lUrl = "http://www.willbesgosi.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=002&topMenuName=&topMenuType=O&searchCategoryCode=002&searchLeccode=Y201900002&leftMenuLType=M0001&lecKType=Y"
            }else{
            lUrl = "http://www.willbesgosi.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=002&topMenuName=&topMenuType=O&searchCategoryCode=002&searchLeccode=Y201800035&leftMenuLType=M0001&lecKType=Y"
            }
            location.href = lUrl;
        }
    </script>

@stop