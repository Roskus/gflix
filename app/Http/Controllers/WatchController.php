<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WatchController extends Controller
{
    public function player(Request $request, int $id)
    {
        $video = Video::findOrFail($id);
        $data['video'] = $video;

        // Verificar si el video es parte de una serie
        if ($video->content->type == 'series') {
            // Obtener todos los videos de la serie, ordenados por algún criterio
            $serieVideos = $video->content->videos;
            // Encontrar el índice del video actual en la colección
            $currentIndex = $serieVideos->search(function ($item) use ($video) {
                return $item->id === $video->id;
            });
            // Determinar el siguiente capítulo, si existe
            $data['nextChapterUrl'] = null;
            if ($currentIndex !== false && isset($serieVideos[$currentIndex + 1])) {
                $nextVideo = $serieVideos[$currentIndex + 1];
                // Generar la URL del siguiente capítulo
                $data['nextChapterUrl'] = route('watch', ['id' => $nextVideo->id]);
            }
        }
        View::share('title', $video->name ?? $video->content->name);
        return view('watch', $data);
    }
}
