@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /*.evtCtnsBox .wrap a:hover {background-color:rgba(0,0,0,0.2)}*/

        /************************************************************/

        .sky {position:fixed; width:130px; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .evt00 {background:#0a0a0a}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/04/2598_top_bg.jpg) no-repeat center top;position:relative;}
        .evt_top .ani{position:absolute;left:50%;top:75px;margin-left:-375px}

        .evt_01 {background:#fff;padding-bottom:100px;}
        .evtTab {width:890px; margin:0 auto}
        .evtTab li {display:inline; float:left; width:50%}
        .evtTab li a {display:block; color:#898989; font-size:24px; padding:20px 0; border:5px solid #898989; border-bottom-color:#000; font-weight:bold}       
        .evtTab li:first-child a {border-right:0}
        .evtTab li:last-child a {border-left:0}
        .evtTab li a:hover,
        .evtTab li a.active {color:#000; border:5px solid #000; border-bottom-color:#fff}
        .evtTab:after {content:''; display:block; clear:both}

        .evt_02 {background:#131719;}
        
        .evt_apply {background:#f5f5f7;}
        .evt_apply .wrap {width:1120px; margin:0 auto}
        .evt_apply .passLecBuy {display:flex; justify-content:space-around; position:absolute; bottom:100px; width:1000px; color:#464646}
        .evt_apply .passLecBuy div {width:50%; line-height:30px; font-size:22px; font-weight:bold; text-align:left; padding-left:125px} 
        .evt_apply .radio_check {width:18px;height:18px;}

        .evt_apply .check {width:800px; margin:50px auto 0; padding:20px; font-size:17px; color:#000; letter-spacing:-1px;font-weight:bold;}
        .evt_apply .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .evt_apply .check p {font-size:14px; padding:10px 0 0 20px; line-height:1.4}
        .evt_apply .check input:checked + label {border-bottom:1px dashed #533fd1; color:#533fd1}

        .evt_apply .totalPrice {width:375px; margin:0 auto;padding:50px 0;}
        .evt_apply .totalPrice a {display:block; font-size:35px; color:#fff; padding:20px; background:#000; border-radius:50px;}
        .evt_apply .totalPrice a:hover {background:#533fd1}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:17px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.75}
		.evtInfoBox h4 {font-size:40px; margin-bottom:30px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px;color:#FDF300;}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {margin-bottom:10px; font-size:14px}
        
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2022/04/2598_sky01.png" alt="신청하기"/></a>
            <a href="#open_event"><img src="https://static.willbes.net/public/images/promotion/2022/04/2598_sky02.png" alt="바로가기"/></a>
        </div>

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2598_top.jpg"  alt="해양경찰간부" />
            <div class="ani">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2598_top_info.png" alt="문구" data-aos="zoom-in">
            </div>
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2598_01.jpg"  alt="개편 포인트" />
            <ul class="evtTab">
                <li><a href="#tab01">1.필기시험 과목</a></li>
                <li><a href="#tab02">2.변경된 과목 범위</a></li>
            </ul>
            <div id="tab01"><img src="https://static.willbes.net/public/images/promotion/2022/04/2598_01_01.jpg"  alt="필기시험 과목" /></div>
            <div id="tab02"><img src="https://static.willbes.net/public/images/promotion/2022/04/2598_01_02.jpg"  alt="변경된 과목 범위" /></div>
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2598_02.jpg"  alt="교수진" />
        </div>

        <div class="evtCtnsBox evt_apply" data-aos="fade-up" id="apply">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2598_apply.jpg"  alt="신청하기" />
                <div class="passLecBuy NSK-Black"> 
                    <div>                       
                        <input type="radio" id="y_pkg0" name="y_pkg" value="193836" class="radio_check"/>                
                        <label for="y_pkg0">해양경찰간부 L-PASS(일반)</label>
                    </div> 
                    <div>                          
                        <input type="radio" id="y_pkg1" name="y_pkg" value="193837" class="radio_check"/> 
                        <label for="y_pkg1">해양경찰간부 L-PASS(해양)</label>
                    </div>                    
                </div>
            </div>
            <div class="check" data-aos="fade-up">
                <input type="checkbox" id="is_chk1" name="is_chk" value="Y"/>
                <label for="is_chk1">페이지 하단 해양경찰간부 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                <a href="#info">이용안내확인하기 ↓</a>
                <p>
                    ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신이 불가합니다.<br>
                    ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br>                  
                </p>
            </div>
            <div class="totalPrice NSK-Black" data-aos="fade-up">
                <a href="javascript:void(0);" onclick="termsCheck('is_chk1', 'pass');">L- PASS 신청하기 ></a>
            </div>            
        </div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up" id="open_event">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2598_03.jpg"  alt="할인쿠폰 받기" />
                <a href="javascript:void(0);" onclick="giveCheck(); return false;" title="쿠폰받기" style="position: absolute; left: 29.59%; top: 87.6%; width: 41.34%; height: 7.53%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2598_04.jpg"  alt="이미지 다운" />
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운 받기" style="position: absolute; left: 56.59%; top: 23.6%; width: 30.34%; height: 14.53%; z-index: 2;"></a>
            </div>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox evt_05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2598_05.jpg"  alt="교재 배송비 무료쿠폰 2장" />
        </div>       

        <div class="evtCtnsBox evtInfo" id="info" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">[윌비스 X 등불쌤] 해양경찰 간부 L-PASS 이용안내</h4>
				<div class="infoTit NSK-Black">▶ 해양경찰 간부 L-PASS</div>
				<ul>               
                    <li>1. 본 상품은 구매일로부터 1년간 들을 수 있는 기간제 해경간부 PASS입니다.</li>
                    <li>2. 본 상품 강좌 구성은 다음과 같습니다.<br>
                        1 )해경 간부(일반) : 해양경찰학개론, 형법, 형소법, 범죄학, 행정학, 헌법<br>
                        2) 해경 간부(해양) : 해양경찰학개론, 형법, 형소법, 해사법규, 항해학, 기관학<br><br>
                        - 형법, 형소법 : 신광은 교수님<br>
                        - 헌법: 김원욱, 이국령 교수님<br>
                        - 해양경찰학개론, 해사법규, 항해학, 기관학 : 등불쌤<br>
                        - 범죄학 : 박상민 교수님<br>
                        - 행정학 : 이동호 교수님<br>
                        - G-TELP : 김준기 교수님<br>
                        - 한능검 : 오태진 교수님                
                    </li>
                    <li>3. 선택한 해양경찰 간부 L-PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                    <li>4. 해양경찰 간부 L-PASS 강좌는 결제 완료 시 수강이 시작됩니다. (결제완료자에 한함)</li>
                    <li>5. 강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
				</ul>

                <div class="infoTit NSK-Black">▶ 교재 및 포인트</div>
                <ul>
                    <li>1. 해양경찰 간부 L-PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                </ul>             

                <div class="infoTit NSK-Black">▶ 환불</div>
				<ul>
                    <li>1. 결제 후 7일 이내 3강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>2. 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>3. 강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>4. 고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로 부터 7일이 경과되면, 해양경찰 간부 L-PASS 결제가 기준으로 계산하여 사용일 수만큼 차감 후 환불됩니다.<br>(단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                    <li>5. 포인트를 사용하였을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다. (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
				</ul>
                            
			</div>
		</div> 

    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script type="text/javascript">
        var $regi_form = $('#regi_form'); 


         /* 탭 */
         $(document).ready(function(){
            $('.evtTab').each(function(){
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

       /*쿠폰발급 */
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

        /*약관동의*/
        function termsCheck(terms_id,ele_id){
            if($("#" + terms_id).is(":checked") === false){
                $("#" + terms_id).focus();
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }
            var _url = '{{ site_url('/periodPackage/show/cate/')}}' + cate + '/pack/648001/prod-code/' + code;
            location.href = _url;
        }
       
        /*무료 교재지급*/
        function fn_promotion_etc_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var order_cnt = {{ $arr_base['order_count'] or 0 }};
            if(order_cnt === 0){
                alert('구매자가 아닙니다.');
                return;
            }

            @if(empty($arr_promotion_params['arr_prod_code']) === false && empty($arr_promotion_params['cart_prod_code']) === false)
                var $add_apply_form = $('#add_apply_form');
                var _url = '{!! front_url('/event/promotionEtcStore') !!}';

                if (!confirm('장바구니에 담으시겠습니까?')) { return true; }
                ajaxSubmit($add_apply_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert( getApplyMsg(ret.ret_msg) );
                        location.href = '{!! front_url('/cart/index?tab=book') !!}';
                    }
                }, function(ret, status, error_view) {
                    alert( getApplyMsg(ret.ret_msg) );
                }, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        /* 이벤트 추가 신청 메세지*/
        function getApplyMsg(ret_msg) {
            {{-- 해당 프로모션 종속 결과 메세지 --}}
            var apply_msg = '';
            var arr_apply_msg = [
                ['처리 되었습니다.','장바구니에 담겼습니다.'],
            ];

            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }

    
        function goDesc(tab){
            location.href = '#tab';
            var activeTab = "#"+tab;
            $(".tabs li a").removeClass("active");
            $(".tabs li a[href='#"+tab+"']").addClass("active");
            $(".content_guide_box").hide();
            $(activeTab).show();
        }

    </script>

    
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop