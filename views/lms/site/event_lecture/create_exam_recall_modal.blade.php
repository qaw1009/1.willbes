@extends('lcms.layouts.master_modal')

@section('layer_title')
    공지사항 등록
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="modal_regi_recall_form" name="modal_regi_recall_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" name="promotion_code" value="{{$promotion_code}}">
        <input type="hidden" name="recall_question_idx" value="{{$data['RecallQuestionIdx']}}">
        @endsection

        @section('layer_content')
            <div class="x_panel">
                <div class="x_content">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="title_use_count">문항수</label>
                        <div class="col-md-2">
                            <input type="text" id="title_use_count" name="title_use_count" class="form-control" maxlength="2" title="제목" value="{{ $data['TitleUseCount'] }}">
                        </div>
                        <div class="col-md-5">
                            <p class="form-control-static">• 문항수는 10개까지 입력 가능합니다.</p>
                        </div>
                    </div>

                    @for($i=1; $i<=10; $i++)
                        <div class="group-content">
                            <div class="form-group">
                                <label class="control-label col-md-2" for="title{{$i}}">문항 {{$i}}</label>
                                <div class="col-md-8">
                                    <input type="text" id="title{{$i}}" name="title[]" class="form-control" title="문항 {{$i}}" value="{{ $data['Title_'.$i] }}">
                                </div>
                                <div class="col-md-2 form-inline">
                                    <div class="checkbox">
                                        <input type="checkbox" class="flat" id="is_required_{{$i}}" name="is_required[{{$i-1}}]"
                                               value="Y" {{ (explode(',',$data['IsRequired'])[$i-1] == 'Y' ? 'checked="checked"' : '') }}>
                                        <label for="is_required_{{$i}}">필수여부</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="placeholder{{$i}}">placeholder {{$i}}</label>
                                <div class="col-md-9">
                                    <input type="text" id="placeholder{{$i}}" name="placeholder[]" class="form-control" title="placeholder {{$i}}" value="{{ $data['PlaceHolder_'.$i] }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">&nbsp;</div>
                    @endfor
                </div>
            </div>

            <script type="text/javascript">
                var $modal_regi_recall_form = $('#modal_regi_recall_form');

                $(document).ready(function() {
                    // ajax submit
                    $modal_regi_recall_form.submit(function() {
                        if ($("#title_use_count").val() > 11) {
                            alert('문항수는 최대 10개 입니다.');
                            return false;
                        }
                        if (!confirm('등록하시겠습니까?')) { return; }
                        var _url = '{{ site_url("/site/eventLecture/storeExamRecall") }}';
                        ajaxSubmit($modal_regi_recall_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                location.reload();
                            }
                        }, showValidateError, null, false, 'alert');
                    });

                    $('#btn_exam_recall_delete').click(function() {
                        var _url = '{{ site_url("/site/eventLecture/deleteExamRecall/") }}';
                        var data = {
                            '{{ csrf_token_name() }}' : $modal_regi_recall_form.find('input[name="{{ csrf_token_name() }}"]').val()
                            ,'promotion_code' : $modal_regi_recall_form.find('input[name="promotion_code"]').val()
                            ,'recall_question_idx' : $modal_regi_recall_form.find('input[name="recall_question_idx"]').val()
                            ,'_method' : 'DELETE'
                        };

                        if (!confirm('삭제하시겠습니까?')) {
                            return;
                        }
                        sendAjax(_url, data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                location.reload();
                            }
                        }, showError, false, 'POST');
                    });
                });
            </script>
        @stop


        @section('add_buttons')
            <button type="button" class="pull-left btn btn-danger" id="btn_exam_recall_delete">삭제</button>
            <button type="submit" class="btn btn-success">저장</button>
        @endsection

        @section('layer_footer')
    </form>
@endsection