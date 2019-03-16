@extends('willbes.pc.company.company_master')

@section('content')
    <style type="text/css">
        <!--
        .event_btn {margin:auto; text-align:center; padding-top:30px;}
        .event_table {width:970px; margin:auto; border-left:1px solid #cdcdcd; border-top:2px solid #222c50;}
        .event_table th { padding:10px; font-weight:bold; color:#333; text-align:center; letter-spacing:-1px; background-color:#ececec; border-right:1px solid #cdcdcd; border-bottom:1px solid #cdcdcd;}
        .event_table .th_non { border-right:none; }
        .event_table td { padding:7px; text-align:center; border-bottom:1px solid #cdcdcd; border-right:1px solid #cdcdcd; letter-spacing:0px; color:#666;}
        .event_table .td_l{ padding:7px; text-align:left; border-bottom:1px solid #cdcdcd; border-right:1px solid #cdcdcd; letter-spacing:0px; color:#666;}
        .title {
            font-weight: bold;
        }
        body,td,th {
            font-family: 돋움;
            font-size: 11px;
            color: #666666;
        }
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
        -->
    </style>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height="200" align="center" background="https://static.willbes.net/public/images/company/sub_bg.jpg"><img src="https://static.willbes.net/public/images/company/sub_img_05.jpg" /></td>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height="52" background="https://static.willbes.net/public/images/company/sub_s_bg.gif"><table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="52" valign="bottom"><table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><a href="sub_05_01"><img src="https://static.willbes.net/public/images/company/sub_05_01_02.gif" alt="교육사업부문 영업전망" width="109" height="41" border="0" /></a></td>
                                </tr>
                            </table></td>
                    </tr>
                </table></td>
        </tr>
    </table>
    <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td height="50">&nbsp;</td>
        </tr>
        <tr>
            <td valign="top"><img src="https://static.willbes.net/public/images/company/sub_05_title_01.gif" alt="제휴안내" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><img src="https://static.willbes.net/public/images/company/sub_05_title_01_s.gif" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><img src="https://static.willbes.net/public/images/company/sub_05_img_01.jpg" border="0" usemap="#Map" /></td>
        </tr>
        <tr>
            <td height="30">&nbsp;</td>
        </tr>
        <tr>
            <td><img src="https://static.willbes.net/public/images/company/sub_05_title_03.gif" alt="사업분야별 안내" width="135" height="24" /></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="event_table">
                    <col width="" />
                    <col width="" />
                    <col width="" />
                    <col width="" />
                    <col width="" />
                    <tr>
                        <th width="15%">분야</th>
                        <th width="13%">브랜드</th>
                        <th width="15%">연락처</th>
                        <th width="7%">홈페이지</th>
                        <th width="15%">분야</th>
                        <th width="13%">브랜드</th>
                        <th width="15%">연락처</th>
                        <th width="7%">홈페이지</th>
                    </tr>
                    <tr>
                        <td rowspan="6"><xinput id="aa1" onclick="choiceSelectCheck(this, 2)" value="AG13002128" type="checkbox" name="aa" />
                            <span class="title">공무원</span></td>
                        <td>9급 공무원</td>
                        <td rowspan="6">동영상강의 1544-5006<br />
                            <br />
                            학원강의 1544-0330</td>
                        <td><a href="http://willbesgosi.net/001/index.html?topMenuType=O&topMenu=001&topMenuName=9급공무원&topMenuGnb=OM_001" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                        <td rowspan="8"><span class="title">전문자격증</span></td>
                        <td>감정평가사</td>
                        <td rowspan="2">동영상강의 1544-5006<br />
                            <br />
                            학원강의 1544-4774</td>
                        <td><a href="http://value.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0" /></a></td>
                    </tr>
                    <tr>
                        <td>7급 공무원</td>
                        <td><a href="http://willbesgosi.net/002/index.html?topMenuType=O&topMenu=002&topMenuName=7급공무원&topMenuGnb=OM_001" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home"  border="0"/></a></td>
                        <td>공인노무사</td>
                        <td><a href="http://nomu.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                    </tr>
                    <tr>
                        <td>법원/검찰/교정직</td>
                        <td><a href="http://willbesgosi.net/003/index.html?topMenuType=O&topMenu=003&topMenuName=법원/검찰/교정&topMenuGnb=OM_001" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                        <td>세무사</td>
                        <td>동영상강의 1544-5006<br />
                            <br />
                            학원강의 02-3487-3535</td>
                        <td><a href="http://gaba.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                    </tr>
                    <tr>
                        <td>세무/관세직</td>
                        <td><a href="http://willbesgosi.net/005/index.html?topMenuType=O&topMenu=005&topMenuName=세무/관세&topMenuGnb=OM_001" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                        <td>변리사</td>
                        <td>동영상강의 1544-5006<br />
                            <br />
                            학원강의 1544-3383</td>
                        <td><a href="http://patent.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                    </tr>
                    <tr>
                        <td>소방공무원</td>
                        <td><a href="http://willbesgosi.net/006/index.html?topMenuType=O&topMenu=006&topMenuName=소방공무원&topMenuGnb=OM_001" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                        <td rowspan="2">행정사</td>
                        <td rowspan="4">1544-5006</td>
                        <td rowspan="2"><a href="http://adm.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                    </tr>

                    <tr>
                        <td>군무원</td>
                        <td><a href="http://willbesgosi.net/007/index.html??topMenuType=O&topMenu=007&topMenuName=군무원&topMenuGnb=OM_001" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0" /></a></td>

                    </tr>

                    <tr>
                        <td rowspan="3"><span class="title">경찰</span></td>
                        <td>경찰채용</td>
                        <td rowspan="3">동영상강의 1544-5006<br />
                            <br />
                            학원강의 1544-4006</td>
                        <td><a href="http://cop.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                        <td rowspan="2">사회복지사</td>
                        <td rowspan="2"><a href="http://welfare.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home"border="0" /></a><a href="http://welfare.willbes.net/" target="_blank"></a></td>
                    </tr>
                    <tr>
                        <td>경찰간부</td>
                        <td><a href="http://spo.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home"border="0" /></a></td>
                    </tr>
                    <tr>
                        <td>경찰승진</td>
                        <td><a href="http://adv.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                        <td rowspan="5" class="title">취업</td>
                        <td>공기업(취업)</td>
                        <td rowspan="5">1544-5006</td>
                        <td><a href="http://www.willpass.co.kr/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home"border="0" /></a></td>
                    </tr>
                    <tr>
                        <td rowspan="2"><span class="title">임용</span></td>
                        <td>교사임용</td>
                        <td>02-885-0770</td>
                        <td><a href="http://ssam.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                        <td>외국어</td>
                        <td><a href="http://lang.willbes.net/?sub_category=26" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home"border="0" /></a></td>
                    </tr>
                    <tr>
                        <td>한국사능력시험</td>
                        <td>1544-5006</td>
                        <td><a href="http://able.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home"border="0" /></a></td>
                        <td>한국어능력시험</td>
                        <td><a href="http://kla.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home"border="0" /></a></td>
                    </tr>
                    <tr>
                        <td rowspan="7"><span class="title">고등고시</span></td>
                        <td>사법시험(법원행시)</td>
                        <td rowspan="7">동영상강의 1544-5006<br />
                            <br />
                            학원강의 1544-1881</td>
                        <td><a href="http://www.hanlimgosi.co.kr/law/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home"border="0" /></a></td>
                        <td>국가기술자격증</td>
                        <td><a href="http://cert.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home"border="0" /></a></td>
                    </tr>
                    <tr>
                        <td>PSAT(민간경력)</td>
                        <td><a href="http://www.hanlimgosi.co.kr/psat/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home"border="0" /></a></td>
                        <td>바늘이야기</td>
                        <td><a href="http://banul.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home"border="0" /></a></td>
                    </tr>
                    <tr>
                        <td>5급행정(입법고시)</td>
                        <td><a href="http://www.hanlimgosi.co.kr/gosi/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                        <td rowspan="2"><span class="title">학점은행</span></td>
                        <td>원격학점은행</td>
                        <td rowspan="2">1544-5007</td>
                        <td><a href="http://www.willbeslife.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                    </tr>
                    <tr>
                        <td>국립외교원</td>
                        <td><a href="http://www.hanlimgosi.co.kr/knda/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                        <td>&nbsp;</td>
                        <td><!--a href="http://attbank.hanlimgosi.co.kr/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a-->&nbsp;</td>
                    </tr>
                    <tr>
                        <td>변호사시험</td>
                        <td><a href="http://bar.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                        <td rowspan="2"><span class="title">학원</span></td>
                        <td>신광은경찰학원</td>
                        <td>1544-6219</td>
                        <td><a href="http://www.willbescop.net" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                    </tr>
                    <tr>
                        <td>사법연수원</td>
                        <td><a href="http://jrti.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home"border="0" /></a></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><!--a href="http://www.willbesedu.co.kr/main_jongro.asp?bunwon=jongro" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a-->&nbsp;</td>
                    </tr>
                    <tr>
                        <td>검찰승진</td>
                        <td><a href="http://ks.willbes.net/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                        <td><span class="title">국비교육</span></td>
                        <td>실업자/근로자</td>
                        <td>1544-1666</td>
                        <td><a href="http://www.willbes.or.kr/" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                    </tr>
                    <tr>
                        <td rowspan="2"><span class="title">학원</span></td>
                        <td>윌비스고시학원</td>
                        <td>1544-0330</td>
                        <td><a href="http://willbesgosi.net/pass/main.html" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>부평윌비스학원</td>
                        <td>1544-1661</td>
                        <td><a href="http://www.willbesedu.co.kr/main.asp?bunwon=bupung" target="_blank"><img src="https://static.willbes.net/public/images/company/home_01.gif" width="13" height="13" alt="home" border="0"/></a></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table></td>
        </tr>
        <tr>
            <td height="50">&nbsp;</td>
        </tr>
    </table>
@stop