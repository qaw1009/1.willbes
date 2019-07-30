@extends('willbes.m.layouts.master')
@section('content')
<link href="/public/css/willbes/promotion/2002_1332M.css" rel="stylesheet">
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div class="predictWrap">
            @include('willbes.m.predict.1211_promotion_partial')
        </div>
        <!-- predictWrap //-->

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(function() {
            $('.tg-tit a').click(function() {
                var $lec_buy_table = $('.tg-cont');

                if ($lec_buy_table.is(':hidden')) {
                    $lec_buy_table.show().css('visibility','visible');
                    $('.tg-tit a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_off_white.png');
                } else {
                    $lec_buy_table.hide().css('visibility','hidden');
                    $('.tg-tit a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_on_white.png');
                }
            });
        });
    </script>
    <!-- WIDERPLANET  SCRIPT START 2019.2.18 -->
    <div id="wp_tg_cts" style="display:none;"></div>
    <script type="text/javascript">
        var wptg_tagscript_vars = wptg_tagscript_vars || [];
        wptg_tagscript_vars.push(
            (function() {
                return {
                    wp_hcuid:"",   /*고객넘버 등 Unique ID (ex. 로그인  ID, 고객넘버 등 )를 암호화하여 대입.
				*주의 : 로그인 하지 않은 사용자는 어떠한 값도 대입하지 않습니다.*/
                    ti:"30030",	/*광고주 코드 */
                    ty:"Home",	/*트래킹태그 타입 */
                    device:"web"	/*디바이스 종류  (web 또는  mobile)*/

                };
            }));
    </script>
    <script type="text/javascript" async src="//cdn-aitg.widerplanet.com/js/wp_astg_4.0.js"></script>
    <!-- // WIDERPLANET  SCRIPT END 2019.2.18 -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-69505110-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-69505110-4');
    </script>
    <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
    <script type="text/javascript">
        kakaoPixel('6331763949938786102').pageView('willbescop');
    </script>
@stop
