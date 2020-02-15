<?php

namespace App\Http\Controllers\Admin;

//Como foi colocado o controler config dentro da pasta admin a requisição do controller padrão para colocar em funcionamento o cofig 
//não consegue acessar o controller.php que está na pasta raiz da controller precisando assim ser importado através do use,
//para a pasta admin.

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConfigController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request){

        /*$method = $request->method();

        echo "Método utilizado: ".$method;*/

        $data = $request->all();

        //Se não achar cidade no formulario coloca cidade São Paulo por padrão.
        //$cidade = $request->query('cidade', 'São Paulo');

       
        
            /*if($data != null){
                echo "Meu nome é ". $data['nome'] . " e eu tenho " . $data['idade']  . " anos.";
        
            }*/

        $cidade = $request->input('cidade', 'SP');
        $nome = $request->input('nome', 'Visitante');
        $idade = $request->input('idade');
        $method = $request->method();

        echo "Cidade: " . $cidade . "<br>";

        

        //Se eu colocar only depois do request seguido dos campos que eu quero valor só vai ser pego os valores desses campos passados
        //no parametro entre parente e conchetes.

        $dados = $request->only(['nome', 'idade']);

        if($dados != null){
            
            echo "Meu nome é " .  $dados['nome']. " eu tenho ".$dados['idade']. " anos.";
         
        }

        $lista = [
            ['nome' =>'Farinha', 'qt'=>'2'],
            ['nome' =>'Ovo', 'qt'=>'4'],
            ['nome' =>'Corante', 'qt'=>'1'],
            ['nome' =>'Ingrediente especial', 'qt'=>'1']
        ];

        $user = $request->user();
        $nome = $user->name;

        $nome2 = $nome;
        $idade2 = 90;

        $dados2 = [
            'nome2' =>$nome2,
            'idade2' => $idade2,
            'lista' => $lista
        ];
        
        //Quando colocar um arquivo dentro de uma pasta no view tem que colocar o ponto invés de / como abaixo
        //Passando dados2 para view é so colocar depois da virgula no return view.
        return view('admin.config', $dados2);
    }

    public function info(){
        echo 'Configurações INFO 3';
    }

    public function permissoes(){
        echo 'Configurações Permissões 3';
    }
}
