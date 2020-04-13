# !/bin/bash
# First Tools By Red-z1
b='\033[1m'
u='\033[4m'
bl='\E[30m'
r='\E[31m'
g='\E[32m'
bu='\E[34m'
m='\E[35m'
c='\E[36m'
w='\E[37m'
endc='\E[0m'
enda='\033[0m'
blue='\e[1;34m'
cyan='\e[1;36m'
red='\e[1;31m'
clear
figlet "    T-ProtoN"
echo "        # Special Tools For The Defacer #"
echo
echo
echo -e $cyan"[!] Author : Red-z1"
echo "[!] Github : https://github.com/redproton"
echo "[!] Team   : Indonesian Error System"
echo
echo "[!] Select one of the tools below :"
echo
echo "    [0] Install Bahan"
echo "    [1] Reverse IP"
echo "    [2] Fox Contact Auto Exploit"
echo "    [3] vBulletin RCE Auto Exploit"
echo "    [4] Laravel PHP Unit RCE Auto Exploit"
echo "    [5] Webdav"
echo "    [6] Wordpress Brute Force"
echo "    [7] Drupal RCE Auto Exploit"
echo
read -p "[!] Pilih : " pil;
if [ $pil = 0 ]
then
pkg update && pkg upgrade -y
pkg install php
pkg install python
pkg install python2
pkg install figlet
pip install requests
git clone https://github.com/redproton/t-proton
cd t-proton
fi
# batas
if [ $pil = 1 ]
then
cd t-proton
php rev.php
echo
fi
# batas
if [ $pil = 2 ]
then
php fox.php
fi
# batas
if [ $pil = 3 ]
then
python2 vb.py
fi