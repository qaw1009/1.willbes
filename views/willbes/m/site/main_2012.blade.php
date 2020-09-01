@extends('willbes.m.layouts.master')

@section('content')
{{-- TODO : 온라인서점 개발 테스트 --}}
@if(ENVIRONMENT == 'production')
    @php header('Location:'.site_url('/?viewPC=1')); @endphp
@endif

<!-- Container -->
<div id="Container" class="Container NSK wsbook mb40">
    {!! banner('M_메인_빅배너', 'MainSlider mt20', $__cfg['SiteCode'], '0') !!}
    {!! banner('M_메인_띠배너', 'MainSlider mt20', $__cfg['SiteCode'], '0') !!}

    <div class="mainTit mt30 NSK-Black">신간안내 <a href="{{ front_url('/bookStore/index/pattern/new') }}" class="NSK">+ 더보기</a></div>
    <div class="wsbookList mt20">
        <div class="swiper-container-nBook">
            <div class="swiper-wrapper">
                @foreach($data['new_product'] as $row)
                    <div class="swiper-slide">
                        <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                            <div class="bookimg">
                                <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}"/>
                            </div>
                            <ul>
                                <li>[{{ $row['ProdCateName'] }}]</li>
                                <li>{{ $row['ProdName'] }}</li>
                                <li><span>{{ number_format($row['rwSalePrice']) }}원</span> → <strong>{{ number_format($row['rwRealSalePrice']) }}원</strong></li>
                            </ul>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="mainTit mt30 NSK-Black">베스트셀러 <a href="{{ front_url('/bookStore/index/pattern/best') }}" class="NSK">+ 더보기</a></div>
    <div class="wsbookList mt20">
        <div class="swiper-container-nBook">
            <div class="swiper-wrapper">
                @foreach($data['best_product'] as $row)
                    <div class="swiper-slide">
                        <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                            <div class="bookimg">
                                <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}"/>
                            </div>
                            <ul>
                                <li>[{{ $row['ProdCateName'] }}]</li>
                                <li>{{ $row['ProdName'] }}</li>
                                <li><span>{{ number_format($row['rwSalePrice']) }}원</span> → <strong>{{ number_format($row['rwRealSalePrice']) }}원</strong></li>
                            </ul>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="mainTit mt30 NSK-Black">오늘의 책</div>
    <div class="todayBook">
        <div class="wsbookInfo" id="wsbookInfo">
            @foreach($data['today_product'] as $row)
                <div class="todaybookList">
                    <div class="bookimgB">
                        <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                            <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}"/>
                        </a>
                    </div>
                    <ul class="summary">
                        <li>{{ $row['ProdName'] }}</li>
                        <li>저자명 : {{ $row['wAuthorNames'] }}</li>
                        <li>출판사명 : {{ $row['wPublName'] }}</li>
                        <li><span>{{ number_format($row['rwSalePrice']) }}원</span> → <strong>{{ number_format($row['rwRealSalePrice']) }}원 ({{ number_format($row['rwSaleRate']) . $row['rwSaleRateUnit'] }}할인)</strong></li>
                    </ul>
                </div>
            @endforeach
        </div>
        <p class="leftBtn" id="bookInfoLeft"><a href="#none">이전</a></p>
        <p class="rightBtn" id="bookInfogRight"><a href="none">다음</a></p>
    </div>

    <div class="mainTit mt30 NSK-Black">MD 추천</div>
    <div class="wsbookList mt20">
        <div class="mdBook">
            @foreach($data['md_product'] as $row)
                <div class="swiper-slide">
                    <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                        <div class="bookimg">
                            <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}"/>
                        </div>
                        <ul>
                            <li>[{{ $row['ProdCateName'] }}]</li>
                            <li>{{ $row['ProdName'] }}</li>
                            <li><span>{{ number_format($row['rwSalePrice']) }}원</span> → <strong>{{ number_format($row['rwRealSalePrice']) }}원</strong></li>
                        </ul>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="noticeTabs c_both mt30">
        <ul class="tabWrap mainTab">
            <li><a href="#notice1" class="on">공지사항</a></li>
            <li><a href="#notice2">수험정보센터</a></li>
            <li><a href="#notice3">정오표/추록</a></li>
        </ul>
        <div class="tabBox buttonBox noticeBox">
            <div id="notice1" class="tabContent pd20">
                <div class="moreBtn"><a href="{{ front_url('/support/notice/index?s_cate_code_disabled=Y') }}">+ 더보기</a></div>
                <ul class="List-Table">
                    @if(empty($data['notice']) === true)
                        <li><span>등록된 내용이 없습니다.</span></li>
                    @else
                        @foreach($data['notice'] as $row)
                            <li>
                                <a href="{{ front_url('/support/notice/show?board_idx=' . $row['BoardIdx'] . '&s_cate_code_disabled=Y') }}">
                                    @if($row['IsBest'] == '1')<span>HOT</span>@endif {{$row['Title']}}
                                </a>
                                <span class="date">{{$row['RegDatm']}}</span>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div id="notice2" class="tabContent pd20">
                <div class="moreBtn"><a href="{{ front_url('/support/examNews/index?s_cate_code_disabled=Y') }}">+ 더보기</a></div>
                <ul class="List-Table">
                    @if(empty($data['exam_news']) === true)
                        <li><span>등록된 내용이 없습니다.</span></li>
                    @else
                        @foreach($data['exam_news'] as $row)
                            <li>
                                <a href="{{ front_url('/support/examNews/show?board_idx=' . $row['BoardIdx'] . '&s_cate_code_disabled=Y') }}">
                                    @if($row['IsBest'] == '1')<span>HOT</span>@endif {{$row['Title']}}
                                </a>
                                <span class="date">{{$row['RegDatm']}}</span>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div id="notice3" class="tabContent pd20">
                <div class="moreBtn"><a href="{{ front_url('/support/examErrata/index?s_cate_code_disabled=Y') }}">+ 더보기</a></div>
                <ul class="List-Table">
                    @if(empty($data['exam_errata']) === true)
                        <li><span>등록된 내용이 없습니다.</span></li>
                    @else
                        @foreach($data['exam_errata'] as $row)
                            <li>
                                <a href="{{ front_url('/support/examErrata/show?board_idx=' . $row['BoardIdx'] . '&s_cate_code_disabled=Y') }}">
                                    @if($row['IsBest'] == '1')<span>HOT</span>@endif {{$row['Title']}}
                                </a>
                                <span class="date">{{$row['RegDatm']}}</span>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <div class="csCenterBook">
        <ul class="tel">
            <li>
                <div class="nTit">도서 문의 : <span class="tx-main">1544-4944</span></div>
                <div class="nTxt">
                    [운영시간] 평일: 09시~ 18시 (점심시간 12시~13시)<br/>
                    주말/공휴일휴무
                </div>
            </li>
            <li>
                <a href="{{ front_url('/support/qna/index?s_cate_code=3132&s_cate_code_disabled=Y', false, true) }}">
                    <img src="{{ img_static_url('promotion/m/2012/icon_book_vs.png') }}">
                    <div>
                        1:1 상담
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- End Container -->
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // 신간, 베스트셀러, MD추천 도서
        new Swiper ('.swiper-container-nBook', {
            slidesPerView: 'auto',
            spaceBetween: 0,
            slidesPerGroup: 1,
            loop: true,
            loopFillGroupWithBlank: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }, // 3초에 한번씩 자동 넘김
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });

        // 오늘의 책
        var bookInfo = $('#wsbookInfo').bxSlider({
            auto:true,
            speed:350,
            pause:4000,
            controls:false,
            minSlides:1,
            maxSlides:1,
            slideMargin:0,
            autoHover:true,
            moveSlides:1,
            pager:false,
        });

        $('#bookInfoLeft').click(function() {
            bookInfo.goToPrevSlide();
        });

        $('#bookInfogRight').click(function() {
            bookInfo.goToNextSlide();
        });
    });

    // 상세 페이지 이동
    function goShow(prod_code) {
        location.href = '{{ front_url('/bookStore/show/pattern/all/prod-code/') }}' + prod_code;
    }
</script>
@stop
