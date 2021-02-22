<div class="tabBox NG">
    <ul class="tabShow tabSsam">
        @foreach($arr_base['subject_list'] as $key => $val)
            @if($loop->index == 3)
                <li><span>&nbsp;</span></li>
                <li><span>&nbsp;</span></li>
            @endif
            <li><a href="#none" data-subject-id="{{$key}}" class="btn-subject {{($loop->first === true) ? 'on' : ''}}">{{$val['subject_name']}}</a></li>
        @endforeach
    </ul>
</div>
<div id="trend_area" class="tabContent GM">
    <div id="chartBox"></div>
    @foreach($arr_base['subject_list'] as $key => $val)
        <div class="char_table" id="trend_guide_{{$key}}" style="display: none;">
            <div class="trendData">
                <table cellspacing="0">
                    <colgroup>
                        <col width="25%">
                        <col width="25%">
                        <col width="25%">
                        <col width="25%">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>학년도</th>
                        <th>모집</th>
                        <th>지원</th>
                        <th>경쟁률</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(empty($arr_base['graph'][$key]) === false)
                        @foreach($arr_base['graph'][$key] as $row)
                            <tr>
                                <td>{{$row['YearTarget']}}{{($row['TakeType'] == '2') ? ' 추시' : ''}}</td>
                                <td>{{number_format($row['NoticeNumber'])}}</td>
                                <td>{{number_format($row['TakeNumber'])}}</td>
                                <td>{{$row['AvgData']}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>

<script type="text/javascript">
    $(document).ready(function() {
        htmlGraph({{key($arr_base['subject_list'])}});
        $("#trend_guide_"+{{key($arr_base['subject_list'])}}).css('display', 'block');

        $(".btn-subject").click(function (){
            $(".btn-subject").removeClass("on");
            $(this).addClass("on");
            $(".char_table").css('display', 'none');
            $("#trend_guide_"+$(this).data("subject-id")).css('display', 'block');

            htmlGraph($(this).data("subject-id"));
        });
    });

    function htmlGraph(subject_id) {
        $(".chart-box").empty();
        $data = 'subject_id='+subject_id;
        var data = {
            'subject_id' : subject_id
        };
        sendAjax('{{front_url('/examInfo/graphHtml/')}}', data, function(d) {
            $('#chartBox').html(d).show().css('display', 'block').trigger('create');
        }, showAlertError, false, 'GET', 'html');
    }
</script>