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
                        <td class="w-list tx-center">{{ $data['CourseName'] }}</td>
                        <td class="w-line"><span class="row-line">|</span></td>
                        <td class="pl30">
                            <div class="w-tit">
                                {{$data['ProdName']}}
                                <dl class="w-info">
                                    <dt class="NGR">
                                        <span class="acadBox n{{ substr($data['StudyApplyCcd'], -1) }}">{{$data['StudyApplyCcdName']}}</span>
                                    </dt>
                                </dl>
                            </div>
                            <dl class="w-info">
                                <dt>수강형태 : <span class="tx-blue">{{$data['StudyPatternCcdName']}}</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>접수기간 : <span class="tx-blue">{{ date('Y-m-d', strtotime($data['SaleStartDatm'])) }} ~ {{ date('Y-m-d', strtotime($data['SaleEndDatm'])) }}</span></dt>
                                <dt class="w-notice NGR ml15">
                                    <span class="acadInfo n{{ substr($data['AcceptStatusCcd'], -1) }}">{{$data['AcceptStatusCcdName']}}</span>
                                </dt>
                            </dl>
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
           }
        @endphp

        <!-- willbes-Package-Detail -->
            <form id="regi_off_form" name="regi_off_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
                <input type="hidden" name="learn_pattern" value="{{$learn_pattern}}"/>  {{-- 학습형태 --}}
                <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
                <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

                <div class="willbes-Lec-Package-Price p_re">
                    <div class="total-PriceBox NG">
                        <span class="price-tit">총 주문금액</span>
                        <span class="row-line">|</span>
                        <span>
                            <span class="price-txt">종합반</span>
                            <span class="tx-dark-gray">{{ number_format($sale_price, 0) }}원</span>
                            <span class="tx-pink pl10">(↓{{$sale_info}})</span>
                            <span class="pl10"> ▶ </span>
                            <span class="tx-light-blue pl10">{{ number_format($real_sale_price,0)}}원</span>
                        </span>
                        <span class="price-total tx-light-blue">{{ number_format($real_sale_price,0)}}원</span>
                    </div>
                    <input type="checkbox" name="prod_code[]" class="chk_products d_none" checked="checked" value="{{ $data['ProdCode'] . ':' . $sale_type_ccd . ':' . $data['ProdCode'] }}" data-prod-code="{{$data['ProdCode']}}" data-parent-prod-code="{{$data['ProdCode']}}" data-group-prod-code="{{$data['ProdCode']}}" data-sale-price="{{$real_sale_price}}"/>
                    <input type="hidden" name="sale_status_ccd" id="sale_status_ccd" value="{{$data['SaleStatusCcd']}}">
                    <div class="willbes-Lec-buyBtn">
                        <ul>
                            @if($data['StudyApplyCcd'] != '654002')
                                <li class="btnAuto180 h36">
                                    <button type="button" name="btn_visit_pay" data-direct-pay="Y" data-is-redirect="Y" class="mem-Btn bg-blue bd-dark-blue">
                                        <span>방문결제</span>
                                    </button>
                                </li>
                            @endif
                            @if($data['StudyApplyCcd'] != '654001')
                                <li class="btnAuto180 h36">
                                    <button type="submit" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="mem-Btn bg-white bd-dark-blue">
                                        <span class="tx-light-blue">바로결제</span>
                                    </button>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- willbes-Lec-Package-Price -->

                <div class="willbes-Lec NG c_both">
                    <div class="willbes-Lec-Subject tx-dark-black">강좌구성 및 교재선택</div>
                    <!-- willbes-Lec-Subject -->

                    <div class="willbes-Lec-Line">-</div>
                    <!-- willbes-Lec-Line -->

                    <div class="willbes-Buy-List willbes-Buy-PackageList bd-none">
                        <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                            <colgroup>
                                <col style="width: 760px;">
                                <col style="width: 200px;">
                            </colgroup>
                            <tbody>
                            <tr class="w-info">
                                <td class="w-lectit tx-left" colspan="2">
                                    <dl>
                                        <dt class="NGR">
                                            <span class="acadBox n{{ substr($data['AcceptStatusCcd'], -1) }} mr15">{{$data['AcceptStatusCcdName']}}</span>
                                        </dt>
                                    </dl>
                                    <span class="MoreBtn"><a href="#Info">종합반정보 보기 ▼</a></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="w-tit">{{$data['ProdName']}}</div>
                                </td>
                                <td class="w-notice p_re">
                                    <div class="priceWrap">
                                        <span class="price tx-blue">{{ number_format($real_sale_price,0)}}</span>
                                        <span class="discount">(↓{{$sale_info}})</span>
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
                            · 필수과목
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
                        @endphp


                        @foreach($data_sublist as $idx => $sub_row /*필수 과목*/)
                            @if($sub_row['IsEssential'] === 'Y')
                                @php
                                    //$subGroup_array[] = $sub_row['SubGroupName'];
                                    $subGroupName_Re = strlen($sub_row['SubGroupName']) == 1 ? "0".$sub_row['SubGroupName'] : $sub_row['SubGroupName'];
                                    $subGroup_array[] = $subGroupName_Re;
                                @endphp
                                <tr>
                                    <td class="w-list tx-center bg-light-gray row_td">{{$sub_row['SubjectName']}}<div class="{{$subGroupName_Re}} d_none">{{$subGroupName_Re}}</div></td>
                                    <td class="bdb-dark-gray">
                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                                <colgroup>
                                                    <col style="width: 50px;">
                                                    <col style="width: 60px;">
                                                    <col style="width: 555px;">
                                                    <col style="width: 200px;">
                                                </colgroup>
                                                <tbody>
                                                <tr>
                                                    @php
                                                        $prof_img = json_decode($sub_row['ProfReferData'],true)
                                                    @endphp
                                                    <td class="w-chk"><input type="checkbox" id="prod_code_sub_{{$sub_row['ProdCode']}}" name="prod_code_sub[]" value="{{$sub_row['ProdCode']}}" class="essSubGroup-{{$subGroupName_Re}}" onclick="checkOnly('.essSubGroup-{{$subGroupName_Re}}', this.value);" checked></td>
                                                    <td class="w-img"><img src="{{$prof_img['lec_list_img'] or  ''}}"></td>
                                                    <td class="w-data tx-left pl25">
                                                        <dl class="w-info">
                                                            <dt class="w-name">{{$sub_row['ProfNickName']}}</dt>
                                                            <dt><span class="row-line">|</span></dt>
                                                            <dt class="w-tit">{{ $sub_row['ProdName'] }}</dt>
                                                        </dl>
                                                        <dl class="w-info">
                                                            <dt class="mr20">
                                                                <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm_{{$sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode']}}')">
                                                                    <strong>강좌상세정보</strong>
                                                                </a>
                                                            </dt>
                                                            <dt>수강형태 : <span class="tx-blue">{{$sub_row['StudyPatternCcdName']}}</span></dt>
                                                            <dt class="w-notice ml15">
                                                                <span class="acadInfo n{{ substr($sub_row['AcceptStatusCcd'], -1) }}">{{$sub_row['AcceptStatusCcdName']}}</span>
                                                            </dt>
                                                        </dl>
                                                        @php
                                                            $id = $sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode'];
                                                            $date = $sub_row['StudyStartDate'].' ~ '. $sub_row['StudyEndDate'];
                                                            lecture_info_layer($id ,$sub_row['ProdName'] ,$date,$sub_row['WeekArrayName'] ,$sub_row['Amount'] ,$sub_row['Content'],$sub_row['Content5'],$sub_row['Content6'],$sub_row['Content7']);
                                                        @endphp

                                                    </td>
                                                    <td class="w-schedule">
                                                        <span class="tx-blue">{{$sub_row['StudyStartDate']}} ~  {{$sub_row['StudyEndDate']}}</span><br/>
                                                        {{$sub_row['WeekArrayName']}} ({{$sub_row['Amount']}}회차)
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->
                                        </div>
                                        <!-- willbes-Lec-Table -->
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        @php
                            if(empty($subGroup_array) === false) {
                                $subGroup_array = array_values(array_unique($subGroup_array));
                            }
                        @endphp

                        </tbody>
                    </table>

                    <div class="TopBtn">
                        <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                    </div>

                    <!-- pos2 -->
                    <div id="pos2" class="pt35 mt10">
                        <div class="willbes-Lec-Subject willbes-Lec-Tit-select NG tx-black p_re">
                            <a id="Choose" name="Choose" class="sticky-top" style="top: 10px;"></a>
                            · 선택과목<span class="willbes-Lec-subTit">(전체 선택과목 중  {{$data['PackSelCount']}}개를 선택해 주세요.)</span>
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
                                        //$subGroup_cho_array[] = $sub_row['SubGroupName'];
                                        $subGroupName_Re = strlen($sub_row['SubGroupName']) == 1 ? "0".$sub_row['SubGroupName'] : $sub_row['SubGroupName'];
                                        $subGroup_array[] = $subGroupName_Re;
                                    @endphp
                                    <tr>
                                        <td class="w-list tx-center bg-light-gray row_td2">{{$sub_row['SubjectName']}}<div class="{{$subGroupName_Re}} d_none">{{$subGroupName_Re}}</div></td>
                                        <td class="bdb-dark-gray">
                                            <div class="willbes-Lec-Table">
                                                <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                                    <colgroup>
                                                        <col style="width: 50px;">
                                                        <col style="width: 60px;">
                                                        <col style="width: 555px;">
                                                        <col style="width: 200px;">
                                                    </colgroup>
                                                    <tbody>
                                                    <tr>
                                                        @php
                                                            $prof_img = json_decode($sub_row['ProfReferData'],true)
                                                        @endphp
                                                        <td class="w-chk"><input type="checkbox" id="prod_code_sub_{{$sub_row['ProdCode']}}" name="prod_code_sub[]" value="{{$sub_row['ProdCode']}}" class="choSubGroup choSubGroup-{{$subGroupName_Re}}" onclick="checkOnly('.choSubGroup-{{$subGroupName_Re}}', this.value);" ></td>
                                                        <td class="w-img"><img src="{{$prof_img['lec_list_img'] or  ''}}"></td>
                                                        <td class="w-data tx-left pl25">
                                                            <dl class="w-info">
                                                                <dt class="w-name">{{$sub_row['ProfNickName']}}</dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt class="w-tit">{{ $sub_row['ProdName'] }}</dt>
                                                            </dl>
                                                            <dl class="w-info">
                                                                <dt class="mr20">
                                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm_sel_{{$sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode']}}')">
                                                                        <strong>강좌상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt>수강형태 : <span class="tx-blue">{{$sub_row['StudyPatternCcdName']}}</span></dt>
                                                                <dt class="w-notice ml15">
                                                                    <span class="acadInfo n{{ substr($sub_row['AcceptStatusCcd'], -1) }}">{{$sub_row['AcceptStatusCcdName']}}</span>
                                                                </dt>
                                                            </dl>
                                                            <!-- willbes-Layer-Box -->
                                                            @php
                                                                $id = 'sel_'.$sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode'];
                                                                $date = $sub_row['StudyStartDate'].' ~ '. $sub_row['StudyEndDate'];
                                                                lecture_info_layer($id ,$sub_row['ProdName'] ,$date,$sub_row['WeekArrayName'] ,$sub_row['Amount'] ,$sub_row['Content'],$sub_row['Content5'],$sub_row['Content6'],$sub_row['Content7']);
                                                            @endphp
                                                        </td>
                                                        <td class="w-schedule">
                                                            <span class="tx-blue">{{$sub_row['StudyStartDate']}} ~  {{$sub_row['StudyEndDate']}}</span><br/>
                                                            {{$sub_row['WeekArrayName']}} ({{$sub_row['Amount']}}회차)
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- lecTable -->
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

                    <div class="TopBtn">
                        <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                    </div>

                    <a name="Info"></a>
                    <div class="willbes-Class c_both">
                        <div class="willbes-Lec-Tit NG tx-black">종합반상세정보</div>
                        <div class="classInfoTable GM">
                            <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 140px;">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="w-list bg-light-white">종합반상세정보</td>
                                    <td class="w-data tx-left pl25">
                                        {!! $data['Content'] !!}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- willbes-Class -->

                    <div class="TopBtn">
                        <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                    </div>

                </div>
                <!-- willbes-Lec -->
            </form>

        </div>
        {!! banner('수강신청_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
    <!-- End Container -->

    @php
        /*
        하위 강좌정보 레이어 팝업용
        */
        function lecture_info_layer($id='', $prod_name='', $date='', $weekname='', $amount='', $content='', $content5='',$content6='',$content7='')
        {
                $show_info = '
                <div id="InfoForm_'.$id.'" class="willbes-Layer-Box d3">
                    <a class="closeBtn" href="#none" onclick="closeWin(\'InfoForm_'.$id.'\')">
                        <img src="'. img_url('sub/close.png') .'">
                    </a>
                    <div class="Layer-Tit tx-dark-black NG">
                        '.$prod_name.'
                    </div>
                    <div class="lecDetailWrap">
                        <div class="classInfo">
                            <dl class="w-info NG">
                                <dt>수강기간 : <span class="tx-blue">'.$date.'</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt><span class="tx-blue">'.$weekname.' ('.$amount.' 회차)</span></dt>
                            </dl>
                        </div>
                        <div class="classInfoTable">
                            <table cellspacing="0" cellpadding="0" class="classTable under-black tx-gray">
                                <colgroup>
                                    <col style="width: 140px;">
                                    <col width="*">
                                </colgroup>
                                <tbody>';

                    if(empty($content5) != true) {
                        $show_info.= '<tr>
                                                <td class="w-list bg-light-white">수강대상</td>
                                                <td class="w-data tx-left pl25">
                                                    '. $content5 .'
                                                </td>
                                            </tr>
                                    ';
                    }
                                    $show_info.= '<tr>
                                                <td class="w-list bg-light-white">강좌소개<Br>(강좌구성)</td>
                                                <td class="w-data tx-left pl25">
                                                    '. $content .'
                                                </td>
                                            </tr>
                                    ';
                if(empty($content6) != true) {
                        $show_info.= '<tr>
                                                <td class="w-list bg-light-white">강좌효과</td>
                                                <td class="w-data tx-left pl25">
                                                    '. $content6 .'
                                                </td>
                                            </tr>
                                    ';
                    }

                if(empty($content7) != true) {
                    $show_info.= '<tr>
                                            <td class="w-list bg-light-white">수강후기</td>
                                            <td class="w-data tx-left pl25">
                                                '. $content7 .'
                                            </td>
                                        </tr>
                                ';
                }

                $show_info.= '
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                ';
            echo $show_info;
        }
    @endphp

    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        var $regi_off_form = $('#regi_off_form');
        $(document).ready(function() {

            // 방문접수, 바로결제 버튼 클릭
            $('button[name="btn_visit_pay"], button[name="btn_direct_pay"]').on('click', function() {

                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                @if($data["IsSalesAble"] !== 'Y')
                alert("신청 할 수 없는 강좌입니다.");return;
                        @endif

                        {{--필수강좌 체크 여부--}}
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

                {{--선택강좌--}}
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
                    $regi_off_form.find('input[name="cart_type"]').val(getCartType($regi_off_form));

                    if (confirm('방문접수를 신청하시겠습니까?')) {
                        var url = '{{ front_url('/order/visit/direct', true) }}';
                        ajaxSubmit($regi_off_form, url, function(ret) {
                            if(ret.ret_cd) {
                                alert(ret.ret_msg);
                                location.replace(ret.ret_data.ret_url);
                            }
                        }, showValidateError, null, false, 'alert');
                    }
                } else {
                            {{-- 바로결제 --}}
                    var $is_direct_pay = $(this).data('direct-pay');
                    var $is_redirect = $(this).data('is-redirect');
                    cartNDirectPay($regi_off_form, $is_direct_pay, $is_redirect);
                }
            });

            setRowspan('row_td');
            setRowspan('row_td2');

                    {{--같은 그룹내 2개이상의 강의 일 경우 체크박스 해제--}}
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
    </script>
    <!-- End Container -->

@stop