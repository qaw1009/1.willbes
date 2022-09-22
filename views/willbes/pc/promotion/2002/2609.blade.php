@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
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

        .sky {position:fixed;top:150px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:-1px}
       
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/03/2609_top_bg.jpg) no-repeat center top;}

        .evt01 {padding-top:150px}

         /*탭*/   
        .evtTab {width:1120px; margin:0 auto}
        .evtTab li {display:inline; float:left; width:50%}
        .evtTab li a {display:block; color:#cdcdcd; font-size:24px; padding:20px 0; border:3px solid #f5f5f7; background:#f5f5f7; font-weight:bold}
        .evtTab li a:hover,
        .evtTab li a.active {color:#333; background:#fff; border:3px solid #9fa5b0; border-bottom-color:#fff}
        .evtTab:after {content:''; display:block; clear:both}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2603" target="_blank"  >
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2609_sky01.png" alt="온라인 추천강좌"/>
            </a>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2609_sky02.png" alt="타학원 환승"/>
            </a>                      
        </div>      

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2609_top.jpg" alt="추천강좌" />
        </div>   

        <div class="evtCtnsBox evt01" data-aos="fade-up">     
            <ul class="evtTab">
                <li><a href="#tab01">초시생 (23년 대비)</a></li>
                <li><a href="#tab02">재시생 (22년 대비)</a></li>
            </ul>

            <div data-aos="fade-up" id="tab01">      
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2609_01_01.jpg" alt="12개월" />              
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2609_01_02.jpg" alt="12개월" />
                    <a href="https://police.willbes.net/pass/offPackage/show/prod-code/192675" target="_blank" alt="헌법 김원욱" style="position: absolute; left: 18.13%; top: 52.13%; width: 20%; height: 7.1%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/pass/offPackage/show/prod-code/192677" target="_blank" alt="헌법 이국령" style="position: absolute; left: 61.88%; top: 52.13%; width: 20%; height: 7.1%; z-index: 2;"></a>
                </div>                                    
            </div>                

            <div data-aos="fade-up" id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2609_02_01.jpg" alt="6개월" />
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2609_02_02.jpg" alt="6개월" />
                    <a href="https://police.willbes.net/pass/offPackage/show/prod-code/190296" target="_blank" alt="헌법 김원욱" style="position: absolute; left: 11.07%; top: 52.24%; width: 20%; height: 7.1%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/pass/offPackage/show/prod-code/190297" target="_blank" alt="헌법 이국령" style="position: absolute; left: 40%; top: 52.24%; width: 20%; height: 7.1%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/pass/offPackage/show/prod-code/190298" target="_blank" alt="경행경채" style="position: absolute; left: 68.93%; top: 52.24%; width: 20%; height: 7.1%; z-index: 2;"></a>                       
                </div>              
            </div>            
        </div>

    </div>

    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $(document).ready( function(){
        AOS.init();
      });
    </script>

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