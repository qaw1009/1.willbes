<div class="row">
    <form class="form-horizontal" id="search_register_form" name="search_register_form" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="control-label col-md-2">다중특강정보</label>
            <div class="col-md-2 form-inline">
                <select class="form-control" id="search_register_idx" name="search_register_idx">
                    <option value="">다중특강정보</option>
                    @foreach($data_register_LM as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
            <label class="control-label col-md-3">신청자 / 정원</label>
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
<div class="row mt-10 mb-20">
    <div class="col-xs-12 text-right">
        <button type="button" class="btn btn-primary btn-search-register"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
        <button type="button" class="btn btn-default mr-20 btn-reset-register">검색초기화</button>
    </div>
</div>

<div class="x_panel mt-20">
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
                <th>주소</th>
                <th>추가데이터</th>
                <th>첨부파일</th>
                <th>신청일</th>
                <th class="rowspan">신청특강/설명회</th>
                <th>총신청수</th>
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

    $(document).ready(function() {
        $datatable_register = $list_regitster_table.DataTable({
            serverSide: true,
            rowsGroup: ['.rowspan'],
            buttons: [
                { text: '<i class="fa fa-send mr-10"></i> 엑셀변환', className: 'btn-default btn-sm btn-success border-radius-reset mr-15 btn-excel-register' },
                { text: '<i class="fa fa-send mr-10"></i> 쪽지발송', className: 'btn-sm btn-info border-radius-reset btn-message' },
                { text: '<i class="fa fa-send mr-10"></i> SMS발송', className: 'btn-sm btn-info border-radius-reset ml-15 btn-sms' },
                { text: '<i class="fa fa-pencil mr-10"></i> 목록', className: 'btn-sm btn-primary border-radius-reset ml-15 btn-list' },
            ],
            ajax: {
                'url' : '{{ site_url('/site/eventLecture/listRegisterAjax/'.$el_idx) }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_register_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
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
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return row.Addr1 + row.Addr2 + ' ('+ row.ZipCode +')';
                    }},
                {'data' : 'EtcValue'},
                {'data' : 'FileRealName', 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="file-register-download" data-file-path="'+encodeURIComponent(row.FileFullPath)+'" data-file-name="'+encodeURIComponent(row.FileRealName)+'" target="_blank">['+row.FileRealName+']</a>';
                    }},
                {'data' : 'RegDatm'},
                {'data' : 'RegisterName'},
                {'data' : 'registerCnt'}
            ]
        });

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

        // 엑셀다운로드 버튼 클릭
        $('.btn-excel-register').on('click', function(event) {
            event.preventDefault();
            formCreateSubmit('{{ site_url('/site/eventLecture/registerExcel/'.$el_idx) }}', $search_register_form.serializeArray(), 'POST');
        });

        $list_regitster_table.on('click', '.file-register-download', function() {
            var _url = '{{ site_url("/site/eventLecture/download") }}/' + '?path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
            window.open(_url, '_blank');
        });
    });
</script>