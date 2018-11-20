@extends('lcms.layouts.master_modal')

@section('layer_title')
    과제미노출날짜관리
@stop

@section('layer_header')
<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" onsubmit="return false;" novalidate>
    {{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" novalidate action="{{ site_url('/crm/sms/storeSend') }}">--}}
    {!! csrf_field() !!}
    {!! method_field($method) !!}
@endsection

@section('layer_content')
<div class="x_panel">
    <div class="x_content">
        <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" onsubmit="return false;" novalidate>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" >연도별 휴일 <span class="required">*</span>
            </label>
            <div class="col-md-10 form-inline item">
                [개강일] <input type="text" name="holiday_start" id="holiday_start" class="form-control datepicker" title="개강일" value='{{$data['StudyStartDate']}}' style="width:100px;" required="required">
                &nbsp;&nbsp;[요일]
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[0] == "Y") checked="checked" @endif>일
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[1] == "Y") checked="checked" @endif>월
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[2] == "Y") checked="checked" @endif>화
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[3] == "Y") checked="checked" @endif>수
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[4] == "Y") checked="checked" @endif>목
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[5] == "Y") checked="checked" @endif>금
                <input type="checkbox" name="week[]" class="flat" @if($week_arr[6] == "Y") checked="checked" @endif>토
                &nbsp;
                <button type="button" id="lecDate" onclick="setHolidayDate();" class="btn btn-sm btn-primary">적용</button>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" >휴일설정 <span class="required">*</span>
            </label>
            <div  class="col-md-10 form-inline item" style="margin-bottom:3px; overflow: scroll;display:none" id="cal_vw"></div>
        </div>
        </form>
    </div>
</div>

        {{--<link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
        <script src="/public/vendor/cheditor/cheditor.js"></script>
        <script src="/public/js/editor_util.js"></script>--}}
<script type="text/javascript">
    var $modal_regi_form = $('#modal_regi_form');
    $(document).ready(function() {

    });

</script>
@stop


@section('add_buttons')
    <button type="submit" class="btn btn-success">등록</button>
@endsection

@section('layer_footer')
</form>
@endsection