import requests
import time
import datetime as dt
import socket as sk

def enviar_pedido_put():
    date = dt.datetime.now()
    now = (date.strftime("%Y-%m-%d %H:%M:%S"))

    iplocal = sk.gethostbyname(sk.gethostname())

    url = 'http://mymonitor.com/api/V1/capturas/11'
    
    # DADOS PARA ENVIO
    data = {   
                "loja": "SPOLETO RUA RB1",
                "ip": iplocal,
                "host": "Totem 01",
                "tipohost": "Totem",
                "down": "",
                "up": "",
                "datahora": now
            }

    try:
        response = requests.put(url, json=data)
        response.raise_for_status()  # Verifica se houve erro na requisição
        print(f'Status da requisição: {response.status_code}')

    except requests.exceptions.HTTPError as err:
        print(f'Erro na requisição: {err}')

def main():
    while True:
        enviar_pedido_put()

        # Espera 5 minutos
        time.sleep(300)

if __name__ == "__main__":
    main()

