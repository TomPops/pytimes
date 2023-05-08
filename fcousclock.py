import time
import sys

def countdown(t):
    while t:
        mins, secs = divmod(t, 60)
        timeformat = '{:02d}:{:02d}'.format(mins, secs)
        print(timeformat, end='\r')
        time.sleep(1)
        t -= 1

    print('Time\'s up!')
    sys.exit()

if __name__ == '__main__':
    t = int(input("请输入要专注的时间（以分钟为单位）: "))
    t *= 60
    countdown(t)
