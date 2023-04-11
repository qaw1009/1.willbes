@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">       
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /*.evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5);}*/
                
        /************************************************************/

        .sky {position:fixed;top:150px;right:10px;z-index:1;} 
        .sky a {display:block; margin-bottom:10px}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2023/04/2949_top_bg.jpg) no-repeat center top; height:1075px;}
        .evt_top .main_img {position:absolute; top:200px; left:50%; margin-left:-331.5px}    

        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2023/04/2949_01_bg.jpg) no-repeat center top;}
        .apply_area {display:flex; justify-content:space-around; position:absolute; bottom:300px; width:1120px; left:50%; margin-left:-560px;}
        .apply {background:#7B0000;color:#FF9C00;padding:10px;width:200px;font-size:14px;line-height:1.5;font-weight:bold;}
        .apply:hover {background:#fff;color:#000;}

        .evt_02 {background:#E3E3E3;}    

        .evt_04 {background:url(https://static.willbes.net/public/images/promotion/2023/04/2949_04_bg.jpg) no-repeat center top;}

        .evt_05 {background:url(https://static.willbes.net/public/images/promotion/2023/04/2949_05_bg.jpg) no-repeat center top;}

        .evt_06 {background:url(https://static.willbes.net/public/images/promotion/2023/04/2949_06_bg.jpg) no-repeat center top;}

        .evt_07 {position:relative;}
        .youtube {position:absolute; top:143px; left:50%;z-index:1;margin-left:-560px;}
        .youtube iframe {width:1120px; height:550px}
               
        /*유트브 팝업창*/
        .Pstyle {
        opacity: 0;
        display: none;
        position: relative;
        width: auto;
        }
        .b-close {
        position: absolute;
        right: 0;
        top: -60px;
        display: inline-block;
        cursor: pointer;
        font-size: 40px;
        font-weight: bold;
        color:#fff;
        }       
        .videoBox{position: relative; padding-top: 60%; width:760px;}
        .videoBox iframe{position: absolute; top:0; left:0; width:100%; height:100%; }      
               
    </style>

    <div class="evtContent NSK" id="evtContainer">
       
        <div class="sky" id="QuickMenu">
            <a href="#apply_go">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_sky.png" alt="119 pass" >
            </a>          
        </div>
        
        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_top.png"  alt="윌비스 소방 119패스" data-aos="flip-down" class="main_img"/>
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up" id="apply_go">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_01.jpg" title="수강신청">
            <div class="apply_area">
                <div class="apply">
                    <a href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/207036" target="_blank">24년 공채 0원 119 PASS<br>신청하기 ></a>                
                </div>
                <div class="apply">
                    <a href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/207037" target="_blank">24년 공채 119 PASS<br>신청하기 ></a>               
                </div>
                <div class="apply">
                    <a href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/207038" target="_blank">24년 구조/학과 경채 0원 PASS<br>신청하기 ></a>               
                </div>
                <div class="apply">
                    <a href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/207039" target="_blank">24년 구급 경채 0원 PASS<br>신청하기 ></a>                
                </div>
            </div>  
        </div>
  
        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_02.jpg" title="강사진">           
        </div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_03.jpg" title="교수진의 강의력">
                <a href="javascript:videoPop('#vid1');" title="" style="position: absolute;left: 5.73%;top: 32.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid2');" title="" style="position: absolute;left: 35.13%;top: 32.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid3');" title="" style="position: absolute;left: 64.73%;top: 32.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid4');" title="" style="position: absolute;left: 5.73%;top: 54.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid5');" title="" style="position: absolute;left: 35.13%;top: 54.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid6');" title="" style="position: absolute;left: 64.73%;top: 54.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid7');" title="" style="position: absolute;left: 5.73%;top: 76.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid8');" title="" style="position: absolute;left: 35.13%;top: 76.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid9');" title="" style="position: absolute;left: 64.73%;top: 76.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
            </div>        
        </div>

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_04.jpg" title="커리큘럼">           
        </div>

        <div class="evtCtnsBox evt_05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_05.jpg" title="자주 묻는 질문">           
        </div>

        <div class="evtCtnsBox evt_06" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_06.jpg" title="김윤정 교수">           
        </div>

        <div class="evtCtnsBox evt_07 pb100" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_07.jpg" title="히어로">
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/qzgc1l4EtGA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>      

	</div>

     <!-- 비디오 영상팝업 리스트 -->

    <div id="vid1" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/B11PSWKoBsY?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid2"  class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/8WuVy15dGw0?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid3" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/Z7PDrEhrY2o?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid4" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/HEVczcIriqw?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid5" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/W3wcvq26MuM?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid6" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/t6sfD77mE8Y?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid7" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/kiOvGUUzPhM?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid8" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/dTJ3jiCpx8Y?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid9" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/rkkN4KuT4cQ?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>

     <!-- End evtContainer -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>  
    <script type="text/javascript" src="https://pass.willbes.net/public/js/willbes/jquery.bpopup.min.js"></script>

        <script>
        $(document).ready( function() {
            AOS.init();
        });

        // 비디오팝업
        function videoPop(id) { 
            
            $(id).bPopup({
                positionStyle:'fixed',            
                onClose: function(){
                    $(".yt_f iframe").attr('src', '');
                },
                onOpen: function(){
                    $("#vid1 iframe").attr('src', 'https://www.youtube.com/embed/B11PSWKoBsY?rel=0');
                    $("#vid2 iframe").attr('src', 'https://www.youtube.com/embed/8WuVy15dGw0?rel=0');
                    $("#vid3 iframe").attr('src', 'https://www.youtube.com/embed/Z7PDrEhrY2o?rel=0');
                    $("#vid4 iframe").attr('src', 'https://www.youtube.com/embed/HEVczcIriqw?rel=0');
                    $("#vid5 iframe").attr('src', 'https://www.youtube.com/embed/W3wcvq26MuM?rel=0');
                    $("#vid6 iframe").attr('src', 'https://www.youtube.com/embed/t6sfD77mE8Y?rel=0');
                    $("#vid7 iframe").attr('src', 'https://www.youtube.com/embed/kiOvGUUzPhM?rel=0');
                    $("#vid8 iframe").attr('src', 'https://www.youtube.com/embed/dTJ3jiCpx8Y?rel=0');
                    $("#vid9 iframe").attr('src', 'https://www.youtube.com/embed/rkkN4KuT4cQ?rel=0');
                }
            });
        }
        
        </script>
        
    </script>

    

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop