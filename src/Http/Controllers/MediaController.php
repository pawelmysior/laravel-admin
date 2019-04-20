<?php

namespace PawelMysior\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function fetch(Request $request): ?string
    {
        $modelType = $this->getModelType($request->input('model_type'));

        $model = $modelType::findOrFail($request->input('model_id'));

        $media = $model->getFirstMedia($request->input('collection'));

        return optional($media)->getFullUrl();
    }

    public function store(Request $request): string
    {
        if (!$request->filled('model_id')) {
            return $this->storeTemporaryFile($request->file('media'));
        }

        $modelType = $this->getModelType($request->input('model_type'));

        $model = $modelType::findOrFail($request->input('model_id'));

        $file = $request->file('media');

        $media = $model
            ->clearMediaCollection($request->input('collection'))
            ->addMedia($file)
            ->usingFileName(Str::random(40) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection($request->input('collection'));

        return $media->getFullUrl();
    }

    protected function storeTemporaryFile(UploadedFile $file): string
    {
        return Storage::disk(config('medialibrary.disk_name'))->url($file->store('temp', config('medialibrary.disk_name')));
    }

    protected function getModelType(string $modelType): string
    {
        return 'App\\' . Str::studly($modelType);
    }
}
