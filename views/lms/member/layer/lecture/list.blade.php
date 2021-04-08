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
    <div class="text-right"><b style="color:red">※ 전환처리 기능은 임용사이트만 사용하는 기능입니다.</b></div>

</div>
<!-- 단강좌 --->
<div class="x_panel mt-10 leclist" style="" id="tab_lecture1">
    <div class="x_content">
        <table id="list_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>운영사이트</th>
                <th>강좌정보</th>
                <th>전환상태</th>
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
                        @if($row['LecTypeCcd'] == '607003')
                            | <span class="red no-line-height">직장인/재학생반</span>
                        @endif
                        | {{$row['CourseName']}} | {{$row['SubjectName']}} | {{$row['wProfName']}} |
                        <b>{{$row['subProdName']}}</b><br/>
                        <b>[수강기간]</b> {{$row['LecStartDate']}} ~ {{$row['RealLecEndDate']}} ({{$row['RealLecExpireDay']}}일)</br>
                        <b>[진행상태]</b> {{$row['wLectureProgressCcdName']}}
                        <b>[배수]</b> {{$row['MultipleApply'] == '1' ? '무제한' : $row['MultipleApply'].'배수' }}
                        <b>[진도율]</b> {{$row['StudyRate']}}%
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnTransForm('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'on')">전환처리</button>
                        <br>
                        @if($row['TransformCnt'] > 0)
                            {{$row['IsDisp'] == 'N'? '직강전환' : '해제'}}
                        @endif
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
                        <b>[결제상태]</b> {!! $row['PayStatusCcd'] == '676006' ? '<span style="color:red">':'<span style="color:blue">' !!}{{$row['PayStatusCcdName']}}</span>
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

<!-- 사용자패키지 -->
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
                        <b>[결제상태]</b> {!! $row['PayStatusCcd'] == '676006' ? '<span style="color:red">':'<span style="color:blue">' !!}{{$row['PayStatusCcdName']}}</span>
                    </td>
                </tr>
                <tr>
                    <th>운영사이트</th>
                    <th>강좌정보</th>
                    <th>전환상태</th>
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
                            @if($subrow['LecTypeCcd'] == '607003')
                                | <span class="red no-line-height">직장인/재학생반</span>
                            @endif
                            | {{$subrow['CourseName']}} | {{$subrow['SubjectName']}} | {{$subrow['wProfName']}} |
                            <b>{{$subrow['subProdName']}}</b><br/>
                            <b>[수강기간]</b> {{$subrow['LecStartDate']}} ~ {{$subrow['RealLecEndDate']}} ({{$subrow['RealLecExpireDay']}}일)</br>
                            <b>[진행상태]</b> {{$subrow['wLectureProgressCcdName']}}
                            <b>[배수]</b> {{$subrow['MultipleApply'] == '1' ? '무제한' : $subrow['MultipleApply'].'배수' }}
                            <b>[진도율]</b> {{$subrow['StudyRate']}}%
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnTransForm('{{$subrow['OrderIdx']}}','{{$subrow['ProdCode']}}','{{$subrow['ProdCodeSub']}}', 'on')">전환처리</button>
                            <br>
                            @if($subrow['TransformCnt'] > 0)
                                {{$subrow['IsDisp'] == 'N'? '직강전환' : '해제'}}
                            @endif
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

<!-- 운영자패키지 -->
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
                        <b>[결제상태]</b> {!! $row['PayStatusCcd'] == '676006' ? '<span style="color:red">':'<span style="color:blue">' !!}{{$row['PayStatusCcdName']}}</span>
                    </td>
                </tr>
                <tr>
                    <th>운영사이트</th>
                    <th>강좌정보</th>
                    <th>전환상태</th>
                    <th>학습이력현황</th>
                </tr>
                @forelse($row['subleclist'] as $subrow)
                    <tr>
                        <td>{{$row['SiteName']}}</td>
                        <td>
                            {{$row['CateName']}} |
                            {{$subrow['SchoolYear']}}학년도
                            @if($subrow['LecTypeCcd'] == '607003')
                                | <span class="red no-line-height">직장인/재학생반</span>
                            @endif
                            | {{$subrow['CourseName']}} | {{$subrow['SubjectName']}} | {{$subrow['wProfName']}} |
                            <b>{{$subrow['subProdName']}}</b><br/>

                            <b>[진행상태]</b> {{$subrow['wLectureProgressCcdName']}}
                            <b>[배수]</b> {{$subrow['MultipleApply'] == '1' ? '무제한' : $subrow['MultipleApply'].'배수' }}
                            <b>[진도율]</b> {{$subrow['StudyRate']}}%
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnTransForm('{{$subrow['OrderIdx']}}','{{$subrow['ProdCode']}}','{{$subrow['ProdCodeSub']}}', 'on')">전환처리</button>
                            <br>
                            @if($subrow['TransformCnt'] > 0)
                                {{$subrow['IsDisp'] == 'N'? '직강전환' : '해제'}}
                            @endif
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

<!-- 기간제패키지 -->
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
                        <b>[결제상태]</b> {!! $row['PayStatusCcd'] == '676006' ? '<span style="color:red">':'<span style="color:blue">' !!}{{$row['PayStatusCcdName']}}</span>
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
                            @if($subrow['LecTypeCcd'] == '607003')
                                | <span class="red no-line-height">직장인/재학생반</span>
                            @endif
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

<!-- 무료강좌 -->
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
                        <b>[결제상태]</b> {!! $row['PayStatusCcd'] == '676006' ? '<span style="color:red">':'<span style="color:blue">' !!}{{$row['PayStatusCcdName']}}</span>
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

<!-- 학원단과 -->
<div class="x_panel mt-10 leclist" style="display:none;" id="tab_lecture6">
    <div class="x_content">
        <table id="list_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>운영사이트</th>
                <th>강좌정보</th>
                <th>전환상태</th>
                <th>수강상태</th>
            </tr>
            </thead>
            <tbody>
            @forelse($offdan as $row)
                <tr>
                    <td>{{$row['SiteName']}}</td>
                    <td>
                        {{$row['PayRouteCcdName']}} |
                        {{$row['CateName']}} |
                        {{$row['StudyPatternCcdName']}} |
                        {{$row['StudyApplyCcdName']}} |
                        {{$row['SchoolStartYear']}}년 {{$row['SchoolStartMonth']}}월 |
                        {{$row['CourseName']}}  |
                        {{$row['SubjectName']}} |
                        {{$row['wProfName']}} |
                        <b>{{$row['subProdName']}}</b>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnTransForm('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'off')">전환처리</button>
                        <br>
                        @if($row['TransformCnt'] > 0)
                            {{$row['IsDisp'] == 'N' ? '인강전환' : '해제'}}
                        @endif
                    </td>
                    <td>[
                        @if($row['LecStartDate'] > date('Y-m-d'))
                            수강대기
                        @elseif($row['RealLecEndDate'] < date('Y-m-d'))
                            수강종료
                        @else
                            수강중
                        @endif
                        ]</td>
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
                        <b>[상품구분]</b> 학원단과
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[캠퍼스]</b> {{$row['CampusCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[수강형태]</b> {{$row['StudyPatternCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제금액]</b> {{number_format($row['RealPayPrice'],0)}}원
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제상태]</b> {!! $row['PayStatusCcd'] == '676006' ? '<span style="color:red">':'<span style="color:blue">' !!}{{$row['PayStatusCcdName']}}</span>
                        @if(empty($row['bogang']) == false)
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            <button type="button" class="btn btn-primary btn-search btn-dark" id="btn_history" onclick="fnBogang('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', '')">보강동영상신청이력</button>
                        @endif
                    </td>
                </tr>
                @if(empty($row['bogang']) == false)
                    <tr>
                        <td colspan="6">
                            <table id="list_table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>운영사이트</th>
                                    <th>강좌정보</th>
                                    {{-- <th>전환상태</th> --}}
                                    <th>수강상태</th>
                                    <th>학습이력현황</th>
                                    <th>수강정책관리</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($row['bogang'] as $row2)
                                    <tr>
                                        <td>보강동영상<br>
                                            신청강좌<br>
                                            (온라인강좌)
                                            </td>
                                        <td>
                                            <b style="color:red">[{{$row2['PayRouteCcdName']}} - {{$row2['SalePatternCcdName']}}]</b>
                                            {{$row2['CateName']}}
                                            | {{$row2['SchoolYear']}}학년도
                                            @if($row2['LecTypeCcd'] == '607003')
                                                | <span class="red no-line-height">직장인/재학생반</span>
                                            @endif
                                            | {{$row2['CourseName']}} | {{$row2['SubjectName']}} | {{$row2['wProfName']}} |
                                            <b>{{$row2['subProdName']}}</b><br/>
                                            <b>[수강기간]</b> {{$row2['LecStartDate']}} ~ {{$row2['RealLecEndDate']}} ({{$row2['RealLecExpireDay']}}일)</br>
                                            <b>[진행상태]</b> {{$row2['wLectureProgressCcdName']}}
                                            <b>[배수]</b> {{$row2['MultipleApply'] == '1' ? '무제한' : $row2['MultipleApply'].'배수' }}
                                            <b>[진도율]</b> {{$row2['StudyRate']}}%
                                        </td>
                                        {{-- <td>
                                            <button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnTransForm('{{$row2['OrderIdx']}}','{{$row2['ProdCode']}}','{{$row2['ProdCodeSub']}}', 'on')">전환처리</button>
                                            <br>
                                            @if($row2['TransformCnt'] > 0)
                                                {{$row2['IsDisp'] == 'N'? '직강전환' : '해제'}}
                                            @endif
                                        </td> --}}
                                        <td>[
                                            @if($row2['LecStartDate'] > date('Y-m-d'))
                                                수강대기
                                            @elseif($row2['RealLecEndDate'] < date('Y-m-d'))
                                                수강종료
                                            @elseif($row2['lastPauseStartDate'] <= date('Y-m-d') && $row2['lastPauseEndDate'] >= date('Y-m-d'))
                                                일시중지중
                                            @else
                                                수강중
                                            @endif
                                            ]</td>
                                        <td><button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnCurriculum('{{$row2['OrderIdx']}}','{{$row2['ProdCode']}}','{{$row2['ProdCodeSub']}}')">학습수강이력</button></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-search" id="btn_start" onclick="fnStart('{{$row2['OrderIdx']}}','{{$row2['ProdCode']}}','{{$row2['ProdCodeSub']}}', 'S')">강의시작일</button><br/>
                                            <button type="button" class="btn btn-primary btn-search" id="btn_extend" onclick="fnExtend('{{$row2['OrderIdx']}}','{{$row2['ProdCode']}}','{{$row2['ProdCodeSub']}}', 'S')">수강연장</button><br/>
                                            <button type="button" class="btn btn-primary btn-search" id="btn_pause" onclick="fnPause('{{$row2['OrderIdx']}}','{{$row2['ProdCode']}}','{{$row2['ProdCodeSub']}}', 'S')">일시정지</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">결제정보 :
                                            <b>[주문번호]</b> {{$row2['OrderNo']}} ({{$row2['OrderIdx']}})
                                            &nbsp; &nbsp; &nbsp; &nbsp;
                                            <b>[결제채널]</b> {{$row2['PayChannelCcdName']}}
                                            &nbsp; &nbsp; &nbsp; &nbsp;
                                            <b>[결제루트]</b> {{$row2['PayRouteCcdName']}}
                                            &nbsp; &nbsp; &nbsp; &nbsp;
                                            <b>[결제수단]</b> {{$row2['PayMethodCcdName']}}
                                            &nbsp; &nbsp; &nbsp; &nbsp;
                                            <b>[결제일]</b> {{$row2['OrderDate']}}
                                            &nbsp; &nbsp; &nbsp; &nbsp;
                                            <b>[결제금액]</b> {{number_format($row2['RealPayPrice'],0)}}원
                                            &nbsp; &nbsp; &nbsp; &nbsp;
                                            <b>[결제상태]</b> {!! $row2['PayStatusCcd'] == '676006' ? '<span style="color:red">':'<span style="color:blue">' !!}{{$row2['PayStatusCcdName']}}</span>
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
                        </td>
                    </tr>
                @endif
                <tr>
                    <td colspan="6"></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">수강중인 학원단과반이 없습니다.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- 학원종합반 -->
<div class="x_panel mt-10 leclist" style="display:none;" id="tab_lecture7">
    <div class="x_content">
        <table id="list_table" class="table table-striped table-bordered">
            <tbody>
            @forelse($offpkg as $row)
                <tr>
                    <td colspan="4">
                        {{$row['SiteName']}} |
                        {{$row['CateName']}} |
                        {{$row['StudyPatternCcdName']}} |
                        {{$row['StudyApplyCcdName']}} |
                        {{$row['PackTypeCcdName']}} |
                        {{$row['SchoolStartYear']}}년 {{$row['SchoolStartMonth']}}월 |
                        <b>{{$row['ProdName']}}</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        결제정보 :
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
                        <b>[상품구분]</b> 학원종합반
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[캠퍼스]</b> {{$row['CampusCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[수강형태]</b> {{$row['StudyPatternCcdName']}}
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제금액]</b> {{number_format($row['RealPayPrice'],0)}}원
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>[결제상태]</b> {!! $row['PayStatusCcd'] == '676006' ? '<span style="color:red">':'<span style="color:blue">' !!}{{$row['PayStatusCcdName']}}</span>
                    </td>
                </tr>
                <tr>
                    <th>운영사이트</th>
                    <th>강좌정보</th>
                    <th>전환상태</th>
                    <th>수강상태</th>
                </tr>
                @foreach($row['subleclist'] as $row_sub)
                    <tr>
                        <td>{{$row_sub['SiteName']}}</td>
                        <td>
                            {{$row_sub['CateName']}} |
                            {{$row_sub['SchoolStartYear']}}년 {{$row_sub['SchoolStartMonth']}}월 |
                            {{$row_sub['CourseName']}}  |
                            {{$row_sub['SubjectName']}} |
                            {{$row_sub['StudyPatternCcdName']}} |
                            {{$row_sub['wProfName']}} |
                            <b>{{$row_sub['subProdName']}}</b>
                            @if(empty($row_sub['bogang']) == false)
                                &nbsp; &nbsp; &nbsp; &nbsp;
                                <button type="button" class="btn btn-primary btn-search btn-dark" id="btn_history" onclick="fnBogang('{{$row_sub['OrderIdx']}}','{{$row_sub['ProdCode']}}','{{$row_sub['ProdCodeSub']}}', 'P')">보강동영상신청이력</button>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnTransForm('{{$row_sub['OrderIdx']}}','{{$row_sub['ProdCode']}}','{{$row_sub['ProdCodeSub']}}', 'off')">전환처리</button>
                            <br>
                            @if($row_sub['TransformCnt'] > 0)
                                {{$row_sub['IsDisp'] == 'N'? '인강전환' : '해제'}}
                            @endif
                        </td>
                        <td>[
                            @if($row_sub['LecStartDate'] > date('Y-m-d'))
                                수강대기
                            @elseif($row_sub['RealLecEndDate'] < date('Y-m-d'))
                                수강종료
                            @else
                                수강중
                            @endif
                            ]</td>
                    </tr>
                    @if(empty($row_sub['bogang']) == false)
                        <tr>
                            <td colspan="6">
                                <table id="list_table" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>운영사이트</th>
                                        <th>강좌정보</th>
                                        {{-- <th>전환상태</th> --}}
                                        <th>수강상태</th>
                                        <th>학습이력현황</th>
                                        <th>수강정책관리</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($row_sub['bogang'] as $row2)
                                        <tr>
                                            <td>보강동영상<br>
                                                신청강좌<br>
                                                (온라인강좌)
                                            </td>
                                            <td>
                                                <b style="color:red">[{{$row2['PayRouteCcdName']}} - {{$row2['SalePatternCcdName']}}]</b>
                                                {{$row2['CateName']}}
                                                | {{$row2['SchoolYear']}}학년도
                                                @if($row2['LecTypeCcd'] == '607003')
                                                    | <span class="red no-line-height">직장인/재학생반</span>
                                                @endif
                                                | {{$row2['CourseName']}} | {{$row2['SubjectName']}} | {{$row2['wProfName']}} |
                                                <b>{{$row2['subProdName']}}</b><br/>
                                                <b>[수강기간]</b> {{$row2['LecStartDate']}} ~ {{$row2['RealLecEndDate']}} ({{$row2['RealLecExpireDay']}}일)</br>
                                                <b>[진행상태]</b> {{$row2['wLectureProgressCcdName']}}
                                                <b>[배수]</b> {{$row2['MultipleApply'] == '1' ? '무제한' : $row2['MultipleApply'].'배수' }}
                                                <b>[진도율]</b> {{$row2['StudyRate']}}%
                                            </td>
                                            {{-- <td>
                                                <button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnTransForm('{{$row2['OrderIdx']}}','{{$row2['ProdCode']}}','{{$row2['ProdCodeSub']}}', 'on')">전환처리</button>
                                                <br>
                                                @if($row2['TransformCnt'] > 0)
                                                    {{$row2['IsDisp'] == 'N'? '직강전환' : '해제'}}
                                                @endif
                                            </td> --}}
                                            <td>[
                                                @if($row2['LecStartDate'] > date('Y-m-d'))
                                                    수강대기
                                                @elseif($row2['RealLecEndDate'] < date('Y-m-d'))
                                                    수강종료
                                                @elseif($row2['lastPauseStartDate'] <= date('Y-m-d') && $row2['lastPauseEndDate'] >= date('Y-m-d'))
                                                    일시중지중
                                                @else
                                                    수강중
                                                @endif
                                                ]</td>
                                            <td><button type="button" class="btn btn-primary btn-search" id="btn_history" onclick="fnCurriculum('{{$row2['OrderIdx']}}','{{$row2['ProdCode']}}','{{$row2['ProdCodeSub']}}')">학습수강이력</button></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-search" id="btn_start" onclick="fnStart('{{$row2['OrderIdx']}}','{{$row2['ProdCode']}}','{{$row2['ProdCodeSub']}}', 'S')">강의시작일</button><br/>
                                                <button type="button" class="btn btn-primary btn-search" id="btn_extend" onclick="fnExtend('{{$row2['OrderIdx']}}','{{$row2['ProdCode']}}','{{$row2['ProdCodeSub']}}', 'S')">수강연장</button><br/>
                                                <button type="button" class="btn btn-primary btn-search" id="btn_pause" onclick="fnPause('{{$row2['OrderIdx']}}','{{$row2['ProdCode']}}','{{$row2['ProdCodeSub']}}', 'S')">일시정지</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">결제정보 :
                                                <b>[주문번호]</b> {{$row2['OrderNo']}} ({{$row2['OrderIdx']}})
                                                &nbsp; &nbsp; &nbsp; &nbsp;
                                                <b>[결제채널]</b> {{$row2['PayChannelCcdName']}}
                                                &nbsp; &nbsp; &nbsp; &nbsp;
                                                <b>[결제루트]</b> {{$row2['PayRouteCcdName']}}
                                                &nbsp; &nbsp; &nbsp; &nbsp;
                                                <b>[결제수단]</b> {{$row2['PayMethodCcdName']}}
                                                &nbsp; &nbsp; &nbsp; &nbsp;
                                                <b>[결제일]</b> {{$row2['OrderDate']}}
                                                &nbsp; &nbsp; &nbsp; &nbsp;
                                                <b>[결제금액]</b> {{number_format($row2['RealPayPrice'],0)}}원
                                                &nbsp; &nbsp; &nbsp; &nbsp;
                                                <b>[결제상태]</b> {!! $row2['PayStatusCcd'] == '676006' ? '<span style="color:red">':'<span style="color:blue">' !!}{{$row2['PayStatusCcdName']}}</span>
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
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="4"></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">수강중인 학원종합반이 없습니다.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
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

    function fnTransForm(orderidx, prodcode, prodcodesub, prodtype)
    {
        popupOpen('/member/manage/TransForm/?memidx={{$memIdx}}&orderidx='+orderidx+'&prodcode='+prodcode+'&prodcodesub='+prodcodesub+'&prodtype='+prodtype,
            'TransForm', 1200, 900, null, null, 'yes','no');
    }

    function fnBogang(orderidx, prodcode, prodcodesub, prodtype)
    {
        popupOpen('/member/manage/bogang/?memidx={{$memIdx}}&orderidx='+orderidx+'&prodcode='+prodcode+'&prodcodesub='+prodcodesub+'&prodtype='+prodtype,
            'Extend', 1200, 900, null, null, 'yes','no');
    }
</script>