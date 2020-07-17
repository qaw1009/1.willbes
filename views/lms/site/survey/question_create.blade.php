@extends('lcms.layouts.master_modal')

@section('layer_title')
    설문조사 항목 등록
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value=""/>
        @endsection

        @section('layer_content')
            <div class="x_title text-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            {!! form_errors() !!}
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1" for="SqTitle">문항제목 <span class="required">*</span></label>
                <div class="col-md-10">
                    <input type="text" id="SqTitle" name="SqTitle" required="required" class="form-control" title="문항제목" value="">
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1" for="SqComment">문항설명</label>
                <div class="col-md-10">
                    <textarea id="SqComment" name="SqComment" class="form-control" rows="3" title="설명" placeholder=""></textarea>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">사용 여부 <span class="required">*</span></label>
                <div class="col-md-10">
                    <div class="radio">
                        <input type="radio" id="IsUseY" name="IsUse" class="flat" value="Y" required="required" title="사용여부" checked/>
                        <label for="IsUseY" class="input-label">사용</label>
                        <input type="radio" id="IsUseN" name="IsUse" class="flat" value="N"/>
                        <label for="IsUseN" class="input-label">미사용</label>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1" for="publ_tel1">답변유형</label>
                <div class="col-md-10">
                    <select id="SqType" name="SqType" title="SqType" class="form-control" onchange="sq_type(this);">
                        <option selected="selected">-유형-</option>
                        <option value="S">선택형</option>
                        <option value="M">선다형</option>
                        <option value="T">복수형</option>
                        <option value="D">서술형</option>
                    </select>
                </div>
            </div>

            <div class="form-group form-group-sm form-group-inline">
                <div class="mb-30">
                    <label class="control-label col-md-1-1">문항설명</label>
                    <div class="col-md-10">
                        <button type="button" class="btn btn-sm btn-dark clearfix-r">답변항목생성</button>
                    </div>
                </div>

                <div class="col-md-10 col-md-offset-2 form-inline mt-10">
                    <input type="text" name="" required="required" class="form-control" title="" value="1">
                    <a href="#none" class="btn-delete-submit" data-idx="" data-register-idx=""><i class="fa fa-times fa-lg red"></i></a>
                    <button type="button" class="btn btn-sm btn-primary ml-5">문항추가</button>
                </div>
                <div class="col-md-10 col-md-offset-3 form-inline mt-5">
                    <input type="text" name="" required="required" class="form-control" title="" value="2">
                    <a href="#none" class="btn-delete-submit" data-idx="" data-register-idx=""><i class="fa fa-times fa-lg red"></i></a>
                </div>
                <div class="col-md-10 col-md-offset-3 form-inline mt-5">
                    <input type="text" name="" required="required" class="form-control" title="" value="3">
                    <a href="#none" class="btn-delete-submit" data-idx="" data-register-idx=""><i class="fa fa-times fa-lg red"></i></a>
                </div>

                <div class="col-md-10 col-md-offset-2 form-inline mt-10">
                    <input type="text" name="" required="required" class="form-control" title="" value="4">
                    <a href="#none" class="btn-delete-submit" data-idx="" data-register-idx=""><i class="fa fa-times fa-lg red"></i></a>
                    <button type="button" class="btn btn-sm btn-primary ml-5">문항추가</button>
                </div>
                <div class="col-md-10 col-md-offset-3 form-inline mt-5">
                    <input type="text" name="" required="required" class="form-control" title="" value="5">
                    <a href="#none" class="btn-delete-submit" data-idx="" data-register-idx=""><i class="fa fa-times fa-lg red"></i></a>
                </div>
                <div class="col-md-10 col-md-offset-3 form-inline mt-5">
                    <input type="text" name="" required="required" class="form-control" title="" value="6">
                    <a href="#none" class="btn-delete-submit" data-idx="" data-register-idx=""><i class="fa fa-times fa-lg red"></i></a>
                </div>
            </div>


            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">등록자</label>
                <div class="col-md-4 form-control-static">

                </div>
                <label class="control-label col-md-1-1">등록일</label>
                <div class="col-md-4 form-control-static">

                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">최종 수정자</label>
                <div class="col-md-4 form-control-static">

                </div>
                <label class="control-label col-md-1-1">최종 수정일</label>
                <div class="col-md-4 form-control-static">

                </div>
            </div>

            <script type="text/javascript">

            </script>
        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">저장</button>
        @endsection

        @section('layer_footer')
    </form>

    <style>
        .form-group-inline .col-md-offset-2 input { width: 470px;}
        .form-group-inline .col-md-offset-3 input { width: 400px;}
    </style>

    <script>
        //유형선택
        function sq_type(obj){
            if(obj.value == 'S'||obj.value == 'M'||obj.value == 'T'){
                $('#hintgroup').show();
                $('#numgroup').show();
            }else{
                $('#hintgroup').hide();
                $('#numgroup').hide();
            }
        }
    </script>
@endsection