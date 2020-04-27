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

class Google_Service_Container_SetNodePoolAutoscalingRequest extends Google_Model
{
  protected $autoscalingType = 'Google_Service_Container_NodePoolAutoscaling';
  protected $autoscalingDataType = '';
  public $clusterId;
  public $name;
  public $nodePoolId;
  public $projectId;
  public $zone;

  /**
   * @param Google_Service_Container_NodePoolAutoscaling
   */
  public function setAutoscaling(Google_Service_Container_NodePoolAutoscaling $autoscaling)
  {
    $this->autoscaling = $autoscaling;
  }
  /**
   * @return Google_Service_Container_NodePoolAutoscaling
   */
  public function getAutoscaling()
  {
    return $this->autoscaling;
  }
  public function setClusterId($clusterId)
  {
    $this->clusterId = $clusterId;
  }
  public function getClusterId()
  {
    return $this->clusterId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNodePoolId($nodePoolId)
  {
    $this->nodePoolId = $nodePoolId;
  }
  public function getNodePoolId()
  {
    return $this->nodePoolId;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}
