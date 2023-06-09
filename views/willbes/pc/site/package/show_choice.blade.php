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
            <div class="willbes-Package-Detail NG tx-black">
                <table cellspacing="0" cellpadding="0" class="packageDetailTable">
                    <colgroup>
                        <col style="width: 135px;"/>
                        <col style="width: 1px;"/>
                        <col style="width: 804px;"/>
                    </colgroup>
                    <tbody>
                    <tr>
                        <td class="w-list tx-center">{{ $data['CourseName'] }} </td>
                        <td class="w-line"><span class="row-line">|</span></td>
                        <td class="pl30">
                            <div class="w-tit">{{$data['ProdName']}}</div>
                            <dl class="w-info">
                                <dt>개강일 : <span class="tx-blue">{{$data['StudyStartDateYM']}}</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강기간 : <span class="tx-blue">{{ $data['StudyPeriodCcd'] == '616002' ? $data['StudyEndDate'] . ' 까지' : $data['StudyPeriod'] . '일' }}</span></dt>
                                <dt class="NSK ml15">
                                    <span class="nBox n1">{{ $data['MultipleApply'] === '1' ? '무제한' : $data['MultipleApply'].'배수'}}</span>
                                </dt>
                            </dl>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- willbes-Package-Detail -->
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
                <input type="hidden" name="learn_pattern" value="adminpack_lecture"/>  {{-- 학습형태 --}}
                <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                <div class="willbes-Lec-Package-Price p_re">
                    <div class="total-PriceBox NG">
                        <span class="price-tit">총 주문금액</span>
                        <span class="row-line">|</span>
                        <span>
                            <span class="price-txt">패키지</span>
                            @if(empty($data['ProdPriceData'] ) === false)
                                @foreach($data['ProdPriceData']  as $price_row)
                                    @if($loop->index === 1)
                                        @php
                                            $sale_type_ccd = $price_row['SaleTypeCcd'];
                                        @endphp
                                        <span class="tx-dark-gray">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                        <span class="tx-pink pl10">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                        <span class="pl10"> ▶ </span>
                                        <span class="lec_price tx-light-blue pl10" data-info="{{$price_row['RealSalePrice']}}">{{ number_format($price_row['RealSalePrice'],0)}}원</span>
                                    @endif
                                @endforeach
                            @endif
                        </span>
                        <span class="price-img">
                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                        </span>
                        <span>
                            <span class="price-txt">교재</span>
                            <span class="tx-light-blue" id="bookPrice">0원</span>
                        </span>
                        <span class="price-total tx-light-blue" id="totalPrice"></span>
                    </div>
                    <input type="checkbox" name="prod_code[]" class="chk_products d_none" checked="checked" value="{{ $data['ProdCode'] . ':' . $sale_type_ccd . ':' . $data['ProdCode'] }}" data-prod-code="{{$data['ProdCode']}}" data-parent-prod-code="{{$data['ProdCode']}}" data-group-prod-code="{{$data['ProdCode']}}" data-sale-price="{{$price_row['RealSalePrice']}}"/>
                    <input type="hidden" name="sale_status_ccd" id="sale_status_ccd" value="{{$data['SaleStatusCcd']}}">
                    <div class="willbes-Lec-buyBtn">
                        <ul>
                            <li class="btnAuto130 h36">
                                <button type="submit" name="btn_cart" data-direct-pay="N" class="mem-Btn bg-heavy-gray bd-dark-gray">
                                    <span>장바구니</span>
                                </button>
                            </li>
                            <li class="btnAuto130 h36">
                                <button type="submit" name="btn_cart" data-direct-pay="Y" class="mem-Btn bg-blue bd-dark-blue">
                                    <span class="tx-white">바로결제</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- willbes-Lec-Package-Price -->

                <a name="Info"></a>
                <div class="willbes-Class c_both">
                    <div class="willbes-Lec-Tit NG tx-black">패키지정보</div>
                    <div class="classInfoTable GM">
                        <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                            <colgroup>
                                <col style="width: 140px;">
                                <col width="*">
                            </colgroup>
                            <tbody>
                            @foreach($data['contents'] as $idx => $row)
                                @if($row['ContentTypeCcd'] != '633004')
                                    <tr>
                                        <td class="w-list bg-light-white">
                                            패키지{{ $row['ContentTypeCcdName'] }}
                                            @if($row['ContentTypeCcd'] == '633001')
                                                <br/><span class="tx-red">(필독)</span>
                                            @endif
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            {!! $row['Content'] !!}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- willbes-Class -->

                <div class="willbes-Lec NG c_both mt50">
                    <div class="willbes-Lec-Subject tx-dark-black">강좌구성 및 교재선택</div>
                    <!-- willbes-Lec-Subject -->

                    <div class="willbes-Lec-Line">-</div>
                    <!-- willbes-Lec-Line -->

                    <div class="willbes-Buy-List willbes-Buy-PackageList bd-none">
                        <table cellspacing="0" cellpadding="0" class="lecTable">
                            <colgroup>
                                <col style="width: 740px;">
                                <col style="width: 200px;">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-lectit tx-left" colspan="2">
                                    <span class="w-obj NSK"><div class="pBox p2">패키지</div></span>
                                    <!--span class="MoreBtn"><a href="#Info">패키지정보 보기 ▼</a></span-->
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="w-tit">{{$data['ProdName']}}</div>
                                </td>
                                <td class="w-notice p_re">
                                    <div class="priceWrap">
                                        <div class="priceWrap priceWrap2">
                                            @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                <span class="price">{{ number_format($price_row['SalePrice'], 0) }}원</span>
                                                <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span> ▶
                                            @endif
                                            <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- lecTable -->
                    </div>
                    <!-- willbes-Buy-PackageList -->

                    <div id="Sticky" class="sticky-Wrap">
                        <div class="sticky-Grid sticky-menu select-menu NG">
                            <ul class="tabWrap">
                                <li><a href="#none" onclick="movePos('#Required');">필수과목 ▼</a></li>
                                <li><a href="#none" onclick="movePos('#Choose');">선택과목 ▼</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- sticky-menu -->

                    <!-- pos1 -->
                    <div id="pos1" class="pt35">
                        <div class="willbes-Lec-Subject willbes-Lec-Tit-select NG tx-black p_re">
                            <a id="Required" name="Required" class="sticky-top" style="top: 10px;"></a>
                            · 필수과목<span class="willbes-Lec-subTit">(과목별 1개 선택)</span><span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span>
                        </div>
                    </div>
                    <table cellspacing="0" cellpadding="0" class="lecWrapTable lec-essential">
                        <colgroup>
                            <col style="width: 75px;">
                            <col style="width: 865px;">
                        </colgroup>
                        <tbody>
                    @php
                        $subGroup_array = [];
                        $subGroup_cho_array = [];
                    @endphp

                    @if(empty($data_sublist) === false)
                        @foreach($data_sublist as $idx => $sub_row /*필수 과목*/)
                            @if($sub_row['IsEssential'] === 'Y')
                                @php
                                    //$subGroup_array[] = $sub_row['SubGroupName'];
                                    $subGroupName_Re = strlen($sub_row['SubGroupName']) == 1 ? "0".$sub_row['SubGroupName'] : $sub_row['SubGroupName'];
                                    $subGroup_array[] = $subGroupName_Re;
                                @endphp
                        <tr>
                            <td class="w-list tx-center bg-light-gray row_td" >{{$sub_row['SubjectName']}}<div class="{{$subGroupName_Re}} d_none">{{$subGroupName_Re}}</div></td>
                            <td class="bdb-dark-gray">
                                <div id="lec_table_{{ $sub_row['ProdCode'] }}" class="willbes-Lec-Table">
                                    <table cellspacing="0" cellpadding="0" class="lecTable">
                                        <colgroup>
                                            <col style="width: 50px;">
                                            <col style="width: 60px;">
                                            <col style="width: 575px;">
                                            <col style="width: 180px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="prod_code_sub_{{$sub_row['ProdCode']}}" name="prod_code_sub[]" value="{{$sub_row['ProdCode']}}" class="essSubGroup-{{$subGroupName_Re}}" onclick="checkOnly('.essSubGroup-{{$subGroupName_Re}}', this.value);" checked></td>
                                            <td class="w-img"><img src="{{$sub_row['ProfReferData']['lec_list_img'] or '' }}"></td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt class="w-tit">{{$sub_row['ProfNickName']}}<span class="row-line">|</span>{{ $sub_row['ProdName'] }}</dt>
                                                </dl>
                                                <dl class="w-info">
                                                    <dt>강의촬영(실강) : {{ empty($sub_row['StudyStartDate']) ? '' : substr($sub_row['StudyStartDate'],0,4).'년 '. substr($sub_row['StudyStartDate'],5,2).'월' }}</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>강의수 : <span class="tx-blue">{{ $sub_row['wUnitLectureCnt'] }}강@if($sub_row['wLectureProgressCcd'] != '105002' && empty($sub_row['wScheduleCount'])==false)/{{$sub_row['wScheduleCount']}}강@endif</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정상가 :
                                                        @if(empty($sub_row['ProdPriceData']) === false)
                                                            @foreach($sub_row['ProdPriceData'] as $price_row)
                                                                @if($loop -> index === 1)
                                                                    <span class="tx-blue">{{number_format($price_row['SalePrice'],0)}}원</span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n1">{{ $sub_row['MultipleApply'] === "1" ? '무제한' : $sub_row['MultipleApply'].'배수'}}</span>
                                                        <span class="nBox n{{ substr($sub_row['wLectureProgressCcd'], -1)+1 }}">{{$sub_row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                    <br>
                                                    <dt class="mr20">
                                                        <a href="#none" onclick="productInfoModal('{{ $sub_row['ProdCode'] }}', 'hover1','{{ site_url('/lecture') }}', 'opener/package/')">
                                                            <strong class="open-info-modal">강좌상세정보</strong>
                                                        </a>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                @if(empty($sub_row['LectureSampleData']) === false)
                                                    <div class="w-sp one"><a href="#none" onclick="openWin('lec_sample_{{ $sub_row['ProdCode'] }}')">맛보기</a></div>
                                                    <div id="lec_sample_{{ $sub_row['ProdCode'] }}" class="viewBox">
                                                        <a class="closeBtn" href="#none" onclick="closeWin('lec_sample_{{ $sub_row['ProdCode'] }}')"><img src="{{ img_url('cart/close.png') }}"></a>
                                                        @foreach($sub_row['LectureSampleData'] as $sample_idx => $sample_row)
                                                            <dl class="NSK">
                                                                <dt class="Tit NG">맛보기{{ $sample_idx + 1 }}</dt>
                                                                @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$sub_row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                                                @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$sub_row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                                            </dl>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->

                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                        <colgroup>
                                            <col style="width: 865px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td>
                                                @if(empty($sub_row['ProdBookData']) === false)
                                                    @foreach($sub_row['ProdBookData'] as $book_idx => $book_row)
                                                        <div class="w-sub">
                                                            <span class="w-obj tx-blue tx11">{{ $book_row['BookProvisionCcdName'] }}</span>
                                                            <span class="w-subtit">{{ $book_row['ProdBookName'] }}</span>
                                                            <span class="chk">
                                                                <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003') soldout @elseif($book_row['wSaleCcd'] == '112004') press @endif">
                                                                    [{{ $book_row['wSaleCcdName'] }}]
                                                                </label>
                                                                <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $sub_row['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" data-sale-price="{{ $book_row['RealSalePrice'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                            </span>
                                                            <span class="priceWrap">
                                                                <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                                <span class="discount">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="w-sub">
                                                        <span class="w-subtit none">
                                                            {{ empty($sub_row['ProdBookMemo']) === true ? '※ 별도 구매 가능한 교재가 없습니다.' : $sub_row['ProdBookMemo'] }}
                                                        </span>
                                                    </div>
                                                @endif
                                              </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecInfoTable -->
                                </div>
                                <!-- willbes-Lec-Table -->
                            </td>
                        </tr>
                            @endif
                        @endforeach
                    @endif
                    @php
                        if(empty($subGroup_array) === false) {
                            $subGroup_array = array_values(array_unique($subGroup_array));
                        }
                    @endphp
                        </tbody>
                    </table>
                    <!-- pos1 -->

                    <div class="TopBtn">
                        <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                    </div>

                    <!-- pos2 -->
                    <div id="pos2" class="pt35 mt10">
                        <div class="willbes-Lec-Subject willbes-Lec-Tit-select NG tx-black p_re">
                            <a id="Choose" name="Choose" class="sticky-top" style="top: 10px;"></a>
                            · 선택과목<span class="willbes-Lec-subTit">(선택과목 중 {{$data['PackSelCount']}}개 선택)</span><span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span>
                        </div>
                    </div>
                    <table cellspacing="0" cellpadding="0" class="lecWrapTable lec-choice">
                        <colgroup>
                            <col style="width: 75px;">
                            <col style="width: 865px;">
                        </colgroup>
                        <tbody>
                    @if(empty($data_sublist) === false)
                        @foreach($data_sublist as $idx => $sub_row /*선택 과목*/)
                            @if($sub_row['IsEssential'] === 'N')
                                @php
                                        $subGroupName_Re = strlen($sub_row['SubGroupName']) == 1 ? "0".$sub_row['SubGroupName'] : $sub_row['SubGroupName'];
                                        $subGroup_cho_array[] = $sub_row['SubGroupName'];
                                @endphp
                        <tr>
                            <td class="w-list tx-center bg-light-gray row_td2" >{{$sub_row['SubjectName']}}<div class="{{$subGroupName_Re}} d_none">{{$subGroupName_Re}}</div></td>
                            <td class="bdb-dark-gray">
                                <div id="lec_table_{{ $sub_row['ProdCode'] }}" class="willbes-Lec-Table">
                                    <table cellspacing="0" cellpadding="0" class="lecTable">
                                        <colgroup>
                                            <col style="width: 50px;">
                                            <col style="width: 60px;">
                                            <col style="width: 575px;">
                                            <col style="width: 180px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="prod_code_sub_{{$sub_row['ProdCode']}}" name="prod_code_sub[]" value="{{$sub_row['ProdCode']}}" class="choSubGroup choSubGroup-{{$subGroupName_Re}}" onclick="checkOnly('.choSubGroup-{{$subGroupName_Re}}', this.value);" ></td>
                                            <td class="w-img"><img src="{{$sub_row['ProfReferData']['lec_list_img'] or '' }}"></td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt class="w-tit">{{$sub_row['ProfNickName']}}<span class="row-line">|</span>{{ $sub_row['ProdName'] }}</dt>
                                                </dl>
                                                <dl class="w-info">
                                                    <dt>강의촬영(실강) : {{ empty($sub_row['StudyStartDate']) ? '' : substr($sub_row['StudyStartDate'],0,4).'년 '. substr($sub_row['StudyStartDate'],5,2).'월' }}</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>강의수 : <span class="tx-blue">{{ $sub_row['wUnitLectureCnt'] }}강@if($sub_row['wLectureProgressCcd'] != '105002' && empty($sub_row['wScheduleCount'])==false)/{{$sub_row['wScheduleCount']}}강@endif</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정상가 :
                                                        @if(empty($sub_row['ProdPriceData']) === false)
                                                            @foreach($sub_row['ProdPriceData'] as $price_row)
                                                                @if($loop -> index === 1)
                                                                    <span class="tx-blue">{{number_format($price_row['SalePrice'],0)}}원</span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n1">{{ $sub_row['MultipleApply'] === "1" ? '무제한' : $sub_row['MultipleApply'].'배수'}}</span>
                                                        <span class="nBox n{{ substr($sub_row['wLectureProgressCcd'], -1)+1 }}">{{$sub_row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                    <BR>
                                                    <dt class="mr20">
                                                        <a href="#none" onclick="productInfoModal('{{ $sub_row['ProdCode'] }}', 'hover1','{{ site_url('/lecture') }}', 'opener/package/')">
                                                            <strong class="open-info-modal">강좌상세정보</strong>
                                                        </a>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                @if(empty($sub_row['LectureSampleData']) === false)
                                                    <div class="w-sp one"><a href="#none" onclick="openWin('lec_sample_{{ $sub_row['ProdCode'] }}')">맛보기</a></div>
                                                    <div id="lec_sample_{{ $sub_row['ProdCode'] }}" class="viewBox">
                                                        <a class="closeBtn" href="#none" onclick="closeWin('lec_sample_{{ $sub_row['ProdCode'] }}')"><img src="{{ img_url('cart/close.png') }}"></a>
                                                        @foreach($sub_row['LectureSampleData'] as $sample_idx => $sample_row)
                                                            <dl class="NSK">
                                                                <dt class="Tit NG">맛보기{{ $sample_idx + 1 }}</dt>
                                                                @if(empty($sample_row['wHD']) === false) <dt class="tBox t1 black"><a href="javascript:fnPlayerSample('{{$sub_row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                                                @if(empty($sample_row['wSD']) === false) <dt class="tBox t2 gray"><a href="javascript:fnPlayerSample('{{$sub_row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                                            </dl>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->

                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                        <colgroup>
                                            <col style="width: 865px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td>
                                                @if(empty($sub_row['ProdBookData']) === false)
                                                    @foreach($sub_row['ProdBookData'] as $book_idx => $book_row)
                                                        <div class="w-sub">
                                                            <span class="w-obj tx-blue tx11">{{ $book_row['BookProvisionCcdName'] }}</span>
                                                            <span class="w-subtit">{{ $book_row['ProdBookName'] }}</span>
                                                            <span class="chk">
                                                                <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003') soldout @elseif($book_row['wSaleCcd'] == '112004') press @endif">
                                                                    [{{ $book_row['wSaleCcdName'] }}]
                                                                </label>
                                                                <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $sub_row['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" data-sale-price="{{ $book_row['RealSalePrice'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                            </span>
                                                            <span class="priceWrap">
                                                                <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                                <span class="discount">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="w-sub">
                                                        <span class="w-subtit none">
                                                            {{ empty($sub_row['ProdBookMemo']) === true ? '※ 별도 구매 가능한 교재가 없습니다.' : $sub_row['ProdBookMemo'] }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecInfoTable -->
                                </div>
                                <!-- willbes-Lec-Table -->
                            </td>
                        </tr>
                            @endif
                        @endforeach
                    @endif
                    @php
                        if(empty($subGroup_cho_array) === false) {
                            $subGroup_cho_array = array_values(array_unique($subGroup_cho_array));
                        }
                    @endphp
                        </tbody>
                    </table>
                    <!-- pos2 -->
                    <div id="InfoForm" class="willbes-Layer-Box"></div>

                    <div class="TopBtn">
                        <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                    </div>                    
                </div>
                <!-- willbes-Lec -->
            </form>
        </div>
        {!! banner('수강신청_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

    </div>
    <!-- willbes-Lec-buyBtn-sm -->
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $buy_layer = $('.willbes-Lec-buyBtn-sm');

        $(document).ready(function() {

            price_cal = function() {
                var $lecPrice_total = 0;
                var $bookPrice_total = 0;
                var $price_total = 0;

                $regi_form.find('.lec_price').each(function (){
                    $lecPrice_total += parseInt($(this).data('info'));
                });

                $regi_form.find('.chk_books').each(function (index, item){
                    if ($(this).is(':checked')) {
                        $bookPrice_total += $(this).data('sale-price');
                    }
                });

                $price_total = $lecPrice_total + $bookPrice_total;

                $("#bookPrice").text(addComma($bookPrice_total)+'원');
                $("#totalPrice").text(addComma($price_total)+'원');
            };

            // 강좌상품 선택/해제
            $regi_form.on('click', 'input[name="prod_code_sub[]"]', function() {
                if ($(this).is(':checked') === false) {
                    // 연계도서상품 체크 해제
                    $regi_form.find('input[name="prod_code[]"][data-parent-prod-code="' + $(this).val() + '"]').prop('checked', false);
                }
            });

            // 교재상품 선택/해제
            $regi_form.on('click', '.chk_books', function() {

                if ($(this).is(':checked') === true) {
                    if ($(this).hasClass('chk_books') === true) {
                        // 수강생 교재 체크
                        if (checkStudentBook($regi_form, $(this)) === false) {
                            return;
                        }
                    }
                }
                price_cal();        //가격 계산
            });

            // 장바구니, 바로결제 버튼 클릭
            $regi_form.on('click', 'button[name="btn_cart"], button[name="btn_direct_pay"]', function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                var $is_direct_pay = $(this).data('direct-pay');

                //필수강좌 체크 여부
                var groupArray = {!!json_encode($subGroup_array)!!};
                for(i=0; i<groupArray.length;i++) {
                    $checked = "";
                    $(".lec-essential").find('.essSubGroup-'+groupArray[i]).each(function (){
                        if ($(this).is(':checked')) {
                            $checked = "Y"
                        }
                    });
                    if($checked === "") {
                        alert("필수 과목은 과목별 1개씩 선택하셔야 합니다.");
                        return;
                    }
                }

                //선택강좌
                $check_cnt = 0;
                $(".lec-choice").find('.choSubGroup').each(function (){
                    if ($(this).is(':checked')) {
                        $check_cnt += 1
                    }
                });

                if($check_cnt !== parseInt({{$data['PackSelCount']}})) {
                    alert("선택과목 중 {{$data['PackSelCount']}} 개를 선택하셔야 합니다.");
                    return;
                }

                cartNDirectPay( $regi_form, $is_direct_pay, 'Y');
            });

            setRowspan('row_td');
            setRowspan('row_td2');

            {{--필수과목 같은 그룹내 2개이상의 강의 일 경우 체크박스 해제--}}
            var groupArray = {!!json_encode($subGroup_array)!!};
            for(i=0; i<groupArray.length;i++) {
                $checked_group = "";
                $ess_checked_count = 0;
                $(".lec-essential").find('.essSubGroup-'+groupArray[i]).each(function (){
                    if ($(this).is(':checked')) {
                        $ess_checked_count += 1;
                        if($ess_checked_count > 1) {
                            $(".lec-essential").find('.essSubGroup-'+groupArray[i]).prop("checked", false);
                        }
                    }
                });
            }

            price_cal();            //가격 계산

            /*
            $(".checkbox").change(function() {

                if(this.checked) {
                    //선택강좌
                    $check_cnt = 0;
                    $(".lec-choice").find('.choSubGroup').each(function (){
                        if ($(this).is(':checked')) {
                            $check_cnt += 1
                        }
                    });

                    if($check_cnt !== parseInt({{$data['PackSelCount']}})) {
                        alert("선택과목 중 {{$data['PackSelCount']}} 개를 선택하셔야 합니다.");
                        return;
                    }
                }
            });
            */
        });
    </script>

    {{-- 광고 스크립트 --}}
    @include('willbes.pc.site.product_partial.product_ad_partial')

@stop
