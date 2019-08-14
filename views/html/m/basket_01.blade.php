@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">
                <button type="button" class="goback" onclick="history.back(-1); return false;">
                    <span class="hidden">뒤로가기</span>
                </button>    
                장바구니
            </div>
        </div>
    </div>

    <div>
        <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
            <li><a href="#leclist1" class="on">강좌</a><span class="row-line">|</span></li>
            <li><a href="#leclist2">교재</a></li>
        </ul>

        <div class="basketWrap">
            <div id="leclist1">
                <div class="lec-info bd-none pt-zero pb-zero">
                    <h5>
                        <span class="chk chk2">
                            <label for="all">전체선택</label>
                            <input type="checkbox" id="all" name="">
                        </span>
                        <a href="#none" class="NGR">선택삭제</a>
                    </h5>
                </div>

                <div class="basketListBox">
                    <div>                     
                        <input type="checkbox" id="lec01" name="">
                        <label for="lec01">
                            <ul>
                                <li><span>강좌</span></li>
                                <li>2019년 2차대비 신광은 형사소송법 심화이론 (19년 5월)</li>
                                <li>판매가 <span>90,000원</span></li>
                            </ul>
                        </label>
                    </div>
                    <div>                     
                        <input type="checkbox" id="lec02" name="">
                        <label for="lec02">
                            <ul>
                                <li><span>강좌</span></li>
                                <li>2019년 2차대비 신광은 형사소송법 심화이론 (19년 5월)</li>
                                <li>판매가 <span>90,000원</span></li>
                            </ul>
                        </label>
                    </div>
                    <div>                     
                        <input type="checkbox" id="lec03" name="">
                        <label for="lec03">
                            <ul>
                                <li><span>강좌</span></li>
                                <li>2019년 2차대비 신광은 형사소송법 심화이론 (19년 5월)</li>
                                <li>판매가 <span>90,000원</span></li>
                            </ul>
                        </label>
                    </div>
                    <div class="priceBox">
                        <ul>
                            <li><strong>강좌(3건)</strong> <span class="tx-blue">150,000원</span></li>
                            <li><strong>패키지(1건)</strong> <span class="tx-red">0원</span></li>
                            <li><strong>배송료</strong> <span class="tx-blue">0원</span></li>
                            <li class="NGEB"><strong>결제예상금액</strong> <span class="tx-blue">312,000원</span></li>
                        </ul>                
                    </div>                 
                </div>
            </div>

            <div id="leclist2">
                <div class="lec-info bd-none pt-zero pb-zero">
                    <h5>
                        <span class="chk chk2">
                            <label for="all">전체선택</label>
                            <input type="checkbox" id="all" name="">
                        </span>
                        <a href="#none" class="NGR">선택삭제</a>
                    </h5>
                </div>

                <div class="basketListBox">
                    <div>                     
                        <input type="checkbox" id="lec01" name="">
                        <label for="lec01">
                            <ul>
                                <li><span>교재</span></li>
                                <li>하승민 영문법 쌩쌩 기초</li>
                                <li>판매가 <span>90,000원</span> 수량 <span>1</span></li>
                            </ul>
                        </label>
                    </div>
                    <div>                     
                        <input type="checkbox" id="lec02" name="">
                        <label for="lec02">
                            <ul>
                                <li><span>교재</span></li>
                                <li>신광은 형사소송법 적중예상 문제풀이(2019년 2차대비)</li>
                                <li>판매가 <span>90,000원</span> 수량 <span>1</span></li>
                            </ul>
                        </label>
                    </div>
                    <div class="priceBox">
                        <ul>
                            <li><strong>강좌(2건)</strong> <span class="tx-blue">150,000원</span></li>
                            <li><strong>배송료</strong> <span class="tx-blue">0원</span></li>
                            <li class="NGEB"><strong>결제예상금액</strong> <span class="tx-blue">312,000원</span></li>
                        </ul>                
                    </div>                 
                </div>                
            </div>   
            
            <ul class="lecTxt NGR">
                <li class="tx-red">정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</li>
                <li>장바구니 상품은 14일 안에 미구매 시 자동 삭제 처리됩니다.</li>
                <li>장바구니 강좌 삭제 시 해당 강좌의 수강생 교재가 포함된 경우 함께 삭제 처리됩니다.</li>
                <li>장바구니 담기 후 해당 상품의 접수기간이 지났거나, 판매상태가 '판매종료'로 변경된 경우 자동 삭제 처리됩니다.</li>
                <li>배송 상품은 당일 오후 2시까지 결제한 상품에 한해 당일 발송 처리됩니다. (토,일,공휴일 제외)</li>
            </ul>
            
            <div class="lec-btns w100p">
                <ul>
                    <li><a href="#none" class="btn-purple">결제하기</a></li>
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

    {{--강좌상세보기--}}
    <div id="LecDetailPop" class="willbes-Layer-Black NG">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 hauto fix">
            <a class="closeBtn" href="#none" onclick="closeWin('LecDetailPop')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <h4>
                2020 기미진 기특한 국어 기본/심화이론(7-8월)
            </h4>
            <div class="LecDetailBox">
                <h5>강좌상세정보</h5>
                <dl class="w-info tx-gray">
                    <dt>
                        강의수 <span class="tx-blue">12강/56강</span><span class="row-line ml10">|</span> 
                        수강기간 <span class="tx-blue">50일</span> 
                        <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span>
                    </dt>
                </dl>
                <h5>강좌소개</h5>
                <div class="tx-dark-gray">
                    - 2020 기미진 기특한 국어 기본/심화이론(7-8월)<br>
                    - 강의일정 : 7/8 ~ 8/28 월, 수 09:00~13:00 [16회 완성]<br>
                    - 강의교재 : 2020 기특한 국어 기본서(배움 출간예정)
                </div>
                <h5>강좌특징</h5>
                <div class="tx-dark-gray">
                    - 2020 기미진 기특한 국어 기본/심화이론(7-8월)<br>
                    [수강대상]<br>
                    - 공무원 국어를 처음 공부하시는 분과 이론을 재 복습하시는 분 모두 가능한 최적의 강좌!<br>
                    - 7/9 급, 법원직, 각종 공무원 시험 대비로 초학자들도 충분히 수강할 수 있는 강좌!
                </div>
            </div>
        </div>
        <div class="dim" onclick="closeWin('LecDetailPop')"></div>
    </div>
</div>
<!-- End Container -->
@stop