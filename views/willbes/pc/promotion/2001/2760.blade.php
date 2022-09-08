@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">       
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
            line-height:1.3;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .sky {position:fixed; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}


        .evttop {background:url("https://static.willbes.net/public/images/promotion/2022/09/2760_top_bg.jpg");}
        .evt01 {background:#101d26}
        .evt03 {background:#f2f2f2}        

        .Visual {padding-bottom:150px; width:100%; background:#000; text-align:center;}
        .VisualBox {width:860px; margin:0 auto;}

        .VisualBox .RollingTab {
            margin-top:30px;            
            display: flex;
            justify-content: space-between;
        }

        .VisualBox .RollingTab a{
            display: block;
            width:20%;
            height: 64px;
            font-size: 24px;
            line-height: 64px;
            color: #cdcdcd;
            background:#363636;
            text-align: center;
            margin-right:5px;
        }

        .VisualBox .RollingTab a:last-child {
            margin-right:0;
        }

        .VisualBox .RollingTab a.active,
        .VisualBox .RollingTab a:hover {
            color: #363636;
            font-weight: 600; background:#fff
        }

        .evt05 {background:#373737}
        .evt07 {padding-bottom:100px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt06"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_sky_02.png" title="소문내기 이벤트"></a>               
            <a href="#evt07"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_sky_01.png" title="이론완성반"></a>            
        </div>

        <div class="evtCtnsBox evttop">           
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2760_top.jpg" title="9.13일 개강 올인원 이론완성반">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2760_01.jpg" title="교수진" data-aos="fade-left">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2760_02.jpg" title="왜 올인원이론반인가?" data-aos="fade-right">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2760_03.jpg" title="합격커리큘럼" data-aos="fade-left">
        </div>

        <div class="Visual" data-aos="fade-up">
            <div><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_04.jpg"></div>
            <div class="VisualBox">            
                <div id="RollingSlider">
                    <ul class="tabSlider">
                        <li><a href="https://police.willbes.net/promotion/index/cate/3001/code/2236" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_04_01.jpg" alt="헌법 이국령"></a></li>
                        <li><a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51394?subject_idx=2127" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_04_02.jpg" alt="형사법 임종희"></a></li>
                        <li><a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51392?subject_idx=2127" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_04_03.jpg" alt="배너명"></a></li>
                        <li><a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51389?subject_idx=2127" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_04_04.jpg" alt="배너명"></a></li>
                        <li><a href="https://police.willbes.net/promotion/index/cate/3001/code/2737"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_04_05.jpg" alt="배너명"></a></li>
                    </ul>
                </div> 
                <div id="RollingDiv" class="tabList">
                    <div class="RollingTab">
                        <a data-slide-index="0" href="javascript:void(0);" class="active">헌법 이국령</a>
                        <a data-slide-index="1" href="javascript:void(0);" class="">형사법 임종희</a>
                        <a data-slide-index="2" href="javascript:void(0);" class="">신광은 형사법</a>
                        <a data-slide-index="3" href="javascript:void(0);" class="">장정훈 경찰학</a>
                        <a data-slide-index="4" href="javascript:void(0);" class="">김원욱 헌법</a>
                    </div>
                </div>           
            </div>        
        </div>

        <div class="evtCtnsBox evt05">
            <div class="wrap" data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2760_05.jpg" title="스케줄" >
                <a href="https://police.willbes.net/pass/offinfo/boardInfo/index/80" target="_blank" title="강의시간표" style="position: absolute; left: 30.63%; top: 77.44%; width: 38.66%; height: 10.01%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox" data-aos="fade-right" id="evt06">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2760_06.jpg" title="소문내기 이벤트">
                <a href="" title="할인쿠폰받기" style="position: absolute; left: 27.32%; top: 57.02%; width: 45.18%; height: 5.05%; z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이벤트 이미지 다운로드" style="position: absolute; left: 57.32%; top: 73.93%; width: 29.46%; height: 5.05%; z-index: 2;"></a>
            </div>
        </div> 

        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif 

        <div class="evtCtnsBox evt07" id="evt07" data-aos="fade-up">
            <div class="mb20"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_07_01.jpg" title="단과"></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
            <div class="mt100 mb20"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_07_02.jpg" title="종합반"></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif
        </div>

	</div>
    <!-- End Container -->

    <script type="text/javascript"> 
        //상단배너
        $(function(){ 
            var slidesImg = $(".tabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                slideWidth: 860,
                speed:400,
                pause:3000,
                auto : true,	
                autoHover: true,						
                pagerCustom: '#RollingDiv',
                controls:false, 				
                onSliderLoad: function(){
                    $("#RollingSlider").css("visibility", "visible").animate({opacity:1}); 
                }
            });			
        }); 
    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );      
    </script>
@stop