@extends('lcms.layouts.master')

@section('content')
    <h5>- 장바구니에 담은 전체 주문내역 확인 및 관리자가 별도 장바구니 담기를 진행할 수 있습니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>장바구니 담기</h2>
            <div class="pull-right">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong>회원등록</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <div class="bdt-line"></div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="search_mem_type_1">등록구분 <span class="required">*</span>
                            </label>
                            <div class="col-md-10 item">
                                <div class="radio">
                                    <input type="radio" id="search_mem_type_1" name="search_mem_type" class="flat" value="S" title="등록구분" required="required" checked="checked"/> <label for="search_mem_type_1" class="input-label">개별등록</label>
                                    <input type="radio" id="search_mem_type_2" name="search_mem_type" class="flat" value="F"/> <label for="search_mem_type_2" class="input-label">일괄등록</label>
                                </div>
                            </div>
                        </div>
                        <div id="search_mem_type_S" class="form-group form-regi-input">
                            <label class="control-label col-md-1" for="search_mem_id">개별등록
                            </label>
                            <div class="col-md-10 form-inline">
                                <input type="text" id="search_mem_id" name="search_mem_id" class="form-control" title="회원검색어" value="" style="width: 180px;">
                                <button type="button" name="btn_member_search" data-result-type="multiple" class="btn btn-primary mb-0">회원검색</button>
                                <span id="selected_member" class="pl-10"></span>
                            </div>
                        </div>
                        <div id="search_mem_type_F" class="form-group form-regi-input hide">
                            <label class="control-label col-md-1" for="search_mem_file">일괄등록
                            </label>
                            <div class="col-md-10 form-inline">
                                <input type="file" id="search_mem_file" name="search_mem_file" class="form-control" title="회원검색파일" value="">
                                <button type="button" name="btn_member_file_upload" class="btn btn-primary mb-0">업로드하기</button>
                                <span id="selected_member_file" class="hide"></span>
                            </div>
                            <div class="col-md-10 col-md-offset-1 mt-5">
                                <p class="form-control-static"># 첨부파일은 한줄에 한 개의 아이디로 구성된 TXT 파일로 생성</p>
                            </div>
                            <div class="col-md-2 col-md-offset-1 mt-5">
                                <select class="form-control" id="selected_member_file2" name="selected_member_file2" size="4">
                                </select>
                            </div>
                            <div class="col-md-2">
                                <p class="form-control-static">&lt;총 <span id="selected_member_cnt">0</span>명&gt;</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-30">
                    <div class="col-md-12">
                        <h4><strong>상품등록</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <div class="bdt-line"></div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="prod_type_1">상품구분 <span class="required">*</span>
                            </label>
                            <div class="col-md-10 item">
                                <div class="radio">
                                    @foreach($arr_prod_type_target_name as $ccd => $name)
                                        <input type="radio" id="prod_type_{{ $loop->index }}" name="prod_type" class="flat" value="{{ array_search($ccd, $arr_prod_type_target_ccd) }}" @if($loop->index === 1) required="required" title="상품구분" checked="checked" @endif/>
                                        <label for="prod_type_{{ $loop->index }}" class="input-label">{{ $name }}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="">상품검색 <span class="required">*</span>
                            </label>
                            <div class="col-md-10 form-inline">
                                <button type="button" id="btn_product_search" class="btn btn-sm btn-primary">상품검색</button>
                                <span id="selected_product" class="pl-10"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="admin_reg_reason">등록사유 <span class="required">*</span>
                            </label>
                            <div class="col-md-9 item">
                                <input type="text" id="admin_reg_reason" name="admin_reg_reason" class="form-control" title="등록사유" required="required" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">장바구니 담기</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
    <script src="/public/js/lms/search_member.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 장바구니 담기 버튼 클릭
            $regi_form.submit(function() {
                // 상품코드에 상품타입과 학습형태 추가
                $regi_form.find('input[name="prod_code[]"]').each(function(idx) {
                    $(this).val($(this).val() + ':' + $(this).data('prod-type') + ':' + $(this).data('learn-pattern-ccd'));
                });

                var _url = '{{ site_url('/pay/cart/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        goList();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            var addValidate = function() {
                if($regi_form.find('input[name="mem_idx[]"]').length < 1) {
                    alert('회원 선택은 필수입니다.');
                    return false;
                }
                if($regi_form.find('input[name="prod_code[]"]').length < 1) {
                    alert('상품 선택 필드는 필수입니다.');
                    return false;
                }

                if (!confirm('해당 회원의 장바구니에 해당 상품을 담으시겠습니까?')) {
                    return false;
                }

                return true;
            };

            // 상품검색 버튼 클릭
            $('#btn_product_search').on('click', function() {
                var prod_type = $regi_form.find('input[name="prod_type"]:checked').val();
                var site_code = '';

                if (prod_type === 'book') {
                    // 교재 검색
                    $('#btn_product_search').setLayer({
                        'url' : '{{ site_url('/common/searchBook/') }}?site_code=' + site_code + '&return_type=inline&target_id=selected_product&target_field=prod_code',
                        'width' : 1200
                    });
                } else {
                    // 강좌 검색
                    prod_type = prod_type.replace('_lecture', '');

                    $('#btn_product_search').setLayer({
                        'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + site_code + '&prod_type='+prod_type+'&return_type=inline&target_id=selected_product&target_field=prod_code',
                        'width' : 1200
                    });
                }
            });

            // 상품 삭제
            $regi_form.on('click', '.selected-product-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            // 목록 이동
            $('#btn_list').click(function() {
                goList();
            });

            var goList = function() {
                location.replace('{{ site_url('/pay/cart/index') }}' + getQueryString());
            };
        });
    </script>
@stop
