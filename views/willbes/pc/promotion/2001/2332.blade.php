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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .wrap {width:1120px; margin:0 auto; position:relative}
        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
        }
        .b-close {
            position: absolute;
            right: -30px;
            top: -30px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
            font-size: 22px;
            font-weight: bold;
            color:#fff;
        }
        .Pstyle .content {height:auto; width:auto;}        

        /************************************************************/
        .evttop {background:url("https://static.willbes.net/public/images/promotion/2021/09/2332_top_bg.jpg") no-repeat center top;}
        .evt02{background-color: #f5f5f5;}
        .evt03{background-color: #534741;}
        
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evttop">           
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2332_top.jpg" alt="지금 경찰 트렌드">   
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2332_01.jpg"  alt="경찰시험 최종 합격자 결정" data-aos="fade-left">
        </div>

        <div class="evtCtnsBox evt02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2332_02.jpg"  alt="자격증 등의 가산점 기준표" data-aos="fade-left">
                <a href="javascript:go_popup('#popup1');" title="가산점 크게보기" style="position: absolute; left: 7.14%; top: 39.66%; width: 40%; height: 51.43%; z-index: 2;"></a>
            </div>            
        </div>
        
        <div class="evtCtnsBox evt03">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2332_03.jpg"  alt="가산점 top5" data-aos="fade-left">
                <a href="#evt04" title="정보처리 자세히보기" style="position: absolute; left: 61.52%; top: 27.19%; width: 13.48%; height: 3.74%; z-index: 2;"></a>
                <a href="#evt05" title="국어 자세히보기" style="position: absolute; left: 61.79%; top: 36.98%; width: 13.48%; height: 3.74%; z-index: 2;"></a>
                <a href="#evt06" title="외국어 자세히보기" style="position: absolute; left: 61.61%; top: 46.69%; width: 13.48%; height: 3.74%; z-index: 2;"></a>
                <a href="#evt07" title="무도 자세히보기" style="position: absolute; left: 61.52%; top: 56.47%; width: 13.48%; height: 3.74%; z-index: 2;"></a>
                <a href="#evt08" title="재난안전관리 자세히보기" style="position: absolute; left: 61.61%; top: 66.33%; width: 13.48%; height: 3.74%; z-index: 2;"></a>
            </div>            
        </div>
        <div class="evtCtnsBox evt04" id="evt04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2332_04.jpg"  alt="정보처리" data-aos="fade-left">
                <a href="https://license.korcham.net/" title="자격증 홈페이지 바로가기" target="_blank" style="position: absolute; left: 30.27%; top: 84.4%; width: 39.02%; height: 4.11%; z-index: 2;"></a>
            </div>            
        </div>
        <div class="evtCtnsBox evt05" id="evt05">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2332_05.jpg"  alt="국어" data-aos="fade-left">
                <a href="http://www.klata.or.kr/main.html " title="자격증 홈페이지 바로가기" target="_blank" style="position: absolute; left: 30.27%; top: 84.4%; width: 39.02%; height: 4.11%; z-index: 2;"></a>
            </div>            
        </div>
        <div class="evtCtnsBox evt06" id="evt06">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2332_06.jpg"  alt="국어" data-aos="fade-left">
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1966#evt03" title="단기취득 비법 확인하기" target="_blank" style="position: absolute; left: 66.43%; top: 37.07%; width: 11.43%; height: 3.29%; z-index: 2;"></a>
                <a href="https://www.g-telp.co.kr:335/" title="g-telp 홈페이지 바로가기" target="_blank" style="position: absolute; left: 30.63%; top: 88.53%; width: 38.39%; height: 3.29%; z-index: 2;"></a>
            </div>            
        </div>
        <div class="evtCtnsBox evt07" id="evt07">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2332_07.jpg"  alt="무도" data-aos="fade-left">
                <a href="javascript:go_popup('#popup2');" title="크게보기" style="position: absolute; left: 31.16%; top: 42.88%; width: 37.59%; height: 31.47%; z-index: 2;"></a>
            </div>             
        </div>
        <div class="evtCtnsBox evt08" id="evt08">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2332_08.jpg"  alt="재난 안전 관리" data-aos="fade-left">
        </div>
	</div>
    <!-- End Container -->

    <div id="popup1" class="Pstyle">    
        <span class="b-close">X</span>
        <div class="content4">         
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2332_02_01.jpg"  alt="" />                           
        </div>
    </div>
    <div id="popup2" class="Pstyle">    
        <span class="b-close">X</span>
        <div class="content4">         
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2332_07_01.jpg"  alt="" />                           
        </div>
    </div>
    
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    /*레이어팝업*/
    function go_popup(id) {
        $(id).bPopup();
    }
    </script>
@stop