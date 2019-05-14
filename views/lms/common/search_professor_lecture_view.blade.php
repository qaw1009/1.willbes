@extends('lcms.layouts.master_modal')

@section('layer_title')
    회차별 강의보기
@stop

@section('layer_header')

@endsection

@section('layer_content')

    <div class="row">
        <div class="col-md-6">
            <strong>· 강좌정보</strong>
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="120px">강좌기본정보</th>
                    <th>강좌유형</th>
                    <th>과정</th>
                    <th>과목</th>
                    <th>강좌명</th>
                    <th>진행상태</th>
                 @if($data['LearnPatternCcd'] == '615001')
                    <th>판매가</th>
                    <th>배수</th>
                    <th>판매여부</th>
                @elseif($data['LearnPatternCcd'] == '615005')
                    <th>제공상태</th>
                    <th>신청자</th>
                @endif
                    <th width="80px">사용여부</th>
                    <th width="70px">등록자</th>
                    <th>등록일</th>
                </tr>
                <tr>
                    <td>{{$data['SiteName']}}<BR>{{$data['CateName']}}<BR>{{$data['SchoolYear']}}</td>
                    <td>{{$data['LearnPatternCcd'] == '615001' ? $data['LecTypeCcd_Name'] : $data['FreeLecTypeCcd_Name']}}</td>
                    <td>{{$data['CourseName']}}</td>
                    <td>{{$data['SubjectName']}}</td>
                    <td>[{{$data['ProdCode']}}] {{$data['ProdName']}}</td>
                    <td>{{$data['wProgressCcd_Name']}}<BR>({{$data['wUnitLectureCnt']}}@if(empty($data['wScheduleCount']) == false) / {{$data['wScheduleCount']}}@endif)</td>
                @if($data['LearnPatternCcd'] == '615001')
                    <td>{{number_format($data['RealSalePrice'])}}원<BR><strike>{{number_format($data['SalePrice'])}}원</strike></td>
                    <td>{{$data['MultipleApply'] == '1' ? '없음' : $data['MultipleApply'] }}</td>
                    <td>{{$data['SaleStatusCcd_Name']}}</td>
                @elseif($data['LearnPatternCcd'] == '615005')
                    <td>{{$data['SaleStatusCcd_Name']}}</td>
                    <td>{{$data['PayEndCnt']}}</td>
                @endif
                    <td>{!! $data['IsUse'] == 'Y' ? '사용' : '<span class="red">미사용</span>' !!}</td>
                    <td>{{$data['wAdminName']}}</td>
                    <td>{{$data['RegDatm']}}   </td>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <strong>· 강의보기</strong>
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="120px">회차</th>
                    <th>회차제목</th>
                    <th width="220px">강의보기</th>
                    <th>보조자료</th>
                    <th width="100px">북페이지</th>
                    <th width="100px">촬영일</th>
                </tr>
            @if(empty($data_unit))
                <tr>
                    <td colspan="6" class="text-center">등록된 회차가 없습니다.</td>
                </tr>
            @else
                @foreach($data_unit as $row)
                    <tr>
                        <td>{{ $row['wUnitNum'] }}회차 {{ $row['wUnitLectureNum'] }}강</td>
                        <td>{{ $row['wUnitName'] }}</td>
                        <td>
                            @if(empty($row['wWD']) == false)<button class="btn btn-sm btn-primary border-radius-reset mr-5" type="button" onclick="vodViewUnit('WD',{{$row['wUnitIdx']}})">와이드</button>@endif
                            @if(empty($row['wHD']) == false)<button class="btn btn-sm btn-primary border-radius-reset mr-5" type="button" onclick="vodViewUnit('HD',{{$row['wUnitIdx']}})">고화질</button>@endif
                            @if(empty($row['wSD']) == false)<button class="btn btn-sm btn-primary border-radius-reset mr-0" type="button" onclick="vodViewUnit('SD',{{$row['wUnitIdx']}})">일반화질</button>@endif
                        </td>
                        <td>
                            @if(empty($row['wUnitAttachFile']) === false)
                                [ <a href="{{site_url('/product/on/lecture/download/').'?filename='.urlencode($data['wAttachPath'].$row['wUnitAttachFile']).'&filename_ori='.urlencode($row['wUnitAttachFileReal']) }}" target="_blank">{{ $row['wUnitAttachFileReal'] }}</a>
                            @endif
                        </td>
                        <td>{{ $row['wBookPage']  }}</td>
                        <td>{{ $row['wShootingDate'] }}</td>
                    </tr>
                @endforeach
            @endif
                </thead>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        function vodViewUnit(quility, idx) {
            popupOpen(app_url('/cms/lecture/player/?lecidx={{$data['wLecIdx']}}&unitidx='+idx+'&quility=' + quility , 'wbs'), 'wbsPlayer', '1000', '600', null, null, 'no', 'no');
        }
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')

@endsection