@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center cscenter">
                <li>
                    <a href="{{ site_url('/home/html/cscenter_index') }}">고객센터 HOME</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter1') }}">자주하는 질문</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter2') }}">공지사항</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter3') }}">1:1 상담</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter4') }}">사이트 이용가이드</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter5') }}">모바일 이용가이드</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/cscenter6_1') }}">수강지원</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수강지원</li>
                            <li><a href="{{ site_url('/home/html/cscenter6_1') }}">PC 원격지원</a></li>
                            <li><a href="{{ site_url('/home/html/cscenter6_2') }}">학습 프로그램 설치</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter7') }}">부정사용자 규제</a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>고객센터</strong>
            <span class="depth-Arrow">></span><strong>부정사용자 규제</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-CScenter c_both">
            <div class="Act7">
                <div class="announce_infoBox tx-black NGR">
                    윌비스는 <span class="strong tx-light-blue">공정한 사이트 이용</span>환경을 조성하고, 회원님들의 <span class="strong tx-light-blue">개인정보와 컨텐츠의 저작권을 보호</span>하기 위해<br/>
                    ID 공유 등 불법 사용자에 대한 규제를 시행하고 있습니다.<br/>
                    보다 많은 회원님들께 질높은 콘텐츠와 서비스를 돌려드릴 수 있도록 콘텐츠 부정 사용 근절에 동참 부탁드립니다.<br/>
                    <div class="announce-Btn NSK mt20 mr70 f_right">
                        <ul>
                            <li>
                                <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-gray">
                                    <span class="tx-purple-gray">윌비스 이용약관 확인</span>
                                </button>
                            </li>
                            <li>
                                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                    <span>신고하기</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="willbes-Leclist mt30 c_both">
                    <div class="AnnounceTable NG">
                        <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                            <colgroup>
                                <col style="width: 200px;">
                                <col style="width: 140px;">
                                <col style="width: 600px;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="w-img" rowspan="2"><img src="{{ img_url('cs/icon_announce1.gif') }}"><div>ID 공유</div></td>
                                    <td class="w-tit">적발기준</td>
                                    <td class="w-txt tx-left pl20">
                                        · 하나의 ID를 여러명이 공유하여 수강하는 경우<br/>
                                        · 동시에 동일한 ID로 2대 이상의 PC/IP에서 접속하는 경우<br/>
                                        · PC 접속장소나 교재 배송지가 수시로 변경되는 경우
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-tit">조치사항</td>
                                    <td class="w-txt tx-left pl20">
                                        · 경고문자/메일발송 및 유선연락<br/>
                                        · 7일간 소명 기회부여 (소명자료미제출/재적발시, ID 수강차단)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-img" rowspan="2"><img src="{{ img_url('cs/icon_announce2.gif') }}"><div>무단복제</div></td>
                                    <td class="w-tit">적발기준</td>
                                    <td class="w-txt tx-left pl20">
                                        · 윌비스 강좌를 불법으로 녹화하는 경우<br/>
                                        · 강의 수강중 복제 프로그램을 실행/불법 녹화를 시도하는 경우
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-tit">조치사항</td>
                                    <td class="w-txt tx-left pl20">
                                        · 적발 즉시 수강차단 및 법적 제재진행<br/>
                                        · 내강의실 경고 팝업 및 쪽지발송
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-img" rowspan="2"><img src="{{ img_url('cs/icon_announce3.gif') }}"><div>불법판매/유통</div></td>
                                    <td class="w-tit">적발기준</td>
                                    <td class="w-txt tx-left pl20">
                                        · 윌비스 강좌 및 교재를 상업적인 목적으로 복제해 무단 유통/판매한 경우<br/>
                                        · 자신의 ID/강좌 등의 서비스를 타인에게 양도/판매/대여하는 경우<br/>
                                        · 커뮤니티, 게시판 등을 통해 강좌, 교재 불법 공유내용을 게시/판매하는 경우
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-tit">조치사항</td>
                                    <td class="w-txt tx-left pl20">
                                        · 적발 즉시 수강차단 및 법적 제재진행<br/>
                                        · 사전 경고없이 ID 영구정지
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-CScenter -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop