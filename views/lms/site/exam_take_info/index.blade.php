@extends('lcms.layouts.master')

@section('content')
    <h5>- 응시정보 데이터를 관리하는 메뉴입니다.</h5>
    <h5>
        <li>추시과목설정 : 기준년도를 기준으로 추가 시험이 있는 과목 설정 (2019 유아과목)</li>
        <li>기준년도 : 데이터산출 시 기준년도를 기준으로 증감,경쟁률 계산 </li>
        <li>데이터 산출 : 산출된 데이터를 기준으로 사용자페이지에 노출</li>
        <li>임용시험과목(공통코드)의 '사용여부' 기준으로 사용자페에지 및 데이터 산출 진행.</li>
        <li>데이터 산출 순서 : 응시정보입력 -> 추시과목설정 -> 데이터산출 -> 사용자페이지 노출</li>
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
            <div class="form-group form-inline">
                <div class="col-md-12 text-right mb-5">
                    기준년도 : <input type="text" class="form-control" style="width: 50px;" id="target_year" name="기준년도" value="{{key($target_year_ccd)}}">
                </div>
            </div>
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <colgroup>
                    <col style="width: 5%;">
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
                    <th class="valign-middle">선택<input type="checkbox" class="flat" id="all_check"/></th>
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
                    //{ text: '<i class="fa fa-pencil mr-5"></i> 엑셀일괄등록', className: 'btn-sm btn-warning border-radius-reset mr-15 btn-regist-excel'},
                    { text: '<i class="fa fa-pencil"></i> 추시과목설정', className: 'btn-sm btn-primary border-radius-reset mr-10 btn-modify-subject-ccd'},
                    { text: '<i class="fa fa-pencil"></i> 응시정보입력', className: 'btn-sm btn-primary border-radius-reset mr-10 btn-regist'},
                    { text: '<i class="fa fa-pencil"></i> 데이터산출', className: 'btn-sm btn-primary border-radius-reset mr-20 btn-data-setting'},
                    { text: '<i class="fa fa-pencil"></i> 사용/미사용처리', className: 'btn-sm btn-danger border-radius-reset btn-modify-is-use'},
                ],
                ajax: {
                    'url' : '{{ site_url('/site/examTakeInfo/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" class="flat" name="is_use" value="Y" data-is-use-idx="'+ row.EtiIdx +'" data-origin-is-use="' + data + '" ' + ((data === 'Y') ? ' checked="checked"' : '') + '>';
                        }},
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

            $list_table.on('ifChanged', '#all_check', function() {
                iCheckAll($list_table.find('input[name="is_use"]'), $(this));
            });

            //사용/미사용 처리
            $('.btn-modify-is-use').on('click', function() {
                if (!confirm('사용/미사용 상태를 적용하시겠습니까?')) {
                    return;
                }

                var $is_use = $list_table.find('input[name="is_use"]');
                var origin_val, this_val, this_use_val;
                var $params = {};
                var _url = '{{ site_url('/site/examTakeInfo/storeIsUses') }}';

                $is_use.each(function(idx) {
                    // 신규 또는 추천 값이 변하는 경우에만 파라미터 설정
                    this_use_val = $is_use.eq(idx).filter(':checked').val() || 'N';
                    this_val = this_use_val;
                    origin_val = $is_use.eq(idx).data('origin-is-use');
                    if (this_val != origin_val) {
                        $params[$(this).data('is-use-idx')] = { 'IsUse' : this_use_val };
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };

                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            $('.btn-regist').setLayer({
                'url' : '{{ site_url('/site/examTakeInfo/create') }}',
                'width' : 900,
                'modal_id' : 'exam_take_create'
            });

            $('.btn-modify-subject-ccd').setLayer({
                'url' : '{{ site_url('/site/examTakeInfo/modifySubjectCcd') }}',
                'width' : 900,
                'modal_id' : 'pop_modal'
            });

            $('.btn-regist-excel').setLayer({
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
                var target_year = $("#target_year").val();
                if (target_year == '') {
                    alert('기준년도를 입력해주세요.');
                    $('#target_year').focus();
                    return false;
                }
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST',
                    'site_code' : site_code,
                    'target_year' : target_year
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
