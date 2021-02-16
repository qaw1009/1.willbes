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
                            <dt class="tx-red">진행중<span class="row-line">|</span></dt>  
                            <dt>기간 : 2020-09-18 ~ 2020-10-20</dt><br>
                            <dt>2020-09-17<span class="row-line">|</span></dt>
                            <dt>조회수 : <span class="tx-blue">10</span></dt>                            
                        </dl>
                        <div><a href="#none" class="btnblue">바로가기 ></a></div>
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
                {{--
                <tr class="flie">
                    <td class="w-file NGR">
                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 이벤트.jpg</a>
                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                    </td>
                </tr>
                --}}
            </tbody>
        </table>

        {{--신청기능
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
                    <!--<a href="#none" class="end">신청만료</a>-->
                </div>
            </div>                            
        </div>--}}

        {{--댓글기능
        <div class="reply">
            <div class="replyWrite">
                <textarea placeholder="지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다. 댓글을 입력해 주세요."></textarea>
                <a href="#none">등록</a>
            </div>
            <div class="replyList">
                <ul>
                    <li class="noReply">등록된 댓글이 없습니다.</li>
                    <li class="notice">
                        <div class="date"><span>HOT</span> 2020-10-07 <a href="#none" onclick="openWin('LayerReplynotice'),openWin('Profile')">자세히보기 ></a></div>
                        <div>
                            공지사항 제목이 노출됩니다. 공지사항 제목이 노출됩니다.
                            공지사항 제목이 노출됩니다. 공지사항 제목이 노출됩니다.
                        </div>
                    </li>
                    <li>
                        <div class="date">홍길* 2020-10-07</div>
                        <div>
                            댓글이 노출됩니다.
                        </div>
                    </li>
                    <li>
                        <div class="date">김태* 2020-10-07 <a href="#none">삭제</a></div>
                        <div>
                            댓글이 노출됩니다. 댓글이 노출됩니다. 댓글이 노출됩니다. 댓글이 노출됩니다. 댓글이 노출됩니다. 댓글이 노출됩니다.
                        </div>
                    </li>
                </ul>
            </div>
            <div class="Paging">
                <ul>
                    <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                    <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                    <li><a href="#none">2</a><span class="row-line">|</span></li>
                    <li><a href="#none">3</a><span class="row-line">|</span></li>
                    <li><a href="#none">4</a><span class="row-line">|</span></li>
                    <li><a href="#none">5</a></li>
                    <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                </ul>
            </div>
        </div>--}}

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

    {{--댓글공지 팝업--}}
    <div id="LayerReplynotice" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-Replynotice fix">
            <a class="closeBtn" href="#none" onclick="closeWin('LayerReplynotice')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="Layer-Tit NG tx-dark-black">공지사항</div>
            <div class="Layer-Cont lh1_5">
                <div class="Layer-SubTit">
                    공지사항 제목이 노출됩니다. 공지사항 제목이 노출됩니다. 공지사항 제목이 노출됩니다. 
                    <p>2020-10-16 | 조회수 <span class="tx-blue">1</span></p>
                </div>
                <div class="Layer-Txt">
                    안녕하세요<br>
                    윌비스 임용고시학원입니다.<br>
                    <br>
                    정부는 추석연휴기간 '추석 특별방역 기간'으로 정하고 사회적 거리두기를 강화하였습니다. 
                    위험요인에 따라 방역조치를 차별화하는 조치로..<br>
                    <br>
                    기존의 사회적 거리두기 2단계를 유지하면서, 
                    관광지 방역 강화 및 비수도권 추가 적용 조치를 실시한다고 밝혔습니다.<br>                 
                    <br>
                    이에 따라<br>
                    윌비스 임용고시학원도 휴원기간을 아래와 같이 연장합니다.<br>
                    <br>
                    □ 휴원기간: ~10월11일(일) <br>
                    □ 휴원기간 학원운영 안내 <br>
                    1. 휴원기간동안 직강 및 자습실은 운영하지 않고, 인강수업으로 대체됩니다. <br>
                    2. 학원의 문의사항이 있을 때는 학원에 방문하지 않고, 전화(1544-3169) 또는 홈페이지의 1:1 상담게시판을 활용해 주시기 바랍니다. <br>
                    3. 학원 수강생에게는 과목별 별도의 문자공지를 참고하시면 됩니다. <br>
                    <br>
                    평소와는 다른 명절이지만, 마음만이라도 풍요롭고 여유로운 한가위가 되었으면 합니다. <br>
                    <br>
                    감사합니다.  <br>
                    <br>
                    윌비스 임용 올림<br>
                </div>
            </div>
        </div>
        <div class="dim" onclick="closeWin('LayerReplynotice')"></div>
    </div>
</div>
<!-- End Container -->
@stop