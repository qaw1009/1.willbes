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
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/03/2582_top_bg.jpg) no-repeat center; background-size:2000px 1050px; height:1050px; position: relative;}

        .evtTop span {position:absolute; bottom:0px; left:50%; margin-left:-670px;}        
        .evt01 iframe {width:740px; height:378px; margin:0 auto; border:1px solid #000}
        .evt02 {background:#eaeff5;}
        
    </style>


    <div class="evtContent NSK" id="evtContainer">           

        <div class="evtCtnsBox evtTop">
            <span data-aos="fade-right">
			    <img src="https://static.willbes.net/public/images/promotion/2022/03/2582_top_img.png"  alt="신광은 면접캠프" />
            </span>
		</div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2582_01_01.jpg" alt=""/><br>
            <iframe src="https://www.youtube.com/embed/ylgelTRQ69U" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2582_01_02.jpg" alt=""/>
		</div> 
        
        <div class="evtCtnsBox evt02">
            <div class="wrap" data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2582_02.jpg" alt="인적성 검사"/>
                <a href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1069&course_idx=1047&campus_ccd=605001" target="_blank" title="인적성 검사" style="position: absolute; left: 59.91%; top: 23.11%; width: 22.59%; height: 9.17%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&course_idx=1047&campus_ccd=605001" target="_blank" title="면접캠프 신청하기" style="position: absolute;  left: 33.3%; top: 83.07%; width: 33.21%; height: 3.29%;z-index: 2;"></a>
            </div>           
		</div> 

        <div class="evtCtnsBox evt03">
            <div class="wrap" data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2582_03.jpg" alt=""/>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/179389" target="_blank" title="정보과 전화 답변 요령" style="position: absolute; left: 19.2%; top: 50.69%; width: 26.61%; height: 5.06%; z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/179387" target="_blank" title="서류작성법" style="position: absolute; left: 54.2%; top: 50.69%; width: 26.61%; height: 5.06%; z-index: 2;"></a>
            </div>            
		</div> 
       
	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            AOS.init();
        });
    </script>
@stop