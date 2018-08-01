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
                        <col style="width: 135px;"/>
                        <col style="width: 1px;"/>
                        <col style="width: 804px;"/>
                    </colgroup>
                    <tbody>
                    <tr>
                        <td class="w-list tx-center">{{ $data['CourseName'] }} </td>
                        <td class="w-line"><span class="row-line">|</span></td>
                        <td class="pl30">
                            <div class="w-tit">{{$data['ProdName']}}</div>
                            <dl class="w-info">
                                <dt>개강일 : <span class="tx-blue">{{$data['StudyStartDate']}}</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강기간 : <span class="tx-blue">{{$data['StudyPeriod']}}일</span></dt>
                                <dt class="NSK ml15">
                                    <span class="nBox n1">{{$data['MultipleApply']}}배수</span>
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
                <input type="hidden" name="learn_pattern" value="adminpack_lecture"/>  {{-- 학습형태 --}}
                <input type="hidden" name="cart_type" value="on_lecture"/>   {{-- 장바구니 탭 아이디 --}}
                <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

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
                                                    <span class="lec_price tx-light-blue" data-info="{{$price_row['RealSalePrice']}}">{{ number_format($price_row['RealSalePrice'],0)}}원</span>
                                                @endif
                                            @endforeach
                                        @endif
                                </span>
                            <span class="price-img">
                                <img src="{{ img_url('sub/icon_plus.gif') }}">
                            </span>
                        <span>
                        <span class="price-txt">교재</span>
                        <span class="tx-light-blue" id="bookPrice">0원</span>
                    </span>
                        <span class="price-total tx-light-blue" id="totalPrice"></span>
                    </div>
                    <input type="checkbox" name="prod_code[]" class="chk_products d_none" checked="checked" value="{{ $data['ProdCode'] . ':' . $sale_type_ccd . ':' . $data['ProdCode'] }}" data-prod-code="{{$data['ProdCode']}}" data-parent-prod-code="{{$data['ProdCode']}}" data-sale-price="{{$price_row['RealSalePrice']}}"/>
                    <input type="hidden" name="sale_status_ccd" id="sale_status_ccd" value="{{$data['SaleStatusCcd']}}">
                    <div class="willbes-Lec-buyBtn">
                        <ul>
                            <li class="btnAuto180 h36">
                                <button type="submit" name="btn_cart" data-direct-pay="N" class="mem-Btn bg-blue bd-dark-blue">
                                    <span>장바구니</span>
                                </button>
                            </li>
                            <li class="btnAuto180 h36">
                                <button type="submit" name="btn_cart" data-direct-pay="Y" class="mem-Btn bg-white bd-dark-blue">
                                    <span class="tx-light-blue">바로결제</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- willbes-Lec-Package-Price -->

                <div class="willbes-Lec NG c_both">
                    <div class="willbes-Lec-Subject tx-dark-black">강좌구성 및 교재선택</div>
                    <!-- willbes-Lec-Subject -->

                    <div class="willbes-Lec-Line">-</div>
                    <!-- willbes-Lec-Line -->

                    <div class="willbes-Buy-List willbes-Buy-PackageList bd-none">
                        <table cellspacing="0" cellpadding="0" class="lecTable">
                            <colgroup>
                                <col style="width: 760px;">
                                <col style="width: 180px;">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-lectit tx-left" colspan="2">
                                    <span class="w-obj NSK"><div class="pBox p2">패키지</div></span>
                                    <span class="MoreBtn"><a href="#Info">패키지정보 보기 ▼</a></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="w-tit">{{$data['ProdName']}}</div>
                                </td>
                                <td class="w-notice p_re">
                                    <div class="priceWrap">
                                        <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'],0) }}원</span>
                                        <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- lecTable -->
                    </div>
                    <!-- willbes-Buy-PackageList -->

                    <div id="Sticky" class="sticky-Wrap">
                        <div class="sticky-menu select-menu NG">
                            <ul class="tabWrap">
                                <li><a onclick="fnMove('1')" href="#Required">필수과목 ▼</a></li>
                                <li><a onclick="fnMove('2')" href="#Choose">선택과목 ▼</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- sticky-menu -->

                    <!-- pos1 -->
                    <div id="pos1">
                        <div class="willbes-Lec-Subject willbes-Lec-Tit-select NG tx-black">
                            · 필수과목<span class="willbes-Lec-subTit">(과목별 1개 선택)</span><span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span>
                        </div>
                    </div>
                    <table cellspacing="0" cellpadding="0" class="lecWrapTable lec-essential">
                        <colgroup>
                            <col style="width: 75px;">
                            <col style="width: 865px;">
                        </colgroup>
                        <tbody>
                    @php
                        $subGroup_array = [];
                    @endphp
                    @foreach($data_sublist as $idx => $sub_row /*필수 과목*/)
                        @if($sub_row['IsEssential'] === 'Y')
                            @php
                                $subGroup_array[] = $sub_row['SubGroupName'];
                            @endphp
                        <tr>
                            <td class="w-list tx-center bg-light-gray row_td" >{{$sub_row['SubjectName']}}<div class="{{$sub_row['SubGroupName']}} d_none">{{$sub_row['SubGroupName']}}</div></td>
                            <td class="bdb-dark-gray">
                                <div id="lec_table_{{ $sub_row['ProdCode'] }}" class="willbes-Lec-Table">
                                    <table cellspacing="0" cellpadding="0" class="lecTable">
                                        <colgroup>
                                            <col style="width: 50px;">
                                            <col style="width: 60px;">
                                            <col style="width: 575px;">
                                            <col style="width: 180px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="prod-code-sub-{{$sub_row['ProdCode']}}" name="prod-code-sub[]" value="{{$sub_row['ProdCode']}}" class="essSubGroup-{{$sub_row['SubGroupName']}}" onclick="checkOnly('.essSubGroup-{{$sub_row['SubGroupName']}}', this.value);"></td>
                                            <td class="w-img"><img src="{{$sub_row['ProfReferData']['lec_list_img'] or '' }}"></td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt class="w-name">{{$sub_row['wProfName']}}</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="w-tit">{{ $sub_row['ProdName'] }}</dt>
                                                </dl>
                                                <dl class="w-info">
                                                    <dt class="mr20">
                                                        <a href="#none" onclick="productInfoModal('{{ $sub_row['ProdCode'] }}', 'hover1','{{ site_url() }}lecture')">
                                                            <strong>강좌상세정보</strong>
                                                        </a>
                                                    </dt>
                                                    <dt>강의수 : <span class="tx-blue">{{ $sub_row['wUnitLectureCnt'] }}강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정상가 :
                                                        @if(empty($sub_row['ProdPriceData']) === false)
                                                            @foreach($sub_row['ProdPriceData'] as $price_row)
                                                                @if($loop -> index === 1)
                                                                    <span class="tx-blue">{{number_format($price_row['SalePrice'],0)}}원</span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n1">{{$sub_row['MultipleApply']}}배수</span>
                                                        <span class="nBox n{{ substr($sub_row['wLectureProgressCcd'], -1)+1 }}">{{$sub_row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                @if(empty($sub_row['LectureSampleData']) === false)
                                                    <div class="w-sp one"><a href="#none" onclick="openWin('lec_sample_{{ $sub_row['ProdCode'] }}')">맛보기{{count($sub_row['LectureSampleData'])}}</a></div>
                                                    <div id="lec_sample_{{ $sub_row['ProdCode'] }}" class="viewBox">
                                                        <a class="closeBtn" href="#none" onclick="closeWin('lec_sample_{{ $sub_row['ProdCode'] }}')"><img src="{{ img_url('cart/close.png') }}"></a>
                                                        @foreach($sub_row['LectureSampleData'] as $sample_idx => $sample_row)
                                                            <dl class="NSK">
                                                                <dt class="Tit NG">맛보기{{ $sample_idx + 1 }}</dt>
                                                                @if(empty($sample_row['wHD']) === false || empty($sample_row['wWD']) === false) <dt class="tBox t1 black"><a href="{{ $sample_row['wWD'] or $sample_row['wHD'] }}">HIGH</a></dt> @endif
                                                                @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="{{ $sample_row['wSD'] }}">LOW</a></dt> @endif
                                                            </dl>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->

                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                        <colgroup>
                                            <col style="width: 865px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td>

                                                @if(empty($sub_row['ProdBookData']) === false)
                                                    @foreach($sub_row['ProdBookData'] as $book_idx => $book_row)
                                                        <div class="w-sub">
                                                            <span class="w-obj tx-blue tx11">{{ $book_row['BookProvisionCcdName'] }}</span>
                                                            <span class="w-subtit">{{ $book_row['ProdBookName'] }}</span>
                                                            <span class="chk">
                                                            <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003') soldout @elseif($book_row['wSaleCcd'] == '112004') press @endif">
                                                                [{{ $book_row['wSaleCcdName'] }}]
                                                            </label>
                                                                    @if($sub_row['IsCart'] == 'Y')
                                                                        <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" data-sale-price="{{ $book_row['RealSalePrice'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                                    @endif
                                                            </span>
                                                            <span class="priceWrap">
                                                                <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                                <span class="discount">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                                            </span>
                                                        </div>
                                                    @endforeach
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
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    @php
                        if(empty($subGroup_array) === false) {
                            $subGroup_array = array_values(array_unique($subGroup_array));
                        }
                    @endphp
                        </tbody>
                    </table>
                    <!-- pos1 -->

                    <div class="TopBtn">
                        <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                    </div>


                    <!-- pos2 -->
                    <div id="pos2">
                        <div class="willbes-Lec-Subject willbes-Lec-Tit-select NG tx-black">
                            · 선택과목<span class="willbes-Lec-subTit">(선택과목 중 {{$data['PackSelCount']}}개 선택)</span><span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span>
                        </div>
                    </div>
                    <table cellspacing="0" cellpadding="0" class="lecWrapTable lec-choice">
                        <colgroup>
                            <col style="width: 75px;">
                            <col style="width: 865px;">
                        </colgroup>
                        <tbody>
                    @foreach($data_sublist as $idx => $sub_row /*선택 과목*/)
                        @if($sub_row['IsEssential'] === 'N')
                        <tr>
                            <td class="w-list tx-center bg-light-gray row_td2" >{{$sub_row['SubjectName']}}<div class="{{$sub_row['SubGroupName']}} d_none">{{$sub_row['SubGroupName']}}</td>
                            <td class="bdb-dark-gray">
                                <div id="lec_table_{{ $sub_row['ProdCode'] }}" class="willbes-Lec-Table">
                                    <table cellspacing="0" cellpadding="0" class="lecTable">
                                        <colgroup>
                                            <col style="width: 50px;">
                                            <col style="width: 60px;">
                                            <col style="width: 575px;">
                                            <col style="width: 180px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="prod-code-sub-{{$sub_row['ProdCode']}}" name="prod-code-sub[]" value="{{$sub_row['ProdCode']}}" class="choSubGroup"></td>
                                            <td class="w-img"><img src="{{$sub_row['ProfReferData']['lec_list_img'] or '' }}"></td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt class="w-name">{{$sub_row['wProfName']}}</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="w-tit">{{ $sub_row['ProdName'] }}</dt>
                                                </dl>
                                                <dl class="w-info">
                                                    <dt class="mr20">
                                                        <a href="#none" onclick="productInfoModal('{{ $sub_row['ProdCode'] }}', 'hover1','{{ site_url() }}lecture')">
                                                            <strong>강좌상세정보</strong>
                                                        </a>
                                                    </dt>
                                                    <dt>강의수 : <span class="tx-blue">{{ $sub_row['wUnitLectureCnt'] }}강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정상가 :
                                                        @if(empty($sub_row['ProdPriceData']) === false)
                                                            @foreach($sub_row['ProdPriceData'] as $price_row)
                                                                @if($loop -> index === 1)
                                                                    <span class="tx-blue">{{number_format($price_row['SalePrice'],0)}}원</span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n1">{{$sub_row['MultipleApply']}}배수</span>
                                                        <span class="nBox n{{ substr($sub_row['wLectureProgressCcd'], -1)+1 }}">{{$sub_row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                @if(empty($sub_row['LectureSampleData']) === false)
                                                    <div class="w-sp one"><a href="#none" onclick="openWin('lec_sample_{{ $sub_row['ProdCode'] }}')">맛보기{{count($sub_row['LectureSampleData'])}}</a></div>
                                                    <div id="lec_sample_{{ $sub_row['ProdCode'] }}" class="viewBox">
                                                        <a class="closeBtn" href="#none" onclick="closeWin('lec_sample_{{ $sub_row['ProdCode'] }}')"><img src="{{ img_url('cart/close.png') }}"></a>
                                                        @foreach($sub_row['LectureSampleData'] as $sample_idx => $sample_row)
                                                            <dl class="NSK">
                                                                <dt class="Tit NG">맛보기{{ $sample_idx + 1 }}</dt>
                                                                @if(empty($sample_row['wHD']) === false || empty($sample_row['wWD']) === false) <dt class="tBox t1 black"><a href="{{ $sample_row['wWD'] or $sample_row['wHD'] }}">HIGH</a></dt> @endif
                                                                @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="{{ $sample_row['wSD'] }}">LOW</a></dt> @endif
                                                            </dl>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->

                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                        <colgroup>
                                            <col style="width: 865px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td>
                                                @if(empty($sub_row['ProdBookData']) === false)
                                                    @foreach($sub_row['ProdBookData'] as $book_idx => $book_row)
                                                        <div class="w-sub">
                                                            <span class="w-obj tx-blue tx11">{{ $book_row['BookProvisionCcdName'] }}</span>
                                                            <span class="w-subtit">{{ $book_row['ProdBookName'] }}</span>
                                                            <span class="chk">
                                                            <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003') soldout @elseif($book_row['wSaleCcd'] == '112004') press @endif">
                                                                [{{ $book_row['wSaleCcdName'] }}]
                                                            </label>
                                                                @if($sub_row['IsCart'] == 'Y')
                                                                    <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" data-sale-price="{{ $book_row['RealSalePrice'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                                @endif
                                                            </span>
                                                            <span class="priceWrap">
                                                                <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                                <span class="discount">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                                            </span>
                                                        </div>
                                                    @endforeach
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
                            </td>
                        </tr>
                        @endif
                    @endforeach

                        </tbody>
                    </table>
                    <!-- pos2 -->
                    <div id="InfoForm" class="willbes-Layer-Box d2"></div>

                    <div class="TopBtn">
                        <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                    </div>

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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- willbes-Class -->
                </div>
                <!-- willbes-Lec -->
            </form>
        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>

    <!-- willbes-Lec-buyBtn-sm -->
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $buy_layer = $('.willbes-Lec-buyBtn-sm');

        $(document).ready(function() {

            rowspan = function(classname) {
                $("."+classname).each(function () {
                    var rows = $("."+classname+":contains('" + $(this).text() + "')");
                    if (rows.length > 1) {
                        rows.eq(0).attr("rowspan", rows.length);
                        rows.not(":eq(0)").remove();
                    }
                });
            };

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

            // 장바구니, 바로결제 버튼 클릭
            $regi_form.on('click', 'button[name="btn_cart"], button[name="btn_direct_pay"]', function () {
                var $is_direct_pay = $(this).data('direct-pay') || 'N';
                var $cate_code = '{{ $__cfg['CateCode'] }}';

                //필수강좌 체크 여부
                var groupArray = {!!json_encode($subGroup_array)!!};
                for(i=0; i<groupArray.length;i++) {
                    $checked = "";
                    $(".lec-essential").find('.essSubGroup-'+groupArray[i]).each(function (){
                        if ($(this).is(':checked')) {
                            $checked = "Y"
                        }
                    });
                    if($checked == "") {
                        alert("필수 과목은 과목별 1개씩 선택하셔야 합니다.");
                        return;
                    }
                }

                //선택강좌
                $check_cnt = 0;
                $(".lec-choice").find('.choSubGroup').each(function (){
                    if ($(this).is(':checked')) {
                        $check_cnt += 1
                    }
                });

                if($check_cnt != parseInt({{$data['PackSelCount']}})) {
                    alert("선택과목 중 {{$data['PackSelCount']}} 개를 선택하셔야 합니다.");
                    return;
                }

                cartNDirectPay($regi_form, $is_direct_pay, $cate_code);
            });

            rowspan('row_td');  //td rowspan
            rowspan('row_td2');  //td rowspan
            price_cal();            //가격 계산

        });


    </script>
@stop
