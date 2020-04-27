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

class Google_Service_Speech_RecognitionConfig extends Google_Collection
{
  protected $collection_key = 'speechContexts';
  public $audioChannelCount;
  protected $diarizationConfigType = 'Google_Service_Speech_SpeakerDiarizationConfig';
  protected $diarizationConfigDataType = '';
  public $enableAutomaticPunctuation;
  public $enableSeparateRecognitionPerChannel;
  public $enableWordTimeOffsets;
  public $encoding;
  public $languageCode;
  public $maxAlternatives;
  protected $metadataType = 'Google_Service_Speech_RecognitionMetadata';
  protected $metadataDataType = '';
  public $model;
  public $profanityFilter;
  public $sampleRateHertz;
  protected $speechContextsType = 'Google_Service_Speech_SpeechContext';
  protected $speechContextsDataType = 'array';
  public $useEnhanced;

  public function setAudioChannelCount($audioChannelCount)
  {
    $this->audioChannelCount = $audioChannelCount;
  }
  public function getAudioChannelCount()
  {
    return $this->audioChannelCount;
  }
  /**
   * @param Google_Service_Speech_SpeakerDiarizationConfig
   */
  public function setDiarizationConfig(Google_Service_Speech_SpeakerDiarizationConfig $diarizationConfig)
  {
    $this->diarizationConfig = $diarizationConfig;
  }
  /**
   * @return Google_Service_Speech_SpeakerDiarizationConfig
   */
  public function getDiarizationConfig()
  {
    return $this->diarizationConfig;
  }
  public function setEnableAutomaticPunctuation($enableAutomaticPunctuation)
  {
    $this->enableAutomaticPunctuation = $enableAutomaticPunctuation;
  }
  public function getEnableAutomaticPunctuation()
  {
    return $this->enableAutomaticPunctuation;
  }
  public function setEnableSeparateRecognitionPerChannel($enableSeparateRecognitionPerChannel)
  {
    $this->enableSeparateRecognitionPerChannel = $enableSeparateRecognitionPerChannel;
  }
  public function getEnableSeparateRecognitionPerChannel()
  {
    return $this->enableSeparateRecognitionPerChannel;
  }
  public function setEnableWordTimeOffsets($enableWordTimeOffsets)
  {
    $this->enableWordTimeOffsets = $enableWordTimeOffsets;
  }
  public function getEnableWordTimeOffsets()
  {
    return $this->enableWordTimeOffsets;
  }
  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
  }
  public function getEncoding()
  {
    return $this->encoding;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setMaxAlternatives($maxAlternatives)
  {
    $this->maxAlternatives = $maxAlternatives;
  }
  public function getMaxAlternatives()
  {
    return $this->maxAlternatives;
  }
  /**
   * @param Google_Service_Speech_RecognitionMetadata
   */
  public function setMetadata(Google_Service_Speech_RecognitionMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_Speech_RecognitionMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setModel($model)
  {
    $this->model = $model;
  }
  public function getModel()
  {
    return $this->model;
  }
  public function setProfanityFilter($profanityFilter)
  {
    $this->profanityFilter = $profanityFilter;
  }
  public function getProfanityFilter()
  {
    return $this->profanityFilter;
  }
  public function setSampleRateHertz($sampleRateHertz)
  {
    $this->sampleRateHertz = $sampleRateHertz;
  }
  public function getSampleRateHertz()
  {
    return $this->sampleRateHertz;
  }
  /**
   * @param Google_Service_Speech_SpeechContext
   */
  public function setSpeechContexts($speechContexts)
  {
    $this->speechContexts = $speechContexts;
  }
  /**
   * @return Google_Service_Speech_SpeechContext
   */
  public function getSpeechContexts()
  {
    return $this->speechContexts;
  }
  public function setUseEnhanced($useEnhanced)
  {
    $this->useEnhanced = $useEnhanced;
  }
  public function getUseEnhanced()
  {
    return $this->useEnhanced;
  }
}
