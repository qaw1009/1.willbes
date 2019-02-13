<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <link href="/public/css/willbes/basic.css?ver={{time()}}" rel="stylesheet">
    <link href="/public/css/willbes/style.css?ver={{time()}}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .page {
            width: 21cm;
            min-height: 29.7cm;
            padding: 2cm;
            margin: 0 auto;
            background:#eee;
            align:center;
        }

        @@page {
            size: A4;
            margin: 0;
        }

        @@media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }

            .page {
                margin: 0;
                border: initial;
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
<div class=".page willbes-Layer-PassBox willbes-Layer-PassBox740 abs mb20" style="display:block !important; top:20px">
    <div class="Layer-Tit tx-dark-black NG">수강확인증 출력</div>
    <div class="PASSZONE-List widthAutoFull">
        <div class="PASSZONE-Lec-Section">
            <div class="Search-Result strong mt40 mb15 tx-gray">· 수강확인증</div>
            <div class="LeclistTable bdt-gray">
                <table cellspacing="0" cellpadding="0" class="listTable userMemoTable certifiTable under-gray tx-gray">
                    <colgroup>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                    </colgroup>
                    <tbody>
                    <tr>
                        <th class="w-tit">성명</th>
                        <td class="w-list">{{$member['MemName']}}</td>
                        <th class="w-tit">생년월일</th>
                        <td class="w-list">{{$member['BirthDay']}}</td>
                    </tr>
                    <tr>
                        <th class="w-tit">주소</th>
                        <td class="w-list" colspan="3">{{$member['Addr1']}} {{$member['Addr2']}} </td>
                    </tr>
                    <tr>
                        <th class="w-tit">전화</th>
                        <td class="w-list">{{$member['Tel']}}</td>
                        <th class="w-tit">휴대폰</th>
                        <td class="w-list">{{$member['Phone']}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="Search-Result strong mt40 mb15 tx-gray">· 수강내역</div>
            <div class="LeclistTable bdt-gray">
                @if($type == 'P' )
                    <table cellspacing="0" cellpadding="0" class="listTable usertestTable certifiTable under-gray tx-gray">
                        <colgroup>
                            <col style="width: 40%;"/>
                            <col style="width: 30%;"/>
                            <col style="width: 15%;"/>
                            <col style="width: 15%;"/>
                        </colgroup>
                        <thead>
                        <tr>
                            <th class="Top">수강강좌</th>
                            <th>동영상 수강기간</th>
                            <th>강사명</th>
                            <th>금액</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-tit Top">{{$lec['ProdName']}}</td>
                            <td class="w-info">{{str_replace('-', '.', $lec['LecStartDate'])}} ~ {{str_replace('-', '.', $lec['RealLecEndDate'])}}</td>
                            <td class="w-name"></td>
                            <td class="w-c-price">\{{number_format($lec['RealPayPrice'],0)}}</td>
                        </tr>
                        <tr>
                            <th class="w-tit Top">합계</th>
                            <td class="w-total-price" colspan="3">\{{number_format($lec['RealPayPrice'],0)}}</td>
                        </tr>
                        </tbody>
                    </table>
                @else
                    <table cellspacing="0" cellpadding="0" class="listTable usertestTable certifiTable under-gray tx-gray">
                        <colgroup>
                            <col style="width: 40%;"/>
                            <col style="width: 30%;"/>
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
                            <td class="w-tit Top">{{$lec['subProdName']}}</td>
                            <td class="w-info">
                                {{str_replace('-', '.', $lec['LecStartDate'])}} ~ {{str_replace('-', '.', $lec['RealLecEndDate'])}}<br/>
                                <!-- 총 00시간 00분<span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span>수강 00시간 00분-->
                            </td>
                            <td class="w-percent">{{$lec['StudyRate'] > $lec['StudyRatePrint'] ? $lec['StudyRate'] : $lec['StudyRatePrint']}}%</td>
                            <td class="w-name">{{$lec['wProfName']}}</td>
                            <td class="w-c-price">\{{number_format($lec['RealPayPrice'],0)}}</td>
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
    </div>
    <!-- PASSZONE-List -->
</div>
<a class="aBox waitBox tx-sky-blue NSK f_right" style="margin-top: -5px;" href="#none" onclick="fnPrint(this);">인쇄하기</a>
<script type="text/javascript">
    function fnPrint(obj)
    {
        $(obj).hide();
        window.print();
    }
</script>
</body>
</html>