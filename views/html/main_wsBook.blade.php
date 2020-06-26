@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->

<div id="Container" class="Container hanlim3094 NSK c_both">
    <div class="Section widthAuto">
        <div class="wsSearchWrap">
            <div class="wsSearch NSK">
                <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">                
                    <input type="hidden" name="cate" id="unifiedSearch_cate" value="{{$__cfg['CateCode']}}">
                    <select name="search_type">
                        <option value="0">통합검색</option>
                        <option value="1">도서명</option>
                        <option value="2">저자명</option>                            
                        <option value="3">출판사</option>
                    </select>
                    <input type="text" name="" class="d_none">                
                    <input type="search" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="검색어를 입력하세요." maxlength="100"/>
                    <label for="onsearch" class="NSK-Black"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">Search</button></label>
                </form>
            </div>
            <div class="keyword">
                <strong>윌스토리 인기검색어</strong>										
                <a href="#none">김정일</a>                 
                <a href="#none">김유향</a>                 
                <a href="#none">PSAT</a>                 
                <a href="#none">김동진</a>                
                <a href="#none">NCS</a>                 
                <a href="#none">로스쿨</a>                 
                <a href="#none">나무경영아카데미</a>                 
                <a href="#none">노무사</a>                 
                <a href="#none">황종휴</a> 
            </div>
        </div>
    </div>

    <div class="Menu NG c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">윌스토리<span class="row-line">|</span></li>
                <li class="subTit">온라인서점</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">전체메뉴</a>
                    <div class="drop-Box-wsBook">
                        <table>
                            <col width="150px">
                            <col>
                            <tbody>
                                <tr>
                                    <th>공무원</th>
                                    <td>
                                        <div class="two-depth">
                                            <a href="#none">7/9급<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">PSAT</a><li>
                                                <li><a href="#none">국어</a><li>
                                                <li><a href="#none">영어</a><li>
                                                <li><a href="#none">한국사</a><li>
                                                <li><a href="#none">행정학</a><li>
                                                <li><a href="#none">행정법</a><li>
                                                <li><a href="#none">헌법</a><li>
                                                <li><a href="#none">경제학</a><li>
                                                <li><a href="#none">세법</a><li>
                                                <li><a href="#none">회계학</a><li>
                                                <li><a href="#none">사회복지학</a><li>
                                                <li><a href="#none">교정학</a><li>
                                                <li><a href="#none">노동법</a><li>
                                                <li><a href="#none">공직선거법</a><li>
                                                <li><a href="#none">국제법</a><li>
                                                <li><a href="#none">정치학</a><li>
                                                <li><a href="#none">교육학</a><li>
                                                <li><a href="#none">사회/과학/수학</a><li>
                                                <li><a href="#none">모의고사/기출</a><li>
                                                <li><a href="#none">기타</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">법원/등기/검찰<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">PSAT</a><li>
                                                <li><a href="#none">국어</a><li>
                                                <li><a href="#none">영어</a><li>
                                                <li><a href="#none">한국사</a><li>
                                                <li><a href="#none">행정학</a><li>
                                                <li><a href="#none">행정법</a><li>
                                                <li><a href="#none">헌법</a><li>
                                                <li><a href="#none">경제학</a><li>
                                                <li><a href="#none">세법</a><li>
                                                <li><a href="#none">회계학</a><li>
                                                <li><a href="#none">사회복지학</a><li>
                                                <li><a href="#none">교정학</a><li>
                                                <li><a href="#none">노동법</a><li>
                                                <li><a href="#none">공직선거법</a><li>
                                                <li><a href="#none">국제법</a><li>
                                                <li><a href="#none">정치학</a><li>
                                                <li><a href="#none">교육학</a><li>
                                                <li><a href="#none">사회/과학/수학</a><li>
                                                <li><a href="#none">모의고사/기출</a><li>
                                                <li><a href="#none">기타</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">군무원/장교/부사관<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">PSAT</a><li>
                                                <li><a href="#none">국어</a><li>
                                                <li><a href="#none">영어</a><li>
                                                <li><a href="#none">한국사</a><li>
                                                <li><a href="#none">행정학</a><li>
                                                <li><a href="#none">행정법</a><li>
                                                <li><a href="#none">헌법</a><li>
                                                <li><a href="#none">경제학</a><li>
                                                <li><a href="#none">세법</a><li>
                                                <li><a href="#none">회계학</a><li>
                                                <li><a href="#none">사회복지학</a><li>
                                                <li><a href="#none">교정학</a><li>
                                                <li><a href="#none">노동법</a><li>
                                                <li><a href="#none">공직선거법</a><li>
                                                <li><a href="#none">국제법</a><li>
                                                <li><a href="#none">정치학</a><li>
                                                <li><a href="#none">교육학</a><li>
                                                <li><a href="#none">사회/과학/수학</a><li>
                                                <li><a href="#none">모의고사/기출</a><li>
                                                <li><a href="#none">기타</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">소방<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">PSAT</a><li>
                                                <li><a href="#none">국어</a><li>
                                                <li><a href="#none">영어</a><li>
                                                <li><a href="#none">한국사</a><li>
                                                <li><a href="#none">행정학</a><li>
                                                <li><a href="#none">행정법</a><li>
                                                <li><a href="#none">헌법</a><li>
                                                <li><a href="#none">경제학</a><li>
                                                <li><a href="#none">세법</a><li>
                                                <li><a href="#none">회계학</a><li>
                                                <li><a href="#none">사회복지학</a><li>
                                                <li><a href="#none">교정학</a><li>
                                                <li><a href="#none">노동법</a><li>
                                                <li><a href="#none">공직선거법</a><li>
                                                <li><a href="#none">국제법</a><li>
                                                <li><a href="#none">정치학</a><li>
                                                <li><a href="#none">교육학</a><li>
                                                <li><a href="#none">사회/과학/수학</a><li>
                                                <li><a href="#none">모의고사/기출</a><li>
                                                <li><a href="#none">기타</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">기술/기능<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">PSAT</a><li>
                                                <li><a href="#none">국어</a><li>
                                                <li><a href="#none">영어</a><li>
                                                <li><a href="#none">한국사</a><li>
                                                <li><a href="#none">행정학</a><li>
                                                <li><a href="#none">행정법</a><li>
                                                <li><a href="#none">헌법</a><li>
                                                <li><a href="#none">경제학</a><li>
                                                <li><a href="#none">세법</a><li>
                                                <li><a href="#none">회계학</a><li>
                                                <li><a href="#none">사회복지학</a><li>
                                                <li><a href="#none">교정학</a><li>
                                                <li><a href="#none">노동법</a><li>
                                                <li><a href="#none">공직선거법</a><li>
                                                <li><a href="#none">국제법</a><li>
                                                <li><a href="#none">정치학</a><li>
                                                <li><a href="#none">교육학</a><li>
                                                <li><a href="#none">사회/과학/수학</a><li>
                                                <li><a href="#none">모의고사/기출</a><li>
                                                <li><a href="#none">기타</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">국회직</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">국가정보원</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">인적성/면접/기타</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">PSAT</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>고시/로스쿨</th>
                                    <td>
                                        <div class="two-depth">
                                            <a href="#none">5급공채/국립외교원<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">PSAT</a><li>
                                                <li><a href="#none">국어</a><li>
                                                <li><a href="#none">영어</a><li>
                                                <li><a href="#none">한국사</a><li>
                                                <li><a href="#none">행정학</a><li>
                                                <li><a href="#none">행정법</a><li>
                                                <li><a href="#none">헌법</a><li>
                                                <li><a href="#none">경제학</a><li>
                                                <li><a href="#none">세법</a><li>
                                                <li><a href="#none">회계학</a><li>
                                                <li><a href="#none">사회복지학</a><li>
                                                <li><a href="#none">교정학</a><li>
                                                <li><a href="#none">노동법</a><li>
                                                <li><a href="#none">공직선거법</a><li>
                                                <li><a href="#none">국제법</a><li>
                                                <li><a href="#none">정치학</a><li>
                                                <li><a href="#none">교육학</a><li>
                                                <li><a href="#none">사회/과학/수학</a><li>
                                                <li><a href="#none">모의고사/기출</a><li>
                                                <li><a href="#none">기타</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">법원행시<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">PSAT</a><li>
                                                <li><a href="#none">국어</a><li>
                                                <li><a href="#none">영어</a><li>
                                                <li><a href="#none">한국사</a><li>
                                                <li><a href="#none">행정학</a><li>
                                                <li><a href="#none">행정법</a><li>
                                                <li><a href="#none">헌법</a><li>
                                                <li><a href="#none">경제학</a><li>
                                                <li><a href="#none">세법</a><li>
                                                <li><a href="#none">회계학</a><li>
                                                <li><a href="#none">사회복지학</a><li>
                                                <li><a href="#none">교정학</a><li>
                                                <li><a href="#none">노동법</a><li>
                                                <li><a href="#none">공직선거법</a><li>
                                                <li><a href="#none">국제법</a><li>
                                                <li><a href="#none">정치학</a><li>
                                                <li><a href="#none">교육학</a><li>
                                                <li><a href="#none">사회/과학/수학</a><li>
                                                <li><a href="#none">모의고사/기출</a><li>
                                                <li><a href="#none">기타</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">로스쿨/변호사시험<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">PSAT</a><li>
                                                <li><a href="#none">국어</a><li>
                                                <li><a href="#none">영어</a><li>
                                                <li><a href="#none">한국사</a><li>
                                                <li><a href="#none">행정학</a><li>
                                                <li><a href="#none">행정법</a><li>
                                                <li><a href="#none">헌법</a><li>
                                                <li><a href="#none">경제학</a><li>
                                                <li><a href="#none">세법</a><li>
                                                <li><a href="#none">회계학</a><li>
                                                <li><a href="#none">사회복지학</a><li>
                                                <li><a href="#none">교정학</a><li>
                                                <li><a href="#none">노동법</a><li>
                                                <li><a href="#none">공직선거법</a><li>
                                                <li><a href="#none">국제법</a><li>
                                                <li><a href="#none">정치학</a><li>
                                                <li><a href="#none">교육학</a><li>
                                                <li><a href="#none">법전/법률용어사전</a><li>
                                                <li><a href="#none">모의고사/기출</a><li>
                                                <li><a href="#none">기타</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">사법연수원<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">연수원교재</a><li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>경찰</th>
                                    <td>
                                        <div class="two-depth">
                                            <a href="#none">일반경찰<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">형사소송법</a><li>
                                                <li><a href="#none">경찰학개론</a><li>
                                                <li><a href="#none">형법</a><li>
                                                <li><a href="#none">영어</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">경찰간부<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">형사소송법</a><li>
                                                <li><a href="#none">경찰학개론</a><li>
                                                <li><a href="#none">형법</a><li>
                                                <li><a href="#none">영어</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">해양경찰<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">형사소송법</a><li>
                                                <li><a href="#none">경찰학개론</a><li>
                                                <li><a href="#none">형법</a><li>
                                                <li><a href="#none">영어</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">경행경채<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">형사소송법</a><li>
                                                <li><a href="#none">경찰학개론</a><li>
                                                <li><a href="#none">형법</a><li>
                                                <li><a href="#none">영어</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">경찰승진<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">형사소송법</a><li>
                                                <li><a href="#none">경찰학개론</a><li>
                                                <li><a href="#none">형법</a><li>
                                                <li><a href="#none">영어</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">인적성/면접/기타</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>임용</th>
                                    <td>
                                        <div class="two-depth">
                                            <a href="#none">교육학</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">유아/초등/특수</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">중등<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">전공국어</a><li>
                                                <li><a href="#none">전공영어</a><li>
                                                <li><a href="#none">전공수학</a><li>
                                                <li><a href="#none">전공생물</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">실기/면접</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">기타</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>전문자격증</th>
                                    <td>
                                        <div class="two-depth">
                                            <a href="#none">회계사<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">전공국어</a><li>
                                                <li><a href="#none">전공영어</a><li>
                                                <li><a href="#none">전공수학</a><li>
                                                <li><a href="#none">전공생물</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">세무사<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">전공국어</a><li>
                                                <li><a href="#none">전공영어</a><li>
                                                <li><a href="#none">전공수학</a><li>
                                                <li><a href="#none">전공생물</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">노무사<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">전공국어</a><li>
                                                <li><a href="#none">전공영어</a><li>
                                                <li><a href="#none">전공수학</a><li>
                                                <li><a href="#none">전공생물</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">감정평가사<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">전공국어</a><li>
                                                <li><a href="#none">전공영어</a><li>
                                                <li><a href="#none">전공수학</a><li>
                                                <li><a href="#none">전공생물</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">변리사<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">전공국어</a><li>
                                                <li><a href="#none">전공영어</a><li>
                                                <li><a href="#none">전공수학</a><li>
                                                <li><a href="#none">전공생물</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">법무사<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">전공국어</a><li>
                                                <li><a href="#none">전공영어</a><li>
                                                <li><a href="#none">전공수학</a><li>
                                                <li><a href="#none">전공생물</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">관세사<span>∨<span></a>
                                            <ul class="three-depth">
                                                <li><a href="#none">전공국어</a><li>
                                                <li><a href="#none">전공영어</a><li>
                                                <li><a href="#none">전공수학</a><li>
                                                <li><a href="#none">전공생물</a><li>
                                            </ul>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">행정사</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">손해사정사</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">재경관리사</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">국제내부감사사</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">기타</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>취업/자격증</th>
                                    <td>
                                        <div class="two-depth">
                                            <a href="#none">한국어능력</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">한국사능력</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">한자능력</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">기술사/기사</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">산업기사/기능사</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">기업별적성검사/NCS</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">공기업/대기업</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">공인중개사/주택관리사</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">경제/금융</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">세무/회계</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">무역/유통/물류/경영</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">조리/미용/패션</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">보건/위생</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">운전/교통/공항/IT</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">국가(민간)공인자격</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">사회복지사</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">면접/상식/기타</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>어학</th>
                                    <td>
                                        <div class="two-depth">
                                            <a href="#none">TOEIC/TOFLE</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">G-TELP</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">TEPS</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">영작</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">독해</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">문법</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">어휘</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">영어일반</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">회화</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">제2외국어</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">기타</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>학점/편입/독학사</th>
                                    <td>
                                        <div class="two-depth">
                                            <a href="#none">법학</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">경영/경제/행정/회계</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">정보통신공학</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">CPA(공인회계사) 선행</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">편입</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">독학사</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">검정고시</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">기타</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>초/중고 참고서</th>
                                    <td>
                                        <div class="two-depth">
                                            <a href="#none">초등</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">중등</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">고등/수능</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">면접/자소서/기타</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>유아/어린이/가정</th>
                                    <td>
                                        <div class="two-depth">
                                            <a href="#none">그림책</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">놀이책/교구</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">교육/학습</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">유아식</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">육아</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">전집/세트</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">문학/동화</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">기타</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>일반서적</th>
                                    <td>
                                        <div class="two-depth">
                                            <a href="#none">소설/문학/에세이</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">인문/교양/심리</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">정치/사회/법학</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">경제/경영/금융</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">자기계발</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">역사/문화</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">자연/과학/IT</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">종교/예술/대중문화</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">건강/뷰티</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">가정/생활/요리</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">여행/취미/실용</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">만화/잡지</a>
                                        </div>
                                        <div class="two-depth">
                                            <a href="#none">공학/의학/기술</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </li>
                <li>
                    <a href="#none">베스트셀러</a>
                </li>
                <li>
                    <a href="#none">신간안내</a>
                </li>
                <li>
                    <a href="#none">이벤트/기획전</a>
                </li>
                <li>
                    <a href="#none">윌비스출판사</a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Section p_re">        
        <div class="MainVisual NSK">            
            <div class="VisualBox">
                <div class="bSlider">
                    <div class="sliderStopAutoPager">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_725x400.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_725x400.jpg" alt="배너명"></a></div>
                    </div>
                </div>
            </div>
            <div class="VisualsubBox">
                <div class="bSlider VisualsubBoxTop">                    
                    <div class="slider">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_364x128.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_364x128.jpg" alt="배너명"></a></div>
                    </div>
                </div>   
                <div class="bSlider">
                    <div class="sliderStopAutoPager">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_364x248.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_364x248.jpg" alt="배너명"></a></div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
    
    <div class="Section barBnr">
        <div class="widthAuto">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3094_1120x20_sample.jpg" alt="배너명"></a>
        </div>
    </div> 

    <div class="Section mt50">
        <div class="widthAuto"> 
            <div class="noticeTabs">
                <div class="will-listTit">학원 공지사항</div>
                <div class="tabBox noticeBox">
                    <div class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><span>EVENT</span>2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none"><span>EVENT</span>2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">[공지] 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="noticeTabs">
                <div class="will-listTit">동영상 공지사항</div>
                <div class="tabBox noticeBox">
                    <div class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><span>EVENT</span>2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none"><span>EVENT</span>2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">[공지] 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="noticeTabs mr-zero">
                <div class="will-listTit">강의계획서</div>
                <div class="tabBox noticeBox">
                    <div class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none">2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    <div class="Section mt30">
        <div class="widthAuto"> 
            <ul id="goMenu" class="goMenu" >
                <li><a href="#none">학원수강신청<span>|</span></a></li>
                <li><a href="#none">학원보강<span>|</span></a></li>
                <li><a href="#none">강의실배정표<span>|</span></a></li>
                <li><a href="#none">신규동영상안내<span>|</span></a></li>
                <li><a href="#none">무료특강<span>|</span></a></li>
                <li><a href="#none">강의자료실</a></li>
            </ul>
        </div>
    </div>

    <div class="Section lecBanner mt50">
        <div class="widthAuto">
            <div class="copyTit NSK-Thin mb50">
                꿈을 향한 소중한 첫 걸음부터, <strong class="NSK-Black"><span class="tx-color">합격의 순간</span></strong>까지!<br />
                29년을 이어온 대표전문학원, <strong class="NSK-Black"><span class="tx-color">윌비스 한림법학원</span></strong>이 함께 합니다!!
            </div>
            <ul>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200115095837.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200115102038.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200123131907.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200128152955.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200128153052.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200131165936.jpg" alt="배너명"></a></li>                
            </ul>
        </div>
    </div>

    {{--이달의 강의 / 강의맛보기 --}}
    <div class="Section Section1">
        <div>
            <div class="copyTit">
                <strong class="NSK-Black">WILLBES 한림법학원</strong> <strong class="NSK-Black"><span class="tx-color">이달의 강의</span></strong>
            </div>
            <div class="thisMonth NSK">
                <div class="thisMonthBox">
                    <ul class="tmslider">
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/prof_index_50769.png">
                                <div class="tx-color">
                                    미시경제학 3대 難題 복습 특강
                                    <span class="NSK-Black">황종휴<span>
                                </div>
                                <div>경제학을 위한 기초수학 동영상 무료업로드!</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50837/prof_index_50837.png">
                                <div class="tx-color">
                                    행정법 예비순환
                                    <span class="NSK-Black">김정일</span>
                                </div>
                                <div>기본서(행정법강의)를 중심으로 행정법의 전체흐름과 주요내용을 학습, 법학의 기초개념을 마스터하고</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50838/prof_index_50838.png">
                                <div class="tx-color">
                                    2020 행정법 GS3순환
                                    <span class="NSK-Black">박도원</span>
                                </div>
                                <div>행정법 GS3순환(미시+거시) + 매일모의고사추가</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50839/prof_index_50839_1578624621.png">
                                <div class="tx-color">
                                    경제학 예비순환
                                    <span class="NSK-Black">김기홍</span>
                                </div>
                                <div>경제학 10개년 기출문제 연도별 해설특강(2019년기출..</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50841/prof_index_50841.png">
                                <div class="tx-color">
                                    경제학 예비순환
                                    <span class="NSK-Black">이동호</span>
                                </div>
                                <div>경제학 10개년 기출문제 연도별 해설특강(2019년기출..</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50848/prof_index_50848.png">
                                <div class="tx-color">
                                    경제학 예비순환
                                    <span class="NSK-Black">최승호</span>
                                </div>
                                <div>경제학 10개년 기출문제 연도별 해설특강(2019년기출..</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50852/prof_index_50852_1586137263.png">
                                <div class="tx-color">
                                    경제학 예비순환
                                    <span class="NSK-Black">안진우</span>
                                </div>
                                <div>경제학 10개년 기출문제 연도별 해설특강(2019년기출..</div>
                            </a>
                        </li>
                    </ul>  
                    <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>                 
                </div>
            </div>

            <div class="copyTit mt100">
                <strong class="NSK-Black">윌비스</strong> <strong class="NSK-Black"><span class="tx-color">대표 강의 맛보기</span></strong>
            </div>
            <div class="preview NSK">
                <div class="previewBox">
                    <ul class="pvslider">
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/prof_index_50769.png">
                                <div>
                                    오리엔테이션, 무역모형기초 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50837/prof_index_50837.png">
                                <div>
                                    03월 27일 : 제 10회 모의고사 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50838/prof_index_50838.png">
                                <div>
                                    09월 04일 : 2019 학제통합논술Ⅰ~ 학논Ⅱ2-1문 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50839/prof_index_50839_1578624621.png">
                                <div>
                                    오리엔테이션, 무역모형기초 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50841/prof_index_50841.png">
                                <div>
                                    09월 04일 : 2019 학제통합논술Ⅰ~ 학논Ⅱ2-1문 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50848/prof_index_50848.png">
                                <div>
                                    03월 27일 : 제 10회 모의고사 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                    </ul>  
                    <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>                
                </div>
            </div>
        </div>
    </div>       
    
    <div class="Section Section4_hl mt50">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">고등고시</span> 학원</div>
            <div class="noticeTabs campus c_both">
                <ul class="tabWrap noticeWrap_campus">
                    <li><a href="#campus1" class="on">신림(본원)</a><span class="row-line">|</span></li>
                    <li><a href="#campus2" class="">강남(분원)</a></li>
                </ul>
                <div class="tabBox noticeBox_campus">
                    <div id="campus1" class="tabContent">
                        <div class="map_img">
                            <img src="https://static.willbes.net/public/images/promotion/main/2010_map01.jpg" alt="신림(본원)">
                            <span class="origin">신림(본원)</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">신림(본원)</span> 학원 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                서울 관악구 신림로 23길 16 일성트루엘 4층<br/>
                                                (신림동 1523-1)
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-1881</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="{{ site_url('/pass/support/qna/index?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 신림동 //-->

                    <div id="campus2" class="tabContent">
                        <div class="map_img">
                            <img src="https://static.willbes.net/public/images/promotion/main/2010_map02.jpg" alt="강남(분원)">
                            <span>강남(분원)</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">강남(분원)</span> 학원 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                서울 강남구 테헤란로19길 18<br>
                                                (역삼동 645-12)
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-1661</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="{{ site_url('/pass/support/qna/index?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}x">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 강남 //-->
                </div>
            </div>
        </div>
    </div>

    <div class="Section mt90 mb90 c_both">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesNumber">
                        <ul>
                            <li>
                                <div class="nTit">온라인 수강문의</div>
                                <div class="nNumber tx-color">1544-5006 <span>▶</span> 3</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 18시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">교재문의</div>
                                <div class="nNumber tx-color">1544-4944</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 17시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">학원 고객센터</div>
                                <div class="nNumber tx-color">1544-1881~3</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    평일/주말: 09시~ 18시<br/>
                                </div>
                            </li>
                        </ul>
                    </dt>    
                    <dt class="willbesCenter">
                        <div class="centerTit">윌비스 고등고시 사이트에 물어보세요!</div>
                        <ul>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">학원<br/>상담실</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">동영상<br/>상담실</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                                    <div class="nTxt">1:1<br/>고객지원</div>
                                </a>
                            </li>
                        </ul>
                    </dt>
                    
                </dl>
            </div>            
        </div>
    </div>
    <!-- CS센터 //-->

    {{-- 윌스토리 퀵영역 --}}
    <div id="QuickMenu" class="wsBookQuick">
        <ul>
            <li class="bookimg">
                <div class="lastBook">최근본책<span>(2)개</span></div>
                <div class="QuickSlider">                    
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/304013/book_304013_og.png" title="교재명"></a></div>
                        <div><a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303945/book_303945_og.png" title="교재명"></a></div>
                    </div>
                </div>
            </li>
            <li class="cart">
                <a href="#none">장바구니 (2)</a>
            </li>
            <li class="order">
                <a href="#none">주문/배송조회</a>
            </li>
            <li class="top">
                <a href="#Container">TOP</a>
            </li>
        </ul>
    </div>

</div>

<!-- End Container -->
<script type="text/javascript">
    $(function() {
        var slidesImg = $(".tmslider").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            pager:true,
            controls:false,
            minSlides:4,
            maxSlides:4,
            slideWidth: 274,
            slideMargin:8,
            autoHover: true,
            moveSlides:1,
            pager:true,
        });
        $("#imgBannerLeft").click(function (){
            slidesImg.goToPrevSlide();
        });

        $("#imgBannerRight").click(function (){
            slidesImg.goToNextSlide();
        });
    });

    $(function() {
        var slidesImg1 = $(".pvslider").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            pager:true,
            controls:false,
            minSlides:3,
            maxSlides:3,
            slideWidth: 460,
            slideMargin:10,
            autoHover: true,
            moveSlides:1,
            pager:true,
        });
        $("#imgBannerLeft1").click(function (){
            slidesImg1.goToPrevSlide();
        });

        $("#imgBannerRight1").click(function (){
            slidesImg1.goToNextSlide();
        });
    });
</script>
@stop