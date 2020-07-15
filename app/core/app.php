<?php

class App{

    protected $controller="home";
    protected $method="index";
    protected $params=[];

    function __construct()
    {
        #O returno será apresentado aquí no construtor
        $url=$this->parseUrl();

        #verificando se o directorio do vector (na posicao/índice controller) existe.
        if(file_exists('../app/controllers/'.$url[0].'.php')){
            #se existe atribuimo-lo na propriedade controller
            $this->controller=$url[0];
            #depois limpamos o índece 0 do vector(o directorio no caso)
            unset($url[0]);

        }
        #depois de feito tudo a cima, reencaminhamo-lo ao directorio em questão
        #(no caso do directorio que estará na propriedade controller)
        require_once '../app/controllers/'.$this->controller.'.php';

        if(isset($url[1])){
            #o método method_exist()- verifica se o metodo  passado como parâmetro existe
            if(method_exists($this->controller,$url[1])){
                $this->method=$url[1];
                unset($url[1]);
            }

        }

        $this->params=$url ? array_values($url) : [];
        call_user_func_array([$this->controller,$this->method],$this->params);
    }

    #Método criado para tratar a URL, retornará um vector do tipo por exemplo: /home/index/jairo: array('controller'=>'home','method'=>'index','params'=>'jairo')
    public function parseUrl(){
        if(isset($_GET['url'])){
            #a função rtrim() serve para eliminar caracteres especiais de uma string
            #a função explode() serve para transformar uma string à partir de um delimitador(que é o segundo parametro) em array.
            return $url=explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
        }
    } 
}