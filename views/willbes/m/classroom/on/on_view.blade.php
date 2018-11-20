@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    강의수강하기
                </div>
            </div>
        </div>

        <div class="passProfTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <colgroup>
                    <col style="width: 15%;">
                    <col style="width: 85%;">
                </colgroup>
                <tbody>
                <tr>
                    <td>
                        <div class="w-prof p_re">
                            <img src="{{ $lec['ProfReferData']['lec_list_img'] or '' }}">
                            <div class="cover"><img src="{{ img_url('m/mypage/profImg-cover.png') }}"></div>
                        </div>
                        <div class="w-data tx-left pl15">
                            <dl class="w-info">
                                <dt>{{$lec['SubjectName']}}<span class="row-line">|</span>{{$lec['CourseName']}}<span class="row-line">|</span>{{$lec['wProfName']}}교수님</dt>
                            </dl>
                            <div class="w-tit">
                                {{$lec['subProdName']}}
                            </div>
                        </div>
                        <div class="w-info tx-gray bdt-bright-gray">
                            <dl>
                                <dt><strong>강좌정보 :</strong> {{$lec['wLectureProgressCcdName']}}<span class="row-line">|</span>{{$lec['MultipleApply'] == '1' ? '무제한' : $lec['MultipleApply'].'배수' }}</dt><br/>
                                <dt><strong>진도율 :</strong> <span class="tx-blue">{{$lec['StudyRate']}}%</span><!-- (1강/20강) --><span class="row-line">|</span>
                                    <strong>잔여기간 :</strong> <span class="tx-blue">
                                                @if(strtotime($lec['LecStartDate']) > strtotime(date("Y-m-d", time())))
                                            {{ intval(strtotime($lec['RealLecEndDate']) - strtotime($lec['LecStartDate']))/86400 +1 }}일
                                        @elseif(empty($lec['lastPauseEndDate']) == true)
                                            {{ intval(strtotime($lec['RealLecEndDate']) - strtotime(date("Y-m-d", time())))/86400 +1 }}일
                                        @elseif(strtotime($lec['lastPauseEndDate']) >= strtotime(date("Y-m-d", time())))
                                            {{ intval(strtotime($lec['RealLecEndDate']) - strtotime($lec['lastPauseEndDate']))/86400 }}일
                                        @else
                                            {{ intval(strtotime($lec['RealLecEndDate']) - strtotime(date("Y-m-d", time())))/86400 +1 }}일
                                        @endif</span>({{str_replace('-', '.', $lec['LecStartDate'])}}~{{str_replace('-', '.', $lec['RealLecEndDate'])}})</dt>
                            </dl>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="buttonTabs passTabs c_both">
            <div class="tabBox buttonBox passBox">
                <div id="notice1" class="tabContent">
                    <div class="passListTabs c_both">
                        <form name="downForm" id="downForm" >
                            <input type="hidden" name="m" value="{{$lec['MemIdx']}}" />
                            <input type="hidden" name="o" value="{{$lec['OrderIdx']}}" />
                            <input type="hidden" name="op" value="{{$lec['OrderProdIdx']}}" />
                            <input type="hidden" name="p" value="{{$lec['ProdCode']}}" />
                            <input type="hidden" name="sp" value="{{$lec['ProdCodeSub']}}" />
                            <input type="hidden" name="q" id="quility" value="" />
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable" />
                                <colgroup>
                                    <col style="width: 13%;">
                                    <col style="width: 87%;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <td class="w-chk" colspan="2"><input type="checkbox" id="allchk" name="allchk" class="goods_chk"> <label>전체선택</label></td>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($curriculum as $row)
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="wUnitIdx" name="wUnitIdx[]" value="{{$row['wUnitIdx']}}" class="goods_chk"></td>
                                        <td class="w-data tx-left">
                                            <div class="w-tit mb10">{{$row['wUnitNum']}}회 {{$row['wUnitLectureNum']}}강 {{$row['wUnitName']}}</div>
                                            <dl class="w-info tx-gray mb10">
                                                <dt>강의시간 : {{$row['wRuntime']}}분<span class="row-line">|</span></dt>
                                                <dt>수강시간 : {{floor(intval($row['RealStudyTime'])/60)}}분<span class="row-line">|</span></dt>
                                                <dt>잔여시간 : <span class="tx-blue">{{$row['remaintime']}}</span></dt>
                                            </dl>
                                            <ul class="w-free NGEB">
                                                @if($row['isstart'] == 'Y' && $row['ispause'] == 'N')
                                                    @if($row['timeover'] == 'N')
                                                        @if($row['wWD'] != '')<li class="btn_black_line"><a href="javascript:;" onclick='fnMobile("{{front_url('/Player/getMobile/')}}?m={{$lec['MemIdx']}}&o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&sp={{$row['ProdCodeSub']}}&l={{$row['wLecIdx']}}&u={{$row['wUnitIdx']}}&q=WD");' >WIDE</a></li>@endif
                                                        @if($row['wHD'] != '')<li class="btn_blue"><a href="javascript:;" onclick='fnMobile("{{front_url('/Player/getMobile/')}}?m={{$lec['MemIdx']}}&o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&sp={{$row['ProdCodeSub']}}&l={{$row['wLecIdx']}}&u={{$row['wUnitIdx']}}&q=HD");' >HIGH</a></li>@endif
                                                        @if($row['wSD'] != '')<li class="btn_gray"><a href="javascript:;" onclick='fnMobile("{{front_url('/Player/getMobile/')}}?m={{$lec['MemIdx']}}&o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&sp={{$row['ProdCodeSub']}}&l={{$row['wLecIdx']}}&u={{$row['wUnitIdx']}}&q=SD");' >LOW</a></li>@endif
                                                    @else
                                                        <li class="btn_black_line"><a>시간초과</a></li>
                                                    @endif
                                                @elseif($row['ispause'] == 'Y')
                                                    <li class="btn_black_line"><a>일시중지</a></li>
                                                @else
                                                    <li class="btn_black_line"><a>수강대기</a></li>
                                                @endif
                                                <li class="w-data">@if(empty($row['wUnitAttachFile']) == false)
                                                        <a href="/classroom/on/download/{{$row['OrderIdx']}}/{{$row['ProdCode']}}/{{$row['ProdCodeSub']}}/{{$row['wLecIdx']}}/{{$row['wUnitIdx']}}"><img src="{{ img_url('m/mypage/icon_lec.png') }}"> <span class="underline">강의자료</span></a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="w-data tx-left">개설된 강좌 목록이 없습니다.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->
        <div id="Fixbtn" class="Fixbtn three">
            <ul>
                <li class="btn_black_line"><a href="javascript:;" onclick="fnDown('WD');">WIDE 다운</a></li>
                <li class="btn-purple"><a href="javascript:;" onclick="fnDown('HD');">HIGH 다운</a></li>
                <li class="btn_gray"><a href="javascript:;" onclick="fnDown('SD');">LOW 다운</a></li>
            </ul>
        </div>
        <!-- Fixbtn -->
    </div>
    <!-- End Container -->
    <script src="/public/js/vendor/starplayer/js/starplayer_app.js"></script>
    <script>
        StarPlayerApp.license = "5EDC454C-81A1-4434-A386-7314FCB74991";
        StarPlayerApp.version = "1.0.0";
        StarPlayerApp.android_version = "1.6.31";
        StarPlayerApp.ios_version = "1.0.0";
        StarPlayerApp.referer = window.location.href;
        StarPlayerApp.android_referer_return = "true";
        StarPlayerApp.debug = "false";
        StarPlayerApp.pmp = "false";

        function fnMobile(info_url) {
            checkInstalled2();
            StarPlayerApp.executeApp(info_url);
        }

        function fnDown($quility)
        {
            if($quility == ""){
                $quility = "WD";
            }
            $("#quility").val($quility);

            $data = $('#downForm').serialize();
            alert($data);
        }
    </script>
@stop