<div id="QuickMenu" class="wsBookQuick">
    <ul>
        <li class="bookimg">
            @php $_ck_recent_books = get_ck_recent_products(); @endphp
            <div class="lastBook">최근본책<span>({{ count($_ck_recent_books) }})개</span></div>
            <div class="QuickSlider">
                @if(empty($_ck_recent_books) === false)
                    <div class="sliderNum">
                        @foreach($_ck_recent_books as $prod_code => $thumb_img_url)
                            <div>
                                <a href="{{ front_url('/bookStore/show/pattern/all/prod-code/' . $prod_code) }}">
                                    <img src="{{ $thumb_img_url }}" title="최근본책-{{ $loop->index }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </li>
        <li class="cart">
            <a href="{{ front_url('/cart/index?tab=book') }}">장바구니</a>
        </li>
        <li class="order">
            <a href="{{ front_app_url('/classroom/order/index', 'www') }}">주문/배송조회</a>
        </li>
        <li class="top">
            <a href="#Container">TOP</a>
        </li>
    </ul>
</div>
