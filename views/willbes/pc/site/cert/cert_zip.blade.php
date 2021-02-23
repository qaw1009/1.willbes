@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
.popWrap {width:100%; margin:0 auto; }

.popWrap span {vertical-align:auto}
.popWrap .logo {padding-top:10px; position:relative;}

.copyright {position:relative; background:#fee9a3; padding:40px; margin-bottom:30px}
.copyright span {display:block; width:150px; height:150px; border-radius:75px 0 75px 75px; background:#051a2b; text-align:center; color:#fff; 
    font-weight:bold; font-size:24px; padding-top:35px; line-height:1.4;
}
.copyright div {position:absolute; top:50px; left:240px; font-size:18px; line-height:1.5; color:#051a2b; padding-right:40px}
.copyright div h1 {font-size:30px; font-weight:bold;}
.copyright div h2 {font-size:25px; margin-top:30px; color:#000}

input[type=text] {padding:2px; width:150px}
input {margin-right:5px}
label {vertical-align:middle; margin-right:10px;}
input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
select {padding:5px;}
select option:before {height:20px}

.popCts {padding:0 50px 25px; letter-spacing: -1px;}
.popCts h3 {margin-bottom:15px; font-size:20px; font-weight:bold}
.popCts h4 {font-size:15px;margin-bottom:10px;}
.popCts table {width:100%; border-top:2px solid #8f8f8f; border-bottom:1px solid #8f8f8f; margin:20px 0}
.popCts th,
.popCts td {border-bottom:1px solid #d9d9d9; padding:10px; line-height:1.4}
.popCts td strong {font-size:13px; color:#000}
.popCts thead th {background:#f8f8f8; color:#555; font-weight:bold; text-align:center;}
.popCts tbody th {background:#f9f2eb}
.popCts tbody td {text-align:left}
.popCts > ul {margin-bottom:30px}
.popCts > ul:last-child {margin:0}
.popCts li {line-height:1.5;margin-left:15px}
.cl01 {color:#051a2b; font-weight:bold;color:red;font-size:15px;}

.popCts .btns {margin:30px 0 60px; text-align:center}
.popCts .btns a {display:inline-block; height:50px; padding:0 20px; background:#051a2b; font-size:160%; color:#fff; line-height:50px; font-weight:500; border-radius:10px}	
.popCts .btns a:hover {background:#1f326a; color:#fff}

.popCts .file { border-bottom: 1px solid #8f8f8f;border-top: 2px solid #8f8f8f;padding: 20px 40px;background: #f8f8f8;margin-bottom: 20px;}
.popCts .file li {padding:4px 0;line-height:1.5;}
</style>

<div class="popWrap NSK">
    <div class="logo">
        <img src="https://police.stage.willbes.net/public/img/willbes/gnb/logo.gif" alt="윌비스" />
    </div>
    <div class="copyright">
        <span>제휴<br>인증센터</span>
        <div>           
            <h1>윌비스 신광은 경찰 & 집중소 독서실</h1>
            <h2>인증시, 특별할인</h2>
        </div>
    </div>
    <div class="popCts">
        <h3>◎ 혜택 안내</h3>
        <h4>① 온라인 1개월 인강 PASS 구매가능 </h4>
        <h4>② 온라인 단과 강좌 50% 할인쿠폰 발급 </h4>
    </div>    
    <div class="popCts">
        <h3>◎ 이용 안내</h3>
        <h4>※ 할인은 판매가 기준임</h4>
        <h4>※ 집중소 독서실 인증회원만 구매가능</h4>
        <h4>※ 내강의실 > 나의 상담내역 게시판 문의 또는 1544-5006 전화 문의</h4>
    </div>    
    <div class="popCts">
        <h3>◎ 인증파일 등록</h3>
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate="">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="CertIdx" id="CertIdx" value="{{$cert_idx}}">
            <input type="hidden" name="CertTypeCcd" id="CertTypeCcd" value="{{$data['CertTypeCcd']}}">
            <div class="file">
                <ul>
                    <li>
                        <label for="Affiliation">지점</label> <input type="text" id="TakeArea" name="TakeArea" class="iptNm" maxlength="30">
                        <label for="Affiliation">준비 직렬</label> <input type="text" id="TakeKind" name="TakeKind" class="iptNm" maxlength="30"> 예) 일반, 경행, 승진, 해경
                    </li>
                    <li>
                        <ul class="attach">
                            <li><input type="file" class="input-file" size="3" id="attachfile" name="attachfile"></li>
                            <li>인증파일 2MB까지 업로드 가능하며, 이미지파일 (jpg, png, gif 등) 또는 PDF파일 형태로 첨부</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <ul>
                <li style="font-weight:bold;font-size:15px;">* 본인독서실 수강증 (필수)</li>
                <li>* 인증 신청 후 24시간 이내에 승인 처리</li>
                <li>* 인증시간: 오후 4시 이전 요청 시, 당일 승인 | 오후 4시 이후 요청 시 익일 승인</li>
                <li>* 단, 주말 및 공휴일 인증 요청건의 경우, 휴일 다음날 22시 이전에 일괄 처리</li>
                <li>* 관리자 승인 시, SMS로 개별 알림</li>
                <li class="cl01">* 상기 인증 내용이 다를 경우, 구매한 상품은 취소 및 환불 처리 됩니다.</li>
            </ul>
            <div class="btns">
                <a href="#none" id="btn_cert_check">인증완료</a>
            </div>
            </form>
    </div>
    <!--popCts//-->            
</div>

<script src="/public/js/willbes/product_util.js"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_form');

    $(document).ready(function() {

        $("#btn_cert_check").click(function () {

            @if($data["IsCertAble"] !== 'Y')
            alert("인증 신청을 할 수 없습니다.");return;
            @endif

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            @if($data['ApprovalStatus'] == 'A' )
            alert("신청하신 내역이 존재하며 '미승인' 상태입니다. ");return;
            @elseif($data['ApprovalStatus'] == 'Y' )
            alert("이미 '승인'된 인증입니다.");return;
            @endif

            if ($('#TakeArea').val() == '') {
                alert('지점을 입력해 주세요.');
                $('#Affiliation').focus();
                return;
            }
            if ($('#TakeKind').val() == '') {
                alert('준비 직렬을 입력해 주세요.');
                $('#Position').focus();
                return;
            }
            if ($('#attachfile').val() == '') {
                alert('인증파일을 등록해 주세요.');
                return;
            }
            var _url = '{!! front_url('CertApply/store/') !!}';
            if (!confirm('저장하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert('인증 신청이 완료되었습니다.');
                    opener.location.reload();
                    self.close();
                }
            }, showValidateError, null, false, 'alert');

        });
    });

</script>

@stop