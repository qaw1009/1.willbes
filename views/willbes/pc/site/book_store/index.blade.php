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
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>

        <div class="curriWrap c_both">
            @if($pattern == 'all')
                {{-- 대분류 카테고리 --}}
                <ul class="curriTabs c_both">
                    @foreach($arr_base['category_d1'] as $idx => $row)
                        <li><a href="#none" onclick="goReUrl('cate_code', '{{ $row['CateCode'] }}', 'subject_idx');" class="@if($arr_base['cate_code_d1'] == $row['CateCode']) on @endif">{{ $row['CateName'] }}</a></li>
                    @endforeach
                </ul>

                <div class="CurriBox mb20">
                    <table cellspacing="0" cellpadding="0" class="curriTable">
                        <colgroup>
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                        </colgroup>
                        <tbody>
                        @if(empty($arr_base['category_d2']) === false)
                            <tr>
                                <th class="tx-gray">카테고리</th>
                                <td colspan="9">
                                    {{-- 중분류 카테고리 --}}
                                    <ul class="curriSelect">
                                        @foreach($arr_base['category_d2'] as $idx => $row)
                                            <li><a href="#none" onclick="goReUrl('cate_code', '{{ $row['CateCode'] }}', 'subject_idx');" class="@if($arr_base['cate_code_d2'] == $row['CateCode']) on @endif">{{ $row['CateName'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <th class="tx-gray">카테고리</th>
                                <td colspan="9" class="tx-blue tx-left">* 상위 카테고리 선택시 카테고리를 확인하실 수 있습니다. 상위 카테고리를 먼저 선택해 주세요!</td>
                            </tr>
                        @endif
                        @if(empty($arr_base['subject']) === false)
                            <tr>
                                <th class="tx-gray">과목선택</th>
                                <td colspan="9">
                                    {{-- 과목 --}}
                                    <ul class="curriSelect">
                                        <li><a href="#none" onclick="goUrl('subject_idx', '');" class="@if(empty(element('subject_idx', $arr_input)) === true) on @endif">전체</a></li>
                                        @foreach($arr_base['subject'] as $idx => $row)
                                            <li><a href="#none" onclick="goUrl('subject_idx', '{{ $row['SubjectIdx'] }}');" class="@if(element('subject_idx', $arr_input) == $row['SubjectIdx']) on @endif">{{ $row['SubjectName'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <th class="tx-gray">과목선택</th>
                                <td colspan="9" class="tx-blue tx-left">* 카테고리 선택시 카테고리별 과목을 확인하실 수 있습니다. 카테고리를 먼저 선택해 주세요!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- curriWrap -->
            @else
                {{-- 타이틀 텍스트 --}}
                <div class="wsBook-Subject tx-dark-black NG">
                    · {{ array_get($__cfg['SiteMenu']['ActiveMenu'], 'MenuName', $pattern_name) }}
                </div>
            @endif

            {{-- 정렬/검색 영역 --}}
            <div class="willbes-Lec-Search p_re mb15">
                <div class="inputBox p_re">
                    <div class="selectBox">
                        <select id="search_order" name="search_order" class="" onchange="goUrl('search_order', this.value);">
                            <option value="regist" @if(element('search_order', $arr_input) == 'regist') selected="selected" @endif>최근등록순</option>
                            <option value="name-desc" @if(element('search_order', $arr_input) == 'name-desc') selected="selected" @endif>상품명↑</option>
                            <option value="name-asc" @if(element('search_order', $arr_input) == 'name-asc') selected="selected" @endif>상품명↓</option>
                            <option value="publdate-desc" @if(element('search_order', $arr_input) == 'publdate-desc') selected="selected" @endif>발행일↑</option>
                            <option value="publdate-asc" @if(element('search_order', $arr_input) == 'publdate-asc') selected="selected" @endif>발행일↓</option>
                            <option value="price-desc" @if(element('search_order', $arr_input) == 'price-desc') selected="selected" @endif>가격↑</option>
                            <option value="price-asc" @if(element('search_order', $arr_input) == 'price-asc') selected="selected" @endif>가격↓</option>
                        </select>
                    </div>
                    <div class="selectBox">
                        <select id="search_keyword" name="search_keyword" title="직접입력" class="">
                            <option value="ProdName" @if($arr_base['search_keyword'] == 'ProdName') selected="selected" @endif>도서명</option>
                            <option value="wAuthorNames" @if($arr_base['search_keyword'] == 'wAuthorNames') selected="selected" @endif>저자명</option>
                            <option value="wPublName" @if($arr_base['search_keyword'] == 'wPublName') selected="selected" @endif>출판사</option>
                        </select>
                    </div>
                    <input type="text" id="search_value" name="search_value" maxlength="30" value="{{ $arr_base['search_value'] }}">
                    <button type="button" id="btn_search" onclick="" class="search-Btn">
                        <span>검색</span>
                    </button>
                </div>
            </div>
            <!-- willbes-Lec-Search -->

            <form id="regi_book_form" name="regi_book_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
                <input type="hidden" name="cart_type" value="book"/>   {{-- 장바구니 탭 아이디 --}}
                <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}
                <div class="wsBookWrap p_re">
                    <div class="amount">총 <span>{{ $count }}</span>개의 상품이 있습니다.</div>
                    <div class="wsBook-buyBtn">
                        <ul>
                            <li class="btnAuto180 h36">
                                <button type="button" name="btn_book_cart" data-direct-pay="N" data-is-redirect="Y" class="mem-Btn bg-white bd-light-gray">
                                    <span class="tx-black">장바구니</span>
                                </button>
                            </li>
                            <li class="btnAuto180 h36">
                                <button type="button" name="btn_book_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="mem-Btn bg-green bd-green">
                                    <span>바로결제</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!-- willbes-Lec-buyBtn -->

                    {{-- 교재 리스트 --}}
                    <div class="wsBookListBox mt20">
                        @foreach($data as $row)
                            <div class="wsBook">
                                <div class="wsBookImg">
                                    <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}');">
                                        <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgSmName'] }}" alt="{{ $row['ProdName'] }}" title="{{ $row['ProdName'] }}"/>
                                    </a>
                                </div>
                                <div class="wsBookInfo">
                                    <ul>
                                        <li class="bookTitle NSK">
                                            <label>
                                                <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $row['rwSaleTypeCcd'] . ':' . $row['ProdCode'] }}:book" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_books" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif>
                                            </label>
                                            <a href="#none" onclick="goShow('{{ $row['ProdCode'] }}')">{{ $row['ProdName'] }}</a>
                                        </li>
                                        <li>
                                            <strong>[저자]</strong>
                                            <a href="#none" onclick="goSearchKeyword('wAuthorNames', '{{ $row['wAuthorNames'] }}');">{{ $row['wAuthorNames'] }}</a>
                                        </li>
                                        <li>
                                            <strong>[출판사]</strong>
                                            <a href="#none" onclick="goSearchKeyword('wPublName', '{{ $row['wPublName'] }}');">{{ $row['wPublName'] }}</a>
                                        </li>
                                        <li>
                                            <strong>[출간일]</strong>
                                            {{ $row['wPublDate'] }}
                                        </li>
                                        <li>
                                            <strong class="@if($row['wSaleCcd'] == '112002' || $row['wSaleCcd'] == '112003') tx-red @endif">[{{ $row['wSaleCcdName'] }}]</strong>
                                            <span class="line-through">{{ number_format($row['rwSalePrice']) }}원</span> →
                                            <span class="tx-blue strong">{{ number_format($row['rwRealSalePrice']) }}원</span>
                                        </li>
                                        <li>
                                            <select name="prod_qty[{{ $row['ProdCode'] }}]" title="수량">
                                                @for($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {!! $paging['pagination'] !!}
            </form>
        </div>
    </div>
    <!--//Content-->

    {{-- 날개 배너 --}}
    {!! banner('교재구매_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}

    {{-- 퀵 메뉴 --}}
    @include('willbes.pc.site.book_store.quick_menu')
</div>
<!-- End Container -->
<script src="/public/js/willbes/product_util.js?ver={{time()}}"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_book_form');

    $(document).ready(function() {
        // 장바구니, 바로결제 버튼 클릭
        $regi_form.on('click', 'button[name="btn_book_cart"], button[name="btn_book_direct_pay"]', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var $is_direct_pay = $(this).data('direct-pay');
            var $is_redirect = $(this).data('is-redirect');
            addCartNDirectPay($regi_form, $is_direct_pay, $is_redirect, 'on');
        });

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
