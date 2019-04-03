@extends('lcms.layouts.master')

@section('content')
    <h5>- 회원이 작성한 수강후기를 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="read_form" name="read_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_title">
                <h2>수강후기관리 정보</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1">운영사이트</label>
                    <div class="form-control-static col-md-4">
                        {{$product_data['SiteName']}}
                    </div>
                    <label class="control-label col-md-1-1 d-line">카테고리</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$product_data['CateName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">학습형태</label>
                    <div class="form-control-static col-md-4">
                        {{$product_data['LearnPatternCcdName']}}
                    </div>
                    <label class="control-label col-md-1-1 d-line">과목명</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$product_data['SubjectName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">강좌명</label>
                    <div class="form-control-static col-md-4">
                        {{$product_data['ProdName']}}
                    </div>
                    <label class="control-label col-md-1-1 d-line">교수명</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$product_data['wProfName_String']}}
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="button" class="pull-right btn btn-primary" id="btn_list">목록</button>
                </div>
            </div>
        </div>
    </form>

    <div class="x_panel">
        <div class="x_title">
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <table id="list_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>전체선택 <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
                    <th>No</th>
                    <th>제목</th>
                    <th>평점</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>수정자</th>
                    <th>수정일</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <!-- start rating -->
    <link href="/public/vendor/start-rating/starrating.css" rel="stylesheet">
    <script src="/public/vendor/start-rating/jquery.starrating.js"></script>
    <script type="text/javascript">
        var $datatable;
        var $read_form = $('#read_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                buttons: [
                    { text: '<i class="fa fa-check mr-10"></i> 사용', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-is-useY' },
                    { text: '<i class="fa fa-exclamation mr-10"></i> 미사용', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-is-useN' },
                ],
                ajax: {
                    'url' : '{{ site_url("/board/{$boardName}/listAjaxLectureForBoard/{$prod_code}?") }}' + '{!! $boardDefaultQueryString !!}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($read_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" name="is_use" value="Y" class="flat" data-is-use-idx="' + row.BoardIdx + '"/>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'className' : 'details-control cs-pointer', 'data' : 'Title', 'render' : function(data, type, row, meta) {
                            return '<b>'+data+'</b>';
                        }},
                    {'data' : 'LecScore', 'render' : function(data, type, row, meta) {
                            return '<ul class="star-rating" id="starRating' + row.BoardIdx + '" data-stars="5" data-current="'+data+'" data-static="true"></ul>';
                        }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '사용' : '<p class="red">미사용</p>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            if (row.RegType == '1') {
                                return row.RegMemName;
                            } else {
                                return row.RegMemName+'<br>'+'('+row.RegMemId+')';
                            }
                        }},
                    {'data' : 'RegDatm'},
                    {'data' : 'UpdAdminName'},
                    {'data' : 'UpdDatm'}
                ],
                "initComplete": function(settings, json) {
                    $.each(json.data, function(i, item) {
                        $('#starRating' + item.BoardIdx).starRating();
                    });
                }
            });

            $('#list_table tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = $datatable.row(tr);

                if ( row.child.isShown() ) {
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    row.child(row.data().Content).show();
                    tr.addClass('shown');
                }
            });

            // 전체선택
            $datatable.on('ifChanged', '#_is_all', function() {
                if ($(this).prop('checked') === true) {
                    $('input[name="is_use"]').iCheck('check');
                } else {
                    $('input[name="is_use"]').iCheck('uncheck');
                }
            });

            $('.btn-is-useY').on('click', function() {
                boradIsUse('Y', '사용');
            });

            $('.btn-is-useN').on('click', function() {
                boradIsUse('N', '미사용');
            });
        });

        // 목록 버튼 클릭
        $('#btn_list').click(function() {
            location.href='{{ site_url("/board/{$boardName}") }}' + getQueryString();
        });

        function boradIsUse(val, msg) {
            var $params = {};
            var _url = '{{ site_url("/board/{$boardName}/boardIsUse/") }}' + val + '?' + '{!! $boardDefaultQueryString !!}';

            $('input[name="is_use"]:checked').each(function() {
                $params[$(this).data('is-use-idx')] = $(this).val();
            });

            if (Object.keys($params).length <= '0') {
                alert('적용할 게시글을 선택해주세요.');
                return false;
            }

            var data = {
                '{{ csrf_token_name() }}' : $read_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'PUT',
                'target' : JSON.stringify($params)
            };

            if (!confirm('선택한 게시물을 ' + msg + ' 처리하시겠습니까?')) {
                return;
            }
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable.draw();
                }
            }, showError, false, 'POST');
        }
    </script>
@stop