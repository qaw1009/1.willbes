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
                <label class="control-label col-md-1-1">제목</label>
                <div class="form-control-static col-md-10">{{$data['EventName']}}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1">운영사이트</label>
                <div class="form-control-static col-md-4">{{$data['SiteName']}}</div>
                <label class="control-label col-md-1-1 d-line">프로모션코드</label>
                <div class="form-control-static col-md-4 ml-12-dot">
                    {{$data['PromotionCode']}}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1">카테고리 정보</label>
                <div class="form-control-static col-md-10">{{$data['CateNames']}}</div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-1-1">캠퍼스</label>
                <div class="form-control-static col-md-4">{{$data['CampusName']}}</div>
                <label class="control-label col-md-1-1 d-line">사용여부</label>
                <div class="form-control-static col-md-4 ml-12-dot">{{ ($data['IsUse'] == 'Y') ? '사용' : '미사용' }}</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1">신청유형</label>
                <div class="form-control-static col-md-4">{{$data['RequestTypeName']}}</div>
                <label class="control-label col-md-1-1 d-line">접수기간</label>
                <div class="form-control-static col-md-4 ml-12-dot">{{$data['RegisterStartDate']}} ~ {{$data['RegisterEndDate']}}</div>
            </div>

            <div class="promotion">
                <div class="form-group">
                    <label class="control-label col-md-1-1">내용</label>
                    <div class="form-control-static col-md-10">
                        {!! $data['Content'] !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">추가 파라미터(GET방식) </label>
                    <div class="form-control-static col-md-10">{{ $data['PromotionParams'] }}</div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">프로모션 경로</label>
                    {{--<div class="form-control-static col-md-10">{{$data['Link']}}</div>--}}
                    <div class="form-control-static col-md-10">
                        @if ($data['SiteCode'] == config_item('app_intg_site_code'))
                            <p><b>[통합 사이트]</b> 관리자 확인용 : {{$data['SiteUrl'].'/promotion/index/code/'.$data['PromotionCode'].'?type=1'}}</p>
                            <p><b>[통합 사이트]</b> 실제 경로 : {{$data['SiteUrl'].'/promotion/index/code/'.$data['PromotionCode']}}</p><br>
                        @else
                            @foreach($arr_cate_code as $key => $val)
                                <p><b>[{{$val}}]</b> 관리자 확인용 : {{$data['SiteUrl'].'/promotion/index/cate/'.$key.'/code/'.$data['PromotionCode'].'?type=1'}}</p>
                                <p><b>[{{$val}}]</b> 실제 경로 : {{$data['SiteUrl'].'/promotion/index/cate/'.$key.'/code/'.$data['PromotionCode']}}</p><br>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">프로모션 첨부</label>
                    <div class="form-control-static col-md-4">
                        @if (empty($file_data_promotion) === false)
                            @foreach($file_data_promotion as $row)
                                <a href="javascript:void(0);" class="file-download ml-5" data-file-path="{{ urlencode($row['FileFullPath'].$row['FileName'])}}" data-file-name="{{ urlencode($row['FileRealName']) }}" target="_blank">
                                    [{{ $row['FileRealName'] }}]
                                </a>
                            @endforeach
                            {{--{{$file_data['F']['file_real_name']}}--}}
                        @endif
                    </div>
                </div>
            </div>

            <div class="event">
                <div class="form-group">
                    <label class="control-label col-md-1-1">참여구분</label>
                    <div class="form-control-static col-md-4">{{$data['TakeTypeName']}}</div>
                    <label class="control-label col-md-1-1 d-line">특강구분</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['SubjectName']}} {{$data['ProfNickName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">접수상태</label>
                    <div class="form-control-static col-md-4">{{$data['IsRegisterName']}}</div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">첨부</label>
                    <div class="form-control-static col-md-4">
                        @if (empty($file_data['F']) === false)
                            <a href="javascript:void(0);" class="file-download ml-5" data-file-path="{{ urlencode($file_data['F']['file_path'])}}" data-file-name="{{ urlencode($file_data['F']['file_real_name']) }}" target="_blank">
                                {{$file_data['F']['file_real_name']}}
                            </a>
                        @endif
                    </div>
                    <label class="control-label col-md-1-1 d-line">조회수(생성)</label>
                    <div class="form-control-static col-md-4 ml-12-dot">{{$data['ReadCnt']}} ({{$data['AdjuReadCnt']}})</div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">내용</label>
                    <div class="form-control-static col-md-10">
                        @if ($data['RequestType'] != '5')
                            @if ($data['ContentType'] == 'E')
                                {!! $data['Content'] !!}
                            @else
                                @if (empty($file_data['C']) === false)
                                    <img src='{{$file_data['C']['file_path']}}'>
                                    <p>{{$file_data['C']['file_real_name']}}</p>
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-1-1">등록자
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                </div>
                <label class="control-label col-md-1-1 d-line">등록일
                </label>
                <div class="col-md-4 ml-12-dot">
                    <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1-1">최종 수정자
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                </div>
                <label class="control-label col-md-1-1 d-line">최종 수정일
                </label>
                <div class="col-md-4 ml-12-dot">
                    <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                </div>
            </div>

            <div class="form-group text-center btn-wrap mt-50">
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
                <li><a data-toggle="tab" href="#list_member_success" class="send_type" data-content-type="2">합격수기현황</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div id="list_register" class="form-group tab-pane fade in active">
                @include('lms.site.event_lecture.read_register')
            </div>
            <div id="list_comment" class="form-group tab-pane fade">
                @include('lms.site.event_lecture.read_comment')
            </div>
            <div id="list_member_success" class="form-group tab-pane fade">
                @include('lms.site.event_lecture.read_member_success')
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var request_type = '{{$data['RequestType']}}';
            if (request_type == 5) {
                $('.promotion').show();
                $('.event').hide();
            } else {
                $('.promotion').hide();
                $('.event').show();
            }

            // 목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/eventLecture") }}/' + getQueryString();
            });

            //데이터 수정 폼
            $('#btn_modify').click(function() {
                location.href='{{ site_url("/site/eventLecture/create") }}/' + {{$el_idx}} + getQueryString();
            });

            // 목록
            $('.btn-list').click(function() {
                location.href='{{ site_url("/site/eventLecture/") }}';
            });

            // 파일 다운로드
            $('.file-download').click(function() {
                var _url = '{{ site_url("/site/eventLecture/download") }}/' + getQueryString() + '&path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                window.open(_url, '_blank');
            });
        });
    </script>
@stop