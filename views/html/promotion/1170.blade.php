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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .wbCommon {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/  

        .wb_00 {background:#272324 url(http://file3.willbes.net/new_cop/2018/09/EV180907_p0_bg.jpg) no-repeat center;}        
        .wb_01 {background:#272324 url(http://file3.willbes.net/new_cop/2018/09/EV180914_p0_bg.jpg) no-repeat center;}	
        .wb_02 {background:#dedede;}
        .wb_03 {background:#fff; padding:80px 0px;}
        .wb_03 li{padding-bottom:30px;}
        .wb_04 {background:#272324 url(http://file3.willbes.net/new_cop/2018/09/EV180907_p4_bg.jpg) no-repeat center;}      
        .wb_06 {background:#f3efec;}

        
        /* 슬라이드배너 */
        .slide_con1 {position:relative; width:980px; margin:0 auto}	
        .slide_con1 p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con1 p a {cursor:pointer}
        .slide_con1 p.leftBtn1 {left:-24px}
        .slide_con1 p.rightBtn1 {right:-24px}	
            #slidesImg1 li {display:inline; float:left}	
            #slidesImg1 li img {width:100%}
            #slidesImg1:after {content::""; display:block; clear:both}


        /* 탭 */
        .tabContaier {width:100%; text-align:center;background:#ffffff; min-width:980px}
        .tabContaier ul {min-width:1210px; text-align:center; margin:0 auto  }		
        .tabContaier li {display:inline; float:left; text-align:center;}	
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContents {background:#fff; width:100%; text-align:center;margin:0 auto;padding:80px 0 100px 0; float:left;}
        	
    </style>


    <div class="evtContent" id="evtContainer">

        <div class="wbCommon wb_00">
            <img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p0_.png"  alt="메인"  />
        </div>
		
		<div class="wbCommon wb_01">
			<img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p1.png"  alt="메인" />
		</div>

   		<div class="wbCommon wb_02">
			<ul>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p2.png"  alt="동영상" usemap="#Map180920" border="0" />
                  <map name="Map180920" >
                    <area shape="rect" coords="626,515,925,572" href="{{ site_url('/pass/support/notice/show?board_idx=154605&s_keyword=2018%EB%85%84+2%EC%B0%A8+%EC%B1%84%EC%9A%A9') }}"  target="_blank" alt="형사소송법 적중자료 바로가기"/>
                  </map>
				</li>
				<li style="padding-bottom:20px;">	
				<iframe width="854" height="480" src="https://www.youtube.com/embed/-Q676VZ03FM?rel=0" frameborder="0" allowfullscreen></iframe>
				</li>
				<li style="padding-bottom:20px;">
					<video width="854" height="480" src="http://sample.hd.willbes.gscdn.com/police/homepage_image/180910_2018y2nd_exam_gongtong200point.mp4" frameborder="0" autoplay controls loop></video></li>
				<li style="padding-bottom:20px;">	
				<video width="854" height="480" src="http://sample.hd.willbes.gscdn.com/police/homepage_image/180910_2018y2nd_exam_gyeonghaeng300point(woman).mp4" frameborder="0" controls loop></video>
				</li>
				<li style="padding-bottom:100px;">	
				<video width="854" height="480" src="http://sample.hd.willbes.gscdn.com/police/homepage_image/180910_2018y2nd_exam_gyeonghaeng495point(woman).mp4" frameborder="0" controls loop></video>
				</li>
                
			</ul>
		</div>

   		<div class="wbCommon wb_03">
			<ul>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam01.jpg" alt="1" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam08.jpg" alt="8" /></li>	
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam02.jpg" alt="2" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam04.jpg" alt="4" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam05.jpg" alt="5" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam06.jpg" alt="6" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam07.jpg" alt="7" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam12.jpg" alt="12" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam13.jpg" alt="13" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam14.jpg" alt="14" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam15.jpg" alt="15" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam16.jpg" alt="16" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam17.jpg" alt="17" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam18.jpg" alt="18" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam19.jpg" alt="19" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam20.jpg" alt="20" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam21.jpg" alt="21" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam22.jpg" alt="22" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam23.jpg" alt="23" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam24.jpg" alt="24" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam25.jpg" alt="25" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam26.jpg" alt="26" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam27.jpg" alt="27" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam29.jpg" alt="29" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam10.jpg" alt="10" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam28.jpg" alt="28" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam03.jpg" alt="3" /></li>
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam11.jpg" alt="11" /></li>	
				<li><img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p3_slam30.jpg" alt="30" /></li>
		</div>
   
		<div class="wbCommon wb_06">
			<img src="http://file3.willbes.net/new_cop/2018/09/20180917-so01-out.jpg"  alt="이벤트" />
		</div>

        
        <div class="wbCommon wb_04">
			<img src="http://file3.willbes.net/new_cop/2018/09/EV180907_p4.png"  alt="메인" />
		</div>
        
    </div>
    <!-- End Container -->   
    
@stop