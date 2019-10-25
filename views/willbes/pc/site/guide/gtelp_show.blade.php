@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Leclist c_both">
                <div class="w-cop-Guide">
                    <div class="willbes-cop-guide GM">
                        <ul class="tabWrap tabcsDepth2 tab_cop_Guide p_re NG">
                            <li class="w-cop-guide1"><a class="qBox on" href="#cop_guide1"><span>G-TELP란?</span></a></li>
                            <li class="w-cop-guide2"><a class="qBox" href="#cop_guide2"><span>출제분야 및 평가방식</span></a></li>
                            <li class="w-cop-guide3"><a class="qBox" href="#cop_guide3"><span>자격 활용현황</span></a></li>
                            <li class="w-cop-guide4"><a class="qBox" href="#cop_guide4"><span>타시험비교 점수대비표</span></a></li>
                        </ul>
                        <div class="tabBox mt20">
                            <div id="cop_guide1" class="tabContent">
                                <div class="slide_cons examInfoGu3">
                                    <div class="sliderGuide cSliderTM">
                                        <div class="sliderControlsTM">
                                            <div class="guide_slider">
                                                <img class="agM" src="https://static.willbes.net/public/images/promotion/main/tab1_1.jpg">
                                            </div>
                                            <div class="guide_slider">
                                                <img class="agM" src="https://static.willbes.net/public/images/promotion/main/tab1_2.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="cop_guide2" class="tabContent">
                                <div class="slide_cons examInfoGu3">
                                    <div class="sliderGuide cSliderTM">
                                        <div class="sliderControlsTM">
                                            <div class="guide_slider">
                                                <img class="agM" src="https://static.willbes.net/public/images/promotion/main/tab2_1.jpg">
                                            </div>
                                            <div class="guide_slider">
                                                <img class="agM" src="https://static.willbes.net/public/images/promotion/main/tab2_2.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="cop_guide3" class="tabContent">
                                <div class="slide_cons examInfoGu3">
                                    <div class="sliderGuide cSliderTM">
                                        <div class="sliderControlsTM">
                                            <div class="guide_slider">
                                                <img class="agM" src="https://static.willbes.net/public/images/promotion/main/tab3_1.jpg">
                                            </div>
                                            <div class="guide_slider">
                                                <img class="agM" src="https://static.willbes.net/public/images/promotion/main/tab3_2.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="cop_guide4" class="tabContent NG">
                                <div class="tableLangBox ">
                                    <p class="title_s">G-TELP와 타시험 점수 대비표</p>
                                    <table class="table1">
                                        <tbody><tr><th rowspan="2">G-TELP</th><th colspan="2">G-TELP Level 1 대비</th><th colspan="2" class="bg">G-TELP Level 2 대비</th><th colspan="2">G-TELP Level 3 대비</th></tr>
                                        <tr><th>TOEIC</th><th>TOEFL(IBT)</th><th class="bg">TOEIC</th><th class="bg">TOEFL(IBT)</th><th>TOEIC</th><th>TOEFL(IBT)</th></tr>
                                        <tr><td>99</td><td>없음</td><td rowspan="3">114-115</td><td class="bg">969</td><td class="bg">111-112</td><td>802</td><td>90-91</td></tr>
                                        <tr><td>98</td><td>없음</td><td class="bg">962</td><td class="bg">110</td><td>795</td><td rowspan="2">88-89</td></tr>
                                        <tr><td>97</td><td>없음</td><td class="bg">954</td><td rowspan="2" class="bg">109</td><td class="r_line">788</td></tr>
                                        <tr><td>96</td><td>없음</td><td rowspan="3">113</td><td class="bg">947</td><td>781</td><td>86-87</td></tr>
                                        <tr><td>95</td><td>없음</td><td class="bg">940</td><td rowspan="3" class="bg">106-108</td><td>774</td><td rowspan="2">84-85</td></tr>
                                        <tr><td>94</td><td>없음</td><td class="bg">932</td><td class="r_line">767</td></tr>
                                        <tr><td>93</td><td>없음</td><td rowspan="4">111-112</td><td class="bg">925</td><td>760</td><td rowspan="3">83</td></tr>
                                        <tr><td>92</td><td>없음</td><td class="bg">918</td><td rowspan="3" class="bg">105</td><td class="r_line">753</td></tr>
                                        <tr><td>91</td><td>989</td><td class="bg">910</td><td class="r_line">746</td></tr>
                                        <tr><td>90</td><td>984</td><td class="bg">903</td><td>739</td><td>81-82</td></tr>
                                        <tr><td>89</td><td>980</td><td rowspan="2">110</td><td class="bg">896</td><td class="bg">103-104</td><td>732</td><td>79-80</td></tr>
                                        <tr><td>88</td><td>976</td><td class="bg">889</td><td rowspan="2" class="bg">101-102</td><td>725</td><td rowspan="2">77-78</td></tr>
                                        <tr><td>87</td><td>972</td><td rowspan="4">109</td><td class="bg">881</td><td class="r_line">718</td></tr>
                                        <tr><td>86</td><td>967</td><td class="bg">874</td><td rowspan="2" class="bg">100</td><td>711</td><td rowspan="2">76</td></tr>
                                        <tr><td>85</td><td>963</td><td class="bg">867</td><td class="r_line">704</td></tr>
                                        <tr><td>84</td><td>959</td><td class="bg">859</td><td rowspan="2" class="bg">98-99</td><td>697</td><td rowspan="2">74-75</td></tr>
                                        <tr><td>83</td><td>954</td><td rowspan="5">106-108</td><td class="bg">852</td><td class="r_line">690</td></tr>
                                        <tr><td>82</td><td>950</td><td class="bg">845</td><td rowspan="2" class="bg">96-97</td><td>683</td><td>72-73</td></tr>
                                        <tr><td>81</td><td>946</td><td class="bg">837</td><td>676</td><td rowspan="3">71</td></tr>
                                        <tr><td>80</td><td>941</td><td class="bg">830</td><td rowspan="2" class="bg">94-95</td><td class="r_line">669</td></tr>
                                        <tr><td>79</td><td>937</td><td class="bg">823</td><td class="r_line">662</td></tr>
                                        <tr><td>78</td><td>933</td><td rowspan="4">105</td><td class="bg">815</td><td rowspan="2" class="bg">92-93</td><td>655</td><td>69-70</td></tr>
                                        <tr><td>77</td><td>928</td><td class="bg">808</td><td>648</td><td rowspan="2">68</td></tr>
                                        <tr><td>76</td><td>924</td><td class="bg">801</td><td class="bg">90-91</td><td class="r_line">641</td></tr>
                                        <tr><td>75</td><td>920</td><td class="bg">793</td><td rowspan="3" class="bg">88-89</td><td>634</td><td>66-67</td></tr>
                                        <tr><td>74</td><td>916</td><td rowspan="3">103-104</td><td class="bg">786</td><td>627</td><td rowspan="2">65</td></tr>
                                        <tr><td>73</td><td>911</td><td class="bg">779</td><td class="r_line">620</td></tr>
                                        <tr><td>72</td><td>907</td><td class="bg">771</td><td class="bg">86-87</td><td>613</td><td rowspan="2">64</td></tr>
                                        <tr><td>71</td><td>903</td><td rowspan="4">101-102</td><td class="bg">764</td><td class="bg">84-85</td><td class="r_line">606</td></tr>
                                        <tr><td>70</td><td>898</td><td class="bg">757</td><td rowspan="2" class="bg">83</td><td>599</td><td rowspan="2">62-63</td></tr>
                                        <tr><td>69</td><td>894</td><td class="bg">749</td><td class="r_line">592</td></tr>
                                        <tr><td>68</td><td>890</td><td class="bg">742</td><td class="bg">81-82</td><td>585</td><td>61</td></tr>
                                        <tr><td>67</td><td>885</td><td rowspan="4">100</td><td class="bg">735</td><td class="bg">79-80</td><td>578</td><td rowspan="2">59-60</td></tr>
                                        <tr><td>66</td><td>881</td><td class="bg">720</td><td class="bg">77-78</td><td class="r_line">571</td></tr>
                                        <tr><td>65</td><td>877</td><td class="bg">713</td><td rowspan="3" class="bg">76</td><td>564</td><td>58</td></tr>
                                        <tr><td>64</td><td>873</td><td class="bg">706</td><td>557</td><td rowspan="2">57</td></tr>
                                        <tr><td>63</td><td>868</td><td rowspan="3">98-99</td><td class="bg">698</td><td class="r_line">550</td></tr>
                                        <tr><td>62</td><td>864</td><td class="bg">691</td><td class="bg">74-75</td><td>543</td><td rowspan="2">56</td></tr>
                                        <tr><td>61</td><td>860</td><td class="bg">684</td><td rowspan="2" class="bg">72-73</td><td class="r_line">536</td></tr>
                                        <tr><td>60</td><td>855</td><td rowspan="4">96-97</td><td class="bg">676</td><td>529</td><td>54-55</td></tr>
                                        <tr><td>59</td><td>851</td><td class="bg">669</td><td rowspan="2" class="bg">71</td><td>522</td><td rowspan="2">53</td></tr>
                                        <tr><td>58</td><td>847</td><td class="bg">662</td><td class="r_line">515</td></tr>
                                        <tr><td>57</td><td>842</td><td class="bg">654</td><td class="bg">69-70</td><td>508</td><td rowspan="2">52</td></tr>
                                        <tr><td>56</td><td>838</td><td rowspan="3">94-95</td><td class="bg">647</td><td class="bg">68</td><td class="r_line">501</td></tr>
                                        <tr><td>55</td><td>834</td><td class="bg">640</td><td rowspan="2" class="bg">66-67</td><td>494</td><td rowspan="2">51</td></tr>
                                        <tr><td>54</td><td>830</td><td class="bg">632</td><td class="r_line">487</td></tr>
                                        <tr><td>53</td><td>825</td><td rowspan="4">92-93</td><td class="bg">625</td><td class="bg">65</td><td>480</td><td>49-50</td></tr>
                                        <tr><td>52</td><td>821</td><td class="bg">618</td><td rowspan="3" class="bg">64</td><td>473</td><td>48</td></tr>
                                        <tr><td>51</td><td>817</td><td class="bg">610</td><td>466</td><td rowspan="2">47</td></tr>
                                        <tr><td>50</td><td>812</td><td class="bg">603</td><td class="r_line">459</td></tr>
                                        </tbody>
                                    </table>
                                    <p class="title_s">성적활용 비교표</p>
                                    <table class="table1">
                                        <tbody>
                                        <tr><th>구분</th><th>TOEIC</th><th class="bg">G-TELP(LEVEL 2)</th></tr>
                                        <tr><td>5급 공채</td><td>700</td><td class="bg">65</td></tr>
                                        <tr><td>외교관 후보자</td><td>870</td><td class="bg">88</td></tr>
                                        <tr><td>7급 공채</td><td>700</td><td class="bg">65</td></tr>
                                        <tr><td>7급 외무영사직렬</td><td>790</td><td class="bg">77</td></tr>
                                        <tr><td>7급 지역인재</td><td>700</td><td class="bg">65</td></tr>
                                        <tr><td>국회사무처(입법고시)</td><td>700</td><td class="bg">65</td></tr>
                                        <tr><td>대법원(법원행정고시)</td><td>700</td><td class="bg">65</td></tr>
                                        <tr><td>국민안전처(소방 간부 후보생)</td><td>625</td><td class="bg">50</td></tr>
                                        <tr><td>경찰청(경찰 간부 후보생)</td><td>625</td><td class="bg">50</td></tr>
                                        <tr><td>경찰청(경찰공무원)</td><td>600</td><td class="bg">48점 : 가산점 2점<br>75점 : 가산점 4점<br>89점 : 가산점 5점</td></tr>
                                        <tr><td>국방부(군무원)</td><td>5급 700<br>7급 570<br>9급 470</td><td class="bg">5급 65<br>7급 47<br>9급 32</td></tr>
                                        <tr><td>카투사</td><td>780</td><td class="bg">73</td></tr>
                                        <tr><td>특허청(변리사)</td><td>775</td><td class="bg">77</td></tr>
                                        <tr><td>국세청(세무사)</td><td>700</td><td class="bg">65</td></tr>
                                        <tr><td>고용노동부(공인노무사)</td><td>700</td><td class="bg">65</td></tr>
                                        <tr><td>국토교통부(감정평가사)</td><td>700</td><td class="bg">65</td></tr>
                                        <tr><td>행정자치부(외국어 번역 행정사)</td><td>Writing 150점</td><td class="bg">Writing 3급</td></tr>

                                        <tr><td>한국산업인력공단(관광통역안내사)</td><td>760</td><td class="bg">74</td></tr>
                                        <tr><td>한국산업인력공단(호텔 경영사)</td><td>800</td><td class="bg">79</td></tr>
                                        <tr><td>한국산업인력공단(호텔관리자)</td><td>700</td><td class="bg">66</td></tr>
                                        <tr><td>한국산업인력공단(호텔서비스사)</td><td>490</td><td class="bg">39</td></tr>
                                        <tr><td>금융감독원(공인회계사)</td><td>700</td><td class="bg">65</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop