@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ "백업로그 상세보기" }}
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>

        @endsection
        @section('layer_content')
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2">처리그룹</label>
                <div class="col-md-4">
                    {{$data['ProcessGroup']}}
                </div>
                <label class="control-label col-md-2">처리식별자</label>
                <div class="col-md-4">
                    {{$data['TbdIdx']}}
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2">백업Table</label>
                <div class="col-md-4">
                    <b>{{$data['TableName']}} {{empty($data['TableComment']) ? '' : ' - '.$data['TableComment']}}</b>
                </div>
                <label class="control-label col-md-2">실행Class</label>
                <div class="col-md-4">
                    <b>{{$data['ExecClass']}}/{{$data['ExecMethod']}}
                    {{empty($class_config[$data['ExecClass']]) ? '' : ' - '.$class_config[$data['ExecClass']].'/'.$method_config[$data['ExecMethod']]}}
                    </b>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2">식별자명</label>
                <div class="col-md-4">
                    {{$data['IdxName']}}
                </div>
                <label class="control-label col-md-2">식별자</label>
                <div class="col-md-4">
                    {{$data['Idx']}}
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2">추가조건절</label>
                <div class="col-md-10">
                    {{$data['AddCondition']}}
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2">백업관리자 </label>
                <div class="col-md-4">
                    {{ $data['RegAdminName'] }}
                </div>
                <label class="control-label col-md-2">백업일자</label>
                <div class="col-md-4">
                    {{ $data['RegDatm'] }}
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" >백업데이터 </label>
                <div class="col-md-10">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="4%" style="text-align: center;"  >No</th>
                            <th width="18%" style="text-align: center;"  >Column</th>
                            <th width="78%" style="text-align: center;"  >Value</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data['BackupData'] as $row)
                            @foreach($row as $key => $val)
                                <tr>
                                    <td>
                                        {{$loop->index}}
                                    </td>
                                    <td>
                                        <b>{{$key}}</b>
                                        {!! empty($column_config[$key]) ? '' : '<br>['.$column_config[$key].']' !!}
                                    </td>
                                    <td style="word-break:break-all" >
                                        {!! empty($admin_config[$val]) ? $val : $val . ' ['.$admin_config[$val].']'   !!}
                                    </td>
                                </tr>
                            @endforeach
                            @if ($loop->last === false)
                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @stop

        @section('layer_footer')
    </form>
@endsection