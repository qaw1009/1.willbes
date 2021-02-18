@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            지역별 공고문
        </div>

        <div class="w-Guide-Ssam mt20">

            <div class="guidebox GM">
                <table>
                    <tbody>
                    <tr>
                        <th rowspan="18">2021<BR>
                            학년도 </th>
                        <th>지역</th>
                        <th>유아 · 초등</th>
                        <th>중등</th>
                    </tr>
                    @foreach($arr_download_list as $area => $row)
                        <tr>
                            <td>{{$area}}</td>
                            <td><a href="{{ site_url("/examInfo/download?path=" . urlencode('/public/uploads/willbes/site/2018/' . $row['infant_file_name']) . "&fname=" . urlencode($row['infant_file_name_kr'])) }}" class="btn01">다운하기</a></td>
                            <td><a href="{{ site_url("/examInfo/download?path=" . urlencode('/public/uploads/willbes/site/2018/' . $row['secondary_file_name']) . "&fname=" . urlencode($row['secondary_file_name_kr'])) }}" class="btn01">다운하기</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')

    </div>
    <!-- End Container -->
@stop