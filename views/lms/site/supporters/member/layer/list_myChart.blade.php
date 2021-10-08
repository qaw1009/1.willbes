<div class="x_panel mt-10">
    <div class="pull-right mb-5">
        <div class="dt-buttons btn-group">
            <a class="btn btn-default btn-sm btn-success border-radius-reset mr-15 btn-mychart" tabindex="0"  href="#"><span>학습량현황</span></a>
        </div>
    </div>

    <div class="x_content">
        <table id="list_ajax_table_attendance" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>NO</th>
                <th>월</th>
                <th>누적 학습시간</th>
                <th>누적 수강 강의수</th>
            </tr>
            </thead>
            <tbody>
            @php $i = count($chart_data['month']); @endphp
            @forelse($chart_data['month'] as $key => $row)
            <tr>
                <td>{{$i}}</td>
                <td>{{$key}}</td>
                <td>{{$row['SumTime']}}</td>
                <td>{{$row['SumCnt']}}개</td>
            </tr>
                @php $i--; @endphp
            @empty
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<script>
    $('.btn-mychart').on('click', function() {
        var _url = "{{ site_url("/site/supporters/member/myChartModal/") }}";

        $('.btn-mychart').setLayer({
            "url" : _url,
            "width" : "900",
            'add_param_type' : 'param',
            'add_param' : [
                { 'id' : 'supporters_idx', 'name' : '서포터즈식별자', 'value' : {{$supporters_idx}}, 'required' : true },
                { 'id' : 'member_idx', 'name' : '회원식별자', 'value' : {{$member_idx}}, 'required' : true }
            ]
        });
    });
</script>