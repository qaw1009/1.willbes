@extends('lcms.layouts.master_no_header')

@section('popup_title')
@stop

@section('popup_header')
@endsection

@section('popup_content')
    <style type="text/css">
        <!--
        .title_text {
            font-size: 30px;
            color: #000000;
            font-weight: bold;
        }
        .basic2_text {
            font-size: 14px;
        }
        .basic_text {
            font-size: 12px;
            color: #000000;
        }
        .title2-text {
            font-size: 16px;
            color: #000000;
            font-weight: bolder;
            background-color: #CCCCCC;
        }
        .logo_text {
            font-size: 24px;
            color: #000000;
            font-weight: bold;
            font-family: "-윤디자인웹바탕";
        }
        table,th,td {font-size: 11px;	color: #000000; }
        -->
    </style>

    <body id="container" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <table width="620" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr>
            <td><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center" valign="top"><table width="600" height="322" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="600" align="right" valign="bottom" bgcolor="#FFFFFF" class="basic_text"><table width="400" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td height="40" align="center"><span class="title_text">영 수 증</span></td>
                                                <td align="center" valign="bottom"><span class="basic2_text">(학원보관용)</span></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle"><table border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td height="150" align="center"><table width="560" border="0" cellpadding="0" cellspacing="0" bgcolor="#000000">
                                                        <tr>
                                                            <td><table width="560" border="0" align="center" cellpadding="0" cellspacing="1">
                                                                    <tr>
                                                                        <td width="100" height="10" align="center" class="title2-text"><!-- Document Start -->
                                                                            <p> &nbsp;수 강 No </p>
                                                                            <!-- Document End --></td>
                                                                        <td width="200" height="30" bgcolor="#FFFFFF" class="basic_text">&nbsp;{{ $data['CertNo'] }}</td>
                                                                        <td width="100" align="center" class="title2-text">직렬분류</td>
                                                                        <td width="200" height="0" bgcolor="#FFFFFF" class="basic_text">&nbsp;{{ $data['LgCateName'] }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="20" align="center" class="title2-text"><!-- Document Start -->
                                                                            <p> &nbsp;성&nbsp;&nbsp; &nbsp;명 </p>
                                                                            <!-- Document End --></td>
                                                                        <td height="30" bgcolor="#FFFFFF" class="basic_text">&nbsp;{{ $data['MemName'] }}</td>
                                                                        <td align="center" class="title2-text">연 락 처</td>
                                                                        <td height="0" bgcolor="#FFFFFF" class="basic_text">&nbsp;{{ $data['MemPhone'] }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="100" height="10" align="center" class="title2-text">수 강 반</td>
                                                                        <td width="200" height="60" bgcolor="#FFFFFF" class="basic_text" style="padding: 5px;"><span class="basic2_text">{!! $data['OrderProdNameData'] !!}</span></td>
                                                                        <td width="100" height="0" align="center" class="title2-text">납부금액</td>
                                                                        <td width="200" height="0" bgcolor="#FFFFFF" class="basic2_text">&nbsp;총 {{ number_format($data['RealPayPrice']) }}원 (교재비별도) </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="560" height="30" colspan="4" align="center" bgcolor="#FFFFFF"><table width="428" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td width="189" align="center" class="basic2_text"></td>
                                                                                    <td width="239" height="20" class="basic2_text"><p class="basic_text"><strong>교재비 별도</strong></p></td>
                                                                                </tr>
                                                                            </table></td>
                                                                    </tr>
                                                                </table></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr>
                                    <td height="65" align="center" bgcolor="#FFFFFF" class="basic_text"><table width="520" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="basic_text"><p><br><b>* 1개월 정상수강료: 단과 198,000원/종합 550,000원/윌패스 695,000원/올패스 995,000원/특공단 1,200,000원</b>
                                                    <table width="100%" border=1 bordercolor="#DCDCDC" style="border-collapse:collapse;text-align:center;">
                                                        <tr>
                                                            <td>구 분(5과목    종합반 기준)</td>
                                                            <td>수강료 반환 청구 가능일(정상수강료 기준)</td>
                                                            <td colspan="2">수강료    의무교육기간</td>
                                                        </tr>
                                                        <tr>
                                                            <td>윌패스A반(2개월+4개월무료)</td>
                                                            <td>교습개시    이후 2개월 경과 전</td>
                                                            <td colspan="2">2개월수강료(교재비    별도)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>윌패스B반(3개월+9개월무료)</td>
                                                            <td>교습개시    이후 2개월 1/3 경과 전</td>
                                                            <td colspan="2">3개월수강료(교재비    별도)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>올패스A반(2개월+4개월무료)</td>
                                                            <td>교습개시    이후 2개월 경과 전</td>
                                                            <td colspan="2">2개월수강료(교재비    별도)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>올패스B반(3개월+9개월무료)</td>
                                                            <td>교습개시    이후 2개월 1/2 경과 전</td>
                                                            <td colspan="2">3개월수강료(교재비    별도)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>특공단A반(2개월+4개월무료)</td>
                                                            <td>교습개시    이후 2개월 경과 전</td>
                                                            <td colspan="2">2개월수강료(교재비    별도)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>특공단B반(3개월+9개월무료)</td>
                                                            <td>교습개시    이후 3개월 경과 전</td>
                                                            <td colspan="2">3개월수강료(교재비    별도)</td>
                                                        </tr>
                                                    </table>
                                                    <br>
                                                    ◎ 환불규정은 &lt;학원의 설립ㆍ운영및 과외교습에 관한 법률 및 시행령(제18조 2항)&gt;의거 하여 적용 됩니다.&nbsp;</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="65" align="center" bgcolor="#FFFFFF" class="basic_text"><table width="470" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td width="56" rowspan="2" align="center" class="basic_text"><img src="/public/img/lms_willbesedu/logo.gif" width="56" height="52"></td>
                                                <td width="399" align="left" class="basic_text">
                                                    <table width="0" border="0" cellspacing="0" cellpadding="0" align="center">
                                                        <tr>
                                                            <td rowspan="2"><span class="title_text" style="font-size:24px;"> 인천 윌비스 고시학원</span></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="56" rowspan="2" align="center" valign=top class="basic_text">
                                                    <img src="/public/img/lms_willbesedu/willbes_stamp.jpg" border=0>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="basic_text"><span class="basic2_text">인천 부평구 경원대로 1395 부평일번가 11F</span></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr height=22>
                                    <td align="center" valign="top" bgcolor="#FFFFFF" class="basic_text"><table width="520" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="right" valign="bottom" class="basic_text"><table width="260" height="20" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td width="50" align="center" class="basic_text"><strong>발행일</strong></td>
                                                            <td width="20" align="right" class="basic_text">&nbsp;{{ date('Y') }}</td>
                                                            <td width="10" align="right" class="basic_text"><strong>년</strong></td>
                                                            <td width="15" align="right" class="basic_text">&nbsp;{{ date('n') }}</td>
                                                            <td width="10" align="right" class="basic_text"><strong>월</strong></td>
                                                            <td width="15" align="right" class="basic_text">&nbsp;{{ date('j') }}</td>
                                                            <td width="10" align="right" class="basic_text"><strong>일</strong></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                            </table></td>
                    </tr>

                    <tr>
                        <td height="20"><img src="/public/img/lms_willbesedu/willbes_stamp_line.gif" width="640"></td>
                    </tr>

                    <tr>
                        <td align="center" valign="top"><table width="600" height="322" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="600" align="right" valign="bottom" bgcolor="#FFFFFF" class="basic_text"><table width="400" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td height="40" align="center"><span class="title_text">영 수 증</span></td>
                                                <td align="center" valign="bottom"><span class="basic2_text">(학생보관용)</span></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr>
                                    <td align="center" valign="middle"><table border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td height="150" align="center"><table width="560" border="0" cellpadding="0" cellspacing="0" bgcolor="#000000">
                                                        <tr>
                                                            <td><table width="560" border="0" align="center" cellpadding="0" cellspacing="1">
                                                                    <tr>
                                                                        <td width="100" height="10" align="center" class="title2-text"><!-- Document Start -->
                                                                            <p> &nbsp;수 강 No </p>
                                                                            <!-- Document End --></td>
                                                                        <td width="200" height="30" bgcolor="#FFFFFF" class="basic_text">&nbsp;{{ $data['CertNo'] }}</td>
                                                                        <td width="100" align="center" class="title2-text">직렬분류</td>
                                                                        <td width="200" height="0" bgcolor="#FFFFFF" class="basic_text">&nbsp;{{ $data['LgCateName'] }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="20" align="center" class="title2-text"><!-- Document Start -->
                                                                            <p> &nbsp;성&nbsp;&nbsp; &nbsp;명 </p>
                                                                            <!-- Document End --></td>
                                                                        <td height="30" bgcolor="#FFFFFF" class="basic_text">&nbsp;{{ $data['MemName'] }}</td>
                                                                        <td align="center" class="title2-text">연 락 처</td>
                                                                        <td height="0" bgcolor="#FFFFFF" class="basic_text">&nbsp;{{ $data['MemPhone'] }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="100" height="10" align="center" class="title2-text">수 강 반</td>
                                                                        <td width="200" height="60" bgcolor="#FFFFFF" class="basic_text" style="padding: 5px;"><span class="basic2_text">{!! $data['OrderProdNameData'] !!}</span></td>
                                                                        <td width="100" height="0" align="center" class="title2-text">납부금액</td>
                                                                        <td width="200" height="0" bgcolor="#FFFFFF" class="basic2_text">&nbsp;총 {{ number_format($data['RealPayPrice']) }}원 (교재비별도) </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="560" height="30" colspan="4" align="center" bgcolor="#FFFFFF"><table width="428" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td width="189" align="center" class="basic2_text"></td>
                                                                                    <td width="239" height="20" class="basic2_text"><p class="basic_text"><strong>교재비 별도</strong></p></td>
                                                                                </tr>
                                                                            </table></td>
                                                                    </tr>
                                                                </table></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr>
                                    <td height="65" align="center" bgcolor="#FFFFFF" class="basic_text"><table width="520" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="basic_text"><p><br><b>* 1개월 정상수강료: 단과 198,000원/종합 550,000원/윌패스 695,000원/올패스 995,000원/특공단 1,200,000원</b>
                                                    <table width="100%" border=1 bordercolor="#DCDCDC" style="border-collapse:collapse;text-align:center;">
                                                        <tr>
                                                            <td>구 분(5과목    종합반 기준)</td>
                                                            <td>수강료 반환 청구 가능일(정상수강료 기준)</td>
                                                            <td colspan="2">수강료    의무교육기간</td>
                                                        </tr>
                                                        <tr>
                                                            <td>윌패스A반(2개월+4개월무료)</td>
                                                            <td>교습개시    이후 2개월 경과 전</td>
                                                            <td colspan="2">2개월수강료(교재비    별도)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>윌패스B반(3개월+9개월무료)</td>
                                                            <td>교습개시    이후 2개월 1/3 경과 전</td>
                                                            <td colspan="2">3개월수강료(교재비    별도)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>올패스A반(2개월+4개월무료)</td>
                                                            <td>교습개시    이후 2개월 경과 전</td>
                                                            <td colspan="2">2개월수강료(교재비    별도)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>올패스B반(3개월+9개월무료)</td>
                                                            <td>교습개시    이후 2개월 1/2 경과 전</td>
                                                            <td colspan="2">3개월수강료(교재비    별도)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>특공단A반(2개월+4개월무료)</td>
                                                            <td>교습개시    이후 2개월 경과 전</td>
                                                            <td colspan="2">2개월수강료(교재비    별도)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>특공단B반(3개월+9개월무료)</td>
                                                            <td>교습개시    이후 3개월 경과 전</td>
                                                            <td colspan="2">3개월수강료(교재비    별도)</td>
                                                        </tr>
                                                    </table>
                                                    <br>
                                                    ◎ 환불규정은 &lt;학원의 설립ㆍ운영및 과외교습에 관한 법률 및 시행령(제18조 2항)&gt;의거 하여 적용 됩니다.&nbsp;</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="65" align="center" bgcolor="#FFFFFF" class="basic_text"><table width="470" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td width="56" rowspan="2" align="center" class="basic_text"><img src="/public/img/lms_willbesedu/logo.gif" width="56" height="52"></td>
                                                <td width="399" align="left" class="basic_text">
                                                    <table width="0" border="0" cellspacing="0" cellpadding="0" align="center">
                                                        <tr>
                                                            <td rowspan="2"><span class="title_text" style="font-size:24px;"> 인천 윌비스 고시학원</span></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="56" rowspan="2" align="center" valign=top class="basic_text">
                                                    <img src="/public/img/lms_willbesedu/willbes_stamp.jpg" border=0>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="basic_text"><span class="basic2_text">인천 부평구 경원대로 1395 부평일번가 11F</span></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr height=22>
                                    <td align="center" valign="top" bgcolor="#FFFFFF" class="basic_text"><table width="520" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="right" valign="bottom" class="basic_text"><table width="260" height="20" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td width="50" align="center" class="basic_text"><strong>발행일</strong></td>
                                                            <td width="20" align="right" class="basic_text">&nbsp;{{ date('Y') }}</td>
                                                            <td width="10" align="right" class="basic_text"><strong>년</strong></td>
                                                            <td width="15" align="right" class="basic_text">&nbsp;{{ date('n') }}</td>
                                                            <td width="10" align="right" class="basic_text"><strong>월</strong></td>
                                                            <td width="15" align="right" class="basic_text">&nbsp;{{ date('j') }}</td>
                                                            <td width="10" align="right" class="basic_text"><strong>일</strong></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table></td>
                                </tr>
                            </table></td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    </body>

    <script src="/public/vendor/jquery/print/jquery.print.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.resizeTo("680", "950");

            // 프린트 버튼 클릭
            $('button[name="_btn_print"]').on('click', function() {
                $("#print_body").print({
                    globalStyles: true,
                    mediaPrint: false,
                    stylesheet: '/public/css/willbes/style.css',
                    noPrintSelector: ".no-print",
                    iframe: true,
                    append: null,
                    prepend: null,
                    manuallyCopyFormValues: true,
                    deferred: $.Deferred(),
                    timeout: 750,
                    title: null,
                    doctype: '<!doctype html>'
                });
            });
        });
    </script>
@stop

@section('add_buttons')
    <button type="button" name="_btn_print" style="margin: 5px 0 5px 5px;">프린트</button>
@endsection

@section('popup_footer')
@endsection