@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {width:100% !important;min-width:1120px !important;margin-top:20px !important;padding:0 !important;background:#fff;}
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/
        .sky {position:fixed;top:150px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}
        .evt00 {background:#0a0a0a}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/09/2366_top_bg.jpg) no-repeat center top;}
        .evt01 .passLecBuy {position:relative; width:1120px; margin:0 auto;}
        .evt01 .passLecBuy .price {position:absolute; left:715px; width:250px; text-align:left; line-height:30px; font-size:16px; font-weight:bold; color:#fff; z-index: 2;}
        .evt01 .passLecBuy .price01 {top:515px}
        .evt01 .passLecBuy .price02 {top:874px}
        .evt01 .passLecBuy .price strong {font-family:Verdana, Geneva, sans-serif; font-size:30px}
        .evt01 input[type="radio"] {height:18px; width:18px; vertical-align:middle}
        .evt01 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle}
        .evt01 input:checked + label {border-bottom:1px dashed #fec200; color:#fec200}
        .evt01 .totalPrice {width:600px; margin:60px auto;}
        .evt01 .totalPrice a {background:#c00d0d; display:block; font-size:36px; color:#fff; padding:0 30px; background:#000; border-radius:60px; height:80px; line-height:80px; box-shadow:10px rgba(0,0,0,.5);}
        .evt01 .totalPrice a:hover {background:#5b18a7}
        .evt01 .check {width:800px; margin:0 auto; padding:20px; font-size:16px; color:#000; letter-spacing:-1px;}
        .evt01 .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .evt01 .check p {font-size:14px; padding:10px 0 0 20px; line-height:1.4}
        .evt01 .check input:checked + label {border-bottom:1px dashed #4d0721; color:#4d0721}
        .evt02 {background:#F8F8F8}
        .youtube {position:absolute; top:451px; left:50%;z-index:1;margin-left:-349px}
        .youtube iframe {width:697px; height:389px}
        .evt_03_01 {padding-bottom:50px;}
        .evtTab {width:890px; margin:0 auto}
        .evtTab li {display:inline; float:left; width:50%}
        .evtTab li a {display:block; color:#898989; font-size:24px; padding:20px 0; border:5px solid #898989; border-bottom-color:#000; font-weight:bold}
        .evtTab li:first-child a {border-right:0}
        .evtTab li:last-child a {border-left:0}
        .evtTab li a:hover,
        .evtTab li a.active {color:#000; border:5px solid #000; border-bottom-color:#fff}
        .evtTab:after {content:''; display:block; clear:both}
        .evt04 {background:#DFDFDF}

        /*이용안내*/
        .evtInfo {padding:100px 0;background:#ededed}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px;color:#3a3a3a;}
        .guide_box dt{margin-bottom:10px; display:inline-block;font-weight:bold; font-size:17px; border-radius:30px;color:#3a3a3a;font-size:25px;}
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;color:#3a3a3a;font-size:15px}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px;}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="#event01">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2366_sky02.png" alt="L-PASS"/>
            </a>
            <a href="#event02">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2366_sky01.png" alt="오픈기념 이벤트"/>
            </a>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위" />
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2366_top.jpg" alt="경찰간부" />
        </div>

        <div class="evtCtnsBox evt01" id="event01">
            <div class="passLecBuy">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2366_01.jpg" alt="최저가" />
                <div class="price price01">
                    <strong>139</strong>만원<br>
                    <input type="radio" id="y_pkg1" name="y_pkg" value="{{ (ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '186166' : '159718') }}" data-sale-price="970000"/> <label for="y_pkg1">신광은경찰간부 L-PASS</label>
                </div>
            </div>
            <div class="check">
                <input type="checkbox" id="is_chk1" name="is_chk" value="Y"/>
                <label for="is_chk1">페이지 하단 신광은 경찰 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                <a href="#info">이용안내확인하기 ↓</a>
                <p>
                    ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신이 불가합니다.<br>
                    ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.
                </p>
            </div>
            <div class="totalPrice NSK-Black">
                <a href="javascript:void(0);" onclick="goCartNDirectPay('event01', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');">신청하기 ></a>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2366_02.jpg" alt="스페셜영상" />
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/d6TpPnR5crM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2366_03.jpg" alt="개편포인트" />
        </div>

        <div class="evtCtnsBox evt_03_01">
            <ul class="evtTab">
                <li><a href="#tab01">1.필기시험 과목</a></li>
                <li><a href="#tab02">2.과목간 비중</a></li>
            </ul>
            <div id="tab01"><img src="https://static.willbes.net/public/images/promotion/2021/09/2366_03_01.jpg" alt="" /></div>
            <div id="tab02"><img src="https://static.willbes.net/public/images/promotion/2021/09/2366_03_02.jpg" alt="" /></div>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2366_04.jpg" alt="교수진" />
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2366_05.jpg" alt="합격포인트" />
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2366_06.jpg" alt="런칭이벤트" />
        </div>

        <div class="evtCtnsBox evt07" id="event02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2366_07.jpg" alt="할인쿠폰" />
                <a href="javascript:void(0)" alt="할인쿠폰받기" onclick="giveCheck();" style="position: absolute;left: 29%;top: 63.65%;width: 42%;height: 8%;z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="이미지다운받기" style="position: absolute;left: 26.75%;top: 91.65%;width: 48%;height: 5%;z-index: 2;"></a>
            </div>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox evtInfo NGR" id="info">
            <div class="guide_box" >
                <h2 class="NSK-Black" >윌비스 신광은경찰간부 L-PASS 이용안내</h2>
                <dl>
                    <dt>신광은경찰간부 L-PASS</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 2022년 10월 31일 까지만 들을수 있는 기간제 간부PASS입니다.</li>
                            <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                                - 2022년 대비 형사법, 경찰학(행정법), 헌법 , 범죄학, 민법총칙, 행정학  강좌<br><br>
                                * 형사법 : 신광은 교수님<br>
                                * 경찰학개론 : 장정훈 교수님<br>
                                * 헌법 : 김원욱 교수님 / 이국령 교수님<br>
                                * 범죄학 : 박상민 교수님<br>
                                * 형사법(형법) : 문형석 교수님<br>
                                * 민법총칙 : 김동진 교수님<br>
                                * 행정학 : 이동호 교수님<br>
                                * G-TELP : 김준기 교수님<br>
                                * 한능검 : 오태진 교수님
                            </li><br>
                            <li>선택한 신광은 경찰간부 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                            <li>신광은 경찰간부 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>
                    <dt>교재 및 포인트</dt>
                    <dd><ol><li>신광은 형사법 몰입T패스: 신광은 교수님의 형사법(개편) 전 강좌를 무제한으로 수강할 수 있습니다.</li></ol></dd>
                    <dt>환불</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li> 고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면,
                                <br>신광은 경찰PASS 결제가 기준으로 계산하여   사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>포인트를 사용하였을 경우 사용한 포인트만큼 차감 후 환불 진행되며,<br> 남은 포인트는 회수됩니다.(포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- End evtContainer -->

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <script type="text/javascript">
        /*탭*/
        $(document).ready(function(){
            $('.evtTab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);
                $links.not($active).each(function () {
                    $(this.hash).hide()
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
        });

        {{--쿠폰발급--}}
        $regi_form = $('#regi_form');
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            @if(empty($arr_promotion_params) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop