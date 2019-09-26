@extends('willbes.m.layouts.master')

@section('page_title',  '수강신청 > ' .$title)

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
            <input type="hidden" name="learn_pattern" value="adminpack_lecture"/>  {{-- 학습형태 --}}
            <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
            <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

            <div>
                <div class="passProfTabs c_both">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                        <tr>
                            <td>
                                <div class="w-data tx-left widthAutoFull">
                                    <dl class="w-info pt-zero">
                                        <dt>{{ $data['CourseName'] }}</dt>
                                    </dl>
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
                                        {{ number_format($price_row['SalePrice'], 0) }}원<span class="tx-red">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                        ▶ <span class="lec_price tx-blue" data-info="{{$price_row['RealSalePrice']}}">{{ number_format($price_row['RealSalePrice'],0)}}원</span>
                                    @endif
                                @endforeach
                            @endif
                        </li>
                        <li><strong>교재</strong> <span id="bookPrice">0원</span></li>
                        <li class="NGEB"><strong>총 주문금액</strong> <span class="price-total tx-blue" id="totalPrice"></span></li>
                    </ul>
                    <p class="tx-red mt10 NGR">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.</p>
                </div>
                <input type="checkbox" name="prod_code[]" class="chk_products d_none" checked="checked" value="{{ $data['ProdCode'] . ':' . $sale_type_ccd . ':' . $data['ProdCode'] }}" data-prod-code="{{$data['ProdCode']}}" data-parent-prod-code="{{$data['ProdCode']}}" data-group-prod-code="{{$data['ProdCode']}}" data-sale-price="{{$price_row['RealSalePrice']}}"/>
                <input type="hidden" name="sale_status_ccd" id="sale_status_ccd" value="{{$data['SaleStatusCcd']}}">

                <div class="lec-info">
                    <h4 class="NGEB">강좌신청 및 교재선택 {{--<a href="#none" class="NGR">교재정보 전체보기</a>--}}</h4>
                    @if(empty($data_sublist) === false)
                        @foreach($data_sublist as $idx => $sub_row)
                            <div class="w-data tx-left">
                                <dl class="w-info pt-zero">
                                    <dt>{{$sub_row['SubjectName']}}<span class="row-line">|</span>{{$sub_row['ProfNickName']}}</dt>
                                </dl>
                                <div class="w-tit mt10">
                                    {{ $sub_row['ProdName'] }}
                                </div>
                                <div class="w-info tx-gray">
                                    <dl>
                                        <dt class="mb5"><strong>강의수</strong><span class="tx-blue">{{ $sub_row['wUnitLectureCnt'] }}강@if($sub_row['wLectureProgressCcd'] != '105002' && empty($sub_row['wScheduleCount'])==false)/{{$sub_row['wScheduleCount']}}강@endif</span>
                                            <strong class="ml10">정상가</strong>
                                            @if(empty($sub_row['ProdPriceData']) === false)
                                                @foreach($sub_row['ProdPriceData'] as $price_row)
                                                    @if($loop -> index === 1)
                                                        <span class="tx-blue">{{number_format($price_row['SalePrice'],0)}}원</span>
                                                    @endif
                                                @endforeach
                                            @endif
                                            <span class="NSK ml10 nBox n1">{{ $sub_row['MultipleApply'] === "1" ? '무제한' : $sub_row['MultipleApply'].'배수'}}</span> <span class="NSK nBox n{{ substr($sub_row['wLectureProgressCcd'], -1)+1 }}">{{$sub_row['wLectureProgressCcdName']}}</span></dt>
                                        <dt class="mb5">
                                            @if(empty($sub_row['LectureSampleData']) === false)
                                                <strong>맛보기</strong>
                                                @foreach($sub_row['LectureSampleData'] as $sample_idx => $sample_row)
                                                    @if($loop->index == 1) {{--처음 1개만 노출--}}
                                                        @if(empty($sample_row['wHD']) === false)<a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$data['ProdCode']}}&u={{$sample_row['wUnitIdx']}}&q=HD", "{{config_item('starplayer_license')}}");' class="tBox black NSK">HIGH</a>@endif
                                                        @if(empty($sample_row['wSD']) === false)<a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$data['ProdCode']}}&u={{$sample_row['wUnitIdx']}}&q=SD", "{{config_item('starplayer_license')}}");' class="tBox gray NSK">LOW</a>@endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        </dt>
                                    </dl>
                                </div>

                                <div class="w-book mb-zero">
                                    <ul>
                                        @if(empty($sub_row['ProdBookData']) === false)
                                            @foreach($sub_row['ProdBookData'] as $book_idx => $book_row)
                                                <li>
                                                    <span class="chk">
                                                        <label>[{{ $book_row['wSaleCcdName'] }}]</label>
                                                        <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $sub_row['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" data-sale-price="{{ $book_row['RealSalePrice'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                    </span>
                                                    <div class="priceWrap NG">
                                                        {{ $book_row['BookProvisionCcdName'] }}  <span class="NGR">{{ $book_row['ProdBookName'] }}</span><br>
                                                        <p class="NGR">[{{ $book_row['wSaleCcdName'] }}] <span class="tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            ※ 별도 구매 가능한 교재가 없습니다.
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endif
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
                        <li><a href="#" onclick="history.back(-1); return false;" class="btn_black_line">강좌목록</a></li>
                        <li><a href="#none" @if($data['IsSalesAble'] != 'Y')onclick="javascript:alert('구매할 수 없는 상품입니다.');" @else name="btn_cart" @endif  data-direct-pay="N" class="btn-purple">장바구니</a></li>
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
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

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
                price_cal();
            });

            price_cal();        {{--가격 계산--}}

            {{--장바구니, 바로결제 버튼 클릭--}}
            $regi_form.on('click', 'a[name="btn_cart"], a[name="btn_direct_pay"]', function () {
                var $is_direct_pay = $(this).data('direct-pay');
                addCartNDirectPay($regi_form, $is_direct_pay, 'Y','{{front_url('')}}');
            });
        });
    </script>
@stop