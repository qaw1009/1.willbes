@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach

            <div class="willbes-CScenter c_both">
                <div class="willbes-Lec-Search GM mg0">
                    <div class="inputBox p_re f_left">
                        <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요">
                        <button type="submit" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>
                <div class="Act1 mt30">
                    <div class="LeclistTable c_both">
                        <div class="questionBoxWrap">
                            <ul class="tabcsDepth2 tab_Question p_re NG">
                            @foreach($faq_ccd as $row)
                                <li>
                                    <a class="@if($s_faq == $row['Ccd']) on @endif" href="{{front_url('/support/faq/index?s_faq='.$row['Ccd'])}}">
                                        <img src="{{ img_url('cs/icon_question'.$row['Ccd'].'.gif') }}">
                                        <div>{{$row['CcdName']}}</div>
                                    </a>
                                    @if(empty($row['subFaqData']) === false)
                                    <div class="subBox @if($s_faq == $row['Ccd']) on @endif">
                                        <dl>
                                            @foreach($row['subFaqData'] as $sub)
                                                <dt>
                                                    <button type="button" onclick="javascript:goSubmit('{{$row['Ccd']}}', '{{$sub['Ccd']}}')" @if( (element('s_sub_faq', $arr_input) == $sub['Ccd']) || (empty(element('s_sub_faq', $arr_input)) === true && $loop->first == true) )style="color: #0a8cc2" @endif>{{$sub['CcdName']}}</button>
                                                    @if($loop->last == false)<span class="row-line">|</span>@endif
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
                                            <col style="width: 120px;">
                                            <col style="width: 750px;">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>No<span class="row-line">|</span></th>
                                            <th>분류<span class="row-line">|</span></th>
                                            <th>제목</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(empty($list))
                                            <tr>
                                                <td class="w-list tx-center" colspan="3">등록된 내용이 없습니다.</td>
                                            </tr>
                                        @endif

                                        @foreach($list as $row)

                                        <tr class="replyList cscenterList">
                                            <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_best_reply.gif') }}">@else{{$paging['rownum']}}@endif</td>
                                            <td class="w-select">{{$row['FaqTypeCcd_Name']}}</td>
                                            <td class="w-list tx-left pl20">@if($row['IsBest'] == '1')<strong>@endif{{$row['Title']}}@if($row['IsBest'] == '1')</strong>@endif</td>
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
            </form>
            <!-- willbes-CScenter -->

        </div>
        {!! banner('고객센터_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        function goSubmit(param1, param2) {
            var url = "{{front_url('/support/faq/index')}}";
            location.href = url+"?s_faq="+param1+"&s_sub_faq="+param2;
        }
    </script>
@stop