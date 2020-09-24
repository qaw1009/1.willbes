@if(empty($data['new_product']) === false)
    <div class="will-nTit">윌비스 임용 <span class="tx-color">교재</span></div>
    <div class="bookContent">
        <ul class="bookList">
            @foreach($data['new_product'] as $row)
                <li>
                    <div class="bookImg">
                        <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ front_url('/book') }}')">
                            <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgOgName'] }}" title="{{ $row['ProdName'] }}">
                        </a>
                    </div>
                    <div>
                        <p>[{{ $row['ProdCateName'] }}]</p>
                        <p>{{ $row['ProdName'] }}</p>
                        <p><span>{{ number_format($row['rwSalePrice']) }}</span> → <strong>{{ number_format($row['rwRealSalePrice']) }}원</strong></p>
                    </div>
                </li>
            @endforeach
        </ul>
        <p class="leftBtn" id="imgBannerLeft3"><a href="#none">이전</a></p>
        <p class="rightBtn" id="imgBannerRight3"><a href="none">다음</a></p>
    </div>

    {{-- 교재보기 팝업 willbes-Layer-Box --}}
    <div id="InfoForm" class="willbes-Layer-Box"></div>

    <script>
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
        });
    </script>
@endif