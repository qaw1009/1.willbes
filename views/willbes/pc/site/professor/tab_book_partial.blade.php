<form id="regi_book_form" name="regi_book_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="learn_pattern" value="book"/>  {{-- 학습형태 --}}
    <input type="hidden" name="cart_type" value="book"/>   {{-- 장바구니 탭 아이디 --}}
    <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

    <div class="willbes-Lec NG c_both p_re">
        <div class="willbes-Lec-Subject tx-dark-black bdb-dark-gray">
            · 교재
            <a class="f_right" href="{{ site_url('/book/index/cate/'.$def_cate_code.'?cate_code='.$def_cate_code.'&subject_idx='.element('subject_idx', $arr_input).'&prof_idx='.$prof_idx) }}">
                <img src="{{ img_url('prof/icon_add.png') }}" alt="더보기">
            </a>
        </div>
        <!-- willbes-Lec-Subject -->

        <div class="willbes-listTable">
            <div class="willbes-Lec-Table bdb-none d_block">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width:150px;">
                        <col style="width:320px;">
                        <col style="width:150px;">
                        <col style="width:320px;">
                    </colgroup>
                    <tbody>
                    @if(empty($tab_data['book']) === true)
                        <tr>
                            <td colspan="4" class="w-list">등록된 교재정보가 없습니다.</td>
                        </tr>
                    @else
                        <tr>
                            @foreach($tab_data['book'] as $idx => $row)
                                @if($idx != 0 && $idx % 2 == 0)
                                    </tr><tr>
                                @endif
                                <td class="w-list">
                                    <div class="bookImg">
                                        <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgOgName'] }}" alt=""/>
                                    </div>
                                </td>
                                <td class="w-data tx-left pr10">
                                    <div class="w-tit">
                                        {{ $row['ProdName'] }}
                                        <span class="d_none">
                                            <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . array_get($row['ProdPriceData'], 'SaleTypeCcd') . ':' . $row['ProdCode'] }}:book" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="chk_books" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/>
                                        </span>
                                    </div>

                                    <div class="w-info">
                                        {{ $row['wAuthorNames'] }} 저 <span class="row-line">|</span> {{ $row['wPublDate'] }}<span class="row-line">|</span>
                                        <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url('book') }}')">
                                            <strong class="detail open-info-modal curr-pos">교재상세정보</strong>
                                        </a>
                                    </div>

                                    <ul class="priceWrap">
                                        <li class="mg0 ">
                                            <span>[{{ $row['wSaleCcdName'] }}]</span>
                                            <span class="tx-blue">{{ number_format(array_get($row['ProdPriceData'], 'RealSalePrice')) }}원</span>
                                            <span class="discount">(↓{{ array_get($row['ProdPriceData'], 'SaleRate') . array_get($row['ProdPriceData'], 'SaleRateUnit') }})</span>
                                        </li>
                                    </ul>

                                    <ul class="lecBuyBtns lecBuyBtns2">
                                        @if($row['IsSalesAble'] == 'Y')
                                            <li class="btnCart"><a href="#none" name="btn_book_cart" data-direct-pay="N" data-is-redirect="N" data-prod-code="{{ $row['ProdCode'] }}" data-layer-dt-type="prof_{{ $idx % 2 == 0 ? 'left' : 'right' }}">장바구니</a>
                                            <li class="btnBuy"><a href="#none" name="btn_book_direct_pay" data-direct-pay="Y" data-is-redirect="Y" data-prod-code="{{ $row['ProdCode'] }}">바로결제</a></li>
                                        @endif
                                    </ul>

                                    <div class="bookLecBtn">
                                        <a href="#none" data-prod-code="{{ $row['ProdCode'] }}">
                                            <strong>교재로 진행중인 강의 ▼</strong>
                                        </a>
                                        {{-- 강의정보 --}}
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
                            @endforeach
                        </tr>
                    @endif
                    </tbody>
                </table>
                <!-- lecTable -->
            </div>
        </div>
        <!-- willbes-listTable -->
        <div id="InfoForm" class="willbes-Layer-Box"></div>
    </div>
    <!-- willbes-Lec -->
</form>
{{-- 교재 footer script --}}
@include('willbes.pc.site.book.only_footer_partial')
