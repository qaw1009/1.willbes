@extends('lcms.layouts.master')

@section('content')
    <h5>- 고객센터 온라인 공지사항 게시판을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>--}}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/board/{$boardName}/store") }}?bm_idx=45" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $board_idx }}"/>
        <input type="hidden" name="reg_type" value="1"/>
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
                    <label class="control-label col-md-2" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="col-md-2 item">
                        <select class="form-control" required="required" id="site_code" name="site_code" title="운영사이트">
                            @foreach($getSiteArray as $key => $val)
                                <option value="{{$key}}" @if($key == $data['SiteCode'] || $key == $site_code)selected="selected"@endif>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="campus_ccd">캠퍼스</label>
                    <div class="col-md-2">
                        <select class="form-control" id="campus_ccd" name="campus_ccd"></select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="site_category">구분<span class="required">*</span></label>
                    <div class="col-md-4 item form-inline">
                        <div class="checkbox">
                            <input type="checkbox" id="site_category_all" value="all" class="flat"/> <label class="inline-block mr-5" for="site_category_all">전체</label>
                        </div>
                        <div class="checkbox" id="site_category">
                            @foreach($getCategoryArray as $key => $val)
                                @php $cate_idx = $loop->index-1; @endphp
                                <input type="checkbox" id="site_category_{{$key}}" name="site_category[]" value="{{$key}}" class="site_category flat" @if($method == 'PUT' && in_array($key,$data['arr_cate_code']) === true) checked="checked" @endif/>
                                <label class="inline-block mr-5" for="site_category_{{$key}}">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="title">제목<span class="required">*</span></label>
                    <div class="col-md-9 item">
                        <input type="text" id="title" name="title" required="required" class="form-control" maxlength="46" title="제목" value="{{ $data['Title'] }}" placeholder="제목 입니다.">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_best">HOT</label>
                    <div class="col-md-4 form-inline">
                        <div class="checkbox">
                            <input type="checkbox" id="is_best" name="is_best" value="Y" class="flat" @if($data['IsBest']=='Y')checked="checked"@endif/> <label class="inline-block mr-5 red" for="is_best">HOT</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-3 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/><label for="is_use_y" class="hover mr-5">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="board_content">내용<span class="required">*</span></label>
                    <div class="col-md-9">
                        <textarea id="board_content" name="board_content" class="form-control" rows="7" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="attach_img_1">첨부</label>
                    <div class="col-md-9 form-inline">
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            <div class="mb-5">
                                <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="form-control" title="첨부{{ $i }}"/>

                                @if(empty($data['arr_attach_file_path'][$i]) === false)
                                    <p class="form-control-static ml-30 mr-10">[ <a href="{{ $data['arr_attach_file_path'][$i] . $data['arr_attach_file_name'][$i] }}" rel="popup-image">{{ $data['arr_attach_file_name'][$i] }}</a> ]
                                        <a href="#none" class="file-delete" data-attach-idx="{{ $data['arr_attach_file_idx'][$i]  }}"><i class="fa fa-times red"></i></a>
                                    </p>
                                @endif

                                {{--@if(empty($data{'AttachFileName' . $i}) === false)
                                    <p class="form-control-static ml-30 mr-10">[ <a href="{{ $data['AttachFilePath'] . $data{'AttachFileName' . $i} }}" rel="popup-image">{{ $data{'AttachFileName' . $i} }}</a> ]</p>
                                    <div class="checkbox">
                                        <input type="checkbox" name="" value="{{ $i }}" class="flat"/> <span class="red">삭제</span>
                                    </div>
                                @endif--}}
                            </div>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="admin_mail_id">조회수</label>
                    <div class="col-md-4 form-inline">
                        실제 <input type="text" id="readCnt" name="readCnt" class="form-control" title="실제" readonly="readonly" value="{{$data['ReadCnt']}}" style="width: 60px; padding:5px">
                        +
                        생성 <input type="number" id="setting_readCnt" name="setting_readCnt" class="form-control" title="생성" value="{{$data['SettingReadCnt']}}" style="width: 70px; padding:5px">
                        =
                        노출 <input type="text" id="total_read_count" name="total_read_count" class="form-control" title="노출" readonly="readonly" value="" style="width: 70px; padding:5px">
                    </div>
                    <div class="col-md-5">
                        <p class="form-control-static">• 사용자단에 노출되는 조회수는‘실조회수 + 조회수생성’입니다.</p>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group text-center">
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
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // editor load
            var $editor_profile = new cheditor();
            $editor_profile.config.editorHeight = '170px';
            $editor_profile.config.editorWidth = '100%';
            $editor_profile.inputForm = 'board_content';
            $editor_profile.run();

            //캠퍼스목록조회 : 페이지 로딩시 실행
            getAjaxcampusInfo();

            $('#setting_readCnt').keyup(function() {
                $('#total_read_count').val(SumReadCount());
            });

            // ajax submit
            $regi_form.submit(function() {
                getEditorBodyContent($editor_profile);
                /*var _url = '{{ site_url("/board/{$boardName}/store") }}' + getQueryString();
                getEditorBodyContent($editor_profile);

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/board/{$boardName}") }}/' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');*/
            });

            //목록
            $('#btn_list').click(function() {
                location.replace('{{ site_url("/board/{$boardName}") }}/' + getQueryString());
            });

            //운영사이트값에 따른 구분 값 셋팅
            $('#site_code').change(function() {
                var _data = {};
                var add_checkBox = '';
                var _url = '{{ site_url("/board/{$boardName}/getAjaxSiteCategoryInfo/") }}' + this.value + getQueryString();
                sendAjax(_url, _data, function(ret) {
                    if (ret.ret_cd) {
                        $('#site_category_all').prop('checked', false).iCheck('update');
                        if (Object.keys(ret.ret_data.category.length > 0)) {
                            $.each(ret.ret_data.category, function(key, val) {
                                add_checkBox += '<input type="checkbox" id="site_category_'+key+'" name="site_category[]" value="'+key+'" class="site_category flat"/> <label class="inline-block mr-5" for="site_category_'+key+'">'+val+'</label>';
                            });
                            $('#site_category').html(add_checkBox);
                        } else {
                            //$('#site_category').html(add_checkBox);
                        }
                    }
                    getAjaxcampusInfo();
                }, showError, false, 'GET');
            });

            $('#site_code').on('change', function() {
                $('input[type="checkbox"].flat').iCheck({
                    checkboxClass: 'icheckbox_flat-blue',
                    radioClass: 'iradio_flat-blue'
                });
            });

            //사이트카테고리(구분) 선택/해제, 분류박스 활성/비활성화
            $(document).on("ifChanged","#site_category_all",function(){
                iCheckAll('input[name="site_category[]"]', '#site_category_all');
                if ($(this).prop('checked') === true) {
                    $('#sub_category').prop('disabled', true);
                } else {
                    $('#sub_category').prop('disabled', false);
                }
            });

            //사이트카테고리(구분) 개별선택에 따른 [전체]체크박스 초기화
            $(document).on("ifChanged",".site_category",function(){
                $('#site_category_all').prop('checked', false).iCheck('update');
            });

            // 파일삭제
            $('.file-delete').click(function() {
                if (!confirm('정말로 삭제하시겠습니까?')) {
                    return;
                }
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'attach_idx' : $(this).data('attach-idx')
                };

                var _url = '{{ site_url("/board/{$boardName}/destroyFile/") }}' + getQueryString();

                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });
        });

        //입력값에 따른 조회수 값 리턴
        function SumReadCount() {
            var total_count;
            var real_read_count = Number($('#readCnt').val());
            var read_count = Number($('#setting_readCnt').val());

            if (real_read_count == '0'){ real_read_count = 0; }
            total_count = real_read_count + read_count;
            return total_count;
        }

        //캠퍼스 목록 죄회
        function getAjaxcampusInfo() {
            var _data = {};
            var add_selectBox_options = '';
            var set_site_code = $("#site_code option:selected").val();
            var campus_ccd = '{{$data['CampusCcd']}}';

            var _url = '{{ site_url("/board/{$boardName}/getAjaxCampusInfo/") }}' + set_site_code + getQueryString();
            sendAjax(_url, _data, function(ret) {
                if (ret.ret_cd) {
                    if (Object.keys(ret.ret_data.campus).length > 0) {
                        $.each(ret.ret_data.campus, function(key, val) {
                            var chk = '';
                            if(key == campus_ccd){
                                chk = 'selected="selected"';
                            } else {
                                chk = '';
                            }
                            add_selectBox_options += '<option value="'+key+'" '+chk+'>'+val+'</option>';
                        });
                        $('#campus_ccd').html(add_selectBox_options);
                        $('#campus_ccd').prop('disabled',false);
                    } else {
                        if (ret.ret_data.isCampus == 'N') {
                            $('#campus_ccd').html('<option value="">사용안함</option>');
                            $('#campus_ccd').prop('disabled', true);
                        } else {
                            $('#campus_ccd').html('<option value="">없음</option>');
                            $('#campus_ccd').prop('disabled', true);
                        }
                    }
                }
            }, showError, false, 'GET');
        }

        function addValidate() {
            var site_category_length = $("input[name='site_category[]']").length;
            var site_category_checked_length = $("input[name='site_category[]']:checked").length;

            //카테고리 값이 존재할 경우 온라인으로 간주
            if (site_category_length > 0) {
                if (site_category_checked_length > 0) {
                    return true;
                } else {
                    alert('운영사이트가 온라인일 경우 구분값은 필수 입니다.');
                    return false;
                }
            } else {
                return true;
            }
        }
    </script>
@stop