@extends('lcms.layouts.master_popup')

@section('popup_title')
    <b>일시정지설정</b>
@endsection

@section('add_buttons')
    &nbsp;
@endsection


@section('popup_content')
    <div class="x_content">
        ● 기본정보
        <table class="table table-striped table-bordered">
            <colgroup>
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
            </colgroup>
            <thead>
            <tr>
                <th>회원번호</th>
                <th>생년월일</th>
                <th>이름(아이디)</th>
                <th>전화번호</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$member['MemIdx']}}</td>
                <td>{{$member['BirthDay']}}</td>
                <td>{{$member['MemName']}}({{$member['MemId']}})</td>
                <td>{{$member['Phone']}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@stop