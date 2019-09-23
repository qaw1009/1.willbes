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
                                            <dt class="h27"><strong>개강일</strong>{{$data['StudyStartDateYM']}}</dt><br/>
                                            <dt class="h27"><strong>수강기간</strong><span class="tx-blue">{{$data['StudyPeriod']}}일</span>
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
                    <h4 class="NGEB">강좌신청 및 교재선택</h4>
                    <h5>· 필수과목(과목별 1개 선택) {{--<a href="#none" class="NGR">교재정보 전체보기</a>--}}</h5>

                    <div class="lec-choice-pkg">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable lec-essential">
                            <colgroup>
                                <col style="width: 87%;">
                                <col style="width: 13%;">
                            </colgroup>
                            <tbody>

                            @php
                                $subGroup_array = [];
                                $subGroup_cho_array = [];
                            @endphp

                            @if(empty($data_sublist) === false)
                                @php
                                    $last_subGroupName = '';        // 과목 타이틀 묶음을 위한 변수
                                @endphp
                                @foreach($data_sublist as $idx => $sub_row /*필수 과목*/)
                                    @if($sub_row['IsEssential'] === 'Y')
                                        @php
                                                $subGroupName_Re = strlen($sub_row['SubGroupName']) == 1 ? "0".$sub_row['SubGroupName'] : $sub_row['SubGroupName'];
                                                $subGroup_array[] = $subGroupName_Re;
                                        @endphp

                                            @if($last_subGroupName != ($sub_row['SubGroupName'].$sub_row['SubjectName']))
                                                @if($last_subGroupName != '')
                                                {{-- 포문시 같은 그룹일경우 닫기 태그 제어로 인해 앞으로 이동--}}
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr class="replyList willbes-Open-Table">
                                                    <td>
                                                        {{$sub_row['SubjectName']}}
                                                    </td>
                                                    <td class="MoreBtn tx-center">></td>
                                                </tr>
                                                <tr class="willbes-Open-List">
                                                    <td class="w-data tx-left" colspan="2">
                                            @endif
                                                        <div class="w-data-pkg">
                                                            <div class="w-info">
                                                                <span class="chk">
                                                                    <label>[판매]</label>
                                                                    <input type="checkbox" id="prod_code_sub_{{$sub_row['ProdCode']}}" name="prod_code_sub[]" value="{{$sub_row['ProdCode']}}" class="essSubGroup-{{$subGroupName_Re}}" onclick="checkOnly('.essSubGroup-{{$subGroupName_Re}}', this.value);" checked>
                                                                </span>
                                                                <span class="ml10 tx14">{{$sub_row['ProfNickName']}}</span>
                                                            </div>
                                                            <div class="w-tit">
                                                                {{ $sub_row['ProdName'] }}
                                                            </div>
                                                            <dl class="w-info tx-gray">
                                                                <dt>
                                                                    강의수 <span class="tx-blue">{{ $sub_row['wUnitLectureCnt'] }}강@if($sub_row['wLectureProgressCcd'] != '105002' && empty($sub_row['wScheduleCount'])==false)/{{$sub_row['wScheduleCount']}}강@endif</span><span class="row-line ml10">|</span>
                                                                    정상가 @if(empty($sub_row['ProdPriceData']) === false)
                                                                        @foreach($sub_row['ProdPriceData'] as $price_row)
                                                                            @if($loop -> index === 1)
                                                                                <span class="tx-blue">{{number_format($price_row['SalePrice'],0)}}원</span>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                    <span class="NSK ml10 nBox n1">{{ $sub_row['MultipleApply'] === "1" ? '무제한' : $sub_row['MultipleApply'].'배수'}}</span>
                                                                    <span class="NSK nBox n{{ substr($sub_row['wLectureProgressCcd'], -1)+1 }}">{{$sub_row['wLectureProgressCcdName']}}</span>
                                                                </dt>
                                                                <dt>
                                                                    <a href="#none" class="lecView" onclick="productInfoModal('{{ $sub_row['ProdCode'] }}', '','{{ front_url('/') }}lecture')">
                                                                        강좌상세정보</a> <span class="row-line ml10 mr10">|</span>
                                                                    <strong>맛보기</strong>
                                                                    @if(empty($sub_row['LectureSampleData']) === false)
                                                                        @foreach($sub_row['LectureSampleData'] as $sample_idx => $sample_row)
                                                                            @if($loop->index == 1) {{--처음 1개만 노출--}}
                                                                                @if(empty($sample_row['wHD']) === false)<a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');" class="tBox black NSK">HIGH</a>@endif
                                                                                @if(empty($sample_row['wSD']) === false)<a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');" class="tBox gray NSK">LOW</a>@endif
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </dt>
                                                            </dl>
                                                            <div class="w-book mb-zero">
                                                                <ul>
                                                                    @if(empty($sub_row['ProdBookData']) === false)
                                                                        @foreach($sub_row['ProdBookData'] as $book_idx => $book_row)
                                                                            <li>
                                                                                <span class="chk">
                                                                                    <label> [{{ $book_row['wSaleCcdName'] }}]</label>
                                                                                    <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $sub_row['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" data-sale-price="{{ $book_row['RealSalePrice'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                                                </span>
                                                                                <div class="priceWrap NG">
                                                                                    {{ $book_row['BookProvisionCcdName'] }}  <span class="NGR">{{ $book_row['ProdBookName'] }}</span><br>
                                                                                    <p class="NGR">[{{ $book_row['wSaleCcdName'] }}] <span class="tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</p>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach
                                                                    @else
                                                                        <li>
                                                                            ※ 별도 구매 가능한 교재가 없습니다.
                                                                        </li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                            {{-- 위에서 닫기 처리
                                                    </td>
                                                </tr>
                                                --}}
                                        @php
                                            $last_subGroupName = $sub_row['SubGroupName'].$sub_row['SubjectName']
                                        @endphp
                                    @endif
                                @endforeach
                            @endif
                            @php
                                if(empty($subGroup_array) === false) {
                                    $subGroup_array = array_values(array_unique($subGroup_array));
                                }
                            @endphp
                            </tbody>
                        </table>
                    </div>


                    <h5>· 선택과목(선택과목 중 {{$data['PackSelCount']}}개 선택) {{--<a href="#none" class="NGR">교재정보 전체보기</a>--}}</h5>
                    <div class="lec-choice-pkg">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable lec-choice">
                            <colgroup>
                                <col style="width: 87%;">
                                <col style="width: 13%;">
                            </colgroup>
                            <tbody>

                            @if(empty($data_sublist) === false)
                                @php
                                    $last_subGroupName = '';        // 과목 타이틀 묶음을 위한 변수
                                @endphp
                                @foreach($data_sublist as $idx => $sub_row /*선택 과목*/)
                                    @if($sub_row['IsEssential'] === 'N')
                                        @php
                                            $subGroupName_Re = strlen($sub_row['SubGroupName']) == 1 ? "0".$sub_row['SubGroupName'] : $sub_row['SubGroupName'];
                                            $subGroup_cho_array[] = $sub_row['SubGroupName'];
                                        @endphp

                                        @if($last_subGroupName != ($sub_row['SubGroupName'].$sub_row['SubjectName']))
                                            @if($last_subGroupName != '')
                                            {{-- 포문시 같은 그룹일경우 닫기 태그 제어로 인해 앞으로 이동--}}
                                                </td>
                                            </tr>
                                            @endif
                                            <tr class="replyList willbes-Open-Table">
                                                <td>
                                                   {{$sub_row['SubjectName']}}
                                                </td>
                                                <td class="MoreBtn tx-center">></td>
                                            </tr>
                                            <tr class="willbes-Open-List">
                                                <td class="w-data tx-left" colspan="2">
                                        @endif
                                                    <div class="w-data-pkg">
                                                        <div class="w-info">
                                                            <span class="chk">
                                                                <label>[판매]</label>
                                                                <input type="checkbox" id="prod_code_sub_{{$sub_row['ProdCode']}}" name="prod_code_sub[]" value="{{$sub_row['ProdCode']}}" class="choSubGroup choSubGroup-{{$subGroupName_Re}}" onclick="checkOnly('.choSubGroup-{{$subGroupName_Re}}', this.value);" >
                                                            </span>
                                                            <span class="ml10 tx14">{{$sub_row['ProfNickName']}} </span>
                                                        </div>
                                                        <div class="w-tit">
                                                            {{ $sub_row['ProdName'] }}
                                                        </div>
                                                        <dl class="w-info tx-gray">
                                                            <dt>
                                                                강의수 <span class="tx-blue">{{ $sub_row['wUnitLectureCnt'] }}강@if($sub_row['wLectureProgressCcd'] != '105002' && empty($sub_row['wScheduleCount'])==false)/{{$sub_row['wScheduleCount']}}강@endif</span><span class="row-line ml10">|</span>
                                                                정상가 @if(empty($sub_row['ProdPriceData']) === false)
                                                                    @foreach($sub_row['ProdPriceData'] as $price_row)
                                                                        @if($loop -> index === 1)
                                                                            <span class="tx-blue">{{number_format($price_row['SalePrice'],0)}}원</span>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                                <span class="NSK ml10 nBox n1">{{ $sub_row['MultipleApply'] === "1" ? '무제한' : $sub_row['MultipleApply'].'배수'}}</span>
                                                                <span class="NSK nBox n{{ substr($sub_row['wLectureProgressCcd'], -1)+1 }}">{{$sub_row['wLectureProgressCcdName']}}</span>
                                                            </dt>
                                                            <dt>
                                                                <a href="#none" class="lecView" onclick="productInfoModal('{{ $sub_row['ProdCode'] }}', '','{{ front_url('/') }}lecture')">
                                                                    강좌상세정보</a> <span class="row-line ml10 mr10">|</span>
                                                                <strong>맛보기</strong>
                                                                @if(empty($sub_row['LectureSampleData']) === false)
                                                                    @foreach($sub_row['LectureSampleData'] as $sample_idx => $sample_row)
                                                                        @if($loop->index == 1) {{--처음 1개만 노출--}}
                                                                            @if(empty($sample_row['wHD']) === false)<a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');" class="tBox black NSK">HIGH</a>@endif
                                                                            @if(empty($sample_row['wSD']) === false)<a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');" class="tBox gray NSK">LOW</a>@endif
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </dt>
                                                        </dl>
                                                        <div class="w-book mb-zero">
                                                            <ul>
                                                                @if(empty($sub_row['ProdBookData']) === false)
                                                                    @foreach($sub_row['ProdBookData'] as $book_idx => $book_row)
                                                                        <li>
                                                                            <span class="chk">
                                                                                <label> [{{ $book_row['wSaleCcdName'] }}]</label>
                                                                                <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $sub_row['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" data-sale-price="{{ $book_row['RealSalePrice'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                                            </span>
                                                                            <div class="priceWrap NG">
                                                                                {{ $book_row['BookProvisionCcdName'] }}  <span class="NGR">{{ $book_row['ProdBookName'] }}</span><br>
                                                                                <p class="NGR">[{{ $book_row['wSaleCcdName'] }}] <span class="tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</p>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                @else
                                                                    <li>
                                                                        ※ 별도 구매 가능한 교재가 없습니다.
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                        {{-- 위에서 닫기 처리
                                            </td>
                                        </tr>
                                        --}}
                                        @php
                                            $last_subGroupName = $sub_row['SubGroupName'].$sub_row['SubjectName']
                                        @endphp
                                    @endif
                                @endforeach
                            @endif
                            @php
                                if(empty($subGroup_cho_array) === false) {
                                    $subGroup_cho_array = array_values(array_unique($subGroup_cho_array));
                                }
                            @endphp
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
                        <li><a href="#" onclick="history.back(-1); return false;" class="btn_black_line">강좌목록</a></li>
                        <li><a href="#none" @if($data['IsSalesAble'] != 'Y')onclick="javascript:alert('구매할 수 없는 상품입니다.');" @else name="btn_cart" @endif  data-direct-pay="N" class="btn-purple">장바구니</a></li>
                        <li><a href="#none" @if($data['IsSalesAble'] != 'Y')onclick="javascript:alert('구매할 수 없는 상품입니다.');" @else name="btn_direct_pay" @endif data-direct-pay="Y" class="btn-purple-line">바로결제</a></li>
                    </ul>
                </div>
            </div>

            <!-- Topbtn -->
            @include('willbes.m.layouts.topbtn')

            <div id="InfoForm" class="willbes-Layer-Black NG"></div>
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

            {{--강좌상품 선택/해제--}}
            $regi_form.on('click', 'input[name="prod_code_sub[]"]', function() {
                if ($(this).is(':checked') === false) {
                    {{--연계도서상품 체크 해제--}}
                    $regi_form.find('input[name="prod_code[]"][data-parent-prod-code="' + $(this).val() + '"]').prop('checked', false);
                }
            });

            {{--교재상품 선택/해제--}}
            $regi_form.on('click', '.chk_books', function() {
                if ($(this).is(':checked') === true) {
                    if ($(this).hasClass('chk_books') === true) {
                        {{--수강생 교재 체크--}}
                        if (checkStudentBook($regi_form, $(this)) === false) {
                            return;
                        }
                    }
                }
                price_cal();
            });

            {{--장바구니, 바로결제 버튼 클릭--}}
            $regi_form.on('click', 'a[name="btn_cart"], a[name="btn_direct_pay"]', function () {
                var $is_direct_pay = $(this).data('direct-pay');

                {{--필수강좌 체크 여부--}}
                var groupArray = {!!json_encode($subGroup_array)!!};
                for(i=0; i<groupArray.length;i++) {
                    $checked = "";
                    $(".lec-essential").find('.essSubGroup-'+groupArray[i]).each(function (){
                        if ($(this).is(':checked')) {
                            $checked = "Y"
                        }
                    });
                    if($checked === "") {
                        alert("필수 과목은 과목별 1개씩 선택하셔야 합니다.");
                        return;
                    }
                }

                {{--선택강좌--}}
                $check_cnt = 0;
                $(".lec-choice").find('.choSubGroup').each(function (){
                    if ($(this).is(':checked')) {
                        $check_cnt += 1
                    }
                });
                if($check_cnt !== parseInt({{$data['PackSelCount']}})) {
                    alert("선택과목 중 {{$data['PackSelCount']}} 개를 선택하셔야 합니다.");
                    return;
                }
                addCartNDirectPay($regi_form, $is_direct_pay, 'Y','{{front_url('')}}');
            });

            {{--필수과목 같은 그룹내 2개이상의 강의 일 경우 체크박스 해제--}}
            var groupArray = {!!json_encode($subGroup_array)!!};
            for(i=0; i<groupArray.length;i++) {
                $checked_group = "";
                $ess_checked_count = 0;
                $(".lec-essential").find('.essSubGroup-'+groupArray[i]).each(function (){
                    if ($(this).is(':checked')) {
                        $ess_checked_count += 1;
                        if($ess_checked_count > 1) {
                            $(".lec-essential").find('.essSubGroup-'+groupArray[i]).prop("checked", false);
                        }
                    }
                });
            }

            price_cal();
        });

    </script>
@stop
