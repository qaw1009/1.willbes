@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:#2d2d2d url(https://static.willbes.net/public/images/promotion/2022/02/2527_top_bg.jpg) no-repeat center top;}

        .wb_02 {background:url(https://static.willbes.net/public/images/promotion/2022/02/2527_02_bg.jpg) no-repeat center top;}

        .wb_04 {background:#fff;position:relative;}
        .youtube {width:625px; margin:0 auto}
        .youtube iframe {width:625px; height:350px}

        .wb_05 {background:#124475;}
        .wb_05 .attend { width:640px; margin:30px auto; display: flex; justify-content: space-between; flex-wrap: wrap;}
        .wb_05 .attend span {background:url(https://static.willbes.net/public/images/promotion/2022/02/2527_ch.png) no-repeat center top; width:128px; height:139px;
        font-size:20px; padding-top:13px; font-family: Impact,  "Noto Sans KR Regular", Haettenschweiler, 'Arial Narrow Bold', sans-serif; color:#4f4f4f; margin-bottom:3px}
        .wb_05 .attend span.end {background-image:url(https://static.willbes.net/public/images/promotion/2022/02/2527_ch_off.png);}

        /*유의사항*/
        .evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:14px}
        .evtInfoBox { width:1120px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:30px}
        .evtInfoBox .infoTit {font-size:17px;margin-bottom:10px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {list-style:disc; margin-left:20px}
       
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2527_top.jpg" alt="검찰직 형법/형소법"/><br>
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2527_01.jpg"  alt="선착순 50명 한정"/>  
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2527_02.jpg"  alt="특강 공개"/>
                <a href="https://pass.willbes.net/lecture/index/cate/3148/pattern/free" target="_blank" title="특강 바로가기" style="position: absolute;left: 31.63%;top: 68.86%;width: 36.7%;height: 15.93%;z-index: 2;"></a>
            </div>
		</div> 

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2527_03_01.jpg"  alt="선택과목 폐지"/>            
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/5swtZjOQxRU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2527_03_02.jpg"  alt="최신 3개년 판례, 기출"/>
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

            <div class="evtCtnsBox wb_05" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2527_05_01.jpg" alt="증정 이벤트"/>
                <div class="attend {{time() .' '. strtotime($row['ApplyEndDatm'])}}" data-aos="fade-right">
                    @if(empty($arr_base['add_apply_data']) === false)
                        @foreach($arr_base['add_apply_data'] as $key => $row)
                            <span class="{{ (time() >= strtotime($row['ApplyEndDatm']) || $row['PersonLimit'] <= $row['MemberCnt'] ? 'end' : '') }}">{{$row['Name']}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/02/2527_05_02.jpg" alt="증정 이벤트"/>
                    <a href="javascript:void(0);" onclick="fn_add_apply_submit(); return false;" title="신청하기" style="position: absolute; left: 23.48%; top: 6.76%; width: 52.5%; height: 39.86%; z-index: 2;"></a>
                </div>           
            </div>
        </form>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NGEB">이벤트 유의사항</h4>            
                <div class="infoTit"><strong>- 본 이벤트는 ID당 최대 1회 가능합니다.</strong></div>
                <div class="infoTit"><strong>- 당첨자는 [장바구니]에 지급된 상품을 확인하시기 바랍니다.</strong></div> 
                <div class="infoTit"><strong>- [장바구니] 유효기간은 7일이며, [장바구니] 유효기간 이후 재지급은 불가합니다.</strong></div> 
                <div class="infoTit"><strong>- [장바구니]에 지급된 상품은 유효기간(7일)내 배송비 2,500원을 결제 시 수령 가능합니다.</strong></div> 
                <div class="infoTit"><strong>- 회원 정보상의 주소로 배송됨으로 상품 수령 주소를 확인하시기 바랍니다.<br>
                (배송비  결제 시 입력한 주소지로 발송되며, 입력된 배송지가 잘못되어 있으면 배송이 되지 않을 수 있습니다. 이 경우 윌비스에서는 책임을 지지 않습니다.)</strong></div> 
                <div class="infoTit"><strong>- 이벤트 상품발송 후에는 환불이 불가능합니다.(파손 시 교환 가능합니다.)</strong></div>                          
            </div>
        </div>

    </div>

    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>    
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
        $(document).ready(function(){AOS.init();});

        // 무료 당첨
        function fn_add_apply_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/addApplyStore') !!}';

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
                ['마감되었습니다.','내일 12시에 다시 도전해 주세요.']
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