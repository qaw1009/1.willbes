@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
.popWrap {width:782px; margin:20px auto; border:1px solid #000; box-shadow:5px 5px 5px rgba(0,0,0,.1)}
.popWrap * {font-family:'Noto Sans KR', Arial, Sans-serif}

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

<div class="popWrap NGR">
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
        <h3>◎ 혜택 안내</h4>
        <h4>※ 온라인 : 1개월 인강PASS 구매가능</h3>
    </div>    
    <div class="popCts">
        <h3>◎ 이용 안내</h3>
        <h4>※ 할인은 판매가 기준임</h4>
        <h4>※ 작심 독서실 인증회원만 구매가능</h4>
        <h4>※ 내강의실 > 나의 상담내역 게시판 문의 또는 1544-5006 전화 문의</h4>
    </div>    
    <div class="popCts">
        <h3>◎ 인증파일 등록</h3>
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate="">                
            <input type="hidden" name="_csrf_token" value="704b3d6dd0cda8a184bec9866fd219e6">                            
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="CertIdx" id="CertIdx" value="21">
            <input type="hidden" name="CertTypeCcd" id="CertTypeCcd" value="684003">
            <div class="file">
                <ul>
                    <li>
                        <input type="hidden" name="WorkType" value="경찰공무원">
                        <label for="Affiliation">지점</label> <input type="text" id="Affiliation" name="Affiliation" class="iptNm" maxlength="30">
                        <label for="Affiliation">준비 직렬</label> <input type="text" id="Position" name="Position" class="iptNm" maxlength="30">
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
                <li style="font-weight:bold;font-size:15px;">* 본인독시실 수강증 (필수)</li>
                <li>* 재직증명서, 경찰 공무원 신분증 뒷면 등</li>
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

@stop