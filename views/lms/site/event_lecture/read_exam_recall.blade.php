<div class="x_content">
    <form class="form-horizontal" id="search_recall_form" name="search_recall_form" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" id="_title_use_count" name="title_use_count" value="{{ $data['arr_recall_question']['TitleUseCount'] or '0' }}">

        <div class="form-group">
            <label class="control-label col-md-2" for="search_member_value">통합검색</label>
            <div class="col-md-2">
                <input type="text" class="form-control" id="search_member_value" name="search_member_value">
            </div>
            <div class="col-md-2">
                <p class="form-control-static">• 이름, 아이디, 연락처 검색 기능</p>
            </div>
            <label class="control-label col-md-1" for="search_member_start_date">등록일</label>
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
        <button type="button" class="btn btn-primary btn-search-recall"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
        <button type="button" class="btn btn-default mr-20 btn-reset-recall">검색초기화</button>
    </div>
</div>

<div class="x_panel mt-30">
    <div class="x_content">
        <table id="list_recall_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>선택</th>
                <th>No</th>
                <th>이름</th>
                <th>아이디</th>
                <th>연락처</th>
                <th>응시과목</th>
                <th>응시지역</th>
                <th>등록일</th>
                @if (empty($data['arr_recall_question']) === false)
                    @for($i=1; $i<=$data['arr_recall_question']['TitleUseCount']; $i++)
                        <th>{!! $data['arr_recall_question']['Title_'.$i] !!}</th>
                    @endfor
                @endif
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    var $datatable_recall;
    var $search_recall_form = $('#search_recall_form');
    var $list_recall_table = $('#list_recall_table');

    $(document).ready(function() {
        $datatable_recall = $list_recall_table.DataTable({
            serverSide: true,
            dom: 'T<"clear"><<"pull-left mt-5 left-button"><"pull-right"B>><"clear">rtip',
            buttons: [
                { text: '<i class="fa fa-send mr-10"></i> 엑셀변환', className: 'btn-default btn-sm btn-success border-radius-reset btn-excel-recall' },
                { text: '<i class="fa fa-send mr-10"></i> 쪽지발송', className: 'btn-sm btn-info border-radius-reset ml-10 btn-message' },
                { text: '<i class="fa fa-send mr-10"></i> SMS발송', className: 'btn-sm btn-info border-radius-reset ml-10 btn-sms' },
                { text: '<i class="fa fa-pencil mr-10"></i> 목록', className: 'btn-sm btn-primary border-radius-reset ml-10 btn-list' },
            ],
            ajax: {
                'url' : '{{ site_url('/site/eventLecture/listRecallMemberAjax/'.$data['PromotionCode']) }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_recall_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="is_checked" class="flat target-crm-member" data-mem-idx="' + row.MemIdx + '">';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable_recall.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : 'MemName'},
                {'data' : 'MemId'},
                {'data' : 'Phone'},
                {'data' : 'ExamSubjectName'},
                {'data' : 'ExamAreaName'},
                {'data' : 'RegDatm'},
                @for($i=1; $i<=$data['arr_recall_question']['TitleUseCount']; $i++)
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        var content = row.RecallContent_{{$i}};
                            return "<textarea style='width:100%; height:100px; boarder:0px; margin:0px;' readonly='readonly'>"+content+"</textarea>";
                        }},
                @endfor
            ]
        });
        /*$('div.left-button').html('<button type="button" class="btn btn-danger btn-reg-recallQuestion">문제등록</button>');*/

        // 검색초기화
        $('.btn-reset-recall').click(function () {
            $search_recall_form[0].reset();
            $datatable_recall.draw();
        });

        // 검색
        $('.btn-search-recall').click(function () {
            $datatable_recall.draw();
        });

        // 엑셀다운로드 버튼 클릭
        $('.btn-excel-recall').on('click', function(event) {
            event.preventDefault();
            formCreateSubmit('{{ site_url('/site/eventLecture/recallMemberExcel/'.$data['PromotionCode']) }}', $search_recall_form.serializeArray(), 'POST');
        });

        $('.btn-reg-recallQuestion').on('click', function () {

        });
    });
</script>