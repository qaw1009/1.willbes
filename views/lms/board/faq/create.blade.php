@extends('lcms.layouts.master')

@section('content')
    <h5>- 고객센터 FAQ 게시판을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="bm_idx" value="{{ $bn_idx }}"/>
        <div class="x_panel">
            <div class="x_title">
                <h2>FAQ 게시판</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="">운영사이트<span class="required">*</span></label>
                    <div class="col-md-3 item">
                        <select class="form-control" required="required" id="" name="" title="운영사이트">
                            <option value="">선택</option>
                        </select>
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="">구분<span class="required">*</span></label>
                    <div class="col-md-3 item form-inline">
                        <div class="checkbox">
                            <input type="checkbox" name="" value="" class="flat"/> <label class="inline-block mr-5" for="">전체</label>
                            <input type="checkbox" name="" value="" class="flat"/> <label class="inline-block mr-5" for="">일반경찰</label>
                            <input type="checkbox" name="" value="" class="flat"/> <label class="inline-block mr-5" for="">경찰</label>
                            <input type="checkbox" name="" value="" class="flat"/> <label class="inline-block mr-5" for="">해양경찰</label>
                        </div>
                    </div>
                </div>

                @if($campusOnOff == 'on')
                <div class="form-group">
                    <label class="control-label col-md-2" for="">캠퍼스<span class="required">*</span></label>
                    <div class="col-md-2 item form-control-static">
                        @foreach($campusInfos as $key => $val)
                            <input type="checkbox" id="compus_{{$key}}" name="compus[]" value="{{$key}}" class="flat"/> <label class="inline-block mr-5" for="compus_{{$key}}">{{$val}}</label>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="form-group">
                    <label class="control-label col-md-2" for="">FAQ 구분<span class="required">*</span></label>
                    <div class="col-md-3 item">
                        <select class="form-control" id="" name="">
                            <option value="">구분</option>
                        </select>
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="">FAQ 분류<span class="required">*</span></label>
                    <div class="col-md-3">
                        <select class="form-control" required="required" id="" name="">
                            <option value="">분류</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">BEST</label>
                    <div class="col-md-3 form-control-static">
                        <input type="checkbox" name="" value="" class="flat"/> <label class="inline-block mr-5" for="">BEST</label>
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="">사용<span class="required">*</span></label>
                    <div class="col-md-3 item form-inline">
                        <div class="radio">
                            <input type="radio" id="Is_public_y" name="Is_public" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/><label for="Is_public_y" class="hover mr-5">사용</label>
                            <input type="radio" id="Is_public_n" name="Is_public" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="Is_public_n" class="">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">제목<span class="required">*</span></label>
                    <div class="col-md-9 item">
                        <input type="text" id="" name="" required="required" class="form-control" maxlength="20" title="제목" value="{{ $data['title'] }}" placeholder="제목 입니다.">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">내용<span class="required">*</span></label>
                    <div class="col-md-9">
                        <textarea id="notice_contents" name="notice_contents" class="form-control" rows="7" title="내용" placeholder="">{!! $data['contents'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="attach_img_1">첨부</label>
                    <div class="col-md-9 form-inline">
                        @for($i = 1; $i <= $attach_img_cnt; $i++)
                            <div class="mb-5">
                                <input type="file" id="attach_img{{ $i }}" name="attach_img[]" class="form-control" title="첨부{{ $i }}"/>
                                @if(empty($data{'AttachImgName' . $i}) === false)
                                    <p class="form-control-static ml-30 mr-10">[ <a href="{{ $data['AttachImgPath'] . $data{'AttachImgName' . $i} }}" rel="popup-image">{{ $data{'AttachImgName' . $i} }}</a> ]</p>
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
                        실제 <input type="text" id="real_read_count" name="real_read_count" class="form-control" title="실제" readonly="readonly" value="{{$data['real_read_count']}}" style="width: 60px; padding:5px">
                        +
                        생성 <input type="number" id="read_count" name="read_count" class="form-control" title="생성" value="" style="width: 70px; padding:5px">
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
            $editor_profile.inputForm = 'notice_contents';
            $editor_profile.run();

            $('#read_count').keyup(function() {
                $('#total_read_count').val(SumReadCount());
            });

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/board/{$boardName}/store") }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/board/{$boardName}") }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            $('#btn_list').click(function() {
                location.replace('{{ site_url("/board/{$boardName}") }}' + getQueryString());
            });
        });

        //입력값에 따른 조회수 값 리턴
        function SumReadCount() {
            var total_count;
            var real_read_count = Number($('#real_read_count').val());
            var read_count = Number($('#read_count').val());

            if (real_read_count == '0'){ real_read_count = 0; }
            total_count = real_read_count + read_count;
            return total_count;
        }
    </script>
@stop