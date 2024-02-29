# ferroviario-php
Exemplo PHP Solicitação ferroviária


#Criar tabela PostgreSQL
create table contacts(
  id SERIAL primary key,
  name VARCHAR not null,
  phone VARCHAR not null,
  observations VARCHAR not null
);