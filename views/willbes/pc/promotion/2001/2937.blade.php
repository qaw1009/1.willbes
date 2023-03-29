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


        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2023/03/2937_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#F2F2F2}
    
        .evt03 {background:#34323D}        

        .Visual {padding-bottom:150px; width:100%; background:#34323D; text-align:center;}
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
            color: #CDCDCD;
            background:#4D4D51;
            text-align: center;
            margin-right:5px;
        }

        .VisualBox .RollingTab a:last-child {
            margin-right:0;
        }

        .VisualBox .RollingTab a.active,
        .VisualBox .RollingTab a:hover {
            color: #191919;
            font-weight: 600; background:#fff
        }

        .evt04 {background:#E9E5DA}
        .evt04 div a {width:420px; margin:0 auto 20px; display:block; padding:30px 20px 30px 50px; border-radius:50px; color:#fff; background:#000; font-size:30px; box-shadow: 0 15px 30px rgba(0,0,0,.2);}
        .evt04 div a:hover,
        .evt04 div a:hover{color:#000; background:#fff}

        .evt05 {padding:100px 0;}
          
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">          
            <a href="#evt05_02"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937_sky02.png" title="단과반"></a>
            <a href="#evt05_01"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937_sky01.png" title="종합반"></a>           
        </div>

        <div class="evtCtnsBox evt_top" data-aos="fade-down" >           
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2937_top.jpg" title="4.3일 개강 올인원 이론완성반">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2937_01.jpg" title="교수진">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2937_02.jpg" title="왜 올인원이론반인가?">
        </div>    

        <div class="Visual" data-aos="fade-up">
            <div><img src="https://static.willbes.net/public/images/promotion/2023/03/2937_03.jpg" title="교수진 홈"></div>
            <div class="VisualBox">            
                <div id="RollingSlider">
                    <ul class="tabSlider">
                        <li><a href="https://police.willbes.net/promotion/index/cate/3001/code/2236" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937_03_01.png" alt="헌법 이국령"></a></li>
                        <li><a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51394?subject_idx=2127" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937_03_02.png" alt="형사법 임종희"></a></li>
                        <li><a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51389?subject_idx=2127" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937_03_03.png" alt="형사법 김한기"></a></li>
                        <li><a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51393?subject_idx=2127" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937_03_04.png" alt="형사법 김효범"></a></li>
                        <li><a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51424?subject_idx=2128" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937_03_05.png" alt="경찰학 김재규"></a></li>
                    </ul>
                </div> 
                <div id="RollingDiv" class="tabList">
                    <div class="RollingTab">
                        <a data-slide-index="0" href="javascript:void(0);" class="active">헌법 이국령</a>
                        <a data-slide-index="1" href="javascript:void(0);" class="">형사법 임종희</a>
                        <a data-slide-index="2" href="javascript:void(0);" class="">형사법 김한기</a>
                        <a data-slide-index="3" href="javascript:void(0);" class="">형사법 김효범</a>
                        <a data-slide-index="4" href="javascript:void(0);" class="">경찰학 김재규</a>
                    </div>
                </div>           
            </div>        
        </div>

        <div class="evtCtnsBox evt04 pb100" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2937_04.jpg" title="스케줄" >
            </div>
            <div>
                <a href="https://police.willbes.net/pass/offinfo/boardInfo/index/80" target="_blank"><strong>강의시간표</strong> 확인하기 ></a>
            </div>
        </div>        

        <div class="evtCtnsBox evt05" data-aos="fade-up">          
            <div class="mt100 mb20"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937_05_02.jpg" title="단과" id="evt05_02"></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
            <div class="mb20"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937_05_01.jpg" title="종합반" id="evt05_01"></div>
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