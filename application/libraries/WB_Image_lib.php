<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WB_Image_lib extends CI_Image_lib
{
    public function __construct(array $props = array())
    {
        parent::__construct($props);
    }

    /**
     * 단일 썸네일 이미지 생성
     * @param array $user_config
     * @return bool|string
     */
    public function createThumbImg($user_config = [])
    {
        // 썸네일 설정
        $config = array_merge([
            'image_library' => 'gd2',
            'create_thumb' => true,
            'maintain_ratio' => true,
            'quality' => '100%',
        ], $user_config);

        $this->initialize($config);

        if ($this->resize() === false) {
            return '썸네일 이미지 생성에 실패했습니다.';
        }

        return true;
    }

    /**
     * 다중 썸네일 이미지 생성
     * @param string $src_img 원본 이미지 실제 경로
     * @param array $new_imgs 썸네일 이미지명
     * @param array $new_widths 썸네일 이미지 width (픽셀일 경우 숫자만, 비율일 경우 %를 붙여서 지정)
     * @param array $new_heights 썸네일 이미지 height (픽셀일 경우 숫자만, 비율일 경우 %를 붙여서 지정)
     * @return bool|string
     */
    public function createThumbImgs($src_img, $new_imgs = [], $new_widths = [], $new_heights = [])
    {
        try {
            $new_widths = (array) $new_widths;
            $new_heights = (array) $new_heights;
            $ori_img_sizes = getimagesize($src_img);
            $config['source_image'] = $src_img;
            $config['thumb_marker'] = '';

            foreach ((array) $new_imgs as $idx => $new_img) {
                $config['new_image'] = $new_img;

                if (isset($new_widths[$idx]) === true) {
                    $config['width'] = $this->getImgSizeByRatio($ori_img_sizes[0], $new_widths[$idx]);
                }

                if (isset($new_heights[$idx]) === true) {
                    $config['height'] = $this->getImgSizeByRatio($ori_img_sizes[1], $new_heights[$idx]);
                }

                // 썸네일 생성
                $is_created = $this->createThumbImg($config);
                if ($is_created === false) {
                    throw new \Exception($is_created);
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 생성할 썸네일 이미지 사이즈 리턴
     * @param int $ori_img_size 원본 이미지 width or height 사이즈
     * @param string $ratio 원본 이미지 사이즈 대비 생성할 썸네일 이미지 비율 (픽셀일 경우 전달된 인자 그대로 리턴) 
     * @return float
     */
    public function getImgSizeByRatio($ori_img_size, $ratio)
    {
        $unit_pos = strrpos($ratio, '%');
        if ($unit_pos !== false) {
            $re_ratio = intval(substr($ratio, 0, $unit_pos)) / 100;

            return round($ori_img_size * $re_ratio);
        }

        return $ratio;
    }

    /**
     * 생성할 썸네일 이미지명 리턴
     * @param string $ori_img_name 원본 이미지명 또는 경로
     * @param array $postfixs 생성할 썸네일 이미지 후첨자 배열
     * @param string $needle 변경되어야 하는 원본 이미지 후첨자
     * @return array
     */
    public function getThumbImgNames($ori_img_name, $postfixs = [], $needle = '_og')
    {
        $thumb_img_names = [];
        foreach ((array) $postfixs as $key => $postfix) {
            $thumb_img_names[] = str_replace($needle, $postfix, $ori_img_name);
        }

        return $thumb_img_names;
    }
}