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
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

    /*****************************************************************/

    .sky {position:fixed; width:120px; top:200px; right:10px; z-index:10;}
    .sky a {display:block; margin-bottom:10px}

    .evt00 {background:#0a0a0a}

    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/11/2415_top_bg.jpg) no-repeat center top;}

    .evt01, .evt02, .evt03 {background:#09172a}

    .evt03 {position:relative;padding-bottom:150px;}
    .evt03 .youtube {position:absolute; top:288px; left:50%; margin-left:-366px; z-index:5}  
    .evt03 .youtube iframe {width:731px; height:401px;}

    .evt04 {position:relative} 
    .evt04 .youtube {position:absolute; top:362px; left:50%; margin-left:-432px; z-index:5}
    .evt04 .youtube.youtube2 {top:362px; margin-left:15px}
    .evt04 .youtube iframe {width:414px; height:244px;}

    .evt05 {position:relative} 
    .evt05 .youtube {position:absolute; top:374px; left:50%; margin-left:-432px; z-index:5}
    .evt05 .youtube.youtube2 {top:374px; margin-left:15px}
    .evt05 .youtube iframe {width:414px; height:244px;}    

    .evt06 {position:relative} 
    .evt06 .youtube {position:absolute; top:381px; left:50%; margin-left:-208px; z-index:5}   
    .evt06 .youtube iframe {width:414px; height:244px;}

    .evt07 {position:relative} 
    .evt07 .youtube {position:absolute; top:384px; left:50%; margin-left:-432px; z-index:5}
    .evt07 .youtube.youtube2 {top:384px; margin-left:15px}
    .evt07 .youtube iframe {width:414px; height:244px;}    

    .evt04, .evt05, .evt06, .evt07 {padding-bottom:100px;}
    
    .evt05, .evt07 {background:#f8f8f8;}

    .evt08 {background:#3e3e3e;}

    .evt09 {padding-bottom:100px;}

    </style>

    <div class="evtContent NGR" id="evtContainer"> 

        <div class="sky" id="QuickMenu">
            <a href="#tip"><img src="https://static.willbes.net/public/images/promotion/2021/11/2415_sky01.png" alt="학습 팁"/></a>
            <a href="https://www.youtube.com/channel/UCz_3g63yWTYjg6_Ko5QRK1g" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/11/2415_sky02.png" alt="유튜브 바로가기"/></a>        
        </div>

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div> 

        <div class="evtCtnsBox evt_top" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2415_top.jpg" alt="신광은 형사법" >    
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2415_01.jpg" alt="형사법이란" >    
        </div> 

        <div class="evtCtnsBox evt02" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2415_02.jpg" alt="어려운 이유?" >    
        </div> 

        <div class="evtCtnsBox evt03" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2415_03.jpg" alt="합격설명회 영상" >
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/qofmQ0nkgYE?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
        </div>

        <div class="evtCtnsBox evt04" id="tip" data-aos="fade-up">   
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2415_04.jpg" alt="기본과정" >
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/wRYPFvoBqxE?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
            <div class="youtube youtube2">
                <iframe src="https://www.youtube.com/embed/vLiwjVmMWD0?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2415_05.jpg" alt="심화이론 과정" >
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/U1r8_NWBTsQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
            <div class="youtube youtube2">
                <iframe src="https://www.youtube.com/embed/oA-KmQMQkXQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif
        </div> 

        <div class="evtCtnsBox evt06" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2415_06.jpg" alt="심화기출 가정" >            
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/EEX_dFeKOsI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>                  
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
            @endif
        </div> 

        <div class="evtCtnsBox evt07" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2415_07.jpg" alt="문제풀이 과정" >
            {{--
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/qofmQ0nkgYE?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            --}}
            <div class="youtube youtube2">
                <iframe src="https://www.youtube.com/embed/RYTCCF9_3NY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>           
        </div>

        <div class="evtCtnsBox evt08" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2415_08.jpg" alt="1일 1제" >    
        </div> 

        <div class="evtCtnsBox evt09" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2415_09.jpg" alt="꿀팁 대방출" >
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif     
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