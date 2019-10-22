<div class="x_title">- 강의자료실</div>
<form class="form-horizontal searching" id="search_modal_form" name="search_modal_form" method="POST" onsubmit="return false;">
<input type="hidden" id="modal_site_code" name="modal_site_code" value="{{$site_code}}">
{!! csrf_field() !!}
    <div class="form-group">
        <div class="col-md-12 form-inline">
            {!! html_site_select($site_code, 'search_modal_site_code', 'search_modal_site_code', 'hide', '운영 사이트', '', '', false, $offLineSite_list) !!}
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
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12 form-inline">
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
            <input type="text" class="form-control" id="search_modal_value" name="search_modal_value" placeholder="제목,내용 검색" style="width: 200px;">
            <div class="checkbox">
                <input type="checkbox" name="search_modal_chk_hot_display" value="1" class="flat hot-display" id="hot_display"/> <label for="hot_display">BEST 숨기기</label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12 text-center form-inline">
            <button type="submit" class="btn btn-sm btn-primary btn-search-modal ml-10" id="btn_search_modal">검 색</button>
            <button type="button" class="btn btn-sm btn-default" id="_btn_reset_modal">초기화</button>
        </div>
    </div>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table_model" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>운영사이트</th>
                    <th>캠퍼스</th>
                    <th>구분</th>
                    <th>과목</th>
                    <th>과정</th>
                    <th>교수명</th>
                    <th>제목</th>
                    <th>첨부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>사용</th>
                    <th>조회수</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</form>

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

        $datatable_modal = $list_table_modal.DataTable({
            serverSide: true,
            pageLength: 10,
            ajax: {
                'url' : '{{ site_url('/live/videoManager/AjaxLiveLectureMaterialModal/83') }}' + '?site_code=' + '{{$site_code}}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_modal_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        if (row.IsBest == '1') {
                            return 'BEST';
                        } else {
                            return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }
                    }},
                {'data' : 'SiteName'},
                {'data' : 'CampusName'},
                {'data' : 'CateCode', 'render' : function(data, type, row, meta){
                        if (row.SiteCode == {{config_item('app_intg_site_code')}}) {
                            return '통합';
                        } else {
                            var str = '없음';
                            if (data != null) {
                                str = '';
                                var obj = data.split(',');
                                for (key in obj) {
                                    str += obj[key] + "<br>";
                                }
                            }
                            return str;
                        }
                    }},
                {'data' : 'SubjectName'},
                {'data' : 'CourseName'},
                {'data' : 'ProfNickName'},
                {'data' : 'Title', 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn-read-modal" data-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                    }},
                {'data' : 'AttachFileName', 'render' : function(data, type, row, meta) {
                        var tmp_return;
                        (data === null) ? tmp_return = '' : tmp_return = '<p class="glyphicon glyphicon-file"></p>';
                        return tmp_return;
                    }},
                {'data' : 'wAdminName'},
                {'data' : 'RegDatm'},
                {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return (data == 'Y') ? '사용' : '<p class="red">미사용</p>';
                    }},
                {'data' : 'ReadCnt'}
            ],
        });

        // hot 숨기기
        $search_modal_form.on('ifChanged', '.hot-display', function() {
            $datatable_modal.draw();
        });

        // 검색
        $('.btn-search-modal').click(function (){
            $datatable_modal.draw();
        });

        // 초기화 버튼 클릭
        $search_modal_form.on('click', '#_btn_reset_modal', function() {
            $search_modal_form[0].reset();
            $datatable_modal.draw();
        });

        // 데이터 Read 페이지
        $list_table_modal.on('click', '.btn-read-modal', function() {
            var site_code = $('#modal_site_code').val();
            var uri_route = $(this).data('idx') + dtParamsToQueryString($datatable_modal) + '&bm_idx=83&site_code=' + site_code;
            $('.btn-read-modal').setLayer({
                "url" : "{{ site_url('/live/videoManager/readLiveLectureMaterialModal/') }}" + uri_route,
                "width" : "1200"
            });
        });
    });
</script>