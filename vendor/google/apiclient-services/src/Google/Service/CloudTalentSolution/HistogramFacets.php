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

class Google_Service_CloudTalentSolution_HistogramFacets extends Google_Collection
{
  protected $collection_key = 'simpleHistogramFacets';
  protected $compensationHistogramFacetsType = 'Google_Service_CloudTalentSolution_CompensationHistogramRequest';
  protected $compensationHistogramFacetsDataType = 'array';
  protected $customAttributeHistogramFacetsType = 'Google_Service_CloudTalentSolution_CustomAttributeHistogramRequest';
  protected $customAttributeHistogramFacetsDataType = 'array';
  public $simpleHistogramFacets;

  /**
   * @param Google_Service_CloudTalentSolution_CompensationHistogramRequest
   */
  public function setCompensationHistogramFacets($compensationHistogramFacets)
  {
    $this->compensationHistogramFacets = $compensationHistogramFacets;
  }
  /**
   * @return Google_Service_CloudTalentSolution_CompensationHistogramRequest
   */
  public function getCompensationHistogramFacets()
  {
    return $this->compensationHistogramFacets;
  }
  /**
   * @param Google_Service_CloudTalentSolution_CustomAttributeHistogramRequest
   */
  public function setCustomAttributeHistogramFacets($customAttributeHistogramFacets)
  {
    $this->customAttributeHistogramFacets = $customAttributeHistogramFacets;
  }
  /**
   * @return Google_Service_CloudTalentSolution_CustomAttributeHistogramRequest
   */
  public function getCustomAttributeHistogramFacets()
  {
    return $this->customAttributeHistogramFacets;
  }
  public function setSimpleHistogramFacets($simpleHistogramFacets)
  {
    $this->simpleHistogramFacets = $simpleHistogramFacets;
  }
  public function getSimpleHistogramFacets()
  {
    return $this->simpleHistogramFacets;
  }
}
