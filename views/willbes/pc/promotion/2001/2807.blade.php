@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/        

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/10/2807_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#D8D4D5;}

        /*선착순 이벤트*/
        .evt04 {background:#F5F5F5;}
        .evt04 .attend {position:absolute; bottom:475px; left:50%; width:850px; margin-left:-425px; z-index:1; display: flex; justify-content: space-evenly; flex-wrap: wrap;}
        .evt04 .attend span {background:url(https://static.willbes.net/public/images/promotion/2022/10/2807_as.png) no-repeat center top; width:176px; height:176px;
        font-size:18px; padding-top:30px; font-family: Impact,  "Noto Sans KR Regular", Haettenschweiler, 'Arial Narrow Bold', sans-serif; color:#425A94; margin-bottom:10px}
        .evt04 .attend span.end {background-image:url(https://static.willbes.net/public/images/promotion/2022/10/2807_as_off.png); font-size:0;}

        /*이용 안내*/
        .evtInfo {padding:120px 0; background:#333; color:#f0f0f0;}
        .evtInfoBox {width:980px; margin:0 auto; text-align:left; line-height:1.5}
        .evtInfoBox li {list-style:none; margin-left:20px; font-size:17px; margin-bottom:10px;}
        .evtInfoBox strong {color:#64efff}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
        .evtInfoBox ul {margin-bottom:30px}

    </style>

    <div class="evtContent NSK" id="evtContainer">       

        <div class="evtCtnsBox evtTop" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2807_top.jpg" title="합격이 빛나는 밤에">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2807_01.jpg" title="스페셜 이벤트">            
        </div>   

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2807_02.jpg" title="런칭 설명회">
                <a href="#comment" title="사전질문 하러가기" style="position: absolute;left: 15.05%;top: 48.47%;width: 28.11%;height: 5.02%;z-index: 2;"></a>
                <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" title="유튜브 채널 가기" style="position: absolute;left: 44.55%;top: 48.47%;width: 40.61%;height: 5.02%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03 pb100" data-aos="fade-up" id="comment">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2807_03.jpg" title="q&a">
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif 
        </div>

        <form id="add_apply_form" name="add_apply_form">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="apply_chk_el_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="event_register_chk" value="N"/>

            @foreach($arr_base['add_apply_data'] as $row)
                @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                    <input type="hidden" name="add_apply_chk[]" value="{{$row['EaaIdx']}}" />
                    @break;
                @endif
            @endforeach

            <div class="evtCtnsBox evt04" data-aos="fade-up">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2807_04.jpg" alt="무료증정 이벤트"/>
                    <div class="attend {{time() .' '. strtotime($row['ApplyEndDatm'])}}" data-aos="fade-right">
                        @if(empty($arr_base['add_apply_data']) === false)
                            @foreach($arr_base['add_apply_data'] as $key => $row)
                                <span class="{{ (time() >= strtotime($row['ApplyEndDatm']) || $row['PersonLimit'] <= $row['MemberCnt'] ? 'end' : '') }}">{{$row['Name']}}</span>
                            @endforeach
                        @endif
                    </div>
                    <a href="javascript:void(0);" title="신청하기" onclick="fn_add_apply_submit(); return false;" style="position: absolute;left: 21.05%;top: 83.77%;width: 54.11%;height: 5.02%;z-index: 2;"></a>
                </div>
            </div>
        </form>       

        <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black"><strong>유의사항</strong></h4>        
                <ul>                                        
                    <li>* 본교재는 헌법도약 기출문제집 제2판 A/S교재이며 , 정식교재가 아닌 추록교재 입니다.</li>
                    <li>* 본 이벤트는 ID당 최대 1회 가능합니다.</li>
                    <li>* 클릭은 1번만! 선착순이기 때문에 여러 번 누르실 필요가 없습니다.</li>
                    <li>* 당첨자는 [장바구니] > [교재] 에 지급된 상품을 확인하시기 바랍니다.</li>
                    <li>* 장바구니 유효기간은 7일이며, 장바구니 유효기간 이후 재지급은 불가합니다.</li>
                    <li>* 장바구니에 지급된 상품은 유료기간(7일)내 배송비 2,500원 결제 시 수령 가능합니다.</li>
                    <li>* 배송비 결제 완료 하신 분들에 한해 순차적으로 상품이 배송됩니다.</li>
                    <li>* 회원 정보상의 주소로 진행됨으로 상품 수령 주소를 확인하시기 바랍니다.<br>(배송비 결제 시 입력한 주소지로 발송되며, 입력된 배송지가 잘못되어 있으면 배송이 되지 않을수 있습니다. 이 경우 윌비스에서는 책임을 지지 않습니다.)</li>
                    <li>* 이벤트 상품발송 후에는 환불이 불가능합니다.(파손시 교환 가능합니다.)</li>
                    <li>* 본 교재는 비매품으로 이벤트에 제공되고 있습니다.</li>
                </ul>
            </div>                 
        </div>

    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>

    <script type="text/javascript">
        // 무료 당첨
        function fn_add_apply_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/addApplyStore') !!}';

            if (typeof $add_apply_form.find('input[name="add_apply_chk[]"]').val() === 'undefined') {
                alert('이벤트 기간이 아닙니다.'); return;
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
                ['이미 신청하셨습니다.','이미 당첨되셨습니다.'],
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

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop