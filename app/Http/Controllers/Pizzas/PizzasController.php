<?php

namespace App\Http\Controllers\Pizzas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Pizzas;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PizzasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pizzas = Pizzas::orderBy('name')->paginate(10);

        return view('pizzas.listagem', ['pizzas' => $pizzas, 'cadastrar' => true, 'href' => 'pizzas/create']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pizzas/create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dadosForm = $request->all();

        $insert = Pizzas::create($dadosForm);

        if ($insert) {
            $id = $insert->id;
            return $this->edit($insert->id, 'Registro inserido com sucesso!');
                //return Redirect::back()->withErrors(['Registro atualizado com sucesso!', 'The Message']);
        }else{
            return redirect('/pizzas/create')
                        ->withErrors('Erro ao salvar.', 'Falha ao editar.');
        }

    }

    public function search()
    {
        $field_search = Input::get('search_customer');

        $search = Pizzas::where('name', 'like', '%'.$field_search.'%')
                            ->orWhere('phone','like','%'.$field_search.'%')
                            ->orWhere('cellphone','like','%'.$field_search.'%')
                            ->orderBy('name')
                            ->paginate(100);
                            //->get();

        return view('pizzas.listagem', ['pizzas' => $search, 'field_search' => $field_search, 'cadastrar' => true, 'href' => 'pizzas/create']);
    //->paginate(20);
        // dd('porra');

        // $dadosForm = $request->all();

        // dd($dadosForm);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $message = null)
    {
        $pizza = Pizzas::find($id);
        return view('pizzas/create-edit', ['pizza' => $pizza, 'message' => $message]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dadosForm = $request->all();

        $pizza = Pizzas::find($id);

        $update = $pizza->update($request->all());

        if ($update) {
            return $this->edit($id, 'Registro atualizado com sucesso!');
        }else{
            return redirect('/pizzas/{$id}/edit')
                        ->withErrors('Erro ao editar.', 'Falha ao editar.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete_pizza() {
        if(request()->ajax()) {
            $data = Input::all();

            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    //dd($key,$value);
                    $pizza = Pizzas::find($value);
                    $pizza->delete();
                }
                return $this->index();
            }
        }
    }
}
