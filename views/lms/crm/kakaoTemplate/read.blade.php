@extends('lcms.layouts.master')

@section('content')
    <style>
        .mw-200 {max-width:200px !important;}
    </style>
    <h5>- 알림톡 템플릿을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    <div class="x_panel">
        <div class="x_title">
            <h2>알림톡 템플릿 정보</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1-1" for="">메세지성격</label>
                <div class="form-control-static col-md-4"> {{ ($data['SendKind'] == 'A') ? '자동' : '일반' }}</div>
                <label class="control-label col-md-1-1 d-line" for="">템플릿코드</label>
                <div class="form-control-static col-md-4 ml-12-dot">{{ $data['TmplCd'] }}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1" for="">템플릿명</label>
                <div class="form-control-static col-md-10">{{$data['TmplName']}}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1" for="">템플릿내용</label>
                <div class="form-control-static col-md-10" style="white-space: pre-line;">{!! $data['Msg'] !!}</div>
            </div>
            <div class="form-group">
                <div class="col-md-11">
                    <table class="table table-striped table-bordered" id="table_bubble_chat">
                        <colgroup>
                            <col width="20%" />
                            <col width="20%" />
                            <col width="20%" />
                            <col width="*" />
                        </colgroup>
                        <thead>
                            <tr>
                                <th scope="col">버튼타입</th>
                                <th scope="col">버튼명(최대 28자)</th>
                                <th scope="col">버튼링크1</th>
                                <th scope="col">버튼링크2</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data['arr_chat_bubble_button'] as $key => $val)
                            <tr>
                                <td>{{ $val['type_name'] }}</td>
                                <td>{{ $val['name'] }}</td>
                                <td >{!! $val['link1'] !!}</td>
                                <td >{!! $val['link2'] !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1" for="">이미지 URL</label>
                <div class="form-control-static col-md-10">{{ $data['ImageUrl'] }}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1" for="">링크 URL</label>
                <div class="form-control-static col-md-10">{{ $data['ImageLink'] }}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1" for="">사용여부</label>
                <div class="form-control-static col-md-10">{{ ($data['IsUse'] == 'Y') ? '사용' : '미사용' }}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1">등록자</label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                </div>
                <label class="control-label col-md-1-1 d-line">등록일</label>
                <div class="col-md-4 ml-12-dot">
                    <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1">최종 수정자</label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                </div>
                <label class="control-label col-md-1-1 d-line">최종 수정일</label>
                <div class="col-md-4 ml-12-dot">
                    <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1">승인자</label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['ApprovalAdminName'] }}</p>
                </div>
                <label class="control-label col-md-1-1 d-line">승인일</label>
                <div class="col-md-4 ml-12-dot">
                    <p class="form-control-static">{{ $data['ApprovalDatm'] }}</p>
                </div>
            </div>

            <div class="form-group text-center btn-wrap mt-20">
                @if(empty($is_allow_modify) === false && $is_allow_modify == 'Y')
                    {{--<button type="button" class="pull-left btn btn-danger" id="btn_delete">삭제</button>--}}
                    <button type="button" class="btn btn-success" id="btn_modify">수정</button>
                @endif
                <button type="button" class="btn btn-primary" id="btn_list">목록</button>
            </div>
        </div>
    </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {

            $('#btn_list').click(function() {
                location.href='{{ site_url("/crm/kakaoTemplate") }}' + getQueryString();
            });

            $('#btn_modify').click(function() {
                location.href='{{ site_url("/crm/kakaoTemplate/create") }}/' + {{$idx}} + getQueryString();
            });

            {{--
            $('#btn_delete').click(function() {
                var _url = '{{ site_url("/crm/kakaoTemplate/delete") }}/' + {{$board_idx}} + getQueryString();
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE'
                };

                if (!confirm('해당 알림톡 템플릿을 삭제하시겠습니까?')) return;
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.href='{{ site_url("/crm/kakaoTemplate") }}' + getQueryString();
                    }
                }, showError, false, 'POST');
            });
            --}}
        });
    </script>
@stop