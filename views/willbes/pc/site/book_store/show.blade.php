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
        <div class="wsBookViewWrap">
            <div class="wsBookView">
                <form id="regi_book_form" name="regi_book_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
                    <input type="hidden" name="cart_type" value="book"/>   {{-- 장바구니 탭 아이디 --}}
                    <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                    <div class="wsBookImg">
                        <img src="{{ $data['wAttachImgPath'] . $data['wAttachImgOgName'] }}" alt="{{ $data['ProdName'] }}" title="{{ $data['ProdName'] }}"/>
                    </div>
                    <div class="wsBookInfo">
                        <h5 class="NG">
                            {{ $data['ProdName'] }}
                            <input type="checkbox" name="prod_code[]" value="{{ $data['ProdCode'] . ':' . $data['rwSaleTypeCcd'] . ':' . $data['ProdCode'] }}:book" checked="checked" data-prod-code="{{ $data['ProdCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" class="chk_books d_none" @if($data['IsSalesAble'] == 'N') disabled="disabled" @endif>
                        </h5>
                        <ul class="wsBooktxt">
                            <li>
                                <strong class="shead">판매가</strong>
                                <span><s>{{ number_format($data['rwSalePrice']) }}원</s> → <strong>{{ number_format($data['rwRealSalePrice']) }}원</strong></span>
                            </li>
                            <li>
                                <strong class="shead">저자명</strong><span>{{ $data['wAuthorNames'] }}</span>
                                <a href="#none" class="another" onclick="goSearchKeyword('wAuthorNames', '{{ $data['wAuthorNames'] }}');">저자의 다른교재 보기 &gt;</a>
                            </li>
                            <li>
                                <strong class="shead">출판사</strong><span>{{ $data['wPublName'] }}</span>
                                <a href="#none" class="another" onclick="goSearchKeyword('wPublName', '{{ $data['wPublName'] }}');">출판사의 다른교재 보기 &gt;</a>
                            </li>
                            <li>
                                <strong class="shead">페이지</strong><span>{{ $data['wPageCnt'] }}p</span>
                                <strong class="shead">ISBN</strong><span>{{ $data['wIsbn'] }}</span>
                            </li>
                            <li>
                                <strong class="shead">출판일</strong><span>{{ $data['wPublDate'] }}</span>
                                <strong class="shead">교재판형</strong><span>{{ $data['wEditionSize'] }}</span>
                            </li>
                            <li><strong class="shead">배송방법</strong><span>택배(발송 후 1~2일 내 수령가능)</span></li>
                            <li class="p_re">
                                <strong class="shead">배송비</strong>
                                <span>
                                    {{ $data['IsFreebiesTrans'] == 'N' ? '무료' : number_format(config_app('DeliveryPrice', 0)) . '원' }}
                                    <a href="#none" class="more">?
                                        <div class="delivery">
                                            • 본 교재는 오후 2시 이전에 주문 건에 한하여 당일 발송되며, 오후 2시 이후 주문 건은 익일 발송됩니다.<br>
                                            • 금요일 오후 2시 이후 결제 건은 월요일에 발송됩니다.<br>
                                            • 배송 방법 : 택배 (배송업체-{{ config_app('DeliveryCompName', 0) }})<br>
                                            • 배송 지역 : 전국지역 (해외배송 제한)<br>
                                            • 배송 비용 : {{ number_format(config_app('DeliveryPrice', 0)) }}원 ({{ number_format(config_app('DeliveryFreePrice', 0)) }}원 이상 구매시 무료배송) <br>
                                            ※ 최초 도서결제 후 묶음 배송을 위한 추가 결제 불가 <br>
                                            • 도서산간지방은 추가 배송비가 발생할 수 있습니다.<br>
                                            • 배송기간 : 발송일로부터 1일~3일(72시간) [도서산간 지방은 2~3일 추가 소요] <br>
                                            ※ 익일 배송완료를 원칙으로 하지만 택배사 사정에 따라 배송이 지연 될 수 있습니다.<br>
                                        </div>
                                    </a>
                                </span>
                            </li>
                            <li><strong class="shead">주문수량</strong>
                                <span>
                                    <select id="prod_qty" name="prod_qty[{{ $data['ProdCode'] }}]" title="수량">
                                        @for($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </span>
                            </li>
                            <li class="total NG">총 상품금액 <strong><span id="total_real_sale_price">{{ number_format($data['rwRealSalePrice']) }}</span>원</strong></li>
                        </ul>
                        @if($data['IsSalesAble'] == 'Y')
                            <div class="wsBook-buyBtn">
                                <ul>
                                    <li class="btnAuto180 h36">
                                        <button type="button" name="btn_book_cart" data-direct-pay="N" data-is-redirect="Y" class="mem-Btn bg-white bd-light-gray">
                                            <span class="tx-black">장바구니</span>
                                        </button>
                                    </li>
                                    <li class="btnAuto180 h36">
                                        <button type="button" name="btn_book_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="mem-Btn bg-green bd-green">
                                            <span>바로결제</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            @if($is_npay === true)
                                <div class="naver">
                                    <script type="text/javascript">
                                        // 네이버페이 결제
                                        function buy_nc() {
                                            formCreateSubmit('{{ front_url('/npayOrder/register/pattern/only') }}', $('#regi_book_form').serializeArray(), 'POST');
                                            return false;
                                        }

                                        // 네이버페이 찜
                                        function wishlist_nc() {
                                            popupOpen('', '_wishlist_nc', '400', '267', '', '', 'yes', 'no');
                                            formCreateSubmit('{{ front_url('/npayOrder/wishlist') }}', $('#regi_book_form').serializeArray(), 'POST', '_wishlist_nc');
                                            return false;
                                        }
                                    </script>
                                    <script type="text/javascript" src="https://pay.naver.com/customer/js/naverPayButton.js" charset="utf-8"></script>
                                    <script type="text/javascript" >//<![CDATA[
                                        naver.NaverPayButton.apply({
                                            BUTTON_KEY: '{{ config_app('npay_btn_cert_key') }}', // 페이에서 제공받은 버튼 인증 키 입력
                                            TYPE: 'A', // 버튼 모음 종류 설정
                                            COLOR: 1, // 버튼 모음의 색 설정
                                            COUNT: 2, // 버튼 개수 설정. 구매하기 버튼만 있으면 1, 찜하기 버튼도 있으면 2를 입력.
                                            ENABLE: 'Y', // 품절 등의 이유로 버튼 모음을 비활성화할 때에는 "N" 입력
                                            BUY_BUTTON_HANDLER: buy_nc, // 구매하기 버튼 이벤트 Handler 함수 등록, 품절인 경우 not_buy_nc 함수 사용
                                            BUY_BUTTON_LINK_URL: '', // 링크 주소 (필요한 경우만 사용)
                                            WISHLIST_BUTTON_HANDLER: wishlist_nc, // 찜하기 버튼 이벤트 Handler 함수 등록
                                            WISHLIST_BUTTON_LINK_URL: '', // 찜하기 팝업 링크 주소(필요한 경우만 사용)
                                            '':''
                                        });
                                    //]]></script>
                                </div>
                            @endif
                        @else
                            <div class="wsBook-buyBtn tx-right">
                                <span class="tx-red">구매할 수 없는 상품입니다.</span>
                            </div>
                        @endif
                    </div>
                </form>
            </div>

            <div id="Sticky" class="sticky-Wrap">
                <div class="sticky-Grid sticky-menu NG">
                    <ul>
                        <li><a href="#none" onclick="movePos('#introduce');">도서소개 ▼</a></li>
                        <li class="row-line">|</li>
                        <li><a href="#none" onclick="movePos('#writer');">저자소개 ▼</a></li>
                        <li class="row-line">|</li>
                        <li><a href="#none" onclick="movePos('#procedure');">목차 ▼</a></li>
                        <li class="row-line">|</li>
                        <li><a href="#none" onclick="movePos('#guidance');">이용안내 ▼</a></li>
                    </ul>
                </div>
            </div>
            <!-- sticky-menu -->

            <div class="wsBookDetail p_re c_both">
                <a id="introduce" name="introduce" class="sticky-top"></a>
                <div class="willbes-Lec-Tit NG tx-black">도서소개</div>
                <div class="wsBookDetailBox">
                    {!! $data['wBookDesc'] !!}
                </div>
            </div>

            <div class="wsBookDetail p_re c_both">
                <a id="writer" name="writer" class="sticky-top"></a>
                <div class="willbes-Lec-Tit NG tx-black">저자소개</div>
                <div class="wsBookDetailBox">
                    {!! $data['wAuthorDesc'] !!}
                </div>
            </div>

            <div class="wsBookDetail p_re c_both">
                <a id="procedure" name="procedure" class="sticky-top"></a>
                <div class="willbes-Lec-Tit NG tx-black">목차</div>
                <div class="wsBookDetailBox">
                    {!! $data['wTableDesc'] !!}
                </div>
            </div>

            <div class="wsBookDetail p_re c_both">
                <a id="guidance" name="guidance" class="sticky-top"></a>
                <div class="willbes-Lec-Tit NG tx-black">이용안내</div>
                <div class="wsBookDetailBox">
                    <div class="guidanceBox">
                        <div class="NG"><strong>꼭 읽어주세요!</strong></div>
                        <ul>
                            <li>평일 오후 2시 이전 결제완료건 : 당일 출고 (도서 공급 및 재고 사정으로 지연될 수 있습니다.)</li>
                            <li>평일 오후 2시 이후 결제완료건 : 익일 출고 (금요일 오후2시 이후 결제완료건은 차주 월요일 출고)</li>
                            <li>출고 후 1일~3일(72시간) 내 수령 가능하며, 발송일 오후 6시부터 배송조회가 가능합니다.</li>
                            <li>배송조회 : “내강의실 >결제관리 >주문/배송조회”에서 확인할 수 있습니다.</li>
                            <li class="tx-red">네이버페이로 결제시 도서 주문내역은 네이버쇼핑(네이버페이) 주문조회에서 확인가능합니다.</li>
                            <li>결제 후 주문취소/주소변경이 필요하신 경우 윌스토리 고객센터로 연락주시기 바랍니다.</li>
                            <li>배송지 주소변경은 출고전까지만 가능합니다. 출고 후 배송지 주소변경은 불가합니다.</li>
                            <li>출고 후 주문취소의 경우 고객센터로 연락부탁드립니다.</li>
                            <li class="tx-red">공급사(출판사)및 온라인서점 재고 사정에 의해 결제완료 이후에도 품절/지연될 수 있으며, 품절 시 관련 사항에 대해서는 전화나 문자로 안내 드리겠습니다.</li>
                            <li>윌스토리 고객센터(<span class="tx-red">1544-4944</span>) 전화문의는 평일 오전 9시부터 오후12시, 오후 1시부터 오후5시까지입니다. 주말 공휴일 휴무</li>
                        </ul>
                    </div>
                    <div class="guidanceBox">
                        <div class="NG"><strong>교환 및 환불</strong></div>
                        <ul>
                            <li>도서불량 및 오배송 등의 이유로 반품하실 경우, 반품배송비는 무료입니다.</li>
                            <li>고객님의 변심에 의한 반품, 환불, 교환시 배송비는 고객님 부담입니다.</li>
                            <li>상담원과의 상담 없이 교환 및 반품으로 반송된 도서에 대하여는 책임지지 않습니다.</li>
                            <li>반품 신청시 반송된 도서의 본사 수령 확인 후 환불이 진행됩니다. (카드결제는 카드사 영업일 기준 시일이 3~5일이 소요됩니다.)</li>
                            <li>주문하신 도서의 반품(환불) 및 교환은 교재 결제일로 부터 7일 이내에 온라인상에서 신청 하 실 수 있습니다.</li>
                            <li>도서 환불신청일로 부터 5일 이내 반송 시 환불처리 가능합니다.</li>
                            <li>도서가 훼손되거나 포장이 훼손된 경우 반품 및 교환, 환불이 불가능합니다.</li>
                            <li>반품 또는 교환시 고객님의 사정으로 수거가 지연될 경우에는 반품이 제한될 수 있습니다.</li>
                        </ul>
                    </div>
                    <div class="guidanceBox">
                        <div class="NG"><strong>배송 안내</strong></div>
                        <ul>
                            <li>평일 오후 2시 이전 결제완료건 : 당일 출고 (도서 공급 및 재고 사정으로 지연될 수 있습니다.)</li>
                            <li>평일 오후 2시 이후 결제완료건 : 익일 출고 (금요일 오후2시 이후 결제완료건은 차주 월요일 출고)</li>
                            <li>출고 후 1일~3일(72시간) 내 수령 가능하며, 발송일 오후 6시부터 배송조회가 가능합니다.</li>
                            <li>배송조회 : “내강의실 >결제관리 >주문/배송조회”에서 확인할 수 있습니다.</li>
                            <li class="tx-red">네이버페이로 결제시 도서 주문내역은 네이버쇼핑(네이버페이) 주문조회에서 확인가능합니다.</li>
                            <li>배송 방법 : 택배 (배송업체-{{ config_app('DeliveryCompName', 0) }})</li>
                            <li>배송 지역 : 전국지역 (군부대, 해외배송 제한)</li>
                            <li>배송 비용 : {{ number_format(config_app('DeliveryPrice', 0)) }}원 ({{ number_format(config_app('DeliveryFreePrice', 0)) }}원 이상 구매시 무료배송)<br>
                                ※ 최초 도서결제 후 묶음 배송을 위한 추가 결제 불가</li>
                            <li>도서산간지방은 추가 배송비가 발생할 수 있습니다.</li>
                            <li>군부대 지역의 경우 해당 군부대에 {{ config_app('DeliveryCompName', 0) }} 택배배송이 되는지 먼저 확인 후 주문을 해주시기 바랍니다. 일부 군부대 지역은 우체국 택배를 제외한 타택배사는 출입이 제한이 될 수 있습니다. (군부대 사서함 주소 사용 시 배송제한)<br>
                                ※ 유의사항 : 군부대 지역 배송 시 우체국 사서함 주소지를 제외하고, 정확한 지번/도로명 주소, 부대명칭 등 을 기재해 주셔야 합니다.<br>
                                예) 경기도 00군 00리 00번지(00도로명) 0000부대(사단, 연대, 대대 등) 00중대 일병 000</li>
                            <li>배송기간 : 발송일로부터 1일~3일(72시간) [도서산간 지방은 2~3일 추가 소요]<br>
                                ※ 익일 배송완료를 원칙으로 하지만 택배사 사정에 따라 배송이 지연 될 수 있습니다.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--//Content-->

    {{-- 날개 배너 --}}
    {!! banner('교재구매_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}

    {{-- 퀵 메뉴 --}}
    @include('willbes.pc.site.book_store.quick_menu')
</div>
<!-- End Container -->
<script src="/public/js/willbes/product_util.js?ver={{time()}}"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_book_form');

    $(document).ready(function() {
        {{-- 실서비스 --}}
        // 장바구니 버튼 클릭
        $regi_form.on('click', 'button[name="btn_book_cart"]', function() {
            var $is_redirect = $(this).data('is-redirect');

            @if(sess_data('is_login') === true)
                addCartNDirectPay($regi_form, 'N', $is_redirect, 'on');
            @else
                @if($is_npay === true)
                    addGuestCart($regi_form, 'N', $is_redirect);
                @else
                    // 네이버페이 결제를 사용하지 않을 경우 로그인 필수
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                @endif
            @endif
        });

        // 바로결제 버튼 클릭
        $regi_form.on('click', 'button[name="btn_book_direct_pay"]', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            addCartNDirectPay($regi_form, 'Y', 'Y', 'on');
        });
        {{--// 실서비스 --}}

        {{-- TODO : 네이버페이 심사 --}}
        {{--// 장바구니, 바로결제 버튼 클릭
        $regi_form.on('click', 'button[name="btn_book_cart"], button[name="btn_book_direct_pay"]', function() {
            var $is_direct_pay = $(this).data('direct-pay');
            var $is_redirect = $(this).data('is-redirect');

            @if(sess_data('is_login') === true)
                addCartNDirectPay($regi_form, $is_direct_pay, $is_redirect, 'on');
            @else
                @if($is_npay === true)
                    addGuestCart($regi_form, $is_direct_pay, $is_redirect);
                @else
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                @endif
            @endif
        });--}}
        {{--// 네이버페이 심사 --}}

        // 주문수량 변경할 경우 총 상품금액 변경 이벤트
        $regi_form.on('change', 'select[id="prod_qty"]', function() {
            var prod_qty = parseInt($(this).val(), 10) || 1;
            var real_sale_price = parseInt('{{ $data['rwRealSalePrice'] }}', 10) || 0;
            var total_real_sale_price = real_sale_price * prod_qty;

            $regi_form.find('#total_real_sale_price').html(addComma(total_real_sale_price));
        });
    });

    // 키워드 검색
    function goSearchKeyword(keyword, value) {
        location.href = '{{ front_url('/bookStore/index/pattern/all?search_text=') }}' + encodeURIComponent(Base64.encode(keyword + ':' + value));
    }
</script>
@stop
