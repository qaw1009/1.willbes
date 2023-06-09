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
       
        .evt01 object {width:860px; height:484px; margin:0 auto; border:1px solid #000}
        .evt03 {background:#eaeff5;}

    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2022/08/2740_sky.png" alt="최종점검 모의고사" ></a>      
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2740_top.jpg" alt="신승철 면접캠프" />
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2740_01_01.jpg" alt=""/><br>            
            <object data="https://www.youtube.com/embed/KNUV0otKQ1c?rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></object><br>
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2740_01_02.jpg" alt=""/>
		</div> 
        
        <div class="evtCtnsBox evt02" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2740_02.jpg" alt="왜 신승철 면접인가?"/>          
		</div> 

        <div class="evtCtnsBox evt03" id="apply">
            <div class="wrap" data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2740_03.jpg" alt="면접캠프 스케쥴"/>                
                <a href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1069&course_idx=1047&campus_ccd=605001" target="_blank" title="인적성 검사" style="position: absolute; left: 59.64%; top: 27.94%; width: 22.95%; height: 9.63%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&course_idx=1047&campus_ccd=605001" target="_blank" title="면접캠프 신청하기" style="position: absolute; left: 33.21%; top: 81.54%; width: 33.39%; height: 3.93%; z-index: 2;"></a>
            </div>            
		</div> 

        <div class="evtCtnsBox evt04" data-aos="fade-right">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2740_04_01.jpg" alt="면접 무료특강"/>   
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/200889" target="_blank" title="전화답변요령" style="position: absolute; left: 24.46%; top: 34.78%; width: 20.27%; height: 5.51%;z-index: 2;"></a>       
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/200890" target="_blank" title="서류작성법" style="position: absolute; left: 24.46%; top: 46.69%; width: 20.27%; height: 5.51%;z-index: 2;"></a> 
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