<?php

class Controller{
    

    #Esta funcção recebe como parâmetro um arquivo do directorio model, 
    #este arquivo de ter o mesmo nome da classe, e retorna um objecto relactivo ao arquivo 
    #passado no parametro:
    #Exemplo: Se vc para como parametro 'User' ele vai retornar o Objecto 'User'
    public function model($model){
        require_once '../app/models/' .$model. '.php';
        #retornando o objecto do arquivo passado no parâmetro do método 
        return new $model();
    }

    #Esta função é que vai ligar o View com o Model, recebe dois que são: 
    #$view-que representa o nome arquivo, e $data-que representa os dados passados via POST/GET
    public function views($view,$data=[]){
        require_once '../app/views/'.$view.'.php';
    }

}