{{-- 장바구니 광고 스크립트 (모비온) --}}
@if(empty($ad_data) === false)
    <!-- AD script start -->
    @if(empty($ad_data['Enliple2']) === false)
        <!-- Enliple Tracker Start -->
        <script type="text/javascript">
            var ENP_VAR = {
                conversion: {
                    totalPrice: '{{ $ad_data['tRealSalePrice'] }}',
                    totalQty: '{{ $ad_data['tProdQty'] }}',
                    product: {!! $ad_data['Enliple2']['products'] !!}
                }
            };

            (function(a,g,e,n,t){a.enp=a.enp||function(){(a.enp.q=a.enp.q||[]).push(arguments)};n=g.createElement(e);n.async=!0;n.defer=!0;n.src="https://cdn.megadata.co.kr/dist/prod/enp_tracker_self_hosted.min.js";t=g.getElementsByTagName(e)[0];t.parentNode.insertBefore(n,t)})(window,document,"script");
            enp('create', 'conversion', '{{ $ad_data['Enliple2']['uid'] }}', { device: '{{ $ad_data['Enliple2']['device'] }}' }); // W:웹, M:모바일, B:반응형
        </script>
        <!-- Enliple Tracker End -->
    @endif
    <!--// AD script end -->
@endif
