@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        시작일변경
    </div>
    <div class="willbes-Txt NGR c_both mt30 mb50">
        <div class="willbes-Txt-Tit NG">· 수강시작일 설정 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
        - 수강시작일은 개강일 전까지만 변경 가능합니다.<br/>
        - '시작일변경'버튼을 클릭하면 강의별 <span class="tx-red">최대 3회, 개강일기준 30일까지</span>만 변경이 가능합니다.<br/>
        - 수강시작일을 변경하면 변경된 시작일에 맞춰 종료기간 및 잔여기간이 자동으로 셋팅됩니다.<br/>
        - 수강시작이 이루어진 강좌는 시작일 변경이 불가능합니다.<br/>
    </div>

    <div class="willbes-List-Tit NG">수강시작일 설정</div>
    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
        <tbody>
            <tr>
                <td class="w-data tx-left pb-zero">
                    <dl class="w-info">
                        <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n2">진행중</span></dt>
                    </dl>
                    <div class="w-tit">
                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>잔여기간 : <span class="tx-light-blue">50</span>일 (2018-00-00 ~ 2018-00-00)</dt>
                    </dl>
                    <div class="w-s-date">
                        <div class="grid">
                            시작일 변경 : <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30" > (시작)
                            ~ <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30"> (종료)
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="AddlecMore">
        <a href="#none">변경하기</a>
    </div>

    <div class="daysListTabs willbes-Txt c_both">
        <div class="willbes-Txt-Tit NG">수강시작일 변경이력 ( <span class="tx-light-blue">1</span>회 <span class="row-line">|</span> <span class="tx-light-blue">10</span>일 ) <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
            <colgroup>
                <col style="width: 13%;">
                <col style="width: 87%;">
            </colgroup>
            <tbody>
                <tr>
                    <td class="w-num"><strong>1차</strong></td>
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt>[수강변경일] 2018-00-00 ~ 2018-00-00</dt>
                        </dl>
                        <dl class="w-info tx-gray">
                            <dt>[변경자] 회원명<span class="row-line">|</span>[변경일] 2018-00-00</dt>
                        </dl>
                    </td>
                </tr>
                <tr>
                    <td class="w-num"><strong>2차</strong></td>
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt>[수강변경일] 2018-00-00 ~ 2018-00-00</dt>
                        </dl>
                        <dl class="w-info tx-gray">
                            <dt>[변경자] 회원명<span class="row-line">|</span>[변경일] 2018-00-00</dt>
                        </dl>
                    </td>
                </tr>
                <tr>
                    <td class="w-num"><strong>3차</strong></td>
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt>[수강변경일] 2018-00-00 ~ 2018-00-00</dt>
                        </dl>
                        <dl class="w-info tx-gray">
                            <dt>[변경자] 회원명<span class="row-line">|</span>[변경일] 2018-00-00</dt>
                        </dl>
                    </td>
                </tr>
            </tbody>
        </table> 
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