@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            background:#fff;
            position:relative;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/05/1066_top_bg.jpg) center top no-repeat}
        .wb_cts01 {background:#1e1c31;}       

        .wb_cts02 {background:#00ced1}

        .wb_cts02s {background:#e35330;}
        .wb_cts02s .tImg img {margin:0 5px 10px;width:302px;height:166px;border:2px solid #28364a;}

        .wb_cts03 {padding-bottom:150px}

        .wb_cts04 {background:#e35330;}

        .wb_cts05 {padding-bottom:150px}
        .wb_cts05 table {border-top:4px solid #1c1d31; border-left:1px solid #c6c6c6; width:980px; margin:0 auto}
        .wb_cts05 table tr {border-bottom:1px solid #c6c6c6;}
        .wb_cts05 table th,
        .wb_cts05 table td {padding:20px; font-size:14px; line-height:1.5; border-right:1px solid #c6c6c6;}
        .wb_cts05 table th {background:#f3f3f3}
        .wb_cts05 table th p {color:#e55425; font-weight:600}
        .wb_cts05 table th strong {font-size:20px}
        .wb_cts05 table td a {display:block; padding:5px}
        .wb_cts05 table td a:hover {background:#ffede8}
        .wb_cts05 table td span {vertical-align:top; color:#e55425; }

        .skybanner {position:fixed;top:100px;right:10px;width:259px; text-align:center; z-index:11;}   
        .skybanner a {display:block;margin-bottom:10px;}   

        /*타이머*/
        .time {text-align:center; padding:20px 0; background:#fff; border-radius:20px; width:1000px !important; margin:0 auto}
        .time ul {width:100%;}
        .time ul:after {content:''; display:block; clear:both}
        .time li {display:inline; line-height:61px; font-size:28px; margin-right:10px}
        .time li:first-child {}
        .time li img {width:44px}
        .time .time_txt {color:#000; letter-spacing:-1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }
        @@-webkit-keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }   
    </style>


    <div class="evtContent NSK" id="evtContainer">      
        <div class="skybanner">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1067" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_skybanner.png" title="첨삭지도반" >
            </a>  
            <a href="#live">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1066_sky2.png" title="라이브로 소통하기" >
            </a>                 
        </div>
      
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/1066_top.jpg" title="제니스 영어 한덕현" />       
        </div>        

        <div class="evtCtnsBox wb_cts01" id="wb_cts01_01">
            <div class="time NGEB" id="newTopDday">
                <ul>
                    <li class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</li>
                    <li class="time_txt"><span>남은 시간은</span></li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">일</li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>             
                </ul>
            </div>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/1066_01.jpg" title="고득점 실전 패키지" />  
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2180" target="_blank" title="수강신청" style="position: absolute; left: 57.05%; top: 76.82%; width: 27.5%; height: 7.64%; z-index: 2;"></a> 
            </div>    
        </div>  

        <div class="evtCtnsBox wb_cts02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/1066_02.jpg" title="반반한 모의고사 무료방송" />
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1676" target="_blnak" style="position: absolute; left: 22.86%; top: 78.76%; width: 54.02%; height: 9.15%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts02s" id="live">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/1066_03_01.jpg" alt="한덕현 라이브" />
            <div class="tImg">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_01.gif" alt="" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_02.gif" alt="" /><br>
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_03.gif" alt="" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_04.gif" alt="" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1066_02s_05.gif" alt="" />
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/05/1066_03_02.jpg" alt="수강신청"/>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2021/05/1066_04.jpg" alt="실시간 소통 댓글" /> 
            {{-- 이모티콘 댓글 --}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_emoticon2_partial')
            @endif  
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/1066_05.jpg" alt="영어는 어려운 과목이 아닙니다." />   
        </div>

        <div class="evtCtnsBox wb_cts05" id="cts05">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1066_06.jpg" alt="커리큘럼"/>   
            <table>
                <col />
                <col />
                <col />
                <col />
                <col />
                <thead>
                    <tr>
                        <th><strong>구분</strong></th>
                        <th>영어의 근간이 되는 문법,
                        <p>단계별 학습으로 실력 UP!</p>
                        <strong>문법</strong></th>
                        <th>영어 고득점 달성에
                        <p>최적화된 독해 커리큘럼</p>
                        <strong>독해</strong></th>
                        <th>출제 범위 내외 있는
                        <p>영어 어휘 완전정복!</p>
                        <strong>어휘</strong></th>
                        <th>기본을 탄탄히 했다면,
                        <p>이제 실전도 확실하게!</p>
                        <strong>실전</strong>(전영역)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><strong>기본</strong></th>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/169567" target="_blank" >기초입문</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/183409" target="_blank">제니스문법</a>
                        </td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154894" target="_blank">제니스 독해</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/185366" target="_blank">필살기출비법</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/184920" target="_blank">첨삭독해</a>
                        </td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157581" target="_blank">제니스 보카</a>
                        </td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158678" target="_blank">스나이퍼32</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/185509" target="_blank">새벽모의고사</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <strong>심화</strong>
                        </th>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/183412" target="_blank">실전문법 464</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145823" target="_blank">실전영작 215</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/173562" target="_blank">기출리뷰</a>
                        </td>
                       <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/173563" target="_blank">독해기적</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157579" target="_blank">논리독해</a>
                        </td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145826" target="_blank">열끝생활영어</a>
                        </td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/180888" target="_blank"><span>[지방직]</span> 아작내기</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/179087" target="_blank">실전동형모의고사</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <strong>실전</strong>
                        </th>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146100" target="_blank">제니스 PICK263</a>
                        </td>
                        <td></td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146969" target="_blank">실전보카 371</a>
                        </td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158682" target="_blank"><span>[ONE DAY]</span> 생활영어</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158683" target="_blank">영작</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/169814" target="_blank">동취미</a>
                        </td>
                    </tr>
                </tbody>
            </table>   
        </div>

    </div>
    <!-- End Container -->

    <script>  
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });       
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop
 