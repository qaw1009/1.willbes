@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="LecWriteTable">
            <div>수강생정보</div>

            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="CertIdx" id="CertIdx" value="{{$cert_idx}}">
                <input type="hidden" name="CertTypeCcd" id=CertTypeCcd" value="{{$data['CertTypeCcd']}}">
                <table cellspacing="0" cellpadding="0" class="listTable upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                    <tbody>

                    <tr>
                        <td class="w-radio tx-left">
                            <div>인증파일등록</div>
                            <ul>
                                <li><input type="radio" id="WorkType1" name="WorkType" class="goods_chk" value="경찰공무원" ><label>경찰공무원</label></li>
                                <li><input type="radio" id="WorkType2" name="WorkType" class="goods_chk" value="의무경찰" ><label>의무경찰</label></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="tx-left">
                            <label>소속</label> <input type="text" id="Affiliation" name="Affiliation" class="iptNm" maxlength="30" >
                            <label>직위/직급</label> <input type="text" id="Position" name="Position" class="iptRank" maxlength="30" >
                        </td>
                    </tr>
                    <tr>
                        <td class="w-file answer tx-left pl-zero">
                            인증파일업로드
                            <ul class="attach">
                                <li>
                                    <div class="filetype">
                                        <input type="text" class="file-text" />
                                        <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                        <span class="file-select"><input type="file" class="input-file" size="3" id="attachfile" name="attachfile" ></span>
                                        <input class="file-reset NSK" type="button" value="X" />
                                    </div>
                                </li>
                                <li>• 2MB까지 업로드 가능하며, 이미지파일 (jpg,png등) 또는 PDF파일 형태로 첨부</li>
                            </ul>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="search-Btn mt20 h36 p_re">
                    <button type="submit"  name="btn_cert_check" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                        <span>인증완료</span>
                    </button>
                </div>
            </form>
            <!-- willbes-Layer-Box -->
        </div>

    </div>
    <!-- willbes-Lec-buyBtn-sm -->
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {

            $('button[name="btn_cert_check"]').on('click', function() {
                //alert("a");
                @if($data["IsCertAble"] !== 'Y')
                    alert("인증 신청을 할 수 없습니다.");return;
                @endif

                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                @if($data['ApprovalStatus'] == 'A' )
                    alert("신청하신 내역이 존재하며 '미승인' 상태입니다. ");return;
                @elseif($data['ApprovalStatus'] == 'Y' )
                    alert("이미 '승인'된 인증입니다.");return;
                @endif

                if ($('input:radio[name="WorkType"]').is(':checked') === false) {
                    alert('재직구분을 선택해 주세요.');
                    return;
                }

                if ($('#Affiliation').val() == '') {
                    alert('소속을 입력해 주세요.');
                    $('#Affiliation').focus();
                    return;
                }

                if ($('#Position').val() == '') {
                    alert('직위/직급을 입력해 주세요.');
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
                        //notifyAlert('success', '알림', ret.ret_msg);
                        alert('인증 신청이 등록되었습니다.');location.reload();
                    }
                }, showValidateError, null, false, 'alert');

            });

        });
    </script>
@stop
