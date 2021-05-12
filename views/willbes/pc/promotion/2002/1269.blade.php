@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            bottom:20px;
            right:10px;
            z-index:1;
        }
        .skybanner li {
            margin-bottom:5px;
        }

        /*타이머*/
        .time {width:100%; text-align:center; background:#7d7d7d}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}
        .time table td:last-child {font-size:40px}
        .time table td img {width:75%}
        .time .time_txt {font-size:28px; color:#000; letter-spacing: -1px}
        .time .time_txt span {color:#ffda39; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#ffda39}
        50%{color:#98f231}
        to{color:#ffda39}
        }
        @@-webkit-keyframes upDown{
        from{color:#ffda39}
        50%{color:#98f231}
        to{color:#ffda39}
        }

        .wb_top {background:#242424 url(https://static.willbes.net/public/images/promotion/2019/05/1269_top_bg.jpg) no-repeat center; }
        .wb_01 {background:#aeaeae}
        .wb_02 {background:#ececec}
        .wb_03 {background:#7d7d7d}
        .wb_03 div {width:1210px; margin:0 auto; position:relative}
        .wb_03 div ul {position:absolute; width:88px; top:378px; left:567px; z-index:10}
        .wb_03 div li {margin-bottom:18px}
        .wb_03 div li:nth-child(3) {margin-bottom:20px}
        .wb_03 div li:nth-child(4) {margin-bottom:20px}
        .wb_03 div li:nth-child(5) {margin-bottom:20px}
        .wb_03 div li:nth-child(6) {margin-bottom:20px}
        .wb_03 div li a {display:block; height:23px; line-height:23px; font-size:13px; font-weight:600; letter-spacing:-1px; background:#231f20; color:#fff; border:1px solid #231f20; font-family:'Noto Sans KR', Arial, Sans-serif}
        .wb_03 div li a:hover {background:#ffda38; color:#231f20}
        .wb_03 div li a.end {background:#666; color:#000}
        .wb_03 div span {position:absolute; display:block; height:31px; line-height:31px; padding:0 15px; background:#231f20; color:#fff; font-size:14px; border-radius:22px; border:1px solid #231f20; z-index:11; letter-spacing:-1px}
        .wb_03 div span em {font-size:11px}
        .wb_03 div span.on {background:#ffda38; color:#231f20}
        .wb_03 div span.area01 {top:438px; left:819px} /*본원*/
        .wb_03 div span.area02 {top:490px; left:735px} /*신림*/
        .wb_03 div span.area03 {top:522px; left:774px} /*인천*/
        .wb_03 div span.area04 {top:737px; left:774px} /*광주*/
        .wb_03 div span.area05 {top:667px; left:815px} /*전주*/
        .wb_03 div span.area06 {top:678px; left:915px} /*대구*/
        .wb_03 div span.area07 {top:737px; left:964px} /*부산*/
        .wb_03 div span.area08 {top:750px; left:856px} /*진주*/
        .wb_03 div span.area09 {top:859px; left:774px} /*제주*/

        .wb_04 {background:#fff}
        .wb_05 {background:#cca91a}

        .content_guide_wrap{background:#fff; padding:100px 0}
        .content_guide_box {position:relative; width:1000px; margin:0 auto;}
        .content_guide_box .guide_tit {margin-bottom:20px; font-size:24px}
        .content_guide_box dl {word-break:keep-all;border:2px solid #202020; padding:30px}
        .content_guide_box dt {margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-size:13px; font-weight:bold; margin-right:10px}
        .content_guide_box dd {color:#777; font-size:13px; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd p{ margin-bottom:3px}
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="p_re evtContent NGR" id="evtContainer">
        {{--
        <div class="skybanner" >
            <a href="#evt"><img src="http://file3.willbes.net/new_cop/2019/01/EV190115_p_sky.png" alt="스카이스크래퍼" ></a>
        </div>
        --}}

        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt">접수까지<br><span>남은 시간은</span></td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1269_top.jpg" alt="2019년 2차대비 전국모의고사"/>
        </div>

        <div class="evtCtnsBox wb_01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1269_01.jpg" alt="설명" />
        </div>

        <div class="evtCtnsBox wb_02" id="table">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1269_02.jpg" alt="시간표 및 장소" />
        </div>

        <div class="evtCtnsBox wb_03" >
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1269_03.jpg"  alt="전국캠퍼스"/>
                <ul>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="노량진" onmouseover="$('span.area01').addClass('on');" onmouseleave="$('span.area01').removeClass('on');" target="_blank">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="신림" onmouseover="$('span.area02').addClass('on');" onmouseleave="$('span.area02').removeClass('on');" target="_blank">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="인천" onmouseover="$('span.area03').addClass('on');" onmouseleave="$('span.area03').removeClass('on');" target="_blank">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="광주" onmouseover="$('span.area04').addClass('on');" onmouseleave="$('span.area04').removeClass('on');" target="_blank">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="전주" onmouseover="$('span.area05').addClass('on');" onmouseleave="$('span.area05').removeClass('on');" target="_blank">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="대구" onmouseover="$('span.area06').addClass('on');" onmouseleave="$('span.area06').removeClass('on');" target="_blank">신청하기</a></li>
                    <li><a href="#none" alt="부산" onmouseover="$('span.area07').addClass('on');" onmouseleave="$('span.area07').removeClass('on');" target="_blank" class="end">마감</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="진주" onmouseover="$('span.area08').addClass('on');" onmouseleave="$('span.area08').removeClass('on');" target="_blank">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="제주" onmouseover="$('span.area09').addClass('on');" onmouseleave="$('span.area09').removeClass('on');" target="_blank">신청하기</a></li>
                </ul>
                <span class="area01">노량진</span>
                <span class="area02">신림</span>
                <span class="area03">인천</span>
                <span class="area04">광주</span>
                <span class="area05">전북<em>(전주)</em></span>
                <span class="area06">대구</span>
                <span class="area07">부산</span>
                <span class="area08">진주</span>
                <span class="area09">제주</span>
            </div>
        </div>

        <div class="evtCtnsBox wb_04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1269_04.jpg"  alt="이벤트2" usemap="#Map1269B" border="0" />
            <map name="Map1269B" id="Map1269B">
                <area shape="rect" coords="443,861,678,933" href="javascript:;" onclick="giveCheck()" alt="응시쿠폰받기" />
            </map>
        </div>

        {{--댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox wb_05" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1269_05.jpg"  alt="6월 전국모의고사" usemap="#Map1239C" border="0" />
            <map name="Map1239C" id="Map1239C">
                <area shape="rect" coords="314,467,809,561" href="{{ site_url('/pass/mockTest/apply/cate') }}" target="_blank" alt="모의고사 신청하기" />
            </map>
        </div>

        <div class="content_guide_wrap">
            <div class="content_guide_box" id="ask">
                <p class="guide_tit NGEB">응시자 유의사항</p>
                <dl>
                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <p>학원 실강패스 수강생은 응시 지역별 학원 상담실 문의해 주시기 바랍니다. 모든 고사장 주차 불가합니다. 시험 응시생이 많아 혼잡이 예상되오니 대중교통을 이용해 주시기 바랍니다. 반드시 본인이 응시할 캠퍼스로 신청 바랍니다.</p>
                    </dd>

                    <dt>
                        <h3>고사장 입실</h3>
                    </dt>
                    <dd>
                        <p>1. 시험당일 09:40까지 해당 고사장으로 반드시 입실해야합니다.</p>
                        <p>2. 시험 종료 후 시험감독관의 지시가 있을때까지 퇴실할 수 없으며, 모든 답안지는 반드시 제출하여 주십시오.</p>
                        <p>3. 본인이 신청한 캠퍼스에서만 응시할 수 있습니다.</p>
                    </dd>
                    <dt>
                        <h3>신분증 지참</h3>
                    </dt>
                    <dd>
                        <p>본인 확인을 위해 응시표(응시 전 발송 된 문자 메시지 확인 가능)와 공공기관이 발행한 신분(주민등록증, 여권, 운전면허증, 주민등록번호가 포함된 장애인등록증(복지카드 중 하나)을 반드시 소지하여야 합니다.</p>
                    </dd>
                    <dd>
                        <p>※ 모의고사문의 : 각 캠퍼스에 문의</p>
                        <p>※ 성적공지일 추후공지.</p>
                        <p>※ 통합 사이트 오픈으로  온/오프 성적 공지가 지연될수 있는점 양해말씀드립니다. </p>
                    </dd>
                    <dt>
                        <h3>모의고사 접수 현황</h3>
                    </dt>
                    <dd>
                        <p>- 나의 모의고사 접수현황은 [내강의실 > 모의고사관리 > 접수현황]에서 확인 가능합니다.</p>
                        <p>- 해당 모의고사명 클릭시 접수내역 확인 및 응시표를 출력할 수 있습니다.(단, 환불 완료된 모의고사는 응시표 출력불가능)</p>
                        <p>- 온라인 모의고사(응시형태가 Online인 경우)는 내강의실 > 모의고사관리 > 온라인 모의고사 응시메뉴에서 응시해 주시기 바랍니다. </p>
                    </dd>
                    <dt>
                        <h3>모의고사 응시</h3>
                    </dt>
                    <dd>
                        <p>- 모의고사는 [내강의실 > 모의고사관리 > 온라인 모의고사 응시]에서 응시 가능합니다.</p>
                        <p>- 온라인 응시기간 및 지정된 시간에만 응시가 가능하오니 시험기간을 엄수해 주세요.</p>
                        <p>- 임의로 시험을 중단하거나 임시저장만 한 상태에서 시험 종료 시, 시험결과를 확인할 수 없습니다.</p>
                        <p>- 모의고사 응시 창에서 응시 후, 답안지는 모두 체크하셔야 답안 제출이 가능합니다.<br>
                        (답안을 제출해야만 성적결과를 확인할 수 있습니다.) 
                        </p>
                    </dd>
                    <dt>
                        <h3>성적결과</h3>
                    </dt>
                    <dd>
                        <p>- [내강의실 > 모의고사관리 > 성적결과]에서 정답제출을 처리한 모의고사의 성적 결과만 확인 가능합니다.</p>
                        <p>- 성적결과는 오프라인 시험응시일이 마감된 이후 3~5일 안에 제공됩니다.</p>
                    </dd>
                </dl>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $regi_form = $('#regi_form');        

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('온라인 모의고사 무료 응시쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                        location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';
                    }
                }, showValidateError, null, false, 'alert');
            @endif
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop