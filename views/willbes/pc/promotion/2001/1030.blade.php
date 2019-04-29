@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .skybanner {
            position:fixed;
            bottom:20px;
            right:10px;
            z-index:1;
        }
        .skybanner ul {border:1px solid #000; border-bottom:none}
        .skybanner a {height:40px; line-height:40px; display:block; text-align:center; background:#009ef5; color:#fff; font-size:16px !important; font-weight:600 !important; border-bottom:1px solid #000}
        .skybanner a:hover {background:#fff; color:#000}
        .skybanner_sectionFixed {position:fixed; top:20px}

        .skybanner2 {
            position:fixed;
            top:200px;
            right:0;
            z-index:1;
        }

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/04/1030_01_bg.jpg) no-repeat center top}


        .wb_cts01 .giveaway {position:absolute; width:661px; left:50%; margin-left:-330px; animation:only 2s infinite; z-index:11}
        @@keyframes only{
            0%{top:310px}
            50%{top:330px}
            100%{top:310px}
        }

        .wb_cts02 {background:#e7e7e7}
        .wb_cts02 .tabWrapEvt {width:1210px; margin:0 auto}
        .wb_cts02 .tabWrapEvt li {display:inline; float:left; width:20%}
        .wb_cts02 .tabWrapEvt li a {display:block; text-align:center; margin-right:1px; background:#ababab}
        .wb_cts02 .tabWrapEvt li a img.off {display:block}
        .wb_cts02 .tabWrapEvt li a img.on {display:none}
        .wb_cts02 .tabWrapEvt li a:hover img.off {display:none}
        .wb_cts02 .tabWrapEvt li a:hover img.on {display:block}
        .wb_cts02 .tabWrapEvt li a.active img.off {display:none}
        .wb_cts02 .tabWrapEvt li a.active img.on {display:block}
        .wb_cts02 .tabWrapEvt li a:hover,
        .wb_cts02 .tabWrapEvt li a.active {background:#fff}
        .wb_cts02 .tabWrapEvt li:last-child a {margin-right:0}
        .wb_cts02 .tabWrapEvt:after {content:""; display:block; clear:both}

        .wb_cts03 {background:#009ef5 url(https://static.willbes.net/public/images/promotion/2019/04/1030_03_bg.jpg) no-repeat center top}
        .wb_cts03 .tabWrapEvt2 {width:1210px; margin:0 auto}
        .wb_cts03 .tabWrapEvt2 li {display:inline; float:left; width:50%}
        .wb_cts03 .tabWrapEvt2 li a img.off {display:block}
        .wb_cts03 .tabWrapEvt2 li a img.on {display:none}
        .wb_cts03 .tabWrapEvt2 li a:hover img.off {display:none}
        .wb_cts03 .tabWrapEvt2 li a:hover img.on {display:block}
        .wb_cts03 .tabWrapEvt2 li a.active img.off {display:none}
        .wb_cts03 .tabWrapEvt2 li a.active img.on {display:block}
        .wb_cts03 .tabWrapEvt2:after {content:""; display:block; clear:both}

        .tabcts {width:100%; text-align:center; background:#fff}
        .tabcts2 {background:none}

        .wb_cts03 .tabcts2A {background:url(https://static.willbes.net/public/images/promotion/2019/04/1030_03_tap01_bg.jpg) no-repeat center top;}
        .wb_cts03 .tabcts2B {background:#e3e3e3; padding-bottom:80px}
        .wb_cts03 .tabcts2B div {width:1100px; margin:0 auto}
        .wb_cts03 .tabcts2B table {width:100%; border-top:1px solid #fff; border-left:1px solid #fff; margin-bottom:50px}
        .wb_cts03 .tabcts2B th,
        .wb_cts03 .tabcts2B td {padding:10px; text-align:center; border-right:1px solid #fff; border-bottom:1px solid #fff}
        .wb_cts03 .tabcts2B th {font-size:14px; font-weight:500; color:#fff; background:#009ef5}
        .wb_cts03 .tabcts2B th strong {font-size:18px; font-weight:600}
        .wb_cts03 .tabcts2B tr:first-child td {background:#bee8ff; color:#000}
        .wb_cts03 .tabcts2B td {font-size:14px}

        .wb_cts03 .tabcts2C {background:#1f2931}
        .wb_cts03 .tabcts2C_1 {background:#e3e3e3; padding-bottom:100px}


        /* 슬라이드배너 */
        .bannerImg2 {position:relative; width:800px; margin:0 auto 100px}
        .bannerImg2 p {position:absolute; top:50%; width:51px; z-index:100}
        .bannerImg2 img {width:100%}
        .bannerImg2 p a {cursor:pointer}
        .bannerImg2 p.leftBtn2 {left:-60px; top:42%; width:36px; height:56px}
        .bannerImg2 p.rightBtn2 {right:-60px; top:42%; width:36px; height:56px}


        .YouTube {width:1210px; margin:0 auto; text-align:center}
        .YouTube li {display:inline; float:left; width:33.33333%; margin-bottom:50px}
        .YouTube li p {margin-top:20px; font-size:16px !important; font-weight:500 !important; color:#333; letter-spacing:-1px}
        .YouTube li iframe {width:380px; margin:0 auto; height:220px}
        .YouTube li:nth-child(1),
        .YouTube li:nth-child(2) {width:50%;}
        .YouTube li:nth-child(1) iframe,
        .YouTube li:nth-child(2) iframe{width:520px; margin:0 auto; height:300px}
        .YouTube:after {content:""; display:block; clear:both}

        .wb_cts04 {background:#f7f7f7}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_sky.png" alt="" />
            <ul>
                <li><a href="#online">서비스</a></li>
                <li><a href="{{ site_url('/pass/promotion/index/code/1128') }}" target="_blank">아이언짐</a></li>
                <li><a href="#buy">파격할인</a></li>
                <li><a href="{{ site_url('/professor/show/cate/3001/prof-idx/50575/?subject_idx=1043&subject_name=%EC%B2%B4%EB%A0%A5&tab=qna') }}" target="_blank">질답게시판</a></li>
            </ul>
        </div>

        <div class="skybanner2">
            <a href="https://police.willbes.net/event/show/cate/3001/pattern/ongoing?event_idx=234&" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/04/1030_01_bann.png" alt="" /></a>
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <div class="wb_popWrap">
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_01.jpg" alt="" />

                <div class="giveaway">
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_01_text.png"  alt="" />
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02.jpg" alt="" />
            <ul class="tabWrapEvt">
                <li>
                    <a href="#tab01">
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap01.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap01on.jpg" alt="" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab02">
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap02.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap02on.jpg" alt="" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab03">
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap03.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap03on.jpg" alt="" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab04">
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap04.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap04on.jpg" alt="" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab05">
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap05.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap05on.jpg" alt="" class="on"/>
                    </a>
                </li>
            </ul>


            <div id="tab01" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap01_table.jpg" alt=""/>
            </div>
            <div id="tab02" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap02_table.jpg" alt=""/>
            </div>
            <div id="tab03" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap03_table.jpg" alt=""/>
            </div>
            <div id="tab04" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap04_table.jpg" alt=""/>
            </div>
            <div id="tab05" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_02_tap05_table.jpg" alt=""/>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_03.jpg"  alt="" />
            <ul class="tabWrapEvt2" id="online">
                <li>
                    <a href="#tab06" class="active">
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_03_tap01.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_03_tap01on.jpg" alt="" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/pass/promotion/index/code/1128') }}" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_03_tap02.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_03_tap02on.jpg" alt="" class="on"/>
                    </a>
                </li>
            </ul>

            <div id="tab06" class="tabcts2">
                <div class="tabcts2A">
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_03_tap01_01.jpg" alt=""/>
                </div>

                <div class="tabcts2B">
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_03_tap01_tit.jpg" alt=""/>
                    <div>
                        <table cellspacing="0" cellpadding="0">
                            <col width="15%" />
                            <col  />
                            <col  />
                            <col  />
                            <col  />
                            <col  />
                            <col  />
                            <col  />
                            <tr>
                                <th rowspan="8" scope="col"><strong>경찰코치<br />
                                        풀패키지</strong><br />
                                    <br />
                                    - 기초부터 안정적으로 45점 이상을 목표하는 수험생</th>
                                <td scope="col">&nbsp;</td>
                                <td scope="col">1주차~3주차 </td>
                                <td scope="col">4주차~9주차 </td>
                                <td scope="col">10주차~13주차</td>
                                <td scope="col">14주차~16주차</td>
                            </tr>
                            <tr>
                                <td>슨과함께 </td>
                                <td colspan="4">셀프 / 홈 트레이닝 – 슨과함께 데일리 30분 운동루틴 </td>
                            </tr>
                            <tr>
                                <td>100m </td>
                                <td>기초    트레이닝<br />
                                    (100M 달리기의 4법칙) </td>
                                <td rowspan="2">실전    트레이닝<br />
                                    (보폭의 거리 X 피치의    속도) </td>
                                <td>파워    트레이닝<br />
                                    (드라이브 X 상/하체 근력) </td>
                                <td rowspan="5">전략적    트레이닝<br />
                                    (개인 기록별 맞춤 파이널 훈련)</td>
                            </tr>
                            <tr>
                                <td>1,000m </td>
                                <td>기초    트레이닝<br />
                                    (1,000M 달리기의 4법칙)  </td>
                                <td>파워    트레이닝<br />
                                    (드라이브 X 지구력) </td>
                            </tr>
                            <tr>
                                <td>윗몸일으키기 </td>
                                <td>기초    트레이닝 <br />
                                    (윗몸일으키기의 3법칙) </td>
                                <td rowspan="2">실전    트레이닝<br />
                                    (속도 X 지구력)  </td>
                                <td rowspan="2">파워    트레이닝 <br />
                                    (실전스킬 X 상/하체 근력) </td>
                            </tr>
                            <tr>
                                <td>팔굽혀펴기 </td>
                                <td>기초    트레이닝 <br />
                                    (팔굽혀펴기의 3법칙) </td>
                            </tr>
                            <tr>
                                <td>좌우 악력 </td>
                                <td>기초    트레이닝 <br />
                                    (좌우 악력의 2법칙) </td>
                                <td>실전    트레이닝 <br />
                                    (쥐는 힘 X 누르는 힘) </td>
                                <td>파워    트레이닝 <br />
                                    (실전스킬 X 상체 근력)</td>
                            </tr>
                            <tr>
                                <td>1:1 코칭 </td>
                                <td colspan="4">1:1 Q&amp;A (동작 분석) </td>
                            </tr>
                        </table>

                        <table cellspacing="0" cellpadding="0">
                            <col width="15%" />
                            <col  />
                            <col  />
                            <col  />
                            <col  />
                            <col  />
                            <col  />
                            <col  />
                            <tr>
                                <th rowspan="8" scope="col"><strong>경찰코치<br />
                                        단기강좌</strong><br />
                                    <br />
                                    - 필기시험 이후 단기간 합격자 평균 39점을 목표하는 수험생</th>
                                <td scope="col">&nbsp;</td>
                                <td scope="col">1주차</td>
                                <td scope="col">2주차</td>
                                <td scope="col">3주차</td>
                                <td scope="col">4주차</td>
                            </tr>
                            <tr>
                                <td>슨과함께 </td>
                                <td colspan="4">셀프 / 홈 트레이닝 – 슨과함께 데일리 30분 운동루틴 </td>
                            </tr>
                            <tr>
                                <td>100m </td>
                                <td>기초    트레이닝<br />
                                    (100M 달리기의 4법칙) </td>
                                <td rowspan="2">실전    트레이닝<br />
                                    (보폭의 거리 X 피치의    속도) </td>
                                <td>파워    트레이닝<br />
                                    (드라이브 X 상/하체 근력) </td>
                                <td rowspan="5">전략적    트레이닝<br />
                                    (개인 기록별 맞춤 파이널 훈련)</td>
                            </tr>
                            <tr>
                                <td>1,000m </td>
                                <td>기초    트레이닝<br />
                                    (1,000M 달리기의 4법칙)  </td>
                                <td>파워    트레이닝<br />
                                    (드라이브 X 지구력) </td>
                            </tr>
                            <tr>
                                <td>윗몸일으키기 </td>
                                <td>기초    트레이닝 <br />
                                    (윗몸일으키기의 3법칙) </td>
                                <td rowspan="2">실전    트레이닝<br />
                                    (속도 X 지구력)  </td>
                                <td rowspan="2">파워    트레이닝 <br />
                                    (실전스킬 X 상/하체 근력) </td>
                            </tr>
                            <tr>
                                <td>팔굽혀펴기 </td>
                                <td>기초    트레이닝 <br />
                                    (팔굽혀펴기의 3법칙) </td>
                            </tr>
                            <tr>
                                <td>좌우 악력 </td>
                                <td>기초    트레이닝 <br />
                                    (좌우 악력의 2법칙) </td>
                                <td>실전    트레이닝 <br />
                                    (쥐는 힘 X 누르는 힘) </td>
                                <td>파워    트레이닝 <br />
                                    (실전스킬 X 상체 근력)</td>
                            </tr>
                            <tr>
                                <td>1:1 코칭 </td>
                                <td colspan="4">1:1 Q&amp;A (동작 분석) </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="tabcts2C">
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_03_tap01_03.jpg" alt=""/>
                </div>

                <div class="tabcts2C_1">
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_03_tap01_a.jpg" alt=""/>
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_03_tap01_b.jpg" alt=""/>
                    <div class="bannerImg2">
                        <ul id="slidesImg2">
                            <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1030_03_tap01_c.jpg" alt="수강평1"/></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1030_03_tap01_d.jpg" alt="수강평2"/></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1030_03_tap01_e.jpg" alt="수강평3"/></li>
                        </ul>
                        <p class="leftBtn2"><a id="imgBannerLeft2"><img src="https://static.willbes.net/public/images/promotion/2019/04/1030_arr_l.png"></a></p>
                        <p class="rightBtn2"><a id="imgBannerRight2"><img src="https://static.willbes.net/public/images/promotion/2019/04/1030_arr_r.png"></a></p>
                    </div>
                    <ul class="YouTube">
                        <li>
                            <iframe src="https://www.youtube.com/embed/sVr6LYsbzek?rel=0" frameborder="0" allowfullscreen></iframe>
                            <p>#경찰코치 풀패키지 강좌 소개</p>
                        </li>
                        <li>
                            <iframe src="https://www.youtube.com/embed/SHbzPnFtkxk?rel=0" frameborder="0" allowfullscreen></iframe>
                            <p>#팔굽혀펴기를 팔만으로 하는게 아니라고?!</p>
                        </li>
                        <li>
                            <iframe src="https://www.youtube.com/embed/GTrlrvc-k7o?rel=0" frameborder="0" allowfullscreen></iframe>
                            <p>#100/1000m 달리기<br />어떻게 운동해야할까요?!</p>
                        </li>
                        <li>
                            <iframe src="https://www.youtube.com/embed/fr-zHqR-3zE?rel=0" frameborder="0" allowfullscreen></iframe>
                            <p>#머리와 어깨만 잘 사용해도!<br />윗몸일으키기 기록을 쉽게 향상 시킬 수 있다!</p>
                        </li>
                        <li>
                            <iframe src="https://www.youtube.com/embed/SK6plcTEYYk?rel=0" frameborder="0" allowfullscreen></iframe>
                            <p>#악력! 도대체 기술도 없고!<br />선천적으로 타고나야 하는거 아니야?!</p>
                        </li>
                    </ul>
                </div>
            </div>

        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" id="buy">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_04.jpg" alt="" usemap="#Map190102" border="0"/>
            <map name="Map190102" id="Map190102">
                <area shape="rect" coords="885,537,979,573" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/132212') }}" target="_blank" alt="경찰코치풀패키지 신청하기" />
                <area shape="rect" coords="885,637,979,672" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/132210') }}" target="_blank" alt="종합단기완성 신청하기"/>
                <area shape="rect" coords="885,737,979,772" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/132208') }}" target="_blank" alt="달리기 단기완성 신청하기"/>
                <area shape="rect" coords="885,838,978,872" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/132206') }}" target="_blank" alt="근력단기완성 신청하기"/>
                <area shape="rect" coords="884,1095,979,1129" href="{{ site_url('/package/show/cate/3001/pack/648001/prod-code/149542') }}" target="_blank" alt="6개월종합반신청하기" />
                <area shape="rect" coords="885,1189,979,1224" href="{{ site_url('/package/show/cate/3001/pack/648001/prod-code/149541') }}" target="_blank" alt="12개월종합반신청하기" />
                <area shape="rect" coords="884,992,978,1027" href="{{ site_url('/promotion/index/cate/3001/code/1009') }}" target="_blank" alt="PASS수강생 파격할인가"/>
            </map>
        </div>

        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1030_05.jpg" alt="" usemap="#Mapboard" border="0"/>
            <map name="Mapboard" id="Mapboard">
                <area shape="rect" coords="340,544,870,668" href="{{ site_url('/professor/show/cate/3001/prof-idx/50575/?subject_idx=1043&subject_name=%EC%B2%B4%EB%A0%A5&tab=qna') }}" target="_blank" alt="질답게시판 바로가기" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        /*tab*/
        $(document).ready(function(){
            $('.tabWrapEvt').each(function(){
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

        $(document).ready(function() {
            var slidesImg2 = $("#slidesImg2").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:926,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft2").click(function (){
                slidesImg2.goToPrevSlide();
            });

            $("#imgBannerRight2").click(function (){
                slidesImg2.goToNextSlide();
            });
        });
    </script>
@stop