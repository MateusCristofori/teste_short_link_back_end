<?php

namespace App\Http\Controllers;

use App\Models\ShortLinkModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortlinkController extends Controller
{
    public function getAllLink(): JsonResponse
    {
        return response()->json(ShortLinkModel::paginate(5))->setStatusCode(200);
    }

    public function createURLHash(Request $request): JsonResponse
    {
        $input = $request->input('original_url');
        $hash = Str::random(7);

        $shorted_link = ShortLinkModel::create([
            'original_url' => $input,
            'hash' => "/{$hash}"
        ]);
        
        if(!$shorted_link) {
            return response()->json(['msg' => 'Erro ao salvar o link encurtado.'])->setStatusCode(500);
        }
        return response()->json([
            'msg' => 'Cadastro feito com sucesso.',
            'shorted_link' => $shorted_link->hash
        ])->setStatusCode(201);
    }

    public function redirectToOriginalURL(string $hash): JsonResponse
    {
        $link = ShortLinkModel::where('hash', "/{$hash}")->firstOrFail();
        return response()->json($link)->setStatusCode(200);
    }
}
