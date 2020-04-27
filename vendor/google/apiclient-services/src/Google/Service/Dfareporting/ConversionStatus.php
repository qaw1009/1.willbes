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

class Google_Service_Dfareporting_ConversionStatus extends Google_Collection
{
  protected $collection_key = 'errors';
  protected $conversionType = 'Google_Service_Dfareporting_Conversion';
  protected $conversionDataType = '';
  protected $errorsType = 'Google_Service_Dfareporting_ConversionError';
  protected $errorsDataType = 'array';
  public $kind;

  /**
   * @param Google_Service_Dfareporting_Conversion
   */
  public function setConversion(Google_Service_Dfareporting_Conversion $conversion)
  {
    $this->conversion = $conversion;
  }
  /**
   * @return Google_Service_Dfareporting_Conversion
   */
  public function getConversion()
  {
    return $this->conversion;
  }
  /**
   * @param Google_Service_Dfareporting_ConversionError
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Google_Service_Dfareporting_ConversionError
   */
  public function getErrors()
  {
    return $this->errors;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}
