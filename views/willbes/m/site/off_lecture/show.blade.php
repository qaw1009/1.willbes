@extends('willbes.m.layouts.master')

@section('page_title', '학원수강신청 > 단과반' )

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <!-- PageTitle -->
        @include('willbes.m.layouts.page_title')
        <div>
            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
            </form>
            <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
                <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}
                <div class="passProfTabs c_both">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                        <tr>
                            <td>
                                <div class="w-prof p_re">
                                    <img src="{{ $data['ProfReferData']['lec_detail_img'] or '' }}">
                                    <div class="cover"><img src="{{ img_url('m/mypage/profImg-cover.png') }}"></div>
                                </div>
                                <div class="w-data tx-left pl15">
                                    <dl class="w-info pt-zero">
                                        <dt>{{ $data['CampusCcdName'] }}<span class="row-line">|</span>{{ $data['CourseName'] }}<span class="row-line">|</span>
                                            {{ $data['SubjectName'] }}<span class="row-line">|</span>{{ $data['ProfNickName'] }}</dt>
                                    </dl>
                                    <div class="w-tit">
                                        {{ $data['ProdName'] }}
                                    </div>
                                    <div class="w-info tx-gray">
                                        <dl>
                                            <dt class="h22"><strong>개강일~종강일</strong><span class="tx-blue">{{ date('m/d', strtotime($data['StudyStartDate'])) }} ~ {{ date('m/d', strtotime($data['StudyEndDate'])) }}</span></dt><br/>
                                            <dt class="h22">{{ $data['WeekArrayName'] }} ({{ $data['Amount'] }}회차)</dt><br/>
                                            <dt class="h22"><strong>수강형태</strong><span class="tx-blue">{{ $data['StudyPatternCcdName'] }}</span> </dt><br>
                                            <dt class="h22"><span class="NSK nBox n{{ substr($data['StudyApplyCcd'], -1) == '1' ? '4' : '1' }}">{{ $data['StudyApplyCcdName'] }}</span>
                                                <span class="NSK nBox n{{ substr($data['AcceptStatusCcd'], -1) }}">{{ $data['AcceptStatusCcdName'] }}</span></dt>
                                        </dl>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="lec-info">
                    <h4 class="NGEB">강좌신청</h4>
                    <ul>
                        @if(empty($data['ProdPriceData']) === false)
                            <li>
                                <span class="chk">
                                    <label>[판매]</label>
                                    <input type="checkbox" name="prod_code[]" value="{{ $data['ProdCode'] . ':' . $data['ProdPriceData'][0]['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $data['ProdCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-sale-price="{{ $data['ProdPriceData'][0]['RealSalePrice'] }}" class="chk_products" @if($data['IsSalesAble'] == 'N') disabled="disabled" @endif>
                                </span>
                                    <div class="priceWrap NG">
                                        {{ number_format($data['ProdPriceData'][0]['SalePrice'], 0) }}원 (↓{{ $data['ProdPriceData'][0]['SaleRate'] . $data['ProdPriceData'][0]['SaleRateUnit'] }}) ▶
                                        <span class="tx-blue">{{ number_format($data['ProdPriceData'][0]['RealSalePrice'], 0) }}원</span><br>
                                    </div>
                                </li>
                        @endif
                    </ul>
                </div>

                <div class="lec-info">
                    <h4 class="NGEB">교재신청</h4>
                    <ul>
                        @if(empty($data['ProdBookData']) === false)
                            @foreach($data['ProdBookData'] as $book_idx => $book_row)
                                <li>
                                <span class="chk">
                                    <label>[판매]</label>
                                    <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" data-sale-price="{{ $book_row['RealSalePrice'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                </span>
                                    <div class="priceWrap NG">
                                        {{ $book_row['BookProvisionCcdName'] }}  <span class="NGR">{{ $book_row['ProdBookName'] }}</span><br>
                                        <p class="NGR">[{{ $book_row['wSaleCcdName'] }}]<span class="tx-blue"> {{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                            (↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</p>
                                    </div>
                                </li>
                            @endforeach
                            <li class="tx-red NGR">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.</li>
                        @else
                            <li>{{ empty($data['ProdBookMemo']) === true ? '※ 별도 구매 가능한 교재가 없습니다.' : $data['ProdBookMemo'] }}</li>
                        @endif
                    </ul>
                </div>

                <div class="priceBox">
                    <ul>
                        <li><strong>강좌</strong> <span id="prod_sale_price">0</span>원</li>
                        <li><strong>교재</strong> <span id="book_sale_price">0</span>원</li>
                        <li class="NGEB"><strong>총 주문금액</strong> <span class="tx-blue"><span id="tot_sale_price">0</span>원</span></li>
                    </ul>
                </div>

                <div class="lec-info-tab NGR">
                    <ul class="tabWrap two">
                        <li><a href="#tab01" class="on">강좌정보</a></li>
                        <li><a href="#tab02">교재정보</a></li>
                    </ul>
                    <div class="tabBox tabBox2">
                        <div id="tab01">
                            @foreach($data['ProdContents'] as $idx => $row)
                                <h4 class="NGEB">강좌{{ $row['ContentTypeCcdName'] }}</h4>
                                {!! $row['Content'] !!}
                            @endforeach
                        </div>

                        <div id="tab02" class="book-info">
                            @foreach($data['ProdSaleBooks'] as $idx => $row)
                                <img src="{{ $row['wAttachImgPath'] }}{{ $row['wAttachImgOgName'] }}" alt="{{ $row['ProdBookName'] }}">
                                <ul>
                                    <li class="NGEB">{{ $row['ProdBookName'] }}</li>
                                    <li><span>분야</span>  {{ $row['BookCateName'] }}</li>
                                    <li><span>저자</span> {{ $row['wAuthorNames'] }}</li>
                                    <li><span>출판사</span> {{ $row['wPublName'] }}</li>
                                    <li><span>판형/쪽수</span> {{ $row['wEditionSize'] }} / {{ $row['wPageCnt'] }}</li>
                                    <li><span>출판일</span> {{ $row['wPublDate'] }}</li>
                                    <li><span>교재비</span> <strong class="tx-blue">{{ number_format($row['RealSalePrice']) }}원</strong> (↓{{ $row['SaleRate'] . $row['SaleRateUnit'] }})
                                        <strong>[{{ $row['wSaleCcdName'] }}]</strong></li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
                @php
                    $btn_count = 1;
                    if($data['StudyApplyCcd'] != '654002') {
                        $btn_count += 1;
                    }
                    if($data['StudyApplyCcd'] != '654001') {
                        $btn_count += 2;
                    }
                    switch ($btn_count) {
                        case 1 : $btn_css = 'w100p';break;
                        case 2 : $btn_css = 'w50p';break;
                        case 3 : $btn_css = '';break;
                        case 4 : $btn_css = 'w25p';break;
                        default : $btn_css = '';
                    }
                @endphp
                <div class="lec-btns {{$btn_css}}">
                    <ul>
                        <li><a href="#none" onClick='javascript:goListOff()' class="btn_black_line">강좌목록</a></li>
                        @if($data['StudyApplyCcd'] != '654002')
                            <li><a href="#none"  class="btn_gray" name="btn_off_visit_pay" data-direct-pay="N" >방문결제</a></li>
                        @endif
                        @if($data['StudyApplyCcd'] != '654001')
                            <li><a href="#none" name="btn_cart" data-direct-pay="N" class="btn-purple">장바구니</a></li>
                            <li><a href="#none" name="btn_direct_pay" data-direct-pay="Y" class="btn-purple-line">바로결제</a></li>
                        @endif
                    </ul>
                </div>
            </form>
        </div>

        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')

        {{-- 방문결제 폼 --}}
        <form id="regi_visit_form" name="regi_visit_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="learn_pattern" value="{{empty($learn_pattern) ? 'off_lecture' : $learn_pattern }}"/>  {{-- 학습형태 --}}
            <input type="hidden" name="cart_type" value="off_lecture"/>   {{-- 장바구니 탭 아이디 --}}
            <input type="hidden" name="is_direct_pay" value="N"/>    {{-- 바로결제 여부 --}}
            <input type="hidden" name="is_visit_pay" value="Y"/>    {{-- 방문결제 여부 --}}
            <input type="hidden" name="prod_code[]" value=""/>  {{-- 상품코드 --}}
        </form>

        <div id="LecBuyMessagePop" class="willbes-Layer-Black">
            <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h250 fix">
                <a class="closeBtn" href="#none" onclick="closeWin('LecBuyMessagePop')">
                    <img src="{{ img_url('m/calendar/close.png') }}">
                </a>
                {{--체크 안했을 경우--}}
                <div class="Message NG">
                    상품을 선택해주세요.
                </div>
                <div class="MessageBtns">
                    <a href="#none" class="btn_gray f_none">확인</a>
                </div>
                {{--체크 했을 경우--}}
                <div class="Message NG">
                    방문접수를 신청하겠습니까?
                </div>
                <div class="MessageBtns">
                    <a href="#none" class="btn_gray">확인</a>
                    <a href="#none" class="btn_white">취소</a>
                </div>
                {{--접수 완료 시--}}
                <div class="Message NG">
                    접수가 완료되었습니다.<br>
                    * 학원으로 방문해주시기 바랍니다.
                </div>
                <div class="MessageBtns">
                    <a href="#none" class="btn_gray f_none">확인</a>
                </div>
            </div>
            <div class="dim" onclick="closeWin('LecBuyMessagePop')"></div>
        </div><!-- 방문결제  -->
    </div>
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_off_form = $('#regi_off_form');
        var $regi_visit_form = $('#regi_visit_form');

        $(document).ready(function() {
            {{--상품 선택/해제--}}
            $regi_off_form.on('change', '.chk_products, .chk_books', function () {
                setCheckLectureProduct($regi_off_form, $(this), 'price', 'prod_sale_price', 'book_sale_price', 'tot_sale_price');
            });

            {{--방문결제, 장바구니, 바로결제 버튼 클릭--}}
            $regi_off_form.on('click', 'a[name="btn_off_visit_pay"], a[name="btn_cart"], a[name="btn_direct_pay"]', function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                @if($data["IsSalesAble"] !== 'Y')
                    alert("신청 할 수 없는 강좌입니다.");return;
                @endif

                {{--방문결제 버튼 클릭--}}
                if ($(this).attr('name') === 'btn_off_visit_pay') {

                    var prod_code = $("input:checkbox[class='chk_products']:checked").val();
                    if (prod_code === undefined) {
                        alert('상품을 선택해 주세요.');
                        return;
                    }
                    {{--상품 체크--}}
                    if (checkProduct($regi_visit_form.find('input[name="learn_pattern"]').val(), prod_code, 'Y', $regi_visit_form,'off') === false) {
                        return;
                    }
                    if (confirm('방문접수를 신청하시겠습니까?')) {
                        $regi_visit_form.find('input[name="prod_code[]"]').val(prod_code);
                        $regi_visit_form.find('input[name="is_direct_pay"]').val('Y');
                        $regi_visit_form.find('input[name="is_visit_pay"]').val('');
                        var url = frontPassUrl('/order/visit/direct');
                        ajaxSubmit($regi_visit_form, url, function (ret) {
                            if (ret.ret_cd) {
                                alert(ret.ret_msg);
                                subCheck();
                                location.href = ret.ret_data.ret_url;
                            }
                        }, showValidateError, null, false, 'alert');
                    }

                    function subCheck() {
                        {{--선택한 교재 확인 후 장바구니로 보내기--}}
                        var book_check_cnt = $("input:checkbox[class='chk_books']:checked").length;
                        if (book_check_cnt > 0) {
                            $("input:checkbox[class='chk_products']").prop('checked', false);
                            addCartNDirectPay($regi_off_form, 'N', 'N', '{{front_url('')}}');
                        }
                        return true;
                    }

                {{--장바구니, 바로결제 버튼 클릭--}}
                } else {
                    var $is_direct_pay = $(this).data('direct-pay');
                    cartNDirectPay($regi_off_form, $is_direct_pay, 'Y');
                }
            });
        });

        function goListOff(){
            location.href = frontPassUrl('/offLecture/?'+$('#url_form').serialize());
        }
    </script>
@stop