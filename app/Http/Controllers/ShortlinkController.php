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
        return response()->json(ShortLinkModel::paginate(10))->setStatusCode(200);
    }

    public function createURLHash(Request $request): JsonResponse
    {
        $input = $request->input('original_url');
        $hash = Str::random(7);

        $shorted_link = ShortLinkModel::create([
            'original_url' => $input,
            'hash' => "/{$hash}",
            'clicks' => 0
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

    public function incrementCountClicks(Request $request)
    {
        $input = $request->input('url_hash');
        
        ShortLinkModel::where('hash', $input)->increment('clicks');
        $update_count = ShortLinkModel::where('hash', $input)->get('clicks');

        return response()->json($update_count)->setStatusCode(200);
    }
}
