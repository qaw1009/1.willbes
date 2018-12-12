@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">경찰학원</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">교수진소개</a>
                </li>
                <li>
                    <a href="#none">종합반</a>
                </li>
                <li>
                    <a href="#none">단과</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/acad_info1') }}">학원안내</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학원안내</li>
                            <li><a href="{{ site_url('/home/html/acad_info1_1') }}">학원강의정보</a></li>
                            <li><a href="{{ site_url('/home/html/acad_info2') }}">모의고사성적공지</a></li>
                            <li><a href="{{ site_url('/home/html/acad_info3') }}">학원갤러리</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">학원소개</a>
                </li>
                <li class="Acad">
                    <a href="#none">신광은경찰 온라인 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>학원안내</strong></span>
        <span class="1depth"><span class="depth-Arrow">></span><strong>학원갤러리</strong></span>
    </div>
    <div class="Content p_re">

        <div class="willbes-AcadInfo c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                · 학원갤러리
                <div class="willbes-Lec-Search GM f_right" style="margin: 0;">
                    <div class="inputBox p_re">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="Acad_info mt30">

                <!-- List -->
                <div class="willbes-Leclist c_both">
                    <div class="willbes-Lec-Selected tx-gray">
                        <select id="acad" name="acad" title="카테고리" class="seleAcad">
                            <option selected="selected">카테고리</option>
                            <option value="카테고리1">카테고리1</option>
                            <option value="카테고리2">카테고리2</option>
                        </select>
                        <select id="campus" name="campus" title="campus" class="seleCampus">
                            <option selected="selected">캠퍼스</option>
                            <option value="헌법">헌법</option>
                            <option value="스파르타반">스파르타반</option>
                            <option value="공직선거법">공직선거법</option>
                        </select>
                    </div>
                    <div class="LeclistTable orderTable">
                        <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                            <colgroup>
                                <col style="width: 65px;">
                                <col style="width: 595px;">
                                <col style="width: 90px;">
                                <col style="width: 90px;">
                                <col style="width: 100px;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>No<span class="row-line">|</span></li></th>
                                    <th>제목<span class="row-line">|</span></li></th>
                                    <th>조회수<span class="row-line">|</span></li></th>
                                    <th>댓글수<span class="row-line">|</span></li></th>
                                    <th>작성일</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                    <td class="w-thumb p_re">
                                        <div class="thumb_rollover">
                                            <a href="#none">
                                                <img src="{{ img_url('sample/evt3.jpg') }}">
                                            </a>
                                            <a href="#" class="thumb_num"><span>+ 3</span></a>
                                            <div class="thumb_slide_wrap">
                                                <ul>
                                                    <li><a href="#none"><img src="{{ img_url('sample/evt4.jpg') }}"></a></li>
                                                    <li><a href="#none"><img src="{{ img_url('sample/evt4.jpg') }}"></a></li>
                                                    <li><a href="#none"><img src="{{ img_url('sample/evt4.jpg') }}"></a></li>
                                                </ul>
                                                <span class="thumb_num_short">4/10</span>
                                            </div>
                                        </div>
                                        <div class="thumb_txt">
                                            <dl class="w-info">
                                                <dt>공통</dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none"><strong>2018.11.25(일) 김원욱교수님 무료 최신 기출&판례 특강 현장스케치!</strong></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-click">123</td>
                                    <td class="w-replys">456</td>
                                    <td class="w-date">2018-00-00</td>
                                </tr>
                                <tr>
                                    <td class="w-no">2</td>
                                    <td class="w-thumb p_re">
                                        <div class="thumb_rollover">
                                            <a href="#none">
                                                <img src="{{ img_url('sample/evt3.jpg') }}">
                                            </a>
                                            <a href="#" class="thumb_num"><span>+ 4</span></a>
                                            <div class="thumb_slide_wrap">
                                                <ul>
                                                    <li><a href="#none"><img src="{{ img_url('sample/evt4.jpg') }}"></a></li>
                                                    <li><a href="#none"><img src="{{ img_url('sample/evt4.jpg') }}"></a></li>
                                                    <li><a href="#none"><img src="{{ img_url('sample/evt4.jpg') }}"></a></li>
                                                    <li><a href="#none"><img src="{{ img_url('sample/evt4.jpg') }}"></a></li>
                                                </ul>
                                                <span class="thumb_num_short">4/5</span>
                                            </div>
                                        </div>
                                        <div class="thumb_txt">
                                            <dl class="w-info">
                                                <dt>노량진</dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none"><strong>2018.11.22(목) 장정훈교수님 무료 숫자특강 현장스케치!</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-click">123</td>
                                    <td class="w-replys">456</td>
                                    <td class="w-date">2018-00-00</td>
                                </tr>
                                <tr>
                                    <td class="w-no">1</td>
                                    <td class="w-thumb p_re">
                                        <div class="thumb_rollover">
                                            <a href="#none">
                                                <img src="{{ img_url('sample/evt3.jpg') }}">
                                            </a>
                                            <a href="#" class="thumb_num"><span>+ 2</span></a>
                                            <div class="thumb_slide_wrap">
                                                <ul>
                                                    <li><a href="#none"><img src="{{ img_url('sample/evt4.jpg') }}"></a></li>
                                                    <li><a href="#none"><img src="{{ img_url('sample/evt4.jpg') }}"></a></li>
                                                </ul>
                                                <span class="thumb_num_short">15/20</span>
                                            </div>
                                        </div>
                                        <div class="thumb_txt">
                                            <dl class="w-info">
                                                <dt>노량진</dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none"><strong>2018.11.22(목) 장정훈교수님 무료 숫자특강 현장스케치!</strong></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-click">123</td>
                                    <td class="w-replys">456</td>
                                    <td class="w-date">2018-00-00</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="Paging">
                            <ul>
                                <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                                <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                                <li><a href="#none">2</a><span class="row-line">|</span></li>
                                <li><a href="#none">3</a><span class="row-line">|</span></li>
                                <li><a href="#none">4</a><span class="row-line">|</span></li>
                                <li><a href="#none">5</a><span class="row-line">|</span></li>
                                <li><a href="#none">6</a><span class="row-line">|</span></li>
                                <li><a href="#none">7</a><span class="row-line">|</span></li>
                                <li><a href="#none">8</a><span class="row-line">|</span></li>
                                <li><a href="#none">9</a><span class="row-line">|</span></li>
                                <li><a href="#none">10</a></li>
                                <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <br/><br/><br/>

                <!-- View -->
                <div class="willbes-Leclist c_both">
                    <div class="LecViewTable">
                        <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                            <colgroup>
                                <col style="width: 640px;">
                                <col style="width: 150px;">
                                <col style="width: 150px;">
                            </colgroup>
                            <thead>
                                <tr><th colspan="3" class="w-list tx-left  pl20"><img src="{{ img_url('prof/icon_HOT.gif') }}" style="marign-right: 5px;"> <strong>[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</strong></th></tr>
                                <tr>
                                    <td class="w-acad tx-left pl20">
                                        <dl>
                                            <dt class="tx-bright-gray">신림<span class="row-line">|</span></dt>
                                            <dt class="tx-bright-gray">회원+비회원<span class="row-line">|</span></dt>
                                            <dt>[접수기간] 2018-00-00 ~ 2018-00-00</dt>
                                        </dl>
                                        <span class="row-line">|</span>
                                    </td>
                                    <td class="w-date">2018-00-00<span class="row-line">|</span></td>
                                    <td class="w-click"><strong>조회수</strong> 123</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-gallery" colspan="7">
                                        <div class="sliderGallery cSliderTM">
                                            <div class="sliderControlsTM">
                                                <div class="gallery_slider">
                                                    <img src="{{ img_url('sample/evt5.jpg') }}"> 
                                                </div>
                                                <div class="gallery_slider">
                                                    <img src="{{ img_url('sample/evt6.jpg') }}"> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-gallery-txt tx-left">
                                            '18. 10. 02. 11:00 제주지방경찰청에서 윌비스 경찰학원 신광은교수님, 장정훈교수님, 하승민교수님 등이 참석한 가운데, 「제주청직원및의무경찰 교육복지 향상을 위한업무협약식」 을 개최하였습니다.
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="search-Btn mt20 mb60 h36 p_re">
                            <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                                <a href="#none">목록</a>
                            </div>
                        </div>
                    </div>
                    <div class="LeclistTable p_re">
                        <table cellspacing="0" cellpadding="0" class="listTable evtTable upper-gray upper-black tx-gray">
                            <colgroup>
                                <col style="width: 830px;">
                                <col style="width: 110px;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="w-textarea pl20 pt25"><textarea placeholder="댓글을 입력해 주세요."></textarea></th>
                                    <th class="w-btn pr20 pt25">
                                        <button type="submit" onclick="" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                                            <span>등록</span>
                                        </button>
                                    </th>
                                </tr>
                                <tr>
                                    <td class="w-list tx-left pl20 bd-none" colspan="2">* 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다.</td>
                                </tr>
                            </thead>
                        </table>
                        <table cellspacing="0" cellpadding="0" class="listTable evtTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none mt30">
                            <colgroup>
                                <col style="width: 95px;">
                                <col style="width: 90px;">
                                <col style="width: 615px;">
                                <col style="width: 140px;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="w-no">홍길동</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-list tx-left pl20" colspan="2">
                                        2018년 하반기 경찰공무원 경력경쟁채용시험 공고<a class="w-del" href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-no">홍길*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-list tx-left pl20" colspan="2">
                                        이벤트에 참여해 봤자 어차피 당첨이 안되서 별관심 없었는데 신광은 교수님 너무 좋아하고 존경하여 참여하게 되었습니다.<br/>
                                        모를 행운이 언젠간 올 수도 있겠죠? ㅎ 다른분이 당첨되셔도 미리 축하 말씀드릴께욧! 신광은 경찰팀 파이팅! 그뒤에서 묵묵히<br/>
                                        주시는 직원분들도 팟팅하시구요 감기 조심하세요 ㅎㅎ 어홍헝홍홍ㅋㅋ
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-no">홍길*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-list tx-left pl20" colspan="2">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="Paging">
                            <ul>
                                <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                                <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                                <li><a href="#none">2</a><span class="row-line">|</span></li>
                                <li><a href="#none">3</a><span class="row-line">|</span></li>
                                <li><a href="#none">4</a><span class="row-line">|</span></li>
                                <li><a href="#none">5</a><span class="row-line">|</span></li>
                                <li><a href="#none">6</a><span class="row-line">|</span></li>
                                <li><a href="#none">7</a><span class="row-line">|</span></li>
                                <li><a href="#none">8</a><span class="row-line">|</span></li>
                                <li><a href="#none">9</a><span class="row-line">|</span></li>
                                <li><a href="#none">10</a></li>
                                <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- willbes-AcadInfo -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop