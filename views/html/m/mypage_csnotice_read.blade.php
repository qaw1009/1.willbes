@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        공지사항
    </div>
    <div class="willbes-Lec-Selected NG tx-gray">
        <select id="process" name="process" title="process" class="seleProcess width24p">
            <option selected="selected">과정</option>
            <option value="헌법">헌법</option>
            <option value="스파르타반">스파르타반</option>
            <option value="공직선거법">공직선거법</option>
        </select>
        <select id="campus" name="campus" title="campus" class="seleCampus width40p ml1p">
            <option selected="selected">캠퍼스</option>
            <option value="헌법">헌법</option>
            <option value="스파르타반">스파르타반</option>
            <option value="공직선거법">공직선거법</option>
        </select>
        <div class="willbes-Lec-Search NG width100p mt1p mb30">
            <div class="inputBox width74p p_re">
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width100p" placeholder="제목 및 내용 검색" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span class="hidden">검색</span>
                </button>
            </div>
            <div class="reset-Btn f_right width25p ml1p"><a href="#none">초기화</a></div>
        </div>
    </div>

    <div class="lineTabs lecListTabs c_both">
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <tbody>
                <tr class="list">
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt>학원<span class="row-line">|</span>노량진</dt>
                        </dl>
                        <div class="w-tit">
                            <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>2018-00-00<span class="row-line">|</span></dt>
                            <dt>조회수 : <span class="tx-blue">10</span></dt>
                        </dl>
                    </td>
                </tr>
                <tr class="flie">
                    <td class="w-file NGR">
                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                    </td>
                </tr>
                <tr class="txt">
                    <td class="w-txt NGR">
                        수험생 여러분들께 보다 나은 수강환경을 제공해 드리기 위해<br/>
                        서버점검 및 개선작업이 진행될 예정입니다.<br/>
                        점검시간에는 수강이 원활하지 않으니 양해 부탁드립니다.<br/>
                        점검시간에는 수강이 원활하지 않으니 양해 부탁드립니다.<br/>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="lecSubject mt40">
            <a href="{{ site_url('/home/html/m/mypage_csnotice_list') }}">목록</a>
        </div>
    </div>

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

</div>
<!-- End Container -->
@stop