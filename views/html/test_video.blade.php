@extends('willbes.pc.layouts.master')

@section('content')


<link href="/public/vendor/starplayer/css/starplayer.css?token={{time()}}" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/public/vendor/starplayer/js/hls.js?token={{time()}}"></script>
<script type="text/javascript" src="/public/vendor/starplayer/js/starplayer_config_live.js?token={{time()}}"></script>
<script type="text/javascript" src="/public/vendor/starplayer/js/starplayer_live.js?token={{time()}}"></script>
<script type="text/javascript" src="/public/vendor/starplayer/js/starplayer_ui_live.js?token={{time()}}"></script>
<script type="text/javascript" src="/public/js/willbes/player_live.js?token={{time()}}"></script>
<!-- Container -->
<div id="Container" class="subContainer widthAuto">
    <div class="mt40">
        <div id="videoPopup" class="videoPopup">
            <div class="view p_re">                
                <div class="viewList">
                    <span class="Tit NGR"><span class="NG">1회 10강 </span>1월 18일 : Unit 05. 5형식 문형: S + V + O + O·C [불완전타동사] p100~102</span>
                    <ul class="btnList">
                        <li class="lecCtr"><a href="#none" class="pre noLec">이전 강의</a><a href="#none" class="next">다음 강의</a></li>
                        <li><a class="iconBtn btnSetting" href="#none" onclick="openWin('settingPOP')">버튼 설정</a></li>
                        <li><span class="btnFAQ"><a href="#none">동영상 FAQ</a></span></li>
                    </ul>
                </div>
                <div id="settingPOP" class="settingPOP">
                    <img src="{{ img_url('player/player_keyH.png') }}" usemap="#player_key" style="border: 0;"> 
                    <map name="player_key">
                        <area shape="rect" coords="930,10,960,36" href="#none" onclick="closeWin('settingPOP')" target="" alt="" onfocus="blur();" />
                    </map>
                </div>   
                <div id="player-container">
                    <div id="video-container">
                        <video id="starplayer" style="width:640px" preload="" src="https://static.willbes.net/public/images/njob/promotion/2021/12/1034_video_01.mp4"></video> 
                    </div>
                    <div id="controller-container2" class="starplayer_script_ui">
                        <div class="top_area">
                            <div class="seekbar_l">
                                <div class="currentbar"></div>
                                <div class="repeatbar"></div>
                                <div class="seekbar_area">
                                    <a class="btn_common btn_seek"></a>
                                    <a class="btn_common btn_repeatA"></a>
                                    <a class="btn_common btn_repeatB"></a>
                                </div>
                            </div>
                            <div class="seekbar_r">
                                <a class="btn_common btn_repeat"></a>
                                <a class="btn_common btn_fullscreen"></a>
                                <a class="btn_common btn_mute"></a>
                                <div class="volumebar">
                                    <div class="current_volumebar"></div>
                                    <div class="volumebar_area">
                                        <a class="btn_common btn_volume"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom_area">
                            <div class="control_l">
                                <div class="basic_controls">
                                    <a class="btn_common btn_play"></a>
                                    <a class="btn_common btn_stop"></a>
                                    <a class="btn_common btn_backward"></a>
                                    <a class="btn_common btn_forward"></a>
                                </div>
                                <div class="control_text_status">준비</div>
                                <div class="control_text_time"><span id="text_currentTime">00:00:00</span> / <span id="text_duration">00:00:00</span></div>
                            </div>
                            <div class="control_r">
                                {{--
                                <ul class="speed_controls">
                                    <li><a class="btn_common btn_speed06"></a></li>
                                    <li><a class="btn_common btn_speed08"></a></li>
                                    <li><a class="btn_common btn_speed10"></a></li>
                                    <li><a class="btn_common btn_speed12"></a></li>
                                    <li><a class="btn_common btn_speed14"></a></li>
                                    <li><a class="btn_common btn_speed16"></a></li>
                                    <li><a class="btn_common btn_speed18"></a></li>
                                    <li><a class="btn_common btn_speed20"></a></li>
                                </ul>
                                --}}
                                <div class="speed_controls_num">
                                    <div class="speed_controls_btn">
                                        <a href="#">-</a>
                                        <a href="#">1.0</a>
                                        <a href="#">+</a>
                                    </div>
                                    <div class="speed_controls_pop">
                                        <a href="#">0.6</a>
                                        <a href="#">0.7</a>
                                        <a href="#">0.8</a>
                                        <a href="#">0.9</a>
                                        <a href="#">1.0</a>
                                        <a href="#">1.0</a>
                                        <a href="#">1.2</a>
                                        <a href="#">1.3</a>
                                        <a href="#">1.4</a>
                                        <a href="#">1.5</a>
                                        <a href="#">1.6</a>
                                        <a href="#">1.7</a>
                                        <a href="#">1.8</a>
                                        <a href="#">1.9</a>
                                        <a href="#">2.0</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
            <iframe frameborder="0" scrolling="no" width="400px" height="100%" onload="resizeIframe(this)" src="{{ site_url('/home/html/test_video_iframe') }}"></iframe>
        </div>

        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

        <div>iFrame버젼</div>
        <!-- iFrame Ver -->
        <div id="videoPopup" class="videoPopup">
            <div class="view p_re">                
                <div class="viewList">
                    <span class="Tit NGR"><span class="NG">1회 10강 </span>1월 18일 : Unit 05. 5형식 문형: S + V + O + O·C [불완전타동사] p100~102</span>
                    <ul class="btnList">
                        <!--li><a class="iconBtn btnUP" href="#none">버튼 위로</a></li>
                        <li><a class="iconBtn btnBookMark" href="#none">버튼 즐겨찾기</a></li-->
                        <li class="lecCtr"><a href="#none" class="pre noLec">이전 강의</a><a href="#none" class="next">다음 강의</a></li>
                        <li><a class="iconBtn btnSetting" href="#none" onclick="openWin('settingPOP')">버튼 설정</a></li>
                        <li><span class="btnFAQ"><a href="#none">동영상 FAQ</a></span></li>
                    </ul>
                </div>
                <div id="settingPOP" class="settingPOP">
                    <img src="{{ img_url('player/player_keyH.png') }}" usemap="#player_key" style="border: 0;"> 
                    <map name="player_key">
                        <area shape="rect" coords="930,10,960,36" href="#none" onclick="closeWin('settingPOP')" target="" alt="" onfocus="blur();" />
                    </map>
                </div>   
                <span class="tx-white">video Player</span>             
            </div>
            <iframe frameborder="0" scrolling="no" width="400px" height="100%" onload="resizeIframe(this)" src="{{ site_url('/home/html/test_video_iframe') }}"></iframe>
        </div>


        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

        <!-- 무료 Ver -->
        <div class="c_both">무료버젼</div>      
        <br/><br/>  
        <div id="videoPopup" class="videoPopup">
            <div class="view p_re">
                <div class="viewList">
                    <span class="Tit NGR"><span class="NG">1회 10강 </span>1월 18일 : Unit 05. 5형식 문형: S + V + O + O·C [불완전타동사] p100~102</span>
                    <ul class="btnList">
                        <li><a class="iconBtn btnUP" href="#none">버튼 위로</a></li>
                        <li><a class="iconBtn btnBookMark" href="#none">버튼 즐겨찾기</a></li>
                        <li><a class="iconBtn btnSetting" href="#none">버튼 설정</a></li>
                        <li><span class="btnFAQ"><a href="#none">동영상 FAQ</a></span></li>
                    </ul>
                </div>
                <span class="tx-white">video Player</span>
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
                        <div class="buttonBtn cartBtn mb10">
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
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약 2018 기미진 기특한 국어 이론요약<</div>
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


        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

        <!-- 유료 Ver -->
        <div class="c_both">유료버젼</div>    
        <br/><br/>      
        <div id="videoPopup" class="videoPopup">      
            <div class="view p_re">
                <div class="viewList">
                    <span class="Tit NGR"><span class="NG">1회 10강 </span>1월 18일 : Unit 05. 5형식 문형: S + V + O + O·C [불완전타동사] p100~102</span>
                    <ul class="btnList">
                        <li class="lecCtr"><a href="#none" class="pre noLec">이전 강의</a><a href="#none" class="next">다음 강의</a></li>
                        <li><a class="iconBtn btnSetting" href="#none" onclick="openWin('settingPOP')">버튼 설정</a></li>
                        <li><span class="btnFAQ"><a href="#none">동영상 FAQ</a></span></li>
                    </ul>
                </div>
                <span class="tx-white">video Player</span>
            </div>    
            <div class="vodTabs p_re">
                <ul class="tabWrap vodWrap three NGEB">
                    <li><a href="#Lec" class="on">강의목록</a></li>
                    <li><a href="#Bookmark">북마크</a></li>
                    {{--<li><a href="#Faq">학습Q&A</a></li>--}}
                    <li><a href="#review">수강후기</a></li>
                </ul>

                {{--<div class="linkTabs NGEB"><a href="{{ site_url('/home/html/profsub') }}" target="_blank">수강후기</a></div>--}}

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
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약 2018 기미진 기특한 국어 이론요약</div>
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
                                <li>                                    
                                    <div class="tt1">11강</div>
                                    <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                                    <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                                </li>
                                <li>                                    
                                    <div class="tt1">12강</div>
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

                    {{--
                    <div id="Faq" class="tabContent faqGrid" style="display: none;">
                        <div class="w-data w-box tx-left">
                            <div class="w-tit tx-center NGR">
                                수강중 궁금한 점은 교수님께 질문하세요.<br/>
                                <span class="tx-sky-blue underline">정채영 교수님 학습Q&A</span>
                            </div>
                            <div class="faqBox">
                                <ul>
                                    <li class="tx-white">
                                        2018 정채영 기특한 국어 이론요약 + 기출문제(1월-3월)
                                    </li>
                                    <li>
                                        <select id="question" name="question" title="question" class="seleQuestion">
                                            <option selected="selected">질문유형을 선택하세요</option>
                                            <option value="유형1">유형1</option>
                                            <option value="유형2">유형2</option>
                                        </select>
                                    </li>                                    
                                    <li>
                                        <input type="text" id="S-Tit" name="S-Tit" class="iptTit" placeholder="제목을 작성해주세요." maxlength="30">
                                    </li>
                                </ul>
                                <textarea placeholder="질문을 입력해주세요"></textarea>
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
                    --}}

                    <div id="review" class="tabContent bookmarkGrid" style="display: none;">
                        <div class="w-data tx-left">
                            <div class="w-tit NGR">2018 기미진 기특한 국어 이론요약 + 기출문제(1월-3월)</div>
                            
                            <div class="faqBox">
                                <ul>
                                    <li>
                                        <select id="" name="" title="" style="width:100%">
                                            <option selected="selected">평점 선택</option>
                                            <option value="">★★★★★ 5/5</option>
                                            <option value="">★★★★☆ 4/5</option>
                                            <option value="">★★★☆☆ 3/5</option>
                                            <option value="">★★☆☆☆ 4/5</option>
                                            <option value="">★☆☆☆☆ 1/5</option>
                                        </select>
                                    </li>
                                    <li>
                                        <input type="text" id="S-Tit" name="S-Tit" class="iptTit" placeholder="제목을 작성해주세요." maxlength="30"  style="width:100%">
                                    </li>
                                </ul>
                                <textarea placeholder="내용을 입력해주세요"></textarea>                                
                            </div>                                                     
                        </div>  
                        <div class="buttonBtn cartBtn mb10">
                            <ul>
                                <li>
                                    <button type="submit" onclick="" class="btnGray"><span>후기목록</span></button>
                                </li>
                                <li>
                                    <button type="submit" onclick="" class="btnBlue"><span>저장</span></button>
                                </li>                                    
                            </ul>
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