@extends('willbes.pc.layouts.master_popup')

@section('content')
<!-- Popup -->
<div class="Popup ExamBox">
    <div class="popTitBox">
		<div class="pop-Tit NG"><img src="{{ img_url('/mypage/logo.gif') }}"> 전국 모의고사</div>
		<div class="pop-subTit">2018 제2회 전국모의고사 (12/03 사행) - 9급 [일행/세무] *선택과목 과학 제외</div>
	</div>
	<div class="popupContainer">
		<ul class="tabSty">
			<li><a href="{{ site_url('/home/html/statsTotalList') }}">전체 성적 분석</a></li>
			<li class="active"><a href="#none">과목별 문항분석</a></li>
			<li><a href="{{ site_url('/home/html/answerNote') }}">오답노트</a></li>
		</ul>
		<!-- //tab -->
        <div class="btnAgR mgT1 mgB1 mb-zero">
            <a class="btnlineGray"href="#none">출력</a>
        </div>
      
        <!-- 문항별 분석 -->
        <div class="htit2Wp">
            <h3 class="htit2 f_left NG"><span class="tx-deep-blue">국어</span> 문항별 분석</h3>
            <span class="f_right markerTx"><em>붉은</em>색은 틀린부분표시</span>
        </div>
        <table cellspacing="0" cellpadding="0" class="sheetTb mgB4">
            <colgroup>
                <col style="width: 90px;"/>
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
            </colgroup>
            <thead>
                <tr>
                    <th>구분</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>정답</td>
                    <td>4</td>
                    <td>4</td> 
                    <td>2</td>
                    <td>4</td>
                    <td>3</td>
                    <td>1</td>
                    <td>1</td>
                    <td>4</td>
                    <td>2</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>1</td>
                    <td>1</td>
                    <td>3</td>
                    <td>2</td>
                    <td>1</td>
                    <td>4</td>
                    <td>3</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>마킹</td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td>2</td>
                    <td><span class="mis">2</span></td>
                    <td>3</td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">0</span></td>
                    <td>4</td>
                    <td>2</td>
                    <td><span class="mis">2</span></td>
                    <td>2</td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td>2</td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                </tr>
                <tr>
                    <td>정답률</td>
                    <td>37</td>
                    <td>49</td>
                    <td>29</td>
                    <td>42</td>
                    <td>61</td>
                    <td>51</td>
                    <td>46</td>
                    <td>54</td>
                    <td>44</td>
                    <td>35</td>
                    <td>43</td>
                    <td>34</td>
                    <td>54</td>
                    <td>24</td>
                    <td>56</td>
                    <td>41</td>
                    <td>37</td>
                    <td>41</td>
                    <td>32</td>
                    <td>51</td>
                </tr>
                <tr>
                    <td>난이도</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                </tr>
            </tbody>
        </table>
      
        <div class="htit2Wp">
            <h3 class="htit2 f_left NG"><span class="tx-deep-blue">영어</span> 문항별 분석</h3>
            <span class="f_right markerTx"><em>붉은</em>색은 틀린부분표시</span>
        </div>
        <table cellspacing="0" cellpadding="0" class="sheetTb mgB4">
            <colgroup>
                <col style="width: 90px;"/>
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
            </colgroup>
            <thead>
                <tr>
                    <th>구분</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>정답</td>
                    <td>2</td>
                    <td>4</td>
                    <td>3</td>
                    <td>4</td>
                    <td>2</td>
                    <td>3</td>
                    <td>3</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>3</td>
                    <td>2</td>
                    <td>4</td>
                    <td>2</td>
                    <td>4</td>
                    <td>1</td>
                    <td>3</td>
                    <td>4</td>
                    <td>4</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>마킹</td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">3</span></td>
                    <td>3</td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">3</span></td>
                    <td>3</td>
                    <td>3</td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">3</span></td>
                    <td>3</td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">3</span></td>
                    <td>3</td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">3</span></td>
                </tr>
                <tr>
                    <td>정답률</td>
                    <td>26</td>
                    <td>29</td>
                    <td>36</td>
                    <td>40</td>
                    <td>43</td>
                    <td>52</td>  
                    <td>30</td>
                    <td>20</td>
                    <td>46</td>
                    <td>54</td>
                    <td>32</td>
                    <td>33</td>
                    <td>27</td>
                    <td>20</td>
                    <td>45</td>
                    <td>46</td>
                    <td>22</td>
                    <td>33</td>
                    <td>35</td>
                    <td>41</td>
                </tr>
                <tr>
                    <td>난이도</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                </tr>
            </tbody>
        </table>
      
        <div class="htit2Wp">
            <h3 class="htit2 f_left NG"><span class="tx-deep-blue">한국사</span> 문항별 분석</h3>
            <span class="f_right markerTx"><em>붉은</em>색은 틀린부분표시</span>
        </div>
        <table cellspacing="0" cellpadding="0" class="sheetTb mgB4">
            <colgroup>
                <col style="width: 90px;"/>
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
            </colgroup>
            <thead>
                <tr>
                    <th>구분</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>정답</td>
                    <td>1</td>
                    <td>4</td>
                    <td>4</td>
                    <td>2</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>3</td>
                    <td>2</td>
                    <td>2</td>
                    <td>3</td>
                    <td>2</td>
                    <td>4</td>
                    <td>4</td>
                    <td>2</td>
                    <td>1</td>
                    <td>2</td>
                    <td>1</td>
                    <td>1</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>마킹</td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">4</span></td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">1</span></td>
                </tr>
                <tr>
                    <td>정답률</td>
                    <td>59</td>
                    <td>61</td>
                    <td>53</td>
                    <td>55</td>
                    <td>54</td>
                    <td>52</td>
                    <td>50</td>
                    <td>42</td>
                    <td>40</td>
                    <td>5</td>
                    <td>49</td>
                    <td>21</td>
                    <td>32</td>
                    <td>41</td>
                    <td>49</td>
                    <td>54</td>
                    <td>34</td>
                    <td>29</td>
                    <td>57</td>
                    <td>43</td>
                </tr>
                <tr>
                    <td>난이도</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                </tr>
            </tbody>
        </table>
      
        <div class="htit2Wp">
            <h3 class="htit2 f_left NG"><span class="tx-deep-blue">행정법</span> 문항별 분석</h3>
            <span class="f_right markerTx"><em>붉은</em>색은 틀린부분표시</span>
        </div>
        <table cellspacing="0" cellpadding="0" class="sheetTb mgB4">
            <colgroup>
                <col style="width: 90px;"/>
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
            </colgroup>
            <thead>
                <tr>
                    <th>구분</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>정답</td>
                    <td>4</td>
                    <td>3</td>
                    <td>4</td>
                    <td>3</td>
                    <td>2</td>
                    <td>1</td>
                    <td>4</td>
                    <td>2</td>
                    <td>2</td>
                    <td>4</td>
                    <td>4</td>
                    <td>4</td>
                    <td>3</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>4</td>
                    <td>3</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>마킹</td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td>4</td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">0</span></td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">1</span></td>
                    <td>2</td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">3</span></td>
                    <td><span class="mis">4</span></td>
                    <td><span class="mis">4</span></td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">1</span></td>
                <tr>
                    <td>정답률</td>
                    <td>27</td>
                    <td>20</td>
                    <td>31</td>
                    <td>22</td>
                    <td>31</td>
                    <td>38</td>
                    <td>27</td>
                    <td>40</td>
                    <td>20</td>
                    <td>42</td>
                    <td>31</td>
                    <td>25</td>
                    <td>18</td>
                    <td>44</td>
                    <td>22</td>
                    <td>20</td>
                    <td>27</td>
                    <td>49</td>
                    <td>22</td>
                    <td>15</td>
                </tr>
                <tr>
					<td>난이도</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                </tr>
            </tbody>
        </table>
      
        <div class="htit2Wp">
            <h3 class="htit2 f_left NG"><span class="tx-deep-blue">행정학</span> 문항별 분석</h3>
            <span class="f_right markerTx"><em>붉은</em>색은 틀린부분표시</span>
        </div>
        <table cellspacing="0" cellpadding="0" class="sheetTb mgB4">
            <colgroup>
                <col style="width: 90px;"/>
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
                <col width="*">
            </colgroup>
            <thead>
                <tr>
                    <th>구분</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>정답</td>
                    <td>1</td>
                    <td>2</td>
                    <td>1</td>
                    <td>4</td>            
                    <td>2</td>
                    <td>3</td>
                    <td>3</td>
                    <td>2</td>
                    <td>1</td>
                    <td>4</td>
                    <td>3</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>4</td>
                    <td>1</td>
                    <td>4</td>
                    <td>2</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>마킹</td>
                    <td>1</td>
                    <td><span class="mis">1</span></td>
                    <td>1</td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">1</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td>2</td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td><span class="mis">2</span></td>
                    <td>2</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>정답률</td>
                    <td>31</td>
                    <td>29</td>
                    <td>35</td>
                    <td>32</td>
                    <td>37</td>
                    <td>15</td>
                    <td>32</td>
                    <td>40</td>
                    <td>26</td>
                    <td>40</td>
                    <td>26</td>
                    <td>21</td>
                    <td>34</td>
                    <td>39</td>
                    <td>24</td>
                    <td>26</td>
                    <td>29</td>
                    <td>34</td>
                    <td>31</td>
                    <td>24</td>
                </tr>
                <tr>
                    <td>난이도</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                    <td>상</td>
                </tr>
            </tbody>
        </table>
        <!-- End 문항별 분석 -->

        <!-- 학습요소 -->
        <div class="htit2Wp mt60">
            <h3 class="htit2 NG"><span class="tx-deep-blue">국어</span> 영역 및 학습요소</h3>
        </div>
        <table cellspacing="0" cellpadding="0" class="sheetTb2 mgB4">
            <colgroup>
                <col style="width: 120px;"/>
                <col style="width: 65px;"/>
                <col style="width: 95px;"/>
                <col width="*">
                <col width="*">
            </colgroup>
            <thead>
                <tr>
                    <th class="sh1">구분</th>
                    <th class="sh2">개수</th>
                    <th class="sh3">평균</th>
                    <th class="sh4">관련문항</th>
                    <th class="sh5">오답문항</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>국어문법</td>
                    <td>6 / 20</td>
                    <td>9.62</td>
                    <td>(1) , (2) , (3) , (4) , (5) , (6) , (7) , (8) , (9) , (10) , (11) , (12) , (13) , (14) , (15) , (16) , (17) , (18) , (19) , (20)</td>
                    <td class="aMis">(1) , (2) , (4) , (6) , (7) , (10) , (12) , (13) , (14) , (15) , (17) , (18) , (19) , (20)</td>
                </tr>
            </tbody>
        </table>

        <div class="htit2Wp">
            <h3 class="htit2 NG"><span class="tx-deep-blue">영어</span> 영역 및 학습요소</h3>
        </div>
        <table cellspacing="0" cellpadding="0" class="sheetTb2 mgB4">
            <colgroup>
                <col style="width: 120px;"/>
                <col style="width: 65px;"/>
                <col style="width: 95px;"/>
                <col width="*">
                <col width="*">
            </colgroup>
            <thead>
                <tr>
                    <th class="sh1">구분</th>
                    <th class="sh2">개수</th>
                    <th class="sh3">평균</th>
                    <th class="sh4">관련문항</th>
                    <th class="sh5">오답문항</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>어휘</td>
                    <td>5 / 20</td>
                    <td>7.92</td>
                    <td>(1) , (2) , (3) , (4) , (5) , (6) , (7) , (8) , (9) , (10) , (11) , (12) , (13) , (14) , (15) , (16) , (17) , (18) , (19) , (20)</td>
                    <td class="aMis">(1) , (2) , (4) , (5) , (8) , (9) , (10) , (12) , (13) , (14) , (15) , (16) , (18) , (19) , (20)</td>
                </tr>
            </tbody>
        </table>

        <div class="htit2Wp"> 
            <h3 class="htit2 NG"><span class="tx-deep-blue">한국사</span> 영역 및 학습요소</h3>
        </div>
        <table cellspacing="0" cellpadding="0" class="sheetTb2 mgB4">
            <colgroup>
                <col style="width: 120px;"/>
                <col style="width: 65px;"/>
                <col style="width: 95px;"/>
                <col width="*">
                <col width="*">
            </colgroup>
            <thead>
                <tr>
                    <th class="sh1">구분</th>
                    <th class="sh2">개수</th>
                    <th class="sh3">평균</th>
                    <th class="sh4">관련문항</th>
                    <th class="sh5">오답문항</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>선사시대</td>
                    <td>0 / 20</td>
                    <td>9.86</td>
                    <td>(1) , (2) , (3) , (4) , (5) , (6) , (7) , (8) , (9) , (10) , (11) , (12) , (13) , (14) , (15) , (16) , (17) , (18) , (19) , (20)</td>
                    <td class="aMis">(1) , (2) , (3) , (4) , (5) , (6) , (7) , (8) , (9) , (10) , (11) , (12) , (13) , (14) , (15) , (16) , (17) , (18) , (19) , (20)</td>
                </tr>
            </tbody>
        </table>

        <div class="htit2Wp">
            <h3 class="htit2 NG"><span class="tx-deep-blue">행정법</span> 영역 및 학습요소</h3>
        </div>
        <table cellspacing="0" cellpadding="0" class="sheetTb2 mgB4">
            <colgroup>
                <col style="width: 120px;"/>
                <col style="width: 65px;"/>
                <col style="width: 95px;"/>
                <col width="*">
                <col width="*">
            </colgroup>
            <thead>
                <tr>
                    <th class="sh1">구분</th>
                    <th class="sh2">개수</th>
                    <th class="sh3">평균</th>
                    <th class="sh4">관련문항</th>
                    <th class="sh5">오답문항</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>행정법통론</td>
                    <td>2 / 20</td>
                    <td>6.28</td>
                    <td>(1) , (2) , (3) , (4) , (5) , (6) , (7) , (8) , (9) , (10) , (11) , (12) , (13) , (14) , (15) , (16) , (17) , (18) , (19) , (20)</td>
                    <td class="aMis">(1) , (2) , (4) , (5) , (6) , (7) , (9) , (10) , (11) , (12) , (13) , (14) , (15) , (16) , (17) , (18) , (19) , (20)</td>
                </tr>
            </tbody>
        </table>

        <div class="htit2Wp">
            <h3 class="htit2 NG"><span class="tx-deep-blue">행정학</span> 영역 및 학습요소</h3>
        </div>
        <table cellspacing="0" cellpadding="0" class="sheetTb2 mgB4">
            <colgroup>
                <col style="width: 120px;"/>
                <col style="width: 65px;"/>
                <col style="width: 95px;"/>
                <col width="*">
                <col width="*">
            </colgroup>
            <thead>
                <tr>
                    <th class="sh1">구분</th>
                    <th class="sh2">개수</th>
                    <th class="sh3">평균</th>
                    <th class="sh4">관련문항</th>
                    <th class="sh5">오답문항</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>행정학의 기초이론</td>
                    <td>5 / 20</td>
                    <td>7.21</td>
                    <td>(1) , (2) , (3) , (4) , (5) , (6) , (7) , (8) , (9) , (10) , (11) , (12) , (13) , (14) , (15) , (16) , (17) , (18) , (19) , (20)</td>
                    <td class="aMis">(2) , (4) , (5) , (6) , (7) , (8) , (9) , (10) , (11) , (12) , (14) , (15) , (16) , (17) , (18)</td>
                </tr>
            </tbody>
        </table>
        <!-- End 학습요소 -->
    
	</div>
	<!-- //popupContainer -->
</div>
<!-- End Popup -->
@stop