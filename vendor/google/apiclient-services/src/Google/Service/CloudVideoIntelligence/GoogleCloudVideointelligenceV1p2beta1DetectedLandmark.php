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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p2beta1DetectedLandmark extends Google_Model
{
  public $confidence;
  public $name;
  protected $pointType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p2beta1NormalizedVertex';
  protected $pointDataType = '';

  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p2beta1NormalizedVertex
   */
  public function setPoint(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p2beta1NormalizedVertex $point)
  {
    $this->point = $point;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p2beta1NormalizedVertex
   */
  public function getPoint()
  {
    return $this->point;
  }
}
