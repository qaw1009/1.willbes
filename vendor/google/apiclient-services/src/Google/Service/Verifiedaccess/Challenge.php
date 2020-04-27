<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_Verifiedaccess_Challenge extends Google_Model
{
  protected $alternativeChallengeType = 'Google_Service_Verifiedaccess_SignedData';
  protected $alternativeChallengeDataType = '';
  protected $challengeType = 'Google_Service_Verifiedaccess_SignedData';
  protected $challengeDataType = '';

  /**
   * @param Google_Service_Verifiedaccess_SignedData
   */
  public function setAlternativeChallenge(Google_Service_Verifiedaccess_SignedData $alternativeChallenge)
  {
    $this->alternativeChallenge = $alternativeChallenge;
  }
  /**
   * @return Google_Service_Verifiedaccess_SignedData
   */
  public function getAlternativeChallenge()
  {
    return $this->alternativeChallenge;
  }
  /**
   * @param Google_Service_Verifiedaccess_SignedData
   */
  public function setChallenge(Google_Service_Verifiedaccess_SignedData $challenge)
  {
    $this->challenge = $challenge;
  }
  /**
   * @return Google_Service_Verifiedaccess_SignedData
   */
  public function getChallenge()
  {
    return $this->challenge;
  }
}
