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
                        <th rowspan="18">{{$year_target}}<BR>학년도</th>
                        <th>지역</th>
                        <th>유아 · 초등</th>
                        <th>중등</th>
                    </tr>
                    @foreach($exam_area_ccd as $key => $val)
                        <tr>
                            <td>{{$val}}</td>
                            <td>
                                @if(empty($arr_download_list[$key]) === false && empty($arr_download_list[$key][0]) === false)
                                    <a class="btn01" href="{{front_url('/examInfo/download?path='.urlencode($arr_download_list[$key][0]['file_path']).'&fname='.urlencode($arr_download_list[$key][0]['file_real_name']))}}">다운하기</a>
                                @else
                                    준비중
                                @endif
                            </td>
                            <td>
                                @if(empty($arr_download_list[$key]) === false && empty($arr_download_list[$key][1]) === false)
                                    <a class="btn01" href="{{front_url('/examInfo/download?path='.urlencode($arr_download_list[$key][1]['file_path']).'&fname='.urlencode($arr_download_list[$key][1]['file_real_name']))}}">다운하기</a>
                                @else
                                    준비중
                                @endif
                            </td>
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