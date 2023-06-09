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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .wb_top {background:#a61f29 url(http://file3.willbes.net/new_cop/2019/02/EV190215_c1_bg.jpg) repeat-y  center top;}        

        .WB_cts01{background:#FFF;}


        /* 탭 */
        .tabContaier{padding-top:20px; padding-bottom:120px;}
        .tabContaier ul {width:100%; max-width:980px; text-align:center; margin:0 auto  }		
        .tabContaier li {display:inline; float:left; margin-bottom:20px; }	
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContents iframe {width:876px; height:480px; border:#000 26px solid;}  
        .tabContaier ul:after {content:''; display:block; clear:both}      

        .wb_02 {background:#252525;}
        .wb_03 {background:#2360bb;}
        .wb_04 {background:#eee;}	

        .wb_05 {background:#fff; padding-bottom:120px; width:1210px; margin:0 auto; text-align:center;}
        .wb_05_c {border:10px solid #dedede; font-size:14px; margin:50px; padding-bottom:50px}
        .wb_05 p {border-top:1px solid #c2c2c2; margin-bottom:20px}
        .wb_05 table {width:980PX; margin:40px auto;}
        .wb_05 td {padding:12px 5px; text-align:center; border-bottom:1px solid #eee;}
        .wb_05 .bookimg {padding:0px;}
        .wb_05 td a {display:block; color:#272727; border:1px solid #272727; padding:8px}
        .wb_05 td a.active,
        .wb_05 td a:hover {background:#272727; color:#fff; text-align:center;}
        .wb_05 th {background-color: #eae9e9; height:38px; line-height:38px; font-size:16px; text-align:center; font-weight:bold; letter-spacing:-3px;}
        .wb_05 .st01 {font-weight:bold; text-align:center;} 	
        .wb_05 .st02 {color:#272727; padding-left:0px;}	
        .wb_05 .st03 {font-weight:bold; color:#F30;}	
        .wb_05 .st04 {text-align:center;}	       
            
        

        .content_guide_wrap{background:#fff; margin:0;min-width:1210px;}
        .content_guide_box{ position:relative; width:980px; margin:0 auto; padding:50px 0;}
        .content_guide_box .guide_tit{margin-bottom:20px;}
        .content_guide_box dl{ margin:0 20px; word-break:keep-all;border:2px solid #202020;padding:30px;}
        .content_guide_box dt{ margin-bottom:10px;}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-size:13px; font-weight:bold; margin-right:10px;}
        .content_guide_box dt img.btn{padding:2px 0 0 0;}
        .content_guide_box dd{ color:#777; font-size:13px; margin:0 0 20px 5px; line-height:17px;}
        .content_guide_box dd strong{ color:#555;}
        .content_guide_box dd p{ margin-bottom:3px;}
        .content_guide_box dd p.guide_txt_01{margin:5px 0 5px 15px;}        

        .wb_06 {background:#dedede; position:relative; padding-bottom:120px;}  
        

        /* 슬라이드배너 */
        .slide_con {position:relative; width:900px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-30px; top:46%; width:67px; height:67px;}
        .slide_con p.rightBtn {right:-40px;top:46%; width:67px; height:67px;}	

        #slidesImg3 li {display:inline; float:left;}	
        #slidesImg3 li img {width:980px;}
        #slidesImg3:after {content::""; display:block; clear:both}

        .skybanner {
            position:absolute; 
            top:400px; 
            right:10px;
            z-index:1;            
        }
        .skybanner_sectionFixed {position:fixed; top:20px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#event02" ><img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c8.png" alt="신청"></a>
        </div>	

		<div class="evtCtnsBox wb_top" id="main">
			<img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c1.jpg"  alt="메인" usemap="#Map190215_c1" border="0" />
            <map name="Map190215_c1">
                <area shape="rect" coords="411,673,818,792" href="#event" />
            </map>
			<img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c2.gif"  alt="진행강좌" />
		</div>        

		<div class="evtCtnsBox WB_cts01">
			<img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c4_0.jpg" alt="" >
		    <div class="tabContaier" >
                <ul class="cf">
                    <li> 
                        <a class="active" href="#tab1">
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c4_1.jpg"  class="off" alt="전자공학"/>
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c4_1on.jpg" class="on"  />
                        </a>
                    </li>
                    <li> 
                        <a  href="#tab2">
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c4_2.jpg"  class="off"  />
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c4_2on.jpg"  class="on"  alt="무선공학"/>
                        </a>
                    </li>
                    <li> 
                        <a  href="#tab3">
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c4_3.jpg"  class="off"  />
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c4_3on.jpg"  class="on"  alt="무선공학"/>
                        </a>
                    </li>
                    <li> 
                        <a  href="#tab4">
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c4_4.jpg"  class="off"  />
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c4_4on.jpg"  class="on"  alt="무선공학"/>
                        </a>
                    </li>
                    <li> 
                        <a  href="#tab5">
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c4_5.jpg"  class="off"  />
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c4_5on.jpg"  class="on"  alt="무선공학"/>
                        </a>
                    </li>
                    <li> 
                        <a  href="#tab6">
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c4_6.jpg"  class="off"  />
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c4_6on.jpg"  class="on"  alt="무선공학"/>
                        </a>
                    </li>
                </ul>
            
                <div class="tabContents" id="tab1" >
                    <iframe src="https://www.youtube.com/embed/-lGRHQZbs1Q?rel=0" frameborder="0" allowfullscreen></iframe>					
                </div>

                <div class=" tabContents" id="tab2"></div>
                <div class=" tabContents" id="tab3"></div>
                <div class=" tabContents" id="tab4"></div>                
                <div class=" tabContents" id="tab5"></div>               
                <div class=" tabContents" id="tab6"></div>                
            </div><!--tabContaier//-->    
	    </div><!--WB_top01//-->


		<div class="evtCtnsBox wb_02">
			<img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c3.jpg"  alt="채용인원3천명" />
		</div>     

       
		<div class="evtCtnsBox wb_06" id="event02">
			<img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c5.jpg"  alt="3법도 공통과목도." />
            <div class="slide_con">
				<ul id="slidesImg6">
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_6.jpg" alt="6" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_7.jpg" alt="7" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_8.jpg" alt="8" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_9.jpg" alt="9" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_10.jpg" alt="10" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_11.jpg" alt="11" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_12.jpg" alt="12" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_13.jpg" alt="13" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_14.jpg" alt="14" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_1.jpg" alt="1" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_2.jpg" alt="2" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_3.jpg" alt="3" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_4.jpg" alt="4" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07_5.jpg" alt="5" /></li>
				</ul>
				<p class="leftBtn"><a id="imgBannerLeft6"><img src="http://file3.willbes.net/new_cop/2017/03/EV170306_p_prev.png" alt="이전" /></a></p>
				<p class="rightBtn"><a id="imgBannerRight6"><img src="http://file3.willbes.net/new_cop/2017/03/EV170306_p_next.png" alt="다음" /></a></p>
			</div>            
		</div>
		
		<div class="wb_05">
			<img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c6.jpg" id="event"  alt="1단계" />
			<div class="wb_05_c">
				<table>
                    <col width="18%" />
                    <col />
                    <col width="17%" />
                    <col width="15%" />
                    <col width="15%" />
                    <thead>
                    <tr>
                        <th colspan="2" >강의명</th>
                        <th style="text-align:center; ">개강일</th>
                        <th>학원 실강</th>
                        <th>동영상</th>
                    </tr>
                    </thead>
                    <tr>
                        <td class="st01">김원욱 형법</td>
                        <td class="st03">적중예상 문제풀이 <span class="st02">2/25(월)~3/1(금),  총 5회 강의</span></td>
                        <td class="st01">2/25(월) 9:00</td>
                        <td class="st04"><a href="#none" class="active">마감</a></td>
                        <td class="st04"><a href="http://willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1003&searchLeccode=D201900069&leftMenuLType=M0002&lecKType=D" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td class="st01">하승민영어</td>
                        <td class="st03">적중예상 문제풀이 <span class="st02">3/2(토)~3/6(수), 총 5회 강의</span></td>
                        <td class="st01">3/2(토) 9:00</td>
                        <td class="st04"><a href="#none" class="active">마감</a></td>
                        <td class="st04"><a href="http://willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1001&searchLeccode=D201900074&leftMenuLType=M0002&lecKType=D" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td class="st01">신광은 형소법</td>
                        <td class="st03">적중예상 문제풀이 <span class="st02">3/7(목)~3/12(화), 총 5회 강의</span></td>
                        <td class="st01">3/7(목) 9:00</td>
                        <td class="st04"><a href="http://willbescop.net/lecture/passLectureDetail.html?topMenu=081&topMenuName=%EC%9D%BC%EB%B0%98%EA%B2%BD%EC%B0%B0&searchTopCategoryCode=&searchCategoryCode=081&searchSubjectCode=1004&searchLeccode=D201900067&leftMenuLType=&lecKType=&USER_ID=changhong79&hSEARCHTYPE=&hSEARCHTEXT=&learningCD=&topMenuType=F&topMenuGnb=OM_009&SEARCHSERIESCODE=" target="_blank">수강신청</a></td>
                        <td class="st04"><a href="http://willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1004&searchLeccode=D201900061&leftMenuLType=M0002&lecKType=D" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td class="st01">오태진 한국사</td>
                        <td class="st03">사이다 모의고사 <span class="st02">3/13(수)~3/18(월), 총 5회 강의</span></td>
                        <td class="st01">3/13(수) 9:00</td>
                        <td class="st04"><a href="http://willbescop.net/lecture/passLectureDetail.html?topMenu=081&topMenuName=%EC%9D%BC%EB%B0%98%EA%B2%BD%EC%B0%B0&searchTopCategoryCode=&searchCategoryCode=081&searchSubjectCode=1002&searchLeccode=D201900068&leftMenuLType=&lecKType=&USER_ID=changhong79&hSEARCHTYPE=&hSEARCHTEXT=&learningCD=&topMenuType=F&topMenuGnb=OM_009&SEARCHSERIESCODE=" target="_blank">수강신청</a></td>
                        <td class="st04"><a href="http://willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1002&searchLeccode=D201900078&leftMenuLType=M0002&lecKType=D" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td class="st01">원유철 한국사</td>
                        <td class="st03">시나지 빈칸채우기 <span class="st02">3/13(수)~3/18(월), 총 5회 강의</span></td>
                        <td class="st01">3/13(수) 9:00</td>
                        <td class="st04"><a href="http://willbescop.net/lecture/passLectureDetail.html?topMenu=081&topMenuName=%EC%9D%BC%EB%B0%98%EA%B2%BD%EC%B0%B0&searchTopCategoryCode=&searchCategoryCode=081&searchSubjectCode=1002&searchLeccode=D201900069&leftMenuLType=&lecKType=&USER_ID=changhong79&hSEARCHTYPE=&hSEARCHTEXT=&learningCD=&topMenuType=F&topMenuGnb=OM_009&SEARCHSERIESCODE=" target="_blank">수강신청</a></td>
                        <td class="st04"><a href="http://willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1002&searchLeccode=D201900076&leftMenuLType=M0002&lecKType=D" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td class="st01">장정훈 경찰학</td>
                        <td class="st03">네친구 경찰학개론 <span class="st02">3/19(수)~3/23(토), 총 5회 강의</span></td>
                        <td class="st01">3/19(화) 9:00</td>
                        <td class="st04"><a href="http://willbescop.net/lecture/passLectureDetail.html?topMenu=081&topMenuName=%EC%9D%BC%EB%B0%98%EA%B2%BD%EC%B0%B0&searchTopCategoryCode=&searchCategoryCode=081&searchSubjectCode=1005&searchLeccode=D201900070&leftMenuLType=&lecKType=&USER_ID=changhong79&hSEARCHTYPE=&hSEARCHTEXT=&learningCD=&topMenuType=F&topMenuGnb=OM_009&SEARCHSERIESCODE=" target="_blank">수강신청</a></td>
                        <td class="st04"><a href="http://willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1005&searchLeccode=D201900066&leftMenuLType=M0002&lecKType=D" target="_blank">수강신청</a></td>
                    </tr>
                </table> 
                <div class=""bookimg>
                    <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c9.jpg" usemap="#Map190227_c1" border="0" />
                    <map name="Map190227_c1" >
                        <area shape="rect" coords="121,340,190,366" href="/book/view.html?RSC_ID=L201902261" alt="김원욱" />
                        <area shape="rect" coords="372,341,439,367" href="/book/view.html?RSC_ID=L201902266" alt="하승민"/>
                        <area shape="rect" coords="634,340,699,366" href="/book/view.html?topMenuType=O&topMenu=MAIN&topMenuName=ÀÏ¹Ý°æÂû&RSC_ID=L201902281" alt="신광은"/>
                        <area shape="rect" coords="124,569,189,595" href="javascript:alert('준비중입니다.');" alt="오태진"/>
                        <area shape="rect" coords="372,568,438,594" href="/book/view.html?topMenuType=O&topMenu=MAIN&topMenuName=ÀÏ¹Ý°æÂû&RSC_ID=L201902282" alt="원유철"/>
                        <area shape="rect" coords="634,568,696,594" href="javascript:alert('준비중입니다.');" alt="장정훈"/>
                    </map>
                    <img src="http://file3.willbes.net/new_cop/2019/02/EV190215_c7.jpg" />
                </div>                										
			</div>
		</div>      
        
    </div>
    <!-- End Container --> 

    <script type="text/javascript">				
		$(document).ready(function() {
					var slidesImg6 = $("#slidesImg6").bxSlider({
								//mode:'fade', option : 'horizontal', 'vertical', 'fade'
								auto:true,
								speed:350,
								pause:4000,
								controls:false,
								slideWidth:900,
								autoHover: true,
								pager:false,
					});
							
					$("#imgBannerLeft6").click(function (){
						slidesImg6.goToPrevSlide();
					});
					$("#imgBannerRight6").click(function (){
						slidesImg6.goToNextSlide();
					});
				});
        
        /**/
        var tab1_url = "https://www.youtube.com/embed/-lGRHQZbs1Q?rel=0";
        var tab2_url = "https://www.youtube.com/embed/bwwWmhepczM?rel=0";
		var tab3_url = "https://www.youtube.com/embed/FHjAITpcihw?rel=0";
		var tab4_url = "https://www.youtube.com/embed/wIQk137qLXM?rel=0";
		var tab5_url = "https://www.youtube.com/embed/Gc_gGI3XfV4?rel=0";
		var tab6_url = "https://www.youtube.com/embed/lZOlVgPUxfs?rel=0";


        $(document).ready(function(){
        $(".tabContents").hide(); 
        $(".tabContents:first").show();
        $(".tabContaier ul li a").click(function(){ 
                var activeTab = $(this).attr("href"); 
                var html_str = "";
                if(activeTab == "#tab1"){
                    html_str = "<iframe src='"+tab1_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#tab2"){
                    html_str = "<iframe src='"+tab2_url+"' allowfullscreen></iframe>";
				}else if(activeTab == "#tab3"){
                    html_str = "<iframe src='"+tab3_url+"' allowfullscreen></iframe>";
				}else if(activeTab == "#tab4"){
                    html_str = "<iframe src='"+tab4_url+"' allowfullscreen></iframe>";
				}else if(activeTab == "#tab5"){
                    html_str = "<iframe src='"+tab5_url+"' allowfullscreen></iframe>";
				}else if(activeTab == "#tab6"){
                    html_str = "<iframe src='"+tab6_url+"' allowfullscreen></iframe>";
                }
                $(".tabContaier ul li a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".tabContents").hide(); 
                $(".tabContents").html(''); 
                $(activeTab).html(html_str);
                $(activeTab).fadeIn(); 
                return false; 
                });
            });
    </script>   
    
    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>      
         $( document ).ready( function() {
            var jbOffset = $( '.skybanner' ).offset();
            $( window ).scroll( function() {
              if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '.skybanner' ).addClass( 'skybanner_sectionFixed' );
              }
              else {
                $( '.skybanner' ).removeClass( 'skybanner_sectionFixed' );
              }
            });
          } );

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);  
	    });       
    </script>    
@stop