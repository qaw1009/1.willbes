@if(empty($arr_base['display_product_data']) === false)
    <style>
        .btnCart:hover { background: #707070 !important; }
        .btnBuy:hover { border: 1px solid #0d74ae !important; background: #1a8ccb !important; }
    </style>
    <form id="dp_prod_form" name="dp_prod_form" method="POST" onsubmit="return false;" novalidate="">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="learn_pattern" value="on_lecture"/>  {{-- 학습형태 --}}
        <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
        <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

        <div id="event_display_product_list" class="proLecList">
            <div class="tx-red tx-left tx14">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
            <div class="willbes-Lec-Table mt20">
                @foreach($arr_base['display_product_data'] as $key => $row)
                    {{-- 1. 상품 --}}
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
                            <td rowspan="2" class="pt20"><img src="{{$row['ProfReferData']['lec_list_img']}}" alt="강사명"></td>
                            <td rowspan="2" class="w-data tx-left p_re">
                                <div class="w-tit">
                                    <a href="javascript:goShow('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}', 'only');">{{$row['ProdName']}}</a>
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
                                    @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                        <dt class="Tit NG ml10 mr10">맛보기{{ $sample_idx + 1 }}</dt>
                                        @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                        @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                    @endforeach
                                </dl>
                            </td>
                            <td>
                                <ul class="lecBuyBtns tx-rgiht">
                                    <li class="btnCart">
                                        <button type="button" name="btn_cart" data-direct-pay="N" data-is-redirect="N" class="bg-deep-gray">장바구니</button>
                                        {{--
                                        <a onclick="openWin('pocketBox')" >장바구니</a>
                                        <div id="pocketBox" class="pocketBox">
                                            <a class="closeBtn" href="#none" onclick="closeWin('pocketBox')">
                                                <img src="{{ img_url('cart/close.png') }}">
                                            </a>
                                            해당 상품이 장바구니에 담겼습니다.<br/>
                                            장바구니로 이동하시겠습니까?
                                            <ul class="NSK mt20">
                                                <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                                <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                                <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('pocketBox')">닫기</a></li>
                                            </ul>
                                        </div>
                                        --}}
                                    </li>
                                    <li class="btnBuy">
                                        <button type="button" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="mem-Btn bg-blue bd-dark-blue">바로결제</button>
                                        {{--
                                        <a onclick="openWin('pocketBox2')" >바로결제</a>
                                        <div id="pocketBox2" class="pocketBox">
                                            <a class="closeBtn" href="#none" onclick="closeWin('pocketBox2')">
                                                <img src="{{ img_url('cart/close.png') }}">
                                            </a>
                                            도서구입비 소득공제 시행에 따라 강좌와 교재는 동시 결제가 불가능 합니다.<br>
                                            선택한 교재는 장바구니에 자동으로 담기며, 강좌 선 결제 후 장바구니에 담긴 교재를 결제하실 수 있습니다.
                                            <ul class="NSK mt20">
                                                <li class="aBox waitBox_block"><a href="#none">확인</a></li>
                                            </ul>
                                        </div>
                                        --}}
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
                                                <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="goods_chk chk_products" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/>
                                                <label>
                                                    <span class="select">[{{ $price_row['SaleTypeCcdName'] }}]</span>
                                                    <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                    <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                                </label>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    {{-- 2. 교재 --}}
                    <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                        <colgroup>
                            <col width="140px">
                            <col width="730px">
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
                                                <input type="checkbox" name="prod_code[]" class="goods_chk chk_books" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
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
            </div>
        </div>

        <div id="buy_layer" class="willbes-Lec-buyBtn-sm NG">
            {{--
            <div>
                <button type="button" name="btn_cart" data-direct-pay="N" data-is-redirect="N" class="bg-deep-gray">
                    <span>장바구니</span>
                </button>
            </div>
            <div>
                <button type="button" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="bg-dark-blue">
                    <span>바로결제</span>
                </button>
            </div>
            --}}
            <div id="pocketBox" class="pocketBox">
                해당 상품이 장바구니에 담겼습니다.<br/>
                장바구니로 이동하시겠습니까?
                <ul class="NSK mt20">
                    <li class="aBox answerBox_block"><a href="#none">예</a></li>
                    <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                </ul>
            </div>
        </div>
    </form>

    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $dp_prod_form = $('#dp_prod_form');
        var $buy_layer = $('#buy_layer');
        var $is_show = location.href.indexOf('show') > -1;
        var $is_professor =  location.href.indexOf('professor') > -1;

        $(document).ready(function() {
            if ($is_show === false || $is_professor === true) {
                // 목록 페이지
                // 상품 선택/해제
                $dp_prod_form.on('change', '.chk_products, .chk_books', function() {
                    showBuyLayer('on', $(this), 'buy_layer');
                    setCheckLectureProduct($dp_prod_form, $(this), '', '', '', '');
                });

                // 장바구니 이동 버튼 클릭
                $buy_layer.on('click', '.answerBox_block', function() {
                    goCartPage(getCartType($dp_prod_form),'on');
                });

                // 계속구매 버튼 클릭
                $buy_layer.on('click', '.waitBox_block', function() {
                    $buy_layer.find('.pocketBox').css('display','none').hide();
                    $buy_layer.removeClass('active');
                });

                // 장바구니, 바로결제 버튼 클릭
                $('button[name="btn_cart"], button[name="btn_direct_pay"]').on('click', function() {
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                    var $is_direct_pay = $(this).data('direct-pay');
                    var $is_redirect = $(this).data('is-redirect');

                    {{--var $result = cartNDirectPay($dp_prod_form, $is_direct_pay, $is_redirect);--}}
                    var $result = addCartNDirectPay($dp_prod_form, $is_direct_pay, $is_redirect, 'on');

                    if ($is_redirect === 'N' && $result === true) {
                        $buy_layer.find('.pocketBox').css('display','none').show();
                        $buy_layer.addClass('active');
                    }
                });
            } else {
                {{--
                // 뷰 페이지
                // 상품 선택/해제
                $dp_prod_form.on('change', '.chk_products, .chk_books', function() {
                    setCheckLectureProduct($dp_prod_form, $(this), 'price', 'prod_sale_price', 'book_sale_price', 'tot_sale_price');
                });

                // 장바구니, 바로결제 버튼 클릭
                $dp_prod_form.on('click', 'button[name="btn_cart"], button[name="btn_direct_pay"]', function() {
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                    var $is_direct_pay = $(this).data('direct-pay');

                    cartNDirectPay($dp_prod_form, $is_direct_pay, 'Y');
                });
                --}}
            }
        });

        /**
         * 상세 페이지 이동
         */
        function goShow(prod_code, cate_code, pattern) {
            location.href = '{{ site_url('/lecture/show') }}/cate/' + cate_code + '/pattern/' + pattern + '/prod-code/' + prod_code;
        }
    </script>

@endif
