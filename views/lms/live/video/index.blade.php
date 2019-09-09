@extends('lcms.layouts.master')

@section('content')
    <h5>- 라이브강의 송출을 위한 강의실과 영상정보를 매칭하고 기타 자료를 확인하는 페이지입니다..</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs('', 'tabs_site_code', 'tab', true, [], false, $offLineSite_list) !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false, $offLineSite_list) !!}
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭 검색 가능</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2 live">
            @foreach($boardInfo as $key => $val)
                <button class="btn btn-info btn_board" type="button" data-bm-idx="{{$key}}">{{$val}}</button>
            @endforeach
            </div>
            <div class="col-xs-8 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th class="searching searching_site_code">운영 사이트</th>
                        <th class="searching_campus">캠퍼스</th>
                        <th class="searching">강의실명</th>
                        <th class="searching_is_use">사용여부</th>
                        <th>정렬</th>
                        <th>등록자</th>
                        <th>등록일</th>
                        <th>LIVE 연결 확인</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $loop->index }}</td>
                            <td>{{ $row['SiteName'] }}<span class="hide">{{ $row['SiteCode'] }}</span></td>
                            <td>{{ $row['CampusName'] }}<span class="hide">{{ $row['CampusCcd'] }}</span></td>
                            <td><a href="javascript:void(0);" class="btn-modify" data-idx="{{ $row['LecLiveVideoIdx'] }}"><u>{{ $row['ClassRoomName'] }}</u></a></td>
                            <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif
                                <span class="hide">{{ $row['IsUse'] }}</span>
                            </td>
                            <td>
                                <input type="text" name="order_num" class="form-control input-sm" value="{{ $row['OrderNum'] }}" data-origin-order-num="{{ $row['OrderNum'] }}" data-idx="{{ $row['LecLiveVideoIdx'] }}" style="width: 50px;" />
                            </td>
                            <td>{{ $row['RegAdminName'] }}</td>
                            <td>{{ $row['RegDatm'] }}</td>
                            {{--<td><a href="javascript:void(0);" onclick="javascript:liveOn('{{ $row['LiveVideoRoute'] }}');">수강하기</a></td>--}}
                            <td><a href="javascript:void(0);" class="btn-video" data-dideo-route="{{ $row['LiveVideoRoute'] }}"><u>수강하기</u></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_table');
        var $list_form = $('#list_form');

        $(document).ready(function() {
            // site-code에 매핑되는 select box 자동 변경
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: false,
                searching: true,
                buttons: [
                    { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-reorder' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 등록', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ]
            });

            // 등록/수정 모달창 오픈
            $('.btn-regist, .btn-modify').click(function() {
                var is_regist = ($(this).prop('class').indexOf('btn-regist') !== -1) ? true : false;
                var uri_param = (is_regist === true) ? '' : $(this).data('idx');

                $('.btn-regist, .btn-modify').setLayer({
                    'url' : '{{ site_url('/live/videoManager/create/') }}' + uri_param,
                    'width' : 900
                });
            });

            // 동영상 플레이 모달창 오픈
            $('.btn-video').click(function() {
                var uri_param = '?video_route=' + $(this).data('dideo-route');
                {{--
                $('.btn-video').setLayer({
                    'url' : '{{ site_url('/live/videoManager/viewVideoModel/') }}' + uri_param,
                    'width' : 900
                });
                --}}
                window.open('{{ site_url('/live/videoManager/viewFullVideoModel/') }}' + uri_param);
            });

            // 순서 변경
            $('.btn-reorder').on('click', function() {
                if (!confirm('변경된 순서를 적용하시겠습니까?')) {
                    return;
                }

                var $order_num = $list_form.find('input[name="order_num"]');
                var $params = {};
                $order_num.each(function(idx) {
                    // 정렬순서 값이 변하는 경우에만 파라미터 설정
                    if ($(this).val() != $(this).data('origin-order-num')) {
                        $params[$(this).data('idx')] = $(this).val();
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };
                sendAjax('{{ site_url('/live/videoManager/reorder') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace(location.pathname + dtParamsToQueryString($datatable));
                    }
                }, showError, false, 'POST');
            });

            $('.btn_board').click(function() {
                var site_code = $('#search_site_code').val();
                var bm_idx = $(this).data('bm-idx');
                var modal_path = '';
                if (bm_idx == '82') {
                    modal_path = 'ListOfflineBoardModal';
                } else if (bm_idx == '83') {
                    modal_path = 'ListLiveLectureMaterialModal';
                }

                $('.btn_board').setLayer({
                    "url" : "{{ site_url('/live/videoManager/') }}" + modal_path + '/' + bm_idx + '?site_code=' + site_code,
                    "width" : "1200"
                });
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_campus').search($search_form.find('select[name="search_campus_ccd"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .column('.searching_site_code').search($search_form.find('select[name="search_site_code"]').val())
                .draw();
        }
    </script>
@stop
