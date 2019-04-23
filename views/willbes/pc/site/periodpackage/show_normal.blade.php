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
            <div class="willbes-Package-Detail NG tx-black">
                <table cellspacing="0" cellpadding="0" class="packageDetailTable">
                    <colgroup>
                        <col style="width: 940px;"/>
                    </colgroup>
                    <tbody>
                    <tr>
                        <td class="pl30">
                            <div class="w-tit">{{$data['ProdName']}}</div>
                            <dl class="w-info">
                                <dt>개강일 : <span class="tx-blue">{{$data['StudyStartDateYM']}}</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강기간 : <span class="tx-blue">{{$data['StudyPeriod']}}일</span></dt>
                                <dt class="NSK ml15">
                                    <span class="nBox n1">{{ $data['MultipleApply'] === "1" ? '무제한' : $data['MultipleApply'].'배수'}}</span>
                                </dt>
                            </dl>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- willbes-Package-Detail -->
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
                <input type="hidden" name="learn_pattern" value="{{$learn_pattern}}"/>  {{-- 학습형태 --}}
                <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}
                <input type="hidden" name="ca_idx" id="ca_idx" value=""/>    {{-- 인증 여부 --}}

                <div class="willbes-Lec-Package-Price p_re">
                    <div class="total-PriceBox NG">
                        <span class="price-tit">총 주문금액</span>
                        <span class="row-line">|</span>
                        <span>
                            <span class="price-txt">패키지</span>
                            @if(empty($data['ProdPriceData'] ) === false)
                                @foreach($data['ProdPriceData']  as $price_row)
                                    @if($loop -> index === 1)
                                        @php
                                            $sale_type_ccd = $price_row['SaleTypeCcd'];
                                        @endphp
                                        <span class="tx-dark-gray">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                        <span class="tx-pink pl10">(↓{{ number_format($price_row['SaleRate'], 0) . $price_row['SaleRateUnit'] }})</span>
                                        <span class="pl10"> ▶ </span>
                                        <span class="lec_price tx-light-blue pl10" data-info="{{$price_row['RealSalePrice']}}">{{ number_format($price_row['RealSalePrice'],0)}}원</span>
                                    @endif
                                @endforeach
                            @endif
                        </span>
                        <span class="price-total tx-light-blue" id="totalPrice"></span>
                    </div>
                    <input type="checkbox" name="prod_code[]" class="chk_products d_none" checked="checked" value="{{ $data['ProdCode'] . ':' . $sale_type_ccd . ':' . $data['ProdCode'] }}" data-prod-code="{{$data['ProdCode']}}" data-parent-prod-code="{{$data['ProdCode']}}" data-group-prod-code="{{$data['ProdCode']}}" data-sale-price="{{$price_row['RealSalePrice']}}"/>
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

                <a name="Info"></a>
                <div class="willbes-Class c_both">
                    <div class="willbes-Lec-Tit NG tx-black">패키지정보</div>
                    <div class="classInfoTable GM">
                        <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                            <colgroup>
                                <col style="width: 140px;">
                                <col width="*">
                            </colgroup>
                            <tbody>
                            @if(empty($data['contents']) === false)
                                @foreach($data['contents'] as $idx => $row)
                                    @if($row['ContentTypeCcd'] != '633004')
                                        <tr>
                                            <td class="w-list bg-light-white">
                                                패키지{{ $row['ContentTypeCcdName'] }}
                                                @if($row['ContentTypeCcd'] == '633001')
                                                    <br/><span class="tx-red">(필독)</span>
                                                @endif
                                            </td>
                                            <td class="w-data tx-left pl25">
                                                {!! $row['Content'] !!}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- willbes-Class -->

                <div class="willbes-Lec NG c_both">
                    <div class="willbes-Lec-Subject tx-dark-black">강좌구성</div>
                    <!-- willbes-Lec-Subject -->

                    <div class="willbes-Lec-Line">-</div>
                    <!-- willbes-Lec-Line -->

                    <div class="willbes-Buy-List willbes-Buy-PackageList">
                        <table cellspacing="0" cellpadding="0" class="lecTable">
                            <colgroup>
                                <col style="width: 760px;">
                                <col style="width: 180px;">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-lectit tx-left" colspan="2">
                                    <span class="w-obj NSK"><div class="pBox p2">패키지</div></span>
                                    <!--span class="MoreBtn"><a href="#Info">패키지정보 보기 ▼</a></span-->
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="w-tit">{{$data['ProdName']}}</div>
                                </td>
                                <td class="w-notice p_re">
                                    <div class="priceWrap">
                                        <span class="price">{{ number_format($price_row['RealSalePrice'],0) }}원</span><br>
                                        <span class="discount tx-blue">(↓{{ number_format($price_row['SaleRate'], 0) . $price_row['SaleRateUnit'] }})</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- lecTable -->
                    </div>
                    <!-- willbes-Buy-PackageList -->

                    <div class="willbes-Lec-Table-Overflow">
                        <div class="willbes-Lec-Table bdb-none">
                            <table cellspacing="0" cellpadding="0" class="lecTable lecTable15 under-gray">
                                <colgroup>
                                    <col style="width: 95px;">
                                    <col style="width: 85px;">
                                    <col style="width: 760px;">
                                </colgroup>
                                <tbody>
                                    @if(empty($data_sublist) === false)
                                        @foreach($data_sublist as $idx => $sub_row)
                                            <tr id="lec_table_{{ $sub_row['ProdCode'] }}">
                                                <td class="w-list">{{$sub_row['SubjectName']}}</td>
                                                <td class="w-img"><img src="{{$sub_row['ProfReferData']['lec_list_img'] or '' }}"></td>
                                                <td class="w-data tx-left pl25">
                                                    <dl class="w-info">
                                                        <dt class="w-name">{{$sub_row['ProfNickName']}}</dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt class="w-tit">{{ $sub_row['ProdName'] }}</dt>
                                                    </dl>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
  
                    <div class="TopBtn">
                        <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                    </div>
                    
                </div>
                <!-- willbes-Lec -->
            </form>
        </div>
        {!! banner('수강신청_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
    <!-- willbes-Lec-buyBtn-sm -->
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $buy_layer = $('.willbes-Lec-buyBtn-sm');

        $(document).ready(function() {

            price_cal = function() {
                var $lecPrice_total = 0;
                var $bookPrice_total = 0;
                var $price_total = 0;

                $regi_form.find('.lec_price').each(function (){
                    $lecPrice_total += parseInt($(this).data('info'));
                });

                $regi_form.find('.chk_books').each(function (index, item){
                    if ($(this).is(':checked')) {
                        $bookPrice_total += $(this).data('sale-price');
                    }
                });

                $price_total = $lecPrice_total + $bookPrice_total;

                $("#bookPrice").text(addComma($bookPrice_total)+'원');
                $("#totalPrice").text(addComma($price_total)+'원');
            };

            // 상품 선택/해제
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

            price_cal();        //가격 계산

            // 장바구니, 바로결제 버튼 클릭
            $regi_form.on('click', 'button[name="btn_cart"], button[name="btn_direct_pay"]', function () {
                if(certCheck() == false) {return;}
                var $is_direct_pay = $(this).data('direct-pay');
                cartNDirectPay($regi_form, $is_direct_pay, 'Y');
            });
        });

        function certCheck() {
            var is_ok = false;
            var ca_idx = '';
            var url = frontUrl('/certApply/checkCertApply');
            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                'prod_code' : $regi_form.find('input[name="prod_code[]"]:checked').data('prod-code')
            };
            sendAjax(url, data, function(ret) {
                ca_idx = ret.ret_data['CaIdx'];
                is_ok = true;
            }, showAlertError, false, 'POST');
            $("#ca_idx").val(ca_idx);
            if(is_ok) {return;} else {return false;}
        }
    </script>
@stop
