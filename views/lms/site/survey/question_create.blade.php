@extends('lcms.layouts.master_modal')

@section('layer_title')
    설문조사 항목 등록
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
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
                <label class="control-label col-md-1-1" for="publ_tel1">답변유형 <span class="required">*</span></label>
                <div class="col-md-10">
                    <span style="color:red;">유형설명 - 선택형(단일선택 객관식), 선다형(서술형 여러개), 복수형(다중선택 객관식)</span>
                    <select id="SqType" name="SqType" title="SqType" class="form-control" required="required" title="답변유형" onchange="sq_type(this.value);">
                        <option value="">-유형선택-</option>
                        <option value="S">선택형</option>
                        <option value="M">선다형</option>
                        <option value="T">복수형</option>
                        <option value="D">서술형</option>
                    </select>
                </div>
            </div>

            <div class="form-group form-group-sm form-group-inline">
                <div class="mb-30">
                    <label class="control-label col-md-1-1">답변항목 <span class="required">*</span></label>
                    <div class="col-md-10">
                        <button type="button" class="btn btn-sm btn-dark clearfix-r" onclick="add_question_item();">답변항목생성</button>
                    </div>
                </div>
                <div id="question_item">
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
        .form-group-inline .col-md-offset-1 input { width: 476px;}
        .form-group-inline .col-md-offset-2 textarea { width: 468px;}
        .form-group-inline .col-md-offset-3 input { width: 400px;}
    </style>

    <script>
        var $datatable;
        var $regi_form = $('#regi_form');

        // 답변유형선택/항목추가
        function sq_type(type,action,obj) {
            var _url = '{{ site_url('/site/survey/questionItem') }}';
            var is_obj = (typeof obj === 'undefined') ? '' : true;
            var data = {'SqType': type, 'SqAction': action, 'IsObj': is_obj};

            if(type){
                sendAjax(_url, data, function(html) {
                    if(action == 'item') {
                        if(is_obj === true){
                            $(obj).parents(".group_box").find("div:last").after(html);
                        }else{
                            $('#question_item .group_box:last').after(html);
                        }
                    }else{
                        $('#question_item').html(html);
                    }
                }, showAlertError, false, 'GET', 'html');
            }else{
                $('#question_item').html("");
            }
        }

        // 답변항목생성/문항추가
        function add_question_item(obj) {
            var add_type = $("#SqType option:selected").val();

            if(add_type == ""){
                alert("답변유형을 선택해주세요.");
                return;
            }

            sq_type(add_type,'item',obj);
        }

        // 문항 삭제
        function delete_question_item(obj,item){
            var remove_obj = (typeof item === 'undefined') ? 'div' : '.group_box';

            if (confirm('문항을 삭제하시겠습니까?')) {
                $(obj).closest(remove_obj).remove();
            }
        }
    </script>
@endsection