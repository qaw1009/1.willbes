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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/02/2524_top_bg.jpg) no-repeat center top;}

        .evt_tab {padding-top:125px;}

        .mid2 {background:#f1f1f1;}
        .end {background:#5b3534;}

         /*탭*/   
        .evtTab {width:780px; margin:0 auto}
        .evtTab li {display:inline; float:left; width:50%}
        .evtTab li a {display:block; color:#ababab; font-size:24px; padding:20px 0; border:5px solid #ababab;font-weight:bold}
        .evtTab li:first-child a {border-right:0}
        .evtTab li:last-child a {border-left:0}
        .evtTab li a:hover,
        .evtTab li a.active {color:#fff; border:5px solid #000;background:#101010;}
        .evtTab:after {content:''; display:block; clear:both}

        .mid2 {position:relative;}
        .mid2 .curri00{position:absolute;left:31%;top:27%;margin-left:-100px;}
        .mid2 .curri01{position:absolute;left:48%;top:27%;margin-left:-100px;}
        .mid2 .curri02{position:absolute;left:64%;top:27%;margin-left:-100px;}
        .mid2 .curri03{position:absolute;left:80%;top:27%;margin-left:-100px;}
        .mid2 .curri04{position:absolute;left:31%;top:46%;margin-left:-100px;}
        .mid2 .curri05{position:absolute;left:55%;top:46%;margin-left:-100px;}
        .mid2 .curri06{position:absolute;left:79%;top:46%;margin-left:-100px;}

        .mid2 div a img.on {display:none;}
        .mid2 div a img.off {display:block}
        .mid2 div a.active img.on,
        .mid2 div a:hover img.on {display:block;}
        .mid2 div a.active img.off,
        .mid2 div a:hover img.off {display:block}
        .mid2 div:after {content:""; display:block; clear:both}
      
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2469" target="_blank"  >
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2524_sky.png" alt="온라인 추천강좌"/>
            </a>                      
        </div>       

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2524_top.jpg" alt="추천강좌" />
        </div>   

        <div class="evtCtnsBox evt_tab" data-aos="fade-up">     
            <ul class="evtTab">
                <li><a href="#tab01">초시생 (23년 대비)</a></li>
                <li><a href="#tab02">재시생 (22년 대비)</a></li>
            </ul>
            <div id="tab01">
                <div class="evtCtnsBox evt01" data-aos="fade-up">                    
                    <div class="wrap">
                        <img src="https://static.willbes.net/public/images/promotion/2022/02/2524_01_01.jpg" alt="12개월" />
                        <a href="https://police.willbes.net/pass/offPackage/show/prod-code/191863" target="_blank" alt="헌법 김원욱" style="position: absolute;left: 18.25%;top: 83.99%;width: 19.84%;height: 2.45%;z-index: 2;"></a>
                        <a href="https://police.willbes.net/pass/offPackage/show/prod-code/191868" target="_blank" alt="헌법 이국령" style="position: absolute;left: 61.99%;top: 83.99%;width: 19.84%;height: 2.45%;z-index: 2;"></a>
                    </div>                                    
                </div>                
            </div>
            <div id="tab02">
                <div class="evtCtnsBox evt01" data-aos="fade-up">
                    <div class="wrap">
                        <img src="https://static.willbes.net/public/images/promotion/2022/02/2524_01_02.jpg" alt="6개월" />
                        <a href="https://police.willbes.net/pass/offPackage/show/prod-code/190293" target="_blank" alt="헌법 김원욱" style="position: absolute;left: 11.05%;top: 83.99%;width: 19.84%;height: 2.45%;z-index: 2;"></a>
                        <a href="https://police.willbes.net/pass/offPackage/show/prod-code/190294" target="_blank" alt="헌법 이국령" style="position: absolute;left: 40.11%;top: 83.99%;width: 19.84%;height: 2.45%;z-index: 2;"></a>
                        <a href="https://police.willbes.net/pass/offPackage/show/prod-code/190295" target="_blank" alt="경행경채" style="position: absolute;left: 69.15%;top: 83.99%;width: 19.84%;height: 2.45%;z-index: 2;"></a>                       
                    </div>
                    {{--
                    <div class="mid2">
                        <div class="wrap">
                            <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_02_02.jpg" class="off" alt="자세히 보기" />                                
                            <a href="javascript:alert('Coming Soon!')" style="position: absolute;left: 35.45%;top: 86.62%;width: 29.14%;height: 5.24%;z-index: 2;"></a>
                            <div class="curri00">                                
                                <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_speech.png" alt="" class="off">                          
                            </div> 
                            <div class="curri01">
                                <a href="#none;">
                                    <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_speech01.png" alt="" class="off">
                                    <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_bubble01.png" alt="" class="on">
                                </a>    
                            </div> 
                            <div class="curri02">
                                <a href="#none;">
                                    <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_speech02.png" alt="" class="off">
                                    <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_bubble02.png" alt="" class="on">
                                </a>    
                            </div>  
                            <div class="curri03">
                                <a href="#none;">                                 
                                    <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_speech03.png" alt="" class="off">
                                    <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_bubble03.png" alt="" class="on">
                                </a>    
                            </div>  
                            <div class="curri04">
                                <a href="#none;">
                                    <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_speech04.png" alt="" class="off">
                                    <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_bubble04.png" alt="" class="on">
                                </a>
                            </div>  
                            <div class="curri05">
                                <a href="#none;">
                                    <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_speech05.png" alt="" class="off">
                                    <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_bubble05.png" alt="" class="on">
                                </a>   
                            </div>  
                            <div class="curri06">
                                <a href="#none;">
                                    <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_speech06.png" alt="" class="off">
                                    <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_bubble06.png" alt="" class="on">
                                </a>    
                            </div>               
                        </div>                          
                    </div>
                    <div class="end">
                        <div class="wrap">
                            <img src="https://static.willbes.net/public/images/promotion/2022/01/2494_02_03.jpg" alt="종합반" />
                            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/190191" title="김원욱 기본형 신청하기" target="_blank" style="position: absolute;left: 16.95%;top: 39.92%;width: 14.72%;height: 4.54%;z-index: 2;"></a>                      
                            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/190192" title="이국령 헌법 신청하기" target="_blank" style="position: absolute;left: 42.55%;top: 39.92%;width: 14.72%;height: 4.54%;z-index: 2;"></a>
                            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/190197" title="경행경채 기본형 신청하기" target="_blank" style="position: absolute;left: 68.25%;top: 39.92%;width: 14.72%;height: 4.54%;z-index: 2;"></a>                      
                            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/190250" title="김원욱 심화형 신청하기" target="_blank" style="position: absolute;left: 16.95%;top: 66.22%;width: 14.72%;height: 4.54%;z-index: 2;"></a>
                            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/190193" title="이국령 심화형 신청하기" target="_blank" style="position: absolute;left: 42.55%;top: 66.22%;width: 14.72%;height: 4.54%;z-index: 2;"></a>                      
                            <a href="https://police.willbes.net/pass/offPackage/show/prod-code/190251" title="경행경채 심화형 신청하기"target="_blank" style="position: absolute;left: 68.25%;top: 66.22%;width: 14.72%;height: 4.54%;z-index: 2;"></a>             
                        </div>
                    </div>
                    --}}       
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