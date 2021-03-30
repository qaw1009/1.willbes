{{-- 결제완료 광고 스크립트 (구글, ADN, 모비온, 카카오) --}}
<!-- ad script -->
@if(empty($ad_data) === false)
    <!-- Google Event snippet for 구매 conversion page start -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-710035840"></script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('event', 'conversion', {
            'send_to': 'AW-710035840/IzCxCPnzl9cBEICTydIC',
            'transaction_id': ''
        });
    </script>
    <!--// Google Event snippet for 구매 conversion page end -->
    <!-- ADN Tracker[전환] start -->
    <script type="text/javascript">
        var adn_param = adn_param || [];
        adn_param.push([{
            ui:'102299',
            ut:'Purchase',
            uo:'{{ $ad_data['OrderNo'] }}',
            up:'{{ $ad_data['tRealPayPrice'] }}'
        }]);
    </script>
    <script type="text/javascript" async src="//fin.rainbownine.net/js/adn_tags_1.0.0.js"></script>
    <!--// ADN Tracker[전환] end -->
    <!-- Enliple Tracker v3.6 [결제전환] start -->
    <script type="text/javascript">
        function mobConv() {
            var cn = new EN();
            cn.setData("uid", "willpolice");
            cn.setData("ordcode", "{{ $ad_data['OrderNo'] }}"); // 옵션
            cn.setData("pcode", ""); // 옵션
            cn.setData("qty", "{{ $ad_data['tOrderQty'] }}"); // 필수
            cn.setData("price", "{{ $ad_data['tRealPayPrice'] }}"); // 필수
            cn.setData("pnm", encodeURIComponent(encodeURIComponent("{{ $ad_data['ReprProdName'] }}"))); // 옵션
            cn.setSSL(true);
            cn.sendConv();
        }
    </script>
    <script src="https://cdn.megadata.co.kr/js/en_script/3.6/enliple_min3.6.js" defer="defer" onload="mobConv()"></script>
    <!--// Enliple Tracker v3.6 [결제전환] end -->
    <!-- Kakao 구매완료 start -->
    <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
    <script type="text/javascript">
        kakaoPixel('2420477028898879027').purchase({
            total_quantity: "{{ $ad_data['tOrderQty'] }}", // 주문 내 상품 개수(optional)
            total_price: "{{ $ad_data['tRealPayPrice'] }}",  // 주문 총 가격(optional)
            currency: "KRW",     // 주문 가격의 화폐 단위(optional, 기본 값은 KRW)
            products: {!! $ad_data['KakaoProducts'] !!} // 주문 내 상품 정보(optional)
        });
    </script>
    <!--// Kakao 구매완료 end -->
@endif
<!-- End ad script -->
