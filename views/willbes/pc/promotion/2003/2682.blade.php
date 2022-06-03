@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            margin:0 auto;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a {border:1px solid #000}

        /*****************************************************************/ 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/06/2682_top_bg.jpg) no-repeat center top;}

        .evtMenu ul {width:1120px; margin:0 auto; display:flex}
        .evtMenu li {width:25%; position: relative;}
        .evtMenu li a {
            display:block; text-align:center; padding:30px 0; color:#7d7d7d; font-size:20px;
            background:#e0dfdf;border-bottom:0; margin-right:4px;border:1px solid #bfbfbf;}
        .evtMenu li:last-child a {margin:0}
        .evtMenu li a span {font-size:20px}
        .evtMenu li a div {margin-top:8px;color:#7d7d7d}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#fff; color:#363636; border:2px solid #000;}
        .evtMenu li:hover:after {content:"▼"; display:block; clear:both;color:#000; font-size:25px; position: absolute; text-align:center; padding-left:45%}

        .evtMenu li:hover a span,
        .evtMenu li a.active span {color:#363636;font-weight:bold;}
        .evtMenu li:hover a div,
        .evtMenu li a.active div {color:#806ae9}

        .tabCts {position:relative; width:1120px; margin:50px auto; text-align:center; font-size:14px;}
        .tabCts .download span {position:absolute; top:660px; display:block; width:72px; height:24px; line-height:24px; text-align:center; z-index:1}
        .tabCts .download span:nth-child(1) {left:160px;}
        .tabCts .download span:nth-child(2) {left:362px;}
        .tabCts .download span:nth-child(3) {left:572px;}
        .tabCts .download span:nth-child(4) {left:760px;}
        .tabCts .download span:nth-child(5) {left:940px;}
        .tabCts .download span a {display:block; color:#fff; background:#d18f04; border-radius:14px;}
        .tabCts .download span a:hover {background:#e50001}
        .tabCts .youtube {width:100%; text-align:center; margin:3em 0}
        .tabCts .youtube iframe {width:800px; height:453px; margin:0 auto}

     

        .download {font-weight:bold;font-size:17px;padding-bottom:35px;color:#806ae9}

        .Cts02 a {display:inline-block; padding:5px 10px; color:#fff; background:#806ae9; font-size:90%; margin-left:20px}

        .tabMenu{width:360px;margin:0 auto 100px;}
        .tabMenu li{display:inline;float:left;width:50%;}
        .tabMenu li a{display:block;text-align:center;border:3px solid #959595;font-size:140%;
            font-weight:500;margin-right:2px;padding:20px 0;color:#959595;background:#fff;border-radius:25px;}
        .tabMenu li a.active{color:#fff;background:#959595;}

        .boardD {width:980px; border-spacing:0px; border:1px solid #000; table-layout:auto; color:#666; margin:0 auto}
        .boardD caption {display:none}
        .boardD th,
        .boardD td {font-size:14px}
        .boardD td:nth-child(9) {color:red;font-weight:bold;}
        .boardD th {padding:15px 5px; background:#f5f5f5; border-right:1px solid #000; border-bottom:1px solid #000; color:#333}
        .boardD thead th {background:#eee; color:#333; font-weight:bold}
        .boardD tbody tr:nth-child(1) {background:#fef395;}
        .boardD td {padding:15px 5px; margin:0; border:none; text-align:center; border-right:1px solid #000; border-bottom:1px solid #000;color:#000;}
        .boardD tr.gray th,
        .boardD tr.gray td {background:#f6f6f6}
        .boardD th a {display:inline; padding:5px 10px; color:#333; background:#fff; border:1px solid #ccc; border-radius:4px; margin:0 auto}
        .boardD th a:hover {background:#e50001; color:#fff}

        .Cts03 {margin-bottom:100px; text-align:left}

        .Cts03 h3 {font-size:16px;}
        .Cts03 h3 span {color:#fa7738; vertical-align: top;}
        .graphWrap {width:100%; margin-top:50px; font-size:14px; line-height:1.5;}
        .graphWrap li {position:relative; display:inline; float:left; width:48%; text-align:left; margin:0 0.5%;}
        .graphWrap select {position:absolute; top:5px; right:0}
        .graphWrap:after {content:""; display:block; clear:both}
        .graphbox {width:90%; margin:20px auto; border:1px solid #000;}
        .graphbox .subTit {font-size:120%; color:#F30}
        .graph {width:20%; float:left; text-align:center; background:url(http://file.willbes.net/new_image/2015/04/graphBg.png) repeat;}
        .graph p {padding:10px 0; background:#fff}
        .graph p:last-child {border-top:1px solid #333}
        .graph div {position:relative; width:45px; height:250px; margin:0 auto;}
        .graph div img {position:absolute; bottom:0; left:0; width:100%; background:#e2be43 url(https://static.willbes.net/public/images/promotion/common/patternA.png) repeat;}
        .graph2 div img {background:#bdbdcc url(https://static.willbes.net/public/images/promotion/common/patternB.png) repeat;}
        .graphbox:after {content:""; display:block; clear:both}
        .graphWrap:after {content:""; display:block; clear:both}
        .Cts03_01 {width:1120px; text-align:left; margin:80px auto 0}
        .Cts03_01 div {border:1px solid #e4e4e4; padding:20px; margin-top:20px}

        .Cts04 {padding-bottom:100px}
        .Cts04 .lecture {
            width:1000px; margin:0 auto;
        }
        .Cts04 .lecture li {
            display:inline; float:left; width:25%; text-align:center; margin-bottom:20px; min-height:330px;
        }
        .Cts04 .lecture li:hover {background:#fff url(https://static.willbes.net/public/images/promotion/common/patternB.png) repeat}
        .Cts04 .lecture li img.prof {
            width:199px !important; border:1px solid #ccc;
        }
        .Cts04 .t_tilte {
            line-height:1.5; padding:10px 0; color:#666; width:200px; margin:0 auto
        }
        .Cts04 .t_tilte p {border-top:1px solid #e4e4e4; padding-top:10px; margin-top:10px}
        .Cts04 .t_tilte span {
            color:#36374d; font-size:14px; ;
        }

        .Cts04 .lecture ul:after {
            content:""; display:block; clear:both;
        }
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}" readonly="readonly"/>
        <input type="hidden" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" {{(sess_data('is_login') === true) ? 'readonly="readonly"' : ''}}/>
        <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" maxlength="11" readonly="readonly">
        <input type="hidden" name="register_type" value="promotion" readonly="readonly"/>

        @foreach($arr_base['register_list'] as $key => $val)
            @if(empty($val['RegisterExpireStatus']) === false && $val['RegisterExpireStatus'] == 'Y')
                <input type="hidden" name="register_chk[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" readonly="readonly"/>
            @endif
        @endforeach/SsIdx/123
    </form>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2682_top.jpg" title="지방직 9급 풀케어 서비스" />
            <div class="evtMenu" id="evtMenu">
                <ul>
                    <li>
                        <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2682/SsIdx/123' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=1#content_1') }}">
                            <span>지방직 대비</span>
                            <div class="NSK-Black">온라인모의고사 무료!</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2682/SsIdx/123' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=2#content_2') }}">
                            <span>지난 지방직으로</span>
                            <div class="NSK-Black">올해의 지방직을 알아보자!</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab3' href="@if(time() < strtotime('202106051140')) javascript:alert('6.5(토)오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=3#content_3') }}@endif">
                            <span>체감난이도 투표하고</span>
                            <div class="NSK-Black">맛있는 간식 먹자!</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab4' href="@if(time() < strtotime('202106071600')) javascript:alert('6.7(월)오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=4#content_4') }}@endif">
                            <span>2022 지방직 9급</span>
                            <div class="NSK-Black">기출해설특강</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="content_1" class="evtCtnsBox tabCts">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2682_01_01.jpg" title="" />
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" title="온라인 응시하기" onclick="javascript:fn_submit();" style="position: absolute; left: 27.32%; top: 76.17%; width: 45.27%; height: 9.05%; z-index: 2;"></a>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2682_01_03.jpg" title="" />
        </div>

        <!--완벽분석-->
        <div id="content_2" class="tabCts Cts02">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2682_02_01.jpg" title="" id="content_2_01" />
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2682_02_02.jpg" title="" />
            <div class="mb100">
                <p class="download">
                   * 2022 지방직 시험문제&가답안 다운로드 <a href="https://www.gosi.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000138" target="_blank">바로가기 ></a>
                </p>
                <div class="mt20" id="tabs1">
                    <table cellspacing="0" cellpadding="0" class="boardD">
                        <col />
                        <col />
                        <col />
                        <col />
                        <col />
                        <col />
                        <col />
                        <col />
                        <col />
                        <thead>
                            <tr>
                                <th rowspan="3">모집단위</th>
                                <th colspan="6">2022년</th>
                                <th colspan="2">2021년</th>
                            </tr>
                            <tr>
                                <th colspan="2">선발예정인원</th>
                                <th colspan="2">접수인원</th>
                                <th colspan="2">경쟁률</th>
                                <th>경쟁률</th>
                                <th>합격선(최고점)</th>
                            </tr>
                            <tr>
                                <th>전체</th>
                                <th>일반행정 9급</th>
                                <th>전체</th>
                                <th>일반행정 9급</th>
                                <th>전체</th>
                                <th>일반행정 9급</th>
                                <th>일반행정 9급</th>
                                <th>일반행정 9급</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>계</td>
                                <td>21,907</td>
                                <td>9,031</td>
                                <td>199,411</td>
                                <td>97,408</td>
                                <td>9.85:1</td>
                                <td>11.97:1</td>
                                <td>13.9:1</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>서울</td>
                                <td>2,895</td>
                                <td>1381</td>
                                <td>32,813</td>
                                <td>15,890</td>
                                <td>11.33:1</td>
                                <td>11.51:1</td>
                                <td>14.3:1</td>
                                <td>385.94</td>
                            </tr>
                            <tr>
                                <td>강원</td>
                                <td>981</td>
                                <td>339</td>
                                <td>8,640</td>
                                <td>4,303</td>
                                <td>8.81:1</td>
                                <td>12.69:1</td>
                                <td>12.8:1</td>
                                <td>386.59</td>
                            </tr>
                            <tr>
                                <td>경기</td>
                                <td>4,382</td>
                                <td>1,810</td>
                                <td>35,612</td>
                                <td>18,193</td>
                                <td>8.13:1</td>
                                <td>10.05:1</td>
                                <td>13.4:1</td>
                                <td>392.78</td>
                            </tr>
                            <tr>
                                <td>경남</td>
                                <td>1,621</td>
                                <td>582</td>
                                <td>15,086</td>
                                <td>7,046</td>
                                <td>9.31:1</td>
                                <td>12.11:1</td>
                                <td>15.8:1</td>
                                <td>400.97</td>
                            </tr>
                            <tr>
                                <td>경북</td>
                                <td>1,655</td>
                                <td>597</td>
                                <td>14,337</td>
                                <td>6,424</td>
                                <td>8.66:1</td>
                                <td>10.76:1</td>
                                <td>13.8:1</td>
                                <td>389.07</td>
                            </tr>
                            <tr>
                                <td>광주</td>
                                <td>417</td>
                                <td>220</td>
                                <td>7,089</td>
                                <td>3,544</td>
                                <td>17.0:1</td>
                                <td>16.11:1</td>
                                <td>14.4:1</td>
                                <td>385.9</td>
                            </tr>
                            <tr>
                                <td>대구</td>
                                <td>814</td>
                                <td>344</td>
                                <td>10,113</td>
                                <td>5,276</td>
                                <td>12.42:1</td>
                                <td>15.34:1</td>
                                <td>17.7:1</td>
                                <td>389.61</td>
                            </tr>
                            <tr>
                                <td>대전</td>
                                <td>526</td>
                                <td>214</td>
                                <td>5,988</td>
                                <td>3,128</td>
                                <td>11.38:1</td>
                                <td>14.62:1</td>
                                <td>16.4:1</td>
                                <td>382.77</td>
                            </tr>
                            <tr>
                                <td>부산</td>
                                <td>1,803</td>
                                <td>883</td>
                                <td>15,247</td>
                                <td>7,784</td>
                                <td>8.46:1</td>
                                <td>8.82:1</td>
                                <td>16.6:1</td>
                                <td>389.19</td>
                            </tr>
                            <tr>
                                <td>세종</td>
                                <td>102</td>
                                <td>38</td>
                                <td>1,235</td>
                                <td>715</td>
                                <td>12.11:1</td>
                                <td>18.82:1</td>
                                <td>17.8:1</td>
                                <td>382.32</td>
                            </tr>
                            <tr>
                                <td>울산</td>
                                <td>514</td>
                                <td>237</td>
                                <td>4,401</td>
                                <td>2,181</td>
                                <td>8.56:1</td>
                                <td>9.20:1</td>
                                <td>15.9:1</td>
                                <td>388.28</td>
                            </tr>
                            <tr>
                                <td>인천</td>
                                <td>913</td>
                                <td>310</td>
                                <td>8,241</td>
                                <td>3,848</td>
                                <td>9.03:1</td>
                                <td>12.41:1</td>
                                <td>7.0:1</td>
                                <td>382.5</td>
                            </tr>
                            <tr>
                                <td>전남</td>
                                <td>1,768</td>
                                <td>674</td>
                                <td>10,969</td>
                                <td>5,122</td>
                                <td>6.20:1</td>
                                <td>7.60:1</td>
                                <td>8.9:1</td>
                                <td>386.19</td>
                            </tr>
                            <tr>
                                <td>전북</td>
                                <td>1,196</td>
                                <td>475</td>
                                <td>10,348</td>
                                <td>4,560</td>
                                <td>8.65:1</td>
                                <td>9.60:1</td>
                                <td>7.0:1</td>
                                <td>390.74</td>
                            </tr>
                            <tr>
                                <td>제주</td>
                                <td>254</td>
                                <td>99</td>
                                <td>2,787</td>
                                <td>1,360</td>
                                <td>10.97:1</td>
                                <td>13.74:1</td>
                                <td>22.7:1</td>
                                <td>407.2</td>
                            </tr>
                            <tr>
                                <td>충남</td>
                                <td>1,280</td>
                                <td>512</td>
                                <td>9,159</td>
                                <td>4,329</td>
                                <td>7.16:1</td>
                                <td>8.46:1</td>
                                <td>11.0:1</td>
                                <td>392.91</td>
                            </tr>
                            <tr>
                                <td>충북</td>
                                <td>786</td>
                                <td>316</td>
                                <td>7,346</td>
                                <td>3,705</td>
                                <td>9.35:1</td>
                                <td>11.72:1</td>
                                <td>10.7:1</td>
                                <td>387.23</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--시험총평 및 시험후기-->
        <div id="content_3" class="tabCts Cts03">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2682_03_01.jpg" title="시험 체감난이도&이벤트" />
            @include('willbes.pc.eventsurvey.show_graph_partial',array('is_series' => 'N')) {{-- is_series(직렬: Y, 직렬아님: N) --}}

            <div class="tx-center">
                <a href="javascript:pullOpen();">
                    <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_btn03.png" title="설문참야하기" />
                </a>
            </div>

        <!--
            <div class="Cts03_01">
                <h3>2020년 6월 13일 시행 <span>지방직 9급 시험 총평</span></h3>
                <div>
                    {!! $data['Content'] !!}
                </div>
            </div>
            -->

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2022/06/2682_03_02.jpg" title="시험후기 댓글 이벤트" /></div>
            {{--시험평가댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
            @endif

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2022/06/2682_03_03.jpg" title="기대평과 응원 메시지" /> </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif

        </div>

        <!--기출해설강의-->
        <div id="content_4" class="tabCts Cts04">
            <div><img src="https://static.willbes.net/public/images/promotion/2022/06/2682_04_01.jpg" title="기출해설" /></div>
            <div class="lecture">
                <ul>
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @foreach($arr_base['promotion_otherinfo_data'] as $row)
                            <li>
                                @if(empty($row['ReferValue']) === false)<img src="{{ $row['ReferValue'] }}" title="{{ $row['ProfNickName'] }}" class="prof">@endif
                                <div class="t_tilte">
                                    {{ $row['SubjectName'] }} {{ $row['ProfNickName'] }} 교수<br>
                                    <span>{{ $row['OtherData2'] }}</span>
                                    <p>
                                        @if(empty($row['wUnitIdx']) === true && empty($row['wUnitAttachFile']) === true)
                                            추후 제공 예정입니다.
                                        @else
                                            @if(empty($row['wHD']) === false)
                                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','WD');">
                                                    <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_btn04_01.png" title="해설강의">
                                                </a>
                                            @endif

                                            @if(empty($row['wUnitAttachFile']) === false)
                                                <a href="{{ site_url('/promotion/downloadReference?file_idx='.$row['wUnitIdx'].'&event_idx='.$data['ElIdx']) }}">
                                                    <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_btn04_02.png" title="해설자료">
                                                </a>
                                            @endif
                                        @endif
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $('.tabMenu').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
            $content = $($active[0].hash);

            $links.not($active).each(function(){
                $(this.hash).hide();
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

        /*tab*/
        $(document).ready(function(){
            var cnt;
            var tab_id = '{{ $arr_base['tab_id'] }}';
            $('#tab'+tab_id).addClass('active');
            $('.evtMenu ul > li').each(function(item){
                cnt = item + 1;
                $("#content_"+cnt).hide();
                if (tab_id == cnt) {
                    $("#content_"+cnt).show();
                }
            });
        });

        function fn_FileDownload(path){
            if(confirm("다운로드 하시겠습니까?")){
                location.href = "/download.do?path="+path;
            }
        }

        function pullOpen(){
            @if(empty($arr_promotion_params['SsIdx']) === true)
            alert('설문정보가 없습니다.');
            return;
            @else
            var url = "{{front_url('/eventSurvey/index/' . $arr_promotion_params['SsIdx'])}}";
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
    </script>
@stop