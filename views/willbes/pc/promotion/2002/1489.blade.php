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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        
        .skybanner {position:fixed;top:200px;right:10px;z-index:10;}           
        .skybanner a {margin-bottom:10px; display:block}    

        /*타이머*/
        .time {width:100%; text-align:center; background:#ebebeb}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:30px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#ffda39; font-size:30px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time table td:last-child,
        .time table td:last-child span {font-size:36px}
        @@keyframes upDown{
        from{color:#000}
        50%{color:#a78de6}
        to{color:#000}
        }
        @@-webkit-keyframes upDown{
        from{color:#000}
        50%{color:#a78de6}
        to{color:#000}
        }

        .wb_top {background:#283754 url(https://static.willbes.net/public/images/promotion/2020/06/1489_top_bg.jpg) no-repeat center; height:1604px;}
        .wb_top span {position:absolute; left:50%; z-index:1;
            -webkit-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -moz-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -ms-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -o-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
        }
        .wb_top span.img1 {top:360px; margin-left:-270px; width:527px; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        .wb_top span.img2 {top:410px; margin-left:-266px; width:562px; animation:iptimg2 0.5s ease-in;-webkit-animation:iptimg2 0.5s ease-in;}
        @@keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-858px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-858px; opacity: 1;}
        }
        
        @@keyframes iptimg2{
        from{margin-left:532px; opacity: 0;}
        to{margin-left:0; opacity: 1;}
        }
        @@-webkit-keyframes iptimg2{
        from{margin-left:532px; opacity: 0;}
        to{margin-left:0; opacity: 1;}
        }
        .wb_01 {background:#fff;}
        .wb_02 {background:#f1f1f1}
        .wb_03 {background:#4d79f6; position:relative; height:825px;} 
        .wb_03 .benefitBox {position:absolute; top:500px; left:0; width:100%; z-index:1}
        .wb_03 .benefitBox .bx-wrapper{max-width:100% !important;}
        .wb_03 .benefitBox li {display:inline; float:left; height: 320px;}
        .wb_03 .benefitBox li img {
            width: 229px;
            height: 269px;
            -webkit-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            -moz-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
        }

        .wb_04 {background:#fff}

        /*
        .wb_04 {
            background:url(https://static.willbes.net/public/images/promotion/2019/12/1489_04_bg.jpg) no-repeat center top; position:relative;
            height:843px;
            clear: both;
        }
        .wb_04 .wb_04Top {position:absolute; top:0; left:0; width:100%; z-index:10; text-align:left}
        .wb_04 .buyBook {position:absolute; top:220px; left:50%; width:400px; margin-left:-200px; z-index:1}
        .wb_04 .buyBook a {display: block; padding:15px; font-size:20px; color:#1b1f25; text-align: center; background: #76dccf; border-radius: 40px;}
        .wb_04 .buyBook a:hover {color:#fff; background:#bb332d}
        .wb_04 .box-book {position:absolute; top:320px; left:0; width:100%; z-index:1}
        .wb_04 .box-book .bx-wrapper{max-width:100% !important;}
        .wb_04 .box-book li {display:inline; float:left; height: 250px;}
        .wb_04 .box-book li img {
            width: 200px;
            height: 286px;
            -webkit-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            -moz-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
        }
        */

        .wb_05 {background:#23385e} 

        /*유의사항*/
		.wb_ctsInfo {background:#fff; padding:100px 0}  
        .wb_ctsInfo div {width:1120px; margin:0 auto; color:#fff;display:block; border:17px solid #555; padding:80px; line-height:1.5; font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif" !important; }
        .wb_ctsInfo div h3 {font-size:36px !important; letter-spacing:-1px; margin-bottom:40px; color:#000;}        
        .wb_ctsInfo ul li .big {font-size:19px; font-weight:bold;color:#000;}        
		.txt_point {color:#000; font-size:13px;}

    </style>

    <div class="evtContent NGR" id="evtContainer">
        <div class="skybanner"> 
            <a href="#golec"><img src="https://static.willbes.net/public/images/promotion/2020/06/1489_sky01.png"  alt=""  /></a>
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1053" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/03/1489_sky02.png"  alt=""  /></a>
        </div>

        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>끝장 PASS</span><br>사전접수 이벤트</td>
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
                    <td><span>남았습니다!</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_top">
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2020/03/1489_top_img01.png" alt=" "></span>
            <span class="img2"><img src="https://static.willbes.net/public/images/promotion/2020/03/1489_top_img02.png" alt=" "></span>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1489_01.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1489_02.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_03" id="golec">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1489_03.jpg"  alt=""  />
            <div class="benefitBox">
                <ul class="slidesbenefit">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit01.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit02.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit03.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit04.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit06.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit07.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit08.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit09.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit01.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit02.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit03.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit04.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit06.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit07.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit08.jpg" alt=""/></li> 
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1489_03_benefit09.jpg" alt=""/></li> 
                </ul>
            </div> 
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1489_04.jpg"  alt=""  />
        </div>       

        <div class="evtCtnsBox wb_05 c_both">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1489_05.jpg"  alt="" usemap="#Map1489a" border="0"  />
            <map name="Map1489a" id="Map1489a">
                <area shape="rect" coords="296,1231,825,1354" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" />>
            </map>
        </div>

        <div class="wb_ctsInfo">
            <div>
                <h3 class="NGEB">12개월 끝장 PASS 유의사항</h3><br/>
                <ul>
				    <li>
                        <span class="big">끝장패스 경찰전문 교수진</span><br> 
						<span class="txt_point">형사소송법/수사 신광은 교수님, 경찰학개론/행정 장정훈 교수님, 형법 김원욱 교수님, 영어 하승민 교수님, 한국사(택1) 원유철 교수님,오태진 교수님</span>
					</li><br/> <br/> 
                    <li>                    
                        <span class="big">10종 합격팩</span><br/>
                                         
                        <span class="txt_point"> 1) 21년 1차 불합격 시 21년 2차까지 , 21년 2차 불합격 시 22년 1차까지 학원강의 수강기간 연장<br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;(매 시험 응시이력 소명 필수/수강기간 연장 시 헌법,형사법 선택수강 가능)  
                        </span><br/>                            
                        <span class="txt_point"> 2) 인강패스 무료 제공 (수강기간동안/연장시 복습동영상 제공)</span><br/>                                   
                        <span class="txt_point"> 3) 학원 모의고사 무료 응시 (★무료혜택★ 연장시 21년 2차까지)</span><br/> 			  
                        <span class="txt_point"> 4) 신광은 경찰팀 특강 무료 (★무료혜택★ 아침특강 제외/연장시 21년 2차까지)</span><br/>                                      
                        <span class="txt_point"> 5) 영어아침특강 특별할인</span><br/>                                 
                        <span class="txt_point"> 6) 튜터링 관리반 2개월 50% 할인 (수강기간동안)</span><br/>                                    
                        <span class="txt_point"> 7) 개인 사물함 제공 (연장시 22년 1차까지)</span><br/> 			                    
                        <span class="txt_point"> 8) 경찰 전용 자습실 제공 (연장시 22년 1차까지)</span><br/> 			                   
                        <span class="txt_point"> 9) 체력학원 40% 할인 (첫 등록시 할인)</span><br/>  			                   
                        <span class="txt_point"> 10) 20년 2차, 21년 1차 필기시험 합격 시 면접반 30% 할인</span><br/>  	
                    </li><br/> <br/> 
    				<li>                 
                        <span class="big">유의사항</span><br/>                       
                        <span class="txt_point"> - 2021년 1차 시험 불합격 인증 시 21년 2차까지, 2021년 2차 시험 불합격 인증 시 22년 1차까지 학원강의 수강기간이 연장됩니다.<br/>&nbsp;&nbsp;(합격자 발표 후 1주일 이내 연장신청 필수) </span><br/>                    
                        <span class="txt_point"> - 불합격 성적표 인증 시 모든 과목이 0점이거나 개인사정으로 불응시한 경우 수강기간 연장이 불가합니다. </span><br/>   					                 
                        <span class="txt_point"> - 등록생 전원에게 인강패스가 지급되며, 정규 수강기간 종료 후에는 사유서 지참하여 데스크에서 신청 시 일별 보강동영상을 제공합니다.</span><br/>   					                   
                        <span class="txt_point"> - 중도 환불 시 수강기간만큼 차감 후, 무료혜택만큼 제하고 환불되며, 정규 수강기간 종료 후에는 환불이 불가합니다.</span><br/>   				                    
                        <span class="txt_point"> - 영어집중관리반, 영어아침특강은 별도결제 상품입니다.</span><br/>   				                    
                        <span class="txt_point"> - 특강의 경우 별도의 신청이 필요합니다.</span><br/>   				                    
                        <span class="txt_point"> - 상기 혜택 및 수강료는 예고 없이 변경될 수 있습니다.</span><br/>   				                   
                        <span class="txt_point"> - 2021년까지 수강기간 연장 시 21년 시험대비반(영어,한국사,형법,형소법,경찰학), 2022년 시험대비반(형사법, 헌법,경찰학) 선택수강 가능합니다.</span><br/>   				                    
                        <span class="txt_point"> - 2020년 2차 또는 21년 1차 시험 최종합격 시 결제금액에서 제세공과금 22% 제외 후,무료혜택을 제한 금액이 환급됩니다.</span>  
                    </li>    				
                </ul>
            </div>
        </div>
             
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
        });

        $(document).ready(function() {
            var BxBook = $('.slidesBook').bxSlider({
                slideWidth: 200,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });

        $(document).ready(function() {
            var BxBook = $('.slidesbenefit').bxSlider({
                slideWidth: 229,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });
    </script>

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop