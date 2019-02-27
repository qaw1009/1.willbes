@extends('lcms.layouts.master')

@section('content')
    <h5>- 모의고사 이의제기/정오표 게시판을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! html_def_site_tabs($prod_data['SiteCode'], 'tabs_site_code', 'tab', false, [], false, array($prod_data['SiteCode'] => $prod_data['SiteName'])) !!}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        @foreach($input_params as $key => $val)
            <input type="hidden" name="{{$key}}" value="{{$val}}">
        @endforeach

        <div class="x_panel">
            <div class="x_content">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>카테고리</th>
                        <th>모의고사명</th>
                        <th>직렬</th>
                        <th>연도</th>
                        <th>회차</th>
                        <th>접수기간</th>
                        <th>접수상태</th>
                        <th>응시기간</th>
                        <th>사용여부</th>
                        <th>이의제기(미답변수/총건수)</th>
                        <th>정오표</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            {{$prod_data['CateName']}} {!! ($prod_data['IsUseCate'] == 'Y') ? '' : '<span class="red">(미사용)</span>' !!}
                        </td>
                        <td>
                            [{{$prod_data['ProdCode']}}] {{$prod_data['ProdName']}}
                        </td>
                        <td>
                            {!! (empty($prod_data['MockPartName']) === false) ? implode(',', $prod_data['MockPartName']) : '' !!}
                        </td>
                        <td>{{$prod_data['MockYear']}}</td>
                        <td>{{$prod_data['MockRotationNo']}}</td>
                        <td>
                            {{$prod_data['SaleStartDate']}} ~ {{$prod_data['SaleEndDate']}}
                        </td>
                        <td>{{$prod_data['AcceptStatusCcd_Name']}}</td>
                        <td>
                            {{$prod_data['TakeStartDate']}} ~ {{$prod_data['TakeEndDate']}}
                        </td>
                        <td>
                            {!! ($prod_data['IsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>' !!}
                        </td>
                        <td>
                            <a href="#none" class="btn-list-qna" data-idx="{{$prod_data['ProdCode']}}">
                                <u class="blue">{{$prod_data['qnaUnAnsweredCnt']}}/{{$prod_data['qnaTotalCnt']}}</u>
                            </a>
                        </td>
                        <td>
                            <a href="#none" class="btn-list-notice" data-idx="{{$prod_data['ProdCode']}}">
                                <u class="blue">{{$prod_data['noticeCnt']}}</u>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-xs-12 text-right form-inline">
                    <button type="button" class="btn btn-sm btn-primary ml-10 btn-main-list">전체모의고사목록</button>
                </div>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>이의제기</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 item">
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
                                    <p class="form-control-static ml-30 mr-10">[ <a href="{{ $data['arr_attach_file_path'][$i] . $data['arr_attach_file_name'][$i] }}" rel="popup-image">{{ $data['arr_attach_file_real_name'][$i] }}</a> ]
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

            //전체모의고사목록
            $('.btn-main-list').click(function() {
                location.href = '{{ site_url("/board/{$boardName}/mainList") }}/' + getQueryString();
            });

            //이의제기 목록
            $('.btn-list-qna').click(function() {
                location.href='{{ site_url("/board/mocktest/qna/detailList") }}/?bm_idx=95&prod_code=' + $(this).data('idx');
            });

            //정오표 목록
            $('.btn-list-notice').click(function() {
                location.href='{{ site_url("/board/mocktest/notice/detailList") }}/?bm_idx=96&prod_code=' + $(this).data('idx');
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/board/{$boardName}") }}/detailList/' + getQueryString();
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
                        location.replace('{{ site_url("/board/{$boardName}") }}/detailList/' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });
        });

    </script>
@stop