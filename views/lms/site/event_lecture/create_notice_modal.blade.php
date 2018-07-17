@extends('lcms.layouts.master_modal')

@section('layer_title')
    공지사항 등록
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="modal_regi_notice_form" name="modal_regi_notice_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="modal_regi_notice_form" name="modal_regi_notice_form" method="POST" enctype="multipart/form-data" novalidate action="{{ site_url('/crm/sms/storeSend') }}">--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="el_idx" value="{{$el_idx}}">
        <input type="hidden" name="board_idx" value="{{ $board_idx }}"/>
        <input type="hidden" name="reg_type" value="1"/>
        <input type="hidden" name="site_code" value="{{$event_data['SiteCode']}}">
        <input type="hidden" name="campus_ccd" value="{{$event_data['CampusCcd']}}">
        @endsection

        @section('layer_content')
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
                            {!! html_site_select($event_data['SiteCode'], 'temp_site_code', 'temp_site_code', '', '운영 사이트', 'required', 'disabled') !!}
                        </div>
                        <label class="control-label col-md-2 col-md-offset-1" for="campus_ccd">캠퍼스<span class="required">*</span></label>
                        <div class="col-md-2 item">
                            <select class="form-control" id="temp_campus_ccd" name="temp_campus_ccd" required="required" disabled="disabled">
                                <option value="">캠퍼스</option>
                                @php $temp='0'; @endphp
                                @foreach($arr_campus as $row)
                                    <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}" @if($row['CampusCcd'] == $event_data['CampusCcd']) selected="selected" @endif>{{ $row['CampusName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">카테고리정보 <span class="required">*</span>
                        </label>
                        <div class="col-md-9 form-inline">
                            <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                            <span id="selected_category" class="pl-10">
                            @if(isset($event_data['CateCodes']) === true)
                                @foreach($event_data['CateCodes'] as $cate_code => $cate_name)
                                    <span class="pr-10">{{ $cate_name }}
                                        <input type="hidden" name="cate_code[]" value="{{ $cate_code }}"/>
                                    </span>
                                @endforeach
                            @endif
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="title">설명회/특강제목</label>
                        <div class="col-md-9 form-control-static">
                            {{ $event_data['EventName'] }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="is_use_y">사용여부<span class="required">*</span></label>
                        <div class="col-md-3 item form-inline">
                            <div class="radio">
                                <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data_notice['IsUse']=='Y')checked="checked"@endif/><label for="is_use_y" class="hover mr-5">사용</label>
                                <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="">미사용</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="title">제목<span class="required">*</span></label>
                        <div class="col-md-9 item">
                            <input type="text" id="title" name="title" required="required" class="form-control" maxlength="46" title="제목" value="{{ $data_notice['Title'] }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="board_content">내용<span class="required">*</span></label>
                        <div class="col-md-9">
                            <textarea id="board_content" name="board_content" class="form-control" rows="7" title="내용" placeholder="">{!! $data_notice['Content'] !!}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="attach_img_1">첨부</label>
                        <div class="col-md-9 form-inline">
                            @for($i = 0; $i < $attach_file_cnt; $i++)
                                <div class="mb-5">
                                    <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="form-control" title="첨부{{ $i }}"/>

                                    @if(empty($data_notice['arr_attach_file_path'][$i]) === false)
                                        <p class="form-control-static ml-30 mr-10 attach-idx-{{$data_notice['arr_attach_file_idx'][$i]}}">[ <a href="{{ $data_notice['arr_attach_file_path'][$i] . $data_notice['arr_attach_file_name'][$i] }}" rel="popup-image">{{ $data_notice['arr_attach_file_name'][$i] }}</a> ]
                                            <a href="#none" class="notice-file-delete" data-attach-idx="{{$data_notice['arr_attach_file_idx'][$i]}}"><i class="fa fa-times red"></i></a>
                                        </p>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

            <!-- cheditor -->
            <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
            <script src="/public/vendor/cheditor/cheditor.js"></script>
            <script src="/public/js/editor_util.js"></script>
            <script type="text/javascript">
                var $modal_regi_notice_form = $('#modal_regi_notice_form');

                $(document).ready(function() {
                    //editor load
                    var $editor_profile = new cheditor();
                    $editor_profile.config.editorHeight = '170px';
                    $editor_profile.config.editorWidth = '100%';
                    $editor_profile.inputForm = 'board_content';
                    $editor_profile.run();

                    // 파일삭제
                    $('.notice-file-delete').click(function() {
                        var attach_idx = $(this).data('attach-idx');
                        var _url = '{{ site_url("/site/eventLecture/destroyNoticeFile/") }}' + getQueryString();
                        var data = {
                            '{{ csrf_token_name() }}' : $modal_regi_notice_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'DELETE',
                            'attach_idx' : attach_idx
                        };
                        if (!confirm('정말로 삭제하시겠습니까?')) {
                            return;
                        }
                        sendAjax(_url, data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $('.attach-idx-'+attach_idx).remove();
                            }
                        }, showError, false, 'POST');
                    });

                    // ajax submit
                    $modal_regi_notice_form.submit(function() {
                        getEditorBodyContent($editor_profile);
                        var _url = '{{ site_url("/site/eventLecture/storeNotice") }}' + getQueryString();

                        ajaxSubmit($modal_regi_notice_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $('#pop_modal').modal("toggle");    //modal close
                                $datatable_comment.draw();          //comment table draw
                            }
                        }, showValidateError, null, false, 'alert');
                    });
                });
            </script>
        @stop


@section('add_buttons')
    <button type="submit" class="btn btn-success">저장</button>
    @endsection

    @section('layer_footer')
    </form>
@endsection