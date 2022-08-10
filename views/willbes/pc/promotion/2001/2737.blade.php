@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/


        /************************************************************/

        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px} 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/08/2737_top_bg.jpg) no-repeat center top; height:1390px}
        .evtTop .mainImg {position:absolute; top:350px; left:50%; margin-left:-330px}
        .evtTop a {position:absolute; top:780px; left:50%; margin-left:-500px}
        .evtTop .btns {position:absolute; top:1010px; left:50%; margin-left:-335px}
        .evtTop .btns span {width:256px; height:218px; display:inline-block; margin-right:14px; background-position:left top}
        .evtTop .btns span:nth-child(1) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2737_top_img01.png) no-repeat}
        .evtTop .btns span:nth-child(2) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2737_top_img02.png) no-repeat}
        .evtTop .btns span:nth-child(3) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2737_top_img03.png) no-repeat}
        .evtTop .btns span:hover {background-position:right top}
       
        .evt01 {background:#343753}
        
        .evt02 {background:#e7e8f1;position:relative;}
        .youtube {position:absolute; top:582px; left:50%;z-index:1;margin-left:-430px}
        .youtube iframe {width:860px; height:484px}

        .evt04 {background:#ececec}      
        
        .evt05 {padding-bottom:100px; width:1120px; margin:0 auto}
        .evt05 .title {font-size:30px; font-weight:bold; margin-bottom:10px; text-align:left}

    </style>

    <div class="evtContent NSK" id="evtContainer"> 
        <div class="sky" id="QuickMenu">
            <a href="#lec"><img src="https://static.willbes.net/public/images/promotion/2022/08/2737_sky.png" alt="경학학 신청"></a>          
        </div>  

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2737_top_img.png"  alt="경찰학 박우찬" data-aos="fade-up" class="mainImg"/>
            <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51395?subject_idx=2128" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/08/2737_top_btn.png" alt="교수홈"  data-aos="fade-right"/></a>     
            <div class="btns">
                <span></span>
                <span></span>
                <span></span>
            </div>  
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2737_01.jpg"  alt="젋고 쉽고 새로운 경찰학"/>    
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/DNmn4xIMyTU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>          
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2737_02.jpg"  alt="학습요령"/>
               
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">      
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2737_03.jpg"  alt="커리큘럼"/>    
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">      
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2737_04.jpg"  alt="경찰학"/>    
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up" id="lec">                     
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2737_05.jpg"  alt="신규 개설 강좌"/>    
            <div class="title">박우찬 경찰학 단과강의 신청 > </div>        
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2737_05_01.jpg"  alt="곧 공개"/>  
            <div class="title mt100">박우찬 경찰학 무료강의 신청 > </div>  
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </div>

    </div>

    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>
      
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop   