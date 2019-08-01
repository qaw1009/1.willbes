@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>

        <div class="Content p_re">
            <div class="willbes-Mocktest INFOZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 모의고사
                </div>
            </div>
            <!-- "willbes-Mocktest INFOZONE -->

            <div class="willbes-Mypage-Tabs mt10">
                <ul class="tabMock three">
                    @include('willbes.pc.site.mocktest.tab_menu_partial')
                </ul>
                <div class="willbes-Cart-Txt NG mt30 p_re">
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                        <tbody>
                        <tr>
                            <td>
                                · 응시중인 모의고사만 이의제기 등록이 가능합니다.(단, 내가 응시한 모의고사만 이의제기 등록 가능)<br/>
                                · 응시기간 종료시 이의제기 등록이 불가능합니다.<br/>
                                · 이의제기 및 정오표 보기는 응시기간과 무관하게 확인할 수 있습니다.<br/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="willbes-Leclist c_both mt60">
                    <form id="url_form" name="url_form" method="GET">
                        @foreach($arr_input as $key => $val)
                            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                        @endforeach
                    </form>
                    <div class="willbes-LecreplyList tx-gray c_both mt-zero">
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                        <div class="inputBox p_re">
                            <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" placeholder="모의고사명을 입력해 주세요" maxlength="30" value="{{element('s_keyword', $arr_input)}}">
                            <button type="submit" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </span>
                    </div>
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable mockTable under-gray bdt-gray tx-gray">
                            <colgroup>
                                <col style="width: 50px;">
                                <col style="width: 80px;">
                                <col style="width: 570px;">
                                <col style="width: 70px;">
                                <col style="width: 70px;">
                                <col style="width: 100px;">
                            </colgroup>
                            <thead>
                            <tr class="two">
                                <th rowspan="2">No<span class="row-line">|</span></th>
                                <th rowspan="2">응시분야<span class="row-line">|</span></th>
                                <th rowspan="2">모의고사명<span class="row-line">|</span></th>
                                <th class="bd-none" colspan="2">이의제기</th>
                                <th rowspan="2"><span class="row-line" style="float: left;">|</span>정오표보기</th>
                            </tr>
                            <tr class="two">
                                <th>보기<span class="row-line">|</span></th>
                                <th>등록</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(empty($list) === true)
                                <tr>
                                    <td class="w-list tx-center" colspan="6">등록된 자료가 없습니다.</td>
                                </tr>
                            @endif
                            @foreach($list as $row)
                                <tr>
                                    <td class="w-no">{{$paging['rownum']}}</td>
                                    <td class="w-type">{{$row['CateName']}}</td>
                                    <td class="w-list tx-left pl20">{{$row['ProdName']}}</td>
                                    <td class="w-test"><a class="tx-light-blue" href="{{front_url('/mockTest/listQna/cate/'.$def_cate_code.'?prod_code='.$row['ProdCode'].'&'.$get_params)}}">{{$row['qnaTotalCnt']}}개</a></td>
                                    <td class="w-state">
                                        @if ($row['TakeStartDate'] <= date('Ymd') && $row['TakeEndDate'] >= date('Ymd') || $row['AcceptStatusCcd'] != '675003')
                                            <a href="{{front_url('/mockTest/createQna/cate/'.$def_cate_code.'?prod_code='.$row['ProdCode'].'&'.$get_params)}}">[등록]</a>
                                        @else
                                            <p class="tx-red">마감</p>
                                        @endif
                                    </td>
                                    <td class="w-graph"><a class="tx-light-blue" href="{{front_url('/mockTest/listNotice/cate/'.$def_cate_code.'?prod_code='.$row['ProdCode'].'&'.$get_params)}}">{{$row['noticeCnt']}}개</a></td>
                                </tr>
                                @php $paging['rownum']-- @endphp
                            @endforeach
                            </tbody>
                        </table>
                        {!! $paging['pagination'] !!}
                    </div>
                </div>
            </div>
            <!-- willbes-Mypage-Tabs -->
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop