@extends('lcms.layouts.master')

@section('content')
    <h5>- 회원이 작성한 수강후기를 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/board/{$boardName}/store") }}?bm_idx=45" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $board_idx }}"/>
        <input type="hidden" name="reg_type" value="{{$arr_reg_type['admin']}}"/>
        <input type="hidden" name="lec_score" value="{{$data['LecScore']}}"/>
        <div class="x_panel">
            <div class="x_title">
                <h2>공지게시판 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="form-inline col-md-10 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', '') !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                        <span id="selected_category" class="pl-10">
                            @if(isset($data['CateCodes']) === true)
                                @foreach($data['CateCodes'] as $cate_code => $cate_name)
                                    <span class="pr-10">{{ $cate_name }}
                                        <a href="#none" data-cate-code="{{ $cate_code }}" class="selected-category-delete"><i class="fa fa-times red"></i></a>
                                        <input type="hidden" name="cate_code[]" value="{{ $cate_code }}"/>
                                    </span>
                                @endforeach
                            @endif
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="subject_idx">과목명<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        <select class="form-control" id="subject_idx" name="subject_idx" title="과목명" required="required">
                            <option value="">과목명</option>
                            @foreach($arr_subject as $row)
                                <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}" @if($method == 'PUT' && ($row['SubjectIdx'] == $data['SubjectIdx'])) selected="selected" @endif>{{ $row['SubjectName'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="control-label col-md-1-1 d-line" for="prof_idx">교수명<span class="required">*</span></label>
                    <div class="form-inline col-md-4 ml-12-dot item">
                        <select class="form-control" id="prof_idx" name="prof_idx" title="교수명" required="required">
                            <option value="">교수명</option>
                            @foreach($arr_professor as $row)
                                <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}" @if($method == 'PUT' && ($row['ProfIdx'] == $data['ProfIdx'])) selected="selected" @endif>{{ $row['wProfName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="subject_idx">강좌적용구분<span class="required">*</span></label>
                    <div class="col-md-4 item">
                        <div class="radio">
                            @foreach($arr_prodType_ccd as $key => $arr)
                                <input type="radio" id="prod_type_ccd_{{ $loop->index }}" name="prod_type_ccd" data-input="{{ $arr[1] }}" class="flat" value="{{ $key }}" @if($loop->index === 1) required="required" title="강좌적용구분" @endif @if($data['ProdApplyTypeCcd'] == $key || ($method == 'POST' && $loop->index === 1))checked="checked"@endif/> <label for="prod_type_ccd_{{ $loop->index }}" class="input-label">{{ $arr[0] }}</label>
                            @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="lec_score">평점<span class="required">*</span></label>
                    <div class="form-inline col-md-4 ml-12-dot">
                        <ul class="star-rating cs-pointer" id="starRating" data-stars="5" data-current="{{$data['LecScore']}}" data-static="false"></ul>
                    </div>
                </div>

                <div class="form-group @if($data['ProdApplyTypeCcd'] == '636011') hide @endif" id="review_on_off">
                    <label class="control-label col-md-1-1" for="subject_idx">강좌명<span class="required">*</span></label>
                    <div class="col-md-10">
                        <button type="button" id="btn_product_search" class="btn btn-sm btn-primary">상품검색</button>
                        <span id="selected_product" class="pl-10">
                            @if(empty($data['ProdCode']) === false)
                                <span class="pr-10">{{$data['ProdName']}}
                                    <a href="#none" data-prod-code="{{$data['ProdCode']}}" class="selected-product-delete"><i class="fa fa-times red"></i></a>
                                    <input type="hidden" name="prod_code[]" value="{{$data['ProdCode']}}"/>
                                </span>
                            @endif
                        </span>
                    </div>
                </div>

                <div class="form-group @if($data['ProdApplyTypeCcd'] != '636011') hide @endif" id="review_write">
                    <label class="control-label col-md-1-1" for="prod_name">강좌명<span class="required">*</span></label>
                    <div class="col-md-4">
                        <input type="text" id="prod_name" name="prod_name" required="required" class="form-control" value="{{$data['ProdName']}}">
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="review_reg_date">등록날짜<span class="required">*</span></label>
                    <div class="col-md-3 form-inline ml-12-dot">
                        <div class="input-group mb-0">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="review_reg_date" name="review_reg_date" value="{{ $data['ReviewRegDate'] or date('Y-m-d') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="reg_mem_name">회원명<span class="required">*</span></label>
                    <div class="form-inline col-md-4">
                        <input type="text" id="reg_mem_name" name="reg_mem_name" required="required" class="form-control" maxlength="46" title="회원명" value="{{$data['RegMemName']}}">
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="is_best">BEST</label>
                    <div class="col-md-3 form-inline ml-8-dot">
                        <div class="checkbox">
                            <input type="checkbox" id="is_best" name="is_best" value="1" class="flat" @if($data['IsBest']=='1')checked="checked"@endif/> <label class="inline-block mr-5 red" for="is_best">BEST</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-3 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/><label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="title">제목<span class="required">*</span></label>
                    <div class="col-md-10 item">
                        <input type="text" id="title" name="title" required="required" class="form-control" maxlength="46" title="제목" value="{{ $data['Title'] }}" placeholder="제목 입니다.">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="board_content">내용<span class="required">*</span></label>
                    <div class="form-inline col-md-10">
                        <textarea id="board_content" name="board_content" class="form-control" rows="7" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="attach_img_1">첨부</label>
                    <div class="col-md-10 form-inline">
                        <a id="btn_attach_toggle" href="#none">첨부펼침 <span id="attach_toggle_img" class="fa fa-chevron-up"></span></a>
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            <div class="title attach-file-div @if($i!==0) hide @endif">
                                <!--div class="filetype">
                                    <input type="text" class="form-control file-text" disabled="">
                                    <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                                    <span class="file-select file-btn"-->
                                        <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="form-control input-file" title="첨부{{ $i }}"/>
                                    <!--/span>
                                    <input class="file-reset btn-danger btn" type="button" value="X" />
                                </div-->
                                @if(empty($data['arr_attach_file_path'][$i]) === false)
                                    <p class="form-control-static ml-10 mr-10">[ <a href="{{ $data['arr_attach_file_path'][$i] . $data['arr_attach_file_name'][$i] }}" rel="popup-image">{{ $data['arr_attach_file_real_name'][$i] }}</a> ]
                                        <a href="#none" class="file-delete" data-attach-idx="{{ $data['arr_attach_file_idx'][$i]  }}"><i class="fa fa-times red"></i></a>
                                    </p>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="admin_mail_id">조회수</label>
                    <div class="col-md-4 form-inline">
                        실제 <input type="text" id="read_count" name="read_count" class="form-control" title="실제" readonly="readonly" value="{{$data['ReadCnt']}}" style="width: 60px; padding:5px">
                        +
                        생성 <input type="number" id="setting_readCnt" name="setting_readCnt" class="form-control" title="생성" value="{{$data['SettingReadCnt']}}" style="width: 70px; padding:5px">
                        =
                        노출 <input type="text" id="total_read_count" name="total_read_count" class="form-control" title="노출" readonly="readonly" value="" style="width: 70px; padding:5px">
                        &nbsp;&nbsp;&nbsp;&nbsp;• 사용자단에 노출되는 조회수는‘실조회수 + 조회수생성’입니다.
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>

            </div>
        </div>
    </form>
    <!-- start rating -->
    <link href="/public/vendor/start-rating/starrating.css" rel="stylesheet">
    <script src="/public/vendor/start-rating/jquery.starrating.js"></script>

    <!-- cheditor -->
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>
    <script src="/public/js/lms/board/common.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $end_date = '{{date("Y-m-d")}}';

        $(document).ready(function() {
            // 등록날짜
            $('#review_reg_date').focusout(function (){
                if($(this).val() > $end_date){
                    alert('오늘 날짜보다 작거나 같아야 합니다.');
                    $(this).val($end_date);
                }
            });

            //start rating
            $('#starRating').starRating({
                callback: function (value) {
                    $regi_form.find('input[name="lec_score"]').val(value);
                }
            });

            //editor load
            var $editor_profile = new cheditor();
            $editor_profile.config.editorHeight = '170px';
            $editor_profile.config.editorWidth = '100%';
            $editor_profile.inputForm = 'board_content';
            $editor_profile.run();

            // site-code에 매핑되는 select box 자동 변경
            $regi_form.find('select[name="subject_idx"]').chained("#site_code");
            $regi_form.find('select[name="course_idx"]').chained("#site_code");
            $regi_form.find('select[name="prof_idx"]').chained("#site_code");

            /**페이지 로딩시 실행**/
            $('#total_read_count').val(SumReadCount());

            // 운영사이트 변경
            $regi_form.on('change', 'select[name="site_code"]', function() {
                // 카테고리 검색 초기화
                $regi_form.find('input[name="cate_code"]').val('');
                $('#selected_category').html('');
                $('#selected_product').html('');
            });

            // 카테고리 검색 or 상품 검색
            $('#btn_category_search, #btn_product_search').on('click', function(event) {
                var btn_id = event.target.getAttribute('id');
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.')
                    return;
                }

                if (btn_id === 'btn_category_search') {
                    $('#btn_category_search').setLayer({
                        'url' : '{{ site_url('/common/searchCategory/index/multiple/site_code/') }}' + site_code,
                        'width' : 900
                    });
                } else if (btn_id === 'btn_product_search') {
                    // 강좌 검색
                    var prod_type = $('input[name="prod_type_ccd"]:checked').data('input').split(':');
                    $('#btn_product_search').setLayer({
                        'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + site_code + '&prod_type='+prod_type+'&return_type=inline&target_id=selected_product&target_field=prod_code',
                        'width' : 1200
                    });
                }
            });

            // 카테고리, 상품 삭제
            $regi_form.on('click', '.selected-category-delete, .selected-product-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            // 강좌적용구분
            $regi_form.on('ifChanged', 'input[name="prod_type_ccd"]', function() {
                if($(this).prop('checked') === true){
                    var s_val = $(this).filter(':checked').val();
                    if(s_val == '636011'){ // 수기등록
                        $("#review_write").removeClass("hide");
                        $("#review_on_off").addClass("hide");
                    }else{
                        $("#review_on_off").removeClass("hide");
                        $("#review_write").addClass("hide");
                    }
                }

            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/board/{$boardName}") }}/' + getQueryString();
            });

            //조회수
            $('#setting_readCnt').keyup(function() {
                $('#total_read_count').val(SumReadCount());
            });

            // 파일삭제
            $('.file-delete').click(function() {
                var _url = '{{ site_url("/board/{$boardName}/destroyFile/") }}' + getQueryString();
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'attach_idx' : $(this).data('attach-idx')
                };
                if (!confirm('정말로 삭제하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            // ajax submit
            $regi_form.submit(function() {
                getEditorBodyContent($editor_profile);
                var _url = '{{ site_url("/board/{$boardName}/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/board/{$boardName}") }}/' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            $('#btn_attach_toggle').click(function() {
                var $attach_toggle_img = $('#attach_toggle_img');
                if($attach_toggle_img.hasClass('fa-chevron-up') === true) {
                    $attach_toggle_img.removeClass('fa-chevron-up');
                    $attach_toggle_img.addClass('fa-chevron-down');
                    $('.attach-file-div').each(function(i) {
                        if(i !== 0){
                            $(this).removeClass('hide');
                            $(this).addClass('show');
                        }
                    });
                } else {
                    $attach_toggle_img.removeClass('fa-chevron-down');
                    $attach_toggle_img.addClass('fa-chevron-up');
                    $('.attach-file-div').each(function(i) {
                        if(i !== 0){
                            $(this).removeClass('show');
                            $(this).addClass('hide');
                        }
                    });
                }
            });

        });

        function addValidate() {
            if($regi_form.find('input[name="cate_code[]"]').length < 1) {
                alert('카테고리 선택 필드는 필수입니다.');
                return false;
            }

            if($regi_form.find('input[name="prod_code[]"]').length < 1 && !$.trim($regi_form.find('input[name="prod_name"]').val())) {
                alert('강좌명 입력 필드는 필수입니다.');
                return false;
            }

            if($regi_form.find('input[name="prod_code[]"]').length > 1) {
                alert('강좌명 선택 필드는 1개만 선택 가능합니다.');
                return false;
            }

            return true;
        }
    </script>
@stop