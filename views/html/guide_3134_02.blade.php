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
            <span class="depth-Arrow">></span><strong>임용시험 최근 10년 동향</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide-Ssam">
            <h4 class="NG">임용시험 최근 10년 동향</h4>
            <div class="tabBox NG">
                <ul class="tabShow tabSsam">
                    <li><a href="#trend_guide1" class="on">유아</a></li>
                    <li><a href="#trend_guide2">초등</a></li>
                    <li><a href="#trend_guide3">중등전체</a></li>
                    <li><a href="#trend_guide4">국어</a></li>
                    <li><a href="#trend_guide4">영어</a></li>
                    <li><a href="#trend_guide4">수학</a></li>
                    <li><a href="#trend_guide4">도덕윤리</a></li>
                    <li><a href="#trend_guide4">체육</a></li>
                    <li><a href="#trend_guide4">음악</a></li>
                    <li><a href="#trend_guide4">생물</a></li>
                    <li><a href="#trend_guide4">중국어</a></li>
                    <li><a href="#trend_guide4">전기전자통신</a></li>
                    <li><a href="#trend_guide4">정보컴퓨터</a></li>
                    <li><a href="#trend_guide4">보건</a></li>
                </ul>             
            </div>
            <div class="tabContent GM">
                <div id="trend_guide1">                    
                    <div>
                        그래프 1
                    </div>
                    <div>
                        그래프 2
                    </div>
                    <div class="trendData">
                        <table cellspacing="0">
                            <colgroup>
                                <col width="25%">
                                <col width="25%">
                                <col width="25%">
                                <col width="25%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>학년도</th>
                                    <th>모집</th>
                                    <th>지원</th>
                                    <th>경쟁률</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2020</td>
                                    <td>1,154</td>
                                    <td>13,103</td>
                                    <td>11.35</td>
                                </tr>
                                <tr>
                                    <td>2019 추시</td>
                                    <td>482</td>
                                    <td>12,505</td>
                                    <td>25.9</td>
                                </tr>
                                <tr>
                                    <td>2019</td>
                                    <td>948</td>
                                    <td>9,955</td>
                                    <td>10.5</td>
                                </tr>
                                <tr>
                                    <td>2018</td>
                                    <td>1,365</td>
                                    <td>8,992</td>
                                    <td>6.59</td>
                                </tr>
                                <tr>
                                    <td>2017</td>
                                    <td>596</td>
                                    <td>6,133</td>
                                    <td>10.29</td>
                                </tr>
                                <tr>
                                    <td>2016</td>
                                    <td>696</td>
                                    <td>5,597</td>
                                    <td>8.04</td>
                                </tr>
                                <tr>
                                    <td>2015</td>
                                    <td>619</td>
                                    <td>4,888</td>
                                    <td>7.9</td>
                                </tr>
                                <tr>
                                    <td>2014</td>
                                    <td>397</td>
                                    <td>4,418</td>
                                    <td>11.13</td>
                                </tr>
                                <tr>
                                    <td>2013</td>
                                    <td>578</td>
                                    <td>3,863</td>
                                    <td>6.68</td>
                                </tr>
                                <tr>
                                    <td>2012</td>
                                    <td>234</td>
                                    <td>4,664</td>
                                    <td>19.93</td>
                                </tr>
                                <tr>
                                    <td>2011</td>
                                    <td>113</td>
                                    <td>5,079</td>
                                    <td>44.95</td>
                                </tr>
                            </tbody>
                        </table>
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