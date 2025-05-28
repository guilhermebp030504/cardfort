<?php

namespace App\Http\Controllers;

use App\Models\Cadeira;
use App\Models\Categoria;
use App\Models\Material;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function index(Request $request)
    {
        $query = Cadeira::with(['categoria', 'material']);

        if ($request->filled('bb')) {
            $query->where('nome', 'like', '%' . $request->bb . '%');
        }

        $categorias = ['1', '2', '3', '4', '5'];
        foreach ($categorias as $cat) {
            if ($request->filled($cat)) {
                $query->where('id_categoria', $cat);
                break;
            }
        }

        if ($request->has('filtrar')) {
            if ($request->filled('preco') && $request->preco !== '!= 0') {
                $this->aplicarFiltroPreco($query, $request->preco);
            }

            if ($request->filled('categoria') && $request->categoria !== '!= 0') {
                $categoriaValue = str_replace('= ', '', $request->categoria);
                $query->where('id_categoria', $categoriaValue);
            }

            if ($request->filled('material') && $request->material !== '!= 0') {
                $materialValue = str_replace('= ', '', $request->material);
                $query->where('id_material', $materialValue);
            }
        }

        $cadeiras = $query->get();
        $nomesCadeiras = Cadeira::pluck('nome');
        $categorias = Categoria::all();
        $materiais = Material::all();

        return view('compras', compact('cadeiras', 'nomesCadeiras', 'categorias', 'materiais'));
    }

    private function aplicarFiltroPreco($query, $filtroPreco)
    {
        switch ($filtroPreco) {
            case '<= 500':
                $query->where('preco', '<=', 500);
                break;
            case '>= 500 and preco <=1000':
                $query->whereBetween('preco', [500, 1000]);
                break;
            case '>= 1000 and preco <=2000':
                $query->whereBetween('preco', [1000, 2000]);
                break;
            case '>= 2000':
                $query->where('preco', '>=', 2000);
                break;
        }
    }
}
