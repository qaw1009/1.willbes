@extends('lcms.layouts.master_no_sidebar')

@section('content')
    <div class="row mt-30">
        <div class="col-md-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>안녕하세요. {{ sess_data('admin_name') }} 교수님. <span class="red">담당자 외 접속은 IP 추적을 통해 법적 조치하겠습니다.</span></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if($isSsam == 'Y')
                    <div class="well" style="text-align: center">
                        <button type="button" class="btn btn-primary btn-search" onclick="window.open('/home/gotoSsam');"><i class="fa fa-spin fa-refresh"></i> 임용고시 이전사이트 매출현황보기 </button>
                    </div>
                    @endif
                    <div class="well">
                        <ul class="no-margin">
                            <li class="pb-10">현재 접속 IP <span class="inline-block blue ml-20">{{ $last_login_ip }}</span></li>
                            <li class="pb-10">오늘 로그인 기록
                                <ul class="list-unstyled mt-10">
                                    @foreach($data as $row)
                                    <li class="pb-10"><span class="blue">[{{ $row['LoginDatm'] }}] [{{ $row['LoginIp'] }}] [{{ $row['LoginLogCcdName'] }}]</span></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
