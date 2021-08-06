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
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5); border-radius:10px}

        /************************************************************/

        .sky {position:fixed;top:200px;right:15px;z-index:200;}
        .sky a {display:block;margin-top:10px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2315_top_bg.jpg) no-repeat center top} 
        .evtTop .wrap span {position:absolute; left:50%; z-index:1}
        .evtTop .wrap span.img01 {width:227px; top:183px; margin-left:-431px; z-index:2}
        .evtTop .wrap span.img02 {width:303px; top:73px; margin-left:-120px; z-index:2}
        .evtTop .wrap span.img03 {width:203px; top:203px; margin-left:69px; z-index:2}

        .evt02 {background:#f0f0f0}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2021/08/2315_04_bg.jpg) no-repeat center top}

        .evtCtnsBox .check{width:900px;margin:30px auto 0;font-size:16px; text-align:center;line-height:1.5;letter-spacing:-1px;        }
        .evtCtnsBox .check label{color:#fff}
        .evtCtnsBox .check input {border:2px solid #000; margin-right: 8px;height: 17px; width: 17px;} 
        .evtCtnsBox .check a {display: inline-block; padding:5px 20px; color: #111528;background: #d7d7d7; border-radius:20px; margin-left:20px}
        .evtCtnsBox .check a:hover {color: #242527;background:#82fae8;}

        .evtInfo {padding:80px 0; background:#fff; color:#000; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px;}
        .evtInfoBox ul {margin-bottom:30px}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        {{--
        <div class="sky" id="QuickMenu">
            <a href="#evt04"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2315_sky01.jpg" alt="무료수강권">
            </a>
        </div>
        --}}

        <div class="evtCtnsBox evtTop">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2315_top.jpg" alt="나명재 한국사"/>
                <a href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/51267?subject_idx=1109" target="_blank" title="교수홈" style="position: absolute; left: 84.38%; top: 84.6%; width: 8.57%; height: 7.31%; z-index: 2; "></a>
                <span data-aos="zoom-in-down" data-aos-duration="1000" class="img01"><img src="https://static.willbes.net/public/images/promotion/2021/08/2315_top_img01.png" alt=""/></span>
                <span data-aos="zoom-in-down" data-aos-duration="500" class="img02"><img src="https://static.willbes.net/public/images/promotion/2021/08/2315_top_img02.png" alt=""/></span>
                <span data-aos="zoom-in-down" data-aos-duration="1500" class="img03"><i><img src="https://static.willbes.net/public/images/promotion/2021/08/2315_top_img03.png" alt=""/></span>
            </div>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2315_01.jpg" alt="공무원 한국사는 다르게 준비해야 합니다."/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2315_02.jpg" alt="3단계"/>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2315_03.jpg" alt="커리큘럼"/>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-left">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2315_04.jpg" alt=""/>    
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/184227" target="_blank" title="지금바로수강하기" style="position: absolute; left: 9.46%; top: 73.85%; width: 33.5%; height: 8.28%; z-index: 2;"></a>                
            </div>            

        </div>     
    </div>


    <!-- End Container -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>
@stop