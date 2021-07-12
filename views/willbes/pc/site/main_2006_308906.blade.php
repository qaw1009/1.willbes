@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container job c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                       21년 제3회 필기 시험<br>2021-10-02(토)
                    </li>
                    <li class="timer_d">D-
                    <li class="first"><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                </ul>
            </div>
        </div>  

        <div class="Section mt30 article1">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/308906_01.jpg" title="빅데이터 분석기사">
            </div>
        </div>

        <div class="Section article2">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/308906_02.jpg" title="빅데이터 필요 인력">
            </div>  
        </div>

        <div class="Section article3">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/308906_03.jpg" title="q&a">
            </div>  
        </div>

        <div class="Section article4">
            <div class="widthAuto">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/main/308906_04.jpg" title="자세히 알아보기">
                    <a href="https://job.dev.willbes.net/landing/show/lcode/1043/cate/308906/preview/Y" title="알아보기" target="_blank" style="position: absolute;left: 31.06%;top: 86.61%;width: 45.75%;height: 6.08%;z-index: 2;"></a>     
                </div>    
            </div>  
        </div>

        <div class="Section article5">
            <div class="widthAuto">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/main/308906_05.jpg" title="전격입성">
                    <a href="javascript:alert('Coming Soon!')" title="전격입성" style="position: absolute;left: 19.06%;top: 69.61%;width: 5.75%;height: 9.08%;z-index: 2;"></a>  
                </div>    
            </div>  
        </div>

        <div class="Section article6">
            <div class="widthAuto">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/main/308906_06.jpg" title="유튜브">
                    <a href="javascript:alert('Coming Soon!')" title="6개월" style="position: absolute;left: 14.06%;top: 65.61%;width: 36.75%;height: 18.08%;z-index: 2;"></a>     
                    <a href="javascript:alert('Coming Soon!')" title="2개월" style="position: absolute;left: 54.46%;top: 65.61%;width: 36.75%;height: 18.08%;z-index: 2;"></a>     
                </div>    
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/51nqd5LkL-s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>  
        </div>
        
    </div>
     <!-- End Container -->

     <script type="text/javascript">

    </script>
@stop