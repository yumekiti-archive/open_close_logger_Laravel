import requests
import json
import time
import sys

# 以下後に変更

# トークン設定
print("token set:")
token = input()

print("ip set:")
ip = input()

print("pin set:")
pin = input()
pinFlag = True

# 以下URLが等しくない時変更 URL設定
url = "https://" + ip + "/api/logs"

# 変更内容ここまで

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
    try:

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

    except:
        import traceback
        traceback.print_exc()
        break

# GPIO操作終了
GPIO.cleanup()

# 終わり確認
print("end")