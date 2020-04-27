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

class Google_Service_ToolResults_InconclusiveDetail extends Google_Model
{
  public $abortedByUser;
  public $hasErrorLogs;
  public $infrastructureFailure;

  public function setAbortedByUser($abortedByUser)
  {
    $this->abortedByUser = $abortedByUser;
  }
  public function getAbortedByUser()
  {
    return $this->abortedByUser;
  }
  public function setHasErrorLogs($hasErrorLogs)
  {
    $this->hasErrorLogs = $hasErrorLogs;
  }
  public function getHasErrorLogs()
  {
    return $this->hasErrorLogs;
  }
  public function setInfrastructureFailure($infrastructureFailure)
  {
    $this->infrastructureFailure = $infrastructureFailure;
  }
  public function getInfrastructureFailure()
  {
    return $this->infrastructureFailure;
  }
}
