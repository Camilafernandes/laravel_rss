## Requisitos técnicos

* PHP 7^
* Docker


### Arquivos de configuração

Execute os seguintes comandos:

```bash
cp .env.example .env
```

## Levantar ambiente 

```bash
docker-compose up
```

## Testando aplicação

Execute a seguinte requisição:

```bash
curl --location --request GET 'http://localhost:8000/api'
```

E a resposta deverá ser algo como o json que segue

```json

[
    {
        "title": "Jeff Bezos: bilionário viaja ao espaço",
        "link": "https://g1.globo.com/economia/tecnologia/inovacao/ao-vivo/jeff-bezos-bilionario-viaja-ao-espaco.ghtml",
        "data": "19 July 2021, 8:56 pm"
    },
    {
        "title": "Bilionário Richard Branson viaja ao espaço em foguete da Virgin Galactic",
        "link": "https://g1.globo.com/ciencia-e-saude/ao-vivo/bilionario-richard-branson-viaja-ao-espaco-em-foguete-da-virgin-galactic.ghtml",
        "data": "19 July 2021, 8:38 pm"
    }
]
```
