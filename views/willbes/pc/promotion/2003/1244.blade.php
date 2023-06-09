@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    @php
        //텝,내용 노출 시간 셋팅
        $set_tab_day = [
            'tab' => [
                '3' => '201906140000',
                '4' => '201906140000'
            ],
            'content' => [
                '3' => '201906171200',
                '4' => '201906151130'
            ]
        ];
        $now_day = date('YmdHi');
    @endphp
    <link href="/public/css/willbes/promotion/2003_1244.css?ver={{time()}}" rel="stylesheet">
    <!-- Container -->
    <div class="evtContent NGR" id="evtContainer">
        @if ($now_day >= $set_tab_day['tab']['4'])
            <div class="skybanner">
                <a href="{{ ($now_day >= $set_tab_day['content']['4']) ? 'javascript:gradOpen();' : 'javascript:alert("6/15 시험 종료 후 등록 가능합니다.");' }}"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_skybanner.jpg" title="내 예상점수와 체감 난이도는?" /></a>
            </div>
        @endif

        <div class="evtCtnsBox evtTop">
            <div>
                <span class="txt1"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_top_txt1.png" title="출제경향" /></span>
                <span class="txt2"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_top_txt2.png" title="필수팁" /></span>
                <span class="txt3"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_top_txt3.png" title="실전 싱크로율 100% 문항" /></span>
                <span class="txt4"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_top_txt4.png" title="교수님들과의 실시간 소통" /></span>
                <span class="txt5"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_top_txt5.png" title="경품 이벤트" /></span>
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_top.jpg" title="2019 국가직 9급 풀캐어 서비스" />

                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/um0UBAs7IDw?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evtMenu NGEB" id="evtMenu">
            <ul>
                <li>
                    <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=1#content_1') }}">
                        <span>서울시/지방직 9급</span>
                        <div>시험 완벽분석</div>
                    </a>
                </li>

                <li>
                    <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=2#content_2') }}">
                        <span>합격을 위한 최종점검</span>
                        <div>마무리 전략</div>
                    </a>
                </li>

                @if ($now_day < $set_tab_day['tab']['3'])
                    <li>
                        <a id='tab3' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=3#content_3') }}">
                            <strong>무료응시</strong>
                            <span>미리 보는 시험</span>
                            <div>온라인 전국 모의고사</div>
                        </a>
                    </li>
                @else
                    <li>
                        <a id='tab3' href="{{ ($now_day >= $set_tab_day['content']['3']) ? site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=3#content_3') : 'javascript:alert("준비중 입니다.");' }}">
                            <strong>2019</strong>
                            <span>서울시/지방직 9급</span>
                            <div>총평/해설/해설강의</div>
                        </a>
                    </li>
                @endif

                @if ($now_day < $set_tab_day['tab']['4'])
                    <li>
                        <a id='tab4' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=4#content_4') }}">
                            <strong>윌비스 TV</strong>
                            <span>적중 마무리 특강</span>
                            <div>LIVE 특강</div>
                        </a>
                    </li>
                @else
                    <li>
                        <a id='tab4' href="{{ ($now_day >= $set_tab_day['content']['4']) ? site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=4#content_4') : 'javascript:alert("준비중 입니다.");' }}">
                            <strong>2019</strong>
                            <span>서울시/지방직 9급</span>
                            <div>평균 점수/체감난이도</div>
                        </a>
                    </li>
                @endif

                <li>
                    <a id='tab5' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=5#content_5') }}">
                        <strong>진행중</strong>
                        <span>참여하고 선물 받자!</span>
                        <div>합격기원 이벤트</div>
                    </a>
                </li>
            </ul>
        </div>

        <div id="content_1" class="tabCts pb90">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_01_1A.jpg"  usemap="#1244_01_1" title="서울시/지방직 9급 시험 완벽분석" />
            <ul class="assayTab">
                <li><a href="#assayTab01">서울시</a></li>
                <li><a href="#assayTab02">지방직</a></li>
            </ul>
            <div id="assayTab01">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_01_2A.jpg"  usemap="#1244_01_1" title="서울시/지방직 9급 시험 완벽분석" />
            </div>
            <div id="assayTab02">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_01_2B.jpg"  usemap="#1244_01_1" title="서울시/지방직 9급 시험 완벽분석" />
            </div>

            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_01_3.jpg"  usemap="#1244_01_1" title="서울시/지방직 9급 시험 완벽분석" />
            <map name="1244_01_1" id="1244_01_1">
                <area shape="rect" coords="706,217,745,255" href="@if(empty($file_yn) === false && $file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" alt="16년 지방직 문제" />
                <area shape="rect" coords="936,216,970,251" href="@if(empty($file_yn) === false && $file_yn[2] == 'Y') {{ front_url($file_link[2]) }} @else {{ $file_link[2] }} @endif" alt="16년 지방직 정답" />
                <area shape="rect" coords="706,263,746,300" href="@if(empty($file_yn) === false && $file_yn[3] == 'Y') {{ front_url($file_link[3]) }} @else {{ $file_link[3] }} @endif" alt="16년 서울시 문제" />
                <area shape="rect" coords="934,266,970,301" href="@if(empty($file_yn) === false && $file_yn[4] == 'Y') {{ front_url($file_link[4]) }} @else {{ $file_link[4] }} @endif" alt="16년 서울시 정답" />
                <area shape="rect" coords="707,311,747,349" href="@if(empty($file_yn) === false && $file_yn[5] == 'Y') {{ front_url($file_link[5]) }} @else {{ $file_link[5] }} @endif" alt="17년 지방직 문제" />
                <area shape="rect" coords="935,310,970,347" href="@if(empty($file_yn) === false && $file_yn[6] == 'Y') {{ front_url($file_link[6]) }} @else {{ $file_link[6] }} @endif" alt="17년 지방직 정답" />
                <area shape="rect" coords="708,353,744,391" href="@if(empty($file_yn) === false && $file_yn[7] == 'Y') {{ front_url($file_link[7]) }} @else {{ $file_link[7] }} @endif" alt="17년 서울시 문제" />
                <area shape="rect" coords="935,355,971,389" href="@if(empty($file_yn) === false && $file_yn[8] == 'Y') {{ front_url($file_link[8]) }} @else {{ $file_link[8] }} @endif" alt="17년 서울시 정답" />
                <area shape="rect" coords="707,400,744,436" href="@if(empty($file_yn) === false && $file_yn[9] == 'Y') {{ front_url($file_link[9]) }} @else {{ $file_link[9] }} @endif" alt="18년 지방직 문제" />
                <area shape="rect" coords="935,401,972,437" href="@if(empty($file_yn) === false && $file_yn[10] == 'Y') {{ front_url($file_link[10]) }} @else {{ $file_link[10] }} @endif" alt="18년 지방직 정답" />
                <area shape="rect" coords="707,445,744,482" href="@if(empty($file_yn) === false && $file_yn[11] == 'Y') {{ front_url($file_link[11]) }} @else {{ $file_link[11] }} @endif" alt="18년 서울시 문제" />
                <area shape="rect" coords="935,445,974,482" href="@if(empty($file_yn) === false && $file_yn[12] == 'Y') {{ front_url($file_link[12]) }} @else {{ $file_link[12] }} @endif" alt="18년 서울시 정답" />
                <area shape="rect" coords="707,492,745,535" href="@if(empty($file_yn) === false && $file_yn[13] == 'Y') {{ front_url($file_link[13]) }} @else {{ $file_link[13] }} @endif" alt="19년 국가직 문제" />
                <area shape="rect" coords="934,492,972,533" href="@if(empty($file_yn) === false && $file_yn[14] == 'Y') {{ front_url($file_link[14]) }} @else {{ $file_link[14] }} @endif" alt="19년 국가직 정답" />
            </map>
            <div class="noteWrap2 mt80">
                <table cellspacing="0" cellpadding="0">
                    <col/>
                    <tbody>
                    <tr>
                        <th rowspan="3">모집단위</th>
                        <th colspan="6">2019년</th>
                        <th colspan="2">2018년</th>
                    </tr>
                    <tr>
                        <th colspan="2">선발예정인원</th>
                        <th colspan="2">접수인원</th>
                        <th colspan="2">경쟁률</th>
                        <th>경쟁률</th>
                        <th>합격선<br>(최고점)</th>
                    </tr>
                    <tr>
                        <th>전체</th>
                        <th>일반행정<br>(9급)</th>
                        <th>전체</th>
                        <th>일반행정<br>(9급)</th>
                        <th>전체</th>
                        <th>일반행정<br>(9급)</th>
                        <th>일반행정<br>(9급)</th>
                        <th>일반행정<br> (9급)</th>
                    </tr>
                    </tbody>
                    <tr>
                        <td>계</td>
                        <td>23,688</td>
                        <td>8,680</td>
                        <td>264,120</td>
                        <td>129,988</td>
                        <td>14.66:1</td>
                        <td>17.36:1</td>
                        <td>22.58:1</td>
                        <td><span class="tx-red">385.27</td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226982_01_20190521093638.pdf" target="_blank"><b>서울</b></a></td>
                        <td>3,090</td>
                        <td>1,046</td>
                        <td>47,620</td>
                        <td>25,107</td>
                        <td>15.41:1</td>
                        <td>24.0:1</td>
                        <td>76.99:1</td>
                        <td><span class="tx-red">381.71</td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226982_02_20190521093638.pdf" target="_blank"><b>강원</b></a></td>
                        <td>1,054</td>
                        <td>368</td>
                        <td>10,072</td>
                        <td>5,050</td>
                        <td>9.56:1</td>
                        <td>13.72:1</td>
                        <td>21.65:1</td>
                        <td><span class="tx-red">370.95</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226982_03_20190521093638.pdf" target="_blank"><b>경기</b></a></td>
                        <td>4,873</td>
                        <td>1,731</td>
                        <td>44,484</td>
                        <td>23,983</td>
                        <td>9.13:1</td>
                        <td>13.85:1</td>
                        <td>21.22:1</td>
                        <td><span class="tx-red">380.09</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226982_04_20190521093638.pdf" target="_blank"><b>경남</b></a></td>
                        <td>1,936</td>
                        <td>777</td>
                        <td>18,640</td>
                        <td>9,489</td>
                        <td>9.63:1</td>
                        <td>12.21:1</td>
                        <td>19.29:1</td>
                        <td><span class="tx-red">369.33</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226982_05_20190521093638.pdf" target="_blank"><b>경북</b></a></td>
                        <td>2,216</td>
                        <td>854</td>
                        <td>18,957</td>
                        <td>8,912</td>
                        <td>8.55:1</td>
                        <td>10.44:1</td>
                        <td>15.11:1</td>
                        <td><span class="tx-red">365.54</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226982_06_20190521093638.pdf" target="_blank"><b>광주</b></a></td>
                        <td>779</td>
                        <td>271</td>
                        <td>10,275</td>
                        <td>4,868</td>
                        <td>13.19:1</td>
                        <td>17.96:1</td>
                        <td>26.50:1</td>
                        <td><span class="tx-red">367</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226982_07_20190521093638.pdf" target="_blank"><b>대구</b></a></td>
                        <td>628</td>
                        <td>331</td>
                        <td>13,753</td>
                        <td>7,509</td>
                        <td>21.90:1</td>
                        <td>22.69:1</td>
                        <td>31.61:1</td>
                        <td><span class="tx-red">368.64</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226983_01_20190521093715.pdf" target="_blank"><b>대전</b></a></td>
                        <td>421</td>
                        <td>165</td>
                        <td>7,490</td>
                        <td>3,922</td>
                        <td>17.79:1</td>
                        <td>23.77:1</td>
                        <td>34.23:1</td>
                        <td><span class="tx-red">369.96</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226983_02_20190521093715.pdf" target="_blank"><b>부산</b></a></td>
                        <td>903</td>
                        <td>333</td>
                        <td>15,985</td>
                        <td>8,097</td>
                        <td>17.70:1</td>
                        <td>24.32:1</td>
                        <td>31.24:1</td>
                        <td><span class="tx-red">373.57</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226983_03_20190521093715.pdf" target="_blank"><b>세종</b></a></td>
                        <td>138</td>
                        <td>40</td>
                        <td>1,848</td>
                        <td>984</td>
                        <td>13.39:1</td>
                        <td>24.60:1</td>
                        <td>23.81:1</td>
                        <td><span class="tx-red">363.2</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226983_04_20190521093715.pdf" target="_blank"><b>울산</b></a></td>
                        <td>250</td>
                        <td>63</td>
                        <td>16,345</td>
                        <td>2,573</td>
                        <td>65.38:1</td>
                        <td>40.84:1</td>
                        <td>25.85:1</td>
                        <td><span class="tx-red">366.75</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226983_05_20190521093715.pdf" target="_blank"><b>인천</b></a></td>
                        <td>1,631</td>
                        <td>702</td>
                        <td>10,968</td>
                        <td>6,096</td>
                        <td>6.72:1</td>
                        <td>8.68:1</td>
                        <td>27.15:1</td>
                        <td><span class="tx-red">375.88</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226983_06_20190521093715.pdf" target="_blank"><b>전남</b></a></td>
                        <td>1,455</td>
                        <td>483</td>
                        <td>12,023</td>
                        <td>5,646</td>
                        <td>8.26:1</td>
                        <td>11.69:1</td>
                        <td>14.11:1</td>
                        <td><span class="tx-red">358.94</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226983_07_20190521093715.pdf" target="_blank"><b>전북</b></a></td>
                        <td>1,231</td>
                        <td>458</td>
                        <td>12,598</td>
                        <td>6,092</td>
                        <td>10.23:1</td>
                        <td>13.30:1</td>
                        <td>16.59:1</td>
                        <td><span class="tx-red">367.64</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226984_01_20190521093735.pdf" target="_blank"><b>제주</b></a></td>
                        <td>414</td>
                        <td>169</td>
                        <td>3,421</td>
                        <td>1,829</td>
                        <td>8.26:1</td>
                        <td>10.82:1</td>
                        <td>19.85:1</td>
                        <td><span class="tx-red">369.01</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226984_02_20190521093735.pdf" target="_blank"><b>충남</b></a></td>
                        <td>1,579</td>
                        <td>494</td>
                        <td>11,112</td>
                        <td>5,259</td>
                        <td>7.04:1</td>
                        <td>10.65:1</td>
                        <td>15.32:1</td>
                        <td><span class="tx-red">379.88</span></td>
                    </tr>
                    <tr>
                        <td><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/0521/board_226984_03_20190521093735.pdf" target="_blank"><b>충북</b></a></td>
                        <td>1,090</td>
                        <td>395</td>
                        <td>8,529</td>
                        <td>4,572</td>
                        <td>7.82:1</td>
                        <td>11.57:1</td>
                        <td>17.71:1</td>
                        <td><span class="tx-red">385.27</span></td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="content_2" class="tabCts pb90 pt100">
            <div class="content_2_wrap">
                <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_02_1.jpg" title="과목별 마무리 학습 전략" /></p>
                <ul class="youtubeTab NGEB">
                    <li><a href="#yTab01" class="active">국어<br> 기미진</a></li>
                    <li><a href="#yTab02">영어<br> 한덕현</a></li>
                    <li><a href="#yTab03">한국사<br> 박민주</a></li>
                    <li><a href="#yTab04">한국사<br> 조민주</a></li>
                    <li><a href="#yTab05">행정학<br> 김덕관</a></li>
                    <li><a href="#yTab06">행정법<br> 한세훈</a></li>
                    <li><a href="#yTab07">지방세(세법)<br> 고선미</a></li>
                </ul>
                <div class="youtubeCts youtube" id="yTab01">
                    <iframe src="https://www.youtube.com/embed/5KDnhVEf0bE?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="youtubeCts youtube" id="yTab02">
                </div>
                <div class="youtubeCts youtube" id="yTab03">
                </div>
                <div class="youtubeCts youtube" id="yTab04">
                </div>
                <div class="youtubeCts youtube" id="yTab05">
                </div>
                <div class="youtubeCts youtube" id="yTab06">
                </div>
                <div class="youtubeCts youtube" id="yTab07">
                </div>

                <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_02_2.jpg" title="시험전, 시험당일 유의사항" /></p>
                <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_02_3.jpg" title="유의사항" /></p>
                <p class="mt100"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_02_4.jpg" title="응시자 준수사항 및 필기장소 안내" /></p>
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/gpppIN1ISaw?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="mt100 tx-center"><a href="http://gosi.go.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000131" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_02_btn01.png" title="필기시험 장소 안내 바로가기" /></a> </div>
            </div>
        </div>

        @if ($now_day < $set_tab_day['content']['3'])
            {{--기존 3번탭--}}
            <div id="content_3" class="tabCts">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_03_1A.jpg" usemap="#Map1244C" title="윌비스 전국 모의고사" border="0" />
                <map name="Map1244C" id="Map1244C">
                    <area shape="rect" coords="379,1868,740,1932" href="https://pass.willbes.net/pass/mockTest/apply/cate/?state=1&s_type=&s_keyword=" target="_blank" alt="온라인모의고사신청" />
                </map>
                <!--레이어팝업-->
                <div id="popup" class="Pstyle">
                    <span class="b-close">X</span>
                    <div class="content">
                        <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_03_2.jpg" />
                    </div>
                </div>
            </div>
        @else
            {{-- 17일 이후 노출--}}
            <div id="content_3" class="tabCts pb90 pt100">
                <ul class="assayTab assayTab2">
                    <li><a href="#assayTab10">서울시</a></li>
                    <li><a href="#assayTab11">지방직</a></li>
                </ul>
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_01.png" title="총평" class="mt50"/>
                <div id="assayTab10" class="subject mt50">
                    <ul class="subjectMenu">
                        <li><a href="#sub01" class="active">국어</a></li>
                        <li><a href="#sub02">영어</a></li>
                        <li><a href="#sub03">한국사</a></li>
                        <li><a href="#sub04">행정학</a></li>
                        <li><a href="#sub05">행정법</a></li>
                        <li><a href="#sub06">사회</a></li>
                        <li><a href="#sub07">세법</a></li>
                        <li><a href="#sub08">회계학</a></li>
                        <li><a href="#sub09">기술직</a></li>
                    </ul>
                    <div class="subCts" id="sub01">
                        <div>
                            <h5>국어 | 기미진 교수</h5>
                            <div class="mt20 mb20 board_type">
                            <table cellspacing="0" cellpadding="0">
                                <col />
                                <col />
                                <col />
                                <tr>
                                    <th>구분</th>
                                    <th>문법/규범</th>
                                    <th>비문학/독해</th>
                                    <th>문학</th>
                                    <th>어휘/한자</th>
                                </tr>
                                <tr>
                                    <td>2019년</td>
                                    <td>11(▲2)</td>
                                    <td>2(▽1)</td>
                                    <td>6(▲1)</td>
                                    <td>1(▽2)</td>
                                </tr>
                                <tr>
                                    <td>2018년</td>
                                    <td>9</td>
                                    <td>3</td>
                                    <td>5</td>
                                    <td>3</td>
                                </tr>
                            </table>
                            </div>
                            2019 서울시 9급 시험은 작년 서울시 시험에 비해 다소 어렵게 출제되었습니다. 따라서 시험장에서 수험생들의 체감 난도는 지난 국가직, 
                            지방직 시험에 비해 높았을 것으로 예상됩니다. 합격선은 80점 전후로 형성될 것으로 보입니다. 상단의 분석표와 같이 문제 유형별 
                            출제비중은 문법/규범은 무려 2문제가 늘어난 11문제가 출제되어 서울시 시험의 특징을 여실히 보여주었습니다. 반면 비문학/독해는 1문제가 
                            줄어들었고 문학은 1문제가 늘어났습니다. 어휘/한자 문제는 2문제가 줄어들어 1문제가 출제되었는데, 기존에 출제되었던 
                            내용(속담, 한자성어, 한자어 나이)이 반복 출제되어, 어휘/한자 문제로 인한 변별력은 크지 않을 것으로 예상됩니다. 
                            다만 문학 등에서 생소한 유형의 문제들이 출제되어 문제 자체가 까다롭게 느껴졌을 것으로 생각됩니다.그러나 수업 중에 강조했던 
                            기본 개념을 확실히 이해하고 있었다면 정답이 ‘두둥실’ 떠오르는문제들이 많았습니다.결과적으로 국어의 경우 이론 수업을 충실히 듣고 
                            기출문제와 기출변형 문제풀이를 통해 꾸준히 훈련을 한 수험생들의 경우 고득점을 획득할 수 있었습니다. 앞으로의 시험에 대한 대비는 
                            다음과 같이 하시기 바랍니다.<br>
                            <br>
                            - 문법/규범의 경우에는 기본 이론에 충실하되 이번 서울시 9급 수준보다 조금 어려운 기출 변형 문제로 꾸준히 문제풀이 연습을 합니다.<br>
                            - 비문학/독해의 경우에는 9급뿐만 아니라 7급 문제까지 문제 유형별로 나누어 매일 2~3문제씩 풀고 감각을 유지하도록 합니다.<br>
                            - 문학의 경우 고어와 한자로 해석이 어려운 고전시가들은 매일 2~3문제씩 풀고 해당 작품에 대한 현대어 풀이 및 분석 내용을 
                            교재나 포털 사이트를 이용해 평소에미리 접해두면 시험장에서 당황하지 않을 수 있습니다. 서울시의 경우 지식형 문제의 출제 비중이 
                            높으므로 꼼꼼하게 작품을 공부할 필요가 있습니다.<br>
                            - 어휘/한자의 경우에는 암기만이 우리의 살길이므로 매일 30분씩(그 이상은 추천하지 않습니다) 시간을 할당하여 
                            기출 어휘/한자를 중심으로 암기해 나가도록 합니다. 단순 암기는 머릿속에 남지 않으므로 매번 새로운 자극을 받으면서 
                            암기할수 있도록 시간, 장소, 분량, 암기 방식을 바꿔 가며 여러분의 뇌가 신선한 자극을받을 수 있도록 노력해 주시기 바랍니다.<br>
                            <br>
                            수험생 여러분! 그동안 고생 많으셨습니다.<br>
                            이제 이번 시험 결과는 잊고 담대하게 2019년 시험에 대비해 주시기 바랍니다.<br>
                            <br>
                            2019. 6. 16.<br>
                            기미진 올림
                        </div>
                    </div>
                    <div class="subCts" id="sub02">
                        <div class="comingsoon">영어 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts" id="sub03">
                    <div>
                        <h5>한국사 | 조민주 교수</h5>
                        [2019 문항분석]
                        <div class="mt20 mb20 board_type">                     
                            <table cellspacing="0" cellpadding="0">
                                <col />
                                <col />
                                <col />
                                <col />
                                <col />
                                <tr>
                                    <th>유형</th>
                                    <th>정치 [14]</th>
                                    <th>경제 [1]</th>
                                    <th>사회 [1]</th>
                                    <th>문화 [5]</th>
                                </tr>
                                <tr>
                                    <td>선사시대</td>
                                    <td>1. 고조선</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>고대</td>
                                  <td>2. 백제의 발전<br />
                                    3. 금관가야<br />
                                  4. 발해의 사회<br /></td>
                                  <td>&nbsp;</td>
                                  <td>5. 삼국의 사회/문화</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>중세</td>
                                  <td>6. 고려의 군사제도<br />
                                    7. 성종의 업적<br />
                                  9. 무신집권기</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>8. 고려 불교계의 동향</td>
                                </tr>
                                <tr>
                                  <td>근세</td>
                                  <td>10. 조선 태종</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>근대태동기</td>
                                  <td>&nbsp;</td>
                                  <td>11. 대동법</td>
                                  <td>&nbsp;</td>
                                  <td>12. 실학자<br />
                                    13. 지도 편찬</td>
                                </tr>
                                <tr>
                                  <td>근대</td>
                                  <td>15. 위정척사 운동<br />
                                  16. 미국과의 관계</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>민족독립운동가</td>
                                  <td>17. 한일 신협약<br />
                                  18. 사건 발생 순서</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>현대</td>
                                  <td>19. 4.19 혁명 <br />
                                  20. 유신체제</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>통합</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>13. 의서</td>
                                </tr>
                            </table>
                        </div>
                        [총평]<br>
                        <br>
                        2019년 서울시 9급 한국사는 작년 서울시 9급에 비해서 전반적으로 평이하게 출제되었습니다. 
                        국가직 9급이 워낙 쉬웠기 때문에 그보다는 약간 어려웠으나 예년에 비해서는 쉽게 출제되었습니다.
                        전근대사 14문제, 근현대사 6문제가 출제되었고 정치사 비중이 역시 높았으며 문화사가 5문제로 경제ㆍ사회 보다는 비중이 높았습니다. 
                        지방직과 비슷하게 의서의 순서를 물어보는 문제가 출제되었고 삼국의 문화를 물어본 5번과 지도 편찬에 대해 묻는 14번 문제가 약간 까다로웠습니다. 
                        울시에서 자주 출제되는 유형인 순서나열 문제가 3문제 출제되었고 사료 제시형 문제가 9문제가 출제되어 예년보다는 조금 더 늘어났습니다.<br>
                        <br>
                        [향후 공부 방법]<br>
                        <br>
                        문제가 전반적으로 평이하게 출제 될 경우에는 기본 개념을 정확하게 파악하면서 기출문제를 중심으로 공부하되 실수를 줄이는 연습을 해야합니다. 
                        수험생 여러분! 그동안 고생 많으셨습니다.
                        </div>
                    </div>
                    <div class="subCts" id="sub04">
                        <div>
                            <h5>행정학 | 김덕관 교수</h5>
                            이번 지방직 9급은 실망스럽게도 합격가능한 범위에 있는 분들 간 변별력이 거의 없었던 시험이었습니다. 18문제는 단원별 기출문제집에 있었던 문제의 결론만 알아도 기계적으로 답이 나오는 문제였고, 약간이나마 생각이 필요한 문제도 별로 없었습니다. 생소한 문제로 분류한 4번도 단원별 기출문제집에 없을 뿐 그냥 풀 수 있는 쉬운 문제였습니다.
                            물론 행정학 “시험공부” 방향 자체를 잘못 잡은 분들과 단원별 기출문제집이라는 “족보”의 결론부터 암기한 분들 간 점수 차이는 명확하게 나긴 할 겁니다. 하지만 제대로 공부한 분들 중에서 저와 함께 행정학 시험에서 확실하게 점수 따는 요령을 잡은 분들과 아직 점수 따는 공부 요령이 약간 부족한 분들 간 점수 차이가 별로 안 나게 되어 아쉬운 시험이었습니다. 이러면 ‘행정학 때문에 합격!’은 아닌 행정학은 일단 90~95점 맞고, 다른 과목에서 합격 및 불합격 여부가 나뉠 겁니다.
                            20번 문제 외에는 전부 단원별 기출문제집에 있는 내용이니 1~19번 중 틀린 문제가 있는 분들은 단원별 기출문제집 회독수를 더 올려 주시기 바랍니다. 20번 문제 같이 거의 출제되지 않으면서 암기할 게 너무 많은 것을 맞추려고 시간을 쓰면 더 중요한 부분을 반복하지 못해 점수가 오히려 떨어지니 20번 문제는 틀렸어도 괜찮습니다. 그 시간에 매번 시험에 나왔던 것을 반복한 분들이 95점 맞았을 겁니다.
                            이번 시험에서도 느꼈을 겁니다. 제가 강의 때마다 강조한 이 출제포인트는 “무엇이, 어떻게” 출제된다고 피 토하면서 말했던 내용이 그대로 출제된 게 대부분이라는 것을 느꼈을 겁니다. 이건 제 강의 자랑이 아니라 그냥 기출문제라는 족보에 매번 있었으니 강조했을 뿐이라고 말하는 겁니다. 앞으로도 항상 기출문제“부터” 결론을 암기하고 그 다음 단계로 나아가길 바랍니다. 절대 “학문을 이해하는 공부”와 “시험에서 점수 따는 시험공부” 중, 우리가 어떤 것을 하고 있는지 혼동하지 말고 목적의식을 분명히 가지길 바랍니다. 
                        </div>
                    </div>
                    <div class="subCts" id="sub05">
                        <div>
                            <h5>행정법 | 한세훈 교수</h5>
                            대다수의 문제는 쉽게 풀 수 있었겠으나 기존에 알던 판례도 정확하게 알지 못하면 생소하게 느껴지는 판례도 있었을 것입니다. 
                            이번 시험에서 딱 틀린만 한 문제를 꼽자면 일부취소와 관련된 판례문제로 보입니다. 다른 문제들은 기존에 중요한  부분으로서  다들 배운 부분입니다. 
                            항상 느끼는 것은 결국 수험은 90점 이상을 목표로 하는 것이지 100점을 목표로 하는 것이 아니라는 것입니다. 
                            중요한 것을 정확하게 습득하기 위한 노력이 필요합니다. 이 부분은 수험생의 몫이라기 보다는 강사의 몫이라는 생각이 듭니다.  
                            제 수업을 열심히 들으신 분이라면 제가 항상 기본기로 반복적으로 설명드린 부분에서도 많이 나왔다는 생각을 하실 거라고 생각합니다. 
                            만일 다시 행정법을 공부해야 하는 일이 생기고 이번시험에서 좋은 결과를 거두지 못 하였다면, 공부방법을 바꾸셔야 합니다. 
                            예상하지 못한 대집행의 조문 부분이나 구석진 판례가 하나 출제되었다고 하더라도 대집행 문제는 다른 지문으로도 충분히 해결 가능하였다는 것을 
                            감안 하면 중요한 부분만 제대로 알아도 1개를 틀리는 것에 그쳤을 것입니다. 
                            <h5 class="mt20">향후 공부 방법</h5>
                            1. 우선 기본기에 충실하게 개념을 정확하게 이해하는 것이 중요합니다. 각 단원의 서론 부분을 신경써서 보아야 합니다. 의의와 법적 근거에 대하여 이해위주로 학습하시길 권합니다.<br><br>
                            2. 판례는 중요한 판례가 대부분 다시 출제되므로 이미 기출된 판례는 대충보고 지나가는 것이 아니라 원칙과 예외 부분으로 나뉘어져 있는 등의 특별한 내용을 잘 습득하도록 노력하여야 합니다.<br><br>
                            3. 학원에서 나누어 주는 문제들은 보통 기출을 기반해서 꼭 알아야 하는 내용을 선별하여 나갑니다. 따라서 기본강의를 들으실 때, 반드시 데일리 테스트와 같은 컨텐츠가 있다면 반드시 하셔야 합니다. <br><br>
                            수험생 여러분! 그동안 고생 많으셨습니다.<br><br>
                            2019. 6. 15.<br>
                            한세훈 올림
                        </div>
                    </div>
                    <div class="subCts" id="sub06">
                        <div class="comingsoon">사회 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts" id="sub07">
                        <div class="comingsoon">세법 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts" id="sub08">
                        <div class="comingsoon">회계학 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts" id="sub09">
                        <div class="comingsoon">기술직 총평을 준비중입니다.</div>
                    </div>
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_03.png" class="mt100" title="해설"/>
                    <ul class="pdfdown">
                        <li><a href="@if($file_yn[41] == 'Y') {{ front_url($file_link[41]) }} @else {{ $file_link[41] }} @endif"> 국어</a></li>
                        <li><a href="@if($file_yn[42] == 'Y') {{ front_url($file_link[42]) }} @else {{ $file_link[42] }} @endif"> 영어</a></li>
                        <li><a href="@if($file_yn[43] == 'Y') {{ front_url($file_link[43]) }} @else {{ $file_link[43] }} @endif"> 한국사</a></li>
                        <li><a href="@if($file_yn[44] == 'Y') {{ front_url($file_link[44]) }} @else {{ $file_link[44] }} @endif"> 행정학</a></li>
                        <li><a href="@if($file_yn[45] == 'Y') {{ front_url($file_link[45]) }} @else {{ $file_link[45] }} @endif"> 행정법</a></li>
                        <li><a href="@if($file_yn[46] == 'Y') {{ front_url($file_link[46]) }} @else {{ $file_link[46] }} @endif"> 세법</a></li>
                        <li><a href="@if($file_yn[47] == 'Y') {{ front_url($file_link[47]) }} @else {{ $file_link[47] }} @endif"> 회계학</a></li>
                        <li><a href="@if($file_yn[48] == 'Y') {{ front_url($file_link[48]) }} @else {{ $file_link[48] }} @endif"> 사회</a></li>
                        <li><a href="@if($file_yn[49] == 'Y') {{ front_url($file_link[49]) }} @else {{ $file_link[49] }} @endif"> 과학</a></li>
                        <li><a href="@if($file_yn[50] == 'Y') {{ front_url($file_link[50]) }} @else {{ $file_link[50] }} @endif"> 수학</a></li>
                        <li><a href="@if($file_yn[51] == 'Y') {{ front_url($file_link[51]) }} @else {{ $file_link[51] }} @endif"> 재배학</a></li>
                        <li><a href="@if($file_yn[52] == 'Y') {{ front_url($file_link[52]) }} @else {{ $file_link[52] }} @endif"> 식용작물</a></li>
                        <li><a href="@if($file_yn[53] == 'Y') {{ front_url($file_link[53]) }} @else {{ $file_link[53] }} @endif"> 전기이론</a></li>
                        <li><a href="@if($file_yn[54] == 'Y') {{ front_url($file_link[54]) }} @else {{ $file_link[54] }} @endif"> 전기기기</a></li>
                        <li><a href="@if($file_yn[55] == 'Y') {{ front_url($file_link[55]) }} @else {{ $file_link[55] }} @endif"> 통신이론</a></li>
                        <li><a href="@if($file_yn[56] == 'Y') {{ front_url($file_link[56]) }} @else {{ $file_link[56] }} @endif"> 전자공학</a></li>
                        <li><a href="@if($file_yn[57] == 'Y') {{ front_url($file_link[57]) }} @else {{ $file_link[57] }} @endif"> 공중보건</a></li>
                        <li><a href="@if($file_yn[58] == 'Y') {{ front_url($file_link[58]) }} @else {{ $file_link[58] }} @endif"> 보건행정</a></li>
                        <li><a href="@if($file_yn[59] == 'Y') {{ front_url($file_link[59]) }} @else {{ $file_link[59] }} @endif"> 토목설계</a></li>
                        <li><a href="@if($file_yn[60] == 'Y') {{ front_url($file_link[60]) }} @else {{ $file_link[60] }} @endif"> 응용역학</a></li>
                    </ul>
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_04.png" class="mt100" title="해설"/>
                    <ul class="subjectMenu subjectMenu2 mt50">
                        <li><a href="#sub11" class="active">국어</a></li>
                        <li><a href="#sub12">영어</a></li>
                        <li><a href="#sub13">한국사</a></li>
                        <li><a href="#sub14">행정학</a></li>
                        <li><a href="#sub15">행정법</a></li>
                        <li><a href="#sub16">사회</a></li>
                        <li><a href="#sub17">세법</a></li>
                        <li><a href="#sub18">회계학</a></li>
                        <li><a href="#sub19">기술직</a></li>
                    </ul>
                    <div class="subCts2" id="sub11">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t11.jpg" usemap="#Map1244play01" border="0" >
                            <map name="Map1244play01" id="Map1244play01">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/_iE5Ht4I-j8" target="_blank" alt="국어 기미진 해설강의" />   
                            </map>
                        </div>
                    </div>
                    <div class="subCts2" id="sub12">
                        <div class="comingsoon">영어 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts2" id="sub13">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t15.jpg" usemap="#Map1244play03" border="0" >
                            <map name="Map1244play03" id="Map1244play03">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/Q92AdHR1yaM" target="_blank" alt="한국사 조민주 해설강의" />   
                            </map>
                        </div>
                    </div>
                    <div class="subCts2" id="sub14">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t1.jpg" usemap="#Map1244play04" border="0" >
                            <map name="Map1244play04" id="Map1244play04">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/in1xigPEbkI" target="_blank" alt="행정학 김덕관 해설강의" />
                                <area shape="rect" coords="662,63,736,117" href="https://youtu.be/CYD7mAoMTvg" target="_blank" alt="행정학 윤세훈 해설강의" />
                            </map>
                        </div>
                    </div>
                    <div class="subCts2" id="sub15">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t3.jpg" usemap="#Map1244play05" border="0" >
                            <map name="Map1244play05" id="Map1244play05">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/FsXxBFzQTQ8" target="_blank" alt="행정법 한세훈 해설강의" />
                            </map>
                        </div>
                    </div>
                    <div class="subCts2" id="sub16">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t7.jpg" usemap="#Map1244play06" border="0" >
                            <map name="Map1244play06" id="Map1244play06">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/a1wq1c7wfBA" target="_blank" alt="사회 문병일 해설강의" />
                            </map>
                        </div>
                    </div>
                    <div class="subCts2" id="sub17">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t13.jpg" usemap="#Map1244play07" border="0" >
                            <map name="Map1244play07" id="Map1244play07">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/WxxZPyuNRwY" target="_blank" alt="세법 고선미 해설강의" />
                            </map>
                        </div>
                    </div>
                    <div class="subCts2" id="sub18">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t4.jpg" usemap="#Map1244play08" border="0" >
                            <map name="Map1244play08" id="Map1244play08">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/BrkvNiyPMAU" target="_blank" alt="회계학 김영훈 해설강의" />
                            </map>
                        </div>
                    </div>
                    <div class="subCts2" id="sub19">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t9.jpg" usemap="#Map1244play09" border="0" >
                            <map name="Map1244play09" id="Map1244play09">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/gU1ZLu1CL6o" target="_blank" alt="전자공학 최우영 해설강의" />
                                <area shape="rect" coords="662,63,736,117" href="https://youtu.be/KLYnCWT8ekw" target="_blank" alt="통신이론 최우영 해설강의" />
                                <area shape="rect" coords="192,326,255,374" href="https://youtu.be/eRrHTbcFBtY" target="_blank" alt="전기이론 최우영 해설강의" />
                            </map>
                        </div>
                    </div>
                </div>

                <div id="assayTab11" class="subject mt50">
                    <ul class="subjectMenu subjectMenu3">
                        <li><a href="#sub21" class="active">국어</a></li>
                        <li><a href="#sub22">영어</a></li>
                        <li><a href="#sub23">한국사</a></li>
                        <li><a href="#sub24">행정학</a></li>
                        <li><a href="#sub25">행정법</a></li>
                        <li><a href="#sub26">사회</a></li>
                        <li><a href="#sub27">세법</a></li>
                        <li><a href="#sub28">회계학</a></li>
                        <li><a href="#sub29">기술직</a></li>
                    </ul>
                    <div class="subCts3" id="sub21">
                        <div>
                            <h5>국어 | 기미진 교수</h5>
                            <div class="mt20 mb20 board_type">
                                <table cellspacing="0" cellpadding="0">
                                    <col />
                                    <col />
                                    <col />
                                    <tr>
                                        <th>구분</th>
                                        <th>문법/규범</th>
                                        <th>비문학/독해</th>
                                        <th>문학</th>
                                        <th>어휘/한자</th>
                                    </tr>
                                    <tr>
                                        <td>2019년</td>
                                        <td>6(▽1)</td>
                                        <td>8(▲1)</td>
                                        <td>4</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>2018년</td>
                                        <td>7</td>
                                        <td>7</td>
                                        <td>4</td>
                                        <td>2</td>
                                    </tr>
                                </table>
                            </div>
                            2019 지방직 9급 시험은 크게 어렵거나 쉽지 않은 중간 정도의 난이도입니다. 따라서 합격선은 80~85점 사이로 예상됩니다. 
                            상단의 분석표와 같이 문제 유형별 출제비중은 문법/규범은 1문제가 줄어들었으며, 비문학/독해는 1문제가 늘어났습니다. 
                            이는 국가직 시험에서 독해의 비중이 늘어나는 것과 유사한 추세입니다. 반면 문학과 어휘/한자의 경우 전년도와 문항 수가 동일한 점이 
                            국가직과 다른 점이었습니다. 이번 시험은 대다수 문제들이 기존 기출문제의 변형에서 크게 벗어나지 않았으므로 
                            그동안 기출문제를 충실히 풀고 기출 변형 문제풀이를 통해 꾸준히 훈련을 한 수험생들의 경우 고득점을 획득할 수 있었습니다. 
                            또한 어법(사이시옷의 표기) 관련 선지 중 ‘인사말’의 경우 시험 직전 ‘최종 Live 특강’에서 언급한 그대로 출제되어 많은 수험생들에게 도움이 되었습니다.<br>
                            <br>
                            앞으로의 시험에 대한 대비는 다음과 같이 하시기 바랍니다. <br>
                            - 문법/규범의 경우에는 이번 지방직 수준 난도의 기출 변형 문제로 꾸준히 문제풀이 연습을 합니다.<br>
                            - 비문학/독해의 경우에는 9급뿐만 아니라 7급 기출문제 중 본인이 느끼기에 어려운 소재를 다룬 지문들을 골라 문제 유형별로 매일 2~3문제씩 풀고 감각을 유지하도록 합니다. 또한 ‘글쓰기 방식’, ‘말하기 방식’ 등은 지방직 시험 단골 유형이므로 이에 대한 대비도 필요합니다. <br>
                            - 문학의 경우에는 고어와 한자로 해석이 어려운 고전 운문들은 평소에 미리 접해두면 시험장에서 당황하지 않을 수 있습니다. 매일 2~3문제씩 풀고 작품 분석을 함으로써 문학 공부를 생활화합니다. <br>
                            - 어휘/한자의 경우에는 암기만이 우리의 살길이므로 매일 30분씩 시간을 할당하여 기출 어휘/한자를 중심으로 암기해 나가도록 합니다. 단순 암기는 머릿속에 남지 않으므로 매번 새로운 자극을 받으면서 암기할 수 있도록 시간, 장소, 분량, 암기 방식을 바꿔 가며 여러분의 뇌가 신선한 자극을 받을 수 있도록 노력해 주시기 바랍니다.<br>
                            <br>
                            수험생 여러분! 그동안 고생 많으셨습니다. <br>
                            이제 이번 시험 결과는 잊고 담대하게 앞으로 남은 시험에 대비해 주시기 바랍니다.<br>
                            <br>
                            2019. 6. 16.<br>
                            기미진 올림<br>
                        </div>
                    </div>
                    <div class="subCts3" id="sub22">
                        <div class="comingsoon">영어 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts3" id="sub23">
                        <h5>한국사 | 조민주 교수</h5>
                        [2019 문항분석]
                        <div class="mt20 mb20 board_type">                     
                            <table cellspacing="0" cellpadding="0">
                                <col />
                                <col />
                                <col />
                                <col />
                                <col />
                                <tr>
                                    <th>유형</th>
                                    <th>정치 [13]</th>
                                    <th>경제 [2]</th>
                                    <th>사회 [1]</th>
                                    <th>문화 [4]</th>
                                </tr>
                                <tr>
                                    <td>선사시대</td>
                                    <td>1. 여러나라의 성장</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>고대</td>
                                    <td>2. 삼국의 발전<br /></td>
                                    <td>3. 통일신라의 경제</td>
                                    <td>&nbsp;</td>
                                    <td>5. 삼국의 문화<br />
                                9. 자장
                                </td>
                                </tr>
                                <tr>
                                    <td>중세</td>
                                    <td>6. 고려 태조</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>7. 고려의 승려</td>
                                </tr>
                                <tr>
                                    <td>근세</td>
                                    <td>8. 세종<br />
                                    10. 임진왜란<br />
                                    11. 정도전</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>근대태동기</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>14. 서학(천주교)</td>
                                    <td>12. 실학자<br />
                                    13. 지도 편찬</td>
                                </tr>
                                <tr>
                                    <td>근대</td>
                                    <td>12. 근대의 조약<br />
                                    13. 대한제국<br />
                                    18. 고종(흥선대원군</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>민족독립운동가</td>
                                    <td>15. 대한민국 임시정부<br />
                                    16. 의열단<br />
                                    17. 일제의 식민정책</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>현대</td>
                                    <td>20. 베트남 파병</td>
                                    <td>19. 농지개혁</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>통합</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>4. 의서</td>
                                </tr>
                            </table>
                        </div>
                        [총평]<br>
                        <br>
                        2019년 지방직 9급 한국사는 올해 시행된 국가직 9급과 비슷하게 전반적으로 평이하게 출제되었습니다. 국가직 9급 워낙 쉬웠기 때문에 그보다는 약간 어려웠으나 예년에 비해서는 쉽게 출제되었고, 서울시 9급과 비슷한 수준이었습니다.
                        전근대사 12문제, 근현대사 8문제가 출제되어 근현대사의 비중이 높았고 정치사가 13문제로 비중이 역시 높았으며, 문화사가 경제ㆍ사회보다는 비중이 높았습니다. 서울시와 비슷하게 의서의 순서를 물어보는 문제가 출제되었는데, 4번 의서 관련 문제와  15번 임시정부의 건국 강령,  19번 농지개혁과 관련 문제가 약간 까다로웠습니다. 
                        이번 시험에서도 역시  사료 제시형 문제가 16문제가 출제되어 예년보다는 조금 더 늘어났습니다.<br>
                        <br>
                        [향후 공부 방법]<br>
                        <br>
                        문제가 전반적으로 평이하게 출제 될 경우에는 기본 개념을 정확하게 파악하면서 기출문제를 중심으로 공부하되 실수를 줄이는 연습을 해야합니다. 
                        수험생 여러분! 그동안 고생 많으셨습니다.                        
                    </div>
                    <div class="subCts3" id="sub24">
                        <div>
                            <h5>행정학 | 김덕관 교수</h5>
                            이번 지방직 9급은 실망스럽게도 합격가능한 범위에 있는 분들 간 변별력이 거의 없었던 시험이었습니다. 18문제는 단원별 기출문제집에 있었던 문제의 결론만 알아도 기계적으로 답이 나오는 문제였고, 약간이나마 생각이 필요한 문제도 별로 없었습니다. 생소한 문제로 분류한 4번도 단원별 기출문제집에 없을 뿐 그냥 풀 수 있는 쉬운 문제였습니다.
                            물론 행정학 “시험공부” 방향 자체를 잘못 잡은 분들과 단원별 기출문제집이라는 “족보”의 결론부터 암기한 분들 간 점수 차이는 명확하게 나긴 할 겁니다. 하지만 제대로 공부한 분들 중에서 저와 함께 행정학 시험에서 확실하게 점수 따는 요령을 잡은 분들과 아직 점수 따는 공부 요령이 약간 부족한 분들 간 점수 차이가 별로 안 나게 되어 아쉬운 시험이었습니다. 이러면 ‘행정학 때문에 합격!’은 아닌 행정학은 일단 90~95점 맞고, 다른 과목에서 합격 및 불합격 여부가 나뉠 겁니다.
                            20번 문제 외에는 전부 단원별 기출문제집에 있는 내용이니 1~19번 중 틀린 문제가 있는 분들은 단원별 기출문제집 회독수를 더 올려 주시기 바랍니다. 20번 문제 같이 거의 출제되지 않으면서 암기할 게 너무 많은 것을 맞추려고 시간을 쓰면 더 중요한 부분을 반복하지 못해 점수가 오히려 떨어지니 20번 문제는 틀렸어도 괜찮습니다. 그 시간에 매번 시험에 나왔던 것을 반복한 분들이 95점 맞았을 겁니다.
                            이번 시험에서도 느꼈을 겁니다. 제가 강의 때마다 강조한 이 출제포인트는 “무엇이, 어떻게” 출제된다고 피 토하면서 말했던 내용이 그대로 출제된 게 대부분이라는 것을 느꼈을 겁니다. 이건 제 강의 자랑이 아니라 그냥 기출문제라는 족보에 매번 있었으니 강조했을 뿐이라고 말하는 겁니다. 앞으로도 항상 기출문제“부터” 결론을 암기하고 그 다음 단계로 나아가길 바랍니다. 절대 “학문을 이해하는 공부”와 “시험에서 점수 따는 시험공부” 중, 우리가 어떤 것을 하고 있는지 혼동하지 말고 목적의식을 분명히 가지길 바랍니다.
                        </div>
                    </div>
                    <div class="subCts3" id="sub25">
                        <div>
                            <h5>행정법 | 한세훈 교수</h5>
                            전반적으로 기본기가 묻는 문제가 많았고 서울시 문제에 비해서는 판례의 비중이 다소 높았습니다. 
                            난이도 있는 사례 문제도 있었으며 생소한 판례도 출제되었습니다.  대다수의 문제는 중요한 내용을 정확하게 알고 있다면 풀 수 있는 문제였습니다. 
                            그리고 16번은 최신판례가 나왔지만 나머지 문제가 이미 여러분들에게 익숙한 문제였습니다. 
                            다만 대집행에 관한 문제는 정확한 이해를 하지 못하였다면 어려울 수 있었다고 봅니다.  
                            특히 선결문제의 의미도 제대로 파악하고 있어야 풀 수 있는 문제가 출제되었습니다.  
                            <h5 class="mt20">향후 공부 방법</h5>
                            1. 판례의 비중이 높다하여도 행정법은 기본적으로 이해가 바탕이 되어야 합니다. 특히 선결문제와 같은 경우 암기식으로 공부했다면 답이 보이지 않았을 것입니다.<br><br>
                            2. 판례는 중요한 판례가 대부분 다시 출제되므로 이미 기출된 판례는 대충보고 지나가는 것이 아니라 원칙과 예외 부분으로 나뉘어져 있는 등의 특별한 내용을 잘 습득하도록 노력하여야 합니다.<br><br>
                            3. 판례의 비중이 높지만 중요판례들과 책에 나온 판례의 범위에서 벗어나는 것은 거의 없습니다.  따라서 중요한 것 위주로 공부하고 마지막으로 판례를 보충하여 점수를 높이는 전략을 써야합니다.<br><br>
                            수험생 여러분! 그동안 고생 많으셨습니다.<br><br>
                            2019. 6. 15.<br>
                            한세훈 올림
                        </div>
                    </div>
                    <div class="subCts3" id="sub26">
                        <div class="comingsoon">사회 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts3" id="sub27">
                        <div class="comingsoon">세법 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts3" id="sub28">
                        <div class="comingsoon">회계학 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts3" id="sub29">
                        <div class="comingsoon">기술직 총평을 준비중입니다.</div>
                    </div>                    
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_03.png" class="mt100" title="해설"/>
                    <ul class="pdfdown">
                        <li><a href="@if($file_yn[71] == 'Y') {{ front_url($file_link[71]) }} @else {{ $file_link[71] }} @endif"> 국어</a></li>
                        <li><a href="@if($file_yn[72] == 'Y') {{ front_url($file_link[72]) }} @else {{ $file_link[72] }} @endif"> 영어</a></li>
                        <li><a href="@if($file_yn[73] == 'Y') {{ front_url($file_link[73]) }} @else {{ $file_link[73] }} @endif"> 한국사</a></li>
                        <li><a href="@if($file_yn[74] == 'Y') {{ front_url($file_link[74]) }} @else {{ $file_link[74] }} @endif"> 행정학</a></li>
                        <li><a href="@if($file_yn[75] == 'Y') {{ front_url($file_link[75]) }} @else {{ $file_link[75] }} @endif"> 행정법</a></li>
                        <li><a href="@if($file_yn[76] == 'Y') {{ front_url($file_link[76]) }} @else {{ $file_link[76] }} @endif"> 세법</a></li>
                        <li><a href="@if($file_yn[77] == 'Y') {{ front_url($file_link[77]) }} @else {{ $file_link[77] }} @endif"> 회계학</a></li>
                        <li><a href="@if($file_yn[78] == 'Y') {{ front_url($file_link[78]) }} @else {{ $file_link[78] }} @endif"> 사회</a></li>
                        <li><a href="@if($file_yn[79] == 'Y') {{ front_url($file_link[79]) }} @else {{ $file_link[79] }} @endif"> 과학</a></li>
                        <li><a href="@if($file_yn[80] == 'Y') {{ front_url($file_link[80]) }} @else {{ $file_link[80] }} @endif"> 수학</a></li>
                        <li><a href="@if($file_yn[81] == 'Y') {{ front_url($file_link[81]) }} @else {{ $file_link[81] }} @endif"> 재배학</a></li>
                        <li><a href="@if($file_yn[82] == 'Y') {{ front_url($file_link[82]) }} @else {{ $file_link[82] }} @endif"> 식용작물</a></li>
                        <li><a href="@if($file_yn[83] == 'Y') {{ front_url($file_link[83]) }} @else {{ $file_link[83] }} @endif"> 전기이론</a></li>
                        <li><a href="@if($file_yn[84] == 'Y') {{ front_url($file_link[84]) }} @else {{ $file_link[84] }} @endif"> 전기기기</a></li>
                        <li><a href="@if($file_yn[85] == 'Y') {{ front_url($file_link[85]) }} @else {{ $file_link[85] }} @endif"> 통신이론</a></li>
                        <li><a href="@if($file_yn[86] == 'Y') {{ front_url($file_link[86]) }} @else {{ $file_link[86] }} @endif"> 전자공학</a></li>
                        <li><a href="@if($file_yn[87] == 'Y') {{ front_url($file_link[87]) }} @else {{ $file_link[87] }} @endif"> 공중보건</a></li>
                        <li><a href="@if($file_yn[88] == 'Y') {{ front_url($file_link[88]) }} @else {{ $file_link[88] }} @endif"> 보건행정</a></li>
                        <li><a href="@if($file_yn[89] == 'Y') {{ front_url($file_link[89]) }} @else {{ $file_link[89] }} @endif"> 토목설계</a></li>
                        <li><a href="@if($file_yn[90] == 'Y') {{ front_url($file_link[90]) }} @else {{ $file_link[90] }} @endif"> 응용역학</a></li>
                    </ul>
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_04.png" class="mt100" title="해설"/>
                    <ul class="subjectMenu subjectMenu4 mt50">
                        <li><a href="#sub31" class="active">국어</a></li>
                        <li><a href="#sub32">영어</a></li>
                        <li><a href="#sub33">한국사</a></li>
                        <li><a href="#sub34">행정학</a></li>
                        <li><a href="#sub35">행정법</a></li>
                        <li><a href="#sub36">사회</a></li>
                        <li><a href="#sub37">세법</a></li>
                        <li><a href="#sub38">회계학</a></li>
                        <li><a href="#sub39">기술직</a></li>
                    </ul>
                    <div class="subCts4" id="sub31">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t12.jpg" usemap="#Map1244play11" border="0" >
                            <map name="Map1244play11" id="Map1244play11">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/XIc1h4J91ow" target="_blank" alt="국어 기미진 해설강의" />   
                            </map>
                        </div>
                    </div>
                    <div class="subCts4" id="sub32">
                        <div class="comingsoon">영어 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts4" id="sub33">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t16.jpg" usemap="#Map1244play13" border="0" >
                            <map name="Map1244play13" id="Map1244play13">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/rnZLWC83iPo" target="_blank" alt="한국사 조민주 해설강의" />   
                            </map>
                        </div>
                    </div>
                    <div class="subCts4" id="sub34">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t2.jpg" usemap="#Map1244play14" border="0" >
                            <map name="Map1244play14" id="Map1244play14">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/zFR11Rt1_2o" target="_blank" alt="행정학 김덕관 해설강의" />
                                <area shape="rect" coords="662,63,736,117" href="https://youtu.be/6oIU2YNKZ_Q" target="_blank" alt="행정학 윤세훈 해설강의" />
                            </map>
                        </div>
                    </div>
                    <div class="subCts4" id="sub35">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t6.jpg" usemap="#Map1244play15" border="0" >
                            <map name="Map1244play15" id="Map1244play15">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/ufDQt5cRUYk" target="_blank" alt="행정법 한세훈 해설강의" />
                            </map>
                        </div>
                    </div>
                    <div class="subCts4" id="sub36">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t8.jpg" usemap="#Map1244play16" border="0" >
                            <map name="Map1244play16" id="Map1244play16">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/Bzvm8_FZhIo" target="_blank" alt="사회 문병일 해설강의" />
                            </map>
                        </div>
                    </div>
                    <div class="subCts4" id="sub37">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t14.jpg" usemap="#Map1244play17" border="0" >
                            <map name="Map1244play17" id="Map1244play17">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/rtT9ZjhIU_M" target="_blank" alt="세법 고선미 해설강의" />
                            </map>
                        </div>
                    </div>
                    <div class="subCts4" id="sub38">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t5.jpg" usemap="#Map1244play18" border="0" >
                            <map name="Map1244play18" id="Map1244play18">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/Bzvm8_FZhIo" target="_blank" alt="회계학 김영훈 해설강의" />
                            </map>
                        </div>
                    </div>
                    <div class="subCts4" id="sub39">
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_t10.jpg" usemap="#Map1244play19" border="0" >
                            <map name="Map1244play19" id="Map1244play19">
                                <area shape="rect" coords="186,62,259,117" href="https://youtu.be/9UfvR07bPwk" target="_blank" alt="전기이론 최우영 해설강의" />
                            </map>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($now_day < $set_tab_day['content']['4'])
            {{--기존 4번탭--}}
            <div id="content_4" class="tabCts">
                @php
                    //라이브방송 날짜 셋팅
                    $set_on_day = ['20190603', '20190604', '20190606', '20190607', '20190608', '20190610', '20190613'];
                    $day = date('Ymd');
                    $time = date('His');

                    //라이브방송 날짜 조건 설정
                    if ($day < '20190603') {
                        $live_type = 'standby';
                    } else if ($day >= '20190603' && $day <= '20190613') {
                        //방송 쉬는 날짜 조건
                        if ($day == '20190605' || $day == '20190609' || $day == '20190611' || $day == '20190612') {
                            $live_type = 'standby';
                        } else {
                            $live_type = 'on';
                        }
                    } else {
                        $live_type = 'off';
                    }

                    //방송 시작시간 설정
                    $live_video_type = 'off';
                    foreach ($set_on_day as $key => $val) {
                        if ($day == '20190603') {
                            if ($time >= '100000' && $time <= '190000') {
                                $live_video_type = 'on';
                            }
                        } else if ($day == $val) {
                            if ($time >= '185000' && $time <= '230000') {
                                $live_video_type = 'on';
                            }
                        }
                    }

                    //라이브 방송 테스트 타입 기본 값 off
                    $LiveTEST = 'off';
                    if ($LiveTEST == 'on') { $live_type = 'on'; $live_video_type = 'on'; }
                @endphp
                <p class="mb100">
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_04_1A.jpg" usemap="#Map1244D" title="족집게 라이브 특강" border="0" />
                    <map name="Map1244D" id="Map1244D">
                        <area shape="rect" coords="122,945,243,981" href="@if(empty($file_yn) === false && $file_yn[21] == 'Y') {{ front_url($file_link[21]) }} @else {{ $file_link[21] }} @endif" title="기미진 특강자료" />
                        <area shape="rect" coords="279,945,404,981" href="@if(empty($file_yn) === false && $file_yn[22] == 'Y') {{ front_url($file_link[22]) }} @else {{ $file_link[22] }} @endif" title="한덕현 특강자료" />
                        <area shape="rect" coords="427,945,551,981" href="@if(empty($file_yn) === false && $file_yn[23] == 'Y') {{ front_url($file_link[23]) }} @else {{ $file_link[23] }} @endif" title="한경준 특강자료" />
                        <area shape="rect" coords="579,945,708,981" href="@if(empty($file_yn) === false && $file_yn[24] == 'Y') {{ front_url($file_link[24]) }} @else {{ $file_link[24] }} @endif" title="김덕관 특강자료" />
                        <area shape="rect" coords="741,945,867,981" href="@if(empty($file_yn) === false && $file_yn[25] == 'Y') {{ front_url($file_link[25]) }} @else {{ $file_link[25] }} @endif" title="한세훈 특강자료" />
                        <area shape="rect" coords="899,945,1027,981" href="@if(empty($file_yn) === false && $file_yn[26] == 'Y') {{ front_url($file_link[26]) }} @else {{ $file_link[26] }} @endif" title="문병일 특강자료" />
                        <area shape="rect" coords="669,1634,951,1685" href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=258" target="_blank" alt="라이브특강 현장 수강 신청" />
                    </map>
                </p>
                <div class="content_4_wrap">
                    <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_04_2.jpg" title="라이브 특강 방송보기" /></p>

                    <div id="movieFrame">
                    @if ($live_type == 'standby')
                        <!--방송 전-->
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_04_3.jpg" title="방송전">
                    @elseif ($live_type == 'on' && $live_video_type == 'on')
                        <!--6/3 ~ 6/11 방송 중-->
                            <script src="/public/vendor/jwplayer/jwplayer.js"></script>
                            <div class="movieplayer">
                                <div class="embedWrap">
                                @if ($ismobile == false)
                                    <!--PC-->
                                        <div class="embed-container" id="myElement">
                                            <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                                            <script type="text/javascript">
                                                jwplayer("myElement").setup({
                                                    width: '100%',
                                                    logo: {file: 'https://static.willbes.net/public/images/promotion/common/live_pass_bi.png'},
                                                    image: "https://static.willbes.net/public/images/promotion/2019/05/1244_04_3.jpg",
                                                    aspectratio: "16:9",
                                                    autostart: "true",
                                                    file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestream4011"
                                                });
                                            </script>
                                        </div>
                                @else
                                    <!--모바일용-->
                                        <div class="embed-container-mobile" id="myElement">
                                            <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                                            <script type="text/javascript">
                                                jwplayer("myElement").setup({
                                                    width: '100%',
                                                    logo: {file: 'https://static.willbes.net/public/images/promotion/common/live_pass_bi.png'},
                                                    image: "https://static.willbes.net/public/images/promotion/2019/05/1244_04_3.jpg",
                                                    aspectratio: "16:9",
                                                    autostart: "true",
                                                    file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestream4011"
                                                });
                                            </script>
                                        </div>
                                        <ul class="mobileCh">
                                            <li><a href="javascript:fn_live('hd')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_playbtnH.png" title="고화질 보기"></a></li>
                                            <li><a href="javascript:fn_live('low')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_playbtnN.png" title="일반화질 보기"></a></li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @elseif ($live_type == 'on' && $live_video_type == 'off')
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_04_3.jpg" title="방송전">
                        @else
                        <!--6/11 00:00 부터 노출-->
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_04_3_end.jpg" title="방송종료" />
                        @endif
                    </div>
                    <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_04_4.jpg" title="라이브 특강 수강 안내"></p>

                    <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_04_5.jpg" title="라이브 특강 방송보기" /></p>
                </div>

                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_normal_partial')
                @endif
            </div>
        @else
            {{-- 15일 노출--}}
            <div id="content_4" class="tabCts pb90 pt100">
                <ul class="assayTab assayTab2">
                    <li><a href="#assayTab20">서울시</a></li>
                    <li><a href="#assayTab21">지방직</a></li>
                </ul>
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_07_01.png" title="총평" class="mt50"/>
                <ul class="level NGEB" id="assayTab20">
                    <div id="assayTab20_subject_p"></div>
                    <div id="assayTab20_subject_s">
                        <li>
                            <div>
                                <select id="subject_s_1" data-select-id="1" class="sele-subject" style="width:100px;">
                                    <option value="" data-level="" data-count="">과목선택</option>
                                </select>
                                평균점수 <strong id="subject_point_1">0</strong>
                            </div>
                            <div id="subject_level_1">체감난이도 <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_star00.jpg"></div>
                        </li>
                    </div>
                </ul>

                <ul class="level NGEB" id="assayTab21">
                    <div id="assayTab21_subject_p"></div>
                    <div id="assayTab21_subject_s">
                        <li>
                            <div>
                                <select id="subject_s_2" data-select-id="2" class="sele-subject" style="width:100px;">
                                    <option value="" data-level="" data-count="">과목선택</option>
                                </select>
                                평균점수 <strong id="subject_point_2">0</strong>
                            </div>
                            <div id="subject_level_2">체감난이도 <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_star00.jpg"></div>
                        </li>
                    </div>
                </ul>
            </div>
        @endif

        <div id="content_5" class="tabCts">
            <p>
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_08_01.jpg" usemap="#Map1244H" title="소문내기 이벤트" border="0" />
                <map name="Map1244H" id="Map1244H">
                    <area shape="rect" coords="917,223,1031,252" href="/pass/support/notice/show?board_idx=228393" target="_blank" alt="당첨확인"/>
                    <area shape="rect" coords="227,860,551,926" href="{{ ($now_day >= $set_tab_day['content']['4']) ? 'javascript:gradOpen();' : 'javascript:alert("6/15 시험 종료 후 등록 가능합니다.");' }}" alt="예상점수 등록하기" />
                    <area shape="rect" coords="569,861,890,925" href="{{ ($now_day >= $set_tab_day['content']['4']) ? site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=4#content_4') : 'javascript:alert("6/15 시험 종료 후 확인 가능합니다");' }}" alt="평균 점수 보러가기" />
                </map>
            </p>
            {{--댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif

            <div class="note">
                <p><img src="https://static.willbes.net/public/images/promotion/2019/05/1244_05_3.jpg" /></p>
                <div class="noteWrap">
                    <div id="event01">
                        <ol>
                            <li>
                                이벤트 기간<br>
                                - 신청 기간: 6월 15일(토)~6월 30(일) (16일간)<br>
                                - 당첨자 발표: 7월 12일(금)<br>
                            </li>
                            <li>
                                이벤트 대상<br>
                                - 설문조사(예상 점수/체감 난이도 등록) 참여자<br>
                                - 후기 작성/적중 신고 참여자<br>
                            </li>
                            <li>
                                선발 및 추첨<br>
                                - 참여자 전원 면접 캠프 20% 수강 할인권 지급<br>
                                - 경품: 설문작성자와 후기/적중 신고 작성자 중 무작위 추첨되며, <span class="tx-origin-red">후기/적중 신고 댓글을 정성스럽게 작성해주신 분들에게 유리합니다. </span><br>
                                - 영화예매권-아이스크림-드링크 순으로 추첨이 진행됩니다. 기추첨된 인원이 재추첨 될 시, 재추첨을 통해 다른 인원을 추첨합니다. (중복 당첨 불가)<br>
                                - 6월 17일(월)에 공지사항을 통해 당첨자가 발표됩니다.
                            </li>
                            <li>
                                이벤트 혜택<br>
                                - 경품은 모바일 쿠폰(기프티콘) 형태로 발송되며, 발송은 1회로 제한합니다.<br>
                                - 기프티콘은 이벤트 참여시 기재된 전화번호로 7월 12일에 발송됩니다.<br>
                                - 휴대폰번호 오류 시 기프티콘은 재발송 되지 않습니다.<br>
                                - 휴대전화 단말기의 MMS 수신상태가 양호하지 않은 경우, 기프티콘 발송이 불가할 수 있습니다.<br>
                                - 이벤트 참여 전 회원정보(휴대폰 번호)를 정확히 수정해주시기 바랍니다. <br>
                                - 기프티콘을 수신한 이후 개인사정에 의해 유효기간이 지나 사용하지 못한 경우 사용하지 않은 혜택에 대해서는 별도로 보상하지 않습니다.<br>
                            </li>
                            <li>
                                기타<br>
                                - URL 공유목적의 댓글을 제외한 모든 댓글은 사전 예고없이 삭제될 수 있습니다.<br>
                            </li>
                        </ol>
                    </div>
                    <p>※ 유의사항을 읽지 않고 발생한 모든 상황에 대해서 윌비스고시학원은 책임지지 않습니다.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        /*tab*/
        $(document).ready(function(){
            var tab_id = '{{ $arr_base['tab_id'] }}';
            var time_tab_3 = {{$set_tab_day['tab']['3']}};  //Tab 접근 시간
            var time_tab_4 = {{$set_tab_day['tab']['4']}};  //Tab 접근 시간
            var time_content_3 = {{$set_tab_day['content']['3']}};  //Tab 접근 시간
            var time_content_4 = {{$set_tab_day['content']['4']}};  //Tab 접근 시간
            var now = nowDate();
            var cnt;

            $('#tab'+tab_id).addClass('active');
            $('.evtMenu ul > li').each(function(item){
                cnt = item + 1;
                $("#content_"+cnt).hide();
                if (tab_id == cnt) {
                    $("#content_"+cnt).show();
                }
            });

            //평균점수조회
            getPredictPoint();

            //과목선택
            $('.sele-subject').on('change', function() {
                var select_id = $(this).data('select-id');
                var value = this.value;
                var level = $(this).find(':selected').attr('data-level');
                var count = $(this).find(':selected').attr('data-count');
                var html = '';
                var point = '0';
                if (value != 'null' && value != '') {
                    if (count < 9) {
                        html = '충분한 데이터가 확보되지 않았습니다.<br>조금만 기다려 주세요.';
                    } else {
                        point = value;
                        html = '체감난이도 ';
                        html += '<img src="https://static.willbes.net/public/images/promotion/2019/05/1244_star0' + level + '.jpg">';
                    }
                } else {
                    html = '충분한 데이터가 확보되지 않았습니다.<br>조금만 기다려 주세요.';
                }
                $('#subject_point_'+select_id).html(point);
                $('#subject_level_'+select_id).html(html);
            });

            if (tab_id == 3 && (now >= time_tab_3 && now < time_content_3)) {
                alert('준비중입니다.');
                location.href = "{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=1#content_1') }}";
            }

            if (tab_id == 4 && (now >= time_tab_4 && now < time_content_4)) {
                alert('준비중입니다.');
                location.href = "{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/'.$data['PromotionCode'].'?tab=1#content_1') }}";
            }
        });

        $(document).ready(function(){
            $('.assayTab').each(function(){
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

        /*마무리특강*/
        var tab1_url = "https://www.youtube.com/embed/5KDnhVEf0bE?rel=0";
        var tab2_url = "https://www.youtube.com/embed/wyQBKuyvbY4?rel=0";
        var tab3_url = "https://www.youtube.com/embed/uNRHXa8uTug?rel=0";
        var tab4_url = "https://www.youtube.com/embed/9EfkeMj4CrQ?rel=0";
        var tab5_url = "https://www.youtube.com/embed/bgd4ZRaHTCs?rel=0";
        var tab6_url = "https://www.youtube.com/embed/bIQerU7Tijc?rel=0";
        var tab7_url = "https://www.youtube.com/embed/vfWaXa4nMYs?rel=0";

        $(document).ready(function(){
            $(".youtubeCts").hide();
            $(".youtubeCts:first").show();
            $(".youtubeTab li a").click(function(){
                var activeTab = $(this).attr("href");
                var html_str = "";
                if(activeTab == "#yTab01"){
                    html_str = "<iframe src='"+tab1_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#yTab02"){
                    html_str = "<iframe src='"+tab2_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#yTab03"){
                    html_str = "<iframe src='"+tab3_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#yTab04"){
                    html_str = "<iframe src='"+tab4_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#yTab05"){
                    html_str = "<iframe src='"+tab5_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#yTab06"){
                    html_str = "<iframe src='"+tab6_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#yTab07"){
                    html_str = "<iframe src='"+tab7_url+"' allowfullscreen></iframe>";
                }

                $(".youtubeTab li a").removeClass("active");
                $(this).addClass("active");
                $(".youtubeCts").hide();
                $(".youtubeCts").html('');
                $(activeTab).html(html_str);
                $(activeTab).fadeIn();
                return false;
            });
        });

        /*레이어팝업*/
        function go_popup() {
            $('#popup').bPopup();
        }

        function fn_live(p_type) {
            if(p_type == "hd"){
                location.href = "http://willbes.flive.skcdn.com/willbeslive/livestream4011/Playlist.m3u8";
            }else{
                location.href = "http://willbes.flive.skcdn.com/willbeslive/livestream4012/Playlist.m3u8";
            }
        }

        $(document).ready(function(){
            $(".subCts").hide();
            $(".subCts:first").show();

            $(".subjectMenu a").click(function(){

                var activeTab = $(this).attr("href");
                $(".subjectMenu a").removeClass("active");
                $(this).addClass("active");
                $(".subCts").hide();
                $(activeTab).fadeIn();

                return false;
            });
        });

        $(document).ready(function(){
            $(".subCts2").hide();
            $(".subCts2:first").show();

            $(".subjectMenu2 a").click(function(){

                var activeTab = $(this).attr("href");
                $(".subjectMenu2 a").removeClass("active");
                $(this).addClass("active");
                $(".subCts2").hide();
                $(activeTab).fadeIn();

                return false;
            });
        });

        $(document).ready(function(){
            $(".subCts3").hide();
            $(".subCts3:first").show();

            $(".subjectMenu3 a").click(function(){

                var activeTab = $(this).attr("href");
                $(".subjectMenu3 a").removeClass("active");
                $(this).addClass("active");
                $(".subCts3").hide();
                $(activeTab).fadeIn();

                return false;
            });
        });

        $(document).ready(function(){
            $(".subCts4").hide();
            $(".subCts4:first").show();

            $(".subjectMenu4 a").click(function(){

                var activeTab = $(this).attr("href");
                $(".subjectMenu4 a").removeClass("active");
                $(this).addClass("active");
                $(".subCts4").hide();
                $(activeTab).fadeIn();

                return false;
            });
        });

        function gradOpen() {
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var url = "{{ site_url('/predict/createGradeMember2') }}";
            url += "?predict={{ empty($arr_promotion_params['PredictIdx']) === true ? '' : $arr_promotion_params['PredictIdx'] }}";
            window.open(url,'popup1', 'scrollbars=yes,toolbar=no,resizable=yes,width=700,height=850');
        }

        function getPredictPoint() {
            var point = 0; var level = 0; var count = 0;
            var view_data_p_1 = '';
            var view_data_s_1 = '';
            var view_data_p_2 = '';
            var view_data_s_2 = '';
            var _data = '';
            var _url = "{{ site_url('/predict/getPredictPointAvg') }}";
            _url += "?predict={{ empty($arr_promotion_params['PredictIdx']) === true ? '' : $arr_promotion_params['PredictIdx'] }}";

            sendAjax(_url, _data, function(ret) {
                $.each(ret.ret_data, function(tab_key, tab_row) {
                    $.each(tab_row, function (subject_key, subject_row) {
                        $.each(subject_row, function (key, value) {
                            if (tab_key == 'S') {
                                if (value.AvgPoint == null || value.AvgPoint == '' || value.AvgPoint == '0') {
                                    point = 0; level = 0; count = 0;
                                } else {
                                    point = value.AvgPoint; level = value.AvgLevel; count = value.CountSubject;
                                }
                                if (subject_key == 'P') {
                                    view_data_p_1 += '<li>';
                                    view_data_p_1 += '<div><strong>'+value.SubjectName+'</strong> 평균점수 <strong>'+point+'</strong></div>';
                                    view_data_p_1 += '<div>체감난이도 <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_star0'+level+'.jpg" ></div>';
                                    view_data_p_1 += '</li>';
                                    $('#assayTab20_subject_p').html(view_data_p_1);
                                } else {
                                    $('#subject_s_1').append('<option value="'+point+'" data-level="'+level+'" data-count="'+count+'">'+value.SubjectName+'</option>');
                                }
                            } else {
                                if (value.AvgPoint == null || value.AvgPoint == '' || value.AvgPoint == '0') {
                                    point = 0; level = 0; count = 0;
                                } else {
                                    point = value.AvgPoint; level = value.AvgLevel; count = value.CountSubject;
                                }
                                if (subject_key == 'P') {
                                    view_data_p_2 += '<li>';
                                    view_data_p_2 += '<div><strong>'+value.SubjectName+'</strong> 평균점수 <strong>'+point+'</strong></div>';
                                    view_data_p_2 += '<div>체감난이도 <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_star0'+level+'.jpg" ></div>';
                                    view_data_p_2 += '</li>';
                                    $('#assayTab21_subject_p').html(view_data_p_2);
                                } else {
                                    $('#subject_s_2').append('<option value="'+point+'" data-level="'+level+'" data-count="'+count+'">'+value.SubjectName+'</option>');
                                }
                            }
                        });
                    });
                });
            }, null, false, 'GET');
        }

        //현재시간
        function nowDate() {
            var today = new Date();
            var yyyy = today.getFullYear();
            var mm = addZero(today.getMonth()+1); //January is 0!
            var dd = addZero(today.getDate());
            var h = addZero(today.getHours());
            var m = addZero(today.getMinutes());
            return yyyy+mm+dd+h+m;
        }

        function addZero(item) {
            if (item < 10) {
                item = '0'+item;
            }
            return item;
        }
    </script>
@stop