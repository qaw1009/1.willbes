@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">     
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/          
        
        .sky {position:fixed; top:200px; width:165px; text-align:center; right:10px;z-index:10;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/03/2935_top_bg.jpg) repeat-x center top;}
        .evtTop div {position: absolute; top:250px; left:50%; margin-left:-520px; width:517px; z-index: 4;
            -webkit-animation: slide-in-blurred-top 0.6s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
	        animation: slide-in-blurred-top 0.6s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
        }
        @@keyframes slide-in-blurred-top {
            0% {
                -webkit-transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
                        transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
                -webkit-transform-origin: 50% 0%;
                        transform-origin: 50% 0%;
                -webkit-filter: blur(40px);
                        filter: blur(40px);
                opacity: 0;
            }
            100% {
                -webkit-transform: translateY(0) scaleY(1) scaleX(1);
                        transform: translateY(0) scaleY(1) scaleX(1);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                -webkit-filter: blur(0);
                        filter: blur(0);
                opacity: 1;
            }
        }

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2023/03/2935_01_bg.jpg) repeat-x center top;}
        .evt02 {background:#fff}
        .evt03 {background:#f4f4f4; padding-bottom:150px}
        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2023/03/2935_04_bg.jpg) repeat-x center top; padding:350px 0 150px}

        .evt05 {padding:150px 0 0}
        .youtube {width:1120px; margin:0 auto}
        .youtube iframe {width:1120px; height:550px}
        
        .shinyBtn {width:860px; margin:0 auto; display:flex; justify-content: space-between;}
        .shinyBtn a {display:block; width:48%; padding:18px 0; color:#fff; font-size:30px; background:#db4346; border-radius:6px; overflow:hidden; position: relative;}
        .shinyBtn a:hover {color:#db4346; background:#000; }
        .shinyBtn a:after{
            content:'';
            position: absolute;
            top:0;
            left:0;
            background-color: #fff;
            width: 30px;
            height: 100%;
            z-index: 1;
            transform: skewY(129deg) skewX(-60deg);
        }
        .shinyBtn a:after{animation:shinyBtn 2s ease-in-out infinite;}
        @@keyframes shinyBtn {
            0% { transform: scale(0) rotate(45deg); opacity: 0; }
            80% { transform: scale(0) rotate(45deg); opacity: 0.2; }
            81% { transform: scale(4) rotate(45deg); opacity: 0.5; }
            100% { transform: scale(60) rotate(45deg); opacity: 0; }
        }

        .evt03 .shinyBtn a {width:100%}
        
    </style>


    <div class="evtContent NSK" id="evtContainer">  
        <div class="sky" id="QuickMenu">
            <a href="#none"> 
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2935_sky01.png" alt="특별혜택" >
            </a>          
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2935_top.jpg" alt="이혜영 응급처치학개론" />
            <div><img src="https://static.willbes.net/public/images/promotion/2023/03/2935_top_img01.png" alt="" /></div>
        </div>
      
        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2935_01.jpg" alt="" /> 
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2935_02.jpg" alt="" />   
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2935_03.jpg" alt="" />   
            <div class="shinyBtn NSK-Black">                
                <a href="#none" onclick="javascript:alert('준비중입니다.');">교재구매 바로가기 ></a>
            </div>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">  
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/qzgc1l4EtGA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>  
            <div class="shinyBtn NSK-Black mt30">                
                <a href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/51439?subject_idx=2261&subject_name=%EC%9D%91%EA%B8%89%EC%B2%98%EC%B9%98%ED%95%99&tab=open_lecture" target="_blank">단과구매 ></a>
                <a href="#none" onclick="javascript:alert('준비중입니다.');">T-PASS 구매 ></a>
            </div>
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">  
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/qzgc1l4EtGA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2935_05.jpg" alt="" />  
        </div>
        
    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script') 
@stop