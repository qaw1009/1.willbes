@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 온라인에서 제공하는 전체 교재의 원천정보를 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>교재 기본정보</h2>
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
                <div class="form-group">
                    <label class="control-label col-md-2" for="book_name">교재명 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <input type="text" id="book_name" name="book_name" required="required" class="form-control" title="교재명" value="{{ $data['wBookName'] }}">
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1">교재코드
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT') {{ $data['wBookIdx'] }} @else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="publ_idx">출판사 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 form-inline item">
                        <select name="publ_idx" id="publ_idx" required="required" class="form-control selectpicker" title="출판사" data-size="10" data-live-search="true">
                            <option value="">출판사</option>
                            @foreach($publishers as $key => $val)
                                <option value="{{ $key }}" @if($key == $data['wPublIdx'])selected="selected"@endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="publ_date">출판일 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="publ_date" name="publ_date" required="required" title="출판일" value="{{ $data['wPublDate'] }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="author_idx1">저자 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline item">
                    @for($i = 1; $i <= 3; $i++)
                        <select name="author_idx[{{ $i-1 }}]" id="author_idx{{ $i }}" class="form-control selectpicker" title="저자{{ $i }}" data-size="10" data-live-search="true" @if($i == 1)required="required"@endif>
                            <option value="">저자{{ $i }}</option>
                            @foreach($authors as $row)
                                <option value="{{ $row['wAuthorIdx'] }}" @if($row['wAuthorIdx'] == element($i-1, $selected_authors))selected="selected"@endif>{{ $row['wAuthorName'] }}</option>
                            @endforeach
                        </select>
                    @endfor
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="isbn">ISBN <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <input type="number" id="isbn" name="isbn" required="required" class="form-control" title="ISBN" value="{{ $data['wIsbn'] }}">
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="page_cnt">페이지 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item form-inline">
                        <input type="number" id="page_cnt" name="page_cnt" required="required" class="form-control" title="페이지" value="{{ $data['wPageCnt'] }}" style="width: 90px"> P
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="edition_ccd">신판여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <div class="radio">
                            @foreach($edition_ccd as $key => $val)
                                <input type="radio" id="edition_ccd_{{ $loop->index }}" name="edition_ccd" class="flat" value="{{ $key }}" @if($key == $data['wEditionCcd'])checked="checked"@endif @if($loop->index == 1)required="required" title="신판여부"@endif/>
                                <label for="edition_ccd_{{ $loop->index }}" class="input-label">{{ $val }}</label>
                            @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="edition_cnt">판/쇄 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <div class="item inline-block mr-20">
                            <input type="number" id="edition_cnt" name="edition_cnt" required="required" class="form-control" title="판" value="{{ $data['wEditionCnt'] }}" style="width: 90px"> 판
                        </div>
                        <div class="item inline-block">
                            <input type="number" id="print_cnt" name="print_cnt" required="required" class="form-control" title="쇄" value="{{ $data['wPrintCnt'] }}" style="width: 90px"> 쇄
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="edition_size">판형
                    </label>
                    <div class="col-md-3 form-inline">
                        <input type="text" id="edition_size" name="edition_size" class="form-control" title="판형" value="{{ $data['wEditionSize'] }}" style="width: 90px"> mm
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="org_price">정가 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item form-inline">
                        <input type="number" id="org_price" name="org_price" required="required" class="form-control" title="정가" value="{{ $data['wOrgPrice'] }}" style="width: 90px"> 원
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="keyword">키워드
                    </label>
                    <div class="col-md-3 item">
                        <input type="text" id="keyword" name="keyword" class="form-control" title="키워드" value="{{ $data['wKeyword'] }}">
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="stock_cnt">재고 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <input type="number" id="stock_cnt" name="stock_cnt" required="required" class="form-control" title="재고" value="{{ $data['wStockCnt'] }}" style="width: 90px">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="sale_ccd">판매여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <div class="radio">
                            @foreach($sale_ccd as $key => $val)
                                <input type="radio" id="sale_ccd_{{ $loop->index }}" name="sale_ccd" class="flat" value="{{ $key }}" @if($key == $data['wSaleCcd'])checked="checked"@endif  @if($loop->index == 1)required="required" title="판매여부"@endif/>
                                <label for="sale_ccd_{{ $loop->index }}" class="input-label">{{ $val }}</label>
                            @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="is_pre_sale">예약판매여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="radio">
                            <input type="radio" id="is_pre_sale_y" name="is_pre_sale" class="flat" value="Y" required="required" title="예약판매여부" @if($data['wIsPreSale'] == 'Y')checked="checked"@endif/> <label for="is_pre_sale_y" class="input-label">Y</label>
                            <input type="radio" id="is_pre_sale_n" name="is_pre_sale" class="flat" value="N" @if($method == 'POST' || $data['wIsPreSale'] == 'N')checked="checked"@endif/> <label for="is_pre_sale_n" class="input-label">N</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="book_desc">교재소개
                    </label>
                    <div class="col-md-9">
                        <textarea id="book_desc" name="book_desc" class="form-control" rows="7" title="교재소개" placeholder="">{{ $data['wBookDesc'] }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="author_desc">저자소개
                    </label>
                    <div class="col-md-9">
                        <textarea id="author_desc" name="author_desc" class="form-control" rows="7" title="저자소개" placeholder="">{{ $data['wAuthorDesc'] }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="table_desc">목차소개
                    </label>
                    <div class="col-md-9">
                        <textarea id="table_desc" name="table_desc" class="form-control" rows="7" title="목차소개" placeholder="">{{ $data['wTableDesc'] }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="">대표영상(유튜브)
                    </label>
                    <div class="col-md-4">
                        @for($i = 1; $i <= $refer_type_cnts['yt_url']; $i++)
                            <input type="text" id="yt_url{{$i}}" name="yt_url[]" class="form-control mb-5" title="대표영상(유튜브){{$i}}" value="{{ array_get($data['wReferStringData'], 'yt_url.' . $i . '.wReferValue') }}">
                        @endfor
                        # 유튜브 경로는 최대 {{ $refer_type_cnts['yt_url'] }}개까지 등록 가능합니다.
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="attach_img">교재 이미지 (280*390, jpg) <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item form-inline">
                        <input type="file" id="attach_img" name="attach_img" @if($method == 'POST')required="required"@endif class="form-control" title="교재 이미지"/>
                        @if(empty($data['wAttachImgName']) === false)
                        <p class="form-control-static ml-30 mr-10"><a href="{{ $data['wAttachImgPath'] . $data['wAttachImgName'] }}" rel="popup-image">{{ $data['wAttachImgName'] }}</a></p>
                        <div class="btn-group">
                            <a href="{{ $data['wAttachImgPath'] . $data['wAttachImgSmName'] }}" rel="popup-image" class="btn btn-sm btn-default" data-toggle="tooltip" data-original-title="Small">S</a>
                            <a href="{{ $data['wAttachImgPath'] . $data['wAttachImgMdName'] }}" rel="popup-image" class="btn btn-sm btn-default" data-toggle="tooltip" data-original-title="Middle">M</a>
                            <a href="{{ $data['wAttachImgPath'] . $data['wAttachImgLgName'] }}" rel="popup-image" class="btn btn-sm btn-default mr-10" data-toggle="tooltip" data-original-title="Large">L</a>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="attach_img_delete" value="Y" class="flat"/> <span class="red">삭제</span></label>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="">미리보기 이미지 (810*1200)
                    </label>
                    <div class="col-md-9 form-inline">
                        @for($i = 1; $i <= $refer_type_cnts['pv_img']; $i++)
                            <input type="file" id="pv_img{{$i}}" name="pv_img[]" class="form-control mb-5" title="미리보기 이미지{{$i}}">
                            @if(empty($data['wReferFileData']['pv_img'][$i]['wReferValue']) === false)
                                <p class="form-control-static">
                                    <a href="{{ $data['wReferFileData']['pv_img'][$i]['wReferValue'] }}" class="pl-30" rel="popup-image">
                                        {{ $data['wReferFileData']['pv_img'][$i]['wReferEtc'] }}
                                    </a>
                                    <a href="#none" class="refer-file-delete" data-refer-type="{{ $data['wReferFileData']['pv_img'][$i]['wReferType'] }}" data-refer-idx="{{ $data['wReferFileData']['pv_img'][$i]['wReferIdx'] }}">
                                        <i class="fa fa-times red"></i>
                                    </a>
                                </p>
                            @endif
                            <br/>
                        @endfor
                        # 미리보기 이미지는 최대 {{ $refer_type_cnts['pv_img'] }}개까지 등록 가능합니다.
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wUpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wUpdDatm'] }}</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
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
            var $editor_book = new cheditor();
            $editor_book.config.editorHeight = '170px';
            $editor_book.config.editorWidth = '100%';
            $editor_book.inputForm = 'book_desc';
            $editor_book.run();

            var $editor_author = new cheditor();
            $editor_author.config.editorHeight = '170px';
            $editor_author.config.editorWidth = '100%';
            $editor_author.inputForm = 'author_desc';
            $editor_author.run();

            var $editor_table = new cheditor();
            $editor_table.config.editorHeight = '170px';
            $editor_table.config.editorWidth = '100%';
            $editor_table.inputForm = 'table_desc';
            $editor_table.run();

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/bms/book/store') }}';

                // editor
                getEditorBodyContent($editor_book);
                getEditorBodyContent($editor_author);
                getEditorBodyContent($editor_table);

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/bms/book/index') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 판매여부 선택
            $regi_form.on('ifChanged', 'input[name="sale_ccd"]:checked', function() {
                var sale_ccd_postfix = $(this).val().substr(-1, 1);
                if (sale_ccd_postfix !== '1') {
                    $regi_form.find('input[name="is_pre_sale"][value="N"]').iCheck('check');
                }
            });

            // 예약판매여부 선택
            $regi_form.on('ifChanged', 'input[name="is_pre_sale"]:checked', function() {
                if ($regi_form.find('input[name="sale_ccd"]:checked').length > 0) {
                    var is_pre_sale = $(this).val();
                    var sale_ccd_postfix = $regi_form.find('input[name="sale_ccd"]:checked').val().substr(-1, 1);
                    if (is_pre_sale === 'Y' && sale_ccd_postfix !== '1') {
                        alert('판매여부가 판매중 일 경우만 예약판매 설정이 가능합니다.');
                    }
                }
            });

            // 참조 첨부파일 삭제
            $regi_form.find('.refer-file-delete').click(function() {
                if (!confirm('정말로 삭제하시겠습니까?')) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'idx' : $regi_form.find('input[name="idx"]').val(),
                    'refer_type' : $(this).data('refer-type'),
                    'refer_idx' : $(this).data('refer-idx'),
                };
                sendAjax('{{ site_url('/bms/book/destroyReferFile') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            $('#btn_list').click(function() {
                location.replace('{{ site_url('/bms/book/index') }}' + getQueryString());
            });
        });
    </script>
@stop
