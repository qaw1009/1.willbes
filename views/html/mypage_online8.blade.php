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
            width: 21cm;
            min-height: 29.7cm;
            padding: 2cm;
            margin: 1cm auto;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
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
            padding:15px 20px;
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
            }
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
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
                    <td>홍길동</td>
                    <th>생년월일</th>
                    <td>1900-00-00</td>
                </tr>
                <tr>
                    <th>주소</th>
                    <td colspan="3">서울시 관악구 신림로 101</td>
                </tr>
                <tr>
                    <th>전화</th>
                    <td>0200000000</td>
                    <th>휴대폰</th>
                    <td>010-0000-0000</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="smSub">· 수강내역</div>
    <div class="tdCenter">
        <!-- 무한 PASS 패키지 무료특강 출력폼 -->
        <table cellspacing="0" cellpadding="0">
            <colgroup>
                <col/>
                <col style="width: 30%;"/>
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
                    <td>단강좌명이 노출됩니다.</td>
                    <td>2018-00-00 ~<br>
                         2018-00-00</td>
                    <td></td>
                    <td>\100,000</td>
                </tr>
                <tr>
                    <th>합계</th>
                    <td colspan="3">\100,000</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="tx-center pt40 pb40">
        <div class="confirm-txt tx-sky-blue NSK">위 사람은 본사이트(cop.willbes.com)에서 수강(중) 하였음을 확인합니다.</div>
        <div class="date tx-gray">2018년 12월 20일</div>
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
</div>

<script type="text/javascript">
    function fnPrint(obj)
    {
        window.print();
    }
</script>
</body>
</html>