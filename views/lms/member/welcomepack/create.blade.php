@extends('lcms.layouts.master')

@section('content')
    <h5>- 회원가입시 증정되는 월컴팩 상세페이지 입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>등록 정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">적용 관심직렬<span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        <select class="form-control" id="wInterestCode" name="wInterestCode" required="required" title="관심직렬">
                            <option value="">관심직렬 선택</option>
                            @foreach($wInterestCode as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static"> 최초 등록 후 관심직렬, 분류, 상품정보는 수정이 불가능합니다.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">분류 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <select class="form-control" id="wType" name="wType" required="required" title="분류">
                            <option value="">분류 선택</option>
                            <option value="C">쿠폰</option>
                            <option value="L">강좌</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">정보 불러오기 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <button type="button" id="btn_coupon_search" class="btn btn-sm btn-primary" style="display:none;">쿠폰검색</button>
                        <button type="button" id="btn_lecture_search" class="btn btn-sm btn-primary" style="display:none;">강좌검색</button>
                        <span id="selected_product" class="pl-10"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <label><input type="radio" name="IsStatus" value="Y" /> 사용 </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" name="IsStatus" value="N" checked /> 미사용 </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">설명 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <textarea name="wDesc" id="wDesc" style="width:300px;" ></textarea>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/member/welcomepack/store/') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/member/welcomepack/') }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });


            $("#wType").on('change', function() {
                $("#btn_coupon_search").hide();
                $("#btn_lecture_search").hide();
                $("#wCode").val('');
                $("#wCodeText").innerText = '';

                if(this.value == "C") {
                    $("#btn_coupon_search").show();
                } else if(this.value == "L") {
                    $("#btn_lecture_search").show();
                }
            });


            function addValidate() {
                if($("#wType").val() == "C"){
                    if($regi_form.find('input[name="CouponIdx[]"]').length != 1){
                        alert('쿠폰은 1개만 선택해주십시요.');
                        return false;
                    }
                } else if($("#wType").val() == "L") {
                    if($regi_form.find('input[name="prod_code[]"]').length != 1){
                        alert('강좌는 1개만 선택해주십시요.');
                        return false;
                    }
                } else {
                    alert('알수없는 분류입니다.');
                    return false;
                }

                if(confirm('월컴팩은 등록후에 상태변경만 가능합니다. \n등록하시겠습니까?')){
                    return true;
                } else {
                    return false;
                }
            }

            // 쿠폰검색
            $('#btn_coupon_search').on('click', function() {
                var prod_type = 'on';
                var site_code = '';

                $('#btn_coupon_search').setLayer({
                    'url' : '{{ site_url('/common/searchCoupon/') }}?site_code=' + site_code + '&prod_type='+prod_type+'&locationid=selected_product',
                    'width' : 1200
                });

                $('#selected_product').html('');    // 기 선택 상품 초기화
            });

            // 강좌검색
            $('#btn_lecture_search').on('click', function (){
                var prod_type = 'on';
                var site_code = '2001';

                $('#btn_lecture_search').setLayer({
                    'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + site_code + '&prod_type='+prod_type+'&return_type=inline&target_id=selected_product&target_field=prod_code&is_event=Y',
                    'width' : 1200
                });

                $('#selected_product').html('');    // 기 선택 상품 초기화
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/member/welcomepack/') }}' + getQueryString());
            });

            $('#selected_product').on('change', function() {
                if($("#wType").val() == "C"){
                    if ($(this).find('input[name="CouponIdx[]"]').length > 1) {
                        alert('등록할 상품을 1건만 선택해 주세요.');
                        $(this).html('');
                    }
                } else if($("#wType").val() == "L") {
                    if ($(this).find('input[name="prod_code[]"]').length > 1) {
                        alert('등록할 상품을 1건만 선택해 주세요.');
                        $(this).html('');
                    }
                } else {
                    alert('알수없는 분류입니다.');
                    $(this).html('');
                    return false;
                }
            });

            // 상품 삭제
            $regi_form.on('click', '.selected-product-delete', function() {
                var that = $(this);
                that.parent().remove();
            });
        });

        function rowDelete(strRow) {
            $('#'+strRow).remove();
        }
    </script>
@stop
