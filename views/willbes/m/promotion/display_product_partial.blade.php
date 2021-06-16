@if(empty($group_num))
    @php $group_num = 1; @endphp
@endif

@if(empty($arr_base['display_product_data'][$group_num]) === false)
<form id="dp_prod_form{{$group_num}}" method="POST" onsubmit="return false;" novalidate="">
    {!! csrf_field() !!}
    {!! method_field('POST' ) !!}
    <input type="hidden" name="learn_pattern" value="on_lecture"/>  {{-- 학습형태 --}}
    <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
    <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

    @foreach($arr_base['display_product_data'][$group_num] as $ccd => $val)
        @if($pattern_ccd[$ccd] == 'only') {{-- 단과강좌 --}}
            <div class="mb100">
                <div class="pd20">
                    <div class="tx-red tx14 pb10 bdb-light-gray">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.</div>
                </div>
                @if(empty($val) === false)
                    @foreach($val as $key => $row)
                        <div class="passProfTabs c_both">
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdb-light-gray">
                                <tbody>
                                <tr>
                                    <td class="pb0">
                                        <div class="w-prof p_re">
                                            <img src="{{ $row['ProfReferData']['lec_detail_img'] }}">
                                            <div class="cover"><img src="{{ img_url('m/mypage/profImg-cover.png') }}"></div>
                                        </div>
                                        <div class="w-data tx-left pt0 pb0 pl15">
                                            <div class="OTclass mr10"><span>{{ element($row['LecTypeCcd'],$lec_type) }}</span></div>
                                            <dl class="w-info pt-zero">
                                                <dt>{{ $row['CourseName'] }}<span class="row-line">|</span>{{ $row['SubjectName'] }}<span class="row-line">|</span>{{ $row['ProfNickName'] }}</dt>
                                            </dl>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/m/lecture/show/cate/').$row['CateCode'].'/pattern/only/prod-code/'.$row['ProdCode'] }}">{{ $row['ProdName'] }}</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pt0 pb0">
                                            <div class="w-info tx-gray pd0">
                                                <dl>
                                                    <dt class="h27"><strong>강의촬영(실강)</strong>{{ empty($row['StudyStartDate']) ? '' : substr($row['StudyStartDate'],0,4).'년 '. substr($row['StudyStartDate'],5,2).'월' }}</dt><br/>
                                                    <dt class="h27"><strong>강의수</strong>{{ $row['wUnitLectureCnt'] }}강 @if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false) / {{$row['wScheduleCount']}}강 @endif</dt><br/>
                                                    <dt class="h27">
                                                        <strong>수강기간</strong>
                                                        <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span>
                                                        <span class="NSK ml10 nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                        <span class="NSK nBox n2">{{ $row['wLectureProgressCcdName'] }}</span>
                                                    </dt><br>
                                                    @if(empty($row['LectureSampleData']) === false)
                                                        @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                            <dt class="h27">맛보기{{ $sample_idx + 1 }}</dt>
                                                            @if(empty($sample_row['wHD']) === false) <dt class="tBox NSK black"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                                            @if(empty($sample_row['wSD']) === false) <dt class="tBox NSK gray"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                                            <br/>
                                                        @endforeach
                                                    @endif
                                                    @if($row['IsCart'] == 'N')
                                                        <dt class="h27 tx-red">※ 바로결제만 가능한 상품입니다. 상세 페이지에서 결제해주세요.</dt><br/>
                                                    @endif
                                                    @if(empty($row['ProdPriceData']) === false)
                                                        @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                            <dt class="h27">
                                                                <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="goods_chk chk_products" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/>
                                                                <label for="prod_code" class="pl10">
                                                                    [{{ $price_row['SaleTypeCcdName'] }}] :
{{--                                                                    <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})--}}

                                                                        @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                                            <span class="price"><del>{{ number_format($price_row['SalePrice'], 0) }}</del>원</span>
                                                                            <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span> ▶
                                                                        @endif
                                                                        <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                                </label>
                                                            </dt>
                                                        @endforeach
                                                    @endif
                                                </dl>
                                            </div>
                                            <div class="w-buy">
                                                <ul class="two">
                                                    <li><a href="#none" class="btn_gray" name="btn_cart" data-direct-pay="N" data-is-redirect="Y">장바구니</a></li>
                                                    <li><a href="#none" class="btn_blue" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y">바로결제</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if(empty($row['ProdBookData']) === false)
                            <div class="lec-info bg-light-gray">
                                <ul>
                                    @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                        <li>
                                            <span class="chk">
                                                <label>[판매]</label>
                                                <input type="checkbox" name="prod_code[]" class="goods_chk chk_books" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                            </span>
                                            <div class="priceWrap NG">
                                                {{ $book_row['BookProvisionCcdName'] }}  <span class="NGR">{{ $book_row['ProdBookName'] }}</span><br>
                                                <p class="NGR">
                                                    [{{ $book_row['wSaleCcdName'] }}]
                                                    <span class="tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        @elseif($pattern_ccd[$ccd] == 'package') {{-- 운영자 패키지 --}}
            <div class="mb100">
                <div class="pd20">
                    <div class="tx-red tx14 pb10 bdb-light-gray">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.</div>
                </div>

                <div class="lineTabs lecListTabs c_both">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                        <colgroup>
                            <col style="width: 87%;">
                            <col style="width: 13%;">
                        </colgroup>
                        <tbody>
                        @if(empty($val) === false)
                            @foreach($val as $key => $row)
                                <tr>
                                    <td class="w-data tx-left" colspan="2">
                                        <dl class="w-info">
                                            <dt>{{ $row['CourseName'] }}</dt>
                                        </dl>
                                        <div class="w-tit">
                                            <a href="{{ site_url('/m/package/show/cate/').$__cfg['CateCode'].'/pack/'.$row['PackTypeCcd'].'/prod-code/'.$row['ProdCode'] }}">{{ $row['ProdName'] }}</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>개강일 <span class="tx-blue">{{ $row['StudyStartDateYM'] }}</span> <span class="row-line">|</span></dt>
                                            <dt>수강기간 <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span> <span class="NSK ml10 nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span></dt><br>
                                            @if(empty($row['ProdPriceData'] ) === false)
                                                @foreach($row['ProdPriceData'] as $price_row)
                                                    @if($loop -> index === 1)
                                                        <dt><span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</dt>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </dl>
                                        <div class="w-buy">
                                            <ul class="two">
                                                <li><a href="{{ site_url('/m/package/show/cate/').$__cfg['CateCode'].'/pack/'.$row['PackTypeCcd'].'/prod-code/'.$row['ProdCode'] }}" class="btn_gray">수강신청</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @elseif($pattern_ccd[$ccd] == 'period') {{-- 기간제 패키지 --}}
            <div class="mb100">
                <div class="pd20">
                    {{--<div class="NSK-Black tx22 mb10">기간제 패키지 강좌</div>--}}
                    <div class="tx-red tx14 mb10">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.</div>
                </div>
                <div class="lineTabs lecListTabs c_both">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                        <colgroup>
                            <col style="width: 87%;">
                            <col style="width: 13%;">
                        </colgroup>
                        <tbody>
                        @if(empty($val) === false)
                            @foreach($val as $key => $row)
                                <tr>
                                    <td class="w-data tx-left" colspan="2">
                                        <div class="w-tit">
                                            <a href="{{ site_url('/m/periodPackage/show/cate/').$__cfg['CateCode'].'/pack/'.$row['PackTypeCcd'].'/prod-code/'.$row['ProdCode'] }}">{{ $row['ProdName'] }}</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>개강일 <span class="tx-blue">{{ $row['StudyStartDateYM'] }}</span> <span class="row-line">|</span></dt>
                                            <dt>수강기간 <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span> <span class="NSK ml10 nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span></dt><br>
                                            @if(empty($row['ProdPriceData'] ) === false)
                                                @foreach($row['ProdPriceData'] as $price_row)
                                                    @if($loop -> index === 1)
                                                        <dt><span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</dt>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </dl>
                                        <div class="w-buy">
                                            <ul class="two">
                                                <li><a href="{{ site_url('/m/periodPackage/show/cate/').$__cfg['CateCode'].'/pack/'.$row['PackTypeCcd'].'/prod-code/'.$row['ProdCode'] }}" class="btn_gray">수강신청</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @elseif($pattern_ccd[$ccd] == 'free') {{-- 무료강좌 --}}
            <div class="mb100">
                <div class="pd20">
                    <div class="tx-red tx14 pb10 bdb-light-gray">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.</div>
                </div>
                @if(empty($val) === false)
                    @foreach($val as $key => $row)
                        <div class="passProfTabs c_both">
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdb-light-gray">
                                <tbody>
                                <tr>
                                    <td class="pb0">
                                        <div class="w-prof p_re">
                                            <img src="{{ $row['ProfReferData']['lec_detail_img'] }}">
                                            <div class="cover"><img src="{{ img_url('m/mypage/profImg-cover.png') }}"></div>
                                        </div>
                                        <div class="w-data tx-left pt0 pb0 pl15">
                                            <div class="OTclass mr10"><span>{{ element($row['LecTypeCcd'],$lec_type) }}</span></div>
                                            <dl class="w-info pt-zero">
                                                <dt>{{ $row['CourseName'] }}<span class="row-line">|</span>{{ $row['SubjectName'] }}<span class="row-line">|</span>{{ $row['ProfNickName'] }}</dt>
                                            </dl>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/m/lecture/show/cate/').$row['CateCode'].'/pattern/free/prod-code/'.$row['ProdCode'] }}">{{ $row['ProdName'] }}</a>
                                            </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt0 pb0">
                                        <div class="w-info tx-gray pd0">
                                            <dl>
                                                <dt class="h27"><strong>강의촬영(실강)</strong>{{ empty($row['StudyStartDate']) ? '' : substr($row['StudyStartDate'],0,4).'년 '. substr($row['StudyStartDate'],5,2).'월' }}</dt><br/>
                                                <dt class="h27"><strong>강의수</strong>{{ $row['wUnitLectureCnt'] }}강 @if($row['wLectureProgressCcd'] != '105002' && empty($row['wScheduleCount'])==false) / {{$row['wScheduleCount']}}강 @endif</dt><br/>
                                                <dt class="h27">
                                                    <strong>수강기간</strong>
                                                    <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span>
                                                    <span class="NSK ml10 nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                    <span class="NSK nBox n2">{{ $row['wLectureProgressCcdName'] }}</span>
                                                </dt><br>
                                                @if(empty($row['LectureSampleData']) === false)
                                                    @foreach($row['LectureSampleData'] as $sample_idx => $sample_row)
                                                        <dt class="h27">맛보기{{ $sample_idx + 1 }}</dt>
                                                        @if(empty($sample_row['wHD']) === false) <dt class="tBox NSK black"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');">HIGH</a></dt> @endif
                                                        @if(empty($sample_row['wSD']) === false) <dt class="tBox NSK gray"><a href="javascript:fnPlayerSample('{{$row['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');">LOW</a></dt> @endif
                                                        <br/>
                                                    @endforeach
                                                @endif
                                                @if($row['IsCart'] == 'N')
                                                    <dt class="h27 tx-red">※ 바로결제만 가능한 상품입니다. 상세 페이지에서 결제해주세요.</dt><br/>
                                                @endif
                                                @if(empty($row['ProdPriceData']) === false)
                                                    @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                        <dt class="h27">
                                                            <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" class="goods_chk chk_products" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif/>
                                                            <label for="prod_code" class="pl10">
                                                                [{{ $price_row['SaleTypeCcdName'] }}] :

                                                                @if($price_row['SalePrice'] > $price_row['RealSalePrice'])
                                                                    <span class="price"><del>{{ number_format($price_row['SalePrice'], 0) }}</del>원</span>
                                                                    <span class="discount">({{ ($price_row['SaleRateUnit'] == '%' ? $price_row['SaleRate'] : number_format($price_row['SaleRate'], 0)) . $price_row['SaleRateUnit'] }}↓)</span> ▶
                                                                @endif
                                                                <span class="dcprice">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                            </label>
                                                        </dt>
                                                    @endforeach
                                                @endif
                                            </dl>
                                        </div>
                                        <div class="w-buy">
                                            <ul class="two">
                                                <li><a href="#none" class="btn_gray" name="btn_cart" data-direct-pay="N" data-is-redirect="Y">장바구니</a></li>
                                                <li><a href="#none" class="btn_blue" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y">바로결제</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        @if(empty($row['ProdBookData']) === false)
                            <div class="lec-info bg-light-gray">
                                <ul>
                                    @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                        <li>
                                                <span class="chk">
                                                    <label>[판매]</label>
                                                    <input type="checkbox" name="prod_code[]" class="goods_chk chk_books" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                </span>
                                            <div class="priceWrap NG">
                                                {{ $book_row['BookProvisionCcdName'] }}  <span class="NGR">{{ $book_row['ProdBookName'] }}</span><br>
                                                <p class="NGR">
                                                    [{{ $book_row['wSaleCcdName'] }}]
                                                    <span class="tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        @endif
    @endforeach

</form>
@endif

@if($group_num == 1)
    <style>
        .mb100 { display: table; width: 100%}
    </style>
    <script src="/public/js/willbes/product_util.js"></script>
@endif

<script type="text/javascript">
    var $dp_prod_form{{$group_num}} = $('#dp_prod_form{{$group_num}}');

    {{--장바구니, 바로결제 버튼 클릭--}}
    $dp_prod_form{{$group_num}}.on('click', 'a[name="btn_cart"], a[name="btn_direct_pay"]', function() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
        var $is_direct_pay = $(this).data('direct-pay');
        var $is_redirect = $(this).data('is-redirect');
        addCartNDirectPay($dp_prod_form{{$group_num}}, $is_direct_pay, $is_redirect,'{{front_url('')}}');
    });
</script>
