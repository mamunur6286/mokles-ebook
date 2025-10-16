<?php


/**
 * Define system constants
*/
const S_DELETE_MSG = 'Successfully deleted';
const E_DELETE_MSG = 'Not successfully updated';
const S_UPDATE_MSG = 'Successfully updated';
const E_UPDATE_MSG = 'Not successfully updated';
const S_SAVE_MSG = 'Successfully created';
const E_SAVE_MSG = 'Not successfully created';
const S_DEL_MSG = 'Successfully deleted';
const E_DEL_MSG = 'Not successfully deleted';

const ACTIVE = 1;
const INACTIVE = 0;



if (!function_exists('generateUniqueID'))
{
    /**
     * Summary of generateUniqueID
     * @param mixed $prefix
     * @param mixed $id
     * @param mixed $length
     * @return string
     */
    function generateUniqueID($prefix, $id, $length = 6): string
    {
        return $prefix . '-' . date('y') . '-' . str_pad($id, $length, '0', STR_PAD_LEFT);
    }
}

if (!function_exists('fileUpload'))
{
    function fileUpload ($fileName = 'banner_image')  
    {
        $filePath = '';
        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/series'), $fileName);
            $filePath = 'uploads/series/'.$fileName;
        }
        return $filePath;
    }
}
if (!function_exists('slug_generator')) {
    function slug_generator($string)
    {
        // Trim
        $slug = trim($string);

        // Replace spaces with dash
        $slug = preg_replace('/\s+/u', '-', $slug);

        // Keep Bangla letters, English letters, numbers, marks, and dashes only
        $slug = preg_replace('/[^\p{L}\p{N}\p{M}\-]+/u', '', $slug);

        // Remove duplicate dashes
        $slug = preg_replace('/-+/', '-', $slug);

        // Trim dashes
        $slug = trim($slug, '-');

        return $slug;
    }
}
