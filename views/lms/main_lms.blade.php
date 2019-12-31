@extends('lcms.layouts.master_no_sidebar')

@section('content')
    <div class="row mt-30">
        <div class="col-md-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>안녕하세요. {{ sess_data('admin_name') }}님. <span class="red">담당자 외 접속은 IP 추적을 통해 법적 조치하겠습니다.</span></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
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
        <div class="col-md-3">
            <div class="x_panel">
                <div class="x_title">
                    <span class="gray"><i class="fa fa-check-square-o"></i> 1:1 상담 게시판 미답변 현황 <strong>[+]</strong></span>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 25%;">구분</th>
                                <th>미답변 현황</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unAnswered_data as $data)
                                <tr>
                                    <td>{{$data['SiteGroupName']}}</td>
                                    <td>
                                        @foreach($data['info'] as $key => $val)
                                            {{$key}} <a href="{{ site_url("/board/counsel/") }}?bm_idx=48" class="blue"><u>{{$val}}건</u></a> @if ($loop->last === false) | @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="x_panel">
                <div class="x_title">
                    <span class="gray"><i class="fa fa-check-square-o"></i> 온라인 환불처리 현황 <strong>[+]</strong></span>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 30%;">구분</th>
                            <th>오늘 환불처리</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($refund_data as $row)
                            @if($row['IsCampus'] == 'N')
                            <tr>
                                <td>{{ $row['SiteName'] }}</td>
                                <td><a href="{{ site_url('/pay/refundList/') }}" class="blue"><u>{{ number_format($row['RefundReqCnt']) }}건</u></a></td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="x_panel mt-30">
                <div class="x_title">
                    <span class="gray"><i class="fa fa-check-square-o"></i> 학원 환불처리 현황 <strong>[+]</strong></span>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 30%;">구분</th>
                            <th>오늘 환불처리</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($refund_data as $row)
                            @if($row['IsCampus'] == 'Y')
                                <tr>
                                    <td>{{ $row['SiteName'] }}</td>
                                    <td><a href="{{ site_url('/pay/refundList/') }}" class="blue"><u>{{ number_format($row['RefundReqCnt']) }}건</u></a></td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <font color="#FFFFF">{{ENVIRONMENT}}</font>
@stop
