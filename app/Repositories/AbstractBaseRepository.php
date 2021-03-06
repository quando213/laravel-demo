<?php


namespace App\Repositories;


use App\Enums\CommonStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AbstractBaseRepository implements BaseRepository
{
    protected $modelClass;
    /** @var Model */
    protected $model;

    public function __construct()
    {
        if ($this->modelClass) {
            $this->model = app()->make($this->modelClass);
        }
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function findByIdAndUpdate($data, $id)
    {
        $record = $this->model->find($id);
        $record->fill($data);
        $record->save();
        return $record;
    }

    public function findByIdAndDelete($id)
    {
        $record = $this->model->find($id);
        $record->status = CommonStatus::DELETED;
        $record->save();
        return $record;
    }

    public function exists($val, $column)
    {
        return $this->model->newQuery()->where($column, $val)->exists();
    }

    public function toSlug($name)
    {
        $slug = Str::slug($name);
        $now = round(microtime(true));
        if ($this->exists($slug, 'slug')) {
            $slug .= '-'.$now;
            $this->toSlug($slug);
        }
        return $slug;
    }
}
