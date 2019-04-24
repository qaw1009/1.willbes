@extends('lcms.layouts.master')

@section('content')
    <h5>- 합격예측서비스 공지사항을 등록/관리 하는 메뉴입니다.</h5>
    {!! form_errors() !!}

    <div class="x_panel">
        <div class="x_content">
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $pst_idx }}"/>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">제목</label>
                    <div class="col-md-5 item">
                        <input type="text" id="title" name="title" required="required" class="form-control" maxlength="46" title="제목" value="{{ $data['Title'] }}" placeholder="제목 입니다.">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">내용등록방식</label>
                    <div class="col-md-5 item">
                        <input type="radio" id="content_type_1" name="content_type" class="flat" value="1" @if($method == 'PUT' && $data['ContentType'] == 1) checked="checked" @endif> <label for="content_type_1" class="input-label">텍스트</label>
                        <input type="radio" id="content_type_2" name="content_type" class="flat" value="2" @if($method == 'PUT' && $data['ContentType'] == 2) checked="checked" @endif> <label for="content_type_2" class="input-label">엑셀파일</label>
                    </div>
                </div>
                <div class="form-group content_type" id="type_1">
                    <label class="control-label col-md-1-1" for="">TEXT
                        <button type="button" class="btn btn-sm btn-info btn-add-content">추가</button>
                    </label>
                    <div class="col-md-6" id="text_content">
                        @if($method == 'PUT' && $data['ContentType'] == 1 || (empty($arr_content) === false))
                            @foreach($arr_content as $keys => $row)
                                <tr>
                                    @foreach($row as $key => $val)
                                        <td><input type="text" name="content[]" class="form-control mt-5" value="{{ $val }}"></td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @else
                            <input type="text" name="content[]" class="form-control" title="내용" placeholder="내용 입니다.">
                        @endif
                    </div>
                </div>
                <div class="form-group content_type" id="type_2">
                    <label class="control-label col-md-1-1" for="">엑셀</label>
                    <div class="col-md-5">
                        <input type="file" id="content_excel" name="content_excel" class="form-control input-file">
                        @if(empty($data['ExcelFileRealName']) === false)
                            <p class="form-control-static">
                                [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['ExcelFileFullPath'])}}" data-file-name="{{ urlencode($data['ExcelFileRealName']) }}" target="_blank">
                                    {{ $data['ExcelFileRealName'] }}
                                </a> ]
                            </p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">배경이미지</label>
                    <div class="col-md-5">
                        <input type="file" id="attach_file" name="attach_file" class="form-control input-file">
                        @if(empty($data['AttachFileRealName']) === false)
                            <p class="form-control-static">
                                [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['AttachFileFullPath'])}}" data-file-name="{{ urlencode($data['AttachFileRealName']) }}" target="_blank">
                                    {{ $data['AttachFileRealName'] }}
                                </a> ]
                            </p>
                        @endif
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-10">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary btn_list" type="button">목록</button>
                </div>
            </form>
        </div>
    </div>

    @if(empty($arr_content) === false)
        <div class="x_panel">
            <form class="form-horizontal form-label-left" id="regi_table_form" name="regi_table_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $pst_idx }}"/>
                <input type="hidden" name="params_cnt" value="{{ (empty($arr_content) === false) ? count($arr_content) : '0' }}"/>

                <div class="x_content">
                    <table id="list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            @foreach($arr_content[0] as $key)
                                <th>data{{$loop->index}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($arr_content as $keys => $row)
                                <tr>
                                    @foreach($row as $key => $val)
                                        <td><input type="text" name="params{{ $keys }}[]" class="form-control" value="{{ $val }}"></td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row text-center btn-wrap mt-10">
                    <button type="submit" class="btn btn-success mr-10">수정</button>
                    <button class="btn btn-primary btn_list" type="button">목록</button>
                </div>
            </form>
        </div>
    @endif

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $datatable;
        var $list_table = $('#list_ajax_table');
        var $regi_table_form = $('#regi_table_form');

        $(document).ready(function() {
            $('.content_type').hide();

            $regi_form.on('ifChanged ifCreated', 'input[name="content_type"]:checked', function() {
                if ($(this).val() == '1') {
                    $('#type_1').show();
                    $('#type_2').hide();
                } else {
                    $('#type_1').hide();
                    $('#type_2').show();
                }
            });

            $regi_form.on('click', '.btn-add-content', function() {
                var temp_input = '<input type="text" name="content[]" class="form-control mt-5" title="내용" placeholder="내용 입니다.">';
                $('#text_content').append(temp_input);
            });

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/predict/subTitles/store") }}' + getQueryString();
                if (!confirm('등록하시겠습니까?')) { return; }
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/predict/subTitles/") }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            $regi_table_form.submit(function() {
                var _url = '{{ site_url("/predict/subTitles/storeDetail") }}' + getQueryString();
                if (!confirm('데이터 양이 많을 경우 일부 누락된 상태로 수정 될 수 있습니다.\n수정하시겠습니까?')) { return; }
                ajaxSubmit($regi_table_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            });
        });

        //목록
        $('.btn_list').click(function() {
            location.href='{{ site_url("/predict/subTitles") }}/' + getQueryString();
        });

        function addValidate()
        {
            var content_type = $(":input:radio[name=content_type]:checked").val();
            if (content_type == '' || content_type == undefined) {
                alert('내용등록방식을 선택해 주세요');
                return false;
            }

            return true;
        }

        $('.file-download').click(function() {
            var _url = '{{ site_url("/predict/subTitles/download") }}/' + getQueryString() + '&path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
            window.open(_url, '_blank');
        });
    </script>
@stop