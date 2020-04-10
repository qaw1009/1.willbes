@extends('willbes.m.layouts.master')

@section('page_title',  '수강신청 > DIY패키지')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <!-- PageTitle -->
        @include('willbes.m.layouts.page_title')
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
            <input type="hidden" name="learn_pattern" value="userpack_lecture"/>  {{-- 학습형태 --}}
            <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
            <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

            <div>
                <div class="willbes-Txt2 NGR tx-blue">
                    {{$data['ProdName']}}
                </div>

                @if(empty($data['contents']) == false)
                <div class="willbes-Txt NGR c_both">
                    <div class="willbes-Txt-Tit NG">· 유의사항 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
                    {!! $data['contents'][0]['Content'] !!}
                </div>
                @endif

                <div class="lec-info bd-none pt-zero">
                    <h5 class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.{{--<a href="#none" class="NGR">교재정보 전체보기</a>--}}</h5>
                    <div class="lec-choice-pkg">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                            <colgroup>
                                <col style="width: 87%;">
                                <col style="width: 13%;">
                            </colgroup>
                            <tbody>
                            @php
                                $sale_type_ccd = '613001';  #판매타입 강제 설정 - 사용자패키지는 가격정보를 가지고 있지 않음
                            @endphp

                            <input type="checkbox" name="prod_code[]" class="chk_products d_none" checked="checked" value="{{ $data['ProdCode'] . ':' . $sale_type_ccd . ':' . $data['ProdCode'] }}" data-prod-code="{{$data['ProdCode']}}" data-parent-prod-code="{{$data['ProdCode']}}" data-group-prod-code="{{$data['ProdCode']}}" data-sale-price="0"/>
                            <input type="hidden" name="sale_status_ccd" id="sale_status_ccd" value="{{$data['SaleStatusCcd']}}">

                            @foreach($data_subjects as $subject_idx => $subject_name)
                                <tr class="replyList willbes-Open-Table">
                                    <td>
                                        {{ $subject_name }}
                                    </td>
                                    <td class="MoreBtn tx-center">></td>
                                </tr>
                                <tr class="willbes-Open-List">
                                    <td class="w-data tx-left" colspan="2">
                                        @foreach($list[$subject_idx] as $idx => $row)
                                        <div class="w-data-pkg">
                                            <div class="w-info">
                                                <span class="chk">
                                                    <label>[판매]</label>
                                                    @if(empty($row['ProdPriceData']) === false)
                                                        @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                            @if( $price_row['SaleTypeCcd'] == $sale_type_ccd )
                                                                <input type="checkbox" name="prod_code_sub[]" value="{{ $row['ProdCode'] }}"
                                                                       id="{{$row['ProdCode']}}" data-price="{{$price_row['RealSalePrice']}}"
                                                                       data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}"
                                                                       class="chk_products chk_only_{{ $row['ProdCode'] }}" onclick="checkOnly('.chk_only_{{ $row['ProdCode'] }}', this.value);"/>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                                <span class="ml10 tx14">{{ $row['ProfNickName'] }} </span>
                                            </div>
                                            <div class="w-tit prod-title-{{ $row['ProdCode'] }}" data-inof="lec">
                                                {{ $row['ProdName'] }}
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt class="mb5"><strong>강의촬영(실강)</strong>{{ empty($row['StudyStartDate']) ? '' : substr($row['StudyStartDate'],0,4).'년 '. substr($row['StudyStartDate'],5,2).'월' }}</dt>
                                                <dt>
                                                    <strong>강의수</strong> <span class="tx-blue">{{ $row['wUnitLectureCnt'] }}강@if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif
                                                    </span><span class="row-line ml10">|</span>
                                                    <strong>수강기간</strong> <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span>
                                                    <span class="NSK ml10 nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}
                                                    </span> <span class="NSK nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{ $row['wLectureProgressCcdName'] }}</span>
                                                </dt>
                                                <dt>
                                                    @if(empty($row['ProdPriceData']) === false)
                                                        @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                            @if( $price_row['SaleTypeCcd'] == $sale_type_ccd )
                                                                <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </dt>
                                                <dt>
                                                    <a href="#none" class="lecView" onclick="productInfoModal('{{ $row['ProdCode'] }}', '','{{ front_url('/') }}lecture')">
                                                        강좌상세정보</a>
                                                    @if(empty($row['LectureSampleData']) === false)
                                                    <span class="row-line ml10 mr10">|</span>
                                                    <strong>맛보기</strong>
                                                        @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                            @if($loop->index == 1) {{--처음 1개만 노출--}}
                                                                @if(empty($sample_row['wHD']) === false)<a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['ProdCode']}}&u={{$sample_row['wUnitIdx']}}&q=HD", "{{config_item('starplayer_license')}}");' class="tBox black NSK">HIGH</a>@endif
                                                                @if(empty($sample_row['wSD']) === false)<a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['ProdCode']}}&u={{$sample_row['wUnitIdx']}}&q=SD", "{{config_item('starplayer_license')}}");' class="tBox gray NSK">LOW</a>@endif
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </dt>
                                            </dl>
                                            <div class="w-book mb-zero">
                                                <ul>
                                                    @if(empty($row['ProdBookData']) === false)
                                                        @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                                            <li>
                                                                <span class="chk">
                                                                    <label>[{{ $book_row['wSaleCcdName'] }}]</label>
                                                                    <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode']  }}"
                                                                           id="{{ $row['ProdCode'] }}-{{$book_row['ProdBookCode']}}" data-price="{{$book_row['RealSalePrice']}}"
                                                                           data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}"
                                                                           data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                                </span>
                                                                <div class="priceWrap NG">
                                                                    {{ $book_row['BookProvisionCcdName'] }}  <span class="NGR prod-title-{{ $row['ProdCode'] }}-{{ $book_row['ProdBookCode'] }}">{{ $book_row['ProdBookName'] }}</span><br>
                                                                    <p class="NGR">[{{ $book_row['wSaleCcdName'] }}]
                                                                        <span class="tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                                        (↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</p>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li>
                                                            {{ empty($row['ProdBookMemo']) === true ? '※ 별도 구매 가능한 교재가 없습니다.' : $row['ProdBookMemo'] }}
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="lec-btns w100p">
                    <ul>
                        <li><a href="#none" @if($data['IsSalesAble'] != 'Y')onclick="javascript:alert('구매할 수 없는 상품입니다.');" @else name="btn_direct_pay" @endif data-direct-pay="Y" class="btn-purple-line">바로결제</a></li>
                    </ul>
                </div>
            </div>

            <!-- Topbtn -->
            @include('willbes.m.layouts.topbtn')

            <div id="InfoForm" class="willbes-Layer-Black NG"></div>

            {{--장바구니--}}
            <div class="basketBox">
                <div class="MoreBtn"><a><img src="{{ img_url('m/mypage/icon_arrow_off.png') }}"></a></div>
                <div class="basketInfo">
                    <ul class="basketList" id="gather-table"></ul>
                    <div class="basketPrice">
                        <ul>
                            <li>
                                강좌할인금액
                                <span id="lecSale"></span>
                                <span id="lecSalePrice">0원</span>
                            </li>
                            <li>
                                총 주문금액 <span id="totalPrice">0원</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
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
                            num_rate = packSaleArray[j]['DiscRate'];            {{--현재 갯수의 할인율--}}
                                pre_rate = packSaleArray[j]['DiscRate'];        {{--이전 할인율 저장 : 해당갯수의 할인율이 존재하지 않을경우 이전 할인율 적용--}}
                        } else {
                            num_rate = pre_rate;
                            pre_rate = pre_rate;
                        }
                    }
                    tempSaleArray.push({'DiscNum': i, 'DiscRate': num_rate});
                }
            }

            $(".chk_products,.chk_books").change( function() {
                var strType = ($(this).attr('class').indexOf('chk_products') == 0) ? 'lecture' : 'book';
                var strId = $(this).attr("id");
                var strProdCode = $(this).data('prod-code');
                var strTypeTag = (strType == 'lecture') ? '강좌' : '교재';
                var strSalePrice = $(this).data('price');
                var strTitle = (strType == 'lecture') ? $(".prod-title-"+strProdCode).text() :  $(".prod-title-"+strId).text()  ;

                html = "<div id='gather-product-"+strId+"'>\n" +
                            "  <li>"+
                            "       <p>"+
                            "           <span>"+strTypeTag+"</span> "+ strTitle+
                            "       </p>"+
                            "       <strong><div class=\""+strType+"-price\" data-price=\""+strSalePrice+"\">"+addComma(strSalePrice)+"원</div></strong>" +
                            "       <a href=\"#none\" onclick='gather_action(\"remove\",\""+strId+"\")'>삭제</a>"+
                            "   </li>"+
                            "</div>";

                if($(this).is(':checked')) {
                    if(strType == 'lecture') {
                        gather_action('only_remove', strProdCode);    {{--지우고 다시 등록 : 같은상품의 다른 가격으로 인한..--}}
                    }

                    $("#gather-table").append(html);

                    if(strType == 'lecture') {
                        if (sale_count_check() == false) {
                            $(this).prop('checked', false);             {{--갯수를 초과할 경우--}}
                            gather_action('only_remove', strId);    {{--갯수를 초과할 경우--}}
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
                $("#lecSale").text( $sale_rate == 0 ? '' : '('+$sale_rate+'% 할인)' );
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
            $regi_form.on('click', 'a[name="btn_direct_pay"]', function () {
                var $is_direct_pay = $(this).data('direct-pay');
                if($("input:checkbox[name='prod_code_sub[]']:checked").length == 0) {
                    alert("수강하실 강좌를 선택해 주세요.");
                    return;
                }
                addCartNDirectPay($regi_form, $is_direct_pay, 'Y','{{front_url('')}}');
            });
        });
    </script>
@stop