@extends('willbes.pc.layouts.master')

@section('content')
<style>
    /*********************************************     Main Container : tech     *********************************************/
.tech .Section2 {
    background:url("../../img/willbes/gosi_tech/visual/visual_top_bg.jpg") repeat-x left 95px;
}
.tech .Section3 {
    background: #f7f7f7;
}

.tech .Depth .depth:last-child strong {
    color: #ba560e;
}

/* Main Container : MainVisual */
.tech .VisualsubBox {
    width: 1120px;
    height: 380px;
    overflow: hidden;
}
.tech .VisualsubBox .bx-wrapper .bx-controls-auto {
    left:20px;
    bottom: 20px;
    margin: 0;
    width: 50px;
    z-index: 50;
  }
.tech .VisualsubBox .bx-wrapper .bx-pager {
    float: right;
    width: auto;
    left:60px;
    bottom: 20px;
    text-align: right;
    z-index: 50;
}
.tech .VisualsubBox .bx-wrapper .bx-pager.bx-default-pager a {
    background: #fff;
    width: 8px;
    height: 8px;
    margin: 0 2px;    
}

.tech .bx-wrapper .bx-pager.bx-default-pager a {
  background: #898989 !important;
}
.tech .bSlider .bx-wrapper .bx-pager.bx-default-pager a:hover, 
.tech .bSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
.tech .bSlider .bx-wrapper .bx-pager.bx-default-pager a:focus {
    background: #f7ec1e !important;
}


/* Main Container : Prof */
.tech .ProfBox {
    margin-top:70px;
}
.tech .ProfBox .PBtab li {
    display: inline;
    float: left;
    width: 50%;
}
.tech .ProfBox .PBtab li a {
    display: block;
    text-align: center;
    font-size: 22px;
    color:#b9b9b9;
    height: 54px;
    line-height: 54px;
    border:1px solid #b9b9b9;
    border-bottom:1px solid #6faf4e;
}
.tech .ProfBox .PBtab li a.active {
    color:#6faf4e;
    border:1px solid #6faf4e;
    border-bottom:1px solid #fff;
    font-weight: 600;
}
.tech .ProfBox .PBtab:after {
    content: "";
    display: block;
    clear: both;
}
.tech .ProfBox .PBcts li {
    float: left;
    width: 274px;
    height: 234px;
    margin-left: 8px;
}
.tech .ProfBox .PBcts li:first-child {
    margin-left: 0;
}

.tech .ProfBox .PBcts:after {
    content: "";
    display: block;
    clear: both;
}
.tech .ProfBox .bSlider .bx-wrapper .bx-pager {
    float: left;
    width: auto;
    left: 30px;
    bottom: 10px;
    text-align: left;
    }
.tech .ProfBox .bSlider .bx-wrapper .bx-pager.bx-default-pager a:hover, 
.tech .ProfBox .bSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
.tech .ProfBox .bSlider .bx-wrapper .bx-pager.bx-default-pager a:focus {
    background: #5a9f37 !important;
    }

/**/
.tech .ProfBoxB {margin-left:-8px}
.tech .ProfBoxB li {
    float: left;
    width: 274px;
    height: 234px;
    margin-left: 8px;
    margin-bottom: 8px;
}
.tech .ProfBoxB:after {
    content: "";
    display: block;
    clear: both;
}


/**/
.tech .smallTit {
    border-top:1px solid #000;
    font-size: 22px;
    color:#363636;    
    position: relative;
}
.tech .smallTit p {
    position: absolute;
    top:-15px;
    text-align:left;
    width: 100%;
}
.tech .smallTit p a {vertical-align: top; margin-left: 10px}
.tech .smallTit span {
    font-weight: 600;
    background: #fff;
    padding:0 20px 0 0;
}
.tech .smallTit strong {
    color:#ba560e;
}

.tech .will-listTit {
    margin-bottom: 15px;
    color:#181818;
}


/* Main Container : Notice : noticeTabs */
.tech .tabWrap.noticeWrap {
    height: 16px;
    border: none;
}
.tech .tabWrap.noticeWrap li {
    float: left;
    width: auto;
    height: 16px;
    margin-right: 10px;
}
.tech .tabWrap.noticeWrap li a {
    display: block;
    width: 100%;
    height: 19px;
    line-height: 19px;
    font-size: 17px;
    color: #c5c5c5;
    text-align: center;
    letter-spacing: 0;
    border:none !important;
    border-right:1px solid #999 !important;
    padding-right: 10px;
}
.tech .tabWrap.noticeWrap li a.on {
    height: 19px;
    line-height: 19px;
    font-weight: 600;
    color: #6faf4e;
    border:none !important;
    border-right:1px solid #999 !important;
}
.tech .tabWrap.noticeWrap li:last-child a.on,
.tech .tabWrap.noticeWrap li:last-child a {
    border-right:none !important;
}
.tech .tabBox.noticeBox a.btn-add {
    position: absolute;
    top: -16px;
    right: 0;
}
.tech .tabBox.noticeBox .List-Table {
    width: 520px;
}
.tech .tabBox.noticeBox .List-Table li {
    position: relative;
    font-size: 13px;
    color: #3a3a3a;
    height: 37px;
    line-height: 37px;
    border-bottom: 1px solid #e3e3e3;
}
.tech .tabBox.noticeBox .List-Table li a {
    display: inline-block;
    width: 80%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    letter-spacing: 0;
}
.tech .tabBox.noticeBox .List-Table li a span {
    background: #6faf4e;
    color:#fff;
    padding: 0 10px;
    border-radius: 10px;
    margin-right: 5px;
}


/* Main Container : Gosi */
.tech .tx-color {
    color: #6faf4e;
}

.tech .copyTit {
    font-size: 35px;
    color: #363636;
    line-height: 1.2;
    text-align: center;
}
.tech .copyTit strong {
    vertical-align: baseline;
	color:#000;
} 
.tech .copyTit span {
	vertical-align: baseline;
}
</style>
<!-- Container -->
<div id="Container" class="Container tech NGR c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">공무원<span class="row-line">|</span></li>
                <li class="subTit">9급</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 gosi">
                        <div class="prof-drop-Box">
                            <h5>9급</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50661/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">김세령</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                </li>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김신주</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50383/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김영</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50651/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">박초롱</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50309/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">이아림</a>
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50305/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">한경춘</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50003/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">원유철</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">김윤수</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50441/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">박민주</a>
                                </li>
                                <li>
                                    <span>[행정법]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50109/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">황남기</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50717/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">한세훈</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50615/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">이석준</a>
                                </li>
                                <li>
                                    <span>[행정학]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">김덕관</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50041/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">윤세훈</a>
                                    <span>[세법]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95">고선미</a>
                                </li>
                                <li>
                                    <span>[회계학]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김영훈</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50057/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김현식</a>
                                    <span>[국제법]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50393/?subject_idx=1127&subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95">이상구</a>
                                </li>
                                <li>
                                    <span>[사회]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50181/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">문병일</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50313/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">한수성</a>
                                    <span>[수학]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50201/?subject_idx=1135&subject_name=%EC%88%98%ED%95%99">곽윤근</a>
                                </li>
                                <li>
                                    <span>[공직선거법]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50109/?subject_idx=1137&subject_name=%EA%B3%B5%EC%A7%81%EC%84%A0%EA%B1%B0%EB%B2%95">황남기</a>
                                </li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>7급</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                </li>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">김윤수</a>
                                </li>
                                <li>
                                    <span>[행정법]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50717/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">한세훈</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50109/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">황남기</a>
                                    <span>[행정학]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">김덕관</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50041/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">윤세훈</a>
                                </li>
                                <li>
                                    <span>[헌법]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50139/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95">유시완</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50109/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95">황남기</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50577/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95">박기범</a>
                                    <span>[경제학]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50487/?subject_idx=1115&subject_name=%EA%B2%BD%EC%A0%9C%ED%95%99">황정빈</a>
                                </li>
                                <li>
                                    <span>[세법]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95">고선미</a>    
                                    <span>[회계학]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김영훈</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50057/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김현식</a>
                                    <span>[국제법]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">이상구</a>                                    
                                </li>
                                <li>
                                    <span>[국제정치학]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50393/?subject_idx=1128&subject_name=%EA%B5%AD%EC%A0%9C%EC%A0%95%EC%B9%98%ED%95%99">이상구</a>                                    
                                    <span>[공직선거법]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50109/?subject_idx=1137&subject_name=%EA%B3%B5%EC%A7%81%EC%84%A0%EA%B1%B0%EB%B2%95">황남기</a>    
                                    <span>[일본어]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50726/?subject_idx=1161&subject_name=%EC%9D%BC%EB%B3%B8%EC%96%B4">황선아</a>
                                </li>
                                <li>
                                    <span>[G-TELP]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50713/?subject_idx=1177&subject_name=G-TELP">서민지</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50275/?subject_idx=1177&subject_name=G-TELP">이유정</a>                                     
                                    <span>[프랑스어]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50001/?subject_idx=1178&subject_name=%ED%94%84%EB%9E%91%EC%8A%A4%EC%96%B4">박훈</a>    
                                </li>
                                <li>
                                    <span>[중국어]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50061/?subject_idx=1162&subject_name=%EC%A4%91%EA%B5%AD%EC%96%B4">조소현</a>                                    
                                    <span>[경영학]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50549/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99">전수환</a>    
                                    <span>[물리학개론]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50127/?subject_idx=1226&subject_name=%EB%AC%BC%EB%A6%AC%ED%95%99%EA%B0%9C%EB%A1%A0">고진목</a>
                                </li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>세무직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                </li>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김신주</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50383/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김영</a>
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">김윤수</a>
                                </li>
                                <li>
                                    <span>[세법]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95">고선미</a>   
                                </li>
                                <li> 
                                    <span>[회계학]</span>                                    
                                    <a href="/professor/show/cate/3022/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김영훈</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50057/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김현식</a>                                 
                                </li>
                                <li>
                                    <span>[사회]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50181/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">문병일</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50313/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">한수성</a>
                                </li>
                                <li>
                                    <span>[수학]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50201/?subject_idx=1135&subject_name=%EC%88%98%ED%95%99">곽윤근</a>
                                </li>
                                <li>&nbsp;</li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>법원직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50065/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">이현나</a>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50651/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">박초롱</a>
                                    <a href="/professor/show/cate/3035/prof-idx/50545/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김반이</a>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50571/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">임진석</a>
                                </li>
                                <li>
                                    <span>[헌법]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50591/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95">이국령</a>    
                                    <span>[형법]</span>                                    
                                    <a href="/professor/show/cate/3035/prof-idx/50073/?subject_idx=1116&subject_name=%ED%98%95%EB%B2%95">문형석</a>
                                    <span>[형사소송법]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50685/?subject_idx=1117&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95">유안석</a>
                                </li>
                                <li>
                                    <span>[민법]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50519/?subject_idx=1118&subject_name=%EB%AF%BC%EB%B2%95">김동진</a>    
                                    <span>[민사소송법]</span>                                    
                                    <a href="/professor/show/cate/3035/prof-idx/50145/?subject_idx=1119&subject_name=%EB%AF%BC%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95">이덕훈</a>
                                </li>
                            </ul>
                            <h5>소방직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50661/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">김세령</a>
                                </li>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50309/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">이아림</a>
                                    <a href="/professor/show/cate/3023/prof-idx/50479/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">이현정</a>
                                    <a href="/professor/show/cate/3023/prof-idx/50565/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">제니</a>
                                    <a href="/professor/show/cate/3023/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김신주</a>
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50305/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">한경준</a>
                                    <a href="/professor/show/cate/3023/prof-idx/50403/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">배준환</a>
                                </li>
                                <li>
                                    <span>[소방학개론]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50465/?subject_idx=1113&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0">김종상</a>    
                                    <span>[사회]</span>                                    
                                    <a href="/professor/show/cate/3023/prof-idx/50181/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">문병일</a>                                    
                                </li>
                                <li>
                                    <span>[소방관계법규]]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50465/?subject_idx=1138&subject_name=%EC%86%8C%EB%B0%A9%EA%B4%80%EA%B3%84%EB%B2%95%EA%B7%9C">김종상</a>
                                    <span>[체력]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50387/?subject_idx=1399&subject_name=%EC%B2%B4%EB%A0%A5">제이슨</a>                                   
                                </li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>기술직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김신주</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50383/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김영</a>                                    
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50305/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">한경준</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50441/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">박민주</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">김윤수</a>
                                </li>
                                <li>
                                    <span>[보건행정]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50395/?subject_idx=1129&subject_name=%EB%B3%B4%EA%B1%B4%ED%96%89%EC%A0%95">하재남</a>    
                                    <span>[공중보건]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50395/?subject_idx=1130&subject_name=%EA%B3%B5%EC%A4%91%EB%B3%B4%EA%B1%B4">하재남</a>
                                    <span>[전기기기]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50718/?subject_idx=1168&subject_name=%EC%A0%84%EA%B8%B0%EA%B8%B0%EA%B8%B0">최우영</a>
                                </li>
                                <li>
                                    <span>[재배학]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1171&subject_name=%EC%9E%AC%EB%B0%B0%ED%95%99">장사원</a>    
                                    <span>[식용작물]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1172&subject_name=%EC%8B%9D%EC%9A%A9%EC%9E%91%EB%AC%BC">장사원</a>
                                    <span>[통신이론]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50718/?subject_idx=1173&subject_name=%EC%A0%84%EA%B8%B0%EC%9D%B4%EB%A1%A0">최우영</a>
                                </li>
                                <li>
                                    <span>[전자공학]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50163/?subject_idx=1193&subject_name=%EC%A0%84%EC%9E%90%EA%B3%B5%ED%95%99">최우영</a>    
                                    <span>[무선공학]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50163/?subject_idx=1194&subject_name=%EB%AC%B4%EC%84%A0%EA%B3%B5%ED%95%99">최우영</a>
                                    <span>[통신이론]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50163/?subject_idx=1195&subject_name=%ED%86%B5%EC%8B%A0%EC%9D%B4%EB%A1%A0">최우영</a>
                                </li>
                                <li>
                                    <span>[회로이론]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50718/?subject_idx=1198&subject_name=%ED%9A%8C%EB%A1%9C%EC%9D%B4%EB%A1%A0">최우영</a>    
                                    <span>[전기자기학]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50163/?subject_idx=1210&subject_name=%EC%A0%84%EA%B8%B0%EC%9E%90%EA%B8%B0%ED%95%99">최우영</a>
                                    <span>[응용역학개론]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50435/?subject_idx=1214&subject_name=%EC%9D%91%EC%9A%A9%EC%97%AD%ED%95%99%EA%B0%9C%EB%A1%A0">장성국</a>
                                </li>
                                <li>
                                    <span>[토목설계]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50435/?subject_idx=1215&subject_name=%ED%86%A0%EB%AA%A9%EC%84%A4%EA%B3%84">장성국</a>    
                                    <span>[기계일반]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50463/?subject_idx=1216&subject_name=%EA%B8%B0%EA%B3%84%EC%9D%BC%EB%B0%98">김정배</a>
                                    <span>[기계설계]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50463/?subject_idx=1217&subject_name=%EA%B8%B0%EA%B3%84%EC%84%A4%EA%B3%84">김정배</a>
                                </li>
                                <li>
                                    <span>[작물생리학]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1220&subject_name=%EC%9E%91%EB%AC%BC%EC%83%9D%EB%A6%AC%ED%95%99">장사원</a>    
                                    <span>[생물]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1222&subject_name=%EC%83%9D%EB%AC%BC">장사원</a>
                                    <span>[물리학개론]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50127/?subject_idx=1226&subject_name=%EB%AC%BC%EB%A6%AC%ED%95%99%EA%B0%9C%EB%A1%A0">고진목</a>
                                </li>
                                <li>
                                    <span>[간호관리]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50539/?subject_idx=1227&subject_name=%EA%B0%84%ED%98%B8%EA%B4%80%EB%A6%AC">김명애</a>    
                                    <span>[지역사회간호]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50539/?subject_idx=1228&subject_name=%EC%A7%80%EC%97%AD%EC%82%AC%ED%9A%8C%EA%B0%84%ED%98%B8">김명애</a>
                                </li>
                                <li>
                                    <span>[농촌지도론]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1230&subject_name=%EB%86%8D%EC%B4%8C%EC%A7%80%EB%8F%84%EB%A1%A0">장사원</a>    
                                    <span>[유기농업기능사]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1232&subject_name=%EC%9C%A0%EA%B8%B0%EB%86%8D%EC%97%85%EA%B8%B0%EB%8A%A5%EC%82%AC">장사원</a>
                                    <span>[토양학]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1243&subject_name=%ED%86%A0%EC%96%91%ED%95%99">장사원</a>
                                </li>
                            </ul>                            
                        </div>

                        <div class="prof-drop-Box">
                            <h5>군무원</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50729/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">오훈</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50621/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">임재진</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                </li>
                                <li>
                                    <span>[행정법]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50615/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">이석준</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50639/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">변원갑</a>
                                    <span>[행정학]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50107/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">김헌</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">김덕관</a>
                                </li>
                                <li>
                                    <span>[공중보건]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50395/?subject_idx=1130&subject_name=%EA%B3%B5%EC%A4%91%EB%B3%B4%EA%B1%B4">하재남</a>    
                                    <span>[G-TELP]</span>                                    
                                    <a href="/professor/show/cate/3024/prof-idx/50713/?subject_idx=1177&subject_name=G-TELP">서민지</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50275/?subject_idx=1177&subject_name=G-TELP">이유정</a>                                 
                                </li>
                                <li>
                                    <span>[경영학]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50763/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99">고강유</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50549/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99">전수환</a>
                                    <span>[전자회로]</span>                                    
                                    <a href="/professor/show/cate/3024/prof-idx/50163/?subject_idx=1196&subject_name=%EC%A0%84%EC%9E%90%ED%9A%8C%EB%A1%9C">최우영</a>
                                </li>
                                <li>
                                    <span>[한국사검정능력시험]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50619/?subject_idx=1237&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EA%B2%80%EC%A0%95%EB%8A%A5%EB%A0%A5%EC%8B%9C%ED%97%98">김상범</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50305/?subject_idx=1237&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EA%B2%80%EC%A0%95%EB%8A%A5%EB%A0%A5%EC%8B%9C%ED%97%98">한경준</a>
                                </li>
                            </ul>
                            <h5>부사관</h5>
                            <ul>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3030/prof-idx/50479/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">이현정</a>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3030/prof-idx/50649/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">정훈의</a>
                                    <span>[언어논리]</span>
                                    <a href="/professor/show/cate/3030/prof-idx/50231/?subject_idx=1146&subject_name=%EC%96%B8%EC%96%B4%EB%85%BC%EB%A6%AC">이서연</a>
                                </li>
                                <li>
                                    <span>[자료해석/공간/지각/상환판단]</span>
                                    <a href="/professor/show/cate/3030/prof-idx/50239/?subject_idx=1197&subject_name=%EC%9E%90%EB%A3%8C%ED%95%B4%EC%84%9D%2F%EA%B3%B5%EA%B0%84%2F%EC%A7%80%EA%B0%81%2F%EC%83%81%ED%99%A9%ED%8C%90%EB%8B%A8">황두기</a>  
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">수강신청</a>
                    <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 gosi2">
                        <div class="lec-drop-Box">
                            <h5>9급</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3019/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3019/pack/648001">추천패키지</a>
                                </li>
                                <li>
                                    <a href="/userPackage/show/cate/3019/prod-code/154935/lidx/3">DIY패키지</a>
                                </li>
                                <li>
                                    <a href="/promotion/index/cate/3019/code/1281">T-PASS</a>   
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>7급</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3020/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3020/pack/648001">추천패키지</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3020/pack/648002">선택패키지</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>세무직</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3022/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3022/pack/648001">추천패키지</a>
                                </li>
                                <li>
                                    <a href="/promotion/index/cate/3019/code/1281">T-PASS</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>법원직</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3035/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3035/pack/648001">추천패키지</a>
                                </li>
                                <li>
                                    <a href="/promotion/index/cate/3035/code/1385">순환별패키지</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>소방직</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3023/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3023/pack/648001">추천패키지</a>
                                </li>
                                <li>
                                    <a href="/promotion/index/cate/3023/code/1060">소방PASS</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>기술직</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3028/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3028/pack/648001">추천패키지</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>군무원</h5>
                            <ul>
                                <li>
                                    <a href="/lecture/index/cate/3024/pattern/only">단강좌</a>
                                </li>
                                <li>
                                    <a href="/package/index/cate/3024/pack/648001">추천패키지</a>
                                </li>
                                <li>
                                    <a href="/userPackage/show/cate/3024/prod-code/155023/lidx/3">DIY패키지</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box">
                            <h5>부사관</h5>
                            <ul>
                                <li>
                                    <a href="/promotion/index/cate/3030/code/1093">부사관PASS</a>   
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="#none">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">패키지</li>
                            <li><a href="#none">추천 패키지</a></li>
                            <li><a href="#none">선택 패키지</a></li>
                            <li><a href="#none">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재구매</a>
                </li>
                <li class="pass dropdown">
                    <a href="//pass.dev.willbes.net/pass/home/index" target="_self">
                        공무원학원
                        <span class="arrow-Btn">></span>
                    </a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">공무원학원</li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605001" target="_self">노량진(본원)</a></li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605003" target="_self">부산</a></li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605004" target="_self">대구</a></li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605005" target="_self">인천</a></li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605006" target="_self">광주</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </h3>
    </div>      
        
    <div class="Section MainVisual">        
        <div class="widthAuto NSK mt30">
            <div class="VisualsubBox">
                <div class="bSlider">
                    <div class="sliderStopAutoPager">
                        <div><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_1120x380_01.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_1120x380_02.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_1120x380_03.jpg') }}" alt="배너명"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Section Section2">
        <div class="widthAuto ">
            <a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_top.jpg') }}" alt="윌비스TOP 기술직 라인업"></a>
        </div>
    </div>


    <div class="Section ProfBox">
        <div class="widthAuto">        
            <ul class="PBtab NSK">
                <li><a href="#tab01">현재 준비중인 수험생이라면</a></li>
                <li><a href="#tab02">지금 시작하는 초시생이라면</a></li>
            </ul>  
            <div id="tab01">  
                <img src="{{ img_url('gosi_tech/visual/visual_tit01_01.jpg') }}" alt="지금은 전범위 모의고사로 마무리 할 때!">            
                <ul class="PBcts">
                    <li> 
                        <div class="bSlider">
                            <div class="slider">
                                <div><a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_prof01.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_prof01.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="bSlider">
                            <div class="slider">
                                <div><a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_prof01.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_prof01.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                    <li><a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_prof01.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_prof01.jpg') }}" alt="배너명"></a></li>
                </ul>
            </div>
            <div id="tab02">  
                <img src="{{ img_url('gosi_tech/visual/visual_tit01_02.jpg') }}" alt="빠르게 기본이론 강좌로 개념정립!">            
                <ul class="PBcts">
                    <li> 
                        <div class="bSlider">
                            <div class="slider">
                                <div><a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_prof01.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_prof01.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                    <li> 
                        <div class="bSlider">
                            <div class="slider">
                                <div><a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_prof01.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_prof01.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                    <li><a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_prof01.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi_tech/visual/visual_prof01.jpg') }}" alt="배너명"></a></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="Section Section3 mt100">
        <div class="widthAuto p_re">
            <div><img src="{{ img_url('gosi_tech/visual/visual_tip.jpg') }}" alt="빈틈없는 완벽한 실력을 쌓게 됩니다."></div>
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto p_re">
            <img src="{{ img_url('gosi_tech/visual/visual_tit02.jpg') }}" alt="무엇 하나 빠지지 않는 빈틈없는 라인업 윌비스 TOP 기술직 교수진">
            <ul class="ProfBoxB">
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_tech/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
            </ul>
        </div>
    </div>

    <div class="Section NSK mt90">
        <div class="widthAuto">  
            <div class="willbesNews">
                <div class="noticeTabs f_left">
                <div class="will-listTit">공지사항</div>
                    <div class="tabBox noticeBox" style="margin-top:-30px">
                        <div class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>EVENT</span>2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none"><span>EVENT</span>2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">[공지] 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="noticeTabs f_right">
                    <ul class="tabWrap noticeWrap three">
                        <li><a href="#notice1" class="on">시험공고</a></li>
                        <li><a href="#notice2" class="">수험뉴스</a></li>
                        <li><a href="#notice3" class="">합격수기</a></li>
                    </ul>
                    <div class="tabBox noticeBox">
                        <div id="notice1" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>국가직 | 2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none"><span>HOT</span>서울시 | 2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">제주도 | 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">광주광역시 | 2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">부산광역시 | 2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                        <div id="notice2" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">설연휴학원고객센터운영안내22</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                        <div id="notice3" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">3월 31일(금) 새벽시스템점검안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">설연휴학원고객센터운영안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내333</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--willbesNews //-->
        </div>
    </div>


    <div class="Section NSK mt70 mb90">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesNumber">
                        <ul>
                            <li>
                                <div class="nTit">온라인 수강문의</div>
                                <div class="nNumber tx-color">1544-5006 <span>▶</span> 2</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 18시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">교재문의</div>
                                <div class="nNumber tx-color">1544-4944</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 17시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">학원 고객센터</div>
                                <div class="nNumber tx-color">1544-0336</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    평일/주말: 09시~ 22시<br/>
                                </div>
                            </li>
                        </ul>
                    </dt>    
                    <dt class="willbesCenter">
                        <div class="centerTit">윌비스 공무원 사이트에 물어보세요!</div>
                        <ul>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                                    <div class="nTxt">모바일<br/>서비스</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">동영상<br/>상담실</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                                    <div class="nTxt">1:1<br/>고객지원</div>
                                </a>
                            </li>
                        </ul>
                    </dt>
                    
                </dl>
            </div>            
        </div>
    </div>
    <!-- CS센터 //-->

</div>
<!-- End Container -->

<script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function() {
                $('.PBtab').each(function () {
                    var $active, $content, $links = $(this).find('a');
                    $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
                    $active.addClass('active');

                    $content = $($active[0].hash);

                    $links.not($active).each(function () {
                        $(this.hash).hide();
                    });

                    // Bind the click event handler
                    $(this).on('click', 'a', function (e) {
                        $active.removeClass('active');
                        $content.hide();

                        $active = $(this);
                        $content = $(this.hash);

                        $active.addClass('active');
                        $content.show();

                        e.preventDefault();
                    });
                });
            }, 200);
        });
    </script>
@stop
@stop