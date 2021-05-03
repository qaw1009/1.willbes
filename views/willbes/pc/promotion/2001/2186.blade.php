@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        /************************************************************/
        .evt00 {background:#0a0a0a}

        .sky {position:fixed; top:200px;right:10px; width:120px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2186_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#7502bc}
        .evt02 {background:#fff}        
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2186_03_bg.jpg) no-repeat center top;}
        .evt04 {background:#ffeeef}
        .evt05 {background:#efe6ff}
        .evt06 {background:#dfffe9} 
        
        .evt07 {background:#eaf3ff} 
        .evt08 {background:#fffde5} 
        .evt09 {background:#f6f6f6}

        .evt10 .entry {width:757px; margin:0 auto;}
        .evt10 .entry input[type=text] {height:60px; border:5px solid #000; padding:0 10px; width:200px; font-size:16px; font-weight:bold; float:left; margin-right:7px; display:inline}
        .evt10 .entry input[type=text]:nth-child(2) {width:550px; margin:0}
        .evt10 .entry input[type=text]:focus {border:5px solid #7902d2 !important; outline:none}
        .evt10 .entry .tx-left:after {content:''; display:block; clear:both}
        .evt10 .entry .entryTxt {border:1px solid #ccc; padding:20px; text-align:left; margin-top:20px; line-height:1.4;}
        .evt10 .entry input[type=checkbox] {width:20px; height:20px} 
        .evt10 .entryCheck {margin-top:10px; font-size:14px; text-align:left}
        .evt10 .btnRequest {width:600px; margin:40px auto}
        .evt10 .btnRequest a {display:block; border-radius:50px; padding:20px; text-align:center; color:#fff; background:#000; font-size:30px}
        .evt10 .btnRequest a:hover {background:#7502bc; color:#fff}

        .evtCtnsBox .link {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .link a:hover {background-color:rgba(0,0,0,0.2)}          

        .evtEnd {position:absolute; left:50%; width:1001px; margin-left:-501px; top:96px; z-index: 5;}

        .evtInfo {padding:100px 0; background:#d3d3d3; color:#333; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:35px; margin-bottom:40px}
		.evtInfoBox .infoTit {font-size:20px;margin-bottom:15px; color:#000}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type:decimal; margin-left:20px; margin-bottom:5px}
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="#entry"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_sky01.jpg" alt="릴레이 이벤트" >
            </a>
            <a href="#evtlink"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_sky02.jpg" alt="소문내기 이벤트" >
            </a>            
        </div> 

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg" alt="경찰학원부분 1위"/>
        </div>              

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_top.jpg" alt="5월 릴레이 이벤트"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_01.jpg"  alt="선물 받아가자"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_02.jpg"  alt="5월 이벤트 일정"/>
        </div>

        <div id="entry" class="p_re">
            @php $num = 3; $end_date = ''; @endphp
            @foreach($arr_base['register_list'] as $row)

                @if(time() < strtotime(min($arr_base['register_date_list']['register_start_date'])))
                    {{-- coming soon --}}
                    <div class="evtCtnsBox evt03" >
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_03.jpg"  alt="준비중"/>
                    </div>
                    @break;
                @elseif(time() > strtotime(max($arr_base['register_date_list']['register_end_date'])))
                    {{-- 전체 이벤트 종료 --}}
                    <div class="evtCtnsBox evt08">
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_08.jpg"  alt="힘내봄날"/>
                    </div>
                    <div class="evtEnd"><img src="https://static.willbes.net/public/images/promotion/2021/04/2186_end.png" alt="마감"/></div>
                    @break;
                @endif

                @php $num++; @endphp
                @if(time() >= strtotime($row['RegisterStartDatm']) && time() < strtotime($row['RegisterEndDatm']))
                    @php $el_idx = $row['ErIdx']; @endphp
                    <div class="evtCtnsBox evt0{{ $num }}">
                        @if($num === 6)
                            <div class="link">
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_0{{ $num }}.jpg" alt="{{ $row['Name'] }}"/>
                                <a href="https://police.willbes.net/promotion/index/cate/3001/code/2172" target="_blank" title="이벤트 바로가기" style="position: absolute; left: 78.3%; top: 82.13%; width: 12.41%; height: 5.6%; z-index: 2;"></a>
                            </div>
                        @else
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_0{{ $num }}.jpg"  alt="{{ $row['Name'] }}"/>
                        @endif
                    </div>
                    @break;
                @endif

                @if(empty($end_date) === false)
                    @if(time() > strtotime($end_date) && time() < strtotime($row['RegisterStartDatm']))
                        @php $num--; @endphp
                        <div class="evtCtnsBox evt0{{ $num }}">
                            @if($num === 6)
                                <div class="link">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_0{{ $num }}.jpg" alt="{{ $row['Name'] }}"/>
                                    <a href="https://police.willbes.net/promotion/index/cate/3001/code/2172" target="_blank" title="이벤트 바로가기" style="position: absolute; left: 78.3%; top: 82.13%; width: 12.41%; height: 5.6%; z-index: 2;"></a>
                                </div>
                            @else
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_0{{ $num }}.jpg"  alt="{{ $row['Name'] }}"/>
                            @endif
                        </div>
                        <div class="evtEnd"><img src="https://static.willbes.net/public/images/promotion/2021/04/2186_end.png" alt="마감"/></div>
                        @break;
                    @endif
                @endif

                @if(time() > strtotime($row['RegisterEndDatm']))
                    @php $end_date = $row['RegisterEndDatm']; @endphp
                @endif

            @endforeach
        </div>

        <div class="evtCtnsBox evt09">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_09.jpg" alt="여러분 감사합니다."/>
        </div>

        <div class="evtCtnsBox evt10">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_10_01.jpg" alt="달력"/>
            <div class="entry">
                <form name="regi_form_register" id="regi_form_register">
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}" readonly/>
                    <input type="hidden" name="register_type" value="promotion" readonly/>
        {{--                    <input type="hidden" name="time_check" value="Y" readonly/> --}}{{-- 이벤트 날짜 체크 여부 --}}
                    <input type="hidden" name="register_chk[]" value="{{ $el_idx or '' }}">

                    <div class="tx-left">
                        <input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" onclick="loginCheck();" placeholder="홍길동" readonly>
                        <input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" onclick="loginCheck();" placeholder="연락처'-'없이 숫자만 입력" maxlength="11">
                    </div>
                    <div class="entryTxt">
                        ▶ 개인정보 수집 및 이용에 대한 안내<br>
                        개인정보 수집 이용 목적이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대<br>
                        - 이벤트 참여에 따른 강의 수강자 목록에 활용<br>
                        <br>
                        개인정보 수집 항목<br>
                        - 신청인의 이름,연락처<br>
                        <br>
                        개인정보 이용기간 및 보유기간<br>
                        - 본 수집, 활용목적 달성 후 바로 파기<br>
                        <br>
                        개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                        - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나,
                        위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                    </diV>
                    <div class="entryCheck"><input name="is_chk" type="checkbox" value="Y" id="is_chk" onclick="loginCheck();"/> <label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label></div>
                    <div class="btnRequest NSK-Black"><a href="javascript:void(0);" onclick="fn_register_submit();">이벤트 응모하기 ></a></div>
                </form>
            </div>
            <div class="link" id="evtlink">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2186_10_02.jpg" alt="소문내기 이벤트"/>
                <a href="javascript:void(0);" onclick="giveCheck();" title="할인쿠폰" style="position: absolute; left: 33.48%; top: 52.96%; width: 32.77%; height: 4.26%; z-index: 2;"></a>
                <a  href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이벤트 홍보 이미지 다운" style="position: absolute; left: 24.02%; top: 78.83%; width: 29.91%; height: 3.89%; z-index: 2;"></a>
                <a href="http://cafe.daum.net/policeacademy" title="다음카페" style="position: absolute; left: 26.61%; top: 92.41%; width: 15.45%; height: 5.43%; z-index: 2;"></a>
                <a href="https://cafe.naver.com/polstudy" title="네이버카페" style="position: absolute; left: 45.8%; top: 92.41%; width: 15.45%; height: 5.43%; z-index: 2;"></a>
                <a href="http://cafe.daum.net/policeacademy" title="닥공사" style="position: absolute; left: 66.52%; top: 92.41%; width: 15.45%; height: 5.43%; z-index: 2;"></a>
            </div>
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
            @endif
        </div>

        <div class="evtCtnsBox evtInfo" id="careful">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">윌비스 릴레이 이벤트 이용안내</h4>
                <div class="infoTit"><strong>5월 릴레이 이벤트 유의사항</strong></div>
                <ul>
                    <li>이벤트 대상 : 윌비스신광은경찰 온라인 회원 누구나</li>
                    <li>로그인/회원가입 해야만 이벤트에 참여 가능합니다.</li>
                    <li>회원탈퇴 후 재가입하여 참여하시는 분은 이벤트 당첨에서 제외됩니다.</li>
                    <li>회원정보 오류로 인해 상품 미발송된 경우 재발송 불가하오니, 이벤트 참여 전 정확한 확인 부탁드립니다.</li>
                    <li>이벤트 상품은 추첨을 통해 지급됩니다.</li>
                    <li>한 번 당첨된 상품을 취소하여 다시 참여할 수 없습니다.</li>
                    <li>이벤트 상품지급은 당첨자 발표와 함께 지급됩니다.<br>
                        * 윌린이날, 어버이날 5/17(월)<br>
                        * 스승의날, 응원해널 5/21(금)<br>
                        * 힘내봄날 6/4(금)</li>
                    <li>당첨자 확인은 윌비스신광은경찰 온라인 [공지사항]에서 확인 가능합니다.</li>
                    <li>본 이벤트 [무제한 PASS] 상품은 12개월 / 22년 2차까지 수강기간 연장 가능한 패스 상품입니다.</li>
                    <li>본 이벤트로 당첨된 패스 할인쿠폰은 [무제한 PASS] (12개월/22년 2차까지 수강기간 연장 가능) 상품에만 사용 가능합니다.</li>
                    <li>본 이벤트로 당첨된 패스 상품은 추첨을 통해 선정되며, 패스 상품을 이용하고 있는 수험생은 당첨자에서 제외됩니다.</li>
                    <li>본 이벤트로 당첨된 패스 상품은 연장/휴강/교환/환급/환불 불가 상품입니다.</li>
                    <li>본 이벤트로 당첨된 패스 할인쿠폰은 타 쿠폰과 중복사용 불가능합니다.</li>
                    <li>본 이벤트로 당첨된 패스 할인쿠폰 사용기간은 7일 입니다.</li>
                    <li>본 이벤트는 당사의 사정으로 인하여 당첨자 공지가 지연될 수 있습니다.</li>
                    <li>본 이벤트는 당사의 사정으로 인하여 상품 변경 또는 상품 지급일이 변경될 수 있습니다.</li>
                    <li>유의사항을 읽지 않고 발생한 모든 사항에 대해서 윌비스신광은경찰은 책임지지 않습니다.</li>
                </ul>
                <div class="infoTit"><strong>소문내기 이벤트 유의사항</strong></div>
                <ul>
                    <li>이벤트 대상 윌비스신광은경찰 온라인 회원 누구나</li>
                    <li>해당 이벤트는 로그인 후 참여 가능합니다.</li>
                    <li>동일한 URL은 한 번 참여한 것으로 인정됩니다.</li>
                    <li>동일 게시판에 1일 1게시글 이상 작성 시 1회만 참여 인정됩니다. (참여 카페, 커뮤니티/게시판/날짜를 다르게 한 다중참여는 가능)</li>
                    <li>동일한 게시글은 한 번만 인정됩니다. (최초 작성글)</li>
                    <li>각 커뮤니티의 정책에 의해 게시글이 삭제되어 확인할 수 없는 경우는 인증에 포함되지 않습니다.</li>
                    <li>유의사항을 읽지 않고 발생한 모든 사항에 대해서 윌비스신광은경찰은 책임지지 않습니다.</li>
                </ul>

                <div class="infoTit"><strong>※ 이용문의 : 고객만족센터 1544-5006</strong></div>
            </div>
        </div>
    </div>
<!-- End Container -->

<script>
var $regi_form = $('#regi_form');
var $regi_form_register = $('#regi_form_register');

function fn_register_submit() {
    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

    if (!$regi_form_register.find('input[name="register_chk[]"]').val()) {
        alert('이벤트 기간이 아닙니다.'); return;
    }

    if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
        alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
        return;
    }

    if (!$regi_form_register.find('input[name="register_tel"]').val()) {
        alert('전화번호를 입력해주세요.');
        return;
    }

    var _url = '{!! front_url('/event/registerStore') !!}';
    if (!confirm('신청하시겠습니까?')) { return; }
    ajaxSubmit($regi_form_register, _url, function(ret) {
        if(ret.ret_cd) {
            alert(ret.ret_msg);
            location.reload();
        }
    }, showValidateError, null, false, 'alert');
}

{{--쿠폰발급--}}
function giveCheck() {
    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

    @if(empty($arr_promotion_params) === false)
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

function loginCheck(){
    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
}
</script>
@stop