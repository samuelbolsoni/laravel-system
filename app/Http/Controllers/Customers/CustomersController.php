<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Customers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customers::orderBy('name')->paginate(10);

        return view('customers.listagem', ['customers' => $customers, 'cadastrar' => true, 'href' => 'customers/create']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customers/create-edit');
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

        $insert = Customers::create($dadosForm);

        if ($insert) {
            $id = $insert->id;
            return $this->edit($insert->id, 'Registro inserido com sucesso!');
                //return Redirect::back()->withErrors(['Registro atualizado com sucesso!', 'The Message']);
        }else{
            return redirect('/customers/create')
                        ->withErrors('Erro ao salvar.', 'Falha ao editar.');
        }

    }

    public function search()
    {
        $field_search = Input::get('search_customer');

        $search = Customers::where('name', 'like', '%'.$field_search.'%')
                            ->orWhere('phone','like','%'.$field_search.'%')
                            ->orWhere('cellphone','like','%'.$field_search.'%')
                            ->orderBy('name')
                            ->paginate(100);
                            //->get();

        return view('customers.listagem', ['customers' => $search, 'field_search' => $field_search, 'cadastrar' => true, 'href' => 'customers/create']);
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
        $customer = Customers::find($id);
        return view('customers/create-edit', ['customer' => $customer, 'message' => $message]);
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

        $customer = Customers::find($id);

        $update = $customer->update($request->all());

        if ($update) {
            return $this->edit($id, 'Registro atualizado com sucesso!');
        }else{
            return redirect('/customers/{$id}/edit')
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

    public function delete_customer() {
        if(request()->ajax()) {
            $data = Input::all();

            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    //dd($key,$value);
                    $customer = Customers::find($value);
                    $customer->delete();
                }
                return $this->index();
            }
        }
    }
}
