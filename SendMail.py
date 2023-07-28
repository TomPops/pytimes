import smtplib
from email.message import EmailMessage

def send_email(smtp_server, smtp_port, sender_email, receiver_email, password, subject, message):
    # 创建一个 EmailMessage 对象
    msg = EmailMessage()
    msg['Subject'] = subject
    msg['From'] = sender_email
    msg['To'] = receiver_email
    msg.set_content(message)

    try:
        # 连接到 SMTP 服务器
        server = smtplib.SMTP(smtp_server, smtp_port)
        # 登录 SMTP 服务器
        server.login(sender_email, password)
        # 发送邮件
        server.send_message(msg)
        print("邮件发送成功！")
    except Exception as e:
        print("邮件发送失败！错误信息：", str(e))
    finally:
        # 关闭连接
        server.quit()

# 填写你的 SMTP 服务器信息
smtp_server = 'smtp.example.com'
smtp_port = 587

# 填写发件人和收件人信息
sender_email = 'your_email@example.com'
receiver_email = 'recipient@example.com'

# 填写发件人的密码（如果是 Gmail 或者其他需要授权的 SMTP 服务器）
password = 'your_password'

# 邮件主题和内容
subject = 'Hello, World!'
message = '这是一封使用 Python 发送的测试邮件。'

# 调用函数发送邮件
send_email(smtp_server, smtp_port, sender_email, receiver_email, password, subject, message)
