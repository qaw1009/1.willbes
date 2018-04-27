@extends('lcms.layouts.master_modal')

@section('layer_title')
    SMS 발송
    @stop

    @section('layer_header')
    <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
    @endsection

    @section('layer_content')
        <div class="form-group form-group-sm">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#content_1">개별 발송</a></li>
                <li><a data-toggle="tab" href="#content_2">일괄 발송</a></li>
            </ul>
        </div>

        <div class="form-group form-group-sm">
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-5" for="site_code">운영 사이트 <span class="required">*</span></label>
                        <div class="col-md-7 item">
                            <select class="form-control" id="site_code" name="site_code" required="required" title="운영 사이트">
                                <option value="">사이트선택</option>
                                @foreach($get_site_array as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="cs_tel">발신번호 <span class="required">*</span></label>
                        <div class="col-md-7 item">
                            <input type="text" id="cs_tel" name="cs_tel" required="required" class="form-control" title="발신번호" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="tab-content">
                        <div id="content_1" class="form-group tab-pane fade in active">
                            <h3>HOME</h3>
                            <p>Some content.</p>
                        </div>
                        <div id="content_2" class="form-group tab-pane fade">
                            <h3>Menu 1</h3>
                            <p>Some content in menu 1.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--<div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                 aria-valuemin="0" aria-valuemax="100" style="width:70%">
                <span class="sr-only">70% Complete</span>
            </div>
        </div>--}}


        <script type="text/javascript">
            var $regi_form = $('#modal_regi_form');

            $(document).ready(function() {
                // 카테고리 등록
                $regi_form.submit(function() {
                    var _url = '{{ site_url('/sys/site/store/category') }}';

                    ajaxSubmit($regi_form, _url, function(ret) {
                        if(ret.ret_cd) {
                            notifyAlert('success', '알림', ret.ret_msg);
                            $("#pop_modal").modal('toggle');
                            location.reload();
                        }
                    }, showValidateError, null, false, 'alert');
                });
            });
        </script>
    @stop


    @section('add_buttons')
        <button type="submit" class="btn btn-success">발송</button>
    @endsection

    @section('layer_footer')
    </form>
@endsection