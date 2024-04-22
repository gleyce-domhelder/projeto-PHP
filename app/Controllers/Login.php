<?php

namespace App\Controllers;

use CodeIgniter\Controller;


class Login extends Controller
{
    public function index()
    {
        $json_files = ['Usuarios.json', 'Routes.json', 'SubMenu.json', 'Menu.json'];
        $json_dados = [];
        foreach ($json_files as $json_file) {
            /* FCPATH é uma variável definida pelo CodeIgniter que contém o caminho absoluto 
            para a pasta raiz do projeto que neste caso é a pasta public */
            $json_path = FCPATH . 'assets/json/' . $json_file;
            /* Verifica se o arquivo existe e retorna o conteúdo do 
            arquivo(file_get_contents -> ler o arquivo) */
            $json_dados[] = file_exists($json_path) ? file_get_contents($json_path) : false;
        }

        $json_path_routes = FCPATH . 'assets/json/Routes.json';
        $json_dados_routes = file_exists($json_path_routes) ? file_get_contents($json_path_routes) : false;
        $routes = $json_dados_routes ? json_decode($json_dados_routes) : [];


        // Decodificando todos os conteúdos do JSON em um arrayList
        $usuarios = $json_dados[0] ? json_decode($json_dados[0]) : [];
        // $routes = $json_dados[1] ? json_decode($json_dados[1]) : [];
        $submenus = $json_dados[2] ? json_decode($json_dados[2]) : [];
        $menus = $json_dados[3] ? json_decode($json_dados[3]) : [];

        // Obtém os dados do POST
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('password');

        // Verifica cada usuário
        $login_sucesso = false;
        $permissao = '';
        foreach ($usuarios as $usuario) {
            if ($usuario->email == $email && $usuario->senha == $senha) {
                $permissao = $usuario->idCategoria;
                $login_sucesso = true;
            }
        }

        // Exibe a mensagem adequada
        echo $login_sucesso ? "<script>console.log('Login bem-sucedido!')</script>" : "<script>Console.log('Email ou senha incorretos.')</script>";

        //Receber uma array com os dados do menu
        $arrayMenu = [];
        if ($login_sucesso) {
            foreach ($routes as $route) {
                if ($route->idCategoria == $permissao || $route->idCategoria == 0) {
                    $arrayMenu[] = "<li><a href='$route->href'>$route->Nome</a></li>";
                }
            }
            //Envia para rota da pagina inicial
            // return redirect()->to(base_url('home'));
            return view('partials/menu', ['arrayMenu' => $arrayMenu]);
        }
    }
}
