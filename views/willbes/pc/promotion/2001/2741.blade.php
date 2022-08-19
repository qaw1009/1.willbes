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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/08/2741_top_bg.jpg) no-repeat center top;height:1430px;position:relative;}
        .jenny {position:absolute;left:50%;margin-left:-453.5px;top:62.5%;} 
       
        .evt01 {background:#fff;position:relative;}
        .youtube {position:absolute; top:582px; left:50%;z-index:1;margin-left:-430px}
        .youtube iframe {width:860px; height:484px}

        .evt02 {background:#998475;}      

        .evt03 {background:#f4f4f4}

        .evt05 {background:#f4f4f4}

        .evt06 { width:1120px; margin:0 auto}
        .evt06 .title {font-size:30px; font-weight:bold; margin-bottom:10px; text-align:left;padding:50px 0;}
                
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2022/08/2741_sky.png" alt="지텔프 제니 신청하기"></a>          
        </div>  

        <div class="evtCtnsBox evtTop" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2741_top.jpg"  alt="지텔프 제니" />
            <div class="jenny" data-aos="fade-down">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2741_top.png" alt="제니"/>
            </div>          
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2741_01.jpg"  alt="곧 공개"/>
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51397?subject_idx=2012&subject_name=G-TELP" target="_blank" title="교수 홈 바로가기" style="position: absolute;left: 11.66%;top: 35.61%;width: 20.56%;height: 3.52%;z-index: 2;"></a>
            </div>
            {{--
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/DNmn4xIMyTU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            --}}    
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2741_02.jpg"  alt="맞춤 수업"/>
               
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">      
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2741_03.jpg"  alt="why?"/>    
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">      
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2741_04.jpg"  alt="지텔프 43점"/>    
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">      
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2741_05.jpg"  alt="한방에 졸업하자"/>    
        </div>

        <div class="evtCtnsBox evt06 pb100" data-aos="fade-up" id="apply">                     
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2741_06.jpg"  alt="신규 개설 강좌"/>    
            <div class="title">제니 G-TELP 단과강의 신청 > </div>        
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2741_06_cms.jpg"  alt="곧 공개됩니다"/>  
           {{--
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
            --}}
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