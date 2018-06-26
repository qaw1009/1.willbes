@extends('lcms.layouts.master_popup')
@section('popup_title')
    회원이름변경
@stop

@section('popup_header')
    <form class="form-horizontal" id="chg_form" name="chg_form" method="POST" enctype="multipart/form-data" onsubmit="return false;">
        <input type="hidden" name="memIdx" value="{{$data['MemIdx']}}" />
        {!! csrf_field() !!}
        @endsection

        @section('popup_content')
            {!! form_errors() !!}
            @include('lms.member.log.infonav')
            <div class="x_panel">
                <div class="x_title">
                    <h5>- 회원이름 변경처리</h5>
                    <div class="pull-right">
                        <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="chg_name">변경이름 <span class="required">*</span></label>
                        <div class="col-md-3 item">
                            <input type="text" id="chg_name" name="chg_name" required="required" class="form-control" title="권한유형명" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="chg_reason">변경사유 <span class="required">*</span></label>
                        <div class="col-md-9 item">
                            <input type="text" id="chg_reason" name="chg_reason" required="required" class="form-control" title="권한유형명" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="chg_file">증빙자료</label>
                        <div class="col-md-9 item">
                            <input type="file" id="attach_file" name="attach_file[]" class="form-control" title="첨부"/>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success mr-10">변경</button>
                    </div>
                </div>
            </div>
            <div class="x_panel mt-10">
                <div class="x_content">
                    <table id="list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>변경이름</th>
                            <th>변경사유</th>
                            <th>증빙자료</th>
                            <th>변경일</th>
                            <th>변경자</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cdata as $row)
                            <tr>
                                <td>{{ $loop->index }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script type="text/javascript">
                var $datatable;
                var $list_table = $('#list_ajax_table');

                $(document).ready(function() {
                    $datatable = $list_table.DataTable({
                        ajax: false,
                        paging: false,
                        searching: false
                    });

                    // ajax submit
                    $chg_form.submit(function() {
                        var _url = '{{ site_url("/member/manage/chgname") }}' + getQueryString();

                        ajaxSubmit($chg_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                location.replace('{{ site_url("/member/manage/chgname/{$data['MemIdx']}") }}/' + getQueryString());
                            }
                        }, showValidateError, addValidate, false, 'alert');
                    });
                });
            </script>
        @stop

        @section('add_buttons')

        @endsection

        @section('layer_footer')
    </form>
@endsection