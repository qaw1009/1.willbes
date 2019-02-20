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
        .time{ width:100%; text-align:center; min-width:1210px;   background:#d3d3d3;  padding:0px 0 0 20px:} /*margin-top:20px;*/
        .time_date {max-width:1210px; text-align:center;  margin: 0 auto;}
        .time_date .t_img { width:80%; }		
        .time_txt {font-family: 'NanumGothic', '나눔고딕','NanumGothicWeb', '맑은 고딕', 'Malgun Gothic', Dotum; font-size:22px; color:#171717; letter-spacing: -1px; line-height:-1; font-weight:bold;}
        .time_txt span { color:#b61216:}	
        .time p { text-align:center; padding-top:20px;}        

        .wb_cts00 {width:100%; text-align:center; min-width:1210px; background:#181818 url(http://file3.willbes.net/new_gosi/2019/01/EV190108_c1_bg.jpg) no-repeat center top;}	
        .wb_cts00 p {width:100%; margin:0 auto;}
        .wb_cts00 ul {width:100%; margin:0 auto:}
            .bannerImg3 {position:relative; width:100%; max-width:1210px; margin:0 auto; padding:0px 0px 124px 0px;}
            .bannerImg3 p {position:absolute; top:35%; width:30px; z-index:1000;}
            .bannerImg3 img {width:100%}
            .bannerImg3 p a {cursor:pointer}
            .bannerImg3 p.leftBtn3 {left:8%}
            .bannerImg3 p.rightBtn3 {right:8%}
        .wb_cts00 ul:after {content:""; display:block; clear:both}	      
        
        .wb_cts01 {width:100%; text-align:center;  min-width:1210px; background:#ffbc0d;}		
        
        .wb_cts02 {width:100%; text-align:center;  min-width:1210px; background:#212121;}
        
        .wb_cts03 {width:100%; text-align:center;  min-width:1210px; background:#ffbc0d;}
        
        .wb_cts04 {width:100%; text-align:center;  min-width:1210px; background:#e5dac9:}
        
        .wb_cts05 {width:100%; text-align:center;  min-width:1210px; background:#fff:}

        .check {width:100%; margin:0 auto; margin:0 auto; background:#ffbc0d; padding:15px 0px 120px 20px; letter-spacing:3; font-size:14px; font-weight:bold; color:#362f2d;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px;color:#27262c; background:#e3c0a2; margin-left:50px; border-radius:20px}    
    </style>
    
    @include('html.event_incOnTnb')

    <div class="p_re evtContent NSK" id="evtContainer">
        <!--타이머설정중-->
        <div class="time">
            <div class="time_date">
                <table width="1100px;" height="90px" border="0" cellpadding=0 cellspacing=0>
                    <tr>
                        <td style="text-align:center;"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_c0_1.jpg" alt=""  /></td>                        
                        <td width="150"align="center" class="time_txt">마감까지 <br /><span>남은 시간은</span></td>
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
        </div><!--time//-->

        <div class="wb_cts00" >
        	<p><img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_c1.png" alt="2020 윌비스 김동진법원팀 PASS"/></p>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_c2_1.png" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_c2_2.png" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_c2_3.png" alt=""/></li>
                </ul>
            </div>        
        </div><!--wb_cts00//-->
  
        <div class="wb_cts03">
			<img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_c3_1.jpg" alt="김동진법원팀 지금 PASS 구매 시, 특별 혜택!" />
        </div>
        <!--wb_cts01//-->      
      
        <div class="wb_cts02">
            <ul>
                <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_c4.jpg" alt="윌비스 예비순환과 함께라면 단 1년 만에 합격!" /></li>
                <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_c5.jpg" alt="윌비스 법원직만을 위한 혁신적인 커리큘럼" /></li>
                <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_c6.jpg" alt="업계의 판도를 바꿀, 차원이 다른 김동진법원팀 교수진" usemap="#Map190108_c1" border="0" />
                <map name="Map190108_c1" >
                    <area shape="rect" coords="861,1129,978,1174" href="http://cafe.daum.net/LAW-KDJTEAM" target="_blank"/>
                </map>
                </li>
            </ul>	
        </div>
        <!--wb_cts02//-->   
      
        <div class="wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_c7_1.jpg" alt="2020 윌비스 김동진 법원팀 PASS  " usemap="#Map190108_c2" border="0" />
            <map name="Map190108_c2" >
                <area shape="rect" coords="872,750,1015,836" href="javascript:go_PassLecture(2);" onfocus="this.blur();" />
            </map>
            <div class="check" id="chkInfo">
                <label>
                    <input name="ischk" type="checkbox" value="Y" /> 페이지 하단 김동진 법원팀 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. 
                </label>
                <a href="#tab1">이용안내확인하기 ↓</a>
            </div>
        </div><!--wb_cts03//-->      

        <div class="wb_cts05"  id="tab1">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_c8.jpg" alt=" 2020 윌비스 김동진법원팀PASS" />
        </div><!--wb_cts05//-->
    
    </div>
    <!-- End Container -->

    <script>
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'vertical', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:750,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:1210,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });
        
            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });
        
            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });
    </script>
                    
    <script>       
        /*디데이*/
		var DateDiff = {//타이머를 설정합니다.
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
            // 이벤트 종료일의 한달 전 날짜로 입력한다. 
            event_day = new Date(2019,1,28,23,59,59);
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
                    lUrl = "http://www.willbesgosi.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=018&topMenuName=&topMenuType=O&searchCategoryCode=018&searchLeccode=Y201900005&leftMenuLType=M0001&lecKType="
                }else{
                    lUrl = "http://www.willbesgosi.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=018&topMenuName=&topMenuType=O&searchCategoryCode=018&searchLeccode=Y201900005&leftMenuLType=M0001&lecKType="
                }
                       
                location.href = lUrl;
                
            }
    </script>

@stop