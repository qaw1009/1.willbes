@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container ssam NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual mt20">
            <div class="VisualBox p_re">
                @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
                    <div id="MainRollingSlider" class="MaintabBox">
                        {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'MaintabSlider') !!}

                        <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                        <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p>

                        <div id="MainRollingDiv" class="MaintabList">
                            <div class="Maintab">
                                @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                    <span><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="Section mt40">
            <div class="widthAuto">
                {{-- board include --}}
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section1 mt40">
            <div class="widthAuto smallTit NSK-Black">
                <p>
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_img01.png">
                    <span><strong>기출적중&수강후기로 증명</strong>하는 윌비스 임용 교수진</span>
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_img02.png">
                </p>
            </div>
            <div class="VisualSubBox p_re mt20">
                <div id="SubRollingSlider" class="SubtabBox">
                    <ul class="SubtabSlider">
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1816') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_mjs.jpg" alt="유아 민정선"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1817') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_bjm.jpg" alt="초등 배재민"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1814') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_lij.jpg" alt="교육한 이인재"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1815') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_hei.jpg" alt="교육한 홍의일"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1818') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_swy.jpg" alt="전공국어 송원영"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1819') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_lwg.jpg" alt="전공국어 이원근"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1820') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kbm.jpg" alt="전공국어 권보민"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1821') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kys.jpg" alt="전공영어 김유석"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1822') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kym.jpg" alt="전공영어 김영문"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1823') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kh.jpg" alt="전공영어 공훈"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1824') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kcm.jpg" alt="전공수학 김철홍"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1825') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_bty.jpg" alt="수학교육론 박태영"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1826') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kcu.jpg" alt="전공생물 강치욱"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1827') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_yhj.jpg" alt="생물교육론 양혜정"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1828') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kbc.jpg" alt="도덕윤리 김병찬"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1829') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_diana.jpg" alt="음악 다이애나"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1830') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_cuy.jpg" alt="전기전자통신 최우영"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1831') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_sgj.jpg" alt="정보컴퓨터 송광진"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1832') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_jss.jpg" alt="정컴교육론 장순선"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1833') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_jgm.jpg" alt="전공중국어 정경미"></a></li>
                    </ul>
                    <p class="leftBtn" id="imgBannerLeft2"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="imgBannerRight2"><a href="none">다음</a></p>
                </div>
                <div id="SubRollingDiv" class="SubtabList">
                    <ul class="Subtab">
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1816') }}"'><a data-slide-index='0' href="javascript:void(0);" class="active">유아 민정선</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1817') }}"'><a data-slide-index='1' href="javascript:void(0);">초등 배재민</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1814') }}"'><a data-slide-index='3' href="javascript:void(0);">교육학 이인재</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1815') }}"'><a data-slide-index='4' href="javascript:void(0);">교육학 홍의일</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1818') }}"'><a data-slide-index='5' href="javascript:void(0);">전공국어 송원영</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1819') }}"'><a data-slide-index='6' href="javascript:void(0);">전공국어 이원근</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1820') }}"'><a data-slide-index='7' href="javascript:void(0);">전공국어 권보민</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1821') }}"'><a data-slide-index='8' href="javascript:void(0);">전공영어 김유석</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1822') }}"'><a data-slide-index='9' href="javascript:void(0);">전공영어 김영문</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1823') }}"'><a data-slide-index='10' href="javascript:void(0);">전공영어 공훈</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1824') }}"'><a data-slide-index='11' href="javascript:void(0);">전공수학 김철홍</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1825') }}"'><a data-slide-index='12' href="javascript:void(0);">수학교육론 박태영</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1826') }}"'><a data-slide-index='13' href="javascript:void(0);">전공생물 강치욱</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1827') }}"'><a data-slide-index='14' href="javascript:void(0);">생물교육론 양혜정</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1828') }}"'><a data-slide-index='15' href="javascript:void(0);">도덕윤리 김병찬</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1829') }}"'><a data-slide-index='16' href="javascript:void(0);">전공음악 다이애나</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1830') }}"'><a data-slide-index='17' href="javascript:void(0);">전기전자통신 최우영</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1831') }}"'><a data-slide-index='18' href="javascript:void(0);">정보컴퓨터 송광진</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1832') }}"'><a data-slide-index='19' href="javascript:void(0);">정컴교육론 장순선</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1833') }}"'><a data-slide-index='20' href="javascript:void(0);">전공중국어 정경미</a></li>
                        {{--
                        <li><a data-slide-index='0' href="javascript:void(0);" class="active">유아 민정선</a></li>
                        <li><a data-slide-index='1' href="javascript:void(0);">초등 배재민</a></li>
                        <li><a data-slide-index='2' href="javascript:void(0);">교육학 김차웅</a></li>
                        <li><a data-slide-index='3' href="javascript:void(0);">교육학 이인재</a></li>
                        <li><a data-slide-index='4' href="javascript:void(0);">교육학 홍의일</a></li>
                        <li><a data-slide-index='5' href="javascript:void(0);">전공국어 송원영</a></li>
                        <li><a data-slide-index='6' href="javascript:void(0);">전공국어 이원근</a></li>
                        <li><a data-slide-index='7' href="javascript:void(0);">전공국어 권보민</a></li>
                        <li><a data-slide-index='8' href="javascript:void(0);">전공영어 김유석</a></li>
                        <li><a data-slide-index='9' href="javascript:void(0);">전공영어 김영문</a></li>
                        <li><a data-slide-index='10' href="javascript:void(0);">전공영어 공훈</a></li>
                        <li><a data-slide-index='11' href="javascript:void(0);">전공수학 김철홍</a></li>
                        <li><a data-slide-index='12' href="javascript:void(0);">수학교육론 박태영</a></li>
                        <li><a data-slide-index='13' href="javascript:void(0);">전공생물 강치욱</a></li>
                        <li><a data-slide-index='14' href="javascript:void(0);">생물교육론 양혜정</a></li>
                        <li><a data-slide-index='15' href="javascript:void(0);">도덕윤리 김병찬</a></li>
                        <li><a data-slide-index='16' href="javascript:void(0);">전공음악 다이애나</a></li>
                        <li><a data-slide-index='17' href="javascript:void(0);">전기전자통신 최우영</a></li>
                        <li><a data-slide-index='18' href="javascript:void(0);">정보컴퓨터 송광진</a></li>
                        <li><a data-slide-index='19' href="javascript:void(0);">정컴교육론 장순선</a></li>
                        <li><a data-slide-index='20' href="javascript:void(0);">전공중국어 정경미</a></li>
                        --}}
                    </ul>
                </div>
            </div>
        </div>

        <div class="Section Section2 mt40">
            <div class="widthAuto p_re">
                {{-- study comment include --}}
                @include('willbes.pc.site.main_partial.study_comment_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section3 mt40">
            <div class="widthAuto">
                <div class="will-nTit">윌비스 임용 <span class="tx-color">합격 교수진</span></div>
                <ul>
                    @for($i=1; $i<=24; $i++)
                        @if(empty($data['arr_main_banner']['메인_교수진'.$i]) === false)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_교수진'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        @if(empty($data['top_order_lecture']) === false)
            <div class="Section Section4 mt80">
                <div class="widthAuto">
                    <div class="widthAuto smallTit NSK-Black">
                        <p><span>윌비스 임용 <strong>실시간 인기강의 TOP3</strong></span></p>
                    </div>
                    <div class="reference">* 접속 시간 기준, 24시간 내 홈페이지 강의 결제 순</div>
                    <ul class="bestLecBox">
                        @foreach($data['top_order_lecture'] as $key => $row)
                            <li class="bestLec">
                                <a href="{{ site_url('/lecture/show/cate/'.$row['CateCode'].'/pattern/only/prod-code/'.$row['ProdCode']) }}">
                                    <ul class="lecinfo">
                                        <li class="NSK-Black"><span class="NSK">{{ $row['ProdCateName'] }}</span>{{ $row['ProfNickNameAppellation'] }}</li>
                                        <li><strong>{{ $row['CourseName'] }}</strong></li>
                                        <li><span>{{ $row['ProdName'] }}</span></li>
                                    </ul>
                                </a>
                                <div class="profImg"><img src="{{ $row['ProfImgPath'] }}" title="{{ $row['ProfNickNameAppellation'] }}"></div>
                                <div class="best NSK-Black">{{ $key + 1 }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="Section Section5 mt80">
            <div class="widthAuto">
                {{-- new product include --}}
                @include('willbes.pc.site.main_partial.new_product_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section5 mt60">
            <div class="widthAuto">
                {{-- exam info include --}}
                @include('willbes.pc.site.main_partial.exam_info_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section7 mt40">
            <div class="widthAuto">
                <ul class="NSK-Black">
                    <li><span class="NSK">WILLBES</span>학습자료실</li>
                    <li><a href="{{ front_url('/support/examQuestion/index') }}">#기출문제 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon01.png" title="기출문제"></a></li>
                    <li><a href="{{ front_url('/support/program/index') }}">#학습프로그램 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon02.png" title="학습프로그램"></a></li>
                    <li><a href="https://static.willbes.net/public/images/promotion/main/2018/early_childhood_secondary_guidebook.pdf" target="_blank">#임용가이드북 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon03.png" title="임용가이드북"></a></li>
                    <li><a href="{{ front_url('/support/mobile/index') }}">#모바일수강안내 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon04.png" title="모바일수강가이드"></a></li>
                </ul>
            </div>
        </div>

        <div class="Section mt40 mb40 c_both">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
    </div>
    <!-- End Container -->


    <script src="/public/js/willbes/product_util.js?ver={{time()}}"></script>
    <script type="text/javascript">
        //상단배너
        $(function(){
            var slidesImg = $(".MaintabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:400,
                pause:3000,
                sliderWidth:1120,
                auto : true,
                autoHover: true,
                pagerCustom: '#MainRollingDiv',
                controls:false,
                onSliderLoad: function(){
                    $("#MainRollingSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });

            //적중배너
            var subslidesImg = $(".SubtabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:400,
                pause:3000,
                sliderWidth:1120,
                auto : true,
                autoHover: true,
                pagerCustom: '#SubRollingDiv',
                controls:false,
                onSliderLoad: function(){
                    $("#SubRollingSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
            $("#imgBannerLeft2").click(function (){
                subslidesImg.goToPrevSlide();
            });

            $("#imgBannerRight2").click(function (){
                subslidesImg.goToNextSlide();
            });
        });
    </script>
@stop