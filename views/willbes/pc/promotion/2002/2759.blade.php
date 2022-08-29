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

        .sky {position:fixed;top:200px;right:10px; width:188px; z-index:1;}
        .sky a {display:block;margin-bottom:10px}

        .evtTop,
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2022/08/2740_bg.jpg);}
       
        .evt01 iframe {width:860px; height:484px; margin:0 auto; border:1px solid #000}
        .evt03 {background:#eaeff5;}
        
    </style>

    <div class="evtContent NSK" id="evtContainer">
    
        <div class="sky" id="QuickMenu">
            <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/200672" target=_blank><img src="https://static.willbes.net/public/images/promotion/2022/08/2740_sky.png" alt="최종점검 모의고사" ></a>      
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2759_top.jpg" alt="인천 캠퍼스 면접캠프" />
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2740_01_01.jpg" alt=""/><br>
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2740_01_bg.jpg" alt=""/><br>
            {{--<iframe src="https://www.youtube.com/embed/ylgelTRQ69U" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>--}}
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2740_01_02.jpg" alt=""/>
		</div> 
        
        <div class="evtCtnsBox evt02" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2740_02.jpg" alt="왜 신승철 면접인가?"/>          
		</div> 

        <div class="evtCtnsBox evt03" data-aos="fade-right">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2759_03.jpg" alt="면접캠프 스케쥴"/>           
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/200672" target="_blank" title="면접캠프 신청하기" style="position: absolute;left: 33.21%;top: 65.54%;width: 33.39%;height: 5.93%;z-index: 2;"></a>
            </div>            
		</div> 

        <div class="evtCtnsBox evt04" data-aos="fade-right">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2740_04.jpg" alt="면접 무료특강"/>   
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/179389" target="_blank" title="무료특강" style="position: absolute; left: 24.29%; top: 40.37%; width: 20.98%; height: 6.18%; z-index: 2;"></a>       
            </div>
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
@stop