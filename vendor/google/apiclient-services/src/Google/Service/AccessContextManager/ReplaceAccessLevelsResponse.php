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

class Google_Service_AccessContextManager_ReplaceAccessLevelsResponse extends Google_Collection
{
  protected $collection_key = 'accessLevels';
  protected $accessLevelsType = 'Google_Service_AccessContextManager_AccessLevel';
  protected $accessLevelsDataType = 'array';

  /**
   * @param Google_Service_AccessContextManager_AccessLevel
   */
  public function setAccessLevels($accessLevels)
  {
    $this->accessLevels = $accessLevels;
  }
  /**
   * @return Google_Service_AccessContextManager_AccessLevel
   */
  public function getAccessLevels()
  {
    return $this->accessLevels;
  }
}
