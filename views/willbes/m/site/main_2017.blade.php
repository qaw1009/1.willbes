@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->

    <style>
.ssam .mainTit {
	font-size: 20px;
	position: relative;
	height: 30px;
	margin: 0 10px;
}
.ssam .mainTit .morebtn {color:#fff; background:#000; display:inline-block; padding:5px 10px; font-size:12px;}

.ssam .mainTit .goBtns {
	position: absolute;
	top: 0;
	right: 0;
}
.ssam .mainTit .goBtns a {
	display: block;
	padding: 8px 10px;
	color: #fff;
	background: #0c5dc0;
	font-size: 12px;
}

.ssam .bestLecBox2 {
	margin-top: 10px;
	border-top: 1px solid #ccc;
}
.ssam .bestLecBox2 .bestLec {
	position: relative;
	display: block;
	float: left;
	width: 33.33333%;     
    min-height:100px;
    max-height:160px;
    height: 20vw;
}
.ssam .bestLecBox2 .bestLec a {
    position:absolute;
	display: block;
	width: 100%;
	height: 100%;
	border-right: 1px solid #ccc;
	border-bottom: 1px solid #ccc;
    box-sizing: border-box;
    overflow: hidden;
    z-index:2;
}
.ssam .bestLecBox2 .bestLec:first-child a {
	border-left: 1px solid #ccc;
}
.ssam .bestLecBox2 .bestLec .profImg img {
	position: absolute;
	bottom: 0;
	right: -15%;
	width: 65%;
	z-index: 1;
	-webkit-filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.2));
	-moz-filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.2));
	-ms-filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.2));
	-o-filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.2));
	filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.2));
	transform: scale(1);
	transition: all ease-in-out 0.2s;
}
.ssam .bestLecBox2 .best {
    position:absolute;
    top:0;
    left:0;
	width: 46px;
	height: 46px;
	line-height: 46px;
	background: url('https://static.willbes.net/public/images/promotion/m/2017/2017_best_icon.png');
	text-align: center;
	font-size: 1.8vh;
    color: #fff;
    z-index:1;
}
.ssam .bestLecBox2 .lecinfo {
    position:absolute;
    bottom:4%;
    left:4%;
    width: 90%;
    line-height: 1.3;
    z-index:4
}
.ssam .bestLecBox2 .lecinfo li {
    margin-bottom: 2%;
}
.ssam .bestLecBox2 .lecinfo li:nth-of-type(1) {
	font-weight: bold;    
    font-size: 14px;
}
.ssam .bestLecBox2 .lecinfo li:nth-of-type(1) span {
    font-size: 16px;
}
.ssam .bestLecBox2 .lecinfo li strong {
	color: #0c5dc0;
	font-weight: bold;
	font-size: 15px;
}
.ssam .bestLecBox2 .lecinfo li:last-child {
	display: block;
	word-break: keep-all;
}
.ssam .bestLecBox2 .lecinfo li:last-child span {
	background: rgba(255, 255, 255, 0.5);
}
.ssam .bestLecBox2:after {
	content: "";
	display: block;
	clear: both;
}

@@media only screen and (max-width: 374px) {
    .ssam .bestLecBox2 .lecinfo li {
        margin-bottom: 1%;
    }
    .ssam .bestLecBox2 .lecinfo li:nth-of-type(1) {
        font-size: 12px;
    }
    .ssam .bestLecBox2 .lecinfo li:nth-of-type(1) span {
        font-size: 14px;
    }
    .ssam .bestLecBox2 .lecinfo li strong {
        font-size: 13px;
    }
}
@@media only screen and (min-width: 375px) and (max-width: 640px) {
    .ssam .bestLecBox2 .lecinfo li:nth-of-type(1) {
        font-size: 13px;
    }
    .ssam .bestLecBox2 .lecinfo li:nth-of-type(1) span {
        font-size: 15px;
    }
    .ssam .bestLecBox2 .lecinfo li strong {
        font-size: 14px;
    }
}
    </style>
    <div id="Container" class="Container NSK ssam mb40">
        {!! banner('M_메인', 'MainSlider', $__cfg['SiteCode'], '0') !!}

        {{-- 수강후기 --}}
        @include('willbes.m.site.main_partial.study_comment_' . $__cfg['SiteCode'])

        <div class="noticeTabs c_both mt30">
            {{-- 게시판 --}}
            @include('willbes.m.site.main_partial.board_' . $__cfg['SiteCode'])
        </div>

        @if(empty($data['top_order_lecture']) === false)
            <div class="mainTit NSK-Black tx-center">
                윌비스 임용 <span class="tx-main">실시간 인기강의 TOP3</span>
            </div>
            <div class="reference">* 접속 시간 기준, 24시간 내 홈페이지 강의 결제 순</div>
            <ul class="bestLecBox2 NSK">
                @foreach($data['top_order_lecture'] as $key => $row)
                    <li class="bestLec">
                        <a href="{{ site_url('/m/lecture/show/cate/'.$row['CateCode'].'/pattern/only/prod-code/'.$row['ProdCode']) }}">
                            <ul class="lecinfo">
                                <li>{{ $row['SubjectName'] }}<br><span class="NSK-Black"">{{ $row['ProfNickNameAppellation'] }}</span></li>
                                <li><strong>{{ $row['CourseName'] }}</strong></li>
                            </ul>
                            <div class="profImg"><img src="{{ $row['ProfImgPathM'] }}" title="{{ $row['ProfNickNameAppellation'] }}"></div> 
                        </a>
                        <div class="best NSK-Black">{{ $key + 1 }}</div>                     
                    </li>                    
                @endforeach
            </ul>
        @endif

        <div class="mainTit NSK-Black  tx-center mt60" >윌비스 임용 <span class="tx-main">대표 강의 맛보기</span></div>
        <div class="sampleViewImg">
            {!! banner('M_메인_맛보기1', 'swiper-container-view', $__cfg['SiteCode'], '0') !!}
        </div>

        {{-- 시험정보 --}}
        @include('willbes.m.site.main_partial.examinfo_'.$__cfg['SiteCode'])

        <div class="ssamEtc mt50 c_both">
            <a href="{{ front_url('/landing/show/lcode/1038/cate/3134/preview/Y') }}">
                <img src="https://static.willbes.net/public/images/promotion/m/2017/mainIcon01.png">
                대학특강문의
            </a>
                <a href="{{ front_url('/landing/show/lcode/1039/cate/3134/preview/Y') }}">
                <img src="https://static.willbes.net/public/images/promotion/m/2017/mainIcon02.png">
                교수채용
            </a>
            <a href="{{front_url('/location/map')}}">
                <img src="https://static.willbes.net/public/images/promotion/m/2017/mainIcon03.png">
                오시는길
            </a>
        </div>

        <div class="ssamCsCenter">
            <ul class="tel">
                <li>
                    <div class="goTel">
                        <div>
                            <strong>강의 문의</strong>
                            월~토 09시~ 22시
                        </div>
                        <span><a href="tel:1544-3169">1544-3169</a></span>                       
                    </div>
                </li>
                <li>
                    <div class="goTel">
                        <div>
                            <strong>교재배송문의</strong>
                            평일 09시~ 17시
                        </div>
                        <span><a href="tel:1544-4944">1544-4944</a></span>                      
                    </div>
                </li>
            </ul>
        </div>  
    </div>
    <!-- End Container -->


    <script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
    <script>
        $(function() {
            //수강후기
            var swiper_review = new Swiper ('.swiper-container-reply', {
                slidesPerView: 'auto',
                spaceBetween: 0,
                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });

            //맛보기강의
            var swiper = new Swiper('.swiper-container-view', {
                slidesPerView: 1,
                slidesPerColumn: 5,
                spaceBetween: 5,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });  
        });
    </script>
@stop