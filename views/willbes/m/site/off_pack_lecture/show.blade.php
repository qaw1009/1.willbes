@extends('willbes.m.layouts.master')

@section('page_title', '학원수강신청 > 종합반' )

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <!-- PageTitle -->
        @include('willbes.m.layouts.page_title')

        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>
        <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
            <input type="hidden" name="learn_pattern" value="{{$learn_pattern}}"/>  {{-- 학습형태 --}}
            <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
            <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}
            <div>
                <div class="passProfTabs c_both">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <tbody>
                        <tr>
                            <td>
                                <div class="w-data tx-left widthAutoFull">
                                    <dl class="w-info pt-zero">
                                        <dt>{{$data['CampusCcdName']}}<span class="row-line">|</span>{{ $data['CourseName'] }}
                                    </dl>
                                    <div class="w-tit tx-blue">
                                        {{$data['ProdName']}}
                                    </div>
                                    <div class="w-info tx-gray">
                                        <dl>
                                            <dt class="h27">
                                                <strong>수강형태</strong>{{$data['StudyPatternCcdName']}}
                                                    <span class="NSK ml10 nBox n{{ substr($data['StudyApplyCcd'], -1) == '1' ? '4' : '1' }}">{{ $data['StudyApplyCcdName'] }}</span>
                                                    <span class="NSK nBox n{{ substr($data['AcceptStatusCcd'], -1) }}">{{ $data['AcceptStatusCcdName'] }}</span></dt>
                                            <dt class="h27"><strong>접수기간</strong><span class="tx-blue">{{ date('Y.m.d', strtotime($data['SaleStartDatm'])) }} ~ {{ date('Y.m.d', strtotime($data['SaleEndDatm'])) }}</span> </dt>
                                        </dl>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                @php
                    if(empty($data['ProdPriceData'] ) === false) {
                        $sale_type_ccd = $data['ProdPriceData'][0]['SaleTypeCcd'];
                        $sale_price = $data['ProdPriceData'][0]['SalePrice'];
                        $real_sale_price = $data['ProdPriceData'][0]['RealSalePrice'];
                        $sale_info = $data['ProdPriceData'][0]['SaleRate'] . $data['ProdPriceData'][0]['SaleRateUnit'];
                    } else {
                        $sale_type_ccd = 0;
                        $sale_price = 0;
                        $real_sale_price = 0;
                        $sale_info =0;
                    }
                @endphp

                <input type="checkbox" name="prod_code[]" class="chk_products d_none" checked="checked" value="{{ $data['ProdCode'] . ':' . $sale_type_ccd . ':' . $data['ProdCode'] }}" data-prod-code="{{$data['ProdCode']}}" data-parent-prod-code="{{$data['ProdCode']}}" data-group-prod-code="{{$data['ProdCode']}}" data-sale-price="{{$real_sale_price}}"/>
                <input type="hidden" name="sale_status_ccd" id="sale_status_ccd" value="{{$data['SaleStatusCcd']}}">

                <div class="priceBox">
                    <ul>
                        <li><strong>종합반</strong> {{ number_format($sale_price, 0) }}원<span class="tx-red">(↓{{$sale_info}})</span>
                            ▶ <span class="tx-blue">{{ number_format($real_sale_price,0)}}원</span></li>
                        <li class="NGEB"><strong>총 주문금액</strong> <span class="tx-blue">{{ number_format($real_sale_price,0)}}원</span></li>
                    </ul>
                </div>

                <div class="lec-info">
                    <h4 class="NGEB">강좌구성</h4>
                    <h5>· 필수과목</h5>
                    <div class="lec-choice-pkg">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable lec-essential">
                            <colgroup>
                                <col style="width: 87%;">
                                <col style="width: 13%;">
                            </colgroup>
                            <tbody>
                            @php
                                $subGroup_array = [];
                                $subGroup_cho_array = [];
                            @endphp

                            @if(empty($data_sublist) === false)
                                @php
                                    $last_subGroupName = '';        // 과목 타이틀 묶음을 위한 변수
                                @endphp

                                @foreach($data_sublist as $idx => $sub_row /*필수 과목*/)
                                    @if($sub_row['IsEssential'] === 'Y')
                                        @php
                                            $subGroupName_Re = strlen($sub_row['SubGroupName']) == 1 ? "0".$sub_row['SubGroupName'] : $sub_row['SubGroupName'];
                                            $subGroup_array[] = $subGroupName_Re;
                                        @endphp

                                        @if($last_subGroupName != ($sub_row['SubGroupName'].$sub_row['SubjectName']))
                                            @if($last_subGroupName != '')
                                                {{-- 포문시 같은 그룹일경우 닫기 태그 제어로 인해 앞으로 이동--}}
                                                </td>
                                            </tr>
                                            @endif
                                            <tr class="replyList willbes-Open-Table">
                                                <td>
                                                    {{$sub_row['SubjectName']}}
                                                </td>
                                                <td class="MoreBtn tx-center">></td>
                                            </tr>
                                            <tr class="willbes-Open-List">
                                                <td class="w-data tx-left" colspan="2">
                                        @endif
                                                <div class="w-data-pkg">
                                                    <div class="w-info">
                                                        <span class="chk">
                                                            <label>[판매]</label>
                                                            <input type="checkbox" id="prod_code_sub_{{$sub_row['ProdCode']}}" name="prod_code_sub[]" value="{{$sub_row['ProdCode']}}" class="essSubGroup-{{$subGroupName_Re}}" onclick="checkOnly('.essSubGroup-{{$subGroupName_Re}}', this.value);" checked>
                                                        </span>
                                                        <span class="ml10 tx14">{{$sub_row['ProfNickName']}}</span>
                                                    </div>
                                                    <div class="w-tit">
                                                        {{ $sub_row['ProdName'] }}
                                                    </div>
                                                    <dl class="w-info tx-gray">
                                                        <dt><strong>수강형태</strong><span class="tx-blue">{{$sub_row['StudyPatternCcdName']}}</span>
                                                            <span class="NSK nBox n{{ substr($sub_row['AcceptStatusCcd'], -1) }}">{{ $sub_row['AcceptStatusCcdName'] }}</span></dt>
                                                        <dt><span class="tx-blue">{{str_replace('-', '.', $sub_row['StudyStartDate'])}} ~ {{str_replace('-', '.', $sub_row['StudyEndDate'])}} {{$sub_row['WeekArrayName']}} ({{$sub_row['Amount']}}회차)</span></dt>
                                                        <dt><a href="#none" class="lecView" onclick="openWin('InfoForm_{{$sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode']}}')">강좌상세정보</a></dt>
                                                    </dl>
                                                </div>
                                                <div id="InfoForm_{{$sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode']}}" class="willbes-Layer-Black NG">
                                                    <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
                                                        <a class="closeBtn" href="#none" onclick="closeWin('InfoForm_{{$sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode']}}')">
                                                            <img src="{{img_url('m/calendar/close.png') }}">
                                                        </a>
                                                        <h4> {{ $sub_row['ProdName'] }} </h4>
                                                        <div class="LecDetailBox">
                                                            <h5>강좌상세정보</h5>
                                                            <dl class="w-info tx-gray">
                                                                <dt>수강기간 <br>
                                                                    <span class="tx-blue">{{$sub_row['StudyStartDate']}} ~ {{$sub_row['StudyEndDate']}}</span>
                                                                    <span class="tx-blue">{{$sub_row['WeekArrayName']}}</span> ({{$sub_row['WeekArrayName']}} 회차)</dt>
                                                            </dl>
                                                            @if(empty($sub_row['Content5']) != true)
                                                                <h5>수강대상</h5>
                                                                <div class="tx-dark-gray">
                                                                    {!! $sub_row['Content5'] !!}
                                                                </div>
                                                            @endif
                                                                <h5>강좌소개</h5>
                                                                <div class="tx-dark-gray">
                                                                    {!! $sub_row['Content'] !!}
                                                                </div>
                                                            @if(empty($sub_row['Content6']) != true)
                                                                <h5>강좌효과</h5>
                                                                <div class="tx-dark-gray">
                                                                    {!! $sub_row['Content6'] !!}
                                                                </div>
                                                            @endif
                                                            @if(empty($sub_row['Content7']) != true)
                                                                <h5>수강후기</h5>
                                                                <div class="tx-dark-gray">
                                                                    {!! $sub_row['Content7'] !!}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="dim" onclick="closeWin('InfoForm_{{$sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode']}}')"></div>
                                                </div>
                                            {{-- 위에서 닫기 처리
                                                </td>
                                            </tr>
                                            --}}
                                        @php
                                            $last_subGroupName = $sub_row['SubGroupName'].$sub_row['SubjectName']
                                        @endphp
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
                    </div>

                    <h5>· 선택과목(선택과목 중 {{$data['PackSelCount']}}개 선택) </h5>
                    <div class="lec-choice-pkg">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable lec-choice">
                            <colgroup>
                                <col style="width: 87%;">
                                <col style="width: 13%;">
                            </colgroup>
                            <tbody>

                            @if(empty($data_sublist) === false)
                                @php
                                    $last_subGroupName = '';        // 과목 타이틀 묶음을 위한 변수
                                @endphp
                                @foreach($data_sublist as $idx => $sub_row /*선택 과목*/)
                                    @if($sub_row['IsEssential'] === 'N')
                                        @php
                                            $subGroupName_Re = strlen($sub_row['SubGroupName']) == 1 ? "0".$sub_row['SubGroupName'] : $sub_row['SubGroupName'];
                                            $subGroup_cho_array[] = $sub_row['SubGroupName'];
                                        @endphp

                                        @if($last_subGroupName != ($sub_row['SubGroupName'].$sub_row['SubjectName']))
                                            @if($last_subGroupName != '')
                                            {{-- 포문시 같은 그룹일경우 닫기 태그 제어로 인해 앞으로 이동--}}
                                                </td>
                                            </tr>
                                            @endif
                                            <tr class="replyList willbes-Open-Table">
                                                <td>
                                                    {{$sub_row['SubjectName']}}
                                                </td>
                                                <td class="MoreBtn tx-center">></td>
                                            </tr>
                                            <tr class="willbes-Open-List">
                                                <td class="w-data tx-left" colspan="2">
                                        @endif
                                                    <div class="w-data-pkg">
                                                        <div class="w-info">
                                                            <span class="chk">
                                                                <label>[판매]</label>
                                                                <input type="checkbox" id="prod_code_sub_{{$sub_row['ProdCode']}}" name="prod_code_sub[]" value="{{$sub_row['ProdCode']}}" class="choSubGroup choSubGroup-{{$subGroupName_Re}}" onclick="checkOnly('.choSubGroup-{{$subGroupName_Re}}', this.value);" >
                                                            </span>
                                                            <span class="ml10 tx14">{{$sub_row['ProfNickName']}}</span>
                                                        </div>
                                                        <div class="w-tit">
                                                            {{ $sub_row['ProdName'] }}
                                                        </div>
                                                        <dl class="w-info tx-gray">
                                                            <dt><strong>수강형태</strong><span class="tx-blue">{{$sub_row['StudyPatternCcdName']}}</span>
                                                                <span class="NSK nBox n{{ substr($sub_row['AcceptStatusCcd'], -1) }}">{{ $sub_row['AcceptStatusCcdName'] }}</span>
                                                            </dt>
                                                            <dt><span class="tx-blue">{{$sub_row['StudyStartDate']}} ~  {{$sub_row['StudyEndDate']}} {{$sub_row['WeekArrayName']}} ({{$sub_row['Amount']}}회차)</span></dt>
                                                            <dt><a href="#none" class="lecView" onclick='InfoForm_sel_{{$sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode']}}'>강좌상세정보</a></dt>
                                                        </dl>
                                                    </div>
                                                    <div id="InfoForm_sel_{{$sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode']}}" class="willbes-Layer-Black NG">
                                                        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
                                                            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm_{{$sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode']}}')">
                                                                <img src="{{img_url('m/calendar/close.png') }}">
                                                            </a>
                                                            <h4> {{ $sub_row['ProdName'] }} </h4>
                                                            <div class="LecDetailBox">
                                                                <h5>강좌상세정보</h5>
                                                                <dl class="w-info tx-gray">
                                                                    <dt>수강기간 <br>
                                                                        <span class="tx-blue">{{str_replace('-', '.', $sub_row['StudyStartDate'])}} ~ {{str_replace('-', '.', $sub_row['StudyEndDate'])}}</span>
                                                                        <span class="tx-blue">{{$sub_row['WeekArrayName']}}</span> ({{$sub_row['WeekArrayName']}} 회차)</dt>
                                                                </dl>
                                                                @if(empty($sub_row['Content5']) != true)
                                                                    <h5>수강대상</h5>
                                                                    <div class="tx-dark-gray">
                                                                        {!! $sub_row['Content5'] !!}
                                                                    </div>
                                                                @endif
                                                                <h5>강좌소개</h5>
                                                                <div class="tx-dark-gray">
                                                                    {!! $sub_row['Content'] !!}
                                                                </div>
                                                                @if(empty($sub_row['Content6']) != true)
                                                                    <h5>강좌효과</h5>
                                                                    <div class="tx-dark-gray">
                                                                        {!! $sub_row['Content6'] !!}
                                                                    </div>
                                                                @endif
                                                                @if(empty($sub_row['Content7']) != true)
                                                                    <h5>수강후기</h5>
                                                                    <div class="tx-dark-gray">
                                                                        {!! $sub_row['Content7'] !!}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="dim" onclick="closeWin('InfoForm_sel_{{$sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode']}}')"></div>
                                                    </div>
                                            {{-- 위에서 닫기 처리
                                                </td>
                                            </tr>
                                            --}}
                                        @php
                                            $last_subGroupName = $sub_row['SubGroupName'].$sub_row['SubjectName']
                                        @endphp
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
                    </div>
                </div>

                <div class="lec-info NGR">
                    <h4 class="NGEB">종합반 상세정보</h4>
                    <div class="lec-info-pkg">
                        {!! $data['Content'] !!}
                    </div>
                </div>
                @php
                    $btn_count = 1;
                    if($data['StudyApplyCcd'] != '654002') {
                        $btn_count += 1;
                    }
                    if($data['StudyApplyCcd'] != '654001') {
                        $btn_count += 2;
                    }
                    switch ($btn_count) {
                        case 1 : $btn_css = 'w100p';break;
                        case 2 : $btn_css = 'w50p';break;
                        case 3 : $btn_css = '';break;
                        case 4 : $btn_css = 'w25p';break;
                        default : $btn_css = '';
                    }
                @endphp
                <div class="lec-btns {{$btn_css}}">
                    <ul>
                        <li><a href="#none" onClick='javascript:goListOffPack()' class="btn_black_line">강좌목록</a></li>
                        @if($data['StudyApplyCcd'] != '654002')
                            <li><a href="#none"  class="btn_gray" name="btn_off_visit_pay" data-direct-pay="N" >방문결제</a></li>
                        @endif
                        @if($data['StudyApplyCcd'] != '654001')
                            <li><a href="#none" name="btn_cart" data-direct-pay="N" class="btn-purple">장바구니</a></li>
                            <li><a href="#none" name="btn_direct_pay" data-direct-pay="Y" class="btn-purple-line">바로결제</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')

    </div>
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_off_form = $('#regi_off_form');
        $(document).ready(function() {
            {{--강좌상품 선택/해제--}}
            $regi_off_form.on('click', 'input[name="prod_code_sub[]"]', function() {
                if ($(this).is(':checked') === false) {
                    {{--연계도서상품 체크 해제--}}
                    $regi_off_form.find('input[name="prod_code[]"][data-parent-prod-code="' + $(this).val() + '"]').prop('checked', false);
                }
            });

            {{--교재상품 선택/해제--}}
            $regi_off_form.on('click', '.chk_books', function() {
                if ($(this).is(':checked') === true) {
                    if ($(this).hasClass('chk_books') === true) {
                        {{--수강생 교재 체크--}}
                        if (checkStudentBook($regi_off_form, $(this)) === false) {
                            return;
                        }
                    }
                }
                price_cal();
            });

            {{--장바구니, 바로결제 버튼 클릭--}}
            $('a[name="btn_off_visit_pay"], a[name="btn_cart"], a[name="btn_direct_pay"]').on('click', function() {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                @if($data["IsSalesAble"] !== 'Y')
                    alert("신청 할 수 없는 강좌입니다.");return;
                @endif

                // 필수강좌 체크 여부
                var groupArray = {!!json_encode($subGroup_array)!!};
                for(i=0; i<groupArray.length;i++) {
                    $checked = "";
                    $ess_checked_count = 0;
                    $(".lec-essential").find('.essSubGroup-'+groupArray[i]).each(function (){
                        if ($(this).is(':checked')) {
                            $checked = "Y";
                            $ess_checked_count += 1;
                        }
                    });
                    if($checked === "") {
                        alert("필수과목은 과목별 1개씩 선택하셔야 합니다.");
                        return;
                    }
                    if($ess_checked_count > 1) {
                        alert("필수과목은 과목별 1개씩 선택하셔야 합니다. 현재 2개 이상의 과목이 선택되었습니다.");
                        return;
                    }
                }

                {{-- 선택강좌 --}}
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

                if ($(this).prop('name').indexOf('visit') > -1) {
                    {{-- 방문결제 --}}
                    // 상품 체크
                    if (checkProduct($regi_off_form.find('input[name="learn_pattern"]').val(), $regi_off_form.find('input[name="prod_code[]"]').data('prod-code'), 'Y', $regi_off_form) === false) {
                        return;
                    }

                    if (confirm('방문접수를 신청하시겠습니까?')) {
                        $regi_off_form.find('input[name="cart_type"]').val(getCartType($regi_off_form));

                        var url = '{{ front_url('/order/visit/direct', true) }}';
                        ajaxSubmit($regi_off_form, url, function(ret) {
                            if(ret.ret_cd) {
                                alert(ret.ret_msg);
                                location.replace(ret.ret_data.ret_url);
                            }
                        }, showValidateError, null, false, 'alert');
                    }
                } else {
                    {{-- 장바구니/바로결제 --}}
                    var $is_direct_pay = $(this).data('direct-pay');
                    var $is_redirect = $(this).data('is-redirect');
                    cartNDirectPay($regi_off_form, $is_direct_pay, $is_redirect);
                }
            });

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
        });

        function goListOffPack(){
            location.href = frontPassUrl('/offPackage/?'+$('#url_form :input[name!=\'prod-code\']').serialize());
        }
    </script>
@stop