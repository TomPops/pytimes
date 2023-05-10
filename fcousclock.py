import time

focus_time = 25 # 设置专注时间为25分钟
total_time = focus_time * 60 # 计算总秒数

while total_time:
    mins, secs = divmod(total_time, 60)
    time_str = f'{mins:02d}:{secs:02d}' # 格式化时间字符串
    print(f'Current focus time: {time_str}', end='\r') # 输出当前时间，覆盖上一行输出
    time.sleep(1) # 暂停1秒
    total_time -= 1

print('Focus time is over!') # 当专注时间结束时输出提示信息
