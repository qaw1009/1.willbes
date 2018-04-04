@extends('lcms.layouts.master')

@section('content')
    <h5>- 강좌 구성을 위한 교수 정보를 관리하는 메뉴입니다. (WBS > PMS 정보 연동)</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>교수 정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $idx }}"/>
                <input type="hidden" name="wprof_idx" value=""/>
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-2">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static"># 사이트 변경시 설정한 정보들이 초기화 됩니다. (교수정보, 카테고리정보, 과목정보)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">교수정보 불러오기 <span class="required">*</span>
                    </label>
                    <div class="col-md-2">
                        <button type="button" id="btn_professor_search" class="btn btn-sm btn-primary">교수검색</button>
                    </div>
                    <div class="col-md-7">
                        <p id="selected_professor" class="form-control-static">교수명 | 교수코드 | 아이디 | 사용여부</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_nickname">교수닉네임 <span class="required">*</span>
                    </label>
                    <div class="col-md-2">
                        <input type="text" id="prof_nickname" name="prof_nickname" class="form-control" title="교수닉네임" value="{{ $data['ProfNickName'] }}">
                    </div>
                    <label class="control-label col-md-2 col-md-offset-2" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-2">
                        <button type="button" id="btn_subject_mapping_search" class="btn btn-sm btn-primary">카테고리검색</button>
                    </div>
                    <div class="col-md-7">
                        <p id="selected_subject_mapping" class="form-control-static"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="ot_url">OT설정
                    </label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="control-label col-md-1">OT
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="ot_url" name="ot_url" class="form-control optional" pattern="url" title="OT영상" value="{{ $data['wSampleUrl'] }}">
                            </div>
                            <div class="col-md-2 pl-0">
                                <button type="button" class="btn btn-default btn-movie-view">보기</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="sample_url1">맛보기설정
                    </label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="control-label col-md-1">WBS맛보기
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="sample_url1" name="sample_url1" class="form-control optional" pattern="url" title="맛보기영상" value="{{ $data['wSampleUrl'] }}">
                            </div>
                            <div class="col-md-2 pl-0">
                                <button type="button" class="btn btn-default btn-movie-view">보기</button>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-1">맛보기1
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="sample_url2" name="sample_url2" class="form-control optional" pattern="url" title="맛보기1" value="{{ $data['wSampleUrl'] }}">
                            </div>
                            <div class="col-md-2 pl-0">
                                <button type="button" class="btn btn-default btn-movie-view">보기</button>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-1">맛보기2
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="sample_url3" name="sample_url3" class="form-control optional" pattern="url" title="맛보기1" value="{{ $data['wSampleUrl'] }}">
                            </div>
                            <div class="col-md-2 pl-0">
                                <button type="button" class="btn btn-default btn-movie-view">보기</button>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-1">맛보기3
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="sample_url4" name="sample_url4" class="form-control optional" pattern="url" title="맛보기1" value="{{ $data['wSampleUrl'] }}">
                            </div>
                            <div class="col-md-2 pl-0">
                                <button type="button" class="btn btn-default btn-movie-view">보기</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="use_board">게시판운영여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-3">
                        <div class="checkbox">
                            <input type="checkbox" id="use_board1" name="use_board[]" class="flat" value=""/> <label for="use_board1" class="input-label">공지사항</label>
                            <input type="checkbox" id="use_board2" name="use_board[]" class="flat" value=""/> <label for="use_board2" class="input-label">학습Q&A</label>
                            <input type="checkbox" id="use_board3" name="use_board[]" class="flat" value=""/> <label for="use_board3" class="input-label">학습자료실</label>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static"># 체크시 사용자단 교수소개 영역에 노출됩니다. (미체크시 미노출)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="is_cafe_use">교수카페정보
                    </label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="control-label col-md-1">[사용유무]
                            </div>
                            <div class="col-md-2">
                                <div class="radio">
                                    <input type="radio" id="is_cafe_use_y" name="is_cafe_use" class="flat" value="Y" required="required" title="사용여부" @if($data['IsCafeUse']=='Y')checked="checked"@endif/> <label for="is_cafe_use_y" class="input-label">사용</label>
                                    <input type="radio" id="is_cafe_use_n" name="is_cafe_use" class="flat" value="N" @if($method == 'POST' || $data['IsCafeUse']=='N')checked="checked"@endif/> <label for="is_cafe_use_n" class="input-label">미사용</label>
                                </div>
                            </div>
                            <div class="control-label col-md-1">[카페 URL]</div>
                            <div class="col-md-6">
                                <input type="text" id="cafe_url" name="cafe_url" class="form-control" title="교수닉네임" value="{{ $data['CafeUrl'] }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_curriculum">커리큘럼 <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <textarea id="prof_curriculum" name="prof_curriculum" class="form-control" rows="7" required="required" title="교수프로필" placeholder="">{!! $data['ProfCurriculum'] !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_profile">교수프로필
                    </label>
                    <div class="col-md-9">
                        {!! $data['wProfProfile'] !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="book_content">주요저서
                    </label>
                    <div class="col-md-9">
                        {!! $data['wBookContent'] !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="attach_img1">교수영역 이미지
                    </label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="control-label col-md-2">교수 인덱스 (00X00, jpg, png)
                            </div>
                            <div class="col-md-5">
                                <input type="file" id="attach_img1" name="attach_img[]" class="form-control" title="교수 인덱스 이미지"/>
                            </div>
                            <div class="col-md-5 pl-0">
                                <p class="form-control-static"><a href="#none">업로드한 이미지입니다.{{ str_last_pos_after($data['AttachImg'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="attach_img1"><i class="fa fa-times red"></i></a></p>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-2">교수 상세 (00X00, jpg, png)
                            </div>
                            <div class="col-md-5">
                                <input type="file" id="attach_img2" name="attach_img[]" class="form-control" title="교수 상세 이미지"/>
                            </div>
                            <div class="col-md-5 pl-0">
                                <p class="form-control-static"><a href="#none">업로드한 이미지입니다.{{ str_last_pos_after($data['AttachImg'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="attach_img2"><i class="fa fa-times red"></i></a></p>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-2">강좌 리스트 (00X00, jpg, png)
                            </div>
                            <div class="col-md-5">
                                <input type="file" id="attach_img3" name="attach_img[]" class="form-control" title="강좌 리스트 이미지"/>
                            </div>
                            <div class="col-md-5 pl-0">
                                <p class="form-control-static"><a href="#none">업로드한 이미지입니다.{{ str_last_pos_after($data['AttachImg'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="attach_img3"><i class="fa fa-times red"></i></a></p>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-2">강좌 상세 (00X00, jpg, png)
                            </div>
                            <div class="col-md-5">
                                <input type="file" id="attach_img4" name="attach_img[]" class="form-control" title="강좌 상세 이미지"/>
                            </div>
                            <div class="col-md-5 pl-0">
                                <p class="form-control-static"><a href="#none">업로드한 이미지입니다.{{ str_last_pos_after($data['AttachImg'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="attach_img4"><i class="fa fa-times red"></i></a></p>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-2">수강후기 (00X00, jpg, png)
                            </div>
                            <div class="col-md-5">
                                <input type="file" id="attach_img5" name="attach_img[]" class="form-control" title="수강후기 이미지"/>
                            </div>
                            <div class="col-md-5 pl-0">
                                <p class="form-control-static"><a href="#none">업로드한 이미지입니다.{{ str_last_pos_after($data['AttachImg'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="attach_img5"><i class="fa fa-times red"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['wRegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wRegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['wUpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wUpdDatm'] }}</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
    <!-- cheditor -->
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // editor load
            var $editor_curriculum = new cheditor();
            $editor_curriculum.config.editorHeight = '170px';
            $editor_curriculum.config.editorWidth = '100%';
            $editor_curriculum.inputForm = 'prof_curriculum';
            $editor_curriculum.run();

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/product/base/professor/store') }}';

                // editor
                getEditorBodyContent($editor_curriculum);

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/product/base/professor/index') }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                return true;
            }

            // 교수 검색
            $('#btn_professor_search').setLayer({
                'url' : '{{ site_url('/common/searchProfessor') }}',
                'width' : 900
            });

            // 카테고리 + 과목 맵핑 검색
            $('#btn_subject_mapping_search').on('click', function() {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.')
                    return;
                }

                $('#btn_subject_mapping_search').setLayer({
                    'url' : '{{ site_url('/common/searchSubjectMapping/index/') }}' + site_code,
                    'width' : 900
                });
            });

            // 카테고리 + 과목 맵핑 삭제
            $regi_form.on('click', '.selected-subject-mapping-delete', function() {
                var that = $(this);
                that.parent().remove();
                $regi_form.find('input[name="subject_mapping_code[]"][value="' + that.data('subject-mapping-code') + '"]').remove();
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/product/base/professor/index') }}' + getQueryString());
            });
        });
    </script>
@stop
