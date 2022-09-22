@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .sky {position:fixed; width:137px; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        /*타이머*/
        .newTopDday {clear:both;background:#fff; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}  

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/01/2521_top_bg.jpg) no-repeat center top; height:900px}
        .evt_top span {position: absolute; top:440px; left:50%; margin-left:-276px; width:552px; z-index: 2;}

        .evt_02 {background:#f7f7f7;}
   
        .evt_03 {background:#1459a4; padding-bottom:100px; color:#fff}     
        .evt_03 .check {font-size:16px; text-align:center; line-height:1.5;margin-top:40px;font-weight:bold; }
        .evt_03 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
        .evt_03 .check a {display:inline-block; padding:5px 20px; color:#fff; margin-left:20px; border-radius:20px; border:2px solid #fff}
        .evt_03 .check a:hover {color:#333; background:#35fffa;}
        .evt_03 .check input:checked + label {border-bottom:1px dashed #ffdb1b; color:#ffdb1b}
        .evt_03 .info {width:700px; margin:20px auto 50px; padding:10px; line-height:1.4; font-size:14px; text-align:left}

        /* 이용안내 */
        .content_guide_wrap{background:#fff; width:1000px; margin:0 auto; padding:100px 0; font-size:14px}
        .content_guide_wrap .guide_tit{margin-bottom:30px; text-align:left; font-size:30px;}
        .content_guide_box {width:1000px; margin:0 auto; padding-top:30px}
        .content_guide_box dl{word-break:keep-all;}
        .content_guide_box dt{margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; margin-right:10px; font-size:120%}
        .content_guide_box dt img.btn{padding:2px 0 0 0}
        .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong {color:#555}
        .content_guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px; line-height:1.5}
        .content_guide_box dd:after {content:""; display:block; clear:both}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#apply_pass"><img src="https://static.willbes.net/public/images/promotion/2022/01/2521_sky.png" alt="할인쿠폰"/></a>         
        </div>

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday"  data-aos="fade-down">
            <div>
                <ul>
                    <li>
                        FINAL PASS<br>판매종료까지
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>
               
        <div class="evtCtnsBox evt_top">
            <span data-aos="flip-up" data-aos-delay="500"><img src="https://static.willbes.net/public/images/promotion/2022/01/2521_top.png" alt="파이널 패스"></span>
        </div>      

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2521_01.jpg" alt="왜 등불쌤인가?" />
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2521_02.jpg" alt="학습 PLAN" />     
        </div>

        <div class="evtCtnsBox evt_03" id="apply_pass" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2521_03.jpg" alt="합격패스" />
                <a href="javascript:void(0);" onclick="go_PassLecture(3001, 190892);" title="항해술 패스" style="position: absolute; left: 25.8%; top: 81.37%; width: 48.04%; height: 14.95%; z-index: 2;"></a>
            </div>
            <div class="check">
                <input name="ischk" type="checkbox" id="is_chk" value="Y" />
                <label for="is_chk">신광은 경찰 FINAL PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#careful">이용안내 확인하기 ↓</a>               
            </div>
            <div class="info">
                ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신 및 환급이 불가합니다.<br>
                ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br>
                ※ 재수강 & 환승 쿠폰은 FINAL PASS에는 적용되지 않습니다.
            </div>
        </div>


        <div class="content_guide_wrap" id="careful">
            <p class="guide_tit">윌비스 신광은 경찰 <span class="NSK-Black tx-blue">FINAL PASS </span> 이용안내</p>
            <div class="content_guide_box">
                <dl>
                    <dt>
                        <h3>강좌 기본</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 22년 1차 필기시험일까지 수강 가능한 기간제 PASS입니다.</li>
                            <li>본 상품 강좌 구성은 다음과 같습니다.<br>      
                            - 2022년 대비 형사법, 경찰학, 헌법 전 강좌                      
                                <div class="tx-blue">
                                    * 형사법 : 신광은 교수님<br>
                                    * 경찰학 : 장정훈 교수님<br>
                                    * 헌법 : 김원욱 교수님 / 이국령 교수님
                                </div>
                            </li>
                            <li>선택한 신광은 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 2배수로 수강할 수 있습니다.</li>
                            <li>각 강좌 별 2배수 수강 후에는 추가 수강이 불가합니다. (<a href="https://police.willbes.net/support/notice/show?board_idx=250648&s_keyword=%EB%B0%B0%EC%88%98" target="_blank" class="tx-blue">배수 제한 공지 자세히 보기></a>)</li>
                            <li>신광은 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제 완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 3강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 사용일 수 만큼 차감 후
                            환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                            총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가
                                필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.
                            (단,이벤트 시 쿠폰사용가능)</li>
                            <li>신광은 경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며,
                            이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다.
                            이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                            <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $(document).ready(function(){
        AOS.init();
      });
    </script>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
    
        function go_PassLecture(cate, code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var _url = '{{ site_url('/periodPackage/show/cate/')}}' + cate + '/pack/648001/prod-code/' + code;
            location.href = _url;
        }

        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params['give_type']) === false && empty($arr_promotion_params['give_idx']) === false)
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

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop
