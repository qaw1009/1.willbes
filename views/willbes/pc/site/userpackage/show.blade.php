@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Pm">
                {!! $data_landing['Content'] !!}
            </div>
            <!-- willbes-Bnr -->
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
                <input type="hidden" name="learn_pattern" value="userpack_lecture"/>  {{-- 학습형태 --}}
                <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                <div id="Sticky" class="sticky-Package">
                    <div class="sticky-Grid sticky-total NG">

                        <div class="willbes-Lec-Package-Price p_re">
                            <div class="total-PriceBox NG">
                                <span class="price-tit">총 주문금액</span>
                                <span class="row-line">|</span>
                                <span>
                                    <span class="price-txt">강좌</span>
                                    <span class="tx-light-blue" id="lecPrice">0원</span>
                                </span>
                                <span class="price-img">
                                    <img src="{{ img_url('sub/icon_plus.gif') }}">
                                </span>
                                <span>
                                    <span class="price-txt">교재</span>
                                    <span class="tx-light-blue" id="bookPrice">0원</span>
                                </span>
                                <span class="price-img">
                                    <img src="{{ img_url('sub/icon_minus.gif') }}">
                                </span>
                                <span>
                                    <span class="price-txt">강좌할인금액</span>
                                    <span class="tx-pink" id="lecSalePrice">0원</span>
                                </span>
                                <span>
                                    <span class="price-txt">&nbsp;&nbsp;&nbsp;</span>
                                    <span class="tx-pink" id="lecSale"></span>
                                    <input type="hidden" name="pre_sale" id="pre_sale" value="">
                                </span>
                                <span class="price-total tx-light-blue" id="totalPrice">0원</span>
                            </div>
                            @php
                                $sale_type_ccd = '613001';  #판매타입 강제 설정 - 사용자패키지는 가격정보를 가지고 있지 않음
                            @endphp
                            <input type="checkbox" name="prod_code[]" class="chk_products d_none" checked="checked" value="{{ $data['ProdCode'] . ':' . $sale_type_ccd . ':' . $data['ProdCode'] }}" data-prod-code="{{$data['ProdCode']}}" data-parent-prod-code="{{$data['ProdCode']}}" data-group-prod-code="{{$data['ProdCode']}}" data-sale-price="0"/>
                            <input type="hidden" name="sale_status_ccd" id="sale_status_ccd" value="{{$data['SaleStatusCcd']}}">
                            <div class="willbes-Lec-buyBtn">
                                <ul>
                                    <li class="btnAuto180 h36">
                                        <button type="submit" name="btn_cart" data-direct-pay="Y" class="mem-Btn bg-white bd-dark-blue">
                                            <span class="tx-light-blue">바로결제</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- willbes-Lec-Package-Price -->

                        <div class="willbes-Lec-Package NG c_both">
                            <div class="packageTable" id="gather-table">
                            </div>
                        </div>
                        <!-- willbes-Lec-Package -->

                    </div>
                </div>
                <!-- sticky-menu -->

            @foreach($data_subjects as $subject_idx => $subject_name)
                <div class="willbes-Lec NG c_both">
                    <div class="willbes-Lec-Subject tx-dark-black">· {{ $subject_name }}<span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span></div>
                    <!-- willbes-Lec-Subject -->

                    <div class="willbes-Lec-Line">-</div>
                    <!-- willbes-Lec-Line -->
                @foreach($list[$subject_idx] as $idx => $row)
                    <div id="lec_table_{{ $row['ProdCode'] }}" class="willbes-Lec-Table">
                        <table cellspacing="0" cellpadding="0" class="lecTable">
                            <colgroup>
                                <col style="width: 75px;">
                                <col style="width: 85px;">
                                <col style="width: 490px;">
                                <col style="width: 290px;">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-list">{{ $row['CourseName'] }}</td>
                                <td class="w-name">{{ $row['SubjectName'] }}<br/><span class="tx-blue">{{ $row['ProfNickName'] }}</span></td>
                                <td class="w-data tx-left pl25">
                                    <div class="w-tit prod-title-{{ $row['ProdCode'] }}" data-inof="lec">{{ $row['ProdName'] }}</div>
                                    <dl class="w-info">
                                        <dt class="mr20">
                                            <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover1','{{ site_url() }}lecture')">
                                                <strong class="open-info-modal">강좌상세정보</strong>
                                            </a>
                                        </dt>
                                        <dt>강의수 : <span class="unit-lecture-cnt tx-blue" data-info="{{ $row['wUnitLectureCnt'] }}">{{ $row['wUnitLectureCnt'] }}강@if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span></dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt>수강기간 : <span class="study-period tx-blue" data-info="{{ $row['StudyPeriod'] }}">{{ $row['StudyPeriod'] }}일</span></dt>
                                        <dt class="NSK ml15">
                                            <span class="multiple-apply nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                            <span class="lecture-progress nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span>
                                        </dt>
                                    </dl>
                                </td>
                                <td class="w-notice p_re">
                                    @if( empty($row['LectureSampleData']) === false)
                                        <div class="w-sp one"><a href="#none" onclick="openWin('lec_sample_{{ $row['ProdCode'] }}')">맛보기</a></div>
                                        <div id="lec_sample_{{ $row['ProdCode'] }}" class="viewBox">
                                            <a class="closeBtn" href="#none" onclick="closeWin('lec_sample_{{ $row['ProdCode'] }}')"><img src="{{ img_url('cart/close.png') }}"></a>
                                            @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                <dl class="NSK">
                                                    <dt class="Tit NG">맛보기{{ $sample_idx + 1 }}</dt>
                                                    @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                                    @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                                </dl>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(empty($row['ProdPriceData']) === false)
                                        @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                            @if( $price_row['SaleTypeCcd'] == $sale_type_ccd )
                                            <div class="priceWrap chk buybtn p_re">
                                                <span class="chkBox"><input type="checkbox" name="prod_code_sub[]" value="{{ $row['ProdCode'] }}"
                                                                            id="{{$row['ProdCode']}}" data-price="{{$price_row['RealSalePrice']}}"
                                                                            data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}"
                                                                            class="chk_products chk_only_{{ $row['ProdCode'] }}" onclick="checkOnly('.chk_only_{{ $row['ProdCode'] }}', this.value);"/></span>
                                                <!--span class="select">[{{ $price_row['SaleTypeCcdName'] }}]</span//-->
                                                <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                            </div>
                                            @endif
                                        @endforeach
                                    @endif
                                    <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- lecTable -->

                        <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                            <colgroup>
                                <col style="width: 75px;">
                                <col style="width: 865px;">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    @if(empty($row['ProdBookData']) === false)
                                        @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">{{ $book_row['BookProvisionCcdName'] }}</span>
                                                <span class="w-subtit prod-title-{{ $row['ProdCode'] }}-{{ $book_row['ProdBookCode'] }}">{{ $book_row['ProdBookName'] }}</span>
                                                <span class="chk buybtn p_re">
                                                        <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003') soldout @elseif($book_row['wSaleCcd'] == '112004') press @endif">
                                                            [{{ $book_row['wSaleCcdName'] }}]
                                                        </label>

                                                        <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode']  }}"
                                                               id="{{ $row['ProdCode'] }}-{{$book_row['ProdBookCode']}}" data-price="{{$book_row['RealSalePrice']}}"
                                                               data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}"
                                                               data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                    </span>
                                                <span class="priceWrap">
                                                        <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                        <span class="discount">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                                    </span>
                                            </div>
                                        @endforeach
                                        <div class="w-sub tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                        <div class="w-sub">
                                            <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover2','{{ site_url() }}lecture')">
                                                <strong class="open-info-modal">교재상세정보</strong>
                                            </a>
                                        </div>
                                        <div class="prod-book-memo d_none">{{ $row['ProdBookMemo'] }}</div>
                                    @else
                                        <div class="w-sub">
                                            <span class="w-subtit none">※ 별도 구매 가능한 교재가 없습니다.</span>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- lecInfoTable -->
                    </div>
                    <!-- willbes-Lec-Table -->
                @endforeach

                    <div id="InfoForm" class="willbes-Layer-Box"></div>

                    <div class="TopBtn">
                        <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                    </div>
                </div>
                <!-- willbes-Lec -->
            @endforeach
            </form>
        </div>
        {!! banner('수강신청_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
    <!-- willbes-Lec-buyBtn-sm -->
    {!! popup('657002') !!}
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $buy_layer = $('.willbes-Lec-buyBtn-sm');

        var packSaleArray = {!!json_encode($data['PackSaleData'])!!};
        var IsSelLecCount = "{{$data['IsSelLecCount']}}";
        var SelCount = "{{$data['SelCount']}}";

        $(document).ready(function() {
            var tempSaleArray = [];
            var prodcode_sub_cnt = $("input:checkbox[name='prod_code_sub[]']").length;
            var pre_rate = 0;

            if(packSaleArray.length > 0) {
                for (i = 1; i <= prodcode_sub_cnt; i++) {
                    for (j = 0; j < packSaleArray.length; j++) {
                        if (i == packSaleArray[j]['DiscNum']) {
                            num_rate = packSaleArray[j]['DiscRate'];        {{--현재 갯수의 할인율--}}
                            pre_rate = packSaleArray[j]['DiscRate'];        {{--이전 할인율 저장 : 해당갯수의 할인율이 존재하지 않을경우 이전 할인율 적용--}}
                        } else {
                            num_rate = pre_rate;
                            pre_rate = pre_rate;
                        }
                    }
                    tempSaleArray.push({'DiscNum': i, 'DiscRate': num_rate});
                }
            }

            for(i=0;i<tempSaleArray.length;i++) {
                console.log(tempSaleArray[i]['DiscNum'] +' - '+tempSaleArray[i]['DiscRate']);
            }

            $(".chk_products,.chk_books").change( function() {
                var strType = ($(this).attr('class').indexOf('chk_products') == 0) ? 'lecture' : 'book';
                var strId = $(this).attr("id");
                var strProdCode = $(this).data('prod-code');
                var strTypeTag = (strType == 'lecture') ? '<div class="pBox p1">강좌</div>' : '<div class="pBox p3">교재</div>';
                var strSalePrice = $(this).data('price');
                var strTitle = (strType == 'lecture') ? $(".prod-title-"+strProdCode).text() :  $(".prod-title-"+strId).text()  ;

                html = "<div class=\"w-package\" id='gather-product-"+strId+"'>\n" +
                    "   <span class=\"w-obj NSK\">"+strTypeTag+"</span>\n" +
                    "   <span class=\"w-tit\">"+strTitle+"</span>\n" +
                    "   <span class=\"priceWrap\">\n" +
                    "       <span class=\""+strType+"-price tx-blue\" data-price=\""+strSalePrice+"\">"+addComma(strSalePrice)+"원</span>\n" +
                    "       <span class=\"delete\"><a href=\"#none\" onclick='gather_action(\"remove\",\""+strId+"\")'><img src=\"{{ img_url('sub/icon_delete.gif') }}\"></a></span>\n" +
                    "   </span>\n" +
                    "</div>";

                if($(this).is(':checked')) {
                    if(strType == 'lecture') {
                        gather_action('only_remove', strProdCode);    //지우고 다시 등록 : 같은상품의 다른 가격으로 인한..
                    }

                    $("#gather-table").append(html);

                    if(strType == 'lecture') {
                        if (sale_count_check() == false) {
                            $(this).prop('checked', false);              //갯수를 초과할 경우
                            gather_action('only_remove', strId);    //갯수를 초과할 경우
                        }
                    }

                    price_cal();
                } else {
                    gather_action('remove',strId)
                }
            });

            gather_action = function(strAction,strId) {
                if(strAction=="remove") {
                    $("#gather-product-"+strId).remove();
                    $("#"+strId).prop('checked', false);
                    price_cal();
                } else if(strAction=="only_remove") {
                    $("#gather-product-"+strId).remove();
                }
            };

            sale_count_check = function() {
                var sel_count = parseInt($regi_form.find('.lecture-price').length);
                if(IsSelLecCount == "Y") {
                    if ( parseInt(sel_count) > parseInt(SelCount) ) {
                        alert("강좌는 "+SelCount+" 개 까지 신청할 수 있습니다.");return false;
                    }
                }
            };

            sale_rate_check = function() {
                var sel_count = parseInt($regi_form.find('.lecture-price').length);
                var sale_rate = 0;
                {{--
                if(packSaleArray.length > 0) {
                    for(i=0;i<packSaleArray.length;i++) {
                        if( parseInt(packSaleArray[i]['DiscNum']) == sel_count) {       //해당갯수의 할인율이 없을 경우 . 이전에 적용된 할인율을 사용한다.
                            sale_rate = packSaleArray[i]['DiscRate'];
                        }
                    }
                }
                --}}
                if(tempSaleArray.length > 0) {
                    for(i=0;i<tempSaleArray.length;i++) {
                        if( parseInt(tempSaleArray[i]['DiscNum']) == sel_count) {       {{--해당갯수의 할인율이 없을 경우 . 이전에 적용된 할인율을 사용한다.--}}
                            sale_rate = tempSaleArray[i]['DiscRate'];
                        }
                    }
                }
                return sale_rate;
            };

            price_cal = function() {
                var $lecPrice_total = 0;
                var $lecPrice_sale_total=0;
                var $bookPrice_total = 0;
                var $price_total = 0;
                var $sale_rate = 0;

                $regi_form.find('.lecture-price').each(function (){
                    $lecPrice_total += parseInt($(this).data('price'));
                });

                $regi_form.find('.book-price').each(function (){
                    $bookPrice_total += parseInt($(this).data('price'));
                });

                $sale_rate = parseInt(sale_rate_check());

                if($sale_rate > 0) {
                    $lecPrice_sale_total =  parseInt($lecPrice_total*($sale_rate/100))
                }

                $price_total = ($lecPrice_total-$lecPrice_sale_total) + $bookPrice_total;

                $("#lecPrice").text(addComma($lecPrice_total)+'원');
                $("#bookPrice").text(addComma($bookPrice_total)+'원');
                $("#lecSalePrice").text(addComma($lecPrice_sale_total)+'원');
                $("#totalPrice").text(addComma($price_total)+'원');
                ($sale_rate == 0) ? '' : $("#lecSale").text('('+$sale_rate+'% 할인)');
            };

            // 강좌상품 선택/해제
            $regi_form.on('click', 'input[name="prod_code_sub[]"]', function() {
                if ($(this).is(':checked') === false) {
                    // 연계도서상품 체크 해제
                    $regi_form.find('input[name="prod_code[]"][data-parent-prod-code="' + $(this).val() + '"]').prop('checked', false);
                }
            });

            // 교재상품 선택/해제
            $regi_form.on('click', '.chk_books', function() {
                if ($(this).is(':checked') === true) {
                    if ($(this).hasClass('chk_books') === true) {
                        // 수강생 교재 체크
                        if (checkStudentBook($regi_form, $(this)) === false) {
                            return;
                        }
                    }
                }
                price_cal();        //가격 계산
            });

            // 장바구니, 바로결제 버튼 클릭
            $regi_form.on('click', 'button[name="btn_cart"], button[name="btn_direct_pay"]', function () {
                var $is_direct_pay = $(this).data('direct-pay');
                cartNDirectPay($regi_form, $is_direct_pay, 'Y');
            });
        });
    </script>
@stop
