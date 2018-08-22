@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </span>
        </div>
        <div class="Content p_re">

            <div class="willbes-CScenter c_both">
                <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                    · 자주하는 질문
                    <div class="willbes-Lec-Search GM f_right">
                        <div class="inputBox p_re">
                            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="Act1 mt30">
                    <div class="LeclistTable c_both">
                        <div class="questionBoxWrap">
                            <ul class="tabcsDepth2 tab_Question p_re NG">
                            @foreach($faq_ccd as $row)
                                <li>
                                    <a class="@if($s_faq == $row['Ccd']) on @endif" href="{{site_url('support/faq/index?s_faq='.$row['Ccd'])}}">
                                        <img src="{{ img_url('cs/icon_question'.$row['Ccd'].'.gif') }}">
                                        <div>{{$row['CcdName']}}</div>
                                    </a>
                                    @if(empty($row['subFaqData']) === false)
                                    <div class="subBox @if($s_faq == $row['Ccd']) on @endif">
                                        <dl>
                                            @foreach($row['subFaqData'] as $sub)
                                                <dt><a href="{{site_url('support/faq/index?s_faq='.$row['Ccd']).'&s_sub_faq='.$sub['Ccd']}}">{{$sub['CcdName']}}</a>
                                                @if($loop->last == false)
                                                <span class="row-line">|</span>
                                                @endif
                                            </dt>
                                            @endforeach
                                        </dl>
                                    </div>
                                    @endif
                                </li>
                            @endforeach
                            </ul>

                            <div class="tabBox mt100">
                                <div id="question1" class="tabContent">
                                    <table cellspacing="0" cellpadding="0" class="listTable csCenterTable upper-gray bdt-gray bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 70px;">
                                            @if($is_campus=='Y')<col style="width: 100px;">@endif
                                            <col style="width: 120px;">
                                            <col>
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>No<span class="row-line">|</span></th>
                                            @if($is_campus=='Y')<th>캠퍼스<span class="row-line">|</span></th>@endif
                                            <th>분류<span class="row-line">|</span></th>
                                            <th>제목<span class="row-line">|</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(empty($list))
                                            <tr class="replyList cscenterList">
                                                <td colspan="4">
                                                    등록된 내용이 없습니다.
                                                </td>
                                            </tr>
                                        @endif

                                        @foreach($list as $row)
                                        <tr class="replyList cscenterList">
                                            <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_best_reply.gif') }}">@else{{$paging['rownum']}}@endif</td>
                                            @if($is_campus=='Y')<td class="w-acad"><span class="oBox offlineBox NSK">{{$row['CampusCcd_Name']}}</span></td>@endif
                                            <td class="w-select">{{$row['FaqTypeCcd_Name']}}</td>
                                            <td class="w-list tx-left pl20">{{$row['Title']}}</td>
                                        </tr>
                                        <tr class="replyTxt cscenterTxt bg-light-gray tx-gray">
                                            <td colspan="5">
                                                {!! $row['Content'] !!}
                                            </td>
                                        </tr>
                                        @php $paging['rownum']-- @endphp
                                        @endforeach



                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    {!! $paging['pagination'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--LeclistTable -->
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