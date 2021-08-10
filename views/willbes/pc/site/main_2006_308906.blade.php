@extends('willbes.pc.layouts.master')

@section('content')
<style type="text/css">
    /* 빅데이터분석기사 */
.job .article1 {background:#0253c4;}
.job .article2 {background:url(https://static.willbes.net/public/images/promotion/main/308906_02_bg.jpg) repeat-x left top;} 
.job .article3 {background:#eee;}
.job .article4 {background:#c7ebff;}
.job .article4 .wrap {width:1120px; margin:0 auto; position:relative}
.job .article5 .wrap {width:1120px; margin:0 auto; position:relative}
.job .article6 {background:#c7ebff;}
.job .article6 .wrap {width:1120px; margin:0 auto; position:relative}
.job .article6 {position:relative;}
.job .youtube {position:absolute; top:44px; left:50%;z-index:1;margin-left:-400px}
.job .youtube iframe {width:860px; height:450px} 

/*타이머*/
.job .newTopDday {clear:both;background:#fff; width:100%; padding:20px 0;padding-left:700px;}
.job .newTopDday ul {width:1120px; margin:0 auto}
.job .newTopDday ul li {display:inline; float:left; margin-right:50px; text-align:center;line-height:34px;color:#000;}
.job .newTopDday .d_day {font-size:24px;line-height:1.5;text-align:center;padding-top:30px;}
.job .newTopDday .d_day p {color:#da0000;font-size:72px;line-height:58px;}
.job .newTopDday ul:after {content:""; display:block; clear:both}
</style>

    <!-- Container -->
    <div id="Container" class="Container job c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <!-- 타이머 -->
        @if(empty($data['dday']) === false)
            <div id="newTopDday" class="newTopDday">
                <div class="d_day NSK">
                    <ul>
                        <li>
                            {{ $data['dday'][0]['DayTitle'] }}<br>{{ $data['dday'][0]['DayDatm'] }}{{ kw_date('(%)', $data['dday'][0]['DayDatm']) }}
                        </li>
                        <li>
                            <p class="NSK-Black">{{ $data['dday'][0]['DDay'] == '0' ? 'D-0' : 'D' . $data['dday'][0]['DDay'] }} <span></span></p>
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        <div class="Section mt30 article1">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/308906_01.jpg" title="빅데이터 분석기사">
            </div>
        </div>

        <div class="Section article5">
            <div class="widthAuto">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/main/308906_05.jpg" title="훈쌤 전격입성">
                    <a href="https://job.willbes.net/professor/show/cate/308906/prof-idx/51268?subject_idx=2171" title="교수홈" style="position: absolute;left: 19.06%;top: 72.61%;width: 5.75%;height: 9.08%;z-index: 2;"></a>  
                </div>    
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

        <div class="Section article6">
            <div class="widthAuto">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/main/308906_06.jpg" title="유튜브">
                    <a href="javascript:alert('Coming Soon!')" title="6개월" style="position: absolute;left: 14.06%;top: 65.01%;width: 36.75%;height: 18.08%;z-index: 2;"></a>     
                    <a href="javascript:alert('Coming Soon!')" title="2개월" style="position: absolute;left: 54.46%;top: 65.01%;width: 36.75%;height: 18.08%;z-index: 2;"></a>     
                </div>    
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/efr9iOZ57gM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>  
        </div>
        
    </div>
     <!-- End Container -->

     <script type="text/javascript">

    </script>
@stop