@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="w-Guide-Ssam">
                <h4 class="NG">지역별 공고문</h4>
                <div class="guidebox GM">
                    <table>
                        <tbody>
                        <tr>
                            <th rowspan="10">{{$year_target}}<BR>학년도 </th>
                            <th>지역</th>
                            <th>유아 · 초등</th>
                            <th>중등</th>
                            <th>지역</th>
                            <th>유아 · 초등</th>
                            <th>중등</th>
                        </tr>
                        @foreach($exam_area_ccd as $key => $val)
                            @if($loop->index % 2 == 1)<tr>@endif
                                <td>{{$val}}</td>
                                <td>
                                    @if(empty($arr_download_list[$key]) === false && empty($arr_download_list[$key][0]) === false)
                                        <a class="btn01" href="{{front_url('/examInfo/download?path='.urlencode($arr_download_list[$key][0]['file_path']).'&fname='.urlencode($arr_download_list[$key][0]['file_real_name']))}}">공고문 보기 ></a>
                                    @else
                                        준비중
                                    @endif
                                </td>
                                <td>
                                    @if(empty($arr_download_list[$key]) === false && empty($arr_download_list[$key][1]) === false)
                                        <a class="btn01" href="{{front_url('/examInfo/download?path='.urlencode($arr_download_list[$key][1]['file_path']).'&fname='.urlencode($arr_download_list[$key][1]['file_real_name']))}}">공고문 보기 ></a>
                                    @else
                                        준비중
                                    @endif
                                </td>
                            @if($loop->index % 2 == 0)</tr>@endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop