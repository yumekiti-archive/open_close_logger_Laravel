import RPi.GPIO as GPIO
import requests
import json
import time
import sys


url = sys.argv[1]
token = sys.argv[2]
pin = sys.argv[3]
pin = int(pin)


# モードの指定をする(今回は役割ピン番号)
GPIO.setmode(GPIO.BCM)
# GPIO18pinを入力モードとし、pull up設定とします
GPIO.setup(pin,GPIO.IN,pull_up_down=GPIO.PUD_UP)


# ヘッダーの設定
headers = {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
}


# ドアセンサーのon off設定
door_sw = False
# postループ対策
sw_lock = False


while True:

    # センサーの読み込み
    door_sw = GPIO.input(pin)

    if door_sw != sw_lock:

        payload = json.dumps({
            "token": token,
            "state": door_sw
        })

        # サーバーへPOST
        requests.request("POST", url, headers=headers, data=payload)

    sw_lock = door_sw

    time.sleep(0.50)
    
