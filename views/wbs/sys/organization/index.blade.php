@extends('lcms.layouts.master')

@section('content')
    <link href="/public/vendor/bootstrap-treeview/css/bootstrap-treeview.css" rel="stylesheet">
    <h5>- 조직도를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
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
        <!--
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            </div>
        </div>
        -->
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <div class="row">
                <div class="col-sm-5">
                    <h2></h2>
                    <div id="tree_view" class=""></div>
                </div>
                <div class="col-sm-7">
                    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        <input type="hidden" id="org_idx" name="org_idx" value=""/>
                        <input type="hidden" id="old_org_code" name="old_org_code" value=""/>
                        <input type="hidden" id="old_org_name" name="old_org_name" value=""/>

                        <div class="x_panel">
                            <div class="form-group">
                                <label class="control-label col-md-8" for="" style="text-align: left !important;"><h2 class="detail_title">조직 정보</h2></label>
                                <div class="col-md-3 col-lg-offset-1">
                                    <button type="button" class="btn btn-default btn-sm btn-primary mt-10 ml-20" id="btn_regist">하위 조직 추가</button>
                                </div>
                            </div>
                            <div class="x_content">

                                <div class="form-group">
                                    <label class="control-label col-md-1-1" for="org_code">조직코드<span class="required">*</span></label>
                                    <div class="col-md-10 item">
                                        <input type="text" id="org_code" name="org_code" required="required" class="form-control" maxlength="46" title="조직코드" value="" placeholder="">
                                        <div class="col-md-10 mt-5">
                                            • 뒤 2자리를 제외한 코드가 상위조직과 동일해야합니다.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-1-1" for="org_name">조직명<span class="required">*</span></label>
                                    <div class="col-md-10 item">
                                        <input type="text" id="org_name" name="org_name" required="required" class="form-control" maxlength="46" title="조직명" value="" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-1-1" for="order_num">정렬순서<span class="required">*</span></label>
                                    <div class="col-md-10 item">
                                        <input type="text" id="order_num" name="order_num" required="required" class="form-control" maxlength="46" title="정렬순서" value="" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-1-1" for="org_desc">설명</label>
                                    <div class="col-md-10">
                                        <textarea id="org_desc" name="org_desc" class="form-control" rows="7" title="설명" placeholder=""></textarea>
                                    </div>
                                </div>

                                <label class="control-label col-md-1-1 d-line" for="is_use_y">사용여부<span class="required">*</span></label>
                                <div class="col-md-10">
                                    <div class="radio">
                                        <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" checked="checked"/> <label for="is_use_y" class="input-label">사용</label>
                                        <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" /> <label for="is_use_n" class="input-label">미사용</label>
                                    </div>
                                </div>

                                <div class="form-group text-center btn-wrap mt-50">
                                    <button type="submit" class="btn btn-success mr-10">저장</button>
{{--                                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>--}}
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <script src="/public/vendor/bootstrap-treeview/js/bootstrap-treeview.js"></script>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_form = $('#list_form');
        var $regi_form = $('#regi_form');
        var $tree_view = null;

        var $params = {};
        $(document).ready(function() {

            // 검색 이벤트
            var search = function(e) {
                var pattern = $('#search_value').val();
                var options = {
                    ignoreCase: false,
                    exactMatch: false,
                    revealResults: false
                };
                var results = $tree_view.treeview('search', [ pattern, options ]);

                //var output = '<p>' + results.length + ' matches found</p>';
                //$.each(results, function (index, result) {
                    // output += '<p>- ' + result.text + '</p>';
                //});
                // $('#search-output').html(output);
            }
            $('#btn_search').on('click', search);
            $('#search_value').on('keyup', search);

            // 하위조직 추가폼 버튼 이벤트
            $('#btn_regist').click(function() {

                var org_idx = $regi_form.find('input[name="org_idx"]').val();
                var old_org_code = $regi_form.find('input[name="old_org_code"]').val();
                var old_org_name = $regi_form.find('input[name="old_org_name"]').val();

                if(!org_idx){
                    alert('상위 조직을 선택 해주세요.'); return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };

                // 등록될 조직코드 조회
                sendAjax('{{ site_url('/sys/organization/getNewOrgCode/') }}' + old_org_code, data, function(ret) {
                    $('.detail_title').html(old_org_name + ' - 하위 조직 추가');
                    $regi_form.find('input[name="org_idx"]').val('');
                    $regi_form.find('input[name="org_code"]').val(ret.new_org_code);
                    $regi_form.find('input[name="org_name"]').val('');
                    $regi_form.find('input[name="order_num"]').val(ret.new_order_num);
                    $regi_form.find('textarea[name="org_desc"]').val('');
                    $('#is_use_y').prop("checked", true).iCheck('update');
                    $('#is_use_n').prop("checked", false).iCheck('update');
                });
            });

            // 저장 이벤트
            $regi_form.submit(function() {
                ajaxSubmit($regi_form, '{{ site_url('/sys/organization/store') }}', function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        listAjax();
                    }
                }, showValidateError, null, false, 'alert');
            });

            listAjax(); //리스트 조회
        });

        function listAjax() {
            var data = {
                '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'PUT',
                'params' : JSON.stringify($params)
            };
            sendAjax('{{ site_url('/sys/organization/listAjax') }}', data, function(ret) {
                if(ret.data) {
                    $tree_view = $('#tree_view').treeview({
                        data: ret.data,
                        multiSelect: false,
                        onNodeSelected: function(event, node) {
                            $('.detail_title').html(node.wOrgName + ' 상세정보');
                            $regi_form.find('input[name="org_idx"]').val(node.wOrgIdx);
                            $regi_form.find('input[name="org_code"]').val(node.wOrgCode);
                            $regi_form.find('input[name="org_name"]').val(node.wOrgName);
                            $regi_form.find('input[name="order_num"]').val(node.wOrderNum);
                            $regi_form.find('textarea[name="org_desc"]').val(node.wOrgDesc);

                            $regi_form.find('input[name="old_org_code"]').val(node.wOrgCode);
                            $regi_form.find('input[name="old_org_name"]').val(node.wOrgName);

                            if(node.wIsUse == 'Y') {
                                $('#is_use_y').prop("checked", true).iCheck('update');
                                $('#is_use_n').prop("checked", false).iCheck('update');
                            } else {
                                $('#is_use_y').prop("checked", false).iCheck('update');
                                $('#is_use_n').prop("checked", true).iCheck('update');
                            }
                        },
                        onNodeUnselected: function (event, node) {
                        },
                    });
                    $tree_view.treeview('expandAll', { levels: 50, silent: true }); //초기 전체 열기
                }
            }, showError, false, 'POST');
        }

    </script>
@stop
