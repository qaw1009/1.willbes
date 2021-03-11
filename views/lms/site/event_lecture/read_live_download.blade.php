<div class="row">
    <form class="form-horizontal" id="search_live_download_form" name="search_live_download_form" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="control-label col-md-2" for="search_live_value">통합검색</label>
            <div class="col-md-2">
                <input type="text" class="form-control" id="search_live_value" name="search_live_value">
            </div>
            <div class="col-md-4">
                <p class="form-control-static">• 이름, 아이디, 첨부파일명 검색 기능</p>
            </div>
        </div>
    </form>
</div>
<div class="row mt-10 mb-20">
    <div class="col-xs-12 text-right">
        <button type="button" class="btn btn-primary btn-search-live-download"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
        <button type="button" class="btn btn-default mr-20 btn-reset-live-download">검색초기화</button>
    </div>
</div>

<div class="x_panel mt-20">
    <div class="x_content">
        <table id="list_ajax_live_download_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>회원ID</th>
                <th>회원명</th>
                <th>연락처</th>
                <th>첨부파일명</th>
                <th>자료 다운로드 횟수</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    var $datatable_live_download;
    var $search_live_download_form = $('#search_live_download_form');
    var $list_live_download_table = $('#list_ajax_live_download_table');

    $(document).ready(function() {
        $datatable_live_download = $list_live_download_table.DataTable({
            serverSide: true,
            buttons: [
                { text: '<i class="fa fa-send mr-10"></i> 엑셀변환', className: 'btn-default btn-sm btn-success border-radius-reset mr-15 btn-excel-live-download' },
                { text: '<i class="fa fa-pencil mr-10"></i> 목록', className: 'btn-sm btn-primary border-radius-reset ml-15 btn-list' },
            ],
            ajax: {
                'url' : '{{ site_url('/site/eventLecture/listLiveDownloadAjax/'.$el_idx) }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_live_download_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable_live_download.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : 'MemId'},
                {'data' : 'MemName'},
                {'data' : 'MemPhone'},
                {'data' : 'FileRealName'},
                {'data' : 'DownloadCnt'},

            ]
        });

        // 검색
        $('.btn-search-live-download').click(function (){
            $datatable_live_download.draw();
        });

        // 검색초기화
        $('.btn-reset-live-download').click(function (){
            $search_live_download_form[0].reset();
            $datatable_live_download.draw();
        });

        // 엑셀다운로드 버튼 클릭
        $('.btn-excel-live-download').on('click', function(event) {
            event.preventDefault();
            formCreateSubmit('{{ site_url('/site/eventLecture/liveDownloadExcel/'.$el_idx) }}', $search_live_download_form.serializeArray(), 'POST');
        });

    });
</script>