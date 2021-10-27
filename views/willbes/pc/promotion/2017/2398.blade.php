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
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative; background:#f2f2f2}
        /************************************************************/

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/10/2398_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/10/2398_01_bg.jpg) repeat-y center top; padding-bottom:100px}
        .evt01 .wrap .choice {position:absolute; top:461px; width:1000px; left:65px; z-index: 2; display:flex; flex-wrap: wrap;}
        .evt01 .wrap .choice label {width:190px; height:88px; text-align:left; cursor: pointer; margin-right:10px; margin-bottom:35px; display:block; align-self: auto;}
        .evt01 .wrap .choice input {width:20px; height:20px; margin:8px 0 0 20px;}
        .evt01 .wrap .btn01 {display:block; position:absolute; top:842px; width:40%; left:50%; margin-left:-20%; padding:15px 0; font-size:24px; text-align:center; background:#333; color:#fff; border-radius:30px}
        .evt01 .wrap .btn01:hover {background:#3c8340;}
        .evt01 .wrap p {position:absolute; top:905px; width:100%; font-size:14px; text-align:center; z-index: 2;}
        .evt01 .wrap01 h4 {font-size:30px; color:#000; text-align:left; margin:50px 0 20px; padding-left:20px}

        .onLecFree {width:1120px; margin:0 auto; background:#fff; padding-bottom:50px;}
        .onLecFreeBox {padding:0 30px 50px; font-size:14px; text-align:left; padding-top:50px}
        .onLecFreeBox h4 {font-size:64px; font-weight:bold; margin-bottom:50px; text-align:center; color:#1c3d1f}
        .onLecFreeBox h5 {font-size:24px; color:#1c3d1f; text-align:left; padding-bottom:10px; border-bottom:2px solid #1c3d1f; margin:50px 0 20px}
        .onLecFreeBox input[type=checkbox] {width:20px; height:20px; vertical-align:middle}
        .onLecFree-txt01 {text-align:left; line-height:1.3; }
        .onLecFree-txt01 ul {border:1px solid #e4e4e4; padding:20px; height:150px; overflow-y:auto; margin-bottom:10px; background:#fff}
        .onLecFreeInfo li,
        .onLecFree-txt01 li {margin-bottom:10px; list-style-type:decimal; margin-left:20px; text-align:left; font-size:14px}

        .onLecFreeBox .tabs li {display:inline; float:left; width:9.090909%}
        .onLecFreeBox .tabs li a {display:block; border:1px solid #6ca76f; background:#6ca76f; color:#fff; font-size:14px; height:40px; line-height:40px; text-align:center; margin-right:1px}
        .onLecFreeBox .tabs li a:hover,
        .onLecFreeBox .tabs li a.active {border-bottom:1px solid #fff; color:#6ca76f; background:#fff}
        .onLecFreeBox .tabs:after {content:''; display:block; clear:both}

        .onLecFreeBox .evtMenu .infotxt {font-size:14px; margin:30px 10px 10px; height:30px; line-height:30px;}
        .onLecFreeBox .evtMenu .infotxt a {float:right; display:inline-block; background:#1a8ccc; color:#fff;  padding:0 30px}
        .onLecFreeBox .evtMenu .infotxt:after {content:''; display:block; clear:both}
        .onLecFreeBox .evtMenu .choiceLec {border-top:1px solid #000; border-bottom:1px solid #000; padding:10px; line-height:1.4; font-size:12px; height:90px; overflow-y:scroll; background:#fff}
        .onLecFreeBox .evtMenu .choiceLec div {margin-bottom:8px}
        .onLecFreeBox .evtMenu .choiceLec span:nth-child(1) {display:inline-block; width:80px; color:#1a8ccc}
        .onLecFreeBox .evtMenu .choiceLec span:nth-child(2) {display:inline-block; width:80px;}

        .onLecFreeBox .tabCts {padding-top:180px;}
        .onLecFreeBox #tab01 {padding-top:20px;}
        .onLecFreeBox .lecTable .w-info dt:last-child {margin-left:-51%;}


        .evt_table{margin-bottom:30px;}
        .evt_table table{width:100%; border:1px solid #c1c1c1}
        .evt_table table tr{border-bottom:1px solid #c1c1c1}
        .evt_table table tbody th{background:#e4e4e4; color:#333; font-size:16px; font-weight:300; border-bottom:1px solid #c1c1c1; padding:10px; text-align:center}
        .evt_table table tbody td{font-size:14px; color:#000; font-weight:300; text-align:left; padding:10px}
        .evt_table table tbody td:last-of-type{border-right:0}
        .evt_table table tbody td.num{color:#999; font-weight:200}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:middle;}

        .willbes-Layer-Box{left:50% !important; margin-left:-490px; border:2px solid #000 !important;}        

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px;}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

        .fixed {position:fixed !important; width:1061px; background:#fff !important; z-index:100 !important;}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/10/2398_top.jpg" alt="퀵 서머리 한정판매"/>
        </div>

        <div class="evtCtnsBox evt01">
            <div class="wrap">
                <form name="regi_form_register" id="regi_form_register">
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
                    <input type="hidden" name="register_type" value="promotion"/>
                    <input type="hidden" name="register_name" value="{{sess_data('mem_name')}}"/>
                    <input type="hidden" name="register_tel" value="{{sess_data('mem_phone')}}"/>
                    <div class="choice">
                        @foreach($arr_base['register_list'] as $key => $val)
                            <label><input type="checkbox" class="{{ ($key == 0 ? '교육학' : '전공') }}" name="register_chk[]" id="chk_register_{{$key}}" value="{{$val['ErIdx']}}"/></label>
                        @endforeach
                    </div>
                    <a href="javascript:void(0);" onclick="javascript:fn_register_submit(); return false;" class="btn01">쿠폰 신청하기</a>
                    <p>* 쿠폰은 교육학을 포함한 최대 3과목(교육학1과목+전공2과목)까지 가능합니다.</p>
                    <img src="https://static.willbes.net/public/images/promotion/2021/10/2398_01_01.jpg" alt="가입혜택1 할인쿠폰 지급"/>
                </form>

                <div class="wrap01">
                    <h4 class="NSK-Black">할인 쿠폰 적용 가능한 강좌 신청하기</h4>
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                    @endif     
                </div>   
                
                {{-- 인강무료체험신청 --}}
                <div id="authgive_box"></div>
            </div>

            
        </div>


        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">신규 회원 가입 이벤트 유의사항</h4>
                <ul>
                    <li>본 이벤트를 통하여 부여되는 수강 할인권 및 인강체험의 과목은 회원가입 시, 작성해 주신 과목명과 동일해야 합니다.</li>
                    <li>본 이벤트의 강의 할인쿠폰 및 인강체험 신청은 교육학을 포함한 최대 3과목(교육학1과목+전공2과목)까지 가능합니다.</li>
                    <li>본 이벤트의 인강체험기간은 2주입니다. (2주 분량의 강의를 2주간 체험할 수 있습니다.)</li>
                    <li>본 이벤트의 강의 할인쿠폰 및 인강 체험권은 유아임용과정은 진행되지 않습니다.</li>
                    <li>본 이벤트의 인강체험에 필요한 교재는 별도로 구매하셔야 합니다.</li>
                    <li>본 이벤트를 통하여 부여된 할인쿠폰 및 인강체험권은 양도 및 매매가 불가능하며, 위반시 처벌 받을 수 있습니다.</li>
                    <li>본 이벤트 참여를 위하여 기존 회원이 탈퇴 후 재 가입하는 경우, 대상에서 제외합니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function (){
            var url = "{{ front_url("/authGive/index/cate/3134/code/{$arr_promotion_params['ag_idx']}/promo/{$arr_base['promotion_code']}") }}";
            var data = '';
            sendAjax(url,
                data,
                function(d){
                    $("#authgive_box").html(d).end();
                },
                function(ret, status){
                    //alert('진행중인 인강 무료체험 강좌가 없습니다. 관리자에게 문의해주세요.');
                    //location.href = '{{ front_url('/') }}';
                }, false, 'GET', 'html');
        });

        function fn_register_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';
            var subject_count = 0;
            var subject_name = '';
            var chk_length = $regi_form_register.find('input[name="register_chk[]"]:checked').length;
            if (chk_length < 1) {
                alert('쿠폰을 선택해 주세요.');
                return;
            }
            if(chk_length > 3){
                alert('쿠폰을 3개까지 선택해 주세요.');
                return;
            }
            if(chk_length == 2){
                $regi_form_register.find("input[name^='register_chk']:checked").each(function(k,v) {
                    subject_name = $(this).attr("class");
                    if(subject_name == '교육학'){
                        subject_count++;
                    }
                });

                if(subject_count > 1){
                    alert('쿠폰은 교육학1개, 전공2개 총 3개까지 선택 가능합니다.');
                    return;
                }
            }
            if(chk_length == 3){
                $regi_form_register.find("input[name^='register_chk']:checked").each(function(k,v) {
                    subject_name = $(this).attr("class");
                    if(subject_name == '교육학'){
                        subject_count++;
                    }
                });

                if(subject_count != 1){
                    alert('쿠폰은 교육학1개, 전공2개 총 3개까지 선택 가능합니다.');
                    return;
                }
            }
            if (!confirm('신청하시겠습니까?')) { return; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        {{-- 강좌지급 인증 ajax 로 호출 시 사용--}}
        function fn_login_check() {
            {!! sess_data('is_login') !== true ?  login_check_inner_script('로그인 후 이용하여 주십시오.','Y') : 'return true;' !!}
        }
    </script>
@stop