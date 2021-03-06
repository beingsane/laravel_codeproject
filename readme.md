## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

<hr>

## poo-code-education
Curso Laravel 5.1 com AngularJS - Code Education [Laravel 5.1 com AngularJS](http://sites.code.education/laravel-com-angularjs/)

## Fase 1 do Projeto Laravel
<b>CLIENTS</b>
 
 - Nessa fase do projeto, você deverá apresentar um CRUD completo de nosso model Client.
 - Sempre lembrando que toda a informação resultante deverá ser exibida para o usuário final como um json.
 - Não se esqueça de utilizar corretamente os verbos HTTP.

## Fase 2 do Projeto Laravel
<b>REPOSITORES / SERVICES</b>
 
 Agora que já falamos sobre os conceitos de Services e Repositories:
   
 1 - Faça o CRUD completo de nossa Entidade Client
   
 2 - Crie uma nova entidade chamada Project, onde sua tabela do banco de dados terá:
   
   - id
   - owner_id (chave estrangeira para users)
   - client_id (chave estrangeira para clients)
   - name
   - description
   - progress
   - status
   - due_date
   - created_at
   - updated_at
   
 3 - Crie o Repository e Service referente a entidade Project, bem como suas validações, gerando um CRUD completo
   
 4 - Na listagem dos dados, traga também as informações sobre o owner_id e client_id (dica: utilize o método do repository: "with")
 
## Fase 3 do Projeto Laravel
<b>TASKS E MEMBERS</b>
  
 Agora que você está entendendo o processo de relacionamento e disponibilização das APIs relacionadas a Projects, faça:
 
 1 - Crie a entidade ProjectTask, com os seguintes campos e disponibilize os endpoints project/tasks.
 Não se esqueça de criar as migrations, seeds, repositories, services, etc.
 
 - id
 - name
 - project_id 
 - start_date
 - due_date
 - status
 - created_at
 - updated_at
 
 2 - Crie a entidade ProjectMembers, com os campos:
 
 - project_id
 - user_id
 
 Faça o relacionamento com a entidade Project e User para que facilmente possamos ter acesso aos membros de um projeto.
 
 No ProjectService, crie dois métodos:
 
 - addMember: para adicionar um novo member em um projeto
 - removeMember: para remover um membro de um projeto
 - isMember: para verificar se um usuário é membro de um determinado projeto
 
 Crie um endpoint: /project/{id}/members para ter acesso a todos os membros de um projeto. 
 
## Fase 4 do Projeto Laravel
<b>FINALIZANDO BACKEND</b>
  
 Agora que já temos nossa estrutura montada em relação ao projeto, precisamos finalizar a parte "base" do backend para que possamos iniciar o processo de integração com o AngularJS.

 Faça:

- Aplique o processo de Autorização em todos os endpoints de nossa API
- Crie Presenters e Transformers em todos os repositories (deixe exibindo todos os dados por padrão - isso poderá ser mudado quando formos conversar com o Angular)
- Termine o processo de inclusão de arquivos / upload validando possíveis tipos de erros
- Processo de remoção de arquivos do projeto

## Fase 1 do Projeto Angular
<b>CONFIGURANDO O AMBIENTE DE DESENVOLVIMENTO</b>
  
 Agora que você já viu todo processo de preparação do nosso front-end, você deve reproduzir o mesmo ambiente em seu projeto.
 É preciso que ao digitarmos "gulp watch-dev", ele realize todas as tarefas descritas para o desenvolvimento e quando
 digitarmos "gulp default" ou somente "gulp", o mesmo gere os arquivos all.js e all.css que será o resultado da união dos arquivos correspondentes.

## Fase 2 do Projeto Angular
 <b>REALIZANDO AUTENTICAÇÃO</b>

  Agora que já realizamos a autenticação é preciso que você faça a mesma autenticação na rota #/login.
  Quando o usuário for autenticado, redirecione-o para #/home. Não se preocupe em restringir o acesso ao #/home quando não estivermos
  autenticados.

## Fase 3 do Projeto Angular
 <b>PRIMEIROS CRUD's</b>

  Com o CRUD de client funcionando, você irá fazer os CRUD's de client e project note.
  Para as rotas, mantenha o mesmo padrão que usamos no curso:
  
  <b>Client:</b>
  
  - Para listar: #/clients
  - Para listar um client: #/clients/:id
  - Para criar: #/clients/new
  - Para editar: #/clients/:id/edit
  - Para excluir: #/clients/:id/remove  
  ===============================================================================================
  
 <b>Project Note:</b>
  
  - Para listar as notas de um projeto específico: #/project/:id/notes
  - Para listar uma nota de um projeto específico: #/project/:id/notes/:idNote
  - Para criar uma nota para um projeto específico: #/project/:id/notes/new
  - Para editar uma nota: #/project/:id/notes/:idNote/edit
  - Para excluir uma nota: #/project/:id/notes/:idNote/remove
  
  Onde está o :id, será o id do projeto e você irá força-lo no URL porque nesta fase não faremos CRUD's de project.
  Não se preocupe com os detalhes agora, o importante é que os dois CRUD's funcionem.
  
   
  <b>Obs.:</b> utilize o método skipPresenter() nas consultas do repository por enquanto, para facilitar os CRUD's.
 
## Fase 4 do Projeto Angular
 <b>PROJECT CRUD</b>
  Agora que já fizemos o CRUD de project note, você deverá fazer o CRUD de project.
  Use o conhecimento que aprendeu para passar o owner_id (usuário autenticado) no cadastro e use o ng-select e ng-options para mostrar os clients a serem incluídos no projeto.
  As rotas deste CRUD serão semelhante ao formato que usamos no CRUD de client.
  
## Fase 5 do Projeto Angular
 <b>CRIANDO CRUD DE PROJECT FILE</b>
  Nesta fase você deve fazer a implementação do CRUD de project file, igual fizemos neste capítulo.

## Fase 5 do Projeto Angular
 <b>CRUD's DE PROJECT TASK E PROJECT MEMBER</b>  
  Nesta fase você deve fazer o CRUD de project task e project member, usando o mesmo padrão que já utilizamos no curso. Além disto, você deve também no CRUD de project fazer a funcionalidade de autocomplete de client.
 

  ===============================================================================================
  
## Como Utilizar:

1. Criar a base no mysql, e configurar o .env

    ```
    configurar o mysql no .env, e deixar o debug=true
    ``` 
2. Rodar Composer install

    ```
    composer install
    ```   
3. Rodar Npm Install

    ```npm
    npm install
    ```
4. rodar o Bower install

    ```bower
    bower install
    ```
4. rodar as migrate e seeds

    ``` migrate e seeds
    php artisan migrate
    php artisan db:seed
    ```
6. rodar o gulp

    ```gulp
    gulp watch-dev
    ```

#### .env:
```
APP_ENV=local
APP_DEBUG=true
APP_KEY= php artisan key:generate
``` 
 
 
 
 
------------------------------------------------------------------------------------------
[Bruno Castro](http://www.bhzautomacao.com.br) - Development