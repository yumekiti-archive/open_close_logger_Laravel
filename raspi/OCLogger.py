import requests
import json
import time
import sys


# 以下後に変更

# サーバーip
print("ip set:")
ip = input()

# ssl認証
print("https? y/n")
ssl = input()
if ssl == "y":
    ssl = "https"
else:
    ssl = "http"

# トークン
print("token set:")
token = input()

# 使用するpin
print("pin set:")
pin = input()
pinFlag = True
pin = int(pin)

# 変更内容ここまで


# 以下URLが等しくない時変更 URL設定
url = ssl + "://" + ip + "/api/logs"

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

    if pinFlag:
        import RPi.GPIO as GPIO
        # モードの指定をする(今回は役割ピン番号)
        GPIO.setmode(GPIO.BCM)
        # GPIO18pinを入力モードとし、pull up設定とします
        GPIO.setup(pin,GPIO.IN,pull_up_down=GPIO.PUD_UP)
        pinFlag = False

    # センサーの読み込み
    door_sw = GPIO.input(pin)

    if door_sw != sw_lock:

        # on off 確認
        print(door_sw)

        payload = json.dumps({
            "token": token,
            "state": door_sw
        })

        # サーバーへPOST
        requests.request("POST", url, headers=headers, data=payload)

    sw_lock = door_sw

    time.sleep(0.50)
    
