@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height:auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }

        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; }

        /*****************************************************************/ 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/07/2293_top_bg.jpg) no-repeat center top; }

        .evtMenu { position:absolute; left:50%; bottom:100px; margin-left:-560px; z-index:10;}
        .evtMenu ul {width:1120px; margin:0 auto;}
        .evtMenu li {display:inline; float:left; width:50%; position: relative;}
        .evtMenu li a {
            display:block; text-align:center; padding:30px 0; color:#7d7d7d; font-size:20px;
            background:#e0dfdf;border-bottom:0; margin-right:4px;border:1px solid #bfbfbf;}
        .evtMenu li:last-child a {margin:0}
        .evtMenu li a span {font-size:20px}
        .evtMenu li a div {margin-top:8px;color:#7d7d7d}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#fff; color:#363636; border:2px solid #df3673;}
        .evtMenu li:hover:after {content:"▼"; display:block; clear:both;color:#df3673;font-size:25px; position: absolute; bottom:-25px; left:50%;transform:translateX(-50%);}

        .evtMenu li:hover a span,
        .evtMenu li a.active span {color:#363636;font-weight:bold;}
        .evtMenu li:hover a div,
        .evtMenu li a.active div {color:#df3673}
        .evtMenu ul:after {content:""; display:block; clear:both}

        .tabCts {
            position:relative; width:1120px; margin:0 auto; text-align:center; font-size:14px;
        }
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

        #content_2_01 {padding-top:600px;}        
        .download {font-weight:bold;font-size:17px;padding-bottom:35px;color:#806ae9}

        .tabMenu{width:360px;margin:0 auto 100px;}
        .tabMenu li{display:inline;float:left;width:50%;}
        .tabMenu li a{display:block;text-align:center;border:3px solid #959595;font-size:140%;
            font-weight:500;margin-right:2px;padding:20px 0;color:#959595;background:#fff;border-radius:25px;}
        .tabMenu li a.active{color:#fff;background:#959595;}

        .boardD {width:980px; border-spacing:0px; border:1px solid #000; table-layout:auto; color:#666; margin:0 auto 160px auto}
        .boardD caption {display:none}
        .boardD th,
        .boardD td {font-size:14px}
        .boardD tr:nth-child(1) {background:#D9D9D9;font-weight:bold;}
        .boardD tr:nth-child(2) {background:#D9D9D9;font-weight:bold;}
        .boardD th {padding:15px 5px; background:#f5f5f5; border-right:1px solid #000; border-bottom:1px solid #000; color:#333}
        .boardD thead th {background:#eee; color:#333}
        .boardD td {padding:15px 5px; margin:0; border:none; text-align:center; border-right:1px solid #000; border-bottom:1px solid #000;color:#000;}
        .boardD tr.gray th,
        .boardD tr.gray td {background:#f6f6f6}
        .boardD th a {display:inline; padding:5px 10px; color:#333; background:#fff; border:1px solid #ccc; border-radius:4px; margin:0 auto}
        .boardD th a:hover {background:#e50001; color:#fff}

        .Cts02 {margin-bottom:100px; text-align:left}
        .Cts02 h3 {font-size:16px;}
        .Cts02 h3 span {color:#fa7738; vertical-align: baseline;}
        .graphWrap {width:100%; margin-top:50px; font-size:14px; line-height:1.5;}
        .graphWrap li {position:relative; display:inline; float:left; width:48%; text-align:left; margin:0 0.5%;}
        .graphWrap select {position:absolute; top:0; right:0}
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

        .Cts03 {padding-top:160px;}
        .Cts03 div{position: relative; width:1120px; margin:0 auto;}
        .Cts03 div a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}
        .Cts03 .lecture {
            width:1000px; margin:35px auto 0 auto;
        }
        .Cts03 .lecture li {display:inline; float:left; width:33%; text-align:center; margin-bottom:20px; min-height:330px;}
        .Cts03 .lecture li:hover {background:#fff url(https://static.willbes.net/public/images/promotion/common/patternB.png) repeat}
        .Cts03 .lecture li img.prof {width:199px !important; border:1px solid #ccc;}
        .Cts03 .t_tilte {line-height:1.5; padding:10px 0; color:#666; width:200px; margin:0 auto}
        .Cts03 .t_tilte p {border-top:1px solid #e4e4e4; padding-top:10px; margin-top:10px}
        .Cts03 .t_tilte span {color:#36374d; font-size:14px;}
        .Cts03 .lecture ul:after {content:""; display:block; clear:both;}
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
        @endforeach
    </form>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2293_top.jpg" title="지방직 9급 풀케어 서비스" />
            <div class="evtMenu" id="evtMenu">
                <ul>
                    <li>
                        <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2293/SsIdx/115' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=1#content_1') }}">
                            <span>지난 군무원 시험으로</span>
                            <div class="NSK-Black">올해의 군무원 시험을 알아보자!</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2293/SsIdx/115' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=2#content_2') }}">
                            <span>시험 후 체감난이도 투표하고</span>
                            <div class="NSK-Black">기출해설강의 무료로 수강하자!</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="content_1" class="tabCts">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2293_tit1.jpg" title="" />
            <table cellspacing="0" cellpadding="0" class="boardD">
                <col width="10%" />
                <col width="15%" />
                <col width="15%" />
                <col width="15%" />
                <col width="15%" />
                <col width="15%" />
                <col width="15%" />
                <tr>
                    <th rowspan="2" colspan="2" >모집단위</th>
                    <th colspan="3" >2021년</th>
                    <th colspan="2" >2020년</th>
                </tr>
                <tr>
                    <th >선발예정인원</th>
                    <th >접수인원</th>
                    <th >경쟁률</th>
                    <th >경쟁률</th>
                    <th >합격선(최고점)</th>
                </tr>
                <tr>
                    <th  rowspan="10">국방부</th>
                    <td >행정 9급</td>
                    <td >150</td>
                    <td >9,847</td>
                    <td >65.65:1</td>
                    <td >142.90:1</td>
                    <td >74.67</td>
                </tr>
                <tr>
                    <td >행정 7급</td>
                    <td >8</td>
                    <td >699</td>
                    <td >87.38:1</td>
                    <td >117.80:1</td>
                    <td >78</td>
                </tr>
                <tr>
                    <td >군수 9급</td>
                    <td >2</td>
                    <td >392</td>
                    <td >196.0:1</td>
                    <td >-</td>
                    <td >-</td>
                </tr>
                <tr>
                    <td >군사정보 9급</td>
                    <td >17</td>
                    <td >377</td>
                    <td >22.18:1</td>
                    <td >47.56:1</td>
                    <td >69.33</td>
                </tr>
                <tr>
                    <td >군사정보 7급</td>
                    <td >39</td>
                    <td >699</td>
                    <td >17.92:1</td>
                    <td >15.56:1</td>
                    <td >73</td>
                </tr>
                <tr>
                    <td >전자 9급</td>
                    <td >6</td>
                    <td >43</td>
                    <td >7.17:1</td>
                    <td >21.80:1</td>
                    <td >56.33</td>
                </tr>
                <tr>
                    <td >전기 9급</td>
                    <td >12</td>
                    <td >287</td>
                    <td >23.92:1</td>
                    <td >81.0:1</td>
                    <td >77</td>
                </tr>
                <tr>
                    <td >전기 7급</td>
                    <td >6</td>
                    <td >163</td>
                    <td >27.17:1</td>
                    <td >100.0:1</td>
                    <td >70</td>
                </tr>
                <tr>
                    <td >통신 9급</td>
                    <td >57</td>
                    <td >262</td>
                    <td >4.60:1</td>
                    <td >19.25:1</td>
                    <td >59.67</td>
                </tr>
                <tr>
                    <td >통신 7급</td>
                    <td >12</td>
                    <td >70</td>
                    <td >5.83:1</td>
                    <td >22.0:1</td>
                    <td >57</td>
                </tr>
                <tr>
                    <th  rowspan="11">육군</th>
                    <td >행정 9급</td>
                    <td >481</td>
                    <td >13,840</td>
                    <td >28.77:1</td>
                    <td >32.80:1</td>
                    <td >72</td>
                </tr>
                <tr>
                    <td >행정 7급</td>
                    <td >116</td>
                    <td >890</td>
                    <td >7.67:1</td>
                    <td >7.20:1</td>
                    <td >62</td>
                </tr>
                <tr>
                    <td >군수 9급</td>
                    <td >409</td>
                    <td >6,766</td>
                    <td >16.54:1</td>
                    <td >16.80:1</td>
                    <td >70.67</td>
                </tr>
                <tr>
                    <td >군수 7급</td>
                    <td >94</td>
                    <td >684</td>
                    <td >7.28:1</td>
                    <td >5.10:1</td>
                    <td >60</td>
                </tr>
                <tr>
                    <td >군사정보 9급</td>
                    <td >103</td>
                    <td >1,297</td>
                    <td >12.59:1</td>
                    <td >22.70:1</td>
                    <td >69.33</td>
                </tr>
                <tr>
                    <td >군사정보 7급</td>
                    <td >22</td>
                    <td >189</td>
                    <td >8.59:1</td>
                    <td >6.30:1</td>
                    <td >65</td>
                </tr>
                <tr>
                    <td >전자 9급</td>
                    <td >120</td>
                    <td >348</td>
                    <td >2.90:1</td>
                    <td >6.80:1</td>
                    <td >60</td>
                </tr>
                <tr>
                    <td >전자 7급</td>
                    <td >28</td>
                    <td >42</td>
                    <td >1.50:1</td>
                    <td >-</td>
                    <td >-</td>
                </tr>
                <tr>
                    <td >전기 9급</td>
                    <td >82</td>
                    <td >793</td>
                    <td >9.67:1</td>
                    <td >23.50:1</td>
                    <td >73.67</td>
                </tr>
                <tr>
                    <td >통신 9급</td>
                    <td >269</td>
                    <td >726</td>
                    <td >2.70:1</td>
                    <td >4.90:1</td>
                    <td >46.67</td>
                </tr>
                <tr>
                    <td >통신 7급</td>
                    <td >21</td>
                    <td >336</td>
                    <td >16.0:1</td>
                    <td >10.0:1</td>
                    <td >-</td>
                </tr>
                <tr>
                    <th  rowspan="11">해군</th>
                    <td >행정 9급</td>
                    <td >47</td>
                    <td >1,412</td>
                    <td >30.04:1</td>
                    <td >226.0:1</td>
                    <td >73.33</td>
                </tr>
                <tr>
                    <td >행정 7급</td>
                    <td >11</td>
                    <td >85</td>
                    <td >7.73:1</td>
                    <td >9.0:1</td>
                    <td >74</td>
                </tr>
                <tr>
                    <td >군수 9급</td>
                    <td >17</td>
                    <td >559</td>
                    <td >32.88:1</td>
                    <td >-</td>
                    <td >-</td>
                </tr>
                <tr>
                    <td >군수 7급</td>
                    <td >2</td>
                    <td >25</td>
                    <td >12.50:1</td>
                    <td >-</td>
                    <td >-</td>
                </tr>
                <tr>
                    <td >군사정보 9급</td>
                    <td >3</td>
                    <td >58</td>
                    <td >19.33:1</td>
                    <td >144.0:1</td>
                    <td >65.33</td>
                </tr>
                <tr>
                    <td >전자 9급</td>
                    <td >17</td>
                    <td >66</td>
                    <td >3.88:1</td>
                    <td >21.0:1</td>
                    <td >67</td>
                </tr>
                <tr>
                    <td >전자 7급</td>
                    <td >5</td>
                    <td >7</td>
                    <td >1.40:1</td>
                    <td >-</td>
                    <td >-</td>
                </tr>
                <tr>
                    <td >전기 9급</td>
                    <td >9</td>
                    <td >52</td>
                    <td >5.78:1</td>
                    <td >50.0:1</td>
                    <td >75.67</td>
                </tr>
                <tr>
                    <td >전기 7급</td>
                    <td >7</td>
                    <td >62</td>
                    <td >8.86:1</td>
                    <td >21.0:1</td>
                    <td >66</td>
                </tr>
                <tr>
                    <td >통신 9급</td>
                    <td >8</td>
                    <td >37</td>
                    <td >4.63:1</td>
                    <td >31.0:1</td>
                    <td >54.33</td>
                </tr>
                <tr>
                    <td >통신 7급</td>
                    <td >2</td>
                    <td >2</td>
                    <td >1.0:1</td>
                    <td >7.0:1</td>
                    <td >-</td>
                </tr>
                <tr>
                    <th  rowspan="7">해병대</th>
                    <td >행정 9급</td>
                    <td >6</td>
                    <td >242</td>
                    <td >40.33:1</td>
                    <td >88.0:1</td>
                    <td >65.33</td>
                </tr>
                <tr>
                    <td >행정 7급</td>
                    <td >4</td>
                    <td >28</td>
                    <td >7.0:1</td>
                    <td >4.0:1</td>
                    <td >62</td>
                </tr>
                <tr>
                    <td >군수 9급</td>
                    <td >9</td>
                    <td >139</td>
                    <td >15.44:1</td>
                    <td >156.0:1</td>
                    <td >66.67</td>
                </tr>
                <tr>
                    <td >군수 7급</td>
                    <td >2</td>
                    <td >15</td>
                    <td >7.50:1</td>
                    <td >-</td>
                    <td >-</td>
                </tr>
                <tr>
                    <td >군사정보 9급</td>
                    <td >5</td>
                    <td >56</td>
                    <td >11.20:1</td>
                    <td >-</td>
                    <td >-</td>
                </tr>
                <tr>
                    <td >전기 9급</td>
                    <td >2</td>
                    <td >8</td>
                    <td >4.0:1</td>
                    <td >20.0:1</td>
                    <td >69.67</td>
                </tr>
                <tr>
                    <td >통신 9급</td>
                    <td >9</td>
                    <td >12</td>
                    <td >1.33:1</td>
                    <td >12.0:1</td>
                    <td >52</td>
                </tr>
                <tr>
                    <th  rowspan="10">공군</th>
                    <td >행정 9급</td>
                    <td >44</td>
                    <td >1,894</td>
                    <td >43.05:1</td>
                    <td >128.60:1</td>
                    <td >74.66</td>
                </tr>
                <tr>
                    <td >행정 7급</td>
                    <td >12</td>
                    <td >205</td>
                    <td >17.08:1</td>
                    <td >29.70:1</td>
                    <td >65</td>
                </tr>
                <tr>
                    <td >군수 9급</td>
                    <td >29</td>
                    <td >892</td>
                    <td >30.76:1</td>
                    <td >60.10:1</td>
                    <td >70.66</td>
                </tr>
                <tr>
                    <td >군사정보 9급</td>
                    <td >8</td>
                    <td >174</td>
                    <td >21.75:1</td>
                    <td >52.20:1</td>
                    <td >66.66</td>
                </tr>
                <tr>
                    <td >전자 9급</td>
                    <td >25</td>
                    <td >106</td>
                    <td >4.24:1</td>
                    <td >23.20:1</td>
                    <td >64</td>
                </tr>
                <tr>
                    <td >전자 7급</td>
                    <td >7</td>
                    <td >55</td>
                    <td >7.86:1</td>
                    <td >14.80:1</td>
                    <td >66</td>
                </tr>
                <tr>
                    <td >전기 9급</td>
                    <td >8</td>
                    <td >121</td>
                    <td >15.13:1</td>
                    <td >51.50:1</td>
                    <td >75.66</td>
                </tr>
                <tr>
                    <td >전기 7급</td>
                    <td >2</td>
                    <td >24</td>
                    <td >12.0:1</td>
                    <td >-</td>
                    <td >-</td>
                </tr>
                <tr>
                    <td >통신 9급</td>
                    <td >29</td>
                    <td >120</td>
                    <td >4.14:1</td>
                    <td >24.80:1</td>
                    <td >53.33</td>
                </tr>
                <tr>
                    <td >통신 7급</td>
                    <td >7</td>
                    <td >17</td>
                    <td >2.43:1</td>
                    <td >11.0:1</td>
                    <td >81</td>
                </tr>
            </table>                
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2293_01.jpg" title="" />
        </div>

        <!--시험총평 및 시험후기-->
        <div id="content_2" class="tabCts Cts02">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2293_tit2.jpg" title="" />
            @include('willbes.pc.eventsurvey.show_graph_partial',array('is_series' => 'N')) {{-- is_series(직렬: Y, 직렬아님: N) --}}
            <div class="tx-center">
                <a href="javascript:pullOpen();">
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2293_btn01.jpg" title="설문참야하기" />
                </a>
            </div>

            <!--기출해설강의-->
            <div class="tabCts Cts03">
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2293_tit3.jpg" title="기출해설" />
                    <a href="https://recruit.mnd.go.kr:470/recruit.do" title="바로가기" target="_blank" style="position: absolute; left: 53.84%; top: 75%; width: 10.45%; height: 14.8%; z-index: 2;"></a>
                </div>
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

        {{--무료 강좌발급--}}
        $regi_form = $('#regi_form');
        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var _url = '{!! front_url('/event/registerStore') !!}?event_code={{$data["ElIdx"]}}';

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert('강좌가 지급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }
    </script>
@stop