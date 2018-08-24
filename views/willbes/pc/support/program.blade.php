@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <!-- willbes-CScenter -->
            <div class="willbes-CScenter c_both">
                <div class="willbes-Lec-Tit NG bd-none tx-black pt-zero">· 학습 프로그램 설치</div>
                <div class="Act6 mt30">
                    <div class="willbes-Leclist c_both">
                        <div class="DownloadTable NG">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                                <colgroup>
                                    <col style="width: 130px;">
                                    <col style="width: 700px;">
                                    <col style="width: 110px;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="w-img"><img src="{{ img_url('cs/icon_program_ZIP.gif') }}"></td>
                                    <td class="w-txt tx-left pl20">
                                        <div class="tx-black">알집</div>
                                        데이터 압축/압축해제에 이용되는 프로그램입니다.<br/>
                                        윌비스에서 제공되는 압축 자료를 보기 위해서는 압축용 프로그램이 필요합니다.
                                    </td>
                                    <td class="w-download">
                                        <a href="#none"><img src="{{ img_url('cs/icon_download.gif') }}"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-img"><img src="{{ img_url('cs/icon_program_Word.gif') }}"></td>
                                    <td class="w-txt tx-left pl20">
                                        <div class="tx-black">한글과 컴퓨터 뷰어 v2007</div>
                                        한글97 등의 한글 프로그램이 설치되어 있지 않는 경우에 HWP 한글문서를 열어볼 수 있도록 해주는 프로그램입니다.
                                    </td>
                                    <td class="w-download">
                                        <a href="#none"><img src="{{ img_url('cs/icon_download.gif') }}"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-img"><img src="{{ img_url('cs/icon_program_MS.gif') }}"></td>
                                    <td class="w-txt tx-left pl20">
                                        <div class="tx-black">MS Word 뷰어</div>
                                        MicroSoft의 Word 프로그램이 설치되어있지 않는 경우에 doc문서를 열어볼 수 있도록 해주는 프로그램입니다.
                                    </td>
                                    <td class="w-download">
                                        <a href="#none"><img src="{{ img_url('cs/icon_download.gif') }}"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-img"><img src="{{ img_url('cs/icon_program_PDF.gif') }}"></td>
                                    <td class="w-txt tx-left pl20">
                                        <div class="tx-black">한글 Adobe Reader</div>
                                        Adobe Acrobat eBook Reader로 제작된 온라인 문서(PDF)를 열어볼 수 있도록 해주는 프로그램입니다.
                                    </td>
                                    <td class="w-download">
                                        <a href="#none"><img src="{{ img_url('cs/icon_download.gif') }}"></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- willbes-CScenter -->
        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>
    <!-- End Container -->
@stop