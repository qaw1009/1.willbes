<div class="mt20">
    <div class="guidebox GM">
        <table>
            <tbody>
            <tr>
                <th rowspan="18">
                    <select id="s_group_code" name="s_group_code" title="학년도" onchange="ajaxExamInfo('s_group_code',this.value)">
                        @forelse($data['arr_year'] as $row)
                            <option value="{{$row['GroupCode']}}" @if(element('s_group_code', $arr_input) == $row['GroupCode'])selected="selected"@endif>{{$row['YearTarget']}}</option>
                        @empty
                            <option>{{date('Y')}}</option>
                        @endforelse
                    </select>
                </th>
                <th>지역</th>
                <th>유아 · 초등</th>
                <th>중등</th>
            </tr>
            @foreach($exam_area_ccd as $key => $val)
                <tr>
                    <td>{{$val}}</td>
                    <td>
                        @if(empty($data['arr_download_list'][$key]) === false && empty($data['arr_download_list'][$key][0]) === false)
                            <a class="btn01" href="{{front_url('/examInfo/download?path='.urlencode($data['arr_download_list'][$key][0]['file_path']).'&fname='.urlencode($data['arr_download_list'][$key][0]['file_real_name']))}}">다운하기</a>
                        @else
                            준비중
                        @endif
                    </td>
                    <td>
                        @if(empty($data['arr_download_list'][$key]) === false && empty($data['arr_download_list'][$key][1]) === false)
                            <a class="btn01" href="{{front_url('/examInfo/download?path='.urlencode($data['arr_download_list'][$key][1]['file_path']).'&fname='.urlencode($data['arr_download_list'][$key][1]['file_real_name']))}}">다운하기</a>
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

<script type="text/javascript">
    function ajaxExamInfo(param,val){
        var _url = "{{front_url('/examInfo/notice?file_type=ajax_')}}";
        var _data = 's_group_code='+val;

        sendAjax(_url, _data, function(ret) {
            if(ret){
                $(".info_html_group").html('');
                $("#infoTab03").html(ret);
            }
        }, showAlertError, false, 'GET', 'html');
    }
</script>