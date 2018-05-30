<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('array_data_fill')) {
    /**
     * $array 배열에 $data 배열의 키와 값을 추가
     * @param $array
     * @param $data
     * @param $is_self_ref [$data 배열의 값이 다시 배열일 경우 해당 배열 키에 해당하는 $array 값으로 배열 값을 추출할 경우 true]
     * @return array
     */
    function array_data_fill($array, $data, $is_self_ref = false)
    {
        $results = array_map(function ($arr) use ($data, $is_self_ref) {
            foreach ($data as $key => $val) {
                if ($is_self_ref === true) {
                    $_key = (string) key($val);
                    if (is_array($val[$_key]) === true) {
                        $arr[$key] = element($arr[$_key], $val[$_key], '');
                    }
                } else {
                    $arr[$key] = value($val);
                }
            }
            return $arr;
        }, $array);

        return $results;
    }
}

if (!function_exists('array_get')) {
    /**
     * dot(.) 표기법으로 중첩된 배열에서 $key에 해당하는 값 리턴
     * @param $array
     * @param $key
     * @param $default
     * @return mixed
     */
    function array_get($array, $key, $default = null)
    {
        if (is_null($key)) return $array;

        if (isset($array[$key])) return $array[$key];

        foreach (explode('.', $key) as $segment) {
            if (!is_array($array) || !array_key_exists($segment, $array)) {
                return value($default);
            }

            $array = $array[$segment];
        }

        return $array;
    }
}

if (!function_exists('array_has')) {
    /**
     * dot(.) 표기법으로 중첩된 배열에서 $key가 존재하는지 여부 리턴
     * @param $array
     * @param $key
     * @return bool
     */
    function array_has($array, $key)
    {
        if (empty($array) || is_null($key)) return false;

        if (array_key_exists($key, $array)) return true;

        foreach (explode('.', $key) as $segment) {
            if (!is_array($array) || !array_key_exists($segment, $array)) {
                return false;
            }

            $array = $array[$segment];
        }

        return true;
    }
}

if (!function_exists('array_pluck')) {
    /**
     * $array 배열에서 $value 키에 해당하는 값 추출, $key가 있을 경우 배열 키를 $key에 해당하는 값으로 지정
     * @param $array
     * @param $value
     * @param $key
     * @return array
     */
    function array_pluck($array, $value, $key = null)
    {
        return array_column($array, $value, $key);
    }
}

if (!function_exists('array_data_pluck')) {
    /**
     * $array 배열에서 $value 키에 해당하는 값 추출, $key가 있을 경우 배열 키를 $key에 해당하는 값으로 지정 ($value, $key를 dot(.) 표기법으로 사용)
     * @param $array
     * @param $value
     * @param $key
     * @return array
     */
    function array_data_pluck($array, $value, $key = null)
    {
        $results = array();

        foreach ($array as $item) {
            $itemValue = array_get($item, $value);

            if (is_null($key)) {
                $results[] = $itemValue;
            } else {
                $itemKey = array_get($item, $key);

                $results[$itemKey] = $itemValue;
            }
        }

        return $results;
    }
}

if (!function_exists('array_set')) {
    /**
     * dot(.) 표기법으로 중첩된 배열에서 값을 설정
     * @param $array
     * @param $key
     * @param $value
     * @return mixed
     */
    function array_set(&$array, $key, $value)
    {
        if (is_null($key)) return $array = $value;

        $keys = explode('.', $key);

        while (count($keys) > 1) {
            $key = array_shift($keys);

            if (!isset($array[$key]) || !is_array($array[$key])) {
                $array[$key] = array();
            }

            $array =& $array[$key];
        }

        $array[array_shift($keys)] = $value;

        return $array;
    }
}