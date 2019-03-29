@extends('lcms.layouts.master_modal')
@section('layer_title')
    회차 배수설정
@stop

@section('layer_header')
@endsection

@section('layer_content')
    {!! form_errors() !!}

    <div class="x_panel mt-10">
        <div class="x_content">
            <form name="time_form" id="time_form" method="post">
                <input type="hidden" name="m" value="{{$param['m']}}" />
                <input type="hidden" name="o" value="{{$param['o']}}" />
                <input type="hidden" name="op" value="{{$param['op']}}" />
                <input type="hidden" name="p" value="{{$param['p']}}" />
                <input type="hidden" name="ps" value="{{$param['ps']}}" />
                <input type="hidden" name="l" value="{{$param['l']}}" />
                <input type="hidden" name="u" value="{{$param['u']}}" />
                {!! csrf_field() !!}
                <table id="list_ajax_table_modal" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{{$curriculum['wUnitNum']}}회 {{$curriculum['wUnitLectureNum']}}강</th>
                        <th>{{$curriculum['wUnitName']}}</th>
                        <td>{{$curriculum['wBookPage']}} 페이지</td>
                        <td>강의사간 : {{$curriculum['wRuntime']}}분</td>
                        <td>수강시간 : {{floor(intval($curriculum['RealStudyTime'])/60)}}분 {{intval($curriculum['RealStudyTime'])%60}}초</td>
                        <td>배수시간 : {{$curriculum['RealExpireTime']}}분</td>
                    </tr>
                    </thead>
                    <tr>
                        <td colspan="6" class="tx-right">
                            메모:<input type="text" name="addmemo" id="addmemo" value="" size="50" maxlength="100" />
                            <input type="text" name="addminutes" id="addminutes" value="0" size="3" maxlength="4" />분
                            <button class="btn btn-sm btn-primary border-radius-reset mr-15" type="button" onclick="fnAddTime();">수강배수시간추가</button>
                        </td>
                    </tr>
                </table>
            </form>
            <table id="list_ajax_table_modal" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>추가시간</th>
                    <th>추가이유</th>
                    <th>변경자</th>
                    <th>변경일</th>
                    <th>아이피</th>

                </tr>
                </thead>
                <tbody>
                @forelse($log as $key => $row)
                    <tr>
                        <td>{{$key+1}}회차</td>
                        <td>{{$row['AddMinutes']}}분</td>
                        <td>{{$row['AddMemo']}}분</td>
                        <td>{{$row['wAdminName']}}</td>
                        <td>{{$row['AddDatm']}}</td>
                        <td>{{$row['AddIp']}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="tx-center">기록이 없습니다.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @stop

    @section('add_buttons')

    @endsection

    @section('layer_footer')

@endsection