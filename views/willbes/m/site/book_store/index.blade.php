@extends('willbes.m.layouts.master')

@section('page_title', '도서구매')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <!-- PageTitle -->
    @include('willbes.m.layouts.page_title')

    <form id="url_form" name="url_form" method="GET">
        @foreach($arr_input as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
    </form>

    @if($is_sort_mapping === true)
        {{-- 선택 검색영역 --}}
        <ul class="Lec-Selected NG tx-gray">
            <li>
                {{-- 대분류 카테고리 --}}
                <select id="cate_code_top" name="cate_code_top" title="상위 카테고리" onchange="goReUrl('cate_code', this.value, 'subject_idx');">
                    @if(empty($arr_base['cate_code_d1']) === true)
                        <option value="">전체</option>
                    @endif
                    @foreach($arr_base['category_d1'] as $idx => $row)
                        <option value="{{ $row['CateCode'] }}" @if($arr_base['cate_code_d1'] == $row['CateCode']) selected="selected" @endif>{{ $row['CateName'] }}</option>
                    @endforeach
                </select>
            </li>
            <li>
                <select id="cate_code" name="cate_code" title="카테고리" onchange="goReUrl('cate_code', this.value, 'subject_idx');">
                    @if(empty($arr_base['cate_code_d2']) === true)
                        <option value="">전체</option>
                    @endif
                    @if(empty($arr_base['category_d2']) === false)
                        @foreach($arr_base['category_d2'] as $idx => $row)
                            <option value="{{ $row['CateCode'] }}" @if($arr_base['cate_code_d2'] == $row['CateCode']) selected="selected" @endif>{{ $row['CateName'] }}</option>
                        @endforeach
                    @endif
                </select>
            </li>
            <li>
                <select id="subject_idx" name="subject_idx" title="과목" onchange="goUrl('subject_idx', this.value);">
                    <option value="">과목전체</option>
                    @if(empty($arr_base['subject']) === false)
                        @foreach($arr_base['subject'] as $idx => $row)
                            <option value="{{ $row['SubjectIdx'] }}" @if(element('subject_idx', $arr_input) == $row['SubjectIdx']) selected="selected" @endif>{{ $row['SubjectName'] }}</option>
                        @endforeach
                    @endif
                </select>
            </li>
            <li class="resetBtn2">
                <a href="#none" onclick="location.href=location.pathname">초기화</a>
            </li>
        </ul>
    @endif

    {{-- 정렬/검색어 영역 --}}
    <div class="willbes-Lec-Selected NG c_both tx-gray pb-zero">
        <select id="search_order" name="search_order" title="정렬순서" class="seleProcess width30p" onchange="goUrl('search_order', this.value);">
            <option value="regist" @if(element('search_order', $arr_input) == 'regist') selected="selected" @endif>최근등록순</option>
            <option value="name-desc" @if(element('search_order', $arr_input) == 'name-desc') selected="selected" @endif>상품명↑</option>
            <option value="name-asc" @if(element('search_order', $arr_input) == 'name-asc') selected="selected" @endif>상품명↓</option>
            <option value="publdate-desc" @if(element('search_order', $arr_input) == 'publdate-desc') selected="selected" @endif>발행일↑</option>
            <option value="publdate-asc" @if(element('search_order', $arr_input) == 'publdate-asc') selected="selected" @endif>발행일↓</option>
            <option value="price-desc" @if(element('search_order', $arr_input) == 'price-desc') selected="selected" @endif>가격↑</option>
            <option value="price-asc" @if(element('search_order', $arr_input) == 'price-asc') selected="selected" @endif>가격↓</option>
        </select>
        @if($is_sort_mapping === true)
            <select id="search_keyword" name="search_keyword" title="검색키워드" class="seleLec width30p ml1p">
                <option value="ProdName" @if($arr_base['search_keyword'] == 'ProdName') selected="selected" @endif>도서명</option>
                <option value="wAuthorNames" @if($arr_base['search_keyword'] == 'wAuthorNames') selected="selected" @endif>저자명</option>
                <option value="wPublName" @if($arr_base['search_keyword'] == 'wPublName') selected="selected" @endif>출판사</option>
            </select>
        @endif
    </div>
    @if($is_sort_mapping === true)
        <div class="willbes-Lec-Search NG width100p pl20 pr20 pb20 mt10">
            <div class="inputBox width100p p_re">
                <input type="text" id="search_value" name="search_value" class="labelSearch width100p" placeholder="" maxlength="30" value="{{ $arr_base['search_value'] }}">
                <button type="button" id="btn_search" onclick="" class="search-Btn">
                    <span class="hidden">검색</span>
                </button>
            </div>
        </div>
        <div class="tx14 pl20">총 <strong class="tx-blue">{{ $count }}</strong>개의 상품이 있습니다.</div>
    @else
        <div class="c_both"></div>
    @endif

    {{-- 상품 목록 --}}
    <div class="bookListWrap">
        <form id="regi_book_form" name="regi_book_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
            <input type="hidden" name="cart_type" value="book"/>   {{-- 장바구니 탭 아이디 --}}
            <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

            @foreach($data as $row)
                <div class="bookList">
                    <div class="bookImg">
                        <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                            <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}" style="max-height: 200px;">
                        </a>
                    </div>
                    <ul class="bookInfo">
                        <li class="bookTitle">
                            <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">{{ $row['ProdName'] }}</a>
                        </li>
                        <li>
                            <span class="writer"><a href="#none" onclick="goSearchKeyword('wAuthorNames', '{{ $row['wAuthorNames'] }}');">{{ $row['wAuthorNames'] }}</a> 저</span>
                            <br><span class="row-line">|</span>
                            <a href="#none" onclick="goSearchKeyword('wPublName', '{{ $row['wPublName'] }}');">{{ $row['wPublName'] }}</a>
                        </li>
                        <li>
                            <span class="@if($row['wSaleCcd'] == '112002' || $row['wSaleCcd'] == '112003') tx-red @endif">[{{ $row['wSaleCcdName'] }}]</span>
                            <span class="tx-blue">{{ number_format($row['rwRealSalePrice'], 0) }}원</span>
                            (↓{{ number_format($row['rwSaleRate']) . $row['rwSaleRateUnit'] }})
                        </li>
                        <li>
                            <span class="d_none">
                                <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $row['rwSaleTypeCcd'] . ':' . $row['ProdCode'] }}:book" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_books" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/>
                            </span>
                            <select name="prod_qty[{{ $row['ProdCode'] }}]" title="수량" class="seleLec width30p ml1p">
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </li>
                        <li>
                            <div class="w-buy">
                                <ul class="two">
                                @if($row['IsSalesAble'] == 'Y')
                                    <li><a href="#none" name="btn_book_cart" data-direct-pay="N" data-is-redirect="Y" data-prod-code="{{ $row['ProdCode'] }}" class="btn_gray">장바구니</a></li>
                                    <li><a href="#none" name="btn_book_direct_pay" data-direct-pay="Y" data-is-redirect="Y" data-prod-code="{{ $row['ProdCode'] }}" class="btn_blue">바로결제</a></li>
                                @else
                                    <li></li>
                                @endif
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            @endforeach
        </form>
        <div class="widthAutoFull d_inblock">
            {!! $paging['pagination'] !!}
        </div>
    </div>

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')
</div>
<!-- End Container -->
<script src="/public/js/willbes/product_util.js?ver={{time()}}"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_book_form');

    $(document).ready(function() {
        {{-- 실서비스 --}}
        // 장바구니 버튼 클릭
        $regi_form.on('click', 'a[name="btn_book_cart"]', function() {
            var $is_redirect = $(this).data('is-redirect');
            var $prod_code = $(this).data('prod-code');

            $regi_form.find('input:checkbox[name="prod_code[]"]').prop('checked', false);
            $regi_form.find('input:checkbox[name="prod_code[]"]:input[data-prod-code="'+$prod_code+'"]').prop('checked', true);

            @if(sess_data('is_login') === true)
                addCartNDirectPay($regi_form, 'N', $is_redirect, 'on');
            @else
                @if($is_npay === true)
                    addGuestCart($regi_form, 'N', $is_redirect);
                @else
                    // 네이버페이 결제를 사용하지 않을 경우 로그인 필수
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                @endif
            @endif
        });

        // 바로결제 버튼 클릭
        $regi_form.on('click', 'a[name="btn_book_direct_pay"]', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var $prod_code = $(this).data('prod-code');
            $regi_form.find('input:checkbox[name="prod_code[]"]').prop('checked', false);
            $regi_form.find('input:checkbox[name="prod_code[]"]:input[data-prod-code="'+$prod_code+'"]').prop('checked', true);
            addCartNDirectPay($regi_form, 'Y', 'Y', 'on');
        });
        {{--// 실서비스 --}}

        {{-- TODO : 네이버페이 심사 --}}
        // 장바구니, 바로결제 버튼 클릭
        {{--$regi_form.on('click', 'a[name="btn_book_cart"], a[name="btn_book_direct_pay"]', function() {
            var $is_direct_pay = $(this).data('direct-pay');
            var $is_redirect = $(this).data('is-redirect');
            var $prod_code = $(this).data('prod-code');

            $regi_form.find('input:checkbox[name="prod_code[]"]').prop('checked', false);
            $regi_form.find('input:checkbox[name="prod_code[]"]:input[data-prod-code="'+$prod_code+'"]').prop('checked', true);

            @if(sess_data('is_login') === true)
                addCartNDirectPay($regi_form, $is_direct_pay, $is_redirect, 'on');
            @else
                @if($is_npay === true)
                    addGuestCart($regi_form, $is_direct_pay, $is_redirect);
                @else
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                @endif
            @endif
        });--}}
        {{--// 네이버페이 심사 --}}

        // 검색어 입력 후 엔터
        $('#search_value').on('keyup', function() {
            if (window.event.keyCode === 13) {
                goSearch();
            }
        });

        // 검색 버튼 클릭
        $('#btn_search').on('click', function() {
            goSearch();
        });

        var goSearch = function() {
            goSearchKeyword(document.getElementById('search_keyword').value, document.getElementById('search_value').value);
        };
    });

    // 키워드 검색
    function goSearchKeyword(keyword, value) {
        goUrl('search_text', Base64.encode(keyword + ':' + value));
    }

    // 상세 페이지 이동
    function goShow(prod_code) {
        location.href = '{{ front_url('/bookStore/show/pattern/' . $pattern . '/prod-code/') }}' + prod_code;
    }
</script>
@stop