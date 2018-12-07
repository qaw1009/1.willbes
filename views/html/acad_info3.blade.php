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
                                                <img src="{{ img_url('sample/evt1.jpg') }}">
                                            </a>
                                            <a href="#" class="thumb_num"><span>3</span></a>
                                            <div class="thumb_slide_wrap">
                                                <ul>
                                                    <li><a href="#none"><img src="{{ img_url('sample/prof3.jpg') }}"></a></li>
                                                    <li><a href="#none"><img src="{{ img_url('sample/prof3.jpg') }}"></a></li>
                                                    <li><a href="#none"><img src="{{ img_url('sample/prof3.jpg') }}"></a></li>
                                                </ul>
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
                                                <img src="{{ img_url('sample/evt1.jpg') }}">
                                            </a>
                                            <a href="#" class="thumb_num"><span>4</span></a>
                                            <div class="thumb_slide_wrap">
                                                <ul>
                                                    <li><a href="#none"><img src="{{ img_url('sample/prof3-4.jpg') }}"></a></li>
                                                    <li><a href="#none"><img src="{{ img_url('sample/prof3-4.jpg') }}"></a></li>
                                                    <li><a href="#none"><img src="{{ img_url('sample/prof3-4.jpg') }}"></a></li>
                                                    <li><a href="#none"><img src="{{ img_url('sample/prof3-4.jpg') }}"></a></li>
                                                </ul>
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
                                                <img src="{{ img_url('sample/evt1.jpg') }}">
                                            </a>
                                            <a href="#" class="thumb_num"><span>2</span></a>
                                            <div class="thumb_slide_wrap">
                                                <ul>
                                                    <li><a href="#none"><img src="{{ img_url('sample/prof3-5.jpg') }}"></a></li>
                                                    <li><a href="#none"><img src="{{ img_url('sample/prof3-5.jpg') }}"></a></li>
                                                </ul>
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