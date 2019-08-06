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
                    <strong>{{ $data['ProfNickName'] }}</strong><br/>교수님
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
                    <dt>강의수 : <span class="tx-black">{{ $data['wUnitLectureCnt'] }}강@if($data['wLectureProgressCcd'] != '105002' && empty($data['wScheduleCount'])==false)/{{$data['wScheduleCount']}}강@endif</span></dt>
                    <dt><span class="row-line">|</span></dt>
                    <dt>수강기간 : <span class="tx-black">{{ $data['StudyPeriod'] }}일</span></dt>
                    <dt class="NSK ml15">
                        <span class="nBox n1">{{ $data['MultipleApply'] === "1" ? '무제한' : $data['MultipleApply'].'배수'}}</span>
                        <span class="nBox n{{ substr($data['wLectureProgressCcd'], -1)+1 }}">{{ $data['wLectureProgressCcdName'] }}</span>
                    </dt>
                </dl>
                <div class="view-wrap">
                    <div class="w-notice p_re">
                        @if( empty($data['LectureSampleData']) === false)
                        <div class="w-sp one">
                            <a href="#none" onclick="openWin('viewBox')">맛보기</a>
                        </div>
                        <div id="viewBox" class="viewBox">
                            <a class="closeBtn" href="#none" onclick="closeWin('viewBox')"><img src="{{ img_url('cart/close.png') }}"></a>
                            @foreach($data['LectureSampleData'] as $sample_idx => $sample_row)
                                <dl class="NSK">
                                    <dt class="Tit NG">맛보기{{ $sample_idx + 1 }}</dt>
                                    @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                    @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                </dl>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="all-view subBtn NSK">
                        <a href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only/?prof_idx=' . $data['ProfIdx']) }}">
                            개설강좌 전체보기 >
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Prof-Detail -->

    @if($pattern == 'only' || ($pattern == 'free' && $data['FreeLecTypeCcd'] == '652001'))
        {{-- 단강좌, 일반 무료강좌일 경우만 노출 --}}
        <div class="willbes-Lec mb170 NG c_both">
            <div class="willbes-Buy-Table p_re mt20">
                <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
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
                            <td class="w-lectit tx-left" colspan="2">
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
                                    @foreach($data['ProdPriceData'] as $price_idx => $price_row)
                                        <div class="pl10">
                                            <input type="checkbox" name="prod_code[]" value="{{ $data['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $data['ProdCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-sale-price="{{ $price_row['RealSalePrice'] }}" class="chk_products chk_only_{{ $data['ProdCode'] }}" onchange="checkOnly('.chk_only_{{ $data['ProdCode'] }}', this.value);" @if($data['IsSalesAble'] == 'N') disabled="disabled" @endif>
                                            <label for="goods_chk" class="pl10 d_inblock">
                                                [{{ $price_row['SaleTypeCcdName'] }}]
                                                @if($pattern == 'only')
                                                    <br><span>{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                    <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }}) ▶ </span>
                                                @endif
                                                <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </td>
                            {{-- 상품가격 노출 수정 (2019.04.17)
                            <td class="w-notice p_re tx-right">
                                @if(empty($data['ProdPriceData']) === false)
                                    @foreach($data['ProdPriceData'] as $price_idx => $price_row)
                                        <div class="priceWrap p_re">
                                            <span class="chkBox"><input type="checkbox" name="prod_code[]" value="{{ $data['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $data['ProdCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-sale-price="{{ $price_row['RealSalePrice'] }}" class="chk_products chk_only_{{ $data['ProdCode'] }}" onchange="checkOnly('.chk_only_{{ $data['ProdCode'] }}', this.value);" @if($data['IsSalesAble'] == 'N') disabled="disabled" @endif></span>
                                            <span class="select">[{{ $price_row['SaleTypeCcdName'] }}]</span>
                                            <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                            <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                        </div>
                                    @endforeach
                                @endif
                            </td>--}}
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
                                            <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" data-sale-price="{{ $book_row['RealSalePrice'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
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
                    @if($data['IsSalesAble'] == 'Y')
                        <ul>
                            <li class="btnAuto180 h36">
                                @if($data['IsCart'] == 'Y' && $pattern != 'free')
                                <button type="submit" name="btn_cart" data-direct-pay="N" class="mem-Btn bg-blue bd-dark-blue">
                                    <span>장바구니</span>
                                </button>
                                @endif
                            </li>
                            <li class="btnAuto180 h36">
                                <button type="submit" name="btn_direct_pay" data-direct-pay="Y" class="mem-Btn bg-white bd-dark-blue">
                                    <span class="tx-light-blue">바로결제</span>
                                </button>
                            </li>
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
    @endif

        <div id="Sticky" class="sticky-Wrap mt20">
            <div class="sticky-Grid sticky-menu NG">
                <ul>
                    <li><a href="#none" onclick="movePos('#Class');">강좌정보 ▼</a></li>
                    <li class="row-line">|</li>
                    <li><a href="#none" onclick="movePos('#BookInfo');">교재정보 ▼</a></li>
                    <li class="row-line">|</li>
                    <li><a href="#none" onclick="movePos('#Leclist');">강의목차 ▼</a></li>
                    <li class="row-line">|</li>
                    <li><a href="#none" onclick="movePos('#Reply');">수강후기 ▼</a></li>
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
                                <li>출판일 : {{ $row['wPublDate'] }} <span class="row-line">|</span></li>
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

        <div class="willbes-Leclist p_re c_both">
            <a id="Leclist" name="Leclist" class="sticky-top"></a>
            <div class="willbes-Lec-Tit NG tx-black">강의목차</div>
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable under-gray tx-gray">
                    <colgroup>
                        <col style="width: 100px;">
                        <col>
                        <col style="width: 200px;">
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
                        <td class="w-no"><!--{{ $row['wUnitNum'] }}회차 //-->{{ $row['wUnitLectureNum'] }}강</td>
                        <td class="w-list tx-left pl20">{{ $row['wUnitName'] }}</td>
                        <td class="w-free">
                            @if($pattern == 'free' && $data['FreeLecTypeCcd'] == '652002')
                                @if(empty($row['wWD']) === false) <span class="tBox NSK t3 white"><a href="javascript:fnPlayerFree('{{$data['ProdCode']}}','{{$row['wUnitIdx']}}','WD');">WIDE</a></span> @endif
                                @if(empty($row['wHD']) === false) <span class="tBox NSK t1 black"><a href="javascript:fnPlayerFree('{{$data['ProdCode']}}','{{$row['wUnitIdx']}}','HD');">HIGH</a></span> @endif
                                @if(empty($row['wSD']) === false) <span class="tBox NSK t2 gray"><a href="javascript:fnPlayerFree('{{$data['ProdCode']}}','{{$row['wUnitIdx']}}','SD');">LOW</a></span> @endif
                            @elseif (in_array($row['wUnitIdx'], $data['LectureSampleUnitIdxs']) === true)
                                @if(empty($row['wWD']) === false) <span class="tBox NSK t3 white"><a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$row['wUnitIdx']}}','WD');">WIDE</a></span> @endif
                                @if(empty($row['wHD']) === false) <span class="tBox NSK t1 black"><a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$row['wUnitIdx']}}','HD');">HIGH</a></span> @endif
                                @if(empty($row['wSD']) === false) <span class="tBox NSK t2 gray"><a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$row['wUnitIdx']}}','SD');">LOW</a></span> @endif
                            @endif
                        </td>
                        <td class="w-file">
                            @if(empty($row['wUnitAttachFile']) === false)
                                @if($pattern == 'free' && $data['FreeLecTypeCcd'] == '652002')
                                    <a href="{{site_url('/lecture/download/').'?filename='.urlencode(str_replace( '//', '/', $row['wAttachPath'].'/'.$row['wUnitAttachFile'])).'&filename_ori='.urlencode($row['wUnitAttachFileReal'])}}" >
                                        <img src="{{ img_url('sub/icon_file.gif') }}"></a>
                                @else
                                <img src="{{ img_url('sub/icon_file.gif') }}">
                                @endif
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

        <div class="willbes-Reply p_re c_both"><a id="Reply" name="Reply" class="sticky-top"></a></div>
        @include('willbes.pc.site.lecture.iframe_reply_partial')
        <!-- willbes-Leclist -->

        <div class="TopBtn">
            <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
        </div>
        <!-- TopBtn-->
    </div>
    {!! banner('수강신청_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

</div>
<!-- End Container -->
{{-- footer script --}}
@include('willbes.pc.site.lecture.' . $pattern . '_footer_partial')

@stop
