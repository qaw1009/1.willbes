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
                    <span class="MoreBtn"><a href="#none">유의사항안내 @if(get_cookie('moreInfo') == 'off')보기 ▼@else닫기 ▲@endif</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black @if(get_cookie('moreInfo') == 'off') off @endif">
                        <tbody>
                        <tr @if(get_cookie('moreInfo') == 'off') style="display: none; !important" @endif>
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
                            <span class="tx-black">{{$lec['SubjectName']}}</span> <span class="row-line">|</span>
                            <span class="tx-deep-blue">{{$lec['wProfName']}}교수님</span>
                        </td>
                        <td class="w-lec">
                            {{$lec['wLectureProgressCcdName']}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="willbes-Leclist c_both">
                <div class="LeclistTable">
                    <ul class="f_right c_both mb20">
                        <li class="aBox cancelBox_block mr5"><a href="javascript:;" onclick="fnAllDelete();">전체삭제</a></li>
                        <li class="aBox cancelBox_block"><a href="javascript:;" onclick="fnCheckDelete();">선택삭제</a></li>
                    </ul>
                    <form name="bookmarkForm" id="bookmarkForm" method="POST">
                        <input type="hidden" id="postform-orderidx" name="orderidx" value="{{$lec['OrderIdx']}}" />
                        <input type="hidden" id="postform-prodcode" name="prodcode" value="{{$lec['ProdCode']}}" />
                        <input type="hidden" id="postform-prodcodesub" name="prodcodesub" value="{{$lec['ProdCodeSub']}}" />
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
                            <th><input type="checkbox" id="allcheck" name="allcheck" class="goods_chk">No<span class="row-line">|</span></li></th>
                            <th>강의명<span class="row-line">|</span></li></th>
                            <th>강의시간<span class="row-line">|</span></li></th>
                            <th>강의수강<span class="row-line">|</span></li></th>
                            <th>북마크시간<span class="row-line">|</span></li></th>
                            <th>북마크내용<span class="row-line">|</span></li></th>
                            <th>북마크일</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($curriculum as $row)
                        <tr>
                            <td class="w-no"><input type="checkbox" id="bmidx" name="bmidx[]" class="goods_chk" value="{{$row['bmIdx']}}">{{$row['wUnitNum']}}회 {{$row['wUnitLectureNum']}}강</td>
                            <td class="w-lec">{{$row['wUnitName']}}</td>
                            <td class="w-lec-time">{{$row['wRuntime']}}분</td>
                            <td class="w-free mypage">
                                @if($row['isstart'] == 'Y' && $row['ispause'] == 'N')
                                    @if($row['timeover'] == 'N')
                                        @if($row['wWD'] != '')<div class="tBox NSK t3 white"><a href="javascript:;" onclick='fnPlayerBookmark("{{$row['OrderIdx']}}","{{$row['ProdCode']}}","{{$row['ProdCodeSub']}}","{{$row['wLecIdx']}}","{{$row['wUnitIdx']}}","WD","{{$row['Time']}}");' >WIDE</a></div>@endif
                                        @if($row['wHD'] != '')<div class="tBox NSK t1 black"><a href="javascript:;" onclick='fnPlayerBookmark("{{$row['OrderIdx']}}","{{$row['ProdCode']}}","{{$row['ProdCodeSub']}}","{{$row['wLecIdx']}}","{{$row['wUnitIdx']}}","HD","{{$row['Time']}}");' >HIGH</a></div>@endif
                                        @if($row['wSD'] != '')<div class="tBox NSK t2 gray"><a href="javascript:;" onclick='fnPlayerBookmark("{{$row['OrderIdx']}}","{{$row['ProdCode']}}","{{$row['ProdCodeSub']}}","{{$row['wLecIdx']}}","{{$row['wUnitIdx']}}","SD","{{$row['Time']}}");' >LOW</a></div>@endif
                                    @else
                                        <div class="tBox NSK t1 black"><a>시간초과</a></div>
                                    @endif
                                @elseif($row['ispause'] == 'Y')
                                    <div class="tBox NSK t1 black"><a>일시중지</a></div>
                                @else
                                    <div class="tBox NSK t1 black"><a>수강대기</a></div>
                                @endif
                            </td>
                            <td class="w-bm-time">{{gmdate('H시 i분 s초', $row['Time'])}}</td>
                            <td class="w-bm-txt">
                                <input type="text" id="memo-{{$row['bmIdx']}}" name="memo-{{$row['bmIdx']}}" class="memoText" maxlength="100" value="{{$row['Title']}}" />
                                <div class="aBox cancelBox_block"><a href="javascript:;" onclick="fnModifyMemo('{{$row['bmIdx']}}');">수정</a></div>
                            </td>
                            <td class="w-bm-day">{{substr($row['RegDatm'], 0, 10)}}</td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="w-no">등록된 북마크가 없습니다.</td>
                            </tr>
                        @endforelse
                        <!--
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
                        </tr> -->
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
            <!-- willbes-Leclist -->

        </div>
        {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <form name="postForm" id="postForm">
        {!! csrf_field() !!}
        <input type="hidden" id="postform-orderidx" name="orderidx" value="{{$lec['OrderIdx']}}" />
        <input type="hidden" id="postform-prodcode" name="prodcode" value="{{$lec['ProdCode']}}" />
        <input type="hidden" id="postform-prodcodesub" name="prodcodesub" value="{{$lec['ProdCodeSub']}}" />
        <input type="hidden" id="postform-bmidx" name="bmidx" value="" />
        <input type="hidden" id="postform-memo" name="memo" value="" />
    </form>
    <script src="/public/js/willbes/player.js?ver={{time()}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#allcheck').on('change', function(){
                $(".goods_chk").prop('checked', $(this).prop('checked'));
            })
        });

        function fnAllDelete()
        {
            $(".goods_chk").prop('checked', true);

            fnCheckDelete();
        }

        function fnCheckDelete()
        {
            url = "{{ front_url("/classroom/bookmark/deleteBookmark/") }}";
            data = $("#bookmarkForm").serialize();

            sendAjax(url,
                data,
                function(d){
                    alert('북마크가 삭제되었습니다.');
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'GET');
        }

        function fnModifyMemo(bmidx)
        {
            $('#postform-bmidx').val(bmidx);
            $('#postform-memo').val($('#memo-'+bmidx).val());

            url = "{{ front_url("/classroom/bookmark/updateBookmark/") }}";
            data = $("#postForm").serialize();

            sendAjax(url,
                data,
                function(d){
                    alert('메모가 변경되었습니다.');
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'GET');

        }
    </script>
@stop