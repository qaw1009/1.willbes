@extends('lcms.layouts.master_popup')

@section('popup_title')
@stop

@section('popup_header')
@endsection

@section('popup_content')
    <form class="form-horizontal" id="_sub_refund_check_form" name="_sub_refund_check_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}

    <!-- Popup -->
        <div class="form-group bg-green" style="padding: 15px; font-size:16px; font-weight: 700">데이터 분석</div>
        <div class="form-group no-border-bottom">
            <ul class="nav nav-tabs nav-justified">
                <li><a href="javascript:gotab('{{ $ss_idx }}');"><strong>문항별 수치분석</strong></a></li>
                <li class="active"><a href="#"><strong>입력 데이터</strong></a></li>
            </ul>
        </div>

        <div class="form-group">
            <table border=1 cellspacing="1" cellpadding="5" class="lecTable" style="margin-top:30px; text-align: center; width: 800px">
            <colgroup>
                <col style="width: 10%;">
                <col style="width: 30%;">
                <col style="width: 10%;">
                <col style="width: 20%;">
                <col style="">
                <col style="width: 10%;">
            </colgroup>
            <tbody>
            <tr>
                <th style="text-align:center;">회원명</th>
                <th style="text-align:center;">문항제목</th>
                <th style="text-align:center;">답변유형</th>
                <th style="text-align:center;">응답1</th>
                <th style="text-align:center;">응답2</th>
                <th style="text-align:center;">등록일</th>
            </tr>
            @foreach($data as $key => $val)
                @foreach($val['AnswerInfo'] as $title => $arr)
                    @foreach($arr as $type => $row)
                        @foreach($row as $k => $item)
                            <tr @if($key % 2 == 0) style='background-color:#eee ' @endif>
                                <td>{{ $val['MemName'] }}<br>({{ $val['MemId'] }})</td>
                                <td>{{ $title }}</td>
                                @if($type == 'S')
                                    <td>선택형<br/>(단일)</td>
                                    <td>{{ $item }}</td>
                                    <td></td>
                                @elseif($type == 'M')
                                    <td>선택형<br/>(그룹)</td>
                                    <td>{{ $k }}</td>
                                    <td>{{ $item }}</td>
                                @elseif($type == 'T')
                                    <td>복수형</td>
                                    <td>{{ $k }}</td>
                                    <td>{{ $item }}</td>
                                @else
                                    <td>서술형</td>
                                    <td>{{ $item }}</td>
                                    <td></td>
                                @endif
                                <td>{{ substr($val['RegDatm'],0,10) }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            @endforeach
            </tbody>
        </table>
        </div>
        <!-- End Popup -->
    </form>
    <!-- //popupContainer -->
    <form class="form-horizontal" id="url_form" name="url_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
    </form>
    <script>
        function gotab(ss_idx){
            var _param = 'ss_idx=' + ss_idx;
            var _url = '{{ site_url('/site/survey/surveyGraphPopup') }}' + '?' + _param;
            location.href = _url;
        }
    </script>
@stop

@section('popup_footer')
@endsection