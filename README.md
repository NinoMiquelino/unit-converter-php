## 👨‍💻 Autor

<div align="center">
  <img src="https://avatars.githubusercontent.com/ninomiquelino" width="100" height="100" style="border-radius: 50%">
  <br>
  <strong>Onivaldo Miquelino</strong>
  <br>
  <a href="https://github.com/ninomiquelino">@ninomiquelino</a>
</div>

---

# 🔄 Unit Converter: Dynamic Full-Stack PHP Tool

![Made with PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white)
![Frontend JavaScript](https://img.shields.io/badge/Frontend-JavaScript-F7DF1E?logo=javascript&logoColor=black)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-38B2AC?logo=tailwindcss&logoColor=white)
![License MIT](https://img.shields.io/badge/License-MIT-green)
![Status Stable](https://img.shields.io/badge/Status-Stable-success)
![Version 1.0.0](https://img.shields.io/badge/Version-1.0.0-blue)
![GitHub stars](https://img.shields.io/github/stars/NinoMiquelino/unit-converter-php?style=social)
![GitHub forks](https://img.shields.io/github/forks/NinoMiquelino/unit-converter-php?style=social)
![GitHub issues](https://img.shields.io/github/issues/NinoMiquelino/unit-converter-php)

Este projeto é um conversor de unidades de medida full-stack que demonstra a separação de responsabilidades entre o cliente (JavaScript) e o servidor (PHP). O **backend em PHP puro** é responsável por toda a lógica matemática e precisão dos cálculos, enquanto o **frontend em JavaScript e Tailwind CSS** fornece uma interface de usuário dinâmica e reativa.

---

## 📐 Funcionalidades

* **Cálculos Precisos:** Toda a lógica de conversão é executada no PHP, garantindo a precisão dos resultados (formatados para 4 casas decimais).
* **Conversões Suportadas:**
    * **Temperatura:** Celsius, Fahrenheit, Kelvin.
    * **Distância:** Quilômetros, Milhas, Metros.
* **Interface Dinâmica:** O frontend atualiza o resultado em tempo real (on-the-fly) a cada alteração no valor ou na unidade, utilizando um pequeno *debounce* em JavaScript.
* **PHP Puro:** Não utiliza bibliotecas externas, sendo uma excelente demonstração de PHP Vanilla para lógica de negócios.

---

## 🧠 Tecnologias utilizadas

* **Backend:** PHP 7.4+ (Lógica de conversão pura).
* **Frontend:** HTML5 e JavaScript Vanilla.
* **Estilização:** Tailwind CSS (via CDN).
* **Comunicação:** Requisições assíncronas via `fetch` (POST).

---

## 🧩 Estrutura do Projeto

```
unit-converter-php/
├── index.html
├── api.php
├── README.md
├── .gitignore
└── LICENSE
```
---

## ⚙️ Como Executar o Projeto

### Pré-requisitos

Você precisa de um ambiente de servidor web com PHP.

### 1. Clonar o Repositório

```bash
git clone https://github.com/ninomiquelino/unit-converter-php.git
```

2. Executar o Servidor
​Utilize o servidor embutido do PHP para testes (a partir da raiz do projeto):

```bash
php -S localhost:8001
```
​• Acesse: O frontend estará disponível em http://localhost:8001/public/index.html.
​3. Configurar o Endpoint da API
​Certifique-se de que a constante API_URL no arquivo public/index.html aponte corretamente para o seu backend:

```bash
// public/index.html
const API_URL = 'http://localhost:8001/src/api.php'; 
```

--- 

## 📝 Instruções de Uso
​Selecione a Categoria: Escolha entre Temperatura ou Distância no campo superior.
​Insira o Valor: Digite o valor numérico a ser convertido.
​Escolha as Unidades:
​Selecione a unidade de origem no campo De.
​Selecione a unidade de destino no campo Para.
​Resultado Instantâneo: O resultado será calculado imediatamente pelo PHP e exibido no campo Resultado.
​💡 Exemplo de Teste
​Categoria: Temperatura
​Valor: 100
​De: celsius
​Para: fahrenheit
​Resultado Esperado: 212.0000 (Calculado pelo PHP)

---

## 🤝 Contribuições
Contribuições são sempre bem-vindas!  
Sinta-se à vontade para abrir uma [*issue*](https://github.com/NinoMiquelino/unit-converter-php/issues) com sugestões ou enviar um [*pull request*](https://github.com/NinoMiquelino/unit-converter-php/pulls) com melhorias.

---

## 💬 Contato
📧 [Entre em contato pelo LinkedIn](https://www.linkedin.com/in/onivaldomiquelino/)  
💻 Desenvolvido por **Onivaldo Miquelino**

---
