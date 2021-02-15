@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
        }
        .skybanner a {margin-bottom:5px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/03/1586_top_bg.jpg) no-repeat center top}
        .wb_01 {background:#3e4552}
        .wb_02 {background:#ededed; padding-bottom:80px;}
        .wb_03 {background:#2d77be url(https://static.willbes.net/public/images/promotion/sparta/1051_05_bg.jpg) no-repeat center top}
        .wb_04 {background:#e5e5e6 url(https://static.willbes.net/public/images/promotion/sparta/1051_06_bg.jpg) repeat}
        .wb_06 {background:#f7f7f7}
        .wb_07 {background:#d7d7d7}   
        .tabs4 {background:url(https://static.willbes.net/public/images/promotion/2020/03/1586_04_content_bg.jpg) no-repeat center top}
        .tabs3 {background:#d7d7d7}
        .wb_schedule{background:#fff;}

        /* 슬라이드배너 */
        .slide_con1 {position:relative; width:900px; margin:0 auto; padding-top:10px;}
        .slide_con1 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con1 img {width:100%;}
        .slide_con1 p a {cursor:pointer}
        .slide_con1 p.leftBtn1 {left:-31px; top:50%; width:62px; height:62px; margin-top:-31px;opacity:0.9; filter:alpha(opacity=90);}
        .slide_con1 p.rightBtn1 {right:-31px;top:50%; width:62px; height:62px;  margin-top:-31px;opacity:0.9; filter:alpha(opacity=90);}

        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#0e275f;}
        .tabContaier ul{width:1120px;margin:0 auto;height:70px;} 
        .tabContaier li{display:inline-block;width:280px;height:65px;line-height:65px;background:#0b2661;color:#9096aa;float:left;font-size:19px;font-weight:bold;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}
        .tabContaier li a:hover,
        .tabContaier li a.active {border-bottom:5px solid #31d1ff;color:#fff;font-size:26px;}

        .wb_ctsInfo {background:#e9e9e9; padding:100px 0; line-height:1.5;}  
        .wb_ctsInfo div {width:980px; margin:0 auto; color:#444; font-size:14px; text-align:left;}
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#555;} 
        .wb_ctsInfo div p {font-size:18px; margin-bottom:10px;}  
        .wb_ctsInfo div li {margin-bottom:30px; list-style:disc; margin-left:20px}
        .wb_ctsInfo div dl {position: relative; padding-left:10px;}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="#sparta"><img src="https://static.willbes.net/public/images/promotion/2020/03/1586_sky.png" alt="입실문의"></a>        
        </div>

        <div class="evtCtnsBox wb_top" id="sparta">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1586_top.jpg" alt="스파르타" />            
        </div>  
       
        <div class="evtCtnsBox wb_tab">
            <div class="tabContaier">    
                <ul>    
                    <li><a href="#tab1" class="active">개강정보</a></li>                        
                    <li><a href="#tab2">스파르타 안내</a></li>                    
                    <li><a href="#tab3">합격수기</a></li>                    
                    <li><a href="#tab4">채용현황</a></li>              
                </ul>
            </div> 
            <div id="tab1" class="tabContents">       
                <img src="https://static.willbes.net/public/images/promotion/2021/01/1586_01_content.jpg" usemap="#Map" title="" border="0" />
                <map name="Map" id="Map">
                    <area shape="rect" coords="361,545,757,644" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&subject_idx=1074&course_idx=&campus_ccd=605001" target="_blank" />
                </map>    
            </div>

            <div id="tab2" class="tabContents">       
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1586_02_content.jpg"  title="" />      
            </div>

            <div id="tab3" class="tabContents tabs3">       
                <img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_t1.png" alt="2018 합격수기" />
                <div class="slide_con1">
                    <ul id="slidesImg1">
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s01.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s02.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s03.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s04.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s05.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s06.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s07.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s08.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s09.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s10.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s11.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s12.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s13.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s01.jpg" alt="1"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s02.jpg" alt="2"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s03.jpg" alt="3"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s05.jpg" alt="5"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s06.jpg" alt="6"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s07.jpg" alt="7"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s08.jpg" alt="8"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s09.jpg" alt="9"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s10.jpg" alt="10"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s11.jpg" alt="11"/></li>
                    </ul>
                    <p class="leftBtn1"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/sparta/1501_roll_arr_l.png"></a></p>
                    <p class="rightBtn1"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/sparta/1051_roll_arr_r.png"></a></p>
                </div>
                <img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_t2.png" alt="양해" />
            </div>

            <div id="tab4" class="tabContents tabs4">       
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1586_04_content.jpg"  title="" />      
            </div>             
        </div>   

        <div class="wb_ctsInfo" id="ctsInfo">
            <div>
                <h3 class="NSK-Black">스파르타 유의사항 안내</h3>
                <ul>
                    <li>
                        <p class="NSK-Black">스파르타 기본규칙</p>
                        - 강의실 내 잡담 금지. 작은 소리도 타인에겐 소음입니다.<br>
                        - 휴대폰 무음모드 기본, 오답노트를 위해 가위질 칼집, 시잔촬영 금지<br>
                        - 강의실 내 음식물 반입 금지. (냄새, 소리가 나지 않는 음식물만 제한적 허용)<br>
                        - 타이핑, 마우스 크릭은 큰 불편을 주는 소음입니다.<br>
                        - 흡연자는 주변인들을 위해 가글, 섬유탈취제를 이용해 주시고 반드시 손을 씻고 입실해 주시기 바랍니다.<br>
                        - 공석이더라도 자리 외 착석 및 물건보관을 금지하고, 독서실 책장 칸막이 설치를 금지합니다.<br>
                        - 자기주도학습시간은 물론 쉬는 시간에도 정숙<br>
                        - 복도에서 잡담 금지, 스터디 금지 (쉬는 시간에도 강의실 안에서 공부하는 학생에게 방해되지 않도록 자습실 내부는 물론 복도에서도 정숙해 주시기 바랍니다.)
                    </li>
                    <li>
                        <p class="NSK-Black">지정 시간표 준수</p>
                        - 쉬는 시간 외에 출입문을 잠급니다.<br>
                        입실 하지 못한 학생은 다음 쉬는 시간까지 밖에서 대기하셔야 합니다.<br>
                        (내부에서 공부하는 학생들에게 피해가 가지 않도록 통제합니다.)<br>
                        중간 자리 이동시 벌점(본인 자리 외의 좌석에서 공부 또는 자기주도학습시간에 이동시)
                    </li>
                    <li>
                        <p class="NSK-Black">강제퇴실 참고사항</p>
                        - 출결 벌점<br>
                        - 기본규칙 미준수
                    </li>
                    <li>
                        <p class="NSK-Black">스파르타 제재 시스템</p>
                        자율적이지 않은 관리 및 통제 시스템이 많이 불편할 수 있습니다. <br>
                        하지만 자율적인 분위기에서는 본인의 학습시간확보가 어렵기 때문에 자신을 위해 스스로 들어온 곳입니다. <br>
                        전체적인 학습 분위기 조성을 위해 정해진 자습시간은 반드시 따라주시기 바랍니다.
                    </li>
                </ul>
            </div>
        </div>       

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:8000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:900,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            $("#imgBannerLeft1").click(function (){
                slidesImg1.goToPrevSlide();
            });

            $("#imgBannerRight1").click(function (){
                slidesImg1.goToNextSlide();
            });
        });

        /*탭(텍스터버전)*/
    $(document).ready(function(){
        $(".tabContents").hide();
        $(".tabContents:first").show();
        $(".tabContaier ul li a").click(function(){
        var activeTab = $(this).attr("href");
        $(".tabContaier ul li a").removeClass("active");
        $(this).addClass("active");
        $(".tabContents").hide();
        $(activeTab).fadeIn();
        return false;
        });
    });

    </script>
@stop