import RPi.GPIO as GPIO
import requests
import json
import time
import sys

print("ip set:")
ip = input()

token = "asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasda"

pin = 26

# 以下URLが等しくない時変更 URL設定
url = "https://" + ip + "/api/logs"

headers = {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
}

door_sw = False
sw_lock = False

GPIO.setmode(GPIO.BCM)
GPIO.setup(pin,GPIO.IN,pull_up_down=GPIO.PUD_UP)

while True:
    try:

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