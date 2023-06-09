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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .wb_top {width:100%; text-align:center; background:#3c3e3f url(http://file3.willbes.net/new_cop/2018/07/180713_EV01_bg_1.jpg) no-repeat center; margin-top:20px; min-width:1210px}
        .wb_top div {width:1210px; margin:0 auto; position:relative}
        .wb_top span {position:absolute; display:block; top:610px; left:374px; width:130px; z-index:10; color:#fff6c8; font-size:40px; font-weight:bold; font-family:Verdana, Geneva, sans-serif; letter-spacing:-1px}

        .wb_01 {width:100%; text-align:center; background:#dedede; min-width:1210px; position:relative; padding-bottom:120px; }
        /* 슬라이드배너 */
        .slide_con5 {position:relative; width:900px; margin:0 auto}
        .slide_con5 p {position:absolute; top:50%; width:67px; height:67px; margin-top:-33px; z-index:100}
        .slide_con5 p a {cursor:pointer}
        .slide_con5 p.leftBtn {left:-100px}
        .slide_con5 p.rightBtn {right:-100px}
        #slidesImg5 li {display:inline; float:left}
        #slidesImg5:after {content:""; display:block; clear:both}

        /* 탭 */
        .evttabWrap{width:100%; text-align:center;}
        .evttabWrap ul {width:100%; max-width:980px; text-align:center; margin:0 auto  }
        .evttabWrap li {display:inline; text-align:center; float:left; }
        .evttabWrap a img.off {display:block}
        .evttabWrap a img.on {display:none}
        .evttabWrap a.active img.off {display:none}
        .evttabWrap a.active img.on {display:block}

        .Pstyle {opacity:0; display:none; position:absolute; background-color:#fff;z-index:9;top:0;}


        .wb_02 {width:100%; text-align:center; background:#444645; min-width:1210px; padding:30px 0}
        /* 슬라이드배너 */
        .slide_con {position:relative; width:900px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:67px; height:67px; margin-top:-33px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-100px}
        .slide_con p.rightBtn {right:-100px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3:after {content:""; display:block; clear:both}


        .wb_03 {width:100%; text-align:center; background:#dedede; min-width:1210px; padding:150px 0}
        .wb_03 .evTabs {width:864px; margin:30px auto 0; text-align: center;}
        .wb_03 .evTabs li {display:inline; float:left; text-align: center; margin-right:10px}
        .wb_03 .evTabs li:last-child {margin:0}
        .wb_03 .evTabs img.off {display:block}
        .wb_03 .evTabs img.on {display:none}
        .wb_03 .evTabs a {background:none}
        .wb_03 .evTabs a.active img.off {display:none}
        .wb_03 .evTabs a.active img.on {display:block}
        .wb_03 .evTabs:after {content:""; display:block; clear:both}

        .wb_03 .tabCts {clear:both; width:854px; margin:10px auto 0; position:relative !important}
        .wb_03 .tabCts a {position:absolute; right:20px; top:40px; z-index:10}


        .wb_04 {width:100%; text-align:center; background:#fff; min-width:1210px; padding:150px 0}
        .slide_con2 {width:854px; margin:100px auto 0; position:relative !important}
        .slide_con2 .bx-pager{position:absolute;top:12px;right:10px; z-index:1000}
        .slide_con2 .bx-pager .bx-pager-item{display:inline-block;margin:0 2px}
        .slide_con2 .bx-pager .bx-pager-item a{display:inline-block;width:10px;height:10px; border-radius:5px; font-size:0; background:#ccc; vertical-align:middle}
        .slide_con2 .bx-pager .bx-pager-item a.active {background:#3e5ac8}

        .Pstyle {opacity:0; display:none; position:relative; background-color:#fff}
        .Pstyle .fpcontent {height:auto; width:auto; border:1px solid #000}
        .Pstyle .b-close {position:absolute; right:10px; top:10px; display:inline-block; cursor:pointer; font-size:12px !important}

        .wb_05 {width:100%; text-align:center; font-size:120%; background:#f5f5f5; padding-bottom:120px; min-width:1210px}
        .wb_05 .wb_05_c {width:880px; margin:0 auto; border:1px solid #d6d6d6; background:#fff; padding:48px 58px; text-align:left; margin-bottom:80px}
        .wb_05 .wb_05_c span {display:inline-block; font-size:140%; font-weight:500; background:#2360bb; color:#fff; height:36px; line-height:36px; padding:0 20px}
        .wb_05 .wb_05_c p {border-top:1px solid #c2c2c2; margin-bottom:20px}

        .wb_06 {width:100%; text-align:center; background:#dedede; min-width:1210px; position:relative; padding-bottom:120px; }
        /* 슬라이드배너 */
        .slide_con6 {position:relative; width:900px; margin:0 auto}
        .slide_con6 p {position:absolute; top:50%; width:67px; height:67px; margin-top:-33px; z-index:100}
        .slide_con6 p a {cursor:pointer}
        .slide_con6 p.leftBtn {left:-100px}
        .slide_con6 p.rightBtn {right:-100px}
        #slidesImg6 li {display:inline; float:left}
        #slidesImg6:after {content:""; display:block; clear:both}
		

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="wb_top">
			<div>
            	<img src="http://file3.willbes.net/new_cop/2018/07/180713_EV01_1.jpg" alt="신광은경찰 합격스토리 대공개" />
                <span>2,080</span>
            </div>
		</div>

		<div class="wb_01">
			<img src="http://file3.willbes.net/new_cop/2018/07/180713_EV02_.jpg" alt="합격자가 말하는 REAL 합격 STORY" usemap="#story"/><br />
            <div class="slide_con">
				<ul id="slidesImg5">
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV02_3.jpg" alt="2"  usemap="#story"/></li>
					<!--li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV02_1.jpg" alt="1" usemap="#story"/></li-->
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV02_2.jpg" alt="2"  usemap="#story"/></li>
				</ul>
				<p class="leftBtn"><a id="imgBannerLeft5"><img src="http://file3.willbes.net/new_cop/2017/03/EV170306_p_prev.png" alt="이전" /></a></p>
				<p class="rightBtn"><a id="imgBannerRight5"><img src="http://file3.willbes.net/new_cop/2017/03/EV170306_p_next.png" alt="다음" /></a></p>
			</div>
            <map name="story" id="story">
              <area shape="rect" coords="670,457,887,505" href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ/videos?disable_polymer=1" target="_blank"  />
            </map>			
		</div>

		<div class="wb_01">
			<div style="width:854px;text-align:center;margin:0 auto;">						 				
                <div class="evttabWrap">
                    <ul class="cf">
                        <li style="padding-bottom:40px;"> 
                            <a class="active" href="#tab1">
                            <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV02_tap1_off.gif"  class="off" alt="01"/>
                            <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV02_tap1_on.gif" class="on"  />
                            </a>
                        </li>
                        <li> 
                            <a  href="#tab2">
                            <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV02_tap2_off.gif"  class="off" alt="02"/>
                            <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV02_tap2_on.gif" class="on"  />
                            </a>
                        </li>
                        <li> 
                            <a  href="#tab3">
                            <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV02_tap3_off.gif"  class="off" alt="03"/>
                            <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV02_tap3_on.gif" class="on"  />
                            </a>
                        </li>
                        <li> 
                            <a  href="#tab4">
                            <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV02_tap4_off.gif"  class="off" alt="04"/>
                            <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV02_tap4_on.gif" class="on"  />
                            </a>
                        </li>
                    </ul>
                    <div class="tabContents" id="tab1">
                        <p><iframe width="854" height="480" src="https://www.youtube.com/embed/XXbDBQcNtEA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></p>
                    </div>
                    <div class="tabContents" id="tab2" >
                        <p><iframe width="854" height="480" src="https://www.youtube.com/embed/mI9cil-fFyU" frameborder="0" controls loop></iframe></p>
                    </div>
                    <div class="tabContents" id="tab3">
                        <p><iframe width="854" height="480" src="https://www.youtube.com/embed/IUgBGlIjj3g" frameborder="0" controls loop></iframe></p>
                    </div>
                    <div class="tabContents" id="tab4" >
                        <p><iframe width="854" height="480" src="https://www.youtube.com/embed/L6k33zT_kQA"  frameborder="0" controls loop></iframe></p>
                    </div>
                </div>
			</div>
		</div>

		<div class="wb_02">
			<div class="slide_con">
				<ul id="slidesImg3">
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV03_1.png" alt="1.경찰합교 최종합격자의 밤" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV03_2.png" alt="2.중앙경찰학교 입교하는 날" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV03_3.png" alt="3.합격수기 공모전 시상식" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV03_4.png" alt="3.합격수기 공모전 시상식" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV03_5.png" alt="3.합격수기 공모전 시상식" /></li>
				</ul>
				<p class="leftBtn"><a id="imgBannerLeft3"><img src="http://file3.willbes.net/new_cop/2017/03/EV170306_p_prev.png" alt="이전" /></a></p>
				<p class="rightBtn"><a id="imgBannerRight3"><img src="http://file3.willbes.net/new_cop/2017/03/EV170306_p_next.png" alt="다음" /></a></p>
			</div>
		</div><!--wb_02//-->

		<div class="wb_03" >
			<img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_top.png"  alt="합격비법을 공개합니다." />
            <ul class="evTabs">
            	<li>
                	<a href="#tab11">
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab1.png"  alt="합격비법 김형*" class="off"/>
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab1on.png"  alt="합격비법 김형*" class="on"/>
                    </a>
                </li>
                <li>
                	<a href="#tab12">
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab2.png"  alt="합격비법 박현*" class="off"/>
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab2on.png"  alt="합격비법 박현*" class="on"/>
                    </a>
                </li>
                <li>
                	<a href="#tab13">
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab3.png"  alt="합격비법 오희*" class="off"/>
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab3on.png"  alt="합격비법 오희*" class="on"/>
                    </a>
                </li>
                <li>
                	<a href="#tab14">
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab4.png"  alt="합격비법 김원*" class="off"/>
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab4on.png"  alt="합격비법 김원*" class="on"/>
                    </a>
                </li>
            
            	<li>
                	<a href="#tab15">
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab5.png"  alt="합격비법 김형*" class="off"/>
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab5on.png"  alt="합격비법 김형*" class="on"/>
                    </a>
                </li>
                <li>
                	<a href="#tab16">
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab6.png"  alt="합격비법 박현*" class="off"/>
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab6on.png"  alt="합격비법 박현*" class="on"/>
                    </a>
                </li>
                <li>
                	<a href="#tab17">
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab7.png"  alt="합격비법 오희*" class="off"/>
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab7on.png"  alt="합격비법 오희*" class="on"/>
                    </a>
                </li>
                <li>
                	<a href="#tab18">
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab8.png"  alt="합격비법 김원*" class="off"/>
                        <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab8on.png"  alt="합격비법 김원*" class="on"/>
                    </a>
                </li>
            </ul>
            
            <div id="tab11" class="tabCts">
            	<a onclick="go_popup()"><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_1.jpg"  alt="합격비법 김형*"/>
            </div>
            <div id="tab12" class="tabCts">
            	<a onclick="go_popup1()"><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_2.jpg"  alt="합격비법 박현*"/>
            </div>
            <div id="tab13" class="tabCts">
            	<a onclick="go_popup2()"><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_3.jpg"  alt="합격비법 오희*"/>
            </div>
            <div id="tab14" class="tabCts">
            	<a onclick="go_popup3()"><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_4.jpg"  alt="합격비법 김원*"/>
            </div>
			<div id="tab15" class="tabCts">
            	<a onclick="go_popup4()"><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_5.jpg"  alt="합격비법 김형*"/>
            </div>
            <div id="tab16" class="tabCts">
            	<a onclick="go_popup5()"><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_6.jpg"  alt="합격비법 박현*"/>
            </div>
            <div id="tab17" class="tabCts">
            	<a onclick="go_popup6()"><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_7.jpg"  alt="합격비법 오희*"/>
            </div>
            <div id="tab18" class="tabCts">
            	<a onclick="go_popup7()"><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_8.jpg"  alt="합격비법 김원*"/>
            </div>
		</div><!--wb_03//-->
        
		<div class="wb_04" >
			<img src="http://file3.willbes.net/new_cop/2018/07/180713_EV05_top.jpg"  alt="나는 이렇게 합격했다." />
            <div class="slide_con slide_con2">
				<ul id="slidesImg4">
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV05_10.jpg" alt="10" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV05_1.jpg" alt="1" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV05_2.jpg" alt="2" /></li>
					<li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV05_3.jpg" alt="3" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV05_4.jpg" alt="4" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV05_5.jpg" alt="5" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV05_6.jpg" alt="6" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV05_7.jpg" alt="7" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV05_8.jpg" alt="8" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/07/180713_EV05_9.jpg" alt="9" /></li>
				</ul>
				<p class="leftBtn"><a id="imgBannerLeft4"><img src="http://file3.willbes.net/new_cop/2017/03/EV170306_p_prev.png" alt="이전" /></a></p>
				<p class="rightBtn"><a id="imgBannerRight4"><img src="http://file3.willbes.net/new_cop/2017/03/EV170306_p_next.png" alt="다음" /></a></p>
			</div>
            
            <div id="popup" class="Pstyle">                 
                <div class="b-close">X</div> 
                <div class="fpcontent">    
                    <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab1_pop.jpg" alt="합격비법 김형*"/>         
                </div>
            </div>
            <div id="popup1" class="Pstyle">                  
                <div class="b-close">X</div> 
                <div class="fpcontent">    
                    <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab2_pop.jpg" alt="합격비법 박현*"/>         
                </div>
            </div>
            <div id="popup2" class="Pstyle">                  
                <div class="b-close">X</div> 
                <div class="fpcontent">    
                    <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab3_pop.jpg" alt="합격비법 오희*"/>         
                </div>
            </div>
            <div id="popup3" class="Pstyle">                  
                <div class="b-close">X</div> 
                <div class="fpcontent">    
                    <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab4_pop.jpg" alt="합격비법 김원*"/>         
                </div>
            </div>
			<div id="popup4" class="Pstyle">                  
                <div class="b-close">X</div> 
                <div class="fpcontent">    
                    <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab5_pop.jpg" alt="합격비법 김원*"/>         
                </div>
            </div>
			<div id="popup5" class="Pstyle">                  
                <div class="b-close">X</div> 
                <div class="fpcontent">    
                    <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab6_pop.jpg" alt="합격비법 김원*"/>         
                </div>
            </div>
			<div id="popup6" class="Pstyle">                  
                <div class="b-close">X</div> 
                <div class="fpcontent">    
                    <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab7_pop.jpg" alt="합격비법 김원*"/>         
                </div>
            </div>
			<div id="popup7" class="Pstyle">                  
                <div class="b-close">X</div> 
                <div class="fpcontent">    
                    <img src="http://file3.willbes.net/new_cop/2018/07/180713_EV04_tab8_pop.jpg" alt="합격비법 김원*"/>         
                </div>
            </div>
		</div><!--wb_04//-->
        

		<div class="wb_06" >
			<img src="http://file3.willbes.net/new_cop/2018/07/180713_EV07.jpg"  alt="3법도 공통과목도" />
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
        	<img src="http://file3.willbes.net/new_cop/2018/07/180713_EV06_1.jpg" alt="대한민국의 자랑스러원 경찰이 될 당신의 이야기를 기다립니다." usemap="#Map" />
            <map name="Map" id="Map">
              <area shape="rect" coords="188,970,291,1016" href="/main/index.html" target="_blank"  />
              <area shape="rect" coords="374,970,475,1016" href="/082/index.html?topMenuType=O&topMenu=082&topMenuGnb=OM_001" target="_blank"  />
              <area shape="rect" coords="557,970,658,1016" href="/085/index.html?topMenuType=O&topMenu=085&topMenuGnb=OM_001" target="_blank"  />
              <area shape="rect" coords="739,970,844,1016" href="/089/index.html?topMenuType=O&topMenu=089&topMenuGnb=OM_001" target="_blank"  />
              <area shape="rect" coords="924,970,1028,1017" href="/080/index.html?ltopMenuType=O&topMenu=083&topMenuGnb=OM_001&topMenuGnb=OM_001" target="_blank" />
            </map>
        </div><!--wb_05//-->             
        
    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.bpopup.min.js"></script>    
    <script type="text/javascript">
        function go_popup(){       
                $('#popup').bPopup();            
            };
        function go_popup1(){       
                $('#popup1').bPopup();            
            };
        function go_popup2(){       
                $('#popup2').bPopup();            
            };	
        function go_popup3(){       
                $('#popup3').bPopup();            
            };

        function go_popup4(){       
                $('#popup4').bPopup();            
            };

        function go_popup5(){       
                $('#popup5').bPopup();            
            };

        function go_popup6(){       
                $('#popup6').bPopup();            
            };

        function go_popup7(){       
                $('#popup7').bPopup();            
            };

        $(document).ready(function(){
            $('ul.evTabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})            
        });

        $(document).ready(function(){
            $(".tabContents").hide(); 
            $(".tabContents:first").show();
            
            $(".evttabWrap ul li a").click(function(){ 
                
                var activeTab = $(this).attr("href"); 
                $(".evttabWrap ul li a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".tabContents").hide(); 
                $(activeTab).fadeIn(); 
                
                return false; 
            });
        });

        $(document).ready(function() {
            var slidesImg5 = $("#slidesImg5").bxSlider({
                        mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                        auto:true,
                        speed:350,
                        pause:4000,
                        controls:false,
                        slideWidth:900,
                        autoHover: true,
                        pager:false,
            });
                    
            $("#imgBannerLeft5").click(function (){
                slidesImg5.goToPrevSlide();
            });
            $("#imgBannerRight5").click(function (){
                slidesImg5.goToNextSlide();
            });
        });

        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                        mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                        auto:true,
                        speed:350,
                        pause:4000,
                        controls:false,
                        slideWidth:900,
                        autoHover: true,
                        pager:false,
            });
                    
            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });
            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });

        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'fade',
                speed:800,
                pause:4000,
                slideWidth:854,
                autoHover: true,
                auto: true,
                controls:false
            });
                    
            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });
            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });

        $(document).ready(function() {
            var slidesImg6 = $("#slidesImg6").bxSlider({
                        mode:'fade', //option : 'horizontal', 'vertical', 'fade'
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