@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ "광고등록" }}
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>

        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="GwIdx" id="GwIdx" value="{{$GwIdx}}">
        @endsection

        @section('layer_content')
            {!! form_errors() !!}

            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="ContIdx">광고계약건 <span class="required">*</span></label>
                <div class="col-md-10">
                    <select class="form-control" id="ContIdx" name="ContIdx" title="광고계약건" required="required">
                        <option value="">광고계약건</option>
                        @foreach($contract_list as $row)
                            <option value="{{$row['ContIdx']}}" @if( $data['ContIdx'] == $row['ContIdx'] )selected="selected"@endif>[{{$row['ContIdx']}}] - {{$row['ContName']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="GwName">광고명 <span class="required">*</span></label>
                <div class="col-md-4">
                    <input type="text" id="GwName" name="GwName"  value="{{ $data['GwName'] }}" title="광고명"  class="form-control" required="required">
                </div>
                <label class="control-label col-md-2" for="GwTypeCcd">광고형태 <span class="required">*</span></label>
                <div class="col-md-4">
                    <select class="form-control" id="GwTypeCcd" name="GwTypeCcd" title="광고형태" required="required">
                        <option value="">광고형태</option>
                        @foreach($adType_ccd as $key => $val)
                        <option value="{{$key}}"  @if( $data['GwTypeCcd'] == $key )selected="selected"@endif>{{$val}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="SiteCode">접속사이트 <span class="required">*</span></label>
                <div class="col-md-4">
                    {!! html_site_select($data['SiteCode'], 'SiteCode', 'SiteCode', '', '접속사이트', 'required', '') !!}
                </div>
                <label class="control-label col-md-2" for="ExecutePrice">개별집행금액 <span class="required">*</span></label>
                <div class="col-md-4 form-inline item" >
                    <input type="number" id="ExecutePrice" name="ExecutePrice"  value="{{ $data['ExecutePrice'] }}" title="개별집행금액"  class="form-control" required="required">원
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="MoveUrl">이동URL <span class="required">*</span></label>
                <div class="col-md-10 form-inline item">
                    <input type="text" id="MoveUrl" name="MoveUrl"  value="{{ $data['MoveUrl'] }}" title="이동URL"  class="form-control" required="required" style="width:450px;">
                    &nbsp;&nbsp;(해당광고를 통해 이동 해야 할 URL)
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="TargetLocation">광고위치</label>
                <div class="col-md-10 form-inline item">
                    <input type="text" id="TargetLocation" name="TargetLocation"  value="{{ $data['TargetLocation'] }}" title="광고위치"  class="form-control"  style="width:450px;">
                    &nbsp;&nbsp;(해당 광고가 노출된 URL)
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="">광고코멘트 </label>
                <div class="col-md-6">
                    <textarea name="Content" title="코멘트" class="form-control" id="Content" placeholder="" rows="3" cols="100">{{$data['Content']}}</textarea>
                </div>
            </div>
            @if($method==="PUT")
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2 red"><B>광고 URL 생성</B></label>
                    <div class="col-md-10 red">
                        <p class="form-control-static"><B>https://{{$data['SiteUrl']}}/access/gate/{{$data['GwIdx']}}</B></p>
                    </div>
                </div>
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
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2">최종수정자</label>
                    <div class="col-md-4">
                        <p class="form-control-static"> {{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종수정일</label>
                    <div class="col-md-4">
                        <p class="form-control-static"> {{ $data['UpdDatm'] }}</p>
                    </div>
                </div>
            @endif
            <script type="text/javascript">
                var $_regi_form = $('#_regi_form');

                $(document).ready(function() {
                    // ajax submit
                    $_regi_form.submit(function() {
                        var _url = '{{ site_url('/site/marketing/gateway/store') }}';
                        ajaxSubmit($_regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#cert_create").modal('toggle');
                                location.replace('{{ site_url('/site/marketing/gateway/') }}' + dtParamsToQueryString($datatable));
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