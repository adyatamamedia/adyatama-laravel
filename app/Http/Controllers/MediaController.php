<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    public function show(string $path)
    {
        $uploadsRoot = realpath(base_path('dash/public/uploads'));

        abort_unless($uploadsRoot, 404);

        $cleanSegments = [];
        foreach (explode('/', str_replace('\\', '/', $path)) as $segment) {
            if ($segment === '' || $segment === '.') {
                continue;
            }

            if ($segment === '..') {
                array_pop($cleanSegments);
                continue;
            }

            $cleanSegments[] = $segment;
        }

        if (empty($cleanSegments)) {
            abort(404);
        }

        $candidatePath = $uploadsRoot . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $cleanSegments);
        $resolvedPath = realpath($candidatePath);

        if (! $resolvedPath || ! str_starts_with($resolvedPath, $uploadsRoot)) {
            abort(404);
        }

        if (! File::exists($resolvedPath)) {
            abort(404);
        }

        return response()->file($resolvedPath, [
            'Cache-Control' => 'public, max-age=604800',
            'Content-Type' => File::mimeType($resolvedPath) ?? 'application/octet-stream',
        ]);
    }
}
