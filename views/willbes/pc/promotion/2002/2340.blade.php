@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;ㄴ
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5); border-radius:4px}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2340_top_bg.jpg) no-repeat center; height:1195px}

        .evtTop img {margin-top:300px}
	
        .evt01 {padding:150px 0; width:1120px; margin:0 auto}

        .evtMenu {background:#e8e8e8;}            
        .evtMenu ul {display: flex; justify-content: space-around;}        
        .evtMenu ul li{width:100%;}
        .evtMenu ul li a{display:block; padding:15px 0;  color:#000; font-size:18px;}
        .evtMenu ul li a.on {background:#ff4e33; color:#fff;}
        .evtMenu ul:after{ content:""; display:block; clear:both;}

        .evtMenu.fixed {position:fixed; top:0; left:50%; width:1120px; margin-left:-560px; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10} 

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop" id="main">
			<img src="https://static.willbes.net/public/images/promotion/2021/08/2340_top.png"  alt="이달의 추천강좌" data-aos="fade-right"/>
		</div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2340_01_top.jpg" alt=""/>
            <nav class="evtMenu">
                <ul>
                    <li>
                        <a href="javascript:void(0);" onClick="scrolling('#tab01')" class="tab on">
                        기존 수험생 추천강좌
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" onClick="scrolling('#tab02')"  class="tab">
                        초시생 추천강좌
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" onClick="scrolling('#tab03')"  class="tab">
                        기본이론 수강생 추천강좌
                        </a>
                    </li>
                </ul>
            </nav>

            <section id="tab01" class="tabContents wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2340_01_01.jpg"  alt="기존 수험생"/>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1839" title="바뀐 시험제도" target="_blank" style="position: absolute; left: 64.55%; top: 51.75%; width: 22.68%; height: 2.51%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040" target="_blank" title="종합반 신청하기" style="position: absolute; left: 23.48%; top: 86.25%; width: 53.04%; height: 4.9%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=" target="_blank" title="단과 신청하기" style="position: absolute; left: 23.48%; top: 92.02%; width: 53.04%; height: 4.9%; z-index: 2;"></a>
            </section>

            <section id="tab02" class="tabContents wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2340_01_02.jpg"  alt="초시생"/>
                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2291" target="_blank" title="기본이론" style="position: absolute; left: 67.32%; top: 66.91%; width: 22.86%; height: 3.17%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040" target="_blank" title="기본종합반" style="position: absolute; left: 16.88%; top: 91.04%; width: 14.82%; height: 3.17%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" title="6개월 슈퍼패스" style="position: absolute; left: 42.95%; top: 91.04%; width: 14.82%; height: 3.17%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" title="12개월 슈퍼패스" style="position: absolute; left: 68.75%; top: 91.04%; width: 14.82%; height: 3.17%; z-index: 2;"></a>
            </section>
            
            <section id="tab03" class="tabContents wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2340_01_03.jpg"  alt="심화이론 수험생"/>
                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2320" target="_blank" title="심화이론" style="position: absolute; left: 64.46%; top: 66.37%; width: 22.86%; height: 3.17%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" title="종합반" style="position: absolute; left: 27.86%; top: 92.39%; width: 14.82%; height: 3.17%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" title="6개월 슈퍼패스" style="position: absolute; left: 58.21%; top: 92.39%; width: 14.82%; height: 3.17%; z-index: 2;"></a>
            </section>

		</div>     
       
	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
        $( document ).ready( function() {
            AOS.init();
        } );

        let section02 = document.querySelector('.tabContents');
        let navBar = document.querySelector('nav');
        window.addEventListener('scroll', function(){
            // nav 아래로 스크롤시 nav 상단고정
            if ( window.pageYOffset > section02.offsetTop ) {
                navBar.classList.add('fixed');
            } else {
                navBar.classList.remove('fixed'); 
            }

            let tabs = $('.tab');
            let sections = $('section')
            sections.each( function(i,el){
                if(window.pageYOffset >= el.offsetTop && window.pageYOffset < el.offsetTop + el.offsetHeight){
                    tabs.eq(i).addClass('on')
                    tabs.eq(i).parent('li').siblings().children().removeClass('on')
                }
            })
        })

        function scrolling(className) {
            let target = document.querySelector(className);
            // window.scroll(0,target.offsetTop + 1);
            $('html, body').stop().animate({
                scrollTop : target.offsetTop + 1
            }, 500)
        }
    </script>
@stop