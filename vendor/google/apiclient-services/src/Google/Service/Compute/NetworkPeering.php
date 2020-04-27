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

class Google_Service_Compute_NetworkPeering extends Google_Model
{
  public $autoCreateRoutes;
  public $exchangeSubnetRoutes;
  public $exportCustomRoutes;
  public $importCustomRoutes;
  public $name;
  public $network;
  public $state;
  public $stateDetails;

  public function setAutoCreateRoutes($autoCreateRoutes)
  {
    $this->autoCreateRoutes = $autoCreateRoutes;
  }
  public function getAutoCreateRoutes()
  {
    return $this->autoCreateRoutes;
  }
  public function setExchangeSubnetRoutes($exchangeSubnetRoutes)
  {
    $this->exchangeSubnetRoutes = $exchangeSubnetRoutes;
  }
  public function getExchangeSubnetRoutes()
  {
    return $this->exchangeSubnetRoutes;
  }
  public function setExportCustomRoutes($exportCustomRoutes)
  {
    $this->exportCustomRoutes = $exportCustomRoutes;
  }
  public function getExportCustomRoutes()
  {
    return $this->exportCustomRoutes;
  }
  public function setImportCustomRoutes($importCustomRoutes)
  {
    $this->importCustomRoutes = $importCustomRoutes;
  }
  public function getImportCustomRoutes()
  {
    return $this->importCustomRoutes;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStateDetails($stateDetails)
  {
    $this->stateDetails = $stateDetails;
  }
  public function getStateDetails()
  {
    return $this->stateDetails;
  }
}
