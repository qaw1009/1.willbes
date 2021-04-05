@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        /************************************************************/
        .evt00 {background:#0a0a0a}

        .skybanner{position:fixed; top:225px;right:10px;z-index:10;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/1966_top_bg.jpg) no-repeat center top;}
        .evt02 {background:#61ab6e;}
        .evt03 {background:#fff;}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
            background-color: #fff;
        }
        .b-close {
            position: absolute;
            right: 0;
            top: 0;
            width:30px; height:30px; line-height:30px; text-align:center;
            display: inline-block;
            cursor: pointer;
            font-size:20px;
            color:#fff !important;
            background-color:#000 !important;
        }
        .Pstyle .content {height:auto; width:auto; padding:30px; line-height:1.5}
        .popuptable {width:800px; height:700px; padding-right:10px; overflow-y:scroll}
        .popuptable table {border:1px solid #61ab6e}
        .popuptable thead {background:#d5fbdb}
        .popuptable tr {border-bottom:1px solid #aee7b8}
        .popuptable th,
        .popuptable td {padding:10px 0; text-align:center; font-size:12px; border-right:1px solid #aee7b8}
        .popuptable th {font-weight:bold}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>     

        <div class="skybanner">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/1786" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1966_sky.png" alt="" >
            </a>             
        </div>   

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1966_top.jpg"  alt="정답은 G-TELP" usemap="#Map1966A" border="0" />
            <map name="Map1966A">
                <area shape="rect" coords="246,760,360,809" href="#evt01"  alt="지텔프는 무엇인가?">
                <area shape="rect" coords="508,762,611,806" href="#evt02" alt="왜준비해야하나?">
                <area shape="rect" coords="765,762,866,805" href="#evt03">
            </map>
        </div>

        <div class="evtCtnsBox evt01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1966_01.jpg"  alt=""/>
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1966_02.jpg"  alt="" usemap="#Map1966B" border="0"/>
            <map name="Map1966B">
                <area shape="rect" coords="642,483,890,535" href="javascript:go_popup1()" alt="점수대비표">
                <area shape="rect" coords="639,640,894,694" href="javascript:go_popup2()" alt="출제분야">
                <area shape="rect" coords="643,1049,888,1095" href="javascript:go_popup3()" alt="시험일정">
            </map>
        </div>

        <div class="evtCtnsBox evt03" id="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1966_03.jpg"  alt="단기간에 취득할수 있는 방법이 있나요?"/>           
        </div>

        <!--레이어팝업-->
        <div id="popup1" class="Pstyle">
            <span class="b-close NSK-Thin">X</span>
            <div class="content">
                <div class="popuptable">
                    <table cellspacing="0" cellpadding="0">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <thead>
                            <tr>
                                <th rowspan="2">G-TELP</th>
                                <th colspan="2">G-TELP Level 1 대비</th>
                                <th colspan="2">G-TELP Level 2 대비</th>
                                <th colspan="2">G-TELP Level 3 대비</th>
                            </tr>
                            <tr>
                                <th>TOEIC</th>
                                <th>TOEFL(IBT)</th>
                                <th>TOEIC</th>
                                <th>TOEFL(IBT)</th>
                                <th>TOEIC</th>
                                <th>TOEFL(IBT)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>99</td>
                                <td>없음</td>
                                <td rowspan="3">114-115</td>
                                <td>969</td>
                                <td>111-112</td>
                                <td>802</td>
                                <td>90-91</td>
                            </tr>
                            <tr>
                                <td>98</td>
                                <td>없음</td>
                                <td>962</td>
                                <td>110</td>
                                <td>795</td>
                                <td rowspan="2">88-89</td>
                            </tr>
                            <tr>
                                <td>97</td>
                                <td>없음</td>
                                <td>954</td>
                                <td rowspan="2">109</td>
                                <td>788</td>
                            </tr>
                            <tr>
                                <td>96</td>
                                <td>없음</td>
                                <td rowspan="3">113</td>
                                <td>947</td>
                                <td>781</td>
                                <td>86-87</td>
                            </tr>
                            <tr>
                                <td>95</td>
                                <td>없음</td>
                                <td>940</td>
                                <td rowspan="3">106-108</td>
                                <td>774</td>
                                <td rowspan="2">84-85</td>
                            </tr>
                            <tr>
                                <td>94</td>
                                <td>없음</td>
                                <td>932</td>
                                <td>767</td>
                            </tr>
                            <tr>
                                <td>93</td>
                                <td>없음</td>
                                <td rowspan="4">111-112</td>
                                <td>925</td>
                                <td>760</td>
                                <td rowspan="3">83</td>
                            </tr>
                            <tr>
                                <td>92</td>
                                <td>없음</td>
                                <td>918</td>
                                <td rowspan="3">105</td>
                                <td>753</td>
                            </tr>
                            <tr>
                                <td>91</td>
                                <td>989</td>
                                <td>910</td>
                                <td>746</td>
                            </tr>
                            <tr>
                                <td>90</td>
                                <td>984</td>
                                <td>903</td>
                                <td>739</td>
                                <td>81-82</td>
                            </tr>
                            <tr>
                                <td>89</td>
                                <td>980</td>
                                <td rowspan="2">110</td>
                                <td>896</td>
                                <td>103-104</td>
                                <td>732</td>
                                <td>79-80</td>
                            </tr>
                            <tr>
                                <td>88</td>
                                <td>976</td>
                                <td>889</td>
                                <td rowspan="2">101-102</td>
                                <td>725</td>
                                <td rowspan="2">77-78</td>
                            </tr>
                            <tr>
                                <td>87</td>
                                <td>972</td>
                                <td rowspan="4">109</td>
                                <td>881</td>
                                <td>718</td>
                            </tr>
                            <tr>
                                <td>86</td>
                                <td>967</td>
                                <td>874</td>
                                <td rowspan="2">100</td>
                                <td>711</td>
                                <td rowspan="2">76</td>
                            </tr>
                            <tr>
                                <td>85</td>
                                <td>963</td>
                                <td>867</td>
                                <td>704</td>
                            </tr>
                            <tr>
                                <td>84</td>
                                <td>959</td>
                                <td>859</td>
                                <td rowspan="2">98-99</td>
                                <td>697</td>
                                <td rowspan="2">74-75</td>
                            </tr>
                            <tr>
                                <td>83</td>
                                <td>954</td>
                                <td rowspan="5">106-108</td>
                                <td>852</td>
                                <td>690</td>
                            </tr>
                            <tr>
                                <td>82</td>
                                <td>950</td>
                                <td>845</td>
                                <td rowspan="2">96-97</td>
                                <td>683</td>
                                <td>72-73</td>
                            </tr>
                            <tr>
                                <td>81</td>
                                <td>946</td>
                                <td>837</td>
                                <td>676</td>
                                <td rowspan="3">71</td>
                            </tr>
                            <tr>
                                <td>80</td>
                                <td>941</td>
                                <td>830</td>
                                <td rowspan="2">94-95</td>
                                <td>669</td>
                            </tr>
                            <tr>
                                <td>79</td>
                                <td>937</td>
                                <td>823</td>
                                <td>662</td>
                            </tr>
                            <tr>
                                <td>78</td>
                                <td>933</td>
                                <td rowspan="4">105</td>
                                <td>815</td>
                                <td rowspan="2">92-93</td>
                                <td>655</td>
                                <td>69-70</td>
                            </tr>
                            <tr>
                                <td>77</td>
                                <td>928</td>
                                <td>808</td>
                                <td>648</td>
                                <td rowspan="2">68</td>
                            </tr>
                            <tr>
                                <td>76</td>
                                <td>924</td>
                                <td>801</td>
                                <td>90-91</td>
                                <td>641</td>
                            </tr>
                            <tr>
                                <td>75</td>
                                <td>920</td>
                                <td>793</td>
                                <td rowspan="3">88-89</td>
                                <td>634</td>
                                <td>66-67</td>
                            </tr>
                            <tr>
                                <td>74</td>
                                <td>916</td>
                                <td rowspan="3">103-104</td>
                                <td>786</td>
                                <td>627</td>
                                <td rowspan="2">65</td>
                            </tr>
                            <tr>
                                <td>73</td>
                                <td>911</td>
                                <td>779</td>
                                <td>620</td>
                            </tr>
                            <tr>
                                <td>72</td>
                                <td>907</td>
                                <td>771</td>
                                <td>86-87</td>
                                <td>613</td>
                                <td rowspan="2">64</td>
                            </tr>
                            <tr>
                                <td>71</td>
                                <td>903</td>
                                <td rowspan="4">101-102</td>
                                <td>764</td>
                                <td>84-85</td>
                                <td>606</td>
                            </tr>
                            <tr>
                                <td>70</td>
                                <td>898</td>
                                <td>757</td>
                                <td rowspan="2">83</td>
                                <td>599</td>
                                <td rowspan="2">62-63</td>
                            </tr>
                            <tr>
                                <td>69</td>
                                <td>894</td>
                                <td>749</td>
                                <td>592</td>
                            </tr>
                            <tr>
                                <td>68</td>
                                <td>890</td>
                                <td>742</td>
                                <td>81-82</td>
                                <td>585</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>67</td>
                                <td>885</td>
                                <td rowspan="4">100</td>
                                <td>735</td>
                                <td>79-80</td>
                                <td>578</td>
                                <td rowspan="2">59-60</td>
                            </tr>
                            <tr>
                                <td>66</td>
                                <td>881</td>
                                <td>720</td>
                                <td>77-78</td>
                                <td>571</td>
                            </tr>
                            <tr>
                                <td>65</td>
                                <td>877</td>
                                <td>713</td>
                                <td rowspan="3">76</td>
                                <td>564</td>
                                <td>58</td>
                            </tr>
                            <tr>
                                <td>64</td>
                                <td>873</td>
                                <td>706</td>
                                <td>557</td>
                                <td rowspan="2">57</td>
                            </tr>
                            <tr>
                                <td>63</td>
                                <td>868</td>
                                <td rowspan="3">98-99</td>
                                <td>698</td>
                                <td>550</td>
                            </tr>
                            <tr>
                                <td>62</td>
                                <td>864</td>
                                <td>691</td>
                                <td>74-75</td>
                                <td>543</td>
                                <td rowspan="2">56</td>
                            </tr>
                            <tr>
                                <td>61</td>
                                <td>860</td>
                                <td>684</td>
                                <td rowspan="2">72-73</td>
                                <td>536</td>
                            </tr>
                            <tr>
                                <td>60</td>
                                <td>855</td>
                                <td rowspan="4">96-97</td>
                                <td>676</td>
                                <td>529</td>
                                <td>54-55</td>
                            </tr>
                            <tr>
                                <td>59</td>
                                <td>851</td>
                                <td>669</td>
                                <td rowspan="2">71</td>
                                <td>522</td>
                                <td rowspan="2">53</td>
                            </tr>
                            <tr>
                                <td>58</td>
                                <td>847</td>
                                <td>662</td>
                                <td>515</td>
                            </tr>
                            <tr>
                                <td>57</td>
                                <td>842</td>
                                <td>654</td>
                                <td>69-70</td>
                                <td>508</td>
                                <td rowspan="2">52</td>
                            </tr>
                            <tr>
                                <td>56</td>
                                <td>838</td>
                                <td rowspan="3">94-95</td>
                                <td>647</td>
                                <td>68</td>
                                <td>501</td>
                            </tr>
                            <tr>
                                <td>55</td>
                                <td>834</td>
                                <td>640</td>
                                <td rowspan="2">66-67</td>
                                <td>494</td>
                                <td rowspan="2">51</td>
                            </tr>
                            <tr>
                                <td>54</td>
                                <td>830</td>
                                <td>632</td>
                                <td>487</td>
                            </tr>
                            <tr>
                                <td>53</td>
                                <td>825</td>
                                <td rowspan="4">92-93</td>
                                <td>625</td>
                                <td>65</td>
                                <td>480</td>
                                <td>49-50</td>
                            </tr>
                            <tr>
                                <td>52</td>
                                <td>821</td>
                                <td>618</td>
                                <td rowspan="3">64</td>
                                <td>473</td>
                                <td>48</td>
                            </tr>
                            <tr>
                                <td>51</td>
                                <td>817</td>
                                <td>610</td>
                                <td>466</td>
                                <td rowspan="2">47</td>
                            </tr>
                            <tr>
                                <td>50</td>
                                <td>812</td>
                                <td>603</td>
                                <td>459</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt10 tx-right">*출처 : G-TELP  홈페이지</div>
            </div>
        </div>

        <div id="popup2" class="Pstyle">
            <span class="b-close NSK-Thin">X</span>
            <div class="content">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1966_popup.jpg" />
            </div>
        </div>

        <div id="popup3" class="Pstyle">
            <span class="b-close NSK-Thin">X</span>
            <div class="content">
                <div class="tx18 mb10 strong NSK-Black">2021년 시험 일정</div>
                <div class="popuptable">
                    <table cellspacing="0" cellpadding="0">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <thead>
                            <tr>
                                <th>회차</th>
                                <th>시험일자</th>
                                <th>접수기간</th>
                                <th>추가접수<br>
                                (~자정까지)</th>
                                <th>수험번호공지일</th>
                                <th>성적공지일</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="2">제432회</td>
                                <td rowspan="2">2021-01-10(일) 15:00</td>
                                <td rowspan="2">2020-12-11 ~    2020-12-25</td>
                                <td rowspan="2">~ 2020-12-30</td>
                                <td>2021-01-04(월)</td>
                                <td rowspan="2">2021-01-15(금) 15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제433회</td>
                                <td rowspan="2">2021-01-24(일)    15:00</td>
                                <td rowspan="2">2021-01-01    ~ 2021-01-08</td>
                                <td rowspan="2">~    2021-01-13</td>
                                <td>2021-01-18(월)</td>
                                <td rowspan="2">2021-01-29(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제434회</td>
                                <td rowspan="2">2021-02-07(일)    15:00</td>
                                <td rowspan="2">2021-01-15    ~ 2021-01-22</td>
                                <td rowspan="2">~    2021-01-27</td>
                                <td>2021-02-01(월)</td>
                                <td rowspan="2">2021-02-10(수)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제435회</td>
                                <td rowspan="2">2021-02-21(일)    15:00</td>
                                <td rowspan="2">2021-01-29    ~ 2021-02-05</td>
                                <td rowspan="2">~    2021-02-10</td>
                                <td>2021-02-15(월)</td>
                                <td rowspan="2">2021-02-26(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td>제436회</td>
                                <td rowspan="2">2021-02-28(일)    15:00</td>
                                <td rowspan="2">2021-02-05    ~ 2021-02-12</td>
                                <td rowspan="2">~    2021-02-17</td>
                                <td>2021-02-22(월)</td>
                                <td rowspan="2">2021-03-05(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>(IBT)</td>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제437회</td>
                                <td rowspan="2">2021-03-07(일)    15:00</td>
                                <td rowspan="2">2021-02-12    ~ 2021-02-19</td>
                                <td rowspan="2">~    2021-02-24</td>
                                <td>2021-03-01(월)</td>
                                <td rowspan="2">2021-03-12(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제438회</td>
                                <td rowspan="2">2021-03-21(일)    15:00</td>
                                <td rowspan="2">2021-02-26    ~ 2021-03-05</td>
                                <td rowspan="2">~    2021-03-10</td>
                                <td>2021-03-15(월)</td>
                                <td rowspan="2">2021-03-26(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제439회</td>
                                <td rowspan="2">2021-04-04(일)    15:00</td>
                                <td rowspan="2">2021-03-12    ~ 2021-03-19</td>
                                <td rowspan="2">~    2021-03-24</td>
                                <td>2021-03-29(월)</td>
                                <td rowspan="2">2021-04-09(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제440회</td>
                                <td rowspan="2">2021-04-18(일)    15:00</td>
                                <td rowspan="2">2021-03-26    ~ 2021-04-02</td>
                                <td rowspan="2">~    2021-04-07</td>
                                <td>2021-04-12(월)</td>
                                <td rowspan="2">2021-04-23(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td>제441회</td>
                                <td rowspan="2">2021-04-25(일)    15:00</td>
                                <td rowspan="2">2021-04-02    ~ 2021-04-09</td>
                                <td rowspan="2">~    2021-04-14</td>
                                <td>2021-04-19(월)</td>
                                <td rowspan="2">2021-04-30(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>(IBT)</td>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제442회</td>
                                <td rowspan="2">2021-05-02(일)    15:00</td>
                                <td rowspan="2">2021-04-09    ~ 2021-04-16</td>
                                <td rowspan="2">~    2021-04-21</td>
                                <td>2021-04-26(월)</td>
                                <td rowspan="2">2021-05-07(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제443회</td>
                                <td rowspan="2">2021-05-16(일)    15:00</td>
                                <td rowspan="2">2021-04-23    ~ 2021-04-30</td>
                                <td rowspan="2">~    2021-05-05</td>
                                <td>2021-05-10(월)</td>
                                <td rowspan="2">2021-05-21(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제444회</td>
                                <td rowspan="2">2021-05-30(일)    15:00</td>
                                <td rowspan="2">2021-05-07    ~ 2021-05-14</td>
                                <td rowspan="2">~    2021-05-19</td>
                                <td>2021-05-24(월)</td>
                                <td rowspan="2">2021-06-04(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제445회</td>
                                <td rowspan="2">2021-06-13(일)    15:00</td>
                                <td rowspan="2">2021-05-21    ~ 2021-05-28</td>
                                <td rowspan="2">~    2021-06-02</td>
                                <td>2021-06-07(월)</td>
                                <td rowspan="2">2021-06-18(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제446회</td>
                                <td rowspan="2">2021-06-27(일)    15:00</td>
                                <td rowspan="2">2021-06-04    ~ 2021-06-11</td>
                                <td rowspan="2">~    2021-06-16</td>
                                <td>2021-06-21(월)</td>
                                <td rowspan="2">2021-07-02(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td>제447회</td>
                                <td rowspan="2">2021-07-04(일)    15:00</td>
                                <td rowspan="2">2021-06-11    ~ 2021-06-18</td>
                                <td rowspan="2">~    2021-06-23</td>
                                <td>2021-06-28(월)</td>
                                <td rowspan="2">2021-07-09(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>(IBT)</td>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제448회</td>
                                <td rowspan="2">2021-07-11(일)    15:00</td>
                                <td rowspan="2">2021-06-18    ~ 2021-06-25</td>
                                <td rowspan="2">~    2021-06-30</td>
                                <td>2021-07-05(월)</td>
                                <td rowspan="2">2021-07-16(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제449회</td>
                                <td rowspan="2">2021-07-25(일)    15:00</td>
                                <td rowspan="2">2021-07-02    ~ 2021-07-09</td>
                                <td rowspan="2">~    2021-07-14</td>
                                <td>2021-07-19(월)</td>
                                <td rowspan="2">2021-07-30(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제450회</td>
                                <td rowspan="2">2021-08-08(일)    15:00</td>
                                <td rowspan="2">2021-07-16    ~ 2021-07-23</td>
                                <td rowspan="2">~    2021-07-28</td>
                                <td>2021-08-02(월)</td>
                                <td rowspan="2">2021-08-13(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제451회</td>
                                <td rowspan="2">2021-08-22(일)    15:00</td>
                                <td rowspan="2">2021-07-30    ~ 2021-08-06</td>
                                <td rowspan="2">~    2021-08-11</td>
                                <td>2021-08-16(월)</td>
                                <td rowspan="2">2021-08-27(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td>제452회</td>
                                <td rowspan="2">2021-08-29(일)    15:00</td>
                                <td rowspan="2">2021-08-06    ~ 2021-08-13</td>
                                <td rowspan="2">~    2021-08-18</td>
                                <td>2021-08-23(월)</td>
                                <td rowspan="2">2021-09-03(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>(IBT)</td>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제453회</td>
                                <td rowspan="2">2021-09-05(일)    15:00</td>
                                <td rowspan="2">2021-08-13    ~ 2021-08-20</td>
                                <td rowspan="2">~    2021-08-25</td>
                                <td>2021-08-30(월)</td>
                                <td rowspan="2">2021-09-10(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제454회</td>
                                <td rowspan="2">2021-09-26(일)    15:00</td>
                                <td rowspan="2">2021-08-27    ~ 2021-09-10</td>
                                <td rowspan="2">~    2021-09-15</td>
                                <td>2021-09-20(월)</td>
                                <td rowspan="2">2021-10-01(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제455회</td>
                                <td rowspan="2">2021-10-10(일)    15:00</td>
                                <td rowspan="2">2021-09-17    ~ 2021-09-24</td>
                                <td rowspan="2">~    2021-09-29</td>
                                <td>2021-10-04(월)</td>
                                <td rowspan="2">2021-10-15(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제456회</td>
                                <td rowspan="2">2021-10-24(일)    15:00</td>
                                <td rowspan="2">2021-10-01    ~ 2021-10-08</td>
                                <td rowspan="2">~    2021-10-13</td>
                                <td>2021-10-18(월)</td>
                                <td rowspan="2">2021-10-29(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td>제457회</td>
                                <td rowspan="2">2021-10-31(일)    15:00</td>
                                <td rowspan="2">2021-10-08    ~ 2021-10-15</td>
                                <td rowspan="2">~    2021-10-20</td>
                                <td>2021-10-25(월)</td>
                                <td rowspan="2">2021-11-05(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>(IBT)</td>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제458회</td>
                                <td rowspan="2">2021-11-07(일)    15:00</td>
                                <td rowspan="2">2021-10-15    ~ 2021-10-22</td>
                                <td rowspan="2">~    2021-10-27</td>
                                <td>2021-11-01(월)</td>
                                <td rowspan="2">2021-11-12(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제459회</td>
                                <td rowspan="2">2021-11-21(일)    15:00</td>
                                <td rowspan="2">2021-10-29    ~ 2021-11-05</td>
                                <td rowspan="2">~    2021-11-10</td>
                                <td>2021-11-15(월)</td>
                                <td rowspan="2">2021-11-26(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제460회</td>
                                <td rowspan="2">2021-12-05(일)    15:00</td>
                                <td rowspan="2">2021-11-12    ~ 2021-11-19</td>
                                <td rowspan="2">~    2021-11-24</td>
                                <td>2021-11-29(월)</td>
                                <td rowspan="2">2021-12-10(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td rowspan="2">제461회</td>
                                <td rowspan="2">2021-12-19(일)    15:00</td>
                                <td rowspan="2">2021-11-26    ~ 2021-12-03</td>
                                <td rowspan="2">~    2021-12-08</td>
                                <td>2021-12-13(월)</td>
                                <td rowspan="2">2021-12-24(금)    15:00</td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                            </tr>
                            <tr>
                                <td>제462회</td>
                                <td rowspan="2">2021-12-26(일)    15:00</td>
                                <td rowspan="2">2021-12-03    ~ 2021-12-10</td>
                                <td rowspan="2">~    2021-12-15</td>
                                <td>2021-12-20(월)</td>
                                <td rowspan="2">2021-12-30(목)    15:00</td>
                            </tr>
                            <tr>
                                <td>(IBT)</td>
                                <td>15:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt10">
                    * 436, 441, 447, 452, 457, 462회 정기시험은 IBT(Internet Based Test)로 실시 예정이며, 조기 마감될 수 있습니다.<br>
                    * IBT로 실시되는 정기시험은 사정에 따라 PBT(Paper Based Test)로 실시되거나 취소 될 수 있습니다.<br>
                    * 모든 정기시험(IBT포함)의 일정, 실시 방법 등은 사정에 따라 변경,취소될 수 있습니다.<br>
                    * 출처 : G-TELP 홈페이지<br>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        /*레이어팝업*/

        function go_popup1() {
            $('#popup1').bPopup();
        }

        function go_popup2() {
            $('#popup2').bPopup();
        }

        function go_popup3() {
            $('#popup3').bPopup();
        }        
    </script>
@stop