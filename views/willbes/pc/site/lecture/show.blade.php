@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    <div class="Content p_re">
        <div class="willbes-Prof-Detail NG tx-black">
            <div class="prof-profile p_re">
                <div class="Name">
                    <strong>{{ $data['wProfName'] }}</strong><br/>교수님
                </div>
                <div class="ProfImg">
                    <img src="{{ $data['ProfReferData']['lec_detail_img'] or '' }}">
                </div>
                <div class="prof-home subBtn NSK">
                    <a href="{{ site_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/' . $data['ProfIdx']) . '/?subject_idx=' . $data['SubjectIdx'] . '&subject_name=' . rawurlencode($data['SubjectName']) }}">
                        <img src="{{ img_url('sub/icon_profhome.gif') }}" style="margin-top: -4px; margin-right: 4px">교수홈
                    </a>
                </div>
            </div>
            <div class="lec-profile p_re">
                <div class="w-list">{{ $data['CourseName'] }} / {{ $data['SubjectName'] }}</div>
                <div class="w-tit tx-blue">{{ $data['ProdName'] }}</div>
                <dl class="w-info tx-dark-gray">
                    <dt>강의수 : <span class="tx-black">{{ $data['wUnitLectureCnt'] }}강</span></dt>
                    <dt><span class="row-line">|</span></dt>
                    <dt>수강기간 : <span class="tx-black">{{ $data['StudyPeriod'] }}일</span></dt>
                    <dt class="NSK ml15">
                        <span class="nBox n1">{{ $data['MultipleApply'] }}배수</span>
                        <span class="nBox n{{ substr($data['wLectureProgressCcd'], -1)+1 }}">{{ $data['wLectureProgressCcdName'] }}</span>
                    </dt>
                </dl>
                <div class="view-wrap">
                    <div class="w-notice p_re">
                        @if( empty($data['LectureSampleData']) === false)
                        <div class="w-sp one">
                            <a href="#none" onclick="openWin('viewBox')">맛보기{{ empty($data['LectureSampleData']) ? '' : count($data['LectureSampleData']) }}</a>
                        </div>
                        <div id="viewBox" class="viewBox">
                            <a class="closeBtn" href="#none" onclick="closeWin('viewBox')"><img src="{{ img_url('cart/close.png') }}"></a>
                            @foreach($data['LectureSampleData'] as $sample_idx => $sample_row)
                                <dl class="NSK">
                                    <dt class="Tit NG">맛보기{{ $sample_idx + 1 }}</dt>
                                    @if(empty($sample_row['wHD']) === false || empty($sample_row['wWD']) === false) <dt class="tBox t1 black"><a href="{{ $sample_row['wWD'] or $sample_row['wHD'] }}">HIGH</a></dt> @endif
                                    @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="{{ $sample_row['wSD'] }}">LOW</a></dt> @endif
                                </dl>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="all-view subBtn NSK">
                        <a href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/?prof_idx=' . $data['ProfIdx']) }}">
                            개설강좌 전체보기 >
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Prof-Detail -->

        <div class="willbes-Lec mb170 NG c_both">
            <div class="willbes-Buy-Table p_re mt20">
                <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="learn_pattern" value="on_lecture"/>  {{-- 학습형태 --}}
                    <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}
                <div class="willbes-Buy-List">
                    <table cellspacing="0" cellpadding="0" class="lecTable profTable">
                        <colgroup>
                            <col style="width: 445px;">
                            <col style="width: 265px;">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td class="w-lectit tx-left" colspan="2">
                                <span class="w-obj NSK"><div class="pBox p1">강좌</div></span>
                                <span class="MoreBtn"><a href="#Class">강좌정보 보기 ▼</a></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left">
                                <div class="w-tit">{{ $data['ProdName'] }}</div>
                            </td>
                            <td class="w-notice p_re tx-right">
                                @foreach($data['ProdPriceData'] as $price_idx => $price_row)
                                    <div class="priceWrap p_re">
                                        <span class="chkBox"><input type="checkbox" name="prod_code[]" value="{{ $data['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $data['ProdCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-sale-price="{{ $price_row['RealSalePrice'] }}" class="chk_products chk_only_{{ $data['ProdCode'] }}" onclick="checkOnly('.chk_only_{{ $data['ProdCode'] }}', this.value);"></span>
                                        <span class="select">[{{ $price_row['SaleTypeCcdName'] }}]</span>
                                        <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                        <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- lecTable -->

                    <div class="lecInfoTable" style="display: block">
                        <div class="w-lectit tx-left">
                            <span class="w-obj NSK"><div class="pBox p3">교재</div></span>
                            <span class="MoreBtn"><a href="#BookInfo">교재정보 보기 ▼</a></span>
                        </div>
                        <div class="w-grid">
                            @if(empty($data['ProdBookData']) === false)
                                @foreach($data['ProdBookData'] as $book_idx => $book_row)
                                    <div class="w-sub">
                                        <span class="w-obj tx-blue tx11">{{ $book_row['BookProvisionCcdName'] }}</span>
                                        <span class="w-subtit">{{ $book_row['ProdBookName'] }}</span>
                                        <span class="chk">
                                            <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003') soldout @elseif($book_row['wSaleCcd'] == '112004') press @endif">
                                                [{{ $book_row['wSaleCcdName'] }}]
                                            </label>
                                            <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" data-sale-price="{{ $book_row['RealSalePrice'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                        </span>
                                        <span class="priceWrap">
                                            <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                            <span class="discount">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                        </span>
                                    </div>
                                @endforeach
                            @else
                                <div class="w-sub">※ 별도 구매 가능한 교재가 없습니다.</div>
                            @endif
                        </div>
                    </div>
                    <!-- lecInfoTable -->
                </div>
                <div class="willbes-Buy-Price">
                    <table cellspacing="0" cellpadding="0" class="priceTable">
                        <colgroup>
                            <col style="width: 60px;"/>
                            <col style="width: 140px;"/>
                        </colgroup>
                        <thead>
                        <tr>
                            <th colspan="2">총 주문금액</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="tx-center tx-black">강좌</td>
                            <td class="price tx-right tx-light-blue"><span id="prod_sale_price">0</span>원</td>
                        </tr>
                        <tr>
                            <td class="tx-center tx-black">교재</td>
                            <td class="price tx-right tx-light-blue"><span id="book_sale_price">0</span>원</td>
                        </tr>
                        <tr>
                            <td class="total-price tx-right tx-light-blue" colspan="2"><span id="tot_sale_price">0</span>원</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="willbes-Lec-buyBtn GM">
                    <ul>
                        <li class="btnAuto180 h36">
                            @if($data['IsCart'] == 'Y')
                            <button type="submit" name="btn_cart" data-direct-pay="N" class="mem-Btn bg-blue bd-dark-blue">
                                <span>장바구니</span>
                            </button>
                            @endif
                        </li>
                        <li class="btnAuto180 h36">
                            <button type="submit" name="btn_cart" data-direct-pay="Y" class="mem-Btn bg-white bd-dark-blue">
                                <span class="tx-light-blue">바로결제</span>
                            </button>
                        </li>
                    </ul>
                </div>
                </form>
                <!-- willbes-Lec-buyBtn -->
            </div>
            <!-- willbes-Buy-Table -->

        </div>
        <!-- willbes-Lec -->

        <div id="Sticky" class="sticky-Wrap">
            <div class="sticky-menu NG">
                <ul>
                    <li><a href="#Class">강좌정보 ▼</a></li>
                    <li class="row-line">|</li>
                    <li><a href="#BookInfo">교재정보 ▼</a></li>
                    <li class="row-line">|</li>
                    <li><a href="#Leclist">강의목차 ▼</a></li>
                    <li class="row-line">|</li>
                    <li><a href="#Reply">수강후기 ▼</a></li>
                </ul>
            </div>
        </div>
        <!-- sticky-menu -->

        <a name="Class" class="sticky-top"></a>
        <div class="willbes-Class c_both">
            <div class="willbes-Lec-Tit NG tx-black">강좌정보</div>
            <div class="classInfoTable GM">
                <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                    <colgroup>
                        <col style="width: 140px;">
                        <col width="*">
                    </colgroup>
                    <tbody>
                    @foreach($data['ProdContents'] as $idx => $row)
                        <tr>
                            <td class="w-list bg-light-white">
                                강좌{{ $row['ContentTypeCcdName'] }}
                                @if($row['ContentTypeCcd'] == '633001')
                                    <br/><span class="tx-red">(필독)</span>
                                @endif
                            </td>
                            <td class="w-data tx-left pl25">
                                {!! $row['Content'] !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Class -->

        <div class="TopBtn">
            <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
        </div>
        <!-- TopBtn-->

        <a name="BookInfo" class="sticky-top"></a>
        <div class="willbes-BookInfo c_both">
            <div class="willbes-Lec-Tit NG tx-black">교재정보</div>
            @foreach($data['ProdSaleBooks'] as $idx => $row)
                <div class="bookInfo">
                    <div class="bookImg">
                        <img src="{{ $row['wAttachImgPath'] }}{{ $row['wAttachImgOgName'] }}" width="200" height="250">
                    </div>
                    <div class="bookDetail">
                        <div class="book-Tit tx-dark-black NG">{{ $row['ProdBookName'] }}</div>
                        <div class="book-Author tx-gray">
                            <ul>
                                <li>분야 : {{ $row['BookCateName'] }} <span class="row-line">|</span></li>
                                <li>저자 : {{ $row['wAuthorNames'] }} <span class="row-line">|</span></li>
                                <li>출판사 : {{ $row['wPublName'] }} <span class="row-line">|</span></li>
                                <li>판형/쪽수 : {{ $row['wEditionSize'] }} / {{ $row['wPageCnt'] }}</li>
                            </ul>
                            <ul>
                                <li>출판일 : {{ $row['wPublDate'] }} <span class="row-line">|</span></li>
                                <li>교재비 : <strong class="tx-light-blue">{{ number_format($row['RealSalePrice']) }}원</strong>
                                    (↓{{ $row['SaleRate'] . $row['SaleRateUnit'] }})
                                    <strong class="tx-{{ $row['wSaleCcd'] == '112001' ? 'light-blue' : 'red' }}">[{{ $row['wSaleCcdName'] }}]</strong>
                                </li>
                            </ul>
                        </div>
                        <div class="bookBoxWrap">
                            <ul class="tabWrap tabDepth2">
                                <li><a href="#info1{{ $idx }}">교재소개</a></li>
                                <li><a href="#info2{{ $idx }}">교재목차</a></li>
                            </ul>
                            <div class="tabBox">
                                <div id="info1{{ $idx }}" class="tabContent">
                                    <div class="book-TxtBox tx-gray">
                                        {!! $row['wBookDesc'] !!}
                                    </div>
                                    <div class="caution-txt tx-red">{{ $data['ProdBookMemo'] }}</div>
                                </div>
                                <div id="info2{{ $idx }}" class="tabContent">
                                    <div class="book-TxtBox tx-gray">
                                        {!! $row['wTableDesc'] !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- willbes-BookInfo -->

        <div class="TopBtn">
            <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
        </div>
        <!-- TopBtn-->

        <a name="Leclist" class="sticky-top"></a>
        <div class="willbes-Leclist c_both">
            <div class="willbes-Lec-Tit NG tx-black">강의목차</div>
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable under-gray tx-gray">
                    <colgroup>
                        <col style="width: 100px;">
                        <col style="width: 480px;">
                        <col style="width: 150px;">
                        <col style="width: 80px;">
                        <col style="width: 130px;">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>No<span class="row-line">|</span></th>
                        <th>강의명<span class="row-line">|</span></th>
                        <th>무료보기<span class="row-line">|</span></th>
                        <th>자료<span class="row-line">|</span></th>
                        <th>강의시간</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['LectureUnits'] as $idx => $row)
                    <tr>
                        <td class="w-no">{{ $row['wUnitNum'] }}회차 {{ $row['wUnitLectureNum'] }}강</td>
                        <td class="w-list tx-left pl20">{{ $row['wUnitName'] }}</td>
                        <td class="w-free">
                            @if (in_array($row['wUnitIdx'], $data['LectureSampleUnitIdxs']) === true)
                                @if(empty($row['wHD']) === false || empty($row['wWD']) === false) <span class="tBox NSK t1 black"><a href="{{ $row['wWD'] or $row['wHD'] }}">HIGH</a></span> @endif
                                @if(empty($row['wSD']) === false) <span class="tBox NSK t2 gray"><a href="{{ $row['wSD'] }}">LOW</a></span> @endif
                            @endif
                        </td>
                        <td class="w-file">
                            @if(empty($row['wUnitAttachFile']) === false)
                                <a href="{{ $row['wUnitAttachFileReal'] }}"><img src="{{ img_url('sub/icon_file.gif') }}"></a>
                            @endif
                        </td>
                        <td class="w-time">{{ $row['wRuntime'] }}분</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Leclist -->

        <div class="TopBtn">
            <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
        </div>
        <!-- TopBtn-->

        <a name="Reply" class="sticky-top"></a>
        <div class="willbes-Reply c_both">
            <div class="willbes-Lec-Tit NG tx-black">수강후기</div>
            <div class="ReplylistTable tx-gray">
                <div class="replyBox">
                    <div class="w-reply-teaser">
                        <ul>
                            <li class="w-tit tx-light-blue">2017 기미진 국어 아침특강(5-6월)</li>
                            <li class="w-name tx-center">홍길동</li>
                            <li class="row-line">|</li>
                            <li class="w-date tx-center">2018-03-24</li>
                        </ul>
                        <ul>
                            <li class="w-star"><img src="{{ img_url('sub/star4.gif') }}"></li>
                            <li class="w-subtit">강의 잘 들었습니다.</li>
                        </ul>
                    </div>
                    <div class="w-reply">
                        군더더기없는 깔끔한 강의입니다 강의시간이나 분량이 부담이 없어서 마음에 들었습니다~~ 군더더기없는 깔끔한 강의입니다 강의시간이나 분량이 부담이
                        없어서 마음에 들었습니다~~
                    </div>
                </div>
                <div class="replyBox">
                    <div class="w-reply-teaser">
                        <ul>
                            <li class="w-tit tx-light-blue">2018 신광은 형사소송법 기본이론(3월)</li>
                            <li class="w-name tx-center">홍진경</li>
                            <li class="row-line">|</li>
                            <li class="w-date tx-center">2018-03-24</li>
                        </ul>
                        <ul>
                            <li class="w-star"><img src="{{ img_url('sub/star5.gif') }}"></li>
                            <li class="w-subtit">역시 신광은교수님 강의 재미있게 잘 들었습니다.</li>
                        </ul>
                    </div>
                    <div class="w-reply">
                        체포는 48시간을 초과하면 안된다고 했는데 법관이 48시간 이내에 구속영장을 발부 해주지 않으면 피의자를 석방을 한 상태로 기다려야되는게 맞나요??
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Reply -->

        <div class="willbes-Leclist c_both">
            <div class="willbes-LecreplyList tx-gray">
                → 해당 강좌 총 수강후기 [ <a class="num tx-light-blue underline" href="#none">2건</a> ]
                <ul>
                    <li class="subBtn blue NSK"><a href="#none">수강후기 작성하기 ></a></li>
                    <li class="subBtn NSK"><a href="#none">수강후기 전체보기 ></a></li>
                </ul>
            </div>
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
                    <colgroup>
                        <col style="width: 100px;">
                        <col style="width: 590px;">
                        <col style="width: 120px;">
                        <col style="width: 130px;">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>No<span class="row-line">|</span></th>
                        <th>제목<span class="row-line">|</span></th>
                        <th>작성자<span class="row-line">|</span></th>
                        <th>등록일</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="w-no">2</td>
                        <td class="w-list tx-left pl20">시험에 나올 쟁점들을 꼭꼭 짚어주셔서 좋습니다. 수험생의 눈높이에 맞춰 주셔서 강의를...</td>
                        <td class="w-name">홍길동</td>
                        <td class="w-date">2018-04-22</td>
                    </tr>
                    <tr>
                        <td class="w-no">1</td>
                        <td class="w-list tx-left pl20">서울시 7급, 국가직 7급 합격생입니다.</td>
                        <td class="w-name">홍길순</td>
                        <td class="w-date">2018-04-22</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Leclist -->

        <div class="TopBtn">
            <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
        </div>
        <!-- TopBtn-->
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">
    </div>
</div>
<!-- End Container -->
<script src="/public/js/willbes/product_util.js"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_form');

    $(document).ready(function() {
        // 상품 선택/해제
        $regi_form.on('click', '.chk_products, .chk_books', function() {
            var prod_sale_price = 0, book_sale_price = 0;

            if ($(this).is(':checked') === true) {
                if ($(this).hasClass('chk_books') === true) {
                    // 수강생 교재 체크
                    if (checkStudentBook($regi_form, $(this)) === false) {
                        return;
                    }
                }
            } else {
                if ($(this).hasClass('chk_products') === true) {
                    // 강좌상품일 경우 연계도서상품 체크 해제
                    $regi_form.find('input[name="prod_code[]"][data-parent-prod-code="' + $(this).data('prod-code') + '"]').prop('checked', false);
                }
            }

            // 강좌 금액 계산
            $regi_form.find('.chk_products').each(function() {
                if ($(this).is(':checked')) {
                    prod_sale_price += $(this).data('sale-price');
                }
            });

            // 도서 금액 계산
            $regi_form.find('.chk_books').each(function() {
                if ($(this).is(':checked')) {
                    book_sale_price += $(this).data('sale-price');
                }
            });

            $regi_form.find('#prod_sale_price').text(addComma(prod_sale_price));
            $regi_form.find('#book_sale_price').text(addComma(book_sale_price));
            $regi_form.find('#tot_sale_price').text(addComma(prod_sale_price + book_sale_price));
        });

        // 장바구니, 바로결제 버튼 클릭
        $regi_form.on('click', 'button[name="btn_cart"], button[name="btn_direct_pay"]', function () {
            var $is_direct_pay = $(this).data('direct-pay') || 'N';

            if($regi_form.find('input[name="prod_code[]"]:checked').length < 1) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            if ($is_direct_pay === 'Y') {
                if (checkDirectPay($regi_form) === false) {
                    return;
                }
            }

            // set hidden value
            $regi_form.find('input[name="is_direct_pay"]').val($is_direct_pay);

            var url = '{{ site_url('/cart/store/cate/' . $__cfg['CateCode']) }}';
            ajaxSubmit($regi_form, url, function(ret) {
                if(ret.ret_cd) {
                    location.href = ret.ret_data.ret_url;
                }
            }, showValidateError, null, false, 'alert');
        });
    });
</script>
@stop
