{{-- 결제완료 광고 스크립트 (구글, ADN, 모비온, 카카오) --}}
@if(empty($ad_data) === false)
    <!-- AD script start -->
    @if(empty($ad_data['Gtag']) === false)
        <!-- Google Event snippet for 구매 conversion page start -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $ad_data['Gtag']['uid'] }}"></script>
        <script type="text/javascript">
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('event', 'conversion', {
                'send_to': '{{ $ad_data['Gtag']['send_to'] }}',
                'transaction_id': ''
            });
        </script>
        <!--// Google Event snippet for 구매 conversion page end -->
    @endif
    @if(empty($ad_data['Adn']) === false)
        <!-- ADN Tracker[전환] start -->
        <script type="text/javascript">
            var adn_param = adn_param || [];
            adn_param.push([{
                ui:'{{ $ad_data['Adn']['uid'] }}',
                ut:'Purchase',
                uo:'{{ $ad_data['OrderNo'] }}',
                up:'{{ $ad_data['tRealPayPrice'] }}'
            }]);
        </script>
        <script type="text/javascript" async src="//fin.rainbownine.net/js/adn_tags_1.0.0.js"></script>
        <!--// ADN Tracker[전환] end -->
    @endif
    @if(empty($ad_data['Enliple']) === false)
        <!-- Enliple Tracker v3.6 [결제전환] start -->
        <script type="text/javascript">
            function mobConv() {
                var cn = new EN();
                cn.setData("uid", "{{ $ad_data['Enliple']['uid'] }}");
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
    @endif
    @if(empty($ad_data['Enliple2']) === false)
        <!-- Enliple Tracker Start -->
        <script type="text/javascript">
            var ENP_VAR = {
                conversion: {
                    ordCode: '{{ $ad_data['OrderNo'] }}',
                    totalPrice: '{{ $ad_data['tRealPayPrice'] }}',
                    totalQty: '{{ $ad_data['tOrderQty'] }}',
                    product: {!! $ad_data['Enliple2']['products'] !!}
                }
            };

            (function(a,g,e,n,t){a.enp=a.enp||function(){(a.enp.q=a.enp.q||[]).push(arguments)};n=g.createElement(e);n.async=!0;n.defer=!0;n.src="https://cdn.megadata.co.kr/dist/prod/enp_tracker_self_hosted.min.js";t=g.getElementsByTagName(e)[0];t.parentNode.insertBefore(n,t)})(window,document,"script");
            enp('create', 'conversion', '{{ $ad_data['Enliple2']['uid'] }}', { device: '{{ $ad_data['Enliple2']['device'] }}' }); // W:웹, M:모바일, B:반응형
            enp('send', 'conversion', '{{ $ad_data['Enliple2']['uid'] }}');
        </script>
        <!-- Enliple Tracker End -->
    @endif
    @if(empty($ad_data['Kakao']) === false)
        <!-- Kakao 구매완료 start -->
        <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
        <script type="text/javascript">
            kakaoPixel('{{ $ad_data['Kakao']['uid'] }}').purchase({
                total_quantity: "{{ $ad_data['tOrderQty'] }}", // 주문 내 상품 개수(optional)
                total_price: "{{ $ad_data['tRealPayPrice'] }}",  // 주문 총 가격(optional)
                currency: "KRW",     // 주문 가격의 화폐 단위 (optional, 기본 값은 KRW)
                products: {!! $ad_data['Kakao']['products'] !!} // 주문 내 상품 정보(optional)
            });
        </script>
        <!--// Kakao 구매완료 end -->
    @endif
    @if(empty($ad_data['Kakao2']) === false)
        <!-- Kakao 구매완료 start -->
        <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/kas/static/kp.js"></script>
        <script type="text/javascript">
            kakaoPixel('{{ $ad_data['Kakao2']['uid'] }}').purchase('{{ $ad_data['Kakao2']['purc_text'] }}');
        </script>
        <!--// Kakao 구매완료 end -->
    @endif
    @if(empty($ad_data['Naver']) === false)
        <!-- Naver 구매완료 start -->
        <script type="text/javascript" src="//wcs.naver.net/wcslog.js"></script>
        <script type="text/javascript">
            var _nasa = {};
            if(window.wcs) _nasa['cnv'] = wcs.cnv('{{ $ad_data['Naver']['cnv_type'] }}', '{{ $ad_data['tRealPayPrice'] }}');
        </script>
        <!--// Naver 구매완료 end -->
    @endif
    @if(empty($ad_data['Facebook']) === false)
        <!-- Facebook Meta Pixel Code 구매완료 start -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $ad_data['Facebook']['uid'] }}');
            fbq('track', 'Purchase');
        </script>
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id={{ $ad_data['Facebook']['uid'] }}&ev=PageView&noscript=1"/></noscript>
        <!--// Facebook Meta Pixel Code 구매완료 end -->
    @endif
    <!--// AD script end -->
@endif
