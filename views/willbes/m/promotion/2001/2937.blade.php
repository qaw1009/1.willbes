@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .Visual {padding:0 20px 50px; width:100%; background:#33323C; text-align:center;}
    .VisualBox .tabSlider img {width:100%; max-width:650px; margin:0 auto}

    .VisualBox .RollingTab {
        margin-top:30px;            
        display: flex;
        justify-content: space-between;
    }
    .VisualBox .bx-wrapper {border:0; margin:0; background:transparent; box-shadow: 0 0 0;}
    .VisualBox .RollingTab a{
        display: block;
        width:20%;
        font-size: 2vh;
        padding:15px 0;
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
        color: #363636;
        font-weight: 600; background:#fff
    }

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evt_top" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2937m_top.jpg"  alt="4.3일 개강 올인원 이론완성반" />        
    </div>

    <div class="evtCtnsBox evt01" id="evt_01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2937m_01.jpg" alt="교수진"/>       
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2937m_02.jpg" alt="왜 올인원이론반인가?"/>       
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2937m_03.jpg" alt="교수진 홈"/>       
    </div>    

    <div class="Visual">        
        <div class="VisualBox">            
            <div id="RollingSlider">
                <ul class="tabSlider">
                    <li><a href="https://police.willbes.net/promotion/index/cate/3001/code/2236" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937m_03_01.png" alt="헌법 이국령"></a></li>
                    <li><a href="https://police.willbes.net/m/professor/show/cate/3001/prof-idx/51394?subject_idx=2127" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937m_03_02.png" alt="형사법 임종희"></a></li>
                    <li><a href="https://police.willbes.net/m/professor/show/cate/3001/prof-idx/51389?subject_idx=2127" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937m_03_03.png" alt="형사법 김한기"></a></li>
                    <li><a href="https://police.willbes.net/m/professor/show/cate/3001/prof-idx/51393?subject_idx=2127" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937m_03_04.png" alt="형사법 김효범"></a></li>
                    <li><a href="https://police.willbes.net/m/professor/show/cate/3001/prof-idx/51424?subject_idx=2128" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/03/2937m_03_05.png" alt="경찰학 김재규"></a></li>
                </ul>
            </div> 
            <div id="RollingDiv" class="tabList">
                <div class="RollingTab">
                    <a data-slide-index="0" href="javascript:void(0);" class="active">헌법<br> 이국령</a>
                    <a data-slide-index="1" href="javascript:void(0);" class="">형사법<br> 임종희</a>
                    <a data-slide-index="2" href="javascript:void(0);" class="">형사법<br> 김한기</a>
                    <a data-slide-index="3" href="javascript:void(0);" class="">형사법<br> 김효범</a>
                    <a data-slide-index="4" href="javascript:void(0);" class="">경찰학<br> 김재규</a>
                </div>
            </div>           
        </div>        
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2937m_04.jpg" title="스케줄"> 
        <a href="https://police.willbes.net/m/pass/offinfo/boardInfo/index/80" title="강의시간표 확인" target="_blank" style="position: absolute;left: 18.75%;top: 85.32%;width: 61.94%;height: 7.22%;z-index: 2;"></a>     
    </div>

    <div class="evtCtnsBox mt50" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2937m_05_02.jpg" title="단과"/>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif
    </div>

    <div class="evtCtnsBox mt50" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2937m_05_01.jpg" title="종합반"/>  
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
        @endif       
    </div>  
    
</div>


<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
    <script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript"> 
        $(document).ready(function() {
            var slidesImg = $(".tabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
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
    $(document).ready( function() {
    AOS.init();
    });
</script>



@stop