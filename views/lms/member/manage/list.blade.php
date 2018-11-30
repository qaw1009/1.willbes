@extends('lcms.layouts.master')

@section('content')
    <h5>- 회원의 기본정보 및 수강, 결제, 상담/메모, 쿠폰, 포인트, CRM 정보 등을 확인 및 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <!--{!! html_site_tabs('tabs_site_code') !!}-->
        <div class="x_panel">
            <div class="x_content">
            <!-- <div class="form-group">
                    {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">사이트</option>
                        </select>

                        <select class="form-control" id="search_category" name="search_category">
                            <option value="">구분</option>
                        </select>
                    </div>
                </div> -->

                <div class="form-group">
                    <label class="control-label col-md-1">회원통합검색</label>
                    <div class="col-md-1">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-3">
                        <p class="form-control-static">• 회원번호, 이름, 아이디, 휴대폰번호, E-Mail 검색 기능</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group">
                            <select name="search_condition" class="form-control">
                                <option value="joindate">회원가입일</option>
                                <option value="lastlogin">마지막로그인</option>
                                <option value="lastmodify">최종정보변경일</option>
                                <option value="lastchgpwd">비밀번호변경일</option>
                                <option value="outdate">회원탈퇴일</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon no-border no-bgcolor"></div>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="">
                        </div>
                        <div class="input-group">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-mon">당월</button>
                                <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-days">오늘</button>
                                <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-weeks">1주일</button>
                                <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                                <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                                <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                                <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1">조건검색</label>
                    <div class="col-md-11">
                        <label class="input-label">
                            <input type="checkbox" class="flat" id="IsChange" name="IsChange" value="Y">
                            통합전환회원
                        </label>
                        <label class="input-label">
                            <input type="checkbox" class="flat" id="SmsRcv" name="SmsRcv" value="Y">
                            휴대폰수신동의회원
                        </label>
                        <label class="input-label">
                            <input type="checkbox" class="flat" id="MailRcv" name="MailRcv" value="Y">
                            이메일수신동의회원
                        </label>
                        <label class="input-label">
                            <input type="checkbox" class="flat" id="NoChangePwd" name="NoChangePwd" value="Y">
                            비밀번호미변경회원(6개월이상)
                        </label>
                        <label class="input-label">
                            <input type="checkbox" class="flat" id="IsSleep" name="IsSleep" value="Y">
                            휴면회원(1년이상미로그인)
                        </label>
                        <label class="input-label">
                            <input type="checkbox" class="flat" id="IsRegDevice" name="IsRegDevice" value="Y">
                            기기등록회원
                        </label>
                        <label class="input-label">
                            <input type="checkbox" class="flat" id="IsOut" name="IsOut" value="Y">
                            탈퇴회원
                        </label>
                        <label class="input-label">
                            <input type="checkbox" class="flat" id="IsBlackList" name="IsBlackList" value="Y">
                            블랙컨슈머
                        </label>
                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-xs-4">
                    <button class="btn btn-default ml-20" type="button" id="btn_search_setting">엑셀다운로드</button>
                    <button type="button" class="btn btn-default" id="btn_mail">EM발송</button>
                    <button type="button" class="btn btn-default" id="btn_message">쪽지발송</button>
                    <button type="button" class="btn btn-default" id="btn_sms">SMS발송</button>
                </div>
                <div class="col-xs-8 text-right form-inline">
                    <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                    <button type="button" class="btn btn-default" id="_btn_reset">검색초기화</button>
                </div>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th rowspan="2">선택</th>
                    <th rowspan="2">No</th>
                    <th rowspan="2">회원번호</th>
                    <th rowspan="2">이름</th>
                    <th rowspan="2">아이디</th>
                    <th colspan="2">휴대폰정보</th>
                    <th colspan="2">E-mail정보</th>
                    <th rowspan="2">가입일</th>
                    <th rowspan="2">통합회원<br>전환여부</th>
                    <th rowspan="2">마지막<br>로그인일</th>
                    <th rowspan="2">최종정보<br>변경일</th>
                    <th rowspan="2">비밀번호<br>변경일</th>
                    <th rowspan="2">탈퇴일</th>
                    <th rowspan="2">블랙컨슈머<br>여부</th>
                    <th rowspan="2">기기<br>등록정보</th>
                    <th rowspan="2">자동로그인</th>
                    <th rowspan="2">정보관리</th>
                </tr>
                <tr>
                    <th>번호</th>
                    <th>수신여부</th>
                    <th>주소</th>
                    <th>수신여부</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            $datatable = $list_table.DataTable({
                serverSide: true,
                pagingType : 'simple_numbers',
                lengthMenu: [10,20,30,50,100],
                pageLength : 30,
                ajax: {
                    'url' : '{{ site_url("/member/manage/ajaxList/") }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta){
                            return '<input type="checkbox" name="selectMember" value="'+row.MemIdx+'">'
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta){
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'MemIdx'},
                    {'data' : 'MemName'},
                    {'data' : 'MemId'},
                    {'data' : 'Phone'},
                    {'data' : 'SmsRcvStatus'},
                    {'data' : 'Mail'},
                    {'data' : 'MailRcvStatus'},
                    {'data' : 'JoinDate', 'render' : function(data, type, row, meta){
                            return data.substring(0,10);
                        }},
                    {'data' : 'IsChange'},
                    {'data' : 'LoginDate', 'render' : function(data, type, row, meta){
                            return data.substring(0,10);
                        }},
                    {'data' : 'InfoUpdDate', 'render' : function(data, type, row, meta){
                            return data.substring(0,10);
                        }},
                    {'data' : 'PwdUpdDate', 'render' : function(data, type, row, meta){
                            return data.substring(0,10);
                        }},
                    {'data' : 'OutDate', 'render' : function(data, type, row, meta){
                            return data.substring(0,10);
                        }},
                    {'data' : 'IsBlackList'},
                    {'data' : null, 'render' : function(data, type, row, meta){
                            return 'PC : '+row.PcCount+'<br>모바일 : '+row.MobileCount;
                        }},
                    {'data' : 'MemIdx', 'render' : function(data, type, row, meta){
                            return '<a href="{{site_url('/member/manage/setMemberLogin/')}}'+data+'/" target="_blank">[자동로그인]</a>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta){
                            return '<a href="#" class="btn-view1 blue" data-idx="' + row.MemIdx + '"">[수강정보관리]</a><br>' +
                                '<a href="#" class="btn-view2 blue" data-idx="' + row.MemIdx + '"">[결제정보관리]</a><br>' +
                                '<a href="#" class="btn-view3 blue" data-idx="' + row.MemIdx + '"">[상담/메모관리]</a>';
                        }}
                ]
            });

            $list_table.on('click', '.btn-view1', function() {
                location.href=('{{ site_url('/member/manage/detail') }}/' + $(this).data('idx') + '/' + dtParamsToQueryString($datatable));
            });

            $list_table.on('click', '.btn-view2', function() {
                location.href=('{{ site_url('/member/manage/detail') }}/' + $(this).data('idx') + '/' + dtParamsToQueryString($datatable));
            });

            $list_table.on('click', '.btn-view3', function() {
                location.href=('{{ site_url('/member/manage/detail') }}/' + $(this).data('idx') + '/' + dtParamsToQueryString($datatable));
            });

            $('#btn_mail').click(function (){
               var target_id = $('input[name=selectMember]:checked').map(function (){return this.value;}).get().join(',');
               if(target_id == ''){ alert('메일보낼 회원을 선택해주십시요.');return;}
                window.open("{{ site_url('crm/mail/createSend/') }}?target_idx="+target_id, "_blank");
            });

            $('#btn_message').click(function (){
                var target_id = $('input[name=selectMember]:checked').map(function (){return this.value;}).get().join(',');
                if(target_id == ''){ alert('쪽지보낼 회원을 선택해주십시요.');return;}
                $('#btn_message').setLayer({
                    url : "{{ site_url('crm/message/createSendModal') }}?target_idx="+target_id,
                    width : 800,
                    modal_id : "message_modal"
                });
            });

            $('#btn_sms').click(function (){
                var target_id = $('input[name=selectMember]:checked').map(function (){return this.value;}).get().join(',');
                if(target_id == ''){ alert('SMS보낼 회원을 선택해주십시요.');return;}
                $('#btn_sms').setLayer({
                    url : "{{ site_url('crm/sms/createSendModal') }}?target_idx="+target_id,
                    width : 1100,
                    modal_id : "message_modal"
                });
            });
        });
    </script>
@stop