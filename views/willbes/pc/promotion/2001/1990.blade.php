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

        /************************************************************/

        .skybanner {position:fixed;top:200px; width:160px; right:10px;z-index:1;}        
        .skybanner a {display:block; margin-bottom:5px}

        .wb_police {background:#0A0A0A}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/12/1990_top_bg.jpg) no-repeat center;}  
        .wb_top .youtube {position:absolute; top:946px; left:50%; width:978px; z-index:1;margin-left:-489px; box-shadow:0 10px 20px rgba(0,0,0,.3);}
        .wb_top .youtube iframe {width:978px; height:505px}      
        
        .wb_01 {background:#5a14d6}

        .wb_02 .youtube {position:absolute; top:1172px; left:50%; width:717px; z-index:1; margin-left:-233px; box-shadow:0 10px 20px rgba(0,0,0,.3);}
        .wb_02 .youtube iframe {width:717px; height:374px}
        .wb_02 .youtube:nth-child(2) {top:2302px;}

        .wb_03 {background:#f2f0f0; padding-bottom:150px}
        .slide_con {position:relative; width:944px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; margin-top:-30px; width:61px; height:61px; z-index:100}
        .slide_con p a {cursor:pointer;  width:61px; height:61px;}
        .slide_con p.leftBtn {left:-30px;}
        .slide_con p.rightBtn {right:-30px;}

        .wb_04 {padding-bottom:150px}

        .wb_05 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1990_05_bg.jpg) repeat-x center;}                 
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">      
        <div class="skybanner">
            <a href="#evt04"><img src="https://static.willbes.net/public/images/promotion/2020/12/1990_sky01.jpg" alt="" ></a>
            <a href="#evt05"><img src="https://static.willbes.net/public/images/promotion/2020/12/1990_sky02.jpg" alt="" ></a>
        </div>  

        <div class="evtCtnsBox wb_police" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="경찰학원부분 1위" />            
		</div>     

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1990_top.jpg"  alt="장정훈 경찰학개론 베테랑"/>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/B_SpAwQNwio?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>	
		</div>

        <div class="evtCtnsBox wb_01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1990_01.jpg"  alt="장정훈"/>            	
		</div>

        <div class="evtCtnsBox wb_02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1990_02.jpg"  alt="베테랑은 다른다"/>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/xCaNQU2R_h8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>	
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/RGS2dBNNjss?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>	
		</div>        

        <div class="evtCtnsBox wb_03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1990_03.jpg"  alt="왜? 2020 장정훈?"/>	
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1990_03_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1990_03_02.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/12/1990_arr_l.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/12/1990_arr_r.png"></a></p>
            </div>		
		</div>        

        <div class="evtCtnsBox wb_04" id="evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1990_04.jpg"  alt="경찰학개론 1위 장정훈"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  			
		</div>        

        <div class="evtCtnsBox wb_05" id="evt05">
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1990_05.jpg"  alt="부동의 1위" usemap="#Map1990A" border="0"/>
            <map name="Map1990A" id="Map1990A">
                <area shape="rect" coords="313,633,647,691" href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="이미지 다운" />
                <area shape="rect" coords="164,899,303,966" href="http://cafe.daum.net/policeacademy" target="_blank" alt="경시모" />
                <area shape="rect" coords="331,900,485,968" href="https://cafe.naver.com/polstudy" target="_blank" alt="경꿈사" />
                <area shape="rect" coords="517,899,665,965" href="  https://cafe.naver.com/kts9719" target="_blank" alt="닥공사" />
            </map>			
		</div> 

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N')){{--기존SNS예외처리시--}}
        @endif       
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:1120,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
                });
            
                $("#imgBannerLeft3").click(function (){
                    slidesImg3.goToPrevSlide();
                });
            
                $("#imgBannerRight3").click(function (){
                    slidesImg3.goToNextSlide();
                });
        });      
    </script>
@stop