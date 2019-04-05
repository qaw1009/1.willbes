@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        span {vertical-align:auto}
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1186_top_bg.png) no-repeat center top;}
        .evt01 {background:#eee;}
        .evt01 .lecture {
            width:1000px; margin:0 auto; padding:50px 0;
        }
        .evt01 .lecture li {
            display:inline; float:left; width:25%; text-align:center; margin-bottom:20px; padding-top:20px;
        }
        .evt01 .lecture li:hover {background:url(https://static.willbes.net/public/images/promotion/common/patternB.png) repeat}
        .evt01 .lecture li img.prof {
            width:200px !important; border:1px solid #ccc; background:#fff;
        }
        .evt01 .t_tilte {
           line-height:1.5; padding:10px 0; color:#666; width:200px; margin:0 auto
        }
        .evt01 .t_tilte p {border-top:1px solid #e4e4e4; padding-top:10px; margin-top:10px}
        .evt01 .t_tilte span {
            color:#36374d; font-size:14px; ;
        }

        .evt01 .lecture ul:after {
            content:""; display:block; clear:both;
        }
        /*
        .evt01 div {position:relative; width:1120px; margin:0 auto}
        .evt01 div span {position:absolute; left:463px; display:block; width:433px; height:67px; line-height:67px; z-index:10}
        .evt01 div span:nth-child(1) {top:220px}
        .evt01 div span:nth-child(2) {top:300px}
        .evt01 div span:nth-child(3) {top:620px}
        .evt01 div span:nth-child(4) {top:700px}
        .evt01 div span:nth-child(5) {top:780px}
        .evt01 div span:nth-child(6) {top:860px}
        .evt01 div span:nth-child(7) {top:1170px}
        .evt01 div span:nth-child(8) {top:1250px}
        .evt01 div span:nth-child(9) {top:1330px}
        .evt01 div span:nth-child(10) {top:1710px}
        .evt01 div span:nth-child(11) {top:1790px}
        .evt01 div span a {display:block; text-align:center; color:#333; background:#fff; font-size:18px; font-weight:600; border:1px solid #ff5d7a !important;}
        .evt01 div span a:hover {color:#fff; background:#ff5d7a}
        */
		    .evt02 {background:#fff;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

      <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2019/04/1186_top.png" title="소방전담 교수님의 완벽분석 해설강의">
      </div>
      <div class="evtCtnsBox evt01">
      <div class="lecture">
          <ul>
              <li>
                  <img src="https://pass.willbes.net/public/uploads/willbes/professor/50661/lec_detail_50661_1553238216.png" title="교수명" class="prof">
                  <div class="t_tilte">
                      국어 김세령 교수<br>
                      <span>고득점에 최적화된<br>신개념 국어</span>                               
                      <p>추후 제공 예정입니다.</p>                            
                  </div>
              </li>
              <li>
                  <img src="https://pass.willbes.net/public/uploads/willbes/professor/50465/lec_detail_50465.png" title="교수명" class="prof">
                  <div class="t_tilte">
                      소방학개론 김종상 교수<br>
                      <span>소방 전문<br>스페셜리스트</span> 
                      <p>
                          <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn03.png" title="해설강의"></a>
                          <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn04.png" title="해설자료"></a>
                      </p>
                  </div>
              </li>
              <li>
                  <img src="https://pass.willbes.net/public/uploads/willbes/professor/50465/lec_detail_50465.png" title="교수명" class="prof">
                  <div class="t_tilte">
                      공채 소방관계법규 김종상 교수<br>
                      <span>소방 전문<br>스페셜리스트</span> 
                      <p>
                          <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn03.png" title="해설강의"></a>
                          <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn04.png" title="해설자료"></a>
                      </p>
                  </div>
              </li>
              <li>
                  <img src="https://pass.willbes.net/public/uploads/willbes/professor/50465/lec_detail_50465.png" title="교수명" class="prof">
                  <div class="t_tilte">
                      경채 소방관계법규 김종상 교수<br>
                      <span>소방 전문<br>스페셜리스트</span> 
                      <p>
                          <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn03.png" title="해설강의"></a>
                          <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn04.png" title="해설자료"></a>
                      </p>
                  </div>
              </li>
              <li>
                  <img src="https://pass.willbes.net/public/uploads/willbes/professor/50479/lec_detail_50479.png" title="교수명" class="prof">
                  <div class="t_tilte">
                      공채 영어 이현정 교수<br>
                      <span>막힘없이 풀어가는<br>수험 영어 전문가!</span> 
                      <p>
                          <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn03.png" title="해설강의"></a>
                          <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn04.png" title="해설자료"></a>
                      </p>
                  </div>
              </li>
              <li>
                  <img src="https://pass.willbes.net/public/uploads/willbes/professor/50479/lec_detail_50479.png" title="교수명" class="prof">
                  <div class="t_tilte">
                      경채 영어 이현정 교수<br>
                      <span>막힘없이 풀어가는<br>수험 영어 전문가!</span> 
                      <p>
                          <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn03.png" title="해설강의"></a>
                          <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn04.png" title="해설자료"></a>
                      </p>
                  </div>
              </li>
              <li>
                  <img src="https://pass.willbes.net/public/uploads/willbes/professor/50305/lec_detail_50305.png" title="교수명" class="prof">
                  <div class="t_tilte">
                      한국사 한경준 교수<br>
                      <span>한국사에<br>미치게 만들다</span> 
                      <p>
                          <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn03.png" title="해설강의"></a>
                          <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn04.png" title="해설자료"></a>
                      </p>
                  </div>
              </li>
          </ul>
        </div>
        <!--
        <div>          
          {{--국어 김새령--}}
          <span><a href="#">2019 소방직 국어 해설강의 보기</a></span>
          <span><a href="#">총평&amp;해설자료 Download</a></span>
          {{--소방학개론/소방관계법규 김종상--}}
          <span><a href="#">2019 소방직 소방학개론 해설강의 보기</a></span>
          <span><a href="#">2019 소방직 소방관계법규 해설강의 보기</a></span>
          <span><a href="#">2019 소방직 경채 소방관계법규 해설강의 보기</a></span>
          <span><a href="#">총평&amp;해설자료 Download</a></span>
          {{--영어 이현정--}}
          <span><a href="#">2019 소방직 공채 영어 해설강의 보기</a></span>
          <span><a href="#">2019 소방직 경채 영어 해설강의 보기</a></span>
          <span><a href="#">총평&amp;해설자료 Download</a></span>
          {{--한국사 한경준--}}
          <span><a href="#">2019 소방직 한국사 해설강의 보기</a></span>
          <span><a href="#">총평&amp;해설자료 Download</a></span>
          <img src="https://static.willbes.net/public/images/promotion/2019/04/1186_01.png" usemap="#1186_01" title="소방직 해설강의" border="0">
        </div>
      -->
      </div>
	  
	  <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2019/04/1186_02.png" usemap="#1186_02" title="불꽃소방팀의 합격전담반" border="0">
        <map name="1186_02">
          <area shape="rect" coords="381,1084,740,1147" href="javascript:alert('준비중입니다');">
        </map>
	  </div>

	</div>
    <!-- End Container -->

@stop