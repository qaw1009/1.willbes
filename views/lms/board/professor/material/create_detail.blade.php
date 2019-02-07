@extends('lcms.layouts.master')

@section('content')
    <h5>- {{$arr_prof_info['ProfNickName']}} 교수 학습자료실 게시판을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $board_idx }}"/>
        <input type="hidden" name="reg_type" value="{{$arr_reg_type['admin']}}"/>
        <div class="x_panel">
            <div class="x_title">
                <h2>학습자료실 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="form-inline col-md-10 item">
                        {{--{!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required') !!}--}}
                        {!! html_site_select($arr_prof_info['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', '', false, array($arr_prof_info['SiteCode'] => $arr_prof_info['SiteName'])) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        @foreach($arr_prof_info['arr_prof_cate_code'] as $key => $val)
                            <input type="checkbox" class="flat" name="cate_code[]" value="{{$val}}" @if(empty($data['CateCodes'][$val]) === false)checked="checked"@endif>{{$arr_prof_info['arr_prof_cate_name'][$key]}}
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="subject_idx">과목<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        <select class="form-control" required="required" id="subject_idx" name="subject_idx" title="과목">
                            @foreach($arr_subject as $key => $val)
                                <option value="{{$key}}" @if($method == 'PUT' && $key == $data['SubjectIdx']) selected="selected" @endif>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="control-label col-md-1-1 d-line" for="subject_idx">자료유형<span class="required">*</span></label>
                    <div class="form-inline col-md-4 ml-12-dot item">
                        <select class="form-control" required="required" id="type_ccd" name="type_ccd" title="자료유형">
                            @foreach($arr_type_group_ccd as $key => $val)
                                <option value="{{$key}}" @if($method == 'PUT' && $key == $data['TypeCcd']) selected="selected" @endif>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="subject_idx">강좌적용구분</label>
                    <div class="col-md-4">
                        <div class="radio">
                            @foreach($arr_prodType_ccd as $key => $arr)
                                <input type="radio" id="prod_type_ccd_{{ $loop->index }}" name="prod_type_ccd" data-input="{{ $arr[1] }}" class="flat" value="{{ $key }}" @if($loop->index === 1) required="required" title="쿠폰적용구분" @endif @if($data['ProdApplyTypeCcd'] == $key || ($method == 'POST' && $loop->index === 1))checked="checked"@endif/> <label for="prod_type_ccd_{{ $loop->index }}" class="input-label">{{ $arr[0] }}</label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="subject_idx">강좌명</label>
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

                {{--<div class="form-group">
                    <label class="control-label col-md-1-1" for="prod_code">강좌명<span class="required">*</span></label>
                    <div class="form-inline col-md-10 item">
                        <button type="button" id="btn_lec_search" class="btn btn-sm btn-primary" style="cursor: pointer;">강좌검색</button>
                        <span id="selected_prod_code" class="pl-10"></span>
                        <p class="form-control-static">• 명칭, 코드 검색 가능</p>
                    </div>
                </div>--}}

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_best">HOT</label>
                    <div class="col-md-4 form-inline">
                        <div class="checkbox">
                            <input type="checkbox" id="is_best" name="is_best" value="1" class="flat" @if($data['IsBest']=='1')checked="checked"@endif/> <label class="inline-block mr-5 red" for="is_best">HOT</label>
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 item form-inline ml-12-dot">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
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
                    <div class="col-md-10">
                        <textarea id="board_content" name="board_content" class="form-control" rows="7" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="attach_img_1">첨부</label>
                    <div class="col-md-10 form-inline">
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            <div class="title">
                                <div class="filetype">
                                    <input type="text" class="form-control file-text" disabled="">
                                    <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                                    <span class="file-select file-btn">
                                        <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="form-control input-file" title="첨부{{ $i }}"/>
                                    </span>
                                    <input class="file-reset btn-danger btn" type="button" value="X" />
                                </div>
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
                    <label class="control-label col-md-1-1" for="admin_mail_id">조회수</label>
                    <div class="col-md-10 form-inline">
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

    <!-- cheditor -->
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>
    <script src="/public/js/lms/board/common.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            //editor load
            var $editor_profile = new cheditor();
            $editor_profile.config.editorHeight = '170px';
            $editor_profile.config.editorWidth = '100%';
            $editor_profile.inputForm = 'board_content';
            $editor_profile.run();

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
                        'url' : '{{ site_url('/common/searchCategory/index/multiple/site_code/') }}' + site_code + '/cate_depth/1',
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

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/board/professor/{$boardName}") }}/detailList/' + getQueryString();
            });

            //조회수
            $('#setting_readCnt').keyup(function() {
                $('#total_read_count').val(SumReadCount());
            });

            // 파일삭제
            $('.file-delete').click(function() {
                var _url = '{{ site_url("/board/professor/{$boardName}/destroyFile/") }}' + getQueryString();
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

            // 강좌 검색
            /*$('#btn_lec_search').setLayer({
                'url' : '{{ site_url('/common/searchWBook') }}',
                'width' : 900
            });*/

            // ajax submit
            $regi_form.submit(function() {
                getEditorBodyContent($editor_profile);
                var _url = '{{ site_url("/board/professor/{$boardName}/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/board/professor/{$boardName}/detailList") }}/' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });
        });

        function addValidate() {
            if($regi_form.find('input[name="cate_code[]"]').length < 1) {
                alert('카테고리 선택 필드는 필수입니다.');
                return false;
            }

            if ($regi_form.find('select[name="type_ccd"]').val() == '632002') {
                if ($regi_form.find('input[name="prod_code[]"]').length < 1) {
                    alert('강좌명 선택 필드는 필수입니다.');
                    return false;
                } else if ($regi_form.find('input[name="prod_code[]"]').length > 1) {
                    alert('강좌명 선택 필드는 1개만 선택 가능합니다.');
                    return false;
                }
            }
            return true;
        }
    </script>
@stop