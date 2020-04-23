<div class="willbes-NoticeWrap p_re mb15 c_both">
    <div class="willbes-listTable widthAuto940 mt30">
        <div class="will-Tit NG">신규강좌 <img style="vertical-align: top;" src="{{ img_url('prof/icon_new.gif') }}"></div>
        <ul class="List-Table w50 tx-gray">
            @if(empty($tab_data['new_product']) === true)
                <li class="tx-center widthAutoFull">등록된 신규강좌가 없습니다.</li>
            @else
                @foreach($tab_data['new_product'] as $idx => $row)
                    <li>
                        {{-- 상품상세 링크 --}}
                        @if($__cfg['IsPassSite'] === false)
                            <a href="{{ front_url('/lecture/show/cate/' . $def_cate_code . '/pattern/only/prod-code/' . $row['ProdCode']) }}">{{ hpSubString($row['ProdName'], 0, 48, '...') }}</a>
                        @else
                            @if($row['LearnPattern'] == 'off_lecture')
                                <a href="{{ front_url('/offLecture/show/cate/'. $row['CateCode'] .'/prod-code/'. $row['ProdCode']) }}">{{ hpSubString($row['ProdName'], 0, 48, '...') }}</a>
                            @else
                                <a href="{{ front_url('/offPackage/show/prod-code/' . $row['ProdCode']) }}">{{ hpSubString($row['ProdName'], 0, 48, '...') }}</a>
                            @endif
                        @endif
                    </li>
                @endforeach
            @endif
        </ul>
    </div>

    @if($__cfg['IsPassSite'] === false)
    <div class="willbes-listTable widthAuto940 mt30">
        <div class="will-Tit NG">교재구매 <a class="f_right" href="{{site_url('/book/index/cate/'.$def_cate_code)}}"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
        <div class="willbes-Lec-Table bdb-none">
            <form id="regi_book_form" name="regi_book_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="learn_pattern" value="book"/>  {{-- 학습형태 --}}
                <input type="hidden" name="cart_type" value="book"/>   {{-- 장바구니 탭 아이디 --}}
                <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

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
                                    <img src="{{ $row['wAttachImgPath'] . $row['wAttachImgOgName'] }}" width="120" height="150">
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
                                        <strong class="detail">교재상세정보</strong>
                                    </a>
                                </div>

                                <ul class="priceWrap">
                                    <li class="mg0">
                                        <span>[{{ $row['wSaleCcdName'] }}]</span>
                                        <span class="price tx-blue">{{ number_format(array_get($row['ProdPriceData'], 'RealSalePrice')) }}원</span>
                                        <span class="discount">(↓{{ array_get($row['ProdPriceData'], 'SaleRate') . array_get($row['ProdPriceData'], 'SaleRateUnit') }})</span>
                                    </li>
                                </ul>

                                <ul class="lecBuyBtns lecBuyBtns2">
                                    @if($row['IsSalesAble'] == 'Y')
                                        <li class="btnCart"><a href="#none" name="btn_book_cart" data-direct-pay="N" data-is-redirect="N" data-prod-code="{{ $row['ProdCode'] }}" data-layer-dt-type="prof_{{ $idx % 2 == 0 ? 'left' : 'right' }}">장바구니</a></li>
                                        <li class="btnBuy"><a href="#none" name="btn_book_direct_pay" data-direct-pay="Y" data-is-redirect="Y" data-prod-code="{{ $row['ProdCode'] }}">바로결제</a></li>
                                    @endif
                                </ul>

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
                        @endforeach
                        </tr>
                    @endif
                    </tbody>
                </table>
                <!-- lecTable -->
            </form>
        </div>
        <div id="InfoForm" class="willbes-Layer-Box"></div>
        <!-- willbes-Layer-Box -->
    </div>
    @endif

    <div class="willbes-listTable widthAuto940 mt30">
        <div class="will-Tit NG">무료강좌</div>
        <ul class="List-Table w50 tx-gray">
            @if(empty($tab_data['free_lecture']) === true)
                <li class="tx-center widthAutoFull">등록된 무료특강이 없습니다.</li>
            @else
                @foreach($tab_data['free_lecture'] as $idx => $row)
                    <li><a href="{{ site_url('/lecture/show/cate/' . $row['CateCode'] . '/pattern/free/prod-code/' . $row['ProdCode']) }}">{{ hpSubString($row['ProdName'], 0, 48, '...') }}</a></li>
                @endforeach
            @endif
        </ul>
    </div>

    @if($data['IsOpenStudyComment'] === 'Y')
    <div class="willbes-listTable willbes-reply2 widthAuto940 mt30">
        <div class="will-Tit NG">수강후기 <a href="#none" class="f_right btn-study" data-board-idx=""><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
        <ul class="List-Table w50 tx-gray">
            @if(empty($tab_data['study_comment']) === true)
                <li class="tx-center widthAutoFull">등록된 수강후기가 없습니다.</li>
            @else
                @foreach($tab_data['study_comment'] as $idx => $row)
                    <li><a href="#none" class="btn-study" data-board-idx="{{$row['BoardIdx']}}"><img src="{{ img_url('sub/star' . $row['LecScore']. '.gif') }}">{{ hpSubString($row['Title'], 0, 48, '...') }}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
    <div id="WrapReply"></div>
    <!-- willbes-Layer-ReplyBox -->
    @endif

    <div class="willbes-listTable widthAuto460 mr20 mt30">
        <div class="will-Tit NG">공지사항 <a class="f_right" href="{{front_url('/professor/show/cate/'.$def_cate_code.'/prof-idx/'.$prof_idx.'/?subject_idx='.element('subject_idx', $arr_input).'&subject_name='.element('subject_name', $arr_input).'&tab=notice')}}"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
        <ul class="List-Table GM tx-gray">
            @if(empty($tab_data['notice']) === true)
                <li>등록된 공지사항이 없습니다.</li>
            @else
                @foreach($tab_data['notice'] as $idx => $row)
                    <li><a href="{{front_url('/professor/show/cate/'.$def_cate_code.'/prof-idx/'.$prof_idx.'/?subject_idx='.element('subject_idx', $arr_input).'&subject_name='.element('subject_name', $arr_input).'&board_idx='.$row['BoardIdx'].'&tab=notice')}}">{{ hpSubString($row['Title'], 0, 48, '...') }}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="willbes-listTable widthAuto460 mt30">
        <div class="will-Tit NG">학습자료실 <a class="f_right" href="{{front_url('/professor/show/cate/'.$def_cate_code.'/prof-idx/'.$prof_idx.'/?subject_idx='.element('subject_idx', $arr_input).'&subject_name='.element('subject_name', $arr_input).'&tab=material')}}"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
        <ul class="List-Table GM tx-gray">
            @if(empty($tab_data['material']) === true)
                <li>등록된 학습자료가 없습니다.</li>
            @else
                @foreach($tab_data['material'] as $idx => $row)
                    <li><a href="{{front_url('/professor/show/cate/'.$def_cate_code.'/prof-idx/'.$prof_idx.'/?subject_idx='.element('subject_idx', $arr_input).'&subject_name='.element('subject_name', $arr_input).'&board_idx='.$row['BoardIdx'].'&tab=material')}}">{{ hpSubString($row['Title'], 0, 48, '...') }}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
<!-- willbes-NoticeWrap -->

@if(empty($data['ProfContent']) === false)
    <div class="profEditer mt30 c_both">
        <div class="profEd-Tit NG"><a href="#none">닫기 ▼</a></div>
        <div class="profEd-cts">
            {!! $data['ProfContent'] !!}
        </div>
    </div>
@endif

@if(isset($data['ProfBnrData']['02']) === true && empty($data['ProfBnrData']['02']) === false)
    <!-- willbes-Bnr -->
    <div class="prof-banner02 bSlider c_both">
        <div class="slider">
            @foreach($data['ProfBnrData']['02'] as $bnr_num => $bnr_row)
                <div><a href="{{ empty($bnr_row['LinkUrl']) === false ? $bnr_row['LinkUrl'] : '#none' }}" target="_{{ $bnr_row['LinkType'] }}"><img src="{{ $bnr_row['BnrImgPath'] . $bnr_row['BnrImgName'] }}" alt=""></a></div>
            @endforeach
        </div>
    </div>
    <!-- // willbes-Bnr -->
@endif

@if(isset($data['ProfBnrData']['03']) === true && empty($data['ProfBnrData']['03']) === false)
    <!-- willbes-Bnr2 -->
    <div class="sliderWillbesBnr cSliderTM mt40">
        <div class="sliderControlsTM">
            @foreach($data['ProfBnrData']['03'] as $bnr_num => $bnr_row)
                <div><a href="{{ empty($bnr_row['LinkUrl']) === false ? $bnr_row['LinkUrl'] : '#none' }}" target="_{{ $bnr_row['LinkType'] }}"><img src="{{ $bnr_row['BnrImgPath'] . $bnr_row['BnrImgName'] }}" alt=""></a></div>
            @endforeach
        </div>
    </div>
    <!-- // willbes-Bnr2 -->
@endif

@if($__cfg['IsPassSite'] === false && empty($tab_data['book']) === false)
    {{-- 온라인사이트일 경우만 교재구매 스크립트 추가 --}}
    @include('willbes.pc.site.book.only_footer_partial')
@endif