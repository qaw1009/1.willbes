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
        .evtTop_01{background:#4d79f6}

        .evt01 {background:#787878; padding-bottom:100px}        
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
        </div> 
        <div class="evtCtnsBox evtTop_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_top_01.jpg" alt="" > 
        </div> 
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665_01.jpg" alt="" > 
            <div class="review">
                <ul>
                    <li>
                        <p>수집 및 이용 목적: 사전예약 이벤트 응모자 관리, 당첨자 쿠폰 배송, 이벤트 관련 문의 응대 및 공지사항 안내<span>(홍**)</span></p>
                        <p>당첨발표시 동일인으로 확인 될 경우 강의 제공은 한 개의 아이디만 당첨으로 인정합니다.<span>(김**)</span></p>
                        <p>멋진 강의 완전 기대됩니다. 유튜브에서 보고 완전 팬이에요. 유튜브에서 보고 완전 팬이에요,  멋진 강의 완전 기대됩니다.<span>(최**)</span></p>
                    </li>
                    <li>
                        <p>유튜브에서 보고 완전 팬이에요. 멋진 강의 완전 기대됩니다. 유튜브에서 보고 완전 팬이에요. 멋진 강의 완전 기대됩니다.<span>(홍**)</span></p>
                        <p>당첨발표시 동일인으로 확인 될 경우 강의 제공은 한 개의 아이디만 당첨으로 인정합니다.<span>(김**)</span></p>
                        <p>사전예약 쿠폰은 7월 1일(월) 발급 예정입니다.(신청자에 한함)<span>(최**)</span></p>
                    </li>
                    <li>
                        <p>당첨발표시 동일인으로 확인 될 경우 강의 제공은 한 개의 아이디만 당첨으로 인정합니다.<span>(김**)</span></p>
                        <p>유튜브에서 보고 완전 팬이에요. 멋진 강의 완전 기대됩니다. 유튜브에서 보고 완전 팬이에요. 멋진 강의 완전 기대됩니다.<span>(홍**)</span></p>                        
                        <p>멋진 강의 완전 기대됩니다. 유튜브에서 보고 완전 팬이에요.  멋진 강의 완전 기대됩니다.<span>(최**)</span></p>
                    </li>
                </ul>
            </div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/OzRyEe5Vops" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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