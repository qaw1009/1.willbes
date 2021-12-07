@extends('lcms.layouts.master')
@section('content')
    <h5>- 임용전용 핫클립 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="cate_code" value="{{ $data['CateCode'] }}" title="카테고리 선택" required="required"/>
        <input type="hidden" name="temp_view_type"/>
        <input type="hidden" name="idx" value="{{ $idx }}"/>
        <span id="del_thumbnail_inputbox"></span>

        <div class="x_panel">
            <div class="x_title">
                <h2>핫클립정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                    @if($method == 'PUT')<button type="button" class="btn btn-danger btn-delete" data-phc-idx="{{$idx}}">삭제</button>@endif
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        {!! html_site_select('2017', 'site_code', 'site_code', '', '운영 사이트', 'required', '', true) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">그룹선택 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline item">
                        <select class="form-control" id="hotclip_group_idx" name="hotclip_group_idx" required="required" title="그룹">
                            <option value="">그룹선택</option>
                            <optgroup label="==메인==">
                                @foreach($group_list as $row)
                                    @if($row['ViewType'] == 1)
                                        <option class="{{ $row['SiteCode'] }}"
                                                data-view-type="{{ $row['ViewType'] }}"
                                                value="{{ $row['PhcgIdx'] }}" {{ ($row['PhcgIdx'] == $data['PhcgIdx'] ? 'selected="selected"' : '') }}>
                                            {{ $row['Title'] }} [{{ ($row['IsUse'] == 'Y' ? '사용' : '미사용') }}]
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                            <optgroup label="==이벤트==">
                                @foreach($group_list as $row)
                                    @if($row['ViewType'] == 2)
                                        <option class="{{ $row['SiteCode'] }}"
                                                data-view-type="{{ $row['ViewType'] }}"
                                                value="{{ $row['PhcgIdx'] }}" {{ ($row['PhcgIdx'] == $data['PhcgIdx'] ? 'selected="selected"' : '') }}>
                                            {{ $row['Title'] }} [{{ ($row['IsUse'] == 'Y' ? '사용' : '미사용') }}]
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        @if($method == 'PUT' && empty($data['CateCode']) === false)
                            <p class="form-control-static">{{ $data['CateRouteName'] }}</p>
                        @else
                            <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                            <span id="selected_category" class="pl-10">{{ $data['CateRouteName'] }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">과목/교수정보<span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <button type="button" id="btn_prof_subject_search" class="btn btn-sm btn-primary">과목/교수검색</button>
                        <span id="selected_prof_subject" class="pl-10">
                            @if($method == 'PUT' && empty($data['ProfSubjectName']) === false)
                            <span class="pr-10">{{ $data['ProfSubjectName'] }}
                                <a href="javascript:void(0);" data-prof-subject-idx="{{ $data['ProfSubjectIdx'] }}" class="selected-prof-subject-delete"><i class="fa fa-times red"></i></a>
                                <input type="hidden" name="prof_subject_idx[]" value="{{ $data['ProfSubjectIdx'] }}"/>
                            </span>
                            @endif
                        </span>
                        <p class="form-control-static"># 단일 선택만 가능합니다.</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">교수배경이미지<span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <input type="file" class="form-control input-file" id="professor_bg_image" name="professor_bg_image" title="교수배경이미지"/>
                        @if($method == 'PUT')
                            <p class="form-control-static ml-10 mr-10">
                                [ <a href="{{ $data['ProfBgImagePath'] . $data['ProfBgImageName'] }}" rel="popup-image">{{ $data['ProfBgImageRealName'] }}</a> ]
                            </p>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">교수홈버튼 노출여부<span class="required">*</span>
                    </label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="prof_btn_isUse_y" name="prof_btn_isUse" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['ProfBtnIsUse']=='Y')checked="checked"@endif/> <label for="prof_btn_isUse_y" class="input-label">사용</label>
                            <input type="radio" id="prof_btn_isUse_n" name="prof_btn_isUse" class="flat" value="N" @if($data['ProfBtnIsUse']=='N')checked="checked"@endif/> <label for="prof_btn_isUse_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">커리큘럼버튼 노출여부<span class="required">*</span>
                    </label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="curriculum_btn_is_use_y" name="curriculum_btn_is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['CurriculumBtnIsUse']=='Y')checked="checked"@endif/> <label for="curriculum_btn_is_use_y" class="input-label">사용</label>
                            <input type="radio" id="curriculum_btn_is_use_n" name="curriculum_btn_is_use" class="flat" value="N" @if($data['CurriculumBtnIsUse']=='N')checked="checked"@endif/> <label for="curriculum_btn_is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">수강후기버튼 노출여부<span class="required">*</span>
                    </label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="studycomment_btn_is_use_y" name="studycomment_btn_is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['StudyCommentBtnIsUse']=='Y')checked="checked"@endif/> <label for="studycomment_btn_is_use_y" class="input-label">사용</label>
                            <input type="radio" id="studycomment_btn_is_use_n" name="studycomment_btn_is_use" class="flat" value="N" @if($data['StudyCommentBtnIsUse']=='N')checked="checked"@endif/> <label for="studycomment_btn_is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="event">
                    <div class="form-group">
                        <label class="control-label col-md-1-1" for="subject_idx">임용 온라인강좌<span class="required">*</span></label>
                        <div class="col-md-10">
                            <button type="button" class="btn btn-sm btn-primary btn_product_search" data-site-code="2017" data-product-type="on" data-target-id="online_box">상품검색</button>
                            <span id="online_box" class="hide"></span>
                            <table class="table table-striped table-bordered mt-15" id="table_product_on">
                                <thead>
                                <tr>
                                    <th>강좌명</th>
                                    <th>상품종류</th>
                                    <th>논술포함여부</th>
                                    <th>DP순서</th>
                                    <th>삭제</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (empty($list_product['636001']) === false)
                                    @php $i=1; @endphp
                                    @foreach($list_product['636001'] as $row)
                                        <tr>
                                            <td>
                                                <input type="hidden" name="pp_idx[]" value="{{$row['PpIdx']}}">
                                                <input type="hidden" name="prod_code[]" value="{{$row['ProdCode']}}">
                                                [{{$row['ProdCode']}}] {{$row['ProdName']}}
                                            </td>
                                            <td>{{$row['LearnPatternCcdName']}}</td>
                                            <td class="form-inline">
                                                <select class="form-control" name="is_essay[]">
                                                    <option value="X" {{ ($row['IsEssay'] == 'X' ? 'selected="selected"' : '') }}>해당없음</option>
                                                    <option value="Y" {{ ($row['IsEssay'] == 'Y' ? 'selected="selected"' : '') }}>포함</option>
                                                    <option value="N" {{ ($row['IsEssay'] == 'N' ? 'selected="selected"' : '') }}>미포함</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="order_num[]" value="{{$row['OrderNum']}}">
                                            </td>
                                            <td>
                                                <a href="#none" class="btn-product-delete" data-pp-idx="{{$row['PpIdx']}}">
                                                    <i class="fa fa-times fa-lg red"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1-1" for="subject_idx">임용 학원강좌<span class="required">*</span></label>
                        <div class="col-md-10">
                            <button type="button" class="btn btn-sm btn-primary btn_product_search" data-site-code="2018" data-product-type="off" data-target-id="off_box">상품검색</button>
                            <span id="off_box" class="hide"></span>
                            <table class="table table-striped table-bordered mt-15" id="table_product_off">
                                <thead>
                                <tr>
                                    <th>강좌명</th>
                                    <th>상품종류</th>
                                    <th>논술포함여부</th>
                                    <th>DP순서</th>
                                    <th>삭제</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (empty($list_product['636002']) === false)
                                    @php $i=1; @endphp
                                    @foreach($list_product['636002'] as $row)
                                        <tr>
                                            <td>
                                                <input type="hidden" name="pp_idx[]" value="{{$row['PpIdx']}}">
                                                <input type="hidden" name="prod_code[]" value="{{$row['ProdCode']}}">
                                                [{{$row['ProdCode']}}] {{$row['ProdName']}}
                                            </td>
                                            <td>{{$row['LearnPatternCcdName']}}</td>
                                            <td class="form-inline">
                                                <select class="form-control" name="is_essay[]">
                                                    <option value="X" {{ ($row['IsEssay'] == 'X' ? 'selected="selected"' : '') }}>해당없음</option>
                                                    <option value="Y" {{ ($row['IsEssay'] == 'Y' ? 'selected="selected"' : '') }}>포함</option>
                                                    <option value="N" {{ ($row['IsEssay'] == 'N' ? 'selected="selected"' : '') }}>미포함</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="order_num[]" value="{{$row['OrderNum']}}">
                                            </td>
                                            <td>
                                                <a href="#none" class="btn-product-delete" data-pp-idx="{{$row['PpIdx']}}">
                                                    <i class="fa fa-times fa-lg red"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="thumbnail_box">썸네일Box 정보<span class="required">*</span></label>
                    <div class="col-md-10 item">
                        <table id="thumbnail_box_table" class="table table-striped">
                            <thead>
                            <tr>
                                <td style="width: 10%;">링크URL타입</td>
                                <td style="width: 30%;">썸네일(122X65)</td>
                                <td style="width: 50%;">링크url</td>
                                <td>필드삭제</td>
                                <td class="text-left"><button type="button" class="btn btn-sm btn-success btn-thumbnail-box-add">필드 추가</button></td>
                            </tr>
                            </thead>
                            <tbody class="form-group-sm">
                            @if($method == 'POST' || empty($list_thumbnail) === true)
                                <tr>
                                    <td>
                                        <select class="form-control" name="link_type[]" title="링크타입">
                                            <option value="layer">레이어팝업</option>
                                            <option value="self">페이지이동</option>
                                            <option value="blank">새창</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="file" name="thumbnail[]" class="form-control input-file" title="썸네일"/>
                                    </td>
                                    <td><input type="text" name="link_url[]" class="form-control" title="링크주소" value=""></td>
                                    <td colspan="2">
                                        <a href="javascript:void(0);" class="btn-thumbnail-box-delete"><i class="fa fa-times fa-lg red"></i></a>
                                    </td>
                                </tr>
                            @else
                                @foreach($list_thumbnail as $row)
                                    <tr>
                                        <input type="hidden" name="thumbnail_idx[]" value="{{$row['PhctIdx']}}">
                                        <td>
                                            <select class="form-control" name="link_type[]" title="링크타입">
                                                <option value="layer" @if($row['LinkType'] == 'layer')selected="selected"@endif>레이어팝업</option>
                                                <option value="self" @if($row['LinkType'] == 'self')selected="selected"@endif>페이지이동</option>
                                                <option value="blank" @if($row['LinkType'] == 'blank')selected="selected"@endif>새창</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="file" name="thumbnail[]" class="form-control input-file" title="썸네일"/>
                                            <p class="form-control-static ml-10 mr-10">
                                                [ <a href="{{ $row['ThumbnailPath'] . $row['ThumbnailFileName'] }}" rel="popup-image">{{ $row['ThumbnailRealName'] }}</a> ]
                                            </p>
                                        </td>
                                        <td><input type="text" name="link_url[]" class="form-control" title="링크주소" value="{{$row['LinkUrl']}}"></td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn-thumbnail-box-delete" data-del-thumbnail-idx="{{$row['PhctIdx']}}"><i class="fa fa-times fa-lg red"></i></a>
                                        </td>
                                        <td><button type="button" class="btn btn-sm btn-danger btn-is-status" data-phct-idx="{{$row['PhctIdx']}}">개별삭제</button></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="form-inline">
                            <div class="radio mr-30">
                                <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                                <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            $regi_form.find('select[name="hotclip_group_idx"]').chained("#site_code");

            $regi_form.on('change','select[name="site_code"]', function () {
                $('#selected_category').html('');
                $('#selected_prof_subject').html('');
            });

            var view_type = $("#hotclip_group_idx").find("option:selected").data("view-type");
            if (typeof view_type === 'undefined') {
                $('.event').hide();
            } else {
                viewType_Onoff(view_type);
            }

            $regi_form.on('change','select[name="hotclip_group_idx"]', function () {
                var view_type = $(this).find("option:selected").data("view-type");
                viewType_Onoff(view_type);
            });

            // 카테고리 검색
            $('#btn_category_search').on('click', function() {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return;
                }
                // 과목/교수 검색 초기화
                $('#selected_prof_subject').html('');
                $('#btn_category_search').setLayer({
                    'url' : '{{ site_url('/common/searchCategory/index/single/site_code/') }}' + site_code,
                    'width' : 900
                });
            });

            // 과목/교수 검색 버튼 클릭
            $('#btn_prof_subject_search').on('click', function(event) {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                var cate_code = $regi_form.find('input[name="cate_code"]').val();
                var search_url = '{{ site_url('/common/searchProfessorSubject/index/') }}';

                if (!site_code || !cate_code) {
                    alert('카테고리를 먼저 선택해 주십시오.');
                    return;
                }

                $('#btn_prof_subject_search').setLayer({
                    'url' : search_url + site_code + '/' + cate_code,
                    'width' : 900
                });
            });

            // 과목/교수 연결 데이터 삭제
            $regi_form.on('click', '.selected-prof-subject-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            // 배너 box 필드 추가
            $regi_form.on('click', '.btn-thumbnail-box-add', function() {
                var add_lists;
                add_lists = '<tr>';
                    add_lists += '<td>';
                        add_lists += '<select class="form-control" name="link_type[]" title="링크타입">';
                            add_lists += '<option value="layer">레이어팝업</option>';
                            add_lists += '<option value="self">페이지이동</option>';
                            add_lists += '<option value="blank">윈도우팝업</option>';
                        add_lists += '</select>';
                    add_lists += '</td>';
                    add_lists += '<td><input type="file" name="thumbnail[]" class="form-control input-file" title="썸네일"></td>';
                    add_lists += '<td><input type="text" name="link_url[]" class="form-control" title="링크주소" value=""></td>';
                    add_lists += '<td colspan="2"><a href="javascript:void(0);" class="btn-thumbnail-box-delete"><i class="fa fa-times fa-lg red"></i></a></td>';
                add_lists += '</tr>';
                $('#thumbnail_box_table > tbody:last').append(add_lists);
            });

            // 배너 box 삭제
            $regi_form.on('click', '.btn-thumbnail-box-delete', function() {
                var that = $(this);
                if (that.parents('tbody').children('tr').length > 1) {
                    if (typeof $(this).data("del-thumbnail-idx") !== 'undefined') {
                        $("#del_thumbnail_inputbox").append('<input type="hidden" name="del_thumbnail[]" value="' + $(this).data("del-thumbnail-idx") + '">');
                    }

                    $(this).parent().parent('tr').remove();
                } else {
                    alert('최소 1개의 행이 필요합니다. 삭제하실 수 없습니다.');
                }
            });

            //썸네일 개별 삭제
            $regi_form.on('click', '.btn-is-status', function() {
                var _url = '{{ site_url("/site/etc/professorHotClip/deleteThumbnail") }}/' + $(this).data('phct-idx');
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE'
                };
                if (!confirm('삭제하시겠습니까?')) { return; }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            // 강좌 검색
            $('.btn_product_search').on('click', function(event) {
                var site_code = $(this).data("site-code");
                var prod_type = $(this).data("product-type");
                var target_id = $(this).data("target-id");
                var target_field = 'prod_code';
                $('.btn_product_search').setLayer({
                    'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + site_code + '&prod_type='+prod_type+'&return_type=inline&target_id='+target_id+'&target_field='+target_field+'&is_event=Y',
                    'width' : 1200
                });
            });

            //강좌개별삭제
            $regi_form.on('click', '.btn-product-delete', function() {
                var _url = '{{ site_url("/site/etc/professorHotClip/deleteProduct") }}';
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'pp_idx' : $(this).data('pp-idx')
                };
                if (!confirm('정말로 삭제하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            $regi_form.on('change', '#online_box', function() {
                var code, data, html = '';
                var dp_prod_num = 0;
                var $tbody = $('#table_product_on tbody');
                $(this).find('input[name="prod_code[]"]').each(function() {
                    code = $(this).val();
                    data = $(this).data();
                    html += '<tr>';
                    html += '	<td>';
                    html += '		<input type="hidden" name="pp_idx[]" value=""> [' + code + '] ' + Base64.decode(data.prodName);
                    html += '		<input type="hidden" name="prod_code[]" value="' + code + '">';
                    html += '	</td>';
                    html += '	<td>' + data.learnPatternCcdName + '</td>';
                    html += '	<td class="form-inline">';
                    html += '		<select class="form-control" name="is_essay[]"><option value="X">해당없음</option><option value="Y">포함</option><option value="N">미포함</option></select>';
                    html += '	</td>';
                    html += '	<td class="form-inline">';
                    html += '		<input type="text" class="form-control" name="order_num[]" value="999">';
                    html += '	</td>';
                    html += '	<td>';
                    html += '       <a href="javascript:void(0);" class="temp-product-delete"><i class="fa fa-times red"></i></a>';
                    html += '	</td>';
                    html += '</tr>';
                });
                $(this).html('');    // 임시 데이터 삭제
                $tbody.append(html);
            });

            $regi_form.on('change', '#off_box', function() {
                var code, data, html = '';
                var dp_prod_num = 0;
                var $tbody = $('#table_product_off tbody');
                $(this).find('input[name="prod_code[]"]').each(function() {
                    code = $(this).val();
                    data = $(this).data();
                    html += '<tr>';
                    html += '	<td>';
                    html += '		<input type="hidden" name="pp_idx[]" value=""> [' + code + '] ' + Base64.decode(data.prodName);
                    html += '		<input type="hidden" name="prod_code[]" value="' + code + '">';
                    html += '	</td>';
                    html += '	<td>' + data.learnPatternCcdName + '</td>';
                    html += '	<td class="form-inline">';
                    html += '		<select class="form-control" name="is_essay[]"><option value="X">해당없음</option><option value="Y">포함</option><option value="N">미포함</option></select>';
                    html += '	</td>';
                    html += '	<td class="form-inline">';
                    html += '		<input type="text" class="form-control" name="order_num[]" value="999">';
                    html += '	</td>';
                    html += '	<td>';
                    html += '       <a href="javascript:void(0);" class="temp-product-delete"><i class="fa fa-times red"></i></a>';
                    html += '	</td>';
                    html += '</tr>';
                });
                $(this).html('');    // 임시 데이터 삭제
                $tbody.append(html);
            });

            $regi_form.on('click', '.temp-product-delete', function() {
                var that = $(this);
                that.parent().parent().remove();
            });

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/site/etc/professorHotClip/store") }}' + getQueryString();
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/etc/professorHotClip/index") }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            //썸네일 개별 삭제
            $regi_form.on('click', '.btn-delete', function() {
                var _url = '{{ site_url("/site/etc/professorHotClip/delete") }}/' + $(this).data('phc-idx');
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE'
                };
                if (!confirm('삭제하시겠습니까?')) { return; }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        alert('삭제되었습니다.');
                        location.replace('{{ site_url("/site/etc/professorHotClip/index") }}');
                    }
                }, showError, false, 'POST');
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/etc/professorHotClip/index") }}' + getQueryString();
            });
        });

        function viewType_Onoff(view_type) {
            if (view_type == '1') {
                $regi_form.find('input[name="temp_view_type"]').val(view_type);
                $('.event').hide();
            } else if (view_type == '2'){
                $regi_form.find('input[name="temp_view_type"]').val(view_type);
                $('.event').show();
            } else {
                $regi_form.find('input[name="temp_view_type"]').val('');
                $('.event').hide();
            }
        }

        function addValidate() {
            if ($regi_form.find('input[name="prof_subject_idx[]"]').length >= 2) {
                alert('과목/교수 정보는 단일 선택만 가능합니다.');
                return false;
            }

            return true;
        }
    </script>
@stop