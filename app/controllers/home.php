<?php

require_once '../app/core/controller.php';
class Home extends Controller
{
    public function index($name=''){

        #criar um objecto Usuario com a classe User que está no Arquivo User.php na pasta/directorio models
       $user= parent::model('User');
       #preenchendo a propriedade nome do usuário
       $user->nome=$name;
       #chamando o método views com os seus respectivos pamâmetros, onde o primeiro indica o caminho do 
       #arquivo index.php na camada view, e o segundo representa o dado. 
       #A chave do vector é a propriedade que foi definida na classe User na camada Model
       parent::views('home/index',['nome'=>$user->nome]);
    }



}
