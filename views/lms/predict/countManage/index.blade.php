@extends('lcms.layouts.master')

@section('content')
    <h5>- 합격예측서비스 프로모션 카운트를 관리합니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                <div class="form-group">
                    <label class="col-md-1 control-label">검색</label>
                    <div class="col-md-5 form-inline">

                        <select name="search_predict" id="search_predict" class="form-control mr-5" style="width:400px;">
                                <!--option value="">합격예측서비스 선택</option//-->
                            @foreach($predict_data as $row)
                                <option value="{{$row["PredictIdx"]}}" class="{{$row["SiteCode"]}}">[{{$row["PredictIdx"]}}] {{$row["ProdName"]}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="button" class="btn btn-primary btn-search" id="btn-search"><i class="fa fa-spin fa-refresh"></i> &nbsp;검 색</button>
                <button type="button" class="btn btn-default" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        var $search_form = $('#search_form');

        $(document).ready(function() {

            $search_form.find('select[name="search_predict"]').chained("#search_site_code");

            $search_form.on('click', '#btn-search', function() {
                if($("select[name=search_predict]").val() == "") {
                    alert("합격예측서비스를 선택 후 검색해 주십시오.");
                    return;
                }
                $('.btn-search').setLayer({
                    'url': '{{site_url('/predict/countManage/create/')}}' + $("select[name=search_predict]").val(),
                    'width': 1100,
                });
            });
        });
    </script>
@stop
