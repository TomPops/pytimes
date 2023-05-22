import requests
import json

# 更新以下参数
subscription_id = "your_subscription_id" 
resource_group = "your_resource_group"
provider_namespace = "Microsoft.Compute"
resource_type = "virtualMachines"
name = "your_vm_name"
api_version = "2019-07-01"
location = "your_location"
api_key = "your_api_key"

# 构造API请求
url = f"https://management.azure.com/subscriptions/{subscription_id}/resourceGroups/{resource_group}/providers/{provider_namespace}/{resource_type}/{name}/providers/Microsoft.Authorization/permissions?api-version={api_version}&$filter=substringof('{location}', resourceScope)"
headers = {"Authorization": f"Bearer {api_key}", "Content-Type": "application/json"}

# 发送API请求
response = requests.get(url, headers=headers)

# 解析API响应
json_data = json.loads(response.text)
print(json_data)
