@extends('lcms.layouts.master_modal')

@section('layer_title')
    첨삭현황
@stop

@section('layer_header')
<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
@endsection

@section('layer_content')
<div class="x_panel">
    <div class="x_content">
        <div class="form-group form-group-sm">
            <label class="control-label form-control-static col-md-1">강의명</label>
            <div class="col-md-10 form-control-static">
                제목 입니다.
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1 form-control-static">등록자</label>
            <div class="col-md-2 form-control-static">
                회원명(아이디)
            </div>
            <label class="control-label col-md-1 form-control-static">휴대폰번호</label>
            <div class="col-md-2 form-control-static">
                010-0000-0000 (Y)
            </div>
            <label class="control-label col-md-1 form-control-static">등록일</label>
            <div class="col-md-2 form-control-static">
                2018-00-00 00:00
            </div>
        </div>
    </div>

    <div class="x_content" id="showLoding">
        <div class="form-group form-group-sm">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#content_1" class="send_type" data-content-type="1">개별 발송</a></li>
                <li><a data-toggle="tab" href="#content_2" class="send_type" data-content-type="2">일괄 발송</a></li>
            </ul>
        </div>
    </div>
</div>
@stop

@section('layer_footer')
</form>
@endsection