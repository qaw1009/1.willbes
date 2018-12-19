@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="willbes-Leclist mt40 c_both">
        <!-- 일반행정직 -->
        <div class="CertiWrap">
            <div>□ 일반행정직</div>
            <div class="CertiBox">
                <ul class="infoTxt NGR">
                    <li>
                        2018년 9급 공무원 필수아이템!<br/>
                        노량진 수험가 화제의 스타강사 총집합! 공무원 절대 합격을 확정 짓는 최적의 해답!<br/>
                        이제 당신이 합격할 차례입니다.<br/>
                    </li>
                </ul>
                <table cellspacing="0" cellpadding="0" class="listTable certiTable bdt-gray under-black tx-gray">
                    <colgroup>
                        <col style="width: 20%;"/>
                        <col style="width: 55%;"/>
                        <col style="width: 25%;"/>
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-tit">
                                교재 미포함<br/>
                                구매가격<br/>
                            </td>
                            <td class="w-info">
                                <div class="off cover">
                                    가입/인증 완료시<br/>
                                    윌비스 PASS 금액이 공개됩니다.<br/>
                                </div>
                                <div class="open priceInfo NG">
                                    <span class="originPrice line-through">990,000원</span>
                                    <ul class="discountPrice">
                                        <li class="tx-red NGEB">본인부담 : 198,000원</li>
                                        <li class="subInfo">(* 취업역량교육비/바우처 792,000원 지원)</li>
                                    </ul>
                                </div>
                            </td>
                            <td class="w-btn">
                                <div class="off btnBlue">
                                    <button type="submit" onclick="">
                                        <span>가입·인증하기 ></span>
                                    </button>
                                </div>
                                <div class="open btnRed">
                                    <button type="submit" onclick="">
                                        <span>결제하기 ></span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit">
                                교재 포함<br/>
                                구매가격<br/>
                                (기본이론서)<br/>
                            </td>
                            <td class="w-info">
                                <div class="off cover">
                                    가입/인증 완료시<br/>
                                    윌비스 PASS 금액이 공개됩니다.<br/>
                                </div>
                                <div class="open priceInfo NG">
                                    <span class="originPrice line-through">1,190,000원</span>
                                    <ul class="discountPrice">
                                        <li class="tx-red NGEB">본인부담 : 238,000원</li>
                                        <li class="subInfo">(* 취업역량교육비/바우처 952,000원 지원)</li>
                                    </ul>
                                </div>
                            </td>
                            <td class="w-btn">
                                <div class="off btnBlue">
                                    <button type="submit" onclick="">
                                        <span>가입·인증하기 ></span>
                                    </button>
                                </div>
                                <div class="open btnRed">
                                    <button type="submit" onclick="">
                                        <span>결제하기 ></span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="agreeChkBox">
                    <input type="checkbox" id="agreeChk" name="agreeChk" value="0">
                    <label>상품 이용에 따른 유의 사항을 모두 확인하였으며, 이에 동의합니다.</label>
                    <div class="infoBtn"><a href="#none">이용안내 확인하기</a></div>
                </div>
            </div>
        </div>


        <br/><br/><br/>

        <!-- 기술직 -->
        <div class="CertiWrap">
            <div>□ 기술직</div>
            <div class="CertiBox">
                <ul class="infoTxt NGR">
                    <li>
                        공무원 기술직 완전 마스터!<br/>
                        아무나 따라 할 수 없는 명성 높은 전공자로 구성된 완벽한 기술직 강사진!<br/>
                        12개 직렬 수험준비 가능!<br/>
                        - 전기, 전자, 통신, 토목, 보건, 간호, 의료기술, 농업 전산, 기계, 임업, 운전직
                    </li>
                </ul>
                <table cellspacing="0" cellpadding="0" class="listTable certiTable bdt-gray under-black tx-gray">
                    <colgroup>
                        <col style="width: 20%;"/>
                        <col style="width: 55%;"/>
                        <col style="width: 25%;"/>
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-tit">
                                교재 미포함<br/>
                                구매가격<br/>
                            </td>
                            <td class="w-info">
                                <div class="off cover">
                                    가입/인증 완료시<br/>
                                    윌비스 PASS 금액이 공개됩니다.<br/>
                                </div>
                                <div class="open priceInfo NG">
                                    <span class="originPrice line-through">990,000원</span>
                                    <ul class="discountPrice">
                                        <li class="tx-red NGEB">본인부담 : 198,000원</li>
                                        <li class="subInfo">(* 취업역량교육비/바우처 792,000원 지원)</li>
                                    </ul>
                                </div>
                            </td>
                            <td class="w-btn">
                                <div class="off btnBlue">
                                    <button type="submit" onclick="">
                                        <span>가입·인증하기 ></span>
                                    </button>
                                </div>
                                <div class="open btnRed">
                                    <button type="submit" onclick="">
                                        <span>결제하기 ></span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit">
                                교재 포함<br/>
                                구매가격<br/>
                                (기본이론서)<br/>
                            </td>
                            <td class="w-info">
                                <div class="off cover">
                                    가입/인증 완료시<br/>
                                    윌비스 PASS 금액이 공개됩니다.<br/>
                                </div>
                                <div class="open priceInfo NG">
                                    <span class="originPrice line-through">1,190,000원</span>
                                    <ul class="discountPrice">
                                        <li class="tx-red NGEB">본인부담 : 238,000원</li>
                                        <li class="subInfo">(* 취업역량교육비/바우처 952,000원 지원)</li>
                                    </ul>
                                </div>
                            </td>
                            <td class="w-btn">
                                <div class="off btnBlue">
                                    <button type="submit" onclick="">
                                        <span>가입·인증하기 ></span>
                                    </button>
                                </div>
                                <div class="open btnRed">
                                    <button type="submit" onclick="">
                                        <span>결제하기 ></span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="agreeChkBox">
                    <input type="checkbox" id="agreeChk" name="agreeChk" value="0">
                    <label>상품 이용에 따른 유의 사항을 모두 확인하였으며, 이에 동의합니다.</label>
                    <div class="infoBtn"><a href="#none">이용안내 확인하기</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container -->

<script>
    // 금액공개 버튼 Script
    $(function() {
        $('.certiTable .w-btn button').click(function() {
            var $off = $(this).parents('tr').find('.off');
            var $open = $(this).parents('tr').find('.open');

            $off.hide();
            $open.show().css('display','block');
        });
    });
</script>

@stop