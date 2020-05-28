@extends('willbes.m.layouts.master')

@section('page_title', '학원 방문결제 접수')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <!-- PageTitle -->
    @include('willbes.m.layouts.page_title')

    <div>
        {{-- 상품 기본정보 --}}
        <div class="passProfTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                <tr>
                    <td>
                        <div class="w-data tx-left widthAutoFull">
                            <dl class="w-info pt-zero">
                                <dt>
                                    {{ $data['CampusCcdName'] }}
                                    <span class="NSK ml10 nBox n{{ substr($data['StudyApplyCcd'], -1) == '1' ? '4' : '1' }}">{{$data['StudyApplyCcdName']}}</span>
                                    <span class="NSK nBox n{{ substr($data['AcceptStatusCcd'], -1) }}">{{$data['AcceptStatusCcdName']}}</span>
                            </dl>
                            <div class="w-tit tx-blue">
                                {{$data['ProdName']}}
                            </div>
                            <div class="w-info tx-gray">
                                <dl>
                                    <dt class="h27"><strong>종합반유형</strong>선택형종합반</dt><br/>
                                    <dt class="h27"><strong>선택과목개수</strong>{{$data['PackSelCount']}}개</dt><br/>
                                    <dt class="h27"><strong>수강형태</strong>{{$data['StudyPatternCcdName']}}</dt><br/>
                                    <dt class="h27"><strong>접수기간</strong><span class="tx-blue">{{ date('Y.m.d', strtotime($data['SaleStartDatm'])) }} ~ {{ date('Y.m.d', strtotime($data['SaleEndDatm'])) }}</span></dt>
                                </dl>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
            <input type="hidden" name="learn_pattern" value="{{$learn_pattern}}"/>  {{-- 학습형태 --}}
            <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
            <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}
            <input type="hidden" name="is_visit_pay" value="Y"/>    {{-- 방문결제 여부 --}}

            {{-- 상품 가격정보 --}}
            @if(empty($data['ProdPriceData'] ) === false)
                @php $sale_type_ccd = $data['ProdPriceData'][0]['SaleTypeCcd']; @endphp
                @php $sale_price = $data['ProdPriceData'][0]['SalePrice']; @endphp
                @php $real_sale_price = $data['ProdPriceData'][0]['RealSalePrice']; @endphp
                @php $sale_info = $data['ProdPriceData'][0]['SaleRate'] . $data['ProdPriceData'][0]['SaleRateUnit']; @endphp
            @else
                @php $sale_type_ccd = 0; @endphp
                @php $sale_price = 0; @endphp
                @php $real_sale_price = 0; @endphp
                @php $sale_info = ''; @endphp
            @endif

            <input type="checkbox" name="prod_code[]" class="chk_products d_none" checked="checked" value="{{ $data['ProdCode'] . ':' . $sale_type_ccd . ':' . $data['ProdCode'] }}" data-prod-code="{{$data['ProdCode']}}" data-parent-prod-code="{{$data['ProdCode']}}" data-group-prod-code="{{$data['ProdCode']}}" data-sale-price="{{$real_sale_price}}"/>
            <input type="hidden" name="sale_status_ccd" id="sale_status_ccd" value="{{$data['SaleStatusCcd']}}">

            <div class="priceBox">
                <ul>
                    <li>
                        <strong>종합반</strong> {{ number_format($sale_price, 0) }}원
                        <span class="tx-red">(↓{{$sale_info}})</span> ▶
                        <span class="tx-blue">{{ number_format($real_sale_price, 0)}}원</span>
                    </li>
                    <li class="NGEB">
                        <strong>총 주문금액</strong>
                        <span class="tx-blue">{{ number_format($real_sale_price, 0)}}원</span>
                    </li>
                </ul>
            </div>
        @if($data['PackTypeCcd'] == '648003')
            {{-- 선택형(강사배정) 종합반 --}}
            <div class="lec-info lh1_5">
                ※ 해당 종합반은 단일 결제만 가능합니다. (다른 상품과 함께 결제 불가능)
            </div>
        @else
            {{-- 일반형/선택형 종합반 --}}
            <div class="lec-info">
                <h4 class="NGEB">강좌구성</h4>
                <h5>· 필수과목</h5>
                <div class="lec-choice-pkg">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <colgroup>
                            <col style="width: 87%;">
                            <col style="width: 13%;">
                        </colgroup>
                        <tbody>
                        {{-- 필수과목 --}}
                        @php $temp_sub_group_name = ''; @endphp
                        @foreach($data_sublist as $idx => $sub_row)
                            @if($sub_row['IsEssential'] === 'Y')
                                @if($sub_row['SubGroupName'] != $temp_sub_group_name)
                                    @if($idx != 0)
                                        {!! '</td></tr>' !!}
                                    @endif
                                    <tr class="replyList willbes-Open-Table">
                                        <td>{{$sub_row['SubjectName']}}</td>
                                        <td class="MoreBtn tx-center">></td>
                                    </tr>
                                    <tr class="willbes-Open-List">
                                        <td class="w-data tx-left" colspan="2">
                                @endif
                                    <div class="w-data-pkg">
                                        <div class="w-info">
                                            <span class="chk">
                                                <label>[선택]</label>
                                                <input type="checkbox" id="prod_code_sub_{{$sub_row['ProdCode']}}" name="prod_code_sub[]" value="{{$sub_row['ProdCode']}}" data-sub-group-name="essSubGroup-{{$sub_row['SubGroupName']}}" class="essSubGroup essSubGroup-{{$sub_row['SubGroupName']}}" onclick="checkOnly('.essSubGroup-{{$sub_row['SubGroupName']}}', this.value);"/>
                                            </span>
                                            <span class="ml10 tx14">{{$sub_row['ProfNickName']}}</span>
                                        </div>
                                        <div class="w-tit">
                                            {{ $sub_row['ProdName'] }}
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>
                                                <strong>수강형태</strong><span class="tx-blue">{{$sub_row['StudyPatternCcdName']}}</span>
                                                <span class="NSK nBox n{{ substr($sub_row['AcceptStatusCcd'], -1) }} ml10">{{$sub_row['AcceptStatusCcdName']}}</span>
                                            </dt>
                                            <dt>
                                                <span class="tx-blue">
                                                    {{str_replace('-', '.', $sub_row['StudyStartDate'])}} ~ {{str_replace('-', '.', $sub_row['StudyEndDate'])}}
                                                    {{$sub_row['WeekArrayName']}}
                                                    ({{$sub_row['Amount']}}회차)
                                                </span>
                                            </dt>
                                            <dt>
                                                <a href="#none" class="lecView" onclick="openWin('InfoFormEss{{$sub_row['SubGroupName']}}_{{$sub_row['ProdCode']}}')">강좌상세정보</a>
                                                <div id="InfoFormEss{{$sub_row['SubGroupName']}}_{{$sub_row['ProdCode']}}" class="willbes-Layer-Black NG">
                                                    <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
                                                        <a class="closeBtn" href="#none" onclick="closeWin('InfoFormEss{{$sub_row['SubGroupName']}}_{{$sub_row['ProdCode']}}')">
                                                            <img src="{{ img_url('m/calendar/close.png') }}">
                                                        </a>
                                                        <h4 class="pb-zero">{{ $sub_row['ProdName'] }}</h4>
                                                        <div class="LecDetailBox">
                                                            <h5 class="pt-zero">강좌상세정보</h5>
                                                            <dl class="w-info tx-gray">
                                                                <dt>수강기간<br>
                                                                    <span class="tx-blue">{{str_replace('-', '.', $sub_row['StudyStartDate'])}} ~ {{str_replace('-', '.', $sub_row['StudyEndDate'])}}</span>
                                                                    <span class="tx-blue">{{$sub_row['WeekArrayName']}}</span>
                                                                    ({{$sub_row['Amount']}}회차)
                                                                </dt>
                                                            </dl>
                                                            <div class="tx-dark-gray mt20">
                                                                {!! $sub_row['Content'] !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dim" onclick="closeWin('InfoFormEss{{$sub_row['SubGroupName']}}_{{$sub_row['ProdCode']}}')"></div>
                                                </div>
                                            </dt>
                                        </dl>
                                    </div>
                                @php $temp_sub_group_name = $sub_row['SubGroupName']; @endphp
                            @endif
                        @endforeach

                        @if(empty($temp_sub_group_name) === false)
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <h5>· 선택과목(선택과목 중 {{$data['PackSelCount']}}개 선택)</h5>
                <div class="lec-choice-pkg">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <colgroup>
                            <col style="width: 87%;">
                            <col style="width: 13%;">
                        </colgroup>
                        <tbody>
                        {{-- 선택과목 --}}
                        @php $temp_sub_group_name = ''; @endphp
                        @foreach($data_sublist as $idx => $sub_row)
                            @if($sub_row['IsEssential'] === 'N')
                                @if($sub_row['SubGroupName'] != $temp_sub_group_name)
                                    @if($idx != 0)
                                        {!! '</td></tr>' !!}
                                    @endif
                                    <tr class="replyList willbes-Open-Table">
                                        <td>{{$sub_row['SubjectName']}}</td>
                                        <td class="MoreBtn tx-center">></td>
                                    </tr>
                                    <tr class="willbes-Open-List">
                                        <td class="w-data tx-left" colspan="2">
                                @endif
                                        <div class="w-data-pkg">
                                            <div class="w-info">
                                            <span class="chk">
                                                <label>[선택]</label>
                                                <input type="checkbox" id="prod_code_sub_{{$sub_row['ProdCode']}}" name="prod_code_sub[]" value="{{$sub_row['ProdCode']}}" data-sub-group-name="choSubGroup-{{$sub_row['SubGroupName']}}" class="choSubGroup choSubGroup-{{$sub_row['SubGroupName']}}" onclick="checkOnly('.choSubGroup-{{$sub_row['SubGroupName']}}', this.value);"/>
                                            </span>
                                                <span class="ml10 tx14">{{$sub_row['ProfNickName']}}</span>
                                            </div>
                                            <div class="w-tit">
                                                {{ $sub_row['ProdName'] }}
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>
                                                    <strong>수강형태</strong><span class="tx-blue">{{$sub_row['StudyPatternCcdName']}}</span>
                                                    <span class="NSK nBox n{{ substr($sub_row['AcceptStatusCcd'], -1) }} ml10">{{$sub_row['AcceptStatusCcdName']}}</span>
                                                </dt>
                                                <dt>
                                                <span class="tx-blue">
                                                    {{str_replace('-', '.', $sub_row['StudyStartDate'])}} ~ {{str_replace('-', '.', $sub_row['StudyEndDate'])}}
                                                    {{$sub_row['WeekArrayName']}}
                                                    ({{$sub_row['Amount']}}회차)
                                                </span>
                                                </dt>
                                                <dt>
                                                    <a href="#none" class="lecView" onclick="openWin('InfoFormCho{{$sub_row['SubGroupName']}}_{{$sub_row['ProdCode']}}')">강좌상세정보</a>
                                                    <div id="InfoFormCho{{$sub_row['SubGroupName']}}_{{$sub_row['ProdCode']}}" class="willbes-Layer-Black NG">
                                                        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
                                                            <a class="closeBtn" href="#none" onclick="closeWin('InfoFormCho{{$sub_row['SubGroupName']}}_{{$sub_row['ProdCode']}}')">
                                                                <img src="{{ img_url('m/calendar/close.png') }}">
                                                            </a>
                                                            <h4 class="pb-zero">{{ $sub_row['ProdName'] }}</h4>
                                                            <div class="LecDetailBox">
                                                                <h5 class="pt-zero">강좌상세정보</h5>
                                                                <dl class="w-info tx-gray">
                                                                    <dt>수강기간<br>
                                                                        <span class="tx-blue">{{str_replace('-', '.', $sub_row['StudyStartDate'])}} ~ {{str_replace('-', '.', $sub_row['StudyEndDate'])}}</span>
                                                                        <span class="tx-blue">{{$sub_row['WeekArrayName']}}</span>
                                                                        ({{$sub_row['Amount']}}회차)
                                                                    </dt>
                                                                </dl>
                                                                <div class="tx-dark-gray mt20">
                                                                    {!! $sub_row['Content'] !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="dim" onclick="closeWin('InfoFormCho{{$sub_row['SubGroupName']}}_{{$sub_row['ProdCode']}}')"></div>
                                                    </div>
                                                </dt>
                                            </dl>
                                        </div>
                                @php $temp_sub_group_name = $sub_row['SubGroupName']; @endphp
                            @endif
                        @endforeach

                        @if(empty($temp_sub_group_name) === false)
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="lec-info NGR">
                <h4 class="NGEB">종합반 상세정보</h4>
                <div class="lec-info-pkg">
                    <strong>종합반 상세정보</strong><br>
                    {!! $data['Content'] !!}
                </div>
            </div>
        @endif
        </form>
    </div>

    {{-- 방문결제 버튼 --}}
    @if($data["PackTypeCcd"] == '648003')
        <div id="btn_visit_box" class="lec-btns w100p">
            <ul>
                <li><a href="#none" id="btn_each_visit_pay" class="btn-purple-line">방문결제 접수</a></li>
            </ul>
        </div>
    @else
        <div id="btn_visit_box" class="lec-btns w50p">
            <ul>
                <li><a href="#none" id="btn_basket" class="btn-purple">장바구니</a></li>
                <li><a href="#none" id="btn_visit_pay" class="btn-purple-line">방문결제 접수</a></li>
            </ul>
        </div>
    @endif

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')

    {{-- footer script --}}
    @include('willbes.m.site.off_visit.only_footer_partial')
</div>
<script src="/public/js/willbes/product_util.js"></script>
<script type="text/javascript">
    var $regi_off_form = $('#regi_off_form');

    $(document).ready(function() {
        // 장바구니, 방문결제 버튼 클릭
        $('#btn_visit_box').on('click', '#btn_each_visit_pay, #btn_basket', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if($data["IsSalesAble"] !== 'Y')
                alert('신청 할 수 없는 강좌입니다.');
                return;
            @endif

            if ($(this).attr('id') === 'btn_each_visit_pay') {
                // 개별 방문결제 접수
                var prod_code = $regi_off_form.find("input:checkbox[name='prod_code[]']:checked").val();
                if (prod_code === undefined) {
                    alert('선택된 상품이 없습니다.');
                    return;
                }

                if (checkProduct($regi_off_form.find('input[name="learn_pattern"]').val(), prod_code, 'Y', $regi_off_form, 'off') === false) {
                    return;
                }

                if (confirm('방문접수를 신청하시겠습니까?')) {
                    $regi_off_form.find('input[name="prod_code[]"]').val(prod_code);
                    $regi_off_form.find('input[name="cart_type"]').val('off_lecture');
                    $regi_off_form.find('input[name="is_direct_pay"]').val('Y');
                    var url = frontPassUrl('/order/visit/direct');
                    ajaxSubmit($regi_off_form, url, function (ret) {
                        if (ret.ret_cd) {
                            alert(ret.ret_msg);
                            location.href = ret.ret_data.ret_url;
                        }
                    }, showValidateError, null, false, 'alert');
                }
            } else {
                // 개별 장바구니 저장
                // 필수과목 체크
                var $ess_lecture = $regi_off_form.find('.essSubGroup');
                var $ess_group = '';
                var $ess_check_cnt = 0;
                var $is_ess_check = true;

                $.each($ess_lecture, function() {
                    $ess_group = $(this).data('sub-group-name');
                    $ess_check_cnt = $regi_off_form.find('.essSubGroup[data-sub-group-name="' + $ess_group + '"]:checked').length;

                    if ($ess_check_cnt < 1) {
                        alert('필수과목은 과목별 1개씩 선택하셔야 합니다.');
                        $is_ess_check = false;
                        return false;
                    } else if ($ess_check_cnt > 1) {
                        alert('필수과목은 과목별 1개씩 선택하셔야 합니다. 현재 2개 이상의 과목이 선택되었습니다.');
                        $is_ess_check = false;
                        return false;
                    }
                });

                if ($is_ess_check === false) {
                    return;
                }

                // 선택과목 체크
                var $cho_check_cnt = $regi_off_form.find('.choSubGroup:checked').length;
                if($cho_check_cnt !== parseInt({{$data['PackSelCount']}})) {
                    alert('선택과목 중 {{$data['PackSelCount']}} 개를 선택하셔야 합니다.');
                    return;
                }

                var $is_direct_pay = 'N';
                var $is_redirect = 'N';

                if(cartNDirectPay($regi_off_form, $is_direct_pay, $is_redirect) === true) {
                    cartList();
                }
            }
        });

        // 필수과목 동일그룹의 상품갯수가 1개일 경우 선택 처리
        function setOnlyEssLectureChecked() {
            var $ess_lecture = $regi_off_form.find('.essSubGroup');
            var $ess_group = '';

            $.each($ess_lecture, function() {
                $ess_group = $(this).data('sub-group-name');

                if ($regi_off_form.find('.essSubGroup[data-sub-group-name="' + $ess_group + '"]').length === 1) {
                    $regi_off_form.find('.essSubGroup[data-sub-group-name="' + $ess_group + '"]').prop('checked', true);
                }
            });
        }
        setOnlyEssLectureChecked();

        {{-- 선택형강사배정 상품일 경우 장바구니 노출 안함 --}}
        @if($data["PackTypeCcd"] == '648003')
            $('#basket_box').hide();
        @endif
    });
</script>
<!-- End Container -->
@stop