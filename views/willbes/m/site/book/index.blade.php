@extends('willbes.m.layouts.master')

@section('page_title', '교재구매')

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

    {{-- 선택 검색영역 --}}
    <ul class="Lec-Selected NG tx-gray">
        @if(empty($arr_base['category_top']) === false)
            <li>
                <select id="cate_code_top" name="cate_code_top" title="상위 카테고리">
                    @foreach($arr_base['category_top'] as $idx => $row)
                        <option value="{{ $row['CateCode'] }}" @if($row['CateCode'] == $arr_base['category_top_default']) selected="selected" @endif>{{ $row['CateName'] }}</option>
                    @endforeach
                </select>
            </li>
        @endif
        @if(isset($arr_base['category']) === true)
            <li>
                <select id="cate_code" name="cate_code" title="카테고리" onchange="goReUrl('cate_code', this.value, 'series_ccd,subject_idx,prof_idx');">
                    @foreach($arr_base['category'] as $idx => $row)
                        <option value="{{ $row['CateCode'] }}" @if($row['CateCode'] == element('cate_code', $arr_input)) selected="selected" @endif class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                    @endforeach
                </select>
            </li>
        @endif
        @if(isset($arr_base['series']) === true)
            <li>
                <select id="series_ccd" name="series_ccd" title="직렬" onchange="goReUrl('series_ccd', this.value, 'subject_idx,prof_idx');">
                    <option value="">직렬전체</option>
                    @foreach($arr_base['series'] as $idx => $row)
                        <option value="{{ $row['ChildCcd'] }}" @if(element('series_ccd', $arr_input) == $row['ChildCcd']) selected="selected" @endif>{{ $row['ChildName'] }}</option>
                    @endforeach
                </select>
            </li>
        @endif
        @if(isset($arr_base['subject']) === true)
            <li>
                <select id="subject_idx" name="subject_idx" title="과목" onchange="goReUrl('subject_idx', this.value, 'prof_idx');">
                    <option value="">과목전체</option>
                    @foreach($arr_base['subject'] as $idx => $row)
                        <option value="{{ $row['SubjectIdx'] }}" @if(element('subject_idx', $arr_input) == $row['SubjectIdx']) selected="selected" @endif>{{ $row['SubjectName'] }}</option>
                    @endforeach
                </select>
            </li>
        @endif
        <li>
            <select id="prof_idx" name="prof_idx" title="교수" onchange="goUrl('prof_idx', this.value);">
                <option value="">교수전체</option>
                @if(isset($arr_base['professor']) === true)
                    @foreach($arr_base['professor'] as $idx => $row)
                        <option value="{{ $row['ProfIdx'] }}" @if(element('prof_idx', $arr_input) == $row['ProfIdx']) selected="selected" @endif>{{ $row['ProfNickName'] }}</option>
                    @endforeach
                @endif
            </select>
        </li>
        <li class="resetBtn2">
            <a href="#none" onclick="location.href=location.pathname">초기화</a>
        </li>
    </ul>

    {{-- 정렬/검색어 영역 --}}
    <div class="willbes-Lec-Selected NG c_both tx-gray pb-zero">
        <select id="search_order" name="search_order" title="정렬순서" class="seleProcess width30p" onchange="goUrl('search_order', this.value);">
            <option value="regist" @if(element('search_order', $arr_input) == 'regist') selected="selected" @endif>최근등록순</option>
            <option value="name" @if(element('search_order', $arr_input) == 'name') selected="selected" @endif>상품명순</option>
        </select>
        @php $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 2) @endphp
        <select id="search_keyword" name="search_keyword" title="검색키워드" class="seleLec width30p ml1p">
            <option value="ProdName" @if($arr_search_text[0] == 'ProdName') selected="selected" @endif>교재명</option>
            <option value="wPublName" @if($arr_search_text[0] == 'wPublName') selected="selected" @endif>출판사</option>
            <option value="wAuthorNames" @if($arr_search_text[0] == 'wAuthorNames') selected="selected" @endif>저자</option>
        </select>
    </div>
    <div class="willbes-Lec-Search NG width100p pl20 pr20 pb20 mt10">
        <div class="inputBox width100p p_re">
            <input type="text" id="search_value" name="search_value" class="labelSearch width100p" placeholder="제목 및 내용 검색" maxlength="30" value="{{ element('1', $arr_search_text) }}">
            <button type="button" id="btn_search" onclick="" class="search-Btn">
                <span class="hidden">검색</span>
            </button>
        </div>
    </div>

    <div class="tx14 pl20">총 <strong class="tx-blue">{{ count($data['list']) }}</strong>개의 상품이 있습니다.</div>

    {{-- 상품 목록 --}}
    <div class="bookListWrap">
        <form id="regi_book_form" name="regi_book_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
            <input type="hidden" name="cart_type" value="book"/>   {{-- 장바구니 탭 아이디 --}}
            <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

        @foreach($data['list'] as $row)
            <div class="bookList">
                <div class="bookImg"><img src="{{ $row['wAttachImgPath'] . $row['wAttachImgOgName'] }}" style="max-height: 200px;"></div>
                <ul class="bookInfo">
                    <li class="bookTitle">{{ $row['ProdName'] }}</li>
                    <li><span class="writer">{{ $row['wAuthorNames'] }} 저</span><br><span class="row-line">|</span> {{ $row['wPublDate'] }}</li>
                    <li><a href="#none" class="bookView" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ front_url('/book') }}')">교재상세정보</a></li>
                    <li>[{{ $row['wSaleCcdName'] }}] 
{{--                        <span class="tx-blue">{{ number_format($row['RealSalePrice'], 0) }}원</span> (↓{{ number_format($row['SaleRate'], 0) . $row['SaleRateUnit'] }})--}}
                        <div class="priceWrap">
                            @if($row['SalePrice'] > $row['RealSalePrice'])
                                <span class="price">{{ number_format($row['SalePrice'], 0) }}원</span>
                                <span class="discount">({{ ($row['SaleRateUnit'] == '%' ? $row['SaleRate'] : number_format($row['SaleRate'], 0)) . $row['SaleRateUnit'] }}↓)</span> ▶
                            @endif
                            <span class="dcprice">{{ number_format($row['RealSalePrice'], 0) }}원</span>
                        </div>
                    </li>
                    <li>
                        <span class="d_none">
                            <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}:book" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_books" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/>
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
    </div>

    {{-- 교재상세정보 팝업 --}}
    <div id="InfoForm" class="willbes-Layer-Black NG"></div>

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')
</div>
<!-- End Container -->

<script src="/public/js/willbes/product_util.js?ver={{time()}}"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_book_form');

    $(document).ready(function() {
        // 교재 장바구니, 바로결제 버튼 클릭
        $regi_form.on('click', 'a[name="btn_book_cart"], a[name="btn_book_direct_pay"]', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var $prod_code = $(this).data('prod-code');
            $regi_form.find('input:checkbox[name="prod_code[]"]').prop('checked', false);
            $regi_form.find('input:checkbox[name="prod_code[]"]:input[data-prod-code="'+$prod_code+'"]').prop('checked', true);
            var $is_direct_pay = $(this).data('direct-pay');
            var $is_redirect = $(this).data('is-redirect');
            cartNDirectPay($regi_form, $is_direct_pay, $is_redirect);
        });

        // 중분류 카테고리 자동 변경
        $('#cate_code').chained('#cate_code_top');

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
            goUrl('search_text', Base64.encode(document.getElementById('search_keyword').value + ':' + document.getElementById('search_value').value));
        };
    });
</script>
@stop