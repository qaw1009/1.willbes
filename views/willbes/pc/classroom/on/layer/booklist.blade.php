<a class="closeBtn" href="#none" onclick="closeWin('MoreBook')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">교재구매</div>
<div class="lecMoreWrap">
    <div class="PASSZONE-List widthAutoFull" style="height:500px !important;">
        <ul class="passzoneInfo tx-gray NGR">
            <li>· 수강중인 강좌에 관련된 교재를 주문하실수 있습니다.</li>
        </ul>
        <div class="PASSZONE-Lec-Section">
            <div class="LeclistTable LeclistPASSTable" style="height:150px !important">
                <form name="bookForm" id="bookForm" method="POST" action="//{{$SiteUrl}}/cart/store">
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="learn_pattern" value="on_lecture" />
                    <input type="hidden" name="cart_type" value="book" />
                    <input type="hidden" id="is_pay" name="is_direct_pay" value="N" />
                    <table cellspacing="0" cellpadding="0" class="listTable passTable under-gray tx-gray">
                        <colgroup>
                            <col style="width: 60px;">
                            <col style="width: 70px;">
                            <col style="width: 410px;">
                            <col style="width: 70px;">
                            <col style="width: 140px;">
                        </colgroup>
                        <tbody>
                        @forelse($booklist as $row)
                            <tr>
                                <td><input type="checkbox" name="prod_code[]" class="goods_chk" data-price="{{ $row['RealSalePrice'] }}" value="{{$row['ProdBookCode']}}:613001:{{$row['ProdCode']}}" onchange="fnPrice();" @if($row['wSaleCcd'] != '112001' || $row['Paid'] == true) disabled="disabled" @endif></td>
                                <td class="w-type"><span class="tx-light-blue">{{$row['BookProvisionCcdName']}}</span></td>
                                <td class="w-tit tx-left pl20">{{$row['ProdBookName']}}</td>
                                <td class="w-buy"><span class="tx-{{($row['wSaleCcd'] == '112001') ? 'light-blue' : 'red'}}">[{{$row['wSaleCcdName']}}]</span></td>
                                <td class="w-price">{{number_format($row['RealSalePrice'], 0)}}원 (<span class="tx-blue">↓{{$row['SaleRate']}}{{$row['SaleRateUnit']}}</span>)</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">주문가능한 교재가 없습니다.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </form>
            </div>
            <ul class="cart-PriceBox NG">
                <li class="price-list p_re">
                    <dl class="priceBox">
                        <dt>
                            <div>상품주문금액</div>
                            <div id="product-price" class="price tx-light-blue">0원</div>
                        </dt>
                        <!--
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="/public/img/willbes/sub/icon_plus.gif">
                        </dt>                        
                        <dt>
                            <div>배송료</div>
                            <span id="trans-price" class="price tx-light-blue">2,500원</span>
                        </dt>
                        -->
                    </dl>
                </li>
                <li class="price-total">
                    <div>최종결제금액</div>
                    <span id="total-price" class="price tx-light-blue">0원</span>
                </li>
            </ul>
            <div class="willbes-Lec-buyBtn">
                <ul>
                    <li class="btnAuto95 h30">
                        <button type="button" onclick="fnCart();" class="mem-Btn bg-deep-gray bd-deep-gray">
                            <span class="tx-white">장바구니</span>
                        </button>
                    </li>
                    <li class="btnAuto95 h30">
                        <button type="button" onclick="fnPay();" class="mem-Btn bg-blue bd-dark-blue">
                            <span>바로결제</span>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="c_both tx-origin-red">* 30,000원 이상 교재 구매 시 배송료는 무료입니다.</div> 
        </div>
    </div>
    <!-- PASSZONE-List -->
</div>
<script>
    function fnPay()
    {
        if($(".goods_chk:checked").length > 0){
            $("#is_pay").val('Y');
            $("#bookForm").submit();
        } else {
            alert("주문할 교재를 선택해주십시요.");
        }
    }

    function fnCart()
    {
        if($(".goods_chk:checked").length > 0){
            $("#is_pay").val('N');
            $("#bookForm").submit();
        } else {
            alert("주문할 교재를 선택해주십시요.");
        }
    }

    function fnPrice()
    {
        var price = 0;
        var trans = 0;

        $(".goods_chk").each(function(index){
            if($(this).is(":checked")){
                price += $(this).data('price')
            }
        });

        /*
        if(price > 0){
            trans = 2500;
        } else {
            trans = 0;
        }
        */

        // $("#trans-price").text(addComma(trans) + '원');
        $("#product-price").text(addComma(price) + '원');
        $("#total-price").text(addComma(trans+price) + '원');
    }
</script>

