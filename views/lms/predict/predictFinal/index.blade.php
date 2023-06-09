@extends('lcms.layouts.master')

@section('content')
    <h5>- 합격예측서비스 최종합격자 신청현황을 확인할 수 있습니다.</h5>
    <div class="x_panel mt-10 mb-0">
        <form class="form-horizontal" id="invoice_form" name="invoice_form" method="POST" onsubmit="return false;">
            {!! csrf_field() !!}
            <div class="x_title">
                <div class="clearfix"></div>
                <ul class="nav navbar-left panel_toolbox">
                    <li><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#addBox_cert_data" aria-expanded="false" aria-controls="addBox_cert_data">합격자 인증번호 등록</button></li>
                    <li><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#addBox_final_data" aria-expanded="false" aria-controls="addBox_final_data">가데이터 등록</button></li>
                    <li><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#addBox_successful_data" aria-expanded="false" aria-controls="addBox_successful_data">최종합격자수 등록/현황</button></li>
                </ul>
            </div>
            <div class="x_content collapse multi-collapse" id="addBox_cert_data">
                <div class="col-md-11 form-inline">
                    <input type="text" name="exam_cert_idx" id="exam_cert_idx" class="form-control" style="width:100px;" title="수강인증코드" placeholder="수강인증코드">
                    <input type="text" name="exam_name" id="exam_name" class="form-control" style="width:100px;" title="제목" placeholder="경찰 2020년 1회">
                    <input type="text" name="exam_cen_code" id="exam_cen_code" class="form-control" style="width:100px;" title="police_2020_1" placeholder="police_2020_1">
                    <input type="file" id="exam_attach_file" name="exam_attach_file" class="form-control" title="엑셀파일" value="">
                    <button type="button" class="btn btn-primary btn-sm mb-0 ml-10 mr-10 btn-excel-cert-upload">엑셀 업로드</button>
                    <button type="button" class="btn btn-success btn-sm mb-0 btn-excel-cert-download">샘플엑셀 다운로드</button>
                </div>
                <div class="col-md-11 form-inline mt-5">
                    <span>합격자인증번호 일괄삭제 : </span>
                    <input type="text" name="del_cert_exam_idx" id="del_cert_exam_idx" class="form-control" style="width:100px;" title="수강인증코드" placeholder="수강인증코드">
                    <button type="button" class="btn btn-danger btn-sm mb-0 ml-10 mr-10 btn-cert-exam-delete">삭제</button>
                </div>
            </div>
            <div class="x_content collapse multi-collapse" id="addBox_final_data">
                <div class="col-md-11 form-inline">
                    <select class="form-control mr-5" id="predict_idx" name="predict_idx">
                        @foreach($predictList as $row)
                            <option value="{{$row['PredictIdx']}}" class="{{$row['SiteCode']}}">[{{$row['PredictIdx']}}] {{$row['ProdName']}}</option>
                        @endforeach
                    </select>
                    <select class="form-control mr-5" id="take_mock_part" name="take_mock_part">
                        <option value="">응시직렬</option>
                        @foreach($arr_take_mock_part_list as $row)
                            <option class="{{$row['PredictIdx']}}" value="{{$row['TakeMockPart']}}">{{$row['CcdName']}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="cert_idx" id="cert_idx" class="form-control" style="width:100px;" title="수강인증코드" placeholder="수강인증코드">
                    <input type="file" id="attach_file" name="attach_file" class="form-control" title="엑셀파일" value="">
                    <button type="button" class="btn btn-primary btn-sm mb-0 ml-10 mr-10 btn-excel-upload">엑셀 업로드</button>
                    <button type="button" class="btn btn-success btn-sm mb-0 btn-excel-download">직렬별 샘플엑셀 다운로드</button>
                </div>
            </div>
            <div class="x_content collapse multi-collapse" id="addBox_successful_data">
                <div class="col-md-11 form-inline">
                    <select class="form-control mr-5" id="predict_idx_successful" name="predict_idx_successful">
                        @foreach($predictList as $row)
                            <option value="{{$row['PredictIdx']}}" class="{{$row['SiteCode']}}">[{{$row['PredictIdx']}}] {{$row['ProdName']}}</option>
                        @endforeach
                    </select>
                    <input type="file" id="attach_file_successful" name="attach_file_successful" class="form-control" title="엑셀파일" value="">
                    <button type="button" class="btn btn-primary btn-sm mb-0 ml-10 mr-10 btn-excel-upload-successful">엑셀 업로드</button>
                    <button type="button" class="btn btn-success btn-sm mb-0 btn-excel-download-successful">샘플엑셀 다운로드</button>
                </div>
            </div>
        </form>
    </div>

    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-5" id="search_PredictIdx" name="search_PredictIdx">
                            @foreach($predictList as $row)
                                <option value="{{$row['PredictIdx']}}" class="{{$row['SiteCode']}}">[{{$row['PredictIdx']}}] {{$row['ProdName']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_take_mock_part" name="search_take_mock_part">
                            <option value="">응시직렬</option>
                            @foreach($arr_take_mock_part_list as $row)
                                <option class="{{$row['PredictIdx']}}" value="{{$row['TakeMockPart']}}">{{$row['CcdName']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_TakeArea" name="search_TakeArea">
                            <option value="">응시지역</option>
                            @foreach($area as $k => $v)
                                @if($v['Ccd'] != '712018')
                                    <option value="{{$v['Ccd']}}">{{$v['CcdName']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">회원검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static">회원명, 아이디 검색 가능</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-bordered table-striped table-head-row2 form-table">
                <thead class="bg-white-gray">
                <tr>
                    <th class="text-center" width="40px">NO</th>
                    <th class="text-center">합격예측명</th>
                    <th class="text-center">이름</th>
                    <th class="text-center">아이디</th>
                    <th class="text-center">휴대폰번호</th>
                    <th class="text-center" width="100px">응시번호</th>
                    <th class="text-center" width="150px">직렬</th>
                    <th class="text-center" width="100px">지역</th>
                    <th class="text-center" width="180px">과목점수(난이도)</th>
                    <th class="text-center">체력/가산점</th>
                    <th class="text-center">환산점수</th>
                    <th class="text-center">공고유형</th>
                    <th class="text-center" style="width: 120px;">기타데이터</th>
                    <th class="text-center">등록일</th>
                    <th class="text-center">삭제</th>
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
        var $invoice_form = $('#invoice_form');

        $(document).ready(function() {
            // 합격예측서비스명 자동 변경
            $search_form.find('select[name="search_PredictIdx"]').chained("#search_site_code");
            $invoice_form.find('select[name="predict_idx"]').chained("#search_site_code");
            $invoice_form.find('select[name="predict_idx_successful"]').chained("#search_site_code");
            //직렬
            $search_form.find('select[name="search_take_mock_part"]').chained("#search_PredictIdx");
            $invoice_form.find('select[name="take_mock_part"]').chained("#predict_idx");

            //가데이터 셈플다운로드
            $('.btn-excel-download').on('click', function(event) {
                if ($invoice_form.find('select[name="take_mock_part"]').val() == '') {
                    alert('직렬을 선택해주세요.');
                    return;
                }
                event.preventDefault();
                formCreateSubmit('{{ site_url('/predict/predictFinal/sampleDownload') }}', $invoice_form.serializeArray(), 'POST');
            });

            //인증번호 등록 셈플 다운로드
            $('.btn-excel-cert-download').on('click', function() {
                location.replace('{{ site_url('/predict/predictFinal/sampleCertDownload') }}');
            });

            $('.btn-excel-download-successful').on('click', function() {
                location.replace('{{ site_url('/predict/predictFinal/sampleSuccessfulDownload') }}');
            });

            //가데이터 등록
            $('.btn-excel-upload').on('click', function() {
                var data, is_file, files;
                var predict_idx = $invoice_form.find('select[name="predict_idx"]').val();
                var take_mock_part = $invoice_form.find('select[name="take_mock_part"]').val();
                var cert_idx = $invoice_form.find('input[name="cert_idx"]').val();
                files = $invoice_form.find('input[name="attach_file"]')[0].files[0];

                if (predict_idx == '' || predict_idx == null) { alert('합격예측서비스를 선택해 주세요.'); return; }
                if (take_mock_part == '' || take_mock_part == null) { alert('직렬을 선택해 주세요.'); return; }
                if (cert_idx == '') { alert('수강인증코드를 입력해주세요.'); return; }
                if (typeof files === 'undefined') { alert('엑셀파일을 선택해 주세요.'); return; }

                data = new FormData();
                data.append('{{ csrf_token_name() }}', $invoice_form.find('input[name="{{ csrf_token_name() }}"]').val());
                data.append('_method', 'POST');
                data.append('predictidx', predict_idx);
                data.append('take_mock_part', take_mock_part);
                data.append('cert_idx', cert_idx);
                data.append('attach_file', $invoice_form.find('input[name="attach_file"]')[0].files[0]);
                is_file = true;

                if (!confirm('업로드 하시겠습니까?')) { return; }
                sendAjax('{{ site_url('/predict/predictFinal/redata') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                        $invoice_form.find('input[name="attach_file"]').val('');
                    }
                }, showError, false, 'POST', 'json', is_file);
            });

            //인증번호 등록
            $('.btn-excel-cert-upload').on('click', function() {
                var data, is_file, files;
                var exam_cert_idx = $invoice_form.find('input[name="exam_cert_idx"]').val();
                var exam_name = $invoice_form.find('input[name="exam_name"]').val();
                var exam_cen_code = $invoice_form.find('input[name="exam_cen_code"]').val();

                files = $invoice_form.find('input[name="exam_attach_file"]')[0].files[0];

                if (exam_cert_idx == '') { alert('수강인증코드를 입력해주세요.'); return; }
                if (exam_name == '') { alert('인증그룹명을 입력해주세요.'); return; }
                if (exam_cen_code == '') { alert('인증그룹코드를 입력해주세요.'); return; }
                if (typeof files === 'undefined') { alert('엑셀파일을 선택해 주세요.'); return; }

                data = new FormData();
                data.append('{{ csrf_token_name() }}', $invoice_form.find('input[name="{{ csrf_token_name() }}"]').val());
                data.append('_method', 'POST');
                data.append('exam_cert_idx', exam_cert_idx);
                data.append('exam_name', exam_name);
                data.append('exam_cen_code', exam_cen_code);
                data.append('attach_file', $invoice_form.find('input[name="exam_attach_file"]')[0].files[0]);
                is_file = true;

                if (!confirm('업로드 하시겠습니까?')) { return; }
                sendAjax('{{ site_url('/predict/predictFinal/certDataUpload') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $invoice_form.find('input[name="exam_attach_file"]').val('');
                    }
                }, showError, false, 'POST', 'json', is_file);
            });

            $('.btn-cert-exam-delete').on('click', function() {
                var del_cert_exam_idx = $invoice_form.find('input[name="del_cert_exam_idx"]').val();
                if (del_cert_exam_idx == '') { alert('수강인증코드를 입력해주세요.'); return; }

                if (!confirm('삭제 하시겠습니까?')) { return; }
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'del_cert_exam_idx' : del_cert_exam_idx
                };
                sendAjax('{{ site_url('/predict/predictFinal/chkCertApplyDataForDelete') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                    } else {
                        if (!confirm(ret.ret_msg + ' 계속 진행하시겠습니까?')) { return; }
                        sendAjax('{{ site_url('/predict/predictFinal/certExamDataDelete') }}', data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                            }
                        }, showError, false, 'POST');
                    }
                }, showError, false, 'POST');
            });

            //최종합격자수 등록
            $('.btn-excel-upload-successful').on('click', function() {
                var data, is_file, files;
                var predict_idx = $invoice_form.find('select[name="predict_idx_successful"]').val();
                files = $invoice_form.find('input[name="attach_file_successful"]')[0].files[0];

                if (predict_idx == '' || predict_idx == null) { alert('합격예측서비스를 선택해 주세요.'); return; }
                if (typeof files === 'undefined') { alert('엑셀파일을 선택해 주세요.'); return; }

                data = new FormData();
                data.append('{{ csrf_token_name() }}', $invoice_form.find('input[name="{{ csrf_token_name() }}"]').val());
                data.append('_method', 'POST');
                data.append('predict_idx', predict_idx);
                data.append('attach_file', files);
                is_file = true;

                if (!confirm('업로드 하시겠습니까?')) { return; }
                sendAjax('{{ site_url('/predict/predictFinal/successfulDataUpload') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                        $invoice_form.find('input[name="attach_file_successful"]').val('');
                    }
                }, showError, false, 'POST', 'json', is_file);
            });

            // DataTables
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-check-square-o mr-5"></i> 합격자수 등록정보', className: 'btn-sm btn-primary border-radius-reset btn-successful-info' },
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success ml-5 border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/predict/predictFinal/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'ProdName', 'class': 'text-center'},
                    {'data' : 'MemName', 'class': 'text-center'},
                    {'data' : 'MemId', 'class': 'text-center'},
                    {'data' : 'phone', 'class': 'text-center'},
                    {'data' : 'TakeNo', 'class': 'text-center'},
                    {'data' : 'TakeMockPartName', 'class': 'text-center'},
                    {'data' : 'TakeAreaCcdName', 'class': 'text-center'},
                    {'data' : 'pointJson', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return '체력점수 : ' + row.StrengthPoint + ' / 가산점 : ' + row.AddPoint + '</>';
                    }},
                    {'data' : 'FinalPoint', 'class': 'text-center'},
                    {'data' : 'AnnouncementType', 'class': 'text-center'},
                    {'data' : 'SetEtcValues', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                        return '<a href="javascript:;" class="btn-delete btn-sm btn-danger border-radius-reset" data-idx="' + data.PfIdx + '">삭제</a>';
                    }},
                ]
            });

            //최종합격자 수 모달팝업
            $('.btn-successful-info').on('click', function(event) {
                var predict_idx = $search_form.find('select[name="search_PredictIdx"]').val();
                if (predict_idx == '' || predict_idx == null) { alert('합격예측상품을 선택해주세요.'); return false; }
                $('.btn-successful-info').setLayer({
                    "url" : "{{ site_url('/predict/predictFinal/listSuccessfulModal/') }}" + predict_idx,
                    "width" : "1200",
                });
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{site_url('predict/predictFinal/listAjax/Y')}}', $search_form.serializeArray(), 'POST');
                }
            });

            // 삭제
            $list_table.on('click', '.btn-delete', function() {
                if (!confirm('삭제 하시겠습니까?')) {
                    return;
                }
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'pf_idx' : $(this).data('idx'),
                    'predict_idx' : $search_form.find('select[name="search_PredictIdx"]').val(),
                };
                sendAjax('{{ site_url('/predict/predictFinal/delFinalData') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });
        });
    </script>
@stop
