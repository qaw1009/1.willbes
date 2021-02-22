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