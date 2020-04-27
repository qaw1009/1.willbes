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

class Google_Service_RemoteBuildExecution_BuildBazelSemverSemVer extends Google_Model
{
  public $major;
  public $minor;
  public $patch;
  public $prerelease;

  public function setMajor($major)
  {
    $this->major = $major;
  }
  public function getMajor()
  {
    return $this->major;
  }
  public function setMinor($minor)
  {
    $this->minor = $minor;
  }
  public function getMinor()
  {
    return $this->minor;
  }
  public function setPatch($patch)
  {
    $this->patch = $patch;
  }
  public function getPatch()
  {
    return $this->patch;
  }
  public function setPrerelease($prerelease)
  {
    $this->prerelease = $prerelease;
  }
  public function getPrerelease()
  {
    return $this->prerelease;
  }
}
