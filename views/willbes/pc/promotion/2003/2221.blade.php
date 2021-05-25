@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            position:relative
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
 
        .wb_top {background:#e5effb url(https://static.willbes.net/public/images/promotion/2021/05/2221_top_bg.jpg) no-repeat center top; padding-bottom:100px}
        .wb_top .bigBtn {display:block; font-size:24px; color:#fff; background:#1f2059; width:700px; margin:20px auto 30px; padding:20px 0; border-radius:40px}
        .wb_top .sBtn {display:block; font-size:16px; color:#fff; background:#222; width:200px; margin:0 auto; padding:10px 0;}

        /* 이용안내 */
        .wb_info {padding:100px 0; background:#233448; color:#fff}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box li {margin-bottom:3px; list-style:decimal; margin-left:20px;}

    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2221_top.jpg" alt="환승 이벤트" />
            <a href="javascript:certOpen();" class="bigBtn NSK-Black">환승 인증하기 →</a>
            <a href="#careful" class="sBtn">유의사항 확인하기 →</a>            
        </div>

        <div class="evtCtnsBox wb_info" id="careful">
            <div class="guide_box">
                <h2 class="NSK-Black">환승 인증 이벤트 유의사항</h2>
                <ol>
                    <li>본 이벤트는 1아이디당 1회만 참여 가능합니다.</li>
                    <li>인증 완료 처리는 신청 후, 24시간 이내에 처리됩니다. 단, 주말 및 공휴일 인증 건의 경우 평일 오전 중으로 처리됩니다.</li>
                    <li>환승 인증<br>
                        - 본인의 이름, 수강내역, 결제내역 등이 명확하게 기재된 수강증 등의 캡쳐를 통해서만 인증이 가능합니다.<br>
                        (결제내역을 통한 인증 시, 수강자 이름과 결제 금액, 강좌명이 필수로 기재되어 있어야 합니다.)<br>
                        본 이벤트는 이벤트 참여자가 본인의 명의로 구매/응시한 내용에 한합니다.<br>
                        등록 인증 정보는 이벤트 목적 외 용도로 사용되지 않습니다.<br>
                        발급된 쿠폰의 사용 기간은 3일로, 본 페이지 내에서 판매 중인 PASS 상품에만 적용 가능합니다.
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script>    
        /* 팝업창 */ 
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop