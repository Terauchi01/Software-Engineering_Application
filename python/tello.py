# Python Tello ドローン制御プログラム

import socket
import time

# Tello ドローンのIPアドレスとポート
tello_address = ('192.168.10.1', 8889)

# ソケットを作成
sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)

# ソケットをバインド
sock.bind(('', 9000))

# Tello ドローンに command コマンドを送信して SDK モードに切り替える
sock.sendto('command'.encode('utf-8'), tello_address)
time.sleep(1)  # 1秒待機

# Tello ドローンに takeoff コマンドを送信して離陸
sock.sendto('takeoff'.encode('utf-8'), tello_address)
time.sleep(1)  # 1秒待機

# Tello ドローンに直進コマンドを送信して2秒間直進
sock.sendto('forward 100'.encode('utf-8'), tello_address)
time.sleep(1)  # 1秒待機

# Tello ドローンに land コマンドを送信して着陸
sock.sendto('land'.encode('utf-8'), tello_address)

# ソケットをクローズ
sock.close()
