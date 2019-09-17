@extends('willbes.m.layouts.master')

@section('page_title', ($pattern == 'only' ? '수강신청 > 단강좌' : '무료강좌') )

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <!-- PageTitle -->
        @include('willbes.m.layouts.page_title')
        <div>
            <div class="passProfTabs c_both">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                    <tr>
                        <td>
                            <div class="w-prof p_re">
                                <img src="{{ $data['ProfReferData']['lec_detail_img'] or '' }}">
                                <div class="cover"><img src="{{ img_url('m/mypage/profImg-cover.png') }}"></div>
                            </div>
                            <div class="w-data tx-left pl15">
                                <dl class="w-info pt-zero">
                                    <dt>{{ $data['SubjectName'] }}<span class="row-line">|</span>{{ $data['ProfNickName'] }}</dt>
                                </dl>
                                <div class="w-tit">
                                    {{ $data['ProdName'] }}
                                </div>
                                <div class="w-info tx-gray">
                                    <dl>
                                        <dt class="h27"><strong>강의수</strong>{{ $data['wUnitLectureCnt'] }}강@if($data['wLectureProgressCcd'] != '105002' && empty($data['wScheduleCount'])==false) / {{$data['wScheduleCount']}}강@endif</dt><br/>
                                        <dt class="h27"><strong>수강기간</strong><span class="tx-blue">{{ $data['StudyPeriod'] }}일</span>
                                            <span class="NSK ml10 nBox n1">{{ $data['MultipleApply'] === "1" ? '무제한' : $data['MultipleApply'].'배수'}}</span>
                                            <span class="NSK nBox n{{ substr($data['wLectureProgressCcd'], -1)+1 }}">{{ $data['wLectureProgressCcdName'] }}</span>
                                        </dt>
                                        @if($pattern == 'only')
                                            <br>
                                            <dt class="h27">
                                                <strong>맛보기</strong>
                                                @if( empty($data['LectureSampleData']) === false)
                                                    @foreach($data['LectureSampleData'] as $sample_idx => $sample_row)
                                                        @if($loop->index == 1) {{--처음 1개만 노출--}}
                                                            @if(empty($sample_row['wHD']) === false)<a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$sample_row['wUnitIdx']}}','HD');" class="tBox black NSK">HIGH</a>@endif
                                                            @if(empty($sample_row['wSD']) === false)<a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$sample_row['wUnitIdx']}}','SD');" class="tBox gray NSK">LOW</a>@endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </dt>
                                        @endif
                                    </dl>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            @if($pattern == 'only' || ($pattern == 'free' && $data['FreeLecTypeCcd'] == '652001'))
                <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="learn_pattern" value="{{ $learn_pattern }}"/>  {{-- 학습형태 --}}
                    <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                    <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}
                <div class="lec-info">
                    <h4 class="NGEB">강좌신청</h4>
                    <ul>
                        @if(empty($data['ProdPriceData']) === false)
                            @foreach($data['ProdPriceData'] as $price_idx => $price_row)
                            <li>
                            <span class="chk">
                                <label>[판매]</label>
                                <input type="checkbox" name="prod_code[]" value="{{ $data['ProdCode'] . ':' . $price_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $data['ProdCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-sale-price="{{ $price_row['RealSalePrice'] }}" class="chk_products chk_only_{{ $data['ProdCode'] }}" onchange="checkOnly('.chk_only_{{ $data['ProdCode'] }}', this.value);" @if($data['IsSalesAble'] == 'N') disabled="disabled" @endif>
                            </span>
                                <div class="priceWrap NG">
                                    [{{ $price_row['SaleTypeCcdName'] }}]
                                    @if($pattern == 'only')
                                    {{ number_format($price_row['SalePrice'], 0) }}원 (↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }}) ▶
                                    @endif
                                    <span class="tx-blue">{{ number_format($price_row['RealSalePrice'], 0) }}원</span><br>
                                </div>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="lec-info">
                    <h4 class="NGEB">교재신청</h4>
                    <ul>
                        @if(empty($data['ProdBookData']) === false)
                            @foreach($data['ProdBookData'] as $book_idx => $book_row)
                                <li>
                                <span class="chk">
                                    <label>[판매]</label>
                                    <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $data['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $data['ProdCode'] }}" data-group-prod-code="{{ $data['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" data-sale-price="{{ $book_row['RealSalePrice'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                </span>
                                    <div class="priceWrap NG">
                                        {{ $book_row['BookProvisionCcdName'] }}  <span class="NGR">{{ $book_row['ProdBookName'] }}</span><br>
                                        <p class="NGR">[{{ $book_row['wSaleCcdName'] }}]<span class="tx-blue"> {{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                            (↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</p>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li>※ 별도 구매 가능한 교재가 없습니다.</li>
                        @endif
                        <li class="tx-red NGR">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.</li>
                    </ul>
                </div>

                <div class="priceBox">
                    <ul>
                        <li><strong>강좌</strong> <span id="prod_sale_price">0</span>원</li>
                        <li><strong>교재</strong> <span id="book_sale_price">0</span>원</li>
                        <li class="NGEB"><strong>총 주문금액</strong> <span class="tx-blue"><span id="tot_sale_price">0</span>원</span></li>
                    </ul>
                </div>
                </form>
            @endif


            <div class="lec-info-tab NGR">
                <ul class="tabWrap">
                    <li><a href="#tab01" @if(!($pattern == 'free' && $data['FreeLecTypeCcd'] == '652002')) class="on" @endif>강좌정보</a></li>
                    <li><a href="#tab02">교재정보</a></li>
                    <li><a href="#tab03" @if(($pattern == 'free' && $data['FreeLecTypeCcd'] == '652002')) class="on" @endif>강의목차</a></li>
                    <li><a href="#tab04">수강후기</a></li>
                </ul>
                <div class="tabBox">
                    <div id="tab01">
                        @foreach($data['ProdContents'] as $idx => $row)
                            <h4 class="NGEB">강좌{{ $row['ContentTypeCcdName'] }}</h4>
                            {!! $row['Content'] !!}
                        @endforeach
                    </div>

                    <div id="tab02" class="book-info">
                        @foreach($data['ProdSaleBooks'] as $idx => $row)
                            <img src="{{ $row['wAttachImgPath'] }}{{ $row['wAttachImgOgName'] }}" alt="{{ $row['ProdBookName'] }}">
                            <ul>
                                <li class="NGEB">{{ $row['ProdBookName'] }}</li>
                                <li><span>분야</span>  {{ $row['BookCateName'] }}</li>
                                <li><span>저자</span> {{ $row['wAuthorNames'] }}</li>
                                <li><span>출판사</span> {{ $row['wPublName'] }}</li>
                                <li><span>판형/쪽수</span> {{ $row['wEditionSize'] }} / {{ $row['wPageCnt'] }}</li>
                                <li><span>출판일</span> {{ $row['wPublDate'] }}</li>
                                <li><span>교재비</span> <strong class="tx-blue">{{ number_format($row['RealSalePrice']) }}원</strong> (↓{{ $row['SaleRate'] . $row['SaleRateUnit'] }})
                                    <strong>[{{ $row['wSaleCcdName'] }}]</strong></li>
                            </ul>
                        @endforeach
                    </div>

                    <div id="tab03" class="lec-list">
                        <ul>
                            @foreach($data['LectureUnits'] as $idx => $row)
                                <li>
                                    {{ $row['wUnitLectureNum'] }}강 <span class="tx-blue">{{ $row['wRuntime'] }}분</span><br>
                                    {{ $row['wUnitName'] }}
                                    <ul class="NGEB mt10">
                                        @if($pattern == 'free' && $data['FreeLecTypeCcd'] == '652002')
                                            @if(empty($row['wWD']) === false) <li><a href="javascript:fnPlayerFree('{{$data['ProdCode']}}','{{$row['wUnitIdx']}}','WD');" class="btn_black_line">WIDE</a></li>@endif
                                            @if(empty($row['wHD']) === false) <li><a href="javascript:fnPlayerFree('{{$data['ProdCode']}}','{{$row['wUnitIdx']}}','HD');" class="btn_blue">HIGH</a></li>@endif
                                            @if(empty($row['wSD']) === false) <li><a href="javascript:fnPlayerFree('{{$data['ProdCode']}}','{{$row['wUnitIdx']}}','SD');" class="btn_gray">LOW</a></li>@endif
                                        @elseif (in_array($row['wUnitIdx'], $data['LectureSampleUnitIdxs']) === true)
                                            @if(empty($row['wWD']) === false) <li><a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$row['wUnitIdx']}}','WD');" class="btn_black_line">WIDE</a></li>@endif
                                            @if(empty($row['wHD']) === false) <li><a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$row['wUnitIdx']}}','HD');" class="btn_blue">HIGH</a></li>@endif
                                            @if(empty($row['wSD']) === false) <li><a href="javascript:fnPlayerSample('{{$data['ProdCode']}}','{{$row['wUnitIdx']}}','SD');" class="btn_gray">LOW</a></li>@endif
                                        @endif
                                            <li>
                                                @if(empty($row['wUnitAttachFile']) === false)
                                                    @if($pattern == 'free' && $data['FreeLecTypeCcd'] == '652002')
                                                        <a href="{{front_url('/lecture/download/').'?filename='.urlencode(str_replace( '//', '/', $row['wAttachPath'].'/'.$row['wUnitAttachFile'])).'&filename_ori='.urlencode($row['wUnitAttachFileReal'])}}"  class="f_right"><img src="{{ img_url('m/mypage/icon_lec.png') }}"> <span class="underline">강의자료</span></a>
                                                    @else
                                                        <div class="f_right"><img src="{{ img_url('m/mypage/icon_lec.png') }}" > <span class="underline">강의자료</span></div>
                                                    @endif
                                                @endif
                                            </li>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div id="tab04" class="lec-reply">
                        해당 강좌 총 수강후기 [<strong>15</strong>건]
                        <p class="tx-red">※ 수강후기 등록은 PC버전에서만 가능합니다.</p>
                        <div class="reply">
                            정리하기 좋습니다.정리하기 좋습니다.정리하기 좋습니다.
                            정리하기 좋습니다.정리하기 좋습니다.
                            <p class="mt10">김인* 2019-05-22</p>
                        </div>
                        <div class="reply">
                            정리하기 좋습니다.정리하기 좋습니다.정리하기 좋습니다.
                            정리하기 좋습니다.정리하기 좋습니다.
                            <p class="mt10">김인* 2019-05-22</p>
                        </div>
                        <div class="reply">
                            정리하기 좋습니다.정리하기 좋습니다.정리하기 좋습니다.
                            정리하기 좋습니다.정리하기 좋습니다.
                            <p class="mt10">김인* 2019-05-22</p>
                        </div>
                        <div class="reply">
                            정리하기 좋습니다.정리하기 좋습니다.정리하기 좋습니다.
                            정리하기 좋습니다.정리하기 좋습니다.
                            <p class="mt10">김인* 2019-05-22</p>
                        </div>
                        <div class="reply">
                            정리하기 좋습니다.정리하기 좋습니다.정리하기 좋습니다.
                            정리하기 좋습니다.정리하기 좋습니다.
                            <p class="mt10">김인* 2019-05-22</p>
                        </div>
                        <div class="Paging">
                            <ul>
                                <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                                <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                                <li><a href="#none">2</a><span class="row-line">|</span></li>
                                <li><a href="#none">3</a><span class="row-line">|</span></li>
                                <li><a href="#none">4</a><span class="row-line">|</span></li>
                                <li><a href="#none">5</a></li>
                                <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @if($pattern == 'only')
                <div class="lec-btns">
                    <ul>
                        <li><a href="#" onclick="history.back(-1); return false;" class="btn_black_line">강좌목록</a></li>
                        <li><a href="#none" @if($data['IsSalesAble'] != 'Y')onclick="javascript:alert('구매할 수 없는 상품입니다.');" @elseif($data['IsCart'] == 'N') onclick="javascript:alert('바로결제만 가능한 상품입니다.')" @else name="btn_cart" @endif  data-direct-pay="N" class="btn-purple">장바구니</a></li>
                        <li><a href="#none" @if($data['IsSalesAble'] != 'Y')onclick="javascript:alert('구매할 수 없는 상품입니다.');" @else name="btn_direct_pay" @endif data-direct-pay="Y" class="btn-purple-line">바로결제</a></li>
                    </ul>
                </div>
            @elseif($pattern == 'free' && $data['FreeLecTypeCcd'] == '652001')
                <div class="lec-btns w100p">
                    <ul>
                        <li><a href="#none" @if($data['IsSalesAble'] != 'Y')onclick="javascript:alert('구매할 수 없는 상품입니다.');" @else name="btn_direct_pay" @endif data-direct-pay="Y" class="btn-purple-line">바로결제</a></li>
                    </ul>
                </div>
            @endif
        </div>

        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')
    </div>
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            $regi_form.on('change', '.chk_products, .chk_books', function() {
                setCheckLectureProduct($regi_form, $(this), 'price', 'prod_sale_price', 'book_sale_price', 'tot_sale_price');
            });

            @if($pattern == 'only')
                {{--장바구니, 바로결제 버튼 클릭--}}
                $('a[name="btn_cart"], a[name="btn_direct_pay"]').on('click', function() {
                    var $is_direct_pay = $(this).data('direct-pay');
                    addCartNDirectPay($regi_form, $is_direct_pay, 'Y','{{front_url('')}}');
                });
            @elseif($pattern == 'free')
                {{-- 바로결제 버튼 클릭--}}
                $('a[name="btn_direct_pay"]').on('click', function() {

                    var $is_redirect = $(this).data('is-redirect');
                    var $layer_type = $regi_form.find('.chk_books:checked').length < 1 ? 'pocketBox1' : 'pocketBox2';

                    // 무료강좌 지급
                    if (applyFreeLecture($regi_form) === true) {
                        if ($is_redirect === 'N') {
                            openWin($layer_type);
                        } else {
                            // 교재상품 바로결제
                            if ($regi_form.find('.chk_books:checked').length > 0) {
                                $regi_form.find('.chk_products').prop('checked', false);    // 무료강좌상품 체크해제
                                {{--cartNDirectPay($regi_form, 'Y', 'Y');--}}
                                addCartNDirectPay($regi_form, 'Y', 'Y','{{front_url('')}}');
                            } else {
                                goClassRoom();
                            }
                        }
                    }
                });
            @endif

            {{--내 강의실 페이지 이동--}}
            function goClassRoom() {
                location.href = '{{ app_url('/m/classroom/on/list/ongoing', 'www') }}';
            }

            {{--무료강좌 신청--}}
            function applyFreeLecture($regi_form) {
                var $result = false;
                var $confirm_msg = $regi_form.find('.chk_books:checked').length < 1 ? '해당 강좌를 신청하시겠습니까?' : '해당 강좌 및 교재를 신청하시겠습니까?';

                if($regi_form.find('.chk_products:checked').length < 1) {
                    alert('강좌를 선택해 주세요.');
                    return false;
                }

                if (confirm($confirm_msg)) {
                    var $input_prod_code = {};
                    $regi_form.find('.chk_products:checked').each(function (idx) {
                        $input_prod_code[idx] = $(this).val();
                    });

                    var url = '{{ front_url('/order/free') }}';
                    var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), {
                        'prod_code': JSON.stringify($input_prod_code)
                    });
                    sendAjax(url, data, function (ret) {
                        if (ret.ret_cd) {
                            $result = true;
                        }
                    }, showAlertError, false, 'POST');
                }

                return $result;
            }

        });

    </script>

@stop