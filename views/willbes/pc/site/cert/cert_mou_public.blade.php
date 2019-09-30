@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .popWrap {width:782px; margin:20px auto; border:1px solid #000; box-shadow:5px 5px 5px rgba(0,0,0,.1)}
        .popWrap * {font-family:'Noto Sans KR', Arial, Sans-serif}

        .popWrap span {vertical-align:auto}

        input[type=text] {padding:2px; width:150px}
        input {margin-right:5px}
        label {vertical-align:middle; margin-right:10px}

        .popCts {padding:0 54px 54px}
        .popCts h4 {margin-bottom:20px}
        .popCts table {width:100%; border-top:2px solid #8f8f8f; border-bottom:1px solid #8f8f8f; margin-bottom:20px}
        .popCts th,
        .popCts td {border-bottom:1px solid #d9d9d9; padding:10px; text-align:center; line-height:1.4}
        .popCts td strong {font-size:13px; color:#000}
        .popCts thead th {background:#f8f8f8; color:#555; font-weight:bold}
        .popCts tbody th {background:#f9f2eb}
        .popCts > ul {margin-bottom:30px}
        .popCts li {line-height:1.8}
        .popCts .file {border-bottom:1px solid #8f8f8f; border-top:2px solid #8f8f8f; padding:20px 40px; background:#f8f8f8; margin-bottom:20px}
        .popCts .file li {padding:4px 0; line-height:1.5}
        .popCts .file > li.li01 {font-size:120%; margin-bottom:10px}
        .popCts .file > li strong {margin-right:10px; display:inline-block}
        .popCts .file .filetype .file-text {width: 300px;}
        .cl01 {color:#ed1c24}

        .popCts .btns {margin-top:40px; text-align:center}
        .popCts .btns a {display:inline-block; height:50px; padding:0 20px; background:#555; font-size:160%; color:#fff; line-height:50px; font-weight:500; border-radius:10px}
        .popCts .btns a:hover {background:#1f326a; color:#fff}
    </style>

    <div class="popWrap NGR">
        <div><img src="https://static.willbes.net/public/images/promotion/2019/06/mou01.jpg" alt="경찰공무원 인증 특별할인" /></div>
        <div class="popCts">
            <h4><img src="https://static.willbes.net/public/images/promotion/2019/05/20190515_cop_mou_t1.png" alt="혜택안내" /></h4>
            <table>
                <col width="50%"/>
                <col width="50%"/>
                <thead>
                <tr>
                    <th>학원</th>
                    <th>온라인</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th><strong>형법,형사소송법 단과강의 50% 할인</strong></th>
                    <th><strong>단과강의 40% 할인 </strong></th>
                </tr>
                </tbody>
            </table>
            <ul>
                <li>※ 할인은 판매가 기준임</li>
                <li>※ 온라인 쿠폰은 관리자 최초 승인 시 자동 발급되며, 내강의실 > 결제정보 > 적립금/쿠폰 에서 확인 가능</li>
                <li>※ 학원 할인 혜택은 현장 방문 시 적용</li>
                <li>※ 온,오프 혜택은 인증 받은 날로부터 1년간 유효, 1인 1회에 한함</li>
                <li class="cl01">※ 온라인 쿠폰 추가 발급: 내강의실 > 나의 상담내역 게시판 문의 또는 1544-5006 전화 문의</li>
                <li class="cl01">※ 온라인 혜택 문의: 1544-5006  | 학원 혜택 문의: 1544-0336 </li>
            </ul>

            <h4><img src="https://static.willbes.net/public/images/promotion/2019/05/20190515_cop_mou_t2.png"  alt="인증파일 등록" /></h4>
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="CertIdx" id="CertIdx" value="{{$cert_idx}}">
                <input type="hidden" name="CertTypeCcd" id="CertTypeCcd" value="{{$data['CertTypeCcd']}}">
                <div class="file">
                    <ul>
                        <li>
                            <input type="hidden" name="WorkType" value="경찰공무원">
                            <label for="Affiliation">소속</label> <input type="text" id="Affiliation" name="Affiliation" class="iptNm" maxlength="30" >
                            <label for="Affiliation">직위/직급</label> <input type="text" id="Position" name="Position" class="iptNm" maxlength="30" >
                        </li>
                        <li>
                            <ul class="attach">
                                <li><input type="file" class="input-file" size="3" id="attachfile" name="attachfile" ></li>
                                <li>• 인증파일 2MB까지 업로드 가능하며, 이미지파일 (jpg, png, gif 등) 또는 PDF파일 형태로 첨부</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <ul>
                    <li>＊ 재직증명서, 경찰 공무원 신분증 뒷면 등</li>
                    <li>＊ 인증 신청 후 24시간 이내에 승인 처리</li>
                    <li>＊ 인증시간: 오후 4시 이전 요청 시, 당일 승인 | 오후 4시 이후 요청 시 익일 승인</li>
                    <li>＊ 단, 주말 및 공휴일 인증 요청건의 경우, 휴일 다음날 22시 이전에 일괄 처리</li>
                    <li>＊ 관리자 승인 시, SMS로 개별 알림</li>
                    <li class="cl01">＊ 상기 인증 내용이 다를 경우, 구매한 상품은 취소 및 환불 처리 됩니다.</li>
                </ul>
                <div class="btns">
                    <a href="#none" id="btn_cert_check" >인증완료</a>
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

                if ($('#Affiliation').val() == '') {
                    alert('소속을 입력해 주십시오.');
                    $('#Affiliation').focus();
                    return;
                }

                if ($('#Position').val() == '') {
                    alert('직위/직급을 입력해 주십시오.');
                    $('#Position').focus();
                    return;
                }

                if ($('#attachfile').val() == '') {
                    alert('첨부파일을 등록해 주십시오.');
                    return;
                }

                var _url = '{!! front_url('CertApply/store/') !!}';
                if (!confirm('저장하시겠습니까?')) { return true; }
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert('인증 신청이 등록되었습니다.');
                        self.close();
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop