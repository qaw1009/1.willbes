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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/11/2425_top_bg.jpg) no-repeat center top;}

        .evt_tab {padding-top:125px;}

        .mid {background:#f4f4f4;}

         /*탭*/   
        .evtTab {width:890px; margin:0 auto}
        .evtTab li {display:inline; float:left; width:50%}
        .evtTab li a {display:block; color:#ababab; font-size:24px; padding:20px 0; border:5px solid #ababab;font-weight:bold}
        .evtTab li:first-child a {border-right:0}
        .evtTab li:last-child a {border-left:0}
        .evtTab li a:hover,
        .evtTab li a.active {color:#fff; border:5px solid #000;background:#101010;}
        .evtTab:after {content:''; display:block; clear:both}
      
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="javascript:alert('Coming Soon!')"  >
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2425_sky.png" alt="온라인 추천강좌"/>
            </a>                      
        </div>

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위" />
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2425_top.jpg" alt="12월 추천강좌" />
        </div>   

        <div class="evtCtnsBox evt_tab" data-aos="fade-top">     
            <ul class="evtTab">
                <li><a href="#tab01">22년 1차 합격반</a></li>
                <li><a href="#tab02">22년 2차 합격반</a></li>
            </ul>
            <div id="tab01">
                <div class="evtCtnsBox evt01" data-aos="fade-top">
                    <div>
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2425_01_01.jpg" alt="" />                      
                    </div>
                    <div class="mid">
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2425_01_02.jpg" alt="" />                   
                    </div>
                    <div class="wrap">
                        <img src="https://static.willbes.net/public/images/promotion/2021/11/2425_02.jpg" alt="" />
                        <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" title="신청하기" target="_blank" style="position: absolute;left: 15.45%;top: 57.92%;width: 15.14%;height: 6.24%;z-index: 2;"></a>                      
                        <a href="javascript:alert('Coming Soon!')" title="신청하기" style="position: absolute;left: 68.15%;top: 73.92%;width: 15.14%;height: 7.24%;z-index: 2;"></a>               
                    </div>            
                </div>                
            </div>
            <div id="tab02">
                <div class="evtCtnsBox evt01" data-aos="fade-top">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2021/11/2425_03_01.jpg" alt="" />                           
                        </div>
                        <div class="mid">
                            <img src="https://static.willbes.net/public/images/promotion/2021/11/2425_03_02.jpg" alt="" />                       
                        </div>
                        <div class="wrap">
                            <img src="https://static.willbes.net/public/images/promotion/2021/11/2425_04.jpg" alt="" />
                            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/187520" title="신청하기" target="_blank" style="position: absolute;left: 15.45%;top: 55.42%;width: 15.14%;height: 6.24%;z-index: 2;"></a>
                            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/187545" title="신청하기" target="_blank" style="position: absolute;left: 42.45%;top: 55.42%;width: 15.14%;height: 6.24%;z-index: 2;"></a>
                            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/187546" title="신청하기" target="_blank" style="position: absolute;left: 69.45%;top: 55.42%;width: 15.14%;height: 6.24%;z-index: 2;"></a>               
                        </div>            
                    </div>                
                </div>
            </div>             
        </div>

    </div>

    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
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