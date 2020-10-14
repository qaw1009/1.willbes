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
            <span class="depth-Arrow">></span><strong>임용 교수채용</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="w-Guide-Ssam">
            <h4 class="NG">임용 교수채용</h4>
            <div class="request_con NSK">
                <p class="txt01">RECRUITMENT</p>
                <p class="txt03">교육에 대한 열정을 가지고 계신 교수님을</p>
                <p class="txt02 NSK-Black">윌비스 임용고시 학원에서 모시고자 합니다<i>!</i></p>
                <img src="https://static.willbes.net/public/images/promotion/main/2018/professor_img00.png" alt="">
                <p class="txt04">교원임용시험은 교사에 대한 처우개선 및 직업의 안정성으로 인하여 가장 선호되고 있는 시험 중 하나이며,<br>임용고시는 순위고사라는 우선 임용제 방식에서 91년도부터 공개경쟁채용시험으로 변경되어 선발하고 있습니다.</p>
                <div class="request_txtWrap">
                    <p class="txt01">“ 윌비스와 함께 큰 뜻을 이뤄나갈 준비가 되셨다면,<br>아래 연락처로 연락 주시면 감사하겠습니다.”</p>
                    <p class="txt02"><span>과목 :</span> 임용시험 전과목</p>
                    <p class="txt02"><span>담당자 :</span> 교원임용 본부장 최창식 ( 010-7167-2329 / genie001@willbes.com )</p>
                    <p class="txt02"><span>학원문의 :</span> 1544-3169</p>
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