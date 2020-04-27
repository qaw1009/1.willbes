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

class Google_Service_Docs_UpdateTableCellStyleRequest extends Google_Model
{
  public $fields;
  protected $tableCellStyleType = 'Google_Service_Docs_TableCellStyle';
  protected $tableCellStyleDataType = '';
  protected $tableRangeType = 'Google_Service_Docs_TableRange';
  protected $tableRangeDataType = '';
  protected $tableStartLocationType = 'Google_Service_Docs_Location';
  protected $tableStartLocationDataType = '';

  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  public function getFields()
  {
    return $this->fields;
  }
  /**
   * @param Google_Service_Docs_TableCellStyle
   */
  public function setTableCellStyle(Google_Service_Docs_TableCellStyle $tableCellStyle)
  {
    $this->tableCellStyle = $tableCellStyle;
  }
  /**
   * @return Google_Service_Docs_TableCellStyle
   */
  public function getTableCellStyle()
  {
    return $this->tableCellStyle;
  }
  /**
   * @param Google_Service_Docs_TableRange
   */
  public function setTableRange(Google_Service_Docs_TableRange $tableRange)
  {
    $this->tableRange = $tableRange;
  }
  /**
   * @return Google_Service_Docs_TableRange
   */
  public function getTableRange()
  {
    return $this->tableRange;
  }
  /**
   * @param Google_Service_Docs_Location
   */
  public function setTableStartLocation(Google_Service_Docs_Location $tableStartLocation)
  {
    $this->tableStartLocation = $tableStartLocation;
  }
  /**
   * @return Google_Service_Docs_Location
   */
  public function getTableStartLocation()
  {
    return $this->tableStartLocation;
  }
}
