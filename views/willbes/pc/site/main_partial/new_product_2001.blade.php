@if(empty($data['new_product_book']) === false)
    <div class="will-nTit NSK-Black">
        경찰 BEST <span class="tx-color">교재</span>
        <span class="tx16 NSK-Thin pt10 ml20">최고의 교수진으로 수험생의 합격을 돕겠습니다.</span>
        <a href="{{front_url('/book/index/cate/'.$__cfg['CateCode'])}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
    </div>

    <form id="regi_book_form" name="regi_book_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="learn_pattern" value="book"/>  {{-- 학습형태 --}}
        <input type="hidden" name="cart_type" value="book"/>   {{-- 장바구니 탭 아이디 --}}
        <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

        <div class="bookContent NSK">
            <ul class="bookList">
                @foreach($data['new_product_book'] as $row)
                    <li>
                        <a href="javascript:;" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url('book') }}'); return false;">
                            <span></span>
                            <div class="bookImg">
                                <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgOgName'] }}" title="{{ $row['ProdName'] }}">
                            </div>
                            <div>
                                <p>{{ (mb_strlen($row['ProdName'], 'UTF-8') >= 25 ? mb_substr($row['ProdName'],'0','25','UTF-8').'...' : $row['ProdName']) }}</p>
                                <p>[{{ $row['wSaleCcdName'] }}] {{ number_format($row['rwRealSalePrice']) }}원 (↓{{ $row['rwSaleRate'] . $row['rwSaleRateUnit'] }})</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
            <p class="leftBtn" id="imgBannerLeft3"><a href="#none">이전</a></p>
            <p class="rightBtn" id="imgBannerRight3"><a href="none">다음</a></p>
        </div>

        {{-- 교재보기 팝업 willbes-Layer-Box --}}
        <div id="InfoForm" class="willbes-Layer-Box"></div>

        <div id="buy_continue_layer" class="willbes-Lec-buyBtn-sm NG common_buy_layer">
            <div class="pocketBox" style="display: block;">
                <a class="closeBtn" href="#none">
                    <img src="{{ img_url('cart/close.png') }}">
                </a>
                해당 상품이 장바구니에 담겼습니다.<br/>
                장바구니로 이동하시겠습니까?
                <ul class="NSK mt20">
                    <li class="aBox answerBox_block"><a href="#none">예</a></li>
                    <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                    <li class="aBox closeBox_block"><a href="#none">닫기</a></li>
                </ul>
            </div>
        </div>
    </form>

    <script>
        var $regi_form = $('#regi_book_form');

        //교재
        $(function() {
            var slidesImg1 = $(".bookList").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:5,
                maxSlides:5,
                slideWidth: 190,
                slideMargin:20,
                autoHover: true,
                moveSlides:1,
                pager:true,
            });
            $("#imgBannerLeft3").click(function (){
                slidesImg1.goToNextSlide();
            });
            $("#imgBannerRight3").click(function (){
                slidesImg1.goToPrevSlide();
            });

            // 장바구니 이동 버튼 클릭
            $regi_form.on('click', '.answerBox_block', function() {
                goCartPage(getCartType($regi_form),'on');
            });

            // 계속구매, 닫기 버튼 클릭
            $regi_form.on('click', '.waitBox_block, .closeBox_block, .closeBtn', function() {
                $regi_form.find('#buy_continue_layer').removeClass('active');
            });

            // 장바구니, 바로결제 버튼 클릭
            $regi_form.on('click', 'a[name="btn_book_cart"], a[name="btn_book_direct_pay"]', function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                var $prod_code = $(this).data('prod-code');
                $regi_form.find('input:checkbox[name="prod_code[]"]').prop('checked', false);
                $regi_form.find('input:checkbox[name="prod_code[]"]:input[data-prod-code="'+$prod_code+'"]').prop('checked', true);
                var $is_direct_pay = $(this).data('direct-pay');
                var $is_redirect = $(this).data('is-redirect');
                var $dt_type = $(this).data('layer-dt-type') || '';   // 장바구니 레이어 상세구분 값
                var $result = cartNDirectPay($regi_form, $is_direct_pay, $is_redirect);
                if ($is_redirect === 'N' && $result === true) {
                    showSsamContinueLayer('prof_left', $(this), 'buy_continue_layer');
                }
            });
        });

        // 장바구니, 계속구매 레이어 노출
        function showSsamContinueLayer($type, $chk_obj, $target_id) {
            var $target_layer = $('#' + $target_id);
            var top = $chk_obj.offset().top - 16;
            var right = 545;
            $target_layer.css({
                'top': top,
                'right': right,
                'position': 'absolute'
            }).addClass('active');
        }
    </script>
@endif