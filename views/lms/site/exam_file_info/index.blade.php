@extends('lcms.layouts.master')

@section('content')
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs('','tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline" >
                    <label class="control-label col-md-1" for="search_value">검색</label>
                    <div class="col-md-11">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th class="searching searching_site_code">운영 사이트</th>
                    <th>학년도</th>
                    <th class="searching_is_use">사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>수정</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($list as $row)
                        <tr>
                            <td>{{ $loop->index }}</td>
                            <td>{{ $row['SiteName'] }}<span class="hide">{{ $row['SiteCode'] }}</span></td>
                            <td>{{ $row['YearTarget'] }} 학년도</td>
                            <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif
                                <span class="hide">{{ $row['IsUse'] }}</span>
                            </td>
                            <td>{{ $row['RegAdminName'] }}</td>
                            <td>{{ $row['RegDatm'] }}</td>
                            <td><a href="{{site_url('/site/examFileInfo/create/'.$row['ExamFileIdx'])}}"><u class="blue">수정</u></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: true,
                searching: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 지역별 공고문 자료등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/examFileInfo/create') }}';
                        }}
                ]
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                /*.columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())*/
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .column('.searching_site_code').search($search_form.find('input[name="search_site_code"]').val())
                .draw();
        }
    </script>
@stop