# 🏆 Gerenciador da Copa do Mundo (CRUD MVC)

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![MVC](https://img.shields.io/badge/Architecture-MVC-2E8B57?style=for-the-badge)
![Status](https://img.shields.io/badge/Project-Completed-brightgreen?style=for-the-badge)

## Sobre o projeto

Este projeto foi desenvolvido como parte da minha formação em Técnico em Desenvolvimento de Sistemas, com foco em aplicar na prática os conceitos de programação, banco de dados e organização de software.

A aplicação foi criada para gerenciar seleções da Copa do Mundo por meio de um sistema CRUD completo, permitindo cadastrar, listar, editar e excluir registros de forma simples e organizada. Durante o desenvolvimento, também foi possível trabalhar com filtros, paginação e painel de estatísticas, tornando o projeto mais próximo de uma aplicação real.

Um dos principais objetivos foi colocar em prática a arquitetura **MVC (Model-View-Controller)**, separando bem as responsabilidades entre acesso aos dados, regras de negócio e interface do usuário. Isso ajudou a deixar o código mais limpo, estruturado e fácil de manter.

##  Tecnologias utilizadas

- **PHP**
- **MySQL**
- **PDO**
- **HTML5**
- **CSS3**
- **Arquitetura MVC**

## Funcionalidades

- Cadastro de seleções.
- Listagem de seleções.
- Edição de seleções.
- Exclusão de seleções.
- Filtro por grupo.
- Paginação da listagem.
- Dashboard com informações resumidas.
- Cadastro e listagem de jogadores vinculados à seleção.

## Conceitos aplicados

- Organização em camadas com MVC.
- Conexão segura com banco de dados usando PDO.
- Uso de consultas SQL com `COUNT`, `SUM` e `GROUP BY`.
- Manipulação de formulários com PHP.
- Validação básica de dados.
- Separação entre lógica, visual e persistência.

##  Estrutura do projeto

```bash
copa/
├── Controller/
├── Model/
├── View/
├── assets/
├── index.php
└── README.md
```

## Dashboard

O sistema possui um pequeno painel no topo da listagem com informações importantes, como:

- Total de seleções cadastradas.
- Soma total de títulos mundiais.
- Quantidade de seleções por grupo.

Esse recurso foi criado para facilitar a visualização rápida dos dados principais do sistema.

## Módulo de jogadores

Além das seleções, o projeto também conta com um módulo de jogadores, permitindo:

- Listar o elenco de uma seleção.
- Adicionar novos jogadores.
- Editar jogadores cadastrados.
- Excluir jogadores do sistema.

Isso reforça o relacionamento entre seleções e atletas, deixando o projeto mais completo.

## Melhorias futuras

Algumas ideias para evolução do sistema:


- Criar autenticação de usuários.
- Adicionar relatórios mais detalhados.
- Expandir o dashboard com novos gráficos e métricas.

## Aprendizados

Esse projeto foi muito importante para meu desenvolvimento, porque me ajudou a entender melhor como um sistema web funciona na prática. Além da parte técnica, também aprendi a organizar melhor o código, pensar na experiência do usuário e lidar com desafios reais de desenvolvimento.

##  Agradecimentos

Agradeço aos professores e orientadores que acompanharam esse processo, em especial ao professor **Danilo Ferreira Sousa** e à professora **Thais Leal**, pelo apoio, orientação e incentivo durante o desenvolvimento do projeto.

---