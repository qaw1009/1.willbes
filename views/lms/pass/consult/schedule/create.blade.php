@extends('lcms.layouts.master')

@section('content')
    <h5>- 학원방문상담 예약일정을 등록하고 관리하는 페이지입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>상담예약관리 {{($method == 'POST') ? '등록' : '수정'}}</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $idx }}"/>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="inline-block item">
                            {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="campus_ccd">캠퍼스<span class="required">*</span></label>
                    <div class="col-md-4">
                        <div class="inline-block item">
                            <select class="form-control" id="campus_ccd" name="campus_ccd" required="required">
                                <option value="">캠퍼스</option>
                                @foreach($arr_campus as $row)
                                    <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
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
                    <label class="control-label col-md-1-1">상담일정 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="input-group mb-0">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="">
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line">적용요일 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline mt-5 item">
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">일</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">월</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">화</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">수</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">목</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">금</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">토</span>
                        &nbsp;
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">상담가능시간 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="form-inline item">
                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">12</option>
                                <option value="">22</option>
                                <option value="">23</option>
                            </select> :
                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">02</option>
                                <option value="">58</option>
                                <option value="">59</option>
                            </select>

                            &nbsp; ~ &nbsp;&nbsp;

                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">12</option>
                                <option value="">22</option>
                                <option value="">23</option>
                            </select> :
                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">02</option>
                                <option value="">58</option>
                                <option value="">59</option>
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">점심시간 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="form-inline item">
                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">12</option>
                                <option value="">22</option>
                                <option value="">23</option>
                            </select> :
                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">02</option>
                                <option value="">58</option>
                                <option value="">59</option>
                            </select>

                            &nbsp; ~ &nbsp;&nbsp;

                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">12</option>
                                <option value="">22</option>
                                <option value="">23</option>
                            </select> :
                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">02</option>
                                <option value="">58</option>
                                <option value="">59</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">상담대상 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="inline-block item">
                            <select class="form-control" id="" name="" required="required">
                                <option value="">회원</option>
                                <option value="">비회원</option>
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">상담인원/1회 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <input type="text" id="" name="" class="form-control" title="강좌명" required="required" placeholder="" value="" style="width: 60px;"> 명
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">1회상담시간 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="form-inline item">
                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">30</option>
                                <option value="">59</option>
                                <option value="">60</option>
                            </select> 분
                            <span class="blue pr-10 pl-30">[쉬는시간]</span>
                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">30</option>
                                <option value="">59</option>
                                <option value="">60</option>
                            </select> 분
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="form-inline">
                            <div class="radio mr-30">
                                <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" checked="checked"/> <label for="is_use_y" class="input-label">사용</label>
                                <input type="radio" id="is_use_n" name="is_use" class="flat" value="N"/> <label for="is_use_n" class="input-label">미사용</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">적용</button>
                </div>


                <br/><br/><br/>******************************** 적용시 보여지는 페이지  ********************************<br/><br/><br/>


                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">상담일자
                    </label>
                    <div class="col-md-10">
                        <p class="form-control-static">2018-00-00 (월)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">상담시간표 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">

                        <table id="list_table" class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid" aria-describedby="list_table_info">
                            <thead>
                                <tr role="row">
                                    <th class="no-sort sorting_disabled" rowspan="1" colspan="1" data-column-index="0">시간</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" data-column-index="1">상담인원</th>
                                    <th class="searching rowspan sorting_disabled" rowspan="1" colspan="1" data-column-index="2">상담대상</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" data-column-index="3">사용여부</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd">
                                    <td tabindex="0">
                                        <p class="form-control-static">10:00~10:30</p>
                                    </td>
                                    <td><input type="text" id="" name="" class="form-control" title="상담인원" placeholder="" value="" style="width: 60px;"> 명</td>
                                    <td>                            
                                        <select class="form-control" id="" name="">
                                            <option value="">회원</option>
                                            <option value="">비회원</option>
                                        </select>
                                    </td>
                                    <td>                            
                                        <select class="form-control" id="" name="">
                                            <option value="">사용</option>
                                            <option value="">미사용</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                    <td tabindex="0">
                                        <p class="form-control-static">10:30~11:00</p>
                                    </td>
                                    <td><input type="text" id="" name="" class="form-control" title="상담인원" placeholder="" value="" style="width: 60px;"> 명</td>
                                    <td>                            
                                        <select class="form-control" id="" name="">
                                            <option value="">회원</option>
                                            <option value="">비회원</option>
                                        </select>
                                    </td>
                                    <td>                            
                                        <select class="form-control" id="" name="">
                                            <option value="">사용</option>
                                            <option value="">미사용</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">관리자명</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">2018-00-00 00:00</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">관리자명</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">최종수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">2018-00-00 00:00</p>
                    </div>
                </div>
                <div class="form-group text-center btn-wrap mt-50">
                    <button class="btn btn-primary" type="button" id="btn_list">등록</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            // site-code에 매핑되는 select box 자동 변경
            $regi_form.find('select[name="campus_ccd"]').chained("#site_code");

            $regi_form.submit(function() {
                @if($method == 'POST')
                    if($regi_form.find('input[name="cate_code[]"]').length < 1) {
                        alert('카테고리 선택 필드는 필수입니다.');
                        return false;
                    }
                @endif

                var _url = '{{ site_url('/pass/consult/schedule/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/service/coupon/regist/index') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });


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

            // 카테고리, 상품 삭제
            $regi_form.on('click', '.selected-category-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/pass/consult/schedule/index') }}' + getQueryString());
            });
        });
    </script>
@stop