<div class="x_content">
    <form class="form-horizontal" id="search_register_form" name="search_register_form" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="data_ssn" value="N">
        <div class="form-group">
            <label class="control-label col-md-2">신청리스트(특강) 정보</label>
            <div class="col-md-2 form-inline">
                <select class="form-control" id="search_register_idx" name="search_register_idx">
                    <option value="">신청리스트(특강) 정보</option>
                    @foreach($data_register as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
            <label class="control-label col-md-2 col-lg-offset-2">신청자 / 정원</label>
            <div class="col-md-2">
                <p class="form-control-static" id="member_total_info"></p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="search_member_value">통합검색</label>
            <div class="col-md-2">
                <input type="text" class="form-control" id="search_member_value" name="search_member_value">
            </div>
            <div class="col-md-2">
                <p class="form-control-static">• 이름, 아이디, 연락처 검색 기능</p>
            </div>
            <label class="control-label col-md-1" for="search_member_start_date">신청기간검색</label>
            <div class="col-md-5">
                <div class="col-md-11 form-inline">
                    <div class="input-group mb-0 mr-20">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_member_start_date" name="search_member_start_date" value="">
                        <div class="input-group-addon no-border no-bgcolor">~</div>
                        <div class="input-group-addon no-border-right">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_member_end_date" name="search_member_end_date" value="">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="x_content mt-10 mb-20">
    <div class="col-xs-12 text-right">
        <button type="button" class="btn btn-primary btn-search-register"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
        <button type="button" class="btn btn-default mr-20 btn-reset-register">검색초기화</button>
    </div>
</div>

@if ($data['SiteCode'] == '2017')
    {{-- 임용온라인 : 수험번호 생성 기능 --}}
    <div class="x_panel col-md-12 mt-20" style="background-color: #f7f7f7">
        <form class="form-horizontal" id="_register_ssam_member_form" name="_register_ssam_member_form" method="POST" enctype="multipart/form-data" onsubmit="return false;">
            {!! csrf_field() !!}
            <div class="x_title">
                <span class="link-cursor" data-toggle="collapse" data-target="#addbox_register_ssam_excel" style="color: red">수험번호등록</span> (임용전용)
                <span class="ml-20">#등록된 데이터 삭제 후 일괄 등록</span>
            </div>
            <div class="x_content collapse multi-collapse" id="addbox_register_ssam_excel">
                <div class="col-md-12 form-inline">
                    <select class="form-control" id="register_idx" name="register_idx">
                        <option value="">신청리스트(특강) 정보</option>
                        @foreach($data_register as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                    <input type="file" id="attach_file" name="attach_file" class="form-control" title="엑셀파일" value="">
                    <button type="button" class="btn btn-primary btn-sm mb-0 ml-10 mr-10 btn-excel-upload">엑셀 업로드</button>
                    <button type="button" class="btn btn-success btn-sm mb-0 btn-excel-download">샘플엑셀 다운로드</button>
                </div>
            </div>
        </form>
    </div>
@endif

<div class="x_panel mt-30">
    <div class="x_content">
        <table id="list_ajax_register_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>선택</th>
                <th>No</th>
                <th>이름</th>
                <th>아이디</th>
                <th>연락처</th>
                <th>이메일</th>
                <th>주민번호</th>
                <th>주소</th>
                <th>제목</th>
                <th>추가데이터</th>
                <th>첨부파일</th>
                <th>첨부파일2</th>
                <th>신청일</th>
                <th class="rowspan">신청특강/설명회</th>
                <th>총신청수</th>
                <th>삭제</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="x_panel mt-20">
    <label class="control-label">이벤트 추가 신청자 목록</label>
    <div class="x_content">
        <table id="list_ajax_apply_table" class="table table-striped table-bordered">
            <colgroup>
                <col width="15%">
                <col width="15%">
                <col width="15%">
                <col width="15%">
                <col width="15%">
                <col width="15%">
            </colgroup>
            <thead>
                <tr>
                    <th>No</th>
                    <th>회원ID</th>
                    <th>이름</th>
                    <th>전화번호</th>
                    {{-- <th>당첨여부</th> --}}
                    <th>신청정보</th>
                    <th>신청일시</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    var $datatable_register;
    var $search_register_form = $('#search_register_form');
    var $list_regitster_table = $('#list_ajax_register_table');
    var $_register_ssam_member_form = $('#_register_ssam_member_form');
    var $datatable_apply;
    var $list_apply_table = $('#list_ajax_apply_table');

    $(document).ready(function() {
        $datatable_register = $list_regitster_table.DataTable({
            serverSide: true,
            rowsGroup: ['.rowspan'],
            buttons: [
                { text: '<i class="fa fa-send mr-10"></i> 엑셀변환', className: 'btn-default btn-sm btn-success border-radius-reset btn-excel-register' },
                { text: '<i class="fa fa-send mr-10"></i> 쪽지발송', className: 'btn-sm btn-info border-radius-reset ml-10 btn-message' },
                { text: '<i class="fa fa-send mr-10"></i> SMS발송', className: 'btn-sm btn-info border-radius-reset ml-10 btn-sms' },
                { text: '<i class="fa fa-pencil mr-10"></i> 목록', className: 'btn-sm btn-primary border-radius-reset ml-10 btn-list' },
            ],
            ajax: {
                'url' : '{{ site_url('/site/eventLecture/listRegisterAjax/'.$el_idx) }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_register_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            "createdRow" : function( row, data, index ) {
                if (data.IsStatus == 'N') {
                    $(row).addClass('bg-gray-custom');
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="is_checked" class="flat target-crm-member" data-mem-idx="' + row.MemIdx + '">';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable_register.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},

                {'data' : 'UserName'},
                {'data' : 'MemId'},
                {'data' : 'Phone'},
                {'data' : 'Mail'},
                {'data' : 'UserSsn'},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return row.Addr1 + row.Addr2 + ' ('+ row.ZipCode +')';
                    }},
                {'data' : 'EtcTitle'},
                {'data' : 'EtcValue'},
                {'data' : 'FileRealName', 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="file-register-download" data-file-path="'+encodeURIComponent(row.FileFullPath)+'" data-file-name="'+encodeURIComponent(row.FileRealName)+'" target="_blank">['+row.FileRealName+']</a>';
                    }},
                {'data' : 'FileRealName2', 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="file-register-download" data-file-path="'+encodeURIComponent(row.FileFullPath2)+'" data-file-name="'+encodeURIComponent(row.FileRealName2)+'" target="_blank">['+row.FileRealName2+']</a>';
                    }},
                {'data' : 'RegDatm'},
                {'data' : 'RegisterName'},
                {'data' : 'registerCnt'},
                {'data' : 'EmIdx', 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="red btn-register-member-delete" data-register-member="'+data+'"><u>삭제</u></a>';
                    }}
            ]
        });

        // datatable button안에 체크박스 그리기
        var add_checkbox = '<div class="checkbox mr-10" style="z-index: 1001; position: absolute; margin-top: 5px; margin-left: 8px;"><input type="checkbox" class="flat2" id="add_data_ssn" name="add_data_ssn" value="Y" title="주민번호 추가"><label for="add_data_ssn"></label><div>';
        $('.btn-excel-register').parent().parent().prepend(add_checkbox);

        // 검색
        $('.btn-search-register').click(function (){
            $datatable_register.draw();
        });

        // 검색초기화
        $('.btn-reset-register').click(function (){
            $search_register_form[0].reset();
            $datatable_register.draw();
        });

        // 신청자/정원 데이터 호출
        $('#search_register_idx').change(function() {
            var member_total_info = '';
            var person_limit_type_name = '';
            var _data = {};
            var _url = '{{ site_url("/site/eventLecture/getAjaxRegisterMemberCount/") }}' + this.value;

            if (this.value == '') {
                $('#member_total_info').html('');
                return false;
            }

            sendAjax(_url, _data, function(ret) {
                if (ret.ret_cd) {
                    if (Object.keys(ret.ret_data).length > 0) {
                        $.each(ret.ret_data, function(key, val) {
                            if (val.PersonLimitType == 'N') {
                                person_limit_type_name = '인원 무제한';
                            } else if (val.PersonLimitType == 'L') {
                                person_limit_type_name = '인원 제한';
                            }
                            member_total_info = val.memberCnt + ' / ' + person_limit_type_name;
                            $('#member_total_info').html(member_total_info);
                        });
                    }
                }
            }, showError, false, 'GET');
        });

        $('input:checkbox[name="add_data_ssn"]').click(function () {
            if ($(this).is(":checked") === true) {
                notifyAlert('error', '알림', '주민번호 데이터가 "추가"되었습니다.');
            } else {
                notifyAlert('success', '알림', '주민번호 데이터가 "제거"되었습니다.');
            }
        });

        // 신청자 정보 삭제
        $list_regitster_table.on('click', '.btn-register-member-delete', function() {
            var _url = '{{ site_url("/site/eventLecture/deleteRegisterMember") }}';
            var data = {
                '{{ csrf_token_name() }}' : $search_register_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'em_idx' : $(this).data('register-member')
            };
            if (!confirm('정말로 삭제하시겠습니까?')) {
                return;
            }
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable_register.draw();
                }
            }, showError, false, 'POST');
        });

        // 엑셀다운로드 버튼 클릭
        $('.btn-excel-register').on('click', function(event) {
            if (!confirm('엑셀변환을 하시겠습니까?')) {
                return;
            }
            var data_ssn_type = $('input:checkbox[name="add_data_ssn"]:checked').val();
            if (typeof data_ssn_type !== 'undefined') {
                $search_register_form.find('input[name="data_ssn"]').val(data_ssn_type);
            } else {
                $search_register_form.find('input[name="data_ssn"]').val('N');
            }
            event.preventDefault();
            formCreateSubmit('{{ site_url('/site/eventLecture/registerExcel/'.$el_idx) }}', $search_register_form.serializeArray(), 'POST');
        });

        $list_regitster_table.on('click', '.file-register-download', function() {
            var _url = '{{ site_url("/site/eventLecture/download") }}/' + '?path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
            window.open(_url, '_blank');
        });

        // 수험번호생성 샘플엑셀 다운로드
        $('.btn-excel-download').on('click', function() {
            location.replace('{{ site_url('/site/eventLecture/sampleRegisterMemberForSsamDownload') }}');
        });

        // 수험번호 엑셀 업로드
        $('.btn-excel-upload').on('click', function(event) {
            var data, is_file, files;
            var register_idx = $_register_ssam_member_form.find('select[name="register_idx"]').val();
            files = $_register_ssam_member_form.find('input[name="attach_file"]')[0].files[0];

            if (register_idx == '' || register_idx == null) { alert('신청리스트(특강) 정보를 선택해 주세요.'); return; }
            if (typeof files === 'undefined') { alert('엑셀파일을 선택해 주세요.'); return; }

            data = new FormData();
            data.append('{{ csrf_token_name() }}', $_register_ssam_member_form.find('input[name="{{ csrf_token_name() }}"]').val());
            data.append('_method', 'POST');
            data.append('register_idx', register_idx);
            data.append('attach_file', files);
            is_file = true;

            if (!confirm('업로드 하시겠습니까?')) { return; }
            event.preventDefault();
            sendAjax('{{ site_url('/site/eventLecture/excelRegisterMemberForSsamDataUpload') }}', data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable_register.draw();
                    $_register_ssam_member_form.find('input[name="attach_file"]').val('');
                }
            }, showError, false, 'POST', 'json', is_file);
        });

        // *** 이벤트 추가 신청 리스트 ***
        $datatable_apply = $list_apply_table.DataTable({
            serverSide: true,
            buttons: [
                { text: '<i class="fa fa-send mr-10"></i> 데이터초기화', className: 'btn-default btn-sm btn-danger border-radius-reset mr-15 btn-delete-apply-member' },
                { text: '<i class="fa fa-send mr-10"></i> 엑셀변환', className: 'btn-default btn-sm btn-success border-radius-reset mr-15 btn-excel-apply-member' },
            ],
            ajax: {
                'url' : '{{ site_url('/site/eventLecture/listApplyAjax/'.$el_idx) }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_register_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                    return $datatable_apply.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                }},
                {'data' : 'MemId'},
                {'data' : 'MemName'},
                {'data' : 'MemPhone'},
                //{'data' : 'IsWin'},
                {'data' : 'Name'},
                {'data' : 'RegDatm'}
            ]
        });

        // 추가 신청자 엑셀 이벤트
        $('.btn-excel-apply-member').on('click', function(event) {
            event.preventDefault();
            formCreateSubmit('{{ site_url('/site/eventLecture/addApplyMemberExcel/'.$el_idx) }}', $search_register_form.serializeArray(), 'POST');
        });

        // 추가 신청자 삭제
        $('.btn-delete-apply-member').on('click', function(event) {
            var el_idx = "{{$el_idx}}";
            var _url = '{{ site_url("/site/eventLecture/deleteApplyMember/") }}';
            var data = {
                '{{ csrf_token_name() }}' : $search_register_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'el_idx' : el_idx
            };
            if (!confirm('정말로 삭제하시겠습니까?')) {
                return;
            }
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable_apply.draw();
                }
            }, showError, false, 'POST');
        });
    });
</script>