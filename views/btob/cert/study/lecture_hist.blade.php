@extends('btob.layouts.master_modal')

@section('layer_title')
    학습수강이력
@stop

@section('layer_header')
@endsection

@section('layer_content')
    <div class="row mt-10">
        <div class="col-md-12">
            <p class="pl-5 bold"><i class="fa fa-check-square-o"></i> 회원 정보</p>
        </div>
        <div class="col-md-12">
            <table id="_modal_mem_table" class="table table-striped table-bordered">
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
                    <td id="_txt_mem_name"></td>
                    <td id="_txt_sex_kr"></td>
                    <td id="_txt_birth_day"></td>
                    <td id="_txt_mem_phone"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-10">
        <div class="col-md-12">
            <p class="pl-5 bold"><i class="fa fa-check-square-o"></i> 강좌정보</p>
        </div>
        <div class="col-md-12">
            <table id="_modal_prod_table" class="table table-bordered">
                <colgroup>
                    <col style="width: 140px;"/>
                    <col style="width: auto;"/>
                </colgroup>
                <tbody>
                <tr>
                    <td class="bg-odd">패키지명</td>
                    <td>{{ $prod_data['ProdName'] }}</td>
                </tr>
                <tr>
                    <td class="bg-odd">단강좌명</td>
                    <td>{{ $prod_data['ProdNameSub'] }}</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <span class="bold">[수강기간]</span> <span class="blue">{{ $prod_data['LecStartDate'] }} ~ {{ $prod_data['RealLecEndDate'] }} ({{ $prod_data['RealLecExpireDay'] }}일)</span> &nbsp;
                        <span class="bold">[남은수강기간]</span> {{ $prod_data['RemainStudyTime'] . (is_numeric($prod_data['RemainStudyTime']) === true ? '일' : '') }} &nbsp;
                        <span class="bold">[진도율]</span> {{ $prod_data['StudyRate'] }}%
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-10">
        <div class="col-md-12">
            <p class="pl-5 bold"><i class="fa fa-check-square-o"></i> 학습이력</p>
        </div>
        <div class="col-md-12">
            <table id="_modal_hist_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>회차</th>
                    <th>회차 제목</th>
                    <th>강의시간</th>
                    <th>배수시간</th>
                    <th>학습시간 / 남은시간</th>
                    <th>최초수강일</th>
                    <th>최종수강일</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $row['wUnitNum'] }}회 {{ $row['wUnitLectureNum'] }}강</td>
                        <td>{{ $row['wUnitName'] }}</td>
                        <td>{{ $row['wRuntime'] }}분</td>
                        <td>{{ $row['LimitStudyTime'] }}</td>
                        <td>{{ floor(intval($row['RealStudyTime']) / 60) }}분 / {{ $row['RemainStudyTime'] }}</td>
                        <td>{{ $row['FirstStudyDate'] }}</td>
                        <td>{{ $row['LastStudyDate'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            // 회원정보 설정
            var setParentMemInfo = function() {
                var mem_table = $('#_modal_mem_table');
                var parent_mem_table = $('#list_mem_table');

                // 회원정보
                mem_table.find('#_txt_mem_name').html(parent_mem_table.find('#txt_mem_name').html());
                mem_table.find('#_txt_sex_kr').html(parent_mem_table.find('#txt_sex_kr').html());
                mem_table.find('#_txt_birth_day').html(parent_mem_table.find('#txt_birth_day').html());
                mem_table.find('#_txt_mem_phone').html(parent_mem_table.find('#txt_mem_phone').html());
            };
            setParentMemInfo();
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
@endsection