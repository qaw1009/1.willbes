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

        /************************************************************/
        
        .sky {position:fixed;top:200px;right:15px;z-index:200;}
        .sky a {display:block;margin-top:10px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2317_top_bg.jpg) no-repeat center top} 
        .evtTop .wrap span {position:absolute; z-index:1}
        .evtTop .wrap span.img01 {width:394px; top:236px; right:-140px; z-index:2;}
        .evtTop .wrap span.img02 {width:421px; top:502px; right:-140px;z-index:2;}
        .evtTop .wrap span.img03 {width:311px; top:660px; right:147px; z-index:2;}
        .evtTop .tHomeBtn{position: absolute; top:902px; right:578px; z-index:2;}
        .evtTop .tHomeBtn a{
            color:#fff;
            font-size:15px;
            font-weight: bold;
            width:168px;
            height:41px;
            display: block;
            background-color: #384a5a;
            border-radius: 20px;
            text-align: left;
            line-height: 41px;
            position: relative;
            text-indent: 10px;
        }
        .evtTop .tHomeBtn a::after{
            content:'';
            background: url(https://static.willbes.net/public/images/promotion/2021/08/2317_icon.png) no-repeat center top;
            width:33px;
            height:33px;
            position: absolute;
            top:3px;
            right:3px;
        }
        .evtTop .tHomeBtn a:hover{border-radius: 20px;}

        .evt02 {background-color:#f0f1ec}
        .evt03 {background-color:#dfc2ae}
        .evt04 {background-color:#3f5262;}
    </style> 


    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2317_top.jpg" alt="황태진 교육학"/>
                <div class="tHomeBtn">
                    <a href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50291/?subject_idx=1120" target="_blank" title="교수홈">교수님홈 바로가기</a>
                </div>                
                <span data-aos="zoom-in-down" data-aos-delay="500" data-aos-once="ture" class="img01"><img src="https://static.willbes.net/public/images/promotion/2021/08/2317_top_img01.png" alt=""/></span>
                <span data-aos="zoom-in-down" data-aos-delay="1000" data-aos-once="ture" class="img02"><img src="https://static.willbes.net/public/images/promotion/2021/08/2317_top_img02_n1.png" alt=""/></span>
                <span data-aos="zoom-in-down" data-aos-delay="1300" data-aos-once="ture" class="img03"><img src="https://static.willbes.net/public/images/promotion/2021/08/2317_top_img03.png" alt=""/></span>
            </div>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2317_01.jpg" alt="교정학 어떤파트에 집중해야 할까요"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2317_02.jpg" alt="파트별 중요한것"/>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2317_03.jpg" alt="커리큘럼"/>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-left">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2317_04.jpg" alt="황태진 교정학 기본이론"/>    
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/184483" target="_blank" title="지금바로수강하기" style="position: absolute;left: 16.46%;top: 67.95%;width: 39.5%;height: 9.78%;z-index: 2;"></a>                
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