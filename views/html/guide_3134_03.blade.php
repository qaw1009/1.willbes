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
            <span class="depth-Arrow">></span><strong>지역별 공고문</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide-Ssam">
            <h4 class="NG">지역별 공고문</h4>
            <div class="guidebox GM">                   
                <table>
                    <tbody>
                        <tr>
                            <th rowspan="10">2020<BR>
                            학년도 </th>
                            <th>지역</th>
                            <th>유아 · 초등</th>
                            <th>중등</th>
                            <th>지역</th>
                            <th>유아 · 초등</th>
                            <th>중등</th>
                        </tr>
                        <tr>
                            <td>서울특별시</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td>경기도</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                        </tr>
                        <tr>
                            <td>인천광역시</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td>충청북도</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                        </tr>
                        <tr>
                            <td>대전광역시</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td>충청남도</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                        </tr>
                        <tr>
                            <td>세종시</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td>전라북도</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                        </tr>
                        <tr>
                            <td>광주광역시</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td>전라남도</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                        </tr>
                        <tr>
                            <td>대구광역시</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td>강원도</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                        </tr>
                        <tr>
                            <td>울산광역시</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td>경상북도</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                        </tr>
                        <tr>
                            <td>부산광역시</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td>경상남도</td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td><a href="#none" class="btn01">자료받기 ></a></td>
                        </tr>
                        <tr>
                          <td>제주도</td>
                          <td><a href="#none" class="btn01">자료받기 ></a></td>
                          <td><a href="#none" class="btn01">자료받기 ></a></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
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