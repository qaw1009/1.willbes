@extends('lcms.layouts.master')
@section('content')
    <h5>- 윌비스 사이트 운영을 위한 공통코드를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal form-label-left" id="search_form" name="search_form" method="POST" onsubmit="return false;" novalidate>
        <div class="x_panel">
            <div class="x_content">
                {!! form_errors() !!}
                {!! csrf_field() !!}
                <input type="hidden" name="idx" value=""/>
                <div class="form-group">
                    <label class="control-label col-md-1">회원검색</label>
                    <div class="col-md-1">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn bg-blue" id="btn_search_x">검색</button>
                    </div>
                    <div class="col-md-3">
                        <p class="form-control-static">• 회원번호, 이름, 아이디, 휴대폰번호 검색 기능</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
                    <td>{{ $data['BirthDay'] }} ({{ $data['Sex'] == 'M' ? '남' : '여' }})</td>
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

    <form name="search_form" class="form-horizontal searching" id="search_form" onsubmit="return false;" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="memIdx" value="{{$data['MemIdx']}}" />
        <ul class="tabs-site-code nav nav-tabs bar_tabs mt-30" id=" " role="tablist">
            <li {{ $viewtype == 'takeinfo' ? 'class=active ' : '' }}role="presentation"><a role="tab" href="#none" data-toggle="tab" data-viewtype="takeinfo"><strong>수강정보관리</strong></a></li>
            <li {{ $viewtype == 'orderinfo' ? 'class=active ' : '' }}role="presentation"><a role="tab" href="#none" data-toggle="tab" data-viewtype="orderinfo"><strong>결제정보관리</strong></a></li>
            <li {{ $viewtype == 'consult' ? 'class=active ' : '' }}role="presentation"><a role="tab" href="#none" data-toggle="tab" data-viewtype="consult"><strong>상담/메모관리</strong></a></li>
            <li {{ $viewtype == 'coupon' ? 'class=active ' : '' }}role="presentation"><a role="tab" href="#none" data-toggle="tab" data-viewtype="coupon"><strong>쿠폰관리</strong></a></li>
            <li {{ $viewtype == 'point' ? 'class=active ' : '' }}role="presentation"><a role="tab" href="#none" data-toggle="tab" data-viewtype="point"><strong>포인트관리</strong></a></li>
            <li {{ $viewtype == 'crm' ? 'class=active ' : '' }}role="presentation"><a role="tab" href="#none" data-toggle="tab" data-viewtype="crm"><strong>CRM관리</strong></a></li>
        </ul>
        <input name="search_viewtype" id="search_viewtype" type="hidden" value="{{$viewtype}}">
        <div class="x_panel">
            <div class="x_content">



            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#search_value').keypress(function() {
                if(event.keyCode == 13){
                    if($.trim($('#search_value').val()) != ''){
                        $('#btn_search_x').click();
                    }
                }
            });

            $('#btn_search_x').click(function() {
                var url = '{{ site_url('member/manage/search/') }}' + $('#search_value').val();

                $('#btn_search_x').setLayer({
                    url : url,
                    width : 1000
                });
            });
        });
    </script>
@stop