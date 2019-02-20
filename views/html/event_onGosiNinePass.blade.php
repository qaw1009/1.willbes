@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        body{width:100%; min-width:1240px; margin:auto;}
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:0 !important;
            padding:0 !important;
            background:#fff;
        }	

        /*타이머*/
        .time{ width:100%; text-align:center; min-width:1210px; background:#e8e7e7;  padding:6px 0 0 20px;} 
        .time_date {max-width:1210px; text-align:center;  margin: 0 auto;}
        .time_date .t_img { width:80%; }		
        .time_txt {font-family: 'NanumGothic', '나눔고딕','NanumGothicWeb', '맑은 고딕', 'Malgun Gothic', Dotum; font-size:23px; color:#000; letter-spacing: -1px; font-weight:bold;}
        .time p {text-align:center; padding-top:25px;}	
        
        
        .wb_top {width:100%; min-width:1210px; text-align:center; background:#a12932 url(http://file3.willbes.net/new_gosi/2018/12/EV181220_c1_bg.jpg) no-repeat center top;}
        .wb_cts01 {width:100%; text-align:center;  min-width:1210px; background:#fff;} 

        .wb_cts02 {width:100%; text-align:center; background:#fff url(http://file3.willbes.net/new_gosi/2018/12/EV181220_c7_bg.jpg) no-repeat center top;}	
        .wb_cts02 .mv_bg {position:relative; width:1210px; height:553px; margin:0 auto; background:#fff url(http://file3.willbes.net/new_gosi/2018/12/EV181220_c8_bg.jpg) no-repeat center top;}
        .wb_cts02 .mv_bg ul {position:absolute; width:954px; top:19px; left:50%; margin-left:-477px}	
        .wb_cts02 .mv_bg li {display:inline; float:left;}
        .wb_cts02 .mv_bg ul:after {content:""; display:block; clear:both}  

        .wb_cts03 {width:100%; text-align:center;  min-width:1210px; background:#b5172c; border:#F00 1px solid;}	
        .wb_cts03 .check {width:980px; margin:0 auto; background:#b5172c; padding:15px 0px 120px 20px; letter-spacing:3; font-weight:bold; color:#f8eff0; cursor:pointer}
        .wb_cts03 .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px}
        .wb_cts03 .check a {display:inline-block; padding:12px 20px 10px 20px; color:#b5172c; background:#fff; margin-left:50px; border-radius:20px}
        
        .wb_cts04 {width:100%; text-align:center;  min-width:1210px; background:#e5dac9;}        
        .wb_cts05 {width:100%; text-align:center;  min-width:1210px; background:#fff;}
        
        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:290px; 
            animation:upDown 1s infinite;
            -webkit-animation:upDown 1s infinite;
        }

        @@keyframes upDown{
            from{margin-top:0}
            60%{margin-top:-30px}
            to{margin-top:0}
        }
        @@-webkit-keyframes upDown{
            from{margin-top:0}
            60%{margin-top:-30px}
            to{margin-top:0}
        } 
   
    </style>
    
    @include('html.event_incOnTnb')

    <div class="p_re evtContent" id="evtContainer">
        <div class="skybanner">
			<div><a href="#event"><img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c_sky2.png" alt="환승이벤트" ></a></div>
		</div>
        
        <!-- 타이머 -->    
        <div class="time" >
            <div class="time_date">			
                <table width="1100px;" height="110px" border="0" cellpadding=0 cellspacing=0>
                    <tr>
                        <td style="text-align:center;"><img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c0.jpg" alt=""  /></td>                        
                        <td width="150" align="center" class="time_txt">마감까지 <br />남은 시간은</td>
                        <td width="62" height="101" align="center"   ><img id="d1" src="http://file.willbes.net/new_image/0.png" border="0" class="t_img" /></td>
                        <td width="62" height="101"  align="center"  ><img id="d2" src="http://file.willbes.net/new_image/0.png" border="0" class="t_img" /></td>
                        <td width="60" height="101" align="center" class="time_txt">day</td>
                        <td width="62" height="101" align="center"  ><img id="h1" src="http://file.willbes.net/new_image/0.png" border="0" class="t_img"/></td>
                        <td width="62" height="101" align="center"  ><img id="h2" src="http://file.willbes.net/new_image/0.png" border="0" class="t_img"/></td>
                        <td width="20" height="101" align="center" class="time_txt">:</td>
                        <td width="62" height="101" align="center" ><img id="m1" src="http://file.willbes.net/new_image/0.png" border="0" class="t_img"/></td>
                        <td width="62" height="101" align="center" ><img id="m2" src="http://file.willbes.net/new_image/0.png" border="0" class="t_img"/></td>
                        <td width="20" height="101" align="center" >:</td>
                        <td width="62" height="101" align="center"  ><img id="s1" src="http://file.willbes.net/new_image/0.png" border="0" class="t_img"/></td>
                        <td width="62" height="101" align="center"  ><img id="s2" src="http://file.willbes.net/new_image/0.png" border="0" class="t_img"/></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- 타이머 -->

        <div class="wb_top" >
      		<img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c1.png" alt="윌비스9급PASS X 세무PASS와 만나다!"  /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c2.gif" alt="11-12월 기출문제풀이 커리큘럼 업데이트 중"  /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c3.png" alt=""  />
	    </div><!--WB_top//-->
      
      
        <div class="wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c4.gif" alt="어떤 고민일지라도 윌비스9급PASS가 진리!" /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c5.gif" alt="" /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c6.jpg" alt="" />
        </div><!--wb_cts01//-->
      
      
	    <div class="wb_cts02" >
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

        <div class="wb_cts03" >
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c10.jpg" alt=" " usemap="#Map181220_c1" border="0" />
            <map name="Map181220_c1" >
                <area shape="rect" coords="832,611,975,697" href="javascript:go_PassLecture(1);"   onfocus="this.blur();" />
                <area shape="rect" coords="843,720,977,807" href="javascript:go_PassLecture(2);"   onfocus="this.blur();" />
            </map>                
            <div class="check" id="chkInfo"><label><input name="ischk" type="checkbox" value="Y" /> 페이지 하단 윌비스 9급 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label><a href="#tab1">이용안내확인하기 ↓</a></div>
        </div><!--wb_cts03//-->
      
        <div class="wb_cts04" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c11.jpg" alt=" " usemap="#Map181220_c2" border="0" />
            <map name="Map181220_c2" >
                <area shape="rect" coords="369,819,845,916" href="https://www.local.willbes.net/home/html/event_onCopReboundPop" target="_blank" alt="타 사이트 수강 인증하기" />
                <area shape="rect" coords="499,925,675,969" href="#tab1" alt="유의사항 확인하기"/>
            </map>	
        </div><!--wb_cts04//-->

        <div class="wb_cts05" id="tab1">
		    <img src="http://file3.willbes.net/new_gosi/2018/12/EV181220_c12.jpg" alt=" 윌비스 9급 PASS 이용안내" />	
        </div><!--wb_cts05//-->
        
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
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */   
	    });
        
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
                    lUrl = "http://www.willbesgosi.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&searchLeccode=Y201800057&leftMenuLType=M0001&lecKType=Y"
                }else{
                    lUrl = "http://www.willbesgosi.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&searchLeccode=Y201800056&leftMenuLType=M0001&lecKType=Y"
                }
                       
                location.href = lUrl;                
            }           
            
            
            function doEvent() {
                if("<c:out value='${userInfo.USER_ID}' />" == ""){
                    alert("로그인을 해주세요.");
                    return;
                }
                
                $.ajax({
                    type: "POST", 
                    url : '<c:url value="/event/reboundEvent_Check.do"/>?EVENT_NO=995',
                    dataType: "text",  
                    async : false,
                    success: function(RES) {
                        if($.trim(RES)=="N"){           
                            alert("이미 인증한 계정입니다.");
                            return;
                          }else if($.trim(RES)=="R" || $.trim(RES)=="RN"){
                             if(confirm("기존 등록된 정보는 삭제되고 다시 등록합니다.\n새로 등록 하시겠습니까?")){
                                  var url = '<c:url value="/event/movie/event.html?event_cd=On_181220_c1_popup"/>' ;
                                  window.open(url,'event', 'top=100,scrollbars=no,toolbar=no,resizable=yes,width=600,height=720');
                             }
                          }else{
                            var url = '<c:url value="/event/movie/event.html?event_cd=On_181220_c1_popup"/>' ;
                            window.open(url,'event', 'top=100,scrollbars=no,toolbar=no,resizable=yes,width=600,height=720');
                          }
                    },error: function(){
                        alert("인증실패");
                          return;
                    }
                });
            }
    </script>

@stop