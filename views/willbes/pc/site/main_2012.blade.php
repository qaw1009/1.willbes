@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container hanlim3094 wsBook NSK c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        {{-- 메인_빅배너 --}}
        <div class="Section">
            @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
            <div id="MainRollingSlider" class="MaintabBox">
                {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'MaintabSlider') !!}

                <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p>

                <div id="MainRollingDiv" class="MaintabList">
                    <ul class="Maintab">
                    @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                        <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>

        {{-- 신간/화제의책/예약판매 --}}
        <div class="Section">
            <div class="widthAuto bookListWrap">
                <div class="wsbookTabMenu">
                    <ul class="tabWrap wsbookTab NGR">
                        <li><a href="#tab01" class="on">신간 안내</a></li>
                        <li><a href="#tab02">화제의 책</a></li>
                        <li><a href="#tab03">출간 예정</a></li>
                    </ul>
                    <div class="more"><a href="{{ front_url('/bookStore/index/pattern/new') }}">+ 신간안내 더보기</a></div>
                </div>
                <div id="tab01" class="bookContent">
                    <div class="booktitle">
                        <span><img src="{{ img_static_url('promotion/main/2012_main_img01.png') }}" alt="신간안내"></span>
                        <div class="NGEB">신간안내</div>
                        <p>윌스토리가 새로 나온 책을 안내해 드립니다.<br>혹시나 나에게 필요한 책이 나왔는지 확인해 보세요.</p>
                    </div>
                    <div class="bookList">
                        <ul>
                            {{-- 신간안내 --}}
                            @foreach($data['new_product'] as $row)
                                <li>
                                    <div class="bookImg">
                                        <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                                            <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}">
                                        </a>
                                    </div>
                                    <p>[{{ $row['ProdCateName'] }}]</p>
                                    <p><a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">{{ $row['ProdName'] }}</a></p>
                                    <p><span>{{ number_format($row['rwSalePrice']) }}원</span> → <strong>{{ number_format($row['rwRealSalePrice']) }}원</strong></p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="tab02" class="bookContent">
                    <div class="booktitle">
                        <span><img src="{{ img_static_url('promotion/main/2012_main_img02.png') }}" alt="화제의책"></span>
                        <div class="NGEB">화제의 책</div>
                        <p>윌스토리에서 화제가 된 책은 무엇일까요?<br>아래에서 확인해보세요!</p>
                    </div>
                    <div class="bookList">
                        <ul>
                            {{-- 화제의책 --}}
                            @foreach($data['topic_product'] as $row)
                                <li>
                                    <div class="bookImg">
                                        <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                                            <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}">
                                        </a>
                                    </div>
                                    <p>[{{ $row['ProdCateName'] }}]</p>
                                    <p><a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">{{ $row['ProdName'] }}</a></p>
                                    <p><span>{{ number_format($row['rwSalePrice']) }}원</span> → <strong>{{ number_format($row['rwRealSalePrice']) }}원</strong></p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="tab03" class="bookContent">
                    <div class="booktitle">
                        <span><img src="{{ img_static_url('promotion/main/2012_main_img03.png') }}" alt="예약판매"></span>
                        <div class="NGEB">출간 예정</div>
                        <p>곧 나올 책들을 윌스토리에서<br>먼저 만나보세요!</p>
                    </div>
                    <div class="bookList">
                        <ul>
                            {{-- 출간 예정 --}}
                            @foreach($data['resv_product'] as $row)
                                <li>
                                    <div class="bookImg">
                                        <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                                            <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}">
                                        </a>
                                    </div>
                                    <p>[{{ $row['ProdCateName'] }}]</p>
                                    <p><a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">{{ $row['ProdName'] }}</a></p>
                                    <p><span>{{ number_format($row['rwSalePrice']) }}원</span> → <strong>{{ number_format($row['rwRealSalePrice']) }}원</strong></p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- 베스트셀러 --}}
        <div class="Section">
            <div class="widthAuto bookListWrap">
                <div class="wsbookTabMenu">
                    <div class="more"><a href="{{ front_url('/bookStore/index/pattern/best') }}">+ 베스트셀러 더보기</a></div>
                </div>
                <div class="bookContent">
                    <div class="booktitle">
                        <span><img src="{{ img_static_url('promotion/main/2012_main_img04.png') }}" alt="베스트셀러"></span>
                        <div class="NGEB">베스트셀러</div>
                        <p>윌스토리의 베스트셀러를 소개합니다..<br>당신이 보고싶었던 책도 있나요?</p>
                    </div>
                    <div class="bookList">
                        <ul>
                            @foreach($data['best_product'] as $row)
                                <li>
                                    <div class="bookImg">
                                        <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                                            <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}">
                                        </a>
                                    </div>
                                    <p>[{{ $row['ProdCateName'] }}]</p>
                                    <p><a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">{{ $row['ProdName'] }}</a></p>
                                    <p><span>{{ number_format($row['rwSalePrice']) }}원</span> → <strong>{{ number_format($row['rwRealSalePrice']) }}원</strong></p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- 오늘의책 / MD 추천 --}}
        <div class="Section">
            <div class="widthAuto">
                <div class="todayBook">
                    <div class="bookInfo" id="bookInfo">
                        @foreach($data['today_product'] as $row)
                            <div class="bookList">
                                <div class="bookimgB">
                                    <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                                        <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgOgName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}">
                                    </a>
                                </div>
                                <ul class="summary">
                                    <li>오늘 이런 책은 어떠신가요?</li>
                                    <li><a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');"><span>[오늘의 책]</span> {{ $row['ProdName'] }}</a></li>
                                    <li class="introduction">
                                        {{ strip_tags($row['wBookDesc']) }}
                                    </li>
                                    <li>
                                        <span>{{ number_format($row['rwSalePrice']) }}원</span> → <strong>{{ number_format($row['rwRealSalePrice']) }}원</strong>
                                        ({{ number_format($row['rwSaleRate']) . $row['rwSaleRateUnit'] }}할인)
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div><!--bookInfo//-->

                    <ul id="bx-pager-today">
                        @foreach($data['today_product'] as $row)
                            <li>
                                <a data-slide-index="{{ $loop->index -1 }}" href="#none">
                                    <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}">
                                </a>
                            </li>
                        @endforeach
                    </ul><!--bookimgS//-->

                    <p class="leftBtn" id="bookInfoLeft"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="bookInfogRight"><a href="none">다음</a></p>
                </div><!--todayBook//-->

                <div class="mdBook">
                    <h4 class="NGEB">추천도서</h4>
                    <div id="mdImg" class="slider">
                        @foreach($data['md_product'] as $row)
                            <div class="mdList">
                                <a href="#none">
                                    <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                                        <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}">
                                    </a>
                                </a>
                                <ul>
                                    <li>[{{ $row['ProdCateName'] }}]</li>
                                    <li><a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">{{ $row['ProdName'] }}</a></li>
                                    <li><span>{{ number_format($row['rwSalePrice']) }}원</span> → <strong>{{ number_format($row['rwRealSalePrice']) }}원</strong></li>
                                </ul>
                            </div>
                        @endforeach
                    </div><!--mdImg//-->
                </div>
            </div>
        </div>

        {{-- 메인_띠배너 --}}
        <div class="Section c_both mt90">
            <div class="widthAuto bnSecbar01">
                {!! banner_html(element('메인_띠배너', $data['arr_main_banner'])) !!}
            </div>
        </div>

        {{-- 게시판 --}}
        <div class="Section mt90">
            <div class="widthAuto">
                <div class="noticeTabs">
                    <div class="will-listTit">공지사항</div>
                    <div class="tabBox noticeBox">
                        <div class="tabContent p_re">
                            <a href="{{ front_url('/support/notice/index?s_cate_code_disabled=Y') }}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                @if(empty($data['notice']) === true)
                                    <li><span>등록된 내용이 없습니다.</span></li>
                                @else
                                    @foreach($data['notice'] as $row)
                                        <li>
                                            <a href="{{ front_url('/support/notice/show?board_idx=' . $row['BoardIdx'] . '&s_cate_code_disabled=Y') }}">
                                                @if($row['IsBest'] == '1')<span>HOT</span>@endif {{$row['Title']}}
                                                @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}"/>@endif
                                            </a>
                                            <span class="date">{{$row['RegDatm']}}</span>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="noticeTabs">
                    <div class="will-listTit">수험정보센터</div>
                    <div class="tabBox noticeBox">
                        <div class="tabContent p_re">
                            <a href="{{ front_url('/support/examNews/index?s_cate_code_disabled=Y') }}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                @if(empty($data['exam_news']) === true)
                                    <li><span>등록된 내용이 없습니다.</span></li>
                                @else
                                    @foreach($data['exam_news'] as $row)
                                        <li>
                                            <a href="{{ front_url('/support/examNews/show?board_idx=' . $row['BoardIdx'] . '&s_cate_code_disabled=Y') }}">
                                                @if($row['IsBest'] == '1')<span>HOT</span>@endif {{$row['Title']}}
                                                @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}"/>@endif
                                            </a>
                                            <span class="date">{{$row['RegDatm']}}</span>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="noticeTabs mr-zero">
                    <div class="will-listTit">정오표/추록</div>
                    <div class="tabBox noticeBox">
                        <div class="tabContent p_re">
                            <a href="{{ front_url('/support/examErrata/index?s_cate_code_disabled=Y') }}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                @if(empty($data['exam_errata']) === true)
                                    <li><span>등록된 내용이 없습니다.</span></li>
                                @else
                                    @foreach($data['exam_errata'] as $row)
                                        <li>
                                            <a href="{{ front_url('/support/examErrata/show?board_idx=' . $row['BoardIdx'] . '&s_cate_code_disabled=Y') }}">
                                                @if($row['IsBest'] == '1')<span>HOT</span>@endif {{$row['Title']}}
                                                @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}"/>@endif
                                            </a>
                                            <span class="date">{{$row['RegDatm']}}</span>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- CS센터 --}}
        <div class="Section mt50 mb90 c_both">
            <div class="widthAuto">
                <div class="CScenterBox">
                    <dl>
                        <dt class="willbesNumber">
                            <ul>
                                <li>
                                    <div class="nTit">도서 문의</div>
                                    <div class="nNumber tx-color">1544-4944</div>
                                    <div class="nTxt">
                                        [운영시간]<br/>
                                        평일: 09시~ 17시 (점심시간12시~13시) | 주말/공휴일휴무
                                    </div>
                                </li>
                            </ul>
                        </dt>
                        <dt class="willbesCenter">
                            <div class="centerTit">윌스토리 사이트에 물어보세요!</div>
                            <ul>
                                <li>
                                    <a href="{{ front_url('/support/faq/index') }}">
                                        <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                        <div class="nTxt">자주하는<br/>질문</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ front_url('/support/qna/index?s_cate_code=3132&s_cate_code_disabled=Y') }}">
                                        <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                                        <div class="nTxt">1:1상담</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ front_url('/support/partnerQna/index?s_cate_code=3132&s_cate_code_disabled=Y') }}">
                                        <img src="{{ img_url('cop/icon_cecenter5.png') }}">
                                        <div class="nTxt">제휴문의</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ front_url('/bookStore/landing/type/recruit') }}">
                                        <img src="{{ img_url('cop/icon_cecenter6.png') }}">
                                        <div class="nTxt">저자모집</div>
                                    </a>
                                </li>
                            </ul>
                        </dt>
                    </dl>
                </div>
            </div>
        </div>

        {{-- 퀵 메뉴 --}}
        @include('willbes.pc.site.book_store.quick_menu')
    </div>
    <!-- End Container -->

    {{-- popup 온라인서점 --}}
    {!! popup('657001', $__cfg['SiteCode'], '3132') !!}

    <script type="text/javascript">
        $(document).ready(function() {
            // 메인 빅배너
            var slidesImg = $('.MaintabSlider').bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:400,
                pause:5000,
                sliderWidth:1120,
                auto : true,
                autoHover: true,
                pagerCustom: '#MainRollingDiv',
                controls:false,
                onSliderLoad: function(){
                    $('#MainRollingSlider').css('visibility', 'visible').animate({opacity:1});
                }
            });

            $('#imgBannerLeft').click(function() {
                slidesImg.goToPrevSlide();
            });

            $('#imgBannerRight').click(function() {
                slidesImg.goToNextSlide();
            });

            // 오늘의 책
            var bookInfo = $('#bookInfo').bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:4000,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover:true,
                moveSlides:1,
                touchEnabled : (navigator.maxTouchPoints > 0),
                pagerCustom:'#bx-pager-today',
                pager:true,
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
