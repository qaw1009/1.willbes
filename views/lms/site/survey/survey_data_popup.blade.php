@extends('lcms.layouts.master_popup')

@section('popup_title')
@stop

@section('popup_header')
@endsection

@section('popup_content')
    <form class="form-horizontal" id="_sub_refund_check_form" name="_sub_refund_check_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}

    <!-- Popup -->
        <div class="form-group mt-20">
            <div class="col-md-11">
                <ul class="nav nav-pills" role="tablist">
                    <li role="presentation" class="act-move"><a href="javascript:gotab('{{ $sp_idx }}');">문항별 수치분석</a></li>
                    <li role="presentation" class="active"><a href="#">입력 데이터</a></li>
                </ul>
            </div>

        </div>

        <table border=1 cellspacing="1" cellpadding="5" class="lecTable" style="margin-top:5px; text-align: center; width: 750px">
            <colgroup>
                <col style="width: 10%;">
                <col style="width: 50%;">
                <col style="width: 30%;">
                <col style="width: 10%;">
            </colgroup>
            <tbody>
            <tr>
                <th style="text-align:center;">회원명</th>
                <th style="text-align:center;">문항</th>
                <th style="text-align:center;">응답</th>
                <th style="text-align:center;">등록일</th>
            </tr>
            @foreach($data as $key => $val)
                @foreach($val['AnswerInfo'] as $title => $answer)
                    @foreach($answer as $txt)
                    <tr @if($key % 2 == 0) style='background-color:lightyellow' @endif>
                        <td>{{ $val['MemName'] }}<br>({{ $val['MemId'] }})</td>
                        <td>{{ $title }}</td>
                        <td>{{ $txt }}</td>
                        <td>{{ substr($val['RegDatm'],0,10) }}</td>
                    </tr>
                    @endforeach
                @endforeach
            @endforeach
            </tbody>
        </table>
        <!-- End Popup -->
    </form>
    <!-- //popupContainer -->
    <form class="form-horizontal" id="url_form" name="url_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
    </form>
    <script>
        function gotab(sp_idx){
            var _param = 'sp_idx=' + sp_idx;
            var _url = '{{ site_url('/site/survey/surveyGraphPopup') }}' + '?' + _param;
            location.href = _url;
        }
    </script>
@stop

@section('popup_footer')
@endsection