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

        .wb_cts01 {background:#330d0a url(http://file3.willbes.net/new_gosi/2019/01/EV190131_01_1_bg.png) no-repeat center top; margin-top:20px}	
        .wb_cts01 .wb_popWrap {width:1210px; margin:0 auto; position:relative}

        .wb_cts01 .giveaway {position:absolute; width:740px; left:50%; margin-left:-390px; animation:only 2s infinite; z-index:11}
        @@keyframes only{
            0%{top:410px}
            50%{top:430px}
            100%{top:410px}
        }

        .wb_cts02 {background:#e7e7e7}
        .wb_cts02 .tabWrapEvt {width:1210px; margin:0 auto}
        .wb_cts02 .tabWrapEvt li {display:inline; float:left; width:200px; margin-right:1px;}
        .wb_cts02 .tabWrapEvt li a {display:block; text-align:center}
        .wb_cts02 .tabWrapEvt li a img.off {display:block}
        .wb_cts02 .tabWrapEvt li a img.on {display:none}
        .wb_cts02 .tabWrapEvt li a:hover img.off {display:none}
        .wb_cts02 .tabWrapEvt li a:hover img.on {display:block}
        .wb_cts02 .tabWrapEvt li a.active img.off {display:none}
        .wb_cts02 .tabWrapEvt li a.active img.on {display:block}
        .wb_cts02 .tabWrapEvt li a:hover,
        .wb_cts02 .tabWrapEvt li a.active {}
        .wb_cts02 .tabWrapEvt li:last-child a {margin-right:0}
        .wb_cts02 .tabWrapEvt:after {content:""; display:block; clear:both}
        .wb_cts02 .tabcts {background:#fff}
        
        .wb_cts03 {background:#ce3128 url(http://file3.willbes.net/new_gosi/2019/01/EV190131_03_bg.png) no-repeat center top}    

        .wb_cts04 {background:#222 url(http://file3.willbes.net/new_gosi/2019/01/EV190131_04_bg.png) no-repeat center top}
        .wb_cts04_1 {background:#222 url(http://file3.willbes.net/new_gosi/2019/01/EV190131_04_1_bg.png) no-repeat center top}

        .wb_cts05 {background:#e3e3e3}
        .wb_cts06 {background:#2e2222}
        .wb_cts07 {background:#2e2222}
        .wb_cts08 {background:#e3e3e3}
        .wb_cts09 {background:#f7f7f7}
        .wb_cts10 {background:#fff}
        .wb_cts11 {background:#222 url(http://file3.willbes.net/new_gosi/2019/01/EV190131_11_bg.png) no-repeat center top}

        /* 슬라이드배너 */
        .bannerImg2 {position:relative; width:980px; margin:0 auto 100px}
        .bannerImg2 p {position:absolute; top:50%; width:51px; z-index:100}
        .bannerImg2 img {width:100%}
        .bannerImg2 p a {cursor:pointer}
        .bannerImg2 p.leftBtn2 {left:-60px; top:42%; width:36px; height:56px}
        .bannerImg2 p.rightBtn2 {right:-60px; top:42%; width:36px; height:56px}

        /* TAB */
        .Tab_box {background:#e3e3e3; padding-bottom:150px;}
        .Tab_c {width:980px; margin:0 auto}		
        .Tab_c li {display:inline; float:left}	
        .Tab_c a img.off {display:block}
        .Tab_c a img.on {display:none}
        .Tab_c a.active img.off {display:none}
        .Tab_c a.active img.on {display:block}
        .Tab_c:after {content:""; display:block; clear:both}
        /* TAB 2 슬라이드*/
        .slide_con {position:relative; width:980px; margin:0 auto; height:920px; background:#e3e3e3; overflow:hidden; border:2px solid #000;}
        .slide_con .bx-wrapper .bx-controls {
            position: absolute;
            top:0;
            width:100%;           
            z-index: 1;
        }
         
        
        /* 유튜브 */
        .YouTube {width:1210px; margin:0 auto; text-align:center}
        .YouTube li {display:inline; float:left; width:33.33333%; margin-bottom:50px}
        .YouTube li p {margin-top:20px; font-size:16px !important; font-weight:500 !important; color:#333; letter-spacing:-1px}
        .YouTube li iframe {width:380px; margin:0 auto; height:220px}
        .YouTube:after {content:""; display:block; clear:both}

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            width:120px; 
            animation:upDown 1s infinite;
            -webkit-animation:upDown 1s infinite;
            z-index:10;
        }

        .skybanner ul {border:1px solid #000; border-bottom:none}	
        .skybanner a {height:40px; line-height:40px; display:block; text-align:center; background:#c9302b; color:#fff; font-size:16px !important; font-weight:600 !important; border-bottom:1px solid #660401;}
        .skybanner a:hover {background:#fff; color:#000}

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
    
    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_sky.png" alt="" />    
            <ul>
                <li><a href="#online">교수소개</a></li>
                <li><a href="#buy">파격할인</a></li>
                <li><a href="http://www.willbesgosi.net/teacher/board/board_list.html?topMenuGnb=OM_002&BOARDTYPE=T3&INCTYPE=list&BOARD_MNG_SEQ=BOARD_012&topMenuType=O&topMenuGnb=OM_002&topMenu=006&topMenuName=%EC%86%8C%EB%B0%A9%EA%B3%B5%EB%AC%B4%EC%9B%90&menuID=OM_002_006_002&searchUserId=wgt801&searchSubjectNm=%EC%B2%B4%EB%A0%A5&searchSubjectCode=1147" target="_blank">질답게시판</a></li>
            </ul>
		</div>    
    
        <div class="evtCtnsBox wb_cts01" >
            <div class="wb_popWrap">
                <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_01_1.png" alt="" />
                <div class="giveaway"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_01_txt01.png"  alt="" /></div>
            </div>
        </div>
        <!-- wb_cts01//-->

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02.png" alt=""/><br>
            <ul class="tabWrapEvt">
                <li>
                    <a href="#tab01">
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_t1.png" alt="" class="off"/>
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_t1_on.png" alt="" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab02">
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_t2.png" alt="" class="off"/>
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_t2_on.png" alt="" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab03">
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_t3.png" alt="" class="off"/>
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_t3_on.png" alt="" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab04"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_t4.png" alt="" class="off"/>
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_t4_on.png" alt="" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab05">
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_t5.png" alt="" class="off"/>
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_t5_on.png" alt="" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab06">
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_t6.png" alt="" class="off"/>
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_t6_on.png" alt="" class="on"/>
                    </a>
                </li>
            </ul>
            
            <div id="tab01" class="tabcts"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_s1.png" alt=""/></div>
            <div id="tab02" class="tabcts"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_s2.png" alt=""/></div>
            <div id="tab03" class="tabcts"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_s3.png" alt=""/></div>
            <div id="tab04" class="tabcts"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_s4.png" alt=""/></div>
            <div id="tab05" class="tabcts"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_s5.png" alt=""/></div>
            <div id="tab06" class="tabcts"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_02_s6.png" alt=""/></div>
        </div>
        <!--wb_cts02 //-->

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_03.png"  alt="" />
        </div>
        <!-- wb_cts03 //-->

        <div class="evtCtnsBox wb_cts04" id="online">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_04.png"  alt="" />
        </div>
        <!-- wb_cts04 //--> 

        <div class="evtCtnsBox wb_cts04_1">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_04_1.png"  alt="제이슨유튜브수강평추가" />
        </div>
        <!-- wb_cts04_1 //-->

        <div class="evtCtnsBox wb_cts05">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_05.png"  alt="" /><br>
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_05_schedule.png"  alt="" />
        </div>
        <!-- wb_cts05 //-->

        <div class="evtCtnsBox wb_cts06">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_06.png"  alt="" />
        </div>
        <!-- wb_cts06 //-->

        <div class="evtCtnsBox wb_cts07">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_07.png"  alt="" />
        </div>
        <!-- wb_cts07 //-->

 
        <div class="evtCtnsBox Tab_box"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_tab_txt.png" alt="제이슨,새로운운동의패러다임" />
            <ul class="Tab_c">
                <li><a href="#tab1"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_tab1.png" class="off" alt="01"/> <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_tab1_on.png" class="on"  /></a></li>
                <li><a href="#tab2"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_tab2.png" class="off" alt="02"/> <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_tab2_on.png" class="on"  /></a></li>
                <li><a href="#tab3"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_tab3.png" class="off" alt="03"/> <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_tab3_on.png" class="on"  /></a></li>
            </ul>
            <div id="tab1">
                <div class="slide_con" class="offWrap">
                    <ul id="slidesImg1" class="offSlider">
                        <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_tab_t1.png" /></li>
                        <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_tab_t1_2.png" /></li>
                        <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_tab_t1_3.png" /></li>
                    </ul>
                </div>
            </div>
            <div id="tab2">
                <div class="slide_con" class="offWrap">
                    <ul id="slidesImg1" class="offSlider">
                        <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_tab_t2.png" /></li>
                    </ul>
                </div>
            </div>
            <div id="tab3">
                <div class="slide_con" class="offWrap">
                    <ul id="slidesImg1" class="offSlider">
                        <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_tab_t3.png" /></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Tab_box//-->

        <div class="evtCtnsBox wb_cts08">
            <ul class="YouTube">
                <li>
                <iframe src="https://www.youtube.com/embed/n55jy6qRg3k?rel=0" frameborder="0" allowfullscreen></iframe>
                <p>#소방공무원_체력시험<br /> #제1강_좌전굴</p>
                </li>
                <li>
                <iframe src="https://www.youtube.com/embed/U5rxW4KSsUE?rel=0" frameborder="0" allowfullscreen></iframe>
                <p>#소방공무원_체력시험<br /> #제2강_배근력</p>
                </li>
                <li>
                <iframe src="https://www.youtube.com/embed/h0piYTOy6Tk?rel=0" frameborder="0" allowfullscreen></iframe>
                <p>#소방공무원_체력시험<br /> #제3강_좌우악력</p>
                </li>
                <li>
                <iframe src="https://www.youtube.com/embed/32eLnOLq63U?rel=0" frameborder="0" allowfullscreen></iframe>
                <p>#소방공무원_체력시험<br /> #제4강_윗몸일으키기</p>
                </li>
                <li>
                <iframe src="https://www.youtube.com/embed/34sZexG3BQ4?rel=0" frameborder="0" allowfullscreen></iframe>
                <p>#소방공무원_체력시험<br /> #제5강_제자리멀리뛰기</p>
                </li>
                <li>
                <iframe src="https://www.youtube.com/embed/vUE-ztt6AdI?rel=0" frameborder="0" allowfullscreen></iframe>
                <p>#소방공무원_체력시험<br /> #제6강_왕복오래달리기</p>
                </li>
            </ul>
        </div>
	
        <div class="evtCtnsBox wb_cts11">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_11.png"  alt="제이슨유튜브감사평" />
        </div>
        <!-- wb_cts11 //-->

        <div class="evtCtnsBox wb_cts09" id="buy">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_09.png" alt="" usemap="#Map_jason_go" border="0"/>
                <map name="Map_jason_go">
                <area shape="rect" coords="843,503,1052,558" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=006&topMenuType=O&searchSubjectCode=1147&searchLeccode=D201900067&leftMenuLType=M0001&lecKType=D" target="_blank" alt="풀패키지2019">
                <area shape="rect" coords="846,582,1049,629" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=006&topMenuType=O&searchSubjectCode=1147&searchLeccode=D201900066&leftMenuLType=M0001&lecKType=D" target="_blank" alt="한달코스">
                <area shape="rect" coords="844,666,1055,715" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=006&topMenuType=O&searchSubjectCode=1147&searchLeccode=D201900065&leftMenuLType=M0001&lecKType=D" target="_blank" alt="48점완성">
                <area shape="rect" coords="844,741,1047,789" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=006&topMenuType=O&searchSubjectCode=1147&searchLeccode=D201900064&leftMenuLType=M0001&lecKType=D" target="_blank" alt="16점완성">
                <area shape="rect" coords="843,823,1055,870" href="http://www.willbesgosi.net/lecture/movieLectureDetail.html?topMenu=006&topMenuType=O&searchSubjectCode=1147&searchLeccode=D201900063&leftMenuLType=M0001&lecKType=D" target="_blank" alt="32점완성">
                <area shape="rect" coords="809,961,996,1002" href="http://www.willbesgosi.net/event/movie/event.html?event_cd=On_190115_c" target="_blank" alt="자세히">
                <area shape="rect" coords="716,1057,971,1105" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201900003" target="_blank" alt="동영상종합풀패키지">
            </map>
        </div>
        <!-- wb_cts09 //-->

        <div class="evtCtnsBox wb_cts10">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190131_10.png" alt="" usemap="#Mapboard" border="0"/>
            <map name="Mapboard" id="Mapboard">
                <area shape="rect" coords="340,544,870,668" href="http://www.willbesgosi.net/teacher/board/board_list.html?topMenuGnb=OM_002&BOARDTYPE=T3&INCTYPE=list&BOARD_MNG_SEQ=BOARD_012&topMenuType=O&topMenuGnb=OM_002&topMenu=006&topMenuName=%EC%86%8C%EB%B0%A9%EA%B3%B5%EB%AC%B4%EC%9B%90&menuID=OM_002_006_002&searchUserId=wgt801&searchSubjectNm=%EC%B2%B4%EB%A0%A5&searchSubjectCode=1147" target="_blank" alt="질답게시판 바로가기" />
            </map>
        </div>
        <!-- wb_cts10//-->
    
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('.tabWrapEvt').each(function(){
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
            
                e.preventDefault()})})}
        );  
        
        /**/
        $(document).ready(function(){
            $('.Tab_c').each(function(){
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

                    e.preventDefault()})});
            tabMenuSlider();
        }); 
        
        function tabMenuSlider() {
            var $tabmenu = $('.Tab_c'),
            $sliderClass = '.offSlider',
            config = {
                controls:false,
                speed:800,
                auto:true,
                randomStart:true 
            };

            var sliders = new Array();
            $($sliderClass).each(function(i, slider) {
                var len = $(slider).find('> li').length;
                if(len < 2) {
                    sliders[i] = $(slider).addClass('nonslider');
                } else {
                    sliders[i] = $(slider).bxSlider(config);
                }
            });

            if(!$tabmenu.length ) { return }
                    if($('div.offWrap').is(':first')) {
                        slider.reloadSlider(config);
                    }
            $tabmenu.on('click', ' a', function(e){
                var _target = $(this).attr('href');

                if($(_target).css('display') === 'block') {
                    $.each(sliders, function(i, slider){
                        if(!slider.hasClass('nonslider')) {
                            slider.reloadSlider(config);
                        }
                    });
                }
                e.preventDefault();
            });
        }

                    
        /**/
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);  
	    });
    </script>
@stop