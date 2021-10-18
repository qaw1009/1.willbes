@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {width:100% !important;min-width:1120px !important;margin-top:20px !important;padding:0 !important;background:#fff;}
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/
        .sky {position:fixed;top:150px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}
        .evt00 {background:#0a0a0a}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/10/2387_top_bg.jpg) no-repeat center top;}
        .evt01{background-color: #014ee5;}
        .evt02 {padding-top: 170px;}
        .evt04{padding-bottom: 50px;}
        .evt04 > img{padding: 40px 0;}

        .evtTab {width:890px; margin:0 auto; padding-bottom: 80px; display: flex; justify-content: center; align-items: flex-end;}
        .evtTab li {width:50%;}
        .evtTab li a {display:block; color:#868686; font-size:32px; padding:20px 30px; border:8px solid #868686;  font-weight:900; letter-spacing: -2px;}
        .evtTab li a span{font-size: 18px; vertical-align: baseline;}
        .evtTab li:first-child a {border-right:0}
        .evtTab li:last-child a {border-left:0}
        .evtTab li a:hover,
        .evtTab li a.active {color:#000; border:8px solid #000; font-size: 38px; padding:30px; }
        .evtTab li a:hover span,
        .evtTab li a.active span{font-size: 20px;}
        .evtTab:after {content:''; display:block; clear:both}


    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위" />
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2387_top.jpg" alt="이국령의 경찰 헌법 도약" />
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2387_01.jpg" alt="왜 이국령을 선택해야하나" />
        </div>

        <div class="evtCtnsBox evt02">
            <ul class="evtTab">
                <li><a href="#tab01">2021년 수험생대상<span>(재시생)</span></a></li>
                <li><a href="#tab02">2022년 수험생대상<span>(초시생)</span></a></li>
            </ul>
            <div id="tab01"><img src="https://static.willbes.net/public/images/promotion/2021/10/2387_02_01.jpg" alt="이국령 헌법속성반" /></div>
            <div id="tab02"><img src="https://static.willbes.net/public/images/promotion/2021/10/2387_02_02.jpg" alt="이국령 헌법 기본이론" /></div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2387_03.jpg" alt="2022 합격대비 커리큘럼" />
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2387_04.jpg" alt="국령쌤 추천강좌" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  
        </div>



    </div>
    <!-- End evtContainer -->


    <script type="text/javascript">
        /*탭*/
        $(document).ready(function(){
            $('.evtTab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);
                $links.not($active).each(function () {
                    $(this.hash).hide()
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault();
                });
            });
        });

        
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop