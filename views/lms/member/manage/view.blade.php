@extends('lcms.layouts.master')

@section('content')
    <div class="x_panel">
        <div class="x_title">
            - 회원의 기본정보 및 수강, 결제, 상담/메모 정보 등을 확인 및 관리하는 메뉴입니다.
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="search_form" name="search_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                <input type="hidden" name="idx" value=""/>
                <div class="form-group">
                    <label class="control-label col-md-1">회원검색</label>
                    <div class="col-md-1">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-3">
                        <p class="form-control-static">• 회원번호, 이름, 아이디, 휴대폰번호 검색 기능</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="x_panel mt-10">
        <div class="x_title">
            - 회원정보
        </div>
        <div class="text-right form-inline">
            <button type="button" class="btn btn-default" id="">비번초기화</button>
            <button type="button" class="btn btn-default" id="">EM발송</button>
            <button type="button" class="btn btn-default" id="">쪽지발송</button>
            <button type="button" class="btn btn-default" id="">SMS발송</button>
            <button type="button" class="btn bg-blue" id="">자동로그인</button>
        </div>
        <div class="x_content">
            <table class="table table-striped table-bordered text-center">
                <thead>
                <tr>
                    <th class="text-center">회원번호</th>
                    <th class="text-center">회원가입일</th>
                    <th class="text-center">생년월일(성별)</th>
                    <th class="text-center">회원명</th>
                    <th class="text-center">아이디</th>
                    <th class="text-center">휴대폰(수신여부)</th>
                    <th class="text-center">E-Mail(수신여부)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $data['MemIdx'] }}</td>
                    <td>{{ $data['JoinDate'] }}</td>
                    <td>{{ $data['BirthDay'] }} (@if($data['Sex'] == 'M'){{'남'}}@else{{'여'}}@endif)</td>
                    <td>{{ $data['MemName'] }}</td>
                    <td>{{ $data['MemId'] }}</td>
                    <td>{{ $data['Phone'] }} ({{ $data['SmsRcvStatus'] }})</td>
                    <td>{{ $data['Mail'] }} ({{ $data['MailRcvStatus'] }})</td>
                </tr>
                </tbody>
            </table>
            <table class="table table-striped table-bordered text-center">
                <thead>
                <tr>
                    <th class="text-center">주소</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>({{ $data['ZipCode'] }}) {{ $data['Addr1'] }} {{ $data['Addr2'] }}</td>
                </tr>
                </tbody>
            </table>
            <table class="table table-striped table-bordered text-center">
                <thead>
                <tr>
                    <th class="text-center">통합회원전환여부</th>
                    <th class="text-center">최종로그인</th>
                    <th class="text-center">최종정보변경일</th>
                    <th class="text-center">최종비밀번호변경일</th>
                    <th class="text-center">탈퇴일</th>
                    <th class="text-center">블랙컨슈머여부</th>
                    <th class="text-center">기기정보</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $data['IsChange'] }}</td>
                    <td>{{ $data['LoginDate'] }}</td>
                    <td>{{ $data['InfoUpdDate'] }}</td>
                    <td>{{ $data['PwdUpdDate'] }}</td>
                    <td>{{ $data['OutDate'] }}</td>
                    <td>{{ $data['IsBlackList'] }}</td>
                    <td>PC : {{ $data['PcCount'] }} / 모바일 : {{ $data['MobileCount'] }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        아래부분
    </div>

    <script>
        $(document).ready(function() {
            $('.btn-regist, .btn-modify').setLayer({
                "url": "{{ site_url('member/manage/search') }}" + uri_param
                , width: "650"
            });
        });
    </script>
@stop