@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
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
        .evtCtnsBox .wrap a {border:1px solid #000}

        /************************************************************/
        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2023/02/2915_top_bg.jpg) no-repeat center top;}
        .evt_top .ani{position:absolute; left:50%; top:220px; margin-left:-445px; z-index: 10;}

        .wb_01 {background:url(https://static.willbes.net/public/images/promotion/2023/02/2915_01_bg.jpg) no-repeat center top;}

        .wb_02 {background:#f7f7f7;}
        .wb_03 {background:#5a5a5a; padding-bottom:100px}
        .wb_03 .apply_btn {width:1000px; margin:0 auto; font-size:24px; line-height:1.5;}
        .wb_03 .apply_btn p {font-size:58px; margin-bottom:30px}
        .wb_03 .apply_btn span {color:#484baf}
        .wb_03 .apply_btn div {display:flex; justify-content: center; }
        .wb_03 .apply_btn a {height:100%; width:40%; text-align:center; display:block; font-size:26px; font-weight:bold; color:#fff; background:#898989; margin:0 10px; padding:20px; border-radius:100px}
        .wb_03 .apply_btn a:last-child {background:#000}        
        .wb_03 .apply_btn a:hover {background:#4e15ab}


        /*이용안내*/        
        .wb_ctsInfo {background:#333; padding:100px 0}  
        .wb_ctsInfo div {
            width:980px; margin:0 auto; color:#fff; font-size:16px; line-height:1.5;
            font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
        }
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#fff;} 
        .wb_ctsInfo div dt {font-size:20px; margin-bottom:10px; text-decoration:underline; color:#fff; font-weight:bold;}  
        .wb_ctsInfo div dd {margin-bottom:30px}
        .wb_ctsInfo div dl {
            position: relative;
            padding-left:10px;
            color:#fff;
        }
        .wb_ctsInfo div dl:before{
            background: #fff none repeat scroll 0 0; 
            border-radius: 2px;
            content: '';
            display: block;
            height: 4px;
            left: 0;
            position: absolute;
            top: 8px;
            width: 4px;
        }
        .wb_ctsInfo p {margin-top:40px;font-size:18px;}
        .wb_ctsInfo p span  {border:2px solid #fff; padding:10px 20px}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">      
        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2915_top.jpg" alt="전국모의고사">
            <div class="ani">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/2915_top_img.png" alt="" data-aos="zoom-in">
            </div>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2023/02/2915_01.jpg"  alt="전 경찰채용 출제위원"/>           
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2023/02/2915_02.jpg"  alt="과목개편"/>           
		</div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up" id="evt_01" >            
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2915_03.jpg"  alt="전국모의고사 시간표"/>
            <div class="apply_btn">            
                <div>
                    <a href="https://willbesedu.willbes.net/pass/support/notice/show?board_idx=450790&" target="_blank">온라인 모의고사<br>시험응시방법 안내</a>
                    <a href="https://willbesedu.willbes.net/pass/mockTestNew/apply/cate/" target="_blank">전국모의고사<br>신청하기</a>
                </div>
            </div>          
		</div>
   
        <div class="evtCtnsBox wb_05" data-aos="fade-up" id="evt_02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/2915_04s.jpg"  alt="이벤트" />
                <a href="javascript:void(0)" onclick="giveCheck()" title="할인쿠폰 받기" style="position: absolute;left: 28.91%;top: 44.75%;width: 42.82%;height: 4.35%;z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute; left: 57.14%; top: 61.29%; width: 29.29%; height: 6.26%; z-index: 2;"></a>
                <a href="https://cafe.daum.net/im119/MoDm" title="소사모 다음" target="_blank" style="position: absolute;left: 10.34%;top: 92.09%;width: 15.89%;height: 5.76%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/9kr" title="소사모 네이버" target="_blank" style="position: absolute;left: 26.24%;top: 92.09%;width: 15.89%;height: 5.76%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/gsdccompany" title="소방꿈" target="_blank" style="position: absolute;left: 42.04%;top: 92.09%;width: 15.89%;height: 5.76%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/firepass119" title="소꿈사" target="_blank" style="position: absolute;left: 57.94%;top: 92.09%;width: 15.89%;height: 5.76%;z-index: 2;"></a>
                <a href="https://gall.dcinside.com/mgallery/board/lists/?id=firefighter" title="소방 갤러리" target="_blank" style="position: absolute;left: 73.84%;top: 92.09%;width: 15.89%;height: 5.76%;z-index: 2;"></a>
            </div>
		</div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="wb_ctsInfo" id="ctsInfo" data-aos="fade-up">
            <div>
                <h3 class="NSK-Black">응시자 유의사항</h3>
                <dd>
                    <dt>유의사항</dt>
                    <dl>학원 실강패스 수강생은 응시 지역별 학원 상담실 문의해 주시기 바랍니다. 모든 고사장 주차 불가합니다.</dl> 
                    <dl>시험 응시생이 많아 혼잡이 예상되오니 대중교통을 이용해 주시기 바랍니다. 반드시 본인이 응시할 학원으로 신청 바랍니다.</dl>                   
                </dd>                
                <dd>
                    <dt>고사장 입실</dt>
                    <dl>교시험당일 09:40까지 해당 고사장으로 반드시 입실해야합니다.</dl>
                    <dl>시험 종료 후 시험감독관의 지시가 있을때까지 퇴실할 수 없으며, 모든 답안지는 반드시 제출하여 주십시오.</dl>
                    <dl>본인이 신청한 학원에서만 응시할 수 있습니다.</dl>
                </dd>
                <dd>
                    <dt>신분증 지참</dt>
                    <dl>본인 확인을 위해 응시표(응시 전 발송 된 문자 메시지 확인 가능)와 공공기관이 발행한 
                    신분증(주민등록증, 여권, 운전면허증, 주민등록번호가 포함된 장애인등록증(복지카드 중 하나)을 반드시 소지하여야 합니다.</dl>
                </dd>
                <dd>
                    <dt>기타사항</dt>
                    <dl>모의고사문의 : 1522-6112</dl>
                    <dl>성적공지일 추후공지</dl>
                </dd>
            </div>
        </div>
       
	</div>
    <!-- End Container -->



    <script type="text/javascript">
        $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&arr_give_idx_chk={{$arr_promotion_params['arr_give_idx_chk']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('전국 모의고사 할인쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
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

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop