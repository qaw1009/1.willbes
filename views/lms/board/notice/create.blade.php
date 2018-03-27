@extends('lcms.layouts.master')

@section('content')
    <h5>- 고객센터 온라인 공지사항 게시판을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="bm_idx" value="{{ $bn_idx }}"/>
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
                        <select class="form-control" required="required" id="site_code" name="" title="운영사이트" {{--onchange="javascript:selSiteCode(this.value);"--}}>
                            {{--<option value="">선택</option>--}}
                            @foreach($getSiteArray as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="site_cate_ccd">구분<span class="required">*</span></label>
                    <div class="col-md-3 item form-inline">
                        <div class="checkbox" id="site_cate_ccd">
                            <input type="checkbox" id="site_cate_ccd_all" value="all" class="flat"/> <label class="inline-block mr-5" for="site_cate_ccd_all">전체</label>
                            @foreach($getCategoryArray as $key => $val)
                                <input type="checkbox" id="site_cate_ccd_{{$key}}" name="site_cate_ccd[]" value="{{$key}}" class="flat"/><label class="inline-block mr-5" for="site_cate_ccd_{{$key}}">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="campus_ccd">캠퍼스</label>
                    <div class="col-md-2">
                        <select class="form-control" id="campus_ccd" name="campus_ccd">
                        </select>
                    </div>
                    <label class="control-label col-md-2 col-lg-offset-1" for="">분류</label>
                    <div class="col-md-2">
                        <select class="form-control" id="" name="">
                            <option value="">구분</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="title">제목<span class="required">*</span></label>
                    <div class="col-md-9 item">
                        <input type="text" id="title" name="title" required="required" class="form-control" maxlength="20" title="제목" value="{{ $data['title'] }}" placeholder="제목 입니다.">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_best">HOT</label>
                    <div class="col-md-4 form-inline">
                        <div class="checkbox">
                            <input type="checkbox" id="is_best" name="is_best" value="is_best" class="flat"/> <label class="inline-block mr-5 red" for="is_best">HOT</label>
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
                        <textarea id="board_content" name="board_content" class="form-control" rows="7" title="내용" placeholder="">{!! $data['contents'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="attach_img_1">첨부</label>
                    <div class="col-md-9 form-inline">
                        @for($i = 1; $i <= $attach_file_cnt; $i++)
                            <div class="mb-5">
                                <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="form-control" title="첨부{{ $i }}"/>
                                @if(empty($data{'AttachFileName' . $i}) === false)
                                    <p class="form-control-static ml-30 mr-10">[ <a href="{{ $data['AttachFilePath'] . $data{'AttachFileName' . $i} }}" rel="popup-image">{{ $data{'AttachFileName' . $i} }}</a> ]</p>
                                    <div class="checkbox">
                                        <input type="checkbox" name="" value="{{ $i }}" class="flat"/> <span class="red">삭제</span>
                                    </div>
                                @endif
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
            var compusInfo = getAjaxCompusInfo();

            $('#setting_readCnt').keyup(function() {
                $('#total_read_count').val(SumReadCount());
            });

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/board/{$boardName}/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/board/{$boardName}") }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            $('#btn_list').click(function() {
                location.replace('{{ site_url("/board/{$boardName}") }}' + getQueryString());
            });

            //운영사이트값에 따른 구분 값 셋팅
            $('#site_code').change(function() {
                var _data = {};
                var add_checkBox = '';
                var _url = '{{ site_url("/board/{$boardName}/getAjaxSiteCategoryInfo/") }}' + this.value + getQueryString();
                sendAjax(_url, _data, function(ret) {
                    if (ret.ret_cd) {
                        if (Object.keys(ret.ret_data.catagory).length > 0) {
                            add_checkBox += '<input type="checkbox" id="site_cate_ccd_all" value="all" class="flat"/> <label class="inline-block mr-5" for="site_cate_ccd_all">전체</label>';
                            $.each(ret.ret_data.catagory, function(key, val) {
                                add_checkBox += '<input type="checkbox" id="site_cate_ccd_'+key+'" name="site_cate_ccd[]" value="'+key+'" class="flat"/> <label class="inline-block mr-5" for="site_cate_ccd_'+key+'">'+val+'</label>';
                            });
                            $('#site_cate_ccd').html(add_checkBox);
                        } else {
                            $('#site_cate_ccd').html(add_checkBox);
                        }
                    }
                    getAjaxCompusInfo();
                }, showError, false, 'GET');
            });

            $('#site_code').on('change', function() {
                $('input[type="checkbox"].flat').iCheck({
                    checkboxClass: 'icheckbox_flat-blue',
                    radioClass: 'iradio_flat-blue'
                });
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
        function getAjaxCompusInfo() {
            var _data = {};
            var add_selectBox_options = '';
            var set_site_code = $("#site_code option:selected").val();

            var _url = '{{ site_url("/board/{$boardName}/getAjaxCompusInfo/") }}' + set_site_code + getQueryString();
            sendAjax(_url, _data, function(ret) {
                if (ret.ret_cd) {
                    if (Object.keys(ret.ret_data.compus).length > 0) {
                        $.each(ret.ret_data.compus, function(key, val) {
                            add_selectBox_options += '<option value="'+key+'">'+val+'</option>';
                        });
                        $('#campus_ccd').html(add_selectBox_options);
                        $('#campus_ccd').prop('disabled',false);
                    } else {
                        $('#campus_ccd').html('<option value="">사용안함</option>');
                        $('#campus_ccd').prop('disabled',true);
                    }
                }
            }, showError, false, 'GET');
        }

        function addValidate() {
            var site_cate_ccd_length = $("input[name='site_cate_ccd[]']").length;
            var site_cate_ccd_checked_length = $("input[name='site_cate_ccd[]']:checked").length;

            //카테고리 값이 존재할 경우 온라인으로 간주
            if (site_cate_ccd_length > 0) {
                if (site_cate_ccd_checked_length > 0) {
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