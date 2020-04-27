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

class Google_Service_AndroidManagement_Application extends Google_Collection
{
  protected $collection_key = 'permissions';
  protected $appTracksType = 'Google_Service_AndroidManagement_AppTrackInfo';
  protected $appTracksDataType = 'array';
  protected $managedPropertiesType = 'Google_Service_AndroidManagement_ManagedProperty';
  protected $managedPropertiesDataType = 'array';
  public $name;
  protected $permissionsType = 'Google_Service_AndroidManagement_ApplicationPermission';
  protected $permissionsDataType = 'array';
  public $title;

  /**
   * @param Google_Service_AndroidManagement_AppTrackInfo
   */
  public function setAppTracks($appTracks)
  {
    $this->appTracks = $appTracks;
  }
  /**
   * @return Google_Service_AndroidManagement_AppTrackInfo
   */
  public function getAppTracks()
  {
    return $this->appTracks;
  }
  /**
   * @param Google_Service_AndroidManagement_ManagedProperty
   */
  public function setManagedProperties($managedProperties)
  {
    $this->managedProperties = $managedProperties;
  }
  /**
   * @return Google_Service_AndroidManagement_ManagedProperty
   */
  public function getManagedProperties()
  {
    return $this->managedProperties;
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
   * @param Google_Service_AndroidManagement_ApplicationPermission
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return Google_Service_AndroidManagement_ApplicationPermission
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
