{{-- TODO 임용(온라인,학원) 의 경우--}}
@if( empty($data) === false && $__cfg['SiteGroupCode'] === '1011')
    <!-- Enliple Tracker Start -->
    <script type="text/javascript">
        @if(element('ProfReferData', $data) === 'N' || empty(element('ProfReferData', $data)))
                productImg = '';
        @else
            @if(empty(element('lec_detail_img', $data['ProfReferData'])))
                productImg = '';
            @else
                productImg = '{{ str_last_pos_before(site_url('','https:'), '/'). element('lec_detail_img', $data['ProfReferData']) }}';
            @endif
        @endif

        var ENP_VAR = {
            collect: {},
            conversion: { product: [] }
        };
        ENP_VAR.collect.productCode = '{{element('ProdCode', $data)}}'; {{--상품 코드--}}
        ENP_VAR.collect.productName = '{!! addslashes(element('ProdName', $data)) !!}'; {{--상품명--}}
        ENP_VAR.collect.price = '{{ empty(element('ProdPriceData', $data)) || element('ProdPriceData', $data) === 'N' ? '' : (is_array($data['ProdPriceData']) ? element('SalePrice', $data['ProdPriceData'][0]) : '') }}'; {{--상품정가--}}
        ENP_VAR.collect.dcPrice = '{{ empty(element('ProdPriceData', $data)) || element('ProdPriceData', $data) === 'N' ? '' : (is_array($data['ProdPriceData']) ? element('SalePrice', $data['ProdPriceData'][0]) - element('RealSalePrice', $data['ProdPriceData'][0]) : '') }}'; {{--상품명--}}
        ENP_VAR.collect.soldOut = '{{ element('IsSalesAble', $data) === 'N' ? 'Y' : 'N' }}'; {{--품절 여부--}}
        ENP_VAR.collect.imageUrl =  productImg;
        ENP_VAR.collect.secondImageUrl = '';
        ENP_VAR.collect.thirdImageUrl = '';
        ENP_VAR.collect.fourthImageUrl = ''
        ENP_VAR.collect.topCategory = '{!! element('ProdCateName', $data) !!}';
        ENP_VAR.collect.firstSubCategory = '';
        ENP_VAR.collect.secondSubCategory = '';
        ENP_VAR.collect.thirdSubCategory = '';

        (function(a,g,e,n,t){a.enp=a.enp||function(){(a.enp.q=a.enp.q||[]).push(arguments)};n=g.createElement(e);n.async=!0;n.defer=!0;n.src="https://cdn.megadata.co.kr/dist/prod/enp_tracker_self_hosted.min.js";t=g.getElementsByTagName(e)[0];t.parentNode.insertBefore(n,t)})(window,document,"script");
        /* 상품수집 */
        enp('create', 'collect', 'ssam', { device: '{{ $__cfg['IsMobile'] === true ? 'M' : 'W'}}' });
    </script>
    <!-- Enliple Tracker End -->
@endif