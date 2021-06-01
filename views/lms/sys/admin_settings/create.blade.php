@extends('lcms.layouts.master_modal')

@section('layer_title')
    환경설정
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
@endsection

@section('layer_content')
    {!! form_errors() !!}
    <div class="form-group form-group-sm">
        <label class="control-label col-md-3" for="is_sidebar">전체 LNB메뉴 설정
        </label>
        <div class="col-md-8 item form-inline">
            <div class="radio">
                <input type="radio" name="sidebar_size" class="flat" value="md" required="required" title="LNB메뉴 설정" @if($method == 'POST' || (isset($data['sidebar_size']) && $data['sidebar_size']=='md'))checked="checked"@endif/> 펼침
                &nbsp; <input type="radio" name="sidebar_size" class="flat" value="sm" @if(isset($data['sidebar_size']) && $data['sidebar_size']=='sm')checked="checked"@endif/> 숨김
            </div>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-3" for="home_url">Home 설정
        </label>
        <div class="col-md-8 item">
            <input type="text" id="home_url" name="home_url" class="form-control" title="Home 설정" value="{{ $data['home_url'] or '' }}" placeholder="메인 탭 경로 셋팅">
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-3" for="home_url">운영사이트 정렬
            <Br>(드래그앤드랍)
        </label>
        <div class="col-md-8 item">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="width: 25%;">순서</th>
                    <th>사이트정보</th>
                </tr>
                </thead>
                <tbody id="selected_table">
                @foreach($data_site as $row)
                    <tr>
                        <td>
                            <input type="number" id="order_num_{{$row['SiteCode']}}" name="order_num[]" value="{{$row['OrderNum']}}" required="required" readonly="readonly" class="form-control" title="정렬" style="width: 55px;">
                            <input type="hidden" name="site_code[]" value="{{$row['SiteCode']}}">
                        </td>
                        <td>
                            [{{$row['SiteCode']}}] <b>{{$row['SiteName']}}</b>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="/public/vendor/jquery/v.1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#_regi_form');

        $(document).ready(function() {
            // 환경설정 등록
            $regi_form.submit(function() {
                var _url = '{{ site_url('/sys/adminSettings/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            });

            (function(){
                $("#selected_table").sortable({
                    start:function(event,ui){
                    },
                    stop:function(event,ui){
                        reorder();
                    }
                });
            })();

            function reorder() {
                $num = 0;
                $("#selected_table tr").each(function(i) {
                    $("#selected_table").find("input[name='order_num[]']:eq("+i+")").val($num += 1);
                });
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