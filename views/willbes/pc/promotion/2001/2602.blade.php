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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:200px; width:120px; right:10px;z-index:1;}        
        .sky a {display:block; margin-bottom:-1px}

        .evt00 {background:#0a0a0a}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/03/2602_top_bg.jpg) no-repeat center top;}   
        
        .wb_01 {background:#f9e1eb}
        .wb_02 {background:url(https://static.willbes.net/public/images/promotion/2022/03/2602_02_bg.jpg) repeat-x left top;}
        .wb_04 {background:#ced9e0}  

        .wb_top2 {background:url(https://static.willbes.net/public/images/promotion/2022/04/2602_top_bg.jpg) no-repeat center top;}   
        .wb_11 {background:#d9eef4}
        .wb_12 {background:url(https://static.willbes.net/public/images/promotion/2022/04/2602_02_bg.jpg) repeat-x left top;}

   
    </style>

    <div class="p_re evtContent NSK" id="evtContainer"> 
        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div> 

        @if(time() < strtotime('202204260000'))
            {{--4월--}}
            <div class="sky" id="QuickMenu">
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/2664" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2602_sky01.png" alt="0원 패스">
                </a>  
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2602_sky02.png" alt="최대 30%">
                </a>  
                <a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2602_sky03.png" alt="23년 패스">
                </a>  
            </div>   

            <div class="evtCtnsBox wb_top" data-aos="fade-up">            
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2602_top.jpg" alt="5월 신규가입"/>             
            </div>    
            
            <div class="evtCtnsBox wb_01" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2602_01.jpg"  alt="20년 경력"/>            	
            </div>

            <div class="evtCtnsBox wb_02" data-aos="fade-up">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2602_02.jpg"  alt="웰컴팩"/>    
                    <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" title="웰컴팩 모두 받기" style="position: absolute; left: 20.36%; top: 80.35%; width: 59.38%; height: 9.87%; z-index: 2;"></a>    
                </div>   	
            </div>   
            
            <div class="evtCtnsBox wb_03" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2602_03.jpg"  alt="웰컴팩"/>            	
            </div>
        @else
            {{--5월--}}
            <div class="sky" id="QuickMenu">
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/2664" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2022/04/2602_sky01.png" alt="0원 패스">
                </a>  
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2022/04/2602_sky02.png" alt="최대 30%">
                </a>  
                <a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2022/04/2602_sky03.png" alt="23년 패스">
                </a>  
            </div>

            <div class="evtCtnsBox wb_top2" data-aos="fade-up">            
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2602_top.jpg" alt="5월 신규가입"/>             
            </div>    
            
            <div class="evtCtnsBox wb_11" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2602_01.jpg"  alt="20년 경력"/>            	
            </div>

            <div class="evtCtnsBox wb_12" data-aos="fade-up">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/04/2602_02.jpg"  alt="웰컴팩"/>    
                    <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" title="웰컴팩 모두 받기" style="position: absolute; left: 20.36%; top: 80.35%; width: 59.38%; height: 9.87%; z-index: 2;"></a>    
                </div>   	
            </div>   
            
            <div class="evtCtnsBox wb_03" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2602_03.jpg"  alt="웰컴팩"/>            	
            </div>
        @endif

        <div class="evtCtnsBox wb_04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2602_04.jpg"  alt=""/>            	
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