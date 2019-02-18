@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->

<div class="willbes-Layer-PassBox willbes-Layer-PassBox740 leaveArmyJoin NGR">
    <div class="laj_top">
        <h3>전역(예정)간부 간편회원가입</h3>
        <ul>
            <li>회원가입을 하셔야 전직교육과정 <span>"윌비스 PASS"</span>의 신청이 가능합니다.</li>
            <li>기존 가입된 회원의 경우 군복무정보 및 인증파일 등록만 해 주시면 됩니다. <br/>
                * <span><strong>[가입여부 확인]</strong></span> 버튼을 통해 가입여부를 확인해 주세요.
            </li>
            <li>전직교육과정별 신청 사이트가 상이 하오니, 이 점 유의해 주시기 바랍니다.<br/>
                ※ 하단 및 상품 신청 페이지의 <span><strong>[교육과정 바로가기]</strong></span> 버튼을 통해 각 사이트를 확인하세요.
            </li>
        </ul>
    </div>

    <div class="laj_tab">
        <strong>교육과정 바로가기</strong> 
        <a target="_blank" href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=710" class="active">공무원</a> 
        <a target="_blank" href="http://www.willbescop.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53">경찰</a>        	 
    </div>    
    
    <div class="laj_sec">
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}        
            <h4>군복무 정보</h4> 
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                    <caption>가입정보</caption>
                    <thead>
                        <tr>
                            <th class="w-tit">군무 기관명</th>
                            <th class="w-tit">군별</th>
                            <th class="w-tit">계급</th>
                            <th class="w-tit">군번</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input id="ARM_NM" name="ARM_NM" type="text" class="ipt ipt3"></td>
                            <td><input id="ARM_DIV" name="ARM_DIV" type="text" class="ipt ipt3"></td>                      
                            <td><input id="ARM_RANK" name="ARM_RANK" type="text" class="ipt ipt3"></td>
                            <td><input id="ARM_NO" name="ARM_NO" type="text" class="ipt ipt3"></td>
                        </tr>
                        <td class="w-file answer tx-left pl-zero" colspan="4">
                            인증파일업로드
                            <ul class="attach mb20">
                                <li>
                                    <div class="filetype">
                                        <input type="text" class="file-text" />
                                        <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                        <span class="file-select"><input type="file" class="input-file" size="3" id="attachfile" name="attachfile" ></span>
                                        <input class="file-reset NSK" type="button" value="X" />
                                    </div>
                                </li>
                                <li>2MB까지 업로드 가능하며, 이미지파일 (jpg,png등) 또는 PDF파일 형태로 첨부</li>
                                <li>전역(예정)군인 인증 파일 : 병적증명서(군복무확인서), 전역증, 군인신분증 등</li>                                
                                <li class="lastli">상기 인증 내용이 다를 경우, 구매한 상품은 취소 및 환불 처리 됩니다.</li>
                            </ul>
                        </td>
                    </tbody>
                </table>
            </div>
            
            <h4 class="mt20">가입 경로</h4>
            <div class="route">가입경로를 아래 보기에서 선택해 주세요.<br>
                <label for="route1"><input type="radio" id="route1" name="EVENT_TXT_RADIO" value="인터넷검색"> 인터넷검색</label>
                <label for="route2"><input type="radio" id="route2" name="EVENT_TXT_RADIO" value="인터넷 카페(블로그)"> 인터넷 카페(블로그)</label>  
                <label for="route3"><input type="radio" id="route3" name="EVENT_TXT_RADIO" value="인터넷 광고"> 인터넷 광고</label> <br> 
                <label for="route4"><input type="radio" id="route4" name="EVENT_TXT_RADIO" value="박람회"> 박람회</label>  
                <label for="route5"><input type="radio" id="route5" name="EVENT_TXT_RADIO" value="홍보지(브로셔 및 전단지)"> 홍보지(브로셔 및 전단지)</label>  
                <label for="route6"><input type="radio" id="route6" name="EVENT_TXT_RADIO" value="지인소개"> 지인소개</label>  <br>
                <label for="route7"><input type="radio" id="route7" name="EVENT_TXT_RADIO" value="OTHER"> 기타 </label> <input id="EVENT_TXT_TX" name="EVENT_TXT_TX" type="text" class="ipt ipt4">              	
            </div>

            <div class="laj_btns">
                <a href="#none" class="btnA">
                    인증완료
                </a>
                <a href="#none">
                    닫기
                </a>
            </div>
        </form>
    </div>   
</div>
<!--willbes-Layer-PassBox//-->

<script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {

            $('button[name="btn_cert_check"]').on('click', function() {

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

        function contentInfo(strCate,strProd,strPack,strLearn) {
            location.href= "{{front_url('periodPackage/show')}}/cate/"+strCate+"/pack/"+strPack+"/prod-code/"+strProd
        }
    </script>


@stop