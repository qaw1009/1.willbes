@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <form name="searchFrm" id="searchFrm" action="{{app_url('/classroom/pass/index', 'www')}}" onsubmit="">
                <div class="willbes-Mypage-PASSZONE c_both">
                    <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                        · 무한PASS존
                        <ul>
                            @if(empty($passinfo) == false)<li class="InfoBtn"><a href="javascript:;" onclick="fnMyDevice();">등록기기정보 <span>▶</span></a></li>@endif
                            <li class="InfoBtn"><a href="javascript:;" onclick="openWin('MorePASS')">프리패스이용안내 <span>▶</span></a></li>
                        </ul>
                    </div>
                    <div class="willbes-Lec-Table NG d_block">
                        <div class="willbes-PASS-Line bg-blue">이용중인 PASS ({{count($passlist)}})</div>
                        <div class="will-Tit-Zone">

                            <div class="will-Tit NG f_left">· 무한PASS선택</div>
                            <span class="willbes-Lec-Selected GM tx-gray" style="float: inherit">
                                <select id="sitecode" name="sitecode" title="process" class="seleProcess">
                                    <option value="">과정</option>
                                    @foreach($sitelist as $row )
                                        <option value="{{$row['SiteCode']}}" @if(isset($input_arr['sitecode']) && $input_arr['sitecode'] == $row['SiteCode']) selected="selected" @endif>{{$row['SiteName']}}</option>
                                    @endforeach
                                </select>
                                <select id="passidx" name="passidx" class="seleName" >
                                    <option value="">무한PASS를 선택해주십시요.</option>
                                    @foreach($passlist as $row )
                                        <option value="{{$row['ProdCode']}}" @if(isset($passinfo['ProdCode']) && $passinfo['ProdCode'] == $row['ProdCode']) selected="selected" @endif>{{$row['ProdName']}}</option>
                                    @endforeach
                                </select>
                            </span>

                        </div>
                        <table cellspacing="0" cellpadding="0" class="lecTable PassZoneTable">
                            <colgroup>
                                <col style="width: 770px;">
                                <col style="width: 170px;">
                            </colgroup>
                            <tbody>
                            @if(empty($passinfo) == false)
                                <tr>
                                    <td class="w-data tx-left">
                                        <div class="w-tit">
                                            {{$passinfo['ProdName']}}
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>[수강기간] <span class="tx-blue">{{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</span> <span class="tx-black">(잔여기간<span class="tx-pink">{{$row['remainDays']}}일</span>)</span></dt>
                                        </dl>
                                    </td>
                                    @if($passinfo['TakeLecNum'] == 0)
                                        <td class="w-lec">
                                            <div class="tx-gray">수강중인 강좌가 없습니다.</div>
                                            <div class="w-sj">강좌를 추가해 주세요.</div>
                                            <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="javascript:;" onclick="fnMoreLec('{{$passinfo['OrderIdx']}}','{{$passinfo['ProdCode']}}');">강좌추가</a></div>
                                        </td>
                                    @else
                                        <td class="w-lec">
                                            <div class="tx-gray">수강중인 강좌수</div>
                                            <div class="w-sj"><span class="tx-blue">{{$passinfo['TakeLecNum']}}강좌</span> / {{$passinfo['LecNum']}}강좌</div>
                                            <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="javascript:;" onclick="fnMoreLec('{{$passinfo['OrderIdx']}}','{{$passinfo['ProdCode']}}');">강좌추가</a></div>
                                        </td>
                                    @endif
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- willbes-Mypage-PASSZONE -->

                <div class="willbes-Mypage-Tabs mt70">
                    <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
                        <select id="subject_ccd" name="subject_ccd" title="lec" class="seleLec">
                            <option value="">과목</option>
                            @foreach($subject_arr as $row )
                                <option value="{{$row['SubjectIdx']}}" @if(isset($input_arr['subject_ccd']) && $input_arr['subject_ccd'] == $row['SubjectIdx']) selected="selected" @endif >{{$row['SubjectName']}}</option>
                            @endforeach
                        </select>
                        <select id="prof_ccd" name="prof_ccd" title="Prof" class="seleProf">
                            <option value="">교수님</option>
                            @foreach($prof_arr as $row )
                                <option value="{{$row['wProfIdx']}}" @if(isset($input_arr['prof_ccd']) && $input_arr['prof_ccd'] == $row['wProfIdx']) selected="selected" @endif >{{$row['wProfName']}}</option>
                            @endforeach
                        </select>
                        <select id="course_ccd" name="course_ccd" title="process" class="seleProcess">
                            <option value="">학습유형</option>
                            @foreach($course_arr as $row )
                                <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                            @endforeach
                        </select>
                        <select id="orderby" name="orderby" title="Laststudy" class="seleStudy">
                            <option value="lastStudyDate^DESC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'lastStudyDate') selected="selected" @endif>최종학습일순</option>
                            <option value="LecStartDate^ASC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'LecStartDate^ASC') selected="selected" @endif>개강일순</option>
                            <option value="RealLecEndDate^ASC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'RealLecEndDate^ASC') selected="selected" @endif>종료임박순</option>
                        </select>
                        <div class="willbes-Lec-Search GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="search_text" name="search_text" class="labelSearch" value="@if(isset($input_arr['search_text'])){{$input_arr['search_text']}}@endif" placeholder="강좌명을 검색해 주세요" maxlength="30">
                                <button type="submit" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>
            </form>
            <div class="DetailWrap c_both">
                @if(empty($passinfo) == false)<div class="aBox passBox answerBox_block NSK f_right"><a href="javascript:;" onclick="fnMoreBook();">교재구매</a></div>@endif
                <ul class="tabWrap tabDepthPass">
                    <li><a href="#Mypagetab1" class="on">즐겨찾기강좌 ({{count($leclist_like)}})</a></li>
                    <li><a href="#Mypagetab2">수강중강좌 ({{count($leclist_ing)}})</a></li>
                    <li><a href="#Mypagetab3">수강완료강좌 ({{count($leclist_end)}})</a></li>
                    <li><a href="#Mypagetab4">숨긴강좌 ({{count($leclist_nodisp)}})</a></li>
                </ul>
                <div class="tabBox">
                    <div id="Mypagetab1" class="tabLink">
                        <div class="willbes-Lec-Table NG d_block">
                            @if(empty($leclist_like) == false)
                                <div class="PASSZONE-Btn">
                                    <div class="w-answer"><a href="javascript:;" onclick="fnUnLike('all');"><span class="aBox passBox waitBox NSK">삭제</span></a></div>
                                </div>
                            @endif
                            <form name='likedForm' id='likedForm' >
                                @if(empty($passinfo) == false)
                                    <input type='hidden' name='OrderIdx' value='{{$passinfo['OrderIdx']}}' />
                                    <input type='hidden' name='ProdCode' value='{{$passinfo['ProdCode']}}' />
                                    <input type='hidden' name='OrderProdIdx' value='{{$passinfo['OrderProdIdx']}}' />
                                    <input type='hidden' name='ProdCodeSub' id='ProdCodeSub_liked' value='' />
                                @endif
                                <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                    <colgroup>
                                        <col style="width: 55px;">
                                        <col style="width: 120px;">
                                        <col style="width: 680px;">
                                        <col style="width: 85px;">
                                    </colgroup>
                                    <tbody>
                                    @forelse( $leclist_like as $row )
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="ProdCodeSub_liked" name="ProdCodeSub" class="goods_chk" value="{{$row['ProdCodeSub']}}" ></td>
                                            <td class="w-percent">진도율<br/>
                                                <span class="tx-blue">{{$row['StudyRate']}}%</span>
                                            </td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt>
                                                        {{$row['SubjectName']}}<span class="row-line">|</span>
                                                        {{$row['wProfName']}}교수님
                                                        <span class="NSK ml15 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    <a href="{{ site_url('/classroom/pass/view/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer"><a href="javascript:;" onclick="fnUnLike('{{$row['ProdCodeSub']}}', this);"><span class="aBox passBox waitBox NSK">삭제</span></a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div id="Mypagetab2" class="tabLink">
                        <div class="willbes-Lec-Table NG d_block">
                            @if(empty($leclist_ing) == false)
                                <div class="PASSZONE-Btn">
                                    <div class="w-answer">
                                        <span class="w-chk-st"><a href="javascript:;"><img src="{{ img_url('mypage/icon_star_on.png') }}"></a></span>
                                        <a href="javascript:;"><span class="aBox passBox waitBox NSK">숨기기</span></a>
                                    </div>
                                </div>
                            @endif
                            <form name='ingForm' id='ingForm' >
                                @if(empty($passinfo) == false)
                                    <input type='hidden' name='OrderIdx' value='{{$passinfo['OrderIdx']}}' />
                                    <input type='hidden' name='ProdCode' value='{{$passinfo['ProdCode']}}' />
                                    <input type='hidden' name='OrderProdIdx' value='{{$passinfo['OrderProdIdx']}}' />
                                    <input type='hidden' name='ProdCodeSub' id="ProdCodeSub_ing" value='' />
                                @endif
                                <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                    <colgroup>
                                        <col style="width: 55px;">
                                        <col style="width: 120px;">
                                        <col style="width: 680px;">
                                        <col style="width: 85px;">
                                    </colgroup>
                                    <tbody>
                                    @forelse( $leclist_ing as $row )
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="ProdCodeSub_liked" name="ProdCodeSub" class="goods_chk" value="{{$row['ProdCodeSub']}}" ></td>
                                            <td class="w-percent">진도율<br/>
                                                <span class="tx-blue">{{$row['StudyRate']}}%</span>
                                            </td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt>
                                                        {{$row['SubjectName']}}<span class="row-line">|</span>
                                                        {{$row['wProfName']}}교수님
                                                        <span class="NSK ml15 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    <a href="{{ site_url('/classroom/pass/view/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <span class="w-chk-st"><a href="javascript:;" onclick="fnLike('{{$row['ProdCodeSub']}}', this);"><img src="{{ $row['IsLiked'] == 'Y' ? img_url('mypage/icon_star_on.png') : img_url('mypage/icon_star_off.png') }}"></a></span>
                                                <a href="javascript:;" onclick="fnHide('{{$row['ProdCodeSub']}}', this);"><span class="aBox passBox waitBox NSK">숨기기</span></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="tx-center">수강중강좌 정보가 없습니다.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div id="Mypagetab3" class="tabLink">
                        <div class="willbes-Lec-Table NG d_block">
                            @if(empty($leclist_end) == false)
                                <div class="PASSZONE-Btn">
                                    <div class="w-answer" style="display: none;"><a href="javascript:;"><span class="aBox passBox answerBox_block NSK">후기등록</span></a></div>
                                </div>
                            @endif
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 735px;">
                                    <col style="width: 85px;">
                                </colgroup>
                                <tbody>
                                @forelse( $leclist_end as $row )
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">{{$row['StudyRate']}}%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    {{$row['SubjectName']}}<span class="row-line">|</span>
                                                    {{$row['wProfName']}}교수님
                                                    <span class="NSK ml15 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/classroom/pass/view/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="javascript:;"><span class="aBox passBox answerBox_block NSK">후기등록</span></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="tx-center">수강종료강좌 정보가 없습니다.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="Mypagetab4" class="tabLink">
                        <div class="willbes-Lec-Table NG d_block">
                            @if(empty($leclist_nodisp) == false)
                                <div class="PASSZONE-Btn">
                                    <div class="w-answer">
                                        <a href="javascript:;" onclick="fnUnHide('all');"><span class="aBox passBox waitBox NSK">숨김해제</span></a>
                                    </div>
                                </div>
                            @endif
                            <form name='hiddenForm' id='hiddenForm' >
                                @if(empty($passinfo) == false)
                                    <input type='hidden' name='OrderIdx' value='{{$passinfo['OrderIdx']}}' />
                                    <input type='hidden' name='ProdCode' value='{{$passinfo['ProdCode']}}' />
                                    <input type='hidden' name='OrderProdIdx' value='{{$passinfo['OrderProdIdx']}}' />
                                    <input type='hidden' name='ProdCodeSub' id="ProdCodeSub_hide" value='' />
                                @endif
                                <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                    <colgroup>
                                        <col style="width: 55px;">
                                        <col style="width: 120px;">
                                        <col style="width: 680px;">
                                        <col style="width: 85px;">
                                    </colgroup>
                                    <tbody>
                                    @forelse( $leclist_nodisp as $row )
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="ProdCodeSub_hidden" name="ProdCodeSub" class="goods_chk" value="{{$row['ProdCodeSub']}}" ></td>
                                            <td class="w-percent">진도율<br/>
                                                <span class="tx-blue">{{$row['StudyRate']}}%</span>
                                            </td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt>
                                                        {{$row['SubjectName']}}<span class="row-line">|</span>
                                                        {{$row['wProfName']}}교수님
                                                        <span class="NSK ml15 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    <a href="{{ site_url('/classroom/pass/view/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="javascript:;" onclick="fnUnHide('{{$row['ProdCodeSub']}}', this);"><span class="aBox passBox waitBox NSK">숨김해제</span></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="tx-center">숨긴강좌정보가 없습니다.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Mypage-Tabs -->

        <div id="MoreLec" class="willbes-Layer-PassBox willbes-Layer-PassBox900 h1100 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('MoreLec');">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">강좌추가</div>

            <div class="lecMoreWrap">
                <div class="PASSZONE-List widthAuto570" id="lecList"> </div>
                <div class="PASSZONE-Add widthAuto260">
                    <div class="Tit tx-light-black NG">강좌선택내역</div>
                    <div class="PASSZONE-Add-Grid">
                        <ul class="passzoneInfo tx-gray NGR none">
                            <li>· 선택된 강좌 확인 후 '강좌추가' 버튼을 클릭하면 '무한PASS존 > 수강중강좌탭'에 강좌가 추가됩니다.</li>
                            <li>· 강좌추가후 '교재구매' 버튼 클릭시 추가한 강좌(수강중강좌)에 대한 교재를 구매할 수 있습니다.</li>
                        </ul>
                        <div class="Search-Result">
                            <div class="Total"></div>
                            <ul class="chkBox">
                                <li class="w-btn"><a class="answerBox_block NSK" href="javascript:;" onclick="closeWin('MoreLec');fnMoreBook();">교재구매</a></li>
                                <li class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="javascript:;" onclick="fnAppendLecture();">강좌추가</a></li>
                            </ul>
                        </div>
                        <div class="PASSZONE-Lec-Grid">
                            <div class="LeclistTable">
                                <form name="addForm" id="addForm">
                                    <input type="hidden" name="OrderIdx" id="OrderIdx" value="{{$passinfo['OrderIdx']}}" />
                                    <input type="hidden" name="ProdCode" id="ProdCode" value="{{$passinfo['ProdCode']}}" />
                                    <table cellspacing="0" cellpadding="0" class="listTable under-gray tx-gray" id="addTable">
                                        <colgroup>
                                            <col style="width: 25px;">
                                            <col style="width: 175px;">
                                        </colgroup>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PASSZONE-Add -->
            </div>
        </div>
        <!-- willbes-Layer-PassBox : 강좌추가 -->

        <div id="MoreBook" class="willbes-Layer-PassBox willbes-Layer-PassBox800 h1100 abs"></div>
        <!-- willbes-Layer-PassBox : 무한PASS 교재구매 -->

        <div id="MyDevice" class="willbes-Layer-PassBox willbes-Layer-PassBox800 h960 abs"></div>
        <!-- willbes-Layer-PassBox : 등록기기정보 -->

    </div>
    {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <form name="postForm" id="postForm" >
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        @if(empty($passinfo) == false)
            <input type="hidden" name="OrderIdx" id="OrderIdx" value="{{$passinfo['OrderIdx']}}" />
            <input type="hidden" name="ProdCode" id="ProdCode" value="{{$passinfo['ProdCode']}}" />
        @endif
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#course_ccd,#subject_ccd,#prof_ccd,#orderby,#passidx,#sitecode').on('change', function (){
                $('#searchFrm').submit();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) {

                }
            });
        });

        function fnAppendLecture()
        {
            url = "{{ site_url("/classroom/pass/addLecture/") }}";
            data = $('#addForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    alert(ret.ret_msg);
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'json');
        }

        function fnMoreLec()
        {
            url = "{{ site_url("/classroom/pass/ajaxMoreLecture/") }}";
            data = $('#postForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#lecList").html(d).end();
                    openWin('MoreLec');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }

        function fnMoreBook()
        {
            url = "{{ site_url("/classroom/pass/layerMoreBook/") }}";
            data = $('#postForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#MoreBook").html(d).end();
                    openWin('MoreBook');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }

        function fnMyDevice()
        {
            url = "{{ site_url("/classroom/pass/layerMyDevice/") }}";
            data = $('#postForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#MyDevice").html(d).end();
                    openWin('MyDevice');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }

        function fnLike(code, obj)
        {
            url = "{{ site_url("/classroom/pass/set/like/") }}";

            if(code == 'all'){
                $("#ProdCodeSub_ing").val('');
            } else {
                $("#ProdCodeSub_ing").val(code);
            }

            data = $('#ingForm').serialize();

            sendAjax(url, data, function(ret){
                    alert(ret.ret_msg);
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'json');
        }

        function fnUnLike(code, obj)
        {
            url = "{{ site_url("/classroom/pass/unset/like/") }}";

            if(code == 'all'){
                $("#ProdCodeSub_liked").val('');
            } else {
                $("#ProdCodeSub_liked").val(code);
            }

            data = $('#likedForm').serialize();

            sendAjax(url, data, function(ret){
                    alert(ret.ret_msg);
                    location.reload();

                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'json');
        }

        function fnHide(code, obj)
        {
            url = "{{ site_url("/classroom/pass/set/hide/") }}";

            if(code == 'all'){
                $("#ProdCodeSub_ing").val('');
            } else {
                $("#ProdCodeSub_ing").val(code);
            }

            data = $('#ingForm').serialize();

            sendAjax(url, data, function(ret){
                    alert(ret.ret_msg);
                    location.reload();

                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'json');
        }

        function fnUnHide(code, obj)
        {
            url = "{{ site_url("/classroom/pass/unset/hide/") }}";

            if(code == 'all'){
                $("#ProdCodeSub_hide").val('');
            } else {
                $("#ProdCodeSub_hide").val(code);
            }

            data = $('#hiddenForm').serialize();

            sendAjax(url, data, function(ret){
                    alert(ret.ret_msg);
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'json');
        }
    </script>

@stop