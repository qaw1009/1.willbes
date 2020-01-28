<div class="willbes-Prof-Subject pl-zero NG tx-dark-black">· 개설강좌</div>
<div class="acadBoxWrap">
    <ul class="tabWrap tabDepthAcad">
        <li><a href="#acad1" class="on">온라인강좌</a></li>
        <li><a href="#acad2">학원강좌</a></li>
    </ul>
    <div class="AcadtabBox">
        <div id="acad1" class="tabContent">
            <div class="tabGrid">
                <ul class="tabWrap acadline three">
                    <li><a href="#on_only_lecture" class="on">단강좌</a></li>
                    <li><a href="#on_pack_normal">추천패키지</a></li>
                    <li><a href="#on_pack_choice">선택패키지</a></li>
                </ul>
            </div>

            <div class="AcadListBox user-lec-list c_both">
                <div id="on_only_lecture" class="tabContent">
                    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="learn_pattern" value="on_lecture"/>  {{-- 학습형태 --}}
                        <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                        <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}
                        @include('willbes.pc.site.professor.tab_open_lecture_partial_'.$data['OnLecViewCcd'])
                    </form>
                    {{-- 온라인 단강좌 footer script --}}
                    @include('willbes.pc.site.lecture.only_footer_partial')
                </div>

                <div id="on_pack_normal" class="tabContent">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">추천패키지</div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 95px;">
                                    <col style="width: 665px;">
                                    <col style="width: 180px;">
                                </colgroup>
                                <tbody>

                                @php $pack = '648001'; @endphp
                                @foreach($tab_data['on_pack_normal'] as $row)
                                    <tr>
                                        <td class="w-list bg-light-white">{{$row['CourseName']}}</td>
                                        <td class="w-data tx-left pl25">
                                            <div class="w-tit">
                                                <a href="{{ site_url('/package/show/cate/').substr($row['CateCode'], 0, 6).'/pack/'.$pack.'/prod-code/'.$row['ProdCode'] }}">{{$row['ProdName']}}</a>
                                            </div>
                                            <dl class="w-info">
                                                <dt class="mr20">
                                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url('/package') }}', '', 'InfoFormPack')">
                                                        <strong class="open-info-modal">패키지상세정보</strong>
                                                    </a>
                                                </dt>
                                                <dt>개강일 : <span class="tx-blue">{{$row['StudyStartDate']}}</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">{{$row['StudyPeriod']}}일</span></dt>
                                                <dt class="NGR ml15">
                                                    <span class="nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice">
                                            @if(empty($row['ProdPriceData'] ) === false)
                                                @foreach($row['ProdPriceData'] as $price_row)
                                                    @if($loop -> index === 1)
                                                        <div class="priceWrap">
                                                            <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'],0)}}원</span>
                                                            <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- lecTable -->
                        </div>
                        <!-- willbes-Lec-Table -->
                    </div>
                    <!-- willbes-Lec -->
                </div>

                <div id="on_pack_choice" class="tabContent">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">선택패키지</div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 95px;">
                                    <col style="width: 665px;">
                                    <col style="width: 180px;">
                                </colgroup>
                                <tbody>

                                @php $pack = '648002'; @endphp
                                @foreach($tab_data['on_pack_choice'] as $row)
                                    <tr>
                                        <td class="w-list bg-light-white">{{$row['CourseName']}}</td>
                                        <td class="w-data tx-left pl25">
                                            <div class="w-tit">
                                                <a href="{{ site_url('/package/show/cate/').substr($row['CateCode'], 0, 6).'/pack/'.$pack.'/prod-code/'.$row['ProdCode'] }}">{{$row['ProdName']}}</a>
                                            </div>
                                            <dl class="w-info">
                                                <dt class="mr20">
                                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url('/package') }}', '', 'InfoFormPack')">
                                                        <strong class="open-info-modal">패키지상세정보</strong>
                                                    </a>
                                                </dt>
                                                <dt>개강일 : <span class="tx-blue">{{$row['StudyStartDate']}}</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">{{$row['StudyPeriod']}}일</span></dt>
                                                <dt class="NGR ml15">
                                                    <span class="nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice">
                                            @if(empty($row['ProdPriceData'] ) === false)
                                                @foreach($row['ProdPriceData'] as $price_row)
                                                    @if($loop -> index === 1)
                                                        <div class="priceWrap">
                                                            <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'],0)}}원</span>
                                                            <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- lecTable -->
                        </div>
                    </div>
                    <!-- willbes-Lec -->
                </div>

                <div id="InfoForm" class="willbes-Layer-Box"></div>
                <div id="InfoFormPack" class="willbes-Layer-Box d2"></div>
                <!-- willbes-Layer-Box -->
            </div>
        </div>
        <!-- 온라인강좌 -->

        <div id="acad2" class="tabContent">
            <div class="tabGrid">
                <ul class="tabWrap acadline two">
                    <li><a href="#off_only_lecture" class="on">단과</a></li>
                    <li><a href="#off_pack_normal">종합반</a></li>
                </ul>
            </div>
            <div class="AcadListBox user-lec-list c_both">
                <div id="off_only_lecture" class="tabContent">
                    <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="learn_pattern" value="off_lecture"/>  {{-- 학습형태 --}}
                        <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                        <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                        <div class="willbes-Lec NG c_both mt20">
                            <div class="willbes-Lec-Subject tx-dark-black">단과<span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span></div>
                            <!-- willbes-Lec-Subject -->

                            <div class="willbes-Lec-Line">-</div>
                            <!-- willbes-Lec-Line -->

                            @foreach($tab_data['off_lecture'] as $idx => $row)
                                <div class="willbes-Lec-Table">
                                    <table cellspacing="0" cellpadding="0" class="lecTable">
                                        <colgroup>
                                            <col style="width: 65px;">
                                            <col style="width: 85px;">
                                            <col style="width: 85px;">
                                            <col width="*">
                                            <col style="width: 120px;">
                                            <col style="width: 70px;">
                                            <col style="width: 130px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="w-place">{{ $row['CampusCcdName'] }}</td>
                                            <td class="w-name">{{ $row['SubjectName'] }}<br/><span class="tx-blue">{{ $row['ProfNickName'] }}</span></td>
                                            <td class="w-list">{{ $row['CourseName'] }}</td>
                                            <td class="w-data tx-left">
                                                <div class="w-tit w-acad-tit">
                                                    <a href="#none" onclick="goShowOff('{{ $row['ProdCode'] }}', '{{ substr($row['CateCode'], 0, 6) }}');" class="prod-name">{{ $row['ProdName'] }}</a>
                                                </div>
                                                <dl class="w-info">
                                                    <dt>
                                                        <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover1', '{{site_url('/' . config_item('app_pass_site_prefix') .'/offLecture')}}', '', 'InfoFormOff')">
                                                            <strong class="open-info-modal">강좌상세정보</strong>
                                                        </a>
                                                    </dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>수강형태 : <span class="tx-blue">{{ $row['StudyPatternCcdName'] }}</span></dt>
                                                    <dt class="ml15">
                                                        <span class="acadBox n{{ substr($row['StudyApplyCcd'], -1) }}">{{ $row['StudyApplyCcdName'] }}</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-schedule">
                                                <span class="tx-blue">{{ date('m/d', strtotime($row['StudyStartDate'])) }} ~ {{ date('m/d', strtotime($row['StudyEndDate'])) }}</span> <br/>
                                                <span class="tx11">{{ $row['WeekArrayName'] }}<br/>({{ $row['Amount'] }}회차)</span>
                                            </td>
                                            <td>
                                                <ul class="lecBuyBtns">
                                                    @php
                                                        if(empty($row['ProdPriceData']) == false) {
                                                            $saletypeccd = $row['ProdPriceData'][0]['SaleTypeCcd'];
                                                            $salerate = $row['ProdPriceData'][0]['SaleRate'];
                                                            $salerateunit = $row['ProdPriceData'][0]['SaleRateUnit'];
                                                            $realsaleprice = $row['ProdPriceData'][0]['RealSalePrice'];
                                                        } else {
                                                            $saletypeccd = '';
                                                            $salerate = '';
                                                            $salerateunit = '';
                                                            $realsaleprice = 0;
                                                        }
                                                    @endphp

                                                    @if($row['IsSalesAble'] == 'Y')
                                                        @if($row['StudyApplyCcd'] != '654002')
                                                            <li class="btnVisit"><a class="btn-off-visit-pay" href="#none" data-prod-code="{{ $row['ProdCode'] . ':' . $saletypeccd . ':' . $row['ProdCode'] }}">방문결제</a></li>
                                                        @endif
                                                        @if($row['StudyApplyCcd'] != '654001')
                                                            <li class="btnCart"><a href="#none" name="btn_off_cart" data-direct-pay="N" data-is-redirect="N" data-prod-code="{{ $row['ProdCode'] }}">장바구니</a></li>
                                                            <li class="btnBuy"><a href="#none" name="btn_off_direct_pay" data-direct-pay="Y" data-is-redirect="Y" data-prod-code="{{ $row['ProdCode'] }}">바로결제</a></li>
                                                        @endif
                                                    @endif
                                                </ul>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="acadInfo NGR n{{ substr($row['AcceptStatusCcd'], -1) }}">{{ $row['AcceptStatusCcdName'] }}</div>
                                                <div class="priceWrap chk buybtn p_re">
                                                <span class="price tx-blue">
                                                    <span class="chkBox d_none"><input type="checkbox" name="prod_code[]" value="{{ $row['ProdCode'] . ':' . $saletypeccd. ':' . $row['ProdCode'] }}" data-prod-code="{{ $row['ProdCode'] }}" data-study-apply-ccd="{{ $row['StudyApplyCcd'] }}" class="chk_products" @if($row['IsSalesAble'] == 'N' || $row['StudyApplyCcd'] == '654001' ) disabled="disabled" @endif/></span>
                                                    {{ number_format($realsaleprice, 0) }}원
                                                </span>
                                                    <span class="discount">(↓{{ $salerate . $salerateunit }})</span>
                                                </div>
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->
                                    <div class="lecInfoTable bookInfoTable">
                                        @if(empty($row['ProdBookData']) === false)
                                            <ul>
                                                @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>{{ $book_row['BookProvisionCcdName'] }}</span>
                                                            {{ $book_row['ProdBookName'] }}
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            @if($book_row['wSaleCcd'] == '112001')
                                                                <a href="#none" class="btnCart" name="btn_off_cart" data-prod-type="book" data-direct-pay="N" data-is-redirect="N" data-prod-code="{{ $book_row['ProdBookCode']  }}">장바구니</a>
                                                                <a href="#none" class="btnBuy" name="btn_off_direct_pay" data-direct-pay="Y" data-is-redirect="Y" data-prod-code="{{ $book_row['ProdBookCode']  }}">바로결제</a>
                                                            @endif
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003'){{'tx-red'}}@elseif($book_row['wSaleCcd'] == '112004'){{'tx-purple-gray'}}@endif">
                                                                [{{ $book_row['wSaleCcdName'] }}]</label>
                                                            <span class="d_none">
                                                                <input type="checkbox" name="prod_code[]"  value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                            </span>
                                                            <span class="tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                            <span class="tx-dark-gray">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="tx-red">※ 정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</div>
                                            <div>
                                                <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover2', '{{site_url('/' . config_item('app_pass_site_prefix') .'/offLecture')}}','', 'InfoFormOff')">
                                                    <strong class="open-info-modal">교재상세정보</strong></a>
                                            </div>
                                        @else
                                            <div>
                                                <span class="w-subtit none">※ 별도 구매 가능한 교재가 없습니다.</span>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- lecInfoTable -->
                                </div>
                                <!-- willbes-Lec-Table -->
                            @endforeach
                        </div>
                    </form>
                    {{-- 학원 단과 footer script --}}
                    @include('willbes.pc.site.off_lecture.only_footer_partial')
                </div>
                <div id="off_pack_normal" class="tabContent">
                    <div class="willbes-Lec NG c_both mt20">
                        <div class="willbes-Lec-Subject tx-dark-black">종합반</div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        @foreach($tab_data['off_pack_lecture'] as $row)
                            <div class="willbes-Lec-Table p_re">
                                <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                    <colgroup>
                                        <col style="width: 75px;">
                                        <col style="width: 90px;">
                                        <col style="width: 590px;">
                                        <col style="width: 185px;">
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <td class="w-place bg-light-white">{{$row['CampusCcdName']}}</td>
                                        <td class="w-list">{{$row['CourseName']}}</td>
                                        <td class="w-data tx-left pl15">
                                            <div class="w-tit w-acad-tit">
                                                <a href="{{ site_url('/' . config_item('app_pass_site_prefix') . '/offPackage/show/prod-code/' . $row['ProdCode']) }}">{{$row['ProdName']}}</a>
                                            </div>
                                            <dl class="w-info acad">
                                                <dt>
                                                    <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url('/' . config_item('app_pass_site_prefix') . '/offPackage') }}', '', 'InfoFormOffPack')">
                                                        <strong class="open-info-modal">종합반 상세정보</strong>
                                                    </a>
                                                </dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>개강월 : <span class="tx-blue">{{$row['SchoolStartYear']}}-{{$row['SchoolStartMonth']}}</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강형태 : <span class="tx-blue">{{$row['StudyPatternCcdName']}}</span></dt>
                                                <dt class="NGR ml15">
                                                    <span class="acadBox n{{ substr($row['StudyApplyCcd'], -1) }}">{{$row['StudyApplyCcdName']}}</span>
                                                </dt>
                                            </dl><br/>
                                        </td>
                                        <td class="w-notice p_re">
                                            <div class="acadInfo NGR n{{ substr($row['AcceptStatusCcd'], -1) }}">{{$row['AcceptStatusCcdName']}}</div>
                                            @if(empty($row['ProdPriceData']) === false)
                                                @foreach($row['ProdPriceData'] as $price_idx => $price_row)
                                                    <div class="priceWrap chk buybtn p_re">
                                                        <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span>
                                                        <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- lecTable -->
                            </div>
                            <!-- willbes-Lec-Table -->
                    @endforeach
                    </div>
                </div>
                <div id="InfoFormOff" class="willbes-Layer-Box"></div>
                <div id="InfoFormOffPack" class="willbes-Layer-Box d2"></div>
                <!-- willbes-Layer-Box -->
            </div>
        </div>
        <!-- 학원강좌 -->
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#search_value').on('keyup', function() {
            if (window.event.keyCode === 13) {
                goSearch();
            }
        });
        $('#btn_search').on('click', function() {
            goSearch();
        });
        var goSearch = function() {
            goUrl('search_text', Base64.encode(document.getElementById('search_keyword').value + ':' + document.getElementById('search_value').value));
        };
    });
</script>