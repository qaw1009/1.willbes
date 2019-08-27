@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">

    <!-- Container -->
    <div class="p_re evtContent NSK-Thin" id="evtContainer">
        {{--@include('willbes.pc.promotion.2001.1211_top')--}}
        @include('willbes.pc.promotion.2001.1352_top')

        <div class="evtCtnsBox">
            {{--4.26일까지 보여짐
            <div class="ddayBefore">
                <h1 class="NGEB">"이것만은 꼭! 시험 전 / 시험 당일 체크 포인트"</h1>
                <h2>시험 <span>전</span> 유의사항</h2>
                <table cellspacing="0" cellpadding="0" class="boardTypeB">
                    <col width="30%"/>
                    <col width=""/>
                    <tbody>
                    <tr>
                        <th>효율적인 공부시간에 집중적으로! </th>
                        <td>남은 기간 동안  최고의 효과를 내기 위해서 본인의 공부 스케쥴을 잡아라! </td>
                    </tr>
                    <tr>
                        <th>공부 분량 줄이자! </th>
                        <td>한 문제라도 더 맞겠다고 새로운 유형을 공부하거나, 공부 범위를 넓히게 되면 안 된다. </td>
                    </tr>
                    <tr>
                        <th>오답노트를 활용해서    공부하자! </th>
                        <td>가장 취약한 부분을 알 수 있는 오답노트를 정리했다면, <br />
                            시험 전까지 오답노트를 반복해서 공부하자! </td>
                    </tr>
                    <tr>
                        <th>단권화 노트,서브노트를    활용하자! </th>
                        <td>기본서에 단권화 정리를 하였다면 기본서를! <br />
                            서브노트를 통해 정리하였다면 서브노트를 자주 보며 이론을 놓지말자! </td>
                    </tr>
                    <tr>
                        <th>모의고사 1회    실전처럼! </th>
                        <td>실전처럼 연습을 하자! 문제풀이에 익숙해지고 시간안배 스킬 향상에 도움이 된다. <br />
                            문제풀이에 걸리는 시간을 꼼꼼히 체크하여 정해진 시간 내에 문제를 풀 수 있도록 연습해야 한다. </td>
                    </tr>
                    <tr>
                        <th>충분한 숙면을 취하자 </th>
                        <td>마지막 결전의 날 최고의 컨디션을 유지하기 위해서는 규칙적인 생활을하고, 충분한 숙면을 취하도록 하자! </td>
                    </tr>
                    <tr>
                        <th>평정심을 유지하자 </th>
                        <td>시험 직전에는 누구나 불안하지만, 최대한 마음가짐을 편하게 유지하는 것이 좋습니다. </td>
                    </tr>
                    </tbody>
                </table>

                <h2>시험 <span>당일</span> 유의사항</h2>
                <table cellspacing="0" cellpadding="0" class="boardTypeB">
                    <col width="30%"/>
                    <col width=""/>
                    <tbody>
                    <tr>
                        <th>컨디션 조절 잘하자! </th>
                        <td>시험이라 하여 전날 밤을 지세우는 경우가 있는데 시험당일 최상의 컨디션을 유지하기 위해서는 시험 전날 일찍 잠자리에 들도록 하자! </td>
                    </tr>
                    <tr>
                        <th>30분~1시간 일찍 입실하자! </th>
                        <td>헐레벌떡 시험시간 임박해서 입실하지말고, 조금 일찍 시험장에 입실하여 본인의 자리, 시험장 분위기에 적응하고 시험에    집중할 마음의 여유를 가지는 것이 좋다! </td>
                    </tr>
                    <tr>
                        <th>문제 제대로 읽자! </th>
                        <td>긴장하고 마음이 급하여 문제를 잘못 읽는 경우가 발생한다. 맞는 지문 선택인지, 틀린 지문 선택인지 정확하게    읽으세요. </td>
                    </tr>
                    <tr>
                        <th>보기지문 정확하게 체크하자! </th>
                        <td>꼼꼼히 읽었으나, 정답 지문을 잘못 체크 하는 수험생들이 간혹 있다.  정답1개가 5점이니, 꼭 실수 하지 맙시다! </td>
                    </tr>
                    <tr>
                        <th>시험 시간 안배 잘하자! </th>
                        <td>100분의 시간 안에 5과목을 풀어야 합니다.<br />
                            길고도 짧은 시간이죠! 시간안배를 잘하여서 정답 찍는 문제가 없도록 합시다! </td>
                    </tr>
                    <tr>
                        <th>OMR 마킹 제대로    하자! </th>
                        <td>마지막까지 긴장의 끈을 놓치마세요!  방심하는 순간 마킹 실수가 생기고, 시험종료 직전에OMR지를 바꾸게 될 수도 있으니.. OMR 마킹시 가장 조심하고 신중해야 합니다.
                            답안은 반드시 원서접수 시 선택한 필기시험 과목순서에 맞추어 표기하여야 하며, 과목순서를 바꾸어 표기한 경우에도 원서접수 시 선택한 과목순서대로 채점되어 불이익을 받게 되므로 유의하여야 한다.
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--ddayBefore//-->
            --}}

            {{--27일 노출--}}
            <div class="ddayAfter">
                <div class="m_section2">
                    <div>
                        <a href="javascript:tabMove(2)">성적 채점하기 ▶</a> 채점서비스를 이용하시면 합격가능선을 확인할 수 있습니다.
                    </div>
                </div>

                <div class="m_section3">

                    {{--@include('willbes.pc.predict.1210_promotion_partial')--}}
                    @include('willbes.pc.predict.1344_promotion_partial')

                    {{--<div class="sectionEvt00 NSK-Black">--}}
                    {{--<a href="#none">빠른 채점하기<span class="NSK-Thin">(답만 입력)</span></a>--}}
                    {{--<a href="#none" class="btn2">시험지보며 채점하기</a>--}}
                    {{--</div>--}}

                    <div class="sectionEvt01" id="event">
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_evt00.jpg" alt="합격예측 풀서비스 이용하고 푸짐한 혜택도 받자!" />
                    </div>

                    <div class="sectionEvt01_1">
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1344_evt01.jpg" alt="시험후기 공유하고 채점하면 기프티콘 증정 " />
                    </div>

                    <!--  이모티콘 댓글 -->
                    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                        @include('willbes.pc.promotion.show_comment_list_emoticon2_partial')
                    @endif

                    <div class="sectionEvt02">
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1344_evt02.jpg" alt="토크쇼 시청 인증샷 공유 이벤트" />
                        <a href="https://police.willbes.net/promotion/index/cate/3001/code/1208" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2019/08/1344_evt02_btn.png" alt="공유 이벤트 참여하기" />
                        </a>
                    </div>

                    <div class="sectionEvt03">
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1344_evt03.jpg" alt="적중문제 소내내기 이벤트" />
                        <a href="https://police.willbes.net/promotion/index/cate/3001/code/1362" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2019/08/1344_evt03_btn.png" alt="적중문제 소내내기 이벤트 참여하기" />
                        </a>
                    </div>

                </div><!--m_section3//-->
            </div><!--ddayAfter//-->
        </div>
        <!--evtCtnsBox//-->

    </div>
    <!-- End Container -->

    <!-- WIDERPLANET  SCRIPT START 2019.2.18 -->
    <div id="wp_tg_cts" style="display:none;"></div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mt1').addClass('active');
        });

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