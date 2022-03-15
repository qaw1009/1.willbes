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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/03/2477_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:#ececec;}

        .evt_02 {background:#fff;position:relative;}
        .youtube {position:absolute; top:743px; left:50%;z-index:1;margin-left:-350px}
        .youtube iframe {width:704px; height:393px}

        .evt_07 {background:#6278de}  
      
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
        </div>
        
        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>    

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2477_top.jpg"  alt="하승민 경찰 지텔프 맞춤형 강의" />
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2477_01.jpg"  alt="선택해야만 하는 이유" />
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2477_02.jpg"  alt="왜 하승민 교수님일까요" />
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/-dJOvbLVy3M?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
        </div>      

        <div class="evtCtnsBox evt_07" id="evt07" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2477_07.jpg"  alt="강의 교재" /> 
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/189562" target="_blank" title="96000원" style="position: absolute; left: 63.75%; top: 38.87%; width: 23.75%; height: 20.82%; z-index: 2;"></a>
                <a href="https://police.willbes.net/book/index/cate/3001?cate_code=3001" target="_blank" title="17010원" style="position: absolute; left: 63.75%; top: 61.8%; width: 23.75%; height: 20.82%; z-index: 2;"></a>
            </div>            
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
			<div class="evtInfoBox">
                <h4 class="NSK-Black">윌비스 신광은 경찰 <span>지텔프</span> 강의 안내.</h4>
                <div class="infoTit NSK-Black">상품구성 (43점+목표 / 30일)</div>
				<ul>
                    <li>경찰맞춤 지텔프 단기완성 강의 (문법+독해+실전모의고사 구성)</li> 
                    <li>지텔프 강좌는 결제 완료 후 수강이 즉시 시작됩니다.(수강일 설정 불가)</li> 
                    <li>교재는 별도 구매입니다.</li>                         
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
                    <li>본 상품은 쿠폰할인/다다익선할인/적립급 사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
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