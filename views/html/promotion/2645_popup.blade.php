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
    .evt_table thead th {background:#d9d9d9; color:#000; font-size:24px; font-weight:bold; padding:20px; border:1px solid #000}
    .evt_table table td{text-align:left; padding:15px}
    .evt_table label {margin-right:10px; line-height:28px;}
    .evt_table input {vertical-align:middle}
    .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:80%; margin-bottom:5px}
    .evt_table td input[type=text]:last-child {margin-bottom:0}
    .evt_table input[type=checkbox] {height:20px; width:20px}
    .evt_table td li {display:inline-block; float:left; width:50%; margin-bottom:10px}

    .evt_table .btns {margin-top:40px}
    .evt_table .btns a {display:inline-block; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#42425b; margin:0 10px; border-radius:40px; padding:0 50px}
    .evt_table .btns a:hover {background:#fe544a}

    .evt_table .map {border-top:1px solid #ccc; margin-top:50px; padding:50px 0; }
    .evt_table .map li {list-style-type:decimal;margin-left:20px; margin-bottom:10px}
    .evt_table .map > div {text-align:left}
    .evt_table .map h5 {font-size:18px; margin-bottom:10px; margin-top:30px}
    .evt_table .map img {width:500px; height:500px}
    @@media print {
        .evt_table {font-size:20px;}
        .evt_table thead th {font-size:30px;}
        .evt_table .map { display:flex;}
        .evt_table .map > div {margin-left:20px;}
        .evt_table .map h5 {font-size:26px;}
        .evt_table .map h5:nth-child(1) {margin-top:0}
    }
</style>

<form id="" name="" method="post"  action="">
    <div class="evt_table NSK">
        <div class="tx-blue tx-left mb10">※  접수 완료하였습니다. </div>
        <table cellspacing="2" cellpadding="2">
            <col width="15%" />
            <col/>
            <col width="15%" />
            <col />
            <thead>
                <tr>
                    <th colspan="4">교원임용 Real 모의고사 접수 현황</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>시험명</th>
                    <td colspan="3">2023학년도 대비 중등임용 Real 모의고사 (주관: 윌비스 임용)</td>
                </tr>
                <tr>
                    <th>응시과목</th>
                    <td>국어</td>
                    <th>출제 교수진</th>
                    <td>이경범 교수, 송원영/권보민 교수</td>
                </tr>
                <tr>
                    <th>수험번호</th>
                    <td colspan="3">(6월7일(화) 11:00 부터 확인 가능)</td>
                </tr>
                <tr>
                    <th>성명</th>
                    <td>홍길동</td>
                    <th>연락처</th>
                    <td>010-1234-5678</td>
                </tr>
                <tr>
                    <th>접수일자</th>
                    <td>2022.04.25 15:30</td>
                    <th>생년월일</th>
                    <td>1995.03.01</td>
                </tr> 
            </tbody>
        </table>
        <div class="mt50">2022. 06. 12</div>
        <div class="mt30">위와 같이 접수하고, 교원임용 Real 모의고사에 응시하고자 합니다.</div>
        <div class="mt50"><img src="https://static.willbes.net/public/images/promotion/2022/05/stamp.png" alt=""/></div>
        <div class="map">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2645_map.jpg" alt=""/>
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

        <div class="btns">
            <a href="#none">출력하기</a>
        </div>

    </div>
</form>

@stop