@extends('lcms.layouts.master_modal')

@section('layer_title')
    공지사항
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" novalidate action="{{ site_url('/crm/sms/storeSend') }}">--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
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
                            {!! html_site_select($event_data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', 'disabled') !!}
                        </div>
                        <label class="control-label col-md-2 col-md-offset-1" for="campus_ccd">캠퍼스<span class="required">*</span></label>
                        <div class="col-md-2 item">
                            <select class="form-control" id="campus_ccd" name="campus_ccd" required="required" disabled="disabled">
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
                                <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/><label for="is_use_y" class="hover mr-5">사용</label>
                                <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="">미사용</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="title">제목<span class="required">*</span></label>
                        <div class="col-md-9 item">
                            <input type="text" id="title" name="title" required="required" class="form-control" maxlength="46" title="제목" value="{{ $data['Title'] }}" disabled="disabled">
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
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="admin_mail_id">조회수</label>
                        <div class="col-md-5 form-inline">
                            실제 <input type="text" id="read_count" name="read_count" class="form-control" title="실제" readonly="readonly" value="{{$data['ReadCnt']}}" style="width: 60px; padding:5px">
                            +
                            생성 <input type="number" id="setting_readCnt" name="setting_readCnt" class="form-control" title="생성" value="{{$data['SettingReadCnt']}}" style="width: 70px; padding:5px">
                            =
                            노출 <input type="text" id="total_read_count" name="total_read_count" class="form-control" title="노출" readonly="readonly" value="" style="width: 70px; padding:5px">
                        </div>
                        <div class="col-md-5">
                            <p class="form-control-static">• 사용자단에 노출되는 조회수는‘실조회수 + 조회수생성’입니다.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- cheditor -->
            <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
            <script src="/public/vendor/cheditor/cheditor.js"></script>
            <script src="/public/js/editor_util.js"></script>
            <script type="text/javascript">
                var $modal_regi_form = $('#modal_regi_form');

                $(document).ready(function() {
                    //editor load
                    var $editor_profile = new cheditor();
                    $editor_profile.config.editorHeight = '170px';
                    $editor_profile.config.editorWidth = '100%';
                    $editor_profile.inputForm = 'board_content';
                    $editor_profile.run();
                });
            </script>
        @stop


@section('add_buttons')
    <button type="submit" class="btn btn-success">등록</button>
    @endsection

    @section('layer_footer')
    </form>
@endsection