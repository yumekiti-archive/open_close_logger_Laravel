import requests
import json

url = "http://localhost:8080/api/logs"

payload = json.dumps({
  "token": "asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasda",
  "state": True
})
headers = {
  'Accept': 'application/json',
  'Content-Type': 'application/json'
}

response = requests.request("POST", url, headers=headers, data=payload)

print(response.text)
