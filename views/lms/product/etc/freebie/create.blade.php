@extends('lcms.layouts.master_modal')

@section('layer_title')
    사은품 정보
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}

        <input type="hidden" name="ProdTypeCcd" id="ProdTypeCcd" value="{{$prodtypeccd}}"/>     <!--상품타입공통코드//-->
        <input type="hidden" name="ProdCode" id="ProdCode" value="{{$prodcode}}"/>

        @endsection

        @section('layer_content')
            <div class="x_title text-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            {!! form_errors() !!}
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
                </label>
                <div class="col-md-4 item">
                    {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                </div>
                <label class="control-label col-md-2" for="is_use">사용 여부 <span class="required">*</span>
                </label>
                <div class="col-md-4 item">
                    <div class="radio">
                        <input type="radio" id="IsUse_y" name="IsUse" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                        <input type="radio" id="IsUse_n" name="IsUse" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="ProdName">사은품명 <span class="required">*</span>
                </label>
                <div class="col-md-4 item">
                    <input type="text" id="ProdName" name="ProdName" required="required" class="form-control" title="사은품명" value="{{ $data['ProdName'] }}">
                </div>
                <label class="control-label col-md-2" for="">사은품 코드
                </label>
                <div class="col-md-4 form-control-static">
                    @if($method == 'PUT'){{ $data['ProdCode'] }}@else # 등록 시 자동 생성 @endif
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="RefundSetPrice">환불책정가 <span class="required">*</span>
                </label>
                <div class="col-md-4 form-inline">
                    <input type="number" id="RefundSetPrice" name="RefundSetPrice" required="required" class="form-control" style='width:120px;' title="환불책정가" value="{{ $data['RefundSetPrice'] }}"> 원
                </div>
                <label class="control-label col-md-2" for="Stock">재고 <span class="required">*</span>
                </label>
                <div class="col-md-4 form-inline">
                    <input type="number" id="Stock" name="Stock" required="required" class="form-control" style='width:60px;' title="재고" value="{{ $data['Stock'] }}"> 개
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="Content">안내사항
                </label>
                <div class="col-md-10 item">
                    <p class="form-control-static">
                        • 결제 페이지에서 별도 안내할 사항을 입력합니다.
                    </p>
                    <textarea id="Content" name="Content" class="form-control" rows="3" title="안내사항" placeholder="">{{ $data['Content'] }}</textarea>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="Desc">설명
                </label>
                <div class="col-md-10 item">
                    <textarea id="Desc" name="Desc" class="form-control" rows="3" title="설명" placeholder="">{{ $data['Desc'] }}</textarea>
                </div>
            </div>
        @if($method==='PUT')
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">등록자
                </label>
                <div class="col-md-4 form-control-static">
                    {{ $data['RegAdminName'] }}
                </div>
                <label class="control-label col-md-2">등록일
                </label>
                <div class="col-md-4 form-control-static">
                    {{ $data['RegDatm'] }}
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">최종 수정자
                </label>
                <div class="col-md-4 form-control-static">
                    {{ $data['UpdAdminName'] }}
                </div>
                <label class="control-label col-md-2">최종 수정일
                </label>
                <div class="col-md-4 form-control-static">
                    {{ $data['UpdDatm'] }}
                </div>
            </div>
        @endif
            <script type="text/javascript">
                var $regi_form = $('#_regi_form');

                $(document).ready(function() {
                    // 과목 등록
                    $regi_form.submit(function() {
                        var _url = '{{ site_url('/product/etc/freebie/store') }}';

                        ajaxSubmit($regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#pop_modal").modal('toggle');
                                location.replace('{{ site_url('/product/etc/freebie/') }}' + dtParamsToQueryString($datatable));
                            }
                        }, showValidateError, null, false, 'alert');
                    });
                });
            </script>
        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">저장</button>
        @endsection

        @section('layer_footer')
    </form>
@endsection