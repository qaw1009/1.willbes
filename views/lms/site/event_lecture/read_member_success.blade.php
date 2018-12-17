<div class="row">
    <form class="form-horizontal" id="search_member_success_form" name="search_member_success_form" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="control-label col-md-2">조건</label>
            <div class="col-md-8 form-inline">
                <select class="form-control" id="search_serial_ccd" name="search_serial_ccd">
                    <option value="">응시직렬</option>
                    @foreach($ms_datas['SerialCcd'] as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>

                <select class="form-control" id="search_candidate_area_ccd" name="search_candidate_area_ccd">
                    <option value="">응시지역</option>
                    @foreach($ms_datas['CandidateAreaCcd'] as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>

                <select class="form-control" id="search_success_type" name="search_success_type">
                    <option value="">합격구분</option>
                    @foreach($ms_datas['SuccessType'] as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="search_member_value">통합검색</label>
            <div class="col-md-2">
                <input type="text" class="form-control" id="search_member_value" name="search_member_value">
            </div>
            <div class="col-md-2">
                <p class="form-control-static">• 이름, 아이디,응시번호 검색 가능</p>
            </div>
            <label class="control-label col-md-1" for="search_member_start_date">신청날짜검색</label>
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
        <button type="button" class="btn btn-primary btn-search-member-success"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
        <button type="button" class="btn btn-default mr-20 btn-reset-member-success">검색초기화</button>
    </div>
</div>

<div class="x_panel mt-20">
    <div class="x_content">
        <table id="list_ajax_member_success_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>선택</th>
                <th>No</th>
                <th>회원명</th>
                <th>응시번호</th>
                <th>응시직렬</th>
                <th>응시지역</th>
                <th>합격구분</th>
                <th>합격증첨부</th>
                <th>수기첨부</th>
                <th>등록일</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    var $datatable_member_success;
    var $search_member_success_form = $('#search_member_success_form');
    var $list_member_success_table = $('#list_ajax_member_success_table');

    $(document).ready(function() {
        $datatable_member_success = $list_member_success_table.DataTable({
            serverSide: true,
            buttons: [
                { text: '<i class="fa fa-send mr-10"></i> 엑셀변환', className: 'btn-default btn-sm btn-success border-radius-reset mr-15 btn-excel-member-success' },
                { text: '<i class="fa fa-send mr-10"></i> 쪽지발송', className: 'btn-sm btn-info border-radius-reset btn-message' },
                { text: '<i class="fa fa-send mr-10"></i> SMS발송', className: 'btn-sm btn-info border-radius-reset ml-15 btn-sms' },
                { text: '<i class="fa fa-pencil mr-10"></i> 목록', className: 'btn-sm btn-primary border-radius-reset ml-15 btn-list' },
            ],
            ajax: {
                'url' : '{{ site_url('/site/eventLecture/listMemberSuccessAjax/'.$el_idx) }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_member_success_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="is_checked" class="flat target-crm-member" data-mem-idx="' + row.MemIdx + '">';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable_member_success.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        var data = '<a href="javascript:void(0);" class="btn-member-info" data-idx="' + row.MemIdx + '">';
                        data += '<u>';
                        data += row.MemName+'('+row.MemId+')';
                        data += '</u></a>';
                        data += '<br>'+row.MemPhone+'('+row.SmsRcvStatus+')';
                        return data;
                    }},

                {'data' : 'CandidateNum'},
                {'data' : 'SerialName'},
                {'data' : 'CandidateAreaName'},
                {'data' : 'SuccessTypeName'},

                {'data' : 'FileRealName1', 'render' : function(data, type, row, meta) {
                        var tmp_return;
                        if (data === null) {
                            tmp_return = '';
                        } else {
                            tmp_return = '<a href="javascript:void(0);" class="file-download" data-file-path="'+row.FileFullPath1+row.FileName1+'" data-file-name="'+row.FileRealName1+'">'+row.FileRealName1+'</a>';
                        }
                        return tmp_return;
                    }},
                {'data' : 'FileRealName2', 'render' : function(data, type, row, meta) {
                        var tmp_return;
                        if (data === null) {
                            tmp_return = '';
                        } else {
                            tmp_return = '<a href="javascript:void(0);" class="file-download" data-file-path="'+row.FileFullPath2+row.FileName2+'" data-file-name="'+row.FileRealName2+'">'+row.FileRealName2+'</a>';
                        }
                        return tmp_return;
                    }},

                {'data' : 'RegDatm'}

            ]
        });

        // 검색
        $('.btn-search-member-success').click(function (){
            $datatable_member_success.draw();
        });

        // 검색초기화
        $('.btn-reset-member-success').click(function (){
            $search_member_success_form[0].reset();
            $datatable_member_success.draw();
        });

        // 엑셀다운로드 버튼 클릭
        $('.btn-excel-member-success').on('click', function(event) {
            event.preventDefault();
            formCreateSubmit('{{ site_url('/site/eventLecture/memberSuccessExcel/'.$el_idx) }}', $search_member_success_form.serializeArray(), 'POST');
        });

        // 파일다운로드 버튼
        $list_member_success_table.on('click', '.file-download', function() {
            console.log('1');
            var _url = '{{ site_url("/site/eventLecture/download") }}/' + '?path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
            window.open(_url, '_blank');
        });
    });
</script>