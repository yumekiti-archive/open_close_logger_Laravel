import os

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

# 以下URLが等しくない時変更 URL設定
url = ssl + "://" + ip + "/api/logs"

os.system("sudo python3 /home/ubuntu/codes/open-close-logger/raspi/Multiple.py " + url + " " + token + " " + pin + " &")