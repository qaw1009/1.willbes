@extends('lcms.layouts.master_modal')

@section('layer_title')
    {{$boardInfo[$bm_idx]}}
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="search_modal_form" name="search_modal_form" method="POST" onsubmit="return false;" novalidate>
        <input type="hidden" name="modal_site_code" value="{{$site_code}}">
        {!! csrf_field() !!}
@endsection

@section('layer_content')
    <div class="form-group form-group-sm">
        <ul class="nav nav-tabs">
            @foreach($boardInfo as $key => $val)
                <li class="cs-pointer @if($key == $bm_idx) active @endif"><a data-toggle="tab" href="#board_idx_{{$key}}" class="btn-board-model" data-bm-idx="{{$key}}">{{$val}}</a></li>
            @endforeach
        </ul>
    </div>

     <div class="form-group form-group-sm">

         <div class="form-group">
             <label class="control-label col-md-1" for="search_is_use">조건</label>
             <div class="col-md-11 form-inline">
                 {!! html_site_select('', 'search_modal_site_code', 'search_modal_site_code', 'hide', '운영 사이트', '', '', false, $offLineSite_list) !!}
                 <select class="form-control" id="search_modal_campus_ccd" name="search_modal_campus_ccd">
                     <option value="">캠퍼스</option>
                     @foreach($arr_campus as $row)
                         <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                     @endforeach
                 </select>

                 <select class="form-control" id="search_modal_category" name="search_modal_category">
                     <option value="">구분</option>
                     @foreach($arr_category as $row)
                         <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                     @endforeach
                 </select>

                 <select class="form-control" id="search_modal_subject" name="search_modal_subject">
                     <option value="">과목</option>
                     @foreach($arr_subject as $row)
                         <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                     @endforeach
                 </select>

                 <select class="form-control" id="search_modal_course" name="search_modal_course">
                     <option value="">과정</option>
                     @foreach($arr_course as $row)
                         <option value="{{ $row['CourseIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CourseName'] }}</option>
                     @endforeach
                 </select>

                 <select class="form-control" id="search_modal_professor" name="search_modal_professor">
                     <option value="">교수</option>
                     @foreach($arr_professor as $row)
                         <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                     @endforeach
                 </select>

                 <select class="form-control" id="search_modal_is_use" name="search_modal_is_use">
                     <option value="">사용여부</option>
                     <option value="Y">사용</option>
                     <option value="N">미사용</option>
                 </select>
             </div>
         </div>

        <div class="form-group">
            <label class="control-label col-md-1" for="search_value">제목/내용</label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="search_value" name="search_value">
            </div>
            <label class="control-label col-md-1" for="search_start_date">등록일</label>
            <div class="col-md-5 form-inline">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                    <div class="input-group-addon no-border no-bgcolor">~</div>
                    <div class="input-group-addon no-border-right">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="">
                </div>
            </div>
        </div>

        <div class="x_panel mt-10">
            <div class="x_content">
                <table id="list_ajax_table_model" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>복사</th>
                        <th>NO</th>
                        <th>운영사이트</th>
                        <th>캠퍼스</th>
                        <th>구분</th>
                        <th>과목</th>
                        <th>과정</th>
                        <th>교수명</th>
                        <th>제목</th>
                        <th>등록자</th>
                        <th>등록일</th>
                        <th>HOT</th>
                        <th>사용</th>
                        <th>조회수</th>
                        <th>수정</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        var $search_modal_form = $('#search_modal_form');
        var $datatable_modal;
        var $list_table_modal = $('#list_ajax_table_model');

        $(document).ready(function() {
            // site-code에 매핑되는 select box 자동 변경
            $search_modal_form.find('select[name="search_modal_campus_ccd"]').chained("#search_modal_site_code");
            $search_modal_form.find('select[name="search_modal_category"]').chained("#search_modal_site_code");
            $search_modal_form.find('select[name="search_modal_subject"]').chained("#search_modal_site_code");
            $search_modal_form.find('select[name="search_modal_course"]').chained("#search_modal_site_code");
            $search_modal_form.find('select[name="search_modal_professor"]').chained("#search_modal_site_code");


            $('.btn-board-model').click(function (){
                console.log($(this).data('bm-idx'));
                /*$regi_form.find('input[name="send_type"]').val($(this).data('content-type'));*/
            });
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection