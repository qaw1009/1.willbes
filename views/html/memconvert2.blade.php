@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="memContainer widthAuto c_both">

    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합 서비스 안내</span>
    </div>
    <!-- 통합 서비스 안내 -->
    <div class="Member mem-Convert widthAuto690">
        <div class="user-Txt tx-black">
            윌비스공무원, 신광은경찰, 한림법학원이<br/>
            더 좋은 서비스 제공을 위해 '윌비스' 라는 이름으로 새롭게 통합되었습니다.<br/>
            기존 수강 강좌 및 혜택을 유지하기 위해 윌비스 통합회원으로 전환이 필요하며,<br/>
            <div class="tx-red">전환을 신청하지 않을 시 서비스 이용이 불가능합니다.</div>
        </div>
        <div class="info-Txt tx-black">
            통합회원 전환 시<br/>
            <strong>하나의 ID로 윌비스의 전체 서비스를 이용</strong>하실 수 있습니다.
        </div>
        <div class="convert-chkBox mt30">
            <img src="{{ img_url('login/willbes_convert_user.jpg') }}">
            <div class="info-Txt tx-black bd-none">
                남은 포인트 경우 윌비스공무원&신광은경찰은 교재포인트로, <bR>
                한림법학원은 강좌포인트로 일괄 이관됩니다.
            </div>
            <div class="chkBox-Save mt30 mb30">
                <input type="checkbox" id="USER_ID_SAVE" name="USER_ID_SAVE" class="iptSave">
                <label for="USER_ID_SAVE" class="labelSave tx-gray"><span class="tx-red">(필수)</span> 윌비스 통합회원 전환을 동의합니다.</label>
            </div>
        </div>
        <div class="agree-Chk mt50 toggle">
            <div class="agree-All-Tit tx-black p_re">
                통합회원 약관동의
            </div>
            <ul>
                <li class="top bg-light-gray">
                    <div class="AllchkBox agree-Tit tx-black">
                        <strong>변경된 이용약관에 대한 내용은 모두 확인하고 전체 동의합니다.</strong>
                        <div class="chkBox-Agree">
                            <input type="checkbox" id="" name="" class="" maxlength="30">
                        </div>
                    </div>
                </li>
                <li class="chk">
                    <div class="chkBox-Agree checked">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            <span class="tx-blue">(필수)</span> 만 14세 이상입니다. <span class="tx12">( 만 14세 미만은 회원가입이 제한됩니다.)</span>
                        </a>
                    </div>
                </li>
                <li class="chk">
                    <div class="chkBox-Agree checked">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            <span class="tx-blue">(필수)</span> Willbes 통합회원 이용약관 동의<span class="v_arrow">▼</span>
                        </a>
                    </div>
                    <div class="agree-Txt">
                        aaaaa 약관이 노출 됩니다.<br/>
                        sssss 약관이 노출 됩니다.<br/>
                        ddddd 약관이 노출 됩니다.<br/>
                        {{--@include('willbes.pc.site.main_partial.main_point_' . $__cfg['SiteCode'])--}}
                    </div>
                </li>
                <li class="chk">
                    <div class="chkBox-Agree">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            <span class="tx-blue">(필수)</span> 개인정보 수입 및 이용 동의<span class="v_arrow">▼</span>
                        </a>
                    </div>
                    <div class="agree-Txt">
                        aaaaa 약관이 노출 됩니다.<br/>
                        sssss 약관이 노출 됩니다.<br/>
                        ddddd 약관이 노출 됩니다.<br/>
                    </div>
                </li>
                <li class="chk">
                    <div class="chkBox-Agree">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            (선택) 개인정보 위탁 동의<span class="v_arrow">▼</span>
                        </a>
                    </div>
                    <div class="agree-Txt">
                        약관이 노출 됩니다.<br/>
                        약관이 노출 됩니다.<br/>
                        약관이 노출 됩니다.<br/>
                        약관이 노출 됩니다.<br/>
                        약관이 노출 됩니다.<br/>
                        약관이 노출 됩니다.<br/>
                        약관이 노출 됩니다.<br/>
                        약관이 노출 됩니다.<br/>
                        약관이 노출 됩니다.<br/>
                        약관이 노출 됩니다.<br/>
                    </div>
                </li>
            </ul>
        </div>
        <div class="convert-Btn mt40 pt30 tx-center btnAuto h66">
            <button type="submit" onclick="" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                <span>통합회원 전환하기</span>
            </button>
        </div>
    </div>
    <!-- End 통합 서비스 안내 -->


    <br/><br/><br/><br/><br/><br/><br/><br/><br/>


    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합회원 전환이 완료되었습니다!</span>
    </div>
    <!-- 통합회원 전환 : 약관동의/정보입력 : 전환완료 -->
    <div class="Member mem-Convert widthAuto690">
        <div class="user-Txt tx-black">
            <strong>윌비스 통합회원 전환을 환영합니다.</strong><br/>
            기존 수강강좌, 포인트 등은 통합된 ‘내강의실’에서 확인하실 수 있습니다.<br/>
            로그인후에 이용해 주시 바랍니다.
        </div>
        <div class="agree-user-Chk">
            <table cellspacing="0" cellpadding="0" class="auTable">
                <colgroup>
                    <col style="width: 180px;"/> 
                    <col style="width: 510px;"/>
                </colgroup>
                <tbody>
                    <tr>
                        <th>이름</th>
                        <td>홍길동</td>
                    </tr>
                    <tr>
                        <th>통합ID</th>
                        <td>willbes</td>
                    </tr>
                    <tr>
                        <th>통합 전환일</th>
                        <td>2019-11-27 14:29:28</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="convert-Btn mt60 tx-center btnAuto h36">
            <button type="submit" onclick="" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                <span>확인</span>
            </button>
        </div>
    </div>
    <!-- End 통합회원 전환 : 약관동의/정보입력 : 전환완료 -->

    <br/><br/><br/><br/><br/><br/>


</div>
<!-- End Container -->
@stop