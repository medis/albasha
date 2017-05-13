<?php

namespace App\Http\Controllers\traits;

use Intervention\Image\ImageManagerStatic as Image;

trait FileTrait {

  /**
   * Create file.
   */
  public function createFile($file, $path, array $thumb_size = []) {
    if (empty($file)) {
      return ['', ''];
    }
    
    $random_name = str_random(8);
    $public_path = "storage/$path/$random_name.jpg";
    $public_thumbnail_path = "storage/$path/$random_name-thumbs.jpg";

    if (!file_exists(public_path("storage/$path"))) {
        if (!file_exists(public_path("storage"))) {
            mkdir(public_path('storage'));
        }

        mkdir(public_path("storage/$path"));
    }

    $image = Image::make($file->getRealPath());
    $image->save(public_path($public_path));
    $image->fit($thumb_size[0], $thumb_size[1])->save(public_path($public_thumbnail_path));
    return [$public_path, $public_thumbnail_path];
  }

  /**
   * Delete file.
   */
  public function deleteFile($link) {
    $link = public_path($link);
    if (file_exists($link)) {
      unlink($link);
    }
  }

}