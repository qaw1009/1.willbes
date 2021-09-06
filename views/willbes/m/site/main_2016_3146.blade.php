@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NSK mb40 ic3146">
        @if(empty($data['dday']) === false)
            <div id="newTopDday" class="newTopDday">
                <div class="d_day NSK">
                    <ul>
                        <li class="NSK-Black">
                            {{ get_var($data['dday'][0]['DayMainTitle'], $data['dday'][0]['DayTitle']) }}<br>
                            {{ kw_date('Y-m-d(%)', $data['dday'][0]['DayDatm']) }}
                        </li>
                        <li>
                            <p class="NSK-Black"> D{{ $data['dday'][0]['DDay'] }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        <div class="Section article1">
            <img src="{{ img_static_url('promotion/main/2006/308906m_top.jpg') }}" alt="빅데이터 분석기사">
        </div>

        <div class="Section article2" data-aos="fade-left">
            <img src="{{ img_static_url('promotion/main/2006/308906m_01.jpg') }}" alt="향후 5년 내 데이터 산업의 빅데이터 필요 인력">
        </div>

        <div class="Section article3">
            <img src="{{ img_static_url('promotion/main/2006/308906m_02.jpg') }}" alt="빅데이터 분석기사 자격증 왜 훈쌤인가">
        </div>

        <div class="Section article4">
            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/efr9iOZ57gM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <div class="btnBox">
                <div>
                    <img src="{{ img_static_url('promotion/main/2006/308906m_btn01.jpg') }}" alt="빅데이터 분석기사 필기합격 패키지 6개월">
                    <a href="{{ front_url('lecture/show/cate/3146/pattern/only/prod-code/185587') }}" title="패키지 6개월 신청하기"></a>
                </div>
                <div>
                    <img src="{{ img_static_url('promotion/main/2006/308906m_btn02.jpg') }}" alt="빅데이터 분석기사 필기 합격 패키지 3개월">
                    <a href="{{ front_url('/lecture/show/cate/3146/pattern/only/prod-code/185588') }}" title="패키지 3개월 신청하기"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->
    <style type="text/css">
        .ic3146 {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
        .ic3146 img {width:100%; max-width:720px;}

        /* 유튜브영상 */
        .ic3146 .video-container-box {padding:20px}
        .ic3146 .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
        .ic3146 .video-container iframe,
        .ic3146 .video-container object,
        .ic3146 .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

        .ic3146 .btnBox{display: flex; justify-content: space-between; align-items: center; padding: 5% 20px;}
        .ic3146 .btnBox div{ width:48%; position: relative;}
        .ic3146 .btnBox div a{width:68%; height:30%; position: absolute; top:59%; left:15%; }

        /*타이머*/
        .ic3146 .newTopDday {clear:both; background:#fff; width:100%; padding:20px 0;}
        .ic3146 .newTopDday ul { display: flex; justify-content: center; align-items: center;}
        .ic3146 .newTopDday ul li {color:#000; font-size:20px;}
        .ic3146 .newTopDday ul li:nth-child(1) {margin-right:5%; }
        .ic3146 .newTopDday .d_day {line-height:1.2;text-align:center;padding-top:30px;}
        .ic3146 .newTopDday .d_day p {color:#fffb00; font-size:40px; background:#000; border-radius:40px; padding:5px 15px}
    </style>
@stop
