@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {background:url(https://static.willbes.net/public/images/promotion/2023/01/2868m_bg.jpg)}
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox a {border:1px solid #000}

    .wb_cts01 .count {color:#fff; font-size:2vh; margin-top:1vh; text-align:left; margin-left:10% }
    .wb_cts01 .count strong {font-size:2.4vh; color:#ffe24f}
    .wb_cts01 .countTable {color:#fff; font-size:2vh; width:80%; margin:0 auto; padding:1vh 2vh; border:2px solid #fff; border-radius:10px; text-align:left; margin-bottom:1vh; background:url(https://static.willbes.net/public/images/promotion/2023/01/2868m_arrow.png) no-repeat 90% 15px}
    .wb_cts01 .countTable li {border-bottom:1px solid #411098; padding:1% 0}
    .wb_cts01 .countTable li:last-child {border:0}
    .wb_cts01 .countTable li strong {display:inline-block; background:#5918cc; width:25%; text-align:center; margin-right:1.5vh; padding:1% 0}
    .wb_cts01 .countTable li.now {background:#5918cc; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;vertical-align:top;}
    @@keyframes upDown{
        from{background:#1f0553}
        50%{background:#5918cc}
        to{background:#1f0553}
    }
    @@-webkit-keyframes upDown{
        from{background:#1f0553}
        50%{background:#5918cc}
        to{background:#1f0553}
    }
    .wb_cts01 .countTable li.now strong {background:none}

    .wb_cts02 ul {width:85%; margin:0 auto; text-align:left; color:#fff; font-size:1.6vh; display:flex; flex-wrap: wrap;}
    .wb_cts02 ul li {width:50%; margin-bottom:1vh}
    .wb_cts02 li p {font-size:1.8vh; color:yellow}
    .wb_cts02 li span {color:#f81279; font-weight:bold}

    .wb_cts04 {background:#fff;}

    /* 이용안내 */
    .wb_info {padding:4vh 2vh; background:#ededed;}
    .guide_box{text-align:left; word-break:keep-all; line-height:1.5; font-size:1.6vh;}
    .guide_box h2 {font-size:3vh; margin-bottom:30px}
    .guide_box dt{margin-bottom:10px; font-weight:bold; font-size:1.8vh;}        
    .guide_box dd{color:#333; margin:0 0 20px 5px;}
    .guide_box dd strong {color:#555;}
    .guide_box dd li {margin-bottom:5px; list-style:decimal; margin-left:20px; }
    .guide_box dd span {color:red}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .wb_cts02 ul li {width:100%;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .wb_cts02 ul li {width:100%;}
    }
</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox wb_top" data-aos="fade-up">            
        <img src="https://static.willbes.net/public/images/promotion/2023/01/2868m_top.gif" alt="PSAT 사전 소문내기 이벤트" />            
    </div>

    <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/01/2868m_01.jpg" alt="소문이 많아지면 상품도 업"/>
        <div class="count">* 현재 참여 수 : <strong>210</strong>개</div>
        <div class="countTable">
            <ul>
                <li><strong>5구간</strong> 401개 이상</li>
                <li><strong>4구간</strong> 200 ~ 400개</li>
                <li class="now"><strong>3구간</strong> 101 ~ 200개</li>
                <li><strong>2구간</strong> 51 ~ 100개</li>
                <li><strong>1구간</strong> 0 ~ 50개</li>
            </ul>
        </div>
    </div>

    <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/01/2868m_02.jpg" alt="이벤트 상품"/>
        <ul>
            <li>
                <p>1구간</p>
                ① 빽다방 핫초코라떼 <span>10명</span> 추첨
            </li>
            <li>
                <p>2구간</p>
                ① 빽다방 핫초코라떼 <span>10명</span> 추첨<br>
                ② GS25 편의점 5,000원 상품권 <span>10명</span>  추첨
            </li>
            <li>
                <p>3구간</p>
                ① 빽다방 핫초코라떼 <span>10명</span> 추첨<br>
                ② GS25 편의점 5,000원 상품권 <span>10명</span> 추첨<br>
                ③ 네이버 페이 적립금 10,000원 <span>10명</span> 추첨
            </li>
            <li>
                <p>4구간</p>
                ① 빽다방 핫초코라떼 <span>10명</span> 추첨<br>
                ② GS25 편의점 5,000원 상품권 <span>10명</span> 추첨<br>
                ③ 네이버 페이 적립금 10,000원 <span>10명</span> 추첨<br>
                ④ BHC 치킨 기프티콘 <span>5명</span> 추첨
            </li>
            <li>
                <p>4구간</p>
                ① 빽다방 핫초코라떼 <span>10명</span> 추첨<br>
                ② GS25 편의점 5,000원 상품권 <span>10명</span> 추첨<br>
                ③ 네이버 페이 적립금 10,000원 <span>10명</span> 추첨<br>
                ④ BHC 치킨 기프티콘 <span>5명</span> 추첨<br>
                ⑤ 도미노피자(M) 기프티콘 <span>5명</span> 추첨
            </li>
        </ul>
    </div>

    <div class="evtCtnsBox wb_cts03" data-aos="fade-up" >
        <img src="https://static.willbes.net/public/images/promotion/2023/01/2868m_03.jpg" alt="참여방법"/>
        <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="소문내기 이미지 다운로드" style="position: absolute; left: 4.31%; top: 78.66%; width: 26.81%; height: 11.66%; z-index: 2;"></a>
    </div>

    <div class="evtCtnsBox wb_cts04"  data-aos="fade-up" >
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_url_partial')
        @endif
    </div>

    <div class="evtCtnsBox wb_info" data-aos="fade-up" id="tip">
        <div class="guide_box">
            <h2 class="NSK-Black">유의사항</h2>
            <dl>
                <dd>
                    <ol>
                        <li>본 이벤트는 로그인 후 참여 가능합니다.
                        <li>소문내기 이벤트 기간 외 참여한 게시글은 참여 수에 집계되지 않습니다.
                        <li>소문내기 당첨자는 3/8(수) 5급 PSAT 홈페이지 공지사항 공지와 함께 개별 문자 안내됩니다.
                        <li>이벤트 상품 지급을 위해 SMS 수신에 동의해주셔야 합니다.
                        <li>이벤트 상품은 참여한 ID의 등록된 연락처로 지급됩니다. 참여 전 개인정보 확인 및 수정 바랍니다.
                        <li>게시글은 전체 공개글만 인정되며, 삭제 및 무관한 글은 인정되지 않습니다. 인정되지 않는 게시글은 관리자에 의해 삭제될 수 있습니다.
                        <li>동일한 ID, 날짜, 사이트에 한하여는 하나의 게시글로 인정됩니다.
                        <li>이벤트 상품은 한 ID 당 1회만 지급됩니다.(중복 지급 불가)
                        <li>유의사항을 읽지 않고 발생한 모든 상황에 대해 한림법학원은 책임지지 않습니다.
                        <li>기타 부정한 방법으로 참여할 경우 당첨이 취소될 수 있습니다.</li>
                    </ol>
                </dd>
                <dt>※ 블로그 / 인스타그램 작성시 필수 해시태그 : #한림법학원 #5급psat #합격예측 #소문내기</dt>     
            </dl> 
            </div>
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

@stop




