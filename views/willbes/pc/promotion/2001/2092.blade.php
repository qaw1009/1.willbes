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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .sky {position:fixed;top:200px; width:130px; right:10px;z-index:1;}        
        .sky a {display:block;margin-top:15px;}

        .wb_police {background:#0A0A0A}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/02/2092_top_bg.jpg) no-repeat center;}

        .wb_01 {background:#fff;  position:relative}	
        .wb_01 .youtube iframe {width:640px; height:360px} 
        .wb_01 .youtube {position:absolute; top:403px; left:49.45%; width:455px; z-index:1; margin-left:-479px; box-shadow:0 10px 20px rgba(0,0,0,.3);}     
        .wb_01 .youtube.yu02 {top:851px; margin-left:-139px;}
        .wb_01 .youtube.yu03 {top:1302px;}   

        .wb_05{background:#201571} 

        .wb_07{padding-bottom:100px;}     
      
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="#apply1"><img src="https://static.willbes.net/public/images/promotion/2021/02/2092_sky.png" alt="스카이베너" ></a>
            <a href="#apply2"><img src="https://static.willbes.net/public/images/promotion/2021/02/2092_sky2.png" alt="스카이베너2" ></a>            
        </div>      
        
        <div class="evtCtnsBox wb_police" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="신광은 경찰학원" />            
		</div>     

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_top.jpg"  alt="기본완성반" />
		</div>

        <div class="evtCtnsBox wb_01" >
			<img src="https://static.willbes.net/public/images/promotion/2021/02/2092_01.jpg"  alt="빠르게 준비 및 유튜브 영상"/>	
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube yu02">
                <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube yu03">
                <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>		
		</div>

		<div class="evtCtnsBox wb_02" >
			<img src="https://static.willbes.net/public/images/promotion/2021/02/2092_02.jpg"  alt="경찰과목 개편 내용" />
		</div>    

		<div class="evtCtnsBox wb_03" >
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_03.jpg"  alt="3법과목"/>       
        </div>
        
        <div class="evtCtnsBox wb_04" >
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_04.jpg"  alt="과목비중 및 출제비율"/>       
		</div>
            
        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_05.jpg"  alt="기본완성반"/>       
		</div>         

        <div class="evtCtnsBox wb_06" id="apply1">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_06.jpg"  alt="온라인 단과"/>    
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @else
            @endif         
		</div>     

        <div class="evtCtnsBox wb_07" id="apply2">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_07.jpg"  alt="온라인 종합반"/>   
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @else
            @endif          
		</div>   

	</div>
     <!-- End Container -->

     <script type="text/javascript">       

            /*탭(텍스터버전)*/
        $(document).ready(function(){
            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabContaier ul li a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabContaier ul li a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop