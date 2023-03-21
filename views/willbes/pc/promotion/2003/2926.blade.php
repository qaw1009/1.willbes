@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/ 
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/03/2926_top_bg.jpg) no-repeat center top;}
        .evtTop span {position: absolute; left:50%; margin-left:240px; top: 650px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite; letter-spacing:-1px; text-align:center; z-index: 2;}
        @@keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }
        @@-webkit-keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }

        .evt01 {background:#5c32cf}

        .evt02 {background:#1f2a3c}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2023/03/2926_03_bg.jpg) no-repeat center top;}

        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2023/03/2926_05_bg.jpg) no-repeat center top;}
        .evt06 {padding:150px 0}
        .evt06 a:hover {display:inline-block;
            box-shadow:
                2.8px 2.8px 2.2px rgba(0, 0, 0, 0.02),
                6.7px 6.7px 5.3px rgba(0, 0, 0, 0.028),
                12.5px 12.5px 10px rgba(0, 0, 0, 0.035),
                22.3px 22.3px 17.9px rgba(0, 0, 0, 0.042),
                41.8px 41.8px 33.4px rgba(0, 0, 0, 0.05),
                100px 100px 80px rgba(0, 0, 0, 0.07)
            ;
        }
        .evt07 {background:#f2ede2; padding-bottom:150px}
        .evt07 .textBox {width:700px; margin:0 auto 0; font-size:16px; line-height:1.4; text-align:left}
        .evt07 .textBox p {font-size:30px; color:#8b733d; margin:30px auto 10px !important}
        .evt07 .textBox .snslink {display:flex; flex-wrap: wrap; margin-bottom:30px}
        .evt07 .textBox .snslink a {display:block; border:3px solid #000; padding:15px; border-radius:10px; text-align:center; color:#000; width:calc(25% - 4px); font-size:18px; margin: 0 2px 10px}
        .evt07 .textBox .snslink a:hover {background:#000; color:#fff}
        .evt07 .textBox .btns {margin-bottom:100px}
        .evt07 .textBox .btns a {display:block; padding:15px; text-align:center; background:#000; color:#f2ede2; font-size:20px; margin-bottom:10px}
        .evt07 .textBox .btns a:hover {color:#fff200}
        .evt07 .infoText li {list-style: decimal; margin-left:20px; margin-bottom:10px; font-size:18px}
        .evt07 .infoText .box {background:#fff; padding:15px; border:1px solid #777; color:#8b733d; font-size:16px; font-weight:bold}
        .evt07 .infoText .stitle {color:#8b733d; margin-top:20px; }

        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#f4f4f4; color:#363636; line-height:1.5; font-size:16px;}
        .guide_box{width:720px; margin:0 auto; text-align:left; word-break:keep-all}
        .guide_box .infotxt {font-size:18px; margin-bottom:20px; font-weight:bold}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#000; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:18px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dl{color:#555;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box span {color: #ca1919; vertical-align:top}
        .guide_box dd:last-child {margin:0}
    </style> 

	<div class="evtContent NSK">

		<div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2926_top.jpg" alt="Advanced PSAT Class" />
            <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2926_top_01.png" alt="마감유의" /></span>
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2926_01.jpg" alt="" />   
		</div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2926_02.jpg" alt="" />   
		</div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2926_03.jpg" alt="" />   
		</div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2926_04.jpg" alt="" /> 
		</div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2926_05.jpg" alt="" /> 
		</div>

        <div class="evtCtnsBox evt06">
            <div data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2023/03/2926_06_01.jpg" alt="" /></div>
            <div data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2023/03/2926_06_02.jpg" alt="" /></div>
            <div data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2023/03/2926_06_03.jpg" alt="" /></div>
            <div data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2023/03/2926_06_04.jpg" alt="" /></div>
            <div class="mt80" data-aos="fade-left"><a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3143&course_idx=1436" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/03/2926_06_05.jpg" alt="학원강의 신청" /></a></div>
            <div class="mt30" data-aos="fade-right"><a href="https://pass.willbes.net/lecture/index/cate/3103/pattern/only?search_order=regist&subject_idx=&course_idx=1365&school_year=2023" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/03/2926_06_06.jpg" alt="동영상강의 신청" /></a></div>
		</div>

        <div class="evtCtnsBox evt07" data-aos="fade-up" id="evt">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2926_07_01.jpg" alt="" />
            <div class="textBox">
                <p class="NSK-Black">바로가기<p>
                <div class="snslink">
                    <a href="https://cafe.naver.com/gugrade" target="_blank">공드림</a>
                    <a href="https://cafe.naver.com/kkaebangjeong" target="_blank">7공9공</a>
                    <a href="https://bit.ly/3gzszmB" target="_blank">독공사</a>
                    <a href="https://cafe.daum.net/9glade/O6Qh" target="_blank">9꿈사</a>
                    <a href="https://gall.dcinside.com/mgallery/board/lists/?id=7gradekid" target="_blank">7급공무원 갤러리</a>
                    <a href="https://section.blog.naver.com/BlogHome.naver" target="_blank">네이버블로그</a>
                    <a href="https://www.instagram.com" target="_blank">인스타그램</a>
                    <a href="https://www.facebook.com" target="_blank">페이스북</a>
                </div>
                <div class="btns">
                    <a href="javascript:void(0);" onclick="copyTxt();">링크복사하기 🔗</a>
                    <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif">소문내기 이미지 다운로드 📥</a>
                </div>  
                <p class="NSK-Black">이벤트 참여 방법<p>
                <ul class="infoText">
                    <li><strong>소문내기용 이미지 다운로드 + 링크 복사</strong>하기</li>
                    <li>정해진 커뮤니티 사이트에 <strong>주어진 키워드로 제목 작성 + 이미지 업로드 + Advanced PSAT Class 페이지 링크</strong>를 포함한 게시물 작성!
                        <div class="stitle">※키워드 1.</div>
                        <div class="box">
                        2023년 대비 7급 PSAT, 유형별 문제풀이 + 심화집중강의,  7급 PSAT 실전 모의고사, 한림법학원 7급 PSAT, 석치수 자료해석, 박준범 상황판단, 이나우 언어논리, 3/21 실강 개강
                        </div>
                        <div>[Ex] 2023년 대비 한림법학원 7급 PSAT 유형별 실전 모의고사 3/21(화) 실강 개강!</div>
                        <div class="stitle">※키워드 2. 인스타그램, 페이스북 해시태그 키워드</div>
                        <div class="box">
                        #석치수자료해석 #박준범상황판단 #이나우언어논리 #한승아언어논리 #한림법학원7급PSAT #7급공채 #7급PSAT #PSAT유형별실전모의고사
                        </div>
                    </li>
                    <li>작성된 게시물의 링크를 이벤트 페이지에 작성하면 끝!</li>
                </ul>
            </div>

            <div>
                {{--홍보url--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
                @endif
            </div>
		</div>



        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">유의사항</h2>
                <dl>
                    <dd>
                        <ol>
                            <li>본 이벤트는 홈페이지 로그인 후 참여 가능합니다.</li>
                            <li>이벤트 기간 외 작성된 게시글은 인정되지 않습니다.</li>
                            <li>이벤트 상품은 이벤트에 참여한 ID에 기입된 연락처로 전송 됩니다.</li>
                            <li>이벤트 참여방법에 기입 된 내용대로 게시글 작성을 하지 않을 경우 이벤트 참여에 인정 되지 않습니다.</li>
                            <li>이벤트 상품은 한 ID에 최대 1회만 지급됩니다.(중복 지급 불가)</li>
                            <li>기타 부정한 방법으로 참여할 경우 당첨이 취소됩니다.</li>
                            <li>유의사항을 읽지 않고 발생한 모든 상황에 대해 한림법학원 7급 PSAT은 책임지지 않습니다.</li>                   
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>

	</div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
            AOS.init();
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop