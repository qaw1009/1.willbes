@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <!-- willbes-CScenter -->
            <div id="cs4" class="CScenter4">
                <div class="Act4">
                    <img src="{{ img_url('cs/willbes_guide.jpg') }}">
                    <div class="w-Guide mt40">
                        <div class="willbes-guide NGEB">
                            <ul class="tabWrap tabcsDepth2 tab_Guide p_re NGEB">
                                <li class="w-guide1">
                                    <a class="qBox" href="#guide1"><span>주요메뉴 안내</span></a>
                                    <div class="subBox on">
                                        <!--dl>
                                            <dt><button type="submit" onclick="">네비게이션</button><span class="row-line">|</span></dt>
                                            <dt><button type="submit" onclick="">강좌검색</button><span class="row-line">|</span></dt>
                                            <dt><button type="submit" onclick="">HOT 클릭</button><span class="row-line">|</span></dt>
                                            <dt><button type="submit" onclick="">수험정보</button><span class="row-line">|</span></dt>
                                            <dt><button type="submit" onclick="">이벤트</button></dt>
                                        </dl-->
                                    </div>
                                </li>
                                <li class="w-guide2">
                                    <a class="qBox" href="#guide2"><span>회원가입</span></a>
                                    <div class="subBox">
                                        <!--dl>
                                            <dt><button type="submit" onclick="">전체</button><span class="row-line">|</span></dt>
                                            <dt><button type="submit" onclick="">결제</button><span class="row-line">|</span></dt>
                                            <dt><button type="submit" onclick="">환불</button></dt>
                                        </dl-->
                                    </div>
                                </li>
                                <li class="w-guide3">
                                    <a class="qBox" href="#guide3"><span>수강신청</span></a>
                                </li>
                                <li class="w-guide4">
                                    <a class="qBox" href="#guide4"><span>주문/결제</span></a>
                                </li>
                                <li class="w-guide5">
                                    <a class="qBox" href="#guide5"><span>강의수강</span></a>
                                </li>
                            </ul>
                            <div class="tabBox">
                                <div id="guide1" class="tabContent"><img src="{{ img_url('cs/willbes_guide_01.jpg') }}" alt="주요메뉴"> </div>
                                <div id="guide2" class="tabContent"><img src="{{ img_url('cs/willbes_guide_02.jpg') }}" alt="회원가입"> </div>
                                <div id="guide3" class="tabContent"><img src="{{ img_url('cs/willbes_guide_03.jpg') }}" alt="수강신청"> </div>
                                <div id="guide4" class="tabContent"><img src="{{ img_url('cs/willbes_guide_04.jpg') }}" alt="주문/결제"> </div>
                                <div id="guide5" class="tabContent"><img src="{{ img_url('cs/willbes_guide_05.jpg') }}" alt="강의수강"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- willbes-CScenter -->
        </div>
        {!! banner('고객센터_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
@stop