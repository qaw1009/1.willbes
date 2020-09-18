@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">임용<span class="row-line">|</span></li>
                <li class="subTit">윌비스임용</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">내강의실</a>
                </li>
                <li>
                    <a href="#none">강의안내/신청</a>
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
        <span class="depth"><span class="depth-Arrow">></span><strong>임용정보</strong></span>
        <span class="depth"><span class="depth-Arrow">></span><strong>강의 업데이트</strong></span>
    </div>
    <div class="Content p_re">
        <div class="willbes-AcadInfo c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black pt-zero">· 강의 업데이트</div>

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
                                    <td class="w-no">6523</td>
                                    <td class="w-campus">전기전자통신</td>
                                    <td>최우영</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[통합] 2020 7~9월 영역별 문제풀이반(1~5월 통합 이론반)</a></td>                                    
                                    <td class="w-date">09월 14일 총 10강 업로드</td>
                                </tr>
                                <tr>
                                    <td class="w-no">6523</td>
                                    <td class="w-campus">전기전자통신</td>
                                    <td>최우영</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[통합] 2020 7~9월 영역별 문제풀이반(1~5월 통합 이론반)</a></td>                                    
                                    <td class="w-date">09월 14일 총 10강 업로드</td>
                                </tr>
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
                                    <td class="w-no">6523</td>
                                    <td class="w-campus">전기전자통신</td>
                                    <td>최우영</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[통합] 2020 7~9월 영역별 문제풀이반(1~5월 통합 이론반)</a></td>                                    
                                    <td class="w-date">09월 14일 총 10강 업로드</td>
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
        <!-- willbes-AcadInfo -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop