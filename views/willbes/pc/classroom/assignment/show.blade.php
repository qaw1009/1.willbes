@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<div id="MARKPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox1100 h920 fix" style="display: block">
    <a class="closeBtn" href="#none" onclick="closeWin('MARKPASS')">
        <img src="{{ img_url('sub/close.png') }}">
    </a>
    <div class="Layer-Tit NG tx-dark-black">채점결과</div>
    <div class="Layer-Cont">
        <div class="PASSZONE-Lec-Section">
            <div class="LeclistTable editTableList mt20">
                <table cellspacing="0" cellpadding="0" class="listTable editTable bdt-gray bdb-gray upper-gray fc-bd-none tx-gray">
                    <colgroup>
                        <col style="width: 115px;">
                        <col style="width: 235px;">
                        <col style="width: 115px;">
                        <col style="width: 235px;">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th class="w-tit bg-light-white strong">과제제목</th>
                        <td class="w-data tx-left tx-gray pl15" colspan="3">온라인 독해 첨삭지도1</td>
                    </tr>
                    <tr>
                        <th class="w-tit bg-light-white strong">첨삭교수</th>
                        <td class="w-data tx-left pl15">한덕현</td>
                        <th class="w-tit bg-light-white strong">채점완료일</th>
                        <td class="w-data tx-left pl15">2018-00-00</td>
                    </tr>
                    </tbody>
                </table>
                <div class="editDetailWrap p_re mt30 mb60">
                    <ul class="tabWrap tabDepth2">
                        {{--<li><a id="edit1" href="#ch1" {!! ($show_tab == 'edit1' ? 'class=on' : '') !!}>과제보기</a></li>
                        <li><a id="edit2" href="#ch2" {!! ($show_tab == 'edit2' ? 'class=on' : '') !!}>과제보기</a></li>
                        <li><a id="edit3" href="#ch3" {!! ($show_tab == 'edit3' ? 'class=on' : '') !!}>과제보기</a></li>--}}

                        <li><a id="edit1" href="#ch1">과제보기</a></li>
                        <li><a id="edit2" href="#ch2">작성답안</a></li>
                        <li><a id="edit3" href="#ch3">채점결과</a></li>
                    </ul>
                    <div class="tabBox mt30">
                        <div id="ch1" class="tabLink">
                            <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                                <colgroup>
                                    <col style="width: 100%;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="w-file tx-left pt-zero pb-zero">
                                        <ul class="up-file">
                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a></li>
                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일4가 노출됩니다.docx</a></li>
                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일5가 노출됩니다.docx</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-file tx-left pt20 pl30 pr30">
                                        A. 다음 각 문장을 끊어진 대로 해석하시오.<br/><br/>
                                        1. Everyone's nose is a different shape.// <br/><br/>
                                        2. Researchers may know why.// <br/><br/>
                                        3. Researchers say / it could be because of the climate.//<br/><br/>
                                        4. People with wider noses / live / in warm, humid areas.// <br/><br/>
                                        5. People with narrower noses / live / in colder, drier places.// <br/><br/>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="ch2" class="tabLink">
                            <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 550px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th class="w-list tx-left pl30"><strong>답안 제목이 노출됩니다.</strong><span class="row-line">|</span></th>
                                    <th class="w-date normal">2018-00-00 00:00</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="w-file tx-left pt-zero pb-zero" colspan="2">
                                        <ul class="up-file">
                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-file tx-left pt20 pl30 pr30" colspan="2">
                                        A. 다음 각 문장을 끊어진 대로 해석하시오.<br/>
                                        1. Riyadh, / the Saudi capital, / offers cheap cost of living / in a more stable environment, / with price controls on staples in Saudi Arabia continuing to guarantee low prices for many goods.//<br/>
                                        Riyadh는 / 사우디의 수도인 / 낮은 생계비를 요구한다 / 보다 안정적인 환경에서, / 사우디 아라비아에서 주 요품목 가격 통제를 통해 / 많은 상폼의 낮은 가격 보장을 지속하면서.<br/><br/>

                                        2. Saudi Arabia has / enough recoverable oil / to maintain current levels of production for 90 years.<br/>
                                        사우디 아라비아는 가지고 있다 / 충분한 원유를 / 90년 간 현재 생산 수준을 유지할.<br/><br/>

                                        3. Trends / in oil output and the global oil market / will remain a key determinant of the country's long-term prospects.<br/>
                                        석유 생산과 국제 석유 시작의 경향은 / 유지될 것이다 / 국가의 장기적 전망의 핵심 결정 요인으로서.<br/><br/>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="ch3" class="tabLink">
                            <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 550px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th class="w-list tx-left pl30"><strong>답안 제목이 노출됩니다.</strong><span class="row-line">|</span></th>
                                    <th class="w-date normal">2018-00-00 00:00</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="w-file tx-left pt-zero pb-zero" colspan="2">
                                        <ul class="up-file">
                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-file tx-left pt20 pl30 pr30" colspan="2">
                                        A. 다음 각 문장을 끊어진 대로 해석하시오.<br/>
                                        1. Riyadh, / the Saudi capital, / offers cheap cost of living / in a more stable environment, / with price controls on staples in Saudi Arabia continuing to guarantee low prices for many goods.//<br/>
                                        Riyadh는 / 사우디의 수도인 / 낮은 생계비를 요구한다 / 보다 안정적인 환경에서, / 사우디 아라비아에서 주 요품목 가격 통제를 통해 / 많은 상폼의 낮은 가격 보장을 지속하면서.<br/><br/>

                                        2. Saudi Arabia has / enough recoverable oil / to maintain current levels of production for 90 years.<br/>
                                        사우디 아라비아는 가지고 있다 / 충분한 원유를 / 90년 간 현재 생산 수준을 유지할.<br/><br/>

                                        3. Trends / in oil output and the global oil market / will remain a key determinant of the country's long-term prospects.<br/>
                                        석유 생산과 국제 석유 시작의 경향은 / 유지될 것이다 / 국가의 장기적 전망의 핵심 결정 요인으로서.<br/><br/>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdb-gray tx-gray fc-bd-none">
                                <colgroup>
                                    <col style="width: 115px;">
                                    <col style="width: 585px;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <th class="w-tit bg-light-white strong">첨삭첨부</th>
                                    <td class="w-file tx-left pt-zero pb-zero">
                                        <ul class="up-file">
                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                            <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/public/js/willbes/tabs.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var tab_id = '{{$show_tab}}';
    var content_id = '{{$show_content}}';
    openLink(tab_id);
    $(function() {
        $('#'+content_id).show().css('display', 'block');
    });
});
</script>

@stop