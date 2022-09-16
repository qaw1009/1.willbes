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

        .evt_top {background:url("https://static.willbes.net/public/images/promotion/2022/09/2772_top.jpg") no-repeat center top; height:1160px}
        .evt_top span {position: absolute; left:50%; z-index: 2;}
        .evt_top span.img01 {top:245px; margin-left:-469.5px}

        .evt_tops {background:#252525;}

        .evt01 {background:#F5F5F7;}
        .evt01 .passLecBuy {position:relative; width:1120px; margin:0 auto;}
        .evt01 .passLecBuy .price {position:absolute; left:575px; width:250px; text-align:left; line-height:30px; font-size:20px; font-weight:bold; color:#333; z-index: 2;}
        .evt01 .passLecBuy .price01 {top:785px}     
        .evt01 .passLecBuy .price strong {font-family:Verdana, Geneva, sans-serif; font-size:30px}
        .evt01 input[type="radio"] {height:18px; width:18px; vertical-align:middle}
        .evt01 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle}
        .evt01 input:checked + label {border-bottom:1px dashed #4045AD; color:#4045AD}
        .evt01 .totalPrice {width:600px; margin:0 auto;padding-bottom:60px;}
        .evt01 .totalPrice a {display:block; font-size:36px; color:#fff; padding:0 30px; background:#000; border-radius:60px; height:80px; line-height:80px; box-shadow:10px rgba(0,0,0,.5);}
        .evt01 .totalPrice a:hover {background:#4045AD}
        .evt01 .check {width:800px; margin:0 auto; padding:20px; font-size:16px; color:#000; letter-spacing:-1px;}
        .evt01 .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .evt01 .check p {font-size:14px; padding:10px 0 0 20px; line-height:1.4}
        .evt01 .check input:checked + label {border-bottom:1px dashed #4d0721; color:#4d0721}

        .evt02 {background:#6569FE;}
        .youtube {position:absolute; top:451px; left:50%;z-index:1;margin-left:-349px}
        .youtube iframe {width:697px; height:389px}

        .evt03 {background:#fff;}

        .evt04 {background:#13171A;}

        .evt05 {background:#F2F2F2;}

        .evt06 {background:#fff;}

        .evt07 {background:#fff;}

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

        <div class="sky" id="QuickMenu">
            <a href="#event01">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2772_sky02.png" alt="l-pass"/>
            </a>
            <a href="#event02">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2772_sky01.png" alt="스페셜 할인"/>
            </a>            
        </div>

        <div class="evtCtnsBox evt_top">
            <span class="img01" data-aos="flip-down"><img src="https://static.willbes.net/public/images/promotion/2022/09/2772_top.png" alt="경찰간부 엘패스"></span>
        </div>

        <div class="evtCtnsBox evt_tops" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2772_tops.jpg" alt="지금 신청해야 최저가" />
        </div>

        <div class="evtCtnsBox evt01" id="event01" data-aos="fade-up">
            <div class="passLecBuy">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2772_01.jpg" alt="신청하기" />
                <div class="price price01">                 
                    <input type="radio" id="y_pkg1" name="y_pkg" value="{{ (ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '186166' : '159718') }}" data-sale-price="970000"/> <label for="y_pkg1">윌비스 경찰간부 L-PASS</label>
                </div>
            </div>
            <div class="check">
                <input type="checkbox" id="is_chk1" name="is_chk" value="Y"/>
                <label for="is_chk1">페이지 하단 윌비스 경찰 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                <a href="#info">이용안내확인하기 ↓</a>
                <p>
                    ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신이 불가합니다.<br>
                    ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.
                </p>
            </div>
            <div class="totalPrice NSK-Black">
                <a href="javascript:void(0);" onclick="goCartNDirectPay('event01', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');">경찰간부 L-PASS 신청하기 ></a>
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2772_02.jpg" alt="곧 공개" />
            {{--
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/d6TpPnR5crM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            --}}
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2772_03.jpg" alt="개편포인트" />
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2772_04.jpg" alt="교수진" />
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2772_05.jpg" alt="합격포인트" />
        </div>

        <div class="evtCtnsBox evt06" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2772_06.jpg" alt="자동지급" />
        </div>

        <div class="evtCtnsBox evt07" id="event02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2772_07.jpg" alt="할인쿠폰받기및 이미지다운" />
                <a href="javascript:void(0);" onclick="giveCheck(); return false;" title="할인쿠폰받기" style="position: absolute;left: 24.53%;top: 48.91%;width: 51.22%;height: 6.16%;z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지다운" style="position: absolute;left: 57.23%;top: 69.91%;width: 29.22%;height: 5.36%;z-index: 2;"></a>
            </div>
        </div>

        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox evtInfo NGR" id="info" data-aos="fade-up">
            <div class="guide_box" >
                <h2 class="NSK-Black" >윌비스경찰간부 L-PASS 이용안내</h2>
                <dl>
                    <dt>윌비스경찰간부 L-PASS</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 2023년 10월 31일 까지만 들을수 있는 기간제 간부 PASS 입니다.</li>
                            <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                                - 2024년 대비 형사법, 경찰학, 헌법 , 범죄학, 민법총칙, 행정학  강좌<br>
                                * 형사법(형소법) : 서영교 교수님<br>
                                * 형사법(형법) : 문형석 교수님<br>
                                * 경찰학개론: 장정훈 교수님<br>
                                * 헌법 : 선동주 교수님 / 이국령 교수님<br>
                                * 범죄학 : 김한기 교수님<br>
                                * 민법총칙 : 고태환 교수님<br>
                                * 행정학 : 이동호 교수님<br>
                                * G-TELP : 제니 교수님<br>
                                * 한능검 : 오태진 교수님
                                </li>
                            <li>선택한 윌비스 경찰간부 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                            <li>윌비스경찰간부 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>
                    <dt>교재 및 포인트</dt>
                    <dd><ol><li>윌비스 경찰간부 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li></ol></dd>
                    <dt>최종합격시 환급</dt>
                    <dd>
                        <ol>
                            <li>환급 시 상품 결제 금액에서 지급된 혜택만큼 차감 후 환급됩니다. (제세공과금 22% 제외)<br>
                                ※ 지급된 혜택(포인트 등)을 사용하지 않았어도 지급된 만큼 차감 후 환급금 책정
                            </li>
                            <li>수강기간 내 경찰간부시험 최종합격 및 인증자료를 제출하여야 환급금 지급 대상이 됩니다.<br>
                                ※ 환급 가능 직렬 : 경찰간부 전용
                            </li>
                            <li>환급 신청은 합격한 시험의 최종합격자 발표일로부터 1개월 이내에만 가능합니다.(오직 73기 경찰간부시험)</li>
                            <li>환급 신청 기간 내에 최종 합격 인증 자료 및 신청 서류 제출이 완료된 회원에게 환급 가능합니다.<br>
                                - 제출 서류 (모든 제출 서류는 반드시 윌비스  경찰 아이디 수강생 본인 명의이여야 합니다.)<br>
                                ① 응시표 사본 : 응시번호 기재 필수, 응시원서/응시접수증/응시표출력 전체화면 등 대체 가능<br>
                                ② 최종 합격증명서 : 최종 합격 확인 증명 가능한 관련 사이트 전체 화면 캡쳐본 등 대체 가능<br>
                                ③ 신분증 사본 : 제세공과금 세무 증빙을 위해 주민등록번호 앞/뒷자리 전체가 보여야 함<br>
                                ④ 통장사본 : 수강료 환급 받을 수강생 본인 명의 통장<br>
                                ⑤ 합격수기 : 공지 글 내 첨부된 파일을 다운 후 양식에 맞추어 작성 후 첨부 (한글 또는 워드 파일)<br>
                                ⑥ 개인정보 수집 및 활용 동의서 : 공지 글 내 첨부된 파일을 프린트하여 자필 서명 후 사진 또는 스캔하여 이미지 첨부
                            </li>
                            <li>최종합격자 발표일로부터 1개월경과 후 요청 시에는 환급이 불가합니다.</li>
                            <li>자세한 환급신청 방법은 추후 공지사항에서 확인 바랍니다.</li>
                        </ol>
                    </dd>
                    <dt>환불</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 윌비스 경찰PASS 결제가 기준으로 계산하여
                                사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>포인트를 사용하였을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.<br>(포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                        </ol>
                    </dd>
                    <dt>간부 PASS 수강</dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>윌비스 경찰간부 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>윌비스 경찰간부 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (윌비스 경찰PASS PMP강의는 제공하지 않습니다.)
                            </li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가 필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다.<br>
                                 ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)
                            </li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>
                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.<br>
                                (단,이벤트시 쿠폰사용가능)
                            </li>    
                            <li>윌비스 경찰간부PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다.<br>
                                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.
                            </li>    
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                            <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.<br><br>                      
                                <strong>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</strong>
                            </li>
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>
    </div>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    <!-- End evtContainer -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script type="text/javascript">
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