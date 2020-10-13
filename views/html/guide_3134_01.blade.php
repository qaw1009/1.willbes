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
            <span class="depth-Arrow">></span><strong>임용가이드</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide-Ssam">
            <div class="tabBox NG">
                <ul class="tabShow">
                    <li><a href="#ssam_guide1" class="on">임용시험이란?</a></li>
                    <li><a href="#ssam_guide2">한국사 능력 검정시험 안내</a></li>
                    <li><a href="#ssam_guide3">유아·초등임용시험개요</a></li>
                    <li><a href="#ssam_guide4">중등임용시험개요</a></li>
                </ul>  
                <div class="guideBtn">
                    <a href="#none">유아임용 가이드북</a>
                    <a href="#none">중등임용 가이드북</a>
                </div>              
            </div>
            <div class="tabContent GM">
                <div id="ssam_guide1">
                    <h4 class="NG">임용시험안내</h4>
                    <div>
                        - 유/초/특수 및 중등학교 교원이 되기 위해서는 해당 학교급 임용시험에 합격해야 합니다.
                        <div class="mt20">
                            <strong>1. 조건</strong><br>
                            1) 임용시험에 응시하기 위해서는 <span class="underline">①교원 자격(증)-취득 예정자도 가능, ②3급 이상 한국사능력검정시험 자격(증)</span>이 필요합니다.<br>
                            <br>
                            <span class="underline">① 교원 자격증(2급 정교사 자격증) 취득 방법</span><br>
                            - 2급 정교사 자격증을 취득하기 위해서는 크게 세 가지 방법을 선택할 수 있습니다. <br>
                            ㉠ 교육대학 또는 사범대학(○○교육과) 교육과정 이수 <br>
                            ㉡ 일반대학 교직이수 <br>
                            ㉢ 교육대학원 교원양성과정 진학 후 정해진 학점(전공+교직) 이수 <br>
                            <br>
                            ② 한국사능력검정 자격증 취득 방법<br>
                            - 한국사능력검정시험은 국사편찬위원회 주관으로 1년에 5~6회(2020년 5회, 2021년부터 6회) 진행됩니다. 
                            시험은 기존에는 고급, 중급, 초급, 3종류의 형태로 출제되었으나, 2020년 5월시험(47회)부터는 시험제도가 개편되어 
                            심화(1,2,3급), 기본(4,5,6)으로 출제될 예정입니다. 교원임용시험을 위해서는 시험제도의 개편여부와 상관없이 3급이상 자격증을 준비해야 합니다. <br>
                        </div>

                        <div class="mt20">
                            <div>
                                <div>[현행 시험제도]</div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>시험종류</th>
                                            <th>인증등급</th>
                                            <th>합격점수 </th>
                                            <th>문항수(객관식)</th>
                                        </tr>
                                        <tr>
                                            <th rowspan="2">고급 </th>
                                            <td>1급 </td>
                                            <td>만점의 70%이상  </td>
                                            <td rowspan="4">50문항(5지 택1) 　　</td>
                                        </tr>
                                        <tr>
                                            <td>2급 </td>
                                            <td>만점의 60%이상  </td>
                                        </tr>
                                        <tr>
                                        <th rowspan="2">중급 </th>
                                            <td>3급 </td>
                                            <td>만점의 70%이상  </td>
                                        </tr>
                                        <tr>
                                            <td>4급 </td>
                                            <td>만점의 60%이상  </td>
                                        </tr>
                                        <tr>
                                        <th rowspan="2">초급 </th>
                                            <td>5급 </td>
                                            <td>만점의 70%이상  </td>
                                            <td rowspan="2">40문항(4지 택1) </td>
                                        </tr>
                                        <tr>
                                            <td>6급 </td>
                                            <td>만점의 60%이상  </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div>
                                <div>[(2020년 5월부터) 개편된 시험제도]</div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>시험종류</th>
                                            <th>인증등급</th>
                                            <th>합격점수 </th>
                                            <th>문항수(객관식)</th>
                                        </tr>
                                        <tr>
                                            <th rowspan="3">심화 </th>
                                            <td>1급 </td>
                                            <td>만점의 80%이상  </td>
                                            <td rowspan="3">50문항(5지 택1) 　</td>
                                        </tr>
                                        <tr>
                                            <td>2급 </td>
                                            <td>만점의 70%이상  </td>
                                        </tr>
                                        <tr>
                                            <td>3급 </td>
                                            <td>만점의 60%이상  </td>
                                        </tr>
                                        <tr>
                                            <th rowspan="3">기본 </th>
                                            <td>4급 </td>
                                            <td>만점의 80%이상  </td>
                                            <td rowspan="3">50문항(4지 택1) 　</td>
                                        </tr>
                                        <tr>
                                            <td>5급 </td>
                                            <td>만점의 70%이상  </td>
                                        </tr>
                                        <tr>
                                            <td>6급 </td>
                                            <td>만점의 60%이상  </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt20">                            
                            <strong>2. 시험 구성</strong><br>
                            1) 임용시험은 총 1, 2차로 구성되며, 일부 시도교육청은 2차 시험을 자체적으로 출제하므로 반드시 해당 시도교육청 공고문을 확인해야 합니다.<br>
                            2) 2020학년도 중등학교 교사 임용시험 제1차 시험 변동 사항은 홈페이지 내 공지사항에 안내되어 있으며, 이와 관련한 자세한 내용은 ‘한국교육과정평가원’ 홈페이지를 참조하시기 바랍니다.
                        </div>
                        <ul class="guideBtn02 NG">
                            <li><a href="#none">홈페이지 공지사항<br>확인하기 ></a><li>
                            <li><a href="#none">한국교육과정평가원<br>사이트로 이동하기 ></a><li>
                            <li><a href="#none">'2020학년도 중등임용시험문항유형 및 <br>문항수 조종안내문' 파일 확인하기 ></a><li>
                        </ul>
                    </div>
                </div>   
                <div id="ssam_guide2" class="tabContent"> 
                </div> 
                <div id="ssam_guide3" class="tabContent">
                </div>
                <div id="ssam_guide4" class="tabContent">   
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