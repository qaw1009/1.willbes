@extends('lcms.layouts.master')
@section('content')
    <h5>- 사이트 섹션별 팝업를 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/site/popup/store") }}?bm_idx=45" novalidate>--}}
    {!! csrf_field() !!}
    {!! method_field($method) !!}
    <input type="hidden" name="p_idx" value="{{ $p_idx }}"/>
        <div class="x_panel">
            <div class="x_title">
                <h2>팝업관리 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="col-md-2 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : ''), true) !!}
                    </div>
                    <div class="col-md-5">
                        <p class="form-control-static">• 최초 등록 후 운영사이트, 카테고리 정보는 수정이 불가능합니다.</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        @if($method == 'PUT')
                            <p class="form-control-static">{{ $data['CateNames'] }}</p>
                        @else
                            <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                            <span id="selected_category" class="pl-10">
                                @if(isset($data['CateCodes']) === true)
                                    @foreach($data['CateCodes'] as $cate_code => $cate_name)
                                        <span class="pr-10">{{ $cate_name }}
                                            <a href="#none" data-cate-code="{{ $cate_code }}" class="selected-category-delete"><i class="fa fa-times red"></i></a>
                                            <input type="hidden" name="cate_code[]" value="{{ $cate_code }}"/>
                                        </span>
                                    @endforeach
                                @endif
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="popup_disp">노출섹션<span class="required">*</span></label>
                    <div class="col-md-2 item">
                        <select class="form-control" id="popup_disp" name="popup_disp" required="required" title="노출섹션">
                            <option value="">노출섹션</option>
                            @foreach($popup_disp as $key => $val)
                                <option value="{{$key}}" @if($key == $data['DispCcd'])selected="selected"@endif>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="popup_type">팝업구분<span class="required">*</span></label>
                    <div class="col-md-2 item">
                        <select class="form-control" id="popup_type" name="popup_type" required="required" title="팝업구분">
                            <option value="">팝업구분</option>
                            @foreach($popup_type as $key => $val)
                                <option value="{{$key}}" @if($key == $data['PopUpTypeCcd'])selected="selected"@endif>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="popup_name">팝업명<span class="required">*</span></label>
                    <div class="col-md-7 item">
                        <input type="text" id="popup_name" name="popup_name" required="required" class="form-control" maxlength="100" title="팝업명" value="{{ $data['PopUpName'] }}" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="disp_start_datm">노출시간</label>
                    <div class="col-md-4 form-inline">
                        <div class="input-group mb-0">
                            <input type="text" class="form-control datepicker" id="disp_start_datm" name="disp_start_datm" value="{{$data['DispStartDatm']}}">
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="disp_start_time" name="disp_start_time">
                                    @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == substr($data['DispStartDatm'], 11, 2)) ? "selected='selected'" : "";
                                        echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                    @endphp
                                </select>
                            </div>
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <input type="text" class="form-control datepicker" id="disp_end_datm" name="disp_end_datm" value="{{$data['DispEndDatm']}}">
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="disp_end_time" name="disp_end_time">
                                    @php
                                        for($i=0; $i<=23; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == substr($data['DispEndDatm'], 11, 2)) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>" ;
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">• 노출기간 미 입력 시 '진행상태'로 오픈 여부 설정</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="top_pixel">팝업위치<span class="required">*</span></label>
                    <div class="col-md-3">
                        <div class="control-label col-md-2">[상단]</div>
                        <div class="col-md-3 item">
                            <input type="text" id="top_pixel" name="top_pixel" required="required" class="form-control" title="상단" value="{{ $data['TopPixel'] }}">
                        </div>
                        <div class="control-label col-md-2">[좌측]</div>
                        <div class="col-md-3 item">
                            <input type="text" id="left_pixel" name="left_pixel" required="required" class="form-control" title="좌측" value="{{ $data['LeftPixel'] }}">
                        </div>
                    </div>

                    <label class="control-label col-md-1">팝업사이즈<span class="required">*</span></label>
                    <div class="col-md-3">
                        <div class="control-label col-md-2">[가로]</div>
                        <div class="col-md-3 item">
                            <input type="text" id="width_size" name="width_size" required="required" class="form-control" title="가로" value="{{ $data['Width'] }}">
                        </div>
                        <div class="control-label col-md-2">[세로]</div>
                        <div class="col-md-3 item">
                            <input type="text" id="height_size" name="height_size" required="required" class="form-control" title="좌측" value="{{ $data['Height'] }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="link_type_self">링크방식<span class="required">*</span></label>
                    <div class="col-md-3 item form-inline">
                        <div class="radio pt-5">
                            <input type="radio" id="link_type_self" name="link_type" class="flat" value="self" required="required" title="링크방식" @if($method == 'POST' || $data['LinkType']=='self')checked="checked"@endif/> <label for="link_type_self" class="hover mr-5">본창</label>
                            <input type="radio" id="link_type_blank" name="link_type" class="flat" value="blank" @if($data['LinkType']=='blank')checked="checked"@endif/> <label for="link_type_blank" class="">새창</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="link_url">링크주소<span class="required">*</span></label>
                    <div class="col-md-6 item">
                        <input type="text" id="link_url" name="link_url" required="required" class="form-control" title="링크주소" value="{{ $data['LinkUrl'] }}" placeholder="링크주소 입니다.">
                        <div class="mt-10">• 프로토콜 (http, https) <span class="red bold">제외하고, 실제 서비스 도메인을 포함하여 입력 (예: police.willbes.net/home/index/cate/3001)</span></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="attach_img">팝업이미지<span class="required">*</span></label>
                    <div class="col-md-9 item form-inline">
                        <div class="title">
                            <!--div class="filetype">
                                <input type="text" class="form-control file-text" disabled="">
                                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                                <span class="file-select file-btn"-->
                                <input type="file" id="attach_img" name="attach_img" @if($method == 'POST')required="required"@endif class="form-control input-file" title="팝업 이미지">
                                <!--/span>
                            </div-->
                        </div>
                    </div>
                    @if($method == 'PUT')
                    <div class="col-md-9 col-lg-offset-2 item form-inline mt-5">
                        <img src="{{$data['PopUpFullPath']}}{{$data['PopUpImgName']}}">
                    </div>
                    <div class="col-md-9 col-lg-offset-2 item form-inline mt-5">
                        <b>{{$data['PopUpImgRealName']}}</b>
                        {{--<a href="#none" class="img-delete" data-attach-idx="{{$data['PIdx']}}"><i class="fa fa-times red"></i></a>--}}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="image_map">이미지맵</label>
                    <div class="col-md-7 item">
                        <div class="x_panel mb-0">
                            <div class="x_content pb-0">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <table id="image_map_table" class="table table-striped">
                                            <thead>
                                            <tr>
                                                <td>이미지맵타입</td>
                                                <td>이미지맵</td>
                                                <td>링크URL</td>
                                                <td>필드삭제</td>
                                                <td class="text-right"><button type="button" class="btn btn-sm btn-success btn-image-map-add">필드 추가</button></td>
                                            </tr>
                                            </thead>
                                            <tbody class="form-group-sm">
                                            @if($method == 'POST')
                                                <tr>
                                                    <td>
                                                        <select class="form-control" name="image_map_type[]" title="이미지맵 타입">
                                                            <option value="default">전체영역</option>
                                                            <option value="rect">사각형영역</option>
                                                            <option value="circle">원형영역</option>
                                                            <option value="poly">다각형영역</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="image_map_area[]" class="form-control" title="이미지맵" value=""></td>
                                                    <td><input type="text" name="image_map_link_url[]" class="form-control" title="링크주소" value=""></td>
                                                    <td colspan="2">
                                                        <a href="#none" class="btn-image-map-delete"><i class="fa fa-times fa-lg red"></i></a>
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach($data['imageMaps'] as $row)
                                                    <tr>
                                                        <td>
                                                            <select class="form-control" name="image_map_type[]" title="이미지맵 타입">
                                                                <option value="default" @if($row['ImgType'] == 'default')selected="selected"@endif>전체영역</option>
                                                                <option value="rect" @if($row['ImgType'] == 'rect')selected="selected"@endif>사각형영역</option>
                                                                <option value="circle" @if($row['ImgType'] == 'circle')selected="selected"@endif>원형영역</option>
                                                                <option value="poly" @if($row['ImgType'] == 'poly')selected="selected"@endif>다각형영역</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" name="image_map_area[]" class="form-control" title="이미지맵" value="{{$row['ImgArea']}}"></td>
                                                        <td><input type="text" name="image_map_link_url[]" class="form-control" title="링크주소" value="{{$row['LinkUrl']}}"></td>
                                                        <td>
                                                            <a href="#none" class="btn-image-map-delete"><i class="fa fa-times fa-lg red"></i></a>
                                                        </td>
                                                        <td><button type="button" class="btn btn-sm btn-danger btn-image-map-is-status" data-image-map-idx="{{$row['PuiIdx']}}">개별삭제</button></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-2 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/><label for="is_use_y" class="hover mr-5">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="">미사용</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="order_num">정렬</label>
                    <div class="col-md-1">
                        <input type="text" id="order_num" name="order_num" class="form-control" maxlength="3" title="정렬" value="{{ $data['OrderNum'] }}" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="desc">설명</label>
                    <div class="col-md-9">
                        <textarea id="desc" name="desc" class="form-control" rows="3" title="설명" placeholder="">{!! $data['Desc'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegDatm'] }}@endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdDatm'] }}@endif</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            // 운영사이트 변경
            $regi_form.on('change', 'select[name="site_code"]', function() {
                // 카테고리 검색 초기화
                $regi_form.find('input[name="cate_code"]').val('');
                $('#selected_category').html('');
            });

            // 카테고리 검색
            $('#btn_category_search').on('click', function(event) {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.')
                    return;
                }

                $('#btn_category_search').setLayer({
                    'url' : '{{ site_url('/common/searchCategory/index/multiple/site_code/') }}' + site_code,
                    'width' : 900
                });
            });

            // 카테고리 삭제
            $regi_form.on('click', '.selected-category-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            // 이미지맵 필드 추가
            $regi_form.on('click', '.btn-image-map-add', function() {
                var $table = $('#image_map_table');
                // 첫번째 tr 복사하여 추가
                $table.find('tbody tr:eq(0)').clone().appendTo($table);
            });

            // 이미지맵 필드 삭제
            $regi_form.on('click', '.btn-image-map-delete', function() {
                var that = $(this);

                if (that.parents('tbody').children('tr').length > 1) {
                    // 행 삭제
                    $(this).parent().parent('tr').remove();
                } else {
                    alert('최소 1개의 행이 필요합니다. 삭제하실 수 없습니다.');
                }
            });

            $regi_form.on('click', '.btn-image-map-is-status', function() {
                var _url = '{{ site_url("/site/popup/delImageMap") }}' + getQueryString();
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'pui_idx' : $(this).data('image-map-idx')
                };
                if (!confirm('삭제하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/popup") }}/' + getQueryString();
            });

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/site/popup/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/popup") }}/' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                var site_all_code = "{{config_item('app_intg_site_code')}}";

                @if($method == 'POST')
                if(site_code != site_all_code && $regi_form.find('input[name="cate_code[]"]').length < 1) {
                    alert('카테고리 선택 필드는 필수입니다.');
                    return false;
                }
                @endif
                    return true;
            }
        });
    </script>
@stop