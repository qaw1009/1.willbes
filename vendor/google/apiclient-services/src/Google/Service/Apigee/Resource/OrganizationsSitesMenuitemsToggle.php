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

/**
 * The "toggle" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $toggle = $apigeeService->toggle;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesMenuitemsToggle extends Google_Service_Resource
{
  /**
   * Toggles the nesting of a menu item. (toggle.nested)
   *
   * @param string $parent Required. Name of the menu item. Use the following
   * structure in your request:
   * `organizations/{org}/sites/{site}/menuitems/{menuitem}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1NestedPayload $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function nested($parent, Google_Service_Apigee_GoogleCloudApigeeV1NestedPayload $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('nested', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
}
