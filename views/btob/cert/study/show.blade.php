@extends('btob.layouts.master')

@section('content')
    <h5>- 작심독서실 회원별 수강이력을 확인할 수 있습니다.</h5>
    <div class="x_panel">
        <div class="x_content">
            <form class="form-horizontal" id="url_form" name="url_form" method="POST">
                {!! csrf_field() !!}
                <div class="row">
                    <label class="control-label col-md-1 pt-5" for="search_member_value">· 회원검색</label>
                    <div class="col-md-8 form-inline">
                        <input type="text" id="search_member_value" name="search_member_value" class="form-control input-sm" title="회원검색어" value="">
                        <button type="submit" name="btn_member_search" class="btn btn-primary btn-sm mb-0 ml-5">회원검색</button>
                        <p class="form-control-static ml-20">이름, 아이디, 휴대폰번호 검색 가능</p>
                    </div>
                </div>
            </form>
            <div class="ln_solid bdt-line mt-10 mb-20"></div>
            <div class="row">
                <div class="col-md-6">
                    <h4><strong>회원정보</strong></h4>
                </div>
                <div class="col-md-12">
                    <table id="list_mem_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>회원명(아이디)</th>
                            <th>성별</th>
                            <th>생년월일</th>
                            <th>연락처</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td id="txt_mem_name">{{ $mem_data['MemName'] }}({{ $mem_data['MemId'] }})</td>
                            <td id="txt_sex_kr">{{ $mem_data['SexKr'] }}</td>
                            <td id="txt_birth_day">{{ $mem_data['BirthDay'] }}</td>
                            <td id="txt_mem_phone">{{ $mem_data['MemPhone'] }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ln_solid mt-5"></div>
            <div class="row">
                <div class="col-md-6">
                    <h4><strong>수강이력</strong></h4>
                </div>
                <div class="col-md-12">
                    <table id="list_study_table" class="table table-bordered">
                        <colgroup>
                            <col style="width: auto;"/>
                            <col style="width: 140px;"/>
                        </colgroup>
                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td colspan="2" class="bg-odd">{{ $row['TakeKindCcdName'] }} &nbsp;| &nbsp; <span class="bold">{{ $row['ProdName'] }}</span></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="bold">&lt;인증정보&gt;</span> &nbsp;
                                    [인증회차] {{ $row['ApplySeq'] }}회 &nbsp;
                                    [지역] {{ $row['AreaCcdName'] }} &nbsp;
                                    [지점명] {{ $row['BranchCcdName'] }} &nbsp;
                                    [신청일] {{ $row['RegDatm'] }} &nbsp;
                                    [승인상태] {{ $row['ApprovalStatusName'] }} &nbsp;
                                    <br/>
                                    <span class="bold">&lt;수강정보&gt;</span> &nbsp;
                                    <span class="blue">[수강기간] {{ $row['LecStartDate'] }} ~ {{ $row['LecEndDate'] }} ({{ $row['LecExpireDay'] }}일)</span>
                                </td>
                            </tr>
                            <tr class="bg-odd">
                                <th class="text-center">강좌정보</th>
                                <th class="text-center">학습수강이력</th>
                            </tr>
                            @if(empty($row['ProdSubData']) === false)
                                @foreach($row['ProdSubData'] as $sub_row)
                                    <tr>
                                        <td>
                                            {{ $sub_row['CateName'] }} &nbsp;|&nbsp;
                                            {{ $sub_row['SchoolYear'] }}학년도 &nbsp;|&nbsp;
                                            {{ $sub_row['CourseName'] }} &nbsp;|&nbsp;
                                            {{ $sub_row['SubjectName'] }} &nbsp;|&nbsp;
                                            {{ $sub_row['wProfName'] }} &nbsp;|&nbsp;
                                            <span class="bold">{{ $sub_row['ProdNameSub'] }}</span>
                                            <br/>
                                            <span class="bold">[진도율]</span> {{ $sub_row['StudyRate'] }}%
                                        </td>
                                        <td class="text-center">
                                            <a href="#none" class="btn-lecture-hist-view blue" data-apply-idx="{{ $sub_row['ApplyIdx'] }}" data-prod-code-sub="{{ $sub_row['ProdCodeSub'] }}">
                                                <u>[학습수강이력]</u>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2">강좌정보가 없습니다.</td>
                                </tr>
                            @endif
                            <tr>
                                <td colspan="2" class="bg-odd"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary" type="button" id="btn_list">목록</button>
    </div>
    <script type="text/javascript">
        var $url_form = $('#url_form');

        $(document).ready(function() {
            // 회원검색 버튼 클릭
            $url_form.submit(function() {
                if ($(this).find('input[name="search_member_value"]').val().length < 1) {
                    alert('검색어를 입력해 주세요.');
                    return false;
                }

                $(this).prop('action', '{{ site_url('/cert/study/index') }}');
            });

            // 학습수강이력 버튼 클릭
            $('#list_study_table').on('click', '.btn-lecture-hist-view', function() {
                var mem_idx = '{{ $mem_idx }}';
                var apply_idx = $(this).data('apply-idx');
                var prod_code_sub = $(this).data('prod-code-sub');

                $('.btn-lecture-hist-view').setLayer({
                    'url' : '{{ site_url('/cert/study/lectureHist') }}',
                    'width' : 1200,
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'mem_idx', 'name' : '회원식별자', 'value' : mem_idx, 'required' : true },
                        { 'id' : 'apply_idx', 'name' : '인증신청식별자', 'value' : apply_idx, 'required' : true },
                        { 'id' : 'prod_code_sub', 'name' : '서브상품코드', 'value' : prod_code_sub, 'required' : true }
                    ]
                });
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/cert/study/index') }}' + getQueryString());
            });
        });
    </script>
@stop
