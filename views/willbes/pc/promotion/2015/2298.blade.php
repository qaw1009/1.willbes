@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">            
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        /************************************************************/  

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/07/2298_top_bg.jpg) no-repeat center top;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <div data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2298_top.jpg" title="개원 12주년">     
            </div>                
        </div>

        <div class="evtCtnsBox evt01">
            <div data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2298_01.jpg" title="수강등록시 전원혜택">    
            </div>             
        </div>
        
        <div class="evtCtnsBox evt02">
            <div data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2298_02.jpg" title="단과 무료수강">        
            </div>      
        </div>

        <div class="evtCtnsBox evt03">
            <div data-aos="fade-right">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2298_03.jpg" title="수강신청">
                    <a href="https://willbesedu.willbes.net/pass/offPackage/index?cate_code=3124&course_idx=" target="_blank" title="9급공무원" style="position: absolute;left: 10.55%;top: 78.35%;width: 21.89%;height: 8.25%;z-index: 2;"></a> 
                    <a href="https://willbesedu.willbes.net/pass/offPackage/index?cate_code=3125&course_idx=" target="_blank" title="경찰" style="position: absolute;left: 39.05%;top: 78.35%;width: 21.89%;height: 8.25%;z-index: 2;"></a>
                    <a href="https://willbesedu.willbes.net/pass/offPackage/index?cate_code=3126&course_idx=" target="_blank" title="소방" style="position: absolute;left: 67.55%;top: 78.35%;width: 21.89%;height: 8.25%;z-index: 2;"></a>
                </div>   
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