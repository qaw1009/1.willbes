@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
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
    
    @include('html.wsBook_menu')

    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>업무제휴 문의</strong>
        </span>
    </div>

    <div class="Content p_re">
        <div class="wsBook-Subject tx-dark-black NG">
            · 업무제휴 문의
        </div> 

        {{--목록--}}
        <div class="willbes-Leclist c_both">
            <div class="willbes-Lec-Search GM f_left mb20">
                <div class="inputBox p_re">
                    <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                    <button type="submit" onclick="" class="search-Btn">
                        <span>검색</span>
                    </button>
                </div>
            </div>
            <div class="subBtn blue NSK f_right"><a href="#none">문의하기 ></a></div>
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                    <colgroup>
                        <col style="width: 65px;">    
                        <col >
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
                            <th>답변상태</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                            <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                            <td class="w-write">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                        </tr>
                        <tr>
                            <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                            <td class="w-list tx-left pl20"><a href="#none">만14세미만회원은어떻게가입하나요?</a></td>
                            <td class="w-write">장동*</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-answer"><span class="aBox waitBox NSK">답변대기</span></td>
                        </tr>
                        <tr>
                            <td class="w-no">10</td>
                            <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                            <td class="w-write">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-answer">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">9</td>
                            <td class="w-list tx-left pl20">
                                <a href="#none">
                                    <img src="{{ img_url('prof/icon_locked.gif') }}"> 회원탈퇴는어떻게하나요? 
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
                            <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                            <td class="w-write">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-answer">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">7</td>
                            <td class="w-list tx-left pl20">
                                <a href="#none">
                                    <img src="{{ img_url('prof/icon_locked.gif') }}"> 회원탈퇴는어떻게하나요? 
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
                            <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                            <td class="w-write">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-answer">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">5</td>
                            <td class="w-list tx-left pl20">
                                <a href="#none">
                                    <img src="{{ img_url('prof/icon_locked.gif') }}"> 회원탈퇴는어떻게하나요? 
                                    <img src="{{ img_url('prof/icon_N.gif') }}"> 
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
                                    <img src="{{ img_url('prof/icon_locked.gif') }}"> 회원탈퇴는어떻게하나요?
                                </a>
                            </td>
                            <td class="w-write">장동*</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-answer">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">3</td>
                            <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                            <td class="w-write">박형*</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-answer">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">2</td>
                            <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
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

        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        
        {{--글쓰기--}}
        <div class="willbes-Leclist c_both">
            <div class="LecWriteTable">                        
                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                    <colgroup>
                        <col style="width: 120px;">
                        <col style="width: 820px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">공개여부</td>
                            <td class="w-radio tx-left pl30" colspan="3">
                                <ul>
                                    <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>공개</label></li>
                                    <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>비공개</label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">제목<span class="tx-light-blue">(*)</span></td>
                            <td class="w-text tx-left pl30" colspan="3">
                                <input type="text" id="TITLE" name="TITLE" class="iptTitle" maxlength="30">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">내용<span class="tx-light-blue">(*)</span></td>
                            <td class="w-textarea write tx-left pl30" colspan="3">
                                <textarea></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">첨부</td>
                            <td class="w-file answer tx-left" colspan="4">
                                <ul class="attach">
                                    <li>
                                        <!--div class="filetype">
                                            <input type="text" class="file-text" />
                                            <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                            <span class="file-select"-->
                                                <input type="file" class="input-file" size="3">
                                            <!--/span>
                                            <input class="file-reset NSK" type="button" value="X" />
                                        </div-->
                                    </li>
                                    <li>
                                        <!--div class="filetype">
                                            <input type="text" class="file-text" />
                                            <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                            <span class="file-select"-->
                                                <input type="file" class="input-file" size="3">
                                            <!--/span>
                                            <input class="file-reset NSK" type="button" value="X" />
                                        </div-->
                                    </li>
                                    <li>
                                        • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                        • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="search-Btn mt20 h36 p_re">
                    <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                        <span class="tx-purple-gray">취소</span>
                    </button>
                    <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                        <span>저장</span>
                    </button>
                </div>
            </div>
        </div>

        <br/>
        <br/>
        <br/>
        <br/>
        <br/>

        {{--글보기--}}
        <div class="willbes-Leclist c_both">
            <div class="LecViewTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black tx-gray">
                    <colgroup>
                        <col style="width: 645px;">
                        <col style="width: 135px;">
                        <col style="width: 160px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="w-list tx-left pl20">
                                <strong>업무제휴 문의합니다.</strong>
                            </th>
                            <th class="w-write">작성자명<span class="row-line">|</span></th>
                            <th class="w-date">2018-00-00 00:00</th>
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
                            <td class="w-txt answer tx-left" colspan="3">
                                윌스토리와 업무제휴 문의 드립니다.<br>
                                제 이메일 주소는 abcd@naver.com<br>
                                연락처는 010-0000-0000입니다.
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdb-gray tx-gray">
                    <colgroup>
                        <col style="width: 90px;">
                        <col style="width: 690px;">
                        <col style="width: 160px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <td class="w-answer"><img src="{{ img_url('prof/icon_answer.gif') }}"></td>
                            <td class="w-write tx-left">홍길*<span class="row-line">|</span></td>
                            <td class="w-date">2018-00-00 00:00</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-txt answer tx-left" colspan="3">
                                안녕하세요. 윌스토리 담당자입니다.<br>
                                검토 후 알려주신 연락처로 연락드리도록 하겠습니다.
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="search-Btn mt20 h36 p_re">
                    <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                        <a href="#none" class="tx-purple-gray">삭제</a>
                    </div>
                    <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray center">
                        <a href="#none" class="tx-purple-gray">수정</a>
                    </div>
                    <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                        <a href="#none">목록</a>
                    </div>
                </div>

            </div>
        </div>      
    </div>   
    
    <div class="Quick-Bnr ml20">
        <img src="https://static.willbes.net/public/images/promotion/sub/sub_bn_160.jpg">     
    </div>

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
@stop