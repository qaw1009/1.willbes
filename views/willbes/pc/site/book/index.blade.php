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
            {{-- 카테고리 --}}
            <ul class="curriTabs c_both">
            @foreach($arr_base['category'] as $idx => $row)
                <li><a href="#none" onclick="goUrl('cate_code', '{{ $row['CateCode'] }}');" class="@if(element('cate_code', $arr_input) == $row['CateCode']) on @endif">{{ $row['CateName'] }}</a></li>
            @endforeach
            </ul>
            <div class="CurriBox">
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
                    @if(isset($arr_base['series']) === true)
                        <tr>
                            <th class="tx-gray">직렬선택</th>
                            <td colspan="9">
                                {{-- 직렬 --}}
                                <ul class="curriSelect">
                                    <li><a href="#none" onclick="goUrl('series_ccd', '');" class="@if(empty(element('series_ccd', $arr_input)) === true) on @endif">전체</a></li>
                                    @foreach($arr_base['series'] as $idx => $row)
                                        <li><a href="#none" onclick="goUrl('series_ccd', '{{ $row['ChildCcd'] }}');" class="@if(element('series_ccd', $arr_input) == $row['ChildCcd']) on @endif">{{ $row['ChildName'] }}</a></li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                    @if(isset($arr_base['subject']) === true)
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
                    @if(isset($arr_base['professor']) === true)
                        <tr>
                            <th class="tx-gray">교수선택</th>
                            @if(count($arr_base['professor']) < 1)
                                <td colspan="9" class="tx-blue tx-left">* 선택하신 과목의 교수진이 없습니다.</td>
                            @else
                                <td colspan="9">
                                    {{-- 교수 --}}
                                    <ul class="curriSelect">
                                        @foreach($arr_base['professor'] as $idx => $row)
                                            <li><a href="#none" onclick="goUrl('prof_idx', '{{ $row['ProfIdx'] }}');" class="@if(element('prof_idx', $arr_input) == $row['ProfIdx']) on @endif">{{ $row['ProfNickName'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </td>
                            @endif
                        </tr>
                    @else
                        <tr>
                            <th class="tx-gray">교수선택</th>
                            <td colspan="9" class="tx-blue tx-left">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->

        <div class="willbes-Lec-Search p_re mb25 mt25">
            <div class="inputBox p_re">
                @php $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 2) @endphp
                <div class="selectBox">
                    <select id="search_order" name="search_order" class="" onchange="goUrl('search_order', this.value);">
                        <option value="regist" @if(element('search_order', $arr_input) == 'regist') selected="selected" @endif>최근등록순</option>
                        <option value="name" @if(element('search_order', $arr_input) == 'name') selected="selected" @endif>상품명순</option>
                    </select>
                    <select id="search_keyword" name="search_keyword" title="직접입력" class="">
                        <option value="ProdName" @if($arr_search_text[0] == 'ProdName') selected="selected" @endif>교재명</option>
                        <option value="wPublName" @if($arr_search_text[0] == 'wPublName') selected="selected" @endif>출판사</option>
                        <option value="wAuthorNames" @if($arr_search_text[0] == 'wAuthorNames') selected="selected" @endif>저자</option>
                    </select>
                </div>
                <input type="text" id="search_value" name="search_value" maxlength="30" value="{{ element('1', $arr_search_text) }}">
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

            <div class="willbes-Lec NG c_both">
                <div class="mb15">총 <strong class="tx-blue">{{ count($data['list']) }}</strong>개의 상품이 있습니다. </div>
                <div class="willbes-Lec-Line">-</div>
                <!-- willbes-Lec-Line -->

                {{-- 교재 리스트 --}}
                @foreach($data['list'] as $row)
                    <div class="willbes-Lec-Table">
                        <table class="lecTable">
                            <colgroup>
                                <col style="width:200px;">
                                <col>
                                <col style="width:290px;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="w-list">
                                        <div class="bookImg">
                                            <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgOgName'] }}" width="120" height="150">
                                        </div>
                                    </td>
                                    <td class="w-data tx-left pl25">
                                        <div class="w-tit">
                                            {{ $row['ProdName'] }}
                                        </div>
                                        <div class="w-info">{{ $row['wAuthorNames'] }} 저 <span class="row-line">|</span> {{ $row['wPublDate'] }}</div>
                                        <dl class="w-info">
                                            <dt class="mr20">
                                                <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url('book') }}')">
                                                    <strong>교재상세정보</strong>
                                                </a>
                                            </dt>
                                        </dl><br>
                                        {{-- 연관된 강의정보 --}}
                                        <div class="bookLecBtn">
                                            <a href="#none" data-prod-code="{{ $row['ProdCode'] }}">
                                                교재로 진행중인 강의 ▼
                                            </a>
                                            <div id="bookLec_{{ $row['ProdCode'] }}" class="willbes-Layer-CScenterBox willbes-Layer-bookLecBox">
                                                <a class="closeBtn" href="#none" data-prod-code="{{ $row['ProdCode'] }}">
                                                    <img src="{{ img_url('prof/close.png') }}">
                                                </a>
                                                <div class="Layer-Cont">
                                                    <div class="LeclistTable">
                                                        <ul></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-notice p_re">
                                        <div class="priceWrap chk buybtn p_re">
                                            <span class="chkBox">
                                                <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}:book" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_books" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/>
                                            </span>
                                            <span class="select @if($row['wSaleCcd'] == '112002' || $row['wSaleCcd'] == '112003') tx-pink @elseif($row['wSaleCcd'] == '112004') tx-gray @endif">
                                                [{{ $row['wSaleCcdName'] }}]
                                            </span>
                                            <span class="price tx-blue">{{ number_format($row['RealSalePrice']) }}원</span>
                                            <span class="discount">(↓{{ $row['SaleRate'] . $row['SaleRateUnit'] }})</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- lecTable -->
                    </div>
                    <!-- willbes-Lec-Table -->
                @endforeach
            </div>
            <!-- willbes-Lec -->

            <div class="mb60"></div>
            <div class="willbes-Lec-buyBtn">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="submit" name="btn_cart" data-direct-pay="N" data-is-redirect="Y" class="mem-Btn bg-blue bd-dark-blue">
                            <span>장바구니</span>
                        </button>
                    </li>
                    <li class="btnAuto180 h36">
                        <button type="submit" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="mem-Btn bg-white bd-dark-blue">
                            <span class="tx-light-blue">바로결제</span>
                        </button>
                    </li>
                </ul>
            </div>
            <!-- willbes-Lec-buyBtn -->

            <div id="InfoForm" class="willbes-Layer-Box"></div>
            <!-- willbes-Layer-Box -->
        </form>

        {{-- footer script --}}
        @include('willbes.pc.site.book.only_footer_partial')
    </div>
    {!! banner('수강신청_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
</div>
<!-- End Container -->
<script type="text/javascript">
    $(document).ready(function() {
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
