@extends('lcms.layouts.master')

@section('content')
    <h5>- 응시정보 데이터를 관리하는 메뉴입니다.</h5>
    <h5>
        <li>테이블 정보를 기준으로 데이터산출 진행.</li>
        <li>산출된 데이터는 사용자페이지에 노출됩니다.</li>
        <li>임용시험과목(공통코드)의 '사용여부' 기준으로 사용자페에지 및 데이터 산출 진행.</li>
    </h5>

    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs(element('search_site_code',$arr_input), 'tabs_site_code', 'tab', true, [], false) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline" >
                    <label class="control-label col-md-1" for="search_value">검색</label>
                    <div class="col-md-11">
                        {!! html_site_select(element('search_site_code',$arr_input), 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select name="search_year_target" id="search_year_target" class="form-control mr-10">
                            <option value="">학년도</option>
                            @for($i=(date('Y')+1); $i>=2011; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        &nbsp;
                        <select name="search_subject_ccd" id="search_subject_ccd" class="form-control mr-10">
                            <option value="">과목</option>
                            @foreach($exam_subject_ccd as $key=>$val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select name="search_area_ccd" id="search_area_ccd" class="form-control mr-10">
                            <option value="">지역</option>
                            @foreach($exam_area_ccd as $key=>$val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select name="search_take_type" id="search_take_type" class="form-control mr-10">
                            <option value="">시험구분</option>
                            <option value="1">정시</option>
                            <option value="2">추시</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search">검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <colgroup>
                    <col style="width: 3%;">
                    <col style="width: 11%;">
                    <col style="width: 6%;">
                    <col style="width: 6%;">
                    <col style="width: 10%;">
                    <col style="width: 8%;">
                    <col style="width: 8%;">
                    <col style="width: 8%;">
                    <col style="width: 8%;">
                    <col style="width: 8%;">
                    <col style="width: 5%;">
                    <col style="width: 5%;">
                    <col style="width: auto;">
                    <col style="width: 4%;">
                </colgroup>
                <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">사이트</th>
                    <th class="text-center">학년도</th>
                    <th class="text-center">시험구분</th>
                    <th class="text-center">과목</th>
                    <th class="text-center">지역</th>
                    <th class="text-center">모집인원</th>
                    <th class="text-center">지원인원</th>
                    <th class="text-center">경쟁률</th>
                    <th class="text-center">합격선</th>
                    <th class="text-center">사용여부</th>
                    <th class="text-center">등록자</th>
                    <th class="text-center">등록일</th>
                    <th class="text-center">수정</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    //{ text: '<i class="fa fa-pencil mr-5"></i> 엑셀일괄등록', className: 'btn-sm btn-warning border-radius-reset mr-15 btn-regist_excel'},
                    { text: '<i class="fa fa-pencil mr-5"></i> 응시정보입력', className: 'btn-sm btn-primary border-radius-reset mr-18 btn-regist'},
                    { text: '<i class="fa fa-pencil mr-5"></i> 데이터산출', className: 'btn-sm btn-primary border-radius-reset ml-10 btn-data-setting'},
                ],
                ajax: {
                    'url' : '{{ site_url('/site/examTakeInfo/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta){
                            return row.SiteName; //사이트
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta){
                            return row.YearTarget; //학년도
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta){
                            return row.TakeType === '1' ? '정시' : '<font color="red">추시</font>'; //시험구분
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta){
                            return row.SubjectCcd_Name; //과목
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta){
                            return row.AreaCcd_Name; //지역
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta){
                            return addComma(row.NoticeNumber); //모집인원
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta){
                            return addComma(row.TakeNumber); //지원인원
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta){
                            return parseFloat((row.TakeNumber / row.NoticeNumber).toFixed(2)) + ''; //경쟁률
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta){
                            return row.PassLine; //합격선
                        }},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<font color="red">미사용</font>';
                        }},
                    {'data' : 'RegAdminName', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta){
                            return '<button type="button" class="btn btn-success btn-modify" id="btn_modity" data-idx="'+row.EtiIdx+'">수정</button>'
                        }},
                ]
            });

            $('.btn-regist').setLayer({
                'url' : '{{ site_url('/site/examTakeInfo/create') }}',
                'width' : 900,
                'modal_id' : 'exam_take_create'
            });

            $('.btn-regist_excel').setLayer({
                'url' : '{{ site_url('/site/examTakeInfo/createExcel/') }}',
                'width' : 900,
                'modal_id' : 'exam_take_excel_create'
            })

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                $('.btn-modify').setLayer({
                    'url' : '{{ site_url('/site/examTakeInfo/create') }}/'+ $(this).data('idx'),
                    'width' : 900,
                    'modal_id' : 'exam_take_create'
                });
            });

            $('.btn-data-setting').click(function () {
                if (!confirm('산출하시겠습니까?')) {return;}
                var site_code = ($search_form.find('select[name="search_site_code"]').val() == '') ? '2017' : $search_form.find('select[name="search_site_code"]').val();
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST',
                    'site_code' : site_code
                };

                sendAjax('{{ site_url('/site/examTakeInfo/dataStore') }}/', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showAlertError, false, 'POST');
            });
        });
    </script>
@stop
