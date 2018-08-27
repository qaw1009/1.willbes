@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center cscenter">
                <li>
                    <a href="{{ site_url('/home/html/cscenter_index') }}">고객센터 HOME</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter1') }}">자주하는 질문</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter2') }}">공지사항</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter3') }}">1:1 상담</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter4') }}">사이트 이용가이드</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter5') }}">모바일 이용가이드</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/cscenter6_1') }}">수강지원</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수강지원</li>
                            <li><a href="{{ site_url('/home/html/cscenter6_1') }}">PC 원격지원</a></li>
                            <li><a href="{{ site_url('/home/html/cscenter6_2') }}">학습 프로그램 설치</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter7') }}">부정사용자 규제</a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>고객센터</strong>
            <span class="depth-Arrow">></span><strong>수강지원</strong>
            <span class="depth-Arrow">></span><strong>학습 프로그램 설치</strong>
        </span>
    </div>
    <div class="Content p_re">

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
                                    <td class="w-img"><img src="{{ img_url('cs/icon_program_671001.gif') }}"></td>
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
                                    <td class="w-img"><img src="{{ img_url('cs/icon_program_671002.gif') }}"></td>
                                    <td class="w-txt tx-left pl20">
                                        <div class="tx-black">한글과 컴퓨터 뷰어 v2007</div>
                                        한글97 등의 한글 프로그램이 설치되어 있지 않는 경우에 HWP 한글문서를 열어볼 수 있도록 해주는 프로그램입니다.
                                    </td>
                                    <td class="w-download">
                                        <a href="#none"><img src="{{ img_url('cs/icon_download.gif') }}"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-img"><img src="{{ img_url('cs/icon_program_671003.gif') }}"></td>
                                    <td class="w-txt tx-left pl20">
                                        <div class="tx-black">MS Word 뷰어</div>
                                        MicroSoft의 Word 프로그램이 설치되어있지 않는 경우에 doc문서를 열어볼 수 있도록 해주는 프로그램입니다.
                                    </td>
                                    <td class="w-download">
                                        <a href="#none"><img src="{{ img_url('cs/icon_download.gif') }}"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-img"><img src="{{ img_url('cs/icon_program_671004.gif') }}"></td>
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