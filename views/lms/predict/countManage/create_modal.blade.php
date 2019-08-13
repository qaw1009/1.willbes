@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ "카운트 관리" }}
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>

        {!! csrf_field() !!}
        <input type="hidden" name="PredictIdx" id="PredictIdx" value="{{$PredictIdx}}">
        @endsection

        @section('layer_content')
            {!! form_errors() !!}

            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="ContIdx">노출건수</label>
                <div class="col-md-10">
                    <p class="form-control-static"><b>{{number_format($view_total)}}건</b></p>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="ContIdx">실제건수</label>
                <div class="col-md-10  form-inline item">
                    <p class="form-control-static"><b>{{number_format($view_real)}}건</b><BR>
                        {!! $view_real_info !!}<BR></p>
                    <p class="form-control-static"><b><span class="red">* 인증신청자, 채점자 건수에는 가데이터 건수가 포함되어 있음</span></b></p>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="GwName">+생성 <span class="required">*</span></label>
                <div class="col-md-10 form-inline item">
                    <input type="text" id="MakeCount" name="MakeCount"  value="{{ $data['MakeCount'] }}" title="추가생성"  class="form-control" required="required" style="width:80px">
                    * 생성한 숫자는 실제건수에 + 처리되어 노출건수에 반영됩니다.
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="SiteCode">카운트반영조건 </label>
                <div class="col-md-6">
                    <table class="table table-striped table-bordered" >
                        <tr>
                            <th width="80">no</th>
                            <th >항목</th>
                            <th width="100">연계프로모션코드</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>통합프로모션 PV</td>
                            <td><input type="text" name="PageView1" id="PageView1" value="{{$data['PageView1']}}" title="페이지뷰1"  class="form-control"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>소문내기댓글</td>
                            <td><input type="text" name="Comment1" id="Comment1" value="{{$data['Comment1']}}" title="댓글1"  class="form-control"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>적중댓글</td>
                            <td><input type="text" name="Comment2" id="Comment2" value="{{$data['Comment2']}}" title="댓글2"  class="form-control"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>해설강의 PV</td>
                            <td><input type="text" name="PageView2" id="PageView2" value="{{$data['PageView2']}}" title="페이지뷰2"  class="form-control"></td>
                        </tr>
                    </table>
                </div>
            </div>
            @if(empty($data) == false)
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2" for="">등록자 </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2" for="">등록일</label>
                    <div class="col-md-4">
                        <p class="form-control-static"> {{ $data['RegDatm'] }}</p>
                    </div>
                </div>
            @endif
            <script type="text/javascript">
                var $_regi_form = $('#_regi_form');

                $(document).ready(function() {
                    // ajax submit
                    $_regi_form.submit(function() {
                        var _url = '{{ site_url('/predict/countManage/store') }}';
                        ajaxSubmit($_regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                //notifyAlert('success', '알림', ret.ret_msg);
                                alert("저장되었습니다.");
                                var _replace_url = '{{ site_url('/predict/countManage/create/').$PredictIdx}}';
                                replaceModal(_replace_url,'');
                            }
                        }, showValidateError, addValidate, false, 'alert');
                    });

                    function addValidate()
                    {
                        return true;
                    }
                });

            </script>
        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">저장</button>
        @endsection

        @section('layer_footer')
    </form>
@endsection