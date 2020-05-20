@extends('willbes.m.layouts.master')

@section('page_title',  '수강신청 > 기간제패키지' )

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
            <input type="hidden" name="learn_pattern" value="{{$learn_pattern}}"/>  {{-- 학습형태 --}}
            <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
            <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}
            <input type="hidden" name="ca_idx" id="ca_idx" value=""/>    {{-- 인증 여부 --}}

            <div>
                <div class="passProfTabs c_both">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                        <tr>
                            <td>
                                <div class="w-data tx-left widthAutoFull">
                                    <div class="w-tit tx-blue">
                                        {{$data['ProdName']}}
                                    </div>
                                    <div class="w-info tx-gray">
                                        <dl>
                                            <dt class="mb5"><strong>개강일</strong>{{$data['StudyStartDateYM']}}</dt><br/>
                                            <dt class="mb5"><strong>수강기간</strong><span class="tx-blue">{{$data['StudyPeriod']}}일</span>
                                                <span class="NSK ml10 nBox n1">{{ $data['MultipleApply'] === "1" ? '무제한' : $data['MultipleApply'].'배수'}}</span> </dt>
                                        </dl>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="priceBox">
                    <ul>
                        <li><strong>패키지</strong>
                            @if(empty($data['ProdPriceData'] ) === false)
                                @foreach($data['ProdPriceData']  as $price_row)
                                    @if($loop->index === 1)
                                        @php
                                            $sale_type_ccd = $price_row['SaleTypeCcd'];
                                        @endphp
                                        {{ number_format($price_row['SalePrice'], 0) }}원<span class="tx-red">(↓{{ number_format($price_row['SaleRate'], 0) . $price_row['SaleRateUnit'] }})</span>
                                        ▶ <span class="lec_price tx-blue" data-info="{{$price_row['RealSalePrice']}}">{{ number_format($price_row['RealSalePrice'],0)}}원</span>
                                    @endif
                                @endforeach
                            @endif
                        </li>
                        <li class="NGEB"><strong>총 주문금액</strong> <span class="price-total tx-blue" >{{ number_format($price_row['RealSalePrice'],0)}}원</span></li>
                    </ul>
                </div>
                <input type="checkbox" name="prod_code[]" class="chk_products d_none" checked="checked" value="{{ $data['ProdCode'] . ':' . $sale_type_ccd . ':' . $data['ProdCode'] }}" data-prod-code="{{$data['ProdCode']}}" data-parent-prod-code="{{$data['ProdCode']}}" data-group-prod-code="{{$data['ProdCode']}}" data-sale-price="{{$price_row['RealSalePrice']}}"/>
                <input type="hidden" name="sale_status_ccd" id="sale_status_ccd" value="{{$data['SaleStatusCcd']}}">

                <div class="lec-info">
                    <h4 class="NGEB">강좌구성</h4>
                    <div class="lec-choice-pkg">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                            <tbody>
                            <tr>
                                <td class="w-data tx-left">

                                    @if(empty($data_sublist) === false)
                                        @foreach($data_sublist as $idx => $sub_row)
                                            <div class="w-data-pkg">
                                                <div class="w-info">
                                                    <span>{{$sub_row['SubjectName']}} {{$sub_row['ProfNickName']}}</span>
                                                </div>
                                                <div class="w-tit mb0">
                                                    {{ $sub_row['ProdName'] }}
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="lec-info NGR">
                    <h4 class="NGEB">패키지정보</h4>
                    <div class="lec-info-pkg">
                        @if(empty($data['contents']) === false)
                            @foreach($data['contents'] as $idx => $row)
                                @if($row['ContentTypeCcd'] != '633004')
                                    <strong>패키지{{ $row['ContentTypeCcdName'] }} @if($row['ContentTypeCcd'] == '633001')(필독) @endif</strong><br>
                                    {!! $row['Content'] !!}<br><br>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="lec-btns">
                    <ul>
                        <li><a href="#none" @if($data['IsSalesAble'] != 'Y')onclick="javascript:alert('구매할 수 없는 상품입니다.');" @else name="btn_direct_pay" @endif data-direct-pay="Y" class="btn-purple-line">바로결제</a></li>
                    </ul>
                </div>
            </div>

            <!-- Topbtn -->
            @include('willbes.m.layouts.topbtn')
        </form>
    </div>
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 장바구니, 바로결제 버튼 클릭
            $regi_form.on('click', 'a[name="btn_direct_pay"]', function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
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