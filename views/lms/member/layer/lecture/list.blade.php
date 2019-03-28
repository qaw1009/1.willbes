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
                    <td>{{$row['SiteName']}}</td>
                    <td>
                        <b style="color:red">[{{$row['PayRouteCcdName']}} - {{$row['SalePatternCcdName']}}]</b>
                        {{$row['CateName']}}
                        | {{$row['SchoolYear']}}학년도
                        | {{$row['CourseName']}} | {{$row['SubjectName']}} | {{$row['wProfName']}} |
                        <b>{{$row['subProdName']}}</b><br/>
                        <b>[수강기간]</b> {{$row['LecStartDate']}} ~ {{$row['RealLecEndDate']}} ({{$row['RealLecExpireDay']}}일)</br>
                        <b>[진행상태]</b> {{$row['wLectureProgressCcdName']}}
                        <b>[배수]</b> {{$row['MultipleApply'] == '1' ? '무제한' : $row['MultipleApply'].'배수' }}
                        <b>[진도율]</b> {{$row['StudyRate']}}%
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
                    <td><button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnCurriculum('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}')">학습수강이력</button></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-search" id="btn_start" onclick="fnStart('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'S')">강의시작일</button><br/>
                        <button type="button" class="btn btn-primary btn-search" id="btn_extend" onclick="fnExtend('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'S')">수강연장</button><br/>
                        <button type="button" class="btn btn-primary btn-search" id="btn_pause" onclick="fnPause('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'S')">일시정지</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">결제정보 :
                        <b>[주문번호]</b> {{$row['OrderNo']}} ({{$row['OrderIdx']}})
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제채널]</b> {{$row['PayChannelCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제루트]</b> {{$row['PayRouteCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제수단]</b> {{$row['PayMethodCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제일]</b> {{$row['OrderDate']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제금액]</b> {{number_format($row['RealPayPrice'],0)}}원
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제상태]</b> {{$row['PayStatusCcdName']}}
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
    <div class="x_content">
        <table id="list_table" class="table table-striped table-bordered">
            <tbody>
            @forelse($userpkg as $row)
                <tr>
                    <td colspan="5">
                        {{$row['SiteName']}} -
                        <b style="color:red">[{{$row['PayRouteCcdName']}} - {{$row['SalePatternCcdName']}}]</b>
                        {{$row['CateName']}} |
                        {{$row['SchoolYear']}}학년도
                        <b>{{$row['ProdName']}}</b><br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">결제정보 :
                        <b>[주문번호]</b> {{$row['OrderNo']}} ({{$row['OrderIdx']}})
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제채널]</b> {{$row['PayChannelCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제루트]</b> {{$row['PayRouteCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제수단]</b> {{$row['PayMethodCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제일]</b> {{$row['OrderDate']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제금액]</b> {{number_format($row['RealPayPrice'],0)}}원
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제상태]</b> {{$row['PayStatusCcdName']}}
                    </td>
                </tr>
                <tr>
                    <th>운영사이트</th>
                    <th>강좌정보</th>
                    <th>수강상태</th>
                    <th>학습이력현황</th>
                    <th>수강정책관리</th>
                </tr>
                @forelse($row['subleclist'] as $subrow)
                    <tr>
                        <td>{{$row['SiteName']}}</td>
                        <td>
                            {{$row['CateName']}} |
                            {{$subrow['SchoolYear']}}학년도
                            | {{$subrow['CourseName']}} | {{$subrow['SubjectName']}} | {{$subrow['wProfName']}} |
                            <b>{{$subrow['subProdName']}}</b><br/>
                            <b>[수강기간]</b> {{$subrow['LecStartDate']}} ~ {{$subrow['RealLecEndDate']}} ({{$subrow['RealLecExpireDay']}}일)</br>
                            <b>[진행상태]</b> {{$subrow['wLectureProgressCcdName']}}
                            <b>[배수]</b> {{$subrow['MultipleApply'] == '1' ? '무제한' : $subrow['MultipleApply'].'배수' }}
                            <b>[진도율]</b> {{$subrow['StudyRate']}}%
                        </td>
                        <td>[
                            @if($subrow['LecStartDate'] > date('Y-m-d'))
                                수강대기
                            @elseif($subrow['RealLecEndDate'] < date('Y-m-d'))
                                수강종료
                            @elseif($subrow['lastPauseStartDate'] <= date('Y-m-d') && $subrow['lastPauseEndDate'] >= date('Y-m-d'))
                                일시중지중
                            @else
                                수강중
                            @endif
                            ]</td>
                        <td><button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnCurriculum('{{$subrow['OrderIdx']}}','{{$subrow['ProdCode']}}','{{$subrow['ProdCodeSub']}}')">학습수강이력</button></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-search" id="btn_start" onclick="fnStart('{{$subrow['OrderIdx']}}','{{$subrow['ProdCode']}}','{{$subrow['ProdCodeSub']}}', 'S')">강의시작일</button><br/>
                            <button type="button" class="btn btn-primary btn-search" id="btn_extend" onclick="fnExtend('{{$subrow['OrderIdx']}}','{{$subrow['ProdCode']}}','{{$subrow['ProdCodeSub']}}', 'S')">수강연장</button><br/>
                            <button type="button" class="btn btn-primary btn-search" id="btn_pause" onclick="fnPause('{{$subrow['OrderIdx']}}','{{$subrow['ProdCode']}}','{{$subrow['ProdCodeSub']}}', 'S')">일시정지</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">서브강좌목록이 없습니다.</td>
                    </tr>
                    @endforelse

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

<div class="x_panel mt-10 leclist" style="display:none;" id="tab_lecture3">
    <div class="x_content">
        <table id="list_table" class="table table-striped table-bordered">
            <tbody>
            @forelse($pkg as $row)
                <tr>
                    <td colspan="3">
                        {{$row['SiteName']}} -
                        <b style="color:red">[{{$row['PayRouteCcdName']}} - {{$row['SalePatternCcdName']}}]</b>
                        {{$row['CateName']}} |
                        {{$row['SchoolYear']}}학년도
                        <b>{{$row['ProdName']}}</b> &nbsp; &nbsp; &nbsp;
                        <b>[수강기간]</b> {{$row['LecStartDate']}} ~ {{$row['RealLecEndDate']}} ({{$row['RealLecExpireDay']}}일) &nbsp; &nbsp; &nbsp;
                        [
                        @if($row['LecStartDate'] > date('Y-m-d'))
                            수강대기
                        @elseif($row['RealLecEndDate'] < date('Y-m-d'))
                            수강종료
                        @elseif($row['lastPauseStartDate'] <= date('Y-m-d') && $row['lastPauseEndDate'] >= date('Y-m-d'))
                            일시중지중
                        @else
                            수강중
                        @endif
                        ] &nbsp; &nbsp; &nbsp; &nbsp;
                        <button type="button" class="btn btn-primary btn-search" id="btn_start" onclick="fnStart('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P')">강의시작일</button>
                        <button type="button" class="btn btn-primary btn-search" id="btn_extend" onclick="fnExtend('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P')">수강연장</button>
                        <button type="button" class="btn btn-primary btn-search" id="btn_pause" onclick="fnPause('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P')">일시정지</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">결제정보 :
                        <b>[주문번호]</b> {{$row['OrderNo']}} ({{$row['OrderIdx']}})
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제채널]</b> {{$row['PayChannelCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제루트]</b> {{$row['PayRouteCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제수단]</b> {{$row['PayMethodCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제일]</b> {{$row['OrderDate']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제금액]</b> {{number_format($row['RealPayPrice'],0)}}원
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제상태]</b> {{$row['PayStatusCcdName']}}
                    </td>
                </tr>
                <tr>
                    <th>운영사이트</th>
                    <th>강좌정보</th>
                    <th>학습이력현황</th>
                </tr>
                @forelse($row['subleclist'] as $subrow)
                    <tr>
                        <td>{{$row['SiteName']}}</td>
                        <td>
                            {{$row['CateName']}} |
                            {{$subrow['SchoolYear']}}학년도
                            | {{$subrow['CourseName']}} | {{$subrow['SubjectName']}} | {{$subrow['wProfName']}} |
                            <b>{{$subrow['subProdName']}}</b><br/>

                            <b>[진행상태]</b> {{$subrow['wLectureProgressCcdName']}}
                            <b>[배수]</b> {{$subrow['MultipleApply'] == '1' ? '무제한' : $subrow['MultipleApply'].'배수' }}
                            <b>[진도율]</b> {{$subrow['StudyRate']}}%
                        </td>
                        <td><button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnCurriculum('{{$subrow['OrderIdx']}}','{{$subrow['ProdCode']}}','{{$subrow['ProdCodeSub']}}')">학습수강이력</button></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">서브강좌목록이 없습니다.</td>
                    </tr>
                @endforelse

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

<div class="x_panel mt-10 leclist" style="display:none;" id="tab_lecture4">
    <div class="x_content">
        <table id="list_table" class="table table-striped table-bordered">
            <tbody>
            @forelse($pass as $row)
                <tr>
                    <td colspan="3">
                        {{$row['SiteName']}} -
                        <b style="color:red">[{{$row['PayRouteCcdName']}} - {{$row['SalePatternCcdName']}}]</b>
                        {{$row['CateName']}} |
                        {{$row['SchoolYear']}}학년도
                        <b>{{$row['ProdName']}}</b> &nbsp; &nbsp; &nbsp;
                        <b>[수강기간]</b> {{$row['LecStartDate']}} ~ {{$row['RealLecEndDate']}} ({{$row['RealLecExpireDay']}}일) &nbsp; &nbsp; &nbsp;
                        [
                        @if($row['LecStartDate'] > date('Y-m-d'))
                            수강대기
                        @elseif($row['RealLecEndDate'] < date('Y-m-d'))
                            수강종료
                        @elseif($row['lastPauseStartDate'] <= date('Y-m-d') && $row['lastPauseEndDate'] >= date('Y-m-d'))
                            일시중지중
                        @else
                            수강중
                        @endif
                        ] &nbsp; &nbsp; &nbsp; &nbsp;
                        <button type="button" class="btn btn-primary btn-search" id="btn_start" onclick="fnStart('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P')">강의시작일</button>
                        <button type="button" class="btn btn-primary btn-search" id="btn_extend" onclick="fnExtend('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P')">수강연장</button>
                        <button type="button" class="btn btn-primary btn-search" id="btn_pause" onclick="fnPause('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P')">일시정지</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">결제정보 :
                        <b>[주문번호]</b> {{$row['OrderNo']}} ({{$row['OrderIdx']}})
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제채널]</b> {{$row['PayChannelCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제루트]</b> {{$row['PayRouteCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제수단]</b> {{$row['PayMethodCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제일]</b> {{$row['OrderDate']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제금액]</b> {{number_format($row['RealPayPrice'],0)}}원
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제상태]</b> {{$row['PayStatusCcdName']}}
                    </td>
                </tr>
                <tr>
                    <th>운영사이트</th>
                    <th>강좌정보</th>
                    <th>학습이력현황</th>
                </tr>
                @forelse($row['subleclist'] as $subrow)
                    <tr>
                        <td>{{$row['SiteName']}}</td>
                        <td>
                            {{$row['CateName']}} |
                            {{$subrow['SchoolYear']}}학년도
                            | {{$subrow['CourseName']}} | {{$subrow['SubjectName']}} | {{$subrow['wProfName']}} |
                            <b>{{$subrow['subProdName']}}</b><br/>

                            <b>[진행상태]</b> {{$subrow['wLectureProgressCcdName']}}
                            <b>[배수]</b> {{$subrow['MultipleApply'] == '1' ? '무제한' : $subrow['MultipleApply'].'배수' }}
                            <b>[진도율]</b> {{$subrow['StudyRate']}}%
                        </td>
                        <td><button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnCurriculum('{{$subrow['OrderIdx']}}','{{$subrow['ProdCode']}}','{{$subrow['ProdCodeSub']}}')">학습수강이력</button></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">서브강좌목록이 없습니다.</td>
                    </tr>
                @endforelse

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

<div class="x_panel mt-10 leclist" style="display:none;" id="tab_lecture5">
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
            @forelse($free as $row)
                <tr>
                    <td>{{$row['SiteName']}}</td>
                    <td>
                        <b style="color:red">[{{$row['PayRouteCcdName']}} - {{$row['SalePatternCcdName']}}]</b>
                        {{$row['CateName']}} |
                        {{$row['SchoolYear']}}학년도
                        | {{$row['CourseName']}} | {{$row['SubjectName']}} | {{$row['wProfName']}} |
                        <b>{{$row['subProdName']}}</b><br/>
                        <b>[수강기간]</b> {{$row['LecStartDate']}} ~ {{$row['RealLecEndDate']}} ({{$row['RealLecExpireDay']}}일)</br>
                        <b>[진행상태]</b> {{$row['wLectureProgressCcdName']}}
                        <b>[배수]</b> {{$row['MultipleApply'] == '1' ? '무제한' : $row['MultipleApply'].'배수' }}
                        <b>[진도율]</b> {{$row['StudyRate']}}%
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
                    <td><button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnCurriculum('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}')">학습수강이력</button></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-search" id="btn_extend" onclick="fnExtend('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'S')">수강연장</button><br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">결제정보 :
                        <b>[주문번호]</b> {{$row['OrderNo']}} ({{$row['OrderIdx']}})
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제채널]</b> {{$row['PayChannelCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제루트]</b> {{$row['PayRouteCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제수단]</b> {{$row['PayMethodCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제일]</b> {{$row['OrderDate']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제금액]</b> {{number_format($row['RealPayPrice'],0)}}원
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제상태]</b> {{$row['PayStatusCcdName']}}
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

    function fnCurriculum(orderidx, prodcode, prodcodesub)
    {
        popupOpen('/member/manage/viewCurriculum/?memidx={{$memIdx}}&orderidx='+orderidx+'&prodcode='+prodcode+'&prodcodesub='+prodcodesub,
            'viewCurriculum', 1600, 900, null, null, 'yes','no');
    }

    function fnStart(orderidx, prodcode, prodcodesub, prodtype)
    {
        popupOpen('/member/manage/start/?memidx={{$memIdx}}&orderidx='+orderidx+'&prodcode='+prodcode+'&prodcodesub='+prodcodesub+'&prodtype='+prodtype,
            'setStart', 1000, 800, null, null, 'yes','no');
    }

    function fnExtend(orderidx, prodcode, prodcodesub, prodtype)
    {
        popupOpen('/member/manage/extend/?memidx={{$memIdx}}&orderidx='+orderidx+'&prodcode='+prodcode+'&prodcodesub='+prodcodesub+'&prodtype='+prodtype,
            'Extend', 1200, 900, null, null, 'yes','no');
    }

    function fnPause(orderidx, prodcode, prodcodesub, prodtype)
    {
        popupOpen('/member/manage/pause/?memidx={{$memIdx}}&orderidx='+orderidx+'&prodcode='+prodcode+'&prodcodesub='+prodcodesub+'&prodtype='+prodtype,
            'Pause', 1200, 900, null, null, 'yes','no');
    }
</script>