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

class Google_Service_TagManager_RevertZoneResponse extends Google_Model
{
  protected $zoneType = 'Google_Service_TagManager_Zone';
  protected $zoneDataType = '';

  /**
   * @param Google_Service_TagManager_Zone
   */
  public function setZone(Google_Service_TagManager_Zone $zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return Google_Service_TagManager_Zone
   */
  public function getZone()
  {
    return $this->zone;
  }
}
