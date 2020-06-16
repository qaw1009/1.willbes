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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/06/1665_top_bg.jpg) no-repeat center top}
        .evtTop div {position:absolute; top:25px; left:50%; margin-left:200px; width:360px; height:100px; z-index:10;}
        .evtTop div a {display:block; float:left; width:90px; height:100px; font-size:0; text-indent: -9999px;}
        .evtTop div:after {content:""; display:block; clear:both}

        .evtTop_01{background:#4d79f6}

        .evt01 {background:#c09260; padding-bottom:100px}        
        .evt01 .review {position:absolute; top:298px; left:50%; margin-left:-483px; width:966px; height:60px; z-index:5; overflow:hidden;}
        .evt01 .review li {font-size:16px; color:#000; text-align:left; padding-left:200px}
        .evt01 .review li p {position:relative; width:100%; overflow:hidden; white-space:nowrap; height:60px; line-height: 60px; text-overflow:ellipsis; padding:0 15% 0 0}
        .evt01 .review span {position:absolute; top:0; width:80px; right:0; height:60px; line-height: 60px;  z-index:5; text-align:center}
        .evt01 .youtube iframe {width:960px; height:540px; margin:0 auto}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1665_02_bg.jpg) no-repeat center top}
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1665_03_bg.jpg) no-repeat center top}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_top.jpg" alt="" > 
            <div>
                <a href="#none">이시한교수</a>
                <a href="/promotion/index/cate/3114/code/1666">이승기PD</a>
                <a href="/promotion/index/cate/3114/code/1668">안혜빈대표</a>
                <a href="/promotion/index/cate/3114/code/1669">이기용대표</a>
            </div>
        </div> 
        <div class="evtCtnsBox evtTop_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_top_01.gif" alt="" > 
        </div> 
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_01.jpg" alt="" > 
            <div class="review">
                <ul>
                    <li><p>유튜브에서 제 아는척 지식을 담당해주는 교수님! 소문듣고 왔어용 강의기대할게요^0^<span>(황연*)</span></p></li>
                    <li><p>저도 성공적인 유튜브 꼭 하고싶습니다 교수님~!!!<span>(최승**)</span></p></li>
                    <li><p>유튜버도 이제는 2세대! 뭔가 변했다 생각했는데 이렇게 분석해주시다니, 기대하겠습니다!<span>(박우*)</span></p></li>
                    <li> <p>낯이 익었는데, 문제적남자에서 봤네요 역시! 강의 기대하겠습니다~!<span>(이정*)</span></p></li>
                    <li><p>영상 중 하고싶은 걸 하자 라는 얘기가 너무 와닿네요. 좋은말씀 감사합니다.<span>(김제*)</span></p></li>                    
                </ul>
            </div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/OzRyEe5Vops?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_02.jpg" alt="" > 
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