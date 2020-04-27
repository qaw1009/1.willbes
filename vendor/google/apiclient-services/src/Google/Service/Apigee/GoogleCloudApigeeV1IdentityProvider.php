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

class Google_Service_Apigee_GoogleCloudApigeeV1IdentityProvider extends Google_Model
{
  public $active;
  protected $configType = 'Google_Service_Apigee_GoogleCloudApigeeV1IdentityProviderConfig';
  protected $configDataType = '';
  public $created;
  public $id;
  public $modified;
  public $name;
  public $type;

  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1IdentityProviderConfig
   */
  public function setConfig(Google_Service_Apigee_GoogleCloudApigeeV1IdentityProviderConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1IdentityProviderConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setModified($modified)
  {
    $this->modified = $modified;
  }
  public function getModified()
  {
    return $this->modified;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
