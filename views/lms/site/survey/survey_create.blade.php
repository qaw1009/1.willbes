@extends('lcms.layouts.master')
@section('content')
    <h5>- 설문을 등록하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="" />

        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_title">
                <h2>설문등록</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다. <br>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1">설문정보 </label>
                    <div class="col-md-8 form-inline">
                        <select id="survey_list" class="form-control">
                            <option selected="selected">-선택하세요-</option>
                            <option value="">설문1</option>
                            <option value="">설문2</option>
                            <option value="">설문3</option>
                        </select>
                        <button type="button" id="show_survey" class="btn btn-sm btn-primary">불러오기</button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">제목 <span class="required">*</span></label>
                    <div class="col-md-8">
                        <input type="text" id="title" name="title" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">설명</label>
                    <div class="col-md-8">
                        <textarea id="comment" name="comment" cols="50" rows="3" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">조사범위 <span class="required">*</span></label>
                    <div class="col-md-8">
                        <div class="radio">
                            <input type="radio" class="flat" id="is_member_y" name="is_member" value="Y" required="required" checked>
                            <label for="is_member_y" class="input-label">회원</label>
                            <input type="radio" class="flat" id="is_member_n" name="is_member" value="N" required="required">
                            <label for="is_member_n" class="input-label">회원 + 비회원</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">중복투표 <span class="required">*</span></label>
                    <div class="col-md-8">
                        <div class="radio">
                            <input type="radio" class="flat" id="is_overlap_n" name="is_overlap" value="N" required="required" checked>
                            <label for="is_overlap_n" class="input-label">불가능</label>
                            <input type="radio" class="flat" id="is_overlap_y" name="is_overlap" value="Y" required="required">
                            <label for="is_overlap_y" class="input-label">가능</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">설문기간 <span class="required">*</span></label>
                    <div class="col-md-8 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="register_start_datm" name="register_start_datm" value="">
                        </div>
                        <span class="pl-5 pr-5">~</span>
                        <div class="input-group mb-0">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="register_end_datm" name="register_end_datm" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">설문항목관리 <span class="required">*</span></label>
                    <div class="col-md-10 form-inline">
                        <button type="button" id="add_question" class="btn btn-sm btn-primary">설문항목등록</button>
                    </div>
                </div>


                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="goList">목록</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        // 설문항목 등록/수정 모달창 오픈
        $('#add_question').on('click', function(event) {

            $('#add_question').setLayer({
                'url' : '{{ site_url('/site/survey/questionCreate') }}',
                'width' : 900
            });
        });
    </script>
@stop