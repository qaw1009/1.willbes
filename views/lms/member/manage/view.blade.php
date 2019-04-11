@extends('lcms.layouts.master')
@section('content')
    <h5>- 회원상세정보</h5>
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
            <button type="button" class="btn btn-primary" id="btn_list">목록</button>
            <button type="button" class="btn btn-default" id="btn_pwd_reset">비번초기화</button>
            <button type="button" class="btn btn-default btn-mail" id="btn_mail" data-mem-idx="{{ $data['MemIdx'] }}">메일발송</button>
            <button type="button" class="btn btn-default btn-message" id="btn_message" data-mem-idx="{{ $data['MemIdx'] }}">쪽지발송</button>
            <button type="button" class="btn btn-default btn-sms" id="btn_sms" data-mem-idx="{{ $data['MemIdx'] }}">SMS발송</button>
            <button type="button" class="btn bg-blue btn-auto-login" id="btn_login" data-mem-idx="{{ $data['MemIdx'] }}">자동로그인</button>
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
                    <th class="text-center">회원인증방법</th>
                    <th class="text-center">현재상태</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $data['MemIdx'] }}</td>
                    <td>{{ $data['JoinDate'] }}</td>
                    <td>
                        {{ $data['BirthDay'] }} ({{ $data['Sex'] == 'M' ? '남' : '여' }})
                        <button type="button" class="btn btn-default" id="chg_sexual">성별변경</button>
                    </td>
                    <td>{{ $data['MemName'] }} <button type="button" class="btn btn-default" id="chgname">이름변경</button></td>
                    <td>{{ $data['MemId'] }}</td>
                    <td>{{ $data['CertName'] }}</td>
                    <td>
                        @if($data['IsStatus'] == 'Y')
                            정상회원
                        @elseif($data['IsStatus'] == 'N')
                            탈퇴회원
                        @elseif($data['IsStatus'] == 'D')
                            휴면회원<br>
                            <button type="button" class="btn btn-default" id="sleep_cancel">휴면회원해제</button>
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-striped table-bordered text-center">
                <thead>
                <tr>
                    <th class="text-center">주소</th>
                    <th class="text-center">휴대폰(수신여부)</th>
                    <th class="text-center">E-Mail(수신여부)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>({{ $data['ZipCode'] }}) {{ $data['Addr1'] }} {{ $data['Addr2'] }}</td>
                    <td>{{ $data['Phone'] }} ({{ $data['SmsRcvStatus'] }})</td>
                    <td>{{ $data['Mail'] }} ({{ $data['MailRcvStatus'] }})</td>
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

    <ul class="tabs-site-code nav nav-tabs bar_tabs mt-30" role="tablist">
        <li role="presentation"><a role="tab" href="#none" data-toggle="tab" onclick="fnLoad('ajaxLecture');"><strong>수강정보관리</strong></a></li>
        <li role="presentation"><a role="tab" href="#none" data-toggle="tab" onclick="fnLoad('ajaxPay');"><strong>결제정보관리</strong></a></li>
        <li role="presentation"><a role="tab" href="#none" data-toggle="tab" onclick="fnLoad('ajaxCounsel');"><strong>상담/메모관리</strong></a></li>
        <li role="presentation"><a role="tab" href="#none" data-toggle="tab" onclick="fnLoad('ajaxCoupon');"><strong>쿠폰관리</strong></a></li>
        <li role="presentation"><a role="tab" href="#none" data-toggle="tab" onclick="fnLoad('ajaxPointLecture');"><strong>포인트관리</strong></a></li>
        <li role="presentation"><a role="tab" href="#none" data-toggle="tab" onclick="fnLoad('ajaxSms');"><strong>CRM관리</strong></a></li>
    </ul>
    <div id="tab-content"> </div>
    <script type="text/javascript">
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

            $('#btn_pwd_reset').click(function() {
               if(window.confirm('해당 회원의 비밀번호를 초기화 하시겠습니까?\n초기화할 경우 1111 로 자동변경 됩니다.')){
                   $url = '{{site_url('member/manage/resetPwd')}}';
                   $data = 'memIdx={{$data['MemIdx']}}';

                   sendAjax($url,
                       $data,
                       function(d){
                           alert('비밀번호가 1111 로 초기화 되었습니다.');
                       },
                       function(req, status, err){
                           showError(req, status);
                       }, false, 'GET', 'json');
               }
            });

            $('#chg_sexual').click(function() {
                if(!confirm('성별을 변경하시겠습니까?')){
                    return;
                }

                $url = '{{site_url('/member/manage/chg_sex/')}}';
                $data = 'm={{$data['MemIdx']}}';

                sendAjax($url,
                    $data,
                    function(d){
                        alert(d.ret_msg);
                        location.reload();
                    },
                    function(req, status, err){
                        alert(req.ret_msg);
                    }, false, 'GET', 'json');
            });

            $('#sleep_cancel').click(function() {
                if(!confirm('휴면상태를 해제하시겠습니까?')){
                    return;
                }

                $url = '{{site_url('/member/manage/sleep_cancel/')}}';
                $data = 'm={{$data['MemIdx']}}';

                sendAjax($url,
                    $data,
                    function(d){
                        alert(d.ret_msg);
                        location.reload();
                    },
                    function(req, status, err){
                        alert(req.ret_msg);
                    }, false, 'GET', 'json');
            });

        });


        function fnLoad(cmd)
        {
            $url = '{{site_url('member/manage/')}}' + cmd;
            $data = 'memIdx={{$data['MemIdx']}}';

            sendAjax($url,
                $data,
                function(d){
                    $("#tab-content").html(d).end()
                },
                function(req, status, err){
                    showError(req, status);
                }, false, 'GET', 'html');
        }
    </script>
@stop