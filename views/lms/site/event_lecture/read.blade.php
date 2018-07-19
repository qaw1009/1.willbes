@extends('lcms.layouts.master')
@section('content')
    <h5>- 이벤트, 설명회, 특강 등을 등록하고 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <div class="x_panel">
        <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <div class="x_title">
            <h2>이벤트, 설명회, 특강 정보</h2>
            <div class="clearfix"></div>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">접기<i class="fa fa-chevron-up"></i></a></li>
            </ul>
        </div>
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-2">제목</label>
                <div class="form-control-static col-md-9">{{$data['EventName']}}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">운영사이트</label>
                <div class="form-control-static col-md-2">{{$data['SiteName']}}</div>
                <label class="control-label col-md-2">캠퍼스</label>
                <div class="form-control-static col-md-2">{{$data['CampusName']}}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">카테고리 정보</label>
                <div class="form-control-static col-md-2">{{$data['CateNames']}}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">신청유형</label>
                <div class="form-control-static col-md-2">{{$data['RequstTypeName']}}</div>
                <label class="control-label col-md-2">진행일시</label>
                <div class="form-control-static col-md-2">진행일시</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">참여구분</label>
                <div class="form-control-static col-md-2">{{$data['TakeTypeName']}}</div>
                <label class="control-label col-md-2">접수기간</label>
                <div class="form-control-static col-md-2">{{$data['RegisterStartDate']}} ~ {{$data['RegisterEndDate']}}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">접수상태</label>
                <div class="form-control-static col-md-2">{{$data['IsRegisterName']}}</div>
                <label class="control-label col-md-2">사용여부</label>
                <div class="form-control-static col-md-2">{{ ($data['IsUse'] == 'Y') ? '사용' : '미사용' }}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">프로모션 링크</label>
                <div class="form-control-static col-md-9">{{$data['Link']}}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">첨부</label>
                <div class="form-control-static col-md-2">
                    @if (empty($file_data['F']) === false)
                        {{$file_data['F']['file_real_name']}}
                    @endif
                </div>
                <label class="control-label col-md-2">조회수(생성)</label>
                <div class="form-control-static col-md-2">{{$data['ReadCnt']}} ({{$data['AdjuReadCnt']}})</div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2">내용</label>
                <div class="form-control-static col-md-9">
                    @if ($data['ContentType'] == 'E')
                        {!! $data['Content'] !!}
                    @else
                        <img src='{{$file_data['C']['file_path']}}'>
                        <p>{{$file_data['C']['file_real_name']}}</p>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2">등록자
                </label>
                <div class="col-md-2">
                    <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                </div>
                <label class="control-label col-md-2">등록일
                </label>
                <div class="col-md-5">
                    <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">최종 수정자
                </label>
                <div class="col-md-2">
                    <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                </div>
                <label class="control-label col-md-2">최종 수정일
                </label>
                <div class="col-md-5">
                    <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group text-center">
                <button type="button" class="btn btn-success mr-10" id="btn_modify">수정</button>
                <button type="button" class="btn btn-primary" id="btn_list">목록</button>
            </div>
        </div>
        </form>
    </div>

    <div class="x_panel">
        <div class="form-group">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#list_register" class="send_type" data-content-type="1">신청현황</a></li>
                <li><a data-toggle="tab" href="#list_comment" class="send_type" data-content-type="2">댓글현황</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div id="list_register" class="form-group tab-pane fade in active">
                @include('lms.site.event_lecture.read_register')
            </div>
            <div id="list_comment" class="form-group tab-pane fade">
                @include('lms.site.event_lecture.read_comment')
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            // 목록
            $('#btn_list').click(function() {
                location.replace('{{ site_url("/site/eventLecture") }}/' + getQueryString());
            });

            //데이터 수정 폼
            $('#btn_modify').click(function() {
                location.replace('{{ site_url("/site/eventLecture/create") }}/' + {{$el_idx}} + getQueryString());
            });

            // 목록
            $('.btn-list').click(function() {
                location.replace('{{ site_url("/site/eventLecture/") }}');
            });
        });
    </script>
@stop