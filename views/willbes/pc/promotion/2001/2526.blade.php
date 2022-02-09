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
        .skyBanner {position:fixed; width:120px; top:200px; right:10px; z-index:10;}
        .skyBanner a {display:block; margin-bottom:10px}

        .evt00 {background:#0a0a0a}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/02/2526_top_bg.jpg) no-repeat center top;}
        .evt_01 {background:#20364a;}
        .evt_02 {background:#f8f8f8;}

        .evt_03 {padding-bottom:100px;}
        .evt_03 .check {font-size:16px; text-align:center; line-height:1.5;font-weight:bold;}
        .evt_03 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
        .evt_03 .check a {display:inline-block; padding:5px 20px; color:#fff; background:#000; margin-left:20px; border-radius:20px}
        .evt_03 .check a:hover {color:#333; background:#f2b63f;}
        .evt_03 .info {margin:20px auto 50px; padding:10px;line-height:1.4; font-size:14px; font-weight:bold;}


        .evt_04 {background:#363636}     


        .evt_06 {background:#ececec; padding:150px 0}  
        .evt_06_box {width:1000px; margin:auto; border:8px double #333; border-radius:30px; background:#fff; padding:50px; font-size:14px; line-height:1.3; color:#666; position:relative; text-align:left }
        .evt_06_box h4 { position:absolute; font-size:34px; margin-bottom:30px; color:#fff; width:40%; left:50%; margin-left:-20%; top:-38px; background:#000; border-radius:40px; padding:10px 0; text-align:center; z-index: 2;}
        .evt_06_box .infoA {display:flex; justify-content: space-between; align-items: stretch; margin:30px auto 50px; }
        .evt_06_box .infoA li {border:1px solid #c4c4c4; flex-basis: 25%; padding:40px 20px 20px; position:relative; margin:0 10px; text-align:center}
        .evt_06_box .step {position:absolute; height:30px; line-height:30px; width:100%; top:0; left:0; background:#c4c4c4; color:#fff; z-index: 2; }
        .evt_06_box .sTilte {font-size:16px; font-weight:bold; margin-bottom:10px}
        .evt_06_box > div {font-size:18px; color:#000; margin:0 20px 10px}
        .evt_06_box .infoB {margin:0 20px}
        .evt_06_box .infoB li {margin-left:20px; list-style:disc; margin-bottom:5px}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:30px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px}
		.evtInfoBox ul {margin-bottom:40px}
        .evtInfoBox ul li {list-style-type: disc; margin-left:20px; margin-bottom:5px; font-size:14px; }

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skyBanner">
            <a href="javascript:void(0);" onclick="certOpen();"><img src="https://static.willbes.net/public/images/promotion/2022/02/2526_sky01.jpg" alt="이벤트 하나"/></a>
            <a href="#evt03"><img src="https://static.willbes.net/public/images/promotion/2022/02/2526_sky02.jpg" alt="이벤트 둘"/></a>
            <a href="#evt04"><img src="https://static.willbes.net/public/images/promotion/2022/02/2526_sky03.jpg" alt="이벤트 둘"/></a>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2526_top.jpg"  alt="해양경찰 등불쌤 승진패스" />
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2526_01.jpg"  alt="베스트 교수진" />
        </div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2526_02.jpg"  alt="해양경찰 승진시험대비" />      
        </div>

        <div class="evtCtnsBox evt_03" id="evt03">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2526_03.jpg"  alt="12개월 패스" />
                <a href="javascript:void(0);" onclick="go_PassLecture(3007, 191220);" title="형소법,형법,해사법규" style="position: absolute; left: 8.84%; top: 84.69%; width: 27.23%; height: 9.67%; z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="go_PassLecture(3007, 191230);" title="형법,해사법규" style="position: absolute; left: 36.34%; top: 84.69%; width: 27.23%; height: 9.67%; z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="go_PassLecture(3007, 191232);" title="형소법법,해사법규" style="position: absolute; left: 63.75%; top: 84.69%; width: 27.23%; height: 9.67%; z-index: 2;"></a>
            </div>
            <div class="check">
                <label><input name="ischk" type="checkbox" value="Y" />페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#careful">이용안내 확인하기 ↓</a>               
            </div>
            <div class="info">
                ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br>
                ※ 해양경찰 현직인증은 필수입니다.(오직 해양경찰 현직 전용PASS)<br>
                ※ 한정 상품으로 할인쿠폰이 사용불가한 상품입니다.(이벤트 쿠폰재외)
            </div>       
        </div>

        <div class="evtCtnsBox evt_04" id="evt04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2526_04.jpg"  alt="20% 할인쿠폰" />
                <a href="javascript:void(0);" onclick="giveCheck();" title="할인쿠폰 받기" style="position: absolute; left: 37.59%; top: 75%; width: 24.38%; height: 8.2%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt_05" id="evt05">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2526_05.jpg"  alt="소문내기 이벤트" />
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="다운로드" style="position: absolute; left: 27.5%; top: 58.42%; width: 47.59%; height: 13.27%; z-index: 2;"></a>
            </div>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
        @endif 

        <div class="evtCtnsBox evt_06" id="evt05">
            <div class="evt_06_box">
                <h4>인증방법 안내</h4>
                <ul class="infoA">
                    <li>
                        <div class="step">STEP 01</div>
                        <div class="sTilte">해양경찰공무원<br> 인증하기</div>
                        로그인 후<br>인증하기 버튼 클릭
                    </li>
                    <li>
                        <div class="step">STEP 02</div>
                        <div class="sTilte">신분증 활영 후<br> 이미지 첨부</div>
                        경찰공무원 신분을<br> 확인 할 수 있는<br> 이미지 (이름, 직급 필수)
                    </li>
                    <li>
                        <div class="step">STEP 03</div>
                        <div class="sTilte">관리자<br> 인증</div>
                        관리자 인증 완료 시<br> 수강생 휴대폰으로<br> SMS 개별알림
                    </li>
                    <li>
                        <div class="step">STEP 04</div>
                        <div class="sTilte">해양승진 회원 전용<br> PASS 구매</div>
                        수강 인증회원을 위한<br> 기획상품 구매
                    </li>
                </ul>
                <div>주의사항</div>
                <ul class="infoB">
                    <li>아이디(ID)당 1회만 참여 가능합니다.</li>
                    <li>인증완료 처리는 신청 후 24시간 이내에 처리됩니다.</li>
                    <li>인증시간 : 오후 4시 오전 요청 시, 당일 인증 완료 / 오후 4시 이후 요청 시 익일 인증완료
                        단, 주말 및 공휴일 인증건의 경우, 휴일 다음날 22시 이전에 일괄 처리됩니다.
                    </li>
                    <li>정확하게 본인의 이름, 직급을 캡처하여 업로드 해주셔야 인증이 완료됩니다.</li>
                    <li>본 상품은 인증에 참여한 당사자가 결제한 상품에 한합니다.</li>
                    <li>확인이 어려운 증빙서류를 첨부하거나, 부정한 방법으로 참여했을 경우, 별도 통보없이 즉시 제공된 혜택 회수 및 환불조치 됩니다.</li>
                    <li>본 혜택은 강좌에 한하여, 교재는 별도로 구매하셔야 됩니다.</li>
                    <li>등록 인증 정보는 다른 용도로 사용되지 않습니다.</li>
                </ul>
            </div>       
        </div>

        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">윌비스 X 등불쌤 해양경찰 승진 PASS 이용안내</h4>
				<div class="infoTit NSK-Black">상품안내</div>
				<ul>
                    <li>해경승진PASS는 현직경찰 인증이 완료 된 후 관련 PASS 수강신청이 가능합니다. 상품 구매전 상단 현직경찰 인증하기를 진행해주세요.</li>
				</ul>

                <div class="infoTit NSK-Black">상품구성</div>
				<ul>
                    <li>본 상품은 2023년 해경승진시험대비로 2과목,3과목 PASS로 진행합니다.</li>
                    <li>수강기간은 상품에 표시된 기간에 따라 구매일로부터 2023년 1월 31일까지 강의가 제공되며 결제가 완료되는 즉시 수강 가능합니다.</li>
                    <li>일부강좌는 경찰채용(일반공채)강좌와 동일한 강좌로 구성될 수있습니다.</li>
                    <li>해경승진PASS는 강의 변경 불가 상품입니다.</li>
                    <li>승진PASS강의포함된 형법,형소법강의는  신광은교수님 강의로 준비되어 집니다.</li>
                    <li>승진PASS강의포함된 해사법규 강의는 21년 12월 , 22년 7월(예정) 강의만 포함되어집니다.</li>
				</ul>

                <div class="infoTit NSK-Black">수강관련</div>
				<ul>
                    <li>먼저 내 강의실 메뉴에서 프리패스존로 접속합니다.</li>
                    <li>구매하신 경찰승진PASS 상품명 옆의 [강좌 선택하기] 버튼을 클릭, 원하시는 강좌를 선택 등록 후 수강하실 수 있습니다.</li>
                    <li>경찰승진PASS 이용 중에는 일시정지 기능을 이용할 수 없습니다.</li>
                    <li>경찰승진PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                    PC+Mobile 경찰승진PASS 수강 시 : PC 2대 또는 PC 1대 + 모바일 1대 또는 모바일2대 (PMP 경찰승진PASS는 제공하지 않습니다.)</li>
                    <li>PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</li>
				</ul>

                <div class="infoTit NSK-Black">교재구매</div>
				<ul>
                    <li>해양경찰승진PASS는 교재를 별도로 구매하셔야 하며, .각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도 구매 가능합니다.</li>
				</ul>

                <div class="infoTit NSK-Black">환불안내</div>
				<ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
				</ul>

                <div class="infoTit NSK-Black">유의사항</div>
				<ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.(이벤트 쿠폰제외)</li>
                    <li>해양경찰승진PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
				</ul>
                <div class="infoTit NSK-Black">※ 이용문의 : 고객센터 1544-5006</div>
			</div>
		</div>       


    </div>
    <!-- End Container -->

    <script type="text/javascript">
        function go_PassLecture(cate, code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var _url = '{{ site_url('/periodPackage/show/cate/')}}' + cate + '/pack/648001/prod-code/' + code;
            location.href = _url;
        }

        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(strtotime(date('YmdHi')) >= strtotime($arr_promotion_params['edate'] . ' ' . $arr_promotion_params['etime']))
                alert('이벤트가 종료되었습니다.');
                return;
            @endif

            @if(empty($cert_apply) === false)
                alert("이미 인증이 완료된 상태입니다.");
                return;
            @endif

            @if(empty($arr_promotion_params["page"]) === false && empty($arr_promotion_params["cert"]) === false)
                var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
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
    </script>

@stop