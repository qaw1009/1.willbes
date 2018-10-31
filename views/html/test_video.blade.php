@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="mt40">

        <div>무료버젼</div>
        <!-- 무료 Ver -->
        <div id="videoPopup" class="videoPopup">
            <div class="view p_re">
                <div class="viewList">
                    <span class="Tit NGR"><span class="NG">2강 / 1월 9일</span> : P.20 국어의 특성</span>
                    <ul class="btnList">
                        <li><a class="iconBtn btnUP" href="#none">버튼 위로</a></li>
                        <li><a class="iconBtn btnBookMark" href="#none">버튼 즐겨찾기</a></li>
                        <li><a class="iconBtn btnSetting" href="#none" onclick="openWin('settingPOP')">버튼 설정</a></li>
                        <li><span class="btnFAQ"><a href="#none">동영상 FAQ</a></span></li>
                    </ul>
                </div>
                <div id="settingPOP" class="settingPOP">
                    <img src="{{ img_url('player/player_key.png') }}" usemap="#player_key" style="border: 0;"> 
                    <map name="player_key">
                        <area shape="rect" coords="234,1,262,32" href="#none" onclick="closeWin('settingPOP')" target="" alt="" onfocus="blur();" />
                    </map>
                </div>
                video Player
            </div>
            <div class="vodTabs p_re">
                <ul class="tabWrap vodWrap two NGEB">
                    <li><a href="#Info" class="on">강좌정보</a></li>
                    <li><a href="#Sbj">강의목차</a></li>
                </ul>
                <div class="tabBox vodBox">
                    <div id="Info" class="tabContent infoGrid">
                        <div class="w-data tx-left">
                            <div class="w-subtit NG">국어<span class="row-line">|</span>기미진교수님</div>
                            <div class="w-tit NGR">2018 기미진 기특한 국어 이론요약 + 기출문제(1월-3월)</div>
                            <ul class="w-info">
                                <li>· 강좌정보: 문제풀이 ( 진행중<span class="row-line">|</span>2배수 )</li>
                                <li>· 수강기간: <span class="tx-red">50일</span></li>
                                <li>· 강의수: 16강</li>
                            </ul>
                        </div>
                        <div class="vodcartBox NGR">
                            <ul>
                                <li>
                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                    <span class="tit">강좌:</span>
                                    <span class="txt">80,000원<span class="discount tx-red">↓ 20%</span></span>
                                </li>
                                <li>
                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                    <span class="tit">교재: </span>
                                </li>
                                <li class="last">
                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                    <span class="tit">수강생 교재:</span>
                                    <span class="txt">2018 기특한 국어 기출 문제집</span><br/><br/>
                                    <div class="price">판매중: 80,000원<span class="discount tx-red">↓10%</span></div>
                                </li>
                            </ul>
                        </div>
                        <div class="buttonBtn cartBtn">
                            <ul>
                                <li>
                                    <button type="submit" onclick="" class="btnGray"><span>장바구니</span></button>
                                </li>
                                <li>
                                    <button type="submit" onclick="" class="btnBlue"><span>바로결제</span></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="Sbj" class="tabContent sbjGrid" style="display: none;">
                        <div class="w-data tx-left">
                            <div class="w-subtit NG">국어<span class="row-line">|</span>기미진교수님</div>
                            <div class="w-tit NGR">2018 기미진 기특한 국어 이론요약 + 기출문제(1월-3월)</div>
                            <ul class="w-info">
                                <li>· 강좌정보: 문제풀이 ( 진행중<span class="row-line">|</span>2배수 )</li>
                                <li>· 수강기간: <span class="tx-red">50일</span></li>
                                <li>· 강의수: 16강</li>
                            </ul>
                        </div>
                        <div class="vodlistBox vodSbjBox">
                            <ul class="top">
                                <li>
                                    <div class="tt1">NO</div>
                                    <div class="tt2">강의명</div>
                                    <div class="tt3">시간</div>
                                </li>
                            </ul>
                            <ul class="list sbj">
                                <li>                                    
                                    <div class="tt1">1강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3">50분</div>
                                </li>
                                <li>                                    
                                    <div class="tt1">2강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3">50분</div>
                                </li>
                                <li>                                    
                                    <div class="tt1">3강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3">50분</div>
                                </li>
                                <li>                                    
                                    <div class="tt1">4강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3">50분</div>
                                </li>
                                <li>                                    
                                    <div class="tt1">5강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3">50분</div>
                                </li>
                                <li>                                    
                                    <div class="tt1">6강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3">50분</div>
                                </li>
                                <li>                                    
                                    <div class="tt1">7강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3">50분</div>
                                </li>
                                <li>                                    
                                    <div class="tt1">8강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3">50분</div>
                                </li>
                                <li>                                    
                                    <div class="tt1">9강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3">50분</div>
                                </li>
                                <li>                                    
                                    <div class="tt1">10강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3">50분</div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <br/><br/><br/><br/><br/>


        <div>유료버젼</div>
        <!-- 유료 Ver -->
        <div id="videoPopup" class="videoPopup">
            <div class="view">video Player</div>
            <div class="vodTabs p_re">
                <ul class="tabWrap vodWrap four NGEB">
                    <li><a href="#Lec" class="on">강의목록</a></li>
                    <li><a href="#Bookmark">북마크</a></li>
                    <li><a href="#Faq">학습Q&A</a></li>
                </ul>
                <div class="linkTabs NGEB"><a href="{{ site_url('/home/html/profsub') }}" target="_blank">수강후기</a></div>
                <div class="tabBox vodBox">
                    <div id="Lec" class="tabContent lecGrid">
                        <div class="w-data w-box tx-left">
                            <div class="w-tit NGR">2018 기미진 기특한 국어 이론요약 + 기출문제(1월-3월)</div>
                        </div>
                        <div class="vodlistBox vodlecBox">
                            <ul class="top">
                                <li>
                                    <div class="tt1">NO</div>
                                    <div class="tt2">강의명</div>
                                    <div class="tt3">자료</div>
                                </li>
                            </ul>
                            <ul class="list lec">
                                <li>                                    
                                    <div class="tt1">1강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                                </li>
                                <li>                                    
                                    <div class="tt1">2강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                                </li>
                                <li>                                    
                                    <div class="tt1">3강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                                </li>
                                <li>                                    
                                    <div class="tt1">4강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                                </li>
                                <li>                                    
                                    <div class="tt1">5강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                                </li>
                                <li>                                    
                                    <div class="tt1">6강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                                </li>
                                <li>                                    
                                    <div class="tt1">7강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                                </li>
                                <li>                                    
                                    <div class="tt1">8강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                                </li>
                                <li>                                    
                                    <div class="tt1">9강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                                </li>
                                <li>                                    
                                    <div class="tt1">10강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="Bookmark" class="tabContent bookmarkGrid" style="display: none;">
                        <div class="w-data w-box tx-left">
                            <div class="w-tit NGR">
                                <span class="tx-sky-blue">북마크</span> 클릭시 북마크 시간이 설정되며,<br/>
                                내용 입력 후 <span class="tx-sky-blue">저장</span>시 북마크가 등록됩니다
                            </div>
                            <div class="buttonBtn bookmarkBox">
                                <ul>
                                    <li>
                                        <input type="text" id="S-TIME" name="S-TIME" class="iptTime" placeholder="북마크 시간을 설정 하세요." maxlength="30">
                                        <button type="submit" onclick="" class="btnGray"><span>북마크</span></button>
                                    </li>
                                    <li>
                                        <input type="text" id="S-TIME" name="S-TIME" class="iptTime" placeholder="내용을 입력하세요." maxlength="30">
                                        <button type="submit" onclick="" class="btnBlue"><span>저장</span></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="vodtableBox">
                            <ul class="top">
                                <li>
                                    <div class="tt1">선택</div>
                                    <div class="tt2">시간</div>
                                    <div class="tt3">내용</div>
                                </li>
                            </ul>
                            <ul class="table">
                                <li>                                    
                                    <div class="tt1"><a href="#none">X</a></div>
                                    <div class="tt2">00:10:13</div>
                                    <div class="tt3">북마크1</div>
                                </li>
                                <li>                                    
                                    <div class="tt1"><a href="#none">X</a></div>
                                    <div class="tt2">00:10:13</div>
                                    <div class="tt3">북마크2</div>
                                </li>
                                <li>                                    
                                    <div class="tt1"><a href="#none">X</a></div>
                                    <div class="tt2">00:10:13</div>
                                    <div class="tt3">북마크3</div>
                                </li>
                                <li>                                    
                                    <div class="tt1"><a href="#none">X</a></div>
                                    <div class="tt2">00:10:13</div>
                                    <div class="tt3">내용이 노출됩니다.</div>
                                </li>
                                <li>                                    
                                    <div class="tt1"><a href="#none">X</a></div>
                                    <div class="tt2">00:10:13</div>
                                    <div class="tt3">&nbsp;</div>
                                </li>
                                <li>                                    
                                    <div class="tt1"><a href="#none">X</a></div>
                                    <div class="tt2">00:10:13</div>
                                    <div class="tt3">북마크1</div>
                                </li>
                                <li>                                    
                                    <div class="tt1"><a href="#none">X</a></div>
                                    <div class="tt2">00:10:13</div>
                                    <div class="tt3">북마크2222222</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="Faq" class="tabContent faqGrid" style="display: none;">
                        <div class="w-data w-box tx-left">
                            <div class="w-tit tx-center NGR">
                                수강중 궁금한 점은 교수님께 질문하세요.<br/>
                                <span class="tx-sky-blue underline">정채영 교수님 학습Q&A</span>
                            </div>
                            <div class="faqBox">
                                <ul>
                                    <li>
                                        <div class="w-faqtit">질문유형</div>
                                        <select id="question" name="question" title="question" class="seleQuestion">
                                            <option selected="selected">질문유형을 선택하세요</option>
                                            <option value="유형1">유형1</option>
                                            <option value="유형2">유형2</option>
                                        </select>
                                    </li>
                                    <li>
                                        <div class="w-faqtit">강좌명</div>
                                        <input type="text" id="S-Sbj" name="S-Sbj" class="iptSbj" placeholder="강좌명이 노출됩니다." maxlength="30">
                                    </li>
                                    <li>
                                        <div class="w-faqtit">제목</div>
                                        <input type="text" id="S-Tit" name="S-Tit" class="iptTit" placeholder="제목이 노출됩니다." maxlength="30">
                                    </li>
                                </ul>
                                <textarea placeholder="내용을 입력하세요"></textarea>
                                <ul class="chkBtn">
                                    <li>
                                        <div class="w-faqtit">공개여부</div>
                                    </li>
                                    <li class="radioBtn">
                                        <dl>
                                            <dt>
                                                <input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>비공개</label>
                                            </dt>
                                            <dt>
                                                <input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>공개</label>
                                            </dt>
                                        </dl>
                                    </li>
                                </ul>
                            </div>
                            <div class="buttonBtn cartBtn">
                                <ul>
                                    <li>
                                        <button type="submit" onclick="" class="btnBlue"><span>저장</span></button>
                                    </li>
                                    <li>
                                        <button type="submit" onclick="" class="btnGray"><span>취소</span></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- End Container -->
<script type="text/javascript">
	$(function() {
        $(".vodlistBox ul.list li:nth-child(2n)").addClass("nth");
    });
    $(document).ready(function(){ 
        $('#videoPopup').css('width', $(window).width()); 
        $('#videoPopup').css('height', $(window).height()); 
        $(window).resize(function() { 
            $('#videoPopup').css('width', $(window).width()); 
            $('#videoPopup').css('height', $(window).height()); 

            $('.vodSbjBox ul.sbj').css('height', $(window).height() - 220); 
            $('.vodlecBox ul.lec').css('height', $(window).height() - 150); 
            $('.vodtableBox ul.table').css('height', $(window).height() - 230); 
        }); 
    });
</script>
@stop