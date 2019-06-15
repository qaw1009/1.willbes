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
                '3' => '201906202300',
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
                        <div class="comingsoon">국어 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts" id="sub02">
                        <div class="comingsoon">영어 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts" id="sub03">
                        <div class="comingsoon">한국사 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts" id="sub04">
                        <div class="comingsoon">행정학 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts" id="sub05">
                        <div class="comingsoon">행정법 총평을 준비중입니다.</div>
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
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_02.png" usemap="#Map1244F" class="mt100" title="해설" border="0"/>
                    <map name="Map1244F" id="Map1244F">
                        <area shape="rect" coords="195,159,310,196" href="@if($file_yn[41] == 'Y') {{ front_url($file_link[41]) }} @else {{ $file_link[41] }} @endif" alt="국어 다운로드" />
                        <area shape="rect" coords="514,160,632,197" href="@if($file_yn[42] == 'Y') {{ front_url($file_link[42]) }} @else {{ $file_link[42] }} @endif" alt="영어다운로드" />
                        <area shape="rect" coords="194,210,312,247" href="@if($file_yn[43] == 'Y') {{ front_url($file_link[43]) }} @else {{ $file_link[43] }} @endif" alt="한국사다운로드" />
                        <area shape="rect" coords="516,210,632,248" href="@if($file_yn[44] == 'Y') {{ front_url($file_link[44]) }} @else {{ $file_link[44] }} @endif" alt="행정학다운로드" />
                        <area shape="rect" coords="194,258,311,297" href="@if($file_yn[45] == 'Y') {{ front_url($file_link[45]) }} @else {{ $file_link[45] }} @endif" alt="행정법다운로드" />
                        <area shape="rect" coords="514,258,632,295" href="@if($file_yn[46] == 'Y') {{ front_url($file_link[46]) }} @else {{ $file_link[46] }} @endif" alt="사회다운로드" />
                    </map>
                    <ul class="subjectMenu2 mt50">
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
                        <div class="comingsoon">국어 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts2" id="sub12">
                        <div class="comingsoon">영어 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts2" id="sub13">
                        <div class="comingsoon">한국사 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts2" id="sub14">
                        <div class="comingsoon">행정학 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts2" id="sub15">
                        <div class="comingsoon">행정법 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts2" id="sub16">
                        <div class="comingsoon">사회 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts2" id="sub17">
                        <div class="comingsoon">세법 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts2" id="sub18">
                        <div class="comingsoon">회계학 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts2" id="sub19">
                        <div class="comingsoon">기술직 해설강의을 준비중입니다.</div>
                    </div>
                </div>

                <div id="assayTab11" class="subject mt50">
                    <ul class="subjectMenu3">
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
                        <div class="comingsoon">국어 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts3" id="sub22">
                        <div class="comingsoon">영어 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts3" id="sub23">
                        <div class="comingsoon">한국사 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts3" id="sub24">
                        <div class="comingsoon">행정학 총평을 준비중입니다.</div>
                    </div>
                    <div class="subCts3" id="sub25">
                        <div class="comingsoon">행정법 총평을 준비중입니다.</div>
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
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1244_06_02.png" usemap="#Map1244G" class="mt100" title="해설" border="0"/>
                    <map name="Map1244G" id="Map1244G">
                        <area shape="rect" coords="195,159,310,196" href="@if($file_yn[51] == 'Y') {{ front_url($file_link[51]) }} @else {{ $file_link[51] }} @endif" alt="국어 다운로드" />
                        <area shape="rect" coords="514,160,632,197" href="@if($file_yn[52] == 'Y') {{ front_url($file_link[52]) }} @else {{ $file_link[52] }} @endif" alt="영어다운로드" />
                        <area shape="rect" coords="194,210,312,247" href="@if($file_yn[53] == 'Y') {{ front_url($file_link[53]) }} @else {{ $file_link[53] }} @endif" alt="한국사다운로드" />
                        <area shape="rect" coords="516,210,632,248" href="@if($file_yn[54] == 'Y') {{ front_url($file_link[54]) }} @else {{ $file_link[54] }} @endif" alt="행정학다운로드" />
                        <area shape="rect" coords="194,258,311,297" href="@if($file_yn[55] == 'Y') {{ front_url($file_link[55]) }} @else {{ $file_link[55] }} @endif" alt="행정법다운로드" />
                        <area shape="rect" coords="514,258,632,295" href="@if($file_yn[56] == 'Y') {{ front_url($file_link[56]) }} @else {{ $file_link[56] }} @endif" alt="사회다운로드" />
                    </map>
                    <ul class="subjectMenu4 mt50">
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
                        <div class="comingsoon">국어 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts4" id="sub32">
                        <div class="comingsoon">영어 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts4" id="sub33">
                        <div class="comingsoon">한국사 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts4" id="sub34">
                        <div class="comingsoon">행정학 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts4" id="sub35">
                        <div class="comingsoon">행정법 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts4" id="sub36">
                        <div class="comingsoon">사회 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts4" id="sub37">
                        <div class="comingsoon">세법 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts4" id="sub38">
                        <div class="comingsoon">회계학 해설강의을 준비중입니다.</div>
                    </div>
                    <div class="subCts4" id="sub39">
                        <div class="comingsoon">기술직 해설강의을 준비중입니다.</div>
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

            $(".subjectMenu2 a").click(function(){

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