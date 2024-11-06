<?php

namespace App\Http\Controllers;

use App\Models\Ingredite;
use DB;
use Illuminate\Http\Request;

class IngredientesController extends Controller
{
    /**
     * Página inicial do projeto
     * Ela vai buscar todos os ingredientes na base dados
     * Passar para template 'dashboard' através da variável '$ingredientes'
     */

    public function todosIngredientes()
    {
        // Buscando todos os dados da tabela ingredientes
        $ingredientes = Ingredite::all();

        // Retornando a view resources/view/dashboard.blade.php com a variavel ingredientes
        return view('dashboard', compact('ingredientes'));
    }

    /**
     * Página de ingredientes a vencer
     * Ela vai buscar todos os ingredientes que tem a data de vencimento próximo a vencer
     * Passar para o template 'ingredientes-a-vencer' através da variável '$ingredientes'
     */
    public function ingredientesProximosAVencer()
    {
        // O dia de hoje mais 3 dias
        $dataDeHoje = Date('Y-m-d', strtotime('+3 days'));

        // Busca na tabela ingredientes com a validação da data de vencimento
        $ingredientes = DB::table('ingredientes')
            ->select('*')
            ->where('data_vencimento', '<=', $dataDeHoje)
            ->get();

        // resources/view/ingredientes/ingredientes-a-vencer
        return view('ingredientes.ingredientes-a-vencer', compact('ingredientes'));
    }

    /**
     * Retornar apenas o layout de adicionar novos ingredientes
     */
    public function ingredientesAdicionar()
    {
        return view('ingredientes.ingredientes-adicionar');
    }
    public function ingredientesEncomendados()
    {
        return view('ingredientes.ingredientes-encomendados');
    }

    /**
     * Página de ingredientes faltantes
     * Faz a busca analisando quais ingredientes tem o valor zero na quantidade
     */
    public function ingredientesFaltantes()
    {
        //Busca na tabela ingredientes analisando se a quantidade é igual a 0
        $ingredientes = DB::table('ingredientes')
            ->select('*')
            ->where('quantidade', '=', 0)
            ->get();

        return view('ingredientes.ingredientes-faltantes', compact('ingredientes'));
    }
    public function ingredientesRemover()
    {
        $ingredientes = Ingredite::all();

        return view('ingredientes.ingredientes-remover', compact('ingredientes'));
    }

    /**
     * Metodo criar, vai ser chamado através da tela de criação
     */
    public function criar(Request $request)
    {
        //Inserção das informações inseridas no formulário de criação de ingredientes
        DB::table('ingredientes')->insert([
            'nome' => $request->nome,
            'data_fabricacao' => $request->input('data-fabricacao'),
            'data_vencimento' => $request->input('data-vencimento'),
            'quantidade' => $request->quantidade,
            'refrigeracao' => $request->refrigeracao
        ]);
        // retornar para a tela de inicio
        return redirect('inicio');
    }

    /**
     * Metodo excluir, vai ser chamado através da tela de exclusão de ingredientes
     */
    public function excluir($id)
    {
        //Exclusão do ingredientes utilizando o $id como parametro
        DB::table('ingredientes')
            ->where('id', $id)
            ->delete();

        // retornar para a tela de remover
        return redirect()->route('ingredientes.remover');
    }
}
