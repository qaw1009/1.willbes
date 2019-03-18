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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        /*타이머*/
        .time{background:#e1e1e1;}
        .time_date {max-width:1120px; text-align:center;  margin: 0 auto;}
        .time_date .t_img {width:80%;}		
        .time_txt {font-family: 'NanumGothic', '나눔고딕','NanumGothicWeb', '맑은 고딕', 'Malgun Gothic', Dotum; font-size:22px; color:#171717; letter-spacing: -1px; font-weight:bold;}
        .time_txt span {color:#b61216;}	
        .time p {text-align:center; padding-top:20px}      
        

        .wb_cts00 {background:#1c1c1c url(http://file3.willbes.net/new_gosi/2019/01/EV190115_c1_bg.jpg) no-repeat center top;}	
        .wb_cts00 ul { width:100%;  margin:0 auto;}
            .bannerImg3 {position:relative; width:100%; max-width:1210px; margin:0 auto;   padding:0px 0px 124px 0px; }
            .bannerImg3 p {position:absolute; top:35%; width:30px; z-index:1000;}
            .bannerImg3 img {width:100%}
            .bannerImg3 p a {cursor:pointer}
            .bannerImg3 p.leftBtn3 {left:8%}
            .bannerImg3 p.rightBtn3 {right:8%}	
        .wb_cts00 ul:after {content:""; display:block; clear:both}        
        
        .wb_cts01 {background:#828282  url(http://file3.willbes.net/new_gosi/2019/01/EV190115_c3_bg.jpg) center top;}	
            .bannerImg3 {position:relative; width:920px; margin:0 auto}
            .bannerImg3 p {position:absolute; top:35%; width:30px; z-index:100;}
            .bannerImg3 img {width:100%}
            .bannerImg3 p a {cursor:pointer}
            .bannerImg3 p.leftBtn3 {left:5%}
            .bannerImg3 p.rightBtn3 {right:5%}

        
        .wb_cts02 {background:#fff;}
            .PeMenu {width:927px; margin:0 auto}
            .PeMenu li {display:inline; float:left}
            .PeMenu li img.off {display:block} 	
            .PeMenu li img.on {display:none}
            .PeMenu li:hover img.off {display:none} 	
            .PeMenu li:hover img.on {display:block}
        
        .wb_cts03 {height:1169px; background:#f3f5f7 url(http://file3.willbes.net/new_gosi/2019/01/EV190115_c7_11.jpg) center top no-repeat;}	
        .wb_cts03 ul {height:696px}
        .wb_cts03 li {text-align:center;} 
        .wb_cts03 .btn {padding-left:300px;}
        .wb_cts03 li input {height:30px; width:30px;}
        .wb_cts03 .check01 input {margin:430px 0px 0px 740px;}
        .wb_cts03 .check02 input {margin:95px 0px 0px 740px;}
        .wb_cts03 .check03 input {margin:135px 0px 0px -280px; }
        .wb_cts03 .check04 {width:877px; height:112px; margin:0 auto;}
        .btn { position:}

     
        .wb_cts03 .check {width:980px; margin:0 auto;  padding:100px 0px 30px 20px; letter-spacing:3; font-weight:bold; color:#362f2d; font-size:14px}
        .wb_cts03 .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .wb_cts03 .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fffbfb; background:#252525; margin-left:50px; border-radius:20px}
        
        .wb_cts04 {width:100%; text-align:center;  min-width:1210px; background:#e5dac9 ;}
        
        .wb_cts05 {width:100%; text-align:center;  min-width:1210px; background:#f3f5f7; padding-top:50px}	

        .skybanner {
            position:fixed;
            top:250px;
            right:0;
            width:190px; 
        }
        
    </style>
    
    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
			<div><a href="#event"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c11.png" alt="소방체력풀패키지런칭기념 파격할인" ></a></div>
		</div>

        <!-- 타이머 -->    
        <div class="evtCtnsBox time">
            <div class="time_date" id="newTopDday">			
                <table width="1100px;" height="90px" border="0" cellpadding=0 cellspacing=0>
                    <tr>
                        <td style="text-align:center;"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c0_1.jpg" alt=""  /></td>                        
                        <td width="150" align="center" class="time_txt">마감까지 <br /><span>남은 시간은</span></td>
                        <td width="62" height="101" align="center"><img id="dd1" src="http://file.willbes.net/new_image/0.png" class="t_img" /></td>
                        <td width="62" height="101" align="center"><img id="dd2" src="http://file.willbes.net/new_image/0.png" class="t_img" /></td>
                        <td width="60" height="101" align="center" class="time_txt">day</td>
                        <td width="62" height="101" align="center"><img id="hh1" src="http://file.willbes.net/new_image/0.png" class="t_img"/></td>
                        <td width="62" height="101" align="center"><img id="hh2" src="http://file.willbes.net/new_image/0.png" class="t_img"/></td>
                        <td width="20" height="101" align="center" class="time_txt">:</td>
                        <td width="62" height="101" align="center"><img id="mm1" src="http://file.willbes.net/new_image/0.png" class="t_img"/></td>
                        <td width="62" height="101" align="center"><img id="mm2" src="http://file.willbes.net/new_image/0.png" class="t_img"/></td>
                        <td width="20" height="101" align="center">:</td>
                        <td width="62" height="101" align="center"><img id="ss1" src="http://file.willbes.net/new_image/0.png" class="t_img"/></td>
                        <td width="62" height="101" align="center"><img id="ss2" src="http://file.willbes.net/new_image/0.png" class="t_img"/></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_cts00" >
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c1_1.png" alt="소방 PASS"/><br>
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c2.jpg" alt="소방공무원, 시작부터 달라야 합니다."/>
        </div>
        
        <div class="evtCtnsBox wb_cts01" >
        	<img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c3.jpg" alt="소방공무원, 결심했다면 이제는 윌비스와 시작해야할 때!"/>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c3_1.jpg" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c3_2.jpg" alt=""/></li>
                </ul>
                <p class="leftBtn3"><a id="imgBannerLeft3"><img src="http://file.willbes.net/new_image/2016/arrow01_1.png"></a></p>
                <p class="rightBtn3"><a id="imgBannerRight3"><img src="http://file.willbes.net/new_image/2016/arrow01_2.png"></a></p>
            </div>        
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02">
  			<img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c4.jpg" alt="윌비스와 함께 자랑스러운 대한민국의 공무원이 되어주세요!"/>
			<div class="menuWarp">    
            	<div class="PeMenu">
            		<ul>
                		<li> 
                            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c4_01.jpg" alt="소방학/법규 김종상" class="off"/>
                            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c4_01on.jpg" alt="소방학/법규 김종상" class="on"/>
                        </li>                        
                		<li> 
                        	<img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c4_02.jpg" alt="국어 김세령" class="off"/> 
                            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c4_02on.jpg" alt="국어 김세령" class="on"/>
                        </li>                        
                		<li> 
                        	<img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c4_03.jpg" alt="영어 이현정" class="off"/> 
                            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c4_03on.jpg" alt="영어 이현정" class="on"/>
                        </li>
                        <li> 
                        	<img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c4_04.jpg" alt="한국사 배준환" class="off"/> 
                            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c4_04on.jpg" alt="한국사 배준환" class="on"/>
                        </li>                        
               		 </ul>
            	</div><!--PeMenu//-->
            </div><!--menuWarp//-->
  			<img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c5_1.jpg" alt="윌비스와 함께 자랑스러운 대한민국의 공무원이 되어주세요!"/><br>
  			<img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c6.jpg" alt="소방공무원의 꿈을 이루어줄 따라만 가도 완성되는 커리큘럼"/>
        </div><!--wb_cts02//-->
          
        <div class="evtCtnsBox wb_cts03" id="event">             
            <ul>
                <li><div class="check01"><input type="radio" id="y_pkg" name="y_pkg" value="Y" onClick="fn_cal('1')"/></div></li> <!--공채 12개월 43만원-->
                <li><div class="check02"><input type="radio" id="y_pkg" name="y_pkg" value="Y" onClick="fn_cal('2')"/></div></li> <!--특채 12개월 35만원-->
            </ul>
            <div>
                <a href="/promotion/index/cate/3023/code/1091" target="_blank">
                <img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c7_22.jpg" alt="단기간 체력 40점 완성 프로젝트 상세보기" /><!--소방체력 풀패키지 상세보기-->
                </a>
            </div>
            <div>
                <div class="check" id="chkInfo">
                    <label><input name="is_chk" type="checkbox" value="Y" /> 페이지 하단 윌비스 소방 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="#tab1">이용안내확인하기 ↓</a>
                </div>
                <div class="check04">
                    <a href="javascript:fn_cart();"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c7_2_1.jpg" alt="장바구니"  /></a> <!--소방패스 신청하기-->
                </div>
            </div>                   
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts05" id="tab1">
			<img src="http://file3.willbes.net/new_gosi/2019/01/EV190115_c8.jpg" alt=" 윌비스 소방PASS 이용안내" />	
        </div><!--wb_cts05//-->   

    </div>
    <!-- End Container -->

    <script>
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:920,
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
            }
        
            function daycountDown() {
                // 한달 전 날짜로 셋팅 
                event_day = new Date(2019,1,28,23,59,59);
                now = new Date();
                var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now)); 
                
                var Monthleft = event_day.getMonth() - now.getMonth();
                var Dateleft = DdayDiff.inDays(now, event_day);
                var Hourleft = timeGap.getHours();
                var Minuteleft = timeGap.getMinutes(); 
                var Secondleft = timeGap.getSeconds();
        
                //alert(Monthleft+"-"+Dateleft+"-"+Hourleft+"-"+Minuteleft+"-"+Secondleft)
        
                if((event_day.getTime() - now.getTime()) > 0) {
                    $("#dd1").attr("src", "http://file.willbes.net/new_image/" + parseInt(Dateleft/10) + ".png");
                    $("#dd2").attr("src", "http://file.willbes.net/new_image/" + parseInt(Dateleft%10) + ".png");
        
                    $("#hh1").attr("src", "http://file.willbes.net/new_image/" + parseInt(Hourleft/10) + ".png");
                    $("#hh2").attr("src", "http://file.willbes.net/new_image/" + parseInt(Hourleft%10) + ".png");
        
                    $("#mm1").attr("src", "http://file.willbes.net/new_image/" + parseInt(Minuteleft/10) + ".png");
                    $("#mm2").attr("src", "http://file.willbes.net/new_image/" + parseInt(Minuteleft%10) + ".png");
        
                    $("#ss1").attr("src", "http://file.willbes.net/new_image/" + parseInt(Secondleft/10) + ".png");
                    $("#ss2").attr("src", "http://file.willbes.net/new_image/" + parseInt(Secondleft%10) + ".png");
                    setTimeout(daycountDown, 1000);
                }
                else{
                    $("#newTopDday").hide();
                }
        
            }
            daycountDown();       
  
    </script>

    <script type="text/javascript">
    //천단위 콤마 찍기
    function addThousandSeparatorCommas(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    function fn_cal(chk){
        var i_sum = 0;
        var y_sum = 0;
        var j_sum = 0;
        var curSum = "";

        if($("input[name='y_pkg']:checked").size() > 1){
            alert("패스과정은 하나만 선택해주십시요.");
            for (i=0;i<2;i++){
                y_pkg[i].checked = false;
            }
        }

        if($(y_pkg[0]).is(":checked")){
            y_sum = 430000;
        } else if($(y_pkg[1]).is(":checked")){
            y_sum = 350000;
        }
        
        if($(j_pkg).is(":checked")){
            j_sum = 80000;
        }
        
        i_sum = y_sum + j_sum;
        i_sum = addThousandSeparatorCommas(i_sum);
        var curSum = ""+i_sum+"";

        $("#sum_y").html(curSum);
    }

    //장바구니
    function fn_y_cart(leccode){

        var cmd = "slist";
        var leccode_essarr = "";
        var leccode_selarr = "";
        var money_vod = "";
        
        if (leccode == "Y201800032"){
            leccode_essarr = "D201800715,D201800385,D201800387,D201800636,D201800585,D201800844,D201800749,D201800755,D201800848,D201800990,D201900005";
            money_vod = 430000;
        }else if(leccode == "Y201800033"){
            leccode_essarr = "D201800447,D201800715,D201800301,D201800585,D201800846,D201800844,D201800389,D201800391";
            money_vod = 350000;
        }
        
        var kindType = "Y";
        var movieType = 4;
        var rscId = "";
        var rscType = "";
        var leccodeChk = "";
        var gift_book = "N";
        
            var param = "CMD="+cmd;
            param += "&LECCODE=" + leccode;
            param += "&LECCODE_ESSARR=" + leccode_essarr;
            param += "&LECCODE_SELARR=" + leccode_selarr;
            param += "&KIND_TYPE=" + kindType;
            param += "&MOVIE_TYPE=" + movieType;
            param += "&RSC_ID=" + rscId;
            param += "&RSC_TYPE=" + rscType;
            param += "&LECPRICE=" + money_vod;
            param += "&LECCODE_CHK=" + leccodeChk;
            param += "&GIFT_BOOK=" + gift_book;

            $.ajax({
                type: "GET",
                url : '<c:url value="/lecture/cartSaveMovieSLecture.json"/>?'+ param,
                dataType: "json",
                async : false,
                success: function(res) {
                    if(res.returnMsg=="loginFail"){
                        alert("로그인을 하신 후 이용하여 주시기 바랍니다.");
                    }else if(res.returnMsg=="accessFail"){
                        alert("잘못된 접근입니다");
                    }else if(res.returnMsg=="existCart"){
                        alert("이미 패스 과정이 장바구니에 담겼습니다" + res.returnList);
                    }else if(res.returnMsg=="yearexistCart"){
                        alert("이미 수강중인 패스가 있습니다." + res.returnList);
                        return;
                    }else if(res.returnMsg=="cartSuccess"){
    //					alert("장바구니에 담겼습니다");
                    }
                },error: function(){
                    alert("장바구니 담기 실패!");
                    return;
                }
            });
    }

    //장바구니
    function fn_p_cart(leccode){

            var cmd = "slist";
            var j_leccode = "";
            var leccode_essarr = "D201900067,	D201900066,D201900065,D201900064,D201900063";
            var leccode_selarr = "";
            var money_vod = 80000;
        
            var kindType = "J";
            var movieType = 4;
            var rscId = "";
            var rscType = "";
            var leccodeChk = "";
            var gift_book = "N";			
            
            j_leccode = "P201900002";

                var param = "CMD="+cmd;
                param += "&LECCODE=" + j_leccode;
                param += "&LECCODE_ESSARR=" + leccode_essarr;
                param += "&LECCODE_SELARR=" + leccode_selarr;
                param += "&KIND_TYPE=" + kindType;
                param += "&MOVIE_TYPE=" + movieType;
                param += "&RSC_ID=" + rscId;
                param += "&RSC_TYPE=" + rscType;
                param += "&LECPRICE=" + money_vod;
                param += "&LECCODE_CHK=" + leccodeChk;

                $.ajax({
                    type: "GET",
                    url : '<c:url value="/lecture/cartSaveMovieSLecture.json"/>?'+ param,
                    dataType: "json",
                    async : false,
                    success: function(res) {
                        if(res.returnMsg=="loginFail"){
                            alert("로그인을 하신 후 이용하여 주시기 바랍니다.");
                        }else if(res.returnMsg=="accessFail"){
                            alert("잘못된 접근입니다");
                        }else if(res.returnMsg=="existCart"){
                            alert("이미 체력패키지 과정이 장바구니에 담겼습니다" + res.returnList);
                        }else if(res.returnMsg=="cartSuccess"){
                            //alert("장바구니에 담겼습니다");
                        }
                    },error: function(){
                        alert("장바구니 담기 실패!");
                        return;
                    }
                });
    }

    function fn_cart(){
        <c:if test="${empty userInfo}">
            alert("로그인을 하신 후 이용하여 주시기 바랍니다.");
            return;
        </c:if>
        
        if(!$(is_chk).is(":checked")){
            alert("이용안내를 확인하시고 이용동의서에 체크해주시기 바랍니다.");
            return;
        }

        if($("input[name='y_pkg']:checked").size() < 1){
            alert("소방PASS는 필수로 선택하셔야 됩니다.");
            return;
        }

        var leccode = "";
        var chk = "";
        
        if(confirm('선택한 항목을 장바구니에 담으시겠습니까?')){
            if($(y_pkg[0]).is(":checked")){
                leccode = "Y201800032";
                chk = "1";
            } else if($(y_pkg[1]).is(":checked")){
                leccode = "Y201800033";
                chk = "2";
            }
            
            fn_y_cart(leccode);
            
            if($(j_pkg).is(":checked")){
                fn_p_cart(leccode);
            }
            alert("장바구니에 담겼습니다");
            location.replace("/cart/movie.html?topMenuType=O&topMenuGnb=OM_009&topMenu=MAIN&menuID=OM_009_005_002");
        }
    }
    </script>

@stop