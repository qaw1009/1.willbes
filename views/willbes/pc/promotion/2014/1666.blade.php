@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/06/1666_top_bg.jpg) no-repeat center top}
        .evtTop div {position:absolute; top:25px; left:50%; margin-left:200px; width:360px; height:100px; z-index:10;}
        .evtTop div a {display:block; float:left; width:90px; height:100px; font-size:0; text-indent: -9999px;}
        .evtTop div:after {content:""; display:block; clear:both}

        .evt01 {background:#787878; padding-bottom:100px}        
        .evt01 .review {position:absolute; top:338px; left:50%; margin-left:-483px; width:966px; height:60px; z-index:5; overflow:hidden;}
        .evt01 .review li {font-size:16px; color:#000; text-align:left; padding-left:200px}
        .evt01 .review li p {position:relative; width:100%; overflow:hidden; white-space:nowrap; height:60px; line-height: 60px; text-overflow:ellipsis; padding:0 15% 0 0}
        .evt01 .review span {position:absolute; top:0; width:80px; right:0; height:60px; line-height: 60px;  z-index:5; text-align:center}
        .evt01 .youtube iframe {width:960px; height:540px; margin:0 auto}

        .evt02 {background:#ffd55d}
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1665_03_bg.jpg) no-repeat center top}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1666_top.jpg" alt="" > 
            <div>
                <a href="/promotion/index/cate/3114/code/1666">이시한교수</a>
                <a href="#none">이승기PD</a>
                <a href="/promotion/index/cate/3114/code/1668">안혜빈대표</a>
                <a href="/promotion/index/cate/3114/code/1669">이기용대표</a>
            </div>
        </div>         
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1666_01.jpg" alt="" > 
            <div class="review">
                <ul>
                    <li><p>싹피디님 유튜브 튜토리얼을 너무 잘봤습니다! 진행하실 강의도 기대하겠습니다!<span>(황연*)</span></p></li>
                    <li><p>공식 유튜브 보고 왔어요!! 4일만에 만명 저도 가능하도록 부탁 드리겠습니다 피디님~!<span>(최승*)</span></p></li>
                    <li><p>유튜브에 성공 방정식이라니! PD님의 알짜배기 정보 기다리겠습니다~!<span>(조성*)</span></p></li>
                    <li><p>유튜브 하고픈 마음은 컸는데 도전할 용기가 안났는데, 이강의면 가능하겠어요!<span>(마문*)</span></p></li>
                    <li><p>목소리와 말이 굉장히 딱 머리에 박히네요! PD님 따라 유튜브로 수익내기 도전합니다!<span>(신승*)</span></p></li>
                    <li><p>유튜브가 저의 투잡이 될 수 있도록 도와주세요 PD님!!<span>(장재*)</span></p></li>                    
                </ul>
            </div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/NZLPO-a3JxY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1666_02.jpg" alt="" > 
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_03.jpg" alt="" usemap="#MapbtnGo" border="0" >
            <map name="MapbtnGo">
                <area shape="rect" coords="313,854,807,964" href="/promotion/index/cate/3114/code/1664" target="_blank" alt="사전예약하기">
            </map>
        </div>
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            var collaboslides = $(".review ul").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:750,
                pause:3000,
                pager:false,
                controls:false,
                minSlides:3,
                maxSlides:3, 
                moveSlides:3,
            });
        });
    </script>
@stop