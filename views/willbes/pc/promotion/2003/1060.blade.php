@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

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
        

        .wb_cts00 {background:#1c1c1c url(https://static.willbes.net/public/images/promotion/2019/04/1060_c1_bg.jpg) no-repeat center top;}	
        .wb_cts00 ul { width:100%;  margin:0 auto;}
            .bannerImg3 {position:relative; width:100%; max-width:1210px; margin:0 auto;   padding:0px 0px 124px 0px; }
            .bannerImg3 p {position:absolute; top:35%; width:30px; z-index:1000;}
            .bannerImg3 img {width:100%}
            .bannerImg3 p a {cursor:pointer}
            .bannerImg3 p.leftBtn3 {left:8%}
            .bannerImg3 p.rightBtn3 {right:8%}	
        .wb_cts00 ul:after {content:""; display:block; clear:both}        
        
        .wb_cts01 {background:#828282  url(https://static.willbes.net/public/images/promotion/2019/04/1060_c3_bg.jpg) center top;}	
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
        
        .wb_cts03 {height:1169px; background:#f3f5f7 url(https://static.willbes.net/public/images/promotion/2019/04/1060_c7_11.jpg) center top no-repeat;}	
        .wb_cts03 ul {height:696px}
        .wb_cts03 li {text-align:center;} 
        .wb_cts03 .btn {padding-left:300px;}
        .wb_cts03 li input {height:30px; width:30px;}
        .wb_cts03 .check01 input {margin:430px 0px 0px 740px;}
        .wb_cts03 .check02 input {margin:95px 0px 0px 740px;}
        .wb_cts03 .check03 input {margin:135px 0px 0px -280px; }
        .wb_cts03 .check04 {width:877px; height:112px; margin:20px auto 0;}
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
    
    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skybanner">
			<div><a href="#event"><img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c11.png" alt="소방체력풀패키지런칭기념 파격할인" ></a></div>
		</div>

        <div class="evtCtnsBox time NGEB" id="newTopDday">
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

        <div class="evtCtnsBox wb_cts00" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c1_1.png" alt="소방 PASS"/><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c2.jpg" alt="소방공무원, 시작부터 달라야 합니다."/>
        </div>
        
        <div class="evtCtnsBox wb_cts01" >
        	<img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c3.jpg" alt="소방공무원, 결심했다면 이제는 윌비스와 시작해야할 때!"/>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c3_1.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c3_2.jpg" alt=""/></li>
                </ul>
                <p class="leftBtn3"><a id="imgBannerLeft3"><img src="http://file.willbes.net/new_image/2016/arrow01_1.png"></a></p>
                <p class="rightBtn3"><a id="imgBannerRight3"><img src="http://file.willbes.net/new_image/2016/arrow01_2.png"></a></p>
            </div>        
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02">
  			<img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c4.jpg" alt="윌비스와 함께 자랑스러운 대한민국의 공무원이 되어주세요!"/>
			<div class="menuWarp">    
            	<div class="PeMenu">
            		<ul>
                		<li> 
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c4_01.jpg" alt="소방학/법규 김종상" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c4_01on.jpg" alt="소방학/법규 김종상" class="on"/>
                        </li>                        
                		<li> 
                        	<img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c4_02.jpg" alt="국어 김세령" class="off"/> 
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c4_02on.jpg" alt="국어 김세령" class="on"/>
                        </li>                        
                		<li> 
                        	<img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c4_03.jpg" alt="영어 이현정" class="off"/> 
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c4_03on.jpg" alt="영어 이현정" class="on"/>
                        </li>
                        <li> 
                        	<img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c4_04.jpg" alt="한국사 배준환" class="off"/> 
                            <img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c4_04on.jpg" alt="한국사 배준환" class="on"/>
                        </li>                        
               		 </ul>
            	</div><!--PeMenu//-->
            </div><!--menuWarp//-->
  			<img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c5_1.jpg" alt="윌비스와 함께 자랑스러운 대한민국의 공무원이 되어주세요!"/><br>
  			<img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c6.jpg" alt="소방공무원의 꿈을 이루어줄 따라만 가도 완성되는 커리큘럼"/>
        </div><!--wb_cts02//-->
          
        <div class="evtCtnsBox wb_cts03" id="event">             
            <ul>
                <li><div class="check01"><input type="radio" id="y_pkg" name="y_pkg" value="149304" onClick=""/></div></li> <!--공채 12개월 43만원-->
                <li><div class="check02"><input type="radio" id="y_pkg" name="y_pkg" value="149305" onClick=""/></div></li> <!--특채 12개월 35만원-->
            </ul>
            <div>
                <a href="{{site_url('/promotion/index/cate/3023/code/1091')}}" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c7_22.jpg" alt="단기간 체력 40점 완성 프로젝트 상세보기" /><!--소방체력 풀패키지 상세보기-->
                </a>
            </div>
            <div>
                <div class="check" id="chkInfo">
                    <label>
                    <input name="is_chk" type="checkbox" value="Y" /> 페이지 하단 윌비스 소방 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.              
                    </label>
                    <a href="#tab1">이용안내확인하기 ↓</a>
                </div>
                <div> ※ 쿠폰은 PASS 결제 후 [내강의실>결제관리>쿠폰/수강권관리] 에서 확인 가능합니다.</div>
                <div class="check04">
                    <a href="#none" onclick="goCartNDirectPay('event', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');"><img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c7_2_1.jpg" alt="장바구니"  /></a> <!--소방패스 신청하기-->
                </div>
            </div>                   
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts05" id="tab1">
			<img src="https://static.willbes.net/public/images/promotion/2019/04/1060_c8.jpg" alt=" 윌비스 소방PASS 이용안내" />	
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

            /*디데이카운트다운*/
            $(document).ready(function() {
                dDayCountDown('{{$arr_promotion_params['edate']}}');
            });
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop