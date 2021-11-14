<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Files_summernote
{
    protected $CI;
    public function delete($path)
    {
        $this->CI->load->helper('directory');
        $images_dir = directory_map(".$path/image", FALSE, TRUE);
        $audios_dir = directory_map(".$path/audio", FALSE, TRUE);
        $return = true;

        // delete file
        if ($images_dir) {
            foreach ($images_dir as $file) {
                $result = $this->deleteFile(".$path/image/" . $file);
                if (!$result) {
                    $result = $return;
                }
            }
        }

        if ($audios_dir) {
            foreach ($audios_dir as $file) {
                $result =  $this->deleteFile(".$path/audio/" . $file);
                if (!$result) {
                    $result = $return;
                }
            }
        }

        // delete folder
        if (is_dir(".$path/image")) {
            $result = rmdir(".$path/image");
            if (!$result) {
                $result = $return;
            }
        }

        if (is_dir(".$path/audio")) {
            $result = rmdir(".$path/audio");
            if (!$result) {
                $result = $return;
            }
        }

        if (is_dir(".$path")) {
            $result = rmdir(".$path");
            if (!$result) {
                $result = $return;
            }
        }
        return $return;
    }

    private function deleteFile($path)
    {
        $return = true;
        if (file_exists($path)) {
            $result = unlink($path);
            if (!$result) {
                $result = $return;
            }
        }
        return $return;
    }

    public function simpanData($path, $images, $audios)
    {
        $this->CI->load->helper('directory');
        $images_dir = directory_map(".$path/image", FALSE, TRUE);
        $audios_dir = directory_map(".$path/audio", FALSE, TRUE);
        // delete file tidak terpakai
        if ($images_dir) {
            foreach ($images_dir as $file) {
                if (!in_array($file, $images)) {
                    $this->deleteFile(".$path/image/" . $file);
                }
            }
        }

        if ($audios_dir) {
            foreach ($audios_dir as $file) {
                if (!in_array($file, $audios)) {
                    $this->deleteFile(".$path/audio/" . $file);
                }
            }
        }

        // jika tidak ada file maka folder akan dihapus
        if ($images_dir == false || $images == false) {
            if (is_dir(".$path/image")) {
                rmdir(".$path/image");
            }
        }

        if ($audios_dir == false || $audios == false) {
            if (is_dir(".$path/audio")) {
                rmdir(".$path/audio");
            }
        }

        $simpan_image = '';
        foreach ($images as $image) {
            $simpan_image .= ($simpan_image == '') ? $image : ('|' . $image);
        }

        $simpan_audio = '';
        foreach ($audios as $audio) {
            $simpan_audio .= ($simpan_audio == '') ? $audio : ('|' . $audio);
        }

        return ['image' => $simpan_image, 'audio' => $simpan_audio];
    }

    public function upload($path, $tipe)
    {
        // cek directory
        if (!is_dir('.' . $path)) {
            mkdir('.' . $path, 0755, TRUE);
        }

        $config['upload_path']          = '.' . $path;
        if ($tipe == "image") {
            $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
        } else if ($tipe == "audio") {
            $config['allowed_types']        = 'opus|flac|webm|weba|wav|ogg|m4a|mp3|oga|mid|amr|aiff|wma|au|aac|OPUS|FLAC|WEBM|WEBA|WAV|OGG|M4A|MP3|OGA|MID|AMR|AIFF|WMA|AU|AAC';
        }
        $megabit = 10240;
        $maxmb   = 10; // max file upload 10 mb
        $maxsize = $megabit * $maxmb;

        $config['overwrite']            = false;
        $config['max_size']             = $maxsize;
        $this->CI->load->library('upload', $config);
        $this->CI->upload->initialize($config);
        return $this->CI->upload->do_upload($tipe);
    }

    function __construct()
    {
        $this->CI = &get_instance();
    }
}
