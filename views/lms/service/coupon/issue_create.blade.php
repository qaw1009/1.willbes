@extends('lcms.layouts.master')

@section('content')
    <h5>- 결제 시 할인 적용될 쿠폰을 발행하는 메뉴입니다. (쿠폰발급 페이지에서 사용내역 확인 가능)</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>쿠폰 발급</h2>
            <div class="pull-right">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <div class="row">
                <div class="col-md-12">
                    <h4><strong>쿠폰정보</strong></h4>
                </div>
                <div class="col-md-12">
                    <table id="list_coupon_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>운영사이트</th>
                            <th>카테고리</th>
                            <th>쿠폰명</th>
                            <th>배포루트</th>
                            <th>적용구분</th>
                            <th>적용상세구분</th>
                            <th>적용범위</th>
                            <th>사용기간<br/>(유효기간)</th>
                            <th>유효여부</th>
                            <th>할인율<br/>(할인금액)</th>
                            <th>사용 / 발급</th>
                            <th>발급여부</th>
                            <th>사용여부</th>
                            <th>등록자</th>
                            <th>등록일</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>온라인경찰</td>
                            <td>일반경찰</td>
                            <td>[CODE] <u class="blue">쿠폰명</u></td>
                            <td>온라인</td>
                            <td>온라인강좌</td>
                            <td>단강좌</td>
                            <td>전체</td>
                            <td>10일<br/>(2018-00-00~2018-00-00)</td>
                            <td>유효</td>
                            <td>30%</td>
                            <td><a class="red">20</a> / 200</td>
                            <td>발급</td>
                            <td>사용</td>
                            <td>관리자</td>
                            <td>2018-00-00 00:00:00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4><strong>쿠폰발급</strong></h4>
                </div>
                <div class="col-md-12">
                    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        <div class="ln_solid mt-0"></div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="issue_type_1">등록구분 <span class="required">*</span>
                            </label>
                            <div class="col-md-10 item">
                                <div class="radio">
                                    <input type="radio" id="issue_type_1" name="issue_type" class="flat" value="1" title="등록구분" required="required" checked="checked"/> <label for="issue_type_1" class="input-label">개별등록</label>
                                    <input type="radio" id="issue_type_2" name="issue_type" class="flat" value="2"/> <label for="issue_type_2" class="input-label">일괄등록</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="mem_id">개별등록
                            </label>
                            <div class="col-md-10 form-inline item">
                                <input type="text" id="mem_id" name="mem_id" class="form-control" required="required_if:issue_type,1" title="회원검색어" value="" style="width: 180px;">
                                <button type="button" id="btn_member_search" class="btn btn-primary mb-0">회원검색</button>
                            </div>
                            <div class="col-md-9 col-md-offset-1 mt-5">
                                <input type="text" id="search_member_result" name="search_member_result" class="form-control" title="회원검색결과" required="required" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="mem_file">일괄등록
                            </label>
                            <div class="col-md-10 form-inline item">
                                <input type="file" id="mem_file" name="mem_file" class="form-control" required="required_if:issue_type,2" title="회원검색파일" value="">
                                <button type="button" id="btn_member_file_upload" class="btn btn-primary mb-0">업로드하기</button>
                            </div>
                            <div class="col-md-10 col-md-offset-1 mt-5">
                                <p class="form-control-static"># 첨부파일은 한줄에 한 개의 아이디로 구성된 TXT 파일로 생성</p>
                            </div>
                            <div class="col-md-2 col-md-offset-1 mt-5">
                                <select class="form-control" id="search_member_file_result" name="search_member_file_result" size="4">
                                    <option value="">홍길동(아이디)</option>
                                    <option value="">홍길동(아이디)</option>
                                    <option value="">홍길동(아이디)</option>
                                    <option value="">홍길동(아이디)</option>
                                    <option value="">홍길동(아이디)</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <p class="form-control-static">&lt;총 30명&gt;</p>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success mr-10">쿠폰발급</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4><strong>쿠폰발급내역/사용내역</strong></h4>
                </div>
                <div class="col-md-12">
                    <form class="form-horizontal form-label-left searching" id="search_form" name="search_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        <div class="ln_solid mt-0"></div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="search_value">회원검색
                            </label>
                            <div class="col-md-3">
                                <input type="text" id="search_value" name="search_value" class="form-control" value="">
                            </div>
                            <div class="col-md-7">
                                <p class="form-control-static"># 이름, 아이디, 휴대폰번호 검색 가능</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="search_is_issue">쿠폰조건검색
                            </label>
                            <div class="col-md-10 form-inline">
                                <select class="form-control mr-10" id="search_issue_type" name="search_issue_type">
                                    <option value="">발급구분</option>
                                </select>
                                <select class="form-control mr-10" id="search_is_valid" name="search_is_valid">
                                    <option value="">쿠폰유효여부</option>
                                </select>
                                <select class="form-control mr-10" id="search_is_use" name="search_is_use">
                                    <option value="">쿠폰사용여부</option>
                                </select>
                                <div class="checkbox">
                                    <input type="checkbox" id="search_is_issue_back" name="search_is_issue_back" class="flat" value="1"/> <label for="search_is_issue_back" class="input-label">발급회수쿠폰</label>
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="list_coupon_issue_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>선택 <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
                            <th>No</th>
                            <th class="searching">회원명 (아이디)</th>
                            <th class="searching">휴대폰번호</th>
                            <th class="searching_issue_type">발급구분</th>
                            <th>발급일 (발급자)</th>
                            <th class="searching_is_valid">유효여부 (만료일)</th>
                            <th class="searching_is_use">사용여부 (사용일)</th>
                            <th>사용상품 (주문번호)</th>
                            <th class="searching_is_issue_back">발급회수일 (회수자)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="checkbox" id="" name="" class="flat" value=""/></td>
                            <td>4</td>
                            <td>회원명 <a class="blue">(아이디)</a></td>
                            <td>010-0000-0000 (Y)</td>
                            <td>자동발급</td>
                            <td>2018-00-00 (회원명)</td>
                            <td>유효 (2018-00-00)</td>
                            <td>사용 (2018-00-00)</td>
                            <td>상품명 <a class="blue">(주문번호)</a></td>
                            <td>2018-00-00 (관리자명)</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="text-center">
                <button class="btn btn-primary" type="button" id="btn_list">목록</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $regi_form = $('#regi_form');
        var $search_form = $('#search_form');
        var $list_table = $('#list_coupon_issue_table');

        $(document).ready(function() {
            // 쿠폰발급내역/사용내역
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: false,
                searching: true,
                buttons: [
                    { text: '<i class="fa fa-undo mr-5"></i> 쿠폰발급회수', className: 'btn-sm btn-success border-radius-reset mr-15 btn-issue-back' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset btn-sms' }
                ],
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/service/coupon/regist/index') }}' + getQueryString());
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_issue_type').search($search_form.find('select[name="search_issue_type"]').val())
                .column('.searching_is_valid').search($search_form.find('select[name="search_is_valid"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .column('.searching_is_issue_back').search($search_form.find('input[name="search_is_issue_back"]').val())
                .draw();
        }
    </script>
@stop
