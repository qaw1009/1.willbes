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

class Google_Service_CloudSearch_FacetResult extends Google_Collection
{
  protected $collection_key = 'buckets';
  protected $bucketsType = 'Google_Service_CloudSearch_FacetBucket';
  protected $bucketsDataType = 'array';
  public $objectType;
  public $operatorName;
  public $sourceName;

  /**
   * @param Google_Service_CloudSearch_FacetBucket
   */
  public function setBuckets($buckets)
  {
    $this->buckets = $buckets;
  }
  /**
   * @return Google_Service_CloudSearch_FacetBucket
   */
  public function getBuckets()
  {
    return $this->buckets;
  }
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  public function getObjectType()
  {
    return $this->objectType;
  }
  public function setOperatorName($operatorName)
  {
    $this->operatorName = $operatorName;
  }
  public function getOperatorName()
  {
    return $this->operatorName;
  }
  public function setSourceName($sourceName)
  {
    $this->sourceName = $sourceName;
  }
  public function getSourceName()
  {
    return $this->sourceName;
  }
}
