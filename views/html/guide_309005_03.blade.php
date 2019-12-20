@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">전문자격증<span class="row-line">|</span></li>
                <li class="subTit">관세사</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">교수진소개 메인</li>
                            <li><a href="#none">신규강좌게시판</li>
                            <li><a href="#none">경제학</a></li>
                            <li><a href="#none">행정법</a></li>
                            <li><a href="#none">행정학</a></li>
                            <li><a href="#none">정치학</a></li>
                            <li><a href="#none">국제법</a></li>
                            <li><a href="#none">재정학</a></li>
                            <li><a href="#none">정책학</a></li>
                            <li><a href="#none">정보체계론</a></li>
                            <li><a href="#none">국제경제학</a></li>
                            <li><a href="#none">교육학</a></li>
                            <li><a href="#none">PSAT</a></li>
                            <li><a href="#none">영어</a></li>
                            <li><a href="#none">한국사능력검정시험</a></li>
                            <li class="Tit">교수님 홈</li>
                            <li><a href="#none">개설강좌</a></li>
                            <li><a href="#none">무료강좌</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">학습자료실</a></li>
                            <li><a href="#none">수강후기</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">학원강의신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">학원강의신청</a></li>
                            <li><a href="#none">방문결제접수</a></li>
                            <li><a href="#none">학원공지사항</a></li>
                            <li><a href="#none">강의실배정표</a></li>
                            <li><a href="#none">강의시간표</a></li>
                            <li><a href="#none">강의자료실</a></li>
                            <li><a href="#none">강의계획서</a></li>
                            <li><a href="#none">전국모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">온라인수강신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">단강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="#none">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">수험정보</a></li>
                            <li><a href="#none">학습가이드</a></li>
                            <li><a href="#none">시험통계</a></li>
                            <li><a href="#none">수험 FAQ</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재구매</a>
                </li>
                <li class="dropdown">
                    <a href="#none">고객센터</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">고객센터 HOME</a></li>
                            <li><a href="#none">자주하는 질문</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">1:1 상담</a></li>
                            <li class="Tit">수강지원</li>
                            <li><a href="#none">PC원격지원</a></li>
                            <li><a href="#none">학습프로그램설치</a></li>
                        </ul>
                    </div>
                </li>
                <li class="hanlim3094">
                    <a href="#none" target="_self">
                        학원 방문 결제 
                        <span class="arrow-Btn">></span>
                    </a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>시험안내</strong>
            <span class="depth-Arrow">></span><strong>합격자 현황</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide">
            <h3 class="NSK-Black">합격자 현황</h3>
            <h4 class="NGR">최근 수험인원 및 합격자현황(2006 ~ 2017)</h4>
            <div>
                <table cellspacing="0" cellpadding="0" class="table-Guided">
                    <colgroup>
                        <col width="15%">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th rowspan="2">년도/회별</th>
                            <th colspan="3">제1차시험</th>
                            <th colspan="3">제2차시험</th>
                        </tr>
                        <tr>
                            <th>대상</th>
                            <th>응시</th>
                            <th>합격</th>
                            <th>대상</th>
                            <th>응시</th>
                            <th>합격</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>2017 제34회</th>
                            <td>3,487</td>
                            <td>2,808</td>
                            <td>967</td>
                            <td>1,798</td>
                            <td>1,459</td>
                            <td>90</td>
                        </tr>
                        <tr>
                            <th>2016 제33회</th>
                            <td>3,598</td>
                            <td>2,851</td>
                            <td>1,008</td>
                            <td>1,587</td>
                            <td>1,316</td>
                            <td>90</td>
                        </tr>
                        <tr>
                            <th>2015 제32회</th>
                            <td>3,754</td>
                            <td>2,781</td>
                            <td>666</td>
                            <td>1,181</td>
                            <td>972</td>
                            <td>91</td>
                        </tr>
                        <tr>
                            <th>2014 제31회</th>
                            <td>2,952</td>
                            <td>2,208</td>
                            <td>571</td>
                            <td>1,080</td>
                            <td>867</td>
                            <td>90</td>
                        </tr>
                        <tr>
                            <th>2013 제30회</th>
                            <td>2,689</td>
                            <td>1,857</td>
                            <td>539</td>
                            <td>819</td>
                            <td>678</td>
                            <td>77</td>
                        </tr>
                        <tr>
                            <th>2012 제29회</th>
                            <td>2,055</td>
                            <td>1,520</td>
                            <td>274</td>
                            <td>516</td>
                            <td>419</td>
                            <td>75</td>
                        </tr>
                        <tr>
                            <th>2011 제28회</th>
                            <td>1,894</td>
                            <td>1,324</td>
                            <td>225</td>
                            <td>436</td>
                            <td>343</td>
                            <td>75</td>
                        </tr>
                        <tr>
                            <th>2010 제27회</th>
                            <td>1,765</td>
                            <td>1,266</td>
                            <td>187</td>
                            <td>439</td>
                            <td>327</td>
                            <td>75</td>
                        </tr>
                        <tr>
                            <th>2009 제26회</th>
                            <td>1,596</td>
                            <td>1,132</td>
                            <td>242</td>
                            <td>672</td>
                            <td>469</td>
                            <td>86</td>
                        </tr>
                        <tr>
                            <th>2008 제25회</th>
                            <td>1,522</td>
                            <td>1,095</td>
                            <td>469</td>
                            <td>774</td>
                            <td>452</td>
                            <td>75</td>
                        </tr>
                        <tr>
                            <th>2007 제24회</th>
                            <td>1,558</td>
                            <td>1,125</td>
                            <td>318</td>
                            <td>695</td>
                            <td>437</td>
                            <td>75</td>
                        </tr>
                        <tr>
                            <th>2006 제23회</th>
                            <td>1,506</td>
                            <td>1,017</td>
                            <td>395</td>
                            <td>926</td>
                            <td>552</td>
                            <td>75</td>
                        </tr>
                        <tr>
                            <th>계</th>
                            <td>28,376</td>
                            <td> 20,984</td>
                            <td>5,861</td>
                            <td> 10,923</td>
                            <td>8,291</td>
                            <td>974</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>      
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop