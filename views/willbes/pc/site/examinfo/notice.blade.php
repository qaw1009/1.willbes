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
                                <th rowspan="10">2020<BR>
                                    학년도 </th>
                                <th>지역</th>
                                <th>유아 · 초등</th>
                                <th>중등</th>
                                <th>지역</th>
                                <th>유아 · 초등</th>
                                <th>중등</th>
                            </tr>
                            @foreach($arr_download_list as $area => $row)
                                @if($loop->index % 2 == 1)
                                    <tr>
                                @endif
                                    <td>{{$area}}</td>
                                    <td><a href="{{ site_url("/examInfo/download?path=" . urlencode('/public/uploads/willbes/site/2018/' . $row['infant_file_name']) . "&fname=" . urlencode($row['infant_file_name_kr'])) }}" class="btn01">자료받기 ></a></td>
                                    <td><a href="{{ site_url("/examInfo/download?path=" . urlencode('/public/uploads/willbes/site/2018/' . $row['secondary_file_name']) . "&fname=" . urlencode($row['secondary_file_name_kr'])) }}" class="btn01">자료받기 ></a></td>
                                @if($loop->index % 2 == 0)
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop