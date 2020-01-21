<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('array_data_fill')) {
    /**
     * $array 배열에 $data 배열의 키와 값을 추가
     * @param array $array [대상 배열]
     * @param array $data [추가할 배열 원소의 키와 값으로 구성된 배열, ex) k => v, k1 => [k2 => [k3 => v1, k3-2 => v2 ...]]]
     * @param bool $is_self_ref [true => $data 배열의 k1 키의 값이 배열이고 $array 배열에서 k2 키의 값을 추출하여 그 값과 k3의 배열 키값이 같다면 그 값을 리턴, false => k1 키의 배열 값을 설정]
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

if (!function_exists('array_filter_keys')) {
    /**
     * $array 배열에서 키값 배열과 일치하는 것만 필터링하여 리턴
     * @param array $array [대상 배열]
     * @param array $keys [대상 배열에서 필터링하고자 하는 키값 배열]
     * @return array
     */
    function array_filter_keys($array, $keys)
    {
        return array_intersect_key($array, array_flip($keys));
    }
}

if (!function_exists('array_get')) {
    /**
     * dot(.) 표기법으로 중첩된 배열에서 $key에 해당하는 값 리턴
     * @param array $array [대상 배열]
     * @param string $key [dot(.) 표기법으로 설정된 대상 배열 키, ex) a1.a2.a3 = arr[a1][a2][a3]]
     * @param null|mixed $default [해당하는 배열 키가 없을 경우 기본 값]
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
     * @param array $array [대상 배열]
     * @param string $key [dot(.) 표기법으로 설정된 대상 배열 키, ex) a1.a2.a3 = arr[a1][a2][a3]]
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
     * @param array $array [대상 배열]
     * @param string $value [리턴되는 배열의 값이 되는 대상 배열의 키]
     * @param null|string $key [리턴되는 배열의 키가 되는 대상 배열의 키]
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
     * @param array $array [대상 배열]
     * @param string|array $value [리턴되는 배열의 값이 되는 대상 배열의 키, 인자가 배열일 경우 구분자(::)로 연결하여 설정]
     * @param null|string|array $key [리턴되는 배열의 키가 되는 대상 배열의 키, 인자가 배열일 경우 구분자(::)로 연결하여 설정]
     * @return array
     */
    function array_data_pluck($array, $value, $key = null)
    {
        $results = array();

        foreach ($array as $item) {
            if (is_array($value)) {
                $itemValue = '';
                foreach ($value as $v) {
                    $itemValue .= '::' . array_get($item, $v);
                }
                $itemValue = substr($itemValue, 2);
            } else {
                $itemValue = array_get($item, $value);
            }

            if (is_null($key)) {
                $results[] = $itemValue;
            } else {
                if (is_array($key)) {
                    $itemKey = '';
                    foreach ($key as $k) {
                        $itemKey .= '.' . array_get($item, $k);
                    }
                    $itemKey = substr($itemKey, 1);
                    array_set($results, $itemKey, $itemValue);
                } else {
                    $itemKey = array_get($item, $key);
                    $results[$itemKey] = $itemValue;
                }
            }
        }

        return $results;
    }
}

if (!function_exists('array_set')) {
    /**
     * dot(.) 표기법으로 중첩된 배열에서 값을 설정
     * @param array $array [대상 배열]
     * @param string $key [dot(.) 표기법으로 설정된 대상 배열 키, ex) a1.a2.a3 = arr[a1][a2][a3]]
     * @param mixed $value [설정할 배열 값]
     * @return array
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

if (!function_exists('array_key_first')) {
    /**
     * $array 배열의 1번째 키값 리턴
     * @param array $array [대상 배열]
     * @return int|string|null
     */
    function array_key_first(array $array) {
        foreach($array as $key => $unused) {
            return $key;
        }
        return null;
    }
}
