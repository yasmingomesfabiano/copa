# Roadmap do Sistema da Copa do Mundo

## Missão 1 – Diário de Bordo (Checklist de Desenvolvimento)

### Tarefas de Banco de Dados
- [x] Criar tabela `selecoes` com campos básicos (id, nome, grupo, titulos_mundiais)
- [ ] Revisar tipos de dados das colunas de `selecoes` (tamanho de strings, int, etc.)
- [ ] Garantir que o banco esteja com charset e collation corretos (UTF-8)

### Tarefas de Models
- [x] Criar `Selecao.php` com operações CRUD usando PDO
- [x] Implementar métodos para listar, criar, atualizar e deletar seleções
- [ ] Adicionar tratamento de erros e mensagens amigáveis no Model
- [ ] Adicionar métodos específicos para consultas do dashboard (COUNT, SUM, GROUP BY)

### Tarefas de Views
- [x] Criar tela de listagem de seleções (`views/index.php`)
- [x] Criar formulários para criar/editar seleções
- [ ] Melhorar layout e usabilidade das telas (CSS, organização)

### Tarefas de Controllers
- [x] Controlar rotas básicas para listar, criar, editar e excluir seleções
- [ ] Padronizar tratamento de requisições (GET/POST) e redirecionamentos

---

## Missão 2 – Convocação Oficial (Relacionamento Seleção x Jogadores)

### Tarefas de Banco de Dados
- [ ] Criar tabela `jogadores` com campos:
  - id
  - nome
  - posicao
  - numero_camisa
  - selecao_id (chave estrangeira para `selecoes.id`)
- [ ] Criar chave estrangeira `selecao_id` referenciando `selecoes`
- [ ] Testar inserções para garantir que todo jogador esteja vinculado a uma seleção existente

### Tarefas de Models
- [ ] Criar `Jogador.php` com operações CRUD
- [ ] Implementar método para listar jogadores por seleção (filtrando por `selecao_id`)
- [ ] Implementar validações básicas (campos obrigatórios, número da camisa válido)

### Tarefas de Controllers
- [ ] Definir se haverá `JogadorController.php` separado ou se será tratado em `SelecaoController.php`
- [ ] Implementar ação para listar elenco de uma seleção
- [ ] Implementar ação para criar novos jogadores vinculados a uma seleção
- [ ] Implementar ação para excluir/editar jogadores

### Tarefas de Views
- [ ] Na listagem de seleções (`views/index.php`), adicionar botão "Ver Elenco" ao lado de cada seleção
- [ ] Criar view para listar jogadores de uma seleção específica
- [ ] Criar formulário para adicionar novo jogador direto na tela do elenco
- [ ] Exibir de forma clara: Nome, Posição e Número da camisa

---

## Missão 3 – Painel de Estatísticas (Dashboard)

### Tarefas de Banco de Dados
- [ ] Criar consultas SQL usando funções de agregação:
  - COUNT para total de seleções
  - SUM para soma total de títulos mundiais
  - COUNT + GROUP BY para número de seleções por grupo
- [ ] Testar essas consultas direto no MySQL antes de integrar no PHP

### Tarefas de Models
- [ ] Adicionar no `Selecao.php` métodos específicos:
  - `getTotalSelecoes()`
  - `getSomaTitulos()`
  - `getSelecoesPorGrupo()`
- [ ] Garantir que os métodos retornem os dados prontos para a View (arrays organizados)

### Tarefas de Views
- [ ] Criar área de Dashboard no topo da `views/index.php`
- [ ] Exibir:
  - Total de seleções cadastradas
  - Soma total de títulos mundiais
  - Lista de grupos com a quantidade de seleções em cada
- [ ] Deixar o painel visualmente destacado (título, caixas, cores)

### Tarefas de Controllers
- [ ] Ajustar o controller para buscar os dados do dashboard no Model
- [ ] Enviar esses dados para a `views/index.php` junto com a listagem das seleções