@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-Mypage-ONLINEZONE c_both">
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                        <tbody>
                        <tr>
                            <td>
                                <div class="Tit">북마크</div>
                                <div class="Txt">
                                    - 북마크는 강좌 수강 중 다시 보고 싶은 위치를 저장해 두는 편리한 기능입니다.<br/>
                                    - 북마크 저장은 수강 시 플레이어의 북마크 메뉴를 통해 하실 수 있습니다.<br/>
                                    - 저장된 북마크는 강의회차별 최근등록순으로 정렬됩니다.<br/>
                                    - 저장된 북마크는 해당 강좌의 수강기간이 종료된 이후 자동으로 삭제되므로 이용에 유의하시기 바랍니다.<br/>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-ONLINEZONE -->

            <div class="willbes-Prof-List c_both">
                <table cellspacing="0" cellpadding="0" class="bookmark-prof tx-gray NG">
                    <colgroup>
                        <col style="width: 20%;"/>
                        <col style="width: 80%;"/>
                    </colgroup>
                    <tbody>
                    <tr>
                        <td class="w-prof">
                            <span class="tx-black">국어</span> <span class="row-line">|</span> <span class="tx-deep-blue">정채영교수</span>
                        </td>
                        <td class="w-lec">
                            2018 정채영 국어[현대] 문학 종결자 문학 집중강의(5-6월)<br/>
                            강의명이 두줄까지 출력될 수 있습니다.
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="willbes-Leclist c_both">
                <div class="LeclistTable">
                    <ul class="f_right c_both mb20">
                        <li class="aBox cancelBox_block mr5"><a href="#none">전체삭제</a></li>
                        <li class="aBox cancelBox_block"><a href="#none">선택삭제</a></li>
                    </ul>
                    <table cellspacing="0" cellpadding="0" class="listTable bookmarkTable upper-black under-gray tx-gray">
                        <colgroup>
                            <col style="width: 80px;">
                            <col style="width: 250px;">
                            <col style="width: 80px;">
                            <col style="width: 90px;">
                            <col style="width: 100px;">
                            <col style="width: 240px;">
                            <col style="width: 100px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">No<span class="row-line">|</span></li></th>
                            <th>강의명<span class="row-line">|</span></li></th>
                            <th>강의시간<span class="row-line">|</span></li></th>
                            <th>강의수강<span class="row-line">|</span></li></th>
                            <th>북마크시간<span class="row-line">|</span></li></th>
                            <th>북마크내용<span class="row-line">|</span></li></th>
                            <th>북마크일</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-no"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">1강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-lec-time">50분</td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-bm-time">35분50.314초</td>
                            <td class="w-bm-txt">
                                <textarea id="" name="" cols="10" rows="1" class="memoText"></textarea>
                                <div class="aBox cancelBox_block"><a href="#none">수정</a></div>
                            </td>
                            <td class="w-bm-day">2018-10-10</td>
                        </tr>
                        <tr>
                            <td class="w-no"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">2강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-lec-time">50분</td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-bm-time">35분50.314초</td>
                            <td class="w-bm-txt">
                                <textarea id="" name="" cols="10" rows="1" class="memoText"></textarea>
                                <div class="aBox cancelBox_block"><a href="#none">수정</a></div>
                            </td>
                            <td class="w-bm-day">2018-10-10</td>
                        </tr>
                        <tr>
                            <td class="w-no"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">3강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-lec-time">50분</td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-bm-time">35분50.314초</td>
                            <td class="w-bm-txt">
                                <textarea id="" name="" cols="10" rows="1" class="memoText"></textarea>
                                <div class="aBox cancelBox_block"><a href="#none">수정</a></div>
                            </td>
                            <td class="w-bm-day">2018-10-10</td>
                        </tr>
                        <tr>
                            <td class="w-no"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">4강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-lec-time">50분</td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-bm-time">35분50.314초</td>
                            <td class="w-bm-txt">
                                <textarea id="" name="" cols="10" rows="1" class="memoText"></textarea>
                                <div class="aBox cancelBox_block"><a href="#none">수정</a></div>
                            </td>
                            <td class="w-bm-day">2018-10-10</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Leclist -->

        </div>
        {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
@stop