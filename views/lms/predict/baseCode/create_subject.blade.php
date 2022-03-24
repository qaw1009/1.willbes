@extends('lcms.layouts.master_modal')

@section('layer_title')
    합격예측 직렬별 과목 추가
@stop

@section('layer_header')
<form class="form-horizontal" id="_sub_search_form" name="_sub_search_form" method="POST" onsubmit="return false;">
{!! csrf_field() !!}
@endsection

@section('layer_content')
        <div class="form-group">
            <label class="control-label col-md-1-1">직렬</label>
            <div class="col-md-2">
                <select class="form-control" id="search_take_mock_part" name="search_take_mock_part">
                    <option value="">직렬선택</option>
                    @foreach($arr_base['take_mock_part'] as $row)
                        <option value="{{$row['MockPart']}}">{{$row['MockPartName']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1-1">과목</label>
            <div class="col-md-10">
                <table id="_sub_list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th>선택</th>
                        <th>과목</th>
                        <th>과목타입</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            {{--<div class="col-md-10">
                @foreach($arr_base['codes'] as $row)

                    <div class="col-xs-4 checkbox">
                        <label><input type="checkbox" name="search_new" id="search_new" class="flat" value="Y"> {{ $row['name'] }}</label>
                    </div>

                @endforeach
            </div>--}}
        </div>
        <script type="text/javascript">

        </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
</form>
@endsection