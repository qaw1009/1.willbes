@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach

                <div class="willbes-CScenter c_both">
                    <div class="Act2">
                        <!-- List -->
                        <div class="willbes-Leclist c_both">
                            <div class="LecViewTable">
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 65px;">
                                        <col style="width: 65px;">
                                        <col style="width: 510px;">
                                        <col style="width: 150px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th colspan="5" class="w-list tx-left  pl20">
                                            @if($data['IsBest'] == '1')<img src="{{ img_url('prof/icon_HOT.gif') }}" style="marign-right: 5px;">@endif
                                            <strong>{{$data['Title']}}</strong>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="w-area">{{$data['AreaCcd_Name']}}<span class="row-line">|</span></td>
                                        <td class="w-year">{{$data['ExamProblemYear']}}<span class="row-line">|</span></td>
                                        <td class="w-sbj tx-left pl20">{{$data['SubjectName']}}<span class="row-line">|</span></td>
                                        <td class="w-date">{{$data['RegDatm']}}<span class="row-line">|</span></td>
                                        <td class="w-click"><strong>조회수</strong> {{$data['TotalReadCnt']}}</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(empty($data['AttachData']) === false)
                                        <tr>
                                            <td class="w-file tx-left pl20" colspan="5">
                                                @foreach($data['AttachData'] as $row)
                                                    <a href="javascript:void(0);" onclick='javascript:file_download("{{front_url($default_path.'/examQuestion/download?path=').urlencode($row['FilePath'].$row['FileName']).'&fname='.urlencode($row['RealName']).'&board_idx='.$board_idx }}");'>
                                                    {{--<a href="{{front_url($default_path.'/examQuestion/download?path=').urlencode($row['FilePath'].$row['FileName']).'&fname='.urlencode($row['RealName']).'&board_idx='.$board_idx }}" onclick="javascript:file_download();" target="_blank">--}}
                                                        <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td class="w-txt tx-left" colspan="7">
                                            {!! $data['Content'] !!}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="search-Btn mt20 mb20 h36 p_re">
                                    <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                                        <a href="{{front_url($default_path.'/examQuestion/index/cate/'.$__cfg['CateCode'].'?'.$get_params)}}">목록</a>
                                    </div>
                                </div>

                                @if($data['IsBest'] != '1')
                                    <table cellspacing="0" cellpadding="0" class="listTable prevnextTable upper-gray bdt-gray bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 150px;">
                                            <col style="width: 640px;">
                                            <col style="width: 150px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td class="w-prev bg-light-gray"><strong>이전글</strong></td>
                                            <td class="tx-left pl20">
                                                @if(empty($pre_data) === false)
                                                    <a href="{{front_url($default_path.'/examQuestion/show/cate/'.$__cfg['CateCode'].'?board_idx='.$pre_data['BoardIdx'].'&'.$get_params)}}">{{$pre_data['Title']}}</a><span class="row-line">|</span>
                                                @else
                                                    이전글이 없습니다.
                                                @endif
                                            </td>
                                            <td class="w-date">@if(empty($pre_data) === false){{$pre_data['RegDatm']}}@endif</td>
                                        </tr>
                                        <tr>
                                            <td class="w-next bg-light-gray"><strong>다음글</strong></td>
                                            <td class="tx-left pl20">
                                                @if(empty($next_data) === false)
                                                    <a href="{{front_url($default_path.'/examQuestion/show/cate/'.$__cfg['CateCode'].'?board_idx='.$next_data['BoardIdx'].'&'.$get_params)}}">{{$next_data['Title']}}</a><span class="row-line">|</span>
                                                @else
                                                    다음글이 없습니다.
                                                @endif
                                            </td>
                                            <td class="w-date">@if(empty($next_data) === false){{$next_data['RegDatm']}}@endif</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- willbes-CScenter -->
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
    <!-- End Container -->

    <script>
        function file_download(url) {
            @if(sess_data('is_login') != true)
                alert('로그인 후 이용해 주세요.');
            @else
                window.open(url, '_blank');
            @endif
            /*return false;*/
        }
    </script>
@stop