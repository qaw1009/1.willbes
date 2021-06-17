@if(empty($group_num))
    @php $group_num = 1; @endphp
@endif

@if(empty($arr_base['display_product_data'][$group_num]) === false)
@php $learn_pattern = 'on_lecture'; @endphp
<form id="dp_prod_form{{$group_num}}" method="POST" onsubmit="return false;" novalidate="">
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
    <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

    <div id="event_display_product_list{{$group_num}}" class="proLecList">
        @foreach($arr_base['display_product_data'][$group_num] as $ccd => $val)
            @if($pattern_ccd[$ccd] == 'only') {{-- 단과강좌 --}}
                <div class="proLecList">
                    {{--<h1 class="group_h1">단과 강좌</h1>--}}
                    <div class="tx-red tx-left tx14">※ 정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</div>
                    <div class="willbes-Lec-Table mt20">
                        @if(empty($val) === false)
                            @foreach($val as $key => $row)
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col width="120px;">
                                        <col width="120px;">
                                        <col width="*">
                                        <col width="250px;">
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <td rowspan="2" class="w-name">{{$row['CourseName']}}<br/>{{$row['SubjectName']}}<br/><span class="tx-blue">{{$row['ProfNickName']}}</span></td>
                                        <td rowspan="2" class="pt20"><img src="{{$row['ProfReferData']['lec_list_img']}}" alt="{{$row['ProfNickName']}}"></td>
                                        <td rowspan="2" class="w-data tx-left p_re">
                                            <div class="w-tit">
                                                <a href="{{ site_url('/lecture/show/cate/').$row['CateCode'].'/pattern/only/prod-code/'.$row['ProdCode'] }}">{{$row['ProdName']}}</a>
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : {{ empty($row['StudyStartDate']) ? '' : substr($row['StudyStartDate'],0,4).'년 '. substr($row['StudyStartDate'],5,2).'월' }}</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">{{ $row['wUnitLectureCnt'] }}강@if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span></dt>
                                            </dl>
                                            <dl class="w-info mt10">
                                                <dt class="NSK">
                                                    <span class="nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                    <span class="nBox n2">{{ $row['wLectureProgressCcdName'] }}</span>
                                                </dt>
                                                @if(empty($row['LectureSampleData']) === false)
                                                    @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                        <dt class="Tit NG ml10 mr10">맛보기{{ $sample_idx + 1 }}</dt>
                                                        @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                                        @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                                    @endforeach
                                                @endif
                                                @if($row['IsCart'] == 'N')
                                                    <div class="tx-red c_both">※ 바로결제만 가능한 상품입니다. 상세 페이지에서 결제해주세요.</div>
                                                @endif
                                            </dl>
                                        </td>
                                        <td>
                                            <ul class="lecBuyBtns tx-rgiht @if($row['IsCart'] == 'N') visi-hidden @endif">
                                                <li class="btnCart">
                                                    <button type="button" name="btn_cart" data-direct-pay="N" data-is-redirect="N" data-is-free="N" class="bg-deep-gray">장바구니</button>
                                                </li>
                                                <li class="btnBuy">
                                                    <button type="button" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y" data-is-free="N" class="mem-Btn bg-blue">바로결제</button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="valign-base">
                                            @if(empty($row['ProdPriceData']) === false)
                                                @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                    <ul class="priceWrap">
                                                        <li>
                                                            @if($row['IsCart'] == 'Y')
                                                                <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="goods_chk chk_products" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/>
                                                            @endif
                                                            <label>
                                                                <span class="select">[{{ $price_row['SaleTypeCcdName'] }}]</span>
{{--                                                                <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>--}}
{{--                                                                <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>--}}

                                                                @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                                    <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                                    <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span>
                                                                @endif
                                                                <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col width="120px">
                                        <col width="750px">
                                        <col width="250px">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                                @if(empty($row['ProdBookData']) === false)
                                                    @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                                        <div class="w-sub">
                                                            <span class="w-obj tx-blue tx11">{{ $book_row['BookProvisionCcdName'] }}</span>
                                                            <span class="w-subtit">{{ $book_row['ProdBookName'] }}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="priceWrap">
                                                    @if(empty($row['ProdBookData']) === false)
                                                        @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                                            <li>
                                                                @if($row['IsCart'] == 'Y')
                                                                    <input type="checkbox" name="prod_code[]" class="goods_chk chk_books" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                                @endif
                                                                <label>
                                                                    <span class="select">[{{ $book_row['wSaleCcdName'] }}]</span>
                                                                    <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                                    <span class="discount">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                                                </label>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endforeach
                        @endif
                    </div>
                </div>
            @elseif($pattern_ccd[$ccd] == 'package') {{-- 운영자 패키지 --}}
                <div class="proLecPkg">
                    {{--<h1 class="group_h1">운영자 패키지 강좌</h1>--}}
                    <div class="tx-red tx-left tx14">※ 정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</div>
                    <div class="willbes-Lec-Table mt20">
                        <table cellspacing="0" cellpadding="0" class="lecTable">
                            <colgroup>
                                <col width="180px;">
                                <col width="*">
                                <col width="200px;">
                                <col width="120px;">
                            </colgroup>
                            <tbody>
                            @if(empty($val) === false)
                                @foreach($val as $key => $row)
                                    <tr>
                                        <td>{{$row['CourseName']}}</td>
                                        <td class="w-data tx-left">
                                            <div class="w-tit">
                                                <a href="{{ site_url('/package/show/cate/').$__cfg['CateCode'].'/pack/'.$row['PackTypeCcd'].'/prod-code/'.$row['ProdCode'] }}">{{$row['ProdName']}}</a>
                                            </div>
                                            <dl class="w-info">
                                                <dt>개강일 : <span class="tx-blue">{{$row['StudyStartDateYM']}}</span> <span class="row-line">|</span>수강기간 : <span class="tx-blue">{{$row['StudyPeriod']}}일</span></dt>
                                                <dt class="NSK">
                                                    <span class="nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                </dt>
                                            </dl>
                                        </td>
                                        @if(empty($row['ProdPriceData'] ) === false)
                                            @foreach($row['ProdPriceData'] as $price_row)
                                                @if($loop -> index === 1)
                                                    <td class="strong"><span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>  (↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</td>
                                                    <td><a href="{{ site_url('/package/show/cate/').$__cfg['CateCode'].'/pack/'.$row['PackTypeCcd'].'/prod-code/'.$row['ProdCode'] }}" class="lecbuy">수강신청</a></td>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            @elseif($pattern_ccd[$ccd] == 'period') {{-- 기간제 패키지 --}}
                <div class="proLecPkg">
                    {{--<h1 class="group_h1">기간제 패키지 강좌</h1>--}}
                    <div class="tx-red tx-left tx14">※ 정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</div>
                    <div class="willbes-Lec-Table mt20">
                        <table cellspacing="0" cellpadding="0" class="lecTable">
                            <colgroup>
                                <col width="*">
                                <col width="200px;">
                                <col width="120px;">
                            </colgroup>
                            <tbody>
                                @if(empty($val) === false)
                                    @foreach($val as $key => $row)
                                        <tr>
                                            <td class="w-data tx-left">
                                                <div class="w-tit">
                                                    <a href="{{ site_url('/periodPackage/show/cate/').$__cfg['CateCode'].'/pack/'.$row['PackTypeCcd'].'/prod-code/'.$row['ProdCode'] }}">{{$row['ProdName']}}</a>
                                                </div>
                                                <dl class="w-info">
                                                    <dt>개강일 : <span class="tx-blue">{{$row['StudyStartDateYM']}}</span> <span class="row-line">|</span>수강기간 : <span class="tx-blue">{{$row['StudyPeriod']}}일</span></dt>
                                                    <dt class="NSK">
                                                        <span class="nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            @if(empty($row['ProdPriceData'] ) === false)
                                                @foreach($row['ProdPriceData'] as $price_row)
                                                    @if($loop -> index === 1)
                                                        <td class="strong"><span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>  (↓{{ number_format($price_row['SalePrice'] - $price_row['RealSalePrice'],0) }}원)</td>
                                                        <td><a href="{{ site_url('/periodPackage/show/cate/').$__cfg['CateCode'].'/pack/'.$row['PackTypeCcd'].'/prod-code/'.$row['ProdCode'] }}" class="lecbuy">수강신청</a></td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            @elseif($pattern_ccd[$ccd] == 'free') {{-- 무료강좌 --}}
                @php $learn_pattern = 'on_free_lecture'; @endphp
                <div class="proLecList">
                    {{--<h1 class="group_h1">단과 강좌</h1>--}}
                    <div class="tx-red tx-left tx14">※ 정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</div>
                    <div class="willbes-Lec-Table mt20">
                        @if(empty($val) === false)
                            @foreach($val as $key => $row)
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col width="120px;">
                                        <col width="120px;">
                                        <col width="*">
                                        <col width="250px;">
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <td rowspan="2" class="w-name">{{$row['CourseName']}}<br/>{{$row['SubjectName']}}<br/><span class="tx-blue">{{$row['ProfNickName']}}</span></td>
                                        <td rowspan="2" class="pt20"><img src="{{$row['ProfReferData']['lec_list_img']}}" alt="{{$row['ProfNickName']}}"></td>
                                        <td rowspan="2" class="w-data tx-left p_re">
                                            <div class="w-tit">
                                                <a href="{{ site_url('/lecture/show/cate/').$row['CateCode'].'/pattern/free/prod-code/'.$row['ProdCode'] }}">{{$row['ProdName']}}</a>
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : {{ empty($row['StudyStartDate']) ? '' : substr($row['StudyStartDate'],0,4).'년 '. substr($row['StudyStartDate'],5,2).'월' }}</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">{{ $row['wUnitLectureCnt'] }}강@if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false)/{{$row['wScheduleCount']}}강@endif</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span></dt>
                                            </dl>
                                            <dl class="w-info mt10">
                                                <dt class="NSK">
                                                    <span class="nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                    <span class="nBox n2">{{ $row['wLectureProgressCcdName'] }}</span>
                                                </dt>
                                                @if(empty($row['LectureSampleData']) === false)
                                                    @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                        <dt class="Tit NG ml10 mr10">맛보기{{ $sample_idx + 1 }}</dt>
                                                        @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                                        @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                                    @endforeach
                                                @endif
                                                @if($row['IsCart'] == 'N')
                                                    <div class="tx-red c_both">※ 바로결제만 가능한 상품입니다. 상세 페이지에서 결제해주세요.</div>
                                                @endif
                                            </dl>
                                        </td>
                                        <td>
                                            <ul class="lecBuyBtns tx-rgiht @if($row['IsCart'] == 'N') visi-hidden @endif">
                                                <li class="btnBuy">
                                                    <button type="button" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="N" data-is-free="Y" class="mem-Btn bg-blue">바로결제</button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="valign-base">
                                            @if(empty($row['ProdPriceData']) === false)
                                                @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                    <ul class="priceWrap">
                                                        <li>
                                                            @if($row['IsCart'] == 'Y')
                                                                <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="goods_chk chk_products" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/>
                                                            @endif
                                                            <label>
                                                                <span class="select">[{{ $price_row['SaleTypeCcdName'] }}]</span>

                                                                @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                                    <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                                    <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span>
                                                                @endif
                                                                <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col width="120px">
                                        <col width="750px">
                                        <col width="250px">
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            @if(empty($row['ProdBookData']) === false)
                                                @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                                    <div class="w-sub">
                                                        <span class="w-obj tx-blue tx11">{{ $book_row['BookProvisionCcdName'] }}</span>
                                                        <span class="w-subtit">{{ $book_row['ProdBookName'] }}</span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="priceWrap">
                                                @if(empty($row['ProdBookData']) === false)
                                                    @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                                        <li>
                                                            @if($row['IsCart'] == 'Y')
                                                                <input type="checkbox" name="prod_code[]" class="goods_chk chk_books" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                            @endif
                                                            <label>
                                                                <span class="select">[{{ $book_row['wSaleCcdName'] }}]</span>
                                                                <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                                <span class="discount">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif
        @endforeach

        <div id="buy_layer{{$group_num}}" class="willbes-Lec-buyBtn-sm NG">
            <div class="pocketBox">
                해당 상품이 장바구니에 담겼습니다.<br/>
                장바구니로 이동하시겠습니까?
                <ul class="NSK mt20">
                    <li class="aBox answerBox_block"><a href="#none">예</a></li>
                    <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                </ul>
            </div>
        </div>
    </div>

    <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
</form>
@endif

@if($group_num == 1)
    <style>
        .btnCart:hover { background: #707070 !important; }
        .btnBuy:hover { border: 1px solid #0d74ae !important; background: #1a8ccb !important; }
        .visi-hidden {visibility: hidden !important;}
        .group_h1 {width: 100%; font-size:30px; font-weight:600; margin:50px auto 20px; text-align:left}
    </style>
    <script src="/public/js/willbes/product_util.js"></script>
@endif
<script type="text/javascript">
    var $dp_prod_form{{$group_num}} = $('#dp_prod_form{{$group_num}}');
    var $buy_layer{{$group_num}} = $('#buy_layer{{$group_num}}');
    var $is_show = location.href.indexOf('show') > -1;
    var $is_professor =  location.href.indexOf('professor') > -1;

    $(document).ready(function() {
        if ($is_show === false || $is_professor === true) {
            // 목록 페이지
            // 상품 선택/해제
            $dp_prod_form{{$group_num}}.on('change', '.chk_products, .chk_books', function() {
                showBuyLayer('promotion', $(this), 'buy_layer{{$group_num}}');
                setCheckLectureProduct($dp_prod_form{{$group_num}}, $(this), '', '', '', '');
                $("#buy_layer{{$group_num}}").removeClass('active');
            });

            // 장바구니 이동 버튼 클릭
            $buy_layer{{$group_num}}.on('click', '.answerBox_block', function() {
                goCartPage(getCartType($dp_prod_form{{$group_num}}),'on');
            });

            // 계속구매 버튼 클릭
            $buy_layer{{$group_num}}.on('click', '.waitBox_block', function() {
                $buy_layer{{$group_num}}.find('.pocketBox').css('display','none').hide();
                $buy_layer{{$group_num}}.removeClass('active');
            });

            // 장바구니, 바로결제 버튼 클릭
            $dp_prod_form{{$group_num}}.on('click', 'button[name="btn_cart"], button[name="btn_direct_pay"]', function() {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                var $is_direct_pay = $(this).data('direct-pay');
                var $is_redirect = $(this).data('is-redirect');
                var $apply_free_lecture = $(this).data('is-free');

                if($apply_free_lecture === 'Y'){ // 무료강좌 지급
                    if (applyFreeLecture($dp_prod_form{{$group_num}}) === true) {
                        if(confirm('해당 상품이 신청되었습니다.\n내 강의실로 이동 하시겠습니까?')){
                            location.href = '{{ app_url('/classroom/on/list/ongoing', 'www') }}';
                        }
                    }
                }else{
                    var $result = addCartNDirectPay($dp_prod_form{{$group_num}}, $is_direct_pay, $is_redirect, 'on');

                    if ($is_redirect === 'N' && $result === true) {
                        $buy_layer{{$group_num}}.find('.pocketBox').css('display','none').show();
                        $buy_layer{{$group_num}}.addClass('active');
                    }
                }

            });

            {{-- 무료강좌 신청 --}}
            function applyFreeLecture($regi_form) {
                var $result = false;
                var $confirm_msg = $regi_form.find('.chk_books:checked').length < 1 ? '해당 강좌를 신청하시겠습니까?' : '해당 강좌 및 교재를 신청하시겠습니까?';

                if($regi_form.find('.chk_products:checked').length < 1) {
                    alert('강좌를 선택해 주세요.');
                    return false;
                }

                if (confirm($confirm_msg)) {
                    var $input_prod_code = {};
                    $regi_form.find('.chk_products:checked').each(function (idx) {
                        $input_prod_code[idx] = $(this).val();
                    });

                    var url = '{{ site_url('/order/free') }}';
                    var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), {
                        'prod_code': JSON.stringify($input_prod_code)
                    });
                    sendAjax(url, data, function (ret) {
                        if (ret.ret_cd) {
                            $result = true;
                        }
                    }, showAlertError, false, 'POST');
                }

                return $result;
            }

        }
    });
</script>


