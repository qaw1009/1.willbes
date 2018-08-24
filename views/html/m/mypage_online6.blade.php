@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        일시정지
    </div>
    <div class="willbes-Txt NGR c_both mt30 mb50">
        <div class="willbes-Txt-Tit NG">· 일시정지 신청 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
        - 일시정지는 강좌별로 <span class="tx-red">최대 3회까지 가능</span>합니다.<br/>
        - 1회 일시정지기간은 수강잔여일을 초과할 수 없습니다.<br/>
        - <span class="tx-red">일시정지기간의 총합은 수강기간을 초과할 수 없습니다.</span><br/>
        - 일시정지된 강좌는 '일시정지강좌'에서 확인할 수 있습니다.<br/>
        - 일시정지 신청후 당일 일시정지해제시, 횟수는 차감되며, 기간은 차감 되지않습니다.<br/>
    </div>

    <div class="willbes-List-Tit NG">일시정지 신청</div>
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
                            일시정지 신청기간 : <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30" > (시작)
                            ~ <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30"> (종료)
                        </div>
                        <div class="grid">변경 수강기간 : 2018-00-00~ 2018-00-00</div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="AddlecMore">
        <a href="#none">신청하기</a>
    </div>

    <div class="daysListTabs willbes-Txt c_both">
        <div class="willbes-Txt-Tit NG">일시정지 신청이력 ( <span class="tx-light-blue">1</span>회 <span class="row-line">|</span> <span class="tx-light-blue">10</span>일 ) <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
            <colgroup>
                <col style="width: 13%;">
                <col style="width: 87%;">
            </colgroup>
            <tbody>
                <tr>
                    <td class="w-num"><strong>1차</strong></td>
                    <td class="w-data tx-left pl2p">
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
                    <td class="w-data tx-left pl2p">
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
                    <td class="w-data tx-left pl2p">
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