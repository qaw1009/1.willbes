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

            <div class="willbes-Mypage-Tabs mt10">
                <ul class="tabMock three">
                    @include('willbes.pc.site.mocktest.tab_menu_partial')
                </ul>
                <div class="LeclistTable">
                    <div class="willbes-Mock-Subject NG">
                        · 이의제기
                        <div class="subBtn mock black f_right"><a href="{{front_url('/mockTest/board/cate/'.$__cfg['CateCode'])}}">전체 모의고사 목록</a></div>
                    </div>
                    <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 120px;">
                            <col style="width: 210px;">
                            <col style="width: 490px;">
                            <col style="width: 120px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>응시분야<span class="row-line">|</span></th>
                            <th>직렬<span class="row-line">|</span></th>
                            <th>모의고사명<span class="row-line">|</span></th>
                            <th>정오표</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-type">{{$prod_data['CateName']}}</td>
                            <td class="w-col">{{implode(',',$prod_data['MockPartName'])}}</td>
                            <td class="w-list tx-left pl20">{{$prod_data['ProdName']}}</td>
                            <td class="w-graph">{{$prod_data['noticeCnt']}} 개</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="willbes-Leclist mt60 c_both">
                    <div class="LecViewTable">
                        <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black tx-gray">
                            <colgroup>
                                <col style="width: 780px;">
                                <col style="width: 160px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th class="w-list tx-left pl20"><strong>{{$board_data['Title']}}</strong><span class="row-line">|</span></th>
                                <th class="w-date">{{$board_data['RegDatm']}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="w-file tx-left pl20" colspan="3">
                                    @if(empty($board_data['AttachData']) === false)
                                        @foreach($board_data['AttachData'] as $row)
                                            @if($row['FileType'] == 0)
                                                <a href="{{front_url('/mockTest/boardFileDownload?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                                {{--<a href="{{front_url('/mockTest/boardFileDownload?path=').urlencode($row['FilePath'].$row['FileName']).'&fname='.urlencode($row['RealName']).'&board_idx='.$board_idx }}" target="_blank">--}}
                                                    <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="w-txt answer tx-left" colspan="3">
                                    {!! $board_data['Content'] !!}
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="search-Btn mt20 h36 p_re">
                            <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right" id="btn_list">
                                <a href="#none">목록</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            //목록
            $('#btn_list').click(function() {
                location.href = '{!! front_url('/mockTest/listNotice/cate/'.$__cfg['CateCode'].'?'.$get_params) !!}';
            });
        });
    </script>
@stop