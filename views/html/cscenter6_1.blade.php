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
            <span class="depth-Arrow">></span><strong>수강지원</strong>
            <span class="depth-Arrow">></span><strong>PC 원격지원</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-CScenter c_both">
            <div class="Act6">
                <div class="support_infoBox tx-black p_re NGR">
                    <img src="{{ img_url('cs/willbes_pc_support.jpg') }}"> 
                    <div class="support-Btn NSK">
                        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue"><span>PC 원격지원 시작</span></button>
                    </div>
                </div>
                <div class="willbes-Leclist mt25 c_both">
                    <div class="SupportTable NG">
                        <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                            <colgroup>
                                <col style="width: 150px;">
                                <col style="width: 790px;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="w-tit tx-black tx-left pl40">운영시간</td>
                                    <td class="w-txt tx-left pl30">평일 <span class="strong tx-light-blue">09:00 ~ 18:00</span> (주말/공휴일휴무)</td>
                                </tr>
                                <tr>
                                    <td class="w-tit tx-black tx-left pl40">이럴때<br/>요청하세요.</td>
                                    <td class="w-txt tx-left pl30">
                                        · FAQ 또는 1:1 상담으로 문제가 해결되지 않을때<br/>
                                        · PC 사용이 익숙하지 않아 문제해결이 어려울때<br/>
                                        · 1:1 상담게시판, 전화로 설명하기 어려울때
                                    </td>
                                </tr>
                                <tr>
                                <td class="w-tit tx-black tx-left pl40">PC 원격지원<br/>이용순서</td>
                                    <td class="w-txt tx-left pl30">
                                        <ul>
                                            <li>
                                                <div class="w-tit tx-black">PC 사양확인</div>
                                                <div class="w-txt">
                                                    원격진단을 받으실<br/>
                                                    PC 사양을<br/>
                                                    확인해주세요
                                                </div>
                                            </li>
                                            <li class="arrow"><img src="{{ img_url('cs/icon_cs_arrow.png') }}"></li>
                                            <li>
                                                <div class="w-tit tx-black">원격지원 전화상담</div>
                                                <div class="w-txt">
                                                    고객센터<br/>
                                                    (1544-5006)로<br/>
                                                    전화주세요.
                                                </div>
                                            </li>
                                            <li class="arrow"><img src="{{ img_url('cs/icon_cs_arrow.png') }}"></li>
                                            <li>
                                                <div class="w-tit tx-black">프로그램 실행</div>
                                                <div class="w-txt">
                                                    원격지원 프로그램을<br/>
                                                    설치 및<br/>
                                                    실행해 주세요.
                                                </div>
                                            </li>
                                            <li class="arrow"><img src="{{ img_url('cs/icon_cs_arrow.png') }}"></li>
                                            <li>
                                                <div class="w-tit tx-black">문제진단 및 해결</div>
                                                <div class="w-txt">
                                                    상담원이 문제를 <br/>
                                                    파악하고 빠르게 <br/>
                                                    해결해드립니다.
                                                </div>
                                            </li>
                                        </ul>

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