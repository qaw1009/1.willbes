@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        합격수기
    </div>

    <div class="lineTabs lecListTabs c_both">
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
            <tbody>
                <tr class="list bg-light-gray">
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <span class="tx-blue">[설명회]</span> 2021 합격 전략 설명회
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>기간 : 2020-09-18 ~ 2020-10-20<span class="row-line">|</span></dt>
                            <dt>2020-09-17<span class="row-line">|</span></dt>
                            <dt>조회수 : <span class="tx-blue">10</span></dt>
                        </dl>
                    </td>
                </tr>                
                <tr class="txt">
                    <td class="w-txt NGR">
                        <div class="mb10"><img src="https://static.willbes.net/public/images/promotion/m/2018/borad_sample01.jpg" alt="" ></div>
                        ○ 퀵 써머리 과목: 교육학, 국어, 영어, 수학, 도덕·윤리, 역사, 음악, 중국어<br>
                        ○ 구매가능 기간: 10월 11일까지(이후 종료)<br>
                        ○ 수강 기간 : 11월 21일 (중등 1차 시험일까지)<br> 
                        * 수강시작일에 관계없이 자동 종강됨.<br>
                        ○ 수강료: 총 강좌 금액의 최대 70% 할인<br>
                        <div class="btnboard"><a href="#none">★ 퀵써머리 패키지 수강신청 바로가기 ★</a></div>
                    </td>
                </tr>
                <tr class="flie">
                    <td class="w-file NGR">
                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 이벤트.jpg</a>
                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                    </td>
                </tr>
                <tr>
                    <td class="NGR pd-zero">
                        <div class="request">
                            <div class="title">신청리스트</div>
                            <ul>
                                <li><label><input type="radio"> 특강명이 노출됩니다.</label><li>
                                <li><label><input type="radio"> 특강명이 노출됩니다.</label><li>
                            </ul>
                            <div class="title">신청자정보</div>      
                            <div class="tx-blue tx12 pl10 mt10">이름, 연락처, 이메일주소를 모두 입력해 주세요.</div>                      
                            <div class="pd10 form">
                                <div class="f_left">                           
                                    <p class="mb5"><input type="text" placeholder="이름"/><input type="tel" placeholder="휴대폰번호 숫자만 입력"></p>
                                    <p><input type="email" placeholder="이메일" ></p>
                                </div>
                                <div class="f_right">
                                    <a href="#none">신청하기</a>
                                    {{--<a href="#none" class="end">신청만료</a>--}}
                                </div>
                            </div>                            
                        </div>
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