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
        .skyBanner {position:fixed; top:200px; right:10px; z-index:10;}
        .skyBanner a {display:block; margin-bottom:10px}

        .evt00 {background:#0a0a0a}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/12/2477_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:#ececec;}


        .evt_03 {background:#6278de;}

        .evt_04 {background:#f4f4f4;}

        .evt_06 {background:#ececec}      
        .evt_07 {background:#6278de}  

        .evtCtnsBox input[type=text] {height:40px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle; width:40%; font-size:16px}
        .evtCtnsBox input[type=checkbox] {width:20px; height:20px} 
        .evtCtnsBox .btnRequest {width:600px; margin:0 auto}
        .evtCtnsBox .btnRequest a {display:block; border-radius:50px; padding:20px; text-align:center; color:#fff; background:#000; font-size:30px}
        .evtCtnsBox .btnRequest a:hover {background:#ffff00; color:#11153a}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:30px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {list-style:decimal;  margin-left:20px; margin-bottom:10px; font-size:14px}
        .evtInfoBox span {color:#fb9bc0}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skyBanner" id="QuickMenu">
            <a href="#evt07"><img src="https://static.willbes.net/public/images/promotion/2021/12/2477_sky01.jpg" alt="이벤트"/></a>
            <a href="#evt04"><img src="https://static.willbes.net/public/images/promotion/2021/12/2477_sky02.jpg" alt="이벤트 하나"/></a>
            <a href="#evt05"><img src="https://static.willbes.net/public/images/promotion/2021/12/2477_sky03.jpg" alt="이벤트 둘"/></a>
            <a href="#evt06"><img src="https://static.willbes.net/public/images/promotion/2021/12/2477_sky04.jpg" alt="이벤트 셋"/></a>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>    

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2477_top.jpg"  alt="하승민 경찰 지텔프 맞춤형 강의" />
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2477_01.jpg"  alt="선택해야만 하는 이유" />
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2477_02.jpg"  alt="왜 하승민 교수님일까요" /> 
        </div>

        <div class="evtCtnsBox evt_03" id="evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2477_03.jpg"  alt="이벤트 한눈에 보기 " />
        </div>

        <div class="evtCtnsBox evt_04" id="evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2477_04.jpg"  alt="강의결제 이벤트" />
        </div>

        <div class="evtCtnsBox evt_05" id="evt05" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2477_05.jpg"  alt="소문내기 이벤트" /> 
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운받기" style="position: absolute; left: 26.34%; top: 88.97%; width: 49.02%; height: 3.88%; z-index: 2;"></a>
            </div>            
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
        @endif 

        <div class="evtCtnsBox evt_06" id="evt06" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2477_06.jpg"  alt="수강생 이벤트" />
        </div>

        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif

        <div class="evtCtnsBox evt_07" id="evt07" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2477_07.jpg"  alt="강의 교재" /> 
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/189562" target="_blank" title="96000원" style="position: absolute; left: 63.75%; top: 38.87%; width: 23.75%; height: 20.82%; z-index: 2;"></a>
                <a href="https://police.willbes.net/book/index/cate/3001?cate_code=3001" target="_blank" title="17010원" style="position: absolute; left: 63.75%; top: 61.8%; width: 23.75%; height: 20.82%; z-index: 2;"></a>
            </div>            
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
			<div class="evtInfoBox">
                <h4 class="NSK-Black">윌비스 신광은 경찰 <span>지텔프</span> 강의 안내.</h4>
                <div class="infoTit NSK-Black">상품구성 (43점+목표 / 60일)</div>
				<ul>
                    <li>경찰맞춤 지텔프 단기완성 강의 (문법+독해+실전모의고사 구성)</li> 
                    <li>지텔프 강좌는 결제 완료 후 수강이 즉시 시작됩니다.(수강일 설정 불가)</li> 
                    <li>교재는 별도 구매입니다.</li>                         
				</ul>
				
                <div class="infoTit NSK-Black">이벤트1. 강의결제 이벤트</div>
				<ul>
                    <li>인강기간 30일 연장은 전체 제공이며, 강의를 결제하면 매일 18시 30일이 자동 연장됩니다.</li>
                    <li>첫 지텔프 응시할 경우 50% 할인쿠폰 (첫 응시자만)<br/>
                    - 본인이 지텔프 첫 응시일 경우 myksh@willbes.com메일로 "이름/아이디/지텔프 응시 할인쿠폰 요청합니다."를 보내주시면 결제 확인 후, 쿠폰번호(유효기간 포함)를 문자로 발송드립니다.<br/>
                    - 할인쿠폰은 지텔프 처음 응시 + 정기시험에만 적용됩니다. (수시, 스피킹, 라이팅 시험은 할인 적용불가)<br/>
                    - 추가접수 기간에도 추가요금 없이 사용이 가능하며 환불은 지텔프 시행사 환불 규정을 따으며, 환불 시 쿠폰번호는 사용이 불가합니다. <br/>
                    - 본 쿠폰을 사용할라면 지텔프 시험접 수 신규회원이어야 하며, 아이디당 1회에 한하여 사용이 가능합니다.  (다른 할인쿠폰 중복 불가)<br/>                    
                    - 본 할인쿠폰은 비매품이며 타인에게 양도나 판매, 현금거래를 금하며 적발될 시 사용 취소 처리가 될 수 있습니다.<br/>
                    <br/>
                    [사용방법]<br/>
                    - G-TELP 시험접수 사이트 → 신규회원 가입 → 정기시험 접수 → 할인쿠폰 사용하여 원서접수 </li>
                    <li>간식 자판기 (10명)<br/>
                    - 추첨을 통해 당첨자는 개별 문자를 드리며, 주소 확인 후 간식자판기를 집으로 배송 드립니다.</li>
				</ul>

                <div class="infoTit NSK-Black">이벤트2. 소문내기 이벤트</div>
				<ul>
                    <li>BHC 치킨 쿠폰 (5명)<br>
                    - 소문을 많이 내주신 분을 추첨하여 당첨자는 개별 문자를 드리며, 번호 확인 후 기프트콘을 발송 드립니다.</li>
                    <li>커피쿠폰 추첨 (20명)<br>
                    - 소문을 많이 내주신 분을 추첨하여 당첨자는 개별 문자를 드리며, 번호 확인 후 기프트콘을 발송 드립니다.</li>
                    <li>지텔프 강의 50% 할인쿠폰 (전체)<br>
                    - 소문내기 참여자 전체에게 지텔프 강의 50% 할인쿠폰을 본인 ID로 지급해 드립니다.</li>
				</ul>

                <div class="infoTit NSK-Black">이벤트3. 재시생 할인혜택</div>
				<ul>
                    <li>"할인권 신청합니다."를 남겨주신 수강생은 수강내역 확인 후 지텔프 강의 50% 할인쿠폰 ID로 지급해 드립니다.</li>
				</ul>

                <div class="infoTit NSK-Black">환불 안내</div>
				<ul>
                    <li>결제 후 7일 이내 강좌의 OT 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 부분 환불은 수강 시작일(당일포함)로부터 7일이 경과되면, 지텔프 정가 기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.</li>
                    <li>환불에 대한 정확한 금액은 고객센터에 문의하여야 정확히 안내 받으실 수 있습니다.</li>
				</ul>

                <div class="infoTit NSK-Black">유의사항</div>
				<ul>
                    <li>본 상품은 이벤트기획 상품으로 쿠폰할인/다다익선할인/적립급 사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
                    <li>지텔프 강의 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유, 타인양도 등 부정 사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
				</ul>

                <div class="infoTit NSK-Black">※ 이용문의 : 고객센터 1544-5006 / 온라인 1:1 상담 게시판</div>
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

        function loginCheck(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
        }

        // 무료 당첨
        function fn_add_apply_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/addApplyStore') !!}';

            if ($("input:checkbox[name='is_chk']:checked").val() !== 'Y') {
                alert('윌비스 개인정보 제공에 동의하셔야 합니다.');
                return;
            }

            if (typeof $add_apply_form.find('input[name="add_apply_chk[]"]').val() === 'undefined') {
                alert('이벤트 기간이 아닙니다.');
                return;
            }

            if (!confirm('신청하시겠습니까?')) { return true; }
            ajaxSubmit($add_apply_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert( getApplyMsg(ret.ret_msg) );
                    location.reload();
                }
            }, function(ret, status, error_view) {
                alert( getApplyMsg(ret.ret_msg || '') );
            }, null, false, 'alert');
        }

        // 이벤트 추가 신청 메세지
        function getApplyMsg(ret_msg) {
            {{-- 해당 프로모션 종속 결과 메세지 --}}
            var apply_msg = '';
            var arr_apply_msg = [
                ['이미 신청하셨습니다.','이미 참여하셨습니다.'],
                ['신청 되었습니다.','당첨을 축하합니다. 장바구니를 확인해 주세요.'],
                //['이벤트 신청후 이용 가능합니다.','봉투모의고사 신청후 이용 가능합니다.'],
                ['마감되었습니다.','내일 20시에 다시 도전해 주세요.']
            ];
            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }
    </script>

@stop