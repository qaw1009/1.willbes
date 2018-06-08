@extends('lcms.layouts.master')

@section('content')
    <h5>- 회원이 작성한 수강후기를 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="read_form" name="read_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_title">
                <h2>수강후기관리 정보</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="">운영사이트</label>
                    <div class="form-control-static col-md-2">
                        {{$data['SiteName']}}
                    </div>
                    <label class="control-label col-md-2" for="">구분</label>
                    <div class="form-control-static col-md-5">
                        {{$data['CateName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">과목명</label>
                    <div class="form-control-static col-md-2">
                        {{$data['SubjectName']}}
                    </div>
                    <label class="control-label col-md-2" for="">교수명</label>
                    <div class="form-control-static col-md-2">
                        {{$data['wProfName_String']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">강좌명</label>
                    <div class="form-control-static col-md-2">
                        {{$data['ProdName']}}
                    </div>
                </div>
                {{--<div class="ln_solid"></div>
                <div class="form-group text-center">
                    <button type="button" class="pull-right btn btn-primary" id="btn_list">목록</button>
                </div>--}}
            </div>
        </div>
    </form>

    <div class="x_panel">
        <div class="x_title">
            <div class="clearfix"></div>
        </div>

    </div>


    <script type="text/javascript">
        var $read_form = $('#read_form');

        $(document).ready(function() {



            // 목록 버튼 클릭
            $('#btn_list').click(function() {
                location.replace('{{ site_url("/board/{$boardName}") }}' + getQueryString());
            });
        });
    </script>
@stop