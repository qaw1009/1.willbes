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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtTop00 {background:#404040}

        .wb_top {background:#5f13d2 url(https://static.willbes.net/public/images/promotion/2020/03/1584_top_bg.jpg) no-repeat center top}

        .wb_01,.wb_02,.wb_03 {background:#5f13d2}

        .wb_tab {background:#5f13d2 url(https://static.willbes.net/public/images/promotion/2020/03/1584_03s_bg.jpg) no-repeat center top}

        .wb_02{position:relative;}
        .wb_02 iframe{width:645px;height:370px;position:absolute;left:50%;top:50%;margin-left:-322px;margin-top:-80px;}
      
        .wb_04,.wb_05 {background:#f2f2f2;}
       
        /* 슬라이드배너 */
        .slide_con1 {position:relative; width:900px; margin:0 auto; padding-top:10px;}
        .slide_con1 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con1 img {width:100%;}
        .evtCtnsBox p a {cursor:pointer}
        .evtCtnsBox p.leftBtn1 {left:-31px; top:50%; width:62px; height:62px; margin-top:-31px;opacity:0.9; filter:alpha(opacity=90);}
        .evtCtnsBox p.rightBtn1 {right:-31px;top:50%; width:62px; height:62px;  margin-top:-31Dpx;opacity:0.9; filter:alpha(opacity=90);}

        .slide_con2 {position:relative; width:900px; margin:0 auto; padding-top:10px;}
        .slide_con2 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con2 img {width:100%;}
        .slide_con2 p a {cursor:pointer}

        /*탭(텍스트)*/
        .tabContaier ul{width:920px;margin:0 auto;} 
        .tabContaier li{display:inline-block;width:220px;height:60px;line-height:56px;color:#fff;float:left;font-size:26px;font-weight:bold;border:2px solid #fff;margin-left:13px;}
        .tabContaier li:first-child {margin-left:0;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}
        .tabContaier li a:hover,
        .tabContaier li a.active {background:#ffd728;color:#432390;}
        .tabContents {padding:40px 0 90px;}

    </style>

    <div class="evtContent NSK" id="evtContainer">     

        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_00.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1584_top.gif" alt="리마인드" />
        </div>  

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1584_01.jpg" alt="3월23일 개강" />
        </div>  

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1584_02.jpg" alt="영상 더 보기" usemap="#Map1584c" border="0" />
            <map name="Map1584c" id="Map1584c">
                <area shape="rect" coords="359,844,751,907" href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ/videos?view=0&sort=dd&shelf_id=7" target="_blank" />
            </map>
            <iframe src="https://www.youtube.com/embed/ZfgKjhwXlk8" frameborder="0" allowfullscreen=""></iframe>
        </div>  

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1584_03.jpg" alt="리마인드 2단계란" />
            <div class="evtCtnsBox wb_tab">
            <div class="tabContaier">    
                <ul>    
                    <li><a href="#tab1" class="active">1주차</a></li>
                        
                    <li><a href="#tab2">2주차</a></li>
                    
                    <li><a href="#tab3">3주차</a></li>
                    
                    <li><a href="#tab4">4주차</a></li>              
                </ul>
            </div> 
            <div id="tab1" class="tabContents">       
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1584_03_t_c1.png"  title="" />      
            </div>
            <div id="tab2" class="tabContents">       
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1584_03_t_c2.png"  title="" />      
            </div>
            <div id="tab3" class="tabContents tabs3">       
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1584_03_t_c3.png" alt="" />              
            </div>
            <div id="tab4" class="tabContents tabs4">       
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1584_03_t_c4.png"  title="" />      
            </div>             
        </div>             
        </div>  

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1584_04.jpg" alt="신청하기" usemap="#Map1584a" border="0" />
            <map name="Map1584a" id="Map1584a">
                <area shape="rect" coords="102,922,318,988" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank" />
                <area shape="rect" coords="329,922,542,987" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank" />
                <area shape="rect" coords="576,923,790,988" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1008" target="_blank" />
                <area shape="rect" coords="800,922,1016,988" href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1008" target="_blank" />
            </map>
        </div>        

        {{--        
        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1584_05.jpg" alt="소문내기 이벤트" usemap="#Map1584b" border="0" />
            <map name="Map1584b" id="Map1584b">
                <area shape="rect" coords="385,739,689,790" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="리마인드 2단계 이미지 다운받기" />
            </map>
        </div>
        --}}

    </div>
    <!-- End Container -->

    <script type="text/javascript">
           
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
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop