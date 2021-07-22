import requests
import json

url = "http://localhost:8080/api/logs"

payload = json.dumps({
  "token": "c2844241b947e00158775f48da82908870a5c6737c59e5e4aa61e7a99dc843f3846e68e0fe9566c98cec6adcd6db9b7f1e1b3682108058eddb09eb194543dab3",
  "state": True
})
headers = {
  'Accept': 'application/json',
  'Content-Type': 'application/json'
}

response = requests.request("POST", url, headers=headers, data=payload)

print(response.text)
