@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;ㄴ
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5); border-radius:4px}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2336_top_bg.jpg) no-repeat center; background-size:2000px 888px; height:888px; position: relative;}

        .evtTop span {position:absolute; top:100px; left:50%; margin-left:-80px;}
	
        .evt01 {background:#f7f5f7; position: relative;}
        .evt01 iframe {width:740px; height:378px; position:absolute; top:423px; left:50%; margin-left:-370px; z-index: 2;}
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <span data-aos="fade-right">
			    <img src="https://static.willbes.net/public/images/promotion/2021/08/2336_top.png"  alt="신광은 면접캠프" />
            </span>
		</div>

        <div class="evtCtnsBox evt01">
            <iframe  src="https://www.youtube.com/embed/ylgelTRQ69U" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen  data-aos="fade-left"></iframe>
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2336_01.jpg" alt=""/>
		</div> 
        
        <div class="evtCtnsBox">
            <div class="wrap" data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2336_02.jpg" alt="인적성 검사"/>
                <a href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1069&course_idx=1047&campus_ccd=605001" target="_blank" title="인적성 검사" style="position: absolute; left: 71.43%; top: 39.75%; width: 16.07%; height: 17.08%; z-index: 2;"></a>
            </div>

            <div class="wrap" data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2336_03.jpg" alt="접수안내"/>
                <a href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&course_idx=1047&campus_ccd=605001" target="_blank" title="검사 신청하기" style="position: absolute; left: 72.86%; top: 32.5%; width: 16.07%; height: 17.36%; z-index: 2;"></a>
            </div>

            <div class="wrap" data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2336_04.jpg" alt=""/>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/179389" target="_blank" title="정보과 전화 답변 요령" style="position: absolute; left: 22.59%; top: 46.56%; width: 20.54%; height: 6.27%; z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/179387" target="_blank" title="서류작성법" style="position: absolute; left: 56.61%; top: 46.56%; width: 20.54%; height: 6.27%; z-index: 2;"></a>
            </div>            
		</div> 
       
	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
        $( document ).ready( function() {
            AOS.init();
        } );
    </script>
@stop