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

        .skybanner {position:fixed;top:200px; width:120px; right:10px;z-index:1;}        
        .skybanner a {display:block;}    

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/12/2467_top_bg.jpg) no-repeat center; position:relative}  
        .wb_top .youtube {position:absolute; top:946px; left:50%; width:978px; z-index:1;margin-left:-489px; box-shadow:0 10px 20px rgba(0,0,0,.3);}
        .wb_top .youtube iframe {width:978px; height:505px}      
        
        .wb_01 {background:#642305}

        .wb_03 {background:#39796d} 
   
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">        

        <div class="evtCtnsBox wb_top" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2467_top.jpg" alt="새해 합격기원"/>             
		</div>        

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2467_01.jpg"  alt="합격기원팩"/>    
            <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" title="새해 합격기원팩 모두 받기" style="position: absolute; left: 23.48%; top: 75.35%; width: 52.86%; height: 8.37%; z-index: 2;"></a>    
            </div>   	
		</div>   
        
        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2467_02.jpg"  alt="합격기원팩"/>            	
		</div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2467_03.jpg"  alt="경찰교수진"/>            	
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