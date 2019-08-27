@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">
    <!-- Container -->
    <div class="p_re evtContent NSK-Thin" id="evtContainer">
        @include('willbes.pc.promotion.2001.1352_top')
        <div class="evtCtnsBox">
            <div class="s_section2">
                <div class="s_section2_wrap">
                    <h2><span>2019 2차 채점</span> 서비스</h2>
                    시험 채점 및 응시 전형에 필요한 개인 정보와 전형정보를 입력/관리하는 페이지입니다.
                    <div>
                        <p>채점 시 유의사항</p>
                        <ul>
                            <li>▶ 성적 신뢰도를 위해 최초채점을 제외하고 2회까지만 재채점을 통해 수정이 가능하오니, 신중하게 채점해 주시기 바랍니다.</li>
                            <li>▶ 채점하는 방식은 본인의 상황에 맞게 선택하실 수 있습니다.<br />
                                - <strong>'일반채점'</strong>은 문제창에서 바로 문제를 확인하면서 OMR 정답지에 답을 체크하는 방식입니다.<br />
                                - <strong>'빠른채점'</strong>은 시험지를 다운받아 문제를 풀어본 후, 문항별 선택 번호만 입력하는 방식입니다.<br />
                                - <strong>'직접입력'</strong>은 별도 채점 없이 본인의 점수를 직접 입력하는 방식입니다.<br />
                            </li>
                            <li>▶ 채점 후 '지금 성적을 반영합니다' 버튼을 반드시 눌러야 전형정보 관리에 성적이 반영됩니다.</li>
                            <li>▶ 기본정보는 사전예약 기간에만(~8/30) 수정이 가능하며, 본 서비스 오픈 후에는(8/31~) 수정이 불가합니다. </li>
                        </ul>
                    </div>
                </div>
            </div>

            @include('willbes.pc.predict.1352_promotion_partial')

        </div>
        <!--evtCtnsBox//-->

    </div>
    <!-- End Container -->
    <script>
        $(document).ready(function(){
            $('#mt2').addClass('active');
            $('ul.tabSt1').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})}
        );
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