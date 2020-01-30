@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Prof-Detail NG tx-black">
                <div class="prof-profile p_re">
                    <div class="Name">
                        <strong>{{ $data['ProfNickName'] }}</strong><br/>{{$data['AppellationCcdName']}}님
                    </div>
                    <div class="ProfImg">
                        <img src="{{ $data['ProfReferData']['lec_detail_img'] or '' }}">
                    </div>
                    <div class="prof-home subBtn NSK">
                        <a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/' . $data['ProfIdx']) . '/?subject_idx=' . $data['SubjectIdx'] . '&subject_name=' . rawurlencode($data['SubjectName']) }}">
                            <img src="{{ img_url('sub/icon_profhome.gif') }}" style="margin-top: -4px; margin-right: 4px">{{$data['AppellationCcdName']}}홈
                        </a>
                    </div>
                </div>
                <div class="lec-profile p_re">
                    <div class="w-list">{{ $data['CourseName'] }} / {{ $data['SubjectName'] }}</div>
                    <div class="w-tit tx-blue">{{ $data['ProdName'] }}</div>
                    <div class="mt20">
                        개강일~종강일 : <span class="tx-blue">{{ date('m/d', strtotime($data['StudyStartDate'])) }} ~ {{ date('m/d', strtotime($data['StudyEndDate'])) }}</span>
                        {{ $data['WeekArrayName'] }} ({{ $data['Amount'] }}회차)
                    </div>
                    <div class="mt10 w-info">
                        수강형태 :
                        <span class="tx-blue mr10">{{ $data['StudyPatternCcdName'] }}</span>
                        <span class="acadBox n{{ substr($data['StudyApplyCcd'], -1) }}">{{ $data['StudyApplyCcdName'] }}</span>
                        <span class="acadBox n{{ substr($data['AcceptStatusCcd'], -1) }}">{{ $data['AcceptStatusCcdName'] }}</span>
                    </div>
                    <div class="view-wrap">
                        <div class="all-view subBtn NSK"><a href="{{ front_url('/offLecture/index/cate/' . $__cfg['CateCode'] . '/?prof_idx=' . $data['ProfIdx']) }}">개설강좌 전체보기 ></a></div>
                    </div>
                </div>
            </div>
            <!-- willbes-Prof-Detail -->

            <div class="willbes-Lec mb100 NG c_both">
                <div class="willbes-Buy-Table p_re mt20">

                    <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
                        <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                        <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                    <div class="willbes-Buy-List">
                        <table cellspacing="0" cellpadding="0" class="lecTable profTable">
                            <colgroup>
                                <col style="width: 445px;">
                                <col style="width: 265px;">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-lectit tx-left" colspan="3">
                                    <span class="w-obj NSK"><div class="pBox p1">강좌</div></span>
                                    <span class="MoreBtn"><a href="#Class">강좌정보 보기 ▼</a></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="w-tit">{{ $data['ProdName'] }}</div>
                                </td>
                                <td class="tx-left">
                                    @if(empty($data['ProdPriceData']) === false)
                                        <div class="pl10">
                                            <input type="checkbox" name="prod_code[]" value="{{ $data['ProdCode'] . ':' . $data['ProdPriceData'][0]['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $data['ProdCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-sale-price="{{ $data['ProdPriceData'][0]['RealSalePrice'] }}" class="chk_products" @if($data['IsSalesAble'] == 'N') disabled="disabled" @endif>
                                            <label for="goods_chk" class="pl5 d_inblock tx-spacing">
                                                <span>{{ number_format($data['ProdPriceData'][0]['SalePrice'], 0) }}원</span>
                                                <span class="discount">(↓{{ $data['ProdPriceData'][0]['SaleRate'] . $data['ProdPriceData'][0]['SaleRateUnit'] }}) ▶ </span>
                                                <span class="tx-blue">{{ number_format($data['ProdPriceData'][0]['RealSalePrice'], 0) }}원</span>
                                            </label>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- lecTable -->

                        <div class="lecInfoTable" style="display: block">
                            <div class="w-lectit tx-left" colspan="3">
                                <span class="w-obj NSK"><div class="pBox p3">교재</div></span>
                                <span class="MoreBtn"><a href="#BookInfo">교재정보 보기 ▼</a></span>
                            </div>
                            <div class="w-grid">
                                @if(empty($data['ProdBookData']) === false)
                                    @foreach($data['ProdBookData'] as $book_idx => $book_row)
                                        <div class="w-sub overflow">
                                            <span class="w-obj tx-blue tx11">{{ $book_row['BookProvisionCcdName'] }}</span>
                                            <span class="w-subtit">{{ $book_row['ProdBookName'] }}</span>
                                            <span class="chk">
                                                <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" data-sale-price="{{ $book_row['RealSalePrice'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                <label>[{{ $book_row['wSaleCcdName'] }}]</label>
                                            </span>
                                            <span class="priceWrap">
                                            <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                            <span class="discount">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                        </span>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="w-sub overflow">※ 별도 구매 가능한 교재가 없습니다.</div>
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
                        @if($data['IsSalesAble'] == 'Y')
                        <ul>
                            @if($data['StudyApplyCcd'] != '654002')
                                <li class="btnAuto130 h36">
                                    <button type="submit" name="btn_off_visit_pay" data-direct-pay="N" class="mem-Btn bg-white bd-dark-blue">
                                        <span class="tx-light-blue">방문결제</span>
                                    </button>
                                </li>
                            @endif
                            @if($data['StudyApplyCcd'] != '654001')
                                <li class="btnAuto130 h36">
                                    <button type="submit" name="btn_cart" data-direct-pay="N" class="mem-Btn bg-heavy-gray bd-dark-gray">
                                        <span>장바구니</span>
                                    </button>
                                </li>
                                <li class="btnAuto130 h36">
                                    <button type="submit" name="btn_direct_pay" data-direct-pay="Y" class="mem-Btn bg-blue bd-dark-blue">
                                        <span class="tx-white">바로결제</span>
                                    </button>
                                </li>
                            @endif
                        </ul>
                        @else
                            <span class="tx-red f_right">판매 중인 상품만 주문 가능합니다.</span>
                        @endif
                    </div>

                    </form>
                    <!-- willbes-Lec-buyBtn -->
                </div>
                <!-- willbes-Buy-Table -->

            </div>
            <!-- willbes-Lec -->

            <div id="Sticky" class="sticky-Wrap">
                <div class="sticky-Grid sticky-menu NG">
                    <ul>
                        <li><a href="#none" onclick="movePos('#Class');">강좌정보 ▼</a></li>
                        <li class="row-line">|</li>
                        <li><a href="#none" onclick="movePos('#BookInfo');">교재정보 ▼</a></li>
                    </ul>
                </div>
            </div>
            <!-- sticky-menu -->

            <div class="willbes-Class p_re c_both">
                <a id="Class" name="Class" class="sticky-top"></a>
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

            <div class="willbes-BookInfo p_re c_both">
                <a id="BookInfo" name="BookInfo" class="sticky-top"></a>
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
                                    <li>출판일 :  {{ $row['wPublDate'] }} <span class="row-line">|</span></li>
                                    <li>교재비 : <strong class="tx-light-blue">{{ number_format($row['RealSalePrice']) }}원</strong>
                                        (↓{{ $row['SaleRate'] . $row['SaleRateUnit'] }})
                                        <strong class="tx-{{ $row['wSaleCcd'] == '112001' ? 'light-blue' : 'red' }}">[{{ $row['wSaleCcdName'] }}]</strong>
                                    </li>
                                </ul>
                            </div>
                            <div class="bookBoxWrap">
                                <ul class="tabWrap tabDepth2">
                                    <li><a href="#info1{{ $idx }}" class="on">교재소개</a></li>
                                    <li><a href="#info2{{ $idx }}">교재목차</a></li>
                                </ul>
                                <div class="tabBox">
                                    <div id="info1{{ $idx }}" class="tabContent">
                                        <div class="book-TxtBox tx-gray">
                                            {!! $row['wBookDesc'] !!}
                                        </div>
                                        @if(empty($data['ProdBookMemo']) === false)<div class="caution-txt tx-red">{{ $data['ProdBookMemo'] }}</div>@endif
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
        </div>
        {!! banner('수강신청_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

    </div>
    <!-- End Container -->
    {{-- footer script --}}
    @include('willbes.pc.site.off_lecture.only_footer_partial')
@stop