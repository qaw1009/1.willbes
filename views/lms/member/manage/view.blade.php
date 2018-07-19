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
                        <button type="button" class="btn bg-blue" id="btn_search_view">검색</button>
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
            <button class="btn btn-primary" type="button" id="btn_list">목록</button>
            <button type="button" class="btn btn-default" id="btn_pwd_reset">비번초기화</button>
            <button type="button" class="btn btn-default" id="btn_mail">EM발송</button>
            <button type="button" class="btn btn-default" id="btn_message">쪽지발송</button>
            <button type="button" class="btn btn-default" id="btn_sms">SMS발송</button>
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
                    <td>{{ $data['MemName'] }} <button type="button" class="btn btn-default" id="chgname">이름변경</button></td>
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
                    <td>{{ $data['IsChange'] }}<br>[{{ $data['ChangeDate'] }}]</td>
                    <td>{{ $data['LoginDate'] }}<br>
                        <button type="button" class="btn btn-default" id="login_log">로그인이력</button>
                    </td>
                    <td>{{ $data['InfoUpdDate'] }}<br>
                        <button type="button" class="btn btn-default" id="chg_info_log">정보변경이력</button></td>
                    <td>{{ $data['PwdUpdDate'] }}<br>
                        <button type="button" class="btn btn-default" id="chg_pwd_log">비밀번호변경이력</button></td>
                    <td>{{ $data['OutDate'] }}</td>
                    <td>{{ $data['IsBlackList'] }}<br>
                        <button type="button" class="btn btn-default" id="blacklist_log">블랙컨슈머이력</button></td>
                    <td>PC : {{ $data['PcCount'] }} / 모바일 : {{ $data['MobileCount'] }}<br>
                        <button type="button" class="btn btn-default" id="device_log">기기등록정보</button></td>
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
            $('#login_log').setLayer({
                url : "{{ site_url("member/manage/loginLog/{$data['MemIdx']}") }}",
                width : 1000
            });

            $('#chg_info_log').setLayer({
                url : "{{ site_url("member/manage/infoLog/{$data['MemIdx']}/chg") }}",
                width : 1000
            });

            $('#chg_pwd_log').setLayer({
                url : "{{ site_url("member/manage/infoLog/{$data['MemIdx']}/pwd") }}",
                width : 1000
            });

            $('#blacklist_log').setLayer({
                url : "{{ site_url("member/manage/blacklistLog/{$data['MemIdx']}") }}",
                width : 1000
            });

            $('#device_log').setLayer({
                url : "{{ site_url("member/manage/deviceLog/{$data['MemIdx']}") }}",
                width : 1000
            });

            $('#chgname').setLayer({
                url : "{{ site_url("member/manage/chgname/{$data['MemIdx']}") }}",
                width : 1000
            });

            $('#btn_message').setLayer({
                url : "{{ site_url('crm/message/createSendModal') }}?target_id={{$data['MemId']}}",
                width : 800,
                modal_id : "message_modal"
            });

            $('#btn_mail').click( function () {
                window.open("{{ site_url('crm/mail/createSend/') }}?target_id={{$data['MemId']}}", "_blank");
            });

            /* $('#btn_mail').setLayer({
                url : "{{ site_url('crm/mail/createSend/') }}?memId={{$data['MemId']}}",
                width : 1100,
                modal_id : "message_modal"
            }); */

            $('#btn_sms').setLayer({
                url : "{{ site_url('crm/sms/createSendModal') }}?target_id={{$data['MemId']}}",
                width : 1100,
                modal_id : "message_modal"
            });


            $('#search_value').keypress(function() {
                if(event.keyCode == 13){
                    if($.trim($('#search_value').val()) != ''){
                        $('#btn_search_view').click();
                    }
                }
            });

            $('#btn_search_view').click(function() {
                var url = '{{ site_url('member/manage/search/') }}' + $('#search_value').val();

                $('#btn_search_view').setLayer({
                    url : url,
                    width : 1000
                });
            });

            $('#btn_list').click(function() {
                location.replace('{{ site_url('/member/manage/') }}' + getQueryString());
            });
        });
    </script>
@stop