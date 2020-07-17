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
                    <div class="row">
                        <label class="control-label col-md-1-1 ml-10">설문항목관리 <span class="required">*</span></label>
                        <div class="col-md-8 mb-15">
                            <button type="button" class="btn btn-sm btn-primary clearfix-r mr-20 add_question" data-id="add_question" onclick="show_question_layer(this)">설문항목등록</button>
                        </div>
                    </div>

                    <label class="control-label col-md-1-1"></label>
                    <div class="col-md-8 form-inline">
                        <table class="table table-striped table-bordered">
                            <colgroup>
                                <col width="24%">
                                <col width="7%">
                                <col width="50%">
                                <col width="7%">
                                <col width="12%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>문항제목</th>
                                    <th>답변유형</th>
                                    <th>답변항목</th>
                                    <th>사용유무</th>
                                    <th>수정/삭제</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1) 응시하신 과목을 선택해주세요.</td>
                                    <td>복수형</td>
                                    <td>
                                        <p><strong>항목1: 헌법 => 1.매우쉬움 2.쉬움 3.보통 4.어려움 5.매우어려움</strong></p>
                                        <p><strong>항목2: 행정법 => 1.매우쉬움 2.쉬움 3.보통 4.어려움 5.매우어려움</strong></p>
                                        <p><strong>항목3: 행정학 => 1.매우쉬움 2.쉬움 3.보통 4.어려움 5.매우어려움</strong></p>
                                        <p><strong>항목4: 경제학 => 1.매우쉬움 2.쉬움 3.보통 4.어려움 5.매우어려움</strong></p>
                                        <p><strong>항목5: 회계학 => 1.매우쉬움 2.쉬움 3.보통 4.어려움 5.매우어려움</strong></p>
                                        <p><strong>항목6: 세법 => 1.매우쉬움 2.쉬움 3.보통 4.어려움 5.매우어려움</strong></p>
                                    </td>
                                    <td>사용</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-modify mb-10" data-id="btn-modify" onclick="show_question_layer(this)">수정</button>
                                        <button type="button" class="btn btn-danger btn-delete mb-10" onclick="delete_survey_question(this)">삭제</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>가장 도움이 된 커리큘럼은 무엇인가요?</td>
                                    <td>선택형</td>
                                    <td>
                                        <p><strong>항목1: 기본/심화이론</strong></p>
                                        <p><strong>항목2: 기출문제풀이</strong></p>
                                        <p><strong>항목3: 단원별문제풀이</strong></p>
                                        <p><strong>항목4: 동형모의고사</strong></p>
                                    </td>
                                    <td>미사용</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-modify mb-10" data-id="btn-modify" onclick="show_question_layer(this)">수정</button>
                                        <button type="button" class="btn btn-danger btn-delete mb-10" onclick="delete_survey_question(this)">삭제</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자</label>
                    <div class="col-md-4">
                        <p class="form-control-static">테스트</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">등록일</label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">2020-07-17</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자</label>
                    <div class="col-md-4">
                        <p class="form-control-static">테스트2</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">최종 수정일</label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">2020-07-17</p>
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
        var $regi_form = $('#regi_form');

        // 설문항목 등록/수정 모달창 오픈
        function show_question_layer(obj){
            var set_id = $(obj).data("id");
            $("."+set_id).setLayer({
                'url' : '{{ site_url('/site/survey/questionCreate') }}',
                'width' : 900
            });
        }

        // 설문항목 삭제
        function delete_survey_question(obj){
            if (confirm('설문항목을 삭제하시겠습니까?')) {
                $(obj).closest("tr").remove();
            }
        }

        // 목록 이동
        $('#goList').click(function() {
            location.replace('{{ site_url('/site/survey/index') }}');
        });
    </script>
@stop