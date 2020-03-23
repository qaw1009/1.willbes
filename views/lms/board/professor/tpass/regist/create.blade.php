@extends('lcms.layouts.master')

@section('content')
    <h5>- 특정 강좌를 구매한 회원들에게 제공하는 학습자료를 관리하는 메뉴입니다. (운영자 패키지만 사용)</h5>
    <h5>- {{$arr_prof_info['ProfNickName']}} 교수 T-pass 자료실</h5>
    {!! form_errors() !!}
    <div class="x_panel">
        <div class="x_content">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>대비학년도</th>
                    <th>패키지유형</th>
                    <th>운영자패키지명</th>
                    <th>판매가</th>
                    <th>판매여부</th>
                    <th>사용여부</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$product_data['SchoolYear']}}</td>
                    <td>{{str_replace('패키지','',$product_data['PackTypeCcd_Name'])}}</td>
                    <td>[{{$product_data['ProdCode']}}] {{$product_data['ProdName']}}</td>
                    <td>
                        {{number_format($product_data['RealSalePrice'])}}원<BR><strike>{{number_format($product_data['SalePrice'])}}원</strike>
                    </td>
                    <td>
                        @if($product_data['SaleStatusCcd_Name'] == '판매불가')
                            <span class="red">{{$product_data['SaleStatusCcd_Name']}}</span>
                        @else
                            {{$product_data['SaleStatusCcd_Name']}}
                        @endif
                    </td>
                    <td>
                        {!! ($product_data['IsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>' !!}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right form-inline">
                <button type="button" class="btn btn-sm btn-primary ml-10 btn-main-list">전체강좌목록</button>
            </div>
        </div>
    </div>
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        @foreach($input_params as $key => $val)
            <input type="hidden" name="{{$key}}" value="{{$val}}">
        @endforeach

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
                    <label class="control-label col-md-1-1" for="title">제목<span class="required">*</span></label>
                    <div class="col-md-10 item">
                        <input type="text" id="title" name="title" required="required" class="form-control" maxlength="46" title="제목" value="{{ $data['Title'] }}" placeholder="제목 입니다.">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="subject_idx">자료유형<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        <select class="form-control" required="required" id="type_ccd" name="type_ccd" title="자료유형">
                            @foreach($arr_type_group_ccd as $key => $val)
                                <option value="{{$key}}" @if($method == 'PUT' && $key == $data['TypeCcd']) selected="selected" @endif>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

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
                    <label class="control-label col-md-1-1" for="board_content">내용<span class="required">*</span></label>
                    <div class="col-md-10">
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

            //전체강좌목록
            $('.btn-main-list').click(function() {
                location.href = '{{ site_url("/board/professor/{$boardName}/productList") }}/' + getQueryString();
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/board/professor/{$boardName}") }}/registForBoard/' + '{!! $prod_code !!}' + getQueryString() + '{!! $boardDefaultQueryString !!}';
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

            // ajax submit
            $regi_form.submit(function() {
                getEditorBodyContent($editor_profile);
                var _url = '{{ site_url("/board/professor/{$boardName}/storeBoardForTpass/{$prod_code}/") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/board/professor/{$boardName}") }}/registForBoard/' + '{!! $prod_code !!}' + getQueryString() + '{!! $boardDefaultQueryString !!}');
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
    </script>
@stop