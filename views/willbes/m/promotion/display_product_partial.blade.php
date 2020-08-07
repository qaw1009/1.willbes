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
        @if($ccd == '615001')
            <div class="mb100">
                <div class="pd20">
                    <div class="NSK-Black tx22 mb10">단과 강좌</div>
                    <div class="tx-red tx14 mb10">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.</div>
                </div>
                @if(empty($val) === false)
                    @foreach($val as $key => $row)
                        <div class="passProfTabs c_both">
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="w-prof p_re">
                                            <img src="{{ $row['ProfReferData']['lec_detail_img'] }}">
                                            <div class="cover"><img src="{{ img_url('m/mypage/profImg-cover.png') }}"></div>
                                        </div>
                                        <div class="w-data tx-left pl15">
                                            <div class="OTclass mr10"><span>{{ element($row['LecTypeCcd'],$lec_type) }}</span></div>
                                            <dl class="w-info pt-zero">
                                                <dt>{{ $row['CourseName'] }}<span class="row-line">|</span>{{ $row['SubjectName'] }}<span class="row-line">|</span>{{ $row['ProfNickName'] }}</dt>
                                            </dl>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/m/lecture/show/cate/').$row['CateCode'].'/pattern/only/prod-code/'.$row['ProdCode'] }}">{{ $row['ProdName'] }}</a>
                                            </div>
                                            <dt class="w-info tx-gray">
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
                                                                <input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-sale-price="{{ $price_row['RealSalePrice'] }}" @if($row['IsSalesAble'] == 'N') disabled="disabled" @endif>
                                                                <label for="prod_code" class="pl10">
                                                                    [{{ $price_row['SaleTypeCcdName'] }}] :
                                                                    <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})
                                                                </label>
                                                            </dt>
                                                        @endforeach
                                                    @endif
                                                </dl>
                                            </div>
                                            <div class="w-buy">
                                                <ul class="two">
                                                    <li><a href="#none" class="btn_gray" name="btn_cart" data-direct-pay="N" data-is-redirect="Y">장바구니</a></li>
                                                    <li><a href="#none" class="btn_blue direct_pay">바로결제</a></li>
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
                                                <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" data-sale-price="{{ $book_row['RealSalePrice'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                            </span>
                                            <div class="priceWrap NG">
                                                {{ $book_row['BookProvisionCcdName'] }}  <span class="NGR">{{ $book_row['ProdBookName'] }}</span><br>
                                                <p class="NGR">
                                                    [{{ $book_row['wSaleCcdName'] }}]
                                                    <span class="tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }}%)
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
            {{-- End 단과강좌 --}}
        @elseif($ccd == '615003')
            <div class="mb100">
                <div class="pd20">
                    <div class="NSK-Black tx22 mb10">운영자 패키지 강좌</div>
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
                                        <dl class="w-info">
                                            <dt>{{ $row['CourseName'] }}</dt>
                                        </dl>
                                        <div class="w-tit">
                                            <a href="#none">{{ $row['ProdName'] }}</a>
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
            {{-- End 운영자 패키지 강좌 --}}
        @elseif($ccd == '615004')
            <div class="mb100">
                <div class="pd20">
                    <div class="NSK-Black tx22 mb10">기간제 패키지 강좌</div>
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
                                            <a href="#none">{{ $row['ProdName'] }}</a>
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
        @endif
    @endforeach

    <div id="LecBuyMessagePop{{$group_num}}" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h250 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('LecBuyMessagePop{{$group_num}}')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="Message NG">
                도서구입비 소득공제 시행에 따라 강좌와 교재는 동시 결제가 불가능 합니다.<Br>
                선택한 교재는 장바구니에 자동으로 담기며, <Br>
                강좌 선 결제 후 장바구니에 담긴 교재를 결제하실 수 있습니다.
            </div>
            <div class="MessageBtns">
                <a href="#none" data-direct-pay="Y" data-is-redirect="Y"  class="btn_gray btn_direct_pay">확인</a>
            </div>
        </div>
        <div class="dim" onclick="closeWin('LecBuyMessagePop{{$group_num}}')"></div>
    </div>

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
    $dp_prod_form{{$group_num}}.on('click', 'a[name="btn_cart"], .btn_direct_pay', function() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
        var $is_direct_pay = $(this).data('direct-pay');
        addCartNDirectPay($dp_prod_form{{$group_num}}, $is_direct_pay, 'Y','{{front_url('')}}');
    });

    {{-- 결제 팝업 --}}
    $dp_prod_form{{$group_num}}.on('click', '.direct_pay', function() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
        if($dp_prod_form{{$group_num}}.find('input[name="prod_code[]"]:checked').length < 1) {
            alert('상품을 선택해 주세요.');
            return;
        }
        openWin('LecBuyMessagePop{{$group_num}}')
    });

</script>
