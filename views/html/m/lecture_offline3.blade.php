@extends('html.m.layouts.master')

@section('content')

<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="onSearch">
        <input type="search" id="onsearch" name="" value="" placeholder="온라인강의 검색" title="온라인강의 검색" />
        <label for="onsearch"><button title="검색">검색</button></label>
    </div>

    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">  
                학원 방문결제 접수
            </div>
        </div>
    </div>

    <div>
        <ul class="Lec-Selected NG tx-gray">
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">9급공무원</option>
                    <option value="">7급공무원</option>
                    <option value="">세무직</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">단과반</option>
                    <option value="">단과반1</option>
                    <option value="">단과반2</option>
                    <option value="">단과반3</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">캠퍼스전체</option>
                    <option value="">캠퍼스1</option>
                    <option value="">캠퍼스2</option>
                    <option value="">캠퍼스2</option>
                </select>
            </li>            
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">과목전체</option>
                    <option value="">과목1</option>
                    <option value="">과목2</option>
                    <option value="">과목3</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">교수전체</option>
                    <option value="">교수1</option>
                    <option value="">교수2</option>
                    <option value="">교수3</option>
                </select>
            </li>
            <li class="resetBtn2">
                <a href="#none">초기화</a>
            </li>           
        </ul>

        <div class="willbes-Lec-Selected NG c_both tx-gray pb-zero">
            <select id="process" name="process" title="process" class="seleProcess width30p">
                <option selected="selected">최근등록순</option>
                <option value="과정순">과정순</option>
            </select>
        </div>
        <div class="willbes-Lec-Search NG width100p pl20 pr20 pb20 mt10">
            <div class="inputBox width100p p_re">
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width100p" placeholder="강의명" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span class="hidden">검색</span>
                </button>
            </div>
        </div>

        <div class="lineTabs lecListTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                <colgroup>
                    <col style="width: 87%;">
                    <col style="width: 13%;">
                </colgroup>
                <tbody>
                    <tr class="replyList willbes-Open-Table">
                        <td class="w-data tx-left">
                            <div class="w-tit">경제학</div>
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr class="willbes-Open-List">
                        <td class="w-data tx-left" colspan="2">
                            <div class="oneBox">
                                <dl class="w-info">
                                    <dt><input type="checkbox" id="" name=""> 신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    20_GS3순환 경제학 황종휴
                                </div>
                                <dl class="w-info tx-gray">                                
                                    <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                    <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a><span class="row-line">|</span> 수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>                          
                                </dl>
                                <div class="priceWrap">
                                    <span class="price">80,000원</span>
                                    <span class="discount">(10%↓)</span> ▶
                                    <span class="dcprice">64,000원</span>                                          
                                </div>
                            </div>
                            <div class="oneBox">
                                <dl class="w-info">
                                    <dt><input type="checkbox" id="" name=""> 신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    20_GS3순환 경제학 황종휴
                                </div>
                                <dl class="w-info tx-gray">                                
                                    <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                    <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a><span class="row-line">|</span> 수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n4">방문접수</span> <span class="NSK nBox n2">접수중</span></dt>                           
                                </dl>
                                <div class="priceWrap">
                                    <span class="price">80,000원</span>
                                    <span class="discount">(10%↓)</span> ▶
                                    <span class="dcprice">64,000원</span>                                          
                                </div>
                            </div>
                        </td>                        
                    </tr>
                    
                    <tr class="replyList willbes-Open-Table">
                        <td class="w-data tx-left">
                            <div class="w-tit">경찰학개론</div>
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr class="willbes-Open-List">
                        <td class="w-data tx-left" colspan="2">
                            <div class="oneBox">
                                <dl class="w-info">
                                    <dt><input type="checkbox" id="" name=""> 신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    20_GS3순환 경제학 황종휴
                                </div>
                                <dl class="w-info tx-gray">                                
                                    <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                    <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a><span class="row-line">|</span> 수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>                           
                                </dl>
                                <div class="priceWrap">
                                    <span class="price">80,000원</span>
                                    <span class="discount">(10%↓)</span> ▶
                                    <span class="dcprice">64,000원</span>                                          
                                </div>
                            </div>
                            <div class="oneBox">
                                <dl class="w-info">
                                    <dt><input type="checkbox" id="" name=""> 신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    20_GS3순환 경제학 황종휴
                                </div>
                                <dl class="w-info tx-gray">                                
                                    <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                    <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a><span class="row-line">|</span> 수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>                           
                                </dl>
                                <div class="priceWrap">
                                    <span class="price">80,000원</span>
                                    <span class="discount">(10%↓)</span> ▶
                                    <span class="dcprice">64,000원</span>                                          
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="replyList willbes-Open-Table">
                        <td class="w-data tx-left">
                            <div class="w-tit">형법</div>
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr class="willbes-Open-List">
                        <td class="w-data tx-left" colspan="2">
                            <div class="oneBox">
                                <dl class="w-info">
                                    <dt><input type="checkbox" id="" name=""> 신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    20_GS3순환 경제학 황종휴
                                </div>
                                <dl class="w-info tx-gray">                                
                                    <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                    <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a><span class="row-line">|</span> 수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>                         
                                </dl>
                                <div class="priceWrap">
                                    <span class="price">80,000원</span>
                                    <span class="discount">(10%↓)</span> ▶
                                    <span class="dcprice">64,000원</span>                                          
                                </div>
                            </div>
                            <div class="oneBox">
                                <dl class="w-info">
                                    <dt><input type="checkbox" id="" name=""> 신림(본원)<span class="row-line">|</span>GS3순환<span class="row-line">|</span>경제학<span class="row-line">|</span>황종휴</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    20_GS3순환 경제학 황종휴
                                </div>
                                <dl class="w-info tx-gray">                                
                                    <dt>개강일~종강일 : <span class="tx-blue">05/19 ~ 06/08</span> 월화수목금토 (19회차)</dt><br>       
                                    <dt><a href="#none" class="lecView" onclick="openWin('InfoForm')">강좌상세정보</a><span class="row-line">|</span> 수강형태 : <span class="tx-blue">오전영상</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt>                            
                                </dl>
                                <div class="priceWrap">
                                    <span class="price">80,000원</span>
                                    <span class="discount">(10%↓)</span> ▶
                                    <span class="dcprice">64,000원</span>                                          
                                </div>
                            </div>
                        </td>
                    </tr>                    
                </tbody>
            </table>            

            <div class="lec-btns w100p">
                <ul>
                    <li><a href="#none" class="btn-purple">방문결제 접수</a></li>
                </ul>
            </div>

        </div>        

    </div>

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

    {{--메세지 --}}
    <div id="LecBuyMessagePop" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h250 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('LecBuyMessagePop')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="Message NG">
                <p>해당 상품이<br> 학원방문결제 접수에 담겼습니다.</p>
                <p>학원방문결제 접수로<br> 이동하시겠습니까?<p>
            </div>
            <div class="MessageBtns">
                <a href="#none" class="btn_gray">예</a>
                <a href="#none" class="btn_white">계속구매</a>
            </div>
        </div>
        <div class="dim" onclick="closeWin('LecBuyMessagePop')"></div>
    </div>

    {{--강의 상세 보기 팝업 --}}
    <div id="InfoForm" class="willbes-Layer-Black NG">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <h4>20_GS3순환 경제학 황종휴</h4>
            <div class="LecDetailBox">
                <h5>강좌정보</h5>
                <div class="tx-dark-gray">
                    [20.05] 기특한 국어 지방직 대비 최종모고<br>
                    [20.05] 기특한 국어 지방직 대비 최종 모고
                </div>
                <dl class="w-info tx-gray mt20">
                    <dt>개강 <span class="tx-blue">2020.07.06 ~ 2020.07.24 (수)</span> (15회차)</dt>
                    <dt>강의시간 <span class="tx-blue">09:00 ~ 13:00</span></dt>
                    <dt>교재 <span class="tx-blue">추후공지</span></dt>
                </dl>
            </div>
        </div>
        <div class="dim" onclick="closeWin('InfoForm')"></div>
    </div>

    {{--장바구니--}}
    <div class="basketBox">
        <div class="MoreBtn"><a><img src="{{ img_url('m/mypage/icon_arrow_off.png') }}"></a></div>
        <div class="basketInfo">
            <ul class="basketList">
                <li>
                    <p>
                        <span>강좌</span>
                        2020 기미진 기특한 국어 기본/심화이론(7-8월)
                        <div class="tx-red ml40">기본/심화 할인(↓10%)</div>
                    </p>
                    <strong>150,000원</strong>
                    <a>삭제</a>
                </li>
                <li>
                    <p>
                        <span>강좌</span>
                        2020 기미진 기특한 국어 기본/심화이론(7-8월)
                        <div class="tx-red ml40">기본/심화 할인(↓10%)</div>
                    </p>
                    <strong>150,000원</strong>
                    <a>삭제</a>
                </li>
            </ul>
            <div class="basketPrice">
                <ul>
                    <li>
                        강좌할인금액<span>30,000원(10%할인)</span>
                    </li>
                    <li>
                        총 주문금액 <span>270,000원</span>
                    </li>
                </ul>
            </div>
            <div class="infoBox">
                <p><input type="checkbox" id="" name=""> <a href="#none">유의사항을 모두 확인했고 동의합니다. ▼</a></p>
                <ul>
                    <li>수강증 분실시 재발급/변경/환불되지 않으며, 판매 및 양도되지 않습니다.<br>
                        (절도, 위.변조시 법적 책임이 따릅니다.)</li>
                    <li>수강 총 횟수의 1/2 미경과시에만 변경 및 환불이 가능합니다.</li>
                <ul>
            </div>    
            <div class="LecPocketLinkBox">
                <a href="#none" onclick="openWin('protect')">개인정보활용 및 환불정책 안내</a>
            </div>      
        </div>
        
    </div>

    {{-- 개인정보활용 및 환불정책 안내 팝업 --}}
    <div id="protect" class="willbes-Layer-Black NG">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('protect')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <h4>개인정보활용 및 환불정책 안내</h4>
            <div class="protectBox">
                <div class="protectBoxWrap">
                    <h5>개인정보활용 안내</h5>
                    <div class="tx-dark-gray protectBoxSm">
                        윌비스는 고객의 개인정보보호를 소중하게 생각하고, 고객의 개인정보를 보호하기 위하여 항상 최선을 다해 노력하고 있습니다.<br>
                        윌비스는 개인정보보호 관련 주요 법률인「정보통신망 이용촉진 및 정보보호 등에 관한 법률」을 비롯한 모든 개인정보보호 관련 법률을 준수하고 있습니다.<br>
                        또한, 윌비스는「개인정보처리방침」을 제정하여 이를 준수하고 있으며, 윌비스의「개인정보처리방침」을 홈페이지에 공개하여 고객이 언제나 용이하게 열람할 수 있도록 하고 있습니다.<br>
                        윌비스의「개인정보처리방침」은 관련 법률 및 지침의 변경 또는 내부 운영 방침의 변경에 따라 변경될 수 있습니다.<br>
                        윌비스의「개인정보처리방침」이 변경될 경우 변경된 사항을 홈페이지를 통하여 공지합니다.<br>
                        윌비스 개인정보처리방침은 아래와 같은 내용을 담고 있습니다.<br>
                        <br>
                        <div><a href="https://www.willbes.net/company/protect" target="_blank" class="tx-blue">[윌비스 개인정보 취급방침 보기 →]</a></div>
                    </div>
                    <div class="chkBoxAgree">                                            
                        <input type="checkbox" id="check01" name="">   
                        <label for="check01">위 개인정보활용 안내사항을 모두 읽었으며 동의합니다. (필수)</label>
                    </div>  

                    <h5 class="mt20">환불정책 안내</h5>
                    <div class="tx-dark-gray protectBoxSm">
                        <p class="tx14">⊙ 한림법학원 실강종합반 환불정책</p>
                        (학원설립및과외교습에관한법률 제18조 및 동시행령 제18조에 근거함)<br>
                        <br>
                        - 환불시 강의료 정산 = 총 등록(결제) 금액 - 퇴원일까지 진행된 강의 수강료*<br>
                        * 퇴원일까지 진행된 강의 수강료 기준: 단과 수강료 기준 1회당 가격 * 진행된 강의 횟수<br>
                        - 강의 개강일 기준 총 회차의 50% 이상이 진행된 경우 해당강의는 전회차 수강료로 정산됩니다.<br>
                        - 종합반 반 변경은 불가하며, 기존 종합반 탈퇴 후 재가입하셔야 합니다. (탈퇴 시 상기 환불정책 준수)<br>
                        <br>
                        <div><a href="https://www.willbes.net/company/protect" target="_blank" class="tx-blue">[윌비스 이용약관 보기 →]</a></div>
                    </div>             
                    <div class="chkBoxAgree">                                            
                        <input type="checkbox" id="check02" name="">   
                        <label for="check02">위 환불정책 안내사항을 모두 읽었으며 동의합니다. (필수)</label>                                         
                    </div>
                </div> 
                
                <div class="allBtn">
                    위 개인정보 활용 및 환불정책 안내사항을 모두 읽었으며 동의합니다. 
                    <a href="#none">전체동의</a>
                </div>
            </div>

            
        </div>
        
        <div class="dim" onclick="closeWin('InfoForm')"></div>
    </div>

</div>
<!-- End Container -->
    <script>
        // 상담신청 보기
        $(function() {
            $('.infoBox p a').click(function() {
                var $lec_info_table = $(this).parents('.basketInfo').find('.infoBox ul');    
                if ($lec_info_table.is(':hidden')) {
                    $lec_info_table.show().css('display','block');
                    $(this).text('유의사항을 모두 확인했고 동의합니다. ▼');
                } else {
                    $lec_info_table.hide().css('display','none');
                    $(this).text('유의사항을 모두 확인했고 동의합니다. ▲');
                }
            });
        });  
    </script>
@stop