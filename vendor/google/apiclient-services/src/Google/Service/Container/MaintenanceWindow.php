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

class Google_Service_Container_MaintenanceWindow extends Google_Model
{
  protected $dailyMaintenanceWindowType = 'Google_Service_Container_DailyMaintenanceWindow';
  protected $dailyMaintenanceWindowDataType = '';
  protected $maintenanceExclusionsType = 'Google_Service_Container_TimeWindow';
  protected $maintenanceExclusionsDataType = 'map';
  protected $recurringWindowType = 'Google_Service_Container_RecurringTimeWindow';
  protected $recurringWindowDataType = '';

  /**
   * @param Google_Service_Container_DailyMaintenanceWindow
   */
  public function setDailyMaintenanceWindow(Google_Service_Container_DailyMaintenanceWindow $dailyMaintenanceWindow)
  {
    $this->dailyMaintenanceWindow = $dailyMaintenanceWindow;
  }
  /**
   * @return Google_Service_Container_DailyMaintenanceWindow
   */
  public function getDailyMaintenanceWindow()
  {
    return $this->dailyMaintenanceWindow;
  }
  /**
   * @param Google_Service_Container_TimeWindow
   */
  public function setMaintenanceExclusions($maintenanceExclusions)
  {
    $this->maintenanceExclusions = $maintenanceExclusions;
  }
  /**
   * @return Google_Service_Container_TimeWindow
   */
  public function getMaintenanceExclusions()
  {
    return $this->maintenanceExclusions;
  }
  /**
   * @param Google_Service_Container_RecurringTimeWindow
   */
  public function setRecurringWindow(Google_Service_Container_RecurringTimeWindow $recurringWindow)
  {
    $this->recurringWindow = $recurringWindow;
  }
  /**
   * @return Google_Service_Container_RecurringTimeWindow
   */
  public function getRecurringWindow()
  {
    return $this->recurringWindow;
  }
}
