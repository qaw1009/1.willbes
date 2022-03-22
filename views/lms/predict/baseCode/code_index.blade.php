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
            <div class="col-md-10">
                <select class="form-control" style="width: 200px;">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1-1">과목</label>
            <div class="col-md-10">
                @foreach($arr_base['codes'] as $row)

                    <div class="col-xs-4 checkbox">
                        <label><input type="checkbox" name="search_new" id="search_new" class="flat" value="Y"> {{ $row['name'] }}</label>
                    </div>

                @endforeach
            </div>
        </div>

@stop

@section('add_buttons')
@endsection

@section('layer_footer')
</form>
@endsection