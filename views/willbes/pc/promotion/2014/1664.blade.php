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
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/06/1664_top_bg.jpg) no-repeat center top}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1664_01_bg.jpg) no-repeat center top}
        .evt01 .review {position:absolute; top:833px; left:50%; margin-left:-298px; width:766px; height:60px; z-index:10; overflow:hidden;}
        .evt01 .review li {position:relative; height:60px; line-height: 60px; font-size:16px;}
        .evt01 .review li p {padding:0 60px 0 20px; width:760px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis; text-align:left}
        .evt01 .review span {position:absolute; top:0; height:60px; line-height: 60px; width:80px; right:0; z-index:11; color:#000}

        .evt02 {background:#1b58ef}
        .evt02 .inputBox {position:absolute; top:942px; left:50%; margin-left:-393px; width:786px; z-index:10}
        .evt02 .inputBox li {display:inline; float:left; width:25%; text-align:center; font-size:18px; color:#fff}
        .evt02 input[type=checkbox],
        .evt02 input[type=radio] {width:20px; height:20px}
        .evt02 label {margin-left:10px}
        .evt02 input[type=text],
        .evt02 input[type=number] {height:56px; line-height:56px; font-size:16px ; width:100%; border:0; border-radius:30px; color:#666; padding-left:20px}
        .evt02 .receive {position:absolute; top:1110px; left:50%; margin-left:-365px; width:730px; z-index:10; font-size:14px; color:#fff; line-height:1.5; text-align:left}
        .evt02 .receive li {margin-bottom:24px}
        .evt02 .receive li:nth-child(2) {display:inline; float:left; width:35%; margin-right:5%}
        .evt02 .receive li:nth-child(3) {display:inline; float:left; width:60%;}
        .evt02 .receive ul:after {content:""; display:block; clear:both}
        .evt02 .receive div {padding-left:50px}
        .evt02 .receive div.info {padding-left:80px}
        .evt02 .receive input:focus {border:5px solid #000 !important}
        .evt02 input:checked + label {border-bottom:1px dashed #fff}

        .evt03 {background:#fff;}

        .evt04 {background:#c2c2c2;}
        .evt04 .evt04Box {width:900px; margin:0 auto; color:#3a3a3a; text-align:left; padding:50px 0; font-size:14px; line-height:1.5}
        .evt04 h3 {font-size:28px; margin-bottom:30px}
        .evt04 div {font-size:16px; margin-bottom:10px}
        .evt04 .evt04Box li {list-style: disc; margin-left:15px}
        .evt04 .evt04Box ul {margin-bottom:30px}

        /*타이머*/
        .newTopDday {background:#f5f5f5; width:100%; padding:20px 0}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; line-height:60px;
            font-weight:600; color:#000; font-size:22px;}
        .newTopDday ul li img {width:40px; height:56px}
        .newTopDday ul li:first-child {padding-right:10px;}
        .newTopDday ul li:last-child {padding-left:50px; font-size:18px; }
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; margin-top:5px; padding:4px 20px; background:#effe01; border:1px solid #777e09; color:#000; 
            text-align:center; border-radius:20px; line-height:1}
        .newTopDday ul li:last-child a:hover {background:#333; color:#fff}
        .newTopDday ul:after {content:""; display:block; clear:both}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx" id="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="target_params[]" value="register_data1"/>
            <input type="hidden" name="target_param_names[]" value="한줄기대평"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="register_chk_no_member" value="Y"/>  {{-- MemIdx 제외하고 등록중복체크 --}}

            <!-- 타이머 -->
            <div class="newTopDday">
                <div id="ddaytime">
                    <ul>
                        <li>사전예약 혜택 마감까지</li>
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
                        <li>남았습니다.</li>
                        <li>
                            파격혜택, 지금 확인하세요!
                            <a href="#evt02" target="_self">신청하기 &gt;</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1664_top.jpg" alt="" >
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1664_01.jpg" alt="" usemap="#Map1644" border="0" >
                <map name="Map1644">
                    <area shape="rect" coords="190,701,349,743" href="/promotion/index/cate/3114/code/1665" target="_blank" alt="이시한">
                    <area shape="rect" coords="435,701,596,744" href="/promotion/index/cate/3114/code/1666" target="_blank" alt="이승기">
                    <area shape="rect" coords="689,700,852,746" href="/promotion/index/cate/3114/code/1668" target="_blank" alt="안혜빈">
                    <area shape="rect" coords="928,700,1086,742" href="/promotion/index/cate/3114/code/1669" target="_blank" alt="이기용">
                </map>

                <div class="review">
                    <ul>
                        <li><p>안혜빈 대표님의 강의가 정말 기대됩니다</p><span>(박민*)</span></li>
                        <li><p>싹PD님~~ 팬이에요 ^^ 멋진 강의 기대하겠습니다~~ </p><span>(황희*)</span></li>
                        <li><p>이기용대표님 영상 보니 너무 멋지십니다. 믿고 따라하면 블로그마켓팅 성공 할 수 있을것 같아요^^</p><span>(김영*)</span></li>
                        <li><p>이시한 교수님!! 다른 강의도 들어서 잘 알고 있는데, 정말 좋아요!! 유튜브 저도 시작해보겠습니다!</p><span>(이정*)</span></li>

                        <li><p>이시한 교수님 실전에 강한 강의인지 기대하면서 꼭 듣고 싶습니다.</p><span>(김철*)</span></li>
                        <li><p>이승기 PD님 벌써부터 기대되네요!!!!</p><span>(한원*)</span></li>
                        <li><p>안혜빈 강사님의 명강의 기대가 됩니다^^ </p><span>(장진*)</span></li>
                        <li><p>이기용 대표님 책 읽어봐서 그런지 강의가 너무 기대됩니다!!  </p><span>(이소*)</span></li>

                        <li><p>이시한 교수님 어떻게 하면 제대로 된 유튜버가 될수있을지 배워보고싶어요.^^</p><span>(전철*)</span></li>
                        <li><p>이승기 PD님 기존 취업, 시험을 위한 강의가 아닌 점이 너무 신선합니다.</p><span>(이자*)</span></li>
                        <li><p>안혜빈 강사님 다른 흔한 인플루언서 책과 비슷한 내용 말고 그 이상의 강의를 기대해 봅니다!^^</p><span>(남궁*)</span></li>
                        <li><p>이기용 대표님 어려운 시국에 창업 한다는게 어려운데 좋은 강의듣고 도전하려니 기대됩니다.</p><span>(정영*)</span></li>

                        <li><p>이시한 교수님 시한책방 구독자입니다~ 이렇게 강의로 만나게 되니 새롭네요~ </p><span>(마문*)</span></li>
                        <li><p>이승기 PD님 저의 부캐는 PD님만 믿겠습니다!! </p><span>(이정*)</span></li>
                        <li><p>안혜빈 강사님 안혜빈 대표님 교육을 듣고 인생이 바뀌었어요! 우리 같이 인생성형 합시다! </p><span>(김하*)</span></li>
                        <li><p>이기용 대표님 블로그강의 너무 기대됩니다~^^ </p><span>(정대*)</span></li>
                    </ul>
                </div>
            </div>

            <div class="evtCtnsBox evt02" id="evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1664_02.jpg" alt="" >
                <ul class="inputBox NSK-Black">
                    @foreach($arr_base['register_list'] as $row)
                        <li>
                            <input type="radio" name="register_chk[]" id="register_chk_{{ $row['ErIdx'] }}" value="{{ $row['ErIdx'] }}"><label for="register_chk_{{ $row['ErIdx'] }}">{{ $row['Name'] }}</label>
                            <input type="hidden" name="register_chk_name[]" value="{{ $row['Name'] }}" data-register-chk="{{ $row['ErIdx'] }}"/>
                        </li>
                    @endforeach
                    {{--
                    <li><input type="radio" id="pr01"><label for="pr01"> 이시한 교수</label></li>
                    <li><input type="radio" id="pr02"><label for="pr02"> 이승기 PD</label></li>
                    <li><input type="radio" id="pr03"><label for="pr03"> 안혜빈 대표</label></li>
                    <li><input type="radio" id="pr04"><label for="pr04"> 이기용 대표</label></li>
                    --}}
                </ul>
                <div class="receive">
                    <ul>
                        <li><input type="text" name="register_data1" placeholder="한줄기대평을 적어주세요." maxlength="200"></li>
                        <li><input type="text" name="register_name" id="register_name" value="{{sess_data('mem_name')}}" placeholder="이름" {{(sess_data('is_login') === true) ? 'readonly="readonly"' : ''}}></li>
                        <li><input type="number" name="register_tel" id="register_tel" value="{{sess_data('mem_phone')}}" placeholder="휴대폰번호(숫자만입력)" maxlength="11" oninput="onlyNumberCheck(this);"></li>
                    </ul>
                    <div class="tx16 mb10"><input type="checkbox" name="is_chk" id="is_chk"><label for="yes">1억뷰 N잡에서 진행하는 사전예약 및 이벤트 관련된 정보수신에 동의합니다.</label></div>
                    <div class="info">
                        <strong>사전예약자 확인과 할인쿠폰 등 발송을 위해 아래의 개인 정보를 수집/이용하고 있습니다. </strong><br>
                        1. 수집 항목: 이름, 연락처(휴대폰 번호) <br>
                        2. 수집 및 이용 목적: 사전예약 이벤트 응모자 관리, 당첨자 쿠폰 배송, 이벤트 관련 문의 응대 및 공지사항 안내<br>
                        3. 보유 및 이용 기간: 이벤트 종료 후 3개월까지<br>
                        ※ 제공받은 개인 정보는 경품 배송 목적으로만 활용되며, 이벤트 종료 후 3개월 이후 모두 폐기됩니다.
                    </div>
                    <div class="mt50 tx-center"><a href="javascript:fn_submit();"><img src="https://static.willbes.net/public/images/promotion/2020/06/1664_btn.png" alt="신청하기"></a></div>
                </div>
            </div>

            <div class="evtCtnsBox evt03" id="evtn03">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1664_03.jpg" alt="" usemap="#Mapsnslink" border="0" >
                <map name="Mapsnslink">
                    <area shape="rect" coords="249,735,335,822" href="https://section.blog.naver.com" target="_blank">
                    <area shape="rect" coords="359,738,440,820" href="https://www.instagram.com/" target="_blank">
                    <area shape="rect" coords="464,737,549,822" href="https://www.facebook.com/" target="_blank">
                    <area shape="rect" coords="573,738,656,823" href="https://story.kakao.com/" target="_blank">
                    <area shape="rect" coords="680,738,767,822" href="https://band.us/" target="_blank">
                    <area shape="rect" coords="789,737,872,821" href="https://twitter.com/" target="_blank">
                </map>
            </div>

            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif

            <div class="evtCtnsBox evt04">
                <div class="evt04Box">
                    <h3 class="NSK-Black">이용안내</h3>
                    <div class="NSK-Black">사전예약 1</div>
                    <ul>
                        <li>사전예약 쿠폰은 7월 1일(수) 발급 예정입니다.(신청자에 한함)</li>
                        <li>할인쿠폰 사용가능일은 발급일로부터 14일입니다.</li>
                        <li>해당 쿠폰은 인플루언서 강좌(이시한교수,이승기PD,안혜빈대표,이기용대표) 수강신청 접수 시 결제 적용됩니다.</li>
                        <li>사전예약 신청자에 한해 할인쿠폰이 발급되며, 결제 완료시 수강기간이 연장됩니다.(총 수강가능기간 365일)</li>
                    </ul>

                    <div class="NSK-Black">사전예약 2</div>
                    <ul>
                        <li>당첨발표시 동일인으로 확인 될 경우 강의 제공은 한 개의 아이디만 당첨으로 인정합니다.</li>
                        <li>당첨자 발표는 7월 6일(월) 공지사항 참고하시면 됩니다.</li>
                    </ul>
                    <div class="NSK-Black">문의안내 1544-5006</div>
                </div>
            </div>
        </form>
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            var collaboslides = $(".review ul").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:750,
                pause:3000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1, 
                moveSlides:1,
            });
        });

        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="register_chk[]"]:checked').length == 0) {
                alert('교수님을 선택해주세요.');
                return;
            }

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            {{-- register_chk_name 필요한것 이외 disabled 처리. (신청리스트명 문자발송 치환을 위한 정보) --}}
            var reg_chk_val = $regi_form_register.find('input[name="register_chk[]"]:checked').val();
            $regi_form_register.find('input[name="register_chk_name[]"]').each(function(i) {
                if($(this).data('register-chk') == reg_chk_val) {
                    $(this).attr('disabled', false);
                } else {
                    $(this).attr('disabled', true);
                }
            });

            if (!confirm('저장하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(getApplyMsg(ret.ret_msg));
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        {{-- 해당 프로모션 종속 결과 메세지 --}}
        function getApplyMsg(ret_msg) {
            var apply_msg = '';
            var arr_apply_msg = [
                ['신청 되었습니다.','사전예약이 완료되었습니다.'],
            ];
            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }

        {{-- 숫자만 유효성 체크 --}}
        function onlyNumberCheck(object){
            object.value = object.value.replace(/[^0-9.]/g, "");
            if (object.value.length > object.maxLength) {
                object.value = object.value.slice(0, object.maxLength);
            }
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop