@extends('html.layouts.master')
@section('content')

<style>
.willbes-Layer-CurriBox {
	display: none;
	background: #fff;
	position: absolute;
	top: -70px;
	right:0;
	left: 50%;
	width: 1120px;
	margin-left: -650px;
	height: 620px;
	border: 1px solid #2f2f2f;
	padding: 20px 25px 30px; 
	z-index: 110;	
}
</style>
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
            <span class="depth-Arrow">></span><strong>교수진소개</strong>
        </span>
        <span class="depth">
            <span class="depth-Arrow">></span><strong>유아</strong>
        </span>
        <span class="depth">
            <span class="depth-Arrow">></span><strong>민정선 교수님</strong>
        </span>
    </div>

    <div class="Lnb NG">
        <h2>강의안내</h2>
        <div class="lnb-List">
            <div class="lnb-List-Tit-ssam">
                <div><span class="Txt">교육학</span></div>
            </div>
            <div class="lnb-List-Depth lnb-List-Depth-ssam">
                <dl>
                    <dt><a href="#" class="">· 교육학 <span class="NGEB">이인재</span></a></dt>
                    <dt><a href="#" class="">· 교육학 <span class="NGEB">홍의일</span></a></dt>
                </dl>
            </div>

            <div class="lnb-List-Tit-ssam">
                <div><span class="Txt">유아</span></div>
            </div>
            <div class="lnb-List-Depth lnb-List-Depth-ssam">
                <dl>
                    <dt><a href="#" class="">· 유아 <span class="NGEB">민정선</span></a></dt>
                </dl>
            </div>

            <div class="lnb-List-Tit-ssam">
                <div><span class="Txt">초등</span></div>
            </div>
            <div class="lnb-List-Depth lnb-List-Depth-ssam">
                <dl>
                    <dt><a href="#" class="">· 초등 <span class="NGEB">배재민</span></a></dt>
                </dl>
            </div>

            <div class="lnb-List-Tit-ssam">
                <div><span class="Txt">중등</span></div>
            </div>
            <div class="lnb-List-Depth lnb-List-Depth-ssam">
                <dl>
                    <dt><a href="#" class="">· 전공국어 <span class="NGEB">송원영</span></a></dt>
                    <dt><a href="#" class="">· 전공국어 <span class="NGEB">이원근</span></a></dt>
                    <dt><a href="#" class="">· 전공국어 <span class="NGEB">권보민</span></a></dt>
                    <dt><a href="#" class="">· 전공영어 <span class="NGEB">김유석</span></a></dt>
                    <dt><a href="#" class="">· 전공영어 <span class="NGEB">김영문</span></a></dt>
                    <dt><a href="#" class="">· 전공영어 <span class="NGEB">공훈</span></a></dt>
                    <dt><a href="#" class="">· 전공수학 <span class="NGEB">김철홍</span></a></dt>
                    <dt><a href="#" class="">· 수학교육론 <span class="NGEB">박태영</span></a></dt>
                    <dt><a href="#" class="">· 전공생물 <span class="NGEB">강치욱</span></a></dt>
                    <dt><a href="#" class="">· 생물교육론 <span class="NGEB">양혜정</span></a></dt>
                    <dt><a href="#" class="">· 도덕윤리 <span class="NGEB">김병찬</span></a></dt>
                    <dt><a href="#" class="">· 전공역사 <span class="NGEB">최용림</span></a></dt>
                    <dt><a href="#" class="">· 전공음악 <span class="NGEB">다이애나</span></a></dt>
                    <dt><a href="#" class="">· 전기전자통신 <span class="NGEB">최우영</span></a></dt>
                    <dt><a href="#" class="">· 정보컴퓨터 <span class="NGEB">송광진</span></a></dt>
                    <dt><a href="#" class="">· 정컴교육론 <span class="NGEB">장순선</span></a></dt>
                    <dt><a href="#" class="active">· 전공중국어 <span class="NGEB">정경미</span></a></dt>
                </dl>
            </div>
        <div class="lnb-List-Depth"></div>
</div>
    </div>

    <div class="Content p_re ml20 NG">
        <div class="willbes-Prof-Profile-ssam p_re mb40 NG tx-black">
            <div class="ProfImgBox">
                <div class="ProfImg"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_prof_250x834.png" alt="교수명"></div>
                <div>
                    <div class="ProfName NSK-Black">전기전자통신 <span>최우영</span> 교수</div>
                    <div class="ProfCareer">
                        現) 윌비스 임용고시학원 유아임용 대표 교수<br>
                        現) 교육사랑 교컴 [아동생활지도사] 강의<br>
                        現) 배화여자대학교 평생교육원 아동학과 강사<br>
                        중앙대학교 유아교육과 박사 과정
                    </div>
                </div>
            </div>

            <div class="prof-profile p_re">
                <ul class="prof-brief-btn">
                    <li>
                        <a href="https://www.willbes.net" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/main/2018/prof_icon01.png" alt="홈페이지"> 교수 홈페이지
                        </a>
                    </li>
                    <li>
                        <a href="https://section.cafe.naver.com" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/main/2018/prof_icon02.png" alt="카페"> 교수 카페
                        </a>
                    </li>
                    <li>
                        <a href="https://section.blog.naver.com/BlogHome.nhn?directoryNo=0&currentPage=1&groupId=0" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/main/2018/prof_icon03.png" alt="블로그"> 교수 블로그
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="openWin('Layerprof'),openWin('Curriculum')">
                            <img src="https://static.willbes.net/public/images/promotion/main/2018/prof_icon04.png" alt="커리큘럼"> 커리큘럼
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="openWin('Layerprof'),openWin('Reply')">
                            <img src="https://static.willbes.net/public/images/promotion/main/2018/prof_icon05.png" alt="수강후기"> 수강후기
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="openWin('Layerprof'),openWin('profBoard')">
                            <img src="https://static.willbes.net/public/images/promotion/main/2018/prof_icon08.png" alt="첨삭게시판"> 첨삭게시판
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2018/prof_icon_qna.png" alt="Q&A"> Q&A
                        </a>
                    </li>
                    {{--
                    <li class="sampleLec">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2018/prof_icon07.png" alt="샘플강의"> 샘플강의
                        </a>
                    </li>
                    --}}
                </ul>

                <div class="ProfBoard">
                    <div class="willbes-listTable mr25">
                        <div class="will-Tit NG">공지사항 <a class="f_right" href="#none" onclick="openWin('Layerprof'),openWin('profNotice')"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
                        <ul class="List-Table tx-gray">
                            <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a><img src="{{ img_url('cop/icon_new.png') }}" alt="new"><span>2020-09-21</span></li>
                            <li><a href="#none">2018 [지방직/서울시] 정채영 국어 [문학집중강의] 137작품을</a><span>2020-09-21</span></li>
                            <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a><span>2020-09-21</span></li>
                            <li><a href="#none">2018 [지방직/서울시] 정채영 국어 [문학집중강의] 137작품을</a><span>2020-09-21</span></li>
                            <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a><span>2020-09-21</span></li>
                        </ul>
                    </div>
                    <div class="willbes-listTable">
                        <div class="will-Tit NG">강의 업데이트 <a class="f_right" href="#none" onclick="openWin('Layerprof'),openWin('profLecup')"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
                        <ul class="List-Table tx-gray">
                            <li><a href="#none">[직강수강생전용 자료다운용 강의] 2020 (9~10월) 실전 모의고사반</a><img src="{{ img_url('cop/icon_new.png') }}" alt="new"></li>
                            <li><a href="#none">2020 (9~10월) 실전 모의고사반 (7주)</a><img src="{{ img_url('cop/icon_new.png') }}" alt="new"></li>
                            <li><a href="#none">2020 (7~9월) 영역별 정리/문제풀이반 (10주)</a></li>
                            <li><a href="#none">[직강생전용 자료다운용 강의] (7~9월) 영역별 정리/문제풀이반</a></li>
                            <li><a href="#none">[직강생전용 자료다운용 강의] (7~9월) [논술] 영역별 예상문제 (9주+종강모고 1회)</a></li>
                        </ul>
                    </div> 
                </div>

                <ul class="prof-banner01 bSlider">
                    <li class="f_left">
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_bn_325x136.jpg" alt="배너명"></a>
                    </li>
                    <li class="f_right bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_bn_325x136.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_bn_325x136.jpg" alt="배너명"></a></div>
                        </div>
                    </li>
                </ul>               
            
            </div>

            <!-- willbes-Layer-ProfileBox -->
            <div id="Profile" class="willbes-Layer-ProfileBox">
                <a class="closeBtn" href="#none" onclick="closeWin('Layerprof'),closeWin('Profile')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">정채영</span> 교수님 프로필</div>
                <div class="Layer-Cont">
                    <div class="Layer-SubTit NG">· 약력</div>
                    <div class="Layer-Txt tx-gray">
                        · 現) 윌비스공무원국어전임<br/>
                        · 2008~2015 8년연속EBS 9,7급공무원국어전임<br/>
                        · 前)2005~2006 방송대학TV 공무원교수전임<br/>
                        · 前)박문각남부고시학원국어대표<br/>
                        · 2015 국가직지방직문제풀이강의마감<br/>
                        · 2015 국가직지방직심화이론강의마감
                    </div>
                    <div class="Layer-SubTit NG">· 저서</div>
                    <div class="Layer-Txt tx-gray">
                        · 2018 정채 영국어 마무리 시리즈[문학편]_137작품을 알려주마 (제2판)<br/> 
                        (윌비스)<br/>
                        · 2018 정채 영국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!<br/> 
                        (전정2판) (윌비스)<br/>
                        · 정채 영국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마! (제2판)<br/> 
                        (윌비스)<br/>
                        · 2018 정채 영국어 문제 종결자 (더나은)
                    </div>
                </div>
            </div>
            <!-- // willbes-Layer-ProfileBox -->

            <!-- willbes-Layer-CurriBox -->
            <div id="Curriculum" class="willbes-Layer-CurriBox">
                <a class="closeBtn" href="#none" onclick="closeWin('Layerprof'),closeWin('Curriculum')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">민정선</span> 교수님 커리큘럼</div>
                <div class="Layer-Cont">                    
                    <img src="https://static.willbes.net/public/images/promotion/sub/2017_curri.jpg"/> 
                    <ul>
                        <li><a href="#none">2022학년도 커리큘럼.jpg</a></li>
                        <li><a href="#none">2022학년도_교육학_커리큘럼_상세.hwp</a></li>
                    </ul>                   
                </div>                
            </div>
            <!-- // willbes-Layer-CurriBox -->

            <!-- willbes-Layer-ReplyBox -->
            <div id="Reply" class="willbes-Layer-ReplyBox">
                <a class="closeBtn" href="#none" onclick="closeWin('Layerprof'),closeWin('Reply'),closeWin('replyWrite'),openWin('replyListLayer')"><img src="{{ img_url('prof/close.png') }}"></a>
                <div class="Layer-Tit NG tx-dark-black">수강후기</div>

                <!-- List -->
                <div id="replyListLayer" class="Layer-Cont">
                    <div class="curriWrap c_both">
                        <div class="CurriBox">
                            <table cellspacing="0" cellpadding="0" class="curriTable curriTableLayer">
                                <colgroup>
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="tx-gray">과목선택</th>
                                        <td colspan="8">
                                            <ul class="curriSelect">
                                                <li><a href="#none">사회복지학</a></li>
                                                <li><a href="#none">국어</a></li>
                                                <li><a href="#none">영어</a></li>
                                                <li><a href="#none">한국사</a></li>
                                                <li><a href="#none">행정법</a></li>
                                                <li><a href="#none">행정학</a></li>
                                                <li><a href="#none">교육학</a></li>
                                                <li><a href="#none">수학</a></li>
                                                <li><a href="#none">독일어</a></li>
                                                <li><a href="#none">경영학</a></li>
                                                <li><a href="#none">일본어</a></li>
                                                <li><a href="#none">관세법</a></li>
                                                <li><a href="#none">공직선거법</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="tx-gray">교수선택</th>
                                        <td colspan="8" class="tx-blue tx-left">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td>
                                    </tr>
                                    <tr>
                                        <th class="tx-gray">강좌선택</th>
                                        <td colspan="8" class="tx-left">
                                            <select id="email" name="email" title="강좌를 선택해 주세요." class="seleEmail">
                                                <option selected="selected">강좌를 선택해 주세요.</option>
                                                <option value="강좌1">강좌1</option>
                                                <option value="강좌2">강좌2</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- curriWrap -->
                    <div class="willbes-Leclist c_both">
                        <div class="willbes-LecreplyList tx-gray">
                            <dl class="Select-Btn NG">
                                <dt><a class="on" href="#none">BEST순</a></dt>
                                <dt><a href="#none">최신순</a></dt>
                                <dt><a href="#none">평점순</a></dt>
                            </dl>
                            <div class="search-Btn btnAuto120 h27 f_right">
                                <button type="submit" onclick="closeWin('replyListLayer'),openWin('replyWrite')" class="mem-Btn bg-blue bd-dark-blue">
                                    <span>수강후기 작성</span>
                                </button>
                            </div>
                        </div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable replyTable upper-black upper-gray bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 90px;">
                                    <col style="width: 100px;">
                                    <col style="width: 120px;">
                                    <col style="width: 260px;">
                                    <col style="width: 90px;">
                                    <col style="width: 100px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>No<span class="row-line">|</span></li></th>
                                        <th>과목<span class="row-line">|</span></li></th>
                                        <th>교수명<span class="row-line">|</span></li></th>
                                        <th>평점<span class="row-line">|</span></li></th>
                                        <th>제목<span class="row-line">|</span></li></th>
                                        <th>작성자<span class="row-line">|</span></li></th>
                                        <th>등록일</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="replyList w-replyList">
                                        <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                        <td class="w-lec">헌법</td>
                                        <td class="w-name">정채영</td>
                                        <td class="w-star star1"></td>
                                        <td class="w-list tx-left pl20">
                                            좋은강의입니다.
                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                        </td>
                                        <td class="w-write">장동*</td>
                                        <td class="w-date">2018-00-00</td>
                                    </tr>
                                    <tr class="replyTxt w-replyTxt tx-gray">
                                        <td colspan="7">
                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                            Woo ah(우와) Dae Bark(박) 입니다!!! 정채영 교수님 수업을 온/오프라인으로 몇번 들었던 장수생입니다.
                                            계속해서 무료 강좌 시리즈를 개설해 주셔서 감사합니다! 강의의 질이나 수준도 결코 유료특강에 떨어지지 않는 수준입니다.
                                        </td>
                                    </tr>

                                    <tr class="replyList w-replyList">
                                        <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                        <td class="w-lec">공직선거법</td>
                                        <td class="w-name">한덕현</td>
                                        <td class="w-star star5"></td>
                                        <td class="w-list tx-left pl20">
                                            쉽게 설명해주시네요
                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                        </td>
                                        <td class="w-write">박형*</td>
                                        <td class="w-date">2018-00-00</td>
                                    </tr>
                                    <tr class="replyTxt w-replyTxt tx-gray">
                                        <td colspan="7">
                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                            베스트 댓글2
                                        </td>
                                    </tr>

                                    <tr class="replyList w-replyList">
                                        <td class="w-no">8</td>
                                        <td class="w-lec">스파르타반</td>
                                        <td class="w-name">김쌤</td>
                                        <td class="w-star star4"></td>
                                        <td class="w-list tx-left pl20">
                                            좋네요
                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                        </td>
                                        <td class="w-write">최귀*</td>
                                        <td class="w-date">2018-04-22</td>
                                    </tr>
                                    <tr class="replyTxt w-replyTxt tx-gray">
                                        <td colspan="7">
                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                            좋네요 좋네요 좋네요 좋네요 좋네요 좋네요
                                        </td>
                                    </tr>

                                    <tr class="replyList w-replyList">
                                        <td class="w-no">7</td>
                                        <td class="w-lec">행정법</td>
                                        <td class="w-name">최진우</td>
                                        <td class="w-star star2"></td>
                                        <td class="w-list tx-left pl20">
                                            저랑 잘 맞는 강의입니다.
                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                        </td>
                                        <td class="w-write">박형*</td>
                                        <td class="w-date">2018-04-22</td>
                                    </tr>
                                    <tr class="replyTxt w-replyTxt tx-gray">
                                        <td colspan="7">
                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                            저랑 잘 맞는 강의입니다. 저랑 잘 맞는 강의입니다. 저랑 잘 맞는 강의입니다.
                                        </td>
                                    </tr>

                                    <tr class="replyList w-replyList">
                                        <td class="w-no">6</td>
                                        <td class="w-lec">공통</td>
                                        <td class="w-name">윤세훈</td>
                                        <td class="w-star star2"></td>
                                        <td class="w-list tx-left pl20">
                                            좋네요
                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                        </td>
                                        <td class="w-write">장동*</td>
                                        <td class="w-date">2018-04-22</td>
                                    </tr>
                                    <tr class="replyTxt w-replyTxt tx-gray">
                                        <td colspan="7">
                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div> 
                                            좋네요 좋네요 좋네요
                                        </td>
                                    </tr>

                                    <tr class="replyList w-replyList">
                                        <td class="w-no">5</td>
                                        <td class="w-lec">헌법</td>
                                        <td class="w-name">정채영</td>
                                        <td class="w-star star2"></td>
                                        <td class="w-list tx-left pl20">
                                            좋은강의입니다.
                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                        </td>
                                        <td class="w-write">최귀*</td>
                                        <td class="w-date">2018-04-22</td>
                                    </tr>
                                    <tr class="replyTxt w-replyTxt tx-gray">
                                        <td colspan="7">
                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                            좋은강의입니다. 좋은강의입니다. 좋은강의입니다. 좋은강의입니다. 좋은강의입니다.
                                        </td>
                                    </tr>

                                    <tr class="replyList w-replyList">
                                        <td class="w-no">4</td>
                                        <td class="w-lec">공직선거법</td>
                                        <td class="w-name">한덕현</td>
                                        <td class="w-star star3"></td>
                                        <td class="w-list tx-left pl20">
                                            쉽게 설명해주시네요
                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                        </td>
                                        <td class="w-write">최귀*</td>
                                        <td class="w-date">2018-04-22</td>
                                    </tr>
                                    <tr class="replyTxt w-replyTxt tx-gray">
                                        <td colspan="7">
                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                            쉽게 설명해주시네요. 쉽게 설명해주시네요. 쉽게 설명해주시네요.
                                        </td>
                                    </tr>

                                    <tr class="replyList w-replyList">
                                        <td class="w-no">3</td>
                                        <td class="w-lec">스파르타반</td>
                                        <td class="w-name">김쌤</td>
                                        <td class="w-star star4"></td>
                                        <td class="w-list tx-left pl20">
                                            좋네요
                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                        </td>
                                        <td class="w-write">최귀*</td>
                                        <td class="w-date">2018-04-22</td>
                                    </tr>
                                    <tr class="replyTxt w-replyTxt tx-gray">
                                        <td colspan="7">
                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                            좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요
                                        </td>
                                    </tr>

                                    <tr class="replyList w-replyList">
                                        <td class="w-no">2</td>
                                        <td class="w-lec">행정법</td>
                                        <td class="w-name">최진우</td>
                                        <td class="w-star star3"></td>
                                        <td class="w-list tx-left pl20">
                                            좋네요
                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                        </td>
                                        <td class="w-write">최귀*</td>
                                        <td class="w-date">2018-04-22</td>
                                    </tr>
                                    <tr class="replyTxt w-replyTxt tx-gray">
                                        <td colspan="7">
                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                            좋네요 좋네요
                                        </td>
                                    </tr>

                                    <tr class="replyList w-replyList">
                                        <td class="w-no">1</td>
                                        <td class="w-lec">공통</td>
                                        <td class="w-name">윤세훈</td>
                                        <td class="w-star star1"></td>
                                        <td class="w-list tx-left pl20">
                                            좋네요
                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                        </td>
                                        <td class="w-write">최귀*</td>
                                        <td class="w-date">2018-04-22</td>
                                    </tr>
                                    <tr class="replyTxt w-replyTxt tx-gray">
                                        <td colspan="7">
                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                            좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="willbes-Lec-Search GM p_re mt30">
                            <div class="inputBox">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div> 
                    </div>
                    <!-- willbes-Leclist -->
                </div>

                <!-- Write -->
                <div id="replyWrite" class="Layer-Cont" style="display: none">
                    <ul class="replyInfo tx-gray NG">
                        <li>· 수강생에 한해 강좌당 1회 작성이 가능합니다.</li>
                        <li>· 수강 종료 강좌는 수강이 종료된 날로부터 30일 이내에만 후기 등록이 가능합니다.</li>
                        <li>· 수강후기 작성 시 포인트 500P가 지급됩니다. (월 최대 2,000p 지급가능)</li>
                        <li>· 강좌와 무관한 내용, 의미없는 문자 나열, 비방이나 욕설이 있을 시 삭제될 수 있습니다.</li>
                    </ul>

                    <div class="willbes-Leclist c_both">
                        <div class="LecWriteTable">
                            <table cellspacing="0" cellpadding="0" class="listTable writeTable upper-gray upper-black bdt-gray bdb-gray fc-bd-none tx-gray">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 720px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-tit bg-light-white tx-left strong pl30">수강정보<span class="tx-light-blue">(*)</span></td>
                                        <td class="w-selected tx-left pl30">
                                            <select id="Sbj" name="Sbj" title="Sbj" class="seleSbj" style="width: 150px;">
                                                <option selected="selected">과목선택</option>
                                                <option value="헌법">헌법</option>
                                                <option value="스파르타반">스파르타반</option>
                                                <option value="공직선거법">공직선거법</option>
                                            </select>
                                            <select id="Prof" name="Prof" title="Prof" class="seleProf" style="width: 150px;">
                                                <option selected="selected">교수선택</option>
                                                <option value="정채영">정채영</option>
                                                <option value="한덕현">한덕현</option>
                                                <option value="김쌤">김쌤</option>
                                            </select>
                                            <select id="Lec" name="Lec" title="Lec" class="seleLec" style="width: 360px;">
                                                <option selected="selected">강좌선택</option>
                                                <option value="기타">기타</option>
                                                <option value="강좌내용">강좌내용</option>
                                                <option value="학습상담">학습상담</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-tit bg-light-white tx-left strong pl30">평점<span class="tx-light-blue">(*)</span></td>
                                        <td class="w-selected tx-left pl30">
                                            <!-- Rating Stars Box -->
                                            <div class="rating-stars text-center GM">
                                                <ul id="stars">
                                                    <li class="star" title="" data-value='1'>
                                                        <i class="fa fa-star fa-fw"></i>
                                                    </li>
                                                    <li class="star" title="" data-value='2'>
                                                        <i class="fa fa-star fa-fw"></i>
                                                    </li>
                                                    <li class="star" title="" data-value='3'>
                                                        <i class="fa fa-star fa-fw"></i>
                                                    </li>
                                                    <li class="star" title="" data-value='4'>
                                                        <i class="fa fa-star fa-fw"></i>
                                                    </li>
                                                    <li class="star" title="" data-value='5'>
                                                        <i class="fa fa-star fa-fw"></i>
                                                    </li>
                                                </ul>
                                                <div class="success-box">
                                                    <div class="text-message">0</div>/ 5
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-tit bg-light-white tx-left strong pl30">제목<span class="tx-light-blue">(*)</span></td>
                                        <td class="w-text tx-left pl30">
                                            <input type="text" id="TITLE" name="TITLE" class="iptTitle" maxlength="30">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-tit bg-light-white tx-left strong pl30">내용<span class="tx-light-blue">(*)</span></td>
                                        <td class="w-textarea write tx-left pl30">
                                            <textarea></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="search-Btn mt20 h36 p_re">
                                <button type="submit" onclick="closeWin('replyWrite'),openWin('replyListLayer')" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                                    <span class="tx-purple-gray">취소</span>
                                </button>
                                <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                                    <span>저장</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- willbes-Leclist -->
                </div>
            </div>
            <!-- // willbes-Layer-ReplyBox -->

            {{-- 학습자료실
            <div id="profBoard" class="willbes-Layer-Board">
                <a class="closeBtn" href="#none" onclick="closeWin('Layerprof'),closeWin('profBoard')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black">학습자료실</div>
                <div class="Layer-Cont">
                    <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
                        <div class="willbes-Lec-Search GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- List -->
                    <div class="willbes-Leclist c_both">
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 65px;">
                                    <col style="width: 80px;">
                                    <col>
                                    <col style="width: 90px;">
                                    <col style="width: 100px;">
                                    <col style="width: 90px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>No<span class="row-line">|</span></th>
                                        <th>자료유형<span class="row-line">|</span></th>
                                        <th>제목<span class="row-line">|</span></th>
                                        <th>첨부파일<span class="row-line">|</span></th>
                                        <th>작성일<span class="row-line">|</span></th>
                                        <th>조회수</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="top">
                                        <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                        <td class="w-type"><div class="pBox p1 NSK">강좌</div></td>
                                        <td class="w-list tx-left pl20"><a href="#none">[주의] 이럴 경우 답변되지 않을수 있습니다.</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr class="top">
                                        <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                        <td class="w-type"><div class="pBox p2 NSK">패키지</div></td>
                                        <td class="w-list tx-left pl20"><a href="#none">[필독] 가장자주묻는질문7가지</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">456</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">10</td>
                                        <td class="w-type"><div class="pBox p1 NSK">강좌</div></td>
                                        <td class="w-list tx-left pl20">
                                            <a href="#none">
                                                2018 필살기실전모의고사파본관련공지
                                                <div class="subTit">2018 [국가직대비] 정채영 국어 적중 50선 특강 (4~5월)</div>
                                            </a>
                                        </td>
                                        <td class="w-file">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">9</td>
                                        <td class="w-type"><div class="pBox p3 NSK">교재</div></td>
                                        <td class="w-list tx-left pl20"><a href="#none">[주의] 이럴 경우 답변되지 않을수 있습니다.</a></td>
                                        <td class="w-file">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">8</td>
                                        <td class="w-type"><div class="pBox p1 NSK">강좌</div></td>
                                        <td class="w-list tx-left pl20">
                                            <a href="#none">
                                                2018 필살기실전모의고사파본관련공지
                                                <div class="subTit">2018 [국가직대비] 정채영 국어 적중 50선 특강 (4~5월)</div>
                                            </a>
                                        </td>
                                        <td class="w-file">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">7</td>
                                        <td class="w-type"><div class="pBox p3 NSK">교재</div></td>
                                        <td class="w-list tx-left pl20"><a href="#none">[주의] 이럴 경우 답변되지 않을수 있습니다.</a></td>
                                        <td class="w-file">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">6</td>
                                        <td class="w-type"><div class="pBox p1 NSK">강좌</div></td>
                                        <td class="w-list tx-left pl20"><a href="#none">2018 필살기실전모의고사파본관련공지</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">5</td>
                                        <td class="w-type"><div class="pBox p2 NSK">패키지</div></td>
                                        <td class="w-list tx-left pl20"><a href="#none">2018 필살기실전모의고사파본관련공지</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">4</td>
                                        <td class="w-type"><div class="pBox p3 NSK">교재</div></td>
                                        <td class="w-list tx-left pl20"><a href="#none">2018 필살기실전모의고사파본관련공지</a></td>
                                        <td class="w-file">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">3</td>
                                        <td class="w-type"><div class="pBox p2 NSK">패키지</div></td>
                                        <td class="w-list tx-left pl20"><a href="#none">[주의] 이럴 경우 답변되지 않을수 있습니다.</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">2</td>
                                        <td class="w-type"><div class="pBox p3 NSK">교재</div></td>
                                        <td class="w-list tx-left pl20"><a href="#none">2018 필살기실전모의고사파본관련공지</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr>
                                        <td class="w-list tx-center" colspan="6">검색 결과가 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- willbes-Leclist -->

                    <br/><br/><br/>

                    <!-- View -->
                    <div class="willbes-Leclist c_both">
                        <div class="LecViewTable">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col>
                                    <col style="width: 150px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                    <tr><th colspan="3" class="w-list tx-left  pl20"><img src="{{ img_url('prof/icon_notice.gif') }}" style="marign-right: 5px;"> <strong>[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</strong></th></tr>
                                    <tr>
                                        <td class="subTit tx-left pl20"><strong class="tx-light-blue" style="padding-right: 5px;">[강좌]</strong>2018 [국가직대비] 정채영 국어 적중 50선 특강 (4~5월)<span class="row-line">|</span></td>
                                        <td class="w-date">2018-00-00<span class="row-line">|</span></td>
                                        <td class="w-click"><strong>조회수</strong> 123</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-file tx-left pl20" colspan="3">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-txt tx-left" colspan="3">
                                            이달의 개강 강좌 공지입니다.<br/>
                                            이달의 개강 강좌 공지입니다.<br/>
                                            이달의 개강 강좌 공지입니다.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right">
                                <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                    <span>목록</span>
                                </button>
                            </div>
                            <table cellspacing="0" cellpadding="0" class="listTable prevnextTable upper-gray bdt-gray bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 150px;">
                                    <col style="width: 640px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-prev bg-light-gray"><strong>이전글</strong></td>
                                        <td class="tx-left pl20"><a href="#none">[개강] 황남기 헌법, 행정법 리마인드 핵심 이론 + 기출문풀</a><span class="row-line">|</span></td>
                                        <td class="w-date">2018-00-00</td>
                                    </tr>
                                    <tr>
                                        <td class="w-next bg-light-gray"><strong>다음글</strong></td>
                                        <td class="tx-left pl20"><a href="#none">[헌법] 5~6월 강의안내</a><span class="row-line">|</span></td>
                                        <td class="w-date">2018-00-00</td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- willbes-Leclist -->
                </div>
            </div>
            --}}

            <div id="profBoard" class="willbes-Layer-Board">
                <a class="closeBtn" href="#none" onclick="closeWin('Layerprof'),closeWin('profBoard')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black">첨삭게시판</div>
                <div class="Layer-Cont">
                    <div class="willbes-Prof-Subject NG tx-dark-black">
                        <div class="willbes-Lec-Search GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- List -->
                    <div class="willbes-Leclist c_both">
                        <div class="willbes-Lec-Selected tx-gray">                        
                            <div class="willbes-Lec-Search GM">
                                {{--
                                <select id="A" name="A" title="A" class="seleLecA">
                                    <option selected="selected">질문유형</option>
                                    <option value="강좌내용">강좌내용</option>
                                    <option value="교재내용">교재내용</option>
                                    <option value="학습상담">학습상담</option>
                                    <option value="기타">기타</option>
                                </select>
                                --}}
                                <ul class="chkBox mt10">
                                    <li>
                                        <input type="checkbox" id="s_is_display" name="s_is_display" value="1" class="goods_chk">
                                        <label>공지숨기기</label>
                                    </li>
                                    {{--
                                    <li>
                                        <input type="checkbox" id="s_is_my_contents" name="s_is_my_contents" value="1" class="goods_chk">
                                        <label>내질문보기</label>
                                    </li>
                                    --}}
                                </ul>
                                <div class="search-Btn btnAuto90 h27 f_right">
                                    <button type="button" id="btn_qna_create" class="mem-Btn bg-blue bd-dark-blue">
                                        <span>질문하기</span>
                                    </button>
                                </div>
                            </div>                        
                        </div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 65px;">
                                    <col>
                                    <col style="width: 90px;">
                                    <col style="width: 110px;">
                                    <col style="width: 90px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>No<span class="row-line">|</span></th>
                                        <th>제목<span class="row-line">|</span></th>
                                        <th>작성자<span class="row-line">|</span></th>
                                        <th>작성일<span class="row-line">|</span></th>
                                        <th>첨삭상태</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                        <td class="w-list tx-left pl20">
                                            <a href="#none">
                                                <img src="{{ img_url('prof/icon_locked.gif') }}"> 로그인이되지않는데어떻게하나요?
                                                <img src="{{ img_url('prof/icon_N.gif') }}">
                                            </a>
                                        </td>
                                        <td class="w-write">관리자명</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox NSK">첨삭완료</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                        <td class="w-list tx-left pl20"><a href="#none">만14세미만회원은어떻게가입하나요?</a></td>
                                        <td class="w-write">장동*</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox waitBox NSK">첨삭대기</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">10</td>
                                        <td class="w-list tx-left pl20"><a href="#none"> 로그인이되지않는데어떻게하나요?</a></td>
                                        <td class="w-write">관리자명</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">9</td>
                                        <td class="w-list tx-left pl20">
                                            <a href="#none">
                                                 회원탈퇴는어떻게하나요? 
                                                <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                                <img src="{{ img_url('prof/icon_file.gif') }}">
                                            </a>
                                        </td>
                                        <td class="w-write">박형*</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">8</td>
                                        <td class="w-list tx-left pl20"><a href="#none"> 로그인이되지않는데어떻게하나요?</a></td>
                                        <td class="w-write">관리자명</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">7</td>
                                        <td class="w-list tx-left pl20">
                                            <a href="#none">
                                                 회원탈퇴는어떻게하나요? 
                                                <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                                <img src="{{ img_url('prof/icon_file.gif') }}">
                                            </a>
                                        </td>
                                        <td class="w-write">박형*</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">6</td>
                                        <td class="w-list tx-left pl20"><a href="#none"> 로그인이되지않는데어떻게하나요?</a></td>
                                        <td class="w-write">관리자명</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">5</td>
                                        <td class="w-list tx-left pl20">
                                            <a href="#none">
                                                 회원탈퇴는어떻게하나요?                                              
                                                <img src="{{ img_url('prof/icon_file.gif') }}">
                                            </a>
                                        </td>
                                        <td class="w-write">박형*</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">4</td>
                                        <td class="w-list tx-left pl20">
                                            <a href="#none">
                                                 회원탈퇴는어떻게하나요?
                                            </a>
                                        </td>
                                        <td class="w-write">장동*</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">3</td>
                                        <td class="w-list tx-left pl20"><a href="#none"> 로그인이되지않는데어떻게하나요?</a></td>
                                        <td class="w-write">박형*</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">2</td>
                                        <td class="w-list tx-left pl20"><a href="#none"> 로그인이되지않는데어떻게하나요?</a></td>
                                        <td class="w-write">장동*</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">1</td>
                                        <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                                        <td class="w-write">박형*</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- willbes-Leclist -->

                    <br/><br/><br/><br/><br/>

                    <!-- Write -->
                    <div class="willbes-Leclist c_both">
                        <div class="LecWriteTable">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col>
                                </colgroup>
                                <tbody>
                                    {{--
                                    <tr>
                                        <td class="w-tit bg-light-white tx-center strong">질문유형<span class="tx-light-blue">(*)</span></td>
                                        <td class="w-selected full tx-left pl30" colspan="3">
                                            <select id="s_consult_type" name="s_consult_type" title="질문유형" class="seleLecA" style="width: 250px;">
                                                <option value="">질문유형을 선택하세요.</option>
                                                <option value="702001">강좌내용</option>
                                                <option value="702002">교재내용</option>
                                                <option value="702003">학습상담</option>
                                                <option value="702004">기타</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-tit bg-light-white  tx-center strong">수강정보</td>
                                        <td class="w-selected full tx-left pl30" colspan="3">
                                            <select id="study_prod_code" name="study_prod_code" title="강좌를 선택해 주세요.">
                                                <option value="">강좌를 선택해 주세요.</option>
                                                <option value="178742">【경정 승진대비】 ★2022 선동주 헌법 &amp; 김덕관 행정학 &amp; 정주형 형소법(주) PASS★</option>
                                                <option value="176325">윌비스 신광은경찰 0원 무제한 PASS (일반경찰+경행경채)</option>
                                                <option value="179368">윌비스 신광은경찰 0원 무제한 PASS (일반경찰+경행경채)</option>
                                                <option value="181752">윌비스 신광은경찰 0원 무제한 PASS (일반경찰+경행경채)</option>
                                                <option value="181770">윌비스 신광은경찰 0원 무제한 PASS (일반경찰+경행경채)</option>
                                                <option value="181835">윌비스 신광은경찰 0원 무제한 PASS (일반경찰+경행경채)</option>
                                                <option value="181842">윌비스 신광은경찰 0원 무제한 PASS (일반경찰+경행경채)</option>
                                                <option value="183221">윌비스 신광은경찰 0원 무제한 PASS (일반경찰+경행경채)</option>
                                                <option value="180901">김종욱 1순환 경찰간부 2018년 12월 강의(1순환) 테스트입니다</option>
                                                <option value="183493">【경장,경사,경위 승진대비】 ★2022 신광은 형소법&amp;김원욱 형법&amp;장정훈/오현웅 실무종합 PASS★</option>
                                                <option value="174029">多드림 패키지 (추석이벤트 전용 특강+쿠폰) (10/1(금) 00시부터 신청불가)</option>
                                                <option value="185922">多드림 패키지 (추석이벤트 전용 특강+쿠폰) (10/1(금) 00시부터 신청불가)</option>
                                            </select>
                                        </td>
                                    </tr>
                                    --}}
                                    <tr>
                                        <td class="w-tit bg-light-white tx-center strong">제목<span class="tx-light-blue">(*)</span></td>
                                        <td class="w-text tx-left pl30" colspan="3">
                                            <input type="text" id="board_title" name="board_title" class="iptTitle" maxlength="30" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-tit bg-light-white tx-center strong">내용<span class="tx-light-blue">(*)</span></td>
                                        <td class="w-textarea write tx-left pl30" colspan="3">
                                            <textarea id="board_content" name="board_content" class="form-control" title="내용" placeholder=""></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-tit bg-light-white tx-left strong pl30">첨부</td>
                                        <td class="w-file answer tx-left" colspan="4">
                                            <ul class="attach">
                                                <li>
                                                    <input type="file" id="attach_file0" name="attach_file[]" class="input-file" size="3">
                                                </li>
                                                <li>
                                                    <input type="file" id="attach_file0" name="attach_file[]" class="input-file" size="3">
                                                </li>
                                                <li>
                                                    <input type="file" id="attach_file0" name="attach_file[]" class="input-file" size="3">
                                                </li>
                                                <li>
                                                    • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br>
                                                    • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="search-Btn mt20 h36 p_re">
                                <button type="button" id="btn_list" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                                    <span class="tx-purple-gray">취소</span>
                                </button>
                                <button type="submit" id="btn_submit" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                                    <span>저장</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- willbes-Leclist -->

                    <br/><br/><br/><br/><br/>

                    <!-- View -->
                    <div class="willbes-Leclist c_both">
                        <div class="LecViewTable">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                	<col>
                                    <col style="width: 100px;">
                                    <col style="width: 100px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="w-list tx-left pl20"><img src="{{ img_url('prof/icon_notice.gif') }}" style="marign-right: 5px;"> <strong>[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</strong></th>
                                    	<th>김보*</th>
                                        <th class="w-date">2018-00-00</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-file tx-left pl20" colspan="3">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-txt tx-left" colspan="3">
                                            이달의 개강 강좌 공지입니다.<br/>
                                            이달의 개강 강좌 공지입니다.<br/>
                                            이달의 개강 강좌 공지입니다.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 690px;">
                                    <col style="width: 160px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <td class="w-answer">
                                        <img src="/public/img/willbes/prof/icon_answer.gif">
                                    </td>
                                    <td class="w-acad tx-left">
                                        <span class="aBox answerBox NSK">첨삭완료</span>
                                        <span class="aBox waitBox NSK">첨삭대기</span>
                                    </td>
                                    <td class="w-date">2021-09-23 13:49:02</td>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-txt answer tx-left" colspan="4">
                                            <p>내가 수업 중에 자주 말하지요.</p>
                                            <p>영어권 사용자들이 가장 많이 틀리는 문법이 수의 일치라고요</p>
                                            <p>말한대로 복수동사 lend가 돼야 하는데 영어권 사용자들이 주어와 동사 사이에 수식이 들어가 있는 경우&nbsp;</p>
                                            <p>바로 이 경우의 수의 일치를 잘못 적용하는 경우가 많답니다.</p>
                                            <p>&nbsp;</p>
                                            <p>독해기적은 그야말로 실제로 쓰인 문장 그대로 인용한 것이고요.</p>
                                            <p>결국 그 문장은 문법 면에서는 틀린 것입니다^^</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right">
                                <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                    <span>목록</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- willbes-Leclist -->
                </div>
            </div>

            <!-- willbes-Layer-Notice -->
            <div id="profNotice" class="willbes-Layer-Board">
                <a class="closeBtn" href="#none" onclick="closeWin('Layerprof'),closeWin('profNotice')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black">공지사항</div>
                <div class="Layer-Cont">
                    <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
                        <div class="willbes-Lec-Search GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- List -->
                    <div class="willbes-Leclist c_both">
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 65px;">
                                    <col>
                                    <col style="width: 90px;">
                                    <col style="width: 100px;">
                                    <col style="width: 90px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>No<span class="row-line">|</span></th>
                                        <th>제목<span class="row-line">|</span></th>
                                        <th>첨부파일<span class="row-line">|</span></th>
                                        <th>작성일<span class="row-line">|</span></th>
                                        <th>조회수</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="top">
                                        <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                        <td class="w-list tx-left pl20"><a href="#none">[주의] 이럴 경우 답변되지 않을수 있습니다.</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr class="top">
                                        <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                        <td class="w-list tx-left pl20"><a href="#none">[필독] 가장자주묻는질문7가지</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">456</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">10</td>
                                        <td class="w-list tx-left pl20">
                                            <a href="#none">
                                                2018 필살기실전모의고사파본관련공지
                                            </a>
                                        </td>
                                        <td class="w-file">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">9</td>
                                        <td class="w-list tx-left pl20"><a href="#none">[주의] 이럴 경우 답변되지 않을수 있습니다.</a></td>
                                        <td class="w-file">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">8</td>
                                        <td class="w-list tx-left pl20">
                                            <a href="#none">
                                                2018 필살기실전모의고사파본관련공지
                                            </a>
                                        </td>
                                        <td class="w-file">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
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
                    <!-- willbes-Leclist -->

                    <br/><br/><br/>

                    <!-- View -->
                    <div class="willbes-Leclist c_both">
                        <div class="LecViewTable">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col>
                                    <col style="width: 150px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="w-list tx-left  pl20"><img src="{{ img_url('prof/icon_notice.gif') }}" style="marign-right: 5px;"> <strong>[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사 </strong></th>
                                        <th class="w-date">2018-00-00<span class="row-line">|</span></th>
                                        <th class="w-click"><strong>조회수</strong> 123</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    <tr>
                                        <td class="w-txt tx-left" colspan="5">
                                            <img src="https://ssam.willbes.net/public/uploads/willbes/board/63/2020/1218/board_309736_01_20201218114139.jpg">
                                            이달의 개강 강좌 공지입니다.<br/>
                                            이달의 개강 강좌 공지입니다.<br/>
                                            이달의 개강 강좌 공지입니다.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-file tx-left pl20" colspan="5">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right">
                                <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                    <span>목록</span>
                                </button>
                            </div>
                            <table cellspacing="0" cellpadding="0" class="listTable prevnextTable upper-gray bdt-gray bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 150px;">
                                    <col style="width: 640px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-prev bg-light-gray"><strong>이전글</strong></td>
                                        <td class="tx-left pl20"><a href="#none">[개강] 황남기 헌법, 행정법 리마인드 핵심 이론 + 기출문풀</a><span class="row-line">|</span></td>
                                        <td class="w-date">2018-00-00</td>
                                    </tr>
                                    <tr>
                                        <td class="w-next bg-light-gray"><strong>다음글</strong></td>
                                        <td class="tx-left pl20"><a href="#none">[헌법] 5~6월 강의안내</a><span class="row-line">|</span></td>
                                        <td class="w-date">2018-00-00</td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- willbes-Leclist -->
                </div>
            </div>
            <!-- // willbes-Layer-Notice -->

            <!-- willbes-Layer-Lecup -->
            <div id="profLecup" class="willbes-Layer-Board">
                <a class="closeBtn" href="#none" onclick="closeWin('Layerprof'),closeWin('profLecup')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black">강의 업데이트</div>
                <div class="Layer-Cont">
                    <div class="Acad_info mt40">
                        <!-- List -->
                        <div class="willbes-Leclist c_both">
                            <div class="willbes-Lec-Selected tx-gray c_both mt-zero mb-zero">
                                <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                                    <select id="" name="" title="과목" class="seleAcad">
                                        <option selected="selected">과목</option>
                                        <option value="교육학">교육학</option>
                                        <option value="유아">유아</option>
                                        <option value="국어">국어</option>
                                    </select>
                                    <select id="" name="" title="">
                                        <option selected="selected">교수</option>
                                        <option value="교수1">교수1</option>
                                        <option value="교수2">교수2</option>
                                        <option value="교수3">교수3</option>
                                    </select>
                                </span>
                                <span class="willbes-Lec-Search willbes-SelectBox mb20 GM">
                                    <div class="inputBox p_re">
                                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강의명을 입력해주세요." maxlength="30">
                                        <button type="submit" onclick="" class="search-Btn">
                                            <span>검색</span>
                                        </button>
                                    </div>
                                </span>
                            </div>
                            <div class="LeclistTable">
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 60px;">
                                        <col style="width: 110px;">
                                        <col style="width: 100px;">
                                        <col>
                                        <col style="width: 250px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>No<span class="row-line">|</span></th>
                                            <th>과목<span class="row-line">|</span></th>
                                            <th>교수<span class="row-line">|</span></th>
                                            <th>강좌명<span class="row-line">|</span></th>                                    
                                            <th>강의 회차</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-no">6523</td>
                                            <td class="w-campus">전기전자통신</td>
                                            <td>최우영</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[통합] 2020 7~9월 영역별 문제풀이반(1~5월 통합 이론반)</a></td>                                    
                                            <td class="w-date">09월 14일 총 10강 업로드</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">6523</td>
                                            <td class="w-campus">교육학</td>
                                            <td>이인재</td>
                                            <td class="w-list tx-left pl20"><a href="#none">2020 (9~11월) 이인재 교육학 모의고사반</a></td>                                    
                                            <td class="w-date">09월 14일 총 10강 업로드</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">6523</td>
                                            <td class="w-campus">전기전자통신</td>
                                            <td>최우영</td>
                                            <td class="w-list tx-left pl20"><a href="#none">직강생전용)[통합] 2020 7~9월 영역별 문제풀이반(1~5월 통합 이론반) - 복습용 강좌</a></td>                                    
                                            <td class="w-date">09월 14일 총 10강 업로드</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">6523</td>
                                            <td class="w-campus">전공음악</td>
                                            <td>다이애나</td>
                                            <td class="w-list tx-left pl20"><a href="#none">2020 7월 전공음악 교과서 분석반 [인강전용]</a></td>                                    
                                            <td class="w-date">교과서분석반 [ 민속악 성악 총 2강 업로드</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">6523</td>
                                            <td class="w-campus">전기전자통신</td>
                                            <td>최우영</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[통합] 2020 7~9월 영역별 문제풀이반(1~5월 통합 이론반)</a></td>                                    
                                            <td class="w-date">09월 14일 총 10강 업로드</td>
                                        </tr>                                     
                                        <tr>
                                            <td class="w-list tx-center" colspan="5">검색 결과가 없습니다.</td>
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
            </div>            
            <!-- // willbes-Layer-Board -->

            <div id="Layerprof" class="willbes-Layer-Black"></div>
        </div>
        <!-- willbes-Prof-Profile -->
        
        <div class="willbes-Prof-Tabs">
            <div class="mb10">* 수강신청 시, “온라인강좌”와＂학원강좌”를 먼저 선택하신 후, 강의형태(패키지, 단과 등)를 선택하시면 됩니다. </div>
            <div class="ProfDetailWrap">
                <ul class="tabWrap tabDepthProfSsam">
                    <li><a href="#Proftab1" class="on">온라인강좌</a></li>
                    <li><a href="#Proftab2">학원강좌</a></li>
                    <li><a href="#Proftab3">교재</a></li>
                </ul>
                <div class="tabBox">               
                    <div id="Proftab1" class="tabLink">                        
                        <div class="acadBoxWrap">                            
                            <div class="AcadtabBox">
                                <div class="tabContent">
                                    <div class="ssamTabGrid">
                                        <ul class="tabWrap tabDepthAcad four">
                                            <li><a href="#acad1" class="on">패키지강의</a></li>
                                            <li><a href="#acad2">단과강의</a></li>
                                            <li><a href="#acad3">특강</a></li>
                                            <li><a href="#acad4">수강생전용</a></li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div id="acad1" class="tabContent">
                                    <div class="willbes-Lec NG c_both">
                                        <div class="willbes-Lec-Subject tx-dark-black">
                                            ㆍ온라인강좌 - 패키지 강의
                                        </div>
                                        <div class="willbes-Lec-Line">-</div>
                                        <!-- willbes-Lec-Line -->

                                        <div class="willbes-Lec-Table d_block">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 95px;">
                                                    <col>
                                                    <col style="width: 180px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-list bg-light-white">이론</td>
                                                        <td class="w-data tx-left pl25">
                                                            <div class="w-tit">
                                                                <a href="{{ site_url('/home/html/packagesub1') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                                            </div>
                                                            <dl class="w-info">
                                                                <dt class="mr20">
                                                                    <a href="#none" onclick="openWin('InfoForm')">
                                                                        <strong>패키지상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강기간 : <span class="tx-blue">30일</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="nBox n1">2배수</span>
                                                                    <span class="nBox n2">진행중</span>
                                                                    <span class="nBox n3">예정</span>
                                                                    <span class="nBox n4">완강</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td>
                                                            <div class="priceWrap">
                                                                <span class="price">80,000원</span>
                                                                <span class="discount">(10%↓)</span>  ▶
                                                                <span class="dcprice">64,000원</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-list bg-light-white">문제풀이</td>
                                                        <td class="w-data tx-left pl25">
                                                            <div class="w-tit">2017 (하반기 지방직 대비) 페트라 출제포인트 패키지</div>
                                                            <dl class="w-info">
                                                                <dt class="mr20"><strong>패키지상세정보</strong></dt>
                                                                <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강기간 : <span class="tx-blue">15일</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="nBox n1">2배수</span>
                                                                    <span class="nBox n4">완강</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td>
                                                            <div class="priceWrap">
                                                                <span class="dcprice">64,000원</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->
                                        </div>
                                        <!-- willbes-Lec-Table -->
                                    </div>
                                    <!-- willbes-Lec -->
                                </div>
                                <!-- acad1 -->

                                <div id="acad2" class="tabContent">
                                    <div class="willbes-Lec NG c_both">
                                        <div class="willbes-Lec-Subject tx-dark-black">
                                            ㆍ온라인강좌 - 단과 강의
                                            <div class="selectBoxForm">
                                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                                            </div>
                                        </div>

                                        <div class="willbes-Lec-Profdata tx-dark-black">
                                            <ul>
                                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                                <li class="ProfDetail">
                                                    <div class="Obj">
                                                        국어강의의 뉴 패러다임!<br/>듣기만 해도 암기되는 강의
                                                    </div>
                                                    <div class="Name">기미진 교수님</div>
                                                </li>
                                                <li class="Reply tx-blue">
                                                    <strong>수강후기</strong>
                                                    <div class="sliderUp">
                                                        <div class="sliderVertical roll-Reply tx-dark-black">
                                                            <div>444국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                            <div>555국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                            <div>666국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- willbes-Lec-Profdata -->

                                        <div class="willbes-Lec-Line">-</div>
                                        <!-- willbes-Lec-Line -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 85px;">
                                                    <col>
                                                    <col style="width: 260px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-list">유료특강</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                                                        <td class="w-data tx-left pl25">
                                                            <div class="w-tit">2018 기미진 국어 아침 실전 동형모의고사 특강[국가직~서울시](3-6개월)</div>
                                                            <dl class="w-info">
                                                                <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                                <dt>강의수 : <span class="tx-blue">48강 (예정)</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강기간 : <span class="tx-blue">100일</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="nBox n1">2배수</span>
                                                                    <span class="nBox n2">진행중</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-notice p_re">
                                                            <div class="w-sp one"><a href="#none">맛보기</a></div>
                                                            <div class="priceWrap">
                                                                <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                <span class="price">80,000원</span>
                                                                <span class="discount">(10,000원↓)</span>  ▶
                                                                <span class="dcprice">70,000원</span>
                                                            </div>
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 865px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <div class="w-sub">
                                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                                <span class="chk">
                                                                    <label class="press">[출간예정]</label>
                                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                                </span>
                                                                <span class="priceWrap">
                                                                    <span class="price tx-blue">0원</span>
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecInfoTable -->
                                        </div>
                                        <!-- willbes-Lec-Table -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 85px;">
                                                    <col>
                                                    <col style="width: 260px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-list">문제풀이</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                                                        <td class="w-data tx-left pl25">
                                                            <div class="w-tit">2018 [서울시대비] 기미진 기특한 국어 아침 실전동형모의고사 (5-6월)</div>
                                                            <dl class="w-info">
                                                                <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                                <dt>강의수 : <span class="tx-blue">16강 (예정)</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강기간 : <span class="tx-blue">40일</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="nBox n1">2배수</span>
                                                                    <span class="nBox n3">예정</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-notice p_re">
                                                            <div class="w-sp one"><a href="#none">맛보기</a></div>
                                                            <div class="priceWrap">
                                                                <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                <span class="dcprice">70,000원</span>
                                                            </div>
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 865px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <div class="w-sub">
                                                                <span class="w-subtit none">※ 별도 구매 가능한 교재가 없습니다.</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecInfoTable -->
                                        </div>
                                        <!-- willbes-Lec-Table --> 
                                    </div>                        
                                    <!-- willbes-Lec -->

                                    <div class="willbes-Lec-buyBtn">
                                        <ul>
                                            <li class="btnAuto180 h36">
                                                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                                    <span>장바구니</span>
                                                </button>
                                            </li>
                                            <li class="btnAuto180 h36">
                                                <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                                                    <span class="tx-light-blue">바로결제</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- willbes-Lec-buyBtn -->
                                </div>
                                <!-- acad2 -->

                                <div id="acad3" class="tabContent">
                                    <div class="willbes-Lec NG c_both">
                                        <div class="willbes-Lec-Subject tx-dark-black">
                                            ㆍ온라인강좌 - 특강
                                            <div class="selectBoxForm">
                                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                                            </div>
                                        </div>

                                        <div class="willbes-Lec-Profdata tx-dark-black">
                                            <ul>
                                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                                <li class="ProfDetail">
                                                    <div class="Obj">
                                                        국어강의의 뉴 패러다임!<br/>듣기만 해도 암기되는 강의
                                                    </div>
                                                    <div class="Name">기미진 교수님</div>
                                                </li>
                                                <li class="Reply tx-blue">
                                                    <strong>수강후기</strong>
                                                    <div class="sliderUp">
                                                        <div class="sliderVertical roll-Reply tx-dark-black">
                                                            <div>444국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                            <div>555국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                            <div>666국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- willbes-Lec-Profdata -->

                                        <div class="willbes-Lec-Line">-</div>
                                        <!-- willbes-Lec-Line -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 85px;">
                                                    <col>
                                                    <col style="width: 260px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-list">유료특강</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                                                        <td class="w-data tx-left pl25">
                                                            <div class="w-tit">2018 기미진 국어 아침 실전 동형모의고사 특강[국가직~서울시](3-6개월)</div>
                                                            <dl class="w-info">
                                                                <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                                <dt>강의수 : <span class="tx-blue">48강 (예정)</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강기간 : <span class="tx-blue">100일</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="nBox n1">2배수</span>
                                                                    <span class="nBox n2">진행중</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-notice p_re">
                                                            <div class="w-sp one"><a href="#none">맛보기</a></div>
                                                            <div class="priceWrap">
                                                                <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                <span class="price">80,000원</span>
                                                                <span class="discount">(10,000원↓)</span>  ▶
                                                                <span class="dcprice">70,000원</span>
                                                            </div>
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 865px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <div class="w-sub">
                                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                                <span class="chk">
                                                                    <label class="press">[출간예정]</label>
                                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                                </span>
                                                                <span class="priceWrap">
                                                                    <span class="price tx-blue">0원</span>
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecInfoTable -->
                                        </div>
                                        <!-- willbes-Lec-Table -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 85px;">
                                                    <col>
                                                    <col style="width: 260px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-list">문제풀이</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                                                        <td class="w-data tx-left pl25">
                                                            <div class="w-tit">2018 [서울시대비] 기미진 기특한 국어 아침 실전동형모의고사 (5-6월)</div>
                                                            <dl class="w-info">
                                                                <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                                <dt>강의수 : <span class="tx-blue">16강 (예정)</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강기간 : <span class="tx-blue">40일</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="nBox n1">2배수</span>
                                                                    <span class="nBox n3">예정</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-notice p_re">
                                                            <div class="w-sp one"><a href="#none">맛보기</a></div>
                                                            <div class="priceWrap">
                                                                <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                <span class="dcprice">70,000원</span>
                                                            </div>
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 865px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <div class="w-sub">
                                                                <span class="w-subtit none">※ 별도 구매 가능한 교재가 없습니다.</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecInfoTable -->
                                        </div>
                                        <!-- willbes-Lec-Table --> 
                                    </div>                        
                                    <!-- willbes-Lec -->

                                    <div class="willbes-Lec-buyBtn">
                                        <ul>
                                            <li class="btnAuto180 h36">
                                                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                                    <span>장바구니</span>
                                                </button>
                                            </li>
                                            <li class="btnAuto180 h36">
                                                <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                                                    <span class="tx-light-blue">바로결제</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- willbes-Lec-buyBtn -->
                                </div>
                                <!-- acad3 -->

                                <div id="acad4" class="tabContent">
                                    <div class="willbes-Lec NG c_both">
                                        <div class="willbes-Lec-Subject tx-dark-black">
                                            ㆍ온라인강좌 - 수강생전용
                                            <div class="selectBoxForm">
                                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                                            </div>
                                        </div>

                                        <div class="willbes-Lec-Profdata tx-dark-black">
                                            <ul>
                                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                                <li class="ProfDetail">
                                                    <div class="Obj">
                                                        국어강의의 뉴 패러다임!<br/>듣기만 해도 암기되는 강의
                                                    </div>
                                                    <div class="Name">기미진 교수님</div>
                                                </li>
                                                <li class="Reply tx-blue">
                                                    <strong>수강후기</strong>
                                                    <div class="sliderUp">
                                                        <div class="sliderVertical roll-Reply tx-dark-black">
                                                            <div>444국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                            <div>555국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                            <div>666국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- willbes-Lec-Profdata -->

                                        <div class="willbes-Lec-Line">-</div>
                                        <!-- willbes-Lec-Line -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 85px;">
                                                    <col>
                                                    <col style="width: 260px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-list">유료특강</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                                                        <td class="w-data tx-left pl25">
                                                            <div class="w-tit">2018 기미진 국어 아침 실전 동형모의고사 특강[국가직~서울시](3-6개월)</div>
                                                            <dl class="w-info">
                                                                <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                                <dt>강의수 : <span class="tx-blue">48강 (예정)</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강기간 : <span class="tx-blue">100일</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="nBox n1">2배수</span>
                                                                    <span class="nBox n2">진행중</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-notice p_re">
                                                            <div class="w-sp one"><a href="#none">맛보기</a></div>
                                                            <div class="priceWrap">
                                                                <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                <span class="price">80,000원</span>
                                                                <span class="discount">(10,000원↓)</span>  ▶
                                                                <span class="dcprice">70,000원</span>
                                                            </div>
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 865px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <div class="w-sub">
                                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                                <span class="chk">
                                                                    <label class="press">[출간예정]</label>
                                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                                </span>
                                                                <span class="priceWrap">
                                                                    <span class="price tx-blue">0원</span>
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecInfoTable -->
                                        </div>
                                        <!-- willbes-Lec-Table -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 85px;">
                                                    <col>
                                                    <col style="width: 260px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-list">문제풀이</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                                                        <td class="w-data tx-left pl25">
                                                            <div class="w-tit">2018 [서울시대비] 기미진 기특한 국어 아침 실전동형모의고사 (5-6월)</div>
                                                            <dl class="w-info">
                                                                <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                                <dt>강의수 : <span class="tx-blue">16강 (예정)</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강기간 : <span class="tx-blue">40일</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="nBox n1">2배수</span>
                                                                    <span class="nBox n3">예정</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-notice p_re">
                                                            <div class="w-sp one"><a href="#none">맛보기</a></div>
                                                            <div class="priceWrap">
                                                                <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                <span class="dcprice">70,000원</span>
                                                            </div>
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 865px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <div class="w-sub">
                                                                <span class="w-subtit none">※ 별도 구매 가능한 교재가 없습니다.</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecInfoTable -->
                                        </div>
                                        <!-- willbes-Lec-Table --> 
                                    </div>                        
                                    <!-- willbes-Lec -->

                                    <div class="willbes-Lec-buyBtn">
                                        <ul>
                                            <li class="btnAuto180 h36">
                                                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                                    <span>장바구니</span>
                                                </button>
                                            </li>
                                            <li class="btnAuto180 h36">
                                                <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                                                    <span class="tx-light-blue">바로결제</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- willbes-Lec-buyBtn -->
                                </div>
                                <!-- acad4 -->
                            </div>
                        </div>
                    </div>
                    <!-- Proftab1// -->                    

                    <div id="Proftab2" class="tabLink">
                        <div class="acadBoxWrap">                            
                            <div class="AcadtabBox">
                                <div class="tabContent">
                                    <div class="ssamTabGrid">
                                        <ul class="tabWrap tabDepthAcad five">
                                            <li><a href="#acad5" class="on">패키지강의</a></li>
                                            <li><a href="#acad6">단과강의</a></li>
                                            <li><a href="#acad9">전국라이브영상반</a></li>
                                            <li><a href="#acad7">특강</a></li>
                                            <li><a href="#acad8">수강생전용</a></li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div id="acad5" class="tabContent">
                                    <div class="willbes-Lec NG c_both">
                                        <div class="willbes-Lec-Subject tx-dark-black">ㆍ학원강좌 - 패키지 강의</div>
                                        <!-- willbes-Lec-Subject -->

                                        <div class="willbes-Lec-Line">-</div>
                                        <!-- willbes-Lec-Line -->

                                        <div class="willbes-Lec-Table p_re">
                                            <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 90px;">
                                                    <col style="width: 590px;">
                                                    <col style="width: 185px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-place bg-light-white">노량진</td>
                                                        <td class="w-list">문제<br>풀이</td>
                                                        <td class="w-data tx-left pl15">
                                                            <div class="w-tit w-acad-tit"><a href="//www.dev.willbes.net/home/html/acad_list_packagesub_new">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</a></div>
                                                            <dl class="w-info acad">
                                                                <dt>
                                                                    <a href="#none" onclick="openWin('InfoForm')">
                                                                        <strong>종합반 상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>개강월 : <span class="tx-blue">2018-02</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="acadBox n1">방문+온라인</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-notice">
                                                            <div class="acadInfo NSK n2">접수중</div>
                                                            <div class="priceWrap">
                                                                <span class="price">80,000원</span>
                                                                <span class="discount">(10%↓)</span>  ▶
                                                                <span class="dcprice">70,000원</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->
                                        </div>
                                        <!-- willbes-Lec-Table -->

                                        <div class="willbes-Lec-Table d_block">
                                            <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 90px;">
                                                    <col style="width: 590px;">
                                                    <col style="width: 185px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-place bg-light-white">노량진</td>
                                                        <td class="w-list">문제<br>풀이</td>
                                                        <td class="w-data tx-left pl15">
                                                            <div class="w-tit w-acad-tit"><a href="//www.dev.willbes.net/home/html/acad_list_packagesub_new">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</a></div>
                                                            <dl class="w-info acad">
                                                                <dt>
                                                                    <a href="#none" onclick="openWin('InfoForm')">
                                                                        <strong>종합반 상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>개강월 : <span class="tx-blue">2018-02</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강형태 : <span class="tx-blue">라이브</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="acadBox n2">방문접수</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-notice">
                                                            <div class="acadInfo NSK n1">접수예정</div>
                                                            <div class="priceWrap">
                                                                <span class="dcprice">64,000원</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->
                                        </div>
                                        <!-- willbes-Lec-Table -->

                                        <div class="willbes-Lec-Table p_re">
                                            <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 90px;">
                                                    <col style="width: 590px;">
                                                    <col style="width: 185px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-place bg-light-white">노량진</td>
                                                        <td class="w-list">문제<br>풀이</td>
                                                        <td class="w-data tx-left pl15">
                                                            <div class="w-tit w-acad-tit"><a href="//www.dev.willbes.net/home/html/acad_list_packagesub_new">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</a></div>
                                                            <dl class="w-info acad">
                                                                <dt>
                                                                    <a href="#none" onclick="openWin('InfoForm')">
                                                                        <strong>종합반 상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>개강월 : <span class="tx-blue">2018-02</span></dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강형태 : <span class="tx-blue">라이브</span></dt>
                                                                <dt class="NSK ml15">
                                                                    <span class="acadBox n2">방문접수</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-notice">
                                                            <div class="acadInfo NSK n3">마감</div>
                                                            <div class="priceWrap">
                                                                <span class="price">80,000원</span>
                                                                <span class="discount">(10%↓)</span>  ▶
                                                                <span class="dcprice">64,000원</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->
                                        </div>
                                        <!-- willbes-Lec-Table -->
                                    </div>
                                    <!-- willbes-Lec -->
                                </div>
                                <!-- acad5 -->

                                <div id="acad6" class="tabContent">
                                    <div class="willbes-Lec NG c_both">
                                        <div class="willbes-Lec-Subject tx-dark-black">ㆍ학원강좌 - 단과 강의<span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span></div>
                                        <!-- willbes-Lec-Subject -->

                                        <div class="willbes-Lec-Line">-</div>
                                        <!-- willbes-Lec-Line -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 65px;">
                                                    <col style="width: 85px;">
                                                    <col style="width: 85px;">
                                                    <col width="*">
                                                    <col style="width: 140px;">
                                                    <col style="width: 100px;">
                                                    <col style="width: 140px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-place">노량진</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                                                        <td class="w-list">이론</td>
                                                        <td class="w-data tx-left">
                                                            <div class="w-tit w-acad-tit">
                                                                <a href="#none">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</s>
                                                            </div>
                                                            <dl class="w-info">
                                                                <dt>
                                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                        <strong>강좌상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                                <dt class="ml15">
                                                                    <span class="acadBox n3">방문+온라인</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-schedule">
                                                            <span class="tx-blue">2018-05-20 <br>~ 2018-06-25</span><br/>
                                                            월화수목 (10회차)
                                                        </td>
                                                        <td>
                                                            <ul class="lecBuyBtns">
                                                                <li class="btnVisit"><a href="#none">방문결제</a></li>
                                                                <li class="btnCart">
                                                                    <a onclick="openWin('pocketBox')" >장바구니</a>
                                                                    <div id="pocketBox" class="pocketBox">
                                                                        <a class="closeBtn" href="#none" onclick="closeWin('pocketBox')">
                                                                            <img src="{{ img_url('cart/close.png') }}">
                                                                        </a>
                                                                        해당 상품이 장바구니에 담겼습니다.<br/>
                                                                        장바구니로 이동하시겠습니까?
                                                                        <ul class="NSK mt20">
                                                                            <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                                                            <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                                                            <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('pocketBox')">닫기</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </li>                                    
                                                                <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                            </ul>
                                                        </td>
                                                        <td class="w-notice">
                                                            <div class="acadInfo n2">접수중</div>
                                                            <div class="priceWrap">
                                                                <span class="price">80,000원</span>
                                                                <span class="discount">(10,000원↓)</span>  ▶
                                                                <span class="dcprice">70,000원</span>
                                                            </div> 
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>                         
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <div class="lecInfoTable bookInfoTable">
                                                <ul>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>수강생 교재</span> 
                                                            2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label>[판매중]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none">
                                                            <span class="tx-blue">30,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>주교재</span> 
                                                            정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">                                
                                                            <label class="tx-red">[품절]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">20,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>부교재</span> 
                                                            2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label class="tx-purple-gray ">[출간예정]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">0원</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>                                
                                                <div>
                                                    <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- willbes-Lec-Table -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 65px;">
                                                    <col style="width: 85px;">
                                                    <col style="width: 85px;">
                                                    <col width="*">
                                                    <col style="width: 140px;">
                                                    <col style="width: 100px;">
                                                    <col style="width: 140px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-place">노량진</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                                                        <td class="w-list">이론</td>
                                                        <td class="w-data tx-left">
                                                            <div class="w-tit w-acad-tit">[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</div>
                                                            <dl class="w-info">
                                                                <dt>
                                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                        <strong>강좌상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                                <dt class="ml15">
                                                                    <span class="acadBox n2">온라인 접수</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-schedule">
                                                            <span class="tx-blue mb5">2018-05-20 <br/>~ 2018-06-30</span><br/>
                                                            월화수 (10회차)
                                                        </td>
                                                        <td>
                                                            <ul class="lecBuyBtns">
                                                                <li class="btnCart"><a href="#none">장바구니</a></li>                                    
                                                                <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                            </ul>
                                                        </td>
                                                        <td class="w-notice p_re">
                                                            <div class="acadInfo n1">접수예정</div>
                                                            <div class="priceWrap">
                                                                <span class="dcprice">70,000원</span>
                                                            </div>
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <div class="lecInfoTable bookInfoTable">
                                                <ul>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>수강생 교재</span> 
                                                            2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label>[판매중]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none">
                                                            <span class="tx-blue">30,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>주교재</span> 
                                                            정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">                                
                                                            <label class="tx-red">[품절]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">20,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>부교재</span> 
                                                            2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label class="tx-purple-gray ">[출간예정]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">0원</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>                                
                                                <div>
                                                    <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- willbes-Lec-Table -->
                                    </div>
                                    <!-- willbes-Lec -->
                                </div>
                                <!-- acad6 -->

                                <div id="acad7" class="tabContent">
                                    <div class="willbes-Lec NG c_both">
                                        <div class="willbes-Lec-Subject tx-dark-black">ㆍ학원강좌 - 특강<span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span></div>
                                        <!-- willbes-Lec-Subject -->

                                        <div class="willbes-Lec-Line">-</div>
                                        <!-- willbes-Lec-Line -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 65px;">
                                                    <col style="width: 85px;">
                                                    <col style="width: 85px;">
                                                    <col width="*">
                                                    <col style="width: 140px;">
                                                    <col style="width: 100px;">
                                                    <col style="width: 140px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-place">노량진</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                                                        <td class="w-list">이론</td>
                                                        <td class="w-data tx-left">
                                                            <div class="w-tit w-acad-tit">
                                                                <a href="#none">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</s>
                                                            </div>
                                                            <dl class="w-info">
                                                                <dt>
                                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                        <strong>강좌상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                                <dt class="ml15">
                                                                    <span class="acadBox n3">방문+온라인</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-schedule">
                                                            <span class="tx-blue">2018-05-20 <br>~ 2018-06-25</span><br/>
                                                            월화수목 (10회차)
                                                        </td>
                                                        <td>
                                                            <ul class="lecBuyBtns">
                                                                <li class="btnVisit"><a href="#none">방문결제</a></li>
                                                                <li class="btnCart">
                                                                    <a onclick="openWin('pocketBox')" >장바구니</a>
                                                                    <div id="pocketBox" class="pocketBox">
                                                                        <a class="closeBtn" href="#none" onclick="closeWin('pocketBox')">
                                                                            <img src="{{ img_url('cart/close.png') }}">
                                                                        </a>
                                                                        해당 상품이 장바구니에 담겼습니다.<br/>
                                                                        장바구니로 이동하시겠습니까?
                                                                        <ul class="NSK mt20">
                                                                            <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                                                            <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                                                            <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('pocketBox')">닫기</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </li>                                    
                                                                <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                            </ul>
                                                        </td>
                                                        <td class="w-notice">
                                                            <div class="acadInfo n2">접수중</div>
                                                            <div class="priceWrap">
                                                                <span class="price">80,000원</span>
                                                                <span class="discount">(10,000원↓)</span>  ▶
                                                                <span class="dcprice">70,000원</span>
                                                            </div> 
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>                         
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <div class="lecInfoTable bookInfoTable">
                                                <ul>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>수강생 교재</span> 
                                                            2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label>[판매중]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none">
                                                            <span class="tx-blue">30,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>주교재</span> 
                                                            정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">                                
                                                            <label class="tx-red">[품절]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">20,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>부교재</span> 
                                                            2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label class="tx-purple-gray ">[출간예정]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">0원</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>                                
                                                <div>
                                                    <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- willbes-Lec-Table -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 65px;">
                                                    <col style="width: 85px;">
                                                    <col style="width: 85px;">
                                                    <col width="*">
                                                    <col style="width: 140px;">
                                                    <col style="width: 100px;">
                                                    <col style="width: 140px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-place">노량진</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                                                        <td class="w-list">이론</td>
                                                        <td class="w-data tx-left">
                                                            <div class="w-tit w-acad-tit">[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</div>
                                                            <dl class="w-info">
                                                                <dt>
                                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                        <strong>강좌상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                                <dt class="ml15">
                                                                    <span class="acadBox n2">온라인 접수</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-schedule">
                                                            <span class="tx-blue mb5">2018-05-20 <br/>~ 2018-06-30</span><br/>
                                                            월화수 (10회차)
                                                        </td>
                                                        <td>
                                                            <ul class="lecBuyBtns">
                                                                <li class="btnCart"><a href="#none">장바구니</a></li>                                    
                                                                <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                            </ul>
                                                        </td>
                                                        <td class="w-notice p_re">
                                                            <div class="acadInfo n1">접수예정</div>
                                                            <div class="priceWrap">
                                                                <span class="dcprice">70,000원</span>
                                                            </div>
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <div class="lecInfoTable bookInfoTable">
                                                <ul>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>수강생 교재</span> 
                                                            2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label>[판매중]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none">
                                                            <span class="tx-blue">30,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>주교재</span> 
                                                            정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">                                
                                                            <label class="tx-red">[품절]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">20,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>부교재</span> 
                                                            2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label class="tx-purple-gray ">[출간예정]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">0원</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>                                
                                                <div>
                                                    <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- willbes-Lec-Table -->
                                    </div>
                                    <!-- willbes-Lec -->
                                </div>
                                <!-- acad7 -->

                                <div id="acad8" class="tabContent">
                                    <div class="willbes-Lec NG c_both">
                                        <div class="willbes-Lec-Subject tx-dark-black">ㆍ학원강좌 - 수강생전용<span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span></div>
                                        <!-- willbes-Lec-Subject -->

                                        <div class="willbes-Lec-Line">-</div>
                                        <!-- willbes-Lec-Line -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 65px;">
                                                    <col style="width: 85px;">
                                                    <col style="width: 85px;">
                                                    <col width="*">
                                                    <col style="width: 140px;">
                                                    <col style="width: 100px;">
                                                    <col style="width: 140px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-place">노량진</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                                                        <td class="w-list">이론</td>
                                                        <td class="w-data tx-left">
                                                            <div class="w-tit w-acad-tit">
                                                                <a href="#none">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</s>
                                                            </div>
                                                            <dl class="w-info">
                                                                <dt>
                                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                        <strong>강좌상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                                <dt class="ml15">
                                                                    <span class="acadBox n3">방문+온라인</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-schedule">
                                                            <span class="tx-blue">2018-05-20 <br>~ 2018-06-25</span><br/>
                                                            월화수목 (10회차)
                                                        </td>
                                                        <td>
                                                            <ul class="lecBuyBtns">
                                                                <li class="btnVisit"><a href="#none">방문결제</a></li>
                                                                <li class="btnCart">
                                                                    <a onclick="openWin('pocketBox')" >장바구니</a>
                                                                    <div id="pocketBox" class="pocketBox">
                                                                        <a class="closeBtn" href="#none" onclick="closeWin('pocketBox')">
                                                                            <img src="{{ img_url('cart/close.png') }}">
                                                                        </a>
                                                                        해당 상품이 장바구니에 담겼습니다.<br/>
                                                                        장바구니로 이동하시겠습니까?
                                                                        <ul class="NSK mt20">
                                                                            <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                                                            <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                                                            <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('pocketBox')">닫기</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </li>                                    
                                                                <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                            </ul>
                                                        </td>
                                                        <td class="w-notice">
                                                            <div class="acadInfo n2">접수중</div>
                                                            <div class="priceWrap">
                                                                <span class="price">80,000원</span>
                                                                <span class="discount">(10,000원↓)</span>  ▶
                                                                <span class="dcprice">70,000원</span>
                                                            </div> 
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>                         
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <div class="lecInfoTable bookInfoTable">
                                                <ul>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>수강생 교재</span> 
                                                            2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label>[판매중]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none">
                                                            <span class="tx-blue">30,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>주교재</span> 
                                                            정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">                                
                                                            <label class="tx-red">[품절]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">20,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>부교재</span> 
                                                            2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label class="tx-purple-gray ">[출간예정]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">0원</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>                                
                                                <div>
                                                    <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- willbes-Lec-Table -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 65px;">
                                                    <col style="width: 85px;">
                                                    <col style="width: 85px;">
                                                    <col width="*">
                                                    <col style="width: 140px;">
                                                    <col style="width: 100px;">
                                                    <col style="width: 140px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-place">노량진</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                                                        <td class="w-list">이론</td>
                                                        <td class="w-data tx-left">
                                                            <div class="w-tit w-acad-tit">[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</div>
                                                            <dl class="w-info">
                                                                <dt>
                                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                        <strong>강좌상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                                <dt class="ml15">
                                                                    <span class="acadBox n2">온라인 접수</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-schedule">
                                                            <span class="tx-blue mb5">2018-05-20 <br/>~ 2018-06-30</span><br/>
                                                            월화수 (10회차)
                                                        </td>
                                                        <td>
                                                            <ul class="lecBuyBtns">
                                                                <li class="btnCart"><a href="#none">장바구니</a></li>                                    
                                                                <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                            </ul>
                                                        </td>
                                                        <td class="w-notice p_re">
                                                            <div class="acadInfo n1">접수예정</div>
                                                            <div class="priceWrap">
                                                                <span class="dcprice">70,000원</span>
                                                            </div>
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <div class="lecInfoTable bookInfoTable">
                                                <ul>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>수강생 교재</span> 
                                                            2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label>[판매중]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none">
                                                            <span class="tx-blue">30,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>주교재</span> 
                                                            정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">                                
                                                            <label class="tx-red">[품절]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">20,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>부교재</span> 
                                                            2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label class="tx-purple-gray ">[출간예정]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">0원</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>                                
                                                <div>
                                                    <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- willbes-Lec-Table -->
                                    </div>
                                    <!-- willbes-Lec -->
                                </div>
                                <!-- acad8 -->

                                <div id="acad9" class="tabContent">
                                    <div class="willbes-Lec NG c_both">
                                        <div class="willbes-Lec-Subject tx-dark-black">ㆍ학원강좌 - 전국 라이브 영상반<span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span></div>
                                        <!-- willbes-Lec-Subject -->

                                        <div class="willbes-Lec-Line">-</div>
                                        <!-- willbes-Lec-Line -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 65px;">
                                                    <col style="width: 85px;">
                                                    <col style="width: 85px;">
                                                    <col width="*">
                                                    <col style="width: 140px;">
                                                    <col style="width: 100px;">
                                                    <col style="width: 140px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-place">노량진</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                                                        <td class="w-list">이론</td>
                                                        <td class="w-data tx-left">
                                                            <div class="w-tit w-acad-tit">
                                                                <a href="#none">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</s>
                                                            </div>
                                                            <dl class="w-info">
                                                                <dt>
                                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                        <strong>강좌상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                                <dt class="ml15">
                                                                    <span class="acadBox n3">방문+온라인</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-schedule">
                                                            <span class="tx-blue">2018-05-20 <br>~ 2018-06-25</span><br/>
                                                            월화수목 (10회차)
                                                        </td>
                                                        <td>
                                                            <ul class="lecBuyBtns">
                                                                <li class="btnVisit"><a href="#none">방문결제</a></li>
                                                                <li class="btnCart">
                                                                    <a onclick="openWin('pocketBox')" >장바구니</a>
                                                                    <div id="pocketBox" class="pocketBox">
                                                                        <a class="closeBtn" href="#none" onclick="closeWin('pocketBox')">
                                                                            <img src="{{ img_url('cart/close.png') }}">
                                                                        </a>
                                                                        해당 상품이 장바구니에 담겼습니다.<br/>
                                                                        장바구니로 이동하시겠습니까?
                                                                        <ul class="NSK mt20">
                                                                            <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                                                            <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                                                            <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('pocketBox')">닫기</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </li>                                    
                                                                <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                            </ul>
                                                        </td>
                                                        <td class="w-notice">
                                                            <div class="acadInfo n2">접수중</div>
                                                            <div class="priceWrap">
                                                                <span class="price">80,000원</span>
                                                                <span class="discount">(10,000원↓)</span>  ▶
                                                                <span class="dcprice">70,000원</span>
                                                            </div> 
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>                         
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <div class="lecInfoTable bookInfoTable">
                                                <ul>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>수강생 교재</span> 
                                                            2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label>[판매중]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none">
                                                            <span class="tx-blue">30,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>주교재</span> 
                                                            정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">                                
                                                            <label class="tx-red">[품절]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">20,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>부교재</span> 
                                                            2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label class="tx-purple-gray ">[출간예정]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">0원</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>                                
                                                <div>
                                                    <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- willbes-Lec-Table -->

                                        <div class="willbes-Lec-Table">
                                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                                <colgroup>
                                                    <col style="width: 65px;">
                                                    <col style="width: 85px;">
                                                    <col style="width: 85px;">
                                                    <col width="*">
                                                    <col style="width: 140px;">
                                                    <col style="width: 100px;">
                                                    <col style="width: 140px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-place">노량진</td>
                                                        <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                                                        <td class="w-list">이론</td>
                                                        <td class="w-data tx-left">
                                                            <div class="w-tit w-acad-tit">[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</div>
                                                            <dl class="w-info">
                                                                <dt>
                                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                        <strong>강좌상세정보</strong>
                                                                    </a>
                                                                </dt>
                                                                <dt><span class="row-line">|</span></dt>
                                                                <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                                <dt class="ml15">
                                                                    <span class="acadBox n2">온라인 접수</span>
                                                                </dt>
                                                            </dl>
                                                        </td>
                                                        <td class="w-schedule">
                                                            <span class="tx-blue mb5">2018-05-20 <br/>~ 2018-06-30</span><br/>
                                                            월화수 (10회차)
                                                        </td>
                                                        <td>
                                                            <ul class="lecBuyBtns">
                                                                <li class="btnCart"><a href="#none">장바구니</a></li>                                    
                                                                <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                            </ul>
                                                        </td>
                                                        <td class="w-notice p_re">
                                                            <div class="acadInfo n1">접수예정</div>
                                                            <div class="priceWrap">
                                                                <span class="dcprice">70,000원</span>
                                                            </div>
                                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- lecTable -->

                                            <div class="lecInfoTable bookInfoTable">
                                                <ul>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>수강생 교재</span> 
                                                            2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label>[판매중]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none">
                                                            <span class="tx-blue">30,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>주교재</span> 
                                                            정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">                                
                                                            <label class="tx-red">[품절]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">20,000원</span>
                                                            <span class="tx-dark-gray">(↓10%)</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="b-obj">
                                                            <span>부교재</span> 
                                                            2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)
                                                        </div>
                                                        <div class="bookBuyBtns">
                                                            <a href="#none" class="btnCart">장바구니</a>
                                                            <a href="#none" class="btnBuy">바로결제</a>
                                                        </div>
                                                        <div class="bookbuyInfo">
                                                            <label class="tx-purple-gray ">[출간예정]</label>
                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk d_none" disabled>
                                                            <span class="tx-blue">0원</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>                                
                                                <div>
                                                    <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- willbes-Lec-Table -->
                                    </div>
                                    <!-- willbes-Lec -->
                                </div>
                                <!-- acad9 -->
                            </div>
                        </div>     
                    </div>
                    <!-- Proftab2// -->
                    
                    <div id="Proftab3" class="tabLink">
                        <div class="willbes-Lec NG c_both p_re">
                            <div class="willbes-Lec-Subject tx-dark-black bdb-dark-gray">
                                ㆍ교재
                                <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a>
                            </div>

                            <div class="willbes-listTable">                                
                                <div class="willbes-Lec-Table bdb-none d_block">        
                                    <table cellspacing="0" cellpadding="0" class="lecTable">
                                        <colgroup>
                                            <col style="width:150px;">
                                            <col style="width:320px;">
                                            <col style="width:150px;">
                                            <col style="width:320px;">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <td class="w-list">
                                                    <div class="bookImg">
                                                        <img src="{{ img_url('sample/book.jpg') }}">
                                                    </div>
                                                </td>
                                                <td class="w-data tx-left pr10">
                                                    <div class="w-tit">
                                                        2019년 1차대비 신광은 형사소송법 적중예상 문제풀이
                                                    </div>

                                                    <div class="w-info">
                                                        신광은 저 <span class="row-line">|</span> 2019-03-08<span class="row-line">|</span> 
                                                        <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')"><strong class="detail">교재상세정보</strong></a>
                                                    </div>

                                                    <div class="priceWrap priceWrap2 mb10">
                                                        <span>[판매중]</span>
                                                        <span class="price">40,000원</span>
                                                        <span class="discount">(10%↓)</span>  ▶
                                                        <span class="dcprice">36,000원</span>
                                                    </div>

                                                    <ul class="lecBuyBtns lecBuyBtns2">
                                                        <li class="btnCart"><a onclick="openWin('pocketBox')">장바구니</a> 
                                                        <div id="pocketBox" class="pocketBox">
                                                            <a class="closeBtn" href="#none" onclick="closeWin('pocketBox')">
                                                                <img src="{{ img_url('cart/close.png') }}">
                                                            </a>
                                                            해당 상품이 장바구니에 담겼습니다.<br/>
                                                            장바구니로 이동하시겠습니까?
                                                            <ul class="NSK mt20">
                                                                <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                                                <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                                                <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('pocketBox')">닫기</a></li>
                                                            </ul>
                                                        </div>                                 
                                                        <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                    </ul>

                                                    <div class="bookLecBtn">
                                                        <a href="#none" onclick="openWin('bookLec')">
                                                            <strong>교재로 진행중인 강의 ▼</strong>
                                                        </a> 
                                                        {{--강의정보--}}
                                                        <div id="bookLec" class="willbes-Layer-CScenterBox willbes-Layer-bookLecBox">
                                                            <a class="closeBtn" href="#none" onclick="closeWin('bookLec')">
                                                                <img src="{{ img_url('prof/close.png') }}">
                                                            </a>
                                                            <div class="Layer-Cont">
                                                                <div class="LeclistTable">
                                                                    <ul>
                                                                        <li>강의명 1</li>
                                                                        <li>강의명 2</li>
                                                                        <li>강의명 3</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>                                  
                                                    </div>                                
                                                </td>
                                                <td class="w-list">
                                                    <div class="bookImg">
                                                        <img src="{{ img_url('sample/book.jpg') }}">
                                                    </div>
                                                </td>
                                                <td class="w-data tx-left pr10">
                                                    <div class="w-tit">
                                                        2019년 1차대비 신광은 형사소송법 적중예상 문제풀이
                                                    </div>

                                                    <div class="w-info">
                                                        신광은 저 <span class="row-line">|</span> 2019-03-08<span class="row-line">|</span> 
                                                        <a href="#none"><strong class="detail">교재상세정보</strong></a>
                                                    </div>

                                                    <div class="priceWrap priceWrap2 mb10">
                                                        <span>[판매중]</span>
                                                        <span class="price">40,000원</span>
                                                        <span class="discount">(10%↓)</span>  ▶
                                                        <span class="dcprice">36,000원</span>
                                                    </div>

                                                    <ul class="lecBuyBtns lecBuyBtns2">
                                                        <li class="btnCart"><a href="#none">장바구니</a>                                  
                                                        <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                    </ul>

                                                    <div class="bookLecBtn">
                                                        <a href="#none">
                                                            <strong>교재로 진행중인 강의 ▼</strong>
                                                        </a>                                
                                                    </div>                                
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-list">
                                                    <div class="bookImg">
                                                        <img src="{{ img_url('sample/book.jpg') }}">
                                                    </div>
                                                </td>
                                                <td class="w-data tx-left pr10">
                                                    <div class="w-tit">
                                                        2019년 1차대비 신광은 형사소송법 적중예상 문제풀이
                                                    </div>

                                                    <div class="w-info">
                                                        신광은 저 <span class="row-line">|</span> 2019-03-08<span class="row-line">|</span> 
                                                        <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')"><strong class="detail">교재상세정보</strong></a>
                                                    </div>

                                                    <div class="priceWrap priceWrap2 mb10">
                                                        <span>[판매중]</span>
                                                        <span class="price">40,000원</span>
                                                        <span class="discount">(10%↓)</span>  ▶
                                                        <span class="dcprice">36,000원</span>
                                                    </div>

                                                    <ul class="lecBuyBtns lecBuyBtns2">
                                                        <li class="btnCart"><a onclick="openWin('pocketBox')">장바구니</a> 
                                                        <div id="pocketBox" class="pocketBox">
                                                            <a class="closeBtn" href="#none" onclick="closeWin('pocketBox')">
                                                                <img src="{{ img_url('cart/close.png') }}">
                                                            </a>
                                                            해당 상품이 장바구니에 담겼습니다.<br/>
                                                            장바구니로 이동하시겠습니까?
                                                            <ul class="NSK mt20">
                                                                <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                                                <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                                                <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('pocketBox')">닫기</a></li>
                                                            </ul>
                                                        </div>                                 
                                                        <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                    </ul>

                                                    <div class="bookLecBtn">
                                                        <a href="#none" onclick="openWin('bookLec')">
                                                            <strong>교재로 진행중인 강의 ▼</strong>
                                                        </a> 
                                                        {{--강의정보--}}
                                                        <div id="bookLec" class="willbes-Layer-CScenterBox willbes-Layer-bookLecBox">
                                                            <a class="closeBtn" href="#none" onclick="closeWin('bookLec')">
                                                                <img src="{{ img_url('prof/close.png') }}">
                                                            </a>
                                                            <div class="Layer-Cont">
                                                                <div class="LeclistTable">
                                                                    <ul>
                                                                        <li>강의명 1</li>
                                                                        <li>강의명 2</li>
                                                                        <li>강의명 3</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>                                  
                                                    </div>                                
                                                </td>
                                                <td class="w-list">
                                                    <div class="bookImg">
                                                        <img src="{{ img_url('sample/book.jpg') }}">
                                                    </div>
                                                </td>
                                                <td class="w-data tx-left pr10">
                                                    <div class="w-tit">
                                                        2019년 1차대비 신광은 형사소송법 적중예상 문제풀이
                                                    </div>

                                                    <div class="w-info">
                                                        신광은 저 <span class="row-line">|</span> 2019-03-08<span class="row-line">|</span> 
                                                        <a href="#none"><strong class="detail">교재상세정보</strong></a>
                                                    </div>

                                                    <div class="priceWrap priceWrap2 mb10">
                                                        <span>[판매중]</span>
                                                        <span class="price">40,000원</span>
                                                        <span class="discount">(10%↓)</span>  ▶
                                                        <span class="dcprice">36,000원</span>
                                                    </div>

                                                    <ul class="lecBuyBtns lecBuyBtns2">
                                                        <li class="btnCart"><a href="#none">장바구니</a>                                  
                                                        <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                    </ul>

                                                    <div class="bookLecBtn">
                                                        <a href="#none">
                                                            <strong>교재로 진행중인 강의 ▼</strong>
                                                        </a>                                
                                                    </div>                                
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="w-list">등록된 교재정보가 없습니다.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->
                                </div>
                            </div>

                            {{-- 교재보기 팝업 willbes-Layer-Box --}}
                            <div id="InfoForm" class="willbes-Layer-Box">
                                <a class="closeBtn" href="#none" onclick="closeWin('InfoForm'),closeWin('bookPocketBox')">
                                    <img src="{{ img_url('sub/close.png') }}">
                                </a>
                                <div class="Layer-Tit tx-dark-black NG">
                                    교재상세정보
                                </div>
                                <div class="lecDetailWrap">
                                    <div class="tabBox">
                                        <div class="tabLink book2">
                                            <div class="bookWrap">
                                                <div class="bookInfo">
                                                    <div class="bookImg">
                                                        <img src="{{ img_url('sample/book.jpg') }}">
                                                    </div>
                                                    <div class="bookDetail p_re">
                                                        <div class="bookBuy">
                                                            <ul class="bookBuyBtns">
                                                                <li class="btnCart"><a onclick="openWin('bookPocketBox')">장바구니</a>                                
                                                                <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                            </ul>
                                                            <div id="bookPocketBox" class="bookPocketBox">
                                                                <a class="closeBtn" href="#none" onclick="closeWin('bookPocketBox')">
                                                                    <img src="{{ img_url('cart/close.png') }}">
                                                                </a>
                                                                해당 상품이 장바구니에 담겼습니다.<br/>
                                                                장바구니로 이동하시겠습니까?
                                                                <ul class="NSK mt20">
                                                                    <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                                                    <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                                                    <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('bookPocketBox')">닫기</a></li>
                                                                </ul>
                                                            </div>  
                                                        </div>

                                                        <div class="book-Tit tx-dark-black NG">2018 기특한국어기출문제집 (전2권)</div>
                                                        <div class="book-Author tx-gray">
                                                            <ul>
                                                                <li>분야 : 9급공무원 <span class="row-line">|</span></li>
                                                                <li>저자 : 저자명 <span class="row-line">|</span></li>
                                                                <li>출판사 : 출판사명 <span class="row-line">|</span></li>
                                                                <li>판형/쪽수 : 190*260 / 769</li>
                                                            </ul>
                                                            <ul>
                                                                <li>출판일 : 2018-00-00 <span class="row-line">|</span></li>
                                                                <li>
                                                                    교재비 : <strong class="line-through">20,000원</strong> <strong class="tx-red">(20%↓)</strong> <strong class="tx-light-blue">20,000원</strong> <strong class="tx-red">[품절]</strong> <strong class="tx-light-blue">[판매중]</strong>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="bookBoxWrap">
                                                            <ul class="tabWrap tabDepth2">
                                                                <li><a href="#info1" class="on">교재소개</a></li>
                                                                <li><a href="#info2">교재목차</a></li>
                                                            </ul>
                                                            <div class="tabBox">
                                                                <div id="info1" class="tabContent">
                                                                    <div class="book-TxtBox tx-gray">
                                                                        2018년재신정판을내면서..<br/>
                                                                        첫째, 2017년에출제된모든기출문제를반영하여수록하였습니다.<br/>
                                                                        둘째, 매지문마다해설을충실히달았습니다..<br/>
                                                                        셋째, 책분량이너무많아져최근5년간기출문제(2013-2017년)는빠짐없이수록하되, 오래된문제라도<br/>
                                                                        기본적이고중요한내용을담고있는부분은유지하되중복된부분은덜어냈습니다.
                                                                    </div>
                                                                    <div class="caution-txt tx-red">수강생 교재는 해당 온라인 강좌 수강생에 한해 구매 가능합니다. (교재만 별도 구매 불가능)</div>
                                                                </div>
                                                                <div id="info2" class="tabContent">
                                                                    <div class="book-TxtBox tx-gray">
                                                                        제1편 현대 문법<br/>
                                                                        제2편 고전 문법<br/>
                                                                        제3편 국어 생활<br/>
                                                                        제4편 현대 문학<br/>
                                                                        제5편 고전 문학<br/>
                                                                        제1편 현대 문법<br/>
                                                                        제2편 고전 문법<br/>
                                                                        제3편 국어 생활<br/>
                                                                        제4편 현대 문학<br/>
                                                                        제5편 고전 문학
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- willbes-Layer-Box -->
                        </div>

                        
                    </div>
                    <!-- Proftab// -->
                </div>
                <!-- tabBox// -->
            </div>
        </div>
        <!-- willbes-Prof-Tabs -->
    </div>
</div>
<!-- End Container -->
@stop