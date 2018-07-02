@extends('lcms.layouts.master')
@section('content')
    <h5>- 이벤트, 설명회, 특강 등을 등록하고 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/site/popup/store") }}?bm_idx=45" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="p_idx" value="{{ $p_idx }}"/>

        <div class="x_panel">
            <div class="x_title">
                <h2>이벤트/설명회/특강 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="col-md-2 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', '', '', false, $offLineSite_list) !!}
                    </div>
                    <label class="control-label col-md-2 col-md-offset-2" for="campus_ccd">캠퍼스<span class="required">*</span></label>
                    <div class="col-md-2 item">
                        <select class="form-control" id="campus_ccd" name="campus_ccd" required="required">
                            <option value="">캠퍼스</option>
                            @php $temp='0'; @endphp
                            @foreach($arr_campus as $row)
                                @php
                                    $selected = ($method == 'PUT' && ($campus_all_ccd == $data['CampusCcd'])) ? "selected='selected'" : '';
                                    $loop_key = $loop->index-1;
                                    if ($temp == $loop_key) {
                                        echo "<option value='{$campus_all_ccd}' class='{$row['SiteCode']}' {$selected}>전체</option>";
                                    } else {
                                        if ($row['SiteCode'] != $arr_campus[$loop_key-1]['SiteCode']) {
                                            echo "<option value='{$campus_all_ccd}' class='{$row['SiteCode']}' {$selected}>전체</option>";
                                        }
                                    }
                                @endphp
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}" @if($method == 'PUT' && ($row['CampusCcd'] == $data['CampusCcd'])) selected="selected" @endif>{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
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
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">신청유형 <span class="required">*</span></label>
                    <div class="col-md-2 item form-inline">
                        <div class="radio">
                            <input type="radio" class="flat" id="event_lecture_type_1" name="event_lecture_type" value=""> <label for="event_lecture_type_1" class="mr-10">설명회</label>
                            <input type="radio" class="flat" id="event_lecture_type_2" name="event_lecture_type" value=""> <label for="event_lecture_type_2" class="mr-10">특강</label>
                            <input type="radio" class="flat" id="event_lecture_type_3" name="event_lecture_type" value=""> <label for="event_lecture_type_3" class="mr-10">이벤트</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2">특강구분</label>

                </div>

                <div class="ln_solid"></div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>

        </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            // site-code에 매핑되는 select box 자동 변경
            $regi_form.find('select[name="campus_ccd"]').chained("#site_code");

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
                    'url' : '{{ site_url('/common/searchCategory/index/multiple/site_code/') }}' + site_code + '/cate_depth/1',
                    'width' : 900
                });
            });

            // 카테고리 삭제
            $regi_form.on('click', '.selected-category-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            //목록
            $('#btn_list').click(function() {
                location.replace('{{ site_url("/site/eventLecture") }}/' + getQueryString());
            });
        });
    </script>
@stop