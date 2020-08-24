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
                <li><a href="javascript:gotab('{{ $sub_idx }}');"><strong>문항별 수치분석</strong></a></li>
                <li class="active"><a href="#"><strong>입력 데이터</strong></a></li>
            </ul>
        </div>

        <div class="form-group">
            <table border=1 cellspacing="1" cellpadding="5" class="lecTable" style="margin-top:30px; ">
                <colgroup>
                    <col style="width: 20%;">
                    <col style="width: 40%;">
                    <col style="width: 40%;">
                </colgroup>
                <tbody>
                <tr>
                    <th style="text-align:center;">항목</th>
                    <th style="text-align:center;">선택 비율</th>
                    <th style="text-align:center;">선택 인원수</th>
                </tr>
                @php $cnt = 0; @endphp
                @foreach($data as $title => $val)
                    <tr @if($cnt % 2 == 0) style='background-color:#eee ' @endif>
                        <td class="text-center" style="padding: 4px">{{ $title }}</td>
                        <td style="padding: 4px">
                            @foreach($val as $item => $row)
                                {{ $item }} <strong>({{ $row['spread'] }}%)</strong>,
                            @endforeach
                        </td>
                        <td style="padding: 4px">
                            @foreach($val as $item => $row)
                                {{ $item }} <strong>({{ $row['count'] }}명)</strong>,
                            @endforeach
                        </td>
                    </tr>
                    @php $cnt++; @endphp
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
        function gotab(sub_idx){
            var _param = 'sub_idx=' + sub_idx;
            var _url = '{{ site_url('/site/surveys/statistics/statisticsGraphPopup') }}' + '?' + _param;
            location.href = _url;
        }
    </script>
@stop

@section('popup_footer')
@endsection