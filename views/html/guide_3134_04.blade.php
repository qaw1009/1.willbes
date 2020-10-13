@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">학원<span class="row-line">|</span></li>
                <li class="subTit">윌비스 임용</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">내강의실</a>
                </li>
                <li class="dropdown">
                    <a href="#none">강의안내/신청</a>
                    <div class="drop-Box list-drop-Box list-drop-Box-ic">
                        <ul>
                            <li class="Tit">교육학</li>
                            <li>
                                <a href="#none">김차웅</a>
                                <a href="#none">이인재</a>
                                <a href="#none">홍의일</a>
                            </li>
                            <li class="Tit">유아</li>
                            <li>
                                <a href="#none">민정선</a>
                            </li>
                            <li class="Tit">초등</li>
                            <li>
                                <a href="#none">배재민</a>
                            </li>
                        </ul>
                        <ul>
                            <li class="Tit">중등</li>
                            <li>
                                <span>전공국어</span>
                                <a href="#none">송원영</a>
                                <a href="#none">이원근</a>
                                <a href="#none">권보민</a>
                            </li>
                            <li>
                                <span>전공영어</span>
                                <a href="#none">김유석</a>
                                <a href="#none">김영문</a>
                                <a href="#none">공훈</a>
                            </li>
                            <li>
                                <span>전공수학</span>
                                <a href="#none">김철홍</a>
                            </li>
                            <li>
                                <span>수학교육론</span>
                                <a href="#none">박태영</a>
                            </li>
                            <li>
                                <span>전공생물</span>
                                <a href="#none">강치욱</a>
                            </li>
                            <li>
                                <span>생물교육론</span>
                                <a href="#none">양혜정</a>
                            </li>
                            <li>
                                <span>도덕윤리</span>
                                <a href="#none">김병찬</a>
                            </li>
                            <li>
                                <span>전공역사</span>
                                <a href="#none">최용림</a>
                            </li>
                            <li>
                                <span>전공음악</span>
                                <a href="#none">다이애나</a>
                            </li>
                            <li>
                                <span>전기전자통신</span>
                                <a href="#none">최우영</a>
                            </li>
                            <li>
                                <span>정보컴퓨터</span>
                                <a href="#none">송광진</a>
                            </li>
                            <li>
                                <span>정보교육론</span>
                                <a href="#none">장순선</a>
                            </li>
                            <li>
                                <span>전공중국어</span>
                                <a href="#none">정경미</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재안내/신청</a>
                </li>
                <li>
                    <a href="#none">무료강의</a>
                </li>
                <li>
                    <a href="#none">임용정보</a>
                </li>
                <li>
                    <a href="#none">고객센터</a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="depth">
            <span class="depth-Arrow">></span><strong>임용정보</strong>
        </span>
        <span class="depth">
            <span class="depth-Arrow">></span><strong>자료실</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide-Ssam">
            <h4 class="NG">자료실</h4>
            <div class="willbes-Leclist c_both">
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 15%">
                            <col style="width: 15%">
                            <col>
                            <col style="width: 10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>
                                    <select id="SEARCHTYPE" name="SEARCHTYPE">
                                        <option value="">연도</option>                                    
                                        <option value="2020">2020</option>                                    
                                        <option value="2019">2019</option>                                    
                                        <option value="2018">2018</option>                                    
                                        <option value="2017">2017</option>                                    
                                        <option value="2016">2016</option>                                    
                                        <option value="2015">2015</option>                                    
                                    </select>
                                    <span class="row-line">|</span>
                                </th>
                                <th>
                                    <select id="SEARCHKIND" name="SEARCHKIND" class="cfc">
                                        <option value="">전체</option>                                    
                                        <option value="1">교육학</option>                                                    
                                        <option value="2">전공국어</option>                                                    
                                        <option value="3">전공영어</option>                                                    
                                        <option value="4">전공수학</option>                                                    
                                        <option value="5">지리</option>                                                    
                                        <option value="6">전공체육</option>                                    
                                    </select>
                                    <span class="row-line">|</span>
                                </th>
                                <th>제목<span class="row-line">|</span></th>
                                <th>첨부</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w-type">2020</td>
                                <td class="w-area">교육학</td>
                                <td class="w-list tx-left pl20">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                                <td class="w-file"><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a></td>
                            </tr>
                            <tr>
                                <td class="w-type">2020</td>
                                <td class="w-area">전공국어</td>
                                <td class="w-list tx-left pl20">2018년 제2차경찰공무원(순경)채용시험 공고</td>
                                <td class="w-file"><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a></td>
                            </tr>
                            <tr>
                                <td class="w-type">2020</td>
                                <td class="w-area">교육학</td>
                                <td class="w-list tx-left pl20">2018년 제1차 경찰공무원채용 필기시험 가답안 공지</td>
                                <td class="w-file"><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}" /></a></td>
                            </tr>
                            <tr>
                                <td class="w-type">2020</td>
                                <td class="w-area">전공국어</td>
                                <td class="w-list tx-left pl20">2018년 제1차 경찰공무원(순경) 채용 필기시험 합격자 공고</td>
                                <td class="w-file"><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}" /></a></td>
                            </tr>
                            <tr>
                                <td class="w-type">2020</td>
                                <td class="w-area">교육학</td>
                                <td class="w-list tx-left pl20">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                                <td class="w-file"><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}" /></a></td>
                            </tr>
                            <tr>
                                <td class="w-type">2020</td>
                                <td class="w-area">전공국어</td>
                                <td class="w-list tx-left pl20">2018년 제2차경찰공무원(순경) 채용시험 공고</td>
                                <td class="w-file"><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}" /></a></td>
                            </tr>
                            <tr>
                                <td class="w-type">2020</td>
                                <td class="w-area">교육학</td>
                                <td class="w-list tx-left pl20">2018년 제1차 경찰공무원채용 필기시험 가답안 공지</td>
                                <td class="w-file"><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}" /></a></td>
                            </tr>
                            <tr>
                                <td class="w-type">2020</td>
                                <td class="w-area">전공국어</td>
                                <td class="w-list tx-left pl20">2018년 제1차 경찰공무원(순경)채용 필기시험 합격자 공고</td>
                                <td class="w-file"><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}" /></a></td>
                            </tr>
                            <tr>
                                <td class="w-type">2020</td>
                                <td class="w-area">교육학</td>
                                <td class="w-list tx-left pl20">2018년 제1차 경찰공무원채용 필기시험 가답안 공지</td>
                                <td class="w-file"><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}" /></a></td>
                            </tr>
                            <tr>
                                <td class="w-type">2020</td>
                                <td class="w-area">전공국어</td>
                                <td class="w-list tx-left pl20">2018년 제1차 경찰공무원(순경)채용 필기시험 합격자 공고</td>
                                <td class="w-file"><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}" /></a></td>
                            </tr>
                            <tr>
                                <td class="w-type">2020</td>
                                <td class="w-area">전공영어</td>
                                <td class="w-list tx-left pl20">2018년 하반기 경찰공무원 경력경쟁채용시험 공고</td>
                                <td class="w-file"><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}" /></a></td>
                            </tr>
                            <tr>
                                <td class="w-list tx-center" colspan="4">등록된 자료가 없습니다.</td>
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
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop