@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .skybanner {position:absolute; top:-150px;right:10px; z-index:1;}
        .skybanner a {display:block; margin-bottom:10px}

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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/1060_top_bg.jpg) no-repeat center top;}	
     
        .evt01 {padding-top:100px}
        .evt01 .tImg img {margin:0 5px 10px}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/09/1060_02_bg.jpg) center top; padding-bottom:100px}	
            .bannerImg3 {position:relative; width:920px; margin:0 auto}
            .bannerImg3 p {position:absolute; top:50%; margin-top:-34px; width:30px; z-index:100;}
            .bannerImg3 img {width:100%}
            .bannerImg3 p a {cursor:pointer}
            .bannerImg3 p.leftBtn3 {left:20px}
            .bannerImg3 p.rightBtn3 {right:20px}
        
        .evt03 {background:#fff;}
            .PeMenu {width:1061px; margin:0 auto}
            .PeMenu li {display:inline; float:left; margin-right:13px;}         
            .PeMenu li img.off {display:block} 	
            .PeMenu li img.on {display:none}
            .PeMenu li:hover img.off {display:none} 	
            .PeMenu li:hover img.on {display:block}
            .PeMenu li:last-child {margin:0}
            .PeMenu:after  {content:""; display:block; clear:both}

            .tabMenu {width:800px; margin:0 auto 30px}
            .tabMenu li {display:inline; float:left; width:50%}
            .tabMenu li a {display:block; padding:15px 0; text-align:center; border-radius:10px; background:#e1e1e1; color:#9d9d9d; font-size:22px; line-height:1.5}
            .tabMenu li span {display:block; font-size:14px}
            .tabMenu li a:hover,
            .tabMenu li a.active {background:#358c78; color:#fff}
            .tabMenu:after {content:""; display:block; clear:both}
        .evt03 iframe {width:800px; height:450px; margin:0 auto;} 
        
        .evt04 {background:#f3f5f7;position:relative; padding-bottom:100px}	
        .evt04 ul {position:absolute; left:50%;top:475px;}
        .evt04 li:nth-child(1) {margin-left:400px;margin-top:-70px;}
        .evt04 li:nth-child(2) {margin-left:400px;margin-top:100px;}
        .evt04 li input {height:30px; width:30px;}
        .evt04 li label {display:none}
        .evt04 .btn {padding-left:300px;}       

        .evt04 .check04 {width:877px; height:112px; margin:20px auto 0;}     
        .evt04 .check {width:980px; margin:0 auto;  padding:50px 0px 30px 20px; letter-spacing:3; font-weight:bold; color:#362f2d; font-size:14px}
        .evt04 .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .evt04 .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fffbfb; background:#252525; margin-left:50px; border-radius:20px}        
      
        .evt05 {width:100%; text-align:center; background:#f3f5f7; padding-top:50px}	


        /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
        padding:5px 20px; font-weight:bold; font-size:17px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}  
        
    </style>
    
    <div class="p_re evtContent NSK" id="evtContainer">
        {{--
        <div class="skybanner">
            <a href="https://pass.willbes.net/pass/promotion/index/cate/3050/code/1410#to_go" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/10/1410_sky.png" alt="소방영어"></a>
            <a href="#event"><img src="https://static.willbes.net/public/images/promotion/2020/09/1060_c11.png" alt="소방체력풀패키지" ></a>
        </div>   
        --}}

        <div class="evtCtnsBox time NSK-Black" id="newTopDday">
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

        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1060_top.jpg" alt="소방 PASS"/><br>            
        </div>

        <div class="evtCtnsBox evt01" >    
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1060_01_01.jpg" alt="소방공무원, 시작부터 달라야 합니다."/>
            <div class="tImg">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1060_01_t01.gif" alt="소방학/법규 이종오" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1060_01_t02.gif" alt="국어 김세령" /><br>
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1060_01_t03.gif" alt="영어 이아림" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1060_01_t04.gif" alt="영어 양익" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1060_01_t05.gif" alt="한국사 한경준" />
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1060_01_02.jpg" alt="소방공무원, 시작부터 달라야 합니다."/>
        </div>
        
        <div class="evtCtnsBox evt02" >
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/1060_02.jpg" alt="소방공무원, 결심했다면 이제는 윌비스와 시작해야할 때!"/>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1060_02_01.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1060_02_02.jpg" alt=""/></li>
                </ul>
                <p class="leftBtn3"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/09/1060_arrow_1.png"></a></p>
                <p class="rightBtn3"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/09/1060_arrow_2.png"></a></p>
            </div>        
        </div>
        <!--evt02//-->

        <div class="evtCtnsBox evt03">
  			<img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_01.jpg" alt="윌비스와 함께 자랑스러운 대한민국의 공무원이 되어주세요!"/>
			<div class="menuWarp">    
            	<div class="PeMenu">
            		<ul>
                        <li> 
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_t01.jpg" alt="소방학/법규 이종오" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_t01_on.jpg" alt="소방학/법규 이종오" class="on"/>
                        </li>
                		<li> 
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_t02.jpg" alt="소방학/법규 김종상" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_t02_on.jpg" alt="소방학/법규 김종상" class="on"/>
                        </li>                        
                		<li> 
                        	<img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_t03.jpg" alt="국어 김세령" class="off"/> 
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_t03_on.jpg" alt="국어 김세령" class="on"/>
                        </li>                        
                		<li> 
                        	<img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_t04.jpg" alt="영어 이현정" class="off"/> 
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_t04_on.jpg" alt="영어 이현정" class="on"/>
                        </li>
                        <li> 
                        	<img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_t05.jpg" alt="영어 양익" class="off"/> 
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_t05_on.jpg" alt="영어 양익" class="on"/>
                        </li>
                        <li> 
                        	<img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_t06.jpg" alt="한국사 한경준" class="off"/> 
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_t06_on.jpg" alt="한국사 한경준" class="on"/>
                        </li>                        
               		 </ul>
            	</div><!--PeMenu//-->
            </div><!--menuWarp//-->

            <img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_02.jpg" title="" />

            <ul class="tabMenu NSK-Black">
                <li>
                    <a href="#tab1" class="active">
                        <span class="NSK">소방 합격 전문가</span>
                        이종오 교수님을 소개합니다.
                    </a>
                </li>
                <li>
                    <a href="#tab2">
                        <span class="NSK">불꽃 같은 합격 커리큘럼</span>
                        이종오 소방직 공개설명회
                    </a>
                </li>
            </ul>  
            <div id="tab1" class="tabcts">
                <iframe src="https://www.youtube.com/embed/xBWCniTv_Ro?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>      
            </div>
            <div id="tab2" class="tabcts">
                <iframe src="https://www.youtube.com/embed/b06AI4w38gY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>      
            </div>

  			<img src="https://static.willbes.net/public/images/promotion/2020/09/1060_04_03.jpg" alt="소방공무원의 꿈을 이루어줄 따라만 가도 완성되는 커리큘럼"/>
        </div><!--evt03//-->
          
        <div class="evtCtnsBox evt04" id="event">       
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1060_05.jpg" usemap="#Map1060_07" title="수강신청" border="0" />
            <map name="Map1060_07" id="Map1060_07">
                <area shape="rect" coords="836,386,950,447" href="javascript:go_PassLecture('167765');">
                <area shape="rect" coords="840,516,951,577" href="javascript:go_PassLecture('167766');">
            </map> 
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>    
        </div><!--evt04//-->

        <div class="evtCtnsBox wb_info" id="careful">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 소방 PASS 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 수강신청 시 선택 직렬에 따라 소방직 공채, 구조/구급&관련학과 특채를 대비할 수 있는 상품입니다.</li>
                            <li>수강 가능 과목 :<br>
                            [공채] 국어, 영어, 한국사, 소방학개론, 소방관계법규<br>
                            [특채] 구조/구급 – 국어,  생활영어,  소방학 ㅣ 관련학과 – 국어,  소방학,  소방관계법규</li>
                            <li>본 PASS 이용 시 수강기간 내에 시행되는 소방직 대비 온라인 모의고사 응시권이 제공됩니다.</li>
                            <li>본 PASS는 윌비스공무원학원 소방단독반 전문 교수진의 과정을 제공하는 상품입니다.<br>
                            - 국어 김세령, 영어 [공채] 이아림 [특채] 양익, 한국사 한경준, 소방학개론/소방관계법규 이종오/김종상</li>
                            <li>부득이하게 윌비스공무원학원 소방단독반 전담 교수진 변경 시에는 일부 커리큘럼이 제공되지 않을 수 있으며, 이에 따른 대체 과정을 제공해드립니다.</li>
                        </ol>
                    </dd>

                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>소방PASS 공채/특채 상품은 결제일로부터 수강신청 상세 안내 페이지에 표기된 기간만큼 제공됩니다.</li> 
                            <li>본 상품은 일시정지/재수강/연장이 불가능한 상품입니다.</li>   
                        </ol>
                    </dd>

                    <dt>수강관련</dt>
                    <dd>
                        <ol>
                            <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                            <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                            <li>PASS 이용 중에는 일시중지가 불가능합니다.</li>
                            <li>수강 가능 기기 대수는 PC 2대 또는 모바일 2대 또는 PC 1대 + 모바일 1대입니다.</li>                           
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 교재를 별도로 구매하셔야 합니다.</li>
                            <li>각 강좌별 교재는 무한PASS존 내 교재구매 버튼 및 [교재구매] 메뉴를 통해 구매 가능합니다.</li>  
                        </ol>
                    </dd>

                    <dt>환불정책</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                            <li>본 상품은 맛보기 강좌를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                            <li>모바일 다운로드 이용 시 수강한 것으로 간주됩니다.</li>
                            <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                                · 결제금액 - (강좌 정상가의 1일 이용대금×이용일수)
                            </li>   
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인상품으로 쿠폰/적립금 사용이 불가합니다.</li>
                            <li>제공되는 교수님의 강의가 학원 사정에 의해 진행되지 않는 경우, 대체 강의로 제공되며 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가능하며, 추가적인 불법 공유 행위 적발 시 형사 고발 조치가 단행될 수 있습니다.</li>  
                        </ol>
                    </dd>  

                    <dt>라이브모드 수강관련</dt>
                    <dd>
                        <ol>
                            <li>공무원학원 실강 내 LIVE로 진행되는 강좌만 제공됩니다. (* 일부 특강 제외)<br>
                            - 국어 김세령, 영어 [공채] 이아림, 영어 [특채] 양익, 한국사 한경준, 소방학/법규 이종오</li>
                            <li>제공되는 강좌 및 진행일정은 우측 버튼 클릭 후 페이지 하단에서 확인 가능합니다.
                            <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902" target="_blank">자세히보기 ></a></li>
                            <li>본 상품은 실시간 진행되므로 일시정지/연장/재수강은 제공되지 않습니다. 촬영 및 편집된 강의는 익일 오후 2시 이전까지 업로드됩니다.</li>
                            <li>해당 혜택은 PASS 수강기간 내에만 이용 가능합니다. (* 이전 구매자 소급 적용) </li>
                        </ol>
                    </dd>                
                </dl>
                <div class="inquire">※ 이용 문의 : 윌비스 고객만족센터 1544-5006</div>
            </div>
        </div>

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


        /* 수강신청 */
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3023/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        var tab1_url = "https://www.youtube.com/embed/xBWCniTv_Ro?rel=0";
		var tab2_url = "https://www.youtube.com/embed/b06AI4w38gY?rel=0";

		$(document).ready(function(){
		$(".tabcts").hide(); 
		$(".tabcts:first").show();
		$(".tabMenu li a").click(function(){ 
			var activeTab = $(this).attr("href"); 
			var html_str = "";
			if(activeTab == "#tab1"){
				html_str = "<iframe src='"+tab1_url+"' allowfullscreen></iframe>";
			}else if(activeTab == "#tab2"){
				html_str = "<iframe src='"+tab2_url+"' allowfullscreen></iframe>";					
			}
			$(".tabMenu li a").removeClass("active"); 
			$(this).addClass("active"); 
			$(".tabcts").hide(); 
			$(".tabcts").html(''); 
			$(activeTab).html(html_str);
			$(activeTab).fadeIn(); 
			return false; 
			});
		});


        var quick_top = $(".skybanner").offset().top;
        $(window).scroll(function(){
            if ( $(window).scrollTop() > quick_top - 100 ){
                $(".skybanner").stop().animate({top: $(window).scrollTop() - 150}, 500);
            }else {
                $(".skybanner").stop().animate({top: quick_top}, 500);
            }
            if($(window).scrollTop() + $(window).height() == $(document).height()) {
                $(".skybanner").stop().animate({top: $(document).height()-1200}, 500);
            }
        });

        
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop