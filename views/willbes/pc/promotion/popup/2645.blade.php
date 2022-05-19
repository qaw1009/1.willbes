@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    span {vertical-align:auto}
    .evt_table {width:100%; margin:0 auto; padding:10px; text-align:center; font-size:14px; line-height:1.3}
    .evt_table table{width:100%;border-top:1px solid #e9e9e9;}
    .evt_table table tr {border-bottom:1px solid #e9e9e9}
    .evt_table table th,
    .evt_table table td {margin:10px 0; color:#666}
    .evt_table table th {background:#f9f9f9; color:#000;}
    .evt_table thead th {background:#d9d9d9; color:#000; font-size:20px; font-weight:bold; padding:15px; border:1px solid #000}
    .evt_table table td{text-align:left; padding:10px}
    .evt_table label {margin-right:10px; line-height:28px;}
    .evt_table input {vertical-align:middle}
    .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:80%; margin-bottom:5px}
    .evt_table td input[type=text]:last-child {margin-bottom:0}
    .evt_table input[type=checkbox] {height:20px; width:20px}
    .evt_table td li {display:inline-block; float:left; width:50%; margin-bottom:10px}

    .evt_table .btns {margin:30px auto}
    .evt_table .btns a {display:inline-block; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#42425b; margin:0 10px; border-radius:40px; padding:0 50px}
    .evt_table .btns a:hover {background:#fe544a}

    .evt_table .mapWrap {border-top:1px solid #ccc; margin-top:30px; padding-top:20px; text-align:left}
    .evt_table .map {margin-top:20px}
    .evt_table .mapWrap li {list-style-type:decimal;margin-left:20px; margin-bottom:5px}
    .evt_table .mapWrap h5 {font-size:16px; margin-bottom:10px;}
    .evt_table .map {display:flex;}
    .evt_table .map > div {margin-left:10px;}
    .evt_table .map img {width:45%; height:auto}
    @@page {size:21cm 29.7cm; margin:15px; border:1px solid #000}
    @@media print {
        .evt_table {font-size:12px;}
        .evt_table thead th {font-size:26px;}       
        .evt_table .map > div {font-size:11px}
        .evt_table .map h5 {font-size:12px;}
        .evt_table .btns {display:none}
        .evt_table .map img {max-width:500px}
    }
</style>

@php
    $_arr_product = [
        'type1' => [
            ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194830' : '159829' => [
                'prof_name' => '이경범'
                ,'subject_name' => '교육학'
            ]
            ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194829' : '159830' => [
                'prof_name' => '신태식'
                ,'subject_name' => '교육학'
            ]
            ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194828' : '159831' => [
                'prof_name' => '정현'
                ,'subject_name' => '교육학'
            ]
        ]
        ,'type2' => [
            ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194783' : '159832' => [
                'prof_name' => '송원영/권보민'
                ,'subject_name' => '국어'
            ]
            ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194784' : '159833' => [
                'prof_name' => '구동언'
                ,'subject_name' => '국어'
            ]
            ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194785' : '159834' => [
                'prof_name' => '김철홍/박태영'
                ,'subject_name' => '수학'
            ]
            ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194786' : '159835' => [
                'prof_name' => '김현웅/박혜향'
                ,'subject_name' => '수학'
            ]
            ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194787' : '_159836' => [
                'prof_name' => '김병찬'
                ,'subject_name' => '도덕/윤리'
            ]
            ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194788' : '_159837' => [
                'prof_name' => '김민응'
                ,'subject_name' => '도덕/윤리'
            ]
            ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194789' : '_159838' => [
                'prof_name' => '허역/정인홍/이웅재/김현중'
                ,'subject_name' => '일반사회'
            ]
            ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194790' : '_159839' => [
                'prof_name' => '김종권'
                ,'subject_name' => '역사'
            ]
            ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194791' : '_159840' => [
                'prof_name' => '다이애나'
                ,'subject_name' => '음악'
            ]
            ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194792' : '_159841' => [
                'prof_name' => '최우영'
                ,'subject_name' => '전기'
            ]
            ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194793' : '_159842' => [
                'prof_name' => '최우영'
                ,'subject_name' => '전자'
            ]
            ,ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '194794' : '_159843' => [
                'prof_name' => '장영희'
                ,'subject_name' => '중국어'
            ]
        ]
    ];

    $params_d_day_strtotime = strtotime($arr_promotion_params['d_day']);
    $order_product_list = array_pluck($arr_base['order_product'], 'OrderProdIdx', 'ProdCode');
    $search_key_type1 = array_intersect(array_keys($order_product_list), array_keys($_arr_product['type1']));
    $search_key_type2 = array_intersect(array_keys($order_product_list), array_keys($_arr_product['type2']));
    $arr_result_1 = (empty($_arr_product['type1'][array_value_first($search_key_type1)]) === false ? $_arr_product['type1'][array_value_first($search_key_type1)] : null);
    $arr_result_2 = (empty($_arr_product['type2'][array_value_first($search_key_type2)]) === false ? $_arr_product['type2'][array_value_first($search_key_type2)] : null);
@endphp

<div class="evt_table NSK" id="layer_print">
    <table cellspacing="2" cellpadding="2">
        <col width="12%" />
        <col/>
        <col width="12%" />
        <col />
        <thead>
            <tr>
                <th colspan="4">2023학년도 중등임용 시험대비 Real 모의고사 응시표</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>시험주관</th>
                <td colspan="3">윌비스 임용</td>
            </tr>
            <tr>
                <th>응시과목</th>
                <td>{{ $arr_result_2['subject_name'] }}</td>
                <th>출제 교수진</th>
                <td>{{ $arr_result_1['prof_name'] . ' 교수, ' . $arr_result_2['prof_name'] . ' 교수' }}</td>
            </tr>
            <tr>
                <th>수험번호</th>
                <td colspan="3">
                    @if (empty($arr_base['regist_member']) === false && $arr_promotion_params['d_day'] <= date('YmdHis'))
                        {{ $arr_base['regist_member']['EtcValue'] }}
                    @else
                        {{ '('.date('n', $params_d_day_strtotime) . '월'
                            . date('j', $params_d_day_strtotime) . '일'
                            . '(' . $arr_base['yoil'][date('w', $params_d_day_strtotime)] . ') '
                            . date('H', $params_d_day_strtotime) . ':'
                            . date('i', $params_d_day_strtotime) . ' 부터 확인 가능)' }}
                    @endif
                </td>
            </tr>
            <tr>
                <th>성명</th>
                <td>{{sess_data('mem_name')}}</td>
                <th>연락처</th>
                <td>{{ substr(sess_data('mem_phone'),0,3).'-'.substr(sess_data('mem_phone'),3,4) . '-'.substr(sess_data('mem_phone'),7,4) }}</td>
            </tr>
            <tr>
                <th>접수일자</th>
                <td>{{ date('Y.m.d H:i', strtotime($arr_base['order_product'][0]['OrderDatm'])) }}</td>
                <th>생년월일</th>
                <td>
                    {{  substr($arr_base['member_info']['BirthDay'],0,4) . '.'
                        . substr($arr_base['member_info']['BirthDay'],4,2) . '.'
                        . substr($arr_base['member_info']['BirthDay'],6,2) }}
                </td>
            </tr>
        </tbody>
    </table>
    <div class="mt40">2022. 06. 12</div>
    <div class="mt30"><img src="https://static.willbes.net/public/images/promotion/2022/05/stamp.png" alt=""/></div>
    <div class="mapWrap">
        <div>
            <h5>📌 유의사항</h5>
            <ul>
                <li>윌비스 임용에서 시행하는 Real모의고사는 용산에 위치한 “용산철도고등학교＂입니다.</li>
                <li>모의고사장 입실시간은 08:30까지 입니다. <br>
                - 매 교시 시험 시작 후에는 입실이 금지됩니다.</li>
                <li>시험이 시작되면, 종료 시까지 고사장에서 퇴장할 수 없으며, 화장실 등 불가피한 사정으로 퇴실할 경우에도 재입실이 불가합니다.</li>
                <li>시험 응시에 필요한 준비물은 수험표, 신분증, 필기도구, (아날로그)손목시계 입니다. <br>
                    * 수험표와 신분증 미소지 시, 시험에 응시할 수 없습니다. </li>
            </ul>          
        </div>
        <div class="map">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2645_map.jpg" alt=""/>
            <div>
                <h5>📌 시험장 오시는 길</h5>
                🚇지하철 1호선 및 경의중앙선 용산역 1번출구 도보 15분<br>
                🚇지하철 4호선 신용산역 2번출구 도보 15분<br>
                🚇지하철 4호선 및 경의중앙선 이촌역 5번출구 도보 15분 <br>
                <br>
                🚍간선버스 한강대교북단, 신용산역 100, 150, 151, 152, 500, 501, 504, 506, 507, 605, 750A, 750B, 751, 751, N15 도보 10분<br>
                🚍간선버스 용산철도고등학교 400, 502 도보 5분 <br>
                🚍지선버스 한강대교북단 0017 도보 10분                 
            </div>
        </div>
    </div>
    <div class="btns">
        <a href="javascript:void(0);" onclick="printPage();">출력하기</a>
    </div>
</div>

<script type="text/javascript">
    function printPage() {
        window.onbeforeprint = function(){
            $(".btns").hide();
        };
        window.onafterprint = function(){
            $(".btns").show();
        };
        window.print();
    }
</script>
@stop