<h5>- 회원 수강정보 리스트</h5>
<form class="form-horizontal" id="search_form_lecture" name="search_form_lecture" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="memIdx" value="{{$memIdx}}" />
    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1" for="search_value">강좌명검색</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="search_value" name="search_value" value="{{$search_value}}">
                </div>
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-md-12">
        <ul class="tabs-site-code nav nav-tabs bar_tabs mb-30" role="tablist">
            <li role="presentation"><a role="tab" href="javascript:;" data-toggle="tab" onclick="tabShow(1);">단강좌({{count($dan)}})</a></li>
            <li role="presentation"><a role="tab" href="javascript:;" data-toggle="tab" onclick="tabShow(2);">사용자패키지({{count($userpkg)}})</a></li>
            <li role="presentation"><a role="tab" href="javascript:;" data-toggle="tab" onclick="tabShow(3);">운영자패키지({{count($pkg)}})</a></li>
            <li role="presentation"><a role="tab" href="javascript:;" data-toggle="tab" onclick="tabShow(4);">기간제패키지({{count($pass)}})</a></li>
            <li role="presentation"><a role="tab" href="javascript:;" data-toggle="tab" onclick="tabShow(5);">무료강좌({{count($free)}})</a></li>
            <li role="presentation"><a role="tab" href="javascript:;" data-toggle="tab" onclick="tabShow(6);">학원단과반({{count($offdan)}})</a></li>
            <li role="presentation"><a role="tab" href="javascript:;" data-toggle="tab" onclick="tabShow(7);">학원종합반({{count($offpkg)}})</a></li>
        </ul>
    </div>
</div>
<!-- 단강좌 --->
<div class="x_panel mt-10 leclist" style="" id="tab_lecture1">
    <div class="x_content">
        <table id="list_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>운영사이트</th>
                <th>강좌정보</th>
                <th>수강상태</th>
                <th>학습이력현황</th>
                <th>수강정책관리</th>
            </tr>
            </thead>
            <tbody>
            @forelse($dan as $row)
                <tr>
                    <td>온라인경찰</td>
                    <td>
                        {{$row['IsRebuy'] == 0 ? '' : '[수강연장]'}} 9급공무원 | 2019학년도 | 이론 | 국어 | {{$row['wProfName']}} |
                        <b>{{$row['subProdName']}}</b><br/>
                        <b>[수강기간]</b> {{$row['LecStartDate']}} ~ {{$row['RealLecEndDate']}} ({{$row['RealLecExpireDay']}}일)</br>
                        <b>[촬영형태]</b> 실강
                        <b>[진행상태]</b> 진행중 (10강 / 200강)
                        <b>[배수]</b> 2배수
                        <b>[진도율]</b> 20%
                    </td>
                    <td>[
                        @if($row['LecStartDate'] > date('Y-m-d'))
                            수강대기
                        @elseif($row['RealLecEndDate'] < date('Y-m-d'))
                            수강종료
                        @elseif($row['lastPauseStartDate'] <= date('Y-m-d') && $row['lastPauseEndDate'] >= date('Y-m-d'))
                            일시중지중
                        @else
                            수강중
                        @endif
                            ]</td>
                    <td><button type="button" class="btn btn-primary btn-search" id="btn_history">학습수강이력</button></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-search" id="btn_start">강의시작일</button><br/>
                        <button type="button" class="btn btn-primary btn-search" id="btn_extend">수강연장</button><br/>
                        <button type="button" class="btn btn-primary btn-search" id="btn_pause">일시정지</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">결제정보 :
                        <b>[주문번호]</b> 11111111
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제채널]</b> 어쩌구
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제루트]</b> {{$row['PayRouteCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제수단]</b> 카드
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제일]</b> {{$row['OrderDate']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제금액]</b> 0000,0000원
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제상태]</b> 결제완료
                    </td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">수강중인 단과강의가 없습니다.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="x_panel mt-10 leclist" style="display:none;" id="tab_lecture2">
    222
</div>

<div class="x_panel mt-10 leclist" style="display:none;" id="tab_lecture3">
    3333
</div>

<div class="x_panel mt-10 leclist" style="display:none;" id="tab_lecture4">
    444
</div>

<div class="x_panel mt-10 leclist" style="display:none;" id="tab_lecture5">
    555
</div>

<div class="x_panel mt-10 leclist" style="display:none;" id="tab_lecture6">
    666
</div>

<div class="x_panel mt-10 leclist" style="display:none;" id="tab_lecture7">
    777
</div>


<script type="text/javascript">
    $(document).ready(function (){


        $('#search_form_lecture').submit(function () {
            $url = '{{site_url('member/manage/ajaxLecture')}}';
            $data = $('#search_form_lecture').formSerialize();

            sendAjax($url,
                $data,
                function(d){
                    $("#tab-content").html(d).end();
                },
                function(req, status, err){
                    showError(req, status);
                }, false, 'GET', 'html');
        });
    });

    function tabShow(id){
        $('.leclist').hide();
        $('#tab_lecture'+id).show();
    }
</script>