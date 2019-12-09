<?php namespace App\Repositories\Common;

use App\Models\DisplayImage\DisplayImage;
use Intervention\Image\ImageManagerStatic as Image;

class DisplayImageRepository
{
    /**
     * Model
     * @var
     */
    public $model;

    /**
     * Display Image Folder Name
     * @var string
     */
    public $displayImagesFolder;

    /**
     * Display Thumb Folder Name
     * @var string
     */
    public $displayThumbsFolder;

    /**
     * Role Type
     * @var string
     */
    public $role;

    /**
     * Role Id
     * @var string|int
     */
    public $roleId;

    /**
     * Image Id
     * @var null|string|int
     */
    public $imageId = null;

    /**
     * Image name
     * @var string
     */
    public $imageName = null;

    /**
     * AdminRepository constructor.
     * @param $role
     * @param $roleId
     */
    public function __construct($role, $roleId)
    {
        $this->model                = new DisplayImage();
        $this->role                 = $role;
        $this->roleId               = $roleId;
        $this->displayImagesFolder  = storage_path('DisplayImages/');
        $this->displayThumbsFolder  = storage_path('DisplayThumbs/');

        $this->getDisplayImageIdName();
    }

    /**
     * @param $imageFile
     */
    public function saveDisplayImage($imageFile)
    {
        $extension      = $imageFile->getClientOriginalExtension();
        $imagickFile    = Image::make($imageFile);
        $newImageName   = hyd_encrypt_with_time($this->roleId);

        if($this->imageId && $this->imageName)
        {
            $this->removeDisplayImage();
        }

        $imagickFile->resize(600, 600)->save($this->displayImagesFolder . $newImageName . '.' . $extension);
        $imagickFile->resize(200, 200)->save($this->displayThumbsFolder . $newImageName . '.' . $extension);

        $this->imageId = $this->model->create([
            'admin_id'          => auth('admin')->id(),
            'image_name'        => $newImageName,
            'image_extension'   => $imageFile->getClientOriginalExtension()
        ]);

        $this->imageName = $newImageName;
    }

    /**
     * Get Display Image Id And Name
     */
    public function getDisplayImageIdName()
    {
        $data = $this->model->where($this->role, $this->roleId)->get(['id', 'image_name', 'image_extension'])->toArray();

        if($data)
        {
            $this->imageId = $data[0]['id'];
            $this->imageName = $data[0]['image_name'] . '.' . $data[0]['image_extension'];
        }
    }

    /**
     * Delete Display Image
     * @throws \Exception
     */
    public function removeDisplayImage()
    {
        $this->model->where('id', $this->imageId)->delete();

        if($this->imageName && file_exists($this->displayImagesFolder . $this->imageName))
        {
            unlink($this->displayImagesFolder . $this->imageName);
        }

        if($this->imageName && file_exists($this->displayThumbsFolder . $this->imageName))
        {
            unlink($this->displayThumbsFolder . $this->imageName);
        }

        $this->imageName = $this->imageId = null;
    }

    /**
     * @return bool|string
     */
    public function getDisplayImageData()
    {
        if($this->imageName && file_exists($this->displayImagesFolder . $this->imageName))
        {
            $content = file_get_contents($this->displayImagesFolder . $this->imageName);
            return 'data:image/png;base64, ' . base64_encode($content);
        }

        return false;
    }
}