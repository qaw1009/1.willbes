<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <link href="/public/css/willbes/basic.css?ver={{time()}}" rel="stylesheet">
    <link href="/public/css/willbes/style.css?ver={{time()}}" rel="stylesheet">
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;            
            overflow-x: hidden;           
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .page {
            width: 770px;  
            margin:15px;        
        }
        .page h3 {
            font-size:120%;
            border-bottom:2px solid #000;
            padding-bottom:15px;
        }
        .page a {
            color:#2fb2f1;
            padding: 5px 10px;
            border:1px solid #adadad;
            font-size:80%;
            float:right;
        }
        .page .smSub {
            padding:30px 0 20px; 
            font-size:110%;
        }
        .page table {
            border-top:1px solid #959595;
        }
        .page table th {
            background:#f9f9f9; 
            color:#707070;
        }
        .page table th,
        .page table td {
            padding:15px;
            border-right:1px solid #edeeef;
        }
        .page table th:last-child,
        .page table td:last-child {
            border-right:0;
        }
        .page table tr {
            border-bottom:1px solid #edeeef;
        }
        .page .tdCenter td {
            text-align:center;
        }
        @@page {
            size: A4 landscape;
            margin: 0;            
            size: landscape;
        }
        @@media print {
            body {
                font-size: 12pt !important;
                width: 21cm;
                min-height: 29.7cm;
                padding: 2cm;
                margin: 1cm auto;
                border-radius: 5px;
                background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: 100%;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;                
            }  
        
        }
    </style>
</head>
<body>
<div class="page NG">
    <h3>수강확인증 출력</h3>
    <div class="smSub">· 수강확인증 <a href="#none" onclick="fnPrint(this);">인쇄하기</a></div>
    <div>
        <table cellspacing="0" cellpadding="0">
            <colgroup>
                <col style="width: 20%;"/>
                <col style="width: 30%;"/>
                <col style="width: 20%;"/>
                <col style="width: 30%;"/>
            </colgroup>
            <tbody>
            <tr>
                <th>성명</th>
                <td>{{$member['MemName']}}</td>
                <th>생년월일</th>
                <td>{{$member['BirthDay']}}</td>
            </tr>
            <tr>
                <th>주소</th>
                <td colspan="3">{{$member['Addr1']}} {{$member['Addr2']}} </td>
            </tr>
            <tr>
                <th>전화</th>
                <td>{{$member['Tel']}}</td>
                <th>휴대폰</th>
                <td>{{$member['Phone']}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="smSub">· 수강내역</div>
    <div class="tdCenter">
    @if($type == 'P' )
        <table cellspacing="0" cellpadding="0">
            <colgroup>
                <col/>
                <col style="width: 20%;"/>
                <col style="width: 15%;"/>
                <col style="width: 15%;"/>
            </colgroup>
            <thead>
            <tr>
                <th>수강강좌</th>
                <th>동영상 수강기간</th>
                <th>강사명</th>
                <th>금액</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$lec['ProdName']}}</td>
                <td>{{str_replace('-', '.', $lec['LecStartDate'])}} ~<br>
                 {{str_replace('-', '.', $lec['RealLecEndDate'])}}</td>
                <td></td>
                <td>\{{number_format($lec['RealPayPrice'],0)}}</td>
            </tr>
            <tr>
                <th>합계</th>
                <td colspan="3">\{{number_format($lec['RealPayPrice'],0)}}</td>
            </tr>
            </tbody>
        </table>
    @else
        <table cellspacing="0" cellpadding="0">
            <colgroup>
                <col/>
                <col style="width: 20%;"/>
                <col style="width: 10%;"/>
                <col style="width: 10%;"/>
                <col style="width: 10%;"/>
            </colgroup>
            <thead>
            <tr>
                <th class="Top">수강강좌</th>
                <th>동영상 수강기간</th>
                <th>진도율</th>
                <th>강사명</th>
                <th>금액</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$lec['subProdName']}}</td>
                <td>
                    {{str_replace('-', '.', $lec['LecStartDate'])}} ~<br>
                     {{str_replace('-', '.', $lec['RealLecEndDate'])}}<br/>
                    <!-- 총 00시간 00분<span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span>수강 00시간 00분-->
                </td>
                <td>{{$lec['StudyRate'] > $lec['StudyRatePrint'] ? $lec['StudyRate'] : $lec['StudyRatePrint']}}%</td>
                <td>{{$lec['wProfName']}}</td>
                <td>\{{number_format($lec['RealPayPrice'],0)}}</td>
            </tr>
            <tr>
                <th class="w-tit Top">합계</th>
                <td class="w-total-price" colspan="4">\{{number_format($lec['RealPayPrice'],0)}}</td>
            </tr>
            </tbody>
        </table>
    @endif
    </div>
    <div class="tx-center pt40 pb40">
        <div class="confirm-txt tx-sky-blue NSK">위 사람은 본사이트({{$lec['SiteUrl']}})에서 수강(중) 하였음을 확인합니다.</div>
        <div class="date tx-gray">{{date('Y년 m월 d일')}}</div>
    </div>
    <ul class="certifi-info">
        <li class="address">
            사업자번호: 119-85-23089 / 주소: 서울 관악구 신림로 101<br/>
            수강기관: (주)윌비스
        </li>
        <li class="stamp">
            확인<br/>
            <img src="{{ img_url('stamp/stamp.png') }}">
        </li>
    </ul>
</div>

<script type="text/javascript">
    function fnPrint(obj)
    {
        window.print();
    }
</script>
</body>
</html>