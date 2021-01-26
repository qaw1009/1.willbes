@extends('lcms.layouts.master_modal')
@section('layer_title')
    임용고시 추가정보
@endsection

@section('layer_content')
    @include('lms.member.log.infonav')
    <div class="col-md-6">
        <h4><strong>추가정보</strong></h4>
    </div>
    <div class="form-group form-group-sm item">
        <table id="list_ajax_table_modal" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>응시(예정)과목</th>
                <th>출신학교/학과</th>
                <th>희망응시지역</th>
                <td>응시횟수</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$data['ssam_info']['Subject']}}&nbsp;</td>
                <td>{{$data['ssam_info']['School']}}&nbsp;</td>
                <td>{{$data['ssam_info']['Region']}}&nbsp;</td>
                <td>{{$data['ssam_info']['Take']}}&nbsp;</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
