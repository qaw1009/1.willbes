@extends('lcms.layouts.master')

@section('content')
    <h5>- 고객센터 온라인 공지사항 게시판을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/board/{$boardName}/store") }}?bm_idx=45" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $board_idx }}"/>
        <input type="hidden" name="reg_type" value="{{$arr_reg_type['admin']}}"/>
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
                    <label class="control-label col-md-2" for="faq_group_ccd">FAQ구분<span class="required">*</span></label>
                    <div class="col-md-2 item">
                        <select class="form-control" id="faq_group_ccd" name="faq_group_ccd">
                            @foreach($faq_group_ccd as $key => $val)
                                <option value="{{$key}}" @if($key == $data['FaqGroupTypeCcd'])selected="selected"@endif>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="faq_ccd">FAQ분류<span class="required">*</span></label></label>
                   <div class="col-md-2 item">
                        <select class="form-control" id="faq_ccd" name="faq_ccd"></select>
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
                    <label class="control-label col-md-2" for="is_best">BEST</label>
                    <div class="col-md-4 form-inline">
                        <div class="checkbox">
                            <input type="checkbox" id="is_best" name="is_best" value="Y" class="flat" @if($data['IsBest']=='Y')checked="checked"@endif/> <label class="inline-block mr-5 red" for="is_best">BEST</label>
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
    <script src="/public/js/lms/board/common.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 사이트, 캠퍼스
            var set_site_code = $("#site_code option:selected").val();
            var _campus_url = '{{ site_url("/board/{$boardName}/getAjaxCampusInfo/") }}' + set_site_code + getQueryString();
            var campus_ccd = '{{$data['CampusCcd']}}';

            // FAQ
            var set_faq_group_code = $("#faq_group_ccd option:selected").val();
            var _faq_url = '{{ site_url("/board/{$boardName}/getAjaxFaqList/") }}' + set_faq_group_code + getQueryString();
            var faq_ccd = '{{$data['FaqTypeCcd']}}';

            //editor load
            var $editor_profile = new cheditor();
            $editor_profile.config.editorHeight = '170px';
            $editor_profile.config.editorWidth = '100%';
            $editor_profile.inputForm = 'board_content';
            $editor_profile.run();

            /**페이지 로딩시 실행**/
            //캠퍼스목록조회
            getAjaxcampusInfo(_campus_url, campus_ccd);
            getFaqGroup(_faq_url, faq_ccd);
            $('#total_read_count').val(SumReadCount());

            //목록
            $('#btn_list').click(function() {
                location.replace('{{ site_url("/board/{$boardName}") }}/' + getQueryString());
            });

            //운영사이트값에 따른 구분 값 셋팅
            $('#site_code').change(function() {
                var _siteCategory_url = '{{ site_url("/board/{$boardName}/getAjaxSiteCategoryInfo/") }}' + this.value + getQueryString();
                var _campus_url = '{{ site_url("/board/{$boardName}/getAjaxCampusInfo/") }}' + this.value + getQueryString();
                getSiteCategory(_siteCategory_url, _campus_url, campus_ccd);
            });
            $('#site_code').on('change', function() {
                $('input[type="checkbox"].flat').iCheck({
                    checkboxClass: 'icheckbox_flat-blue',
                    radioClass: 'iradio_flat-blue'
                });
            });

            $('#faq_group_ccd').change(function() {
                var _faq_url = '{{ site_url("/board/{$boardName}/getAjaxFaqList/") }}' + this.value + getQueryString();
                getFaqGroup(_faq_url, faq_ccd);
            });
            $('#faq_group_ccd').on('change', function() {
                $('input[type="checkbox"].flat').iCheck({
                    checkboxClass: 'icheckbox_flat-blue',
                    radioClass: 'iradio_flat-blue'
                });
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
        });
    </script>
@stop