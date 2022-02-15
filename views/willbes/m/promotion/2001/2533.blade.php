@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->

    <style type="text/css">

        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
        .evtCtnsBox img {width:100%; max-width:720px;}

        .dday {font-size:24px !important; padding:10px; background:#f5f5f5; color:#000; text-align:left; letter-spacing:-1px}
        .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
        .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#000; font-size:14px !important;}

        .evt01 {padding-bottom:50px; text-align:left}
        .evt01 .price {text-align:center; font-size:22px; font-weight:bold; color:#fff; background:#000; border-radius:10px; padding:15px 0; margin:0 11% 5%; letter-spacing:-1px;margin-top:25px;}
        .evt01 .price label {display:inline-block}
        .evt01 .price input:checked + label {color:#ffef7e}
        .evt01 .ext01txt {padding:20px;}
        .evt01 .ext01txt label {font-size:18px; font-weight:bold}
        .evt01 input[type="radio"] {height:18px; width:18px; vertical-align:middle}
        .evt01 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle; margin-right:5px}
        .evt01 .ext01txt input:checked + label {color:#1350b9}
        .evt01 .ext01txt ul {margin:10px 0 0 25px}
        .evt01 a {display:block; width:90%; margin:20px auto 0; background:#000; color:#fff; border-radius:30px; padding:10px 0; font-size:20px; font-weight:bold; text-align:center;}
  

        /* 슬라이드 */
        .slide_con {padding:0 30px 30px;background:#565334}
        .slide_con img {width:100%;max-width:720px;}
        .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
        .slide_con .bx-wrapper .bx-pager {
            width: auto;
            bottom: -10px;
            left:0;
            right:0;
            text-align: center;
            z-index:90;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
            background: #000;
            width: 14px;
            height: 14px;
            margin: 0 3px;
            border-radius:10px;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover,
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
            background: #fff;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
            width: 30px;
        }

        /* 이용안내 */
        .evtInfo {padding:50px 20px; background:#333; color:#fff;}
        .evtInfoBox {text-align:left; line-height:1.2}
        .evtInfoBox h4 {font-size:22px; margin-bottom:20px}
        .evtInfoBox .infoTit {font-size:18px;margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:20px}
        .evtInfoBox ul li {list-style:decimal; margin-left:20px; margin-bottom:10px;}
        .evtInfoBox span {color:#d4c24b}

        @@media only screen and (max-width: 374px)  {
            .dday {font-size:18px !important;}
            .dday a {padding:5px 10px;}      
            .evt01 .ext01txt label {font-size:14px;}
            .evt01 .price {font-size:13px;}    
        }

        @@media only screen and (min-width: 375px) and (max-width: 640px) {
            .evt01 .price {font-size:16px;}   
        }
        
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div id="Container" class="Container NSK c_both">

        <div class="evtCtnsBox dday NSK-Thin" data-aos="fade-down">
            <strong class="NSK-Black">판매 종료까지 <span id="ddayCountText"></span> </strong>
        </div>

        <div class="evtCtnsBox evt00" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">          
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_mtop.jpg" alt="법학경채 패스" >             
        </div>
        
        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_m01.jpg" alt="경찰 법학채란" >
        </div>

        <div class="evtCtnsBox" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_m02.jpg" alt="선택이 아닌 필수" >
            <div class="wrap">    
                <div class="slide_con">
                    <ul id="slidesImg2">
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_m02_s1.png" alt="신광은" />                          
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_m02_s2.png" alt="장정훈" />  
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_m02_s3.png" alt="김동진" />  
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_m02_s4.png" alt="이국령" />  
                        </li>                                    
                    </ul>
                </div>
            </div>    
        </div>

        <div class="evtCtnsBox evt01" id="evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_m03.jpg" alt="지금 신청해야 최저가" >
            <div class="price">
                <input type="radio" id="y_pkg0" name="y_pkg" value="191316" data-sale-price="860000" onClick=""/> <label for="y_pkg0"> 신광은경찰 법학경채 PASS</label>
            </div>
            <div class="ext01txt">
                <input type="checkbox" id="is_chk" name="is_chk" value="Y"/> <label for="is_chk">페이지 하단 신광은경찰 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <ul>
                    <li>※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신이 불가합니다.</li>
                    <li>※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.</li>                          
                </ul>
            </div>
            <div><a href="javascript:void(0);" onclick="goCartNDirectPay('evt01', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');">신청하기 ></a></div>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">        
            <a href="https://police.willbes.net/m/support/qna/index/cate/3001?s_cate_code=3001&s_is_my_contents=1" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/10/2390m_02_02.jpg" alt="재수강 쿠폰받기" ></a>
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/10/2390m_02_03.jpg" alt="환승 쿠폰받기" ></a>
        </div>
        
        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2533_m04.jpg" alt="소문내고 쿠폰받고" >
            <a href="javascript:void(0);" onclick="giveCheck();" title="할인쿠폰받기" style="position: absolute;left: 17.39%;top: 49.25%;width: 65.11%;height: 5.28%;z-index: 2;"></a>
            <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운받기" style="position: absolute;left: 17.39%;top: 71.25%;width: 65.11%;height: 5.28%;z-index: 2;"></a>
            <a href="https://cafe.daum.net/policeacademy" target="_blank" title="경시모" style="position: absolute;left: 2.42%;top: 92.15%;width: 20.39%;height: 5.49%;z-index: 2;"></a>
            <a href="https://cafe.naver.com/polstudy" target="_blank" title="경꿈사" style="position: absolute;left: 25.42%;top: 92.15%;width: 20.39%;height: 5.49%;z-index: 2;"></a>
            <a href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" title="공무원갤러리" style="position: absolute;left: 47.42%;top: 92.15%;width: 22.39%;height: 5.49%;z-index: 2;"></a>
            <a href="https://gall.dcinside.com/board/lists?id=policeofficer" target="_blank" title="순경마이너갤러리" style="position: absolute;left: 71.42%;top: 92.15%;width: 25.39%;height: 5.49%;z-index: 2;"></a>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.m.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">윌비스신광은<span>법학경채 PASS </span>이용안내</h4>
                <div class="infoTit NSK-Black">신광은 법학경채 PASS</div>
                <ul>
                    <li>본 상품은 구매일로부터 2022년 9월 3일 까지만 들을수 있는 기간제 PASS입니다.</li>
                    <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                        - 2022년 대비 형소법, 형법 , 경찰학, 민법총칙, 헌법 강좌<br>
                        *형소법 : 신광은 교수님<br>
                        *형법 : 신광은교수님<br>
                        *경찰학개론: 장정훈 교수님<br>
                        *헌법 :  이국령 교수님<br>
                        *민법총칙 : 김동진 교수님
                    </li>                    
                    <li>선택한 신광은 법학경채PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                    <li>신광은 법학경채 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                    <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>                        
                </ul>

                <div class="infoTit NSK-Black">교재 및 포인트</div>
                <ul>                  
                    <li>신광은 법학경채 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>                        
                </ul>

                <div class="infoTit NSK-Black">환불</div>
                <ul>                  
                    <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여
                        사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)
                    </li>
                    <li>포인트를 사용하였을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다. (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
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

    <link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
    <script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript">
    /*슬라이드*/
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg2").bxSlider({
                auto: true,
                speed: 500,
                pause: 4000,
                mode:'horizontal',
                autoControls: false,
                controls:false,
                pager:true,
            });
        });

   
        var $regi_form = $('#regi_form');

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
        });

        function goCartNDirectPay(ele_id, field_name, cart_type, learn_pattern, is_direct_pay) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form = $('#' + ele_id);
            var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
            var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
            var params;

            if ($is_chk.length > 0) {
                if ($is_chk.is(':checked') === false) {
                    alert('이용안내에 동의하셔야 합니다.');
                    $is_chk.focus();
                    return;
                }
            }

            if ($prod_code.length < 1) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            // 장바구니 저장 기본 파라미터
                params = [
                { 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}' },
                { 'name' : '_method', 'value' : 'POST' },
                { 'name' : 'cart_type', 'value' : cart_type },
                { 'name' : 'learn_pattern', 'value' : learn_pattern },
                { 'name' : 'is_direct_pay', 'value' : is_direct_pay }
            ];

            // 선택된 상품코드 파라미터
            $prod_code.each(function() {
                params.push({ 'name' : 'prod_code[]', 'value' : $(this).val() + ':613001:' + $(this).val() });
            });

            //장바구니 저장 URL로 전송
            formCreateSubmit('{{ front_url('/cart/store') }}', params, 'POST');
        }

        // 쿠폰발급
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

        // 팝업창
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params["page"]) === false && empty($arr_promotion_params["cert"]) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @else
            alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        // 무료 교재지급
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

        // 이벤트 추가 신청 메세지
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


        /*tab*/
        $(document).ready(function(){
            $(".tabs li a").click(function(){
                var activeTab = $(this).attr("href");
                $(".tabs li a").removeClass("active");
                $(this).addClass("active");
                $(".content_guide_box").hide();
                $(activeTab).fadeIn();
                return false;
            });

            var url = window.location.href;
            if(url.indexOf("tab3") > -1){
                var activeTab = "#tab3";
                $(".tabsl li a").removeClass("active");
                $(".tabs li a[href='#tab03']").addClass("active");
                $(".tabContents").hide();
                $(activeTab).show();
                return false;
            }else{
                $(".tabs li a").removeClass("active");
                $(".tabs li a[href='#tab01']").addClass("active");
                $(".content_guide_box").hide();
                $(".content_guide_box:first").show();
            }
        });        

     
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->

@stop