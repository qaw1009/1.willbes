@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /*****************************************************************/

        .sky {position:fixed; top:200px; right:10px; z-index:11;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/03/2938_top_bg.jpg) no-repeat center top; height:1224px}
        .evtTop span {position: absolute; top:-10px; left:50%; margin-left:-350px; width:968px; z-index: 3;}
        .evtTop .title {top:150px; margin-left:-500px; width:675px; z-index: 2;}

        .evtMenu ul {width:1120px; margin:0 auto 0; display:flex;}
        .evtMenu li {width:25%; position: relative;}
        .evtMenu li a {display:block; text-align:center; padding:30px 0; color:#7d7d7d; font-size:20px; background:#e0dfdf; border-bottom:0; margin-right:4px; border:2px solid #bfbfbf;}
        .evtMenu li:last-child a {margin:0}
        .evtMenu li a span {font-size:20px}
        .evtMenu li a div {margin-top:8px;color:#7d7d7d}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#fff; color:#363636; border:2px solid #ff5400;}
        .evtMenu li a.active:after,
        .evtMenu li a:hover:after {content:"▼"; display:block; clear:both; color:#ff5400; font-size:25px; position:absolute; top:105px; width:100%; text-align:center; z-index: 10;}
        .evtMenu li:hover a span,
        .evtMenu li a.active span {color:#363636;font-weight:bold;}
        .evtMenu li:hover a div,
        .evtMenu li a.active div {color:#ff5400}

        .tabCts {position:relative; width:1120px; margin:20px auto 0; text-align:center; font-size:14px;}
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

        .download {font-weight:bold;font-size:17px;padding-bottom:35px;color:#ff5400}

        .Cts02 a {display:inline-block; padding:5px 10px; color:#fff; background:#ff5400; font-size:90%; margin-left:20px}

        .boardD {width:980px; border-spacing:0px; border:1px solid #000; table-layout:auto; color:#666; margin:0 auto}
        .boardD caption {display:none}
        .boardD th,
        .boardD td {font-size:14px}
        .boardD td:nth-child(4) {background:#f7f3ef;font-weight:bold;}
        .boardD td:nth-child(7) {background:#f7f3ef;font-weight:bold;}
        .boardD td:nth-child(9) {color:red;font-weight:bold;}
        .boardD th {padding:15px 5px; background:#f5f5f5; border-right:1px solid #000; border-bottom:1px solid #000; color:#000; font-weight:bold}
        .boardD thead th {background:#eee; color:#333}
        .boardD td {padding:15px 5px; margin:0; border:none; text-align:center; border-right:1px solid #000; border-bottom:1px solid #000;color:#000;}
        .boardD tbody th {background:#f7f3ef}
        .boardD th a {display:inline; padding:5px 10px; color:#333; background:#fff; border:1px solid #ccc; border-radius:4px; margin:0 auto}
        .boardD th a:hover {background:#e50001; color:#fff}

        .Cts03 {margin-bottom:100px; text-align:left}
        .Cts03 .btn {width:400px; margin:0 auto;}
        .Cts03 .btn a {display:block; background:#ff5400; color:#fff; padding:20px; font-size:30px; font-weight:bold; border-radius:50px; text-align:center}
        .Cts03 .btn a:hover {background:#000}

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
        @endforeach
    </form>

    <div class="evtContent NSK" id="evtContainer">
        {{--
        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2020" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2589_sky.png" alt="혜택받기" />
            </a>
        </div>
        --}}

        <div class="evtCtnsBox evtTop">
            <span data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/03/2938_top_img.png" title="국가직 9급 풀케어 서비스" /></span>
            <span class="title" data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2023/03/2938_top_tit.png" title="국가직 9급 풀케어 서비스" /></span>
        </div>

        <div class="evtCtnsBox">
            <div class="evtMenu" id="evtMenu" data-aos="fade-up">
                <ul>
                    <li>
                        <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2938/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=1#content_1') }}">
                            <span>실전464 강좌 무료</span>
                            <div class="NSK-Black">+온라인 모의고사 무료!</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2938/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=2#content_2') }}">
                            <span>지난 국가직으로</span>
                            <div class="NSK-Black">올해의 국가직을 알아보자!</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab3' href="@if(time() < strtotime('202204021140')) javascript:alert('4.8(토)오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=3#content_3') }}@endif">
                            <div class="NSK-Black">체감난이도 투표하고</div>
                            <span>맛있는 간식 먹자!</span>
                        </a>
                    </li>
                    <li>
                        <a id='tab4' href="@if(time() < strtotime('202204041600')) javascript:alert('4.10(월)오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=4#content_4') }}@endif">
                            <span>2023 국가직 9급</span>
                            <div class="NSK-Black">기출해설특강</div>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="content_1" class="tabCts" data-aos="fade-up">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2938_01_01.jpg" />
                    <a href="javascript:void(0);" title="실전 464 수강신청" onclick="javascript:fn_submit();" style="position: absolute; left: 26.96%; top: 86.72%; width: 45.98%; height: 8.37%; z-index: 2;"></a>
                </div>
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2023/03/2938_01_02.jpg" />
                    <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2932" target="_blank" title="모의고사 무료접수" style="position: absolute; left: 21.16%; top: 76.84%; width: 57.59%; height: 9.18%; z-index: 2;"></a>
                </div>
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2938_01_03.jpg" />
            </div>

            <!--완벽분석-->
            <div id="content_2" class="tabCts Cts02" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2938_02_01.jpg" id="content_2_01" />
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2938_02_02.jpg" />
                <div class="mt20 mb100">
                    <p class="download">
                        2023 국가직 시험문제&가답안 다운로드 <a href="https://www.gosi.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000138" target="_blank">바로가기 ></a>
                    </p>
                    <div class="mt20" id="tabs1">
                        <table class="boardD">
                                <col />
                                <col span="2" />
                                <col />
                                <col span="2" />
                                <col span="2" />
                                <col />
                            <thead>
                                <tr>
                                    <th rowspan="2">단위</th>
                                    <th colspan="3">2023년</th>
                                    <th colspan="5">2022년</th>
                                </tr>
                                <tr>
                                    <th>선발예정인원</th>
                                    <th>접수인원</th>
                                    <th>경쟁률</th>
                                    <th>선발예정인원</th>
                                    <th>접수인원</th>
                                    <th>경쟁률</th>
                                    <th>응시인원</th>
                                    <th>합격선</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>총 계</th>
                                    <th>5,326</th>
                                    <th>121,526</th>
                                    <th>22.8</th>
                                    <th>5,672</th>
                                    <th>165,524</th>
                                    <th>29.2</th>
                                    <th>127,643</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>행정직 계</th>
                                    <th>4,682</th>
                                    <th>105,511</th>
                                    <th>22.5</th>
                                    <th>4,996</th>
                                    <th>141,733</th>
                                    <th>28.4</th>
                                    <th>124,232</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>행정직(일반행정:전국:일반)</td>
                                    <td>411</td>
                                    <td>30,206</td>
                                    <td>73.5</td>
                                    <td>456</td>
                                    <td>42,828</td>
                                    <td>93.9</td>
                                    <td>32,890</td>
                                    <td>91.00</td>
                                </tr>
                                <tr>
                                    <td>행정직(일반행정:전국:장애)</td>
                                    <td>37</td>
                                    <td>509</td>
                                    <td>13.8</td>
                                    <td>38</td>
                                    <td>594</td>
                                    <td>15.6</td>
                                    <td>433</td>
                                    <td>57</td>
                                </tr>
                                <tr>
                                    <td>행정직(일반행정:전국:저소득)</td>
                                    <td>18</td>
                                    <td>682</td>
                                    <td>37.9</td>
                                    <td>15</td>
                                    <td>776</td>
                                    <td>51.7</td>
                                    <td>564</td>
                                    <td>83</td>
                                </tr>
                                <tr>
                                    <td>행정직(일반행정:지역:일반)</td>
                                    <td>192</td>
                                    <td>10,702</td>
                                    <td>55.7</td>
                                    <td>233</td>
                                    <td>13,999</td>
                                    <td>60.1</td>
                                    <td>10,803</td>
                                    <td>91.00(최고), 86.00(최저)</td>
                                </tr>
                                <tr>
                                    <td>행정직(일반행정:지역:장애)</td>
                                    <td>14</td>
                                    <td>209</td>
                                    <td>14.9</td>
                                    <td>19</td>
                                    <td>339</td>
                                    <td>17.8</td>
                                    <td>247</td>
                                    <td>76.00(최고), 46.00(최저)</td>
                                </tr>
                                <tr>
                                    <td>행정직(우정사업본부:전국:저소득)</td>
                                    <td>21</td>
                                    <td>317</td>
                                    <td>15.1</td>
                                    <td>19</td>
                                    <td>381</td>
                                    <td>20.1</td>
                                    <td>287</td>
                                    <td>75</td>
                                </tr>
                                <tr>
                                    <td>행정직(우정사업본부:지역:일반)</td>
                                    <td>672</td>
                                    <td>10,614</td>
                                    <td>15.8</td>
                                    <td>573</td>
                                    <td>14,100</td>
                                    <td>24.6</td>
                                    <td>11,469</td>
                                    <td>89.00(최고), 83.00(최저)</td>
                                </tr>
                                <tr>
                                    <td>행정직(우정사업본부:지역:장애)</td>
                                    <td>59</td>
                                    <td>213</td>
                                    <td>3.6</td>
                                    <td>47</td>
                                    <td>224</td>
                                    <td>4.8</td>
                                    <td>166</td>
                                    <td>67.00(최고), 45.00(최저)</td>
                                </tr>
                                <tr>
                                    <td>행정직(경찰청:전국:일반)</td>
                                    <td>407</td>
                                    <td>7,531</td>
                                    <td>18.5</td>
                                    <td>338</td>
                                    <td>8,909</td>
                                    <td>26.4</td>
                                    <td>7,122</td>
                                    <td>89.00/88.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>행정직(경찰청:전국:장애)</td>
                                    <td>35</td>
                                    <td>214</td>
                                    <td>6.1</td>
                                    <td>28</td>
                                    <td>234</td>
                                    <td>8.4</td>
                                    <td>166</td>
                                    <td>51</td>
                                </tr>
                                <tr>
                                    <td>행정직(경찰청:전국:저소득)</td>
                                    <td>13</td>
                                    <td>139</td>
                                    <td>10.7</td>
                                    <td>11</td>
                                    <td>227</td>
                                    <td>20.6</td>
                                    <td>161</td>
                                    <td>81.00/80.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>행정직(고용노동:전국:일반)</td>
                                    <td>101</td>
                                    <td>1,930</td>
                                    <td>19.1</td>
                                    <td>469</td>
                                    <td>3,732</td>
                                    <td>8.0</td>
                                    <td>2,887</td>
                                    <td>85.00/84.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>행정직(고용노동:전국:장애)</td>
                                    <td>9</td>
                                    <td>42</td>
                                    <td>4.7</td>
                                    <td>40</td>
                                    <td>102</td>
                                    <td>2.6</td>
                                    <td>74</td>
                                    <td>49</td>
                                </tr>
                                <tr>
                                    <td>행정직(고용노동:전국:저소득)</td>
                                    <td>3</td>
                                    <td>75</td>
                                    <td>25.0</td>
                                    <td>16</td>
                                    <td>80</td>
                                    <td>5.0</td>
                                    <td>52</td>
                                    <td>55</td>
                                </tr>
                                <tr>
                                    <td>행정직(교육행정:일반)</td>
                                    <td>62</td>
                                    <td>12,177</td>
                                    <td>196.4</td>
                                    <td>71</td>
                                    <td>16,295</td>
                                    <td>229.5</td>
                                    <td>13,004</td>
                                    <td>94.00/92.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>행정직(교육행정:장애)</td>
                                    <td>6</td>
                                    <td>192</td>
                                    <td>32.0</td>
                                    <td>5</td>
                                    <td>231</td>
                                    <td>46.2</td>
                                    <td>176</td>
                                    <td>75</td>
                                </tr>
                                <tr>
                                    <td>행정직(교육행정:저소득)</td>
                                    <td>2</td>
                                    <td>186</td>
                                    <td>93.0</td>
                                    <td>3</td>
                                    <td>199</td>
                                    <td>66.3</td>
                                    <td>138</td>
                                    <td>86</td>
                                </tr>
                                <tr>
                                    <td>행정직(선거행정:일반)</td>
                                    <td>72</td>
                                    <td>1,051</td>
                                    <td>14.6</td>
                                    <td>60</td>
                                    <td>1,199</td>
                                    <td>20.0</td>
                                    <td>844</td>
                                    <td>88</td>
                                </tr>
                                <tr>
                                    <td>행정직(선거행정:장애)</td>
                                    <td>6</td>
                                    <td>39</td>
                                    <td>6.5</td>
                                    <td>5</td>
                                    <td>56</td>
                                    <td>11.2</td>
                                    <td>36</td>
                                    <td>65</td>
                                </tr>
                                <tr>
                                    <td>행정직(선거행정:저소득)</td>
                                    <td>2</td>
                                    <td>19</td>
                                    <td>9.5</td>
                                    <td>2</td>
                                    <td>25</td>
                                    <td>12.5</td>
                                    <td>22</td>
                                    <td>82</td>
                                </tr>
                                <tr>
                                    <td>직업상담직(직업상담:일반)</td>
                                    <td>22</td>
                                    <td>941</td>
                                    <td>42.8</td>
                                    <td>125</td>
                                    <td>2,651</td>
                                    <td>21.2</td>
                                    <td>1,910</td>
                                    <td>96.00/93.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>직업상담직(직업상담:장애)</td>
                                    <td>2</td>
                                    <td>11</td>
                                    <td>5.5</td>
                                    <td>11</td>
                                    <td>41</td>
                                    <td>3.7</td>
                                    <td>28</td>
                                    <td>53</td>
                                </tr>
                                <tr>
                                    <td>직업상담직(직업상담:저소득)</td>
                                    <td>1</td>
                                    <td>24</td>
                                    <td>24.0</td>
                                    <td>4</td>
                                    <td>40</td>
                                    <td>10.0</td>
                                    <td>25</td>
                                    <td>81</td>
                                </tr>
                                <tr>
                                    <td>세무직(세무:일반)</td>
                                    <td>803</td>
                                    <td>8292</td>
                                    <td>10.3</td>
                                    <td>850</td>
                                    <td>10,956</td>
                                    <td>12.9</td>
                                    <td>8,484</td>
                                    <td>80</td>
                                </tr>
                                <tr>
                                    <td>세무직(세무:장애)</td>
                                    <td>69</td>
                                    <td>77</td>
                                    <td>1.1</td>
                                    <td>73</td>
                                    <td>92</td>
                                    <td>1.3</td>
                                    <td>66</td>
                                    <td>52</td>
                                </tr>
                                <tr>
                                    <td>세무직(세무:저소득)</td>
                                    <td>26</td>
                                    <td>166</td>
                                    <td>6.4</td>
                                    <td>27</td>
                                    <td>167</td>
                                    <td>6.2</td>
                                    <td>116</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>관세직(관세:일반)</td>
                                    <td>57</td>
                                    <td>1347</td>
                                    <td>23.6</td>
                                    <td>38</td>
                                    <td>1,996</td>
                                    <td>52.5</td>
                                    <td>1,649</td>
                                    <td>93.00/91.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>관세직(관세:장애)</td>
                                    <td>5</td>
                                    <td>44</td>
                                    <td>8.8</td>
                                    <td>4</td>
                                    <td>40</td>
                                    <td>10.0</td>
                                    <td>28</td>
                                    <td>52</td>
                                </tr>
                                <tr>
                                    <td>관세직(관세:저소득)</td>
                                    <td>25</td>
                                    <td>23</td>
                                    <td>0.9</td>
                                    <td>1</td>
                                    <td>16</td>
                                    <td>16.0</td>
                                    <td>14</td>
                                    <td>51</td>
                                </tr>
                                <tr>
                                    <td>통계직(통계:일반)</td>
                                    <td>43</td>
                                    <td>593</td>
                                    <td>13.8</td>
                                    <td>47</td>
                                    <td>887</td>
                                    <td>18.9</td>
                                    <td>686</td>
                                    <td>94</td>
                                </tr>
                                <tr>
                                    <td>통계직(통계:장애)</td>
                                    <td>3</td>
                                    <td>11</td>
                                    <td>3.7</td>
                                    <td>4</td>
                                    <td>8</td>
                                    <td>2.0</td>
                                    <td>7</td>
                                    <td>67</td>
                                </tr>
                                <tr>
                                    <td>통계직(통계:저소득)</td>
                                    <td>1</td>
                                    <td>13</td>
                                    <td>13.0</td>
                                    <td>2</td>
                                    <td>16</td>
                                    <td>8.0</td>
                                    <td>13</td>
                                    <td>66</td>
                                </tr>
                                <tr>
                                    <td>교정직(교정:남)</td>
                                    <td>907</td>
                                    <td>4854</td>
                                    <td>5.4</td>
                                    <td>705</td>
                                    <td>4,764</td>
                                    <td>6.8</td>
                                    <td>3,679</td>
                                    <td>74</td>
                                </tr>
                                <tr>
                                    <td>교정직(교정:여)</td>
                                    <td>32</td>
                                    <td>1145</td>
                                    <td>35.8</td>
                                    <td>118</td>
                                    <td>1,365</td>
                                    <td>11.6</td>
                                    <td>1,075</td>
                                    <td>80</td>
                                </tr>
                                <tr>
                                    <td>교정직(교정:저소득)</td>
                                    <td>27</td>
                                    <td>162</td>
                                    <td>6.0</td>
                                    <td>25</td>
                                    <td>156</td>
                                    <td>6.2</td>
                                    <td>116</td>
                                    <td>56</td>
                                </tr>
                                <tr>
                                    <td>보호직(보호:남)</td>
                                    <td>142</td>
                                    <td>1200</td>
                                    <td>8.5</td>
                                    <td>137</td>
                                    <td>1,419</td>
                                    <td>10.4</td>
                                    <td>1,074</td>
                                    <td>76</td>
                                </tr>
                                <tr>
                                    <td>보호직(보호:여)</td>
                                    <td>61</td>
                                    <td>1563</td>
                                    <td>25.6</td>
                                    <td>59</td>
                                    <td>1,816</td>
                                    <td>30.8</td>
                                    <td>1,347</td>
                                    <td>80</td>
                                </tr>
                                <tr>
                                    <td>보호직(보호:저소득)</td>
                                    <td>6</td>
                                    <td>98</td>
                                    <td>16.3</td>
                                    <td>5</td>
                                    <td>81</td>
                                    <td>16.2</td>
                                    <td>47</td>
                                    <td>61</td>
                                </tr>
                                <tr>
                                    <td>검찰직(검찰:일반)</td>
                                    <td>274</td>
                                    <td>5660</td>
                                    <td>20.7</td>
                                    <td>248</td>
                                    <td>7,538</td>
                                    <td>30.4</td>
                                    <td>5,819</td>
                                    <td>92.00/91.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>검찰직(검찰:저소득)</td>
                                    <td>8</td>
                                    <td>113</td>
                                    <td>14.1</td>
                                    <td>7</td>
                                    <td>139</td>
                                    <td>19.9</td>
                                    <td>98</td>
                                    <td>87</td>
                                </tr>
                                <tr>
                                    <td>마약수사직(마약수사:일반)</td>
                                    <td>15</td>
                                    <td>395</td>
                                    <td>26.3</td>
                                    <td>19</td>
                                    <td>486</td>
                                    <td>25.6</td>
                                    <td>323</td>
                                    <td>91.00/89.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>마약수사직(마약수사:저소득)</td>
                                    <td>1</td>
                                    <td>10</td>
                                    <td>10.0</td>
                                    <td>1</td>
                                    <td>11</td>
                                    <td>11.0</td>
                                    <td>8</td>
                                    <td>84</td>
                                </tr>
                                <tr>
                                    <td>출입국관리직(출입국관리:일반)</td>
                                    <td>12</td>
                                    <td>1356</td>
                                    <td>113.0</td>
                                    <td>17</td>
                                    <td>2,132</td>
                                    <td>125.4</td>
                                    <td>1,610</td>
                                    <td>93.00/91.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>출입국관리직(출입국관리:저소득)</td>
                                    <td>1</td>
                                    <td>26</td>
                                    <td>26.0</td>
                                    <td>1</td>
                                    <td>21</td>
                                    <td>21.0</td>
                                    <td>15</td>
                                    <td>64</td>
                                </tr>
                                <tr>
                                    <td>철도경찰직(철도경찰:일반)</td>
                                    <td>19</td>
                                    <td>328</td>
                                    <td>17.3</td>
                                    <td>19</td>
                                    <td>358</td>
                                    <td>18.8</td>
                                    <td>227</td>
                                    <td>84</td>
                                </tr>
                                <tr>
                                    <td>철도경찰직(철도경찰:저소득)</td>
                                    <td>1</td>
                                    <td>12</td>
                                    <td>12.0</td>
                                    <td>1</td>
                                    <td>17</td>
                                    <td>17.0</td>
                                    <td>5</td>
                                    <td>51</td>
                                </tr>
                                <tr>
                                    <td>기술직 계</td>
                                    <td>644</td>
                                    <td>16015</td>
                                    <td>24.9</td>
                                    <td>676</td>
                                    <td>23,791</td>
                                    <td>35.2</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>공업직(일반기계:일반)</td>
                                    <td>46</td>
                                    <td>1459</td>
                                    <td>31.7</td>
                                    <td>68</td>
                                    <td>2,492</td>
                                    <td>36.6</td>
                                    <td>1,853</td>
                                    <td>91.00/89.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>공업직(일반기계:장애)</td>
                                    <td>4</td>
                                    <td>9</td>
                                    <td>2.3</td>
                                    <td>5</td>
                                    <td>20</td>
                                    <td>4.0</td>
                                    <td>13</td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td>공업직(일반기계:저소득)</td>
                                    <td>1</td>
                                    <td>19</td>
                                    <td>19.0</td>
                                    <td>2</td>
                                    <td>24</td>
                                    <td>12.0</td>
                                    <td>15</td>
                                    <td>62</td>
                                </tr>
                                <tr>
                                    <td>공업직(전기:일반)</td>
                                    <td>43</td>
                                    <td>1581</td>
                                    <td>36.8</td>
                                    <td>52</td>
                                    <td>2,419</td>
                                    <td>46.5</td>
                                    <td>1,673</td>
                                    <td>88.00/85.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>공업직(전기:장애)</td>
                                    <td>4</td>
                                    <td>9</td>
                                    <td>2.3</td>
                                    <td>5</td>
                                    <td>10</td>
                                    <td>2.0</td>
                                    <td>7</td>
                                    <td>63</td>
                                </tr>
                                <tr>
                                    <td>공업직(전기:저소득)</td>
                                    <td>1</td>
                                    <td>18</td>
                                    <td>18.0</td>
                                    <td>2</td>
                                    <td>33</td>
                                    <td>16.5</td>
                                    <td>23</td>
                                    <td>80</td>
                                </tr>
                                <tr>
                                    <td>공업직(화공:일반)</td>
                                    <td>17</td>
                                    <td>859</td>
                                    <td>50.5</td>
                                    <td>15</td>
                                    <td>1,432</td>
                                    <td>95.5</td>
                                    <td>1,088</td>
                                    <td>89</td>
                                </tr>
                                <tr>
                                    <td>공업직(화공:장애)</td>
                                    <td>1</td>
                                    <td>4</td>
                                    <td>4.0</td>
                                    <td>1</td>
                                    <td>7</td>
                                    <td>7.0</td>
                                    <td>7</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>공업직(화공:저소득)</td>
                                    <td>1</td>
                                    <td>7</td>
                                    <td>7.0</td>
                                    <td>1</td>
                                    <td>15</td>
                                    <td>15.0</td>
                                    <td>10</td>
                                    <td>62</td>
                                </tr>
                                <tr>
                                    <td>농업직(일반농업:일반)</td>
                                    <td>57</td>
                                    <td>2028</td>
                                    <td>35.6</td>
                                    <td>46</td>
                                    <td>2,816</td>
                                    <td>61.2</td>
                                    <td>2,158</td>
                                    <td>92.00/91.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>농업직(일반농업:장애)</td>
                                    <td>4</td>
                                    <td>11</td>
                                    <td>2.8</td>
                                    <td>4</td>
                                    <td>23</td>
                                    <td>5.8</td>
                                    <td>19</td>
                                    <td>65</td>
                                </tr>
                                <tr>
                                    <td>농업직(일반농업:저소득)</td>
                                    <td>2</td>
                                    <td>19</td>
                                    <td>9.5</td>
                                    <td>2</td>
                                    <td>30</td>
                                    <td>15.0</td>
                                    <td>25</td>
                                    <td>74</td>
                                </tr>
                                <tr>
                                    <td>임업직(산림자원:일반)</td>
                                    <td>74</td>
                                    <td>1262</td>
                                    <td>17.1</td>
                                    <td>47</td>
                                    <td>1,616</td>
                                    <td>34.4</td>
                                    <td>1,252</td>
                                    <td>85</td>
                                </tr>
                                <tr>
                                    <td>임업직(산림자원:장애)</td>
                                    <td>5</td>
                                    <td>13</td>
                                    <td>2.6</td>
                                    <td>4</td>
                                    <td>8</td>
                                    <td>2.0</td>
                                    <td>8</td>
                                    <td>전원과락</td>
                                </tr>
                                <tr>
                                    <td>임업직(산림자원:저소득)</td>
                                    <td>2</td>
                                    <td>24</td>
                                    <td>12.0</td>
                                    <td>2</td>
                                    <td>18</td>
                                    <td>9.0</td>
                                    <td>15</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>시설직(일반토목:일반)</td>
                                    <td>75</td>
                                    <td>2788</td>
                                    <td>37.2</td>
                                    <td>79</td>
                                    <td>4,189</td>
                                    <td>53.0</td>
                                    <td>3,147</td>
                                    <td>80.00/79.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>시설직(일반토목:장애)</td>
                                    <td>7</td>
                                    <td>11</td>
                                    <td>1.6</td>
                                    <td>6</td>
                                    <td>5</td>
                                    <td>0.8</td>
                                    <td>5</td>
                                    <td>전원과락</td>
                                </tr>
                                <tr>
                                    <td>시설직(일반토목:저소득)</td>
                                    <td>3</td>
                                    <td>33</td>
                                    <td>11.0</td>
                                    <td>3</td>
                                    <td>35</td>
                                    <td>11.7</td>
                                    <td>31</td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td>시설직(건축:일반)</td>
                                    <td>43</td>
                                    <td>1645</td>
                                    <td>38.3</td>
                                    <td>41</td>
                                    <td>2,788</td>
                                    <td>68.0</td>
                                    <td>2,023</td>
                                    <td>87</td>
                                </tr>
                                <tr>
                                    <td>시설직(건축:장애)</td>
                                    <td>4</td>
                                    <td>15</td>
                                    <td>3.8</td>
                                    <td>3</td>
                                    <td>19</td>
                                    <td>6.3</td>
                                    <td>17</td>
                                    <td>56</td>
                                </tr>
                                <tr>
                                    <td>시설직(건축:저소득)</td>
                                    <td>1</td>
                                    <td>21</td>
                                    <td>21.0</td>
                                    <td>1</td>
                                    <td>26</td>
                                    <td>26.0</td>
                                    <td>20</td>
                                    <td>77</td>
                                </tr>
                                <tr>
                                    <td>시설직(시설조경:일반)</td>
                                    <td>6</td>
                                    <td>312</td>
                                    <td>52.0</td>
                                    <td>9</td>
                                    <td>521</td>
                                    <td>57.9</td>
                                    <td>407</td>
                                    <td>89.00/88.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>시설직(시설조경:장애인)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>-</td>
                                    <td></td>
                                    <td></td>
                                    <td>미출원</td>
                                </tr>
                                <tr>
                                    <td>방재안전직(방재안전)</td>
                                    <td>7</td>
                                    <td>287</td>
                                    <td>41.0</td>
                                    <td>5</td>
                                    <td>378</td>
                                    <td>75.6</td>
                                    <td>231</td>
                                    <td>81</td>
                                </tr>
                                <tr>
                                    <td>전산직(전산개발:일반)</td>
                                    <td>117</td>
                                    <td>2322</td>
                                    <td>19.8</td>
                                    <td>188</td>
                                    <td>3,464</td>
                                    <td>18.4</td>
                                    <td>2,649</td>
                                    <td>82</td>
                                </tr>
                                <tr>
                                    <td>전산직(전산개발:장애)</td>
                                    <td>9</td>
                                    <td>33</td>
                                    <td>3.7</td>
                                    <td>15</td>
                                    <td>49</td>
                                    <td>3.3</td>
                                    <td>31</td>
                                    <td>45</td>
                                </tr>
                                <tr>
                                    <td>전산직(전산개발:저소득)</td>
                                    <td>4</td>
                                    <td>47</td>
                                    <td>11.8</td>
                                    <td>6</td>
                                    <td>49</td>
                                    <td>8.2</td>
                                    <td>33</td>
                                    <td>66</td>
                                </tr>
                                <tr>
                                    <td>전산(데이터:일반)</td>
                                    <td>13</td>
                                    <td>312</td>
                                    <td>24.0</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>전산(데이터:장애인)</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1.0</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>전산직(정보보호:일반)</td>
                                    <td>16</td>
                                    <td>195</td>
                                    <td>12.2</td>
                                    <td>8</td>
                                    <td>305</td>
                                    <td>38.1</td>
                                    <td>2,649</td>
                                    <td>82</td>
                                </tr>
                                <tr>
                                    <td>전산직(정보보호:장애)</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>2.0</td>
                                    <td>1</td>
                                    <td>7</td>
                                    <td>7.0</td>
                                    <td>6</td>
                                    <td>54</td>
                                </tr>
                                <tr>
                                    <td>전산직(정보보호:저소득)</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>2.0</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>방송통신직(전송기술:일반)</td>
                                    <td>67</td>
                                    <td>655</td>
                                    <td>9.8</td>
                                    <td>48</td>
                                    <td>967</td>
                                    <td>20.1</td>
                                    <td>673</td>
                                    <td>81</td>
                                </tr>
                                <tr>
                                    <td>방송통신직(전송기술:장애)</td>
                                    <td>5</td>
                                    <td>4</td>
                                    <td>0.8</td>
                                    <td>4</td>
                                    <td>9</td>
                                    <td>2.3</td>
                                    <td>7</td>
                                    <td>전원과락</td>
                                </tr>
                                <tr>
                                    <td>방송통신직(전송기술:저소득)</td>
                                    <td>2</td>
                                    <td>8</td>
                                    <td>4.0</td>
                                    <td>2</td>
                                    <td>17</td>
                                    <td>8.5</td>
                                    <td>11</td>
                                    <td>69</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--시험총평 및 시험후기-->
            <div id="content_3" class="tabCts Cts03" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2938_03_01.jpg" title="시험 체감난이도&이벤트" />
                @include('willbes.pc.eventsurvey.show_graph_partial',array('is_series' => 'N')) {{-- is_series(직렬: Y, 직렬아님: N) --}}

                <div class="btn">
                    <a href="javascript:pullOpen();">
                        설문참여하기 >
                    </a>
                </div>

                <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2023/03/2938_03_02.jpg" title="시험후기 댓글 이벤트" /></div>
                {{--시험평가댓글--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
                @endif

                <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2023/03/2938_03_03.jpg" title="기대평과 응원 메시지" /> </div>
                {{--기본댓글--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_normal_partial')
                @endif
            </div>

            <!--기출해설강의-->
            <div id="content_4" class="tabCts Cts04" data-aos="fade-up">
                <div><img src="https://static.willbes.net/public/images/promotion/2023/03/2938_04_01.jpg" title="기출해설" /></div>
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

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">    
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready(function() {
        AOS.init();
      });
    </script>
@stop