@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>
        <div class="mem-Tit mem-Acad-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">학원 방문결제 접수</span>
        </div>
        <div class="widthAuto">
            <div class="willbes-Package-Detail NG tx-black">
                <table cellspacing="0" cellpadding="0" class="packageDetailTable">
                    <colgroup>
                        <col style="width: 135px;"/>
                        <col style="width: 1px;"/>
                        <col style="width: 984px;"/>
                    </colgroup>
                    <tbody>
                    <tr>
                        <td class="w-list tx-center">{{ $data['CourseName'] }}</td>
                        <td class="w-line"><span class="row-line">|</span></td>
                        <td class="pl30">
                            <div class="w-tit">
                                {{$data['ProdName']}}
                                <dl class="w-info">
                                    <dt class="NSK">
                                        <span class="acadBox n{{ substr($data['StudyApplyCcd'], -1) }}">{{$data['StudyApplyCcdName']}}</span>
                                    </dt>
                                </dl>
                            </div>
                            <dl class="w-info">
                                <dt>종합반유형 : <span class="tx-blue">선택형종합반</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>선택과목개수 : <span class="tx-blue">{{$data['PackSelCount']}}개</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강형태 : <span class="tx-blue">{{$data['StudyPatternCcdName']}}</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>접수기간 : <span class="tx-blue">{{ date('Y-m-d', strtotime($data['SaleStartDatm'])) }} ~ {{ date('Y-m-d', strtotime($data['SaleEndDatm'])) }}</span></dt>
                                <dt class="w-notice NSK ml15">
                                    <span class="acadInfo n{{ substr($data['AcceptStatusCcd'], -1) }}">{{$data['AcceptStatusCcdName']}}</span>
                                </dt>
                            </dl>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- willbes-Package-Detail -->

@php
    if(empty($data['ProdPriceData'] ) === false) {
        $sale_type_ccd = $data['ProdPriceData'][0]['SaleTypeCcd'];
        $sale_price = $data['ProdPriceData'][0]['SalePrice'];
        $real_sale_price = $data['ProdPriceData'][0]['RealSalePrice'];
        $sale_info = $data['ProdPriceData'][0]['SaleRate'] . $data['ProdPriceData'][0]['SaleRateUnit'];
   }
@endphp
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
                    <div class="willbes-Lec-buyBtn">
                        <ul>
                            <li class="btnAuto180 h36">
                                <button type="submit" name="btn_basket"  class="mem-Btn bg-white bd-dark-blue">
                                    <span class="tx-light-blue">장바구니</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <input type="checkbox" name="prod_code[]" class="chk_products d_none" checked="checked" value="{{ $data['ProdCode'] . ':' . $sale_type_ccd . ':' . $data['ProdCode'] }}" data-prod-code="{{$data['ProdCode']}}" data-parent-prod-code="{{$data['ProdCode']}}" data-group-prod-code="{{$data['ProdCode']}}" data-sale-price="{{$real_sale_price}}"/>
                <input type="hidden" name="sale_status_ccd" id="sale_status_ccd" value="{{$data['SaleStatusCcd']}}">
                <!-- willbes-Lec-Package-Price -->

                <div class="Content widthAuto810 p_re">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black" style="padding-top: 0; line-height: inherit">강좌구성 및 교재선택</div>
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
                                            <dt class="NSK">
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
                                            <span class="price tx-blue">{{ number_format($real_sale_price,0)}}원</span>
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
                            <div class="sticky-menu select-menu NG">
                                <ul class="tabWrap">
                                    <li><a onclick="fnMove('1')" href="#Required">필수과목 ▼</a></li>
                                    <li><a onclick="fnMove('2')" href="#Choose">선택과목 ▼</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- sticky-menu -->

                        <!-- pos1 -->
                        <div id="pos1" class="pt35">
                            <div class="willbes-Lec-Subject willbes-Lec-Tit-select NG tx-black">· 필수과목</div>
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
                                        $subGroup_array[] = $sub_row['SubGroupName'];
                                    @endphp
                                        <tr>
                                            <td class="w-list tx-center bg-light-gray row_td" >{{$sub_row['SubjectName']}}<div class="{{$sub_row['SubGroupName']}} d_none">{{$sub_row['SubGroupName']}}</div></td>
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
                                                            <td class="w-chk"><input type="checkbox" id="prod_code_sub_{{$sub_row['ProdCode']}}" name="prod_code_sub[]" value="{{$sub_row['ProdCode']}}" class="essSubGroup-{{$sub_row['SubGroupName']}}" onclick="checkOnly('.essSubGroup-{{$sub_row['SubGroupName']}}', this.value);"></td>
                                                            <td class="w-img"><img src="{{$sub_row['ProfReferData']['lec_list_img'] or '' }}"></td>
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
                                                                    <dt class="w-notice NSK ml15">
                                                                        <span class="acadInfo n{{ substr($sub_row['AcceptStatusCcd'], -1) }}">{{$sub_row['AcceptStatusCcdName']}}</span>
                                                                    </dt>
                                                                </dl>
                                                                @php
                                                                    $id = $sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode'];
                                                                    $date = $sub_row['StudyStartDate'].' ~ '. $sub_row['StudyEndDate'];
                                                                    lecture_info_layer($id ,$sub_row['ProdName'] ,$date,$sub_row['WeekArrayName'] ,$sub_row['Amount'] ,$sub_row['Content']);
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
                            <div class="willbes-Lec-Subject willbes-Lec-Tit-select NG tx-black">
                                · 선택과목<span class="willbes-Lec-subTit">(전체 선택과목 중 {{$data['PackSelCount']}}개를 선택해 주세요.)</span>
                            </div>
                        </div>
                        <table cellspacing="0" cellpadding="0" class="lecWrapTable lec-choice">
                            <colgroup>
                                <col style="width: 75px;">
                                <col style="width: 865px;">
                            </colgroup>
                            <tbody>
                            @foreach($data_sublist as $idx => $sub_row /*선택 과목*/)
                                @if($sub_row['IsEssential'] === 'N')
                                    <tr>
                                        <td class="w-list tx-center bg-light-gray row_td2">{{$sub_row['SubjectName']}}<div class="{{$sub_row['SubGroupName']}} d_none">{{$sub_row['SubGroupName']}}</td>
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
                                                        <td class="w-chk"><input type="checkbox" id="prod_code_sub_{{$sub_row['ProdCode']}}" name="prod_code_sub[]" value="{{$sub_row['ProdCode']}}" class="choSubGroup"></td>
                                                        <td class="w-img"><img src="{{$sub_row['ProfReferData']['lec_list_img'] or '' }}"></td>
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
                                                                <dt class="w-notice NSK ml15">
                                                                    <span class="acadInfo n{{ substr($sub_row['AcceptStatusCcd'], -1) }}">{{$sub_row['AcceptStatusCcdName']}}</span>
                                                                </dt>
                                                            </dl>
                                                            @php
                                                                $id = 'sel_'.$sub_row['Parent_ProdCode'].'-'.$sub_row['ProdCode'];
                                                                $date = $sub_row['StudyStartDate'].' ~ '. $sub_row['StudyEndDate'];
                                                                lecture_info_layer($id ,$sub_row['ProdName'] ,$date,$sub_row['WeekArrayName'] ,$sub_row['Amount'] ,$sub_row['Content']);
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

                            </tbody>
                        </table>
                        <!-- pos2 -->

                        <div class="TopBtn">
                            <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                        </div>

                    </div>
                    <!-- willbes-Lec -->
                </div>
            </form>
            {{-- footer script --}}
            @include('willbes.pc.site.off_visit.only_footer_partial')
        </div>
    </div>


    @php
        /*
        하위 강좌정보 레이어 팝업용
        */
        function lecture_info_layer($id='', $prod_name='', $date='', $weekname='', $amount='', $content='')
        {
                $show_info = '
                <div id="InfoForm_'.$id.'" class="willbes-Layer-Box willbes-offLine-Layer-Box d3">
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
                                <tbody>
                                <tr>
                                    <td class="w-list bg-light-white">강좌정보</td>
                                    <td class="w-data tx-left pl25">
                                        '. $content .'
                                    </td>
                                </tr>
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
            $('button[name="btn_basket"]').on('click', function() {

                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                @if($data["IsSalesAble"] !== 'Y')
                alert("신청 할 수 없는 강좌입니다.");return;
                @endif

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
                        alert("필수과목은 과목별 1개씩 선택하셔야 합니다.");
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

                $is_direct_pay = 'N';
                $is_redirect = 'N';
                $result = cartNDirectPay($regi_off_form, $is_direct_pay, $is_redirect);
                {{--장바구니 목록 가져오기--}}
                if($result === true) {
                    cartList();
                }

            });

            setRowspan('row_td');
            setRowspan('row_td2');

        });
    </script>
    <!-- End Container -->
@stop