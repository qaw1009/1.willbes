@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center">
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass_index') }}">내강의실 HOME</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass1') }}">무한PASS존</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_online1') }}">온라인강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">온라인강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_online1') }}">수강대기강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online2') }}">수강중강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online3') }}">일시정지강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online4') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_acad1') }}">학원강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학원강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_acad1') }}">수강신청강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_acad2') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_event') }}">특강&이벤트 신청현황</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_test1') }}">모의고사관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">모의고사관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_test1') }}">접수현황</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_test2') }}">온라인모의고사 응시</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_test3') }}">성적결과</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_payment1') }}">결제관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">결제관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_payment1') }}">주문/배송조회</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment3') }}">포인트관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment4') }}">쿠폰/수강권관리</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_support1') }}">학습지원관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학습지원관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_support1') }}">쪽지관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support2') }}">알림관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support3') }}">상담내역</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">회원정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">회원정보</li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo1') }}">개인정보관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo2') }}">비밀번호변경</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>내강의실</strong>
            <span class="depth-Arrow">></span><strong>무한PASS존</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="willbes-Mypage-PASSZONE c_both">
            <div class="willbes-Prof-Mypage NG tx-black">
                <div class="prof-profile p_re">
                    <div class="Name">
                        <strong>정채영</strong><br>
                        교수님
                    </div>
                    <div class="ProfImg">
                        <img src="/public/img/willbes/sample/prof2-1.png">
                    </div>
                    <div class="prof-home subBtn NSK"><a href="#none"><img src="/public/img/willbes/sub/icon_profhome.gif" style="margin-top: -4px; margin-right: 4px">교수홈</a></div>
                </div>
                <div class="lec-profile p_re">
                    <div class="w-tit">2018 정채영 국어 [현대] 문학종결자 문학집중강의 (5-6월 문학집중)</div>
                    <dl class="w-info tx-dark-gray">
                        <dt class="NSK ml10">
                            <span class="nBox n1">2배수</span>
                            <span class="nBox n2">진행중</span>
                            <span class="nBox n3">예정</span>
                            <span class="nBox n4">완강</span>
                        </dt>
                    </dl>
                    <div class="Prof-MypageBox pt15 c_both">
                        <table cellspacing="0" cellpadding="0" class="ProfmypageTable">
                            <colgroup>
                                <col style="width: 145px;"/>
                                <col style="width: 105px;"/>
                                <col style="width: 125px;"/>
                                <col style="width: 100px;"/>
                                <col style="width: 165px;"/>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="w-lectit">최근수강강의</div>
                                        <div class="w-lec NGEB">2강</div>
                                        <div class="w-date tx-gray">(수강일 : 2018.3.20)</div>
                                    </td>
                                    <td>
                                        <div class="w-lectit">진도율</div>
                                        <div class="w-lec NGEB">20%</div>
                                        <div class="w-date tx-gray">(수강시간기준)</div>
                                    </td>
                                    <td>
                                        <div class="w-lectit">일시정지</div>
                                        <div class="w-lec NGEB"><span class="tx-light-blue">2</span>회</div>
                                        <div class="w-date tx-gray">(3.20~4.20)</div>
                                    </td>
                                    <td>
                                        <div class="w-lectit">수강연장</div>
                                        <div class="w-lec NGEB"><span class="tx-light-blue">3</span>회</div>
                                        <div class="w-date tx-gray">
                                            (* 3회까지)
                                            <!--div class="w-btn">
                                                <a class="bg-blue bd-dark-blue NSK" href="#none" onclick="">신청</a>
                                            </div-->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-lectit">잔여기간</div>
                                        <div class="w-lec NGEB"><span class="tx-light-blue">10</span>일/ 100일</div>
                                        <div class="w-date tx-gray">(2018.3.20~2018.6.20)</div>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="Mypage-PASSZONE-Btn">
                <ul>
                    <li class="subBtn blue NSK"><a href="#none">수강후기 작성하기 ></a></li>
                    <li class="subBtn NSK"><a href="#none">학습 Q&A</a></li>
                </ul>
                <div class="aBox passBox answerBox_block NSK f_right"><a href="#none" onclick="openWin('MoreBook')">교재구매</a></div>
            </div>
        </div>
        <!-- willbes-Mypage-PASSZONE -->

        <div id="MoreBook" class="willbes-Layer-PassBox willbes-Layer-PassBox800 h1100 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('MoreBook')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">무한PASS 교재구매</div> 

            <div class="lecMoreWrap">

                <div class="PASSZONE-List widthAutoFull">
                    <ul class="passzoneInfo tx-gray NGR">
                        <li>· 무한PASS로 수강중인 강좌에 제공되는 교재를 구매하실 수 있습니다. (<span class="tx-red">‘수강중강좌’ 교재만 구매가능</span>)</li>
                    </ul>
                    <div class="willbes-Lec-Selected willbes-Pass-Selected tx-gray">
                        <select id="lec" name="lec" title="lec" class="seleLec">
                            <option selected="selected">과목</option>
                            <option value="헌법">헌법</option>
                            <option value="스파르타반">스파르타반</option>
                            <option value="공직선거법">공직선거법</option>
                        </select>
                        <select id="Prof" name="Prof" title="Prof" class="seleProf">
                            <option selected="selected">교수님</option>
                            <option value="정채영">정채영</option>
                            <option value="기미진">기미진</option>
                            <option value="김세령">김세령</option>
                        </select>
                        <div class="willbes-Lec-Search GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="교재명 또는 강좌명을 입력해 주세요." maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="PASSZONE-Lec-Section">
                        <div class="LeclistTable LeclistPASSTable">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 60px;">
                                    <col style="width: 70px;">
                                    <col style="width: 410px;">
                                    <col style="width: 70px;">
                                    <col style="width: 140px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="tx-left" colspan="5">
                                            국어<span class="row-line">|</span>정채영<br/>
                                            <div class="w-tit tx-left strong">2018 정채영 국어 [현대문학] 137작품을 알려주마! (5월-6월)</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-type"><span class="tx-light-blue">주교재</span></td>
                                        <td class="w-tit tx-left pl20">2018 정채영 국어 마무리 시리즈 [문학편]_ 137작품을 알려주마</td>
                                        <td class="w-buy"><span class="tx-light-blue">[판매중]</span></td>
                                        <td class="w-price">30,000원 (<span class="tx-red">↓10%</span>)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-type"><span class="tx-light-blue">부교재</span></td>
                                        <td class="w-tit tx-left pl20">2018 정채영 국어 마무리 시리즈 [문학편]_ 137작품을 알려주마</td>
                                        <td class="w-buy"><span class="tx-red">[품절]</span></td>
                                        <td class="w-price">30,000원 (<span class="tx-red">↓10%</span>)</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table cellspacing="0" cellpadding="0" class="listTable passTable under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 60px;">
                                    <col style="width: 70px;">
                                    <col style="width: 410px;">
                                    <col style="width: 70px;">
                                    <col style="width: 140px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="tx-left" colspan="5">
                                            국어<span class="row-line">|</span>정채영<br/>
                                            <div class="w-tit tx-left strong">2018 정채영 국어 [현대문학] 137작품을 알려주마! (5월-6월)</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-type"><span class="tx-light-blue">주교재</span></td>
                                        <td class="w-tit tx-left pl20">2018 정채영 국어 마무리 시리즈 [문학편]_ 137작품을 알려주마</td>
                                        <td class="w-buy"><span class="tx-light-blue">[판매중]</span></td>
                                        <td class="w-price">30,000원 (<span class="tx-red">↓10%</span>)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-type"><span class="tx-light-blue">부교재</span></td>
                                        <td class="w-tit tx-left pl20">2018 정채영 국어 마무리 시리즈 [문학편]_ 137작품을 알려주마</td>
                                        <td class="w-buy"><span class="tx-red">[품절]</span></td>
                                        <td class="w-price">30,000원 (<span class="tx-red">↓10%</span>)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="Search-Result strong mt40 mb20 tx-gray">· 선택교재</div>
                        <div class="LeclistTable LeclistPASSTableRow">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 60px;">
                                    <col style="width: 550px;">
                                    <col style="width: 140px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>삭제<span class="row-line">|</span></th>
                                        <th>상품정보<span class="row-line">|</span></th>
                                        <th>판매가</th>
                                    </tr>
                                </thead>
                            </table>
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select overflow under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 60px;">
                                    <col style="width: 550px;">
                                    <col style="width: 140px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                        
                        <ul class="cart-PriceBox NG">
                            <li class="price-list p_re">
                                <dl class="priceBox">
                                    <dt>
                                        <div>상품주문금액</div>
                                        <div class="price tx-light-blue">140,000원</div>
                                    </dt>
                                    <dt class="price-img">
                                        <span class="row-line">|</span>
                                        <img src="/public/img/willbes/sub/icon_plus.gif">
                                    </dt>
                                    <dt>
                                        <div>배송료</div>
                                        <span class="price tx-light-blue">2,500원</span>
                                    </dt>
                                </dl>
                            </li>
                            <li class="price-total">
                                <div>최종결제금액</div>
                                <span class="price tx-light-blue">188,600원</span>
                            </li>
                        </ul>                                                
                        <div class="willbes-Lec-buyBtn">
                            <ul>
                                <li class="btnAuto95 h30">
                                    <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                                        <span class="tx-light-blue">장바구니</span>
                                    </button>
                                </li>
                                <li class="btnAuto95 h30">
                                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                        <span>바로결제</span>
                                    </button>
                                </li>
                            </ul>
                        </div> 
                        <div class="c_both tx-origin-red">* 30,000원 이상 교재 구매 시 배송료는 무료입니다.</div>                       
                    </div>
                    
                </div>
                <!-- PASSZONE-List -->                
            </div>
            

        </div>
        <!-- willbes-Layer-PassBox : 무한PASS 교재구매 -->

        <div class="willbes-Leclist c_both mt40">
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
                    <colgroup>
                        <col style="width: 80px;">
                        <col style="width: 200px;">
                        <col style="width: 90px;">
                        <col style="width: 90px;">
                        <col style="width: 120px;">
                        <col style="width: 100px;">
                        <col style="width: 155px;">
                        <col style="width: 105px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></li></th>
                            <th>강의명<span class="row-line">|</span></li></th>
                            <th>북페이지<span class="row-line">|</span></li></th>
                            <th>자료<span class="row-line">|</span></li></th>
                            <th>강의수강<span class="row-line">|</span></li></th>
                            <th>강의시간<span class="row-line">|</span></li></th>
                            <th>수강시간/배수시간<span class="row-line">|</span></li></th>
                            <th>잔여시간</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-no">1강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-page">10p~15p</td>
                            <td class="w-file">
                                <a href="#none"><img src="{{ img_url('prof/icon_down.png') }}"></a>
                            </td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-lec-time">50분</td>
                            <td class="w-study-time">40분/ 100분</td>
                            <td class="w-r-time">50분</td>
                        </tr>
                        <tr class="finish">
                            <td class="w-no">2강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-page">5p~15p</td>
                            <td class="w-file">
                                <a href="#none"><img src="{{ img_url('prof/icon_down.png') }}"></a>
                            </td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-lec-time">40분</td>
                            <td class="w-study-time">10분/ 100분</td>
                            <td class="w-r-time">40분</td>
                        </tr>
                        <tr>
                            <td class="w-no">3강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-page">25p~30p</td>
                            <td class="w-file">
                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                            </td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-lec-time">30분</td>
                            <td class="w-study-time">90분/ 100분</td>
                            <td class="w-r-time">30분</td>
                        </tr>
                        <tr>
                            <td class="w-no">4강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-page">40p~70p</td>
                            <td class="w-file">
                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                            </td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-lec-time">20분</td>
                            <td class="w-study-time">70분/ 100분</td>
                            <td class="w-r-time">20분</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Leclist -->
    </div>

    
</div>

    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop